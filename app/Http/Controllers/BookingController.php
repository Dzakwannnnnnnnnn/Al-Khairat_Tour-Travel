<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use App\Models\Product;
use App\Models\Payment;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'product'])->latest()->paginate(10);
        $users = User::all();
        $products = Product::all();
        return view('bookings', compact('bookings', 'users', 'products'));
    }

    public function showBookingPage(Product $product)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('info', 'Silakan masuk terlebih dahulu untuk melakukan pendaftaran paket.');
        }

        $whatsapp = \App\Models\Setting::where('key', 'whatsapp_number')->first()->value ?? '6281234567890';
        return view('booking-page', compact('product', 'whatsapp'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'status' => 'required|in:pending,dp_paid,fully_paid,completed,cancelled',
            'notes' => 'nullable|string',
        ]);

        if ($request->status === 'fully_paid') {
            return back()->withErrors(['status' => 'Pemesanan baru tidak bisa langsung Lunas. Silakan buat dengan status Pending, lalu proses di Manajemen Pembayaran.'])->withInput();
        }

        $data = $request->all();
        // Generate random booking code
        $data['booking_code'] = 'BKG-' . date('Ymd') . '-' . strtoupper(Str::random(4));
        $data['booking_seat'] = $data['booking_seat'] ?? 1;

        $booking = Booking::create($data);

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
        $bookings = Booking::with(['product', 'user'])->where('group_code', $groupCode)->get();
        if ($bookings->isEmpty()) {
            abort(404);
        }

        $payment = Payment::where('booking_id', $bookings->first()->id)->first();
        $whatsapp = \App\Models\Setting::where('key', 'whatsapp_number')->first()->value ?? '6281234567890';
        
        return view('invoice', compact('bookings', 'payment', 'whatsapp', 'groupCode'));
    }

    public function downloadInvoicePDF($groupCode)
    {
        $bookings = Booking::with(['product', 'user'])->where('group_code', $groupCode)->get();
        if ($bookings->isEmpty()) {
            abort(404);
        }

        $payment = Payment::where('booking_id', $bookings->first()->id)->first();
        
        $pdf = Pdf::loadView('pdf.invoice', compact('bookings', 'payment', 'groupCode'));

        return $pdf->stream('Invoice-' . $groupCode . '.pdf');
    }

    public function updatePaymentMethod(Request $request, $groupCode)
    {
        $request->validate([
            'payment_method' => 'required|string',
        ]);

        $firstBooking = Booking::where('group_code', $groupCode)->firstOrFail();
        $payment = Payment::where('booking_id', $firstBooking->id)->firstOrFail();
        
        $payment->update([
            'payment_method' => $request->payment_method
        ]);

        return back()->with('success', 'Metode pembayaran berhasil diperbarui. Silakan lakukan transfer sesuai instruksi.');
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'status' => 'required|in:pending,dp_paid,fully_paid,completed,cancelled',
            'notes' => 'nullable|string',
        ]);

        if ($request->status === 'fully_paid') {
            $paymentQuery = !empty($booking->group_code) 
                ? Payment::whereHas('booking', function($query) use ($booking) {
                    $query->where('group_code', $booking->group_code);
                }) 
                : Payment::where('booking_id', $booking->id);

            $payment = $paymentQuery->first();
            $invalidMethods = ['belum memilih', 'menunggu pembayaran (otomatis)', ''];
            
            if ($payment && in_array(strtolower(trim($payment->payment_method)), $invalidMethods)) {
                return back()->withErrors(['status' => 'Gagal mengubah ke Lunas (Fully Paid). User atau Admin belum menentukan Metode Pembayaran di data transaksi.'])->withInput();
            }
        }

        $oldStatus = $booking->status;
        $booking->update($request->all());

        // Handle stock specifically when status changes to/from cancelled
        if ($oldStatus !== 'cancelled' && $request->status === 'cancelled') {
            $booking->product->increment('stock', $booking->booking_seat);
        } elseif ($oldStatus === 'cancelled' && $request->status !== 'cancelled') {
            $booking->product->decrement('stock', $booking->booking_seat);
        }

        return redirect()->route('bookings.index')->with('success', 'Data Pemesanan berhasil diperbarui!');
    }

    public function destroy(Booking $booking)
    {
        // Return stock if the booking being deleted was active
        if ($booking->status !== 'cancelled') {
            $booking->product->increment('stock', $booking->booking_seat);
        }
        
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Data Pemesanan berhasil dihapus!');
    }
}
