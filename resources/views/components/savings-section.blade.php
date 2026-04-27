<section id="tabungan" class="section-py relative overflow-hidden transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16 scroll-animate" data-animation="fade-up">
            <span class="inline-flex items-center space-x-2 bg-orange/10 border border-orange/20 px-4 py-1.5 rounded-full text-sm font-semibold text-orange mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m.599-1c.51-.598.599-1.454.599-2.401 0-1.045-.09-1.903-.599-2.401M11.401 9c-.51.598-.599 1.454-.599 2.401 0 1.11.402 2.08 1 2.599" />
                </svg>
                <span>Program Tabungan Umroh</span>
            </span>
            <h2 class="text-heading mb-6">Wujudkan Niat Suci dengan <span class="text-gradient-sunset">Tabungan Umroh</span></h2>
            <p class="text-subheading opacity-80 decoration-charcoal/30">Nabung suka-suka, berangkat bahagia. Pilihan tepat bagi Anda yang ingin mewujudkan impian ke Tanah Suci secara bertahap tanpa beban biaya langsung.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="contact-glass-card scroll-animate" data-animation="slide-up">
                <div class="contact-info-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Setoran Bebas</h3>
                <p class="text-text/70">Tentukan sendiri nominal tabunganmu setiap harinya, mulai dari nominal terkecil sekalipun sesuai kemampuan Anda.</p>
            </div>

            <!-- Card 2 -->
            <div class="contact-glass-card scroll-animate" data-animation="slide-up" style="animation-delay: 0.1s;">
                <div class="contact-info-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Target Paket</h3>
                <p class="text-text/70">Pilih paket umroh impianmu dan pantau progres pencapaian tabunganmu secara real-time di dashboard jemaah.</p>
            </div>

            <!-- Card 3 -->
            <div class="contact-glass-card scroll-animate" data-animation="slide-up" style="animation-delay: 0.2s;">
                <div class="contact-info-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.040 12.02 12.02 0 003 9c1.357 1.996 3.396 3.627 5.718 4.586 2.323-.959 4.36-2.59 5.718-4.586 1.053-1.549 1.547-3.268 1.482-5.02z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Aman & Transparan</h3>
                <p class="text-text/70">Seluruh riwayat tabungan tersimpan rapi di sistem dan Anda akan mendapatkan nomor rekening resmi perusahaan.</p>
            </div>
        </div>

        <div class="mt-16 text-center scroll-animate" data-animation="fade-up">
            @guest
                <a href="{{ route('register') }}" class="btn-primary inline-flex items-center space-x-3 px-12 py-4">
                    <span>Mulai Menabung Sekarang</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
                <p class="mt-4 text-sm text-text/50">Sudah punya akun? <a href="{{ route('login') }}" class="text-orange hover:underline">Masuk di sini</a></p>
            @else
                <a href="{{ auth()->user()->isAdmin() ? route('admin.savings.index') : route('member.savings') }}" class="btn-primary inline-flex items-center space-x-3 px-12 py-4">
                    <span>{{ auth()->user()->isAdmin() ? 'Kelola Tabungan' : 'Buka Tabungan Saya' }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                </a>
            @endguest
        </div>
    </div>
</section>
