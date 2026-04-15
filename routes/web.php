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
use App\Models\Slideshow;
use App\Models\Guide;

// ========================================
// PUBLIC ROUTES
// ========================================
Route::get('/', function () {
    $testimonials = Testimonial::with('product')->where('status', 'published')->latest()->take(6)->get();
    $products = Product::where('status', 'active')->get();
    $slideshows = Slideshow::where('is_active', true)->orderBy('order')->get();
    $whatsapp = Setting::where('key', 'whatsapp_number')->first()->value ?? '6281234567890';
    return view('welcome', compact('testimonials', 'products', 'slideshows', 'whatsapp'));
})->name('home');

Route::view('/galeri-video', 'gallery')->name('gallery');

Route::get('/panduan-tasuh', function () {
    $whatsapp = Setting::where('key', 'whatsapp_number')->first()->value ?? '6281234567890';
    $panduan = Guide::where('is_active', true)->get()->groupBy('category');
    return view('panduan-tasuh', compact('whatsapp', 'panduan'));
})->name('panduan-tasuh');

Route::get('/panduan-tasuh/{category}/{guide}', function ($category, $guide) {
    $guideData = Guide::where('category', $category)
        ->where('slug', $guide)
        ->where('is_active', true)
        ->firstOrFail();
    
    $whatsapp = Setting::where('key', 'whatsapp_number')->first()->value ?? '6281234567890';
    
    return view('panduan-tasuh-detail', compact('category', 'guide', 'guideData', 'whatsapp'));
})->where('category', 'umrah|haji')
  ->where('guide', 'dokumen|checklist|tata-cara|faq|doa|tips')
  ->name('panduan-tasuh.detail');

Route::post('/testimoni-public', [TestimonialController::class, 'publicStore'])->name('testimonials.public');
Route::get('/testimoni-public', fn() => redirect()->route('home'));

Route::post('/contact-send', [ContactController::class, 'send'])->name('contact.send');
Route::get('/contact-send', fn() => redirect()->route('home'));

Route::post('/paket-daftar', [BookingController::class, 'publicStore'])->name('bookings.public');
Route::get('/booking/{product}', [BookingController::class, 'showBookingPage'])->name('booking.page');
Route::get('/products/{product}/rundown', [ProductController::class, 'showRundown'])->name('products.rundown');
Route::get('/invoice/{groupCode}', [BookingController::class, 'showInvoice'])->name('booking.invoice');
Route::get('/invoice/{groupCode}/pdf', [BookingController::class, 'downloadInvoicePDF'])->name('booking.invoice.pdf');
Route::post('/invoice/{groupCode}/payment-method', [BookingController::class, 'updatePaymentMethod'])->name('booking.payment_method');
Route::get('/invoice/{groupCode}/status', [BookingController::class, 'checkPaymentStatus'])->name('booking.invoice.status');
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
use App\Http\Controllers\SlideshowController;

// ========================================
// AUTH ROUTES (Auth Required)
// ========================================
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

    // Member Bookings
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('member.bookings');

    // Specific Admin Section
    Route::middleware('admin')->group(function () {
        // Data Master
        Route::resource('users', UserController::class)->except(['show', 'create', 'edit']);
        Route::resource('products', ProductController::class)->except(['show', 'create', 'edit']);
        Route::get('products/{product}/rundown/edit', [ProductController::class, 'editRundown'])->name('products.edit-rundown');
        Route::post('products/{product}/rundown/update', [ProductController::class, 'updateRundown'])->name('products.update-rundown');

        // Transactions / Jamaah
        Route::resource('bookings', BookingController::class)->except(['create', 'edit']);
        Route::resource('payments', PaymentController::class)->except(['create', 'edit']);
        Route::resource('documents', DocumentController::class)->except(['create', 'edit']);

        // Content Management
        Route::resource('testimonials', TestimonialController::class)->except(['create', 'edit']);
        Route::post('testimonials/{testimonial}/reply', [TestimonialController::class, 'replyEmail'])->name('testimonials.reply');
        Route::resource('guides', GuideController::class)->except(['create', 'edit']);
        Route::get('guides-admin', [GuideController::class, 'adminIndex'])->name('guides.admin-index');
        Route::get('guides-admin/create', [GuideController::class, 'create'])->name('guides.create');
        Route::post('guides-admin', [GuideController::class, 'store'])->name('guides.store');
        Route::get('guides-admin/{guide}/edit', [GuideController::class, 'edit'])->name('guides.edit');
        Route::put('guides-admin/{guide}', [GuideController::class, 'update'])->name('guides.update');
        Route::delete('guides-admin/{guide}', [GuideController::class, 'destroy'])->name('guides.destroy');
        Route::post('guides-admin/{guide}/toggle-active', [GuideController::class, 'toggleActive'])->name('guides.toggle-active');
        Route::resource('faqs', FaqController::class)->except(['create', 'edit']);
        Route::resource('slideshow', SlideshowController::class)->except(['show']);
        Route::post('slideshow/{slideshow}/toggle-active', [SlideshowController::class, 'toggleActive'])->name('slideshow.toggle-active');
        Route::post('slideshow/update-order', [SlideshowController::class, 'updateOrder'])->name('slideshow.update-order');

        // Systems
        Route::resource('settings', SettingController::class)->except(['create', 'edit', 'show']);
    });
});
