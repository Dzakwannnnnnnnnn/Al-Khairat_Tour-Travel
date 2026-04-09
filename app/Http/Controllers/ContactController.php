<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Handle the contact form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function send(Request $request)
    {
        // 1. Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'email' => 'Format email tidak valid.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        // 2. Prepare Data
        $data = $request->only(['name', 'email', 'subject', 'message']);

        try {
            // 3. Send Email
            Mail::to('farrelazam05@gmail.com')->send(new ContactMessageMail($data));

            return response()->json([
                'status' => 'success',
                'message' => 'Terima kasih! Pesan Anda telah berhasil dikirim.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Maaf, terjadi kesalahan saat mengirim pesan. Silakan coba lagi nanti.'
            ], 500);
        }
    }
}
