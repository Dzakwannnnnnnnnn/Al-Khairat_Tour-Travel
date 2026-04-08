<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Booking;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with(['booking', 'booking.user'])->latest()->paginate(10);
        $bookings = Booking::with('user')->where('status', '!=', 'cancelled')->get();
        return view('documents', compact('documents', 'bookings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'document_type' => 'required|string|max:255',
            'file_path' => 'required|file|max:5120', // Max 5MB
            'status' => 'required|in:pending,approved,rejected',
            'notes' => 'nullable|string',
        ]);

        $data = $request->except(['file_path']);

        if ($request->hasFile('file_path')) {
            $path = $request->file('file_path')->store('public/documents');
            $data['file_path'] = str_replace('public/', '', $path);
        }

        Document::create($data);

        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil diunggah!');
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'document_type' => 'required|string|max:255',
            'file_path' => 'nullable|file|max:5120',
            'status' => 'required|in:pending,approved,rejected',
            'notes' => 'nullable|string',
        ]);

        $data = $request->except(['file_path']);

        if ($request->hasFile('file_path')) {
            // Hapus file lama jika ada
            if ($document->file_path && Storage::exists('public/' . $document->file_path)) {
                Storage::delete('public/' . $document->file_path);
            }
            $path = $request->file('file_path')->store('public/documents');
            $data['file_path'] = str_replace('public/', '', $path);
        }

        $document->update($data);

        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil diperbarui!');
    }

    public function destroy(Document $document)
    {
        if ($document->file_path && Storage::exists('public/' . $document->file_path)) {
            Storage::delete('public/' . $document->file_path);
        }
        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil dihapus!');
    }
}
