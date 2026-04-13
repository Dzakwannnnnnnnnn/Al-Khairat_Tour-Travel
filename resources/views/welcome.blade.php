<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al-Khairat - Perjalanan Penuh Kehangatan</title>
    
    @vite(['resources/css/app.css'])
    @stack('styles')

    <!-- Theme Detection Script -->
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="bg-bg font-sans text-text transition-colors duration-500">
    <!-- Elegant Cinematic Loading Screen -->
    <div id="loading-screen" class="fixed inset-0 bg-bg flex flex-col items-center justify-center z-[9999] opacity-100">
        <div class="loader-content flex flex-col items-center">
            <!-- Center logo -->
            <div class="flex flex-col items-center mb-6 animate-[fadeUp_1.5s_ease-out]">
                <img src="{{ asset('images/logo.jpg') }}" class="h-44 md:h-64 object-contain drop-shadow-[0_0_30px_rgba(255,165,0,0.3)]" style="animation: pulse-star 4s ease-in-out infinite;" alt="Al-Khairat Tour Travel Logo">
            </div>
            
            <!-- Loading text -->
            <div class="overflow-hidden">
                <p class="text-gold/80 font-sans text-xs md:text-sm tracking-[0.3em] font-light uppercase animate-[slideUp_1s_ease-out_0.3s_both]">
                    Perjalanan Penuh Kehangatan
                </p>
            </div>
            
            <!-- Elegant Loading Line -->
            <div class="w-48 h-[1px] bg-charcoal/5 mt-10 relative overflow-hidden animate-[fadeUp_1s_ease-out_0.6s_both]">
                <div class="absolute inset-0 bg-gradient-sunset w-full rounded-full" style="animation: loadingLine 2s cubic-bezier(0.4, 0, 0.2, 1) infinite;"></div>
            </div>
        </div>
    </div>
    <!-- Logo Header -->
    <x-logo-header />


    <!-- Floating Navigation Dock -->
    <div class="dock-container">
        <div class="dock-wrapper">
            <!-- Beranda -->
            <a href="#hero-slideshow" class="dock-item group active" data-section="hero-slideshow">
                <span class="dock-label">Home</span>
                <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <div class="dock-active-dot"></div>
            </a>

            <!-- Tentang Kami -->
            <a href="#about" class="dock-item group" data-section="about">
                <span class="dock-label">Tentang Kami</span>
                <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div class="dock-active-dot"></div>
            </a>

            <!-- Keunggulan -->
            <a href="#keunggulan" class="dock-item group" data-section="keunggulan">
                <span class="dock-label">Layanan</span>
                <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-7.714 2.143L11 21l-2.286-6.857L1 12l7.714-2.143L11 3z"></path>
                </svg>
                <div class="dock-active-dot"></div>
            </a>

            <!-- Paket -->
            <a href="#paket" class="dock-item group" data-section="paket">
                <span class="dock-label">Paket</span>
                <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                <div class="dock-active-dot"></div>
            </a>

            <!-- Testimoni -->
            <a href="#testimoni" class="dock-item group" data-section="testimoni">
                <span class="dock-label">Ulasan</span>
                <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                </svg>
                <div class="dock-active-dot"></div>
            </a>

            <!-- Galeri -->
            <a href="{{ route('gallery') }}" class="dock-item group" data-section="gallery">
                <span class="dock-label">Video</span>
                <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                </svg>
                <div class="dock-active-dot"></div>
            </a>

            <!-- Panduan -->
            <a href="#digital-guidance" class="dock-item group" data-section="digital-guidance">
                <span class="dock-label">Panduan</span>
                <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <div class="dock-active-dot"></div>
            </a>

            <!-- Kontak -->
            <a href="#contact" class="dock-item group" data-section="contact">
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

            <!-- Voice Search Login -->
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
            <a href="{{ route('profile.edit') }}" class="dock-item group">
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

    <!-- Premium Search Overlay -->
    <div id="search-overlay" class="fixed inset-0 z-[1000] bg-bg/95 backdrop-blur-2xl opacity-0 invisible transition-all duration-500 flex flex-col items-center justify-start pt-32 px-4">
        <button onclick="toggleSearch()" class="absolute top-8 right-8 text-text/50 hover:text-orange transition-all p-2 rounded-full hover:bg-orange/10">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>

        <div class="w-full max-w-3xl space-y-8 animate-fade-in">
            <div class="text-center space-y-2">
                <h2 class="text-4xl font-serif font-bold text-text">Apa yang Anda <span class="text-gradient-sunset">Cari?</span></h2>
                <p class="text-text/60">Cari paket umroh, artikel, atau informasi lainnya.</p>
            </div>

            <div class="relative group">
                <div class="absolute inset-y-0 left-6 flex items-center pointer-events-none">
                    <svg class="w-8 h-8 text-orange/50 group-focus-within:text-orange transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" id="search-input" 
                    class="w-full bg-surface/50 border-2 border-border focus:border-orange rounded-[2.5rem] py-6 pl-20 pr-32 text-2xl text-text outline-none transition-all shadow-2xl focus:ring-8 focus:ring-orange/5"
                    placeholder="Ketik kata kunci di sini...">
                
                <button onclick="toggleSearch()" class="absolute right-3 top-1/2 -translate-y-1/2 bg-gradient-sunset text-white h-[80%] px-8 rounded-full font-bold shadow-lg hover:shadow-orange/20 hover:scale-105 transition-all flex items-center gap-2">
                    <span>Cari</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </button>
            </div>

            <!-- Quick Suggestions -->
            <div class="flex flex-wrap justify-center gap-3 pt-4">
                <span class="text-sm text-text/40 w-full text-center mb-2">Saran Pencarian:</span>
                <button onclick="fillSearch('Umroh Reguler')" class="px-6 py-2 rounded-full bg-surface border border-border hover:border-orange hover:text-orange transition-all text-sm font-medium shadow-sm">Umroh Reguler</button>
                <button onclick="fillSearch('Paket Ramadhan')" class="px-6 py-2 rounded-full bg-surface border border-border hover:border-orange hover:text-orange transition-all text-sm font-medium shadow-sm">Paket Ramadhan</button>
                <button onclick="fillSearch('Haji Plus')" class="px-6 py-2 rounded-full bg-surface border border-border hover:border-orange hover:text-orange transition-all text-sm font-medium shadow-sm">Haji Plus</button>
            </div>
        </div>
    </div>

    <!-- Custom Search Alert Popup (Toast) -->
    <div id="search-alert" class="fixed top-10 left-1/2 -translate-x-1/2 z-[2000] bg-red-600/90 backdrop-blur-md text-white px-8 py-4 rounded-2xl shadow-2xl transition-all duration-500 opacity-0 invisible translate-y-[-20px] flex items-center gap-3">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
        </svg>
        <span id="search-alert-message" class="font-bold tracking-wide">Keyword tidak ditemukan!</span>
    </div>

    <!-- Hero Section with Slideshow -->
    <section id="hero-slideshow" class="relative w-full h-screen min-h-screen overflow-hidden">
        <!-- Slideshow Images -->
        <div class="hero-slideshow">
            @forelse($slideshows as $slideshow)
            <div class="hero-slide {{ $loop->first ? 'active' : '' }}" style="background-image: url('{{ $slideshow->local_path ? asset('storage/' . $slideshow->local_path) : $slideshow->image_url }}');"></div>
            @empty
            <!-- Default fallback slides -->
            <div class="hero-slide active" style="background-image: url('https://images.unsplash.com/photo-1564769666747-d4b842b2b4d5?w=1200&h=800&fit=crop');"></div>
            <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1505142468610-359e7d316be0?w=1200&h=800&fit=crop');"></div>
            <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1200&h=800&fit=crop');"></div>
            <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=1200&h=800&fit=crop');"></div>
            @endforelse
        </div>
        
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black/40 dark:bg-black/70 z-10 transition-colors duration-700"></div>
        
        <!-- Content Overlay -->
        <div class="absolute inset-0 flex items-center justify-center z-20">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl 2xl:text-5xl font-serif font-bold mb-4 md:mb-6 leading-tight drop-shadow-lg">
                    Perjalanan Penuh <span class="text-gold">Kehangatan</span>
                </h1>
                <p class="text-lg md:text-xl lg:text-2xl 2xl:text-xl font-medium mb-2 md:mb-4 drop-shadow-lg">Pelayanan Secerah Mentari</p>
                <p class="text-sm md:text-base lg:text-lg 2xl:text-base mb-8 md:mb-12 max-w-2xl mx-auto leading-relaxed drop-shadow-lg">
                    Wujudkan impian spiritual Anda dengan layanan umroh terpercaya. Nikmati pengalaman tak terlupakan dengan memenuhi setiap kebutuhan perjalanan Anda dengan penuh kehangatan dan profesionalisme.
                </p>
                
                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="btn-primary text-sm md:text-base 2xl:text-sm px-6 md:px-10 2xl:px-8 py-3 md:py-4 2xl:py-3 hover:shadow-2xl transition transform hover:scale-105 text-center">
                        Daftar Sekarang
                    </a>
                    <a href="#paket" class="btn-secondary text-sm md:text-base 2xl:text-sm px-6 md:px-10 2xl:px-8 py-3 md:py-4 2xl:py-3 hover:shadow-2xl transition transform hover:scale-105 text-center">
                        Lihat Paket
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Navigation Dots -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-30 flex space-x-3">
            @php
                $slideCount = $slideshows->count() > 0 ? $slideshows->count() : 4;
            @endphp
            @for($i = 0; $i < $slideCount; $i++)
            <button class="hero-dot {{ $i === 0 ? 'active' : '' }}" data-slide="{{ $i }}" aria-label="Slide {{ $i + 1 }}"></button>
            @endfor
        </div>
        

    </section>

    <!-- About Us Section with PPIU Integration -->
    <section id="about" class="section-py bg-bg relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="scroll-animate" data-animation="fade-right">
                    <div class="inline-flex items-center space-x-2 bg-white/60 backdrop-blur border border-orange/10 px-3 py-1 rounded-full text-sm font-semibold text-orange mb-4">
                        <span class="w-2 h-2 rounded-full bg-orange animate-pulse"></span>
                        <span>Tentang Perusahaan</span>
                    </div>
                    <h2 class="text-heading mb-4 text-text">Siapa <span class="text-gradient-sunset">Al-Khairat?</span></h2>
                    <p class="text-text/80 mb-6 leading-relaxed">
                        Sejak didirikan, Al-Khairat Tour & Travel berkomitmen untuk menjadi pendamping spiritual terbaik Anda menuju Baitullah. Kami tidak sekadar menawarkan perjalanan, melainkan membimbing pengalaman spiritual yang dilayani dengan ketulusan hati.
                    </p>
                    <div class="space-y-4 mb-8">
                        <div class="flex items-center space-x-3 text-text font-semibold border-b border-border pb-3">
                            <span class="text-2xl">🥇</span> Angka Keberangkatan Tinggi (Ribuan Jamaah)
                        </div>
                        <div class="flex items-center space-x-3 text-text font-semibold border-b border-border pb-3">
                            <span class="text-2xl">👨‍🏫</span> Pembimbing (Muthawwif) Profesional Bersertifikat
                        </div>
                        <div class="flex items-center space-x-3 text-text font-semibold pb-3">
                            <span class="text-2xl">🤝</span> Transparansi Fasilitas dan Akad Perjalanan
                        </div>
                    </div>
                    
                    <!-- Integrasi Izin Resmi PPIU -->
                    <div class="bg-surface border-l-4 border-green-500 p-5 rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                        <div class="flex items-start justify-between flex-wrap gap-4">
                            <div>
                                <h4 class="font-bold text-text text-lg flex items-center space-x-2">
                                    <span>Berizin Resmi Kemenag</span>
                                    <svg class="text-green-500 w-5 h-5 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </h4>
                                <p class="text-xs text-text/70 mb-3 mt-1">Kami terdaftar sebagai Penyelenggara Perjalanan Ibadah Umrah (PPIU) resmi untuk menjamin keamanan jamaah.</p>
                                <a href="https://simpu.kemenag.go.id" target="_blank" class="inline-flex items-center space-x-2 text-sm text-green-600 dark:text-green-400 font-bold hover:text-green-800 dark:hover:text-green-300 transition group">
                                    <span>Verifikasi via Siskohat Kemenag</span>
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12H9m12 0l-3-3m3 3l-3 3M3 12a9 9 0 0118.001 0"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="relative scroll-animate flex justify-center" data-animation="fade-left">
                    <div class="w-full max-w-[350px] aspect-[9/16] rounded-2xl overflow-hidden shadow-2xl relative z-10 border-4 border-white dark:border-surface transition-colors duration-500 bg-black">
                        <video 
                            autoplay 
                            muted 
                            loop 
                            playsinline 
                            class="w-full h-full object-cover">
                            <source src="{{ asset('assets/videos/about-us.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="absolute -bottom-6 -right-6 w-48 h-48 bg-gradient-sunset rounded-full filter blur-3xl opacity-30 z-0"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Divider with Palm -->
    <div class="divider-palm"></div>

    <!-- Section Keunggulan -->
    <section id="keunggulan" class="section-py bg-bg transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 md:mb-16 scroll-animate" data-animation="fade-up">
                <h2 class="text-heading mb-3 md:mb-4">Keunggulan Kami</h2>
                <p class="text-sm md:text-base lg:text-lg text-text/70 max-w-2xl mx-auto px-2">
                    Kami berkomitmen memberikan pengalaman umroh terbaik dengan layanan terdepan
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-8">
                <!-- Feature 1 -->
                <div class="text-center p-4 md:p-6 rounded-lg md:rounded-xl bg-surface border-2 border-border hover:border-orange transition group scroll-animate" data-animation="slide-up" data-delay="0">
                    <div class="w-14 h-14 md:w-16 md:h-16 rounded-full bg-gradient-sunset flex items-center justify-center mx-auto mb-3 md:mb-4 text-xl md:text-2xl group-hover:shadow-lg group-hover:scale-110 transition flex-shrink-0">
                        ✈️
                    </div>
                    <h3 class="text-lg md:text-xl font-serif font-bold text-text mb-2 md:mb-3">Pesawat Tanpa Transit</h3>
                    <p class="text-text/70 text-xs md:text-sm">Terbang langsung ke Jeddah tanpa perjalanan yang menguras energi</p>
                </div>

                <!-- Feature 2 -->
                <div class="text-center p-4 md:p-6 rounded-lg md:rounded-xl bg-surface border-2 border-border hover:border-orange transition group scroll-animate" data-animation="slide-up" data-delay="100">
                    <div class="w-14 h-14 md:w-16 md:h-16 rounded-full bg-gradient-sunset flex items-center justify-center mx-auto mb-3 md:mb-4 text-xl md:text-2xl group-hover:shadow-lg group-hover:scale-110 transition flex-shrink-0">
                        🏨
                    </div>
                    <h3 class="text-lg md:text-xl font-serif font-bold text-text mb-2 md:mb-3">Hotel Dekat Masjid</h3>
                    <p class="text-text/70 text-xs md:text-sm">Lokasi strategis berjarak hanya 5-10 menit dari Masjidil Haram</p>
                </div>

                <!-- Feature 3 -->
                <div class="text-center p-4 md:p-6 rounded-lg md:rounded-xl bg-surface border-2 border-border hover:border-orange transition group scroll-animate" data-animation="slide-up" data-delay="200">
                    <div class="w-14 h-14 md:w-16 md:h-16 rounded-full bg-gradient-sunset flex items-center justify-center mx-auto mb-3 md:mb-4 text-xl md:text-2xl group-hover:shadow-lg group-hover:scale-110 transition flex-shrink-0">
                        👨‍🍳
                    </div>
                    <h3 class="text-lg md:text-xl font-serif font-bold text-text mb-2 md:mb-3">Makanan Berkualitas</h3>
                    <p class="text-text/70 text-xs md:text-sm">Menu makanan sehat dan halal yang lezat setiap hari</p>
                </div>

                <!-- Feature 4 -->
                <div class="text-center p-4 md:p-6 rounded-lg md:rounded-xl bg-surface border-2 border-border hover:border-orange transition group scroll-animate" data-animation="slide-up" data-delay="300">
                    <div class="w-14 h-14 md:w-16 md:h-16 rounded-full bg-gradient-sunset flex items-center justify-center mx-auto mb-3 md:mb-4 text-xl md:text-2xl group-hover:shadow-lg group-hover:scale-110 transition flex-shrink-0">
                        📱
                    </div>
                    <h3 class="text-lg md:text-xl font-serif font-bold text-text mb-2 md:mb-3">Guide Berpengalaman</h3>
                    <p class="text-text/70 text-xs md:text-sm">Tim profesional siap membantu Anda 24 jam non-stop</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Divider with Palm -->
    <div class="divider-palm"></div>

    <!-- Section Paket -->
    <section id="paket" class="section-py bg-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 md:mb-16 scroll-animate" data-animation="fade-up">
                <h2 class="text-heading mb-3 md:mb-4">Paket Umroh Pilihan</h2>
                <p class="text-sm md:text-base lg:text-lg text-brown max-w-2xl mx-auto px-2">
                    Pilih paket yang sesuai dengan kebutuhan dan budget Anda
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8" id="product-grid">
                @forelse($products as $product)
                    <!-- Dynamic Live Seat Package -->
                    <div class="product-card bg-surface rounded-xl md:rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 overflow-hidden scroll-animate relative border {{ $product->status == 'featured' ? 'border-orange' : 'border-transparent' }}" data-animation="slide-up" data-name="{{ strtolower($product->name) }}">
                        <!-- LIVE SEAT WIDGET -->
                        <div class="absolute top-4 left-4 z-20 bg-red-600 backdrop-blur-md text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-lg flex items-center space-x-2 border border-red-400">
                            <span class="relative flex h-2.5 w-2.5">
                              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                              <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-white"></span>
                            </span>
                            <span>SISA {{ max(0, $product->stock) }} KURSI LIVE!</span>
                        </div>
                        
                        @if($product->status == 'featured')
                        <div class="absolute top-4 right-4 z-20 bg-gradient-sunset text-white px-3 py-1 rounded-full text-xs font-semibold shadow-md">
                            TERPOPULER
                        </div>
                        @endif

                        <div class="h-32 md:h-40 relative">
                            @if($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}" class="w-full h-full object-cover filter brightness-90">
                            @else
                                <div class="w-full h-full bg-gradient-sunset"></div>
                            @endif
                        </div>
                        <div class="p-5 md:p-8 flex flex-col flex-grow">
                            <div class="flex-grow">
                                <h3 class="text-xl md:text-2xl font-serif font-bold text-charcoal mb-2">{{ strtoupper($product->name) }}</h3>
                                <p class="text-brown text-xs md:text-sm mb-4">Umroh {{ $product->duration }}</p>
                                <p class="text-2xl md:text-3xl font-bold text-orange mb-6 text-brand">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </p>
                                
                                <ul class="space-y-3 mb-8">
                                    @if(is_array($product->features))
                                        @foreach(array_slice($product->features, 0, 4) as $feature)
                                        <li class="flex items-start text-brown text-sm">
                                            <span class="text-orange mr-2">✓</span>
                                            <span class="leading-tight">{{ $feature }}</span>
                                        </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row gap-2 pt-4 border-t border-border/50">
                                <button onclick="openProductDetail({{ $product->id }})" class="flex-1 text-center bg-white border-2 border-orange text-orange font-bold text-xs py-3 rounded-xl hover:bg-orange/5 transition">
                                    Lihat Detail
                                </button>
                                <a href="https://wa.me/{{ $product->guide_phone ?? $whatsapp }}?text=Halo%20Admin%20Al-Khairat,%20saya%20ingin%20konsultasi%20mengenai%20paket%20{{ urlencode($product->name) }}." target="_blank" class="flex-1 text-center {{ $product->status == 'featured' ? 'bg-gradient-sunset shadow-lg shadow-orange/20' : 'bg-charcoal' }} text-white font-bold text-xs py-3 rounded-xl hover:scale-105 transition flex items-center justify-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.414 0 .018 5.393 0 12.029c0 2.119.554 4.188 1.61 6.01L0 24l6.135-1.61a11.75 11.75 0 005.912 1.593h.005c6.637 0 12.032-5.393 12.035-12.031a11.77 11.77 0 00-3.538-8.455z"/></svg>
                                    Konsultasi
                                </a>
                            </div>

                            <!-- Hidden Data for Modal -->
                            <div id="product-data-{{ $product->id }}" class="hidden" 
                                 data-name="{{ $product->name }}"
                                 data-price="Rp {{ number_format($product->price, 0, ',', '.') }}"
                                 data-duration="{{ $product->duration }}"
                                 data-category="{{ $product->category }}"
                                 data-description="{{ $product->description ?? 'Tidak ada deskripsi tersedia.' }}"
                                 data-features="{{ json_encode($product->features) }}"
                                 data-image="{{ $product->image ? asset('storage/'.$product->image) : '' }}"
                                 data-guide-phone="{{ $product->guide_phone }}">
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10 bg-white rounded-xl shadow">
                        <p class="text-brown">Belum ada paket umroh yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>
            
            <!-- No Search Results Message -->
            <div id="no-results" class="hidden text-center py-20 bg-surface rounded-2xl shadow-lg border-2 border-dashed border-border mt-8">
                <div class="text-6xl mb-4">🔍</div>
                <h3 class="text-2xl font-serif font-bold text-text mb-2">Maaf, Paket Tidak Ditemukan</h3>
                <p class="text-text/60">Coba gunakan kata kunci lain seperti "Umroh" atau "Ramadhan".</p>
                <button onclick="fillSearch(''); filterProducts('');" class="mt-6 text-orange font-bold hover:underline">Lihat Semua Paket</button>
            </div>
        </div>
    </section>

    <!-- Divider with Palm -->
    <div class="divider-palm"></div>

    <!-- Section Digital Guidance -->
    <section id="digital-guidance" class="section-py bg-cream relative overflow-hidden transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10 md:mb-14 scroll-animate" data-animation="fade-up">
                <h2 class="text-heading mb-3 md:mb-4">Eksplorasi <span class="text-gradient-sunset">Digital Al-Khairat</span></h2>
                <p class="text-sm md:text-base lg:text-lg text-text/70 max-w-2xl mx-auto px-2">
                    Panduan ibadah dalam genggaman Anda. Nikmati kemudahan akses manasik dan panduan digital kapan saja.
                </p>
            </div>

            <!-- Video Container (Centred & Scaled Down) -->
            <div class="max-w-4xl mx-auto scroll-animate" data-animation="fade-up">
                <div class="relative group rounded-[1.5rem] md:rounded-[2rem] overflow-hidden shadow-2xl bg-black border-4 border-white dark:border-surface transition-all duration-500">
                    <video 
                        id="manasik-video"
                        controls
                        playsinline 
                        class="w-full h-auto aspect-video object-cover brightness-90 group-hover:brightness-100 transition duration-700">
                        <source src="{{ asset('assets/videos/manasik-digital.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    
                    <!-- Floating Badge -->
                    <div class="absolute top-4 left-4 md:top-6 md:left-6 z-20 bg-orange/90 backdrop-blur-md text-white px-3 py-1.5 md:px-4 md:py-2 rounded-full text-[10px] md:text-xs font-bold shadow-lg flex items-center space-x-2 border border-white/20">
                        <span class="w-1.5 h-1.5 md:w-2 md:h-2 rounded-full bg-white animate-pulse"></span>
                        <span>MANASIK DIGITAL</span>
                    </div>

                     <!-- Info Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none flex flex-col justify-end p-6 md:p-10">
                        <h3 class="text-xl md:text-2xl font-serif font-bold text-white mb-2">Panduan Manasik Al-Khairat</h3>
                        <p class="text-white/80 text-xs md:text-sm max-w-lg">
                            Simak panduan lengkap tata cara ibadah Umroh dan Haji secara detail untuk persiapan spiritual Anda yang maksimal.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Additional Cards (Centred & More Compact) -->
            <div class="mt-8 md:mt-10 max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 lg:gap-8 scroll-animate" data-animation="fade-up">
                <!-- Card Panduan Tasuh -->
                <div class="bg-surface p-5 md:p-6 rounded-2xl md:rounded-3xl border-2 border-border hover:border-orange transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 w-20 h-20 bg-orange/5 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                    <div class="w-12 h-12 md:w-14 md:h-14 rounded-xl md:rounded-2xl bg-orange/10 flex items-center justify-center text-2xl mb-4 group-hover:scale-110 group-hover:bg-orange group-hover:text-white transition-all duration-500 relative z-10">
                        📖
                    </div>
                    <h3 class="text-lg md:text-xl font-serif font-bold text-text mb-2">Panduan Tasuh Digital</h3>
                    <p class="text-text/70 text-xs md:text-sm mb-6 leading-relaxed">
                        Akses izin ibadah dan dokumen penting lainnya dalam format digital yang praktis dan mudah dipahami.
                    </p>
                    <a href="{{ route('panduan-tasuh') }}" class="inline-flex items-center space-x-2 text-orange font-bold hover:translate-x-2 transition-transform group/link">
                        <span class="text-sm border-b border-orange/20 group-hover/link:border-orange transition-colors">Lihat Panduan</span>
                        <svg class="w-5 h-5 p-1 bg-orange/10 rounded-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>

                <!-- Card Konsultasi -->
                <div class="bg-surface p-5 md:p-6 rounded-2xl md:rounded-3xl border-2 border-border hover:border-orange transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 w-20 h-20 bg-orange/5 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                    <div class="w-12 h-12 md:w-14 md:h-14 rounded-xl md:rounded-2xl bg-orange/10 flex items-center justify-center text-2xl mb-4 group-hover:scale-110 group-hover:bg-orange group-hover:text-white transition-all duration-500 relative z-10">
                        📲
                    </div>
                    <h3 class="text-lg md:text-xl font-serif font-bold text-text mb-2">Konsultasi Persiapan</h3>
                    <p class="text-text/70 text-xs md:text-sm mb-6 leading-relaxed">
                        Punya pertanyaan? Tim pembimbing kami siap membantu Anda melalui layanan tanya jawab digital 24/7.
                    </p>
                    <a href="https://wa.me/{{ $whatsapp }}" class="inline-flex items-center space-x-2 text-orange font-bold hover:translate-x-2 transition-transform group/link">
                        <span class="text-sm border-b border-orange/20 group-hover/link:border-orange transition-colors">Hubungi Pembimbing</span>
                        <svg class="w-5 h-5 p-1 bg-orange/10 rounded-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Divider with Palm -->
    <div class="divider-palm"></div>

    <!-- Section Testimonial -->
    <section id="testimoni" class="section-py bg-bg transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 md:mb-16 scroll-animate" data-animation="fade-up">
                <h2 class="text-heading mb-3 md:mb-4">Testimonial Jemaat Kami</h2>
                <p class="text-sm md:text-base lg:text-lg text-brown max-w-2xl mx-auto px-2">
                    Ribuan jemaat telah merasakan kehangatan dalam perjalanan spiritual mereka
                </p>
            </div>

            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-8 max-w-3xl mx-auto text-center" role="alert">
                <span class="block sm:inline font-medium">✨ {{ session('success') }}</span>
            </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6 lg:gap-8 mb-16">
                @forelse($testimonials as $index => $t)
                <!-- Dynamic Testimonial -->
                <div class="bg-surface rounded-lg md:rounded-xl p-4 md:p-6 lg:p-8 border-l-4 border-orange hover:shadow-lg transition scroll-animate" data-animation="slide-up" data-delay="{{ $index * 100 }}">
                    <div class="flex items-center space-x-1 mb-3 md:mb-4">
                        @for($i = 0; $i < $t->rating; $i++)
                        <span class="text-lg md:text-2xl">⭐</span>
                        @endfor
                    </div>
                    <p class="text-text/70 mb-4 md:mb-6 italic text-xs md:text-sm line-clamp-4" title="{{ $t->message }}">
                        "{{ $t->message }}"
                    </p>
                    <div class="flex items-center space-x-2 md:space-x-3">
                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-gradient-sunset flex items-center justify-center text-white font-bold text-lg">{{ strtoupper(substr($t->name, 0, 1)) }}</div>
                        <div>
                            <p class="font-semibold text-text text-sm md:text-base">{{ $t->name }}</p>
                            @if($t->product)
                            <p class="text-xs md:text-sm text-orange font-medium">{{ $t->product->name }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-1 md:col-span-3 text-center text-gray-500 py-8">
                    Belum ada testimoni yang ditampilkan.
                </div>
                @endforelse
            </div>

            <!-- Form Submit Testimoni / Tulis Ulasan / Galeri Video -->
            <div class="text-center mt-8 flex flex-col sm:flex-row justify-center items-center gap-4">
                <button onclick="toggleTestimoniModal(true)" class="bg-surface text-orange border-2 border-orange font-semibold text-sm md:text-base px-6 md:px-10 py-3 rounded-xl hover:bg-orange hover:text-white shadow hover:shadow-lg transition transform hover:-translate-y-1 w-full sm:w-auto">
                    Tulis Ulasan Anda
                </button>
                <a href="{{ route('gallery') }}" class="btn-secondary text-sm md:text-base px-6 md:px-10 py-3 hover:shadow-lg transition transform hover:-translate-y-1 w-full sm:w-auto inline-flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Lihat Galeri Video Makkah
                </a>
            </div>

            <!-- Modal Form Submit Testimoni -->
            <div id="testimoniFormModal" class="fixed inset-0 z-[100] bg-black/60 backdrop-blur-sm hidden flex-col items-center justify-center p-4">
                <div class="bg-surface rounded-2xl p-6 md:p-8 shadow-2xl border border-border w-full max-w-3xl relative max-h-[90vh] overflow-y-auto animate-[slide-up_0.3s_ease-out]" onclick="event.stopPropagation()">
                    <!-- Close button -->
                    <button onclick="toggleTestimoniModal(false)" class="absolute top-4 right-4 text-gray-500 hover:text-red-500 transition text-2xl font-bold bg-white rounded-full w-8 h-8 flex items-center justify-center shadow-sm">&times;</button>
                    
                    <div class="text-center mb-6 mt-2">
                        <h3 class="text-2xl font-serif font-bold text-charcoal mb-2">Bagikan Pengalaman Anda</h3>
                        <p class="text-brown text-sm">Masukan Anda sangat berarti bagi kami untuk terus meningkatkan pelayanan.</p>
                    </div>
                    
                    <form action="{{ route('testimonials.public') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-text mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" name="name" required class="w-full px-4 py-2.5 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange focus:border-transparent bg-bg text-text transition">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-text mb-1">Paket Umroh (Opsional)</label>
                                <select name="product_id" class="w-full px-4 py-2.5 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange focus:border-transparent bg-bg text-text transition">
                                    <option value="" class="bg-surface">-- Tidak Memilih --</option>
                                    @foreach($products as $p)
                                    <option value="{{ $p->id }}" class="bg-surface">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-text mb-1">Alamat Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" required pattern="^.+@.+\..+$" title="Mohon masukkan email lengkap dengan domain (contoh: @gmail.com)" class="w-full px-4 py-2.5 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange focus:border-transparent bg-bg text-text transition" placeholder="Agar kami dapat membalas ulasan Anda">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-text mb-1">Rating Kepuasan <span class="text-red-500">*</span></label>
                            <select name="rating" required class="w-full px-4 py-2.5 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange focus:border-transparent bg-bg text-text transition">
                                <option value="5" class="bg-surface">⭐⭐⭐⭐⭐ (5/5) - Sangat Memuaskan</option>
                                <option value="4" class="bg-surface">⭐⭐⭐⭐ (4/5) - Memuaskan</option>
                                <option value="3" class="bg-surface">⭐⭐⭐ (3/5) - Biasa Saja</option>
                                <option value="2" class="bg-surface">⭐⭐ (2/5) - Kurang Memuaskan</option>
                                <option value="1" class="bg-surface">⭐ (1/5) - Mengecewakan</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-text mb-1">Cerita Pendek Anda <span class="text-red-500">*</span></label>
                            <textarea name="message" rows="3" required class="w-full px-4 py-2.5 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange focus:border-transparent bg-bg text-text transition" placeholder="Bagaimana kesan dan masukan Anda selama berangkat bersama Al-Khairat?"></textarea>
                        </div>
                        
                        <button type="submit" class="w-full btn-primary font-bold text-base py-3.5 hover:shadow-lg transition transform hover:-translate-y-1">
                            Kirim Ulasan Sekarang
                        </button>
                        <p class="text-xs text-center text-text/50 mt-2">Ulasan Anda akan dimoderasi terlebih dahulu sebelum tampil di halaman depan.</p>
                    </form>
                </div>
            </div>
            
            <script>
                function toggleTestimoniModal(show) {
                    const m = document.getElementById('testimoniFormModal');
                    if (show) {
                        m.classList.remove('hidden');
                        m.classList.add('flex');
                    } else {
                        m.classList.add('hidden');
                        m.classList.remove('flex');
                    }
                }

                // Close modal when clicking outside
                document.getElementById('testimoniFormModal').addEventListener('click', function(e) {
                    if (e.target === this) {
                        toggleTestimoniModal(false);
                    }
                });
            </script>
        </div>
    </section>

    <!-- Divider with Palm -->
    <div class="divider-palm"></div>

    <!-- FAQ Section -->
    <section id="faq" class="section-py bg-cream transition-colors duration-500">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 md:mb-16 scroll-animate" data-animation="fade-up">
                <h2 class="text-heading mb-3 md:mb-4">Pertanyaan yang Sering Diajukan</h2>
                <p class="text-sm md:text-base lg:text-lg text-text/70 px-2">
                    Temukan jawaban atas pertanyaan umum tentang paket umroh kami
                </p>
            </div>

            <div class="space-y-3 md:space-y-4">
                <!-- FAQ 1 -->
                <div class="bg-surface rounded-lg md:rounded-lg border-2 border-border hover:border-orange/50 overflow-hidden group transition scroll-animate" data-animation="slide-up" data-delay="0">
                    <button class="w-full p-4 md:p-6 text-left flex justify-between items-center hover:bg-bg transition">
                        <span class="font-serif font-bold text-text text-sm md:text-lg">Berapa biaya yang diperlukan?</span>
                        <span class="text-xl md:text-2xl text-orange group-open:rotate-180 transition flex-shrink-0 ml-3">+</span>
                    </button>
                    <div class="hidden group-open:block px-4 md:px-6 pb-4 md:pb-6 text-text/70 text-xs md:text-base border-t border-border">
                        Biaya umroh tergantung pada paket yang Anda pilih. Hubungi kami untuk penawaran terbaik sesuai dengan budget Anda.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="bg-surface rounded-lg md:rounded-lg border-2 border-border hover:border-orange/50 overflow-hidden group transition scroll-animate" data-animation="slide-up" data-delay="100">
                    <button class="w-full p-4 md:p-6 text-left flex justify-between items-center hover:bg-bg transition">
                        <span class="font-serif font-bold text-text text-sm md:text-lg">Apakah visa sudah termasuk?</span>
                        <span class="text-xl md:text-2xl text-orange group-open:rotate-180 transition flex-shrink-0 ml-3">+</span>
                    </button>
                    <div class="hidden group-open:block px-4 md:px-6 pb-4 md:pb-6 text-text/70 text-xs md:text-base border-t border-border">
                        Ya, semua paket kami sudah termasuk biaya visa dan asuransi perjalanan.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="bg-surface rounded-lg md:rounded-lg border-2 border-border hover:border-orange/50 overflow-hidden group transition scroll-animate" data-animation="slide-up" data-delay="200">
                    <button class="w-full p-4 md:p-6 text-left flex justify-between items-center hover:bg-bg transition">
                        <span class="font-serif font-bold text-text text-sm md:text-lg">Berapa orang minimal untuk keberangkatan?</span>
                        <span class="text-xl md:text-2xl text-orange group-open:rotate-180 transition flex-shrink-0 ml-3">+</span>
                    </button>
                    <div class="hidden group-open:block px-4 md:px-6 pb-4 md:pb-6 text-text/70 text-xs md:text-base border-t border-border">
                        Tidak ada minimal peserta. Kami berangkat setiap bulan dengan jadwal terjadwal.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="bg-surface rounded-lg md:rounded-lg border-2 border-border hover:border-orange/50 overflow-hidden group transition scroll-animate" data-animation="slide-up" data-delay="300">
                    <button class="w-full p-4 md:p-6 text-left flex justify-between items-center hover:bg-bg transition">
                        <span class="font-serif font-bold text-text text-sm md:text-lg">Apakah ada asuransi kesehatan?</span>
                        <span class="text-xl md:text-2xl text-orange group-open:rotate-180 transition flex-shrink-0 ml-3">+</span>
                    </button>
                    <div class="hidden group-open:block px-4 md:px-6 pb-4 md:pb-6 text-text/70 text-xs md:text-base border-t border-border">
                        Ya, semua peserta mendapatkan asuransi kesehatan perjalanan yang komprehensif.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-contact-section />

    <!-- Product Detail Modal -->
    <div id="product-detail-modal" class="fixed inset-0 z-[1000] bg-black/80 backdrop-blur-md hidden flex items-center justify-center p-4">
        <div class="bg-surface w-full max-w-4xl rounded-3xl overflow-hidden shadow-2xl animate-[slide-up_0.4s_ease-out] relative max-h-[90vh] flex flex-col md:flex-row">
            <!-- Close Button -->
            <button onclick="closeProductDetail()" class="absolute top-4 right-4 z-50 bg-charcoal/10 hover:bg-orange/20 text-charcoal hover:text-orange rounded-full p-2 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <!-- Image Side -->
            <div class="w-full md:w-1/2 h-64 md:h-auto relative">
                <img id="detail-image" src="" alt="" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <div class="absolute bottom-6 left-6 text-white">
                    <span id="detail-category" class="bg-orange px-3 py-1 rounded-full text-xs font-bold uppercase mb-2 inline-block"></span>
                    <h3 id="detail-name" class="text-3xl font-serif font-bold leading-tight"></h3>
                </div>
            </div>

            <!-- Content Side -->
            <div class="w-full md:w-1/2 p-6 md:p-10 overflow-y-auto bg-surface">
                <div class="mb-8">
                    <p class="text-orange text-3xl font-bold mb-1" id="detail-price"></p>
                    <p class="text-text/60 text-sm font-medium" id="detail-duration"></p>
                </div>

                <div class="space-y-6">
                    <div>
                        <h4 class="text-lg font-bold text-text mb-2">Deskripsi Paket</h4>
                        <p id="detail-description" class="text-text/70 text-sm leading-relaxed"></p>
                    </div>

                    <div>
                        <h4 class="text-lg font-bold text-text mb-3">Apa yang Anda Dapatkan?</h4>
                        <ul id="detail-features" class="grid grid-cols-1 gap-2">
                            <!-- Features will be injected here -->
                        </ul>
                    </div>
                </div>

                <div class="mt-10 pt-6 border-t border-border flex flex-col sm:flex-row gap-4">
                    <button onclick="openBookingModal()" class="flex-1 text-center bg-orange text-white font-bold py-4 rounded-2xl shadow-xl hover:bg-orange-bright hover:scale-[1.02] transition-transform flex items-center justify-center gap-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        Daftar Sekarang
                    </button>
                    <a id="detail-wa-link" href="" target="_blank" class="flex-1 text-center bg-charcoal text-white font-bold py-4 rounded-2xl shadow-lg hover:bg-black hover:scale-[1.02] transition-transform flex items-center justify-center gap-3">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.414 0 .018 5.393 0 12.029c0 2.119.554 4.188 1.61 6.01L0 24l6.135-1.61a11.75 11.75 0 005.912 1.593h.005c6.637 0 12.032-5.393 12.035-12.031a11.77 11.77 0 00-3.538-8.455z"/></svg>
                        Tanya Jadwal
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Form Modal -->
    <div id="booking-modal" class="fixed inset-0 z-[2000] bg-black/80 backdrop-blur-md hidden flex items-center justify-center p-4">
        <div class="bg-surface w-full max-w-2xl rounded-[2.5rem] overflow-hidden shadow-2xl animate-[scaleUp_0.4s_ease-out] relative">
            <button onclick="closeBookingModal()" class="absolute top-6 right-6 z-50 bg-charcoal/10 hover:bg-orange/20 text-charcoal hover:text-orange rounded-full p-2 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            <div class="p-8 md:p-12 overflow-y-auto max-h-[90vh]">
                <div class="text-center mb-8">
                    <h3 class="text-3xl font-serif font-bold text-charcoal mb-2">Form Pendaftaran</h3>
                    <p class="text-brown text-sm">Silakan lengkapi data diri Anda untuk pendaftaran paket <span id="booking-target-name" class="font-bold text-orange"></span></p>
                </div>

                <form action="{{ route('bookings.public') }}" method="POST" class="space-y-5">
                    @csrf
                    <input type="hidden" name="product_id" id="booking-product-id">
                    
                    <div>
                        <label class="block text-xs font-bold text-charcoal uppercase tracking-widest mb-2">Nama Lengkap (Sesuai Paspor/KTP)</label>
                        <input type="text" name="full_name" required value="{{ Auth::user()->name ?? '' }}" class="w-full px-5 py-4 bg-bg border-2 border-border/50 rounded-2xl focus:border-orange focus:outline-none transition-all" placeholder="Contoh: Farrel Azam">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-charcoal uppercase tracking-widest mb-2">NIK KTP (16 Digit)</label>
                            <input type="text" name="nik" required maxlength="16" value="{{ Auth::user()->nik ?? '' }}" class="w-full px-5 py-4 bg-bg border-2 border-border/50 rounded-2xl focus:border-orange focus:outline-none transition-all" placeholder="327xxxxxxxxxxxxx">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-charcoal uppercase tracking-widest mb-2">Jumlah Kursi</label>
                            <input type="number" name="booking_seat" required min="1" value="1" class="w-full px-5 py-4 bg-bg border-2 border-border/50 rounded-2xl focus:border-orange focus:outline-none transition-all">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-charcoal uppercase tracking-widest mb-2">Tempat Lahir</label>
                            <input type="text" name="birth_place" required value="{{ Auth::user()->birth_place ?? '' }}" class="w-full px-5 py-4 bg-bg border-2 border-border/50 rounded-2xl focus:border-orange focus:outline-none transition-all" placeholder="Jakarta">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-charcoal uppercase tracking-widest mb-2">Tanggal Lahir</label>
                            <input type="date" name="birth_date" required value="{{ Auth::user()->birth_date ?? '' }}" class="w-full px-5 py-4 bg-bg border-2 border-border/50 rounded-2xl focus:border-orange focus:outline-none transition-all">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-charcoal uppercase tracking-widest mb-2">Alamat Lengkap</label>
                        <textarea name="address" required rows="3" class="w-full px-5 py-4 bg-bg border-2 border-border/50 rounded-2xl focus:border-orange focus:outline-none transition-all" placeholder="Jl. Mawar No. 123, Jakarta Baru">{{ Auth::user()->address ?? '' }}</textarea>
                    </div>

                    <button type="submit" class="w-full bg-gradient-sunset text-white font-bold py-5 rounded-2xl shadow-xl hover:shadow-orange/30 hover:-translate-y-1 transition duration-300 transform active:scale-95">
                        Selesaikan Pendaftaran
                    </button>
                    
                    <p class="text-center text-[10px] text-brown/60 pt-4 px-8 leading-relaxed italic">
                        * Dengan mendaftar, Anda menyetujui syarat dan ketentuan layanan Al-Khairat Tour Travel. Data Anda dijamin kerahasiaannya.
                    </p>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-footer text-white py-12 md:py-16 transition-all duration-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 md:gap-8 lg:gap-12 mb-8 md:mb-12">
                <!-- About -->
                <div>
                    <div class="mb-5 bg-surface rounded-xl inline-block p-4 shadow-xl transform -rotate-2 hover:rotate-0 transition duration-500">
                        <img src="{{ asset('images/logo.jpg') }}" class="h-20 md:h-28 object-contain" alt="Al-Khairat Tour Travel">
                    </div>
                    <p class="text-white/70 text-xs md:text-sm">
                        Perjalanan penuh kehangatan, pelayanan secerah mentari.
                    </p>
                </div>

                <!-- Links -->
                <div>
                    <h4 class="font-serif font-bold mb-3 md:mb-4 text-gold text-xs md:text-base">Menu</h4>
                    <ul class="space-y-2 text-xs md:text-sm text-white/70">
                        <li><a href="#keunggulan" class="hover:text-gold transition">Keunggulan</a></li>
                        <li><a href="#paket" class="hover:text-gold transition">Paket</a></li>
                        <li><a href="#testimoni" class="hover:text-gold transition">Testimoni</a></li>
                        <li><a href="#faq" class="hover:text-gold transition">FAQ</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="font-serif font-bold mb-3 md:mb-4 text-gold text-xs md:text-base">Kontak</h4>
                    <ul class="space-y-2 text-xs md:text-sm text-white/70">
                        <li>📞 +62 (XXX) XXX-XXXX</li>
                        <li>📧 info@alkhairat.com</li>
                        <li>📍 Jakarta, Indonesia</li>
                    </ul>
                </div>

                <!-- Social -->
                <div>
                    <h4 class="font-serif font-bold mb-3 md:mb-4 text-gold text-xs md:text-base">Ikuti Kami</h4>
                    <div class="flex space-x-3 md:space-x-4">
                        <a href="#" class="w-9 h-9 md:w-10 md:h-10 bg-gradient-sunset rounded-full flex items-center justify-center hover:shadow-lg transition text-white font-semibold text-xs md:text-sm">
                            f
                        </a>
                        <a href="#" class="w-9 h-9 md:w-10 md:h-10 bg-gradient-sunset rounded-full flex items-center justify-center hover:shadow-lg transition text-white font-semibold text-xs md:text-sm">
                            ig
                        </a>
                        <a href="#" class="w-9 h-9 md:w-10 md:h-10 bg-gradient-sunset rounded-full flex items-center justify-center hover:shadow-lg transition text-white font-semibold text-xs md:text-sm">
                            tw
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bottom -->
            <div class="border-t border-white/20 pt-6 md:pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center text-center md:text-left gap-3 md:gap-4">
                    <p class="text-white/70 text-xs md:text-sm">
                        &copy; 2024 Al-Khairat. Semua hak cipta terlindungi.
                    </p>
                    <div class="flex flex-wrap justify-center md:justify-end gap-3 md:gap-6 text-xs md:text-sm text-white/70">
                        <a href="#" class="hover:text-orange transition">Kebijakan Privasi</a>
                        <a href="#" class="hover:text-orange transition">Syarat & Ketentuan</a>
                        <a href="#" class="hover:text-orange transition">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @vite(['resources/js/app.js'])

    <!-- Theme Control Logic -->
    <script>
        const isLoggedIn = @json(Auth::check());

        window.addEventListener('DOMContentLoaded', () => {
            @if(session('open_booking'))
                const productId = "{{ session('open_booking') }}";
                setTimeout(() => {
                    openProductDetail(productId);
                    setTimeout(() => openBookingModal(), 500);
                }, 1000);
            @endif
        });

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

        // Initialize UI based on current theme
        document.addEventListener('DOMContentLoaded', () => {
            updateThemeUI(document.documentElement.classList.contains('dark'));
        });

        // Voice Search Overlay Logic
        function openVoiceSearch() {
            const overlay = document.getElementById('voice-overlay');
            overlay.classList.remove('invisible', 'opacity-0');
            startSpeechRecognition();
        }

        function closeVoiceSearch() {
            const overlay = document.getElementById('voice-overlay');
            overlay.classList.add('invisible', 'opacity-0');
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
                
                // Intelligent Mapping Logic
                setTimeout(() => {
                    const cleanText = transcript.replace(/[.,?]/g, '');

                    if (cleanText.includes('paket umroh') || cleanText === 'umroh') {
                        closeVoiceSearch();
                        document.getElementById('paket').scrollIntoView({ behavior: 'smooth' });
                    } else if (cleanText.includes('info alkhairat') || cleanText === 'keamanan' || cleanText === 'info') {
                        closeVoiceSearch();
                        document.getElementById('about').scrollIntoView({ behavior: 'smooth' });
                    } else if (cleanText.includes('testi') || cleanText === 'ulasan' || cleanText === 'comment') {
                        closeVoiceSearch();
                        document.getElementById('testimoni').scrollIntoView({ behavior: 'smooth' });
                    } else if (cleanText.includes('panduan') || cleanText.includes('manasik') || cleanText === 'digital') {
                        closeVoiceSearch();
                        document.getElementById('digital-guidance').scrollIntoView({ behavior: 'smooth' });
                    } else {
                        // No keyword match - return to home (close overlay)
                        document.getElementById('voice-status').innerText = "Perintah tidak dikenali, kembali ke Beranda...";
                        setTimeout(() => {
                            closeVoiceSearch();
                            // Reset status for next time
                            setTimeout(() => {
                                document.getElementById('voice-status').innerText = "Ada yang bisa kami bantu?";
                            }, 500);
                        }, 1500);
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
        // --- Search Overlay Logic ---
        function openProductDetail(id) {
            const data = document.getElementById(`product-data-${id}`);
            const modal = document.getElementById('product-detail-modal');
            
            // Populate Modal
            document.getElementById('detail-image').src = data.dataset.image || 'https://via.placeholder.com/800x600?text=Al-Khairat';
            document.getElementById('detail-name').innerText = data.dataset.name;
            document.getElementById('detail-category').innerText = data.dataset.category;
            document.getElementById('detail-price').innerText = data.dataset.price;
            document.getElementById('detail-duration').innerText = `Paket Perjalanan ${data.dataset.duration}`;
            document.getElementById('detail-description').innerText = data.dataset.description;
            
            setActivePackageMarker(id);
            
            // Populate Features
            const features = JSON.parse(data.dataset.features);
            const featuresList = document.getElementById('detail-features');
            featuresList.innerHTML = '';
            features.forEach(f => {
                const li = document.createElement('li');
                li.className = 'flex items-center gap-2 text-text/70 text-sm';
                li.innerHTML = `<span class="text-orange text-lg">✓</span> <span>${f}</span>`;
                featuresList.appendChild(li);
            });

            // Update WA Link
            const guidePhone = data.dataset.guidePhone;
            const fallbackPhone = '{{ $whatsapp }}';
            const targetPhone = guidePhone && guidePhone !== '' ? guidePhone : fallbackPhone;
            
            document.getElementById('detail-wa-link').href = `https://wa.me/${targetPhone}?text=Halo%20Admin%20Al-Khairat,%20saya%20ingin%20bertanya%20lebih%20lanjut%20tentang%20paket%20${encodeURIComponent(data.dataset.name)}.`;

            // Show Modal
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeProductDetail() {
            document.getElementById('product-detail-modal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        // --- Booking Modal Logic ---
        function openBookingModal() {
            const data = document.querySelector('[data-active-detail="true"]');
            const productId = data ? data.id.split('-').pop() : '';

            if (productId) {
                window.location.href = `/booking/${productId}`;
            }
        }

        function closeBookingModal() {
            document.getElementById('booking-modal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        // Global Modal Event Listeners
        window.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeProductDetail();
                closeBookingModal();
                closeVoiceSearch();
                // Close search overlay if not visible? No, search has its own logic.
            }
        });

        // Close on Backdrop Click
        window.addEventListener('click', (e) => {
            const detailModal = document.getElementById('product-detail-modal');
            const bookingModal = document.getElementById('booking-modal');
            if (e.target === detailModal) closeProductDetail();
            if (e.target === bookingModal) closeBookingModal();
        });

        // Update active marker for logic
        function setActivePackageMarker(id) {
            document.querySelectorAll('[id^="product-data-"]').forEach(el => el.dataset.activeDetail = 'false');
            document.getElementById(`product-data-${id}`).dataset.activeDetail = 'true';
        }

        function toggleSearch() {
            const overlay = document.getElementById('search-overlay');
            const input = document.getElementById('search-input');
            
            if (overlay.classList.contains('invisible')) {
                overlay.classList.remove('invisible', 'opacity-0');
                overlay.classList.add('visible', 'opacity-100');
                setTimeout(() => input.focus(), 300);
                document.body.style.overflow = 'hidden'; 
            } else {
                overlay.classList.remove('visible', 'opacity-100');
                overlay.classList.add('invisible', 'opacity-0');
                document.body.style.overflow = ''; 
            }
        }

        function fillSearch(text) {
            const input = document.getElementById('search-input');
            input.value = text;
            input.focus();
            filterProducts(text);
        }

        // Live Filtering Logic
        function filterProducts(keyword, isManual = false) {
            const cards = document.querySelectorAll('.product-card');
            const noResults = document.getElementById('no-results');
            const term = keyword.toLowerCase().trim();
            let hasResults = false;

            cards.forEach(card => {
                const name = card.getAttribute('data-name');
                if (name.includes(term)) {
                    card.classList.remove('hidden');
                    hasResults = true;
                } else {
                    card.classList.add('hidden');
                }
            });

            if (!hasResults && term !== '') {
                noResults.classList.remove('hidden');
                if (isManual) {
                    showSearchAlert(`Pencarian untuk "${keyword}" tidak ditemukan`);
                }
            } else {
                noResults.classList.add('hidden');
            }
            
            // Auto-scroll to results if searching
            if (term !== '') {
                document.getElementById('paket').scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        function showSearchAlert(message) {
            const alert = document.getElementById('search-alert');
            const msgSpan = document.getElementById('search-alert-message');
            msgSpan.innerText = message;
            
            alert.classList.remove('invisible', 'opacity-0');
            alert.classList.add('visible', 'opacity-100');
            alert.style.transform = 'translateX(-50%) translateY(0)';
            
            setTimeout(() => {
                alert.classList.remove('visible', 'opacity-100');
                alert.classList.add('invisible', 'opacity-0');
                alert.style.transform = 'translateX(-50%) translateY(-20px)';
            }, 3000);
        }

        // Add event listener for real-time typing and Enter key
        document.getElementById('search-input').addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                const keyword = e.target.value;
                filterProducts(keyword, true); // True means manual search
                toggleSearch(); // Close the overlay
            }
        });

        document.getElementById('search-input').addEventListener('input', (e) => {
            filterProducts(e.target.value);
        });

        // Handle Escape Key and Search Shortcuts
        document.addEventListener('keydown', (e) => {
            const searchOverlay = document.getElementById('search-overlay');
            if (e.key === 'Escape' && !searchOverlay.classList.contains('invisible')) {
                toggleSearch();
            }
            if ((e.ctrlKey || e.metaKey) && (e.key === 'f' || e.key === 'k')) {
                if (searchOverlay.classList.contains('invisible')) {
                    e.preventDefault();
                    toggleSearch();
                }
            }
        });

        // Expose functions globally
        window.toggleSearch = toggleSearch;
        window.fillSearch = fillSearch;
    </script>

    <!-- Voice Search Overlay -->
    <div id="voice-overlay" class="fixed inset-0 bg-black/80 backdrop-blur-xl z-[9999] flex flex-col items-center justify-center opacity-0 invisible transition-all duration-500">
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
            
            <!-- Pulse ripple effects -->
            <div id="voice-pulse-1" class="absolute inset-0 bg-indigo-500 rounded-full -z-10 animate-ping opacity-0"></div>
            <div id="voice-pulse-2" class="absolute inset-0 bg-indigo-500 rounded-full -z-10 animate-ping delay-700 opacity-0"></div>
            
            <h2 id="voice-status" class="mt-12 text-2xl md:text-3xl font-bold text-white tracking-wide text-center px-4">Ada yang bisa kami bantu?</h2>
            <p class="mt-4 text-white/60 text-sm md:text-base tracking-[0.2em] uppercase font-light">Kami Mendengarkan...</p>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
