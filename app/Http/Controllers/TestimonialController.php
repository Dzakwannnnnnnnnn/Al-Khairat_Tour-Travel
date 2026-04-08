<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Product;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the testimonials.
     */
    public function index()
    {
        $testimonials = Testimonial::with('product')->latest()->paginate(10);
        $products = Product::all();
        return view('testimonials', compact('testimonials', 'products'));
    }

    /**
     * Store a newly created testimonial in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'product_id' => 'nullable|exists:products,id',
            'message' => 'required|string',
            'video_url' => 'nullable|url',
            'rating' => 'required|integer|min:1|max:5',
            'status' => 'required|in:draft,published',
        ]);

        Testimonial::create($request->all());

        return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil ditambahkan!');
    }

    /**
     * Store a newly created testimonial in storage from public landing page.
     */
    public function publicStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'product_id' => 'nullable|exists:products,id',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $data = $request->all();
        $data['status'] = 'draft'; // Default draft untuk pengunjung publik

        Testimonial::create($data);

        return redirect()->route('home')->with('success', 'Terima kasih atas testimoni Anda! Ulasan Anda akan kami tinjau sebelum ditampilkan.');
    }

    /**
     * Update the specified testimonial in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'product_id' => 'nullable|exists:products,id',
            'message' => 'required|string',
            'video_url' => 'nullable|url',
            'rating' => 'required|integer|min:1|max:5',
            'status' => 'required|in:draft,published',
        ]);

        $testimonial->update($request->all());

        return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil diperbarui!');
    }

    /**
     * Remove the specified testimonial from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil dihapus!');
    }
}
