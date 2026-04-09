<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use App\Models\Product;
use App\Models\Payment;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'product'])->latest()->paginate(10);
        $users = User::all();
        $products = Product::all();
        return view('bookings', compact('bookings', 'users', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'status' => 'required|in:pending,dp_paid,fully_paid,completed,cancelled',
            'notes' => 'nullable|string',
        ]);

        $data = $request->all();
        // Generate random booking code
        $data['booking_code'] = 'BKG-' . date('Ymd') . '-' . strtoupper(Str::random(4));
        $data['booking_seat'] = $data['booking_seat'] ?? 1;

        $booking = Booking::create($data);

        // Auto-create payment entry with amount equal to product price
        $product = Product::find($request->product_id);
        if ($product) {
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
            'full_name' => 'required|string|max:255',
            'nik' => 'required|string|size:16',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'address' => 'required|string',
            'booking_seat' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $data['booking_code'] = 'BKG-' . date('Ymd') . '-' . strtoupper(Str::random(4));
        $data['total_price'] = $product->price * $request->booking_seat;
        $data['status'] = 'pending';

        $booking = Booking::create($data);

        // Update user profile if logged in
        if (auth()->check()) {
            auth()->user()->update([
                'birth_place' => $request->birth_place,
                'birth_date' => $request->birth_date,
                'address' => $request->address,
                'nik' => $request->nik,
            ]);
        }

        // Create Payment record
        Payment::create([
            'booking_id' => $booking->id,
            'user_id' => $booking->user_id,
            'amount' => $data['total_price'],
            'payment_method' => 'Transfer Bank',
            'payment_date' => now(),
            'status' => 'pending',
        ]);

        return back()->with('success', 'Pendaftaran berhasil! Kami akan menghubungi Anda segera untuk proses pembayaran.');
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'status' => 'required|in:pending,dp_paid,fully_paid,completed,cancelled',
            'notes' => 'nullable|string',
        ]);

        $booking->update($request->all());

        return redirect()->route('bookings.index')->with('success', 'Data Pemesanan berhasil diperbarui!');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Data Pemesanan berhasil dihapus!');
    }
}
