<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with real data.
     */
    public function index()
    {
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $activeProducts = Product::where('status', 'active')->count();
        $totalRevenue = Product::where('status', 'active')->sum('price');

        // Recent users
        $recentUsers = User::latest()->take(5)->get();

        // Recent products
        $recentProducts = Product::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalUsers',
            'totalProducts',
            'activeProducts',
            'totalRevenue',
            'recentUsers',
            'recentProducts'
        ));
    }
}
