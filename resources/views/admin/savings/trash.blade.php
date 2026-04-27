@extends('layouts.layout')

@section('title', 'Trash/Sampah Tabungan')
@section('breadcrumb', 'Arsip Tabungan')

@section('content')
<div class="mb-10 p-8 bg-white dark:bg-slate-900 rounded-[2.5rem] shadow-lg shadow-slate-200/50 dark:shadow-slate-950/50 border border-slate-100 dark:border-slate-800 flex flex-col md:flex-row md:items-end justify-between gap-6">
    <div class="relative">
        <h2 class="text-3xl font-black text-slate-800 dark:text-slate-100 tracking-tight uppercase">Trash / Sampah <span class="text-red-700 dark:text-red-500">Tabungan</span></h2>
        <p class="text-slate-400 dark:text-slate-500 mt-2 font-medium flex items-center gap-2 italic">
            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            Arsip riwayat tabungan yang telah di-refund atau dibatalkan.
        </p>
    </div>

    <div class="flex items-center gap-4 bg-gradient-to-r from-rose-50/50 to-red-50/30 dark:from-rose-900/10 dark:to-red-900/10 p-3 rounded-[2rem] border border-red-200 dark:border-red-800 shadow-md">
        <div class="px-6 border-r-2 border-red-200 dark:border-red-800">
            <p class="text-[10px] font-black text-red-400 dark:text-red-500 uppercase tracking-widest leading-none">Total Dana Terarsip</p>
            <p class="text-xl font-black text-red-700 dark:text-red-400 mt-1">Rp {{ number_format($totalSavings, 0, ',', '.') }}</p>
        </div>
        <div class="flex gap-2 pr-2">
            <a href="{{ route('admin.savings.index') }}" class="group px-6 py-4 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 rounded-2xl text-[10px] font-black uppercase tracking-widest shadow-md shadow-slate-300/30 dark:shadow-slate-900/50 hover:shadow-lg hover:shadow-slate-400/40 dark:hover:shadow-slate-800/60 hover:scale-[1.02] active:scale-95 transition-all duration-200 flex items-center gap-2 border border-slate-300 dark:border-slate-600 hover:border-slate-400 dark:hover:border-slate-500 touch-manipulation">
                <svg class="w-3.5 h-3.5 group-hover:-translate-x-1 transition-transform drop-shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali
            </a>
            @if($plans->total() > 0)
            <form action="{{ route('admin.savings.empty_trash') }}" method="POST" class="m-0" onsubmit="return confirm('Apakah Anda yakin ingin MENGHAPUS SEMUA data di riwayat sampah ini secara permanen?')">
                @csrf
                <button type="submit" class="group px-6 py-4 bg-gradient-to-r from-red-700 to-rose-800 dark:from-red-800 dark:to-rose-900 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest shadow-md shadow-red-500/20 dark:shadow-red-700/30 hover:shadow-lg hover:shadow-red-500/40 dark:hover:shadow-red-600/50 hover:scale-[1.02] active:scale-95 transition-all duration-200 flex items-center gap-2 border-2 border-red-600/50 dark:border-red-500/50 hover:border-red-400 dark:hover:border-red-400 touch-manipulation hover:animate-shake">
                    <svg class="w-3.5 h-3.5 group-hover:scale-110 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    Kosongkan
                </button>
            </form>
            @endif
        </div>
    </div>
</div>

<div class="bg-white dark:bg-slate-900 rounded-[2.5rem] border border-slate-100 dark:border-slate-800 shadow-lg shadow-slate-200/50 dark:shadow-slate-950/50 overflow-hidden">
    <div class="p-8 border-b-2 border-slate-100 dark:border-slate-800 flex flex-col md:flex-row md:items-center justify-between gap-6 bg-gradient-to-r from-rose-50/30 to-red-50/20 dark:from-rose-900/10 dark:to-red-900/5">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-gradient-to-br from-red-100 to-rose-200 dark:from-red-900/40 dark:to-rose-900/40 text-red-600 dark:text-red-400 rounded-2xl flex items-center justify-center shadow-md shadow-red-500/10 border border-red-300 dark:border-red-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            </div>
            <div>
                <h3 class="font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest text-sm">Riwayat Pembatalan</h3>
                <p class="text-xs text-slate-400 dark:text-slate-500 font-medium mt-0.5">Daftar jemaah dengan status "Di Refund"</p>
            </div>
        </div>

        <form action="{{ route('admin.savings.trash') }}" method="GET" class="relative group m-0">
            <input type="text" name="search" value="{{ request('search') }}" 
                placeholder="Cari jemaah..." 
                class="relative w-full md:w-72 pl-12 pr-6 py-4 bg-white dark:bg-slate-800 border-2 border-slate-300 dark:border-slate-600 rounded-2xl outline-none transition-all duration-500 text-sm font-medium text-slate-700 dark:text-slate-200 shadow-[0_0_0px_rgba(239,68,68,0)] hover:shadow-[0_0_20px_rgba(239,68,68,0.3)] dark:hover:shadow-[0_0_20px_rgba(239,68,68,0.2)] hover:border-red-400 dark:hover:border-red-400 focus:border-red-500 dark:focus:border-red-400 focus:bg-red-50/20 dark:focus:bg-red-900/10 focus:shadow-[0_0_30px_rgba(239,68,68,0.5)] dark:focus:shadow-[0_0_30px_rgba(239,68,68,0.4)] focus:scale-[1.02] active:scale-[0.98]">
            
            <svg class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-hover:text-red-500 dark:group-hover:text-red-400 group-focus-within:text-red-600 dark:group-focus-within:text-red-400 transition-all duration-300 group-focus-within:scale-110 group-focus-within:drop-shadow-[0_0_6px_rgba(239,68,68,0.6)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </form>
    </div>

    <div class="overflow-x-auto dashboard-scroll">
        <table class="w-full min-w-[1000px]">
            <thead>
                <tr class="bg-gradient-to-r from-rose-50/30 to-red-50/20 dark:from-rose-900/10 dark:to-red-900/5 border-b-2 border-red-200 dark:border-red-800">
                    <th class="px-8 py-5 text-left text-[10px] font-black text-red-400 dark:text-red-500 uppercase tracking-[0.2em]">Jemaah & Paket</th>
                    <th class="px-6 py-5 text-left text-[10px] font-black text-red-400 dark:text-red-500 uppercase tracking-[0.2em]">Dana Refunded</th>
                    <th class="px-6 py-5 text-left text-[10px] font-black text-red-400 dark:text-red-500 uppercase tracking-[0.2em]">Alasan / Catatan</th>
                    <th class="px-6 py-5 text-left text-[10px] font-black text-red-400 dark:text-red-500 uppercase tracking-[0.2em]">Status Akhir</th>
                    <th class="px-8 py-5 text-right text-[10px] font-black text-red-400 dark:text-red-500 uppercase tracking-[0.2em]">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-red-100 dark:divide-red-900/30">
                @forelse($plans as $plan)
                <tr class="hover:bg-gradient-to-r hover:from-rose-50/50 hover:to-red-50/30 dark:hover:from-rose-900/10 dark:hover:to-red-900/10 transition-all duration-200 row-group">
                    <td class="px-8 py-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-red-50 dark:bg-red-900/20 rounded-2xl flex items-center justify-center text-red-400 dark:text-red-500 row-group-hover:bg-red-100 dark:row-group-hover:bg-red-900/40 row-group-hover:text-red-600 dark:row-group-hover:text-red-400 row-group-hover:scale-110 transition-all shadow-inner border border-red-200 dark:border-red-800 shrink-0 overflow-hidden">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                            <div class="min-w-0">
                                <p class="font-black text-slate-900 dark:text-slate-100 text-base tracking-tight leading-none truncate uppercase row-group-hover:text-red-700 dark:row-group-hover:text-red-400 transition-colors">{{ $plan->user->name }}</p>
                                <p class="text-[10px] text-slate-400 dark:text-slate-500 font-black uppercase tracking-[0.2em] mt-2 italic truncate">{{ $plan->product->name }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-6">
                        <div class="inline-flex flex-col">
                            <span class="text-lg font-black text-red-700 dark:text-red-400">Rp {{ number_format($plan->currentBalance(), 0, ',', '.') }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-6">
                        <div class="max-w-[250px] space-y-2">
                            <div>
                                <p class="text-[9px] font-black uppercase text-red-400 dark:text-red-500 tracking-widest mb-1">Alasan:</p>
                                <p class="text-[11px] text-slate-600 dark:text-slate-400 font-bold leading-tight line-clamp-2 italic">"{{ $plan->refund_note ?? 'Tidak ada catatan.' }}"</p>
                            </div>
                            <div class="pt-2 border-t border-red-100 dark:border-red-900/30">
                                <p class="text-[9px] font-black uppercase text-red-400 dark:text-red-500 tracking-widest mb-1">Rekening Refund:</p>
                                <p class="text-[10px] font-black text-slate-800 dark:text-slate-200 uppercase tracking-tight truncate">{{ $plan->refund_bank_name ?? '-' }} | {{ $plan->refund_bank_account ?? '-' }}</p>
                            </div>
                            <p class="text-[9px] text-red-400 dark:text-red-500 uppercase font-black tracking-widest pt-1">
                                {{ $plan->refund_requested_at ? $plan->refund_requested_at->format('d M Y') : '-' }}
                            </p>
                        </div>
                    </td>
                    <td class="px-6 py-6">
                        <span class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-red-100 to-rose-200 dark:from-red-900/40 dark:to-rose-900/40 text-red-700 dark:text-red-400 border-2 border-red-300 dark:border-red-800 rounded-xl text-[9px] font-black uppercase tracking-widest shadow-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-red-600 mr-2 shadow-[0_0_6px_rgba(220,38,38,0.5)]"></span>
                            TER-ARSIP
                        </span>
                    </td>
                    <td class="px-8 py-6 text-right">
                        <form action="{{ route('admin.savings.destroy', $plan->id) }}" method="POST" class="m-0" onsubmit="return confirm('Hapus permanen data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-group p-4 bg-gradient-to-r from-red-700 to-rose-800 dark:from-red-800 dark:to-rose-900 text-white rounded-xl shadow-md shadow-red-500/20 dark:shadow-red-700/30 hover:shadow-lg hover:shadow-red-500/40 dark:hover:shadow-red-600/50 hover:scale-110 active:scale-95 active:shadow-sm active:shadow-red-400/50 transition-all duration-200 touch-manipulation border-2 border-red-600/50 dark:border-red-500/50 hover:border-red-400 dark:hover:border-red-400">
                                <svg class="w-4 h-4 delete-group-hover:scale-110 delete-group-hover:rotate-12 transition-transform pointer-events-none drop-shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-8 py-32 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <div class="w-24 h-24 bg-gradient-to-br from-red-50 to-rose-100 dark:from-red-900/20 dark:to-rose-900/20 rounded-[3rem] shadow-xl flex items-center justify-center text-red-300 dark:text-red-600 mb-8 border-2 border-dashed border-red-200 dark:border-red-800">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </div>
                            <h3 class="text-xl font-black text-red-300 dark:text-red-700 uppercase tracking-[0.2em]">Trash Kosong</h3>
                            <p class="text-xs text-red-400 dark:text-red-500 mt-2 font-medium italic">Belum ada riwayat pembatalan.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($plans->hasPages())
    <div class="p-8 border-t-2 border-red-200 dark:border-red-800 bg-red-50/20 dark:bg-red-900/10">
        {{ $plans->links() }}
    </div>
    @endif
</div>
@endsection
