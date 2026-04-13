<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Show the profile edit form.
     */
    public function edit()
    {
        $user = auth()->user();
        $userBookings = Booking::with('product')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        $bookingHistories = $userBookings
            ->groupBy(fn ($booking) => $booking->group_code ?: $booking->booking_code)
            ->map(function ($groupBookings, $referenceCode) {
                $primaryBooking = $groupBookings->sortBy('created_at')->first();
                $payment = Payment::where('booking_id', $primaryBooking->id)->first();

                $paymentStatus = $payment->status ?? 'pending';

                $nextStep = match ($paymentStatus) {
                    'verified' => 'Pembayaran sudah lunas. Simpan invoice dan tunggu info keberangkatan dari admin.',
                    'rejected' => 'Pembayaran ditolak. Saat ini pesanan dikunci dan Anda hanya bisa kembali ke beranda.',
                    default => 'Lihat invoice untuk mengikuti petunjuk pembayaran dan cek status verifikasi terbaru.',
                };

                return (object) [
                    'reference_code' => $referenceCode,
                    'group_code' => $primaryBooking->group_code,
                    'product_id' => $primaryBooking->product_id,
                    'product_name' => $primaryBooking->product->name ?? 'Paket Tidak Ditemukan',
                    'product_category' => $primaryBooking->product->category ?? '-',
                    'duration' => $primaryBooking->product->duration ?? '-',
                    'created_at' => $primaryBooking->created_at,
                    'pilgrim_count' => $groupBookings->count(),
                    'total_amount' => $payment->amount ?? $groupBookings->sum('total_price'),
                    'payment_method' => $payment->payment_method ?? 'Belum Memilih',
                    'payment_status' => $paymentStatus,
                    'invoice_url' => $primaryBooking->group_code ? route('booking.invoice', $primaryBooking->group_code) : null,
                    'invoice_pdf_url' => $primaryBooking->group_code ? route('booking.invoice.pdf', $primaryBooking->group_code) : null,
                    'next_step' => $nextStep,
                ];
            })
            ->sortByDesc('created_at')
            ->values();

        return view('profile', compact('user', 'bookingHistories'));
    }

    /**
     * Update the user's profile.
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nickname' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ]);

        $data = [
            'name' => $request->name,
            'nickname' => $request->nickname,
            'email' => $request->email,
        ];

        // Handle Avatar Upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $path = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $path;
        }

        $user->update($data);

        return back()->with('success', 'Profil Anda berhasil diperbarui!');
    }

    /**
     * Update the user's password from the profile page.
     */
    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'confirmed', 'different:current_password', Password::min(8)],
        ], [
            'current_password.current_password' => 'Password saat ini salah.',
            'new_password.different' => 'Password baru harus berbeda dari password saat ini.',
        ]);

        $user->update([
            'password' => Hash::make($validated['new_password']),
        ]);

        return back()->with('success', 'Password Anda berhasil diperbarui.');
    }
}
