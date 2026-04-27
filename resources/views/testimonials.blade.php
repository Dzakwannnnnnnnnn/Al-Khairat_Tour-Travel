@extends('layouts.layout')
@section('title', 'Manajemen Testimoni')
@section('breadcrumb', 'Testimoni')
@section('content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="bg-white dark:bg-slate-800/50 rounded-[2.5rem] p-8 shadow-sm border border-slate-100 dark:border-slate-700 backdrop-blur-md mb-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="flex items-center space-x-6">
                <div class="p-4 bg-orange-500/10 text-orange-500 rounded-2xl hidden md:block">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-black text-slate-800 dark:text-slate-100 leading-tight tracking-tight">Manajemen Testimoni</h1>
                    <p class="text-sm md:text-base text-slate-400 dark:text-slate-500 font-medium mt-1">Kelola ulasan dan pengalaman jamaah.</p>
                </div>
            </div>
            <button onclick="document.getElementById('addTestimonialModal').classList.remove('hidden')" class="group w-full md:w-auto bg-emerald-600 dark:bg-emerald-700 text-white px-8 py-4 rounded-2xl shadow-lg shadow-emerald-500/20 dark:shadow-emerald-900/30 hover:shadow-xl hover:scale-[1.02] active:scale-95 transition-all duration-300 flex items-center justify-center space-x-3 font-black uppercase tracking-widest text-[10px] border-b-4 border-emerald-800 dark:border-emerald-900">
                <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
                </svg>
                <span>Tambah Testimoni</span>
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
        <div class="overflow-x-auto dashboard-scroll" style="overflow-x: auto !important; -webkit-overflow-scrolling: touch;">
            <table class="w-full" style="min-width: 850px;">
                <thead class="bg-gradient-to-r from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 border-b-2 border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-6 py-5 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Nama Jamaah</th>
                        <th class="px-6 py-5 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest w-1/2">Keterangan</th>
                        <th class="px-6 py-5 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Rating</th>
                        <th class="px-6 py-5 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="px-6 py-5 text-center text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest sticky right-0 bg-gradient-to-r from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 z-10 border-l-2 border-slate-200 dark:border-slate-700 shadow-[-10px_0_15px_rgba(0,0,0,0.03)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.3)] w-[200px] min-w-[200px]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    @forelse($testimonials as $testimoni)
                    <tr class="hover:bg-gradient-to-r hover:from-amber-50/50 hover:to-orange-50/50 dark:hover:from-amber-900/10 dark:hover:to-orange-900/10 transition-all duration-200 row-group">
                        <td class="px-6 py-4 align-top">
                            <p class="font-black text-slate-800 dark:text-slate-100 row-group-hover:text-orange-600 dark:row-group-hover:text-orange-400 transition-colors">{{ $testimoni->name }}</p>
                            @if($testimoni->email)
                            <a href="mailto:{{ $testimoni->email }}" class="inline-flex items-center text-xs text-slate-400 dark:text-slate-500 hover:text-orange-500 dark:hover:text-orange-400 mt-1 gap-1 transition-colors">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                {{ $testimoni->email }}
                            </a>
                            @endif
                            @if($testimoni->product)
                            <span class="inline-block mt-2 px-2.5 py-1 bg-gradient-to-r from-amber-50 to-orange-50 dark:from-amber-900/30 dark:to-orange-900/30 text-amber-600 dark:text-amber-400 text-[10px] font-black uppercase tracking-widest rounded-lg border border-amber-200 dark:border-amber-800 shadow-sm hover:bg-gradient-to-r hover:from-amber-500 hover:to-orange-500 hover:text-white dark:hover:from-amber-600 dark:hover:to-orange-600 transition-all duration-200">
                                {{ $testimoni->product->name }}
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 align-top">
                            <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed font-medium line-clamp-3 italic">"{{ $testimoni->message }}"</p>
                            @if($testimoni->video_url)
                            <a href="{{ $testimoni->video_url }}" target="_blank" class="mt-2 inline-flex items-center text-xs font-bold text-red-500 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 hover:underline transition-colors">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                                Buka Link Video
                            </a>
                            @endif
                        </td>
                        <td class="px-6 py-4 align-top">
                            <div class="flex gap-0.5">
                                @for($i=1; $i<=5; $i++)
                                    @if($i <= $testimoni->rating)
                                        <svg class="w-4 h-4 text-yellow-400 drop-shadow-[0_0_3px_rgba(250,204,21,0.5)]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    @else
                                        <svg class="w-4 h-4 text-slate-300 dark:text-slate-600" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    @endif
                                @endfor
                            </div>
                        </td>
                        <td class="px-6 py-4 align-top">
                            <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-sm border-2 {{ $testimoni->status === 'published' ? 'bg-gradient-to-r from-emerald-50 to-green-50 dark:from-emerald-900/20 dark:to-green-900/10 text-emerald-600 dark:text-emerald-400 border-emerald-200 dark:border-emerald-800 shadow-emerald-500/10' : 'bg-gradient-to-r from-slate-50 to-slate-100 dark:from-slate-800 dark:to-slate-700 text-slate-400 dark:text-slate-500 border-slate-200 dark:border-slate-600' }}">
                                @if($testimoni->status === 'published')
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5 shadow-[0_0_6px_rgba(16,185,129,0.5)] flex-shrink-0"></span>
                                @endif
                                {{ $testimoni->status === 'published' ? 'Tampil di Web' : 'Draft' }}
                            </span>
                        </td>
                        <td class="px-4 py-4 sticky right-0 bg-white dark:bg-slate-900 row-group-hover:bg-gradient-to-r row-group-hover:from-amber-50/50 row-group-hover:to-orange-50/50 dark:row-group-hover:from-amber-900/10 dark:row-group-hover:to-orange-900/10 transition-all duration-200 z-10 border-l-2 border-slate-100 dark:border-slate-800 shadow-[-10px_0_15px_rgba(0,0,0,0.03)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.3)] w-[200px] min-w-[200px]">
                            <div class="flex flex-col items-center gap-1.5">
                                @if($testimoni->email)
                                <button onclick="openReplyModal({{ $testimoni->id }}, '{{ addslashes($testimoni->name) }}', '{{ addslashes($testimoni->email) }}', '{{ addslashes(Str::limit($testimoni->message, 150)) }}')"
                                class="reply-group w-full inline-flex items-center justify-center px-3 py-2.5 bg-gradient-to-r from-blue-50 to-sky-50 dark:from-blue-900/30 dark:to-sky-900/30 text-blue-600 dark:text-blue-400 border border-blue-200 dark:border-blue-700 rounded-xl text-[10px] font-bold uppercase tracking-widest shadow-sm shadow-blue-500/10 dark:shadow-blue-700/20 hover:shadow-md hover:shadow-blue-500/20 dark:hover:shadow-blue-600/30 hover:scale-105 active:scale-95 transition-all duration-200 touch-manipulation">
                                    <svg class="w-3.5 h-3.5 mr-1 reply-group-hover:scale-110 reply-group-hover:-translate-y-0.5 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    Balas Email
                                </button>
                                @else
                                <span class="w-full inline-flex items-center justify-center px-3 py-2.5 bg-slate-50 dark:bg-slate-800/50 text-slate-400 dark:text-slate-500 rounded-xl text-[10px] font-bold uppercase tracking-widest border border-slate-200 dark:border-slate-700 cursor-not-allowed" title="Email tidak tersedia untuk testimoni ini">
                                    <svg class="w-3.5 h-3.5 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    Balas Email
                                </span>
                                @endif
                                <button onclick="openEditTestimonial({{ $testimoni->id }}, '{{ addslashes($testimoni->name) }}', '{{ $testimoni->email }}', '{{ $testimoni->product_id }}', '{{ addslashes($testimoni->message) }}', '{{ $testimoni->video_url }}', '{{ $testimoni->rating }}', '{{ $testimoni->status }}')"
                                        class="edit-group w-full inline-flex items-center justify-center px-3 py-2.5 bg-gradient-to-r from-amber-50 to-orange-50 dark:from-amber-900/30 dark:to-orange-900/30 text-amber-600 dark:text-amber-400 border border-amber-200 dark:border-amber-700 rounded-xl text-[10px] font-bold uppercase tracking-widest shadow-sm shadow-amber-500/10 dark:shadow-amber-700/20 hover:shadow-md hover:shadow-amber-500/20 dark:hover:shadow-amber-600/30 hover:scale-105 active:scale-95 transition-all duration-200 touch-manipulation">
                                    <svg class="w-3.5 h-3.5 mr-1 edit-group-hover:scale-110 edit-group-hover:rotate-12 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    Edit
                                </button>

                                <form id="delete-form-{{ $testimoni->id }}" method="POST" action="{{ route('testimonials.destroy', $testimoni) }}" class="w-full m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="openDeleteModal({{ $testimoni->id }})" class="delete-group w-full inline-flex items-center justify-center px-3 py-2.5 bg-gradient-to-r from-red-50 to-rose-50 dark:from-red-900/30 dark:to-rose-900/30 text-red-600 dark:text-red-400 border border-red-200 dark:border-red-700 rounded-xl text-[10px] font-bold uppercase tracking-widest shadow-sm shadow-red-500/10 dark:shadow-red-700/20 hover:shadow-md hover:shadow-red-500/20 dark:hover:shadow-red-600/30 hover:scale-105 active:scale-95 transition-all duration-200 touch-manipulation">
                                        <svg class="w-3.5 h-3.5 mr-1 delete-group-hover:scale-110 delete-group-hover:rotate-12 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-28 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-24 h-24 bg-gradient-to-br from-amber-50 to-orange-100 dark:from-amber-900/20 dark:to-orange-900/20 rounded-[3rem] shadow-xl flex items-center justify-center text-amber-300 dark:text-amber-600 mb-8 border-2 border-dashed border-amber-200 dark:border-amber-800">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                </div>
                                <h3 class="text-xl font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Tiada Testimoni</h3>
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
            <button type="button" onclick="document.getElementById('addTestimonialModal').classList.add('hidden')" class="flex-1 px-8 py-4 bg-red-50 dark:bg-red-900/30 text-red-500 dark:text-red-400 border-2 border-red-200 dark:border-red-800 rounded-2xl shadow-sm hover:bg-red-100 dark:hover:bg-red-900/50 hover:shadow-md hover:shadow-red-500/10 dark:hover:shadow-red-900/30 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-red-400/20 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation">Batal</button>
            <button type="submit" class="flex-1 px-8 py-4 bg-gradient-to-r from-orange-400 to-pink-500 dark:from-orange-500 dark:to-pink-600 text-white rounded-2xl shadow-md shadow-orange-500/20 dark:shadow-orange-700/30 hover:shadow-lg hover:shadow-orange-500/40 dark:hover:shadow-orange-600/50 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-orange-400/50 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation border-2 border-orange-400/50 dark:border-orange-500/50 hover:border-orange-300 dark:hover:border-orange-400">Simpan Testimoni</button>
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
                <button type="button" onclick="document.getElementById('editTestimonialModal').classList.add('hidden')" class="flex-1 px-8 py-4 bg-red-50 dark:bg-red-900/30 text-red-500 dark:text-red-400 border-2 border-red-200 dark:border-red-800 rounded-2xl shadow-sm hover:bg-red-100 dark:hover:bg-red-900/50 hover:shadow-md hover:shadow-red-500/10 dark:hover:shadow-red-900/30 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-red-400/20 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation">Batal</button>
                <button type="submit" class="flex-1 px-8 py-4 bg-gradient-to-r from-violet-500 to-purple-500 dark:from-violet-600 dark:to-purple-600 text-white rounded-2xl shadow-md shadow-violet-500/20 dark:shadow-violet-700/30 hover:shadow-lg hover:shadow-violet-500/40 dark:hover:shadow-violet-600/50 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-violet-400/50 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation border-2 border-violet-400/50 dark:border-violet-500/50 hover:border-violet-300 dark:hover:border-violet-400">Simpan Perubahan</button>
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
                <button type="button" onclick="document.getElementById('replyEmailModal').classList.add('hidden')" class="flex-1 px-4 py-4 bg-red-50 dark:bg-red-900/30 text-red-500 dark:text-red-400 border-2 border-red-200 dark:border-red-800 rounded-2xl shadow-sm hover:bg-red-100 dark:hover:bg-red-900/50 hover:shadow-md hover:shadow-red-500/10 dark:hover:shadow-red-900/30 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-red-400/20 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation">Batal</button>
                <button type="submit" id="submitReplyBtn" class="group flex-1 px-4 py-4 bg-gradient-to-r from-blue-500 to-sky-500 dark:from-blue-600 dark:to-sky-600 text-white rounded-2xl shadow-md shadow-blue-500/20 dark:shadow-blue-700/30 hover:shadow-lg hover:shadow-blue-500/40 dark:hover:shadow-blue-600/50 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-blue-400/50 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation border-2 border-blue-400/50 dark:border-blue-500/50 hover:border-blue-300 dark:hover:border-blue-400 flex items-center justify-center gap-2">
                    <svg id="replySubmitIcon" class="w-4 h-4 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform duration-300 pointer-events-none drop-shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                    <span id="replySubmitText" class="group-hover:tracking-[0.2em] transition-all duration-200">Kirim Balasan</span>
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
                <button onclick="executeDelete()" class="group w-full py-4 bg-gradient-to-r from-red-500 to-rose-500 dark:from-red-600 dark:to-rose-600 text-white rounded-2xl shadow-md shadow-red-500/20 dark:shadow-red-700/30 hover:shadow-lg hover:shadow-red-500/40 dark:hover:shadow-red-600/50 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-red-400/50 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation border-2 border-red-400/50 dark:border-red-500/50 hover:border-red-300 dark:hover:border-red-400 hover:animate-shake">Ya, Hapus Sekarang</button>
                <button onclick="closeDeleteModal()" class="w-full py-4 bg-red-50 dark:bg-red-900/30 text-red-500 dark:text-red-400 border-2 border-red-200 dark:border-red-800 rounded-2xl shadow-sm hover:bg-red-100 dark:hover:bg-red-900/50 hover:shadow-md hover:shadow-red-500/10 dark:hover:shadow-red-900/30 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-red-400/20 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation">Batalkan</button>
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
