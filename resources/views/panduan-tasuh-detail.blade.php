<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $guideData->title ?? 'Panduan' }} - Al-Khairat</title>
    
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
    <!-- Logo Header -->
    <x-logo-header />

    <!-- Floating Navigation Dock -->
    @include('components.dock-navigation')

    <!-- Spacer for fixed header on mobile -->
    <div class="lg:hidden" style="height: 90px !important;"></div>

    <!-- Main Content -->
    <main class="min-h-screen pt-2 lg:pt-44 pb-32 md:pb-40">
        <div class="max-w-5xl mx-auto px-3 sm:px-4 md:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <div class="flex flex-wrap items-center gap-y-2 gap-x-1 mb-6 md:mb-8 text-xs sm:text-sm text-text/60 pb-2">
                <a href="{{ route('panduan-tasuh') }}" class="hover:text-orange transition whitespace-nowrap">Panduan Tasuh</a>
                <span class="mx-1">/</span>
                <a href="{{ route('panduan-tasuh') }}" class="hover:text-orange transition capitalize whitespace-nowrap">{{ $category }}</a>
                <span class="mx-1">/</span>
                <span class="text-text font-semibold truncate">{{ $guideData->title ?? 'Detail' }}</span>
            </div>

            <!-- Header Section -->
            <div class="mb-10 md:mb-12">
                <div class="flex flex-col sm:flex-row sm:items-start gap-4 md:gap-6">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-xl sm:rounded-2xl bg-gradient-sunset text-white flex items-center justify-center text-4xl sm:text-5xl flex-shrink-0 brightness-110">
                        {{ $guideData->icon ?? '📖' }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="inline-flex flex-wrap items-center gap-1 sm:gap-2 bg-surface/60 dark:bg-surface/40 backdrop-blur border border-orange/10 px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-semibold text-orange mb-2 md:mb-3">
                            <span class="w-2 h-2 rounded-full bg-orange animate-pulse flex-shrink-0"></span>
                            <span>{{ $guideData->badge ?? 'Panduan' }}</span>
                        </div>
                        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-serif font-bold text-text mb-2 md:mb-3 leading-tight break-words">{{ $guideData->title ?? 'Detail Panduan' }}</h1>
                        <p class="text-sm sm:text-base md:text-lg text-text/70 leading-relaxed">{{ $guideData->description ?? 'Panduan lengkap untuk membantu perjalanan spiritual Anda' }}</p>
                    </div>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6 lg:gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-4 md:space-y-6">
                    <!-- Overview Section -->
                    @if($guideData->overview)
                    <div class="glass-dashboard rounded-xl sm:rounded-2xl p-4 sm:p-6 md:p-8 border border-orange/20">
                        <h2 class="text-xl sm:text-2xl font-serif font-bold text-text mb-3 md:mb-4">Gambaran Umum</h2>
                        <p class="text-sm sm:text-base text-text/80 leading-relaxed">{{ $guideData->overview }}</p>
                    </div>
                    @endif

                    <!-- Key Points Section -->
                    @if($guideData->key_points && count($guideData->key_points) > 0)
                    <div class="glass-dashboard rounded-xl sm:rounded-2xl p-4 sm:p-6 md:p-8 border border-orange/20">
                        <h2 class="text-xl sm:text-2xl font-serif font-bold text-text mb-4 md:mb-6">Poin Penting</h2>
                        <div class="space-y-3 md:space-y-4">
                            @foreach($guideData->key_points as $point)
                            <div class="flex gap-3 md:gap-4">
                                <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-lg bg-gradient-sunset text-white flex items-center justify-center text-xs sm:text-sm font-bold flex-shrink-0 brightness-110">
                                    ✓
                                </div>
                                <div class="min-w-0">
                                    <h3 class="font-bold text-text mb-1 text-sm sm:text-base">{{ $point['title'] ?? '' }}</h3>
                                    <p class="text-text/70 text-xs sm:text-sm leading-relaxed">{{ $point['description'] ?? '' }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Detailed Content Section -->
                    @if($guideData->sections && count($guideData->sections) > 0)
                    <div class="space-y-4 md:space-y-6">
                        @foreach($guideData->sections as $section)
                        <div class="glass-dashboard rounded-xl sm:rounded-2xl p-4 sm:p-6 md:p-8 border border-orange/20">
                            <h3 class="text-lg sm:text-xl font-serif font-bold text-text mb-3 md:mb-4">{{ $section['heading'] ?? '' }}</h3>
                            <p class="text-sm sm:text-base text-text/80 leading-relaxed mb-3 md:mb-4">{{ $section['content'] ?? '' }}</p>
                            @if(isset($section['items']) && count($section['items']) > 0)
                            <ul class="space-y-2 md:space-y-3">
                                @foreach($section['items'] as $item)
                                <li class="flex items-start gap-2 md:gap-3 text-text/80 text-sm sm:text-base">
                                    <span class="text-orange mt-0.5 flex-shrink-0">→</span>
                                    <span class="leading-relaxed">{{ $item }}</span>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-4 md:space-y-6">
                    <!-- Tips Card -->
                    <div class="glass-dashboard rounded-xl sm:rounded-2xl p-4 sm:p-6 border border-orange/20 lg:sticky lg:top-24">
                        <h3 class="text-lg sm:text-lg font-serif font-bold text-text mb-3 md:mb-4 flex items-center gap-2">
                            <span>💡</span> <span class="leading-tight">Tips Penting</span>
                        </h3>
                        <ul class="space-y-2 md:space-y-3">
                            @if($guideData->tips && count($guideData->tips) > 0)
                                @foreach($guideData->tips as $tip)
                                <li class="flex items-start gap-2 text-xs sm:text-sm text-text/80">
                                    <span class="text-orange flex-shrink-0 mt-0.5">•</span>
                                    <span class="leading-relaxed">{{ $tip }}</span>
                                </li>
                                @endforeach
                            @else
                                <li class="text-xs sm:text-sm text-text/60">Baca konten di samping untuk tips lebih detail</li>
                            @endif
                        </ul>
                    </div>

                    <!-- CTA Card -->
                    <div class="bg-gradient-sunset rounded-xl sm:rounded-2xl p-4 sm:p-6 text-white">
                        <h3 class="font-bold mb-2 sm:mb-3 text-base sm:text-lg">Butuh Bantuan?</h3>
                        <p class="text-xs sm:text-sm text-white/90 mb-3 sm:mb-4 leading-relaxed">Hubungi tim Al-Khairat untuk konsultasi lebih lanjut</p>
                        <a href="https://wa.me/{{ $whatsapp ?? '6281253088788' }}" target="_blank" class="block w-full bg-white text-orange font-bold py-2 px-3 sm:px-4 rounded-lg text-center hover:shadow-lg hover:scale-105 transition text-xs sm:text-sm">
                            Hubungi Sekarang
                        </a>
                    </div>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="mt-10 md:mt-12 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 sm:gap-4">
                <a href="{{ route('panduan-tasuh') }}" class="inline-flex items-center justify-center sm:justify-start gap-2 text-orange font-bold hover:translate-x-2 hover:text-orange/80 transition text-sm md:text-base order-2 sm:order-1">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 rotate-180 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    <span>Kembali ke Panduan</span>
                </a>
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center sm:justify-end gap-2 text-orange font-bold hover:translate-x-2 hover:text-orange/80 transition text-sm md:text-base order-1 sm:order-2">
                    <span>Kembali ke Beranda</span>
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12a9 9 0 0118 0m0 0a9 9 0 01-18 0m18 0a9 9 0 01-18 0"></path></svg>
                </a>
            </div>
        </div>
    </main>

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
        </div>
    </footer>

    @vite(['resources/js/app.js'])
    @stack('scripts')
</body>
</html>
