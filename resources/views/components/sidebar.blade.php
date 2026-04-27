<!-- Premium Sidebar -->
<aside id="adminSidebar" class="w-72 lg:w-80 bg-white dark:bg-slate-900 fixed inset-y-0 left-0 overflow-hidden z-[100] transition-all duration-500 -translate-x-full md:translate-x-0 border-r border-slate-200 dark:border-slate-800 flex flex-col shadow-2xl">
    
    <!-- Branding Section (Fixed Height) -->
    <div class="px-6 py-5 border-b border-slate-50 dark:border-slate-800 relative flex-none">
        <!-- Close Button (Mobile Only) -->
        <button onclick="toggleSidebar()" class="md:hidden absolute top-4 right-4 p-2 rounded-xl bg-slate-50 text-slate-400 hover:text-orange transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group cursor-pointer">
            <div class="w-10 h-10 rounded-2xl bg-orange/10 border border-orange/20 flex items-center justify-center transition-all duration-500 group-hover:scale-110 flex-shrink-0">
                <img src="{{ asset('images/logo.jpg') }}" class="w-7 h-7 object-contain rounded-lg" alt="Logo">
            </div>
            <div class="truncate">
                <h1 class="font-serif font-bold text-lg tracking-tight text-charcoal dark:text-slate-100 truncate">Al-Khairat</h1>
                <p class="text-[9px] uppercase tracking-widest text-orange/60 font-black leading-none mt-1">Portal Reservasi</p>
            </div>
        </a>
    </div>

    <!-- Navigation Scroll Area (Flexible) -->
    <nav class="flex-1 overflow-y-auto dashboard-scroll px-3 py-6 space-y-6">
        
        <!-- Admin Main Navigation -->
        @if(auth()->user()->isAdmin())
        <div>
            <p class="px-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">Utama</p>
            <div class="space-y-1">
                <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="font-medium text-sm">Dashboard</span>
                </a>
                <a href="{{ route('home') }}" class="sidebar-link group">
                    <svg class="w-5 h-5 text-orange flex-none group-hover:-translate-y-0.5 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    <span class="font-medium text-sm">Kunjungi Website</span>
                </a>
            </div>
        </div>

        <!-- Master Data -->
        <div>
            <p class="px-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">Data Master</p>
            <div class="space-y-1">
                <a href="{{ route('users.index') }}" class="sidebar-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 text-orange flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <span class="font-medium text-sm">Manajemen User</span>
                </a>
                <a href="{{ route('products.index') }}" class="sidebar-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 text-orange flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    <span class="font-medium text-sm">Paket Umroh</span>
                </a>
            </div>
        </div>

        <!-- Transactions -->
        <div>
            <p class="px-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">Transaksi</p>
            <div class="space-y-1">
                <a href="{{ route('bookings.index') }}" class="sidebar-link {{ request()->routeIs('bookings.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 text-emerald-500 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    <span class="font-medium text-sm">Pesanan Baru</span>
                </a>
                <a href="{{ route('admin.savings.index') }}" class="sidebar-link {{ request()->routeIs('admin.savings.index') ? 'active' : '' }}">
                    <svg class="w-5 h-5 text-emerald-500 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m.599-1c.51-.598.599-1.454.599-2.401 0-1.045-.09-1.903-.599-2.401M11.401 9c-.51.598-.599 1.454-.599 2.401 0 1.11.402 2.08 1 2.599" /></svg>
                    <span class="font-medium text-sm">Monitor Tabungan</span>
                </a>
                <a href="{{ route('admin.savings.trash') }}" class="sidebar-link {{ request()->routeIs('admin.savings.trash') ? 'active' : '' }}">
                    <svg class="w-5 h-5 text-red-500 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    <span class="font-medium text-sm">Trash / Sampah</span>
                </a>
                <a href="{{ route('payments.index') }}" class="sidebar-link {{ request()->routeIs('payments.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 text-emerald-500 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-medium text-sm">Riwayat Pembayaran</span>
                </a>
            </div>
        </div>

        <!-- Website Content -->
        <div>
            <p class="px-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">Konten Global</p>
            <div class="space-y-1">
                <a href="{{ route('slideshow.index') }}" class="sidebar-link {{ request()->routeIs('slideshow.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 text-gold flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span class="font-medium text-sm">Kelola Slideshow</span>
                </a>
                <a href="{{ route('guides.admin-index') }}" class="sidebar-link {{ request()->routeIs('guides.admin*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 text-gold flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    <span class="font-medium text-sm">Kelola Panduan</span>
                </a>
                <a href="{{ route('testimonials.index') }}" class="sidebar-link {{ request()->routeIs('testimonials.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 text-gold flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                    <span class="font-medium text-sm">Kelola Testimoni</span>
                </a>
                <a href="{{ route('faqs.index') }}" class="sidebar-link {{ request()->routeIs('faqs.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 text-gold flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-medium text-sm">Kelola FAQ</span>
                </a>
                <a href="{{ route('documents.index') }}" class="sidebar-link {{ request()->routeIs('documents.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 text-gold flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <span class="font-medium text-sm">Dokumen Jamaah</span>
                </a>
            </div>
        </div>

        @else
        <!-- Regular User Navigation -->
        <div>
            <p class="px-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Menu Utama</p>
            <div class="space-y-1.5">
                <a href="{{ route('home') }}" class="sidebar-link">
                    <svg class="w-5 h-5 text-orange flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span class="font-medium">Halaman Depan</span>
                </a>
                <a href="{{ route('profile.edit') }}" class="sidebar-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 text-orange flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span class="font-medium">Data Profil</span>
                </a>
                <a href="{{ route('member.bookings') }}" class="sidebar-link {{ request()->routeIs('member.bookings') ? 'active' : '' }}">
                    <svg class="w-5 h-5 text-emerald-500 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    <span class="font-medium">Riwayat Pesanan</span>
                </a>
                <a href="{{ route('member.savings') }}" class="sidebar-link {{ request()->routeIs('member.savings') ? 'active' : '' }}">
                    <svg class="w-5 h-5 text-emerald-500 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m.599-1c.51-.598.599-1.454.599-2.401 0-1.045-.09-1.903-.599-2.401M11.401 9c-.51.598-.599 1.454-.599 2.401 0 1.11.402 2.08 1 2.599" /></svg>
                    <span class="font-medium">Tabungan Saya</span>
                </a>
            </div>
        </div>
        @endif
    </nav>

    <!-- Footer Action (Pinned at the very bottom, full width of sidebar) -->
    <div class="px-5 py-6 border-t border-slate-100 dark:border-slate-800 space-y-3 bg-white dark:bg-slate-900 flex-none">
        <form method="POST" action="{{ route('logout') }}" class="m-0">
            @csrf
            <button type="submit" class="w-full flex items-center gap-4 px-5 py-4 rounded-2xl bg-red-50 text-red-600 hover:bg-red-100 transition-all group">
                <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                </div>
                <span class="text-xs font-black uppercase tracking-[0.2em]">Logout Akun</span>
            </button>
        </form>
    </div>
</aside>


