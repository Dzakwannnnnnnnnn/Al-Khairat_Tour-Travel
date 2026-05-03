@extends('layouts.layout')

@section('title', 'Tambah Slideshow')
@section('breadcrumb', 'Tambah Slideshow')

@section('content')
<!-- Page Header -->
<div class="mb-10 flex items-center gap-6">
    <a href="{{ route('slideshow.index') }}" class="group flex items-center justify-center w-14 h-14 bg-white dark:bg-slate-800/50 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-700 hover:bg-orange hover:border-orange transition-all duration-300">
        <svg class="w-6 h-6 text-slate-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
        </svg>
    </a>
    <div>
        <h1 class="text-3xl md:text-4xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-tight">Tambah <span class="text-orange">Slideshow</span></h1>
        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1 font-medium italic">Buat visual slideshow baru untuk beranda utama</p>
    </div>
</div>

<!-- Form Container -->
<div class="w-full min-w-0">
    <form method="POST" action="{{ route('slideshow.store') }}" enctype="multipart/form-data" class="space-y-8 w-full">
        @csrf
        
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/30 border-l-4 border-red-500 rounded-r-xl">
                <div class="flex items-center gap-3 mb-2">
                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="text-sm font-bold text-red-800 dark:text-red-300">Terdapat Kesalahan:</h3>
                </div>
                <ul class="list-disc list-inside text-xs text-red-700 dark:text-red-400 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex flex-col lg:flex-row gap-8 w-full">
            <!-- Left: Image Management -->
            <div class="flex-1 min-w-0 space-y-8">
                <div class="bg-white dark:bg-slate-800/50 rounded-[2.5rem] shadow-sm border border-slate-100 dark:border-slate-700 overflow-hidden">
                    <div class="p-8 border-b border-slate-50 dark:border-slate-800">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-12 h-12 bg-orange/10 dark:bg-orange/20 text-orange rounded-2xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <h2 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-tight">Visual Slideshow</h2>
                        </div>

                        <!-- Upload Tabs -->
                        <div class="flex p-1 bg-slate-50 dark:bg-slate-900/50 rounded-2xl mb-8 border border-slate-100 dark:border-slate-700 shadow-inner">
                            <button type="button" class="tab-btn flex-1 px-6 py-3 rounded-xl font-black text-[10px] uppercase tracking-[0.2em] transition-all duration-300 bg-white dark:bg-slate-800 text-orange shadow-lg shadow-orange/10" data-tab="local">
                                File Lokal
                            </button>
                            <button type="button" class="tab-btn flex-1 px-6 py-3 rounded-xl font-black text-[10px] uppercase tracking-[0.2em] transition-all duration-300 text-slate-400 dark:text-slate-500 hover:text-slate-600 dark:hover:text-slate-300" data-tab="url">
                                URL Eksternal
                            </button>
                        </div>

                        <!-- Local Upload -->
                        <div class="tab-content" id="tab-local">
                            <div class="relative group">
                                <input type="file" class="sr-only" name="image" id="image" accept="image/*" onchange="previewImage(this)">
                                <label for="image" class="flex flex-col items-center justify-center w-full aspect-video border-4 border-dashed border-slate-200 dark:border-slate-700 rounded-[2.5rem] cursor-pointer hover:border-orange hover:bg-orange/5 dark:hover:bg-orange/10 transition-all duration-500">
                                    <div class="p-6 bg-slate-50 dark:bg-slate-900/50 rounded-3xl group-hover:bg-white dark:group-hover:bg-slate-800 transition-colors shadow-sm">
                                        <svg class="w-10 h-10 text-slate-300 group-hover:text-orange transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                    </div>
                                    <p class="mt-6 text-center">
                                        <span class="block font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest text-[11px]">Pilih Visual Utama</span>
                                        <span class="text-[10px] text-slate-400 dark:text-slate-500 font-medium italic mt-2 block">Klik atau tarik gambar ke area ini</span>
                                    </p>
                                </label>
                            </div>
                            
                            <!-- Dynamic Preview (16:9) -->
                            <div id="image-preview" class="hidden mt-8">
                                <p class="text-[10px] font-black text-orange uppercase tracking-widest mb-4 flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-orange animate-pulse"></span>
                                    Preview Tampilan (16:9)
                                </p>
                                <div class="relative aspect-video w-full rounded-[2rem] overflow-hidden shadow-2xl border-4 border-orange/20">
                                    <img id="preview-img" src="" alt="Preview" class="w-full h-full object-cover">
                                    <button type="button" onclick="clearImagePreview()" class="absolute top-4 right-4 p-3 bg-red-600 text-white rounded-xl hover:bg-red-700 transition-all shadow-xl">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- URL Tab -->
                        <div class="tab-content hidden" id="tab-url">
                            <div class="relative">
                                <input type="url" name="image_url" placeholder="https://example.com/slide.jpg" value="{{ old('image_url') }}"
                                       class="w-full px-8 py-5 bg-slate-50 dark:bg-slate-900/50 border-2 border-transparent focus:border-orange focus:bg-white dark:focus:bg-slate-800 rounded-2xl outline-none transition-all text-sm font-medium dark:text-slate-200">
                                <div class="mt-4 p-4 bg-blue-50 dark:bg-blue-900/10 rounded-xl border border-blue-100 dark:border-blue-900/30">
                                    <p class="text-[10px] text-blue-600 dark:text-blue-400 font-bold uppercase tracking-widest leading-relaxed">Pastikan URL memiliki akses publik dan rasio yang lebar (Widescreen) agar tidak terpotong.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Content & Metadata -->
            <div class="lg:w-5/12 flex-shrink-0 space-y-8">
                <div class="bg-white dark:bg-slate-800/50 rounded-[2.5rem] shadow-sm border border-slate-100 dark:border-slate-700 p-8">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-blue-50 dark:bg-blue-900/20 text-blue-500 rounded-2xl flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </div>
                        <h2 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-tight">Detail Konten</h2>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-3">Judul (Opsional)</label>
                            <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Promo Ramadhan"
                                   class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900/50 border-2 border-transparent focus:border-orange focus:bg-white dark:focus:bg-slate-800 rounded-2xl outline-none transition-all text-sm font-bold dark:text-slate-200">
                        </div>

                        <div>
                            <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-3">Deskripsi (Opsional)</label>
                            <textarea name="description" rows="4" placeholder="Teks yang akan muncul di atas slideshow..."
                                      class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900/50 border-2 border-transparent focus:border-orange focus:bg-white dark:focus:bg-slate-800 rounded-2xl outline-none transition-all text-sm font-medium dark:text-slate-200 resize-none">{{ old('description') }}</textarea>
                        </div>

                        <div class="flex items-center gap-3 p-4 bg-slate-50 dark:bg-slate-900/50 rounded-2xl border-2 border-transparent">
                            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                                   class="w-5 h-5 text-orange bg-white dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg focus:ring-orange">
                            <label for="is_active" class="text-xs font-black text-slate-700 dark:text-slate-300 uppercase tracking-tight cursor-pointer">Langsung Aktifkan</label>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="bg-white dark:bg-slate-800/50 rounded-[2.5rem] shadow-lg shadow-slate-200/50 dark:shadow-slate-950/50 border border-slate-100 dark:border-slate-700 p-8 flex flex-col gap-4">
                    <button type="submit" class="group w-full inline-flex items-center justify-center gap-3 px-8 py-5 bg-gradient-to-r from-orange-400 to-pink-500 dark:from-orange-500 dark:to-pink-600 text-white font-black rounded-2xl shadow-md shadow-orange-500/20 dark:shadow-orange-700/30 hover:shadow-lg hover:shadow-orange-500/40 dark:hover:shadow-orange-600/50 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-orange-400/50 transition-all duration-200 uppercase tracking-widest text-xs touch-manipulation border-2 border-orange-400/50 dark:border-orange-500/50 hover:border-orange-300 dark:hover:border-orange-400">
                        <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-300 pointer-events-none drop-shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span class="group-hover:tracking-[0.2em] transition-all duration-200">Simpan Slideshow</span>
                    </button>
                    <a href="{{ route('slideshow.index') }}" class="group w-full inline-flex items-center justify-center px-8 py-5 bg-red-50 dark:bg-red-900/30 text-red-500 dark:text-red-400 font-black rounded-2xl shadow-sm border-2 border-red-200 dark:border-red-800 hover:bg-red-100 dark:hover:bg-red-900/50 hover:shadow-md hover:shadow-red-500/10 dark:hover:shadow-red-900/30 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-red-400/20 transition-all duration-200 uppercase tracking-widest text-[10px] touch-manipulation">
                        <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/></svg>
                        Batalkan
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
// Tab switching
document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const tab = this.dataset.tab;
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        document.getElementById('tab-' + tab).classList.remove('hidden');
        
        document.querySelectorAll('.tab-btn').forEach(b => {
            b.classList.remove('bg-white', 'dark:bg-slate-800', 'text-orange', 'shadow-lg', 'shadow-orange/10');
            b.classList.add('text-slate-400', 'dark:text-slate-500');
        });
        
        this.classList.remove('text-slate-400', 'dark:text-slate-500');
        this.classList.add('bg-white', 'dark:bg-slate-800', 'text-orange', 'shadow-lg', 'shadow-orange/10');
    });
});

// Image preview
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-img').src = e.target.result;
            document.getElementById('image-preview').classList.remove('hidden');
            document.getElementById('image-preview').scrollIntoView({ behavior: 'smooth' });
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function clearImagePreview() {
    document.getElementById('image').value = '';
    document.getElementById('image-preview').classList.add('hidden');
}

// Drag and drop
const dropZone = document.querySelector('label[for="image"]');
if (dropZone) {
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, e => { e.preventDefault(); e.stopPropagation(); }, false);
    });

    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => dropZone.classList.add('border-orange', 'bg-orange/5'), false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => dropZone.classList.remove('border-orange', 'bg-orange/5'), false);
    });

    dropZone.addEventListener('drop', e => {
        const files = e.dataTransfer.files;
        document.getElementById('image').files = files;
        previewImage(document.getElementById('image'));
    }, false);
}
</script>

@endsection
