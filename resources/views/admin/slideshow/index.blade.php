@extends('layouts.layout')

@section('title', 'Kelola Slideshow')
@section('breadcrumb', 'Manajemen Slideshow')

@section('content')
<!-- Page Header Section -->
<div class="bg-white dark:bg-slate-800/50 rounded-[2.5rem] p-8 shadow-sm border border-slate-100 dark:border-slate-700 backdrop-blur-md mb-8">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
        <div class="flex items-center space-x-6">
            <div class="p-4 bg-orange-500/10 text-orange-500 rounded-2xl hidden md:block">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <h1 class="text-2xl md:text-3xl font-black text-slate-800 dark:text-slate-100 leading-tight tracking-tight">Kelola Slideshow</h1>
                <p class="text-sm md:text-base text-slate-400 dark:text-slate-500 font-medium mt-1">Kelola gambar slideshow halaman utama.</p>
            </div>
        </div>
        <a href="{{ route('slideshow.create') }}" class="group w-full md:w-auto bg-emerald-600 dark:bg-emerald-700 text-white px-8 py-4 rounded-2xl shadow-lg shadow-emerald-500/20 dark:shadow-emerald-900/30 hover:shadow-xl hover:scale-[1.02] active:scale-95 transition-all duration-300 flex items-center justify-center space-x-3 font-black uppercase tracking-widest text-[10px] border-b-4 border-emerald-800 dark:border-emerald-900">
            <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
            </svg>
            <span>Tambah Slideshow</span>
        </a>
    </div>
</div>

<!-- Success Message -->
@if($message = Session::get('success'))
    <div class="mb-8 p-5 bg-gradient-to-r from-emerald-50 to-green-50 dark:from-emerald-900/20 dark:to-green-900/10 border-2 border-emerald-200 dark:border-emerald-800 rounded-[1.5rem] flex items-center gap-4 shadow-md shadow-emerald-500/10 animate__animated animate__fadeIn">
        <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-green-500 text-white rounded-xl flex items-center justify-center shadow-lg shadow-emerald-500/30">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
        </div>
        <p class="font-black text-emerald-700 dark:text-emerald-400 uppercase tracking-widest text-[10px]">{{ $message }}</p>
    </div>
@endif

<!-- Slideshow Table Card -->
<div class="bg-white dark:bg-slate-900 rounded-[2.5rem] shadow-lg shadow-slate-200/50 dark:shadow-slate-950/50 border border-slate-100 dark:border-slate-800 overflow-hidden">
    <div class="overflow-x-auto dashboard-scroll">
        <table class="w-full min-w-[900px]">
            <thead>
                <tr class="bg-gradient-to-r from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 border-b-2 border-slate-200 dark:border-slate-700">
                    <th class="px-8 py-5 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest w-12">#</th>
                    <th class="px-6 py-5 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Preview</th>
                    <th class="px-6 py-5 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Konten</th>
                    <th class="px-6 py-5 text-center text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest w-24">Urutan</th>
                    <th class="px-6 py-5 text-center text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest w-24">Status</th>
                    <th class="px-8 py-5 text-center text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest sticky right-0 bg-gradient-to-r from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 z-10 border-l-2 border-slate-200 dark:border-slate-700 shadow-[-10px_0_15px_rgba(0,0,0,0.03)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.3)] w-[120px] min-w-[120px]">Aksi</th>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                @forelse($slideshows as $key => $slideshow)
                <tr class="hover:bg-gradient-to-r hover:from-orange-50/50 hover:to-pink-50/50 dark:hover:from-orange-900/10 dark:hover:to-pink-900/10 transition-all duration-200 row-group">
                    <td class="px-8 py-6 text-sm text-slate-400 dark:text-slate-500 font-bold italic">{{ $key + 1 }}</td>
                    <td class="px-6 py-6">
                        @php $imgUrl = $slideshow->local_path ? asset('storage/' . $slideshow->local_path) : ($slideshow->image_url ?? ''); @endphp
                        @if($imgUrl)
                            <img src="{{ $imgUrl }}" alt="{{ $slideshow->title }}" 
                                 class="w-48 aspect-video object-cover rounded-2xl shadow-md border border-slate-200 dark:border-slate-700 row-group-hover:scale-105 row-group-hover:shadow-lg row-group-hover:shadow-orange-500/10 transition-all duration-500">
                        @else
                            <div class="w-48 aspect-video bg-slate-50 dark:bg-slate-800 rounded-2xl flex items-center justify-center text-[10px] text-slate-300 dark:text-slate-600 font-black uppercase border-2 border-dashed border-slate-200 dark:border-slate-700">Kosong</div>
                        @endif
                    </td>
                    <td class="px-6 py-6">
                        <p class="font-black text-slate-800 dark:text-slate-100 text-base leading-tight uppercase tracking-tight row-group-hover:text-orange-600 dark:row-group-hover:text-orange-400 transition-colors">{{ $slideshow->title ?? 'Untitled Slide' }}</p>
                        <p class="text-[11px] text-slate-400 dark:text-slate-500 mt-2 line-clamp-2 font-medium italic">{{ $slideshow->description ?? 'Tidak ada deskripsi.' }}</p>
                    </td>
                    <td class="px-6 py-6 text-center">
                        <span class="inline-flex px-4 py-1.5 bg-gradient-to-r from-slate-100 to-slate-50 dark:from-slate-800 dark:to-slate-700 text-slate-600 dark:text-slate-400 text-xs font-black rounded-xl border border-slate-200 dark:border-slate-600 shadow-inner">
                            #{{ $slideshow->order }}
                        </span>
                    </td>
                    <td class="px-6 py-6 text-center">
                        <form action="{{ route('slideshow.toggle-active', $slideshow) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="inline-flex items-center px-4 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-sm border-2 hover:scale-105 active:scale-95 transition-all duration-200 touch-manipulation {{ $slideshow->is_active ? 'bg-gradient-to-r from-emerald-50 to-green-50 dark:from-emerald-900/20 dark:to-green-900/10 text-emerald-600 dark:text-emerald-400 border-emerald-200 dark:border-emerald-800 shadow-emerald-500/10' : 'bg-gradient-to-r from-slate-50 to-slate-100 dark:from-slate-800 dark:to-slate-700 text-slate-400 dark:text-slate-500 border-slate-200 dark:border-slate-600' }}">
                                @if($slideshow->is_active)
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5 shadow-[0_0_6px_rgba(16,185,129,0.5)] flex-shrink-0"></span>
                                @endif
                                {{ $slideshow->is_active ? 'Aktif' : 'Draft' }}
                            </button>
                        </form>
                    </td>
                    <td class="px-6 py-6 text-right sticky right-0 bg-white dark:bg-slate-900 row-group-hover:bg-gradient-to-r row-group-hover:from-orange-50/50 row-group-hover:to-pink-50/50 dark:row-group-hover:from-orange-900/10 dark:row-group-hover:to-pink-900/10 transition-all duration-200 z-10 border-l-2 border-slate-100 dark:border-slate-800 shadow-[-10px_0_15px_rgba(0,0,0,0.03)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.3)] w-[120px] min-w-[120px]">
                        <div class="flex flex-col items-center gap-1.5">
                            <a href="{{ route('slideshow.edit', $slideshow) }}" 
                               class="edit-group w-full inline-flex items-center justify-center p-3 bg-gradient-to-r from-amber-50 to-orange-50 dark:from-amber-900/30 dark:to-orange-900/30 text-amber-600 dark:text-amber-400 border border-amber-200 dark:border-amber-700 rounded-xl text-[10px] font-bold uppercase tracking-widest shadow-sm shadow-amber-500/10 dark:shadow-amber-700/20 hover:shadow-md hover:shadow-amber-500/20 dark:hover:shadow-amber-600/30 hover:scale-105 active:scale-95 transition-all duration-200 touch-manipulation" 
                               title="Edit">
                                <svg class="w-4 h-4 edit-group-hover:scale-110 edit-group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                <span class="ml-1.5">Edit</span>
                            </a>
                            <form action="{{ route('slideshow.destroy', $slideshow) }}" method="POST" class="w-full m-0" onsubmit="return confirm('Yakin hapus slideshow ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="delete-group w-full inline-flex items-center justify-center p-3 bg-gradient-to-r from-red-50 to-rose-50 dark:from-red-900/30 dark:to-rose-900/30 text-red-600 dark:text-red-400 border border-red-200 dark:border-red-700 rounded-xl text-[10px] font-bold uppercase tracking-widest shadow-sm shadow-red-500/10 dark:shadow-red-700/20 hover:shadow-md hover:shadow-red-500/20 dark:hover:shadow-red-600/30 hover:scale-105 active:scale-95 transition-all duration-200 touch-manipulation" 
                                        title="Hapus">
                                    <svg class="w-4 h-4 delete-group-hover:scale-110 delete-group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    <span class="ml-1.5">Hapus</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-8 py-28 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <div class="w-24 h-24 bg-gradient-to-br from-slate-100 to-slate-50 dark:from-slate-800 dark:to-slate-700 rounded-[3rem] shadow-xl flex items-center justify-center text-slate-300 dark:text-slate-600 mb-8 border-2 border-dashed border-slate-200 dark:border-slate-700">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <h3 class="text-xl font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Tiada Slideshow</h3>
                            <p class="text-sm text-slate-400 dark:text-slate-500 mt-2 max-w-[280px] mx-auto font-medium leading-relaxed">Belum ada daftar gambar yang diunggah.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Stats Footer -->
<div class="mt-10 grid grid-cols-1 sm:grid-cols-3 gap-6">
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] p-8 border border-slate-100 dark:border-slate-800 shadow-lg shadow-slate-200/50 dark:shadow-slate-950/50 hover:shadow-xl hover:shadow-slate-300/30 dark:hover:shadow-slate-900/60 hover:scale-[1.01] transition-all duration-300">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 bg-slate-100 dark:bg-slate-800 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
            </div>
            <p class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Total Konten</p>
        </div>
        <p class="text-3xl font-black text-slate-800 dark:text-slate-100 tracking-tight">{{ $slideshows->count() }}</p>
    </div>
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] p-8 border border-slate-100 dark:border-slate-800 shadow-lg shadow-slate-200/50 dark:shadow-slate-950/50 hover:shadow-xl hover:shadow-emerald-300/20 dark:hover:shadow-emerald-900/40 hover:scale-[1.01] transition-all duration-300">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 bg-emerald-100 dark:bg-emerald-900/30 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <p class="text-[10px] font-black text-emerald-500 dark:text-emerald-400 uppercase tracking-widest">Status Aktif</p>
        </div>
        <p class="text-3xl font-black text-emerald-600 dark:text-emerald-400 tracking-tight">{{ $slideshows->where('is_active', true)->count() }}</p>
    </div>
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] p-8 border border-slate-100 dark:border-slate-800 shadow-lg shadow-slate-200/50 dark:shadow-slate-950/50 hover:shadow-xl hover:shadow-orange-300/20 dark:hover:shadow-orange-900/40 hover:scale-[1.01] transition-all duration-300">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 bg-orange-100 dark:bg-orange-900/30 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <p class="text-[10px] font-black text-orange-500 dark:text-orange-400 uppercase tracking-widest">Draft / Antrian</p>
        </div>
        <p class="text-3xl font-black text-orange-500 dark:text-orange-400 tracking-tight">{{ $slideshows->where('is_active', false)->count() }}</p>
    </div>
</div>
@endsection
