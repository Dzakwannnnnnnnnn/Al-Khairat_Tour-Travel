<!-- Floating Navigation Dock (Desktop Only) -->
<div class="dock-container hidden lg:flex">
    <div class="dock-wrapper">
        <!-- Beranda -->
        <a href="{{ route('home') }}" class="dock-item group" data-section="hero-slideshow">
            <span class="dock-label">Home</span>
            <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </a>

        <!-- Tentang Kami -->
        <a href="{{ route('home') }}#about" class="dock-item group" data-section="about">
            <span class="dock-label">Tentang Kami</span>
            <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </a>

        <!-- Keunggulan / Layanan -->
        <a href="{{ route('home') }}#keunggulan" class="dock-item group" data-section="keunggulan">
            <span class="dock-label">Layanan</span>
            <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-7.714 2.143L11 21l-2.286-6.857L1 12l7.714-2.143L11 3z"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </a>

        <!-- Paket -->
        <a href="{{ route('home') }}#paket" class="dock-item group" data-section="paket">
            <span class="dock-label">Paket</span>
            <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </a>

        <!-- Testimoni / Ulasan -->
        <a href="{{ route('home') }}#testimoni" class="dock-item group" data-section="testimoni">
            <span class="dock-label">Ulasan</span>
            <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </a>

        <!-- Galeri / Video -->
        <a href="{{ route('gallery') }}" class="dock-item group" data-section="gallery">
            <span class="dock-label">Video</span>
            <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </a>

        <!-- Panduan -->
        <a href="{{ route('panduan-tasuh') }}" class="dock-item group" data-section="digital-guidance">
            <span class="dock-label">Panduan</span>
            <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </a>

        <!-- Kontak -->
        <a href="{{ route('home') }}#contact" class="dock-item group" data-section="contact">
            <span class="dock-label">Kontak</span>
            <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </a>

        <!-- Divider -->
        <div class="dock-divider"></div>

        <!-- Theme Toggle -->
        <button onclick="toggleTheme()" class="dock-item group" id="theme-toggle">
            <span class="dock-label" id="theme-label">Malam</span>
            <svg id="moon-icon" class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
            </svg>
            <svg id="sun-icon" class="dock-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </button>

        <!-- Voice Search -->
        <button onclick="openVoiceSearch()" class="dock-item group" id="voice-search-trigger">
            <span class="dock-label">Suara</span>
            <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </button>

        <!-- Manual Search -->
        <button onclick="toggleSearch()" class="dock-item group" id="search-trigger">
            <span class="dock-label">Cari</span>
            <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </button>

        @auth
        <a href="{{ auth()->user()->isAdmin() ? route('dashboard') : route('profile.edit') }}" class="dock-item group active">
            <span class="dock-label">{{ auth()->user()->nickname ?? 'Profil' }}</span>
            <img src="{{ auth()->user()->avatar_url }}" 
                 alt="Avatar" 
                 class="dock-icon w-6 h-6 rounded-full border border-orange/20 object-cover">
            <div class="dock-active-dot"></div>
        </a>
        @else
        <a href="{{ route('login') }}" class="dock-item group">
            <span class="dock-label">Masuk/Login</span>
            <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </a>
        @endauth
    </div>
</div>

<!-- Mobile Side Drawer (Handphone Only - STRICTLY HIDDEN ON DESKTOP) -->
<div id="mobile-menu-overlay" class="fixed inset-0 z-[999] bg-bg/60 backdrop-blur-md opacity-0 invisible transition-all duration-500 md:hidden" onclick="window.toggleMobileMenu()"></div>

<div id="mobile-side-drawer" class="fixed top-0 right-0 h-full w-[85%] max-w-sm z-[1000] bg-surface/90 backdrop-blur-2xl border-l border-white/10 translate-x-full transition-all duration-500 md:hidden flex flex-col">
    <!-- Drawer Header -->
    <div class="p-8 border-b border-white/10 flex items-center justify-between">
        <h2 class="text-2xl font-serif font-bold text-text">Menu</h2>
        <button onclick="window.toggleMobileMenu()" class="text-text/50 hover:text-orange transition-colors">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <!-- Drawer Content (Scrollable Grid) -->
    <div class="flex-1 overflow-y-auto p-6">
        <div class="grid grid-cols-2 gap-4">
            <!-- Navigation Links -->
            <a href="{{ route('home') }}" class="mobile-menu-item group" onclick="window.toggleMobileMenu()">
                <div class="menu-icon-box"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg></div>
                <span class="text-sm font-bold">Beranda</span>
            </a>

            <a href="{{ route('home') }}#paket" class="mobile-menu-item group" onclick="window.toggleMobileMenu()">
                <div class="menu-icon-box"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg></div>
                <span class="text-sm font-bold">Paket</span>
            </a>

            <a href="{{ route('panduan-tasuh') }}" class="mobile-menu-item group" onclick="window.toggleMobileMenu()">
                <div class="menu-icon-box"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg></div>
                <span class="text-sm font-bold">Panduan</span>
            </a>

            <a href="{{ route('gallery') }}" class="mobile-menu-item group" onclick="window.toggleMobileMenu()">
                <div class="menu-icon-box"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path></svg></div>
                <span class="text-sm font-bold">Video</span>
            </a>

            <a href="{{ route('home') }}#about" class="mobile-menu-item group" onclick="window.toggleMobileMenu()">
                <div class="menu-icon-box"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                <span class="text-sm font-bold">Tentang Kami</span>
            </a>

            <a href="{{ route('home') }}#testimoni" class="mobile-menu-item group" onclick="window.toggleMobileMenu()">
                <div class="menu-icon-box"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg></div>
                <span class="text-sm font-bold">Ulasan</span>
            </a>

            <a href="{{ route('home') }}#contact" class="mobile-menu-item group" onclick="window.toggleMobileMenu()">
                <div class="menu-icon-box"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg></div>
                <span class="text-sm font-bold">Kontak</span>
            </a>

            <!-- User Profile (Mobile Link) -->
            @auth
            <a href="{{ auth()->user()->isAdmin() ? route('dashboard') : route('profile.edit') }}" class="mobile-menu-item group" onclick="window.toggleMobileMenu()">
                <div class="menu-icon-box">
                    <img src="{{ auth()->user()->avatar_url }}" class="w-7 h-7 rounded-full object-cover">
                </div>
                <span class="text-sm font-bold">{{ auth()->user()->nickname ?? 'Profil' }}</span>
            </a>
            @else
            <a href="{{ route('login') }}" class="mobile-menu-item group" onclick="window.toggleMobileMenu()">
                <div class="menu-icon-box"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg></div>
                <span class="text-sm font-bold">Masuk</span>
            </a>
            @endauth
        </div>

        <div class="mt-8 pt-8 border-t border-white/10 grid grid-cols-3 gap-4">
            <!-- Tools Mini Grid -->
            <button onclick="window.toggleTheme()" class="mobile-tool-btn group">
                <div class="tool-icon-box">
                    <svg class="w-6 h-6 theme-icon-moon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                </div>
                <span class="text-[10px] font-bold uppercase tracking-widest mt-2">Tema</span>
            </button>

            <button onclick="window.openVoiceSearch(); window.toggleMobileMenu();" class="mobile-tool-btn group">
                <div class="tool-icon-box"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path></svg></div>
                <span class="text-[10px] font-bold uppercase tracking-widest mt-2">Suara</span>
            </button>

            <button onclick="window.toggleSearch(); window.toggleMobileMenu();" class="mobile-tool-btn group">
                <div class="tool-icon-box"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></div>
                <span class="text-[10px] font-bold uppercase tracking-widest mt-2">Cari</span>
            </button>
        </div>
    </div>

    <!-- Drawer Footer -->
    <div class="p-8 border-t border-white/10 bg-black/5 flex items-center justify-center">
        <p class="text-[10px] text-text/30 tracking-[0.3em] uppercase">Al-Khairat Tour & Travel</p>
    </div>
</div>

<!-- Consolidated Search Overlay -->
<div id="search-overlay" class="fixed inset-0 z-[4000] bg-bg/95 backdrop-blur-2xl opacity-0 invisible pointer-events-none transition-all duration-500 flex flex-col items-center justify-start pt-20 md:pt-32 px-4">
    <button onclick="window.toggleSearch()" class="absolute top-6 right-6 md:top-8 md:right-8 text-text/50 hover:text-orange transition-all p-2 rounded-full hover:bg-orange/10">
        <svg class="w-8 h-8 md:w-10 md:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
    </button>

    <div class="w-full max-w-3xl space-y-6 md:space-y-8 animate-fade-in">
        <div class="text-center space-y-2">
            <h2 class="text-2xl md:text-5xl font-serif font-bold text-text">Apa yang Anda <span class="text-gradient-sunset">Cari?</span></h2>
            <p class="text-xs md:text-base text-text/60">Cari paket umroh, artikel, atau informasi lainnya.</p>
        </div>

        <div class="relative group">
            <div class="absolute inset-y-0 left-4 md:left-6 flex items-center pointer-events-none">
                <svg class="w-6 h-6 md:w-8 md:h-8 text-orange/50 group-focus-within:text-orange transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="text" id="search-input" 
                class="w-full bg-surface/50 border-2 border-border focus:border-orange rounded-full md:rounded-[2.5rem] py-4 md:py-6 pl-14 md:pl-20 pr-24 md:pr-32 text-lg md:text-2xl text-text outline-none transition-all shadow-2xl focus:ring-8 focus:ring-orange/5"
                placeholder="Ketik kata kunci...">
            
            <button onclick="window.toggleSearch()" class="absolute right-2 md:right-3 top-1/2 -translate-y-1/2 bg-gradient-sunset text-white h-[85%] md:h-[80%] px-4 md:px-8 rounded-full font-bold shadow-lg hover:shadow-orange/20 hover:scale-105 transition-all flex items-center gap-2">
                <span class="text-sm md:text-base">Cari</span>
                <svg class="w-4 h-4 md:w-5 md:h-5 hidden md:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </button>
        </div>

        <!-- Quick Suggestions -->
        <div class="flex flex-wrap justify-center gap-2 md:gap-3 pt-2 md:pt-4">
            <span class="text-[10px] md:text-sm text-text/40 w-full text-center mb-1">Saran Pencarian:</span>
            <button onclick="window.fillSearch('Umroh Reguler')" class="px-3 md:px-6 py-1.5 md:py-2 rounded-full bg-surface border border-border hover:border-orange hover:text-orange transition-all text-[10px] md:text-sm font-medium shadow-sm">Umroh Reguler</button>
            <button onclick="window.fillSearch('Paket Ramadhan')" class="px-3 md:px-6 py-1.5 md:py-2 rounded-full bg-surface border border-border hover:border-orange hover:text-orange transition-all text-[10px] md:text-sm font-medium shadow-sm">Paket Ramadhan</button>
            <button onclick="window.fillSearch('Haji Plus')" class="px-3 md:px-6 py-1.5 md:py-2 rounded-full bg-surface border border-border hover:border-orange hover:text-orange transition-all text-[10px] md:text-sm font-medium shadow-sm">Haji Plus</button>
        </div>
    </div>
</div>

<!-- Custom Search Alert Popup (Toast) -->
<div id="search-alert" class="fixed top-10 left-1/2 -translate-x-1/2 z-[2000] bg-red-600/90 backdrop-blur-md text-white px-6 md:px-8 py-3 md:py-4 rounded-xl md:rounded-2xl shadow-2xl transition-all duration-500 opacity-0 invisible translate-y-[-20px] flex items-center gap-3">
    <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
    </svg>
    <span id="search-alert-message" class="font-bold text-sm md:text-base tracking-wide">Keyword tidak ditemukan!</span>
</div>

<!-- Voice Search Overlay -->
<div id="voice-overlay" class="fixed inset-0 bg-black/80 backdrop-blur-xl z-[9999] flex flex-col items-center justify-center opacity-0 invisible pointer-events-none transition-all duration-500">
    <button onclick="closeVoiceSearch()" class="absolute top-8 right-8 text-white/50 hover:text-white transition-colors">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>
    
    <div class="relative flex flex-col items-center">
        <div id="voice-mic-container" class="w-32 h-32 md:w-48 md:h-48 bg-indigo-600 rounded-full flex items-center justify-center text-white shadow-[0_0_50px_rgba(79,70,229,0.5)] transition-all duration-500">
            <svg class="w-16 h-16 md:w-24 md:h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
            </svg>
        </div>
        
        <div id="voice-pulse-1" class="absolute inset-0 bg-indigo-500 rounded-full -z-10 animate-ping opacity-0"></div>
        <div id="voice-pulse-2" class="absolute inset-0 bg-indigo-500 rounded-full -z-10 animate-ping delay-700 opacity-0"></div>
        
        <h2 id="voice-status" class="mt-12 text-2xl md:text-3xl font-bold text-white tracking-wide text-center px-4">Ada yang bisa kami bantu?</h2>
        <p class="mt-4 text-white/60 text-sm md:text-base tracking-[0.2em] uppercase font-light">Kami Mendengarkan...</p>
    </div>
</div>

@push('scripts')
<script>
    // Scroll to Hide/Show Dock
    let lastScrollY = window.scrollY;
    const dockContainer = document.querySelector('.dock-container');
    const scrollThreshold = 10; // Minimum scroll before hiding

    window.addEventListener('scroll', () => {
        const currentScrollY = window.scrollY;
        
        // Don't hide if we are at the very top
        if (currentScrollY < 50) {
            dockContainer.classList.remove('dock-hidden');
            return;
        }

        if (Math.abs(currentScrollY - lastScrollY) > scrollThreshold) {
            if (currentScrollY > lastScrollY) {
                // Scrolling down - hide
                dockContainer.classList.add('dock-hidden');
            } else {
                // Scrolling up - show
                dockContainer.classList.remove('dock-hidden');
            }
            lastScrollY = currentScrollY;
        }
    }, { passive: true });

    // Mobile Menu Toggle
    window.toggleMobileMenu = function() {
        const drawer = document.getElementById('mobile-side-drawer');
        const overlay = document.getElementById('mobile-menu-overlay');
        const menuIconClosed = document.getElementById('menu-icon-closed');
        const menuIconOpened = document.getElementById('menu-icon-opened');
        const isOpening = drawer.classList.contains('translate-x-full');

        if (isOpening) {
            drawer.classList.remove('translate-x-full');
            overlay.classList.remove('invisible', 'opacity-0');
            overlay.classList.add('visible', 'opacity-100');
            menuIconClosed.classList.replace('opacity-100', 'opacity-0');
            menuIconClosed.classList.replace('scale-100', 'scale-50');
            menuIconOpened.classList.replace('opacity-0', 'opacity-100');
            menuIconOpened.classList.replace('scale-50', 'scale-100');
            document.body.style.overflow = 'hidden';
        } else {
            drawer.classList.add('translate-x-full');
            overlay.classList.remove('visible', 'opacity-100');
            overlay.classList.add('invisible', 'opacity-0');
            menuIconClosed.classList.replace('opacity-0', 'opacity-100');
            menuIconClosed.classList.replace('scale-50', 'scale-100');
            menuIconOpened.classList.replace('opacity-100', 'opacity-0');
            menuIconOpened.classList.replace('scale-100', 'scale-50');
            document.body.style.overflow = '';
        }
    }
    // Auto-center active item on load
    function centerActiveItem() {
        const activeItem = document.querySelector('.dock-item.active');
        const wrapper = document.querySelector('.dock-wrapper');
        
        if (activeItem && wrapper) {
            const wrapperWidth = wrapper.offsetWidth;
            const itemOffset = activeItem.offsetLeft;
            const itemWidth = activeItem.offsetWidth;
            
            // Calculate center position
            const scrollPos = itemOffset - (wrapperWidth / 2) + (itemWidth / 2);
            wrapper.scrollLeft = scrollPos;
        }
    }

    window.addEventListener('load', centerActiveItem);
    // Also run on DOMContentLoaded just in case
    document.addEventListener('DOMContentLoaded', centerActiveItem);

    // Theme Toggle
    function updateThemeUI(isDark) {
        const themeLabel = document.getElementById('theme-label');
        const moonIcon = document.getElementById('moon-icon');
        const sunIcon = document.getElementById('sun-icon');
        
        if (isDark) {
            themeLabel.textContent = 'Siang';
            moonIcon.classList.add('hidden');
            sunIcon.classList.remove('hidden');
        } else {
            themeLabel.textContent = 'Malam';
            moonIcon.classList.remove('hidden');
            sunIcon.classList.add('hidden');
        }
    }

    function toggleTheme() {
        const isDark = document.documentElement.classList.toggle('dark');
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
        updateThemeUI(isDark);
    }

    document.addEventListener('DOMContentLoaded', () => {
        updateThemeUI(document.documentElement.classList.contains('dark'));
    });

    // Search Functions
    function toggleSearch() {
        const overlay = document.getElementById('search-overlay');
        overlay.classList.toggle('opacity-0');
        overlay.classList.toggle('invisible');
        overlay.classList.toggle('pointer-events-none');
        
        if (!overlay.classList.contains('invisible')) {
            document.getElementById('search-input').focus();
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }
    }

    function fillSearch(text) {
        const input = document.getElementById('search-input');
        input.value = text;
        input.focus();
    }

    // Voice Search
    function openVoiceSearch() {
        const overlay = document.getElementById('voice-overlay');
        overlay.classList.remove('invisible', 'opacity-0', 'pointer-events-none');
        overlay.classList.add('visible', 'opacity-100');
        startSpeechRecognition();
    }

    function closeVoiceSearch() {
        const overlay = document.getElementById('voice-overlay');
        overlay.classList.add('invisible', 'opacity-0', 'pointer-events-none');
        overlay.classList.remove('visible', 'opacity-100');
        if (window.currentRecognition) {
            window.currentRecognition.stop();
        }
    }

    function startSpeechRecognition() {
        if (!('webkitSpeechRecognition' in window || 'SpeechRecognition' in window)) {
            alert("Browser Anda tidak mendukung pencarian suara.");
            return;
        }

        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        const recognition = new SpeechRecognition();
        window.currentRecognition = recognition;

        recognition.lang = 'id-ID';
        recognition.interimResults = false;

        recognition.onstart = () => {
            document.getElementById('voice-mic-container').classList.add('scale-110');
            document.getElementById('voice-pulse-1').classList.remove('opacity-0');
            document.getElementById('voice-pulse-2').classList.remove('opacity-0');
        };

        recognition.onresult = (event) => {
            const transcript = event.results[0][0].transcript.toLowerCase().trim();
            document.getElementById('voice-status').innerText = `"${transcript}"`;
            
            setTimeout(() => {
                const cleanText = transcript.replace(/[.,?]/g, '');

                if (cleanText.includes('paket') || cleanText === 'umroh') {
                    closeVoiceSearch();
                    window.location.hash = 'paket';
                    setTimeout(() => window.location.href = '{{ route("home") }}#paket', 500);
                } else if (cleanText.includes('tentang') || cleanText === 'info') {
                    closeVoiceSearch();
                    setTimeout(() => window.location.href = '{{ route("home") }}#about', 500);
                } else if (cleanText.includes('ulasan') || cleanText === 'testimoni') {
                    closeVoiceSearch();
                    setTimeout(() => window.location.href = '{{ route("home") }}#testimoni', 500);
                } else if (cleanText.includes('panduan') || cleanText.includes('manasik')) {
                    closeVoiceSearch();
                    setTimeout(() => window.location.href = '{{ route("home") }}#digital-guidance', 500);
                } else {
                    document.getElementById('voice-status').innerText = "Perintah tidak dikenali";
                    setTimeout(() => closeVoiceSearch(), 1500);
                }
            }, 800);
        };

        recognition.onerror = (event) => {
            console.error(event.error);
            closeVoiceSearch();
        };

        recognition.onend = () => {
            document.getElementById('voice-mic-container').classList.remove('scale-110');
            document.getElementById('voice-pulse-1').classList.add('opacity-0');
            document.getElementById('voice-pulse-2').classList.add('opacity-0');
        };

        recognition.start();
    }

    // Search Input Events
    const searchInput = document.getElementById('search-input');
    if (searchInput) {
        searchInput.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                const keyword = e.target.value.toLowerCase();
                
                // Navigate based on keyword
                if (keyword.includes('paket') || keyword === 'umroh') {
                    window.location.href = '{{ route("home") }}#paket';
                } else if (keyword.includes('tentang')) {
                    window.location.href = '{{ route("home") }}#about';
                } else if (keyword.includes('ulasan')) {
                    window.location.href = '{{ route("home") }}#testimoni';
                } else if (keyword.includes('panduan')) {
                    window.location.href = '{{ route("home") }}#digital-guidance';
                } else {
                    window.location.href = '{{ route("home") }}';
                }
                toggleSearch();
            }
        });
    }

    // Keyboard Shortcuts
    document.addEventListener('keydown', (e) => {
        const searchOverlay = document.getElementById('search-overlay');
        if (e.key === 'Escape' && !searchOverlay.classList.contains('invisible')) {
            toggleSearch();
        }
        if ((e.ctrlKey || e.metaKey) && (e.key === 'f' || e.key === 'k')) {
            e.preventDefault();
            toggleSearch();
        }
    });

    // Expose functions globally
    window.toggleTheme = toggleTheme;
    window.toggleSearch = toggleSearch;
    window.fillSearch = fillSearch;
    window.openVoiceSearch = openVoiceSearch;
    window.closeVoiceSearch = closeVoiceSearch;
</script>
@endpush
