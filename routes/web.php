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
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SavingsController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\GalleryController;
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
    $whatsapp = Setting::where('key', 'whatsapp_number')->first()->value ?? '6281253088788';

    // Rating statistics
    $allPublished = Testimonial::where('status', 'published');
    $totalReviews = $allPublished->count();
    $avgRating = $totalReviews > 0 ? round($allPublished->avg('rating'), 1) : 0;
    $ratingBreakdown = [];
    for ($i = 5; $i >= 1; $i--) {
        $ratingBreakdown[$i] = Testimonial::where('status', 'published')->where('rating', $i)->count();
    }

    return view('welcome', compact('testimonials', 'products', 'slideshows', 'whatsapp', 'totalReviews', 'avgRating', 'ratingBreakdown'));
})->name('home');

Route::get('/galeri', [GalleryController::class, 'publicIndex'])->name('gallery');

Route::get('/panduan-tasuh', function () {
    $whatsapp = Setting::where('key', 'whatsapp_number')->first()->value ?? '6281253088788';
    $panduan = Guide::where('is_active', true)->get()->groupBy('category');
    return view('panduan-tasuh', compact('whatsapp', 'panduan'));
})->name('panduan-tasuh');

Route::get('/panduan-tasuh/{category}/{guide}', function ($category, $guide) {
    $guideData = Guide::where('category', $category)
        ->where('slug', $guide)
        ->where('is_active', true)
        ->firstOrFail();
    
    $whatsapp = Setting::where('key', 'whatsapp_number')->first()->value ?? '6281253088788';
    
    return view('panduan-tasuh-detail', compact('category', 'guide', 'guideData', 'whatsapp'));
})->where('category', 'umrah|haji')
  ->where('guide', 'dokumen|checklist|tata-cara|faq|doa|tips')
  ->name('panduan-tasuh.detail');

Route::post('/testimoni-public', [TestimonialController::class, 'publicStore'])->middleware('auth')->name('testimonials.public');
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

// Google Auth (temporarily disabled)
// Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
// Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');

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

    // Member Savings
    Route::get('/my-savings', [SavingsController::class, 'mySavings'])->name('member.savings');
    Route::post('/my-savings', [SavingsController::class, 'storePlan'])->name('member.savings.store');

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

        // Gallery Management
        Route::resource('gallery', GalleryController::class)->except(['show', 'create', 'edit']);
        Route::post('gallery/{gallery}/toggle-active', [GalleryController::class, 'toggleActive'])->name('gallery.toggle-active');
        Route::post('gallery/update-order', [GalleryController::class, 'updateOrder'])->name('gallery.update-order');

        // Systems
        // Route::resource('settings', SettingController::class)->except(['create', 'edit', 'show']);

        // Savings Management
        Route::get('admin/savings', [SavingsController::class, 'adminIndex'])->name('admin.savings.index');
        Route::get('admin/savings/trash', [SavingsController::class, 'adminTrash'])->name('admin.savings.trash');
        Route::post('admin/savings/trash/empty', [SavingsController::class, 'emptyTrash'])->name('admin.savings.empty_trash');
        Route::post('admin/savings/deposit', [SavingsController::class, 'adminDeposit'])->name('admin.savings.deposit');
        Route::delete('admin/savings/{id}', [SavingsController::class, 'destroyPlan'])->name('admin.savings.destroy');
        Route::post('admin/savings/{id}/approve-refund', [SavingsController::class, 'approveRefund'])->name('admin.savings.approve_refund');
        Route::post('admin/savings/{id}/cancel', [SavingsController::class, 'adminProcessCancellation'])->name('admin.savings.process_cancellation');
    });

    // Member Refund Request
    Route::post('/my-savings/{id}/request-refund', [SavingsController::class, 'requestRefund'])->name('member.savings.request_refund');
});
