<footer class="bg-slate-900 text-slate-300 py-12 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <!-- About Company -->
            <div class="col-span-1 md:col-span-1">
                <div class="mb-6 bg-white rounded-xl inline-block p-3 shadow-xl">
                    <img src="{{ asset('images/logo.jpg') }}" class="h-16 object-contain" alt="Al-Khairat Logo">
                </div>
                <p class="text-sm text-slate-400 leading-relaxed">
                    Al-Khairat Tour & Travel - Perjalanan penuh kehangatan, pelayanan secerah mentari. Pendamping spiritual terbaik Anda menuju Baitullah.
                </p>
            </div>
            
            <!-- Menu -->
            <div>
                <h3 class="text-white font-bold mb-6 uppercase tracking-widest text-xs">Menu Utama</h3>
                <ul class="space-y-3 text-sm">
                    <li><a href="{{ route('home') }}#keunggulan" class="text-slate-400 hover:text-orange transition">Keunggulan</a></li>
                    <li><a href="{{ route('home') }}#paket" class="text-slate-400 hover:text-orange transition">Paket Umroh</a></li>
                    <li><a href="{{ route('home') }}#testimoni" class="text-slate-400 hover:text-orange transition">Testimoni</a></li>
                    <li><a href="{{ route('home') }}#faq" class="text-slate-400 hover:text-orange transition">FAQ</a></li>
                </ul>
            </div>
            
            <!-- Digital Guide -->
            <div>
                <h3 class="text-white font-bold mb-6 uppercase tracking-widest text-xs">Panduan Digital</h3>
                <ul class="space-y-3 text-sm">
                    <li><a href="{{ route('panduan-tasuh') }}" class="text-slate-400 hover:text-orange transition">Panduan Tasuh</a></li>
                    <li><a href="{{ route('gallery') }}" class="text-slate-400 hover:text-orange transition">Galeri Video</a></li>
                    <li><a href="{{ route('home') }}#digital-guidance" class="text-slate-400 hover:text-orange transition">Manasik Digital</a></li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div>
                <h3 class="text-white font-bold mb-6 uppercase tracking-widest text-xs">Kontak & Lokasi</h3>
                <ul class="space-y-4 text-sm">
                    <li class="flex items-start gap-3">
                        <span class="text-orange">📧</span>
                        <span class="text-slate-400">info@alkhairat.com</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-orange">📞</span>
                        <span class="text-slate-400">+62 812-5308-8788</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-orange">📍</span>
                        <span class="text-slate-400">Jl. Lambung Mangkurat No.29, Samarinda, Kalimantan Timur</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Divider -->
        <div class="border-t border-slate-800 pt-8 mt-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-xs text-slate-500">
                    &copy; 2024 Al-Khairat Tour & Travel. Semua hak cipta terlindungi.
                </p>
                <div class="flex space-x-6 text-xs">
                    <a href="#" class="text-slate-500 hover:text-orange transition">Kebijakan Privasi</a>
                    <a href="#" class="text-slate-500 hover:text-orange transition">Syarat & Ketentuan</a>
                    <a href="#" class="text-slate-500 hover:text-orange transition">Sitemap</a>
                </div>
            </div>
        </div>
    </div>
</footer>
