@extends('layouts.layout')
@section('title', 'Tanya Jawab (FAQ)')
@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-6 bg-white dark:bg-slate-900 rounded-[2rem] shadow-sm border border-slate-100 dark:border-slate-800 mb-8 gap-4 pt-6 md:pt-6">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-orange/10 dark:bg-orange/20 text-orange rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <h2 class="text-lg md:text-2xl font-bold text-slate-800 dark:text-slate-100 leading-tight">FAQ (Tanya Jawab)</h2>
                <p class="text-[11px] md:text-sm text-slate-500 dark:text-slate-400 mt-1">Kelola daftar resolusi pertanyaan calon jamaah.</p>
            </div>
        </div>
        <button onclick="document.getElementById('addFaqModal').classList.remove('hidden')" class="w-full md:w-auto flex items-center justify-center space-x-2 bg-charcoal text-white px-6 py-3.5 rounded-xl hover:bg-orange transition shadow-lg shadow-orange/10 font-bold uppercase tracking-widest text-[10px]">
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
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-sm border border-slate-100 dark:border-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[800px]">
                <thead class="bg-slate-50/50 dark:bg-slate-900/50 border-b border-slate-100 dark:border-slate-800">
                    <tr>
                        <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Pertanyaan & Jawaban</th>
                        <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Kategori</th>
                        <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50 dark:divide-slate-800">
                    @forelse($faqs as $faq)
                    <tr class="hover:bg-slate-100 dark:hover:bg-slate-800/50 transition-all group">
                        <td class="px-6 py-6 align-top max-w-xl">
                            <p class="font-black text-slate-800 dark:text-slate-100 break-words mb-2">{{ $faq->question }}</p>
                            <p class="text-sm text-slate-500 dark:text-slate-400 break-words line-clamp-3 font-medium">{{ $faq->answer }}</p>
                        </td>
                        <td class="px-6 py-4 align-top">
                            <span class="inline-block px-2 py-1 bg-gray-100 text-gray-800 text-xs font-medium rounded-md">{{ $faq->category ?? '-' }}</span>
                        </td>
                        <td class="px-6 py-4 align-top">
                            <div class="flex flex-wrap gap-2">
                                <button onclick="openEditFaq({{ $faq->id }}, '{{ addslashes($faq->question) }}', '{{ addslashes($faq->answer) }}', '{{ $faq->category }}')"
                                        class="inline-flex items-center justify-center px-3 py-1.5 bg-orange-50 text-orange-600 hover:bg-orange-100 rounded-lg text-[10px] font-bold uppercase tracking-widest transition-all shadow-sm">Edit</button>

                                <form method="POST" action="{{ route('faqs.destroy', $faq) }}" class="inline m-0" onsubmit="return confirm('Hapus FAQ ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center justify-center px-3 py-1.5 bg-red-50 text-red-700 hover:bg-red-100 rounded-lg text-[10px] font-bold uppercase tracking-widest transition-all shadow-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                    <tr>
                        <td colspan="3" class="px-6 py-28 text-center bg-slate-50/20 dark:bg-slate-900/10">
                            <div class="flex flex-col items-center justify-center grayscale opacity-60">
                                <div class="w-24 h-24 bg-white dark:bg-slate-800 rounded-[3rem] shadow-xl flex items-center justify-center text-slate-200 dark:text-slate-700 mb-8 overflow-hidden border border-slate-100 dark:border-slate-700">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <h3 class="text-xl font-black text-slate-800 dark:text-slate-200 uppercase tracking-widest">Tiada FAQ</h3>
                                <p class="text-sm text-slate-400 dark:text-slate-500 mt-2 max-w-[280px] mx-auto font-medium leading-relaxed">Belum ada daftar tanya jawab yang terdaftar.</p>
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
        {{ $faqs->links() }}
    </div>
</div>

<!-- Modal Create -->
<div id="addFaqModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-[110] flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-2xl w-full max-w-lg p-8 max-h-[90vh] overflow-y-auto border border-slate-100 dark:border-slate-800">
        <div class="flex justify-between items-center mb-8 border-b border-slate-50 dark:border-slate-800 pb-6">
            <h3 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Tambah FAQ Baru</h3>
            <button onclick="document.getElementById('addFaqModal').classList.add('hidden')" class="text-slate-400 hover:text-red-500 transition-colors">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form method="POST" action="{{ route('faqs.store') }}" class="space-y-6">
            @csrf
            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 px-1">Pertanyaan <span class="text-red-500">*</span></label>
                <input type="text" name="question" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 px-1">Jawaban <span class="text-red-500">*</span></label>
                <textarea name="answer" rows="4" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200"></textarea>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 px-1">Kategori (Opsional)</label>
                <input type="text" name="category" placeholder="Pendaftaran, Syarat, Pembulatan..." class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
            </div>
            
            <div class="flex gap-4 pt-6 border-t border-slate-50 dark:border-slate-800">
                <button type="button" onclick="document.getElementById('addFaqModal').classList.add('hidden')" class="flex-1 px-8 py-4 bg-slate-100 dark:bg-slate-800 text-slate-500 rounded-2xl hover:bg-slate-200 transition font-black uppercase tracking-widest text-[10px]">Batal</button>
                <button type="submit" class="flex-1 px-8 py-4 bg-charcoal dark:bg-orange text-white rounded-2xl hover:bg-orange transition font-black uppercase tracking-widest text-[10px] shadow-xl shadow-orange/20">Simpan FAQ</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editFaqModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-[110] flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-2xl w-full max-w-lg p-8 max-h-[90vh] overflow-y-auto border border-slate-100 dark:border-slate-800">
        <div class="flex justify-between items-center mb-8 border-b border-slate-50 dark:border-slate-800 pb-6">
            <h3 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Edit FAQ</h3>
            <button onclick="document.getElementById('editFaqModal').classList.add('hidden')" class="text-slate-400 hover:text-red-500 transition-colors">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form id="editFaqForm" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 px-1">Pertanyaan <span class="text-red-500">*</span></label>
                <input type="text" name="question" id="editFaqQuestion" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 px-1">Jawaban <span class="text-red-500">*</span></label>
                <textarea name="answer" id="editFaqAnswer" rows="4" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200"></textarea>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 px-1">Kategori (Opsional)</label>
                <input type="text" name="category" id="editFaqCategory" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
            </div>
            
            <div class="flex gap-4 pt-6 border-t border-slate-50 dark:border-slate-800">
                <button type="button" onclick="document.getElementById('editFaqModal').classList.add('hidden')" class="flex-1 px-8 py-4 bg-slate-100 dark:bg-slate-800 text-slate-500 rounded-2xl hover:bg-slate-200 transition font-black uppercase tracking-widest text-[10px]">Batal</button>
                <button type="submit" class="flex-1 px-8 py-4 bg-charcoal dark:bg-orange text-white rounded-2xl hover:bg-orange transition font-black uppercase tracking-widest text-[10px] shadow-xl shadow-orange/20">Update FAQ</button>
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
