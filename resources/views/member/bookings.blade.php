@extends('layouts.layout')
@section('title', 'Riwayat Pesanan Saya')
@section('breadcrumb', 'Riwayat Pesanan')
@section('content')
<div class="space-y-8 pb-10">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center p-6 md:p-10 bg-white rounded-[2rem] shadow-sm border border-slate-100 gap-6">
        <div class="flex items-center space-x-6">
            <div class="p-4 md:p-5 bg-orange/10 text-orange rounded-2xl shadow-inner">
                <svg class="w-8 md:w-10 h-8 md:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-xl md:text-3xl font-extrabold text-slate-800 tracking-tight leading-tight">Riwayat Pesanan</h2>
                <p class="text-xs md:text-base text-slate-500 mt-1.5">Pantau pendaftaran dan pembayaran paket umrah Anda.</p>
            </div>
        </div>
        <div class="w-full md:w-auto pt-2 md:pt-0">
            <a href="{{ route('home') }}" class="inline-flex w-full md:w-auto px-6 py-3 bg-slate-50 text-slate-600 rounded-xl hover:bg-slate-100 transition-all font-bold text-[10px] md:text-xs uppercase tracking-[0.2em] justify-center items-center border border-slate-200">
                Cari Paket Lagi
            </a>
        </div>
    </div>

    @php
        $statusColors = [
            'pending' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
            'dp_paid' => 'bg-blue-100 text-blue-800 border-blue-200',
            'fully_paid' => 'bg-green-100 text-green-800 border-green-200',
            'completed' => 'bg-gray-100 text-gray-800 border-gray-200',
            'cancelled' => 'bg-red-100 text-red-800 border-red-200'
        ];
        $statusLabels = [
            'pending' => 'Menunggu Pembayaran',
            'dp_paid' => 'Sudah DP (Mencicil)',
            'fully_paid' => 'Lunas',
            'completed' => 'Selesai (Berangkat)',
            'cancelled' => 'Dibatalkan'
        ];
    @endphp

    @forelse($bookings as $groupCode => $group)
        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden transition-all hover:shadow-md">
            <!-- Group Header -->
            <div class="p-5 md:p-6 bg-slate-50 border-b border-slate-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="space-y-1">
                    <div class="flex items-center gap-2">
                        <span class="text-[10px] uppercase font-black tracking-widest text-slate-400">Kode Grup / Invoice</span>
                        <span class="px-2 py-0.5 bg-white border border-slate-200 rounded-md font-mono text-xs font-bold text-orange shadow-sm">{{ $groupCode ?: 'NON-GROUP' }}</span>
                    </div>
                    <h3 class="font-bold text-slate-800">{{ $group->first()->product->name ?? 'Paket Terhapus' }}</h3>
                </div>
                
                <div class="flex items-center gap-3 w-full md:w-auto">
                    @if(isset($group->first()->product) && is_array($group->first()->product->rundown) && count($group->first()->product->rundown) > 0)
                        <a href="{{ route('products.rundown', $group->first()->product) }}" class="flex-1 md:flex-none inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-white text-charcoal border border-slate-200 rounded-xl text-xs font-bold hover:bg-slate-50 transition-all shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path>
                            </svg>
                            Rundown
                        </a>
                    @endif
                    @if($groupCode)
                        <a href="{{ route('booking.invoice', $groupCode) }}" class="flex-1 md:flex-none inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-white text-orange border border-orange/20 rounded-xl text-xs font-bold hover:bg-orange hover:text-white transition-all shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Lihat Invoice
                        </a>
                    @endif
                </div>
            </div>

            <!-- Pilgrims List -->
            <div class="overflow-x-auto">
                <table class="w-full text-left" style="table-layout:fixed;">
                    <colgroup>
                        <col style="width:35%;">
                        <col style="width:20%;">
                        <col style="width:25%;">
                        <col style="width:20%;">
                    </colgroup>
                    <thead>
                        <tr class="text-[10px] uppercase font-black text-slate-400 tracking-widest border-b border-slate-50">
                            <th class="px-6 py-4">Nama Jamaah</th>
                            <th class="px-6 py-4">Varian Kamar</th>
                            <th class="px-6 py-4">Harga</th>
                            <th class="px-6 py-4 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach($group as $booking)
                            <tr class="hover:bg-orange/5 dark:hover:bg-orange/10 transition-all group">
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 font-bold text-xs">
                                            {{ substr($booking->full_name ?: ($booking->user->name ?? 'U'), 0, 1) }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-slate-700 leading-tight">{{ $booking->full_name ?: ($booking->user->name ?? 'Tanpa Nama') }}</p>
                                            <p class="text-[10px] text-slate-400 font-mono mt-0.5">{{ $booking->booking_code }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <span class="px-2.5 py-1 rounded-lg bg-orange/5 text-orange text-[10px] font-bold uppercase tracking-widest border border-orange/10">
                                        {{ $booking->room_variant ?? 'Triple' }}
                                    </span>
                                </td>
                                <td class="px-6 py-5">
                                    <p class="text-sm font-bold text-slate-800">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest border {{ $statusColors[$booking->status] ?? 'bg-gray-100' }}">
                                        {{ $statusLabels[$booking->status] ?? $booking->status }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Group Footer Summary -->
            <div class="p-5 md:px-6 md:py-4 bg-orange/5 flex flex-col md:flex-row justify-between items-center gap-3 text-center md:text-left">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-orange" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <p class="text-xs text-orange-800 font-medium">Total Pesanan: <span class="font-bold underline">Rp {{ number_format($group->sum('total_price'), 0, ',', '.') }}</span></p>
                </div>
                <p class="text-[10px] text-slate-400 font-medium italic">Dipesan pada {{ $group->first()->created_at->format('d M Y, H:i') }} WIB</p>
            </div>
        </div>
    @empty
        <div class="bg-white rounded-3xl p-12 text-center border-2 border-dashed border-slate-100">
            <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
            <h3 class="text-lg font-bold text-slate-800 mb-2">Belum Ada Pesanan</h3>
            <p class="text-slate-500 text-sm max-w-sm mx-auto mb-8">Anda belum memiliki riwayat pendaftaran paket umrah. Silakan pilih paket kami di halaman beranda.</p>
            <a href="{{ route('home') }}#paket" class="inline-flex items-center px-8 py-4 bg-orange text-white rounded-2xl font-bold uppercase tracking-widest text-xs hover:bg-orange/90 transition-all shadow-lg shadow-orange/20">
                Lihat Paket Umrah
            </a>
        </div>
    @endforelse
</div>
@endsection
