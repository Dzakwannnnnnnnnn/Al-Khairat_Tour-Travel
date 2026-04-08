<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al-Khairat - Perjalanan Penuh Kehangatan</title>
    
    @vite(['resources/css/app.css'])

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
    
    <!-- Navigation Header -->
    <!-- Minimal Top Header (Logo Only) -->
    <header class="minimal-header" id="main-header">
        <div class="flex items-center group cursor-pointer">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.jpg') }}" class="object-contain group-hover:scale-105 transition transform duration-500" alt="Al-Khairat Logo">
            </a>
        </div>
    </header>

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
            <a href="{{ route('gallery') }}" class="dock-item group">
                <span class="dock-label">Video</span>
                <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
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

            <!-- Login -->
            <a href="{{ route('login') }}" class="dock-item dock-item-login group">
                <span class="dock-label">Masuk</span>
                <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <div class="dock-active-dot"></div>
            </a>
        </div>
    </div>

    <!-- Hero Section with Slideshow -->
    <section id="hero-slideshow" class="relative w-full h-screen min-h-screen overflow-hidden">
        <!-- Slideshow Images -->
        <div class="hero-slideshow">
            <div class="hero-slide active" style="background-image: url('https://images.unsplash.com/photo-1564769666747-d4b842b2b4d5?w=1200&h=800&fit=crop');"></div>
            <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1505142468610-359e7d316be0?w=1200&h=800&fit=crop');"></div>
            <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1200&h=800&fit=crop');"></div>
            <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=1200&h=800&fit=crop');"></div>
        </div>
        
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black/40 dark:bg-black/70 z-10 transition-colors duration-700"></div>
        
        <!-- Content Overlay -->
        <div class="absolute inset-0 flex items-center justify-center z-20">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-serif font-bold mb-4 md:mb-6 leading-tight drop-shadow-lg">
                    Perjalanan Penuh <span class="text-gold">Kehangatan</span>
                </h1>
                <p class="text-lg md:text-xl lg:text-2xl font-medium mb-2 md:mb-4 drop-shadow-lg">Pelayanan Secerah Mentari</p>
                <p class="text-sm md:text-base lg:text-lg mb-8 md:mb-12 max-w-2xl mx-auto leading-relaxed drop-shadow-lg">
                    Wujudkan impian spiritual Anda dengan layanan umroh terpercaya. Nikmati pengalaman tak terlupakan dengan memenuhi setiap kebutuhan perjalanan Anda dengan penuh kehangatan dan profesionalisme.
                </p>
                
                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="btn-primary text-sm md:text-base px-6 md:px-10 py-3 md:py-4 hover:shadow-2xl transition transform hover:scale-105 text-center">
                        Daftar Sekarang
                    </a>
                    <a href="#paket" class="btn-secondary text-sm md:text-base px-6 md:px-10 py-3 md:py-4 hover:shadow-2xl transition transform hover:scale-105 text-center">
                        Lihat Paket
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Navigation Dots -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-30 flex space-x-3">
            <button class="hero-dot active" data-slide="0" aria-label="Slide 1"></button>
            <button class="hero-dot" data-slide="1" aria-label="Slide 2"></button>
            <button class="hero-dot" data-slide="2" aria-label="Slide 3"></button>
            <button class="hero-dot" data-slide="3" aria-label="Slide 4"></button>
        </div>
        
        <!-- Navigation Arrows -->
        <button class="absolute left-4 md:left-8 top-1/2 transform -translate-y-1/2 z-30 bg-white/20 hover:bg-white/40 text-white p-3 md:p-4 rounded-full transition" id="hero-prev" aria-label="Previous slide">
            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button class="absolute right-4 md:right-8 top-1/2 transform -translate-y-1/2 z-30 bg-white/20 hover:bg-white/40 text-white p-3 md:p-4 rounded-full transition" id="hero-next" aria-label="Next slide">
            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
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

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                @forelse($products as $product)
                    <!-- Dynamic Live Seat Package -->
                    <div class="bg-surface rounded-xl md:rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 overflow-hidden scroll-animate relative border {{ $product->status == 'featured' ? 'border-orange' : 'border-transparent' }}" data-animation="slide-up">
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
                        <div class="p-5 md:p-8 flex flex-col justify-between h-full">
                            <div>
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
                            
                            <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Al-Khairat,%20saya%20tertarik%20dengan%20{{ urlencode($product->name) }}%20berhubung%20kuota%20sisa%20{{ max(0, $product->stock) }}%20kursi." target="_blank" class="mt-4 block w-full text-center {{ $product->status == 'featured' ? 'btn-primary' : 'btn-secondary' }} text-sm py-3 rounded-xl shadow hover:shadow-lg transition">
                                Pesan Sekarang - Sisa {{ max(0, $product->stock) }}!
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10 bg-white rounded-xl shadow">
                        <p class="text-brown">Belum ada paket umroh yang tersedia saat ini.</p>
                    </div>
                @endforelse
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

    <!-- CTA Section -->
    <section class="section-py bg-gradient-sunset text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-heading mb-3 md:mb-4 text-white">Wujudkan Impian Umroh Anda</h2>
            <p class="text-base md:text-lg lg:text-xl mb-6 md:mb-8 text-white/90 px-2">
                Jangan tunda lagi, daftar sekarang dan rasakan kehangatan dalam setiap langkah perjalanan spiritual Anda.
            </p>
            <a href="https://wa.me/62" target="_blank" class="inline-block bg-surface text-orange px-6 md:px-10 py-2 md:py-4 rounded-lg font-bold text-sm md:text-base lg:text-lg hover:bg-bg transition transform hover:-translate-y-1">
                Hubungi Kami Sekarang
            </a>
        </div>
    </section>

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
    </script>
</body>
</html>
