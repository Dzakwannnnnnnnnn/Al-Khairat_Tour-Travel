<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Tasuh Digital - Al-Khairat</title>
    
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
    <main class="min-h-screen pt-2 lg:pt-44 pb-10 lg:pb-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-16 scroll-animate" data-animation="fade-up">
                <div class="inline-flex items-center space-x-2 bg-surface/60 dark:bg-surface/40 backdrop-blur border border-orange/10 px-3 py-1 rounded-full text-sm font-semibold text-orange mb-4">
                    <span class="w-2 h-2 rounded-full bg-orange animate-pulse"></span>
                    <span>Panduan Dokumen Ibadah</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-serif font-bold text-text mb-4">Panduan Tasuh <span class="text-gradient-sunset">Digital</span></h1>
                <p class="text-lg md:text-xl text-text/70 max-w-3xl mx-auto">
                    Kelengkapan dokumen ibadah Anda dalam format digital yang mudah diakses kapan saja dan dimana saja
                </p>
            </div>

            <!-- Category Tabs -->
            <div class="flex justify-center gap-4 mb-12">
                <button onclick="switchCategory('umrah')" class="category-tab tab-umrah tab-active px-8 py-4 rounded-2xl font-bold text-lg transition-all duration-300 bg-gradient-sunset text-white shadow-lg shadow-orange/20 hover:shadow-xl hover:shadow-orange/40" data-category="umrah">
                    <svg class="w-6 h-6 inline-block mr-2" fill="none" viewBox="0 0 24 24" style="stroke: white;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Umrah
                </button>
                <button onclick="switchCategory('haji')" class="category-tab tab-haji tab-inactive px-8 py-4 rounded-2xl font-bold text-lg transition-all duration-300 bg-surface/50 dark:bg-surface/30 border-2 border-border/50 hover:border-orange text-text/60 dark:text-text/50" data-category="haji">
                    <svg class="w-6 h-6 inline-block mr-2" fill="none" viewBox="0 0 24 24" style="stroke: rgba(224, 215, 198, 0.6);">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Haji
                </button>
            </div>

            <!-- Content Container -->
            <div class="space-y-12">
                <!-- UMRAH SECTION -->
                <div id="category-umrah" class="category-content animate-[fadeUp_0.5s_ease-out]">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Tasuh Umrah - Dokumen Perjalanan -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate" data-animation="slide-up" data-delay="0">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    ✈️
                                </div>
                                <span class="text-xs font-bold bg-orange/10 text-orange px-3 py-1 rounded-full">DOKUMEN</span>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Dokumen Perjalanan Umrah</h3>
                            <p class="text-text/70 text-sm mb-6">Berisi kelengkapan surat-surat resmi untuk keberangkatan umrah yang diakui oleh pemerintah dan maskapai penerbangan.</p>
                            <ul class="space-y-2 mb-8">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Surat Keterangan Tasuh
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Paspor & Visa Paspor
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Asuransi Perjalanan
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Kartu Vaksinasi (jika diperlukan)
                                </li>
                            </ul>
                            <a href="{{ route('panduan-tasuh.detail', ['category' => 'umrah', 'guide' => 'dokumen']) }}" class="inline-flex items-center gap-2 text-orange font-bold hover:translate-x-2 transition-transform group/link">
                                <span>Lihat Rincian</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>

                        <!-- Tasuh Umrah - Checklist Perlengkapan -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate" data-animation="slide-up" data-delay="100">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    📋
                                </div>
                                <span class="text-xs font-bold bg-orange/10 text-orange px-3 py-1 rounded-full">CHECKLIST</span>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Checklist Perlengkapan</h3>
                            <p class="text-text/70 text-sm mb-6">Daftar lengkap barang-barang yang perlu dibawa untuk memastikan perjalanan ibadah Umrah Anda nyaman dan lancar.</p>
                            <ul class="space-y-2 mb-8">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Pakaian Ihram (Pria)
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Mukena & Kerudung (Wanita)
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Obat-obatan Pribadi
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Perlengkapan Ibadah
                                </li>
                            </ul>
                            <a href="{{ route('panduan-tasuh.detail', ['category' => 'umrah', 'guide' => 'checklist']) }}" class="inline-flex items-center gap-2 text-orange font-bold hover:translate-x-2 transition-transform group/link">
                                <span>Lihat Checklist</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>

                        <!-- Tasuh Umrah - Tata Cara -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate" data-animation="slide-up" data-delay="200">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    🕌
                                </div>
                                <span class="text-xs font-bold bg-orange/10 text-orange px-3 py-1 rounded-full">TATA CARA</span>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Tata Cara Umrah Lengkap</h3>
                            <p class="text-text/70 text-sm mb-6">Panduan step-by-step melakukan ibadah Umrah mulai dari persiapan hingga kembali ke tanah air dengan sempurna.</p>
                            <ul class="space-y-2 mb-8">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Niat & Ihram
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Tawaf & Sa'i
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Tahalul
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Do'a & Ibadah Tambahan
                                </li>
                            </ul>
                            <a href="{{ route('panduan-tasuh.detail', ['category' => 'umrah', 'guide' => 'tata-cara']) }}" class="inline-flex items-center gap-2 text-orange font-bold hover:translate-x-2 transition-transform group/link">
                                <span>Baca Panduan</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>

                        <!-- Tasuh Umrah - FAQ Umrah -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate" data-animation="slide-up" data-delay="300">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    ❓
                                </div>
                                <span class="text-xs font-bold bg-orange/10 text-orange px-3 py-1 rounded-full">FAQ</span>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">FAQ Umrah</h3>
                            <p class="text-text/70 text-sm mb-6">Jawaban atas pertanyaan-pertanyaan umum yang sering diajukan calon jamaah Umrah tentang persiapan dan pelaksanaan ibadah.</p>
                            <ul class="space-y-2 mb-8">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Berapa lama waktu Umrah?
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Apakah boleh Umrah saat haid?
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Persiapan apa saja yang diperlukan?
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Biaya berapa yang diperlukan?
                                </li>
                            </ul>
                            <a href="{{ route('panduan-tasuh.detail', ['category' => 'umrah', 'guide' => 'faq']) }}" class="inline-flex items-center gap-2 text-orange font-bold hover:translate-x-2 transition-transform group/link">
                                <span>Lihat FAQ</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>

                        <!-- Tasuh Umrah - Doa & Dzikir -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate" data-animation="slide-up" data-delay="400">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    🤲
                                </div>
                                <span class="text-xs font-bold bg-orange/10 text-orange px-3 py-1 rounded-full">DO'A</span>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Do'a & Dzikir Umrah</h3>
                            <p class="text-text/70 text-sm mb-6">Kumpulan do'a dan dzikir pilihan yang dibaca selama melakukan ibadah Umrah untuk memaksimalkan manfaat spiritual.</p>
                            <ul class="space-y-2 mb-8">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Do'a Ihram
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Talbiah
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Do'a Tawaf
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Do'a Sa'i & Tahalul
                                </li>
                            </ul>
                            <a href="{{ route('panduan-tasuh.detail', ['category' => 'umrah', 'guide' => 'doa']) }}" class="inline-flex items-center gap-2 text-orange font-bold hover:translate-x-2 transition-transform group/link">
                                <span>Lihat Do'a</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>

                        <!-- Tasuh Umrah - Tips & Trik -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate" data-animation="slide-up" data-delay="500">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    💡
                                </div>
                                <span class="text-xs font-bold bg-orange/10 text-orange px-3 py-1 rounded-full">TIPS</span>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Tips & Trik Umrah</h3>
                            <p class="text-text/70 text-sm mb-6">Kumpulan tips praktis dan trik-trik berguna dari pengalaman ribuan jamaah untuk membuat Umrah Anda lebih nyaman.</p>
                            <ul class="space-y-2 mb-8">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Tips Adaptasi Cuaca
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Tips Menjaga Kesehatan
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Tips Manajemen Waktu
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Tips Jika Terjadi Kendala
                                </li>
                            </ul>
                            <a href="{{ route('panduan-tasuh.detail', ['category' => 'umrah', 'guide' => 'tips']) }}" class="inline-flex items-center gap-2 text-orange font-bold hover:translate-x-2 transition-transform group/link">
                                <span>Baca Tips</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- HAJI SECTION (Hidden by default) -->
                <div id="category-haji" class="category-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Tasuh Haji - Dokumen Perjalanan -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate" data-animation="slide-up" data-delay="0">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    ✈️
                                </div>
                                <span class="text-xs font-bold bg-orange/10 text-orange px-3 py-1 rounded-full">DOKUMEN</span>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Dokumen Perjalanan Haji</h3>
                            <p class="text-text/70 text-sm mb-6">Berisi kelengkapan surat-surat resmi untuk pendaftaran dan keberangkatan Haji yang disyaratkan oleh pemerintah.</p>
                            <ul class="space-y-2 mb-8">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Kartu Peserta Haji
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Surat Pendaftaran
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Pemeriksaan Kesehatan
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Asuransi Haji
                                </li>
                            </ul>
                            <a href="{{ route('panduan-tasuh.detail', ['category' => 'haji', 'guide' => 'dokumen']) }}" class="inline-flex items-center gap-2 text-orange font-bold hover:translate-x-2 transition-transform group/link">
                                <span>Lihat Rincian</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>

                        <!-- Tasuh Haji - Checklist Perlengkapan -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate" data-animation="slide-up" data-delay="100">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    📋
                                </div>
                                <span class="text-xs font-bold bg-orange/10 text-orange px-3 py-1 rounded-full">CHECKLIST</span>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Checklist Perlengkapan Haji</h3>
                            <p class="text-text/70 text-sm mb-6">Daftar lengkap barang-barang yang perlu dibawa untuk perjalanan Haji yang lebih lama dan lebih intensif.</p>
                            <ul class="space-y-2 mb-8">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Pakaian Ihram (Pria)
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Mukena & Kerudung (Wanita)
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Obat-obatan Lengkap
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Perlengkapan Haji
                                </li>
                            </ul>
                            <a href="{{ route('panduan-tasuh.detail', ['category' => 'haji', 'guide' => 'checklist']) }}" class="inline-flex items-center gap-2 text-orange font-bold hover:translate-x-2 transition-transform group/link">
                                <span>Lihat Checklist</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>

                        <!-- Tasuh Haji - Tata Cara -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate" data-animation="slide-up" data-delay="200">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    🕌
                                </div>
                                <span class="text-xs font-bold bg-orange/10 text-orange px-3 py-1 rounded-full">TATA CARA</span>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Tata Cara Haji Lengkap</h3>
                            <p class="text-text/70 text-sm mb-6">Panduan komprehensif melakukan ibadah Haji mulai dari persiapan, ihram, hingga kembali ke tanah air.</p>
                            <ul class="space-y-2 mb-8">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Niat & Ihram di Miqat
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Wukuf & Arafah
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Muzdalifah & Lempar Jumrah
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Tawaf & Tahalul
                                </li>
                            </ul>
                            <a href="{{ route('panduan-tasuh.detail', ['category' => 'haji', 'guide' => 'tata-cara']) }}" class="inline-flex items-center gap-2 text-orange font-bold hover:translate-x-2 transition-transform group/link">
                                <span>Baca Panduan</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>

                        <!-- Tasuh Haji - FAQ Haji -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate" data-animation="slide-up" data-delay="300">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    ❓
                                </div>
                                <span class="text-xs font-bold bg-orange/10 text-orange px-3 py-1 rounded-full">FAQ</span>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">FAQ Haji</h3>
                            <p class="text-text/70 text-sm mb-6">Jawaban atas pertanyaan-pertanyaan mengenai proses pendaftaran, persiapan, dan pelaksanaan ibadah Haji.</p>
                            <ul class="space-y-2 mb-8">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Bagaimana cara pendaftaran Haji?
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Berapa biaya Haji?
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Apa persyaratan kesehatan untuk Haji?
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Berapa lama perjalanan Haji?
                                </li>
                            </ul>
                            <a href="{{ route('panduan-tasuh.detail', ['category' => 'haji', 'guide' => 'faq']) }}" class="inline-flex items-center gap-2 text-orange font-bold hover:translate-x-2 transition-transform group/link">
                                <span>Lihat FAQ</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>

                        <!-- Tasuh Haji - Doa & Dzikir -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate" data-animation="slide-up" data-delay="400">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    🤲
                                </div>
                                <span class="text-xs font-bold bg-orange/10 text-orange px-3 py-1 rounded-full">DO'A</span>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Do'a & Dzikir Haji</h3>
                            <p class="text-text/70 text-sm mb-6">Kumpulan do'a dan dzikir pilihan yang dibaca sepanjang perjalanan Haji untuk memperkuat koneksi spiritual.</p>
                            <ul class="space-y-2 mb-8">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Do'a Ihram
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Talbiah & Takbir
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Do'a Arafah
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Do'a Lempar Jumrah
                                </li>
                            </ul>
                            <a href="{{ route('panduan-tasuh.detail', ['category' => 'haji', 'guide' => 'doa']) }}" class="inline-flex items-center gap-2 text-orange font-bold hover:translate-x-2 transition-transform group/link">
                                <span>Lihat Do'a</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>

                        <!-- Tasuh Haji - Tips & Trik -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate" data-animation="slide-up" data-delay="500">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    💡
                                </div>
                                <span class="text-xs font-bold bg-orange/10 text-orange px-3 py-1 rounded-full">TIPS</span>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Tips & Trik Haji</h3>
                            <p class="text-text/70 text-sm mb-6">Tips dan trik berguna dari pengalaman ribuan jemaah untuk membuat perjalanan Haji Anda lebih nyaman dan bermakna.</p>
                            <ul class="space-y-2 mb-8">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Tips Adaptasi Cuaca Ekstrem
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Tips Menjaga Stamina
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Tips Keamanan & Kenyamanan
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Tips Hubungan dengan Jamaah Lain
                                </li>
                            </ul>
                            <a href="{{ route('panduan-tasuh.detail', ['category' => 'haji', 'guide' => 'tips']) }}" class="inline-flex items-center gap-2 text-orange font-bold hover:translate-x-2 transition-transform group/link">
                                <span>Baca Tips</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="mt-20 bg-gradient-sunset rounded-3xl p-12 text-white text-center">
                <h3 class="text-3xl font-serif font-bold mb-4">Siap untuk Perjalanan Spiritual Anda?</h3>
                <p class="text-lg text-white/90 mb-8 max-w-2xl mx-auto">Hubungi tim Al-Khairat untuk konsultasi dan panduan lengkap mengenai paket Umrah atau Haji Anda.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('home') }}" class="bg-white text-orange font-bold px-8 py-4 rounded-2xl hover:shadow-xl hover:scale-105 transition-all">
                        Lihat Paket
                    </a>
                    <a href="https://wa.me/{{ $whatsapp ?? '6281253088788' }}" target="_blank" class="bg-white/20 backdrop-blur text-white font-bold px-8 py-4 rounded-2xl border border-white/30 hover:bg-white/30 transition-all">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </main>

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
                        <li><a href="{{ route('home') }}" class="hover:text-gold transition">Beranda</a></li>
                        <li><a href="{{ route('home') }}#paket" class="hover:text-gold transition">Paket</a></li>
                        <li><a href="{{ route('home') }}#testimoni" class="hover:text-gold transition">Testimoni</a></li>
                        <li><a href="{{ route('panduan-tasuh') }}" class="hover:text-gold transition">Panduan</a></li>
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

    @stack('scripts')

    <script>
        function switchCategory(category) {
            // Hide all categories
            document.querySelectorAll('.category-content').forEach(el => {
                el.classList.add('hidden');
            });
            
            // Show selected category
            document.getElementById(`category-${category}`).classList.remove('hidden');
            
            // Update tab styles - remove active state from all
            document.querySelectorAll('.category-tab').forEach(tab => {
                tab.classList.remove('tab-active', 'bg-gradient-sunset', 'text-white', 'shadow-lg', 'shadow-orange/20', 'hover:shadow-xl', 'hover:shadow-orange/40');
                tab.classList.add('tab-inactive', 'bg-surface/50', 'dark:bg-surface/30', 'border-2', 'border-border/50', 'text-text/60', 'dark:text-text/50');
                
                // Update SVG icons for inactive tabs
                const svg = tab.querySelector('svg');
                svg.style.stroke = 'rgba(224, 215, 198, 0.6)';
            });
            
            // Highlight active tab
            const activeTab = document.querySelector(`[data-category="${category}"]`);
            activeTab.classList.remove('tab-inactive', 'bg-surface/50', 'dark:bg-surface/30', 'border-2', 'border-border/50', 'text-text/60', 'dark:text-text/50');
            activeTab.classList.add('tab-active', 'bg-gradient-sunset', 'text-white', 'shadow-lg', 'shadow-orange/20', 'hover:shadow-xl', 'hover:shadow-orange/40');
            
            // Update SVG icon for active tab
            const activeSvg = activeTab.querySelector('svg');
            activeSvg.style.stroke = 'white';
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            // Set Umrah as default active
            const umrahTab = document.querySelector('[data-category="umrah"]');
            umrahTab.classList.add('tab-active', 'bg-gradient-sunset', 'text-white', 'shadow-lg', 'shadow-orange/20', 'hover:shadow-xl', 'hover:shadow-orange/40');
            umrahTab.classList.remove('tab-inactive', 'bg-surface/50', 'dark:bg-surface/30', 'border-border/50', 'text-text/60', 'dark:text-text/50');
            
            // Ensure Umrah SVG is white
            const umrahSvg = umrahTab.querySelector('svg');
            umrahSvg.style.stroke = 'white';
        });
    </script>
</body>
</html>
