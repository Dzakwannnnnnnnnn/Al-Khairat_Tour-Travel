<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Booking;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    protected function syncBookingStatuses(Payment $payment): void
    {
        $booking = $payment->booking;

        if (!$booking) {
            return;
        }

        $bookingStatus = match ($payment->status) {
            'verified' => 'fully_paid',
            'pending', 'rejected' => 'pending',
            default => $booking->status,
        };

        $query = Booking::query();

        if (!empty($booking->group_code)) {
            $query->where('group_code', $booking->group_code);
        } else {
            $query->whereKey($booking->id);
        }

        $query->update(['status' => $bookingStatus]);
    }

    public function index()
    {
        $payments = Payment::with(['booking', 'booking.user'])->latest()->paginate(10);
        // Cuma bawa booking yang belum dibatalkan untuk opsi dropdown
        $bookings = Booking::with('user')->where('status', '!=', 'cancelled')->get();
        return view('payments', compact('payments', 'bookings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'amount' => 'required|numeric|min:1000',
            'payment_method' => 'required|string|max:255',
            'payment_date' => 'required|date',
            'status' => 'required|in:pending,verified,rejected',
            'proof_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except(['proof_image']);

        if ($request->hasFile('proof_image')) {
            $path = $request->file('proof_image')->store('public/payments');
            $data['proof_image'] = str_replace('public/', '', $path);
        }

        $payment = Payment::create($data);
        $payment->load('booking');
        $this->syncBookingStatuses($payment);

        return redirect()->route('payments.index')->with('success', 'Data Pembayaran berhasil dicatat!');
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'amount' => 'required|numeric|min:1000',
            'payment_method' => 'required|string|max:255',
            'payment_date' => 'required|date',
            'status' => 'required|in:pending,verified,rejected',
            'proof_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except(['proof_image']);

        if ($request->hasFile('proof_image')) {
            // Delete old image if exists
            if ($payment->proof_image && Storage::exists('public/' . $payment->proof_image)) {
                Storage::delete('public/' . $payment->proof_image);
            }
            // Store new image
            $path = $request->file('proof_image')->store('public/payments');
            $data['proof_image'] = str_replace('public/', '', $path);
        }

        $payment->update($data);
        $payment->load('booking');
        $this->syncBookingStatuses($payment);

        return redirect()->route('payments.index')->with('success', 'Data Pembayaran berhasil diupdate!');
    }

    public function destroy(Payment $payment)
    {
        if ($payment->proof_image && Storage::exists('public/' . $payment->proof_image)) {
            Storage::delete('public/' . $payment->proof_image);
        }
        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'Data Pembayaran berhasil dihapus!');
    }
}
