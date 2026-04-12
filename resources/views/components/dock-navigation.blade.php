<!-- Floating Navigation Dock -->
<div class="dock-container">
    <div class="dock-wrapper">
        <!-- Beranda -->
        <a href="{{ route('home') }}" class="dock-item group" data-section="hero-slideshow">
            <span class="dock-label">Home</span>
            <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </a>

        <!-- Tentang Kami -->
        <a href="{{ route('home') }}#about" class="dock-item group" data-section="about">
            <span class="dock-label">Tentang Kami</span>
            <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </a>

        <!-- Keunggulan / Layanan -->
        <a href="{{ route('home') }}#keunggulan" class="dock-item group" data-section="keunggulan">
            <span class="dock-label">Layanan</span>
            <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-7.714 2.143L11 21l-2.286-6.857L1 12l7.714-2.143L11 3z"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </a>

        <!-- Paket -->
        <a href="{{ route('home') }}#paket" class="dock-item group" data-section="paket">
            <span class="dock-label">Paket</span>
            <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </a>

        <!-- Testimoni / Ulasan -->
        <a href="{{ route('home') }}#testimoni" class="dock-item group" data-section="testimoni">
            <span class="dock-label">Ulasan</span>
            <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </a>

        <!-- Galeri / Video -->
        <a href="{{ route('gallery') }}" class="dock-item group" data-section="gallery">
            <span class="dock-label">Video</span>
            <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </a>

        <!-- Panduan -->
        <a href="{{ route('panduan-tasuh') }}" class="dock-item group" data-section="digital-guidance">
            <span class="dock-label">Panduan</span>
            <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </a>

        <!-- Kontak -->
        <a href="{{ route('home') }}#contact" class="dock-item group" data-section="contact">
            <span class="dock-label">Kontak</span>
            <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </a>

        <!-- Divider -->
        <div class="dock-divider"></div>

        <!-- Theme Toggle -->
        <button onclick="toggleTheme()" class="dock-item group" id="theme-toggle">
            <span class="dock-label" id="theme-label">Malam</span>
            <svg id="moon-icon" class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
            </svg>
            <svg id="sun-icon" class="dock-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </button>

        <!-- Voice Search -->
        <button onclick="openVoiceSearch()" class="dock-item group" id="voice-search-trigger">
            <span class="dock-label">Suara</span>
            <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </button>

        <!-- Manual Search -->
        <button onclick="toggleSearch()" class="dock-item group" id="search-trigger">
            <span class="dock-label">Cari</span>
            <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </button>

        @auth
        <a href="{{ route('profile.edit') }}" class="dock-item group active">
            <span class="dock-label">{{ auth()->user()->nickname ?? 'Profil' }}</span>
            <img src="{{ auth()->user()->avatar_url }}" 
                 alt="Avatar" 
                 class="dock-icon w-6 h-6 rounded-full border border-orange/20 object-cover">
            <div class="dock-active-dot"></div>
        </a>
        @else
        <a href="{{ route('login') }}" class="dock-item group">
            <span class="dock-label">Masuk/Login</span>
            <svg class="dock-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            <div class="dock-active-dot"></div>
        </a>
        @endauth
    </div>
</div>

<!-- Search Overlay (from welcome.blade.php) -->
<div id="search-overlay" class="fixed inset-0 z-[1000] bg-bg/95 backdrop-blur-2xl opacity-0 invisible transition-all duration-500 flex flex-col items-center justify-start pt-32 px-4">
    <button onclick="toggleSearch()" class="absolute top-8 right-8 text-text/50 hover:text-orange transition-all p-2 rounded-full hover:bg-orange/10">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
    </button>

    <div class="w-full max-w-3xl space-y-8 animate-fade-in">
        <div class="text-center space-y-2">
            <h2 class="text-4xl font-serif font-bold text-text">Apa yang Anda <span class="text-gradient-sunset">Cari?</span></h2>
            <p class="text-text/60">Cari paket umroh, artikel, atau informasi lainnya.</p>
        </div>

        <div class="relative group">
            <div class="absolute inset-y-0 left-6 flex items-center pointer-events-none">
                <svg class="w-8 h-8 text-orange/50 group-focus-within:text-orange transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="text" id="search-input" 
                class="w-full bg-surface/50 border-2 border-border focus:border-orange rounded-[2.5rem] py-6 pl-20 pr-32 text-2xl text-text outline-none transition-all shadow-2xl focus:ring-8 focus:ring-orange/5"
                placeholder="Ketik kata kunci di sini...">
            
            <button onclick="toggleSearch()" class="absolute right-3 top-1/2 -translate-y-1/2 bg-gradient-sunset text-white h-[80%] px-8 rounded-full font-bold shadow-lg hover:shadow-orange/20 hover:scale-105 transition-all flex items-center gap-2">
                <span>Cari</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </button>
        </div>
    </div>
</div>

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
        
        <div id="voice-pulse-1" class="absolute inset-0 bg-indigo-500 rounded-full -z-10 animate-ping opacity-0"></div>
        <div id="voice-pulse-2" class="absolute inset-0 bg-indigo-500 rounded-full -z-10 animate-ping delay-700 opacity-0"></div>
        
        <h2 id="voice-status" class="mt-12 text-2xl md:text-3xl font-bold text-white tracking-wide text-center px-4">Ada yang bisa kami bantu?</h2>
        <p class="mt-4 text-white/60 text-sm md:text-base tracking-[0.2em] uppercase font-light">Kami Mendengarkan...</p>
    </div>
</div>

@push('scripts')
<script>
    // Theme Toggle
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

    document.addEventListener('DOMContentLoaded', () => {
        updateThemeUI(document.documentElement.classList.contains('dark'));
    });

    // Search Functions
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
    }

    // Voice Search
    function openVoiceSearch() {
        const overlay = document.getElementById('voice-overlay');
        overlay.classList.remove('invisible', 'opacity-0');
        overlay.classList.add('visible', 'opacity-100');
        startSpeechRecognition();
    }

    function closeVoiceSearch() {
        const overlay = document.getElementById('voice-overlay');
        overlay.classList.add('invisible', 'opacity-0');
        overlay.classList.remove('visible', 'opacity-100');
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
            
            setTimeout(() => {
                const cleanText = transcript.replace(/[.,?]/g, '');

                if (cleanText.includes('paket') || cleanText === 'umroh') {
                    closeVoiceSearch();
                    window.location.hash = 'paket';
                    setTimeout(() => window.location.href = '{{ route("home") }}#paket', 500);
                } else if (cleanText.includes('tentang') || cleanText === 'info') {
                    closeVoiceSearch();
                    setTimeout(() => window.location.href = '{{ route("home") }}#about', 500);
                } else if (cleanText.includes('ulasan') || cleanText === 'testimoni') {
                    closeVoiceSearch();
                    setTimeout(() => window.location.href = '{{ route("home") }}#testimoni', 500);
                } else if (cleanText.includes('panduan') || cleanText.includes('manasik')) {
                    closeVoiceSearch();
                    setTimeout(() => window.location.href = '{{ route("home") }}#digital-guidance', 500);
                } else {
                    document.getElementById('voice-status').innerText = "Perintah tidak dikenali";
                    setTimeout(() => closeVoiceSearch(), 1500);
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

    // Search Input Events
    const searchInput = document.getElementById('search-input');
    if (searchInput) {
        searchInput.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                const keyword = e.target.value.toLowerCase();
                
                // Navigate based on keyword
                if (keyword.includes('paket') || keyword === 'umroh') {
                    window.location.href = '{{ route("home") }}#paket';
                } else if (keyword.includes('tentang')) {
                    window.location.href = '{{ route("home") }}#about';
                } else if (keyword.includes('ulasan')) {
                    window.location.href = '{{ route("home") }}#testimoni';
                } else if (keyword.includes('panduan')) {
                    window.location.href = '{{ route("home") }}#digital-guidance';
                } else {
                    window.location.href = '{{ route("home") }}';
                }
                toggleSearch();
            }
        });
    }

    // Keyboard Shortcuts
    document.addEventListener('keydown', (e) => {
        const searchOverlay = document.getElementById('search-overlay');
        if (e.key === 'Escape' && !searchOverlay.classList.contains('invisible')) {
            toggleSearch();
        }
        if ((e.ctrlKey || e.metaKey) && (e.key === 'f' || e.key === 'k')) {
            e.preventDefault();
            toggleSearch();
        }
    });

    // Expose functions globally
    window.toggleTheme = toggleTheme;
    window.toggleSearch = toggleSearch;
    window.fillSearch = fillSearch;
    window.openVoiceSearch = openVoiceSearch;
    window.closeVoiceSearch = closeVoiceSearch;
</script>
@endpush
