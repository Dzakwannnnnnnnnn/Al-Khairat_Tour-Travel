<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Tasuh Digital - Al-Khairat</title>
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
                    <span class="text-2xl mr-2">✈️</span>
                    Umrah
                </button>
                <button onclick="switchCategory('haji')" class="category-tab tab-haji tab-inactive px-8 py-4 rounded-2xl font-bold text-lg transition-all duration-300 bg-surface/50 dark:bg-surface/30 border-2 border-border/50 hover:border-orange text-text/60 dark:text-text/50" data-category="haji">
                    <span class="text-2xl mr-2">🕋</span>
                    Haji
                </button>
            </div>

            <!-- Content Container -->
            <div class="space-y-12">
                <!-- UMRAH SECTION -->
                <div id="category-umrah" class="category-content animate-[fadeUp_0.5s_ease-out]">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Tasuh Umrah - Dokumen Perjalanan -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate relative overflow-hidden" data-animation="slide-up" data-delay="0">
                            <div class="absolute top-0 right-0 p-4">
                                <span class="text-[40px] font-black text-orange/5 select-none group-hover:text-orange/10 transition-colors">01</span>
                            </div>
                            <div class="flex items-start mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    ✈️
                                </div>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Persiapan & Administrasi</h3>
                            <p class="text-text/70 text-sm mb-6">Langkah awal untuk memastikan dokumen perjalanan Anda lengkap dan sah secara hukum dan agama.</p>
                            <ul class="space-y-2 mb-4">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Paspor & Visa Umrah Aktif
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Sertifikat Vaksinasi & Kesehatan
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Asuransi Perjalanan Syariah
                                </li>
                            </ul>
                        </div>

                        <!-- Tasuh Umrah - Checklist Perlengkapan -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate relative overflow-hidden" data-animation="slide-up" data-delay="100">
                            <div class="absolute top-0 right-0 p-4">
                                <span class="text-[40px] font-black text-orange/5 select-none group-hover:text-orange/10 transition-colors">02</span>
                            </div>
                            <div class="flex items-start mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    📋
                                </div>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Kebutuhan & Packing</h3>
                            <p class="text-text/70 text-sm mb-6">Menyiapkan perlengkapan fisik agar Anda dapat fokus beribadah tanpa kendala teknis di lapangan.</p>
                            <ul class="space-y-2 mb-4">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Pakaian Ihram & Sabuk (Pria)
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Mukena & Pakaian Takwa (Wanita)
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Obat Pribadi & Alat Kebersihan
                                </li>
                            </ul>
                        </div>

                        <!-- Tasuh Umrah - Tata Cara -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate relative overflow-hidden" data-animation="slide-up" data-delay="200">
                            <div class="absolute top-0 right-0 p-4">
                                <span class="text-[40px] font-black text-orange/5 select-none group-hover:text-orange/10 transition-colors">03</span>
                            </div>
                            <div class="flex items-start mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    🕋
                                </div>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Keberangkatan & Miqat</h3>
                            <p class="text-text/70 text-sm mb-6">Memulai perjalanan spiritual dengan kesucian lahir batin dari titik Miqat yang telah ditentukan.</p>
                            <ul class="space-y-2 mb-4">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Mandi Sunnah & Memakai Ihram
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Mengucapkan Niat & Talbiah
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Menjaga Larangan Selama Ihram
                                </li>
                            </ul>
                        </div>

                        <!-- Tasuh Umrah - FAQ Umrah -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate relative overflow-hidden" data-animation="slide-up" data-delay="300">
                            <div class="absolute top-0 right-0 p-4">
                                <span class="text-[40px] font-black text-orange/5 select-none group-hover:text-orange/10 transition-colors">04</span>
                            </div>
                            <div class="flex items-start mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    🕌
                                </div>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Inti Pelaksanaan Umrah</h3>
                            <p class="text-text/70 text-sm mb-6">Langkah-langkah inti ibadah Umrah di Masjidil Haram yang harus dilakukan secara tertib.</p>
                            <ul class="space-y-2 mb-4">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Tawaf Mengelilingi Ka'bah 7x
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Sa'i Antara Shafa & Marwah
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Tahalul (Potong/Cukur Rambut)
                                </li>
                            </ul>
                        </div>

                        <!-- Tasuh Umrah - Doa & Dzikir -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate relative overflow-hidden" data-animation="slide-up" data-delay="400">
                            <div class="absolute top-0 right-0 p-4">
                                <span class="text-[40px] font-black text-orange/5 select-none group-hover:text-orange/10 transition-colors">05</span>
                            </div>
                            <div class="flex items-start mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    🤲
                                </div>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Ibadah Sunnah & Doa</h3>
                            <p class="text-text/70 text-sm mb-6">Mengoptimalkan waktu di tanah suci dengan memperbanyak doa dan ibadah di tempat-tempat mustajab.</p>
                            <ul class="space-y-2 mb-4">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Doa di Multazam & Maqam Ibrahim
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Shalat Arba'in di Madinah
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Ziarah Raudhah & Makam Nabi
                                </li>
                            </ul>
                        </div>

                        <!-- Tasuh Umrah - Tips & Trik -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate relative overflow-hidden" data-animation="slide-up" data-delay="500">
                            <div class="absolute top-0 right-0 p-4">
                                <span class="text-[40px] font-black text-orange/5 select-none group-hover:text-orange/10 transition-colors">06</span>
                            </div>
                            <div class="flex items-start mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    💡
                                </div>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Ziarah & Kepulangan</h3>
                            <p class="text-text/70 text-sm mb-6">Menutup perjalanan dengan ziarah sejarah dan persiapan fisik sebelum kembali ke keluarga.</p>
                            <ul class="space-y-2 mb-4">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Tawaf Wada' (Perpisahan)
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Packing & Check-out Hotel
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Persiapan Oleh-oleh & Kesehatan
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- HAJI SECTION (Hidden by default) -->
                <div id="category-haji" class="category-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Step 01: Administrasi -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate relative overflow-hidden" data-animation="slide-up" data-delay="0">
                            <div class="absolute top-0 right-0 p-4">
                                <span class="text-[40px] font-black text-orange/5 select-none group-hover:text-orange/10 transition-colors">01</span>
                            </div>
                            <div class="flex items-start mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    ✈️
                                </div>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Pendaftaran & Administrasi</h3>
                            <p class="text-text/70 text-sm mb-6">Memvalidasi porsi Haji, pelunasan BPIH, dan pengurusan Visa Haji resmi (Haji Reguler/Khusus).</p>
                            <ul class="space-y-2 mb-4">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Validasi Nomor Porsi Haji
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Paspor & Visa Haji Aktif
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Pemeriksaan Kesehatan Istitha'ah
                                </li>
                            </ul>
                        </div>

                        <!-- Step 02: Persiapan -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate relative overflow-hidden" data-animation="slide-up" data-delay="100">
                            <div class="absolute top-0 right-0 p-4">
                                <span class="text-[40px] font-black text-orange/5 select-none group-hover:text-orange/10 transition-colors">02</span>
                            </div>
                            <div class="flex items-start mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    📋
                                </div>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Bimbingan Manasik Haji</h3>
                            <p class="text-text/70 text-sm mb-6">Mengikuti rangkaian bimbingan untuk memahami perbedaan Haji Tamattu, Ifrad, dan Qiran.</p>
                            <ul class="space-y-2 mb-4">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Praktik Tawaf, Sa'i, & Wukuf
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Pemantapan Doa-doa Haji
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Persiapan Mental & Fisik (Stamina)
                                </li>
                            </ul>
                        </div>

                        <!-- Step 03: Tarwiyah -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate relative overflow-hidden" data-animation="slide-up" data-delay="200">
                            <div class="absolute top-0 right-0 p-4">
                                <span class="text-[40px] font-black text-orange/5 select-none group-hover:text-orange/10 transition-colors">03</span>
                            </div>
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    ⛺
                                </div>
                                <div></div>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Ihram & Mina (8 Dzulhijjah)</h3>
                            <p class="text-text/70 text-sm mb-6">Memakai Ihram dari Makkah dan menuju Mina untuk melakukan hari Tarwiyah (Mabit di Mina).</p>
                            <ul class="space-y-2 mb-4">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Niat Haji & Pakai Ihram
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Berangkat ke Mina (Pagi Hari)
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Shalat Qashar & Mabit di Mina
                                </li>
                            </ul>
                        </div>

                        <!-- Step 04: Wukuf -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate relative overflow-hidden" data-animation="slide-up" data-delay="300">
                            <div class="absolute top-0 right-0 p-4">
                                <span class="text-[40px] font-black text-orange/5 select-none group-hover:text-orange/10 transition-colors">04</span>
                            </div>
                            <div class="flex items-start mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    ☀️
                                </div>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Wukuf Arafah (9 Dzulhijjah)</h3>
                            <p class="text-text/70 text-sm mb-6">Puncak Ibadah Haji. Berdiam diri di Padang Arafah dari Dzuhur hingga terbenam matahari.</p>
                            <ul class="space-y-2 mb-4">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Mendengar Khutbah Wukuf
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Perbanyak Doa & Istighfar
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Berangkat ke Muzdalifah (Maghrib)
                                </li>
                            </ul>
                        </div>

                        <!-- Step 05: Muzdalifah -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate relative overflow-hidden" data-animation="slide-up" data-delay="400">
                            <div class="absolute top-0 right-0 p-4">
                                <span class="text-[40px] font-black text-orange/5 select-none group-hover:text-orange/10 transition-colors">05</span>
                            </div>
                            <div class="flex items-start mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    🌑
                                </div>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Muzdalifah & Jumrah Aqabah</h3>
                            <p class="text-text/70 text-sm mb-6">Mabit sesaat di Muzdalifah untuk mengambil kerikil, lalu menuju Mina untuk Jumrah Aqabah.</p>
                            <ul class="space-y-2 mb-4">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Ambil 7 Kerikil di Muzdalifah
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Lempar Jumrah Aqabah (10 Dzulhijjah)
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Tahalul Awal (Potong Rambut)
                                </li>
                            </ul>
                        </div>

                        <!-- Step 06: Tawaf Ifadhah -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate relative overflow-hidden" data-animation="slide-up" data-delay="500">
                            <div class="absolute top-0 right-0 p-4">
                                <span class="text-[40px] font-black text-orange/5 select-none group-hover:text-orange/10 transition-colors">06</span>
                            </div>
                            <div class="flex items-start mb-4">
                                <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                    🕋
                                </div>
                            </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Tawaf Ifadhah & Sa'i Haji</h3>
                            <p class="text-text/70 text-sm mb-6">Melakukan Rukun Haji terakhir di Masjidil Haram untuk menyempurnakan ibadah Haji.</p>
                            <ul class="space-y-2 mb-4">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Tawaf Ifadhah & Shalat di Maqam Ibrahim
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Sa'i Haji Shafa-Marwah
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Tahalul Tsani (Bebas Larangan Ihram)
                                </li>
                            </ul>
                        </div>

                        <!-- Step 07: Hari Tasyrik -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate relative overflow-hidden" data-animation="slide-up" data-delay="600">
                                <div class="absolute top-0 right-0 p-4">
                                    <span class="text-[40px] font-black text-orange/5 select-none group-hover:text-orange/10 transition-colors">07</span>
                                </div>
                                <div class="flex items-start mb-4">
                                    <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                        ⛺
                                    </div>
                                </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Mabit Mina & Lempar Jumrah</h3>
                            <p class="text-text/70 text-sm mb-6">Menginap di Mina selama hari Tasyrik (11, 12, 13 Dzulhijjah) dan melempar 3 Jumrah.</p>
                            <ul class="space-y-2 mb-4">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Mabit di Mina (Setiap Malam)
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Lempar 3 Jumrah (Ula, Wustha, Aqabah)
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Nafar Awwal atau Nafar Tsani
                                </li>
                            </ul>
                        </div>

                        <!-- Step 08: Wada -->
                        <div class="glass-dashboard rounded-2xl p-8 border border-orange/20 hover:border-orange hover:shadow-xl transition-all duration-300 group scroll-animate relative overflow-hidden" data-animation="slide-up" data-delay="700">
                                <div class="absolute top-0 right-0 p-4">
                                    <span class="text-[40px] font-black text-orange/5 select-none group-hover:text-orange/10 transition-colors">08</span>
                                </div>
                                <div class="flex items-start mb-4">
                                    <div class="w-14 h-14 rounded-xl bg-gradient-sunset text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform filter-none brightness-110">
                                        🏡
                                    </div>
                                </div>
                            <h3 class="text-xl font-serif font-bold text-text mb-3">Tawaf Wada' & Homecoming</h3>
                            <p class="text-text/70 text-sm mb-6">Penutup ibadah Haji dengan Tawaf Perpisahan sebelum meninggalkan kota suci Makkah.</p>
                            <ul class="space-y-2 mb-4">
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Tawaf Wada' Tanpa Sa'i
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Doa Mabrur & Persiapan Pulang
                                </li>
                                <li class="flex items-center text-sm text-text/80">
                                    <span class="text-orange mr-2">✓</span> Penjemputan Air Zam-zam & Barang
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="mt-20 bg-gradient-sunset rounded-3xl p-12 text-white text-center">
                <h3 class="text-3xl font-serif font-bold mb-4">Siap untuk Perjalanan Spiritual Anda?</h3>
                <p class="text-lg text-white/90 mb-8 max-w-2xl mx-auto">Hubungi tim Al-Khairat untuk konsultasi dan panduan lengkap mengenai paket Umrah atau Haji Anda.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('home') }}#paket" class="bg-white text-orange font-bold px-8 py-4 rounded-2xl hover:shadow-xl hover:scale-105 transition-all">
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
