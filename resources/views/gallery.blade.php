<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galeri Video Perjalanan & Testimoni - Al-Khairat Tour & Travel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body class="font-sans antialiased bg-cream text-charcoal">
    
    <!-- Navbar (Simplified for Gallery) -->
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-300 bg-white/90 backdrop-blur-md shadow-sm border-b border-orange/10 py-3">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Al-Khairat Logo" class="h-14 md:h-16 w-auto object-contain">
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-charcoal hover:text-orange font-medium transition text-sm">Kembali ke Beranda</a>
                    <a href="{{ route('home') }}#testimoni" class="text-charcoal hover:text-orange font-medium transition text-sm">Ulasan Jemaah</a>
                    <a href="https://wa.me/6281234567890" target="_blank" class="btn-primary text-sm px-6 py-2">Hubungi Kami</a>
                </div>
                <div class="md:hidden flex items-center">
                    <a href="{{ route('home') }}" class="text-orange text-sm font-bold">Kembali &larr;</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <div class="pt-32 pb-16 md:pt-40 md:pb-24 bg-gradient-to-br from-cream to-white border-b border-orange/10 relative overflow-hidden">
        <!-- decorative blob removed -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div class="inline-flex items-center space-x-2 bg-orange/10 px-4 py-1.5 rounded-full text-xs font-bold text-orange mb-4 shadow-sm">
                <span class="w-2 h-2 rounded-full bg-orange animate-pulse"></span>
                <span>Dokumentasi VVIP</span>
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif font-bold text-charcoal mb-4 md:mb-6 animate__animated animate__fadeInUp">Galeri <span class="text-gradient-sunset">Video Kami</span></h1>
            <p class="text-base md:text-lg text-brown max-w-2xl mx-auto mb-8 animate__animated animate__fadeInUp animate__delay-1s">
                Saksikan langsung dokumentasi perjalanan spiritual yang hangat, nyaman, dan khusyu bersama jemaah Al-Khairat di Tanah Suci.
            </p>
        </div>
    </div>

    <!-- Video Grid Section -->
    <section class="py-16 md:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Video Item 1 -->
                <div class="bg-white p-4 rounded-2xl shadow-lg border border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="relative w-full pb-[56.25%] rounded-xl overflow-hidden mb-4 group cursor-pointer bg-black">
                        <!-- Placeholder Thumbnail (unsplash) -->
                        <img src="https://images.unsplash.com/photo-1591462035985-30fa1ea11ccf?auto=format&fit=crop&q=80" alt="Thumbnail" class="absolute top-0 left-0 w-full h-full object-cover opacity-80 group-hover:opacity-100 transition duration-500 transform group-hover:scale-105">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 bg-orange/90 rounded-full flex items-center justify-center text-white shadow-[0_0_20px_rgba(205,116,39,0.5)] transform group-hover:scale-110 transition duration-300">
                                <svg class="w-8 h-8 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6z"></path></svg>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-charcoal mb-1">Kenyamanan Hotel Bintang 5</h3>
                    <p class="text-sm text-brown mb-3">Review langsung dari rombongan VIP bulan lalu terkait fasilitas hotel yang berjarak hanya 50 meter dari pelataran Masjidil Haram.</p>
                    <div class="flex items-center justify-between text-xs font-semibold text-gray-500">
                        <span>Oleh: Bpk. H. Sudirman</span>
                        <span>Desember 2023</span>
                    </div>
                </div>

                <!-- Video Item 2 -->
                <div class="bg-white p-4 rounded-2xl shadow-lg border border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="relative w-full pb-[56.25%] rounded-xl overflow-hidden mb-4 group cursor-pointer bg-black">
                        <img src="https://images.unsplash.com/photo-1565552645632-d725e8bfc19a?auto=format&fit=crop&q=80" alt="Thumbnail" class="absolute top-0 left-0 w-full h-full object-cover opacity-80 group-hover:opacity-100 transition duration-500 transform group-hover:scale-105">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 bg-orange/90 rounded-full flex items-center justify-center text-white shadow-[0_0_20px_rgba(205,116,39,0.5)] transform group-hover:scale-110 transition duration-300">
                                <svg class="w-8 h-8 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6z"></path></svg>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-charcoal mb-1">Momen Penuh Haru di Raudhah</h3>
                    <p class="text-sm text-brown mb-3">Cuplikan eksklusif bimbingan Muthawwif kami saat memandu jamaah berdoa di Raudhah, Masjid Nabawi.</p>
                    <div class="flex items-center justify-between text-xs font-semibold text-gray-500">
                        <span>Oleh: Tim Dokumentasi</span>
                        <span>Oktober 2023</span>
                    </div>
                </div>

                <!-- Video Item 3 -->
                <div class="bg-white p-4 rounded-2xl shadow-lg border border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="relative w-full pb-[56.25%] rounded-xl overflow-hidden mb-4 group cursor-pointer bg-black">
                        <img src="https://images.unsplash.com/photo-1564769662543-b1d556ad33df?auto=format&fit=crop&q=80" alt="Thumbnail" class="absolute top-0 left-0 w-full h-full object-cover opacity-80 group-hover:opacity-100 transition duration-500 transform group-hover:scale-105">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 bg-orange/90 rounded-full flex items-center justify-center text-white shadow-[0_0_20px_rgba(205,116,39,0.5)] transform group-hover:scale-110 transition duration-300">
                                <svg class="w-8 h-8 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6z"></path></svg>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-charcoal mb-1">Ulasan Kereta Cepat Haramain</h3>
                    <p class="text-sm text-brown mb-3">Pengalaman jamaah Al-Khairat menggunakan kereta cepat peluru Haramain dari Madinah menuju Makkah (Lebih ringkas & tidak letih).</p>
                    <div class="flex items-center justify-between text-xs font-semibold text-gray-500">
                        <span>Oleh: Keluarga Ibu Aisyah</span>
                        <span>Januari 2024</span>
                    </div>
                </div>

                <!-- You can add more loops here from a Database if you build a Video model later -->

            </div>
            
            <div class="mt-16 text-center">
                <a href="https://youtube.com" target="_blank" class="inline-flex items-center space-x-2 bg-red-600 text-white px-8 py-3 rounded-full font-bold shadow-lg hover:shadow-xl hover:bg-red-700 transition transform hover:-translate-y-1">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                    <span>Kunjungi Channel YouTube Kami</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer Simple -->
    <footer class="bg-charcoal text-white/80 py-8 border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-sm md:text-base">
            <p>&copy; {{ date('Y') }} Al-Khairat Tour & Travel. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

</body>
</html>
