<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">
    <title>Galeri Video Perjalanan & Testimoni - Al-Khairat Tour & Travel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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
<body class="font-sans antialiased bg-cream text-charcoal">
    
    <!-- Logo Header -->
    <x-logo-header />

    <!-- Page Header -->
    <div class="pt-32 pb-16 md:pt-40 md:pb-24 bg-gradient-to-br from-cream to-white border-b border-orange/10 relative overflow-hidden">
        <!-- decorative blob removed -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div class="inline-flex items-center space-x-2 bg-orange/10 px-4 py-1.5 rounded-full text-xs font-bold text-orange mb-4 shadow-sm">
                <span class="w-2 h-2 rounded-full bg-orange animate-pulse"></span>
                <span>Dokumentasi VVIP</span>
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif font-bold text-charcoal mb-4 md:mb-6 animate__animated animate__fadeInUp">Galeri <span class="text-gradient-sunset">Kami</span></h1>
            <p class="text-base md:text-lg text-brown max-w-2xl mx-auto mb-8 animate__animated animate__fadeInUp animate__delay-1s">
                Saksikan langsung dokumentasi perjalanan spiritual yang hangat, nyaman, dan khusyu bersama jemaah Al-Khairat di Tanah Suci.
            </p>
        </div>
    </div>

    <!-- Video Grid Section -->
    <section class="py-16 md:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                @forelse($galleries as $item)
                <div class="bg-white p-4 rounded-2xl shadow-lg border border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="relative w-full pb-[56.25%] rounded-xl overflow-hidden mb-4 group cursor-pointer bg-black">
                        @if($item->type === 'video' && $item->video_url)
                        <a href="{{ $item->video_url }}" target="_blank" class="block w-full h-full">
                            <img src="{{ Storage::url($item->image_path) }}" alt="{{ $item->title }}" class="absolute top-0 left-0 w-full h-full object-cover opacity-80 group-hover:opacity-100 transition duration-500 transform group-hover:scale-105">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-16 h-16 bg-orange/90 rounded-full flex items-center justify-center text-white shadow-[0_0_20px_rgba(205,116,39,0.5)] transform group-hover:scale-110 transition duration-300">
                                    <svg class="w-8 h-8 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6z"></path></svg>
                                </div>
                            </div>
                        </a>
                        @else
                        <img src="{{ Storage::url($item->image_path) }}" alt="{{ $item->title }}" class="absolute top-0 left-0 w-full h-full object-cover opacity-80 group-hover:opacity-100 transition duration-500 transform group-hover:scale-105">
                        @endif
                    </div>
                    <h3 class="text-lg font-bold text-charcoal mb-1">{{ $item->title }}</h3>
                    @if($item->description)
                    <p class="text-sm text-brown mb-3">{{ $item->description }}</p>
                    @endif
                    <div class="flex items-center justify-between text-xs font-semibold text-gray-500">
                        <span>{{ $item->created_at->format('d M Y') }}</span>
                        <span class="uppercase tracking-tighter">{{ $item->type }}</span>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-20 text-center">
                    <div class="w-20 h-20 bg-orange/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-charcoal">Belum ada dokumentasi</h3>
                    <p class="text-brown">Kami sedang menyiapkan momen-momen indah untuk dibagikan.</p>
                </div>
                @endforelse

            </div>
            
            <div class="mt-16 text-center">
                <a href="https://www.instagram.com/alkhairat_tour/" target="_blank" class="inline-flex items-center space-x-3 text-white px-10 py-4 rounded-full font-black shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 transform" style="background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                    <span class="uppercase tracking-widest text-xs">Ikuti Instagram Kami</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Full Footer -->
    <footer class="bg-charcoal text-white pt-12 md:pt-20 pb-8 md:pb-12 border-t border-white/10 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-12 mb-12 md:mb-16">
                <!-- Brand -->
                <div class="lg:col-span-1">
                    <img src="{{ asset('img/Logo.png') }}" class="h-10 md:h-12 mb-4 md:mb-6 brightness-0 invert" alt="Al-Khairat">
                    <p class="text-white/70 text-xs md:text-sm leading-relaxed max-w-xs">
                        Melayani Perjalanan Ibadah Umrah & Haji Plus dengan Khidmat, Amanah, dan Profesional Sejak 2013.
                    </p>
                </div>

                <!-- Menu -->
                <div>
                    <h4 class="font-serif font-bold mb-3 md:mb-4 text-gold text-xs md:text-base">Mungkin Anda Cari</h4>
                    <ul class="space-y-2 text-xs md:text-sm text-white/70">
                        <li><a href="{{ route('home') }}#paket" class="hover:text-orange transition">Paket Umrah</a></li>
                        <li><a href="{{ route('home') }}#gallery" class="hover:text-orange transition">Galeri Kegiatan</a></li>
                        <li><a href="{{ route('panduan-tasuh') }}" class="hover:text-orange transition">Panduan Digital</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
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
                        &copy; {{ date('Y') }} Al-Khairat. Semua hak cipta terlindungi.
                    </p>
                    <div class="flex flex-wrap justify-center md:justify-end gap-3 md:gap-6 text-xs md:text-sm text-white/70">
                        <a href="#" class="hover:text-orange transition">Kebijakan Privasi</a>
                        <a href="#" class="hover:text-orange transition">Syarat & Ketentuan</a>
                        <a href="#" class="hover:text-orange transition">Sitemap</a>
                    </div>
                </div>
            </div>
          </footer>
    
    <!-- Shared Navigation Dock -->
    @include('components.dock-navigation')

    @stack('scripts')
    
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Find both desktop and mobile gallery links
            const galleryLinks = document.querySelectorAll('a[href="{{ route('gallery') }}"]');
            galleryLinks.forEach(link => {
                if (link.classList.contains('dock-item')) {
                    link.classList.add('active');
                }
                // For mobile menu items
                if (link.classList.contains('mobile-menu-item')) {
                    link.classList.add('text-orange');
                    const iconBox = link.querySelector('.menu-icon-box');
                    if (iconBox) iconBox.classList.add('bg-orange/20', 'border-orange/30');
                }
            });
        });
    </script>
    @endpush
</body>
</html>

