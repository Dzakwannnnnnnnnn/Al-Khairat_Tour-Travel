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

        $booking = Booking::create($data);

        // Auto-create payment entry with amount equal to product price
        $product = Product::find($request->product_id);
        if ($product) {
            Payment::create([
                'booking_id' => $booking->id,
                'amount' => $product->price,
                'payment_method' => 'Menunggu Pembayaran (Otomatis)',
                'payment_date' => now(),
                'status' => 'pending',
            ]);
        }

        return redirect()->route('bookings.index')->with('success', 'Data Pemesanan berhasil ditambahkan dan Tagihan otomatis terbuat!');
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
