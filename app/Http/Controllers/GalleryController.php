<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource for public.
     */
    public function publicIndex()
    {
        $galleries = Gallery::where('is_active', true)
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('gallery', compact('galleries'));
    }

    /**
     * Display a listing of the resource for admin.
     */
    public function index()
    {
        $galleries = Gallery::orderBy('order')->orderBy('created_at', 'desc')->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:image,video',
            'image' => 'required_if:type,image|image|mimes:jpeg,png,jpg,webp|max:10240',
            'video_url' => 'nullable|url',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('gallery', 'public');
            $validated['image_path'] = $path;
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = Gallery::max('order') + 1;

        Gallery::create($validated);

        return redirect()->route('gallery.index')->with('success', 'Item galeri berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:image,video',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'video_url' => 'nullable|url',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
                Storage::disk('public')->delete($gallery->image_path);
            }
            $path = $request->file('image')->store('gallery', 'public');
            $validated['image_path'] = $path;
        }

        $validated['is_active'] = $request->has('is_active');

        $gallery->update($validated);

        return redirect()->route('gallery.index')->with('success', 'Item galeri berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Item galeri berhasil dihapus!');
    }

    /**
     * Update order of gallery items.
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
        ]);

        foreach ($request->order as $index => $id) {
            Gallery::where('id', $id)->update(['order' => $index + 1]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Toggle active status.
     */
    public function toggleActive(Gallery $gallery)
    {
        $gallery->update(['is_active' => !$gallery->is_active]);

        return redirect()->route('gallery.index')->with('success', 'Status galeri berhasil diperbarui!');
    }
}
