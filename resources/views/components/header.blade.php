<!-- Premium Dashboard Header -->
<header class="sticky top-0 z-50 transition-all duration-500 w-full px-2 md:px-4 py-2 md:py-4">
    <div class="max-w-[1600px] mx-auto flex justify-between items-center bg-white dark:bg-slate-900 rounded-xl md:rounded-2xl px-4 md:px-6 py-2 md:py-3 border border-slate-200 dark:border-slate-800 shadow-xl">
        
        <!-- Left: Search Area -->
        <div class="flex items-center gap-3 md:gap-4 flex-1 max-w-2xl">
            <!-- Mobile Menu Toggle -->
            <button onclick="toggleSidebar()" class="md:hidden -ml-2 p-3 rounded-xl text-slate-500 hover:bg-slate-100 hover:text-orange transition-all relative z-[70] cursor-pointer" aria-label="Toggle Sidebar">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <!-- Vertical Separator (Mobile only) -->
            <div class="h-6 w-[1px] bg-slate-200 dark:bg-slate-800 md:hidden"></div>

            <!-- Breadcrumb inside Header -->
            @include('components.breadcrumb')
        </div>

        <!-- Right: Actions & Profile -->
        <div class="flex items-center gap-3 sm:gap-6">
            <!-- Quick Action (Desktop) -->
            <div class="hidden lg:flex items-center gap-2">
                <div class="px-3 py-1.5 rounded-lg bg-orange/10 border border-orange/20 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span class="text-[10px] font-bold text-orange uppercase tracking-widest">System Online</span>
                </div>
            </div>

            <!-- Theme Toggle (Desktop Only) -->
            <button onclick="toggleDashboardTheme()" class="hidden md:flex items-center justify-center p-2.5 rounded-xl bg-white dark:bg-slate-800 text-slate-500 hover:text-orange transition-all border-2 border-slate-100 dark:border-slate-700 hover:border-orange/50 dark:hover:border-orange/50 group shadow-sm hover:shadow-orange/10 active:scale-95" aria-label="Toggle Theme">
                <svg id="themeIconSun" class="w-5 h-5 hidden text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"/>
                </svg>
                <svg id="themeIconMoon" class="w-5 h-5 text-indigo-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                </svg>
            </button>

            @if(auth()->check())
            <!-- Profile Dropdown (Desktop Only) -->
            <div class="relative hidden md:block">
                <button onclick="toggleProfileMenu(event)" class="flex items-center gap-3 pl-2 pr-4 py-1.5 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-700 transition-all hover:bg-white dark:hover:bg-slate-800 hover:shadow-lg hover:shadow-slate-200/50 dark:hover:shadow-none hover:border-orange/20 active:scale-95 group shadow-sm">
                    <div class="w-9 h-9 rounded-lg bg-orange text-white flex items-center justify-center font-bold shadow-lg shadow-orange/20 overflow-hidden ring-2 ring-white dark:ring-slate-900 group-hover:scale-105 transition-transform">
                        @if(auth()->user()->avatar_url)
                            <img src="{{ auth()->user()->avatar_url }}" class="w-full h-full object-cover" alt="Avatar">
                        @else
                            {{ substr(auth()->user()->name, 0, 1) }}
                        @endif
                    </div>
                    <div class="hidden sm:block text-left">
                        <p class="text-xs font-black text-slate-800 dark:text-slate-100 leading-none group-hover:text-orange transition-colors">{{ auth()->user()->name }}</p>
                        <p class="text-[9px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest mt-1">{{ auth()->user()->role }}</p>
                    </div>
                    <svg id="profile-chevron" class="w-4 h-4 text-slate-400 group-hover:text-orange transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div id="adminProfileMenu" class="invisible opacity-0 translate-y-2 absolute right-0 mt-3 w-64 bg-white dark:bg-slate-900 rounded-2xl shadow-2xl border border-slate-100 dark:border-slate-800 transition-all duration-300 z-[100] overflow-hidden">
                    <div class="p-4 bg-slate-50/50 dark:bg-slate-800/50 border-b border-slate-100 dark:border-slate-800">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Signed in as</p>
                        <p class="text-xs font-bold text-slate-800 dark:text-slate-100 truncate">{{ auth()->user()->email }}</p>
                    </div>
                    <div class="p-2">
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 dark:text-slate-400 hover:bg-orange/10 hover:text-orange transition-all group/item">
                            <div class="w-8 h-8 rounded-lg bg-slate-100 dark:bg-slate-800 flex items-center justify-center group-hover/item:bg-white dark:group-hover/item:bg-slate-700 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <span class="text-xs font-black uppercase tracking-widest">Data Profil</span>
                        </a>
                    </div>
                    <div class="p-2 border-t border-slate-50 dark:border-slate-800">
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition-all group/item">
                                <div class="w-8 h-8 rounded-lg bg-red-50 dark:bg-red-900/30 flex items-center justify-center group-hover/item:bg-white dark:group-hover/item:bg-red-900/50 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                </div>
                                <span class="text-xs font-black uppercase tracking-widest">Sign Out</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @else
            <a href="{{ route('login') }}" class="px-4 py-2 bg-orange text-white font-semibold rounded-lg hover:bg-orange/90 transition">
                Login
            </a>
            @endif
        </div>
    </div>
</header>



