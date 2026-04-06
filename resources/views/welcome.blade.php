<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al-Khairat - Perjalanan Penuh Kehangatan</title>
    
    @vite(['resources/css/app.css'])
</head>
<body class="bg-cream font-sans text-charcoal">
    <!-- Loading Screen -->
    <div id="loading-screen" class="fixed inset-0 bg-gradient-to-br from-cream via-white to-cream flex flex-col items-center justify-center z-[9999] opacity-100 transition-opacity duration-500">
        <div class="relative w-32 h-32 md:w-40 md:h-40">
            <!-- Rotating stars container -->
            <div class="stars-container absolute inset-0 flex items-center justify-center">
                <div class="star star-1 absolute">✨</div>
                <div class="star star-2 absolute">✨</div>
                <div class="star star-3 absolute">✨</div>
                <div class="star star-4 absolute">✨</div>
                <div class="star star-5 absolute">✨</div>
                <div class="star star-6 absolute">✨</div>
                <div class="star star-7 absolute">✨</div>
                <div class="star star-8 absolute">✨</div>
            </div>
            
            <!-- Center logo -->
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-6xl md:text-7xl opacity-90">🌴</div>
            </div>
        </div>
        
        <!-- Loading text -->
        <p class="mt-8 md:mt-12 text-charcoal font-serif text-lg md:text-xl font-bold text-center">
            <span class="inline-block animate-pulse">Mempersiapkan Perjalanan Spiritual Anda</span>
        </p>
        <div class="mt-4 flex justify-center space-x-1">
            <span class="w-2 h-2 bg-orange rounded-full animate-bounce" style="animation-delay: 0s"></span>
            <span class="w-2 h-2 bg-orange rounded-full animate-bounce" style="animation-delay: 0.2s"></span>
            <span class="w-2 h-2 bg-orange rounded-full animate-bounce" style="animation-delay: 0.4s"></span>
        </div>
    </div>
    
    <!-- Navigation Header -->
    <nav class="bg-cream sticky top-0 z-50 border-b border-orange/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 md:h-20">
                <!-- Logo -->
                <div class="flex items-center space-x-2 md:space-x-3 group cursor-pointer">
                    <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-gradient-sunset flex items-center justify-center text-lg md:text-xl group-hover:shadow-lg transition transform group-hover:scale-110">
                        🌴
                    </div>
                    <div class="font-serif text-xl md:text-2xl font-bold text-gradient-sunset">Al-Khairat</div>
                </div>
                
                <!-- Navigation Menu - Desktop -->
                <div class="hidden md:flex space-x-6 lg:space-x-8">
                    <a href="#keunggulan" class="text-charcoal hover:text-sunset-orange transition font-medium text-sm lg:text-base">Keunggulan</a>
                    <a href="#paket" class="text-charcoal hover:text-sunset-orange transition font-medium text-sm lg:text-base">Paket</a>
                    <a href="#testimoni" class="text-charcoal hover:text-sunset-orange transition font-medium text-sm lg:text-base">Testimoni</a>
                    <a href="#faq" class="text-charcoal hover:text-sunset-orange transition font-medium text-sm lg:text-base">FAQ</a>
                </div>
                
                <!-- WhatsApp Button - Desktop -->
                <a href="https://wa.me/62" target="_blank" class="hidden md:flex btn-primary items-center space-x-2 text-sm lg:text-base px-4 lg:px-8 py-2 lg:py-3">
                    <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-9.746 9.798c0 2.734.732 5.41 2.124 7.738l-2.257 6.545 6.783-2.223c2.226 1.185 4.74 1.81 7.387 1.81h.006c5.397 0 9.81-4.395 10.007-9.803.002-.493-.071-1.205-.071-1.205 0-5.46-4.438-9.86-9.9-9.86z"/>
                    </svg>
                    <span>Hubungi</span>
                </a>
                
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden flex flex-col space-y-1.5 w-8 h-8 items-center justify-center">
                    <span class="w-6 h-0.5 bg-charcoal block transition-all duration-300 origin-center"></span>
                    <span class="w-6 h-0.5 bg-charcoal block transition-all duration-300 origin-center"></span>
                    <span class="w-6 h-0.5 bg-charcoal block transition-all duration-300 origin-center"></span>
                </button>
                
                <!-- Mobile WhatsApp Button -->
                <a href="https://wa.me/62" target="_blank" class="md:hidden btn-primary flex items-center space-x-1 text-xs px-3 py-2">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-9.746 9.798c0 2.734.732 5.41 2.124 7.738l-2.257 6.545 6.783-2.223c2.226 1.185 4.74 1.81 7.387 1.81h.006c5.397 0 9.81-4.395 10.007-9.803.002-.493-.071-1.205-.071-1.205 0-5.46-4.438-9.86-9.9-9.86z"/>
                    </svg>
                    <span>WA</span>
                </a>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="mobile-menu md:hidden">
            <a href="#keunggulan" class="mobile-menu-item">Keunggulan</a>
            <a href="#paket" class="mobile-menu-item">Paket</a>
            <a href="#testimoni" class="mobile-menu-item">Testimoni</a>
            <a href="#faq" class="mobile-menu-item">FAQ</a>
        </div>
    </nav>

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
        <div class="absolute inset-0 bg-black/40 z-10"></div>
        
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
                    <button class="btn-primary text-sm md:text-base px-6 md:px-10 py-3 md:py-4 hover:shadow-2xl transition transform hover:scale-105">
                        Daftar Sekarang
                    </button>
                    <button class="btn-secondary text-sm md:text-base px-6 md:px-10 py-3 md:py-4 hover:shadow-2xl transition transform hover:scale-105">
                        Lihat Paket
                    </button>
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

    <!-- Divider with Palm -->
    <div class="divider-palm"></div>

    <!-- Section Keunggulan -->
    <section id="keunggulan" class="section-py bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 md:mb-16 scroll-animate" data-animation="fade-up">
                <h2 class="text-heading mb-3 md:mb-4">Keunggulan Kami</h2>
                <p class="text-sm md:text-base lg:text-lg text-brown max-w-2xl mx-auto px-2">
                    Kami berkomitmen memberikan pengalaman umroh terbaik dengan layanan terdepan
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-8">
                <!-- Feature 1 -->
                <div class="text-center p-4 md:p-6 rounded-lg md:rounded-xl bg-gradient-to-br from-cream to-white border-2 border-orange/20 hover:border-orange transition group scroll-animate" data-animation="slide-up" data-delay="0">
                    <div class="w-14 h-14 md:w-16 md:h-16 rounded-full bg-gradient-sunset flex items-center justify-center mx-auto mb-3 md:mb-4 text-xl md:text-2xl group-hover:shadow-lg group-hover:scale-110 transition flex-shrink-0">
                        ✈️
                    </div>
                    <h3 class="text-lg md:text-xl font-serif font-bold text-charcoal mb-2 md:mb-3">Pesawat Tanpa Transit</h3>
                    <p class="text-brown text-xs md:text-sm">Terbang langsung ke Jeddah tanpa perjalanan yang menguras energi</p>
                </div>

                <!-- Feature 2 -->
                <div class="text-center p-4 md:p-6 rounded-lg md:rounded-xl bg-gradient-to-br from-cream to-white border-2 border-orange/20 hover:border-orange transition group scroll-animate" data-animation="slide-up" data-delay="100">
                    <div class="w-14 h-14 md:w-16 md:h-16 rounded-full bg-gradient-sunset flex items-center justify-center mx-auto mb-3 md:mb-4 text-xl md:text-2xl group-hover:shadow-lg group-hover:scale-110 transition flex-shrink-0">
                        🏨
                    </div>
                    <h3 class="text-lg md:text-xl font-serif font-bold text-charcoal mb-2 md:mb-3">Hotel Dekat Masjid</h3>
                    <p class="text-brown text-xs md:text-sm">Lokasi strategis berjarak hanya 5-10 menit dari Masjidil Haram</p>
                </div>

                <!-- Feature 3 -->
                <div class="text-center p-4 md:p-6 rounded-lg md:rounded-xl bg-gradient-to-br from-cream to-white border-2 border-orange/20 hover:border-orange transition group scroll-animate" data-animation="slide-up" data-delay="200">
                    <div class="w-14 h-14 md:w-16 md:h-16 rounded-full bg-gradient-sunset flex items-center justify-center mx-auto mb-3 md:mb-4 text-xl md:text-2xl group-hover:shadow-lg group-hover:scale-110 transition flex-shrink-0">
                        👨‍🍳
                    </div>
                    <h3 class="text-lg md:text-xl font-serif font-bold text-charcoal mb-2 md:mb-3">Makanan Berkualitas</h3>
                    <p class="text-brown text-xs md:text-sm">Menu makanan sehat dan halal yang lezat setiap hari</p>
                </div>

                <!-- Feature 4 -->
                <div class="text-center p-4 md:p-6 rounded-lg md:rounded-xl bg-gradient-to-br from-cream to-white border-2 border-orange/20 hover:border-orange transition group scroll-animate" data-animation="slide-up" data-delay="300">
                    <div class="w-14 h-14 md:w-16 md:h-16 rounded-full bg-gradient-sunset flex items-center justify-center mx-auto mb-3 md:mb-4 text-xl md:text-2xl group-hover:shadow-lg group-hover:scale-110 transition flex-shrink-0">
                        📱
                    </div>
                    <h3 class="text-lg md:text-xl font-serif font-bold text-charcoal mb-2 md:mb-3">Guide Berpengalaman</h3>
                    <p class="text-brown text-xs md:text-sm">Tim profesional siap membantu Anda 24 jam non-stop</p>
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
                <!-- Paket 1 -->
                <div class="bg-white rounded-xl md:rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 overflow-hidden scroll-animate" data-animation="slide-up" data-delay="0">
                    <div class="h-24 md:h-32 bg-gradient-sunset"></div>
                    <div class="p-5 md:p-8">
                        <h3 class="text-xl md:text-2xl font-serif font-bold text-charcoal mb-2">PAKET STANDAR</h3>
                        <p class="text-brown text-xs md:text-sm mb-4 md:mb-6">Umroh 9 Hari</p>
                        <p class="text-2xl md:text-4xl font-bold text-orange mb-4 md:mb-6">
                            Hubungi
                            <span class="text-base md:text-lg block text-brown mt-1 md:mt-2">untuk harga spesial</span>
                        </p>
                        <ul class="space-y-2 md:space-y-3 mb-6 md:mb-8">
                            <li class="flex items-center space-x-2 text-brown text-sm md:text-base">
                                <span class="text-orange text-lg md:text-xl flex-shrink-0">✓</span>
                                <span>Penerbangan dari Jakarta</span>
                            </li>
                            <li class="flex items-center space-x-2 text-brown text-sm md:text-base">
                                <span class="text-orange text-lg md:text-xl flex-shrink-0">✓</span>
                                <span>Hotel bintang 4 dekat Masjid</span>
                            </li>
                            <li class="flex items-center space-x-2 text-brown text-sm md:text-base">
                                <span class="text-orange text-lg md:text-xl flex-shrink-0">✓</span>
                                <span>Visa dan asuransi</span>
                            </li>
                            <li class="flex items-center space-x-2 text-brown text-sm md:text-base">
                                <span class="text-orange text-lg md:text-xl flex-shrink-0">✓</span>
                                <span>Makan 3x sehari</span>
                            </li>
                        </ul>
                        <button class="w-full btn-secondary text-xs md:text-base py-2 md:py-3">
                            Hubungi Via WhatsApp
                        </button>
                    </div>
                </div>

                <!-- Paket 2 - Highlighted -->
                <div class="bg-white rounded-xl md:rounded-2xl shadow-lg md:shadow-2xl transform md:scale-105 overflow-hidden border-2 border-orange relative hover:shadow-2xl md:hover:shadow-2xl transition md:transition scroll-animate" data-animation="scale-up" data-delay="100">
                    <div class="absolute top-3 right-3 md:top-4 md:right-4 bg-gradient-sunset text-white px-3 md:px-4 py-0.5 md:py-1 rounded-full text-xs md:text-sm font-semibold">
                        TERPOPULER
                    </div>
                    <div class="h-24 md:h-32 bg-gradient-sunset"></div>
                    <div class="p-5 md:p-8">
                        <h3 class="text-xl md:text-2xl font-serif font-bold text-charcoal mb-2">PAKET PREMIUM</h3>
                        <p class="text-brown text-xs md:text-sm mb-4 md:mb-6">Umroh 14 Hari</p>
                        <p class="text-2xl md:text-4xl font-bold text-orange mb-4 md:mb-6">
                            Hubungi
                            <span class="text-base md:text-lg block text-brown mt-1 md:mt-2">untuk harga spesial</span>
                        </p>
                        <ul class="space-y-2 md:space-y-3 mb-6 md:mb-8">
                            <li class="flex items-center space-x-2 text-brown text-sm md:text-base">
                                <span class="text-orange text-lg md:text-xl flex-shrink-0">✓</span>
                                <span>Pesawat premium tanpa transit</span>
                            </li>
                            <li class="flex items-center space-x-2 text-brown text-sm md:text-base">
                                <span class="text-orange text-lg md:text-xl flex-shrink-0">✓</span>
                                <span>Hotel bintang 5 luxury</span>
                            </li>
                            <li class="flex items-center space-x-2 text-brown text-sm md:text-base">
                                <span class="text-orange text-lg md:text-xl flex-shrink-0">✓</span>
                                <span>Visa, asuransi + tour tambahan</span>
                            </li>
                            <li class="flex items-center space-x-2 text-brown text-sm md:text-base">
                                <span class="text-orange text-lg md:text-xl flex-shrink-0">✓</span>
                                <span>Private guide berbahasa Indonesia</span>
                            </li>
                        </ul>
                        <button class="w-full btn-primary text-xs md:text-base py-2 md:py-3">
                            Daftar Premium
                        </button>
                    </div>
                </div>

                <!-- Paket 3 -->
                <div class="bg-white rounded-xl md:rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 overflow-hidden scroll-animate" data-animation="slide-up" data-delay="200">
                    <div class="h-24 md:h-32 bg-gradient-sunset"></div>
                    <div class="p-5 md:p-8">
                        <h3 class="text-xl md:text-2xl font-serif font-bold text-charcoal mb-2">PAKET EKONOMIS</h3>
                        <p class="text-brown text-xs md:text-sm mb-4 md:mb-6">Umroh 7 Hari</p>
                        <p class="text-2xl md:text-4xl font-bold text-orange mb-4 md:mb-6">
                            Hubungi
                            <span class="text-base md:text-lg block text-brown mt-1 md:mt-2">untuk harga spesial</span>
                        </p>
                        <ul class="space-y-2 md:space-y-3 mb-6 md:mb-8">
                            <li class="flex items-center space-x-2 text-brown text-sm md:text-base">
                                <span class="text-orange text-lg md:text-xl flex-shrink-0">✓</span>
                                <span>Penerbangan dengan transit</span>
                            </li>
                            <li class="flex items-center space-x-2 text-brown text-sm md:text-base">
                                <span class="text-orange text-lg md:text-xl flex-shrink-0">✓</span>
                                <span>Hotel bintang 3-4</span>
                            </li>
                            <li class="flex items-center space-x-2 text-brown text-sm md:text-base">
                                <span class="text-orange text-lg md:text-xl flex-shrink-0">✓</span>
                                <span>Visa dan asuransi</span>
                            </li>
                            <li class="flex items-center space-x-2 text-brown text-sm md:text-base">
                                <span class="text-orange text-lg md:text-xl flex-shrink-0">✓</span>
                                <span>Makan dan guide</span>
                            </li>
                        </ul>
                        <button class="w-full btn-secondary text-xs md:text-base py-2 md:py-3">
                            Hubungi Via WhatsApp
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Divider with Palm -->
    <div class="divider-palm"></div>

    <!-- Section Testimonial -->
    <section id="testimoni" class="section-py bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 md:mb-16 scroll-animate" data-animation="fade-up">
                <h2 class="text-heading mb-3 md:mb-4">Testimonial Jemaat Kami</h2>
                <p class="text-sm md:text-base lg:text-lg text-brown max-w-2xl mx-auto px-2">
                    Ribuan jemaat telah merasakan kehangatan dalam perjalanan spiritual mereka
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6 lg:gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-cream rounded-lg md:rounded-xl p-4 md:p-6 lg:p-8 border-l-4 border-orange hover:shadow-lg transition scroll-animate" data-animation="slide-up" data-delay="0">
                    <div class="flex items-center space-x-1 mb-3 md:mb-4">
                        <span class="text-lg md:text-2xl">⭐</span>
                        <span class="text-lg md:text-2xl">⭐</span>
                        <span class="text-lg md:text-2xl">⭐</span>
                        <span class="text-lg md:text-2xl">⭐</span>
                        <span class="text-lg md:text-2xl">⭐</span>
                    </div>
                    <p class="text-brown mb-4 md:mb-6 italic text-xs md:text-sm">
                        "Pengalaman umroh yang luar biasa! Pelayanan Al-Khairat sangat profesional dan penuh kehangatan. Tim guide mereka membuat perjalanan kami menjadi lebih bermakna."
                    </p>
                    <div class="flex items-center space-x-2 md:space-x-3">
                        <img src="https://ui-avatars.com/api/?name=Budi+Santoso" alt="Budi" class="w-10 h-10 md:w-12 md:h-12 rounded-full">
                        <div>
                            <p class="font-semibold text-charcoal text-sm md:text-base">Budi Santoso</p>
                            <p class="text-xs md:text-sm text-brown">Jakarta</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-cream rounded-lg md:rounded-xl p-4 md:p-6 lg:p-8 border-l-4 border-orange hover:shadow-lg transition scroll-animate" data-animation="slide-up" data-delay="100">
                    <div class="flex items-center space-x-1 mb-3 md:mb-4">
                        <span class="text-lg md:text-2xl">⭐</span>
                        <span class="text-lg md:text-2xl">⭐</span>
                        <span class="text-lg md:text-2xl">⭐</span>
                        <span class="text-lg md:text-2xl">⭐</span>
                        <span class="text-lg md:text-2xl">⭐</span>
                    </div>
                    <p class="text-brown mb-4 md:mb-6 italic text-xs md:text-sm">
                        "Dari penerbangan hingga hotel, semuanya berjalan sempurna. Suasana kehangatan yang dijanjikan benar-benar kami rasakan. Terima kasih Al-Khairat!"
                    </p>
                    <div class="flex items-center space-x-2 md:space-x-3">
                        <img src="https://ui-avatars.com/api/?name=Siti+Nurhaliza" alt="Siti" class="w-10 h-10 md:w-12 md:h-12 rounded-full">
                        <div>
                            <p class="font-semibold text-charcoal text-sm md:text-base">Siti Nurhaliza</p>
                            <p class="text-xs md:text-sm text-brown">Surabaya</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-cream rounded-lg md:rounded-xl p-4 md:p-6 lg:p-8 border-l-4 border-orange hover:shadow-lg transition scroll-animate" data-animation="slide-up" data-delay="200">
                    <div class="flex items-center space-x-1 mb-3 md:mb-4">
                        <span class="text-lg md:text-2xl">⭐</span>
                        <span class="text-lg md:text-2xl">⭐</span>
                        <span class="text-lg md:text-2xl">⭐</span>
                        <span class="text-lg md:text-2xl">⭐</span>
                        <span class="text-lg md:text-2xl">⭐</span>
                    </div>
                    <p class="text-brown mb-4 md:mb-6 italic text-xs md:text-sm">
                        "Pelayanan yang tulus dan jujur. Harga sesuai dengan kualitas, tidak ada biaya tersembunyi. Saya merekomendasikan Al-Khairat untuk semua teman-teman saya."
                    </p>
                    <div class="flex items-center space-x-2 md:space-x-3">
                        <img src="https://ui-avatars.com/api/?name=Ahmad+Wijaya" alt="Ahmad" class="w-10 h-10 md:w-12 md:h-12 rounded-full">
                        <div>
                            <p class="font-semibold text-charcoal text-sm md:text-base">Ahmad Wijaya</p>
                            <p class="text-xs md:text-sm text-brown">Bandung</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Divider with Palm -->
    <div class="divider-palm"></div>

    <!-- FAQ Section -->
    <section id="faq" class="section-py bg-cream">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 md:mb-16 scroll-animate" data-animation="fade-up">
                <h2 class="text-heading mb-3 md:mb-4">Pertanyaan yang Sering Diajukan</h2>
                <p class="text-sm md:text-base lg:text-lg text-brown px-2">
                    Temukan jawaban atas pertanyaan umum tentang paket umroh kami
                </p>
            </div>

            <div class="space-y-3 md:space-y-4">
                <!-- FAQ 1 -->
                <div class="bg-white rounded-lg md:rounded-lg border-2 border-orange/20 hover:border-orange/50 overflow-hidden group transition scroll-animate" data-animation="slide-up" data-delay="0">
                    <button class="w-full p-4 md:p-6 text-left flex justify-between items-center hover:bg-cream transition">
                        <span class="font-serif font-bold text-charcoal text-sm md:text-lg">Berapa biaya yang diperlukan?</span>
                        <span class="text-xl md:text-2xl text-orange group-open:rotate-180 transition flex-shrink-0 ml-3">+</span>
                    </button>
                    <div class="hidden group-open:block px-4 md:px-6 pb-4 md:pb-6 text-brown text-xs md:text-base border-t border-orange/20">
                        Biaya umroh tergantung pada paket yang Anda pilih. Hubungi kami untuk penawaran terbaik sesuai dengan budget Anda.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="bg-white rounded-lg md:rounded-lg border-2 border-orange/20 hover:border-orange/50 overflow-hidden group transition scroll-animate" data-animation="slide-up" data-delay="100">
                    <button class="w-full p-4 md:p-6 text-left flex justify-between items-center hover:bg-cream transition">
                        <span class="font-serif font-bold text-charcoal text-sm md:text-lg">Apakah visa sudah termasuk?</span>
                        <span class="text-xl md:text-2xl text-orange group-open:rotate-180 transition flex-shrink-0 ml-3">+</span>
                    </button>
                    <div class="hidden group-open:block px-4 md:px-6 pb-4 md:pb-6 text-brown text-xs md:text-base border-t border-orange/20">
                        Ya, semua paket kami sudah termasuk biaya visa dan asuransi perjalanan.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="bg-white rounded-lg md:rounded-lg border-2 border-orange/20 hover:border-orange/50 overflow-hidden group transition scroll-animate" data-animation="slide-up" data-delay="200">
                    <button class="w-full p-4 md:p-6 text-left flex justify-between items-center hover:bg-cream transition">
                        <span class="font-serif font-bold text-charcoal text-sm md:text-lg">Berapa orang minimal untuk keberangkatan?</span>
                        <span class="text-xl md:text-2xl text-orange group-open:rotate-180 transition flex-shrink-0 ml-3">+</span>
                    </button>
                    <div class="hidden group-open:block px-4 md:px-6 pb-4 md:pb-6 text-brown text-xs md:text-base border-t border-orange/20">
                        Tidak ada minimal peserta. Kami berangkat setiap bulan dengan jadwal terjadwal.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="bg-white rounded-lg md:rounded-lg border-2 border-orange/20 hover:border-orange/50 overflow-hidden group transition scroll-animate" data-animation="slide-up" data-delay="300">
                    <button class="w-full p-4 md:p-6 text-left flex justify-between items-center hover:bg-cream transition">
                        <span class="font-serif font-bold text-charcoal text-sm md:text-lg">Apakah ada asuransi kesehatan?</span>
                        <span class="text-xl md:text-2xl text-orange group-open:rotate-180 transition flex-shrink-0 ml-3">+</span>
                    </button>
                    <div class="hidden group-open:block px-4 md:px-6 pb-4 md:pb-6 text-brown text-xs md:text-base border-t border-orange/20">
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
            <a href="https://wa.me/62" target="_blank" class="inline-block bg-white text-sunset-orange px-6 md:px-10 py-2 md:py-4 rounded-lg font-bold text-sm md:text-base lg:text-lg hover:bg-cream transition transform hover:-translate-y-1">
                Hubungi Kami Sekarang
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-charcoal text-white py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 md:gap-8 lg:gap-12 mb-8 md:mb-12">
                <!-- About -->
                <div>
                    <div class="flex items-center space-x-2 mb-3 md:mb-4">
                        <span class="text-xl md:text-2xl">🌴</span>
                        <div class="font-serif text-lg md:text-xl font-bold">Al-Khairat</div>
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
</body>
</html>
