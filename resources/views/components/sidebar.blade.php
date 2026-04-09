<!-- Premium Sidebar -->
<aside id="adminSidebar" class="w-72 lg:w-80 bg-white h-screen fixed left-0 top-0 overflow-hidden z-40 transition-all duration-500 -translate-x-full md:translate-x-0 border-r border-slate-200 flex flex-col shadow-xl">
    
    <!-- Branding Section -->
    <div class="p-8 pb-4">
        <div class="flex items-center gap-4 group cursor-pointer">
            <div class="w-12 h-12 rounded-2xl bg-orange/10 border border-orange/20 flex items-center justify-center transition-all duration-500 group-hover:scale-110 group-hover:bg-orange/20">
                <img src="{{ asset('images/logo.jpg') }}" class="w-8 h-8 object-contain rounded-lg" alt="Logo">
            </div>
            <div>
                <h1 class="font-serif font-bold text-xl tracking-tight text-charcoal group-hover:text-orange transition-colors">Al-Khairat</h1>
                <p class="text-[10px] uppercase tracking-[0.2em] text-orange/60 font-bold">Admin Portal</p>
            </div>
        </div>
    </div>


    <!-- Navigation Scroll Area -->
    <nav class="flex-1 overflow-y-auto dashboard-scroll px-4 py-8 space-y-8">
        
        <!-- Main Navigation -->
        <div>
            <p class="px-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Utama</p>
            <div class="space-y-1">
                <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>
            </div>
        </div>

        <!-- Master Data -->
        <div>
            <p class="px-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Data Master</p>
            <div class="space-y-1">
                <a href="{{ route('users.index') }}" class="sidebar-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 text-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <span class="font-medium">Manajemen User</span>
                </a>
                <a href="{{ route('products.index') }}" class="sidebar-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 text-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    <span class="font-medium">Paket Umroh</span>
                </a>
            </div>
        </div>

        <!-- Transactions -->
        <div>
            <p class="px-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Transaksi</p>
            <div class="space-y-1">
                <a href="{{ route('bookings.index') }}" class="sidebar-link {{ request()->routeIs('bookings.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    <span class="font-medium">Pesanan Baru</span>
                </a>
                <a href="{{ route('payments.index') }}" class="sidebar-link {{ request()->routeIs('payments.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    <span class="font-medium">Verifikasi Bayar</span>
                </a>
            </div>
        </div>

        <!-- Website Content -->
        <div>
            <p class="px-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Konten Global</p>
            <div class="space-y-1">
                <a href="{{ route('testimonials.index') }}" class="sidebar-link {{ request()->routeIs('testimonials.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                    <span class="font-medium">Manajemen Testimoni</span>
                </a>
                <a href="{{ route('guides.index') }}" class="sidebar-link {{ request()->routeIs('guides.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    <span class="font-medium">E-Manasik</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Footer Action -->
    <div class="p-6 border-t border-slate-100 space-y-4 bg-slate-50/50">
        <a href="{{ route('home') }}" target="_blank" class="sidebar-link rounded-2xl group/home hover:bg-orange/5">
            <svg class="w-5 h-5 transition-transform group-hover/home:-translate-y-1 text-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
            <span class="text-sm font-bold text-charcoal">Lihat Website Utama</span>
        </a>
        
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center gap-4 px-6 py-4 rounded-2xl text-red-500 hover:bg-red-50 transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                <span class="text-sm font-black uppercase tracking-widest">Logout</span>
            </button>
        </form>
    </div>
</aside>


<script>
    function closeSidebarMobile() {
        if (window.innerWidth < 768) {
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.add('-translate-x-full');
            if (overlay) overlay.classList.add('hidden');
        }
    }
</script>

<script>
    function closeSidebarMobile() {
        if (window.innerWidth < 768) {
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.add('-translate-x-full');
            if (overlay) overlay.classList.add('hidden');
        }
    }
</script>
