<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guide;

class GuideController extends Controller
{
    /**
     * Display all guides
     */
    public function index()
    {
        $guides = Guide::latest()->paginate(10);
        return view('guides', compact('guides'));
    }

    /**
     * List all guides for admin panel
     */
    public function adminIndex()
    {
        $guides = Guide::orderBy('category')->orderBy('order')->paginate(15);
        return view('admin.guide.index', compact('guides'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        $categories = ['umrah', 'haji'];
        return view('admin.guide.create', compact('categories'));
    }

    /**
     * Store a newly created guide
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|in:umrah,haji',
            'slug' => 'required|string|max:255|unique:guides,slug',
            'title' => 'required|string|max:255',
            'badge' => 'required|string|max:50',
            'icon' => 'required|string|max:10',
            'description' => 'required|string|max:500',
            'overview' => 'required|string',
            'key_points' => 'nullable|json',
            'sections' => 'nullable|json',
            'tips' => 'nullable|json',
            'is_active' => 'boolean',
        ]);

        // Parse JSON if sent as strings
        if (is_string($validated['key_points'] ?? null)) {
            $validated['key_points'] = json_decode($validated['key_points'], true);
        }
        if (is_string($validated['sections'] ?? null)) {
            $validated['sections'] = json_decode($validated['sections'], true);
        }
        if (is_string($validated['tips'] ?? null)) {
            $validated['tips'] = json_decode($validated['tips'], true);
        }

        $validated['is_active'] = $request->has('is_active');

        Guide::create($validated);

        return redirect()->route('guides.admin-index')
            ->with('success', 'Panduan/Manasik berhasil ditambahkan!');
    }

    /**
     * Show edit form
     */
    public function edit(Guide $guide)
    {
        $categories = ['umrah', 'haji'];
        return view('admin.guide.edit', compact('guide', 'categories'));
    }

    /**
     * Update the guide
     */
    public function update(Request $request, Guide $guide)
    {
        $validated = $request->validate([
            'category' => 'required|in:umrah,haji',
            'slug' => 'required|string|max:255|unique:guides,slug,' . $guide->id,
            'title' => 'required|string|max:255',
            'badge' => 'required|string|max:50',
            'icon' => 'required|string|max:10',
            'description' => 'required|string|max:500',
            'overview' => 'required|string',
            'key_points' => 'nullable|json',
            'sections' => 'nullable|json',
            'tips' => 'nullable|json',
            'is_active' => 'boolean',
        ]);

        // Parse JSON if sent as strings
        if (is_string($validated['key_points'] ?? null)) {
            $validated['key_points'] = json_decode($validated['key_points'], true);
        }
        if (is_string($validated['sections'] ?? null)) {
            $validated['sections'] = json_decode($validated['sections'], true);
        }
        if (is_string($validated['tips'] ?? null)) {
            $validated['tips'] = json_decode($validated['tips'], true);
        }

        $validated['is_active'] = $request->has('is_active');

        $guide->update($validated);

        return redirect()->route('guides.admin-index')
            ->with('success', 'Panduan/Manasik berhasil diperbarui!');
    }

    /**
     * Delete the guide
     */
    public function destroy(Guide $guide)
    {
        $guide->delete();
        return redirect()->route('guides.admin-index')
            ->with('success', 'Panduan/Manasik berhasil dihapus!');
    }

    /**
     * Toggle active status
     */
    public function toggleActive(Guide $guide)
    {
        $guide->update(['is_active' => !$guide->is_active]);
        return redirect()->route('guides.admin-index')
            ->with('success', 'Status panduan berhasil diperbarui');
    }
}
