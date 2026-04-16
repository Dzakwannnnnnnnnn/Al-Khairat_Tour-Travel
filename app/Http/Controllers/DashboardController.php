<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with real data.
     */
    public function index()
    {
        // Redirect non-admins to their profile
        if (!auth()->user()->isAdmin()) {
            return redirect()->route('profile.edit');
        }

        $totalUsers = User::count();
        $totalProducts = Product::count();
        $activeProducts = Product::where('status', 'active')->count();
        $totalRevenue = Product::where('status', 'active')->sum('price');
        $totalTestimonials = Testimonial::count();

        // Recent users
        $recentUsers = User::latest()->take(5)->get();

        // Recent products
        $recentProducts = Product::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalUsers',
            'totalProducts',
            'activeProducts',
            'totalRevenue',
            'totalTestimonials',
            'recentUsers',
            'recentProducts'
        ));
    }
}
