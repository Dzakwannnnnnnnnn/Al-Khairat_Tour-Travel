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
<body class="bg-bg font-sans text-text transition-colors duration-500 pb-10 lg:pb-40">
    <!-- Logo Header -->
    <x-logo-header />

    <!-- Floating Navigation Dock -->
    @include('components.dock-navigation')

    <!-- Spacer for fixed header on mobile -->
    <div class="lg:hidden" style="height: 90px !important;"></div>

    <!-- Main Content -->
    <main class="min-h-screen pt-2 pb-10 lg:pb-40">
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
                    <a href="https://wa.me/{{ $whatsapp ?? '6281234567890' }}" target="_blank" class="bg-white/20 backdrop-blur text-white font-bold px-8 py-4 rounded-2xl border border-white/30 hover:bg-white/30 transition-all">
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
