@extends('layouts.layout')
@section('title', 'Monitoring Tabungan Umroh')
@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="bg-white dark:bg-slate-800/50 rounded-[2.5rem] p-8 shadow-sm border border-slate-100 dark:border-slate-700 backdrop-blur-md">
        <div class="flex items-center space-x-6">
            <div class="p-4 bg-orange/10 text-orange rounded-2xl">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m.599-1c.51-.598.599-1.454.599-2.401 0-1.045-.09-1.903-.599-2.401M11.401 9c-.51.598-.599 1.454-.599 2.401 0 1.11.402 2.08 1 2.599" />
                </svg>
            </div>
            <div>
                <h2 class="text-2xl md:text-3xl font-black text-slate-800 dark:text-slate-100 leading-tight tracking-tight">Monitoring Tabungan</h2>
                <p class="text-sm md:text-base text-slate-400 dark:text-slate-500 font-medium mt-1">Pantau progres tabungan jemaah dan riwayat setoran.</p>
            </div>
        </div>
    </div>

    <!-- Stats Summary Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Active Savers -->
        <div class="bg-white dark:bg-slate-800/50 p-8 rounded-[2.5rem] border border-slate-100 dark:border-slate-700 shadow-sm flex items-center gap-6 group hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500">
            <div class="w-14 h-14 bg-slate-50 dark:bg-slate-900 rounded-2xl flex items-center justify-center text-slate-400 dark:text-slate-500 group-hover:bg-orange/10 group-hover:text-orange transition-colors duration-500">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
            <div>
                <p class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-[0.2em] mb-1">Penabung Aktif</p>
                <h4 class="text-3xl font-black text-slate-800 dark:text-slate-100 tracking-tight">{{ $plans->where('status', 'active')->count() }} <span class="text-sm font-bold text-slate-300 dark:text-slate-600">Jemaah</span></h4>
            </div>
        </div>

        <!-- Total Collected -->
        <div class="bg-white dark:bg-slate-800/50 p-8 rounded-[2.5rem] border border-slate-100 dark:border-slate-700 shadow-sm flex items-center gap-6 group hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500">
            <div class="w-14 h-14 bg-slate-50 dark:bg-slate-900 rounded-2xl flex items-center justify-center text-slate-400 dark:text-slate-500 group-hover:bg-orange/10 group-hover:text-orange transition-colors duration-500">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m.599-1c.51-.598.599-1.454.599-2.401 0-1.045-.09-1.903-.599-2.401M11.401 9c-.51.598-.599 1.454-.599 2.401 0 1.11.402 2.08 1 2.599"/></svg>
            </div>
            <div>
                <p class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-[0.2em] mb-1">Dana Terkumpul</p>
                <h4 class="text-3xl font-black text-slate-800 dark:text-slate-100 tracking-tight">Rp {{ number_format($totalSavings, 0, ',', '.') }}</h4>
            </div>
        </div>

        <!-- Refund Cases -->
        <div class="bg-white dark:bg-slate-800/50 p-8 rounded-[2.5rem] border border-slate-100 dark:border-slate-700 shadow-sm flex items-center gap-6 group hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500">
            <div class="w-14 h-14 bg-red-50 dark:bg-red-900/20 text-red-400 rounded-2xl flex items-center justify-center group-hover:bg-red-100 transition-colors duration-500">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
            <div>
                <p class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-[0.2em] mb-1">Kasus Refund</p>
                <h4 class="text-3xl font-black text-slate-800 dark:text-slate-100 tracking-tight">{{ $plans->where('status', 'refund_requested')->count() }} <span class="text-sm font-bold text-slate-300 dark:text-slate-600">Orang</span></h4>
            </div>
        </div>

        <!-- Total Refund Amount (RED CARD) -->
        <div class="bg-red-600 p-8 rounded-[2.5rem] shadow-xl shadow-red-200 flex items-center gap-6 group hover:scale-[1.02] transition-all duration-500 overflow-hidden relative">
            <div class="absolute -right-4 -bottom-4 opacity-10 group-hover:rotate-12 transition-transform duration-700">
                <svg class="w-40 h-40 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="w-14 h-14 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center text-white relative z-10">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="relative z-10">
                <p class="text-[10px] font-black text-white/70 uppercase tracking-[0.2em] mb-1">Total Refund (RP)</p>
                <h4 class="text-3xl font-black text-white tracking-tight">Rp {{ number_format($totalPendingRefunds ?? 0, 0, ',', '.') }}</h4>
            </div>
        </div>
    </div>

    <!-- Search Section -->
    <div class="bg-white dark:bg-slate-800/50 rounded-[3rem] p-4 shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-700">
        <form action="{{ route('admin.savings.index') }}" method="GET" class="relative group">
            <div class="absolute inset-y-0 left-0 pl-8 flex items-center pointer-events-none">
                <div class="p-2 bg-slate-100 dark:bg-slate-900 rounded-xl group-focus-within:bg-orange/10 group-focus-within:text-orange text-slate-400 dark:text-slate-500 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>
            <input type="text" name="search" id="dashboardSearch" value="{{ request('search') }}" 
                class="w-full pl-20 pr-14 py-6 bg-slate-50/30 dark:bg-slate-900/30 border-2 border-transparent focus:border-orange focus:bg-white dark:focus:bg-slate-800 focus:ring-[12px] focus:ring-orange/5 focus:outline-none transition-all duration-500 text-lg font-bold text-slate-700 dark:text-slate-200 placeholder:text-slate-400 placeholder:font-normal rounded-[2rem]" 
                placeholder="Cari Jemaah, Email, atau Paket Tabungan...">
            
            @if(request('search'))
                <a href="{{ route('admin.savings.index') }}" class="absolute inset-y-0 right-0 pr-8 flex items-center text-slate-300 hover:text-red-500 transition-colors duration-200">
                    <div class="p-2 hover:bg-red-50 dark:hover:bg-red-900/30 rounded-xl transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </a>
            @endif
        </form>
    </div>

    <!-- Table Section -->
    <div class="bg-white dark:bg-slate-800/40 rounded-[2.5rem] shadow-sm border border-slate-100 dark:border-slate-700 overflow-hidden backdrop-blur-sm">
                
                @if(request('search'))
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Filter:</span>
                    <span class="px-3 py-1 bg-orange/10 text-orange text-xs font-bold rounded-lg border border-orange/20">{{ request('search') }}</span>
                </div>
                @endif
            </div>
        </div>
        <div class="overflow-x-auto dashboard-scroll shadow-inner">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50/80 dark:bg-slate-900/50 border-b border-slate-200 dark:border-slate-700">
                    <tr class="text-[10px] uppercase font-black text-slate-400 dark:text-slate-500 tracking-[0.2em]">
                        <th class="px-6 py-6">Jemaah & Status</th>
                        <th class="px-4 py-6">Paket</th>
                        <th class="px-4 py-6">Target</th>
                        <th class="px-4 py-6 text-right">Saldo</th>
                        <th class="px-4 py-6">Progres</th>
                        <th class="px-6 py-6">Aksi Cepat</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                    @forelse($plans as $plan)
                    <tr class="group hover:bg-slate-100 dark:hover:bg-slate-800/50 transition-all {{ $plan->status == 'refund_requested' ? 'bg-red-50/40 dark:bg-red-900/10' : '' }}">
                        <!-- Member Info -->
                        <td class="px-6 py-8">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-slate-100 dark:bg-slate-900 flex items-center justify-center text-slate-500 dark:text-slate-400 font-black text-lg shadow-inner border border-slate-200 dark:border-slate-700 shrink-0">
                                    {{ substr($plan->user->name, 0, 1) }}
                                </div>
                                <div class="min-w-0">
                                    <p class="text-base font-black text-slate-900 dark:text-slate-100 leading-tight truncate shrink-0 tracking-tight">{{ $plan->user->name }}</p>
                                    <div class="flex items-center gap-1.5 mt-2 flex-wrap">
                                        @if($plan->status == 'refund_requested')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-lg text-[9px] font-black uppercase bg-red-600 text-white tracking-widest animate-pulse">REFUND</span>
                                        @elseif($plan->status == 'refunded')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-lg text-[9px] font-black uppercase bg-emerald-600 text-white tracking-widest text-nowrap">DIBAYAR</span>
                                        @else
                                            <span class="px-2 py-0.5 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 rounded-lg text-[9px] font-black uppercase tracking-widest border border-blue-200 dark:border-blue-900/50">Aktif</span>
                                        @endif
                                        <span class="text-[9px] text-slate-400 dark:text-slate-500 font-bold uppercase truncate max-w-[100px]">{{ $plan->user->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- Paket -->
                        <td class="px-4 py-8">
                            <p class="text-xs font-black text-slate-800 dark:text-slate-200 leading-tight uppercase tracking-widest truncate max-w-[120px]" title="{{ $plan->product->name }}">{{ $plan->product->name }}</p>
                            <div class="mt-1 flex items-center gap-1">
                                <p class="text-[10px] text-slate-500 dark:text-slate-500 font-bold uppercase tracking-widest">{{ $plan->quantity }} TikeT</p>
                            </div>
                        </td>

                        <!-- Target -->
                        <td class="px-4 py-8">
                            <p class="text-sm font-black text-slate-600 dark:text-slate-400 italic">Rp {{ number_format($plan->target_amount, 0, ',', '.') }}</p>
                        </td>

                        <!-- Saldo -->
                        <td class="px-4 py-8 text-right">
                            <p class="text-xl font-black text-orange-600 dark:text-orange-500 tracking-tight">Rp {{ number_format($plan->currentBalance(), 0, ',', '.') }}</p>
                            <p class="mt-1 text-[9px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">{{ $plan->deposits->count() }}x Record</p>
                        </td>

                        <!-- Progres -->
                        <td class="px-4 py-8">
                            <div class="w-24">
                                <span class="text-[10px] font-black text-emerald-600 dark:text-emerald-400 tracking-widest block mb-1">{{ $plan->progressPercentage() }}%</span>
                                <div class="w-full h-2 bg-slate-100 dark:bg-slate-900 rounded-full overflow-hidden border border-slate-200 dark:border-slate-700">
                                    <div class="h-full bg-emerald-500 rounded-full transition-all duration-1000 relative" style="width: {{ $plan->progressPercentage() }}%"></div>
                                </div>
                            </div>
                        </td>

                        <!-- Actions -->
                        <td class="px-6 py-8">
                            <div class="flex items-center gap-2">
                                <button onclick="toggleDetails({{ $plan->id }})" 
                                        class="p-3 bg-white text-orange border-2 border-orange/10 rounded-xl hover:bg-orange/5 transition-all shadow-sm" title="LIHAT DETAIL">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>

                                @if($plan->status == 'active')
                                    <button onclick="openAdminDepositModal({{ $plan->id }}, '{{ $plan->user->name }}', '{{ $plan->product->name }}', {{ $plan->target_amount - $plan->currentBalance() }})" 
                                            class="p-3 bg-orange text-white rounded-xl shadow-lg shadow-orange/20 hover:scale-105 transition-all" title="INPUT SALDO">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                                    </button>
                                @endif

                                @if($plan->status == 'refund_requested')
                                    <button onclick="openCancellationModal({{ $plan->id }}, '{{ $plan->user->name }}', '{{ number_format($plan->currentBalance(), 0, ',', '.') }}', true)" 
                                            class="p-3 bg-red-600 text-white rounded-xl shadow-lg shadow-red-200 hover:scale-105 transition-all" title="PROSES / TOLAK REFUND">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </button>
                                @else
                                    <button onclick="openCancellationModal({{ $plan->id }}, '{{ $plan->user->name }}', '{{ number_format($plan->currentBalance(), 0, ',', '.') }}', false)" 
                                            class="p-3 bg-red-600 text-white rounded-xl shadow-lg shadow-red-500/20 hover:scale-105 transition-all" title="BATALKAN">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/></svg>
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Detail & Riwayat Row -->
                    <tr id="details-{{ $plan->id }}" class="hidden bg-slate-50/50 dark:bg-slate-900/50">
                        <td colspan="6" class="px-8 py-10">
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                                <!-- Left: Member & Package -->
                                <div class="bg-white dark:bg-slate-800 p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm space-y-4">
                                    <div class="flex items-center gap-3 border-b border-slate-50 dark:border-slate-700/50 pb-4">
                                        <div class="w-10 h-10 rounded-xl bg-orange/10 text-orange flex items-center justify-center">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                        </div>
                                        <div>
                                            <p class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Informasi Jemaah</p>
                                            <p class="text-sm font-black text-slate-800 dark:text-slate-100 uppercase leading-tight truncate">{{ $plan->user->name }}</p>
                                        </div>
                                    </div>
                                    <div class="space-y-3">
                                        <div class="flex justify-between items-center">
                                            <span class="text-[10px] font-bold text-slate-400 uppercase">Paket Pilihan</span>
                                            <span class="text-[10px] font-black text-slate-700 uppercase tracking-tight truncate ml-2">{{ $plan->product->name }}</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-[10px] font-bold text-slate-400 uppercase">Jumlah Tiket</span>
                                            <span class="text-[10px] font-black text-slate-700 uppercase">{{ $plan->quantity }} Pax</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase">Target Bulanan</span>
                                            <span class="text-[10px] font-black text-slate-700 dark:text-slate-300">Rp {{ number_format($plan->monthly_target, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Middle: Financial Progress -->
                                <div class="bg-white dark:bg-slate-800 p-6 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-sm space-y-6">
                                    <div class="flex items-center gap-3 border-b border-slate-50 dark:border-slate-700/50 pb-4">
                                        <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                                        </div>
                                        <div>
                                            <p class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Progress Finansial</p>
                                            <p class="text-sm font-black text-slate-800 dark:text-slate-100 uppercase">Status Tabungan</p>
                                        </div>
                                    </div>
                                    <div class="space-y-4">
                                        <div class="flex justify-between items-end">
                                            <div>
                                                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Terkumpul</p>
                                                <p class="text-lg font-black text-orange">Rp {{ number_format($plan->currentBalance(), 0, ',', '.') }}</p>
                                            </div>
                                            <div class="text-right">
                                                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Sisa Target</p>
                                                <p class="text-sm font-black text-slate-600 italic">Rp {{ number_format($plan->target_amount - $plan->currentBalance(), 0, ',', '.') }}</p>
                                            </div>
                                        </div>
                                        <div class="w-full h-3 bg-slate-50 dark:bg-slate-900 rounded-full overflow-hidden border border-slate-100 dark:border-slate-700 p-0.5">
                                            <div class="h-full bg-gradient-to-r from-orange to-amber-500 rounded-full transition-all duration-1000 shadow-[0_0_10px_rgba(249,115,22,0.3)]" style="width: {{ $plan->progressPercentage() }}%"></div>
                                        </div>
                                        <p class="text-[10px] font-black text-center text-emerald-600 tracking-[0.2em] uppercase">{{ $plan->progressPercentage() }}% Menuju Keberangkatan</p>
                                    </div>
                                </div>

                                <!-- Right: Refund Info or Recent History -->
                                <div class="{{ $plan->status == 'refund_requested' || $plan->status == 'refunded' ? 'bg-red-50/30 dark:bg-red-900/10' : 'bg-white dark:bg-slate-800' }} p-6 rounded-3xl border {{ $plan->status == 'refund_requested' || $plan->status == 'refunded' ? 'border-red-100 dark:border-red-900/30' : 'border-slate-100 dark:border-slate-700' }} shadow-sm">
                                    @if($plan->status == 'refund_requested' || $plan->status == 'refunded')
                                        <div class="space-y-4">
                                            <div class="flex items-center gap-3 border-b border-red-100 pb-4">
                                                <div class="w-10 h-10 rounded-xl bg-red-100 text-red-600 flex items-center justify-center animate-pulse">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m.599-1c.51-.598.599-1.454.599-2.401 0-1.045-.09-1.903-.599-2.401M11.401 9c-.51.598-.599 1.454-.599 2.401 0 1.11.402 2.08 1 2.599"/></svg>
                                                </div>
                                                <div>
                                                    <p class="text-[10px] font-black text-red-600 uppercase tracking-widest">Detail Refund</p>
                                                    <p class="text-xs font-bold text-red-800 uppercase italic">{{ $plan->refund_requested_at ? $plan->refund_requested_at->format('d M Y') : '-' }}</p>
                                                </div>
                                            </div>
                                            <div class="space-y-3">
                                                <div class="p-3 bg-white/80 dark:bg-slate-900/50 rounded-2xl border border-red-50 dark:border-red-900/20 shadow-sm">
                                                    <p class="text-[9px] font-black text-slate-400 dark:text-slate-500 uppercase mb-1">Rekening Tujuan</p>
                                                    <p class="text-xs font-black text-slate-800 dark:text-slate-100 uppercase leading-tight truncate">{{ $plan->refund_bank_name }}</p>
                                                    <p class="text-[11px] font-bold text-slate-500 tracking-wider">{{ $plan->refund_bank_account }}</p>
                                                </div>
                                                <div class="p-3 bg-red-600/5 rounded-2xl border border-red-100">
                                                    <p class="text-[9px] font-black text-red-400 uppercase mb-1">Alasan Pembatalan</p>
                                                    <p class="text-[10px] text-red-800 italic leading-relaxed line-clamp-2">"{{ $plan->refund_note ?? 'Tidak ada alasan spesifik.' }}"</p>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="space-y-4">
                                            <div class="flex items-center gap-3 border-b border-slate-50 pb-4">
                                                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                </div>
                                                <div>
                                                    <p class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Setoran Terakhir</p>
                                                    <p class="text-sm font-black text-slate-800 dark:text-slate-100 uppercase">Riwayat Terbaru</p>
                                                </div>
                                            </div>
                                            <div class="space-y-2">
                                                @forelse($plan->deposits->take(3) as $deposit)
                                                    <div class="flex justify-between items-center p-2 hover:bg-slate-50 rounded-xl transition-colors">
                                                        <span class="text-[10px] font-bold text-slate-500">{{ $deposit->created_at->format('d/m/y') }}</span>
                                                        <span class="text-[10px] font-black text-emerald-600">Rp {{ number_format($deposit->amount, 0, ',', '.') }}</span>
                                                    </div>
                                                @empty
                                                    <p class="text-[10px] text-slate-400 italic text-center py-4">Belum ada riwayat.</p>
                                                @endforelse
                                                @if($plan->deposits->count() > 3)
                                                    <p class="text-[9px] text-center text-slate-400 font-bold uppercase tracking-widest">+ {{ $plan->deposits->count() - 3 }} Setoran Lainnya</p>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Full Deposit History -->
                            <div class="mt-8 pt-8 border-t border-slate-100 dark:border-slate-700">
                                <div class="flex items-center justify-between mb-6">
                                    <h5 class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 dark:text-slate-500">Log Riwayat Setoran Lengkap</h5>
                                    <span class="px-3 py-1 bg-slate-100 dark:bg-slate-900 text-slate-500 dark:text-slate-400 text-[9px] font-black rounded-lg uppercase tracking-widest">{{ $plan->deposits->count() }} Transaksi</span>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                    @forelse($plan->deposits as $deposit)
                                        <div class="bg-white dark:bg-slate-800 p-4 rounded-2xl border border-slate-100 dark:border-slate-700 shadow-sm group hover:border-orange/20 transition-all">
                                            <div class="flex justify-between items-start mb-2">
                                                <p class="text-sm font-black text-slate-800 dark:text-slate-100 tracking-tight">Rp {{ number_format($deposit->amount, 0, ',', '.') }}</p>
                                                <span class="text-[8px] font-black text-slate-300 dark:text-slate-600 uppercase bg-slate-50 dark:bg-slate-900 px-1.5 py-0.5 rounded">{{ $deposit->created_at->format('H:i') }}</span>
                                            </div>
                                            <p class="text-[10px] text-slate-400 dark:text-slate-500 font-bold">{{ $deposit->created_at->format('d M Y') }}</p>
                                            @if($deposit->note)
                                                <p class="text-[9px] text-slate-500 italic mt-2 line-clamp-1 group-hover:line-clamp-none transition-all">"{{ $deposit->note }}"</p>
                                            @endif
                                        </div>
                                    @empty
                                        <div class="col-span-full py-8 text-center bg-slate-50/50 rounded-3xl border-2 border-dashed border-slate-200">
                                            <p class="text-xs text-slate-400 italic font-medium tracking-wide uppercase">Belum ada catatan setoran masuk</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-16 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-16 h-16 bg-slate-50 text-slate-200 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                                </div>
                                <h3 class="text-sm font-black text-slate-400 uppercase tracking-widest italic">Belum ada jemaah yang menabung</h3>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Input Setoran (Admin) -->
<div id="adminDepositModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center p-4 backdrop-blur-sm">
    <div class="fixed inset-0 bg-slate-900/60 transition-opacity" onclick="toggleAdminDepositModal()"></div>
    <div class="relative bg-white dark:bg-slate-800 rounded-[2.5rem] w-full max-w-md overflow-hidden shadow-2xl border border-slate-100 dark:border-slate-700 transform transition-all scale-100">
        <div class="p-8">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h3 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Input <span class="text-orange">Setoran</span></h3>
                    <p id="adminDepositUserName" class="text-xs text-slate-400 dark:text-slate-500 font-bold mt-1 uppercase tracking-tight"></p>
                </div>
                <button onclick="toggleAdminDepositModal()" class="p-2 bg-slate-50 dark:bg-slate-900 text-slate-400 hover:text-red-500 rounded-xl transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <form action="{{ route('admin.savings.deposit') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="savings_plan_id" id="adminDepositPlanId">
                
                <div class="px-5 py-4 bg-orange/5 dark:bg-orange/10 rounded-2xl border border-orange/10 dark:border-orange/20 mb-6">
                    <p class="text-[10px] text-orange-600 dark:text-orange-400 font-black uppercase tracking-widest mb-1 text-center">Maksimal Setoran (Sisa Target)</p>
                    <p class="text-xl font-black text-slate-800 dark:text-slate-100 text-center">Rp <span id="adminDepositRemaining">0</span></p>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] uppercase font-black text-slate-400 dark:text-slate-500 tracking-widest ml-1">Nominal Setoran (Rp)</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none text-slate-400 dark:text-slate-600 font-bold">Rp</div>
                        <input type="number" name="amount" id="adminDepositAmount" required placeholder="0" 
                            class="w-full pl-14 pr-6 py-5 bg-slate-50 dark:bg-slate-900 border-2 border-transparent focus:border-orange focus:bg-white dark:focus:bg-slate-800 rounded-[1.5rem] outline-none transition-all text-xl font-black text-slate-800 dark:text-slate-100 placeholder:text-slate-300 dark:placeholder:text-slate-700">
                    </div>
                    <p id="adminDepositError" class="hidden text-[10px] text-red-500 font-bold ml-1 uppercase tracking-wider">⚠️ Jumlah melebihi sisa target!</p>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] uppercase font-black text-slate-400 dark:text-slate-500 tracking-widest ml-1">Catatan / Sumber Dana</label>
                    <textarea name="note" rows="3" placeholder="Misal: Titipan tunai di kantor..." 
                        class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900 border-2 border-transparent focus:border-orange focus:bg-white dark:focus:bg-slate-800 rounded-[1.5rem] outline-none transition-all text-sm font-medium text-slate-600 dark:text-slate-400 placeholder:italic"></textarea>
                </div>

                <button type="submit" class="w-full py-5 bg-orange text-white rounded-[1.5rem] font-black uppercase tracking-[0.2em] text-xs shadow-xl shadow-orange/20 transition-all hover:scale-[1.02] active:scale-95">
                    Konfirmasi Setoran
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Modal Opsi Pembatalan & Refund (Admin) -->
<div id="cancellationModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center p-4 backdrop-blur-sm">
    <div class="fixed inset-0 bg-slate-900/60 transition-opacity" onclick="toggleCancellationModal()"></div>
    <div class="relative bg-white dark:bg-slate-800 rounded-[2.5rem] w-full max-w-md overflow-hidden shadow-2xl border border-slate-100 dark:border-slate-700 transform transition-all scale-100">
        <div class="p-8">
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-red-50 dark:bg-red-900/20 text-red-500 rounded-2xl flex items-center justify-center mx-auto mb-4 rotate-12 group-hover:rotate-0 transition-transform duration-500">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                </div>
                <h3 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Konfirmasi Pembatalan</h3>
                <p id="cancelUserName" class="text-xs text-slate-400 dark:text-slate-500 font-bold mt-2 uppercase"></p>
                <div class="mt-4 px-4 py-3 bg-slate-50 dark:bg-slate-900 rounded-2xl border border-slate-100 dark:border-slate-700 italic">
                    <p class="text-[10px] text-slate-500 dark:text-slate-400 font-medium">Saldo Penampungan:</p>
                    <p class="text-lg font-black text-orange">Rp <span id="cancelBalance">0</span></p>
                </div>
            </div>
            
            <form id="cancellationForm" method="POST" class="space-y-6">
                @csrf
                <div class="space-y-4">
                    <label class="text-[10px] uppercase font-black text-slate-400 dark:text-slate-500 tracking-widest ml-1">Pilih Tindakan (Cross-check)</label>
                    
                    <!-- Option 1: Full Delete -->
                    <div id="optionCardDelete" onclick="selectCancelOption('delete')" class="flex items-start gap-4 p-5 bg-white dark:bg-slate-900 rounded-2xl border-2 border-slate-200 dark:border-slate-700 cursor-pointer transition-all hover:bg-slate-50 dark:hover:bg-slate-800 shadow-sm">
                        <div class="relative flex items-center pt-0.5">
                            <div id="checkIconDelete" class="w-8 h-8 border-2 border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center transition-all bg-slate-50 dark:bg-slate-800">
                                <svg class="w-5 h-5 text-white scale-0 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="4" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <input type="radio" name="action" value="delete" id="inputDelete" class="hidden" required>
                        </div>
                        <div>
                            <p class="text-xs font-black text-slate-800 dark:text-slate-100 uppercase tracking-wide">1. Hapus Permanen (Vanish)</p>
                            <p class="text-[10px] text-slate-400 dark:text-slate-500 leading-tight mt-1 font-medium italic">Data jemaah ini akan hilang sepenuhnya dari database.</p>
                        </div>
                    </div>

                    <!-- Option 2: Mark as Refunded -->
                    <div id="optionCardRefund" onclick="selectCancelOption('refund')" class="flex items-start gap-4 p-5 bg-emerald-50/50 dark:bg-emerald-900/10 rounded-2xl border-2 border-emerald-500 cursor-pointer transition-all shadow-sm relative overflow-hidden">
                        <div class="relative flex items-center pt-0.5 z-10">
                            <div id="checkIconRefund" class="w-8 h-8 border-2 border-emerald-500 rounded-xl flex items-center justify-center transition-all bg-emerald-500">
                                <svg class="w-5 h-5 text-white scale-100 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="4" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <input type="radio" name="action" value="refund" id="inputRefund" class="hidden" checked>
                        </div>
                        <div class="z-10">
                            <p id="refundTitle" class="text-xs font-black text-emerald-800 dark:text-emerald-400 uppercase tracking-wide">2. Konfirmasi & Bayar Refund</p>
                            <p id="refundDesc" class="text-[10px] text-emerald-600/70 dark:text-emerald-500/70 leading-tight mt-1 font-medium italic">Saldo jemaah akan ditandai sebagai "DI REFUND" (Terbayar).</p>
                        </div>
                    </div>

                    <!-- Option 3: Reject Refund (Only visible for refund_requested) -->
                    <div id="optionCardReject" onclick="selectCancelOption('reject')" class="hidden flex items-start gap-4 p-5 bg-white dark:bg-slate-900 rounded-2xl border-2 border-slate-200 dark:border-slate-700 cursor-pointer transition-all hover:bg-slate-50 dark:hover:bg-slate-800 shadow-sm">
                        <div class="relative flex items-center pt-0.5">
                            <div id="checkIconReject" class="w-8 h-8 border-2 border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center transition-all bg-slate-50 dark:bg-slate-800">
                                <svg class="w-5 h-5 text-white scale-0 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="4" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </div>
                            <input type="radio" name="action" value="reject" id="inputReject" class="hidden">
                        </div>
                        <div>
                            <p class="text-xs font-black text-slate-800 dark:text-slate-100 uppercase tracking-wide">3. Tolak Pengajuan Refund</p>
                            <p class="text-[10px] text-slate-400 dark:text-slate-500 leading-tight mt-1 font-medium italic">Kembalikan ke status aktif & beri alasan penolakan.</p>
                        </div>
                    </div>
                </div>

                <div id="transferConfirmationBox" class="p-5 bg-amber-50 dark:bg-amber-900/20 rounded-2xl border border-amber-200 dark:border-amber-900/50 space-y-3">
                    <label class="flex items-start gap-3 cursor-pointer group">
                        <div class="relative flex items-center pt-0.5">
                            <input type="checkbox" id="transferCheckbox" onchange="toggleRefundButton()" class="w-5 h-5 rounded border-2 border-amber-300 dark:border-amber-700 text-amber-600 focus:ring-amber-500 transition-all cursor-pointer">
                        </div>
                        <p class="text-[11px] font-bold text-amber-800 dark:text-amber-500 leading-snug">
                            Saya mengonfirmasi bahwa dana sebesar <span class="text-red-600 font-black">Rp <span id="confirmBalance">0</span></span> sudah ditransfer sepenuhnya ke rekening jemaah.
                        </p>
                    </label>
                </div>
                
                <div class="space-y-2">
                    <label class="text-[10px] uppercase font-black text-slate-400 dark:text-slate-500 tracking-widest ml-1">Catatan Tambahan (Alasan)</label>
                    <textarea name="note" rows="2" placeholder="Misal: Jemaah mundur karena kendala kesehatan..." class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900 border border-slate-100 dark:border-slate-700 rounded-2xl focus:ring-2 focus:ring-orange/20 outline-none transition-all text-xs text-slate-600 dark:text-slate-400 placeholder:italic"></textarea>
                </div>

                <div class="flex gap-3">
                    <button type="button" onclick="toggleCancellationModal()" class="flex-1 py-4 bg-slate-100 dark:bg-slate-900 text-slate-500 rounded-2xl font-black uppercase tracking-widest text-[10px] transition-all hover:bg-slate-200 dark:hover:bg-slate-700">
                        Batal
                    </button>
                    <button type="submit" id="cancelFormSubmitBtn" class="flex-[2] py-4 bg-red-500 text-white rounded-2xl font-black uppercase tracking-widest text-[10px] shadow-lg shadow-red-200 transition-all hover:scale-[1.02] active:scale-95">
                        Konfirmasi Tindakan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function toggleDetails(id) {
        const row = document.getElementById('details-' + id);
        row.classList.toggle('hidden');
    }

    function toggleAdminDepositModal() {
        const modal = document.getElementById('adminDepositModal');
        modal.classList.toggle('hidden');
    }

    function openAdminDepositModal(planId, userName, productName, remaining) {
        document.getElementById('adminDepositPlanId').value = planId;
        document.getElementById('adminDepositUserName').innerText = userName + ' | ' + productName;
        document.getElementById('adminDepositRemaining').innerText = new Intl.NumberFormat('id-ID').format(remaining);
        
        const amountInput = document.getElementById('adminDepositAmount');
        amountInput.max = remaining;
        amountInput.value = '';
        
        const errorText = document.getElementById('adminDepositError');
        errorText.classList.add('hidden');

        amountInput.oninput = function() {
            if (parseInt(this.value) > remaining) {
                errorText.classList.remove('hidden');
                this.classList.add('border-red-500');
                this.classList.remove('focus:border-orange');
            } else {
                errorText.classList.add('hidden');
                this.classList.remove('border-red-500');
                this.classList.add('focus:border-orange');
            }
        };

        toggleAdminDepositModal();
    }

    // Cancellation Modal Logic
    const cardRefund = document.getElementById('optionCardRefund');
    const cardReject = document.getElementById('optionCardReject');
    const cardDelete = document.getElementById('optionCardDelete');
    const transferBox = document.getElementById('transferConfirmationBox');
    const refundTitle = document.getElementById('refundTitle');
    const refundDesc = document.getElementById('refundDesc');
    const submitBtn = document.getElementById('cancelSubmitBtn');
    const transferCheckbox = document.getElementById('transferCheckbox');

    function toggleCancellationModal() {
        const modal = document.getElementById('cancellationModal');
        modal.classList.toggle('hidden');
    }

    function openCancellationModal(id, name, balance, isRefundRequest = false) {
        const form = document.getElementById('cancellationForm');
        document.getElementById('cancelUserName').innerText = name;
        document.getElementById('cancelBalance').innerText = balance;
        document.getElementById('confirmBalance').innerText = balance;
        form.action = `/admin/savings/${id}/cancel`;
        
        // Modal state based on status
        if (isRefundRequest) {
            cardReject.classList.remove('hidden');
            cardDelete.classList.add('hidden');
            refundTitle.innerText = "2. Konfirmasi & Bayar Refund";
            refundDesc.innerText = "Saldo jemaah akan ditandai sebagai 'DI REFUND' (Terbayar).";
            selectCancelOption('refund');
        } else {
            cardReject.classList.add('hidden');
            cardDelete.classList.remove('hidden');
            refundTitle.innerText = "2. Hapus & Simpan Sebagai Refund";
            refundDesc.innerText = "Data tetap tersimpan dengan label 'DI REFUND'.";
            selectCancelOption('refund');
        }
        
        toggleCancellationModal();
    }

    function selectCancelOption(option) {
        // Set Radios
        const inputDelete = document.getElementById('inputDelete');
        const inputRefund = document.getElementById('inputRefund');
        const inputReject = document.getElementById('inputReject');

        if(inputDelete) inputDelete.checked = (option === 'delete');
        if(inputRefund) inputRefund.checked = (option === 'refund');
        if(inputReject) inputReject.checked = (option === 'reject');

        const cards = {
            'delete': document.getElementById('optionCardDelete'),
            'refund': document.getElementById('optionCardRefund'),
            'reject': document.getElementById('optionCardReject')
        };
        const icons = {
            'delete': document.getElementById('checkIconDelete'),
            'refund': document.getElementById('checkIconRefund'),
            'reject': document.getElementById('checkIconReject')
        };

        // Reset All Visuals
        Object.keys(cards).forEach(key => {
            const card = cards[key];
            const icon = icons[key];
            if (!card) return;

            // Remove all possible state classes
            card.classList.remove('border-red-500', 'bg-red-50/50', 'border-emerald-500', 'bg-emerald-50/50', 'border-amber-500', 'bg-amber-50/50', 'bg-white', 'border-slate-200');
            icon.classList.remove('bg-red-500', 'border-red-500', 'bg-emerald-500', 'border-emerald-500', 'bg-amber-500', 'border-amber-500', 'bg-slate-50', 'border-slate-200');
            
            // Set Default
            card.classList.add('bg-white', 'border-slate-200');
            icon.classList.add('bg-slate-50', 'border-slate-200');
            const svg = icon.querySelector('svg');
            if(svg) svg.classList.add('scale-0');
        });

        // Apply Selection
        const activeCard = cards[option];
        const activeIcon = icons[option];
        if (activeCard && activeIcon) {
            activeCard.classList.remove('bg-white', 'border-slate-200');
            activeIcon.classList.remove('bg-slate-50', 'border-slate-200');

            if (option === 'refund') {
                activeCard.classList.add('border-emerald-500', 'bg-emerald-50/50');
                activeIcon.classList.add('bg-emerald-500', 'border-emerald-500');
            } else {
                // Delete & Reject are both RED now as requested
                activeCard.classList.add('border-red-500', 'bg-red-50/50');
                activeIcon.classList.add('bg-red-500', 'border-red-500');
            }
            const svg = activeIcon.querySelector('svg');
            if(svg) svg.classList.remove('scale-0');
        }

        // Handle Transfer Checkbox
        const transferBox = document.getElementById('transferConfirmationBox');
        const isRefundProcess = (option === 'refund' && document.getElementById('refundTitle').innerText.includes("Konfirmasi"));
        
        if (isRefundProcess) {
            transferBox.classList.remove('hidden');
        } else {
            transferBox.classList.add('hidden');
        }
        
        toggleRefundButton();
    }

    function toggleRefundButton() {
        const actionInput = document.querySelector('input[name="action"]:checked');
        if (!actionInput) return;
        
        const action = actionInput.value;
        const submitBtn = document.getElementById('cancelFormSubmitBtn');
        const transferCheckbox = document.getElementById('transferCheckbox');
        const transferBox = document.getElementById('transferConfirmationBox');
        const isTransferNeeded = (action === 'refund' && !transferBox.classList.contains('hidden'));

        if (isTransferNeeded && !transferCheckbox.checked) {
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
        } else {
            submitBtn.disabled = false;
            submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        }
    }

    // Search Highlighting
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const searchQuery = urlParams.get('search');
        
        if (searchQuery && searchQuery.length >= 2) {
            const table = document.querySelector('table');
            const cells = table.querySelectorAll('td p, td span.font-black, td span.text-slate-400');
            const regex = new RegExp(`(${searchQuery})`, 'gi');
            
            cells.forEach(cell => {
                if (cell.textContent.toLowerCase().includes(searchQuery.toLowerCase())) {
                    cell.innerHTML = cell.innerHTML.replace(regex, '<mark class="bg-orange/20 text-orange-700 font-bold px-0.5 rounded-sm font-sans">$1</mark>');
                }
            });
        }
    });
</script>
@endpush
@endsection
