@extends('layouts.layout')
@section('title', 'Manajemen Pemesanan')
@section('breadcrumb', 'Manajemen Pesanan')
@section('content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="bg-white dark:bg-slate-800/50 rounded-[2.5rem] p-8 shadow-sm border border-slate-100 dark:border-slate-700 backdrop-blur-md mb-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="flex items-center space-x-6">
                <div class="p-4 bg-orange/10 text-orange rounded-2xl hidden md:block">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-black text-slate-800 dark:text-slate-100 leading-tight tracking-tight">Manajemen Pemesanan</h1>
                    <p class="text-sm md:text-base text-slate-400 dark:text-slate-500 font-medium mt-1">Kelola pendaftaran jamaah ke paket umrah.</p>
                </div>
            </div>
            <button onclick="document.getElementById('addBookingModal').classList.remove('hidden')" class="group w-full md:w-auto bg-emerald-600 dark:bg-emerald-700 text-white px-8 py-4 rounded-2xl shadow-lg shadow-emerald-500/20 dark:shadow-emerald-900/30 hover:shadow-xl hover:scale-[1.02] active:scale-95 transition-all duration-300 flex items-center justify-center space-x-3 font-black uppercase tracking-widest text-[10px] border-b-4 border-emerald-800 dark:border-emerald-900">
                <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
                </svg>
                <span>Booking Baru</span>
            </button>
        </div>
    </div>

    <!-- Stats Bar -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 mb-8">
        <div class="bg-white dark:bg-slate-900 p-6 rounded-[2rem] border border-slate-100 dark:border-slate-800 shadow-sm">
            <p class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-1">Total Booking</p>
            <h4 class="text-2xl font-black text-slate-800 dark:text-slate-100">{{ $stats['total'] }}</h4>
        </div>
        <div class="bg-yellow-50 dark:bg-amber-900/20 p-6 rounded-[2rem] border border-yellow-100 dark:border-amber-900/30 shadow-sm">
            <p class="text-[10px] font-black text-yellow-600/60 dark:text-amber-500/60 uppercase tracking-widest mb-1">Menunggu</p>
            <h4 class="text-2xl font-black text-yellow-600 dark:text-amber-500">{{ $stats['pending'] }}</h4>
        </div>
        <div class="bg-blue-50 dark:bg-blue-900/20 p-6 rounded-[2rem] border border-blue-100 dark:border-blue-900/30 shadow-sm">
            <p class="text-[10px] font-black text-blue-600/60 dark:text-blue-400/60 uppercase tracking-widest mb-1">Sudah DP</p>
            <h4 class="text-2xl font-black text-blue-600 dark:text-blue-400">{{ $stats['dp_paid'] }}</h4>
        </div>
        <div class="bg-emerald-50 dark:bg-emerald-900/20 p-6 rounded-[2rem] border border-emerald-100 dark:border-emerald-900/30 shadow-sm">
            <p class="text-[10px] font-black text-emerald-600/60 dark:text-emerald-400/60 uppercase tracking-widest mb-1">Lunas</p>
            <h4 class="text-2xl font-black text-emerald-600 dark:text-emerald-400">{{ $stats['fully_paid'] }}</h4>
        </div>
        <div class="bg-orange/5 dark:bg-orange/10 p-6 rounded-[2rem] border border-orange/10 dark:border-orange/20 shadow-sm">
            <p class="text-[10px] font-black text-orange/60 dark:text-orange/50 uppercase tracking-widest mb-1">Tabungan</p>
            <h4 class="text-2xl font-black text-orange dark:text-orange-400">{{ $stats['savings'] }}</h4>
        </div>
    </div>

    <!-- Alert -->
    @if(session('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 flex items-center shadow-sm mx-2">
        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
        <span class="font-medium">Berhasil!</span>&nbsp;{{ session('success') }}
    </div>
    @endif
    
    <!-- Table Section -->
    <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] shadow-md border border-slate-100 dark:border-slate-800 overflow-hidden transition-all duration-300 backdrop-blur-sm">
        <!-- Dashboard Toolbar -->
        <div class="px-6 py-8 border-b border-slate-100 dark:border-slate-800 bg-gradient-to-r from-slate-50/50 to-white dark:from-slate-900/50 dark:to-slate-900/20">
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                <!-- Tabs Container -->
                <div class="flex items-center p-1 bg-slate-100 dark:bg-slate-800 rounded-2xl overflow-x-auto no-scrollbar max-w-full border border-slate-200/50 dark:border-slate-700/50">
                    <a href="{{ route('bookings.index') }}" 
                        class="whitespace-nowrap px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ !request('status') ? 'bg-white dark:bg-slate-700 text-orange shadow-sm' : 'text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-200' }}">
                        Semua
                    </a>
                    <a href="{{ route('bookings.index', ['status' => 'pending']) }}" 
                        class="whitespace-nowrap px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ request('status') === 'pending' ? 'bg-white dark:bg-slate-800 text-orange shadow-sm' : 'text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-200' }}">
                        Pending
                    </a>
                    <a href="{{ route('bookings.index', ['status' => 'dp_paid']) }}" 
                        class="whitespace-nowrap px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ request('status') === 'dp_paid' ? 'bg-white dark:bg-slate-800 text-orange shadow-sm' : 'text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-200' }}">
                        DP
                    </a>
                    <a href="{{ route('bookings.index', ['status' => 'fully_paid']) }}" 
                        class="whitespace-nowrap px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ request('status') === 'fully_paid' ? 'bg-white dark:bg-slate-800 text-orange shadow-sm' : 'text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-200' }}">
                        Lunas
                    </a>
                    <a href="{{ route('bookings.index', ['status' => 'savings']) }}" 
                        class="whitespace-nowrap px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ request('status') === 'savings' ? 'bg-white dark:bg-slate-800 text-orange shadow-sm' : 'text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-200' }}">
                        Tabungan
                    </a>
                    <a href="{{ route('bookings.index', ['status' => 'completed']) }}" 
                        class="whitespace-nowrap px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ request('status') === 'completed' ? 'bg-white dark:bg-slate-800 text-orange shadow-sm' : 'text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-200' }}">
                        Selesai
                    </a>
                    <a href="{{ route('bookings.index', ['status' => 'cancelled']) }}" 
                        class="whitespace-nowrap px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ request('status') === 'cancelled' ? 'bg-white dark:bg-slate-800 text-orange shadow-sm' : 'text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-200' }}">
                        Batal
                    </a>
                </div>

                <div class="flex-1 max-w-md">
                    <form action="{{ route('bookings.index') }}" method="GET" class="relative group">
                        @if(request('status'))
                            <input type="hidden" name="status" value="{{ request('status') }}">
                        @endif
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 dark:text-slate-500 group-focus-within:text-orange transition-colors duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="text" name="search" id="dashboardSearch" value="{{ request('search') }}" 
                            class="w-full pl-12 pr-12 py-4 bg-white dark:bg-slate-900 border-2 border-slate-100 dark:border-slate-800 rounded-2xl focus:border-orange focus:ring-8 focus:ring-orange/5 focus:outline-none transition-all duration-300 text-sm font-semibold text-slate-700 dark:text-slate-100 placeholder:text-slate-400 placeholder:font-normal shadow-sm group-hover:border-slate-200 dark:group-hover:border-slate-700" 
                            placeholder="Cari Nama, Email atau Kode...">
                        
                        @if(request('search'))
                            <a href="{{ route('bookings.index', request()->only('status')) }}" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-300 hover:text-red-500 transition-colors duration-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto dashboard-scroll shadow-inner bg-slate-50 dark:bg-slate-900/50">
            <table class="w-full">
                <thead class="bg-slate-50 dark:bg-slate-900/50 border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-6 py-6 text-left text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Pemesanan</th>
                        <th class="px-6 py-6 text-left text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Jemaah</th>
                        <th class="px-6 py-6 text-left text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Paket</th>
                        <th class="px-6 py-6 text-center text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Status</th>
                        <th class="px-6 py-6 text-left text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Tanggal</th>
                        <th class="px-6 py-6 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-[0.2em] sticky right-0 bg-white dark:bg-slate-900 z-10 border-l border-slate-100 dark:border-slate-800 shadow-[-10px_0_15px_rgba(0,0,0,0.02)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.2)]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                    @forelse($bookings as $booking)
                    <tr class="bg-white dark:bg-slate-900 hover:bg-orange/5 dark:hover:bg-orange/10 transition-all row-group">
                        <!-- Kode Booking -->
                        <td class="px-8 py-10 vertical-top">
                            <span class="font-mono text-base font-black text-orange-600 block transition-colors row-group-hover:text-orange-700">{{ $booking->booking_code }}</span>
                            @if($booking->group_code)
                            <div class="mt-2 flex items-center gap-2">
                                <span class="px-2 py-1 bg-slate-100 dark:bg-slate-900 text-[10px] font-black text-slate-500 dark:text-slate-400 rounded-md uppercase tracking-widest border border-slate-200 dark:border-slate-800">Group</span>
                                <span class="text-xs font-bold text-slate-400 dark:text-slate-500">{{ $booking->group_code }}</span>
                            </div>
                            @endif
                        </td>

                        <!-- Nama Jemaah -->
                        <td class="px-6 py-8 vertical-top">
                            <p class="font-black text-slate-800 dark:text-slate-100 text-base leading-none tracking-tight truncate shrink-0">{{ $booking->full_name ?? $booking->user->name ?? 'User Terhapus' }}</p>
                            <p class="text-[10px] font-bold text-slate-400 dark:text-slate-500 mt-2 uppercase tracking-widest truncate max-w-[150px]">{{ $booking->orderer_email ?? $booking->user->email ?? '' }}</p>
                            @if($booking->orderer_phone)
                            <div class="flex items-center gap-1.5 mt-1.5 text-[10px] text-slate-500 font-bold row-group-hover:text-slate-800 transition-colors">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                {{ $booking->orderer_phone }}
                            </div>
                            @endif
                        </td>

                        <!-- Paket -->
                        <td class="px-8 py-10 vertical-top">
                            <p class="text-sm font-black text-slate-700 dark:text-slate-300 leading-tight uppercase tracking-wide">{{ $booking->product->name ?? 'Paket Terhapus' }}</p>
                            <div class="mt-3 flex flex-col gap-1">
                                <p class="text-base font-black text-slate-900 dark:text-white">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                                <p class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-[0.2em] italic">Total Tagihan</p>
                            </div>
                        </td>

                        <!-- Status -->
                        <td class="px-8 py-10 text-center vertical-top">
                            @php
                                $statusConf = [
                                    'pending' => ['color' => 'bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-500 border-amber-200 dark:border-amber-900/50', 'label' => 'Menunggu Pembayaran'],
                                    'dp_paid' => ['color' => 'bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 border-blue-200 dark:border-blue-900/50', 'label' => 'Mencicil (DP)'],
                                    'fully_paid' => ['color' => 'bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 border-emerald-200 dark:border-emerald-900/50', 'label' => 'Lunas Terbayar'],
                                    'savings' => ['color' => 'bg-orange-100 dark:bg-orange-900/30 text-orange-700 dark:text-orange-400 border-orange-200 dark:border-orange-900/50', 'label' => 'Tabungan Aktif'],
                                    'completed' => ['color' => 'bg-slate-100 dark:bg-slate-900/30 text-slate-600 dark:text-slate-400 border-slate-200 dark:border-slate-800', 'label' => 'Selesai / Berangkat'],
                                    'cancelled' => ['color' => 'bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 border-red-200 dark:border-red-900/50', 'label' => 'Dibatalkan']
                                ];
                                $conf = $statusConf[$booking->status] ?? ['color' => 'bg-slate-100 dark:bg-slate-900/30 text-slate-500 dark:text-slate-400 border-slate-200 dark:border-slate-800', 'label' => $booking->status];
                            @endphp
                            <span class="inline-block px-5 py-2.5 rounded-2xl text-[11px] font-black uppercase tracking-[0.15em] border-2 {{ $conf['color'] }} shadow-sm">
                                {{ $conf['label'] }}
                            </span>
                            @if($booking->notes)
                            <div class="mt-4 px-4 py-2 bg-slate-50 dark:bg-slate-900/50 rounded-xl border border-slate-100 dark:border-slate-700 max-w-[150px] mx-auto row-group-hover:bg-white dark:row-group-hover:bg-slate-800 row-group-hover:border-slate-200 dark:row-group-hover:border-slate-600 transition-all">
                                <p class="text-[9px] text-slate-400 dark:text-slate-500 font-bold uppercase tracking-widest mb-1">Catatan:</p>
                                <p class="text-[10px] text-slate-600 dark:text-slate-400 font-medium leading-relaxed truncate">{{ $booking->notes }}</p>
                            </div>
                            @endif
                        </td>

                        <!-- Tanggal -->
                        <td class="px-8 py-10 vertical-top">
                            <p class="text-sm font-black text-slate-800 dark:text-slate-100">{{ $booking->created_at->format('d M Y') }}</p>
                            <p class="text-[10px] text-slate-400 dark:text-slate-500 mt-1 uppercase font-black tracking-[0.2em] leading-none">{{ $booking->created_at->format('H:i') }} WIB</p>
                            <div class="mt-4 w-12 h-1 bg-slate-100 dark:bg-slate-700 rounded-full overflow-hidden">
                                <div class="w-1/2 h-full bg-slate-300 dark:bg-slate-500"></div>
                            </div>
                        </td>

                        <!-- Aksi -->
                        <td class="px-6 py-6 sticky right-0 bg-white dark:bg-slate-900 row-group-hover:bg-slate-50 dark:row-group-hover:bg-[#1a2333] transition-colors z-10 border-l border-slate-100 dark:border-slate-800 shadow-[-10px_0_15px_rgba(0,0,0,0.02)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.2)] border-b border-slate-100 dark:border-slate-800">
                            <div class="flex items-center gap-2">
                                <!-- Ubah Button -->
                                <button type="button" class="edit-group btn-edit-booking p-4 bg-gradient-to-r from-amber-400 to-orange-500 dark:from-amber-500 dark:to-orange-600 text-white rounded-xl shadow-md shadow-orange-500/20 dark:shadow-orange-700/30 hover:shadow-lg hover:shadow-orange-500/40 dark:hover:shadow-orange-600/50 hover:scale-110 active:scale-95 active:shadow-sm active:shadow-orange-400/50 transition-all duration-200 touch-manipulation border-2 border-orange-400/50 dark:border-orange-500/50 hover:border-orange-300 dark:hover:border-orange-400" title="UBAH DATA"
                                        data-id="{{ $booking->id }}" data-name="{{ $booking->full_name ?? $booking->user->name }}" data-email="{{ $booking->orderer_email ?? $booking->user->email ?? '' }}" data-phone="{{ $booking->orderer_phone ?? $booking->user->phone ?? '' }}" data-product="{{ $booking->product_id }}" data-status="{{ $booking->status }}" data-notes="{{ $booking->notes }}" data-payment="{{ $booking->payment->payment_method ?? '' }}">
                                    <svg class="w-4 h-4 edit-group-hover:scale-110 edit-group-hover:rotate-12 transition-transform duration-300 pointer-events-none drop-shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </button>
                                
                                <!-- Invoice Button -->
                                <a href="{{ route('booking.invoice.pdf', $booking->group_code ?? $booking->booking_code) }}" target="_blank" 
                                    class="invoice-group p-4 bg-white dark:bg-slate-800 text-amber-500 dark:text-amber-400 border-2 border-amber-300 dark:border-amber-700 rounded-xl shadow-sm shadow-amber-500/10 dark:shadow-amber-700/20 hover:bg-amber-50 dark:hover:bg-amber-900/30 hover:shadow-md hover:shadow-amber-500/20 dark:hover:shadow-amber-700/30 hover:scale-110 active:scale-95 transition-all duration-200 touch-manipulation hover:border-amber-400 dark:hover:border-amber-500" title="INVOICE">
                                    <svg class="w-4 h-4 invoice-group-hover:scale-110 invoice-group-hover:-translate-y-0.5 transition-transform duration-300 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                </a>

                                <!-- Delete Button -->
                                <form method="POST" action="{{ route('bookings.destroy', $booking) }}" class="m-0" onsubmit="return confirm('Apakah Anda yakin ingin MENGHAPUS pendaftaran ini secara permanen?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-group p-4 bg-gradient-to-r from-red-500 to-rose-500 dark:from-red-600 dark:to-rose-600 text-white rounded-xl shadow-md shadow-red-500/20 dark:shadow-red-700/30 hover:shadow-lg hover:shadow-red-500/40 dark:hover:shadow-red-600/50 hover:scale-110 active:scale-95 active:shadow-sm active:shadow-red-400/50 transition-all duration-200 touch-manipulation border-2 border-red-400/50 dark:border-red-500/50 hover:border-red-300 dark:hover:border-red-400">
                                        <svg class="w-4 h-4 delete-group-hover:scale-110 delete-group-hover:rotate-12 transition-transform duration-300 pointer-events-none drop-shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-28 text-center bg-slate-50/30 dark:bg-slate-900/30">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-24 h-24 bg-white dark:bg-slate-800 rounded-[3rem] shadow-xl shadow-slate-200/50 dark:shadow-none flex items-center justify-center text-slate-200 dark:text-slate-700 mb-8 border border-slate-100 dark:border-slate-700">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </div>
                                <h3 class="text-xl font-black text-slate-800 uppercase tracking-widest">Belum Ada Data</h3>
                                <p class="text-sm text-slate-400 mt-3 max-w-[280px] mx-auto font-medium leading-relaxed">Pendaftaran jamaah dalam kategori ini belum tersedia atau tidak ditemukan.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Pagination -->
    <div class="mt-4">
        {{ $bookings->links() }}
    </div>
</div>

<!-- Modal Create -->
<div id="addBookingModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4 backdrop-blur-sm">
    <div class="bg-white dark:bg-slate-800 rounded-[2.5rem] shadow-2xl w-full max-w-lg p-8 max-h-[90vh] overflow-y-auto border border-slate-100 dark:border-slate-700">
        <div class="flex justify-between items-center mb-8">
            <h3 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Buat <span class="text-orange">Pemesanan</span></h3>
            <button onclick="document.getElementById('addBookingModal').classList.add('hidden')" class="p-2 bg-slate-50 dark:bg-slate-900 text-slate-400 hover:text-red-500 rounded-xl transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form method="POST" action="{{ route('bookings.store') }}" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                <div>
                    <label class="block text-[10px] uppercase font-black text-slate-400 dark:text-slate-500 tracking-widest ml-1 mb-2">Nama Jamaah / Pemesan <span class="text-red-500">*</span></label>
                    <input type="text" name="full_name" required class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900 border-2 border-transparent focus:border-orange focus:bg-white dark:focus:bg-slate-800 rounded-2xl outline-none transition-all text-sm font-bold text-slate-700 dark:text-slate-200 placeholder:text-slate-300" placeholder="Contoh: Budi Santoso">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] uppercase font-black text-slate-400 dark:text-slate-500 tracking-widest ml-1 mb-2">Email Pemesan</label>
                        <input type="email" name="orderer_email" class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900 border-2 border-transparent focus:border-orange focus:bg-white dark:focus:bg-slate-800 rounded-2xl outline-none transition-all text-sm font-bold text-slate-700 dark:text-slate-200 placeholder:text-slate-300" placeholder="email@contoh.com">
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase font-black text-slate-400 dark:text-slate-500 tracking-widest ml-1 mb-2">No. HP Pemesan</label>
                        <input type="tel" name="orderer_phone" class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900 border-2 border-transparent focus:border-orange focus:bg-white dark:focus:bg-slate-800 rounded-2xl outline-none transition-all text-sm font-bold text-slate-700 dark:text-slate-200 placeholder:text-slate-300" placeholder="0812xxxxxxxx">
                    </div>
                </div>
            </div>
            <div>
                <label class="block text-[10px] uppercase font-black text-slate-400 dark:text-slate-500 tracking-widest ml-1 mb-2">Pilih Paket Keberangkatan <span class="text-red-500">*</span></label>
                <select name="product_id" required class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900 border-2 border-transparent focus:border-orange focus:bg-white dark:focus:bg-slate-800 rounded-2xl outline-none transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                    <option value="">-- Pilih Paket Umroh --</option>
                    @foreach($products as $prod)
                    <option value="{{ $prod->id }}">{{ $prod->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-[10px] uppercase font-black text-slate-400 dark:text-slate-500 tracking-widest ml-1 mb-2">Status Pemesanan Pertama <span class="text-red-500">*</span></label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <select name="status" required class="w-full px-6 py-4 bg-amber-50 dark:bg-amber-900/20 border-2 border-transparent focus:border-orange focus:bg-white dark:focus:bg-slate-800 rounded-2xl outline-none transition-all text-sm font-black text-amber-700 dark:text-amber-500">
                        <option value="pending" selected>Menunggu (Pending)</option>
                        <option value="dp_paid">Sudah DP (DP Paid)</option>
                        <option value="fully_paid">Lunas (Fully Paid)</option>
                        <option value="savings">Tabungan (Savings)</option>
                    </select>
                    <select name="payment_method" class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900 border-2 border-transparent focus:border-orange focus:bg-white dark:focus:bg-slate-800 rounded-2xl outline-none transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                        <option value="">-- Metode Bayar --</option>
                        <option value="Transfer Bank">Transfer Bank</option>
                        <option value="Cash / Tunai">Cash / Tunai</option>
                        <option value="BSI - 721XXXXXXX">BSI (Official)</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-[10px] uppercase font-black text-slate-400 dark:text-slate-500 tracking-widest ml-1 mb-2">Catatan Internal / Ekstra</label>
                <textarea name="notes" rows="3" class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900 border-2 border-transparent focus:border-orange focus:bg-white dark:focus:bg-slate-800 rounded-2xl outline-none transition-all text-sm font-medium text-slate-600 dark:text-slate-400 placeholder:italic" placeholder="Misal: Jamaah meminta kursi berdekatan dengan keluarga."></textarea>
            </div>
            
            <div class="flex gap-4 pt-6">
                <button type="button" onclick="document.getElementById('addBookingModal').classList.add('hidden')" class="flex-1 py-4 bg-red-50 dark:bg-red-900/30 text-red-500 dark:text-red-400 border border-red-200 dark:border-red-800 rounded-2xl shadow-sm hover:bg-red-100 dark:hover:bg-red-900/50 hover:shadow-md hover:shadow-red-500/10 dark:hover:shadow-red-900/30 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-red-400/20 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation">Batal</button>
                <button type="submit" class="flex-[2] py-4 bg-emerald-600 dark:bg-emerald-700 text-white rounded-2xl shadow-lg shadow-emerald-500/20 dark:shadow-emerald-900/30 hover:shadow-xl hover:scale-[1.02] active:scale-95 transition-all duration-300 border-b-4 border-emerald-800 dark:border-emerald-900 font-black uppercase tracking-widest text-[10px] touch-manipulation">Buat Pemesanan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editBookingModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4 backdrop-blur-sm">
    <div class="bg-white dark:bg-slate-800 rounded-[2.5rem] shadow-2xl w-full max-w-lg p-8 max-h-[90vh] overflow-y-auto border border-slate-100 dark:border-slate-700">
        <div class="flex justify-between items-center mb-8">
            <h3 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Ubah <span class="text-orange">Status</span></h3>
            <button onclick="document.getElementById('editBookingModal').classList.add('hidden')" class="p-2 bg-slate-50 dark:bg-slate-900 text-slate-400 hover:text-red-500 rounded-xl transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form id="editBookingForm" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div class="px-5 py-4 bg-orange/5 dark:bg-orange/10 rounded-2xl border border-orange/10 mb-8">
                <p class="text-[10px] text-orange-600 dark:text-orange-400 font-bold leading-relaxed text-center italic uppercase tracking-tight">Meskipun Akun dan Paket bisa diubah, disarankan untuk tidak mengubahnya jika tidak darurat.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                <div>
                    <label class="block text-[10px] uppercase font-black text-slate-400 dark:text-slate-500 tracking-widest ml-1 mb-2">Nama Jamaah / Pemesan <span class="text-red-500">*</span></label>
                    <input type="text" name="full_name" id="editBookingName" required class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900 border-2 border-transparent focus:border-orange focus:bg-white dark:focus:bg-slate-800 rounded-2xl outline-none transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] uppercase font-black text-slate-400 dark:text-slate-500 tracking-widest ml-1 mb-2">Email Pemesan</label>
                        <input type="email" name="orderer_email" id="editBookingEmail" class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900 border-2 border-transparent focus:border-orange focus:bg-white dark:focus:bg-slate-800 rounded-2xl outline-none transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase font-black text-slate-400 dark:text-slate-500 tracking-widest ml-1 mb-2">No. HP Pemesan</label>
                        <input type="tel" name="orderer_phone" id="editBookingPhone" class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900 border-2 border-transparent focus:border-orange focus:bg-white dark:focus:bg-slate-800 rounded-2xl outline-none transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                    </div>
                </div>
            </div>
            <div>
                <label class="block text-[10px] uppercase font-black text-slate-400 dark:text-slate-500 tracking-widest ml-1 mb-2">Pilih Paket <span class="text-red-500">*</span></label>
                <select name="product_id" id="editBookingProduct" required class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900 border-2 border-transparent focus:border-orange focus:bg-white dark:focus:bg-slate-800 rounded-2xl outline-none transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                    @foreach($products as $prod)
                    <option value="{{ $prod->id }}">{{ $prod->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-[10px] uppercase font-black text-slate-400 dark:text-slate-500 tracking-widest ml-1 mb-2">Update Status & Metode Bayar <span class="text-red-500">*</span></label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <select name="status" id="editBookingStatus" required class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900 border-2 border-transparent focus:border-orange focus:bg-white dark:focus:bg-slate-800 rounded-2xl outline-none transition-all text-sm font-black text-slate-700 dark:text-slate-200">
                        <option value="pending">Pending</option>
                        <option value="dp_paid">DP Paid</option>
                        <option value="fully_paid">Fully Paid</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                        <option value="savings">Savings</option>
                    </select>
                    <select name="payment_method" id="editBookingPaymentMethod" class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900 border-2 border-transparent focus:border-orange focus:bg-white dark:focus:bg-slate-800 rounded-2xl outline-none transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                        <option value="">-- Metode Bayar --</option>
                        <option value="Transfer Bank">Transfer Bank</option>
                        <option value="Cash / Tunai">Cash / Tunai</option>
                        <option value="BSI - 721XXXXXXX">BSI (Official)</option>
                        <option value="Menunggu Pembayaran (Otomatis)">Midtrans</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-[10px] uppercase font-black text-slate-400 dark:text-slate-500 tracking-widest ml-1 mb-2">Catatan Internal</label>
                <textarea name="notes" id="editBookingNotes" rows="3" class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900 border-2 border-transparent focus:border-orange focus:bg-white dark:focus:bg-slate-800 rounded-2xl outline-none transition-all text-sm font-medium text-slate-600 dark:text-slate-400 placeholder:italic"></textarea>
            </div>
            
            <div class="flex gap-4 pt-6">
                <button type="button" onclick="document.getElementById('editBookingModal').classList.add('hidden')" class="flex-1 py-4 bg-red-50 dark:bg-red-900/30 text-red-500 dark:text-red-400 border border-red-200 dark:border-red-800 rounded-2xl shadow-sm hover:bg-red-100 dark:hover:bg-red-900/50 hover:shadow-md hover:shadow-red-500/10 dark:hover:shadow-red-900/30 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-red-400/20 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation">Batal</button>
                <button type="submit" class="flex-[2] py-4 bg-emerald-600 dark:bg-emerald-700 text-white rounded-2xl shadow-lg shadow-emerald-500/20 dark:shadow-emerald-900/30 hover:shadow-xl hover:scale-[1.02] active:scale-95 transition-all duration-300 border-b-4 border-emerald-800 dark:border-emerald-900 font-black uppercase tracking-widest text-[10px] touch-manipulation">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditBooking(id, name, email, phone, product_id, status, notes, payment_method) {
        document.getElementById('editBookingForm').action = '/bookings/' + id;
        document.getElementById('editBookingName').value = name;
        document.getElementById('editBookingEmail').value = email || '';
        document.getElementById('editBookingPhone').value = phone || '';
        document.getElementById('editBookingProduct').value = product_id;
        document.getElementById('editBookingStatus').value = status;
        document.getElementById('editBookingNotes').value = notes || '';
        document.getElementById('editBookingPaymentMethod').value = payment_method || '';
        document.getElementById('editBookingModal').classList.remove('hidden');
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Edit Booking Event Listener
        document.body.addEventListener('click', function(e) {
            const btnEdit = e.target.closest('.btn-edit-booking');
            if (btnEdit) {
                const ds = btnEdit.dataset;
                openEditBooking(ds.id, ds.name, ds.email, ds.phone, ds.product, ds.status, ds.notes, ds.payment);
            }
        });

        // Search Highlighting
        const urlParams = new URLSearchParams(window.location.search);
        const searchQuery = urlParams.get('search');
        
        if (searchQuery && searchQuery.length >= 2) {
            const table = document.querySelector('table');
            const cells = table.querySelectorAll('td p, td span.font-mono');
            const regex = new RegExp(`(${searchQuery})`, 'gi');
            
            cells.forEach(cell => {
                if (cell.textContent.toLowerCase().includes(searchQuery.toLowerCase())) {
                    const originalText = cell.innerHTML;
                    // Only highlight text nodes to avoid breaking HTML
                    cell.innerHTML = cell.innerHTML.replace(regex, '<mark class="bg-orange/20 text-orange-700 font-bold px-0.5 rounded-sm">$1</mark>');
                }
            });
        }
    });
</script>
@endsection
