@extends('layouts.layout')
@section('title', 'Sistem & Pengaturan Web')
@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center p-5 md:p-6 bg-white dark:bg-slate-900 rounded-2xl shadow-lg shadow-slate-200/50 dark:shadow-slate-950/50 border border-slate-100 dark:border-slate-800 mb-6 gap-4 pt-6 md:pt-6">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-gradient-to-br from-slate-100 to-slate-200 dark:from-slate-800 dark:to-slate-700 text-slate-600 dark:text-slate-400 rounded-xl shadow-md shadow-slate-500/10 border border-slate-200 dark:border-slate-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </div>
            <div>
                <h2 class="text-lg md:text-2xl font-bold text-slate-800 dark:text-slate-100 leading-tight">Pengaturan Variabel</h2>
                <p class="text-[11px] md:text-sm text-slate-500 dark:text-slate-400 mt-1">Konfigurasi dinamis kontak dan info esensial.</p>
            </div>
        </div>
        <button onclick="document.getElementById('addSettingModal').classList.remove('hidden')" class="group w-full md:w-auto flex items-center justify-center space-x-2 bg-gradient-to-r from-slate-600 to-slate-700 dark:from-slate-500 dark:to-slate-600 text-white px-6 py-3.5 rounded-xl shadow-md shadow-slate-500/20 dark:shadow-slate-700/30 hover:shadow-lg hover:shadow-slate-500/40 dark:hover:shadow-slate-600/50 hover:scale-[1.02] active:scale-95 transition-all duration-200 font-bold uppercase tracking-widest text-[10px] touch-manipulation border-2 border-slate-400/50 dark:border-slate-500/50 hover:border-slate-300 dark:hover:border-slate-400">
            <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-300 pointer-events-none drop-shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            <span class="group-hover:tracking-[0.2em] transition-all duration-200">Tambah Config</span>
        </button>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
    <div class="p-5 bg-gradient-to-r from-emerald-50 to-green-50 dark:from-emerald-900/20 dark:to-green-900/10 border-2 border-emerald-200 dark:border-emerald-800 rounded-2xl flex items-center gap-4 shadow-md shadow-emerald-500/10 animate__animated animate__fadeIn">
        <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-green-500 text-white rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg shadow-emerald-500/30">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
        </div>
        <div class="flex-1">
            <p class="font-black text-emerald-700 dark:text-emerald-400 uppercase tracking-widest text-[10px]">{{ session('success') }}</p>
        </div>
        <button onclick="this.parentElement.style.display='none'" class="text-emerald-500 hover:text-emerald-700 dark:hover:text-emerald-300 hover:scale-110 active:scale-95 transition-all duration-200 p-1">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    @endif
    
    <!-- Alert Error -->
    @if($errors->any())
    <div class="p-5 bg-gradient-to-r from-red-50 to-rose-50 dark:from-red-900/20 dark:to-rose-900/10 border-2 border-red-200 dark:border-red-800 rounded-2xl flex items-start gap-4 shadow-md shadow-red-500/10 animate__animated animate__fadeIn">
        <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-rose-500 text-white rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg shadow-red-500/30">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path></svg>
        </div>
        <div class="flex-1">
            <p class="font-black text-red-700 dark:text-red-400 uppercase tracking-widest text-[10px] mb-1">Gagal!</p>
            <ul class="list-disc list-inside space-y-0.5">
                @foreach ($errors->all() as $error)
                    <li class="text-xs text-red-600 dark:text-red-400 font-medium">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <button onclick="this.parentElement.style.display='none'" class="text-red-500 hover:text-red-700 dark:hover:text-red-300 hover:scale-110 active:scale-95 transition-all duration-200 p-1">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    @endif

    <!-- Table Section -->
    <div class="bg-white dark:bg-slate-900 rounded-[1.5rem] shadow-lg shadow-slate-200/50 dark:shadow-slate-950/50 overflow-hidden border border-slate-100 dark:border-slate-800">
        <div class="overflow-x-auto dashboard-scroll">
            <table class="w-full min-w-[800px]">
                <thead class="bg-gradient-to-r from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 border-b-2 border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-6 py-5 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Key (Kunci)</th>
                        <th class="px-6 py-5 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Value (Konfigurasi)</th>
                        <th class="px-6 py-5 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Tipe Data</th>
                        <th class="px-6 py-5 text-center text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest sticky right-0 bg-gradient-to-r from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 z-10 border-l-2 border-slate-200 dark:border-slate-700 shadow-[-10px_0_15px_rgba(0,0,0,0.03)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.3)] w-[140px] min-w-[140px]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    @forelse($settings as $setting)
                    <tr class="hover:bg-gradient-to-r hover:from-slate-50/50 hover:to-slate-100/50 dark:hover:from-slate-800/30 dark:hover:to-slate-700/30 transition-all duration-200 row-group">
                        <td class="px-6 py-4 align-top">
                            <p class="font-mono text-sm font-black text-slate-700 dark:text-slate-300 row-group-hover:text-slate-900 dark:row-group-hover:text-slate-200 transition-colors">{{ $setting->key }}</p>
                        </td>

                        <td class="px-6 py-4 align-top max-w-xl">
                            <p class="text-sm text-slate-600 dark:text-slate-400 break-words line-clamp-3 font-medium italic">{{ $setting->value }}</p>
                        </td>
                        <td class="px-6 py-4 align-top">
                            <span class="inline-flex items-center px-3 py-1.5 bg-gradient-to-r from-slate-100 to-slate-200 dark:from-slate-800 dark:to-slate-700 text-slate-600 dark:text-slate-400 text-[10px] font-black uppercase tracking-widest rounded-lg border border-slate-300 dark:border-slate-600 shadow-inner">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"/></svg>
                                {{ $setting->type }}
                            </span>
                        </td>
                        <td class="px-4 py-4 sticky right-0 bg-white dark:bg-slate-900 row-group-hover:bg-gradient-to-r row-group-hover:from-slate-50/50 row-group-hover:to-slate-100/50 dark:row-group-hover:from-slate-800/30 dark:row-group-hover:to-slate-700/30 transition-all duration-200 z-10 border-l-2 border-slate-100 dark:border-slate-800 shadow-[-10px_0_15px_rgba(0,0,0,0.03)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.3)] w-[140px] min-w-[140px]">
                            <div class="flex flex-col items-center gap-1.5">
                                <button onclick="openEditSetting({{ $setting->id }}, '{{ addslashes($setting->key) }}', '{{ addslashes(str_replace(array("\r", "\n"), array('\r', '\n'), $setting->value)) }}', '{{ $setting->type }}')"
                                        class="edit-group w-full inline-flex items-center justify-center px-3 py-2.5 bg-gradient-to-r from-amber-50 to-orange-50 dark:from-amber-900/30 dark:to-orange-900/30 text-amber-600 dark:text-amber-400 border border-amber-200 dark:border-amber-700 rounded-xl text-[10px] font-bold uppercase tracking-widest shadow-sm shadow-amber-500/10 dark:shadow-amber-700/20 hover:shadow-md hover:shadow-amber-500/20 dark:hover:shadow-amber-600/30 hover:scale-105 active:scale-95 transition-all duration-200 touch-manipulation">
                                    <svg class="w-3.5 h-3.5 mr-1 edit-group-hover:scale-110 edit-group-hover:rotate-12 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    Edit
                                </button>

                                <form method="POST" action="{{ route('settings.destroy', $setting) }}" class="w-full m-0" onsubmit="return confirm('Sangat berbahaya menghapus pengaturan sistem. Lanjutkan?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-group w-full inline-flex items-center justify-center px-3 py-2.5 bg-gradient-to-r from-red-50 to-rose-50 dark:from-red-900/30 dark:to-rose-900/30 text-red-600 dark:text-red-400 border border-red-200 dark:border-red-700 rounded-xl text-[10px] font-bold uppercase tracking-widest shadow-sm shadow-red-500/10 dark:shadow-red-700/20 hover:shadow-md hover:shadow-red-500/20 dark:hover:shadow-red-600/30 hover:scale-105 active:scale-95 hover:animate-shake transition-all duration-200 touch-manipulation">
                                        <svg class="w-3.5 h-3.5 mr-1 delete-group-hover:scale-110 delete-group-hover:rotate-12 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-28 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-24 h-24 bg-gradient-to-br from-slate-100 to-slate-50 dark:from-slate-800 dark:to-slate-700 rounded-[3rem] shadow-xl flex items-center justify-center text-slate-300 dark:text-slate-600 mb-8 border-2 border-dashed border-slate-200 dark:border-slate-700">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </div>
                                <h3 class="text-xl font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Belum Ada Config</h3>
                                <p class="text-sm text-slate-400 dark:text-slate-500 mt-2 font-medium italic">Belum ada data pengaturan web yang tersimpan.</p>
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
        {{ $settings->links() }}
    </div>
</div>

<!-- Modal Create -->
<div id="addSettingModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-[110] flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-2xl w-full max-w-lg p-8 border border-slate-100 dark:border-slate-800 max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-8 border-b-2 border-slate-100 dark:border-slate-800 pb-6">
            <h3 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Tambah Config Baru</h3>
            <button onclick="document.getElementById('addSettingModal').classList.add('hidden')" class="text-slate-400 hover:text-red-500 dark:hover:text-red-400 hover:scale-110 active:scale-95 transition-all duration-200">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form method="POST" action="{{ route('settings.store') }}" class="space-y-6">
            @csrf
            <div>
                <label class="block text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 px-1">Key Konfigurasi <span class="text-red-500">*</span></label>
                <input type="text" name="key" required placeholder="misal: CS_WHATSAPP_NUMBER" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-2xl focus:border-slate-500 dark:focus:border-slate-500 focus:outline-none focus:ring-4 focus:ring-slate-500/10 transition-all text-sm font-mono font-bold text-slate-700 dark:text-slate-200 shadow-sm">
                <p class="text-[10px] text-slate-400 dark:text-slate-500 mt-2 font-bold uppercase tracking-tight px-1">* Gunakan UPPER_SNAKE_CASE</p>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 px-1">Tipe Data <span class="text-red-500">*</span></label>
                <select name="type" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-2xl focus:border-slate-500 dark:focus:border-slate-500 focus:outline-none focus:ring-4 focus:ring-slate-500/10 transition-all text-sm font-bold text-slate-700 dark:text-slate-200 shadow-sm">
                    <option value="text">Teks Singkat (Text)</option>
                    <option value="longtext">Teks Panjang (LongText)</option>
                    <option value="image">URL Gambar (Image)</option>
                </select>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 px-1">Value (Isi) <span class="text-red-500">*</span></label>
                <textarea name="value" rows="4" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-2xl focus:border-slate-500 dark:focus:border-slate-500 focus:outline-none focus:ring-4 focus:ring-slate-500/10 transition-all text-sm font-bold text-slate-700 dark:text-slate-200 shadow-sm resize-none" placeholder="Masukkan nilai konfigurasi..."></textarea>
            </div>
            
            <div class="flex gap-4 pt-6 border-t-2 border-slate-100 dark:border-slate-800">
                <button type="button" onclick="document.getElementById('addSettingModal').classList.add('hidden')" class="flex-1 px-8 py-4 bg-red-50 dark:bg-red-900/30 text-red-500 dark:text-red-400 border-2 border-red-200 dark:border-red-800 rounded-2xl shadow-sm hover:bg-red-100 dark:hover:bg-red-900/50 hover:shadow-md hover:shadow-red-500/10 dark:hover:shadow-red-900/30 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-red-400/20 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation">Batal</button>
                <button type="submit" class="flex-1 px-8 py-4 bg-gradient-to-r from-slate-600 to-slate-700 dark:from-slate-500 dark:to-slate-600 text-white rounded-2xl shadow-md shadow-slate-500/20 dark:shadow-slate-700/30 hover:shadow-lg hover:shadow-slate-500/40 dark:hover:shadow-slate-600/50 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-slate-400/50 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation border-2 border-slate-400/50 dark:border-slate-500/50 hover:border-slate-300 dark:hover:border-slate-400">Simpan Config</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editSettingModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-[110] flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-2xl w-full max-w-lg p-8 border border-slate-100 dark:border-slate-800 max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-8 border-b-2 border-slate-100 dark:border-slate-800 pb-6">
            <h3 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Edit Konfigurasi</h3>
            <button onclick="document.getElementById('editSettingModal').classList.add('hidden')" class="text-slate-400 hover:text-red-500 dark:hover:text-red-400 hover:scale-110 active:scale-95 transition-all duration-200">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form id="editSettingForm" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 px-1">Key Konfigurasi (Read Only)</label>
                <input type="text" name="key" id="editSettingKey" readonly class="w-full px-5 py-4 bg-slate-100 dark:bg-slate-800/50 border-2 border-slate-200 dark:border-slate-700 rounded-2xl text-sm font-mono font-bold text-slate-500 dark:text-slate-400 shadow-sm">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 px-1">Tipe Data <span class="text-red-500">*</span></label>
                <select name="type" id="editSettingType" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-2xl focus:border-slate-500 dark:focus:border-slate-500 focus:outline-none focus:ring-4 focus:ring-slate-500/10 transition-all text-sm font-bold text-slate-700 dark:text-slate-200 shadow-sm">
                    <option value="text">Teks Singkat (Text)</option>
                    <option value="longtext">Teks Panjang (LongText)</option>
                    <option value="image">URL Gambar (Image)</option>
                </select>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 px-1">Value (Isi Baru) <span class="text-red-500">*</span></label>
                <textarea name="value" id="editSettingValue" rows="4" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-2xl focus:border-slate-500 dark:focus:border-slate-500 focus:outline-none focus:ring-4 focus:ring-slate-500/10 transition-all text-sm font-bold text-slate-700 dark:text-slate-200 shadow-sm resize-none"></textarea>
            </div>
            
            <div class="flex gap-4 pt-6 border-t-2 border-slate-100 dark:border-slate-800">
                <button type="button" onclick="document.getElementById('editSettingModal').classList.add('hidden')" class="flex-1 px-8 py-4 bg-red-50 dark:bg-red-900/30 text-red-500 dark:text-red-400 border-2 border-red-200 dark:border-red-800 rounded-2xl shadow-sm hover:bg-red-100 dark:hover:bg-red-900/50 hover:shadow-md hover:shadow-red-500/10 dark:hover:shadow-red-900/30 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-red-400/20 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation">Batal</button>
                <button type="submit" class="flex-1 px-8 py-4 bg-gradient-to-r from-slate-600 to-slate-700 dark:from-slate-500 dark:to-slate-600 text-white rounded-2xl shadow-md shadow-slate-500/20 dark:shadow-slate-700/30 hover:shadow-lg hover:shadow-slate-500/40 dark:hover:shadow-slate-600/50 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-slate-400/50 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation border-2 border-slate-400/50 dark:border-slate-500/50 hover:border-slate-300 dark:hover:border-slate-400">Update Config</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditSetting(id, key, value, type) {
        document.getElementById('editSettingForm').action = '/settings/' + id;
        document.getElementById('editSettingKey').value = key;
        document.getElementById('editSettingValue').value = value;
        document.getElementById('editSettingType').value = type;
        document.getElementById('editSettingModal').classList.remove('hidden');
    }
</script>
@endsection
