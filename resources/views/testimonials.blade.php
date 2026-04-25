@extends('layouts.layout')
@section('title', 'Manajemen Testimoni')
@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center p-5 md:p-6 bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-800 mb-6 gap-4 pt-6 md:pt-6">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-orange/10 dark:bg-orange/20 text-orange rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
            </div>
            <div>
                <h2 class="text-lg md:text-2xl font-bold text-slate-800 dark:text-slate-100 leading-tight">Manajemen Testimoni</h2>
                <p class="text-[11px] md:text-sm text-slate-500 dark:text-slate-400 mt-1">Kelola ulasan dan pengalaman jamaah.</p>
            </div>
        </div>
        <button onclick="document.getElementById('addTestimonialModal').classList.remove('hidden')" class="w-full md:w-auto flex items-center justify-center space-x-2 bg-charcoal text-white px-6 py-3 rounded-xl hover:bg-orange transition shadow-lg shadow-orange/10 font-bold uppercase tracking-widest text-[10px]">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            <span>Tambah Testimoni</span>
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
    <div class="bg-white dark:bg-slate-900 rounded-[1.5rem] shadow-sm border border-slate-100 dark:border-slate-800">
        <div class="overflow-x-auto dashboard-scroll" style="overflow-x: auto !important; -webkit-overflow-scrolling: touch;">
            <table class="w-full" style="min-width: 850px;">
                <thead class="bg-slate-50/50 dark:bg-slate-900/50 border-b border-slate-100 dark:border-slate-800">
                    <tr>
                        <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Nama Jamaah</th>
                        <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest w-1/2">Keterangan</th>
                        <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Rating</th>
                        <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Status</th>
                        <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest sticky right-0 bg-slate-50 dark:bg-slate-900 z-10 border-l border-slate-100 dark:border-slate-800 shadow-[-10px_0_15px_rgba(0,0,0,0.02)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.2)]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50 dark:divide-slate-800">
                    @forelse($testimonials as $testimoni)
                    <tr class="hover:bg-slate-100 dark:hover:bg-slate-800/50 transition-all group">
                        <td class="px-6 py-4 align-top">
                            <p class="font-black text-slate-800 dark:text-slate-100">{{ $testimoni->name }}</p>
                            @if($testimoni->email)
                            <a href="mailto:{{ $testimoni->email }}" class="text-xs text-slate-400 dark:text-slate-500 hover:text-orange flex items-center mt-1 gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                {{ $testimoni->email }}
                            </a>
                            @endif
                            @if($testimoni->product)
                            <span class="inline-block mt-1 px-2 py-1 bg-orange/5 text-orange text-[10px] font-black uppercase tracking-widest rounded-md border border-orange/10 transition-all hover:bg-orange hover:text-white">
                                {{ $testimoni->product->name }}
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 align-top">
                            <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed font-medium line-clamp-3">"{{ $testimoni->message }}"</p>
                            @if($testimoni->video_url)
                            <a href="{{ $testimoni->video_url }}" target="_blank" class="mt-2 inline-flex items-center text-xs font-medium text-red-600 hover:text-red-800 hover:underline">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                                Buka Link Video
                            </a>
                            @endif
                        </td>
                        <td class="px-6 py-4 align-top">
                            <div class="flex text-yellow-400">
                                @for($i=1; $i<=5; $i++)
                                    @if($i <= $testimoni->rating)
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    @else
                                        <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    @endif
                                @endfor
                            </div>
                        </td>
                        <td class="px-6 py-4 align-top">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $testimoni->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $testimoni->status === 'published' ? 'Tampil di Web' : 'Draft' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 sticky right-0 bg-white dark:bg-slate-900 group-hover:bg-slate-100 dark:group-hover:bg-[#1a2333] transition-colors z-10 border-l border-slate-100 dark:border-slate-800 shadow-[-10px_0_15px_rgba(0,0,0,0.02)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.2)] md:static">
                            <div class="flex flex-wrap gap-2">
                                @if($testimoni->email)
                                <button onclick="openReplyModal({{ $testimoni->id }}, '{{ addslashes($testimoni->name) }}', '{{ addslashes($testimoni->email) }}', '{{ addslashes(Str::limit($testimoni->message, 150)) }}')"
                                   class="inline-flex items-center justify-center px-3 py-1.5 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-lg text-[10px] font-bold uppercase tracking-widest transition-all shadow-sm">Balas Email</button>
                                @else
                                <span class="inline-flex items-center justify-center px-3 py-1.5 bg-gray-50 text-gray-400 rounded-lg text-[10px] font-bold uppercase tracking-widest border border-gray-100 cursor-not-allowed" title="Email tidak tersedia untuk testimoni ini">Balas Email</span>
                                @endif
                                <button onclick="openEditTestimonial({{ $testimoni->id }}, '{{ addslashes($testimoni->name) }}', '{{ $testimoni->email }}', '{{ $testimoni->product_id }}', '{{ addslashes($testimoni->message) }}', '{{ $testimoni->video_url }}', '{{ $testimoni->rating }}', '{{ $testimoni->status }}')"
                                        class="inline-flex items-center justify-center px-3 py-1.5 bg-orange-50 text-orange-600 hover:bg-orange-100 rounded-lg text-[10px] font-bold uppercase tracking-widest transition-all shadow-sm">Edit</button>

                                <form id="delete-form-{{ $testimoni->id }}" method="POST" action="{{ route('testimonials.destroy', $testimoni) }}" class="inline m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="openDeleteModal({{ $testimoni->id }})" class="inline-flex items-center justify-center px-3 py-1.5 bg-red-50 text-red-700 hover:bg-red-100 rounded-lg text-[10px] font-bold uppercase tracking-widest transition-all shadow-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-28 text-center bg-slate-50/20 dark:bg-slate-900/10">
                            <div class="flex flex-col items-center justify-center grayscale opacity-60">
                                <div class="w-24 h-24 bg-white dark:bg-slate-800 rounded-[3rem] shadow-xl flex items-center justify-center text-slate-200 dark:text-slate-700 mb-8 overflow-hidden border border-slate-100 dark:border-slate-700">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                </div>
                                <h3 class="text-xl font-black text-slate-800 dark:text-slate-200 uppercase tracking-widest">Tiada Testimoni</h3>
                                <p class="text-sm text-slate-400 dark:text-slate-500 mt-2 max-w-[280px] mx-auto font-medium leading-relaxed">Belum ada ulasan jamaah yang masuk ke sistem.</p>
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
        {{ $testimonials->links() }}
    </div>
</div>

<!-- Modal Create -->
<div id="addTestimonialModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-[110] flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-2xl w-full max-w-lg p-8 max-h-[90vh] overflow-y-auto border border-slate-100 dark:border-slate-800">
        <div class="flex justify-between items-center mb-8 border-b border-slate-50 dark:border-slate-800 pb-6">
            <h3 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Tambah Testimoni</h3>
            <button onclick="document.getElementById('addTestimonialModal').classList.add('hidden')" class="text-slate-400 hover:text-red-500 transition-colors">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form method="POST" action="{{ route('testimonials.store') }}" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 px-1">Nama Jamaah <span class="text-red-500">*</span></label>
                    <input type="text" name="name" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200" placeholder="Contoh: Budi Santoso">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 px-1">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" required pattern="^.+@.+\..+$" title="Mohon masukkan email lengkap dengan domain (contoh: @gmail.com)" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200" placeholder="email@contoh.com">
                </div>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 px-1">Terkait Paket (Opsional)</label>
                <select name="product_id" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                    <option value="">-- Umum / Tanpa Kaitan Paket --</option>
                    @foreach($products as $prod)
                    <option value="{{ $prod->id }}">{{ $prod->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 px-1">Pesan / Kesan <span class="text-red-500">*</span></label>
                <textarea name="message" rows="4" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200" placeholder="Pelayanan sangat memuaskan..."></textarea>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 px-1">Link Video (YouTube/TikTok) Opsional</label>
                <input type="url" name="video_url" placeholder="https://..." class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 px-1">Rating <span class="text-red-500">*</span></label>
                    <select name="rating" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                        <option value="5" selected>5 - Sangat Puas</option>
                        <option value="4">4 - Puas</option>
                        <option value="3">3 - Cukup</option>
                        <option value="2">2 - Kurang</option>
                        <option value="1">1 - Sangat Kurang</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 px-1">Status Web <span class="text-red-500">*</span></label>
                    <select name="status" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                        <option value="published">Tampilkan di Web</option>
                        <option value="draft">Sembunyikan (Draft)</option>
                    </select>
                </div>
            </div>
            
            <div class="flex gap-4 pt-6 border-t border-slate-50 dark:border-slate-800">
                <button type="button" onclick="document.getElementById('addTestimonialModal').classList.add('hidden')" class="flex-1 px-8 py-4 bg-slate-100 dark:bg-slate-800 text-slate-500 rounded-2xl hover:bg-slate-200 transition font-black uppercase tracking-widest text-[10px]">Batal</button>
                <button type="submit" class="flex-1 px-8 py-4 bg-charcoal dark:bg-orange text-white rounded-2xl hover:bg-orange transition font-black uppercase tracking-widest text-[10px] shadow-xl shadow-orange/20">Simpan Testimoni</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editTestimonialModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-[110] flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-2xl w-full max-w-lg p-8 max-h-[90vh] overflow-y-auto border border-slate-100 dark:border-slate-800">
        <div class="flex justify-between items-center mb-8 border-b border-slate-50 dark:border-slate-800 pb-6">
            <h3 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Edit Testimoni</h3>
            <button onclick="document.getElementById('editTestimonialModal').classList.add('hidden')" class="text-slate-400 hover:text-red-500 transition-colors">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form id="editTestimonialForm" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 px-1">Nama Jamaah <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="editTestimoniName" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 px-1">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" id="editTestimoniEmail" required pattern="^.+@.+\..+$" title="Mohon masukkan email lengkap dengan domain (contoh: @gmail.com)" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                </div>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 px-1">Terkait Paket (Opsional)</label>
                <select name="product_id" id="editTestimoniProduct" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                    <option value="">-- Umum / Tanpa Kaitan Paket --</option>
                    @foreach($products as $prod)
                    <option value="{{ $prod->id }}">{{ $prod->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 px-1">Pesan / Kesan <span class="text-red-500">*</span></label>
                <textarea name="message" id="editTestimoniMessage" rows="4" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200"></textarea>
            </div>
            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 px-1">Link Video (YouTube/TikTok) Opsional</label>
                <input type="url" name="video_url" id="editTestimoniVideo" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
            </div>
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 px-1">Rating <span class="text-red-500">*</span></label>
                    <select name="rating" id="editTestimoniRating" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                        <option value="5">5 - Sangat Puas</option>
                        <option value="4">4 - Puas</option>
                        <option value="3">3 - Cukup</option>
                        <option value="2">2 - Kurang</option>
                        <option value="1">1 - Sangat Kurang</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 px-1">Status Web <span class="text-red-500">*</span></label>
                    <select name="status" id="editTestimoniStatus" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                        <option value="published">Tampilkan di Web</option>
                        <option value="draft">Sembunyikan (Draft)</option>
                    </select>
                </div>
            </div>
            
            <div class="flex gap-4 pt-6 border-t border-slate-50 dark:border-slate-800">
                <button type="button" onclick="document.getElementById('editTestimonialModal').classList.add('hidden')" class="flex-1 px-8 py-4 bg-slate-100 dark:bg-slate-800 text-slate-500 rounded-2xl hover:bg-slate-200 transition font-black uppercase tracking-widest text-[10px]">Batal</button>
                <button type="submit" class="flex-1 px-8 py-4 bg-charcoal dark:bg-orange text-white rounded-2xl hover:bg-orange transition font-black uppercase tracking-widest text-[10px] shadow-xl shadow-orange/20">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Reply Email -->
<div id="replyEmailModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-[110] flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-2xl w-full max-w-lg p-8 max-h-[90vh] overflow-y-auto border border-slate-100 dark:border-slate-800 relative">
        <!-- Premium Loading Overlay -->
        <div id="emailLoadingOverlay" class="hidden absolute inset-0 bg-white/90 dark:bg-slate-900/90 backdrop-blur-sm z-[60] flex flex-col items-center justify-center transition-all duration-300">
            <div class="relative">
                <div class="absolute inset-0 rounded-full bg-blue-400 animate-ping opacity-20"></div>
                <div class="w-16 h-16 border-4 border-blue-100 dark:border-blue-900/30 border-t-blue-600 rounded-full animate-spin"></div>
            </div>
            <h4 class="mt-6 text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Sedang Mengirim...</h4>
            <p class="text-slate-500 dark:text-slate-400 text-sm mt-2 font-medium">Mohon tunggu sebentar, pesan sedang diproses.</p>
        </div>

        <!-- Success Animation Overlay -->
        <div id="emailSuccessOverlay" class="hidden absolute inset-0 bg-white/95 dark:bg-slate-900/95 backdrop-blur-md z-[70] flex flex-col items-center justify-center transition-all duration-500 translate-y-full opacity-0">
            <div class="w-24 h-24 bg-emerald-50 dark:bg-emerald-900/20 rounded-full flex items-center justify-center mb-6">
                <svg class="w-12 h-12 text-emerald-600 dark:text-emerald-400 animate-[bounce_1s_infinite]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h4 class="text-2xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Berhasil Terkirim!</h4>
            <p class="text-slate-500 dark:text-slate-400 mt-2 font-medium">Balasan ulasan telah sampai ke Inbox jamaah.</p>
        </div>
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-900">Kirim Balasan Email</h3>
            <button onclick="document.getElementById('replyEmailModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form id="replyEmailForm" method="POST" action="" class="space-y-4">
            @csrf
            
            <div class="bg-blue-50/50 dark:bg-blue-900/10 p-5 rounded-2xl border border-blue-100 dark:border-blue-900/30 mb-6">
                <p class="text-[10px] text-blue-600 dark:text-blue-400 font-black tracking-widest uppercase mb-2">Kepada:</p>
                <p id="replyEmailTargetName" class="font-black text-slate-800 dark:text-slate-100 leading-tight"></p>
                <p id="replyEmailTargetAddress" class="text-xs text-slate-500 dark:text-slate-400 mt-1"></p>
                
                <div class="mt-4 pt-4 border-t border-blue-100 dark:border-blue-900/30">
                    <p class="text-[10px] text-blue-600 dark:text-blue-400 font-black tracking-widest uppercase mb-2">Ulasan Jamaah:</p>
                    <p id="replyEmailContextMessage" class="text-xs text-slate-600 dark:text-slate-400 italic leading-relaxed"></p>
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 px-1">Pesan Balasan <span class="text-red-500">*</span></label>
                <textarea name="reply_message" rows="5" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200" placeholder="Ketik balasan Anda di sini..."></textarea>
                <p class="text-[10px] text-slate-400 dark:text-slate-500 mt-2 font-medium">Pesan ini akan otomatis dikirim ke email jamaah menggunakan template resmi Al-Khairat.</p>
            </div>
            
            <div class="flex space-x-3 pt-6 border-t border-slate-50 dark:border-slate-800">
                <button type="button" onclick="document.getElementById('replyEmailModal').classList.add('hidden')" class="flex-1 px-4 py-4 bg-slate-100 dark:bg-slate-800 text-slate-500 rounded-2xl hover:bg-slate-200 transition font-black uppercase tracking-widest text-[10px]">Batal</button>
                <button type="submit" id="submitReplyBtn" class="flex-1 px-4 py-4 bg-blue-600 text-white rounded-2xl hover:bg-blue-700 transition font-black uppercase tracking-widest text-[10px] shadow-xl shadow-blue-600/20 flex items-center justify-center gap-2">
                    <svg id="replySubmitIcon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                    <span id="replySubmitText">Kirim Balasan</span>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="deleteConfirmModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-[150] flex items-center justify-center p-4 transition-all duration-300">
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-2xl w-full max-w-sm p-8 border border-slate-100 dark:border-slate-800 transform transition-all duration-300 scale-90 opacity-0" id="deleteModalContent">
        <div class="text-center">
            <div class="w-20 h-20 bg-red-50 dark:bg-red-900/20 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-red-600 dark:text-red-400 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
            </div>
            <h3 class="text-2xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest mb-2">Hapus Testimoni?</h3>
            <p class="text-slate-500 dark:text-slate-400 text-sm mb-8 px-2 font-medium leading-relaxed">Tindakan ini permanen. Data ulasan akan dihapus dari sistem.</p>
            
            <div class="flex flex-col gap-3">
                <button onclick="executeDelete()" class="w-full py-4 bg-red-600 text-white rounded-2xl font-black uppercase tracking-widest text-[10px] hover:bg-red-700 transition shadow-xl shadow-red-600/20 active:scale-95">Ya, Hapus Sekarang</button>
                <button onclick="closeDeleteModal()" class="w-full py-4 bg-slate-100 dark:bg-slate-800 text-slate-500 rounded-2xl font-black uppercase tracking-widest text-[10px] hover:bg-slate-200 transition active:scale-95">Batalkan</button>
            </div>
        </div>
    </div>
</div>

<script>
    let testimonialIdToDelete = null;

    function openDeleteModal(id) {
        testimonialIdToDelete = id;
        const modal = document.getElementById('deleteConfirmModal');
        const content = document.getElementById('deleteModalContent');
        
        modal.classList.remove('hidden');
        setTimeout(() => {
            content.classList.remove('scale-90', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteConfirmModal');
        const content = document.getElementById('deleteModalContent');
        
        content.classList.add('scale-90', 'opacity-0');
        content.classList.remove('scale-100', 'opacity-100');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            testimonialIdToDelete = null;
        }, 300);
    }

    function executeDelete() {
        if (testimonialIdToDelete) {
            const form = document.getElementById('delete-form-' + testimonialIdToDelete);
            if (form) {
                // Show loading on delete button inside modal
                const deleteBtn = event.target;
                deleteBtn.disabled = true;
                deleteBtn.innerHTML = '<span class="flex items-center justify-center gap-2"><svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Menghapus...</span>';
                
                form.submit();
            }
        }
    }

    function openReplyModal(id, name, email, message) {
        document.getElementById('replyEmailForm').action = '/testimonials/' + id + '/reply';
        document.getElementById('replyEmailTargetName').textContent = name;
        document.getElementById('replyEmailTargetAddress').textContent = email;
        document.getElementById('replyEmailContextMessage').textContent = '"' + message + '"';
        document.getElementById('replyEmailModal').classList.remove('hidden');
    }

    document.getElementById('replyEmailForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const form = this;
        const loadingOverlay = document.getElementById('emailLoadingOverlay');
        const successOverlay = document.getElementById('emailSuccessOverlay');
        const btn = document.getElementById('submitReplyBtn');
        
        // 1. Show Loading
        loadingOverlay.classList.remove('hidden');
        loadingOverlay.classList.add('flex');
        btn.disabled = true;

        try {
            const formData = new FormData(form);
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await response.json();

            if (response.ok && data.status === 'success') {
                // 2. Transition Loading -> Success
                loadingOverlay.classList.add('opacity-0');
                
                setTimeout(() => {
                    loadingOverlay.classList.add('hidden');
                    successOverlay.classList.remove('hidden');
                    successOverlay.classList.add('flex');
                    
                    // Animate Success in
                    setTimeout(() => {
                        successOverlay.classList.remove('translate-y-full', 'opacity-0');
                    }, 50);
                }, 300);

                // 3. Close Modal & Reload after 2.5s
                setTimeout(() => {
                    location.reload();
                }, 2500);

            } else {
                throw new Error(data.message || 'Gagal mengirim email.');
            }
        } catch (error) {
            loadingOverlay.classList.add('hidden');
            btn.disabled = false;
            alert('Maaf, ada kendala: ' + error.message);
        }
    });

    function openEditTestimonial(id, name, email, product_id, message, video_url, rating, status) {
        document.getElementById('editTestimonialForm').action = '/testimonials/' + id;
        document.getElementById('editTestimoniName').value = name;
        document.getElementById('editTestimoniEmail').value = email || '';
        document.getElementById('editTestimoniProduct').value = product_id || '';
        document.getElementById('editTestimoniMessage').value = message;
        document.getElementById('editTestimoniVideo').value = video_url || '';
        document.getElementById('editTestimoniRating').value = rating;
        document.getElementById('editTestimoniStatus').value = status;
        document.getElementById('editTestimonialModal').classList.remove('hidden');
    }
</script>
@endsection
