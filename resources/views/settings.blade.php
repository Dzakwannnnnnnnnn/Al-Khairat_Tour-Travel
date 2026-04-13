@extends('layouts.layout')
@section('title', 'Sistem & Pengaturan Web')
@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-6 bg-white rounded-lg shadow-sm">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-orange/10 text-orange rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Pengaturan Variabel (Key-Value)</h2>
                <p class="text-sm text-slate-500 mt-1">Konfigurasi dinamis untuk kontak, sosmed, rekening, dan info esensial.</p>
            </div>
        </div>
        <button onclick="document.getElementById('addSettingModal').classList.remove('hidden')" class="mt-4 sm:mt-0 flex items-center space-x-2 bg-charcoal text-white px-4 py-2 rounded-lg hover:bg-orange transition shadow-sm font-medium">
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
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[800px]">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Key (Kunci)</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Value (Isi Konfigurasi)</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Tipe Data</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($settings as $setting)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 align-top">
                            <p class="font-mono text-sm font-semibold text-orange">{{ $setting->key }}</p>
                        </td>

                        <td class="px-6 py-4 align-top max-w-xl">
                            <p class="text-sm text-gray-800 break-words line-clamp-3">{{ $setting->value }}</p>
                        </td>
                        <td class="px-6 py-4 align-top">
                            <span class="inline-block px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-md uppercase">{{ $setting->type }}</span>
                        </td>
                        <td class="px-6 py-4 align-top">
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
<div id="addSettingModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-6 max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-900">Tambah Config Baru</h3>
            <button onclick="document.getElementById('addSettingModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form method="POST" action="{{ route('settings.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Key Konfigurasi <span class="text-red-500">*</span></label>
                <input type="text" name="key" required placeholder="misal: CS_WHATSAPP_NUMBER" class="w-full px-4 py-2 font-mono text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <p class="text-xs text-gray-500 mt-1">Gunakan format UPPER_SNAKE_CASE (tanpa spasi)</p>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Tipe Data <span class="text-red-500">*</span></label>
                <select name="type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="text">Teks Singkat (Text)</option>
                    <option value="longtext">Teks Panjang (LongText)</option>
                    <option value="image">URL Gambar (Image)</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Value (Isi) <span class="text-red-500">*</span></label>
                <textarea name="value" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>
            
            <div class="flex space-x-3 pt-4 border-t border-gray-100">
                <button type="button" onclick="document.getElementById('addSettingModal').classList.add('hidden')" class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-medium transition">Simpan Config</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editSettingModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-6 max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-900">Edit Konfigurasi</h3>
            <button onclick="document.getElementById('editSettingModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form id="editSettingForm" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Key Konfigurasi <span class="text-red-500">*</span></label>
                <input type="text" name="key" id="editSettingKey" required class="w-full px-4 py-2 font-mono text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-50" readonly>
                <p class="text-xs text-orange-600 mt-1">Nama variabel key tidak boleh diubah untuk mencegah error sistem.</p>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Tipe Data <span class="text-red-500">*</span></label>
                <select name="type" id="editSettingType" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="text">Teks Singkat (Text)</option>
                    <option value="longtext">Teks Panjang (LongText)</option>
                    <option value="image">URL Gambar (Image)</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Value (Isi Baru) <span class="text-red-500">*</span></label>
                <textarea name="value" id="editSettingValue" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>
            
            <div class="flex space-x-3 pt-4 border-t border-gray-100">
                <button type="button" onclick="document.getElementById('editSettingModal').classList.add('hidden')" class="flex-1 px-4 py-2 border border-slate-200 text-slate-500 rounded-lg hover:bg-slate-50 font-medium transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-2 bg-charcoal text-white rounded-lg hover:bg-orange font-medium transition shadow-lg shadow-orange/10">Simpan Perubahan</button>

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
