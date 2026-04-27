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
            <!-- Quick Action -->
            <div class="hidden lg:flex items-center gap-2">
                <div class="px-3 py-1.5 rounded-lg bg-orange/10 border border-orange/20 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span class="text-[10px] font-bold text-orange uppercase tracking-widest">System Online</span>
                </div>
            </div>

            <!-- Dark Mode Toggle -->
            <button onclick="toggleDashboardTheme()" id="dashboardThemeToggle" class="relative p-2 rounded-2xl bg-gradient-to-br from-indigo-100 to-purple-100 dark:from-amber-900/30 dark:to-yellow-900/20 border-2 border-indigo-300 dark:border-amber-600 hover:border-indigo-400 dark:hover:border-amber-500 hover:scale-110 active:scale-95 transition-all duration-300 touch-manipulation group shadow-lg shadow-indigo-300/30 dark:shadow-amber-900/40 hover:shadow-indigo-400/50 dark:hover:shadow-amber-700/60" title="Toggle Dark/Light Mode">
                <!-- GLOW RING EFFECT ON HOVER -->
                <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-indigo-400/0 via-indigo-400/20 to-indigo-400/0 dark:from-amber-500/0 dark:via-amber-500/20 dark:to-amber-500/0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                
                <!-- SUN ICON -->
                <svg id="themeIconSun" class="w-5 h-5 hidden relative z-10 text-amber-500 dark:text-yellow-400 group-hover:text-yellow-400 dark:group-hover:text-yellow-300 group-hover:rotate-90 transition-all duration-500 drop-shadow-[0_0_6px_rgba(251,191,36,0.8)] dark:drop-shadow-[0_0_14px_rgba(250,204,21,1)] group-hover:drop-shadow-[0_0_14px_rgba(250,204,21,1)] dark:group-hover:drop-shadow-[0_0_18px_rgba(253,224,71,1)] group-hover:scale-110" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"/>
                </svg>
                
                <!-- MOON ICON -->
                <svg id="themeIconMoon" class="w-5 h-5 hidden relative z-10 text-indigo-500 dark:text-indigo-300 group-hover:text-indigo-400 dark:group-hover:text-violet-300 group-hover:-rotate-12 transition-all duration-500 drop-shadow-[0_0_6px_rgba(99,102,241,0.6)] dark:drop-shadow-[0_0_10px_rgba(165,180,252,0.8)] group-hover:drop-shadow-[0_0_16px_rgba(139,92,246,1)] group-hover:scale-110" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                </svg>
            </button>

            <!-- Profile Dropdown -->
            @if(auth()->check())
            <div class="relative">
                <button onclick="toggleProfileMenu(event)" class="flex items-center gap-3 p-1 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-300 border border-transparent hover:border-slate-200 dark:hover:border-slate-700">
                    <div class="relative">
                        <img src="{{ auth()->user()->avatar_url }}" 
                             alt="Avatar" 
                             class="w-9 h-9 rounded-lg object-cover border border-slate-200 dark:border-slate-700">
                        <div class="absolute -bottom-1 -right-1 w-3 h-3 rounded-full bg-orange border-2 border-white shadow-sm"></div>
                    </div>
                    <div class="hidden md:block text-left">
                        <p class="text-xs font-bold text-charcoal dark:text-slate-100 truncate max-w-[100px]">{{ auth()->user()->nickname ?? auth()->user()->name }}</p>
                        <p class="text-[9px] font-bold text-orange/80 uppercase tracking-tighter">{{ auth()->user()->role }}</p>
                    </div>
                    <svg id="profile-chevron" class="w-4 h-4 text-slate-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div id="adminProfileMenu" class="absolute right-0 mt-4 w-56 bg-white dark:bg-slate-900/95 backdrop-blur-xl rounded-2xl opacity-0 invisible translate-y-2 transition-all duration-300 overflow-hidden shadow-2xl shadow-purple-500/20 dark:shadow-amber-500/10 border-2 border-purple-200 dark:border-slate-700/50 z-[70]">
                    <!-- Header Profile -->
                    <div class="p-5 bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-950/40 dark:to-pink-950/30 border-b-2 border-purple-200 dark:border-purple-800/30">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full shadow-lg shadow-purple-400/30 dark:shadow-purple-500/20 ring-2 ring-purple-300 dark:ring-purple-600 overflow-hidden">
                                <img src="{{ auth()->user()->avatar_url }}" alt="Avatar" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-bold text-slate-800 dark:text-slate-100 truncate">{{ auth()->user()->name ?? 'User' }}</p>
                                <p class="text-[10px] text-slate-500 dark:text-slate-400 truncate mt-0.5">{{ auth()->user()->email ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Menu Items -->
                    <div class="p-2">
                        <!-- Pengaturan Profil -->
                        <a href="{{ route('profile.edit') }}" class="group flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 dark:text-slate-400 hover:bg-purple-50 dark:hover:bg-purple-900/30 hover:text-purple-600 dark:hover:text-purple-400 hover:shadow-md hover:shadow-purple-500/20 dark:hover:shadow-purple-700/20 hover:scale-[1.02] active:scale-95 transition-all duration-200 border border-transparent hover:border-purple-200 dark:hover:border-purple-800/50">
                            <div class="w-8 h-8 rounded-lg bg-purple-100 dark:bg-purple-900/50 flex items-center justify-center group-hover:bg-purple-200 dark:group-hover:bg-purple-800/50 group-hover:shadow-sm group-hover:shadow-purple-400/30 transition-all ring-1 ring-purple-300 dark:ring-purple-700 group-hover:ring-purple-400 dark:group-hover:ring-purple-500">
                                <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <span class="text-xs font-semibold group-hover:translate-x-0.5 transition-transform">Pengaturan Profil</span>
                        </a>
                        
                        @if(auth()->check() && auth()->user()->isAdmin())
                        <!-- Pengaturan Sistem -->
                        <a href="{{ route('settings.index') }}" class="group flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 dark:text-slate-400 hover:bg-indigo-50 dark:hover:bg-indigo-900/30 hover:text-indigo-600 dark:hover:text-indigo-400 hover:shadow-md hover:shadow-indigo-500/20 dark:hover:shadow-indigo-700/20 hover:scale-[1.02] active:scale-95 transition-all duration-200 mt-1 border border-transparent hover:border-indigo-200 dark:hover:border-indigo-800/50">
                            <div class="w-8 h-8 rounded-lg bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center group-hover:bg-indigo-200 dark:group-hover:bg-indigo-800/50 group-hover:shadow-sm group-hover:shadow-indigo-400/30 transition-all ring-1 ring-indigo-300 dark:ring-indigo-700 group-hover:ring-indigo-400 dark:group-hover:ring-indigo-500">
                                <svg class="w-4 h-4 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path></svg>
                            </div>
                            <span class="text-xs font-semibold group-hover:translate-x-0.5 transition-transform">Pengaturan Sistem</span>
                        </a>
                        @endif
                        
                        <!-- Separator -->
                        <div class="my-2 mx-3 border-t-2 border-purple-200 dark:border-slate-800"></div>
                        
                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="group w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-500 dark:text-red-500 hover:bg-red-50 dark:hover:bg-red-950/30 hover:text-red-600 dark:hover:text-red-400 hover:shadow-md hover:shadow-red-500/20 dark:hover:shadow-red-800/20 hover:scale-[1.02] active:scale-95 transition-all duration-200 border border-transparent hover:border-red-200 dark:hover:border-red-800/50">
                                <div class="w-8 h-8 rounded-lg bg-red-100 dark:bg-red-900/50 flex items-center justify-center group-hover:bg-red-200 dark:group-hover:bg-red-800/50 group-hover:shadow-sm group-hover:shadow-red-400/30 transition-all ring-1 ring-red-300 dark:ring-red-700 group-hover:ring-red-400 dark:group-hover:ring-red-500">
                                    <svg class="w-4 h-4 group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                </div>
                                <span class="text-xs font-black uppercase tracking-widest group-hover:translate-x-0.5 transition-transform">Logout</span>
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



