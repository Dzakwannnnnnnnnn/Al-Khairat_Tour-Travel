@extends('layouts.layout')

@section('title', 'Kelola Panduan & Manasik')

@section('content')
<!-- Page Header -->
<div class="mb-6 md:mb-8 pt-6 md:pt-0">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-slate-800 dark:text-slate-100 mb-1 md:mb-2">Kelola Panduan & Manasik</h1>
            <p class="text-[11px] md:text-sm text-slate-500 dark:text-slate-400">Kelola semua panduan dan manasik untuk umrah dan haji</p>
        </div>
        <a href="{{ route('guides.create') }}" class="group w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-gradient-to-r from-orange-400 to-pink-500 dark:from-orange-500 dark:to-pink-600 text-white font-bold rounded-xl shadow-md shadow-orange-500/20 dark:shadow-orange-700/30 hover:shadow-lg hover:shadow-orange-500/40 dark:hover:shadow-orange-600/50 hover:scale-[1.02] active:scale-95 transition-all duration-200 uppercase tracking-widest text-[10px] touch-manipulation border-2 border-orange-400/50 dark:border-orange-500/50 hover:border-orange-300 dark:hover:border-orange-400">
            <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-300 pointer-events-none drop-shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span class="group-hover:tracking-[0.2em] transition-all duration-200">Tambah Panduan</span>
        </a>
    </div>
</div>

<!-- Success Message -->
@if($message = Session::get('success'))
    <div class="mb-6 p-5 bg-gradient-to-r from-emerald-50 to-green-50 dark:from-emerald-900/20 dark:to-green-900/10 border-2 border-emerald-200 dark:border-emerald-800 rounded-2xl flex items-start gap-4 shadow-md shadow-emerald-500/10 animate__animated animate__fadeIn">
        <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-green-500 text-white rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg shadow-emerald-500/30">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <div class="flex-1">
            <p class="font-black text-emerald-700 dark:text-emerald-400 uppercase tracking-widest text-[10px]">{{ $message }}</p>
        </div>
        <button onclick="this.parentElement.style.display='none'" class="text-emerald-500 hover:text-emerald-700 dark:hover:text-emerald-300 hover:scale-110 active:scale-95 transition-all duration-200 p-1">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
@endif

<!-- Guides Table Card -->
<div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-lg shadow-slate-200/50 dark:shadow-slate-950/50 border border-slate-100 dark:border-slate-800">
    <!-- Table -->
    <div class="overflow-x-auto dashboard-scroll" style="overflow-x: auto !important; -webkit-overflow-scrolling: touch;">
        <table class="w-full" style="min-width: 800px;">
            <thead class="bg-gradient-to-r from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 border-b-2 border-slate-200 dark:border-slate-700">
                <tr>
                    <th class="px-6 py-5 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest w-12">#</th>
                    <th class="px-6 py-5 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Panduan</th>
                    <th class="px-6 py-5 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Kategori</th>
                    <th class="px-6 py-5 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Deskripsi</th>
                    <th class="px-6 py-5 text-center text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest w-20">Urutan</th>
                    <th class="px-6 py-5 text-center text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest w-24">Status</th>
                    <th class="px-6 py-5 text-center text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest sticky right-0 bg-gradient-to-r from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 z-10 border-l-2 border-slate-200 dark:border-slate-700 shadow-[-10px_0_15px_rgba(0,0,0,0.03)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.3)] w-[120px] min-w-[120px]">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                @forelse($guides as $key => $guide)
                <tr class="hover:bg-gradient-to-r hover:from-amber-50/50 hover:to-orange-50/50 dark:hover:from-amber-900/10 dark:hover:to-orange-900/10 transition-all duration-200 row-group">
                    <td class="px-6 py-4 text-sm text-slate-400 dark:text-slate-500 font-bold italic">{{ $key + 1 }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-amber-100 to-orange-200 dark:from-amber-800/40 dark:to-orange-700/40 rounded-xl flex items-center justify-center text-xl shadow-sm row-group-hover:scale-110 transition-transform duration-300">
                                {{ $guide->icon }}
                            </div>
                            <div>
                                <p class="font-black text-slate-800 dark:text-slate-100 text-sm row-group-hover:text-orange-600 dark:row-group-hover:text-orange-400 transition-colors">{{ $guide->title }}</p>
                                <p class="text-[10px] text-slate-400 dark:text-slate-500 font-medium italic">{{ $guide->slug }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex px-3 py-1.5 bg-gradient-to-r from-amber-100 to-yellow-100 dark:from-amber-900/30 dark:to-yellow-900/30 text-amber-700 dark:text-amber-400 text-[10px] font-bold uppercase tracking-wider rounded-full border border-amber-200 dark:border-amber-800 shadow-sm">
                            {{ $guide->category }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-xs text-slate-500 dark:text-slate-400 line-clamp-2 font-medium italic">{{ $guide->description }}</p>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex px-3 py-1.5 bg-gradient-to-r from-amber-100 to-orange-100 dark:from-amber-900/30 dark:to-orange-900/30 text-amber-700 dark:text-amber-400 text-xs font-black rounded-lg border border-amber-200 dark:border-amber-800 shadow-inner">
                            #{{ $guide->order }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <form action="{{ route('guides.toggle-active', $guide) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="inline-flex items-center px-3 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-sm border-2 hover:scale-105 active:scale-95 transition-all duration-200 touch-manipulation {{ $guide->is_active ? 'bg-gradient-to-r from-emerald-50 to-green-50 dark:from-emerald-900/20 dark:to-green-900/10 text-emerald-600 dark:text-emerald-400 border-emerald-200 dark:border-emerald-800 shadow-emerald-500/10' : 'bg-gradient-to-r from-slate-50 to-slate-100 dark:from-slate-800 dark:to-slate-700 text-slate-400 dark:text-slate-500 border-slate-200 dark:border-slate-600' }}">
                                @if($guide->is_active)
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5 shadow-[0_0_6px_rgba(16,185,129,0.5)] flex-shrink-0"></span>
                                @endif
                                {{ $guide->is_active ? 'Aktif' : 'Nonaktif' }}
                            </button>
                        </form>
                    </td>
                    <td class="px-6 py-4 text-right sticky right-0 bg-white dark:bg-slate-900 row-group-hover:bg-gradient-to-r row-group-hover:from-amber-50/50 row-group-hover:to-orange-50/50 dark:row-group-hover:from-amber-900/10 dark:row-group-hover:to-orange-900/10 transition-all duration-200 z-10 border-l-2 border-slate-100 dark:border-slate-800 shadow-[-10px_0_15px_rgba(0,0,0,0.03)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.3)] w-[120px] min-w-[120px]">
                        <div class="flex flex-col items-center gap-1.5">
                            <a href="{{ route('guides.edit', $guide) }}" 
                               class="edit-group w-full inline-flex items-center justify-center p-3 bg-gradient-to-r from-amber-50 to-orange-50 dark:from-amber-900/30 dark:to-orange-900/30 text-amber-600 dark:text-amber-400 border border-amber-200 dark:border-amber-700 rounded-xl text-[10px] font-bold uppercase tracking-widest shadow-sm shadow-amber-500/10 dark:shadow-amber-700/20 hover:shadow-md hover:shadow-amber-500/20 dark:hover:shadow-amber-600/30 hover:scale-105 active:scale-95 transition-all duration-200 touch-manipulation" 
                               title="Edit">
                                <svg class="w-4 h-4 edit-group-hover:scale-110 edit-group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                <span class="ml-1.5">Edit</span>
                            </a>
                            <form action="{{ route('guides.destroy', $guide) }}" method="POST" class="w-full m-0" onsubmit="return confirm('Yakin hapus panduan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="delete-group w-full inline-flex items-center justify-center p-3 bg-gradient-to-r from-red-50 to-rose-50 dark:from-red-900/30 dark:to-rose-900/30 text-red-600 dark:text-red-400 border border-red-200 dark:border-red-700 rounded-xl text-[10px] font-bold uppercase tracking-widest shadow-sm shadow-red-500/10 dark:shadow-red-700/20 hover:shadow-md hover:shadow-red-500/20 dark:hover:shadow-red-600/30 hover:scale-105 active:scale-95 transition-all duration-200 touch-manipulation" 
                                        title="Hapus">
                                    <svg class="w-4 h-4 delete-group-hover:scale-110 delete-group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    <span class="ml-1.5">Hapus</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-28 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <div class="w-24 h-24 bg-gradient-to-br from-amber-50 to-orange-100 dark:from-amber-900/20 dark:to-orange-900/20 rounded-[3rem] shadow-xl flex items-center justify-center text-amber-300 dark:text-amber-600 mb-8 border-2 border-dashed border-amber-200 dark:border-amber-800">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Belum Ada Panduan</h3>
                            <p class="text-sm text-slate-400 dark:text-slate-500 mt-2 font-medium italic">Klik "Tambah Panduan" untuk membuat yang baru</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($guides->hasPages())
    <div class="px-6 py-4 border-t-2 border-slate-100 dark:border-slate-800 bg-slate-50/30 dark:bg-slate-800/20">
        {{ $guides->links() }}
    </div>
    @endif
</div>

<!-- Stats Footer -->
<div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-4">
    <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-100 dark:border-slate-800 shadow-lg shadow-slate-200/50 dark:shadow-slate-950/50 hover:shadow-xl hover:shadow-slate-300/30 dark:hover:shadow-slate-900/60 hover:scale-[1.01] transition-all duration-300">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 bg-slate-100 dark:bg-slate-800 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <p class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Total Panduan</p>
        </div>
        <p class="text-3xl font-black text-slate-800 dark:text-slate-100 tracking-tight">{{ \App\Models\Guide::count() }}</p>
    </div>
    <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-100 dark:border-slate-800 shadow-lg shadow-slate-200/50 dark:shadow-slate-950/50 hover:shadow-xl hover:shadow-emerald-300/20 dark:hover:shadow-emerald-900/40 hover:scale-[1.01] transition-all duration-300">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 bg-emerald-100 dark:bg-emerald-900/30 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <p class="text-[10px] font-black text-emerald-500 dark:text-emerald-400 uppercase tracking-widest">Aktif</p>
        </div>
        <p class="text-3xl font-black text-emerald-600 dark:text-emerald-400 tracking-tight">{{ \App\Models\Guide::where('is_active', true)->count() }}</p>
    </div>
    <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-100 dark:border-slate-800 shadow-lg shadow-slate-200/50 dark:shadow-slate-950/50 hover:shadow-xl hover:shadow-slate-300/20 dark:hover:shadow-slate-900/40 hover:scale-[1.01] transition-all duration-300">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 bg-slate-100 dark:bg-slate-800 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <p class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Nonaktif</p>
        </div>
        <p class="text-3xl font-black text-slate-600 dark:text-slate-400 tracking-tight">{{ \App\Models\Guide::where('is_active', false)->count() }}</p>
    </div>
</div>
@endsection
