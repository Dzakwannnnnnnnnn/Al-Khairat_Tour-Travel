@extends('layouts.layout')

@section('title', 'Tambah Slideshow')

@section('content')
<!-- Page Header -->
<div class="mb-8">
    <div class="flex items-center gap-4 mb-4">
        <a href="{{ route('slideshow.index') }}" class="inline-flex items-center justify-center w-10 h-10 rounded-lg hover:bg-slate-100 transition-colors duration-200">
            <svg class="w-6 h-6 text-charcoal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <div>
            <h1 class="text-3xl md:text-4xl font-bold text-charcoal">Tambah Slideshow Baru</h1>
            <p class="text-text/60 mt-1">Buat slideshow baru untuk halaman utama</p>
        </div>
    </div>
</div>

<!-- Form Card -->
<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden">
        <form method="POST" action="{{ route('slideshow.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Image Section -->
            <div class="p-8 border-b border-slate-200">
                <h2 class="text-xl font-bold text-charcoal mb-6">📸 Gambar Slideshow</h2>
                
                <!-- Tabs -->
                <div class="flex gap-0 mb-6 border-b border-slate-200">
                    <button type="button" class="tab-btn flex-1 px-4 py-3 text-center font-semibold transition-all duration-200 border-b-2 border-orange text-orange" data-tab="local">
                        📁 Upload File
                    </button>
                    <button type="button" class="tab-btn flex-1 px-4 py-3 text-center font-semibold transition-all duration-200 border-b-2 border-transparent text-text/60 hover:text-text" data-tab="url">
                        🔗 URL Eksternal
                    </button>
                </div>

                <!-- Local Upload Tab -->
                <div class="tab-content" id="tab-local">
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-charcoal mb-3">Pilih Gambar</label>
                        <div class="relative">
                            <input type="file" class="sr-only" name="image" id="image" accept="image/*" onchange="previewImage(this)">
                            <label for="image" class="flex flex-col items-center justify-center w-full p-8 border-2 border-dashed border-slate-300 rounded-lg cursor-pointer hover:border-orange hover:bg-orange/5 transition-all duration-200">
                                <svg class="w-12 h-12 text-slate-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-center">
                                    <span class="font-semibold text-orange">Klik untuk upload</span><br>
                                    <span class="text-sm text-text/60">atau drag & drop gambar di sini</span>
                                </p>
                                <p class="text-xs text-text/40 mt-3">Format: JPG, PNG, GIF • Max 5MB</p>
                            </label>
                        </div>
                        @error('image')
                            <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <!-- Image Preview -->
                    <div id="image-preview" class="hidden">
                        <p class="text-sm font-semibold text-text/60 mb-3">Preview:</p>
                        <div class="relative w-full max-w-xs mx-auto">
                            <img id="preview-img" src="" alt="Preview" class="w-full rounded-lg shadow-md border border-slate-200">
                            <button type="button" onclick="clearImagePreview()" class="absolute top-2 right-2 p-1 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- URL Tab -->
                <div class="tab-content hidden" id="tab-url">
                    <div>
                        <label class="block text-sm font-semibold text-charcoal mb-3">URL Gambar</label>
                        <input type="url" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange focus:border-transparent @error('image_url') border-red-500 @enderror" 
                               name="image_url" placeholder="https://example.com/image.jpg" value="{{ old('image_url') }}">
                        @error('image_url')
                            <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Details Section -->
            <div class="p-8 border-b border-slate-200">
                <h2 class="text-xl font-bold text-charcoal mb-6">📝 Detail Slideshow</h2>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-semibold text-charcoal mb-2">Judul (Opsional)</label>
                        <input type="text" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange focus:border-transparent @error('title') border-red-500 @enderror" 
                               name="title" placeholder="Contoh: Destinasi Indah" value="{{ old('title') }}">
                        @error('title')
                            <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-charcoal mb-2">Deskripsi (Opsional)</label>
                        <textarea class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange focus:border-transparent resize-none @error('description') border-red-500 @enderror" 
                                  name="description" rows="4" placeholder="Deskripsi singkat tentang slideshow ini...">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-lg border border-slate-200">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="w-5 h-5 text-orange rounded focus:ring-2 focus:ring-orange">
                        <label for="is_active" class="font-semibold text-charcoal cursor-pointer">
                            Aktifkan Slideshow
                        </label>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="p-8 bg-slate-50 border-t border-slate-200 flex gap-3 justify-end">
                <a href="{{ route('slideshow.index') }}" class="px-6 py-3 text-charcoal font-semibold rounded-lg border border-slate-300 hover:bg-slate-100 transition-colors duration-200">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-sunset hover:shadow-lg text-white font-semibold rounded-lg transition-all duration-300 hover:scale-105">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Simpan Slideshow</span>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Tab switching
document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const tab = this.dataset.tab;
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        document.getElementById('tab-' + tab).classList.remove('hidden');
        
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('border-orange', 'text-orange'));
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.add('border-transparent', 'text-text/60'));
        this.classList.remove('border-transparent', 'text-text/60');
        this.classList.add('border-orange', 'text-orange');
    });
});

// Image preview
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-img').src = e.target.result;
            document.getElementById('image-preview').classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function clearImagePreview() {
    document.getElementById('image').value = '';
    document.getElementById('image-preview').classList.add('hidden');
}

// Drag and drop
const fileInput = document.getElementById('image');
const dropZone = document.querySelector('label[for="image"]');

['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, preventDefaults, false);
});

function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

['dragenter', 'dragover'].forEach(eventName => {
    dropZone.addEventListener(eventName, highlight, false);
});

['dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, unhighlight, false);
});

function highlight(e) {
    dropZone.classList.add('border-orange', 'bg-orange/5');
}

function unhighlight(e) {
    dropZone.classList.remove('border-orange', 'bg-orange/5');
}

dropZone.addEventListener('drop', handleDrop, false);

function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;
    fileInput.files = files;
    
    if (files && files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-img').src = e.target.result;
            document.getElementById('image-preview').classList.remove('hidden');
        };
        reader.readAsDataURL(files[0]);
    }
}
</script>

@endsection
