@extends('layouts.layout')

@section('title', 'Admin Command Center - Al-Khairat')
@section('breadcrumb', 'Overview')

@section('content')
    <div class="space-y-12">
        <!-- Welcome Hero Section -->
        <div class="relative overflow-hidden rounded-[2rem] p-8 md:p-12 gradient-sunset border border-orange/20 group shadow-2xl shadow-orange/20">
            <div class="absolute -right-20 -top-20 w-80 h-80 bg-white/10 blur-[100px] rounded-full group-hover:bg-white/20 transition-all duration-700"></div>
            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-8">
                <div>
                    <h1 class="text-4xl md:text-5xl font-serif font-bold text-white leading-tight">
                        Selamat Datang, <span class="text-white decoration-gold underline underline-offset-8">{{ explode(' ', auth()->user()->name)[0] }}</span>!
                    </h1>
                    <p class="text-white/80 mt-6 text-lg max-w-xl font-medium">
                        Akses kendali penuh untuk operasional Al-Khairat Tour & Travel. <br class="hidden md:block"> Semuanya terpantau dalam satu dashboard premium.
                    </p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-right hidden sm:block">
                        <p class="text-[10px] text-white/60 font-bold uppercase tracking-[0.2em] mb-1">Status Sistem</p>
                        <p class="text-emerald-300 font-bold flex items-center justify-end gap-2 text-sm italic">
                           <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span> 100% Operational
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8">
            <!-- Total Users -->
            <div class="dashboard-card group animate-[fadeUp_1s_ease-out_0.1s_both]">
                <div class="flex items-start justify-between">
                    <div>
                        <div class="dashboard-stat-icon group-hover:scale-110 group-hover:rotate-6">
                            <svg class="w-6 h-6 text-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Total Jamaah</p>
                        <p class="text-3xl font-black text-charcoal mt-2 leading-none">{{ number_format($totalUsers) }}</p>
                    </div>
                    <div class="text-emerald-600 text-xs font-bold bg-emerald-50 px-2 py-1 rounded-lg">
                        +12%
                    </div>
                </div>
            </div>

            <!-- Total Paket -->
            <div class="dashboard-card group animate-[fadeUp_1s_ease-out_0.2s_both]">
                <div class="flex items-start justify-between">
                    <div>
                        <div class="dashboard-stat-icon group-hover:scale-110 group-hover:-rotate-6 bg-gold/10">
                            <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Paket Layanan</p>
                        <p class="text-3xl font-black text-charcoal mt-2 leading-none">{{ $totalProducts }}</p>
                    </div>
                </div>
            </div>

            <!-- Paket Aktif -->
            <div class="dashboard-card group animate-[fadeUp_1s_ease-out_0.3s_both]">
                <div class="flex items-start justify-between">
                    <div>
                        <div class="dashboard-stat-icon group-hover:scale-110 group-hover:rotate-6 bg-emerald-50">
                            <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Running Tours</p>
                        <p class="text-3xl font-black text-charcoal mt-2 leading-none">{{ $activeProducts }}</p>
                    </div>
                    <div class="text-orange text-[10px] font-bold border border-orange/20 px-2 py-1 rounded-lg uppercase tracking-tighter">
                        Active Now
                    </div>
                </div>
            </div>

            <!-- Revenue -->
            <div class="dashboard-card group animate-[fadeUp_1s_ease-out_0.4s_both]">
                <div class="flex items-start justify-between">
                    <div>
                        <div class="dashboard-stat-icon group-hover:scale-110 group-hover:-rotate-6 bg-amber-50">
                            <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Total Valuasi</p>
                        <p class="text-2xl font-black text-charcoal mt-2 leading-none">Rp {{ number_format($totalRevenue / 1000000, 1, ',', '.') }}jt</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Data Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Recent Users Table -->
            <div class="glass-dashboard rounded-[2rem] p-8 animate-[fadeUp_1s_ease-out_0.5s_both]">
                <div class="flex justify-between items-center mb-8 px-2">
                    <div>
                        <h2 class="text-xl font-bold text-charcoal">Log Registrasi Terbaru</h2>
                        <p class="text-xs text-slate-400 mt-1">Antrean jamaah yang baru bergabung sistem.</p>
                    </div>
                    <a href="{{ route('users.index') }}" class="btn-dashboard btn-dashboard-primary text-xs !px-4">Semua Jamaah</a>
                </div>
                
                <div class="space-y-4">
                    @forelse($recentUsers as $user)
                    <div class="group flex items-center justify-between p-4 rounded-2xl hover:bg-slate-50 border border-transparent hover:border-slate-100 transition-all duration-300">
                        <div class="flex items-center gap-4">
                            <div class="relative">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=E07856&color=fff&size=80" 
                                     alt="{{ $user->name }}" class="w-12 h-12 rounded-xl object-cover border border-slate-100 group-hover:border-orange transition-colors">
                                <div class="absolute -top-1 -right-1 w-3 h-3 rounded-full bg-emerald-500 border-2 border-white"></div>
                            </div>
                            <div>
                                <p class="font-bold text-slate-700 text-sm group-hover:text-orange transition-colors">{{ $user->name }}</p>
                                <p class="text-[10px] text-slate-400 tracking-wider">{{ $user->email }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                             <span class="inline-block px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-widest shadow-sm {{ $user->role === 'admin' ? 'bg-orange/10 text-orange border border-orange/20' : 'bg-slate-100 text-slate-500 border border-slate-200' }}">
                                {{ $user->role }}
                            </span>
                            <p class="text-[9px] text-slate-400 mt-2 italic font-medium">{{ $user->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-10">
                        <div class="w-16 h-16 bg-slate-50 rounded-2xl border border-slate-100 flex items-center justify-center mx-auto mb-4">
                             <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-slate-400 text-sm italic">Belum ada jamaah baru masuk antrean.</p>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Recent Products -->
            <div class="glass-dashboard rounded-[2rem] p-8 animate-[fadeUp_1s_ease-out_0.6s_both]">
                <div class="flex justify-between items-center mb-8 px-2">
                    <div>
                        <h2 class="text-xl font-bold text-charcoal">Layanan Umroh Unggulan</h2>
                        <p class="text-xs text-slate-400 mt-1">Status ketersediaan paket dan harga terbaru.</p>
                    </div>
                    <a href="{{ route('products.index') }}" class="btn-dashboard bg-slate-50 hover:bg-slate-100 text-slate-600 text-xs !px-4 border border-slate-200">Katalog Paket</a>
                </div>
                
                <div class="space-y-4">
                    @forelse($recentProducts as $product)
                    <div class="group flex items-center justify-between p-5 rounded-3xl bg-slate-50/50 border border-slate-100 hover:border-orange/30 transition-all duration-500">
                        <div class="flex items-center gap-5">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-orange to-gold flex items-center justify-center border border-white/20 group-hover:scale-105 transition-transform shadow-lg shadow-orange/10">
                                <span class="text-xl">🕋</span>
                            </div>
                            <div>
                                <p class="font-black text-slate-700 text-sm group-hover:text-orange transition-colors uppercase tracking-tight">{{ $product->name }}</p>
                                <div class="flex items-center gap-3 mt-1.5">
                                    <span class="text-[10px] text-orange font-bold uppercase">{{ $product->category }}</span>
                                    <span class="w-1 h-1 rounded-full bg-slate-200"></span>
                                    <span class="text-[10px] text-slate-400">{{ $product->duration }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-black text-charcoal text-base">Rp {{ number_format($product->price / 1000000, 1, ',', '.') }}<span class="text-xs text-slate-400 ml-0.5">jt</span></p>
                            <span class="inline-flex items-center gap-1.5 mt-2 {{ $product->status === 'active' ? 'text-emerald-600' : 'text-red-500' }} text-[9px] font-bold uppercase tracking-widest bg-white px-2 py-0.5 rounded-full border border-slate-100">
                                <span class="w-1 h-1 rounded-full {{ $product->status === 'active' ? 'bg-emerald-500 animate-pulse' : 'bg-red-500' }}"></span>
                                {{ $product->status === 'active' ? 'Listed' : 'Private' }}
                            </span>
                        </div>
                    </div>
                    @empty
                    <p class="text-slate-400 text-sm text-center py-10 italic">Layanan tidak ditemukan.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection
