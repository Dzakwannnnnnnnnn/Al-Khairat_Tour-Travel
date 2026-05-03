@extends('layouts.layout')

@section('title', 'Kelola Galeri')
@section('breadcrumb', 'Manajemen Galeri')

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
                <h1 class="text-2xl md:text-3xl font-black text-slate-800 dark:text-slate-100 leading-tight tracking-tight">Kelola Galeri</h1>
                <p class="text-sm md:text-base text-slate-400 dark:text-slate-500 font-medium mt-1">Kelola foto dan video dokumentasi perjalanan.</p>
            </div>
        </div>
        <button onclick="openAddModal()" class="group w-full md:w-auto bg-emerald-600 dark:bg-emerald-700 text-white px-8 py-4 rounded-2xl shadow-lg shadow-emerald-500/20 dark:shadow-emerald-900/30 hover:shadow-xl hover:scale-[1.02] active:scale-95 transition-all duration-300 flex items-center justify-center space-x-3 font-black uppercase tracking-widest text-[10px] border-b-4 border-emerald-800 dark:border-emerald-900">
            <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
            </svg>
            <span>Tambah Item Galeri</span>
        </button>
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

<!-- Gallery Table Card -->
<div class="bg-white dark:bg-slate-900 rounded-[2.5rem] shadow-lg shadow-slate-200/50 dark:shadow-slate-950/50 border border-slate-100 dark:border-slate-800 overflow-hidden">
    <div class="overflow-x-auto dashboard-scroll">
        <table class="w-full min-w-[900px]">
            <thead>
                <tr class="bg-gradient-to-r from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 border-b-2 border-slate-200 dark:border-slate-700">
                    <th class="px-8 py-5 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest w-12">#</th>
                    <th class="px-6 py-5 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Preview</th>
                    <th class="px-6 py-5 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Konten</th>
                    <th class="px-6 py-5 text-center text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest w-24">Tipe</th>
                    <th class="px-6 py-5 text-center text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest w-24">Status</th>
                    <th class="px-8 py-5 text-center text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest sticky right-0 bg-gradient-to-r from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 z-10 border-l-2 border-slate-200 dark:border-slate-700 shadow-[-10px_0_15px_rgba(0,0,0,0.03)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.3)] w-[120px] min-w-[120px]">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                @forelse($galleries as $key => $item)
                <tr class="hover:bg-gradient-to-r hover:from-orange-50/50 hover:to-pink-50/50 dark:hover:from-orange-900/10 dark:hover:to-pink-900/10 transition-all duration-200 row-group">
                    <td class="px-8 py-6 text-sm text-slate-400 dark:text-slate-500 font-bold italic">{{ $key + 1 }}</td>
                    <td class="px-6 py-6">
                        @if($item->image_path)
                            <img src="{{ Storage::url($item->image_path) }}" alt="{{ $item->title }}" 
                                 class="w-48 aspect-video object-cover rounded-2xl shadow-md border border-slate-200 dark:border-slate-700 row-group-hover:scale-105 row-group-hover:shadow-lg row-group-hover:shadow-orange-500/10 transition-all duration-500">
                        @else
                            <div class="w-48 aspect-video bg-slate-50 dark:bg-slate-800 rounded-2xl flex items-center justify-center text-[10px] text-slate-300 dark:text-slate-600 font-black uppercase border-2 border-dashed border-slate-200 dark:border-slate-700">Kosong</div>
                        @endif
                    </td>
                    <td class="px-6 py-6">
                        <p class="font-black text-slate-800 dark:text-slate-100 text-base leading-tight uppercase tracking-tight row-group-hover:text-orange-600 dark:row-group-hover:text-orange-400 transition-colors">{{ $item->title }}</p>
                        <p class="text-[11px] text-slate-400 dark:text-slate-500 mt-2 line-clamp-2 font-medium italic">{{ $item->description ?? 'Tidak ada deskripsi.' }}</p>
                        @if($item->video_url)
                        <p class="text-[10px] text-red-500 mt-1 font-bold truncate max-w-xs">{{ $item->video_url }}</p>
                        @endif
                    </td>
                    <td class="px-6 py-6 text-center">
                        <span class="inline-flex px-4 py-1.5 {{ $item->type === 'video' ? 'bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 border-red-200' : 'bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 border-blue-200' }} text-[10px] font-black rounded-xl border uppercase tracking-widest">
                            {{ $item->type }}
                        </span>
                    </td>
                    <td class="px-6 py-6 text-center">
                        <form action="{{ route('gallery.toggle-active', $item) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="inline-flex items-center px-4 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-sm border-2 hover:scale-105 active:scale-95 transition-all duration-200 touch-manipulation {{ $item->is_active ? 'bg-gradient-to-r from-emerald-50 to-green-50 dark:from-emerald-900/20 dark:to-green-900/10 text-emerald-600 dark:text-emerald-400 border-emerald-200 dark:border-emerald-800 shadow-emerald-500/10' : 'bg-gradient-to-r from-slate-50 to-slate-100 dark:from-slate-800 dark:to-slate-700 text-slate-400 dark:text-slate-500 border-slate-200 dark:border-slate-600' }}">
                                @if($item->is_active)
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5 shadow-[0_0_6px_rgba(16,185,129,0.5)] flex-shrink-0"></span>
                                @endif
                                {{ $item->is_active ? 'Aktif' : 'Draft' }}
                            </button>
                        </form>
                    </td>
                    <td class="px-6 py-6 text-right sticky right-0 bg-white dark:bg-slate-900 row-group-hover:bg-gradient-to-r row-group-hover:from-orange-50/50 row-group-hover:to-pink-50/50 dark:row-group-hover:from-orange-900/10 dark:row-group-hover:to-pink-900/10 transition-all duration-200 z-10 border-l-2 border-slate-100 dark:border-slate-800 shadow-[-10px_0_15px_rgba(0,0,0,0.03)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.3)] w-[120px] min-w-[120px]">
                        <div class="flex flex-col items-center gap-1.5">
                            <button onclick="openEditModal({{ $item }})" 
                               class="edit-group w-full inline-flex items-center justify-center p-3 bg-gradient-to-r from-amber-50 to-orange-50 dark:from-amber-900/30 dark:to-orange-900/30 text-amber-600 dark:text-amber-400 border border-amber-200 dark:border-amber-700 rounded-xl text-[10px] font-bold uppercase tracking-widest shadow-sm shadow-amber-500/10 dark:shadow-amber-700/20 hover:shadow-md hover:shadow-amber-500/20 dark:hover:shadow-amber-600/30 hover:scale-105 active:scale-95 transition-all duration-200 touch-manipulation" 
                               title="Edit">
                                <svg class="w-4 h-4 edit-group-hover:scale-110 edit-group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                <span class="ml-1.5">Edit</span>
                            </button>
                            <form action="{{ route('gallery.destroy', $item) }}" method="POST" class="w-full m-0" onsubmit="return confirm('Yakin hapus item galeri ini?')">
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
                            <h3 class="text-xl font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Tiada Galeri</h3>
                            <p class="text-sm text-slate-400 dark:text-slate-500 mt-2 max-w-[280px] mx-auto font-medium leading-relaxed">Belum ada daftar konten yang diunggah.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@push('modals')
<!-- Modal Add -->
<div id="addModal" class="fixed inset-0 z-[9999] hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen p-4 text-center">
        <div class="fixed inset-0 transition-opacity bg-slate-950/40 backdrop-blur-sm" onclick="closeAddModal()"></div>
        
        <div class="inline-block w-full max-w-lg overflow-hidden text-left align-middle transition-all transform bg-white dark:bg-slate-900 rounded-[2.5rem] shadow-[0_20px_70px_rgba(0,0,0,0.3)] animate__animated animate__fadeInUp animate__faster relative z-10 border border-white/20">
            <!-- Modal Header -->
            <div class="px-8 py-6 bg-gradient-to-br from-orange-50 to-white dark:from-slate-800 dark:to-slate-900 border-b border-slate-100 dark:border-slate-800 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-6 opacity-5">
                    <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                </div>
                <div class="flex justify-between items-center relative z-10">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-sunset rounded-xl flex items-center justify-center text-white shadow-lg shadow-orange-500/30">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" /></svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-slate-800 dark:text-slate-100 tracking-tight">Tambah Dokumentasi</h3>
                            <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">Unggah Momen Baru</p>
                        </div>
                    </div>
                    <button onclick="closeAddModal()" class="w-8 h-8 flex items-center justify-center rounded-lg bg-white dark:bg-slate-800 text-slate-400 hover:text-orange-500 transition-all duration-300 shadow-sm border border-slate-100 dark:border-slate-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
            </div>

            <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf
                <div class="space-y-5">
                    <!-- Judul Input -->
                    <div>
                        <label class="flex items-center text-[9px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 group-focus-within:text-orange-500">
                            Judul Dokumentasi
                        </label>
                        <input type="text" name="title" required placeholder="Contoh: Manasik Haji 2024" 
                            class="w-full px-5 py-3.5 bg-slate-50 dark:bg-slate-800/50 border-2 border-slate-100 dark:border-slate-700 rounded-xl focus:border-orange-500 dark:focus:border-orange-500 focus:bg-white dark:focus:bg-slate-800 focus:outline-none transition-all text-sm font-bold text-slate-700 dark:text-slate-200 shadow-sm placeholder:text-slate-300">
                    </div>

                    <!-- Tipe & Video URL Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="text-[9px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 block">Tipe Konten</label>
                            <select name="type" required onchange="toggleVideoField(this, 'addVideoField')" 
                                class="w-full px-5 py-3.5 bg-slate-50 dark:bg-slate-800/50 border-2 border-slate-100 dark:border-slate-700 rounded-xl focus:border-orange-500 dark:focus:border-orange-500 focus:outline-none transition-all text-sm font-bold text-slate-700 dark:text-slate-200 cursor-pointer">
                                <option value="image">📸 Foto</option>
                                <option value="video">🎥 Video</option>
                            </select>
                        </div>
                        <div id="addVideoField" class="hidden">
                            <label class="text-[9px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 block">URL Video</label>
                            <input type="url" name="video_url" placeholder="https://youtube.com/..." 
                                class="w-full px-5 py-3.5 bg-slate-50 dark:bg-slate-800/50 border-2 border-slate-100 dark:border-slate-700 rounded-xl focus:border-orange-500 focus:outline-none transition-all text-sm font-bold text-slate-700 dark:text-slate-200 shadow-sm">
                        </div>
                    </div>

                    <!-- Deskripsi Area -->
                    <div>
                        <label class="text-[9px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 block">Keterangan</label>
                        <textarea name="description" rows="2" placeholder="Deskripsi singkat..." 
                            class="w-full px-5 py-3.5 bg-slate-50 dark:bg-slate-800/50 border-2 border-slate-100 dark:border-slate-700 rounded-xl focus:border-orange-500 focus:outline-none transition-all text-sm font-bold text-slate-700 dark:text-slate-200 shadow-sm resize-none"></textarea>
                    </div>

                    <!-- File Upload Area -->
                    <div>
                        <label class="text-[9px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 block">Media (Max 10MB)</label>
                        <div class="relative group">
                            <input type="file" name="image" required id="gallery-image-add" onchange="updateFileName(this, 'fileNameAdd')"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                            <div class="flex flex-col items-center justify-center py-5 bg-slate-50 dark:bg-slate-800/30 border-2 border-dashed border-slate-200 dark:border-slate-700 rounded-2xl group-hover:border-orange-500 transition-all">
                                <svg class="w-6 h-6 text-slate-400 group-hover:text-orange-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                <span id="fileNameAdd" class="text-[11px] font-bold text-slate-400 dark:text-slate-500">Klik untuk pilih file</span>
                            </div>
                        </div>
                    </div>

                    <!-- Active Toggle -->
                    <!-- Active Toggle -->
                    <div class="flex items-center pt-2">
                        <label class="flex items-center space-x-3 cursor-pointer group">
                            <div class="relative flex items-center justify-center">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" name="is_active" id="is_active_add" value="1" checked 
                                    class="peer h-6 w-6 cursor-pointer appearance-none rounded-lg border-2 border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 checked:bg-gradient-sunset checked:border-orange-500 transition-all duration-300">
                                <svg class="absolute h-4 w-4 text-white opacity-0 peer-checked:opacity-100 transition-opacity duration-300 pointer-events-none" 
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest group-hover:text-orange-500 transition-colors">Tampilkan di Galeri</span>
                        </label>
                    </div>
                </div>

                <div class="mt-8">
                    <button type="submit" class="w-full bg-gradient-sunset text-white py-4 rounded-xl font-black uppercase tracking-widest text-[10px] shadow-lg shadow-orange-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                        Simpan Dokumentasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div id="editModal" class="fixed inset-0 z-[9999] hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen p-4 text-center">
        <div class="fixed inset-0 transition-opacity bg-slate-950/40 backdrop-blur-sm" onclick="closeEditModal()"></div>
        
        <div class="inline-block w-full max-w-lg overflow-hidden text-left align-middle transition-all transform bg-white dark:bg-slate-900 rounded-[2.5rem] shadow-[0_20px_70px_rgba(0,0,0,0.3)] animate__animated animate__fadeInUp animate__faster relative z-10 border border-white/20">
            <!-- Modal Header -->
            <div class="px-8 py-6 bg-gradient-to-br from-amber-50 to-white dark:from-slate-800 dark:to-slate-900 border-b border-slate-100 dark:border-slate-800 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-6 opacity-5">
                    <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                </div>
                <div class="flex justify-between items-center relative z-10">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-amber-500 to-orange-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-amber-500/30">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-slate-800 dark:text-slate-100 tracking-tight">Perbarui Momen</h3>
                            <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">Edit Data Galeri</p>
                        </div>
                    </div>
                    <button onclick="closeEditModal()" class="w-8 h-8 flex items-center justify-center rounded-lg bg-white dark:bg-slate-800 text-slate-400 hover:text-orange-500 transition-all duration-300 shadow-sm border border-slate-100 dark:border-slate-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
            </div>

            <form id="editForm" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf
                @method('PUT')
                <div class="space-y-5">
                    <!-- Judul Input -->
                    <div>
                        <label class="text-[9px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 block">Judul Dokumentasi</label>
                        <input type="text" name="title" id="edit_title" required 
                            class="w-full px-5 py-3.5 bg-slate-50 dark:bg-slate-800/50 border-2 border-slate-100 dark:border-slate-700 rounded-xl focus:border-orange-500 focus:outline-none transition-all text-sm font-bold text-slate-700 dark:text-slate-200 shadow-sm">
                    </div>

                    <!-- Tipe & Video URL Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="text-[9px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 block">Tipe Konten</label>
                            <select name="type" id="edit_type" required onchange="toggleVideoField(this, 'editVideoField')" 
                                class="w-full px-5 py-3.5 bg-slate-50 dark:bg-slate-800/50 border-2 border-slate-100 dark:border-slate-700 rounded-xl focus:border-orange-500 focus:outline-none transition-all text-sm font-bold text-slate-700 dark:text-slate-200 cursor-pointer">
                                <option value="image">📸 Foto</option>
                                <option value="video">🎥 Video</option>
                            </select>
                        </div>
                        <div id="editVideoField" class="hidden">
                            <label class="text-[9px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 block">URL Video</label>
                            <input type="url" name="video_url" id="edit_video_url" placeholder="https://youtube.com/..." 
                                class="w-full px-5 py-3.5 bg-slate-50 dark:bg-slate-800/50 border-2 border-slate-100 dark:border-slate-700 rounded-xl focus:border-orange-500 focus:outline-none transition-all text-sm font-bold text-slate-700 dark:text-slate-200 shadow-sm">
                        </div>
                    </div>

                    <!-- Deskripsi Area -->
                    <div>
                        <label class="text-[9px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 block">Keterangan</label>
                        <textarea name="description" id="edit_description" rows="2" 
                            class="w-full px-5 py-3.5 bg-slate-50 dark:bg-slate-800/50 border-2 border-slate-100 dark:border-slate-700 rounded-xl focus:border-orange-500 focus:outline-none transition-all text-sm font-bold text-slate-700 dark:text-slate-200 shadow-sm resize-none"></textarea>
                    </div>

                    <!-- File Upload Area -->
                    <div>
                        <label class="text-[9px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 block">Ganti Media (Opsional)</label>
                        <div class="relative group">
                            <input type="file" name="image" id="gallery-image-edit" onchange="updateFileName(this, 'fileNameEdit')"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                            <div class="flex flex-col items-center justify-center py-5 bg-slate-50 dark:bg-slate-800/30 border-2 border-dashed border-slate-200 dark:border-slate-700 rounded-2xl group-hover:border-orange-500 transition-all">
                                <svg class="w-6 h-6 text-slate-400 group-hover:text-orange-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                <span id="fileNameEdit" class="text-[11px] font-bold text-slate-400 dark:text-slate-500">Pilih file baru</span>
                            </div>
                        </div>
                    </div>

                    <!-- Active Toggle -->
                    <!-- Active Toggle -->
                    <div class="flex items-center pt-2">
                        <label class="flex items-center space-x-3 cursor-pointer group">
                            <div class="relative flex items-center justify-center">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" name="is_active" id="edit_is_active" value="1" 
                                    class="peer h-6 w-6 cursor-pointer appearance-none rounded-lg border-2 border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 checked:bg-gradient-sunset checked:border-orange-500 transition-all duration-300">
                                <svg class="absolute h-4 w-4 text-white opacity-0 peer-checked:opacity-100 transition-opacity duration-300 pointer-events-none" 
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest group-hover:text-orange-500 transition-colors">Aktifkan Dokumentasi</span>
                        </label>
                    </div>
                </div>

                <div class="mt-8">
                    <button type="submit" class="w-full bg-gradient-to-r from-amber-600 to-orange-600 text-white py-4 rounded-xl font-black uppercase tracking-widest text-[10px] shadow-lg shadow-amber-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                        Perbarui Dokumentasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endpush

@endsection

@push('scripts')
<script>
    function toggleVideoField(select, fieldId) {
        const field = document.getElementById(fieldId);
        if (select.value === 'video') {
            field.classList.remove('hidden');
        } else {
            field.classList.add('hidden');
        }
    }

    function updateFileName(input, targetId) {
        const fileName = input.files[0] ? input.files[0].name : 'Klik atau seret file ke sini';
        document.getElementById(targetId).textContent = fileName;
    }

    function openAddModal() {
        document.getElementById('addModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeAddModal() {
        document.getElementById('addModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    function openEditModal(item) {
        const form = document.getElementById('editForm');
        form.action = `/gallery/${item.id}`;
        
        document.getElementById('edit_title').value = item.title;
        document.getElementById('edit_description').value = item.description || '';
        document.getElementById('edit_type').value = item.type;
        document.getElementById('edit_video_url').value = item.video_url || '';
        document.getElementById('edit_is_active').checked = item.is_active;
        
        toggleVideoField(document.getElementById('edit_type'), 'editVideoField');
        
        document.getElementById('editModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
</script>
@endpush
