<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al-Khairat - Perjalanan Penuh Kehangatan</title>
    <meta name="description" content="Al-Khairat Tour & Travel - Penyelenggara perjalanan Umroh dan Haji resmi dengan pelayanan penuh kehangatan secerah mentari di Samarinda, Kalimantan Timur.">
    <meta name="keywords" content="umroh samarinda, haji samarinda, alkhairat tour travel, travel umroh terpercaya, paket umroh murah samarinda">
    <meta name="author" content="Al-Khairat Tour & Travel">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="Al-Khairat Tour & Travel - Perjalanan Penuh Kehangatan">
    <meta property="og:description" content="Wujudkan impian spiritual Anda ke Baitullah bersama Al-Khairat. Layanan profesional, transparan, dan penuh keberkahan.">
    <meta property="og:image" content="{{ asset('images/logo.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url('/') }}">
    <meta property="twitter:title" content="Al-Khairat Tour & Travel - Perjalanan Penuh Kehangatan">
    <meta property="twitter:description" content="Wujudkan impian spiritual Anda ke Baitullah bersama Al-Khairat. Layanan profesional, transparan, dan penuh keberkahan.">
    <meta property="twitter:image" content="{{ asset('images/logo.jpg') }}">
    
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">
    
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
    @include('components.alert')
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
                    Perjalanan Penuh Keberkahan
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


    <!-- Shared Navigation Dock -->
    @include('components.dock-navigation')



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
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl 2xl:text-5xl font-serif font-bold mb-3 md:mb-6 leading-tight drop-shadow-lg px-2">
                    Perjalanan Penuh <span class="text-gold">Keberkahan</span>
                </h1>
                <p class="text-base md:text-xl lg:text-2xl 2xl:text-xl font-medium mb-1 md:mb-4 drop-shadow-lg">Pelayanan Terbaik untuk Anda</p>
                <p class="text-xs md:text-base lg:text-lg 2xl:text-base mb-6 md:mb-12 max-w-2xl mx-auto leading-relaxed drop-shadow-lg px-4 opacity-90">
                    Wujudkan impian spiritual Anda dengan layanan umroh terpercaya. Nikmati pengalaman tak terlupakan dengan penuh keberkahan dan profesionalisme.
                </p>
                
                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    @guest
                    <a href="{{ route('register') }}" class="btn-primary text-sm md:text-base 2xl:text-sm px-6 md:px-10 2xl:px-8 py-3 md:py-4 2xl:py-3 hover:shadow-2xl transition transform hover:scale-105 text-center">
                        Daftar Sekarang
                    </a>
                    @else
                    <a href="{{ auth()->user()->isAdmin() ? route('dashboard') : route('profile.edit') }}" class="btn-primary text-sm md:text-base 2xl:text-sm px-6 md:px-10 2xl:px-8 py-3 md:py-4 2xl:py-3 hover:shadow-2xl transition transform hover:scale-105 text-center">
                        {{ auth()->user()->isAdmin() ? 'Dashboard Saya' : 'Profil Saya' }}
                    </a>
                    @endguest
                    <a href="#paket" class="btn-secondary text-sm md:text-base 2xl:text-sm px-6 md:px-10 2xl:px-8 py-3 md:py-4 2xl:py-3 hover:shadow-2xl transition transform hover:scale-105 text-center">
                        Lihat Paket
                    </a>
                </div>
            </div>
        </div>
        

        

    </section>

    <!-- About Us Section with PPIU Integration -->
    <section id="about" class="section-py relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="scroll-animate" data-animation="fade-right">
                    <div class="inline-flex items-center space-x-2 bg-white/60 dark:bg-orange/10 backdrop-blur border border-orange/10 dark:border-orange/20 px-3 py-1 rounded-full text-sm font-semibold text-orange mb-4">
                        <span class="w-2 h-2 rounded-full bg-orange animate-pulse"></span>
                        <span>Tentang Perusahaan</span>
                    </div>
                    <h2 class="text-heading mb-4 text-text">Tentang <span class="text-gradient-sunset">Al-Khairat</span></h2>
                    <p class="text-text/80 mb-6 leading-relaxed">
                        Al-Khairat Tour & Travel hadir sebagai mitra perjalanan ibadah Umrah dan Haji yang terpercaya. Dengan pengalaman melayani ribuan jamaah, kami memastikan setiap perjalanan Anda menuju Baitullah berjalan aman, nyaman, dan penuh kekhusyukan.
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
                    <div class="relative overflow-hidden bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/10 border border-green-200 dark:border-green-800/50 p-6 rounded-2xl shadow-lg hover:shadow-xl hover:shadow-green-500/10 transition-all duration-300 transform hover:-translate-y-1 mb-2 group">
                        <!-- Subtle Background Element -->
                        <div class="absolute -right-6 -top-6 w-24 h-24 bg-green-500/10 rounded-full blur-2xl group-hover:bg-green-500/20 transition-all duration-500"></div>
                        
                        <div class="relative z-10">
                            <div class="flex items-center space-x-3 mb-3">
                                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-green-100 dark:bg-green-800/50 flex items-center justify-center">
                                    <svg class="text-green-600 dark:text-green-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <h4 class="font-bold text-green-900 dark:text-green-100 text-lg">Berizin Resmi Kemenag</h4>
                            </div>
                            
                            <p class="text-sm text-green-800/70 dark:text-green-200/70 mb-4 leading-relaxed">
                                Kami terdaftar sebagai Penyelenggara Perjalanan Ibadah Umrah (PPIU) resmi untuk menjamin keamanan dan kenyamanan perjalanan ibadah Anda.
                            </p>
                            
                            <div class="inline-flex items-center space-x-2 bg-green-100 dark:bg-green-800/40 px-3 py-1.5 rounded-lg text-xs font-bold text-green-700 dark:text-green-300 border border-green-200 dark:border-green-700/50">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                <span>Terverifikasi via Siskohat Kemenag</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="relative scroll-animate flex justify-center mt-8 lg:mt-0" data-animation="fade-left">
                    <div class="w-full max-w-[320px] sm:max-w-[350px] aspect-[4/5] sm:aspect-[9/16] rounded-2xl md:rounded-[2.5rem] overflow-hidden shadow-2xl relative z-10 border-4 border-white dark:border-surface transition-all duration-500 bg-black">
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
                </div>
            </div>
        </div>
    </section>

    <!-- Divider with Palm -->
    <div class="divider-palm"></div>

    <!-- Section Keunggulan -->
    <section id="keunggulan" class="section-py transition-colors duration-500 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12 md:mb-16 scroll-animate" data-animation="fade-up">
                <h2 class="text-heading mb-3 md:mb-4">Keunggulan Kami</h2>
                <p class="text-sm md:text-base lg:text-lg text-text/70 max-w-2xl mx-auto px-2">
                    Kami berkomitmen memberikan pengalaman umroh terbaik dengan layanan terdepan
                </p>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-6 lg:gap-8">
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
    <section id="paket" class="section-py">
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
                    <div class="product-card bg-surface rounded-xl md:rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 overflow-hidden scroll-animate relative border flex flex-col {{ $product->status == 'featured' ? 'border-orange' : 'border-transparent' }}" data-animation="slide-up" data-name="{{ strtolower($product->name) }}">
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

                        <div class="h-60 md:h-[32rem] relative flex-shrink-0 group overflow-hidden rounded-t-xl">
                            @if($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}" class="w-full h-full object-cover filter brightness-90 transition duration-500 group-hover:scale-[1.02]">
                                <button type="button" onclick="openImageZoom(this.dataset.image, this.dataset.title)" data-image="{{ asset('storage/'.$product->image) }}" data-title="{{ $product->name }}" class="absolute inset-0 z-20 bg-transparent cursor-zoom-in" aria-label="Perbesar gambar paket"></button>
                                <div class="absolute bottom-4 right-4 z-30 bg-black/50 text-white text-[10px] uppercase tracking-[0.2em] px-3 py-1.5 rounded-full flex items-center gap-2 shadow-lg">
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
                                    <span>Perbesar</span>
                                </div>
                            @else
                                <div class="w-full h-full bg-gradient-sunset"></div>
                            @endif
                        </div>
                        <div class="p-4 sm:p-5 md:p-8 flex flex-col flex-grow">
                            <div class="flex-grow">
                                <h3 class="text-lg sm:text-xl md:text-2xl font-serif font-bold text-charcoal mb-1 sm:mb-2">{{ strtoupper($product->name) }}</h3>
                                <p class="text-brown text-[10px] sm:text-xs md:text-sm mb-1">Umroh {{ $product->duration }}</p>
                                @if($product->departure_date)
                                <p class="text-[10px] sm:text-xs font-semibold text-orange mb-3 sm:mb-4 flex items-center gap-1">
                                    <span>📅</span> Berangkat: {{ $product->departure_date->translatedFormat('d F Y') }}
                                </p>
                                @else
                                <p class="text-[10px] sm:text-xs text-text/40 italic mb-3 sm:mb-4">📅 Jadwal segera diumumkan</p>
                                @endif
                                <p class="text-xl sm:text-2xl md:text-3xl font-bold text-orange mb-4 sm:mb-6 text-brand">
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
                            
                            <div class="flex flex-col sm:flex-row gap-2 pt-4 border-t border-border/50 mt-auto">
                                <button onclick="openProductDetail({{ $product->id }})" class="btn-primary flex-1 text-xs py-3 rounded-xl shadow-none hover:shadow-lg">
                                    Lihat Detail
                                </button>
                                <a href="https://wa.me/{{ $product->guide_phone ?? $whatsapp }}?text=Halo%20Admin%20Al-Khairat,%20saya%20ingin%20konsultasi%20mengenai%20paket%20{{ urlencode($product->name) }}." target="_blank" class="flex-1 text-center {{ $product->status == 'featured' ? 'bg-emerald-600 shadow-md shadow-emerald-600/30' : 'bg-emerald-700 shadow-md shadow-emerald-700/30' }} text-white font-bold text-xs py-3 rounded-xl hover:scale-105 hover:shadow-lg hover:shadow-emerald-500/50 active:scale-95 active:shadow-md active:shadow-emerald-400/60 transition-all duration-200 flex items-center justify-center gap-1 touch-manipulation">
                                    <svg class="w-4 h-4 pointer-events-none" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.414 0 .018 5.393 0 12.029c0 2.119.554 4.188 1.61 6.01L0 24l6.135-1.61a11.75 11.75 0 005.912 1.593h.005c6.637 0 12.032-5.393 12.035-12.031a11.77 11.77 0 00-3.538-8.455z"/></svg>
                                    Konsultasi
                                </a>
                            </div>

                            <!-- Hidden Data for Modal -->
                            <div id="product-data-{{ $product->id }}" class="hidden" 
                                 data-name="{{ $product->name }}"
                                 data-price="Rp {{ number_format($product->price, 0, ',', '.') }}"
                                 data-duration="{{ $product->duration }}"
                                 data-departure-date="{{ $product->departure_date ? $product->departure_date->translatedFormat('d F Y') : '' }}"
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

    <!-- Image Zoom Modal -->
    <div id="image-zoom-modal" class="fixed inset-0 z-[4000] hidden items-center justify-center bg-black/90 backdrop-blur-xl p-4 overflow-hidden">
        <div class="relative w-full max-w-5xl h-[80vh] md:h-[90vh] rounded-[2rem] overflow-hidden bg-black shadow-2xl">
            <button onclick="closeImageZoom()" class="absolute top-4 right-4 z-50 bg-red-600 text-white rounded-full p-3 transition shadow-[0_0_20px_rgba(239,68,68,0.35)] ring-2 ring-red-400/50 hover:bg-red-500">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            <div class="flex flex-col h-full" onclick="event.stopPropagation()">
                <div class="relative flex-1 min-h-[60vh] overflow-hidden bg-black">
                <div id="zoom-image-frame" class="relative w-full h-full touch-none" style="touch-action: none;">
                    <img id="zoom-image" src="" alt="" draggable="false" ondragstart="return false;" class="absolute inset-0 w-full h-full object-contain" style="transform: translate3d(0px, 0px, 0px) scale(1); will-change: transform; -webkit-user-drag: none; user-drag: none; touch-action: none;">
                </div>
            </div>
            <div class="border-t border-white/10 bg-black/80 p-4 flex flex-col sm:flex-row items-center justify-between gap-3">
                    <div class="text-white text-sm font-medium">Lihat lebih jelas, geser zoom untuk memperbesar.</div>
                    <div class="flex items-center gap-2">
                        <button type="button" onclick="setImageZoom(0.1)" class="bg-white/10 hover:bg-white/20 text-white rounded-full p-3 transition">+</button>
                        <button type="button" onclick="setImageZoom(-0.1)" class="bg-white/10 hover:bg-white/20 text-white rounded-full p-3 transition">-</button>
                        <div class="text-white text-sm">Zoom: <span id="zoom-level-text">100%</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Divider with Palm -->
    <div class="divider-palm"></div>

    <!-- Savings Section -->
    <x-savings-section />

    <!-- Section Digital Guidance -->
    <section id="digital-guidance" class="section-py relative overflow-hidden transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10 md:mb-14 scroll-animate" data-animation="fade-up">
                <h2 class="text-heading mb-3 md:mb-4">Eksplorasi <span class="text-gradient-sunset">Digital Al-Khairat</span></h2>
                <p class="text-sm md:text-base lg:text-lg text-text/70 max-w-2xl mx-auto px-2">
                    Panduan ibadah dalam genggaman Anda. Nikmati kemudahan akses manasik dan panduan digital kapan saja.
                </p>
            </div>

            <!-- Video Container (Centred & Scaled Down) -->
            <div class="max-w-4xl mx-auto scroll-animate" data-animation="fade-up">
                <div class="relative group rounded-2xl md:rounded-[2rem] overflow-hidden shadow-2xl bg-black border-2 md:border-4 border-white dark:border-surface transition-all duration-500">
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
    <section id="testimoni" class="section-py transition-colors duration-500 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12 md:mb-16 scroll-animate" data-animation="fade-up">
                <h2 class="text-heading mb-3 md:mb-4">Testimonial Jemaat Kami</h2>
                <p class="text-sm md:text-base lg:text-lg text-brown max-w-2xl mx-auto px-2">
                    Ribuan jemaat telah merasakan kehangatan dalam perjalanan spiritual mereka
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6 mb-12 md:mb-16">
                @forelse($testimonials as $index => $t)
                <!-- Dynamic Testimonial -->
                <div class="bg-surface rounded-xl md:rounded-2xl p-5 md:p-8 border-l-4 border-orange hover:shadow-xl transition-all duration-300 scroll-animate" data-animation="slide-up" data-delay="{{ $index * 100 }}">
                    <div class="flex items-center space-x-1 mb-3 md:mb-5">
                        @for($i = 0; $i < $t->rating; $i++)
                        <span class="text-base md:text-xl">⭐</span>
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
                @auth
                <button onclick="toggleTestimoniModal(true)" class="btn-primary text-sm md:text-base px-6 md:px-10 py-3 w-full sm:w-auto">
                    Tulis Ulasan Anda
                </button>
                @else
                <a href="{{ route('login') }}" class="btn-primary text-sm md:text-base px-6 md:px-10 py-3 w-full sm:w-auto inline-flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                    Login untuk Tulis Ulasan
                </a>
                @endauth
                <a href="{{ route('gallery') }}" class="btn-secondary text-sm md:text-base px-6 md:px-10 py-3 w-full sm:w-auto inline-flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Lihat Galeri Makkah
                </a>
            </div>

            <!-- Modal Form Submit Testimoni (only for authenticated users) -->
            @auth
            <div id="testimoniFormModal" class="fixed inset-0 z-[2000] bg-black/60 backdrop-blur-sm hidden flex-col items-center justify-center p-4">
                <div class="bg-surface rounded-2xl p-6 md:p-8 shadow-2xl border border-border w-full max-w-3xl relative max-h-[90vh] overflow-y-auto animate-[slide-up_0.3s_ease-out]" onclick="event.stopPropagation()">
                    <!-- Close button -->
                    <button onclick="toggleTestimoniModal(false)" class="absolute top-4 right-4 text-gray-500 hover:text-red-500 transition text-2xl font-bold bg-white rounded-full w-8 h-8 flex items-center justify-center shadow-sm">&times;</button>
                    
                    <div class="text-center mb-6 mt-2">
                        <h3 class="text-2xl font-serif font-bold text-charcoal mb-2">Bagikan Pengalaman Anda</h3>
                        <p class="text-brown text-sm">Masukan Anda sangat berarti bagi kami untuk terus meningkatkan pelayanan.</p>
                    </div>

                    <!-- User Info Badge -->
                    <div class="flex items-center gap-3 bg-orange/5 border border-orange/20 rounded-xl px-4 py-3 mb-6">
                        <div class="w-10 h-10 rounded-full bg-gradient-sunset flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="font-bold text-charcoal text-sm">{{ auth()->user()->name }}</p>
                            <p class="text-brown text-xs">{{ auth()->user()->email }}</p>
                        </div>
                        <div class="ml-auto">
                            <span class="inline-flex items-center gap-1 bg-emerald-100 text-emerald-700 text-[10px] font-bold px-2.5 py-1 rounded-full">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Terverifikasi
                            </span>
                        </div>
                    </div>
                    
                    <form action="{{ route('testimonials.public') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-semibold text-text mb-1">Paket Umroh (Opsional)</label>
                            <select name="product_id" class="w-full px-4 py-2.5 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange focus:border-transparent bg-bg text-text transition">
                                <option value="" class="bg-surface">-- Tidak Memilih --</option>
                                @foreach($products as $p)
                                <option value="{{ $p->id }}" class="bg-surface">{{ $p->name }}</option>
                                @endforeach
                            </select>
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
            @endauth
        </div>
    </section>

    <!-- Divider with Palm -->
    <div class="divider-palm"></div>

    <!-- FAQ Section -->
    <!-- FAQ Section -->
    <section id="faq" class="section-py transition-colors duration-500">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 md:mb-16 scroll-animate" data-animation="fade-up">
                <h2 class="text-heading mb-3 md:mb-4">Pertanyaan yang Sering Diajukan</h2>
                <p class="text-sm md:text-base lg:text-lg text-text/70 px-2">
                    Temukan jawaban atas pertanyaan umum tentang paket umroh kami
                </p>
            </div>

            <div class="space-y-3 md:space-y-4" id="faq-list">
                <!-- FAQ 1 -->
                <div class="faq-item bg-surface rounded-2xl border-2 border-border hover:border-orange/50 overflow-hidden transition scroll-animate" data-animation="slide-up" data-delay="0">
                    <button onclick="toggleFaq(this)" class="w-full p-5 md:p-6 text-left flex justify-between items-center hover:bg-bg transition cursor-pointer">
                        <span class="font-serif font-bold text-text text-sm md:text-lg">Berapa biaya yang diperlukan?</span>
                        <span class="faq-icon text-xl md:text-2xl text-orange transition-transform duration-300 flex-shrink-0 ml-3">+</span>
                    </button>
                    <div class="faq-answer" style="max-height:0;overflow:hidden;transition:max-height 0.4s ease, padding 0.4s ease;padding:0 1.25rem;">
                        <div class="pb-5 md:pb-6 pt-3 text-text/70 text-sm md:text-base border-t border-border leading-relaxed">
                            Biaya umroh tergantung pada paket yang Anda pilih. Hubungi kami untuk penawaran terbaik sesuai dengan budget Anda.
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="faq-item bg-surface rounded-2xl border-2 border-border hover:border-orange/50 overflow-hidden transition scroll-animate" data-animation="slide-up" data-delay="100">
                    <button onclick="toggleFaq(this)" class="w-full p-5 md:p-6 text-left flex justify-between items-center hover:bg-bg transition cursor-pointer">
                        <span class="font-serif font-bold text-text text-sm md:text-lg">Apakah visa sudah termasuk?</span>
                        <span class="faq-icon text-xl md:text-2xl text-orange transition-transform duration-300 flex-shrink-0 ml-3">+</span>
                    </button>
                    <div class="faq-answer" style="max-height:0;overflow:hidden;transition:max-height 0.4s ease, padding 0.4s ease;padding:0 1.25rem;">
                        <div class="pb-5 md:pb-6 pt-3 text-text/70 text-sm md:text-base border-t border-border leading-relaxed">
                            Ya, semua paket kami sudah termasuk biaya visa dan asuransi perjalanan.
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="faq-item bg-surface rounded-2xl border-2 border-border hover:border-orange/50 overflow-hidden transition scroll-animate" data-animation="slide-up" data-delay="200">
                    <button onclick="toggleFaq(this)" class="w-full p-5 md:p-6 text-left flex justify-between items-center hover:bg-bg transition cursor-pointer">
                        <span class="font-serif font-bold text-text text-sm md:text-lg">Berapa orang minimal untuk keberangkatan?</span>
                        <span class="faq-icon text-xl md:text-2xl text-orange transition-transform duration-300 flex-shrink-0 ml-3">+</span>
                    </button>
                    <div class="faq-answer" style="max-height:0;overflow:hidden;transition:max-height 0.4s ease, padding 0.4s ease;padding:0 1.25rem;">
                        <div class="pb-5 md:pb-6 pt-3 text-text/70 text-sm md:text-base border-t border-border leading-relaxed">
                            Tidak ada minimal peserta. Kami berangkat setiap bulan dengan jadwal terjadwal.
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="faq-item bg-surface rounded-2xl border-2 border-border hover:border-orange/50 overflow-hidden transition scroll-animate" data-animation="slide-up" data-delay="300">
                    <button onclick="toggleFaq(this)" class="w-full p-5 md:p-6 text-left flex justify-between items-center hover:bg-bg transition cursor-pointer">
                        <span class="font-serif font-bold text-text text-sm md:text-lg">Apakah ada asuransi kesehatan?</span>
                        <span class="faq-icon text-xl md:text-2xl text-orange transition-transform duration-300 flex-shrink-0 ml-3">+</span>
                    </button>
                    <div class="faq-answer" style="max-height:0;overflow:hidden;transition:max-height 0.4s ease, padding 0.4s ease;padding:0 1.25rem;">
                        <div class="pb-5 md:pb-6 pt-3 text-text/70 text-sm md:text-base border-t border-border leading-relaxed">
                            Ya, semua peserta mendapatkan asuransi kesehatan perjalanan yang komprehensif.
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function toggleFaq(btn) {
                    const item = btn.closest('.faq-item');
                    const answer = item.querySelector('.faq-answer');
                    const icon = btn.querySelector('.faq-icon');
                    const isOpen = answer.style.maxHeight && answer.style.maxHeight !== '0px';

                    // Close all others
                    document.querySelectorAll('.faq-item').forEach(other => {
                        if (other !== item) {
                            const otherAnswer = other.querySelector('.faq-answer');
                            const otherIcon = other.querySelector('.faq-icon');
                            otherAnswer.style.maxHeight = '0px';
                            otherAnswer.style.padding = '0 1.25rem';
                            otherIcon.style.transform = 'rotate(0deg)';
                            otherIcon.textContent = '+';
                        }
                    });

                    if (isOpen) {
                        answer.style.maxHeight = '0px';
                        answer.style.padding = '0 1.25rem';
                        icon.style.transform = 'rotate(0deg)';
                        icon.textContent = '+';
                    } else {
                        answer.style.maxHeight = answer.scrollHeight + 'px';
                        answer.style.padding = '0 1.25rem';
                        icon.style.transform = 'rotate(45deg)';
                        icon.textContent = '+';
                    }
                }
            </script>
        </div>
    </section>

    <x-contact-section />

    <!-- Product Detail Modal -->
    <div id="product-detail-modal" class="fixed inset-0 z-[2000] bg-black/80 backdrop-blur-md hidden flex items-center justify-center p-4">
        <div class="bg-surface w-full max-w-4xl rounded-3xl shadow-2xl animate-[slide-up_0.4s_ease-out] relative max-h-[90vh] flex flex-col md:flex-row overflow-y-auto md:overflow-hidden">
            <!-- Close Button -->
            <button onclick="closeProductDetail()" class="absolute top-4 right-4 z-50 bg-white/20 backdrop-blur-md hover:bg-orange/20 text-charcoal hover:text-orange rounded-full p-2.5 transition shadow-lg">
                <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <!-- Image Side -->
            <div class="w-full md:w-1/2 h-52 sm:h-64 md:h-auto relative">
                <img id="detail-image" src="" alt="" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-4 left-4 md:bottom-8 md:left-8 text-white">
                    <span id="detail-category" class="bg-orange px-2.5 py-1 rounded-full text-[10px] md:text-xs font-bold uppercase mb-2 inline-block shadow-lg"></span>
                    <h3 id="detail-name" class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-serif font-bold leading-tight"></h3>
                </div>
            </div>

            <!-- Content Side -->
            <div class="w-full md:w-1/2 p-5 sm:p-6 md:p-10 md:overflow-y-auto bg-surface">
                <div class="mb-6 md:mb-8">
                    <p class="text-orange text-2xl md:text-3xl lg:text-4xl font-bold mb-1" id="detail-price"></p>
                    <p class="text-text/60 text-[10px] md:text-sm font-medium tracking-wide" id="detail-duration"></p>
                    <div id="detail-departure-container" class="mt-4 flex items-center gap-3 bg-orange/5 border border-orange/10 rounded-2xl px-4 py-3 md:py-4">
                        <span class="text-orange text-xl">📅</span>
                        <div>
                            <p class="text-[9px] md:text-[10px] font-bold text-text/40 uppercase tracking-widest leading-none mb-1">Estimasi Berangkat</p>
                            <p class="font-bold text-text text-sm md:text-base" id="detail-departure-date"></p>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <h4 class="text-base md:text-lg font-bold text-text mb-2">Deskripsi Paket</h4>
                        <p id="detail-description" class="text-text/70 text-xs md:text-sm leading-relaxed"></p>
                    </div>

                    <div>
                        <h4 class="text-base md:text-lg font-bold text-text mb-3">Apa yang Anda Dapatkan?</h4>
                        <ul id="detail-features" class="grid grid-cols-1 gap-2.5">
                            <!-- Features will be injected here -->
                        </ul>
                    </div>
                </div>

                <div class="mt-8 md:mt-12 pt-6 border-t border-border flex flex-col sm:flex-row gap-3">
                    <button onclick="openBookingModal()" class="flex-1 text-center bg-orange text-white font-bold py-3.5 md:py-4 rounded-2xl shadow-xl shadow-orange/20 hover:bg-orange-bright hover:scale-[1.02] transition-all flex items-center justify-center gap-2">
                        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        <span class="text-sm md:text-base">Daftar Sekarang</span>
                    </button>
                    <a id="detail-wa-link" href="https://wa.me/6281253088788?text=Halo%20Admin%20Al-Khairat,%20saya%20ingin%20bertanya%20lebih%20lanjut%20tentang%20paket%20Paket%20Standar%20Madinah-Makkah." target="_blank" class="flex-1 text-center bg-emerald-600 text-white font-bold py-3.5 md:py-4 rounded-2xl shadow-lg shadow-emerald-500/20 hover:bg-emerald-500 hover:scale-[1.02] hover:shadow-emerald-400/30 hover:shadow-xl active:scale-95 transition-all duration-200 flex items-center justify-center gap-2 touch-manipulation">
                        <svg class="w-5 h-5 md:w-6 md:h-6 pointer-events-none" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.414 0 .018 5.393 0 12.029c0 2.119.554 4.188 1.61 6.01L0 24l6.135-1.61a11.75 11.75 0 005.912 1.593h.005c6.637 0 12.032-5.393 12.035-12.031a11.77 11.77 0 00-3.538-8.455z"/></svg>
                        <span class="text-sm md:text-base">Tanya Jadwal</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Form Modal -->
    <div id="booking-modal" class="fixed inset-0 z-[3000] bg-black/80 backdrop-blur-md hidden flex items-center justify-center p-4">
        <div class="bg-surface w-full max-w-2xl rounded-[2.5rem] overflow-hidden shadow-2xl animate-[scaleUp_0.4s_ease-out] relative">
            <button onclick="closeBookingModal()" class="absolute top-6 right-6 z-50 bg-charcoal/10 hover:bg-orange/20 text-charcoal hover:text-orange rounded-full p-2 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            <div class="p-6 md:p-12 overflow-y-auto max-h-[90vh]">
                <div class="text-center mb-6 md:mb-8">
                    <h3 class="text-2xl md:text-3xl font-serif font-bold text-charcoal mb-2">Form Pendaftaran</h3>
                    <p class="text-brown text-xs md:text-sm">Silakan lengkapi data diri Anda untuk pendaftaran paket <span id="booking-target-name" class="font-bold text-orange"></span></p>
                </div>

                <form action="{{ route('bookings.public') }}" method="POST" class="space-y-4 md:space-y-5">
                    @csrf
                    <input type="hidden" name="product_id" id="booking-product-id">
                    
                    <div>
                        <label class="block text-[10px] md:text-xs font-bold text-charcoal uppercase tracking-widest mb-1.5 md:mb-2 text-left">Nama Pemesan (Penanggung Jawab)</label>
                        <input type="text" name="orderer_name" required value="{{ Auth::user()->name ?? '' }}" class="w-full px-4 md:px-5 py-3 md:py-4 bg-bg border-2 border-border/50 rounded-2xl focus:border-orange focus:outline-none transition-all text-sm md:text-base font-medium" placeholder="Nama Lengkap">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-[10px] md:text-xs font-bold text-charcoal uppercase tracking-widest mb-1.5 md:mb-2 text-left">Email Pemesan</label>
                            <input type="email" name="orderer_email" required value="{{ Auth::user()->email ?? '' }}" class="w-full px-4 md:px-5 py-3 md:py-4 bg-bg border-2 border-border/50 rounded-2xl focus:border-orange focus:outline-none transition-all text-sm md:text-base font-medium" placeholder="email@contoh.com">
                        </div>
                        <div>
                            <label class="block text-[10px] md:text-xs font-bold text-charcoal uppercase tracking-widest mb-1.5 md:mb-2 text-left">No. HP / WhatsApp</label>
                            <input type="tel" name="orderer_phone" required pattern="[0-9]+" oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="{{ Auth::user()->phone ?? '' }}" class="w-full px-4 md:px-5 py-3 md:py-4 bg-bg border-2 border-border/50 rounded-2xl focus:border-orange focus:outline-none transition-all text-sm md:text-base font-medium" placeholder="0812xxxxxxxx">
                        </div>
                    </div>

                    <div class="pt-4 border-t border-border/20 mt-4">
                        <label class="block text-[10px] md:text-xs font-bold text-orange uppercase tracking-[0.2em] mb-4 text-left">Data Jamaah Utama</label>
                        <div>
                            <label class="block text-[10px] md:text-xs font-bold text-charcoal uppercase tracking-widest mb-1.5 md:mb-2 text-left">Nama Lengkap Jamaah</label>
                            <input type="text" name="full_name[]" required value="{{ Auth::user()->name ?? '' }}" class="w-full px-4 md:px-5 py-3 md:py-4 bg-bg border-2 border-border/50 rounded-2xl focus:border-orange focus:outline-none transition-all text-sm md:text-base" placeholder="Nama Sesuai KTP/Paspor">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-charcoal uppercase tracking-widest mb-2">NIK KTP (16 Digit)</label>
                            <input type="text" name="nik[]" required maxlength="16" pattern="[0-9]{16}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" title="NIK harus berupa 16 digit angka" value="{{ Auth::user()->nik ?? '' }}" class="w-full px-5 py-4 bg-bg border-2 border-border/50 rounded-2xl focus:border-orange focus:outline-none transition-all" placeholder="327xxxxxxxxxxxxx">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-charcoal uppercase tracking-widest mb-2">Jumlah Kursi</label>
                            <input type="number" name="booking_seat" required min="1" value="1" class="w-full px-5 py-4 bg-bg border-2 border-border/50 rounded-2xl focus:border-orange focus:outline-none transition-all">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-charcoal uppercase tracking-widest mb-2">Tempat Lahir</label>
                            <input type="text" name="birth_place[]" required value="{{ Auth::user()->birth_place ?? '' }}" class="w-full px-5 py-4 bg-bg border-2 border-border/50 rounded-2xl focus:border-orange focus:outline-none transition-all" placeholder="Samarinda">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-charcoal uppercase tracking-widest mb-2">Tanggal Lahir</label>
                            <input type="date" name="birth_date[]" required value="{{ Auth::user()->birth_date ?? '' }}" class="w-full px-5 py-4 bg-bg border-2 border-border/50 rounded-2xl focus:border-orange focus:outline-none transition-all">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-charcoal uppercase tracking-widest mb-2">Alamat Lengkap</label>
                        <textarea name="address[]" required rows="3" class="w-full px-5 py-4 bg-bg border-2 border-border/50 rounded-2xl focus:border-orange focus:outline-none transition-all" placeholder="Jl. Lambung Mangkurat No. 29, Samarinda">{{ Auth::user()->address ?? '' }}</textarea>
                    </div>

                    <button type="submit" class="w-full bg-gradient-sunset text-white font-bold py-4 md:py-5 rounded-2xl shadow-xl hover:shadow-orange/30 hover:-translate-y-1 transition duration-300 transform active:scale-95 text-sm md:text-base">
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
                        <li>📞 +62 812-5308-8788</li>
                        <li>📧 info@alkhairat.com</li>
                        <li>📍 Samarinda, Kalimantan Timur</li>
                    </ul>
                </div>

                <!-- Social -->
                <div>
                    <h4 class="font-serif font-bold mb-3 md:mb-4 text-gold text-xs md:text-base">Ikuti Kami</h4>
                    <div class="flex space-x-3 md:space-x-4">
                        <a href="https://www.facebook.com/alkhairattour/" target="_blank" class="w-10 h-10 md:w-11 md:h-11 rounded-full flex items-center justify-center hover:shadow-xl transition-all text-white shadow-lg shadow-blue-500/20 hover:-translate-y-1" style="background-color: #1877F2;">
                            <svg class="w-5 h-5 md:w-6 md:h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.312h3.587l-.467 3.622h-3.12v9.294h6.116c.73 0 1.323-.593 1.323-1.324v-21.35c0-.732-.593-1.325-1.323-1.325z"/>
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/alkhairat_tour/" target="_blank" class="w-10 h-10 md:w-11 md:h-11 rounded-full flex items-center justify-center hover:shadow-xl transition-all text-white shadow-lg shadow-pink-500/20 hover:-translate-y-1" style="background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);">
                            <svg class="w-5 h-5 md:w-6 md:h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="https://wa.me/{{ $whatsapp ?? '6281253088788' }}" target="_blank" class="w-10 h-10 md:w-11 md:h-11 rounded-full flex items-center justify-center hover:shadow-xl transition-all text-white shadow-lg shadow-green-500/20 hover:-translate-y-1" style="background-color: #25D366;">
                            <svg class="w-5 h-5 md:w-6 md:h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.012 2c-5.508 0-9.988 4.48-9.988 9.988 0 1.764.46 3.524 1.34 5.088l-1.42 5.188 5.304-1.392c1.48.804 3.148 1.232 4.884 1.232 5.508 0 9.988-4.48 9.988-9.988s-4.48-9.988-9.988-9.988zm0 18.296c-1.572 0-3.112-.424-4.464-1.22l-.32-.188-3.308.868.884-3.232-.208-.332c-.876-1.392-1.336-3.008-1.336-4.664 0-4.692 3.816-8.508 8.508-8.508s8.508 3.816 8.508 8.508-3.816 8.508-8.508 8.508zm4.688-6.424c-.256-.128-1.52-.752-1.752-.84-.232-.088-.4-.128-.568.128-.168.256-.648.84-.792 1.008-.144.168-.288.192-.544.064-.256-.128-1.08-.4-2.064-1.272-.76-.68-1.272-1.52-1.424-1.776-.152-.256-.016-.392.112-.52.112-.112.256-.296.384-.44.128-.144.168-.24.256-.4s.048-.296-.024-.44c-.072-.144-.568-1.368-.776-1.872-.208-.496-.408-.432-.56-.44h-.48c-.168 0-.44.064-.672.32-.232.256-.888.872-.888 2.128 0 1.256.912 2.472 1.04 2.64.128.168 1.792 2.736 4.344 3.832.608.264 1.08.424 1.448.544.608.192 1.16.168 1.6.104.488-.072 1.504-.616 1.72-1.216.216-.6.216-1.12.152-1.216-.064-.096-.24-.144-.496-.272z"/>
                            </svg>
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
            
            // Departure Date
            const departureDate = data.dataset.departureDate;
            const departureDateEl = document.getElementById('detail-departure-date');
            const departureContainer = document.getElementById('detail-departure-container');
            if (departureDate && departureDate !== '') {
                departureDateEl.innerText = departureDate;
                departureContainer.classList.remove('hidden');
            } else {
                departureDateEl.innerText = 'Jadwal segera diumumkan';
                departureContainer.classList.remove('hidden');
            }
            
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

        // --- Image Zoom Modal Logic ---
        let currentZoomLevel = 1;
        let currentPanX = 0;
        let currentPanY = 0;
        let isPanning = false;
        let panStartX = 0;
        let panStartY = 0;
        let panOriginX = 0;
        let panOriginY = 0;
        const zoomStep = 0.1;
        const zoomMax = 3;
        const zoomMin = 1;

        function updateZoomTransform() {
            const zoomImage = document.getElementById('zoom-image');
            zoomImage.style.transform = `translate3d(${currentPanX}px, ${currentPanY}px, 0px) scale(${currentZoomLevel})`;
        }

        function resetZoomState() {
            currentZoomLevel = 1;
            currentPanX = 0;
            currentPanY = 0;
            panStartX = 0;
            panStartY = 0;
            panOriginX = 0;
            panOriginY = 0;
            updateZoomTransform();
        }

        function openImageZoom(imageSrc, imageTitle) {
            const modal = document.getElementById('image-zoom-modal');
            const zoomImage = document.getElementById('zoom-image');
            const zoomText = document.getElementById('zoom-level-text');
            const zoomFrame = document.getElementById('zoom-image-frame');
            resetZoomState();

            zoomImage.src = imageSrc || 'https://via.placeholder.com/1200x800?text=Gambar+Tidak+Tersedia';
            zoomImage.alt = imageTitle || 'Gambar paket umroh';
            zoomImage.style.transition = 'transform 0.2s ease';
            zoomText.textContent = '100%';

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
            document.documentElement.style.overflow = 'hidden';

            // enable panning only when image is zoomed
            zoomFrame.style.cursor = 'grab';

            // Add wheel event listener for scroll zoom
            zoomFrame.addEventListener('wheel', handleZoomWheel);
        }

        function closeImageZoom() {
            const modal = document.getElementById('image-zoom-modal');
            const zoomFrame = document.getElementById('zoom-image-frame');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
            document.documentElement.style.overflow = '';

            // Remove wheel event listener
            zoomFrame.removeEventListener('wheel', handleZoomWheel);
        }

        function setImageZoom(delta) {
            const zoomText = document.getElementById('zoom-level-text');
            currentZoomLevel = Math.min(zoomMax, Math.max(zoomMin, currentZoomLevel + delta));
            if (currentZoomLevel === 1) {
                currentPanX = 0;
                currentPanY = 0;
            }
            updateZoomTransform();
            zoomText.textContent = `${Math.round(currentZoomLevel * 100)}%`;
        }

        function handleZoomWheel(event) {
            event.preventDefault();
            const delta = event.deltaY > 0 ? -zoomStep : zoomStep;
            setImageZoom(delta);
        }

        function startImagePan(event) {
            event.preventDefault();
            if (currentZoomLevel <= 1) return;
            const frame = document.getElementById('zoom-image-frame');
            const zoomImage = document.getElementById('zoom-image');
            isPanning = true;
            panStartX = event.clientX;
            panStartY = event.clientY;
            panOriginX = currentPanX;
            panOriginY = currentPanY;
            frame.setPointerCapture(event.pointerId);
            frame.style.cursor = 'grabbing';
            zoomImage.style.transition = 'none';
            document.addEventListener('pointermove', moveImagePan);
            document.addEventListener('pointerup', endImagePan);
            document.addEventListener('pointercancel', endImagePan);
        }

        function moveImagePan(event) {
            if (!isPanning) return;
            const deltaX = event.clientX - panStartX;
            const deltaY = event.clientY - panStartY;
            currentPanX = panOriginX + deltaX;
            currentPanY = panOriginY + deltaY;
            updateZoomTransform();
            event.preventDefault();
        }

        function endImagePan(event) {
            if (!isPanning) return;
            const frame = document.getElementById('zoom-image-frame');
            const zoomImage = document.getElementById('zoom-image');
            isPanning = false;
            frame.releasePointerCapture(event.pointerId);
            frame.style.cursor = 'grab';
            zoomImage.style.transition = 'transform 0.2s ease';
            document.removeEventListener('pointermove', moveImagePan);
            document.removeEventListener('pointerup', endImagePan);
            document.removeEventListener('pointercancel', endImagePan);
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
                closeImageZoom();
                closeVoiceSearch();
                // Close search overlay if not visible? No, search has its own logic.
            }
        });

        // Close on Backdrop Click for non-zoom modals only
        window.addEventListener('click', (e) => {
            const detailModal = document.getElementById('product-detail-modal');
            const bookingModal = document.getElementById('booking-modal');
            if (e.target === detailModal) closeProductDetail();
            if (e.target === bookingModal) closeBookingModal();
        });

        // Image pan handlers for zoom modal
        const zoomFrame = document.getElementById('zoom-image-frame');
        if (zoomFrame) {
            zoomFrame.addEventListener('pointerdown', startImagePan);
            zoomFrame.addEventListener('pointermove', moveImagePan);
            zoomFrame.addEventListener('pointerup', endImagePan);
            zoomFrame.addEventListener('pointerleave', endImagePan);
            zoomFrame.addEventListener('pointercancel', endImagePan);
        }

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
