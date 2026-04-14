@extends('layouts.layout')
@section('title', 'Manasik Digital & Panduan')
@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center p-5 md:p-6 bg-white rounded-2xl shadow-sm border border-slate-100 mb-6 gap-4 pt-6 md:pt-6">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-orange/10 text-orange rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </div>
            <div>
                <h2 class="text-lg md:text-2xl font-bold text-slate-800 leading-tight">E-Manasik Digital</h2>
                <p class="text-[11px] md:text-sm text-slate-500 mt-1">Kelola konten panduan dan perlengkapan.</p>
            </div>
        </div>
        <button onclick="document.getElementById('addGuideModal').classList.remove('hidden')" class="w-full md:w-auto flex items-center justify-center space-x-2 bg-charcoal text-white px-6 py-3 rounded-xl hover:bg-orange transition shadow-lg shadow-orange/10 font-bold uppercase tracking-widest text-[10px]">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            <span>Tambah Panduan</span>
        </button>
    </div>

    <!-- Alert -->
    @if(session('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 flex items-center shadow-sm">
        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
        <span class="font-medium">Berhasil!</span>&nbsp;{{ session('success') }}
    </div>
    @endif

    <!-- Table Section -->
    <div class="bg-white rounded-[1.5rem] shadow-sm border border-slate-100">
        <div class="overflow-x-auto dashboard-scroll" style="overflow-x: auto !important; -webkit-overflow-scrolling: touch;">
            <table class="w-full" style="min-width: 700px;">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Judul Panduan</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase sticky right-0 bg-gray-50 z-10 border-l border-gray-200 md:border-l-0 md:static">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($guides as $guide)
                    <tr class="hover:bg-gray-50 transition group">
                        <td class="px-6 py-4 align-top">
                            <p class="font-semibold text-gray-900">{{ $guide->title }}</p>
                            @if($guide->video_url)
                            <a href="{{ $guide->video_url }}" target="_blank" class="mt-1 inline-flex items-center text-xs font-medium text-red-600 hover:underline">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                                Link Video Tersedia
                            </a>
                            @endif
                        </td>
                        <td class="px-6 py-4 align-top">
                            <span class="inline-block px-2 py-1 bg-gray-100 text-gray-800 text-xs font-medium rounded-md">{{ $guide->category }}</span>
                        </td>
                        <td class="px-6 py-4 align-top">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $guide->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $guide->status === 'published' ? 'Tampil di Web' : 'Draft' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 align-top sticky right-0 bg-white group-hover:bg-gray-50 transition-colors z-10 border-l border-gray-100 md:border-l-0 md:static">
                            <div class="flex flex-wrap gap-2">
                                <button onclick="openEditGuide({{ $guide->id }}, '{{ addslashes($guide->title) }}', '{{ $guide->category }}', '{{ addslashes($guide->content) }}', '{{ $guide->video_url }}', '{{ $guide->status }}')"
                                        class="inline-flex items-center justify-center px-3 py-1.5 bg-orange-50 text-orange-600 hover:bg-orange-100 rounded-lg text-[10px] font-bold uppercase tracking-widest transition-all shadow-sm">Edit</button>

                                <form method="POST" action="{{ route('guides.destroy', $guide) }}" class="inline m-0" onsubmit="return confirm('Hapus panduan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center justify-center px-3 py-1.5 bg-red-50 text-red-700 hover:bg-red-100 rounded-lg text-[10px] font-bold uppercase tracking-widest transition-all shadow-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-gray-500">Belum ada data panduan/manasik.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Pagination -->
    <div class="mt-4">
        {{ $guides->links() }}
    </div>
</div>

<!-- Modal Create -->
<div id="addGuideModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-6 max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-900">Tambah Panduan Baru</h3>
            <button onclick="document.getElementById('addGuideModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form method="POST" action="{{ route('guides.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Judul <span class="text-red-500">*</span></label>
                <input type="text" name="title" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                <input type="text" name="category" placeholder="Contoh: Tata Cara, Doa, Perlengkapan" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Isi Konten/Artikel <span class="text-red-500">*</span></label>
                <textarea name="content" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Link Video YouTube (Opsional)</label>
                <input type="url" name="video_url" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Status <span class="text-red-500">*</span></label>
                <select name="status" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="published">Tampilkan di Web</option>
                    <option value="draft">Sembunyikan (Draft)</option>
                </select>
            </div>
            
            <div class="flex space-x-3 pt-4 border-t border-gray-100">
                <button type="button" onclick="document.getElementById('addGuideModal').classList.add('hidden')" class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-medium transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editGuideModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-6 max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-900">Edit Panduan</h3>
            <button onclick="document.getElementById('editGuideModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form id="editGuideForm" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Judul <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="editGuideTitle" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                <input type="text" name="category" id="editGuideCategory" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Isi Konten/Artikel <span class="text-red-500">*</span></label>
                <textarea name="content" id="editGuideContent" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Link Video YouTube (Opsional)</label>
                <input type="url" name="video_url" id="editGuideVideo" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Status <span class="text-red-500">*</span></label>
                <select name="status" id="editGuideStatus" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="published">Tampilkan di Web</option>
                    <option value="draft">Sembunyikan (Draft)</option>
                </select>
            </div>
            
            <div class="flex space-x-3 pt-4 border-t border-gray-100">
                <button type="button" onclick="document.getElementById('editGuideModal').classList.add('hidden')" class="flex-1 px-4 py-2 border border-slate-200 text-slate-500 rounded-lg hover:bg-slate-50 font-medium transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-2 bg-charcoal text-white rounded-lg hover:bg-orange font-medium transition shadow-lg shadow-orange/10">Simpan Perubahan</button>

            </div>
        </form>
    </div>
</div>

<script>
    function openEditGuide(id, title, category, content, video_url, status) {
        document.getElementById('editGuideForm').action = '/guides/' + id;
        document.getElementById('editGuideTitle').value = title;
        document.getElementById('editGuideCategory').value = category;
        document.getElementById('editGuideContent').value = content;
        document.getElementById('editGuideVideo').value = video_url || '';
        document.getElementById('editGuideStatus').value = status;
        document.getElementById('editGuideModal').classList.remove('hidden');
    }
</script>
@endsection
