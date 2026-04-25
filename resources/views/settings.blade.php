@extends('layouts.layout')
@section('title', 'Sistem & Pengaturan Web')
@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center p-5 md:p-6 bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-800 mb-6 gap-4 pt-6 md:pt-6">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-orange/10 dark:bg-orange/20 text-orange rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </div>
            <div>
                <h2 class="text-lg md:text-2xl font-bold text-slate-800 dark:text-slate-100 leading-tight">Pengaturan Variabel</h2>
                <p class="text-[11px] md:text-sm text-slate-500 dark:text-slate-400 mt-1">Konfigurasi dinamis kontak dan info esensial.</p>
            </div>
        </div>
        <button onclick="document.getElementById('addSettingModal').classList.remove('hidden')" class="w-full md:w-auto flex items-center justify-center space-x-2 bg-charcoal dark:bg-orange text-white px-6 py-3 rounded-xl hover:bg-orange transition shadow-lg shadow-orange/10 font-bold uppercase tracking-widest text-[10px]">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            <span>Tambah Config</span>
        </button>
    </div>

    <!-- Alert -->
    @if(session('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 flex items-center shadow-sm">
        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
        <span class="font-medium">Berhasil!</span>&nbsp;{{ session('success') }}
    </div>
    @endif
    
    @if($errors->any())
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 flex flex-col shadow-sm">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
            <span class="font-medium">Gagal!</span> Periksa form kembali.
        </div>
        <ul class="mt-1.5 ml-7 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Table Section -->
    <div class="bg-white dark:bg-slate-900 rounded-[1.5rem] shadow-sm overflow-hidden border border-slate-100 dark:border-slate-800">
        <div class="overflow-x-auto dashboard-scroll">
            <table class="w-full min-w-[800px]">
                <thead class="bg-slate-50/50 dark:bg-slate-900/50 border-b border-slate-100 dark:border-slate-800">
                    <tr>
                        <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Key (Kunci)</th>
                        <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Value (Konfigurasi)</th>
                        <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Tipe Data</th>
                        <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest sticky right-0 bg-white dark:bg-slate-900 z-10 border-l border-slate-100 dark:border-slate-800 shadow-[-10px_0_15px_rgba(0,0,0,0.02)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.2)]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50 dark:divide-slate-800">
                    @forelse($settings as $setting)
                    <tr class="hover:bg-slate-100 dark:hover:bg-slate-800/50 transition-all group">
                        <td class="px-6 py-4 align-top">
                            <p class="font-mono text-sm font-semibold text-orange">{{ $setting->key }}</p>
                        </td>

                        <td class="px-6 py-4 align-top max-w-xl">
                            <p class="text-sm text-slate-700 dark:text-slate-300 break-words line-clamp-3 font-medium">{{ $setting->value }}</p>
                        </td>
                        <td class="px-6 py-4 align-top">
                            <span class="inline-block px-3 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-[10px] font-black uppercase tracking-widest rounded-lg border border-slate-200 dark:border-slate-700">{{ $setting->type }}</span>
                        </td>
                        <td class="px-6 py-4 align-top sticky right-0 bg-white dark:bg-slate-900 group-hover:bg-slate-100 dark:group-hover:bg-[#1a2333] transition-colors z-10 border-l border-slate-100 dark:border-slate-800 shadow-[-10px_0_15px_rgba(0,0,0,0.02)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.2)] md:static">
                            <div class="flex flex-wrap gap-2">
                                <button onclick="openEditSetting({{ $setting->id }}, '{{ addslashes($setting->key) }}', '{{ addslashes(str_replace(array("\r", "\n"), array('\r', '\n'), $setting->value)) }}', '{{ $setting->type }}')"
                                        class="inline-flex items-center justify-center px-3 py-1.5 bg-orange-50 text-orange-600 hover:bg-orange-100 rounded-lg text-[10px] font-bold uppercase tracking-widest transition-all shadow-sm">Edit</button>

                                <form method="POST" action="{{ route('settings.destroy', $setting) }}" class="inline m-0" onsubmit="return confirm('Sangat berbahaya menghapus pengaturan sistem. Lanjutkan?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center justify-center px-3 py-1.5 bg-red-50 text-red-700 hover:bg-red-100 rounded-lg text-[10px] font-bold uppercase tracking-widest transition-all shadow-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-gray-500">Belum ada data pengaturan web.</td>
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
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-2xl w-full max-w-lg p-8 border border-slate-100 dark:border-slate-800">
        <div class="flex justify-between items-center mb-8 border-b border-slate-50 dark:border-slate-800 pb-6">
            <h3 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Tambah Config Baru</h3>
            <button onclick="document.getElementById('addSettingModal').classList.add('hidden')" class="text-slate-400 hover:text-red-500 transition-colors">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form method="POST" action="{{ route('settings.store') }}" class="space-y-6">
            @csrf
            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Key Konfigurasi <span class="text-red-500">*</span></label>
                <input type="text" name="key" required placeholder="misal: CS_WHATSAPP_NUMBER" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-mono font-bold text-orange">
                <p class="text-[10px] text-slate-400 mt-2 font-bold uppercase tracking-tight">* Gunakan UPPER_SNAKE_CASE</p>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Tipe Data <span class="text-red-500">*</span></label>
                <select name="type" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                    <option value="text">Teks Singkat (Text)</option>
                    <option value="longtext">Teks Panjang (LongText)</option>
                    <option value="image">URL Gambar (Image)</option>
                </select>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Value (Isi) <span class="text-red-500">*</span></label>
                <textarea name="value" rows="4" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200" placeholder="Masukkan nilai konfigurasi..."></textarea>
            </div>
            
            <div class="flex gap-4 pt-6 border-t border-slate-50 dark:border-slate-800">
                <button type="button" onclick="document.getElementById('addSettingModal').classList.add('hidden')" class="flex-1 px-8 py-4 bg-slate-100 dark:bg-slate-800 text-slate-500 rounded-2xl hover:bg-slate-200 transition font-black uppercase tracking-widest text-[10px]">Batal</button>
                <button type="submit" class="flex-1 px-8 py-4 bg-charcoal dark:bg-orange text-white rounded-2xl hover:bg-orange transition font-black uppercase tracking-widest text-[10px] shadow-xl shadow-orange/20">Simpan Config</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editSettingModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-[110] flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-2xl w-full max-w-lg p-8 border border-slate-100 dark:border-slate-800">
        <div class="flex justify-between items-center mb-8 border-b border-slate-50 dark:border-slate-800 pb-6">
            <h3 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Edit Konfigurasi</h3>
            <button onclick="document.getElementById('editSettingModal').classList.add('hidden')" class="text-slate-400 hover:text-red-500 transition-colors">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form id="editSettingForm" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Key Konfigurasi (Read Only)</label>
                <input type="text" name="key" id="editSettingKey" readonly class="w-full px-5 py-4 bg-slate-100 dark:bg-slate-800/50 border-2 border-slate-200 dark:border-slate-700 rounded-2xl text-sm font-mono font-bold text-slate-400 cursor-not-allowed">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Tipe Data <span class="text-red-500">*</span></label>
                <select name="type" id="editSettingType" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                    <option value="text">Teks Singkat (Text)</option>
                    <option value="longtext">Teks Panjang (LongText)</option>
                    <option value="image">URL Gambar (Image)</option>
                </select>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Value (Isi Baru) <span class="text-red-500">*</span></label>
                <textarea name="value" id="editSettingValue" rows="4" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200"></textarea>
            </div>
            
            <div class="flex gap-4 pt-6 border-t border-slate-50 dark:border-slate-800">
                <button type="button" onclick="document.getElementById('editSettingModal').classList.add('hidden')" class="flex-1 px-8 py-4 bg-slate-100 dark:bg-slate-800 text-slate-500 rounded-2xl hover:bg-slate-200 transition font-black uppercase tracking-widest text-[10px]">Batal</button>
                <button type="submit" class="flex-1 px-8 py-4 bg-charcoal dark:bg-orange text-white rounded-2xl hover:bg-orange transition font-black uppercase tracking-widest text-[10px] shadow-xl shadow-orange/20">Update Config</button>
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
