@extends('layouts.layout')
@section('title', 'Tanya Jawab (FAQ)')
@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-6 bg-white rounded-lg shadow-sm">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-orange/10 text-orange rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Pertanyaan Sering Diajukan (FAQ)</h2>
                <p class="text-sm text-slate-500 mt-1">Kelola daftar resolusi pertanyaan calon jamaah.</p>
            </div>
        </div>
        <button onclick="document.getElementById('addFaqModal').classList.remove('hidden')" class="mt-4 sm:mt-0 flex items-center space-x-2 bg-charcoal text-white px-4 py-2 rounded-lg hover:bg-orange transition shadow-sm font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            <span>Tambah FAQ</span>
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
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[800px]">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Pertanyaan & Jawaban</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($faqs as $faq)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 align-top max-w-xl">
                            <p class="font-semibold text-gray-900 break-words mb-1">{{ $faq->question }}</p>
                            <p class="text-sm text-gray-600 break-words line-clamp-3">{{ $faq->answer }}</p>
                        </td>
                        <td class="px-6 py-4 align-top">
                            <span class="inline-block px-2 py-1 bg-gray-100 text-gray-800 text-xs font-medium rounded-md">{{ $faq->category ?? '-' }}</span>
                        </td>
                        <td class="px-6 py-4 align-top whitespace-nowrap">
                            <button onclick="openEditFaq({{ $faq->id }}, '{{ addslashes($faq->question) }}', '{{ addslashes($faq->answer) }}', '{{ $faq->category }}')"
                                    class="text-orange hover:text-gold mr-3 text-xs font-black uppercase tracking-widest transition-colors">Edit</button>

                            <form method="POST" action="{{ route('faqs.destroy', $faq) }}" class="inline" onsubmit="return confirm('Hapus FAQ ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 text-sm font-medium">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-12 text-center text-gray-500">Belum ada data FAQ.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Pagination -->
    <div class="mt-4">
        {{ $faqs->links() }}
    </div>
</div>

<!-- Modal Create -->
<div id="addFaqModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-6 max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-900">Tambah FAQ</h3>
            <button onclick="document.getElementById('addFaqModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form method="POST" action="{{ route('faqs.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Pertanyaan <span class="text-red-500">*</span></label>
                <input type="text" name="question" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Jawaban <span class="text-red-500">*</span></label>
                <textarea name="answer" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Kategori (Opsional)</label>
                <input type="text" name="category" placeholder="Pendaftaran, Syarat, Pembulatan..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            
            <div class="flex space-x-3 pt-4 border-t border-gray-100">
                <button type="button" onclick="document.getElementById('addFaqModal').classList.add('hidden')" class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-medium transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editFaqModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-6 max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-900">Edit FAQ</h3>
            <button onclick="document.getElementById('editFaqModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form id="editFaqForm" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Pertanyaan <span class="text-red-500">*</span></label>
                <input type="text" name="question" id="editFaqQuestion" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Jawaban <span class="text-red-500">*</span></label>
                <textarea name="answer" id="editFaqAnswer" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Kategori (Opsional)</label>
                <input type="text" name="category" id="editFaqCategory" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            
            <div class="flex space-x-3 pt-4 border-t border-gray-100">
                <button type="button" onclick="document.getElementById('editFaqModal').classList.add('hidden')" class="flex-1 px-4 py-2 border border-slate-200 text-slate-500 rounded-lg hover:bg-slate-50 font-medium transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-2 bg-charcoal text-white rounded-lg hover:bg-orange font-medium transition shadow-lg shadow-orange/10">Simpan Perubahan</button>

            </div>
        </form>
    </div>
</div>

<script>
    function openEditFaq(id, question, answer, category) {
        document.getElementById('editFaqForm').action = '/faqs/' + id;
        document.getElementById('editFaqQuestion').value = question;
        document.getElementById('editFaqAnswer').value = answer;
        document.getElementById('editFaqCategory').value = category || '';
        document.getElementById('editFaqModal').classList.remove('hidden');
    }
</script>
@endsection
