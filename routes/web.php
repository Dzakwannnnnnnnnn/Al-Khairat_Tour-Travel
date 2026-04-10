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
use App\Http\Controllers\ContactController;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Product;

// ========================================
// PUBLIC ROUTES
// ========================================
Route::get('/', function () {
    $testimonials = Testimonial::with('product')->where('status', 'published')->latest()->take(6)->get();
    $products = Product::where('status', 'active')->get();
    $whatsapp = Setting::where('key', 'whatsapp_number')->first()->value ?? '6281234567890';
    return view('welcome', compact('testimonials', 'products', 'whatsapp'));
})->name('home');

Route::view('/galeri-video', 'gallery')->name('gallery');

Route::post('/testimoni-public', [TestimonialController::class, 'publicStore'])->name('testimonials.public');
Route::get('/testimoni-public', fn() => redirect()->route('home'));

Route::post('/contact-send', [ContactController::class, 'send'])->name('contact.send');
Route::get('/contact-send', fn() => redirect()->route('home'));

Route::post('/paket-daftar', [BookingController::class, 'publicStore'])->name('bookings.public');
Route::get('/booking/{product}', [BookingController::class, 'showBookingPage'])->name('booking.page');
Route::get('/invoice/{groupCode}', [BookingController::class, 'showInvoice'])->name('booking.invoice');
Route::get('/invoice/{groupCode}/pdf', [BookingController::class, 'downloadInvoicePDF'])->name('booking.invoice.pdf');
Route::post('/invoice/{groupCode}/payment-method', [BookingController::class, 'updatePaymentMethod'])->name('booking.payment_method');
Route::get('/paket-daftar', fn() => redirect()->route('home'));

// ========================================
// AUTH ROUTES (Guest Only)
// ========================================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\ProfileController;

// ========================================
// AUTH ROUTES (Auth Required)
// ========================================
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Specific Admin Section
    Route::middleware('admin')->group(function () {
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
});
