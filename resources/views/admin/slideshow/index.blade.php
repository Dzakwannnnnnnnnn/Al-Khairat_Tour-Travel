@extends('layouts.layout')

@section('title', 'Kelola Slideshow')

@section('content')
<!-- Page Header -->
<div class="mb-10 p-8 bg-white dark:bg-slate-900 rounded-[2.5rem] shadow-sm border border-slate-100 dark:border-slate-800 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
    <div class="flex items-center gap-4">
        <div class="p-4 bg-orange/10 dark:bg-orange/20 text-orange rounded-2xl">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
        </div>
        <div>
            <h1 class="text-2xl md:text-3xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-tight">Kelola Slideshow</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1 font-medium italic">Kelola gambar slideshow halaman utama</p>
        </div>
    </div>
    <a href="{{ route('slideshow.create') }}" class="w-full md:w-auto inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-sunset text-white font-black rounded-2xl shadow-lg shadow-orange/20 hover:scale-105 transition-all duration-300 uppercase tracking-widest text-[10px]">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
        </svg>
        <span>Tambah Slideshow</span>
    </a>
</div>

<!-- Success Message -->
@if($message = Session::get('success'))
    <div class="mb-8 p-5 bg-emerald-50 dark:bg-emerald-900/10 border-2 border-emerald-100 dark:border-emerald-900/30 rounded-[1.5rem] flex items-center gap-4 animate__animated animate__fadeIn">
        <div class="w-10 h-10 bg-emerald-500 text-white rounded-xl flex items-center justify-center shadow-lg shadow-emerald-500/20">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
        </div>
        <p class="font-black text-emerald-800 dark:text-emerald-400 uppercase tracking-widest text-[10px]">{{ $message }}</p>
    </div>
@endif

<!-- Slideshow Table Card -->
<div class="bg-white dark:bg-slate-900 rounded-[2.5rem] shadow-xl border border-slate-100 dark:border-slate-800 overflow-hidden">
    <div class="overflow-x-auto dashboard-scroll">
        <table class="w-full min-w-[900px]">
            <thead>
                <tr class="bg-slate-50/50 dark:bg-slate-900/50 border-b border-slate-100 dark:border-slate-800">
                    <th class="px-8 py-6 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest w-12">#</th>
                    <th class="px-6 py-6 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Preview</th>
                    <th class="px-6 py-6 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Konten</th>
                    <th class="px-6 py-6 text-center text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest w-24">Urutan</th>
                    <th class="px-6 py-6 text-center text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest w-24">Status</th>
                    <th class="px-8 py-6 text-right text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest sticky right-0 bg-white dark:bg-slate-900 z-10 border-l border-slate-100 dark:border-slate-800 shadow-[-10px_0_15px_rgba(0,0,0,0.02)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.2)]">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50 dark:divide-slate-800">
                @forelse($slideshows as $key => $slideshow)
                <tr class="hover:bg-slate-100 dark:hover:bg-slate-800/50 transition-all group">
                    <td class="px-8 py-6 text-sm text-slate-400 font-bold italic">{{ $key + 1 }}</td>
                    <td class="px-6 py-6">
                        @php $imgUrl = $slideshow->local_path ? asset('storage/' . $slideshow->local_path) : ($slideshow->image_url ?? ''); @endphp
                        @if($imgUrl)
                            <img src="{{ $imgUrl }}" alt="{{ $slideshow->title }}" 
                                 class="w-48 aspect-video object-cover rounded-2xl shadow-md border border-slate-100 dark:border-slate-700 transition-transform group-hover:scale-105 duration-500">
                        @else
                            <div class="w-48 aspect-video bg-slate-50 dark:bg-slate-800 rounded-2xl flex items-center justify-center text-[10px] text-slate-300 font-black uppercase border border-dashed border-slate-200">Kosong</div>
                        @endif
                    </td>
                    <td class="px-6 py-6">
                        <p class="font-black text-slate-800 dark:text-slate-100 text-base leading-tight uppercase tracking-tight">{{ $slideshow->title ?? 'Untitled Slide' }}</p>
                        <p class="text-[11px] text-slate-400 dark:text-slate-500 mt-2 line-clamp-2 font-medium italic">{{ $slideshow->description ?? 'Tidak ada deskripsi.' }}</p>
                    </td>
                    <td class="px-6 py-6 text-center">
                        <span class="inline-flex px-4 py-1.5 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-xs font-black rounded-xl border border-slate-200 dark:border-slate-700 shadow-inner">
                            #{{ $slideshow->order }}
                        </span>
                    </td>
                    <td class="px-6 py-6 text-center">
                        <form action="{{ route('slideshow.toggle-active', $slideshow) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="inline-flex px-4 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all shadow-sm border-2 {{ $slideshow->is_active ? 'bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 border-emerald-100 dark:border-emerald-900/30' : 'bg-slate-50 dark:bg-slate-800 text-slate-400 border-slate-200 dark:border-slate-700' }}">
                                {{ $slideshow->is_active ? 'Aktif' : 'Draft' }}
                            </button>
                        </form>
                    </td>
                    <td class="px-8 py-6 text-right sticky right-0 bg-white dark:bg-slate-900 group-hover:bg-slate-100 dark:group-hover:bg-[#1a2333] transition-colors z-10 border-l border-slate-100 dark:border-slate-800 shadow-[-10px_0_15px_rgba(0,0,0,0.02)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.2)]">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('slideshow.edit', $slideshow) }}" 
                               class="p-4 bg-orange/10 text-orange rounded-xl hover:bg-orange hover:text-white transition-all shadow-sm" 
                               title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>
                            <form action="{{ route('slideshow.destroy', $slideshow) }}" method="POST" class="inline m-0" onsubmit="return confirm('Yakin hapus slideshow ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="p-4 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition-all shadow-sm" 
                                        title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-8 py-28 text-center bg-slate-50/20 dark:bg-slate-900/10">
                        <div class="flex flex-col items-center justify-center grayscale opacity-60">
                            <div class="w-24 h-24 bg-white dark:bg-slate-800 rounded-[3rem] shadow-xl flex items-center justify-center text-slate-200 dark:text-slate-700 mb-8 overflow-hidden border border-slate-100 dark:border-slate-700">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <h3 class="text-xl font-black text-slate-800 dark:text-slate-200 uppercase tracking-widest">Tiada Slideshow</h3>
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
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] p-8 border border-slate-100 dark:border-slate-800 shadow-sm">
        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Total Konten</p>
        <p class="text-3xl font-black text-slate-800 dark:text-slate-100 mt-2 tracking-tight">{{ $slideshows->count() }}</p>
    </div>
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] p-8 border border-slate-100 dark:border-slate-800 shadow-sm">
        <p class="text-[10px] font-black text-emerald-400 uppercase tracking-widest">Status Aktif</p>
        <p class="text-3xl font-black text-emerald-600 mt-2 tracking-tight">{{ $slideshows->where('is_active', true)->count() }}</p>
    </div>
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] p-8 border border-slate-100 dark:border-slate-800 shadow-sm">
        <p class="text-[10px] font-black text-orange uppercase tracking-widest">Draft / Antrian</p>
        <p class="text-3xl font-black text-orange mt-2 tracking-tight">{{ $slideshows->where('is_active', false)->count() }}</p>
    </div>
</div>

@endsection
