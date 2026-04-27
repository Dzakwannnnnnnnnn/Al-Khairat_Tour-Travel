@extends('layouts.layout')
@section('title', 'Tanya Jawab (FAQ)')
@section('breadcrumb', 'FAQ')
@section('content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="bg-white dark:bg-slate-800/50 rounded-[2.5rem] p-8 shadow-sm border border-slate-100 dark:border-slate-700 backdrop-blur-md mb-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="flex items-center space-x-6">
                <div class="p-4 bg-orange-500/10 text-orange-500 rounded-2xl hidden md:block">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-black text-slate-800 dark:text-slate-100 leading-tight tracking-tight">FAQ (Tanya Jawab)</h1>
                    <p class="text-sm md:text-base text-slate-400 dark:text-slate-500 font-medium mt-1">Kelola daftar resolusi pertanyaan calon jamaah.</p>
                </div>
            </div>
            <button onclick="document.getElementById('addFaqModal').classList.remove('hidden')" class="group w-full md:w-auto bg-emerald-600 dark:bg-emerald-700 text-white px-8 py-4 rounded-2xl shadow-lg shadow-emerald-500/20 dark:shadow-emerald-900/30 hover:shadow-xl hover:scale-[1.02] active:scale-95 transition-all duration-300 flex items-center justify-center space-x-3 font-black uppercase tracking-widest text-[10px] border-b-4 border-emerald-800 dark:border-emerald-900">
                <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
                </svg>
                <span>Tambah FAQ</span>
            </button>
        </div>
    </div>

    <!-- Alert -->
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

    <!-- Table Section -->
    <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] shadow-lg shadow-slate-200/50 dark:shadow-slate-950/50 border border-slate-100 dark:border-slate-800 overflow-hidden">
        <div class="overflow-x-auto dashboard-scroll">
            <table class="w-full min-w-[800px]">
                <thead class="bg-gradient-to-r from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 border-b-2 border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-6 py-5 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest w-1/2">Pertanyaan & Jawaban</th>
                        <th class="px-6 py-5 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Kategori</th>
                        <th class="px-6 py-5 text-center text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest w-[140px]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    @forelse($faqs as $faq)
                    <tr class="hover:bg-gradient-to-r hover:from-amber-50/50 hover:to-orange-50/50 dark:hover:from-amber-900/10 dark:hover:to-orange-900/10 transition-all duration-200 row-group">
                        <td class="px-6 py-5 align-top max-w-xl">
                            <p class="font-black text-slate-800 dark:text-slate-100 break-words mb-2 row-group-hover:text-orange-600 dark:row-group-hover:text-orange-400 transition-colors">{{ $faq->question }}</p>
                            <p class="text-sm text-slate-500 dark:text-slate-400 break-words line-clamp-3 font-medium italic">{{ $faq->answer }}</p>
                        </td>
                        <td class="px-6 py-5 align-top">
                            <span class="inline-block px-3 py-1.5 bg-gradient-to-r from-amber-100 to-yellow-100 dark:from-amber-900/30 dark:to-yellow-900/30 text-amber-700 dark:text-amber-400 text-[10px] font-bold uppercase tracking-wider rounded-lg border border-amber-200 dark:border-amber-800 shadow-sm">
                                {{ $faq->category ?? '-' }}
                            </span>
                        </td>
                        <td class="px-4 py-5 align-top">
                            <div class="flex flex-col items-center gap-1.5">
                                <button onclick="openEditFaq({{ $faq->id }}, '{{ addslashes($faq->question) }}', '{{ addslashes($faq->answer) }}', '{{ $faq->category }}')"
                                        class="edit-group w-full inline-flex items-center justify-center px-3 py-2.5 bg-gradient-to-r from-amber-50 to-orange-50 dark:from-amber-900/30 dark:to-orange-900/30 text-amber-600 dark:text-amber-400 border border-amber-200 dark:border-amber-700 rounded-xl text-[10px] font-bold uppercase tracking-widest shadow-sm shadow-amber-500/10 dark:shadow-amber-700/20 hover:shadow-md hover:shadow-amber-500/20 dark:hover:shadow-amber-600/30 hover:scale-105 active:scale-95 transition-all duration-200 touch-manipulation">
                                    <svg class="w-3.5 h-3.5 mr-1 edit-group-hover:scale-110 edit-group-hover:rotate-12 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    Edit
                                </button>

                                <form method="POST" action="{{ route('faqs.destroy', $faq) }}" class="w-full m-0" onsubmit="return confirm('Hapus FAQ ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-group w-full inline-flex items-center justify-center px-3 py-2.5 bg-gradient-to-r from-red-50 to-rose-50 dark:from-red-900/30 dark:to-rose-900/30 text-red-600 dark:text-red-400 border border-red-200 dark:border-red-700 rounded-xl text-[10px] font-bold uppercase tracking-widest shadow-sm shadow-red-500/10 dark:shadow-red-700/20 hover:shadow-md hover:shadow-red-500/20 dark:hover:shadow-red-600/30 hover:scale-105 active:scale-95 transition-all duration-200 touch-manipulation">
                                        <svg class="w-3.5 h-3.5 mr-1 delete-group-hover:scale-110 delete-group-hover:rotate-12 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-28 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-24 h-24 bg-gradient-to-br from-amber-50 to-orange-100 dark:from-amber-900/20 dark:to-orange-900/20 rounded-[3rem] shadow-xl flex items-center justify-center text-amber-300 dark:text-amber-600 mb-8 border-2 border-dashed border-amber-200 dark:border-amber-800">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <h3 class="text-xl font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Tiada FAQ</h3>
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
        <div class="flex justify-between items-center mb-8 border-b-2 border-slate-100 dark:border-slate-800 pb-6">
            <h3 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Tambah FAQ Baru</h3>
            <button onclick="document.getElementById('addFaqModal').classList.add('hidden')" class="text-slate-400 hover:text-red-500 dark:hover:text-red-400 hover:scale-110 active:scale-95 transition-all duration-200">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form method="POST" action="{{ route('faqs.store') }}" class="space-y-6">
            @csrf
            <div>
                <label class="block text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 px-1">Pertanyaan <span class="text-red-500">*</span></label>
                <input type="text" name="question" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-2xl focus:border-sky-500 dark:focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-500/10 transition-all text-sm font-bold text-slate-700 dark:text-slate-200 shadow-sm">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 px-1">Jawaban <span class="text-red-500">*</span></label>
                <textarea name="answer" rows="4" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-2xl focus:border-sky-500 dark:focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-500/10 transition-all text-sm font-bold text-slate-700 dark:text-slate-200 shadow-sm resize-none"></textarea>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 px-1">Kategori (Opsional)</label>
                <input type="text" name="category" placeholder="Pendaftaran, Syarat, Pembulatan..." class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-2xl focus:border-sky-500 dark:focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-500/10 transition-all text-sm font-bold text-slate-700 dark:text-slate-200 shadow-sm">
            </div>
            
            <div class="flex gap-4 pt-6 border-t-2 border-slate-100 dark:border-slate-800">
                <button type="button" onclick="document.getElementById('addFaqModal').classList.add('hidden')" class="flex-1 px-8 py-4 bg-red-50 dark:bg-red-900/30 text-red-500 dark:text-red-400 border-2 border-red-200 dark:border-red-800 rounded-2xl shadow-sm hover:bg-red-100 dark:hover:bg-red-900/50 hover:shadow-md hover:shadow-red-500/10 dark:hover:shadow-red-900/30 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-red-400/20 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation">Batal</button>
                <button type="submit" class="flex-1 px-8 py-4 bg-gradient-to-r from-sky-500 to-blue-500 dark:from-sky-600 dark:to-blue-600 text-white rounded-2xl shadow-md shadow-sky-500/20 dark:shadow-sky-700/30 hover:shadow-lg hover:shadow-sky-500/40 dark:hover:shadow-sky-600/50 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-sky-400/50 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation border-2 border-sky-400/50 dark:border-sky-500/50 hover:border-sky-300 dark:hover:border-sky-400">Simpan FAQ</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editFaqModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-[110] flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-2xl w-full max-w-lg p-8 max-h-[90vh] overflow-y-auto border border-slate-100 dark:border-slate-800">
        <div class="flex justify-between items-center mb-8 border-b-2 border-slate-100 dark:border-slate-800 pb-6">
            <h3 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Edit FAQ</h3>
            <button onclick="document.getElementById('editFaqModal').classList.add('hidden')" class="text-slate-400 hover:text-red-500 dark:hover:text-red-400 hover:scale-110 active:scale-95 transition-all duration-200">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form id="editFaqForm" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 px-1">Pertanyaan <span class="text-red-500">*</span></label>
                <input type="text" name="question" id="editFaqQuestion" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-2xl focus:border-sky-500 dark:focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-500/10 transition-all text-sm font-bold text-slate-700 dark:text-slate-200 shadow-sm">
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 px-1">Jawaban <span class="text-red-500">*</span></label>
                <textarea name="answer" id="editFaqAnswer" rows="4" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-2xl focus:border-sky-500 dark:focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-500/10 transition-all text-sm font-bold text-slate-700 dark:text-slate-200 shadow-sm resize-none"></textarea>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 px-1">Kategori (Opsional)</label>
                <input type="text" name="category" id="editFaqCategory" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-2xl focus:border-sky-500 dark:focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-500/10 transition-all text-sm font-bold text-slate-700 dark:text-slate-200 shadow-sm">
            </div>
            
            <div class="flex gap-4 pt-6 border-t-2 border-slate-100 dark:border-slate-800">
                <button type="button" onclick="document.getElementById('editFaqModal').classList.add('hidden')" class="flex-1 px-8 py-4 bg-red-50 dark:bg-red-900/30 text-red-500 dark:text-red-400 border-2 border-red-200 dark:border-red-800 rounded-2xl shadow-sm hover:bg-red-100 dark:hover:bg-red-900/50 hover:shadow-md hover:shadow-red-500/10 dark:hover:shadow-red-900/30 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-red-400/20 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation">Batal</button>
                <button type="submit" class="flex-1 px-8 py-4 bg-gradient-to-r from-sky-500 to-blue-500 dark:from-sky-600 dark:to-blue-600 text-white rounded-2xl shadow-md shadow-sky-500/20 dark:shadow-sky-700/30 hover:shadow-lg hover:shadow-sky-500/40 dark:hover:shadow-sky-600/50 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-sky-400/50 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation border-2 border-sky-400/50 dark:border-sky-500/50 hover:border-sky-300 dark:hover:border-sky-400">Update FAQ</button>
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
