<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
        }

        // Filter by category
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $products = $query->latest()->paginate(10);

        return view('products', compact('products'));
    }

    /**
     * Store a newly created product.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'in:Standar,Premium,Ekonomis'],
            'price' => ['required', 'numeric', 'min:0'],
            'price_quad' => ['nullable', 'numeric', 'min:0'],
            'price_triple' => ['nullable', 'numeric', 'min:0'],
            'price_double' => ['nullable', 'numeric', 'min:0'],
            'duration' => ['nullable', 'string', 'max:100'],
            'departure_date' => ['nullable', 'date'],
            'description' => ['nullable', 'string'],
            'features' => ['nullable', 'string'],
            'stock' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'in:active,inactive'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'guide_phone' => ['nullable', 'string', 'max:20'],
        ]);

        $data = $request->except(['image']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        // Convert features from newline-separated to array
        if ($request->filled('features')) {
            $data['features'] = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $request->features))));
        } else {
            $data['features'] = [];
        }

        $data['rundown'] = null; // Initialize rundown as null, will be edited separately

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Paket umroh berhasil ditambahkan!');
    }

    /**
     * Update the specified product.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'in:Standar,Premium,Ekonomis'],
            'price' => ['required', 'numeric', 'min:0'],
            'price_quad' => ['nullable', 'numeric', 'min:0'],
            'price_triple' => ['nullable', 'numeric', 'min:0'],
            'price_double' => ['nullable', 'numeric', 'min:0'],
            'duration' => ['nullable', 'string', 'max:100'],
            'departure_date' => ['nullable', 'date'],
            'description' => ['nullable', 'string'],
            'features' => ['nullable', 'string'],
            'stock' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'in:active,inactive'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'guide_phone' => ['nullable', 'string', 'max:20'],
        ]);

        $data = $request->except(['image']);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        // Convert features from newline-separated to array
        if ($request->filled('features')) {
            $data['features'] = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $request->features))));
        } else {
            $data['features'] = [];
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Paket umroh berhasil diperbarui!');
    }

    /**
     * Show rundown editor for a specific product.
     */
    public function editRundown(Product $product)
    {
        return view('admin.edit-rundown', compact('product'));
    }

    /**
     * Update the rundown for a specific product.
     */
    public function updateRundown(Request $request, Product $product)
    {
        $request->validate([
            'rundown' => ['required', 'array', 'min:1'],
            'rundown.*.day' => ['required', 'string', 'max:100'],
            'rundown.*.activities' => ['required', 'string'],
        ]);

        $rundown = collect($request->rundown)->map(function ($item) {
            return [
                'day' => $item['day'],
                'activities' => $item['activities'],
            ];
        })->toArray();

        $product->update(['rundown' => $rundown]);

        return response()->json([
            'success' => true,
            'message' => 'Rundown kegiatan berhasil diperbarui!',
        ]);
    }

    /**
     * Show rundown for a specific product.
     */
    public function showRundown(Product $product)
    {
        return view('rundown.show', compact('product'));
    }

    /**
     * Remove the specified product.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Paket umroh berhasil dihapus!');
    }
}
