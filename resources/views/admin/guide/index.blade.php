@extends('layouts.layout')

@section('title', 'Kelola Panduan & Manasik')

@section('content')
<!-- Page Header -->
<div class="mb-8">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl md:text-4xl font-bold text-charcoal mb-2">Kelola Panduan & Manasik</h1>
            <p class="text-text/60">Kelola semua panduan dan manasik untuk umrah dan haji</p>
        </div>
        <a href="{{ route('guides.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-sunset hover:shadow-lg text-white font-semibold rounded-lg transition-all duration-300 hover:scale-105">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span>Tambah Panduan</span>
        </a>
    </div>
</div>

<!-- Success Message -->
@if($message = Session::get('success'))
    <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 rounded-lg flex items-start gap-3">
        <svg class="w-6 h-6 text-emerald-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        <div class="flex-1">
            <p class="font-semibold text-emerald-800">{{ $message }}</p>
        </div>
        <button onclick="this.parentElement.style.display='none'" class="text-emerald-500 hover:text-emerald-700">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
@endif

<!-- Guides Table Card -->
<div class="bg-white rounded-xl shadow-lg overflow-hidden border border-slate-200">
    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-slate-50 to-slate-100 border-b border-slate-200">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-bold text-charcoal w-12">#</th>
                    <th class="px-6 py-4 text-left text-sm font-bold text-charcoal">Panduan</th>
                    <th class="px-6 py-4 text-left text-sm font-bold text-charcoal">Kategori</th>
                    <th class="px-6 py-4 text-left text-sm font-bold text-charcoal">Deskripsi</th>
                    <th class="px-6 py-4 text-center text-sm font-bold text-charcoal w-20">Urutan</th>
                    <th class="px-6 py-4 text-center text-sm font-bold text-charcoal w-24">Status</th>
                    <th class="px-6 py-4 text-center text-sm font-bold text-charcoal w-16">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200">
                @forelse($guides as $key => $guide)
                <tr class="hover:bg-slate-50/50 transition-colors duration-200">
                    <td class="px-6 py-4 text-sm text-text/70 font-medium">{{ $key + 1 }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="text-2xl">{{ $guide->icon }}</div>
                            <div>
                                <p class="font-semibold text-charcoal">{{ $guide->title }}</p>
                                <p class="text-xs text-text/50">{{ $guide->slug }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex px-3 py-1 bg-blue-100 text-blue-700 text-sm font-semibold rounded-full capitalize">
                            {{ $guide->category }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-sm text-text/70 line-clamp-2">{{ $guide->description }}</p>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex px-3 py-1 bg-purple-100 text-purple-700 text-sm font-semibold rounded-full">
                            {{ $guide->order }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <form action="{{ route('guides.toggle-active', $guide) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="inline-flex px-3 py-1 rounded-full text-sm font-semibold transition-all duration-200 hover:shadow-md {{ $guide->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-600' }}">
                                {{ $guide->is_active ? '✓ Aktif' : '○ Nonaktif' }}
                            </button>
                        </form>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('guides.edit', $guide) }}" 
                               class="inline-flex items-center justify-center w-8 h-8 text-orange hover:bg-orange/10 rounded-lg transition-colors duration-200" 
                               title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>
                            <form action="{{ route('guides.destroy', $guide) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus panduan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center justify-center w-8 h-8 text-red-500 hover:bg-red-50 rounded-lg transition-colors duration-200" 
                                        title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center gap-3">
                            <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <p class="text-text/50 font-medium">Belum ada data panduan</p>
                            <p class="text-text/40 text-sm">Klik "Tambah Panduan" untuk membuat yang baru</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($guides->hasPages())
    <div class="px-6 py-4 border-t border-slate-200">
        {{ $guides->links() }}
    </div>
    @endif
</div>

<!-- Stats Footer (Optional) -->
<div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-4">
    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg p-4 border border-blue-200">
        <p class="text-blue-600 text-sm font-semibold">Total Panduan</p>
        <p class="text-2xl font-bold text-blue-700 mt-1">{{ \App\Models\Guide::count() }}</p>
    </div>
    <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-lg p-4 border border-emerald-200">
        <p class="text-emerald-600 text-sm font-semibold">Aktif</p>
        <p class="text-2xl font-bold text-emerald-700 mt-1">{{ \App\Models\Guide::where('is_active', true)->count() }}</p>
    </div>
    <div class="bg-gradient-to-br from-slate-50 to-slate-100 rounded-lg p-4 border border-slate-200">
        <p class="text-slate-600 text-sm font-semibold">Nonaktif</p>
        <p class="text-2xl font-bold text-slate-700 mt-1">{{ \App\Models\Guide::where('is_active', false)->count() }}</p>
    </div>
</div>

@endsection
