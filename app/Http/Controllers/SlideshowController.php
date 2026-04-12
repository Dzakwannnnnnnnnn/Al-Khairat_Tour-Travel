<?php

namespace App\Http\Controllers;

use App\Models\Slideshow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideshowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slideshows = Slideshow::orderBy('order')->get();
        return view('admin.slideshow.index', compact('slideshows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slideshow.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('slideshows', 'public');
            $validated['local_path'] = $path;
        }

        if ($request->filled('image_url')) {
            $validated['image_url'] = $request->image_url;
        }

        $validated['is_active'] = $request->has('is_active');

        Slideshow::create($validated);

        return redirect()->route('slideshow.index')
            ->with('success', 'Slideshow berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slideshow $slideshow)
    {
        return view('admin.slideshow.edit', compact('slideshow'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slideshow $slideshow)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($slideshow->local_path) {
                Storage::disk('public')->delete($slideshow->local_path);
            }
            $file = $request->file('image');
            $path = $file->store('slideshows', 'public');
            $validated['local_path'] = $path;
        }

        if ($request->filled('image_url')) {
            $validated['image_url'] = $request->image_url;
        }

        $validated['is_active'] = $request->has('is_active');

        $slideshow->update($validated);

        return redirect()->route('slideshow.index')
            ->with('success', 'Slideshow berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slideshow $slideshow)
    {
        if ($slideshow->local_path) {
            Storage::disk('public')->delete($slideshow->local_path);
        }

        $slideshow->delete();

        return redirect()->route('slideshow.index')
            ->with('success', 'Slideshow berhasil dihapus');
    }

    /**
     * Update slide order (for drag and drop)
     */
    public function updateOrder(Request $request)
    {
        $order = $request->validate([
            'order' => 'required|array',
        ]);

        foreach ($order['order'] as $index => $id) {
            Slideshow::where('id', $id)->update(['order' => $index + 1]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Toggle active status
     */
    public function toggleActive(Slideshow $slideshow)
    {
        $slideshow->update(['is_active' => !$slideshow->is_active]);

        return redirect()->route('slideshow.index')
            ->with('success', 'Status slideshow berhasil diperbarui');
    }
}
