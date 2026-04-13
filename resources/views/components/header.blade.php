<!-- Premium Dashboard Header -->
<header class="sticky top-0 z-50 transition-all duration-500 w-full px-4 py-4">
    <div class="max-w-[1600px] mx-auto flex justify-between items-center bg-white rounded-2xl px-6 py-3 border-slate-200 shadow-xl">
        
        <!-- Left: Search Area -->
        <div class="flex items-center gap-6 flex-1 max-w-2xl">
            <!-- Mobile Menu Toggle -->
            <button onclick="toggleSidebar()" class="md:hidden p-2 rounded-xl text-slate-400 hover:bg-slate-100 hover:text-orange transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>


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
            @if(auth()->check())
            <div class="relative group">
                <button class="flex items-center gap-3 p-1 rounded-xl hover:bg-slate-50 transition-all duration-300 border border-transparent hover:border-slate-200">
                    <div class="relative">
                        <img src="{{ auth()->user()->avatar_url }}" 
                             alt="Avatar" 
                             class="w-9 h-9 rounded-lg object-cover border border-slate-200">
                        <div class="absolute -bottom-1 -right-1 w-3 h-3 rounded-full bg-orange border-2 border-white shadow-sm"></div>
                    </div>
                    <div class="hidden md:block text-left">
                        <p class="text-xs font-bold text-charcoal truncate max-w-[100px]">{{ auth()->user()->nickname ?? auth()->user()->name }}</p>
                        <p class="text-[9px] font-bold text-orange/80 uppercase tracking-tighter">{{ auth()->user()->role }}</p>
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
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 hover:bg-orange/5 hover:text-orange transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <span class="text-xs font-medium">Pengaturan Profil</span>
                        </a>
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
            @else
            <a href="{{ route('login') }}" class="px-4 py-2 bg-orange text-white font-semibold rounded-lg hover:bg-orange/90 transition">
                Login
            </a>
            @endif
        </div>
    </div>
</header>



