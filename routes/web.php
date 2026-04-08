<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\SettingController;

use App\Models\Testimonial;
use App\Models\Product;

// ========================================
// PUBLIC ROUTES
// ========================================
Route::get('/', function () {
    $testimonials = Testimonial::with('product')->where('status', 'published')->latest()->take(6)->get();
    $products = Product::all();
    return view('welcome', compact('testimonials', 'products'));
})->name('home');

Route::view('/galeri-video', 'gallery')->name('gallery');

Route::post('/testimoni-public', [TestimonialController::class, 'publicStore'])->name('testimonials.public');

// ========================================
// AUTH ROUTES (Guest Only)
// ========================================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ========================================
// ADMIN ROUTES (Auth Required)
// ========================================
Route::middleware('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Data Master
    Route::resource('users', UserController::class)->except(['show', 'create', 'edit']);
    Route::resource('products', ProductController::class)->except(['show', 'create', 'edit']);

    // Transactions / Jamaah
    Route::resource('bookings', BookingController::class)->except(['create', 'edit']);
    Route::resource('payments', PaymentController::class)->except(['create', 'edit']);
    Route::resource('documents', DocumentController::class)->except(['create', 'edit']);

    // Content Management
    Route::resource('testimonials', TestimonialController::class)->except(['create', 'edit']);
    Route::resource('guides', GuideController::class)->except(['create', 'edit']);
    Route::resource('faqs', FaqController::class)->except(['create', 'edit']);

    // Systems
    Route::resource('settings', SettingController::class)->except(['create', 'edit', 'show']);
});
