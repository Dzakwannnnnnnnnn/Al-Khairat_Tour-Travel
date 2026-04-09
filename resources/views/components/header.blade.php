<!-- Premium Dashboard Header -->
<header class="sticky top-0 z-30 transition-all duration-500 w-full px-4 py-4 pointer-events-none">
    <div class="max-w-[1600px] mx-auto flex justify-between items-center bg-white rounded-2xl px-6 py-3 pointer-events-auto border-slate-200 shadow-xl">
        
        <!-- Left: Search Area -->
        <div class="flex items-center gap-6 flex-1 max-w-2xl">
            <!-- Mobile Menu Toggle -->
            <button onclick="toggleSidebar()" class="md:hidden p-2 rounded-xl text-slate-400 hover:bg-slate-100 hover:text-orange transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <!-- Global Search -->
            <div class="hidden sm:flex flex-1 relative group">
                <form id="global-search-form" action="{{ route('products.index') }}" method="GET" class="w-full relative">
                    <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-slate-400 group-focus-within:text-orange transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" name="search" id="global-search-input" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 pl-12 pr-12 text-sm text-charcoal placeholder-slate-400 outline-none focus:border-orange/50 focus:ring-4 focus:ring-orange/10 transition-all duration-300"
                        placeholder="Search system... (Ctrl + K)">
                    
                    <div class="absolute inset-y-0 right-2 flex items-center">
                        <button type="button" id="global-voice-search-btn" class="p-2 rounded-lg text-slate-400 hover:bg-orange/10 hover:text-orange transition-all duration-300" title="Voice Search">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right: Actions & Profile -->
        <div class="flex items-center gap-3 sm:gap-6">
            <!-- Quick Action -->
            <div class="hidden lg:flex items-center gap-2">
                <div class="px-3 py-1.5 rounded-lg bg-orange/10 border border-orange/20 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span class="text-[10px] font-bold text-orange uppercase tracking-widest">System Online</span>
                </div>
            </div>

            <!-- Profile Dropdown -->
            <div class="relative group">
                <button class="flex items-center gap-3 p-1 rounded-xl hover:bg-slate-50 transition-all duration-300 border border-transparent hover:border-slate-200">
                    <div class="relative">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&background=E07856&color=fff&size=64" 
                             alt="Avatar" 
                             class="w-9 h-9 rounded-lg object-cover border border-slate-200">
                        <div class="absolute -bottom-1 -right-1 w-3 h-3 rounded-full bg-orange border-2 border-white shadow-sm"></div>
                    </div>
                    <div class="hidden md:block text-left">
                        <p class="text-xs font-bold text-charcoal truncate max-w-[100px]">{{ auth()->user()->name ?? 'Administrator' }}</p>
                        <p class="text-[9px] font-bold text-orange/80 uppercase tracking-tighter">{{ auth()->user()->role ?? 'Super Admin' }}</p>
                    </div>
                    <svg class="w-4 h-4 text-slate-400 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div class="absolute right-0 mt-4 w-56 bg-white rounded-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible translate-y-2 group-hover:translate-y-0 transition-all duration-300 overflow-hidden shadow-2xl border border-slate-100">
                    <div class="p-5 bg-orange/5 border-b border-slate-50">
                        <p class="text-sm font-bold text-charcoal truncate">{{ auth()->user()->name ?? 'User' }}</p>
                        <p class="text-[10px] text-slate-500 truncate mt-0.5">{{ auth()->user()->email ?? '' }}</p>
                    </div>
                    <div class="p-2">
                        <a href="{{ route('settings.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-orange transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path></svg>
                            <span class="text-xs font-medium">Pengaturan Sitem</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-500 hover:bg-red-50 transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                <span class="text-xs font-black uppercase tracking-widest">Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<script>
    // Global Search & Voice Logic
    document.addEventListener('DOMContentLoaded', () => {
        const globalSearchInput = document.getElementById('global-search-input');
        const globalVoiceBtn = document.getElementById('global-voice-search-btn');
        const globalSearchForm = document.getElementById('global-search-form');

        if (!globalSearchInput) return;

        // Hotkey: Ctrl + K
        document.addEventListener('keydown', (e) => {
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                globalSearchInput.focus();
            }
        });

        if ('webkitSpeechRecognition' in window || 'SpeechRecognition' in window) {
            const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
            const recognition = new SpeechRecognition();
            recognition.lang = 'id-ID';
            recognition.interimResults = false;

            globalVoiceBtn.addEventListener('click', () => {
                if (globalVoiceBtn.classList.contains('is-listening')) {
                    recognition.stop();
                } else {
                    recognition.start();
                }
            });

            recognition.onstart = () => {
                globalVoiceBtn.classList.add('is-listening', 'animate-pulse', 'text-indigo-400');
                globalSearchInput.placeholder = "Listening...";
            };

            recognition.onresult = (event) => {
                const transcript = event.results[0][0].transcript;
                globalSearchInput.value = transcript;
                globalSearchForm.submit();
            };

            recognition.onerror = () => {
                globalVoiceBtn.classList.remove('is-listening', 'animate-pulse', 'text-indigo-400');
                globalSearchInput.placeholder = "Cari apapun...";
            };

            recognition.onend = () => {
                globalVoiceBtn.classList.remove('is-listening', 'animate-pulse', 'text-indigo-400');
                if (!globalSearchInput.value) {
                    globalSearchInput.placeholder = "Search system... (Ctrl + K)";
                }
            };
        } else if (globalVoiceBtn) {
            globalVoiceBtn.style.display = 'none';
        }
    });
</script>
