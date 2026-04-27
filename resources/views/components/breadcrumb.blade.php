<div class="flex items-center gap-1 md:gap-2 text-sm">
    <a href="{{ route('dashboard') }}" class="text-slate-400 dark:text-slate-500 hover:text-orange font-bold transition-colors tracking-tight flex items-center gap-1.5">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
        <span class="hidden sm:inline">Command Center</span>
    </a>
    <svg class="w-3 h-3 text-slate-300 dark:text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
    </svg>
    <span class="text-orange font-black tracking-widest uppercase text-[10px] bg-orange/10 px-3 py-1 rounded-lg border border-orange/20 whitespace-nowrap">@yield('breadcrumb', 'Overview')</span>
</div>
