<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use App\Models\Product;
use App\Models\Payment;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\SavingsPlan;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with(['product', 'user', 'payment'])->latest();

        // Stats calculation
        $stats = [
            'total' => Booking::count(),
            'pending' => Booking::where('status', 'pending')->count(),
            'dp_paid' => Booking::where('status', 'dp_paid')->count(),
            'fully_paid' => Booking::where('status', 'fully_paid')->count(),
            'savings' => Booking::where('status', 'savings')->count(),
        ];

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('booking_code', 'like', "%{$search}%")
                  ->orWhere('group_code', 'like', "%{$search}%")
                  ->orWhere('full_name', 'like', "%{$search}%")
                  ->orWhere('orderer_email', 'like', "%{$search}%")
                  ->orWhere('orderer_phone', 'like', "%{$search}%")
                  ->orWhereHas('user', function($uq) use ($search) {
                      $uq->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                  });
            });

            // Prioritize exact name matches or name starting with search term
            $query->orderByRaw("CASE 
                WHEN full_name = ? THEN 1 
                WHEN full_name LIKE ? THEN 2 
                ELSE 3 
            END", [$search, "{$search}%"]);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $bookings = $query->paginate(20)->withQueryString();
        $users = User::all();
        $products = Product::all();
        return view('bookings', compact('bookings', 'users', 'products', 'stats'));
    }

    public function myBookings()
    {
        $bookings = Booking::with('product')
            ->where('user_id', auth()->id())
            ->latest()
            ->get()
            ->groupBy('group_code');
            
        return view('member.bookings', compact('bookings'));
    }

    public function showBookingPage(Product $product)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('info', 'Silakan masuk terlebih dahulu untuk melakukan pendaftaran paket.');
        }

        $whatsapp = \App\Models\Setting::where('key', 'whatsapp_number')->first()->value ?? '6281253088788';
        return view('booking-page', compact('product', 'whatsapp'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'orderer_email' => 'nullable|email|max:255',
            'orderer_phone' => 'nullable|string|max:20',
            'product_id' => 'required|exists:products,id',
            'status' => 'required|in:pending,dp_paid,fully_paid,completed,cancelled,savings',
            'notes' => 'nullable|string',
        ]);

        if ($request->status === 'fully_paid') {
            return back()->withErrors(['status' => 'Pemesanan baru tidak bisa langsung Lunas. Silakan buat dengan status Pending, lalu proses di Manajemen Pembayaran.'])->withInput();
        }

        // Logic to find or create user based on email
        $userId = null;
        if ($request->orderer_email) {
            $user = User::where('email', $request->orderer_email)->first();
            if (!$user) {
                $user = User::create([
                    'name' => $request->full_name,
                    'email' => $request->orderer_email,
                    'password' => \Hash::make(Str::random(16)), // Secure random password
                    'role' => 'user'
                ]);
            }
            $userId = $user->id;
        }

        $data = $request->except(['full_name', 'orderer_email', 'orderer_phone']);
        $data['user_id'] = $userId;
        $data['full_name'] = $request->full_name;
        $data['orderer_email'] = $request->orderer_email;
        $data['orderer_phone'] = $request->orderer_phone;
        
        // Generate random booking code
        $data['booking_code'] = 'BKG-' . date('Ymd') . '-' . strtoupper(Str::random(4));
        $data['booking_seat'] = $data['booking_seat'] ?? 1;

        // Calculate total price based on product
        $product = Product::find($request->product_id);
        $data['total_price'] = $product ? ($product->price * $data['booking_seat']) : 0;

        $booking = Booking::create($data);
        $this->syncSavingsPlan($booking);

        // Auto-create payment entry with amount equal to product price
        $product = Product::find($request->product_id);
        if ($product) {
            $product->decrement('stock', $data['booking_seat']);
            Payment::create([
                'booking_id' => $booking->id,
                'user_id' => $booking->user_id,
                'amount' => $product->price * $data['booking_seat'],
                'payment_method' => 'Menunggu Pembayaran (Otomatis)',
                'payment_date' => now(),
                'status' => 'pending',
            ]);
        }

        return redirect()->route('bookings.index')->with('success', 'Data Pemesanan berhasil ditambahkan dan Tagihan otomatis terbuat!');
    }

    public function publicStore(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'full_name' => 'required|array',
            'full_name.*' => 'required|string|max:255',
            'nik' => 'required|array',
            'nik.*' => 'required|string|max:16',
            'birth_place' => 'required|array',
            'birth_place.*' => 'required|string|max:255',
            'birth_date' => 'required|array',
            'birth_date.*' => 'required|date',
            'address' => 'required|array',
            'address.*' => 'required|string',
            'room_variant' => 'required|array',
            'orderer_name' => 'nullable|string|max:255',
            'orderer_phone' => 'nullable|string|max:20',
            'orderer_email' => 'nullable|email|max:255',
            'voucher_code' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $product = Product::findOrFail($request->product_id);
        $groupCode = 'GRP-' . date('Ymd') . '-' . strtoupper(Str::random(4));
        $totalGroupAmount = 0;
        $firstBooking = null;

        foreach ($request->full_name as $index => $name) {
            $price = (float)$product->price;
            $variant = $request->room_variant[$index] ?? 'triple';
            
            if ($variant === 'quad') {
                $price -= 1000000;
            } elseif ($variant === 'double') {
                $price += 2000000;
            }

            $booking = Booking::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'booking_code' => 'BKG-' . date('Ymd') . '-' . strtoupper(Str::random(4)),
                'group_code' => $groupCode,
                'booking_seat' => 1,
                'total_price' => $price,
                'status' => 'pending',
                'full_name' => $name,
                'nik' => $request->nik[$index],
                'birth_place' => $request->birth_place[$index],
                'birth_date' => $request->birth_date[$index],
                'address' => $request->address[$index],
                'room_variant' => $variant,
                'orderer_phone' => $request->orderer_phone,
                'orderer_email' => $request->orderer_email,
                'voucher_code' => $request->voucher_code,
                'notes' => $request->notes,
            ]);

            $this->syncSavingsPlan($booking);

            if ($index === 0) {
                $firstBooking = $booking;
                // Update user profile with first pilgrim data if requested
                if (auth()->check()) {
                    auth()->user()->update([
                        'nik' => $request->nik[$index],
                        'birth_place' => $request->birth_place[$index],
                        'birth_date' => $request->birth_date[$index],
                        'address' => $request->address[$index],
                    ]);
                }
            }

            $totalGroupAmount += $price;

            // Decrement stock for each booking in the group
            $product->decrement('stock', 1);
        }

        // Create a single Payment record for the whole group
        if ($firstBooking) {
            Payment::create([
                'booking_id' => $firstBooking->id,
                'user_id' => auth()->id(),
                'amount' => $totalGroupAmount,
                'payment_method' => 'Belum Memilih',
                'payment_date' => now(),
                'status' => 'pending',
            ]);
        }

        return redirect()->route('booking.invoice', $groupCode)->with('success', 'Pendaftaran berhasil! Silakan pilih metode pembayaran.');
    }

    public function showInvoice($groupCode)
    {
        $bookings = Booking::with(['product', 'user'])
            ->where('group_code', $groupCode)
            ->orWhere('booking_code', $groupCode)
            ->get();
            
        if ($bookings->isEmpty()) {
            abort(404);
        }

        $payment = Payment::where('booking_id', $bookings->first()->id)->first();
        $whatsapp = \App\Models\Setting::where('key', 'whatsapp_number')->first()->value ?? '6281253088788';
        
        return view('invoice', compact('bookings', 'payment', 'whatsapp', 'groupCode'));
    }

    public function downloadInvoicePDF($groupCode)
    {
        $bookings = Booking::with(['product', 'user'])
            ->where('group_code', $groupCode)
            ->orWhere('booking_code', $groupCode)
            ->get();
            
        if ($bookings->isEmpty()) {
            abort(404);
        }

        // Ambil semua pembayaran yang sudah terverifikasi untuk grup ini
        $allPayments = Payment::whereIn('booking_id', $bookings->pluck('id'))
                            ->where('status', 'verified')
                            ->get();
        
        $totalPaid = $allPayments->sum('amount');
        
        // Tetap bawa 1 payment record untuk info metode (ambil yang terakhir)
        $payment = Payment::whereIn('booking_id', $bookings->pluck('id'))->latest()->first();
        
        // Pastikan $payment tidak null untuk menghindari error di view
        if (!$payment) {
            $payment = (object)[
                'payment_method' => 'Belum Ditentukan',
                'payment_date' => now(),
                'status' => 'pending'
            ];
        }
        
        $pdf = Pdf::loadView('pdf.invoice', compact('bookings', 'payment', 'groupCode', 'totalPaid', 'allPayments'));

        return $pdf->stream('Invoice-' . $groupCode . '.pdf');
    }

    public function updatePaymentMethod(Request $request, $groupCode)
    {
        $request->validate([
            'payment_method' => 'required|string',
        ]);

        $firstBooking = Booking::where('group_code', $groupCode)
            ->orWhere('booking_code', $groupCode)
            ->firstOrFail();
            
        $payment = Payment::where('booking_id', $firstBooking->id)->firstOrFail();
        
        $payment->update([
            'payment_method' => $request->payment_method
        ]);

        return back()->with('success', 'Metode pembayaran berhasil diperbarui. Silakan lakukan transfer sesuai instruksi.');
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'orderer_email' => 'nullable|email|max:255',
            'orderer_phone' => 'nullable|string|max:20',
            'product_id' => 'required|exists:products,id',
            'status' => 'required|in:pending,dp_paid,fully_paid,completed,cancelled,savings',
            'notes' => 'nullable|string',
        ]);

        // Logic to find or create user based on email
        $userId = $booking->user_id;
        if ($request->orderer_email && $request->orderer_email !== ($booking->orderer_email ?? $booking->user->email ?? '')) {
            $user = User::where('email', $request->orderer_email)->first();
            if (!$user) {
                $user = User::create([
                    'name' => $request->full_name,
                    'email' => $request->orderer_email,
                    'password' => \Hash::make(Str::random(16)), // Secure random password
                    'role' => 'user'
                ]);
            }
            $userId = $user->id;
        }

        $oldStatus = $booking->status;
        
        $data = $request->all();
        $data['user_id'] = $userId;
        
        // Find the payment record associated with this booking/group
        $payment = !empty($booking->group_code) 
            ? Payment::whereHas('booking', function($query) use ($booking) {
                $query->where('group_code', $booking->group_code);
            })->first()
            : Payment::where('booking_id', $booking->id)->first();

        // Update payment method if provided
        if ($request->filled('payment_method') && $payment) {
            $payment->update([
                'payment_method' => $request->payment_method
            ]);
            // Refresh payment object to get latest data for the next check
            $payment->refresh();
        }

        // Final check for Fully Paid status: require a valid payment method
        if ($request->status === 'fully_paid') {
            $invalidMethods = ['belum memilih', 'menunggu pembayaran (otomatis)', '', null];
            $currentMethod = $payment ? strtolower(trim($payment->payment_method)) : '';
            
            if (!$payment || in_array($currentMethod, $invalidMethods)) {
                return back()->withErrors(['status' => 'Gagal mengubah ke Lunas (Fully Paid). Anda harus menentukan Metode Pembayaran terlebih dahulu.'])->withInput();
            }

            // Sync payment status to verified when booking is fully paid
            if ($payment->status !== 'verified') {
                $payment->update(['status' => 'verified']);
            }
        } elseif (in_array($request->status, ['pending', 'dp_paid']) && $payment && $payment->status === 'verified') {
            // Revert payment status if booking is downgraded from fully paid
            $payment->update(['status' => 'pending']);
        }
        
        $booking->update($data);
        $this->syncSavingsPlan($booking);

        // Handle stock specifically when status changes to/from cancelled
        if ($oldStatus !== 'cancelled' && $request->status === 'cancelled') {
            $booking->product->increment('stock', $booking->booking_seat);
        } elseif ($oldStatus === 'cancelled' && $request->status !== 'cancelled') {
            $booking->product->decrement('stock', $booking->booking_seat);
        }

        return redirect()->route('bookings.index')->with('success', 'Data Pemesanan berhasil diperbarui!');
    }

    public function checkPaymentStatus($groupCode)
    {
        $bookings = Booking::where('group_code', $groupCode)
            ->orWhere('booking_code', $groupCode)
            ->get();
            
        if ($bookings->isEmpty()) {
            return response()->json(['status' => 'not_found'], 404);
        }

        $payment = Payment::where('booking_id', $bookings->first()->id)->first();
        if (!$payment) {
            return response()->json(['status' => 'no_payment'], 404);
        }

        return response()->json(['status' => $payment->status]);
    }

    public function destroy(Booking $booking)
    {
        // Return stock if the booking being deleted was active
        if ($booking->status !== 'cancelled') {
            $booking->product->increment('stock', $booking->booking_seat);
        }

        // Clean up related payment records to prevent orphan data
        Payment::where('booking_id', $booking->id)->delete();
        
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Data Pemesanan berhasil dihapus!');
    }

    private function syncSavingsPlan(Booking $booking)
    {
        if ($booking->status === 'savings') {
            SavingsPlan::updateOrCreate(
                ['booking_id' => $booking->id],
                [
                    'user_id' => $booking->user_id,
                    'product_id' => $booking->product_id,
                    'quantity' => $booking->booking_seat,
                    'target_amount' => $booking->total_price,
                    'status' => 'active',
                ]
            );
        } else {
            // If status changed away from savings, we mark the plan as cancelled
            $plan = SavingsPlan::where('booking_id', $booking->id)->first();
            if ($plan && $plan->status === 'active') {
                $plan->update(['status' => 'cancelled']);
            }
        }
    }
}
