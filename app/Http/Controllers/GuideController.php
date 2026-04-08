<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guide;

class GuideController extends Controller
{
    public function index()
    {
        $guides = Guide::latest()->paginate(10);
        return view('guides', compact('guides'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'content' => 'required|string',
            'video_url' => 'nullable|url',
            'status' => 'required|in:draft,published',
        ]);

        Guide::create($request->all());

        return redirect()->route('guides.index')->with('success', 'Panduan/Manasik berhasil ditambahkan!');
    }

    public function update(Request $request, Guide $guide)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'content' => 'required|string',
            'video_url' => 'nullable|url',
            'status' => 'required|in:draft,published',
        ]);

        $guide->update($request->all());

        return redirect()->route('guides.index')->with('success', 'Panduan/Manasik berhasil diperbarui!');
    }

    public function destroy(Guide $guide)
    {
        $guide->delete();
        return redirect()->route('guides.index')->with('success', 'Panduan/Manasik berhasil dihapus!');
    }
}
