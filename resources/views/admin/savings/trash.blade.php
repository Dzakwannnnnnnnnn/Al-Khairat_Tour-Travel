@extends('layouts.layout')

@section('title', 'Trash/Sampah Tabungan')

@section('content')
<div class="mb-10 p-8 bg-white dark:bg-slate-900 rounded-[2.5rem] shadow-sm border border-slate-100 dark:border-slate-800 flex flex-col md:flex-row md:items-end justify-between gap-6">
    <div class="relative">
        <h2 class="text-3xl font-black text-slate-800 dark:text-slate-100 tracking-tight uppercase">Trash / Sampah <span class="text-red-500">Tabungan</span></h2>
        <p class="text-slate-400 dark:text-slate-500 mt-2 font-medium flex items-center gap-2 italic">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            Arsip riwayat tabungan yang telah di-refund atau dibatalkan.
        </p>
    </div>

    <div class="flex items-center gap-4 bg-slate-50 dark:bg-slate-800 p-2 rounded-[2rem] border border-slate-100 dark:border-slate-700 shadow-inner">
        <div class="px-6 border-r border-slate-200 dark:border-slate-700">
            <p class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest leading-none">Total Dana Terarsip</p>
            <p class="text-xl font-black text-slate-800 dark:text-slate-100 mt-1">Rp {{ number_format($totalSavings, 0, ',', '.') }}</p>
        </div>
        <div class="flex gap-2 pr-2">
            <a href="{{ route('admin.savings.index') }}" class="px-6 py-4 bg-white dark:bg-slate-900 text-slate-500 dark:text-slate-400 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-slate-100 dark:hover:bg-slate-800 transition-all flex items-center gap-2 border border-slate-100 dark:border-slate-700">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali
            </a>
            @if($plans->total() > 0)
            <form action="{{ route('admin.savings.empty_trash') }}" method="POST" class="m-0" onsubmit="return confirm('Apakah Anda yakin ingin MENGHAPUS SEMUA data di riwayat sampah ini secara permanen?')">
                @csrf
                <button type="submit" class="px-6 py-4 bg-red-600 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-red-700 transition-all flex items-center gap-2 shadow-lg shadow-red-500/20">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    Kosongkan
                </button>
            </form>
            @endif
        </div>
    </div>
</div>

<div class="bg-white dark:bg-slate-900 rounded-[2.5rem] border border-slate-100 dark:border-slate-800 shadow-xl overflow-hidden">
    <div class="p-8 border-b border-slate-50 dark:border-slate-800 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-red-50 dark:bg-red-900/20 text-red-500 rounded-2xl flex items-center justify-center">
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
                   class="w-full md:w-72 pl-12 pr-6 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-transparent focus:border-red-500 focus:bg-white dark:focus:bg-slate-900 rounded-2xl outline-none transition-all text-sm font-medium dark:text-slate-200">
            <svg class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-red-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </form>
    </div>

    <div class="overflow-x-auto dashboard-scroll">
        <table class="w-full min-w-[1000px]">
            <thead>
                <tr class="bg-slate-50/50 dark:bg-slate-900/50 border-b border-slate-100 dark:border-slate-800">
                    <th class="px-8 py-6 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-[0.2em]">Jemaah & Paket</th>
                    <th class="px-6 py-6 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-[0.2em]">Dana Refunded</th>
                    <th class="px-6 py-6 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-[0.2em]">Alasan / Catatan</th>
                    <th class="px-6 py-6 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-[0.2em]">Status Akhir</th>
                    <th class="px-8 py-6 text-right text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-[0.2em]">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50 dark:divide-slate-800">
                @forelse($plans as $plan)
                <tr class="hover:bg-slate-100 dark:hover:bg-slate-800/50 transition-all group">
                    <td class="px-8 py-8">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-slate-100 dark:bg-slate-800 rounded-2xl flex items-center justify-center text-slate-400 dark:text-slate-500 group-hover:bg-red-50 dark:group-hover:bg-red-900/30 group-hover:text-red-600 transition-all shadow-inner border border-slate-200 dark:border-slate-700 shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                            <div class="min-w-0">
                                <p class="font-black text-slate-900 dark:text-slate-100 text-base tracking-tight leading-none truncate uppercase">{{ $plan->user->name }}</p>
                                <p class="text-[10px] text-slate-400 dark:text-slate-500 font-black uppercase tracking-[0.2em] mt-2 italic truncate">{{ $plan->product->name }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-8">
                        <div class="inline-flex flex-col">
                            <span class="text-lg font-black text-orange-600 dark:text-orange-500">Rp {{ number_format($plan->currentBalance(), 0, ',', '.') }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-8">
                        <div class="max-w-[250px] space-y-2">
                            <div>
                                <p class="text-[9px] font-black uppercase text-slate-400 dark:text-slate-500 tracking-widest mb-1">Alasan:</p>
                                <p class="text-[11px] text-slate-600 dark:text-slate-400 font-bold leading-tight line-clamp-2 italic">"{{ $plan->refund_note ?? 'Tidak ada catatan.' }}"</p>
                            </div>
                            <div class="pt-2 border-t border-slate-50 dark:border-slate-800">
                                <p class="text-[9px] font-black uppercase text-red-400 dark:text-red-500 tracking-widest mb-1">Rekening Refund:</p>
                                <p class="text-[10px] font-black text-slate-800 dark:text-slate-200 uppercase tracking-tight truncate">{{ $plan->refund_bank_name ?? '-' }} | {{ $plan->refund_bank_account ?? '-' }}</p>
                            </div>
                            <p class="text-[9px] text-slate-300 dark:text-slate-600 uppercase font-black tracking-widest pt-1">
                                {{ $plan->refund_requested_at ? $plan->refund_requested_at->format('d M Y') : '-' }}
                            </p>
                        </div>
                    </td>
                    <td class="px-6 py-8">
                        <span class="inline-flex items-center px-4 py-2 bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 border border-red-100 dark:border-red-900/30 rounded-xl text-[9px] font-black uppercase tracking-widest">
                            TER-ARSIP
                        </span>
                    </td>
                    <td class="px-8 py-8 text-right">
                        <form action="{{ route('admin.savings.destroy', $plan->id) }}" method="POST" class="m-0" onsubmit="return confirm('Hapus permanen data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-4 bg-orange text-white hover:bg-red-600 transition-all shadow-lg shadow-orange/20 rounded-xl group-hover:scale-105">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-8 py-32 text-center bg-slate-50/20 dark:bg-slate-900/10">
                        <div class="flex flex-col items-center justify-center grayscale opacity-60">
                            <div class="w-24 h-24 bg-white dark:bg-slate-800 rounded-[3rem] shadow-xl flex items-center justify-center text-slate-200 dark:text-slate-700 mb-8 border border-slate-100 dark:border-slate-700">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </div>
                            <h3 class="text-xl font-black text-slate-300 dark:text-slate-700 uppercase tracking-[0.2em]">Trash Kosong</h3>
                            <p class="text-xs text-slate-400 dark:text-slate-600 mt-2 font-medium italic">Belum ada riwayat pembatalan.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($plans->hasPages())
    <div class="p-8 border-t border-slate-50 dark:border-slate-800">
        {{ $plans->links() }}
    </div>
    @endif
</div>
@endsection
