@extends('layouts.layout')

@section('title', 'Edit Panduan - ' . $guide->title)
@section('breadcrumb', 'Edit Panduan')

@section('content')
<!-- Page Header -->
<div class="mb-8">
    <div class="flex items-center gap-4 mb-4">
        <a href="{{ route('guides.admin-index') }}" class="inline-flex items-center justify-center w-10 h-10 rounded-lg hover:bg-slate-100 transition-colors duration-200">
            <svg class="w-6 h-6 text-charcoal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <div>
            <h1 class="text-3xl md:text-4xl font-bold text-charcoal">Edit Panduan</h1>
            <p class="text-text/60 mt-1">{{ $guide->title }}</p>
        </div>
    </div>
</div>

<!-- Form Card -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden">
            <form method="POST" action="{{ route('guides.update', $guide) }}">
                @csrf
                @method('PUT')

                <!-- Basic Info Section -->
                <div class="p-8 border-b border-slate-200">
                    <h2 class="text-xl font-bold text-charcoal mb-6">📋 Informasi Dasar</h2>

                    <div class="space-y-5">
                        <!-- Category -->
                        <div>
                            <label class="block text-sm font-semibold text-charcoal mb-2">Kategori <span class="text-red-500">*</span></label>
                            <select name="category" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange focus:border-transparent @error('category') border-red-500 @enderror">
                                <option value="">Contoh: Tata Cara, Doa, Perlengkapan</option>
                                <option value="umrah" {{ (old('category') ?? $guide->category) == 'umrah' ? 'selected' : '' }}>Umrah</option>
                                <option value="haji" {{ (old('category') ?? $guide->category) == 'haji' ? 'selected' : '' }}>Haji</option>
                            </select>
                            @error('category')
                                <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        <!-- Slug -->
                        <div>
                            <label class="block text-sm font-semibold text-charcoal mb-2">Slug (Identifier)</label>
                            <input type="text" name="slug" placeholder="dokumen, checklist, tata-cara, faq, doa, tips" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange focus:border-transparent @error('slug') border-red-500 @enderror" value="{{ old('slug') ?? $guide->slug }}">
                            <p class="text-xs text-text/60 mt-2">Gunakan huruf kecil dan strip(-) sebagai pemisah</p>
                            @error('slug')
                                <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        <!-- Title -->
                        <div>
                            <label class="block text-sm font-semibold text-charcoal mb-2">Judul</label>
                            <input type="text" name="title" placeholder="Contoh: Dokumen Perjalanan Umrah" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange focus:border-transparent @error('title') border-red-500 @enderror" value="{{ old('title') ?? $guide->title }}">
                            @error('title')
                                <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        <!-- Badge -->
                        <div>
                            <label class="block text-sm font-semibold text-charcoal mb-2">Badge</label>
                            <input type="text" name="badge" placeholder="DOKUMEN, CHECKLIST, TATA CARA, FAQ, DO'A, TIPS" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange focus:border-transparent @error('badge') border-red-500 @enderror" value="{{ old('badge') ?? $guide->badge }}">
                            @error('badge')
                                <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        <!-- Icon -->
                        <div>
                            <label class="block text-sm font-semibold text-charcoal mb-2">Icon (Emoji)</label>
                            <input type="text" name="icon" placeholder="✈️, 📋, 🕌, ❓, 🤲, 💡" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange focus:border-transparent @error('icon') border-red-500 @enderror" value="{{ old('icon') ?? $guide->icon }}">
                            @error('icon')
                                <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-sm font-semibold text-charcoal mb-2">Deskripsi Singkat</label>
                            <textarea name="description" rows="3" placeholder="Deskripsi singkat tentang panduan ini (maks 500 karakter)" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange focus:border-transparent resize-none @error('description') border-red-500 @enderror">{{ old('description') ?? $guide->description }}</textarea>
                            @error('description')
                                <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        <!-- Overview -->
                        <div>
                            <label class="block text-sm font-semibold text-charcoal mb-2">Gambaran Umum</label>
                            <textarea name="overview" rows="5" placeholder="Penjelasan lengkap tentang panduan ini" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange focus:border-transparent resize-none @error('overview') border-red-500 @enderror">{{ old('overview') ?? $guide->overview }}</textarea>
                            @error('overview')
                                <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- JSON Content Section -->
                <div class="p-8 border-b border-slate-200">
                    <h2 class="text-xl font-bold text-charcoal mb-4">📝 Konten (JSON)</h2>
                    <p class="text-sm text-text/60 mb-6">Format data dalam JSON. Tinggalkan kosong jika tidak diperlukan.</p>

                    <div class="space-y-5">
                        <!-- Key Points -->
                        <div>
                            <label class="block text-sm font-semibold text-charcoal mb-2">Poin Penting (JSON Array)</label>
                            <textarea name="key_points" rows="4" placeholder='[{"title": "Poin 1", "description": "Deskripsi poin 1"}, {"title": "Poin 2", "description": "Deskripsi poin 2"}]' class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange focus:border-transparent resize-none font-mono text-xs @error('key_points') border-red-500 @enderror">@if(old('key_points')){{ json_encode(json_decode(old('key_points')), JSON_PRETTY_PRINT) }}@elseif($guide->key_points){{ json_encode($guide->key_points, JSON_PRETTY_PRINT) }}@endif</textarea>
                            @error('key_points')
                                <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        <!-- Sections -->
                        <div>
                            <label class="block text-sm font-semibold text-charcoal mb-2">Bagian/Seksi (JSON Array)</label>
                            <textarea name="sections" rows="6" placeholder='[{"heading": "Judul Seksi", "content": "Deskripsi", "items": ["Item 1", "Item 2"]}]' class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange focus:border-transparent resize-none font-mono text-xs @error('sections') border-red-500 @enderror">@if(old('sections')){{ json_encode(json_decode(old('sections')), JSON_PRETTY_PRINT) }}@elseif($guide->sections){{ json_encode($guide->sections, JSON_PRETTY_PRINT) }}@endif</textarea>
                            @error('sections')
                                <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        <!-- Tips -->
                        <div>
                            <label class="block text-sm font-semibold text-charcoal mb-2">Tips (JSON Array)</label>
                            <textarea name="tips" rows="4" placeholder='["Tip 1", "Tip 2", "Tip 3"]' class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange focus:border-transparent resize-none font-mono text-xs @error('tips') border-red-500 @enderror">@if(old('tips')){{ json_encode(json_decode(old('tips')), JSON_PRETTY_PRINT) }}@elseif($guide->tips){{ json_encode($guide->tips, JSON_PRETTY_PRINT) }}@endif</textarea>
                            @error('tips')
                                <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-lg">
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Status Section -->
                <div class="p-8">
                    <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-lg border border-slate-200">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ (old('is_active') ?? $guide->is_active) ? 'checked' : '' }} class="w-5 h-5 text-orange rounded focus:ring-2 focus:ring-orange">
                        <label for="is_active" class="font-semibold text-charcoal cursor-pointer">
                            Aktifkan Panduan
                        </label>
                    </div>
                </div>

                <!-- Footer -->
                <div class="p-8 bg-slate-50 border-t border-slate-200 flex gap-3 justify-between">
                    <form method="POST" action="{{ route('guides.destroy', $guide) }}" class="inline" onsubmit="return confirm('Yakin ingin menghapus panduan ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-6 py-3 text-red-600 font-semibold rounded-lg border border-red-300 hover:bg-red-50 transition-colors duration-200">
                            Hapus
                        </button>
                    </form>
                    <div class="flex gap-3">
                        <a href="{{ route('guides.admin-index') }}" class="px-6 py-3 text-charcoal font-semibold rounded-lg border border-slate-300 hover:bg-slate-100 transition-colors duration-200">
                            Batal
                        </a>
                        <button type="submit" class="inline-flex items-center gap-2 px-8 py-4 bg-emerald-600 dark:bg-emerald-700 text-white font-black rounded-2xl shadow-lg shadow-emerald-500/20 dark:shadow-emerald-900/30 hover:shadow-xl hover:scale-[1.02] active:scale-95 transition-all duration-300 border-b-4 border-emerald-800 dark:border-emerald-900 uppercase tracking-widest text-[10px]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Perbarui Panduan</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Sidebar: Info & Preview -->
    <div class="space-y-4">
        <!-- Current Info Card -->
        <div class="bg-slate-50 border border-slate-200 rounded-lg p-4">
            <h3 class="font-bold text-charcoal mb-3">ℹ️ Informasi Panduan</h3>
            <div class="space-y-2 text-sm">
                <div>
                    <p class="text-text/60">Kategori:</p>
                    <p class="font-semibold text-charcoal capitalize">{{ $guide->category }}</p>
                </div>
                <div>
                    <p class="text-text/60">Slug:</p>
                    <p class="font-mono text-sm">{{ $guide->slug }}</p>
                </div>
                <div>
                    <p class="text-text/60">Status:</p>
                    <p class="font-semibold {{ $guide->is_active ? 'text-green-600' : 'text-red-600' }}">
                        {{ $guide->is_active ? '✓ Aktif' : '✗ Nonaktif' }}
                    </p>
                </div>
                <div>
                    <p class="text-text/60">Urutan:</p>
                    <p class="font-semibold text-charcoal">#{{ $guide->order }}</p>
                </div>
            </div>
        </div>

        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
            <h3 class="font-bold text-blue-900 mb-3">📖 Format JSON</h3>
            <div class="text-xs text-blue-900 space-y-3">
                <div>
                    <p class="font-semibold">Key Points:</p>
                    <code class="block bg-white p-2 rounded mt-1 overflow-auto">
[
  {
    "title": "Judul",
    "description": "Deskripsi"
  }
]
                    </code>
                </div>
                <div>
                    <p class="font-semibold">Sections:</p>
                    <code class="block bg-white p-2 rounded mt-1 overflow-auto text-xs">
[
  {
    "heading": "Judul",
    "content": "Isi",
    "items": ["Item 1"]
  }
]
                    </code>
                </div>
            </div>
        </div>

        <div class="bg-amber-50 border border-amber-200 rounded-lg p-4">
            <h3 class="font-bold text-amber-900 mb-2">💡 Tips</h3>
            <ul class="text-xs text-amber-900 space-y-2">
                <li>• Pastikan JSON valid sebelum submit</li>
                <li>• Gunakan double quotes untuk string</li>
                <li>• Array dimulai dengan [ dan diakhiri ]</li>
                <li>• Cek format di jsonlint.com</li>
            </ul>
        </div>
    </div>
</div>

@endsection
