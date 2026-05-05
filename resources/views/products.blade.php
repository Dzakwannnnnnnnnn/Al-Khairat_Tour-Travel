@extends('layouts.layout')

@section('title', 'Paket Umroh - Al-Khairat')
@section('breadcrumb', 'Manajemen Paket')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="bg-white dark:bg-slate-800/50 rounded-[2.5rem] p-8 shadow-sm border border-slate-100 dark:border-slate-700 backdrop-blur-md mb-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                <div class="flex items-center space-x-6">
                    <div class="p-4 bg-emerald-500/10 text-emerald-500 rounded-2xl hidden md:block">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl md:text-3xl font-black text-slate-800 dark:text-slate-100 leading-tight tracking-tight">Paket Umroh</h1>
                        <p class="text-sm md:text-base text-slate-400 dark:text-slate-500 font-medium mt-1">Kelola semua paket umroh Al-Khairat</p>
                    </div>
                </div>
                <button onclick="document.getElementById('addProductModal').classList.remove('hidden')" class="group w-full md:w-auto bg-emerald-600 dark:bg-emerald-700 text-white px-8 py-4 rounded-2xl shadow-lg shadow-emerald-500/20 dark:shadow-emerald-900/30 hover:shadow-xl hover:scale-[1.02] active:scale-95 transition-all duration-300 flex items-center justify-center space-x-3 font-black uppercase tracking-widest text-[10px] border-b-4 border-emerald-800 dark:border-emerald-900">
                    <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Tambah Paket</span>
                </button>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-900 rounded-[1.5rem] shadow-sm p-3 md:p-6 mb-8 border border-slate-100 dark:border-slate-800">
            <form method="GET" action="{{ route('products.index') }}" id="filter-form" class="grid grid-cols-2 md:grid-cols-3 gap-2 md:gap-6">
                <select name="category" class="border border-slate-200 dark:border-slate-700 rounded-xl px-3 py-2.5 md:py-2.5 focus:outline-none focus:ring-2 focus:ring-orange/20 focus:border-orange bg-slate-50/50 dark:bg-slate-800/50 text-[11px] md:text-sm text-slate-700 dark:text-slate-200">
                    <option value="">Semua Kategori</option>
                    <option value="Standar" {{ request('category') == 'Standar' ? 'selected' : '' }}>Standar</option>
                    <option value="Premium" {{ request('category') == 'Premium' ? 'selected' : '' }}>Premium</option>
                    <option value="Ekonomis" {{ request('category') == 'Ekonomis' ? 'selected' : '' }}>Ekonomis</option>
                </select>
                <select name="status" class="border border-slate-200 dark:border-slate-700 rounded-xl px-3 py-2.5 md:py-2.5 focus:outline-none focus:ring-2 focus:ring-orange/20 focus:border-orange bg-slate-50/50 dark:bg-slate-800/50 text-[11px] md:text-sm text-slate-700 dark:text-slate-200">
                    <option value="">Semua Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                <button type="submit" class="col-span-2 md:col-span-1 bg-gradient-to-r from-amber-50 to-orange-50 dark:from-amber-900/20 dark:to-orange-900/20 text-amber-600 dark:text-amber-400 font-black rounded-xl shadow-sm shadow-amber-500/10 dark:shadow-amber-700/20 hover:shadow-md hover:shadow-amber-500/30 dark:hover:shadow-amber-600/40 hover:scale-[1.02] active:scale-95 transition-all duration-200 px-4 py-3 md:py-2.5 border-2 border-amber-300 dark:border-amber-700 hover:border-amber-400 dark:hover:border-amber-500 hover:bg-gradient-to-r hover:from-amber-500 hover:to-orange-500 dark:hover:from-amber-600 dark:hover:to-orange-600 hover:text-white uppercase tracking-widest text-[10px] touch-manipulation">
                    Terapkan Filter
                </button>
            </form>
        </div>


        <!-- Products Table -->
        <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] shadow-lg shadow-slate-200/50 dark:shadow-slate-950/50 border border-slate-100 dark:border-slate-800 overflow-hidden">
            <div class="overflow-x-auto dashboard-scroll" style="overflow-x: auto !important; -webkit-overflow-scrolling: touch;">
                <table class="w-full" style="min-width: 850px;">
                    <thead class="bg-gradient-to-r from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 border-b-2 border-slate-200 dark:border-slate-700">
                        <tr>
                            <th class="px-6 py-4 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Gambar</th>
                            <th class="px-6 py-4 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Nama Paket</th>
                            <th class="px-6 py-4 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Kategori</th>
                            <th class="px-6 py-4 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Harga Dasar</th>
                            <th class="px-6 py-4 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Durasi</th>
                            <th class="px-6 py-4 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Keberangkatan</th>
                            <th class="px-6 py-4 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Sisa</th>
                            <th class="px-6 py-4 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Status</th>
                            <th class="px-4 py-4 text-center text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest sticky right-0 bg-gradient-to-r from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 z-10 border-l-2 border-slate-200 dark:border-slate-700 shadow-[-10px_0_15px_rgba(0,0,0,0.03)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.3)] w-[140px] min-w-[140px]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                        @forelse($products as $product)
                        <tr class="hover:bg-gradient-to-r hover:from-orange-50/50 hover:to-pink-50/50 dark:hover:from-orange-900/10 dark:hover:to-pink-900/10 transition-all duration-200 row-group">
                            <td class="px-6 py-4">
                                @if($product->image)
                                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-12 h-12 object-cover rounded-lg shadow-sm ring-2 ring-slate-100 dark:ring-slate-700 hover:scale-110 transition-transform duration-200">
                                @else
                                    <div class="w-12 h-12 bg-slate-100 dark:bg-slate-800 rounded-lg flex items-center justify-center text-[10px] text-slate-400 dark:text-slate-500 border-2 border-dashed border-slate-200 dark:border-slate-700 font-bold uppercase">Kosong</div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <p class="font-black text-slate-800 dark:text-slate-100 text-sm md:text-base leading-tight row-group-hover:text-orange-600 dark:row-group-hover:text-orange-400 transition-colors">{{ $product->name }}</p>
                                <p class="hidden md:block text-xs font-bold text-slate-400 dark:text-slate-500 mt-1 uppercase tracking-tight">{{ Str::limit($product->description, 50) }}</p>
                                <p class="md:hidden text-[10px] text-slate-400 dark:text-slate-500 italic">ID: #{{ $product->id }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-3 py-1.5 rounded-full text-[10px] md:text-xs font-bold uppercase tracking-wider shadow-sm
                                    {{ $product->category === 'Premium' ? 'bg-gradient-to-r from-yellow-100 to-amber-100 text-yellow-800 border border-yellow-300' :
                                    ($product->category === 'Standar' ? 'bg-gradient-to-r from-blue-100 to-sky-100 text-blue-800 border border-blue-300' : 'bg-gradient-to-r from-gray-100 to-slate-100 text-gray-800 border border-gray-300') }}">
                                    {{ $product->category }}
                                </span>
                            </td>
                            <td class="px-6 py-4 font-black text-slate-800 dark:text-white text-sm">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-xs font-bold text-slate-500 dark:text-slate-400">{{ $product->duration ?? '-' }}</td>
                            <td class="px-6 py-4 text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">
                                @if($product->departure_date)
                                    {{ $product->departure_date->translatedFormat('d M Y') }}
                                @else
                                    <span class="text-slate-300 dark:text-slate-600 italic">N/A</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-3 py-1.5 rounded-full text-sm font-bold shadow-sm
                                    {{ $product->stock > 10 ? 'bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 border border-green-300' :
                                    ($product->stock > 0 ? 'bg-gradient-to-r from-yellow-100 to-amber-100 text-yellow-800 border border-yellow-300' : 'bg-gradient-to-r from-red-100 to-rose-100 text-red-800 border border-red-300') }}">
                                    {{ $product->stock }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-3 py-1.5 rounded-full text-sm font-bold shadow-sm
                                    {{ $product->status === 'active' ? 'bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 border border-green-300' : 'bg-gradient-to-r from-red-100 to-rose-100 text-red-800 border border-red-300' }}">
                                    {{ $product->status === 'active' ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="px-4 py-4 sticky right-0 bg-white dark:bg-slate-900 row-group-hover:bg-gradient-to-r row-group-hover:from-orange-50/50 row-group-hover:to-pink-50/50 dark:row-group-hover:from-orange-900/10 dark:row-group-hover:to-pink-900/10 transition-all duration-200 z-10 border-l-2 border-slate-100 dark:border-slate-800 shadow-[-10px_0_15px_rgba(0,0,0,0.03)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.3)] w-[140px] min-w-[140px]">
                                <div class="flex flex-col items-center gap-1.5">
                                    <button type="button" class="detail-group btn-detail-product w-full inline-flex items-center justify-center px-2.5 py-1.5 bg-gradient-to-r from-blue-50 to-sky-50 dark:from-blue-900/30 dark:to-sky-900/30 text-blue-600 dark:text-blue-400 border border-blue-200 dark:border-blue-700 rounded-lg text-[10px] font-bold uppercase tracking-widest shadow-sm shadow-blue-500/10 dark:shadow-blue-700/20 hover:shadow-md hover:shadow-blue-500/20 dark:hover:shadow-blue-600/30 hover:scale-105 active:scale-95 transition-all duration-200 touch-manipulation"
                                            data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-category="{{ $product->category }}" data-price="{{ $product->price }}" data-duration="{{ $product->duration }}" data-description="{{ $product->description }}" data-features="{{ is_array($product->features) ? implode("\n", $product->features) : $product->features }}" data-stock="{{ $product->stock }}" data-status="{{ $product->status }}" data-guidephone="{{ $product->guide_phone }}" data-image="{{ $product->image ? Storage::url($product->image) : '' }}" data-date="{{ $product->departure_date ? $product->departure_date->format('d M Y') : '' }}" data-dateraw="{{ $product->departure_date ? $product->departure_date->format('Y-m-d') : '' }}" data-quad="{{ $product->price_quad }}" data-triple="{{ $product->price_triple }}" data-double="{{ $product->price_double }}">
                                        <svg class="w-3 h-3 mr-1 detail-group-hover:scale-110 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        Detail
                                    </button>
                                    <button type="button" class="edit-group btn-edit-product w-full inline-flex items-center justify-center px-2.5 py-1.5 bg-gradient-to-r from-amber-50 to-orange-50 dark:from-amber-900/30 dark:to-orange-900/30 text-amber-600 dark:text-amber-400 border border-amber-200 dark:border-amber-700 rounded-lg text-[10px] font-bold uppercase tracking-widest shadow-sm shadow-amber-500/10 dark:shadow-amber-700/20 hover:shadow-md hover:shadow-amber-500/20 dark:hover:shadow-amber-600/30 hover:scale-105 active:scale-95 transition-all duration-200 touch-manipulation"
                                            data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-category="{{ $product->category }}" data-price="{{ $product->price }}" data-duration="{{ $product->duration }}" data-description="{{ $product->description }}" data-features="{{ is_array($product->features) ? implode("\n", $product->features) : $product->features }}" data-stock="{{ $product->stock }}" data-status="{{ $product->status }}" data-guidephone="{{ $product->guide_phone }}" data-dateraw="{{ $product->departure_date ? $product->departure_date->format('Y-m-d') : '' }}" data-quad="{{ $product->price_quad }}" data-triple="{{ $product->price_triple }}" data-double="{{ $product->price_double }}">
                                        <svg class="w-3 h-3 mr-1 edit-group-hover:scale-110 edit-group-hover:rotate-12 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        Edit
                                    </button>
                                    <a href="{{ route('products.edit-rundown', $product) }}"
                                        class="rundown-group w-full inline-flex items-center justify-center px-2.5 py-1.5 bg-gradient-to-r from-violet-50 to-purple-50 dark:from-violet-900/30 dark:to-purple-900/30 text-violet-600 dark:text-violet-400 border border-violet-200 dark:border-violet-700 rounded-lg text-[10px] font-bold uppercase tracking-widest shadow-sm shadow-violet-500/10 dark:shadow-violet-700/20 hover:shadow-md hover:shadow-violet-500/20 dark:hover:shadow-violet-600/30 hover:scale-105 active:scale-95 transition-all duration-200 touch-manipulation">
                                        <svg class="w-3 h-3 mr-1 rundown-group-hover:scale-110 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                                        Rundown
                                    </a>

                                    <form method="POST" action="{{ route('products.destroy', $product) }}" class="w-full m-0" onsubmit="return confirm('Yakin hapus paket ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-group w-full inline-flex items-center justify-center px-2.5 py-1.5 bg-gradient-to-r from-red-50 to-rose-50 dark:from-red-900/30 dark:to-rose-900/30 text-red-600 dark:text-red-400 border border-red-200 dark:border-red-700 rounded-lg text-[10px] font-bold uppercase tracking-widest shadow-sm shadow-red-500/10 dark:shadow-red-700/20 hover:shadow-md hover:shadow-red-500/20 dark:hover:shadow-red-600/30 hover:scale-105 active:scale-95 transition-all duration-200 touch-manipulation">
                                            <svg class="w-3 h-3 mr-1 delete-group-hover:scale-110 delete-group-hover:rotate-12 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="px-6 py-28 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-24 h-24 bg-gradient-to-br from-slate-100 to-slate-50 dark:from-slate-800 dark:to-slate-700 rounded-[3rem] shadow-xl flex items-center justify-center text-slate-300 dark:text-slate-600 mb-8 border-2 border-dashed border-slate-200 dark:border-slate-700">
                                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                                    </div>
                                    <h3 class="text-xl font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Tiada Paket Umroh</h3>
                                    <p class="text-sm text-slate-400 dark:text-slate-500 mt-2 max-w-[280px] mx-auto font-medium leading-relaxed">Belum ada paket yang terdaftar atau sesuai filter.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>

    <!-- Add Product Modal -->
    <div id="addProductModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-[110] flex items-center justify-center p-4">
        <div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-2xl w-full max-w-lg p-8 max-h-[90vh] overflow-y-auto border border-slate-100 dark:border-slate-800">
            <div class="flex justify-between items-center mb-8 border-b border-slate-50 dark:border-slate-800 pb-6">
                <h3 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Tambah Paket Umroh</h3>
                <button onclick="document.getElementById('addProductModal').classList.add('hidden')" class="text-slate-400 hover:text-red-500 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <form method="POST" action="{{ route('products.store') }}" class="space-y-4" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2 sm:col-span-1">
                        <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Nama Paket</label>
                        <input type="text" name="name" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-100" placeholder="Contoh: Paket Premium Madinah">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Gambar (Opsional)</label>
                        <input type="file" name="image" accept="image/*" class="w-full px-5 py-3.5 bg-slate-50 dark:bg-slate-800 border-2 border-dashed border-slate-200 dark:border-slate-700 rounded-2xl text-xs font-bold text-slate-400 file:hidden cursor-pointer hover:border-orange transition-all">
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Estimasi Tgl Berangkat (Opsional)</label>
                    <input type="date" name="departure_date" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-100">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Kategori <span class="text-red-500">*</span></label>
                        <select name="category" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                            <option value="Standar">Standar</option>
                            <option value="Premium">Premium</option>
                            <option value="Ekonomis">Ekonomis</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Durasi (Hari)</label>
                        <input type="text" name="duration" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200" placeholder="9 Hari">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Harga Quad (Rp) <span class="text-red-500">*</span></label>
                        <input type="number" name="price" required min="0" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200" placeholder="35000000">
                        <p class="text-[9px] text-slate-400 font-bold uppercase mt-1 tracking-tighter">Kamar ber-4 orang</p>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Up Triple (+Rp)</label>
                        <input type="number" name="price_triple" min="0" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200" placeholder="2000000">
                        <p class="text-[9px] text-slate-400 font-bold uppercase mt-1 tracking-tighter">Tambahan Kamar ber-3</p>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Up Double (+Rp)</label>
                        <input type="number" name="price_double" min="0" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200" placeholder="5000000">
                        <p class="text-[9px] text-slate-400 font-bold uppercase mt-1 tracking-tighter">Kamar ber-2</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Kuota Kursi <span class="text-red-500">*</span></label>
                        <input type="number" name="stock" required min="0" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200" placeholder="30">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Status Publikasi <span class="text-red-500">*</span></label>
                        <select name="status" required class="w-full px-5 py-4 bg-orange/5 dark:bg-orange/10 border-2 border-orange/20 dark:border-orange/30 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-orange">
                            <option value="active">Aktif (Tampil)</option>
                            <option value="inactive">Nonaktif (Draft)</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Deskripsi Singkat</label>
                    <textarea name="description" rows="2" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200" placeholder="Deskripsi singkat paket umroh"></textarea>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Fasilitas Unggulan (1 baris = 1 item)</label>
                    <textarea name="features" rows="3" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200" placeholder="Hotel bintang 5&#10;Pesawat langsung PP&#10;Makan 3x sehari"></textarea>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Kontak Tour Guide (WA)</label>
                    <input type="text" name="guide_phone" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200" placeholder="Contoh: 628123456789">
                    <p class="text-[9px] text-slate-400 font-bold uppercase mt-1">* Tanpa tanda +</p>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-violet-500 dark:text-violet-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                        Rundown Perjalanan (Opsional)
                    </label>
                    <div id="rundownContainer" class="space-y-3">
                        <!-- Dynamic rundown rows will be added here -->
                    </div>
                    <button type="button" onclick="addRundownRow()" class="mt-3 w-full py-3 border-2 border-dashed border-violet-200 dark:border-violet-700 text-violet-500 dark:text-violet-400 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-violet-50 dark:hover:bg-violet-900/20 hover:border-violet-400 transition-all flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Tambah Hari
                    </button>
                </div>
                <div class="flex space-x-3 pt-6 border-t border-slate-50 dark:border-slate-800">
                    <button type="button" onclick="document.getElementById('addProductModal').classList.add('hidden')" class="flex-1 px-4 py-4 bg-red-50 dark:bg-red-900/30 text-red-500 dark:text-red-400 border-2 border-red-200 dark:border-red-800 rounded-2xl shadow-sm hover:bg-red-100 dark:hover:bg-red-900/50 hover:shadow-md hover:shadow-red-500/10 dark:hover:shadow-red-900/30 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-red-400/20 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation">Batal</button>
                    <button type="submit" class="flex-1 px-4 py-4 bg-gradient-to-r from-emerald-500 to-green-500 dark:from-emerald-600 dark:to-green-600 text-white rounded-2xl shadow-md shadow-emerald-500/20 dark:shadow-emerald-700/30 hover:shadow-lg hover:shadow-emerald-500/40 dark:hover:shadow-emerald-600/50 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-emerald-400/50 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation border-2 border-emerald-400/50 dark:border-emerald-500/50 hover:border-emerald-300 dark:hover:border-emerald-400">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Detail Product Modal -->
    <div id="detailProductModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-[110] flex items-center justify-center p-4">
        <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] shadow-2xl w-full max-w-3xl overflow-hidden relative border border-slate-100 dark:border-slate-800">
            <button onclick="document.getElementById('detailProductModal').classList.add('hidden')" class="absolute top-6 right-6 z-50 bg-white/80 dark:bg-slate-800/80 backdrop-blur-md text-slate-400 hover:text-red-500 rounded-2xl p-3 transition shadow-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            <div class="flex flex-col md:flex-row h-full max-h-[85vh]">
                <!-- Image Section -->
                <div class="w-full md:w-1/2 h-48 md:h-auto">
                    <img id="viewProductImage" src="" class="w-full h-full object-cover" alt="Product Image">
                    <div id="viewProductImagePlaceholder" class="w-full h-full bg-gradient-sunset flex items-center justify-center text-white font-bold hidden">No Image</div>
                </div>
                <!-- Content Section -->
                <div class="w-full md:w-1/2 p-8 overflow-y-auto bg-white dark:bg-slate-900">
                    <div class="mb-6">
                        <span id="viewProductCategory" class="px-3 py-1 bg-orange/10 dark:bg-orange/20 text-orange text-[10px] font-black uppercase rounded-lg tracking-widest"></span>
                        <h3 id="viewProductName" class="text-2xl font-black text-slate-800 dark:text-slate-100 mt-3 leading-tight"></h3>
                        <p id="viewProductPrice" class="text-xl font-black text-orange mt-2"></p>
                    </div>
                    
                    <div class="space-y-6 text-sm text-slate-600 dark:text-slate-400">
                        <div class="bg-slate-50 dark:bg-slate-800/50 p-4 rounded-2xl border border-slate-100 dark:border-slate-700">
                            <div class="grid grid-cols-3 gap-4">
                                <div>
                                    <p class="font-black text-slate-400 dark:text-slate-500 uppercase text-[9px] tracking-widest mb-1">Durasi</p>
                                    <p id="viewProductDuration" class="font-bold text-slate-700 dark:text-slate-200"></p>
                                </div>
                                <div>
                                    <p class="font-black text-slate-400 dark:text-slate-500 uppercase text-[9px] tracking-widest mb-1">Berangkat</p>
                                    <p id="viewProductDepartureDate" class="text-orange font-bold"></p>
                                </div>
                                <div>
                                    <p class="font-black text-slate-400 dark:text-slate-500 uppercase text-[9px] tracking-widest mb-1">Sisa Kuota</p>
                                    <p id="viewProductStock" class="font-bold text-slate-700 dark:text-slate-200"></p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <p class="font-black text-slate-800 dark:text-slate-100 uppercase text-[10px] tracking-widest mb-3 border-b border-slate-100 dark:border-slate-800 pb-2">Varian Kamar (Upgrade)</p>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-slate-50 dark:bg-slate-800/50 p-3 rounded-xl border border-slate-100 dark:border-slate-700">
                                    <p class="font-black text-slate-400 dark:text-slate-500 uppercase text-[8px] tracking-widest mb-1">Kamar Ber-3</p>
                                    <p id="viewProductPriceTriple" class="text-sm text-slate-700 dark:text-slate-200 font-bold"></p>
                                </div>
                                <div class="bg-slate-50 dark:bg-slate-800/50 p-3 rounded-xl border border-slate-100 dark:border-slate-700">
                                    <p class="font-black text-slate-400 dark:text-slate-500 uppercase text-[8px] tracking-widest mb-1">Kamar Ber-2</p>
                                    <p id="viewProductPriceDouble" class="text-sm text-slate-700 dark:text-slate-200 font-bold"></p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <p class="font-black text-slate-800 dark:text-slate-100 uppercase text-[10px] tracking-widest mb-2 border-b border-slate-100 dark:border-slate-800 pb-2">Deskripsi Paket</p>
                            <p id="viewProductDescription" class="text-xs leading-relaxed"></p>
                        </div>

                        <div>
                            <p class="font-black text-slate-800 dark:text-slate-100 uppercase text-[10px] tracking-widest mb-3 border-b border-slate-100 dark:border-slate-800 pb-2">Kontak Tour Guide</p>
                            <p id="viewProductGuidePhone" class="text-xs font-bold text-slate-700 dark:text-slate-200"></p>
                        </div>

                        <div>
                            <p class="font-black text-slate-800 dark:text-slate-100 uppercase text-[10px] tracking-widest mb-3 border-b border-slate-100 dark:border-slate-800 pb-2">Fasilitas Unggulan</p>
                            <ul id="viewProductFeatures" class="grid grid-cols-1 gap-2"></ul>
                        </div>
                    </div>
                    
                    <div class="mt-8 pt-6 border-t border-slate-50 dark:border-slate-800 flex justify-between items-center">
                        <div id="viewProductStatus" class="px-4 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest"></div>
                        <button onclick="document.getElementById('detailProductModal').classList.add('hidden')" class="group bg-gradient-to-r from-slate-100 to-slate-50 dark:from-slate-800 dark:to-slate-700 text-slate-600 dark:text-slate-300 px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-md shadow-slate-300/20 dark:shadow-slate-900/30 border-2 border-slate-300 dark:border-slate-600 hover:border-slate-400 dark:hover:border-slate-500 hover:shadow-lg hover:shadow-slate-400/30 dark:hover:shadow-slate-700/50 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-slate-300/40 transition-all duration-200 touch-manipulation flex items-center gap-2">
                            <svg class="w-3.5 h-3.5 group-hover:scale-110 group-hover:rotate-90 transition-transform duration-300 drop-shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/></svg>
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div id="editProductModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-[110] flex items-center justify-center p-4">
        <div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-2xl w-full max-w-lg p-8 max-h-[90vh] overflow-y-auto border border-slate-100 dark:border-slate-800">
            <div class="flex justify-between items-center mb-8 border-b border-slate-50 dark:border-slate-800 pb-6">
                <h3 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Edit Paket Umroh</h3>
                <button onclick="document.getElementById('editProductModal').classList.add('hidden')" class="text-slate-400 hover:text-red-500 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <form id="editProductForm" method="POST" class="space-y-6" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Nama Paket <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="editProductName" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Update Gambar (Opsional)</label>
                        <input type="file" name="image" accept="image/*" class="w-full px-5 py-3.5 bg-slate-50 dark:bg-slate-800 border-2 border-dashed border-slate-200 dark:border-slate-700 rounded-2xl text-xs font-bold text-slate-400 file:hidden cursor-pointer hover:border-orange transition-all">
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Estimasi Tgl Berangkat (Opsional)</label>
                    <input type="date" name="departure_date" id="editProductDepartureDate" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Kategori <span class="text-red-500">*</span></label>
                        <select name="category" id="editProductCategory" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                            <option value="Standar">Standar</option>
                            <option value="Premium">Premium</option>
                            <option value="Ekonomis">Ekonomis</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Durasi (Hari)</label>
                        <input type="text" name="duration" id="editProductDuration" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Harga Quad (Rp) <span class="text-red-500">*</span></label>
                        <input type="number" name="price" id="editProductPrice" required min="0" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Up Triple (+Rp)</label>
                        <input type="number" name="price_triple" id="editProductPriceTriple" min="0" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200" placeholder="2000000">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Up Double (+Rp)</label>
                        <input type="number" name="price_double" id="editProductPriceDouble" min="0" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200" placeholder="5000000">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Kuota Kursi <span class="text-red-500">*</span></label>
                        <input type="number" name="stock" id="editProductStock" required min="0" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Status Publikasi <span class="text-red-500">*</span></label>
                        <select name="status" id="editProductStatus" required class="w-full px-5 py-4 bg-orange/5 dark:bg-orange/10 border-2 border-orange/20 dark:border-orange/30 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-orange">
                            <option value="active">Aktif (Tampil)</option>
                            <option value="inactive">Nonaktif (Draft)</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Deskripsi Singkat</label>
                    <textarea name="description" id="editProductDescription" rows="2" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200"></textarea>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Fasilitas Unggulan (1 baris = 1 item)</label>
                    <textarea name="features" id="editProductFeatures" rows="3" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200"></textarea>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Kontak Tour Guide (WA)</label>
                    <input type="text" name="guide_phone" id="editProductGuidePhone" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200" placeholder="Contoh: 628123456789">
                    <p class="text-[9px] text-slate-400 font-bold uppercase mt-1">* Tanpa tanda +</p>
                </div>
                
                <div class="flex gap-4 pt-6 border-t border-slate-50 dark:border-slate-800">
                    <button type="button" onclick="document.getElementById('editProductModal').classList.add('hidden')" class="flex-1 px-8 py-4 bg-red-50 dark:bg-red-900/30 text-red-500 dark:text-red-400 border-2 border-red-200 dark:border-red-800 rounded-2xl shadow-sm hover:bg-red-100 dark:hover:bg-red-900/50 hover:shadow-md hover:shadow-red-500/10 dark:hover:shadow-red-900/30 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-red-400/20 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation">Batal</button>
                    <button type="submit" class="flex-1 px-8 py-4 bg-gradient-to-r from-amber-500 to-orange-500 dark:from-amber-600 dark:to-orange-600 text-white rounded-2xl shadow-md shadow-amber-500/20 dark:shadow-amber-700/30 hover:shadow-lg hover:shadow-amber-500/40 dark:hover:shadow-amber-600/50 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-amber-400/50 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation border-2 border-amber-400/50 dark:border-amber-500/50 hover:border-amber-300 dark:hover:border-amber-400">Update Paket</button>
                </div>
            </form>

            </form>
        </div>
    </div>

    <script>
        let rundownIndex = 0;
        function addRundownRow() {
            const container = document.getElementById('rundownContainer');
            const row = document.createElement('div');
            row.className = 'bg-slate-50 dark:bg-slate-800 rounded-2xl p-4 border border-slate-100 dark:border-slate-700 relative';
            row.id = 'rundown-row-' + rundownIndex;
            row.innerHTML = `
                <button type="button" onclick="removeRundownRow(${rundownIndex})" class="absolute top-2 right-2 w-6 h-6 rounded-full bg-red-100 dark:bg-red-900/30 text-red-500 flex items-center justify-center hover:bg-red-200 transition-colors text-xs font-black">&times;</button>
                <div class="grid grid-cols-3 gap-3">
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Hari</label>
                        <input type="text" name="rundown[${rundownIndex}][day]" placeholder="Hari 1" class="w-full px-3 py-2.5 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-600 rounded-xl text-xs font-bold text-slate-700 dark:text-slate-200 focus:border-violet-400 focus:outline-none transition-all">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Kegiatan</label>
                        <textarea name="rundown[${rundownIndex}][activities]" rows="2" placeholder="Tiba di Jeddah, Check-in Hotel..." class="w-full px-3 py-2.5 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-600 rounded-xl text-xs font-bold text-slate-700 dark:text-slate-200 focus:border-violet-400 focus:outline-none transition-all resize-none"></textarea>
                    </div>
                </div>
            `;
            container.appendChild(row);
            rundownIndex++;
        }
        function removeRundownRow(index) {
            const row = document.getElementById('rundown-row-' + index);
            if (row) row.remove();
        }

        function openDetailProduct(id, name, category, price, duration, description, features, stock, status, guide_phone, image_url, departure_date, price_quad, price_triple, price_double) {
            document.getElementById('viewProductName').innerText = name;
            document.getElementById('viewProductCategory').innerText = category;
            document.getElementById('viewProductPrice').innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(price);
            document.getElementById('viewProductPriceTriple').innerText = price_triple && price_triple !== 'null' && price_triple !== '0' ? '+Rp ' + new Intl.NumberFormat('id-ID').format(price_triple) : 'Tidak ada upgrade';
            document.getElementById('viewProductPriceDouble').innerText = price_double && price_double !== 'null' && price_double !== '0' ? '+Rp ' + new Intl.NumberFormat('id-ID').format(price_double) : 'Tidak ada upgrade';
            document.getElementById('viewProductDuration').innerText = duration || '-';
            document.getElementById('viewProductDepartureDate').innerText = departure_date || 'Belum diatur';
            document.getElementById('viewProductStock').innerText = stock + ' Kursi';
            document.getElementById('viewProductDescription').innerText = description || 'Tidak ada deskripsi.';
            document.getElementById('viewProductGuidePhone').innerText = guide_phone || 'Menggunakan WA Admin Pusat';
            
            const featuresList = document.getElementById('viewProductFeatures');
            featuresList.innerHTML = '';
            if (features) {
                features.split('\n').forEach(f => {
                    if (f.trim()) {
                        const li = document.createElement('li');
                        li.innerText = f.trim();
                        featuresList.appendChild(li);
                    }
                });
            }

            const img = document.getElementById('viewProductImage');
            const placeholder = document.getElementById('viewProductImagePlaceholder');
            if (image_url) {
                img.src = image_url;
                img.classList.remove('hidden');
                placeholder.classList.add('hidden');
            } else {
                img.classList.add('hidden');
                placeholder.classList.remove('hidden');
            }

            const statusEl = document.getElementById('viewProductStatus');
            if (status === 'active') {
                statusEl.innerText = 'Aktif';
                statusEl.className = 'px-4 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 border border-emerald-100 dark:border-emerald-800';
            } else {
                statusEl.innerText = 'Nonaktif';
                statusEl.className = 'px-4 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest bg-red-50 dark:bg-red-900/30 text-red-600 dark:text-red-400 border border-red-100 dark:border-red-800';
            }

            document.getElementById('detailProductModal').classList.remove('hidden');
        }

        function openEditProduct(id, name, category, price, duration, description, features, stock, status, guide_phone, departure_date, price_quad, price_triple, price_double) {
            document.getElementById('editProductForm').action = '/products/' + id;
            document.getElementById('editProductName').value = name;
            document.getElementById('editProductCategory').value = category;
            document.getElementById('editProductPrice').value = price;
            document.getElementById('editProductPriceTriple').value = price_triple && price_triple !== 'null' ? price_triple : '';
            document.getElementById('editProductPriceDouble').value = price_double && price_double !== 'null' ? price_double : '';
            document.getElementById('editProductDuration').value = duration;
            document.getElementById('editProductDepartureDate').value = departure_date || '';
            document.getElementById('editProductDescription').value = description;
            document.getElementById('editProductFeatures').value = features;
            document.getElementById('editProductStock').value = stock;
            document.getElementById('editProductStatus').value = status;
            document.getElementById('editProductGuidePhone').value = guide_phone || '';
            document.getElementById('editProductModal').classList.remove('hidden');
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.body.addEventListener('click', function(e) {
                const btnDetail = e.target.closest('.btn-detail-product');
                if (btnDetail) {
                    const ds = btnDetail.dataset;
                    openDetailProduct(ds.id, ds.name, ds.category, ds.price, ds.duration, ds.description, ds.features, ds.stock, ds.status, ds.guidephone, ds.image, ds.date, ds.quad, ds.triple, ds.double);
                }

                const btnEdit = e.target.closest('.btn-edit-product');
                if (btnEdit) {
                    const ds = btnEdit.dataset;
                    openEditProduct(ds.id, ds.name, ds.category, ds.price, ds.duration, ds.description, ds.features, ds.stock, ds.status, ds.guidephone, ds.dateraw, ds.quad, ds.triple, ds.double);
                }
            });
        });

        // Voice Search Logic
        const voiceSearchBtn = document.getElementById('voice-search-btn');
        const searchInput = document.getElementById('search-input');
        const searchForm = document.getElementById('search-form');

        if ('webkitSpeechRecognition' in window || 'SpeechRecognition' in window) {
            const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
            const recognition = new SpeechRecognition();

            recognition.lang = 'id-ID';
            recognition.interimResults = false;
            recognition.maxAlternatives = 1;

            voiceSearchBtn.addEventListener('click', () => {
                if (voiceSearchBtn.classList.contains('is-listening')) {
                    recognition.stop();
                } else {
                    recognition.start();
                }
            });

            recognition.onstart = () => {
                voiceSearchBtn.classList.add('is-listening');
                searchInput.placeholder = "Mendengarkan...";
            };

            recognition.onresult = (event) => {
                const transcript = event.results[0][0].transcript;
                searchInput.value = transcript;
                searchForm.submit();
            };

            recognition.onerror = (event) => {
                console.error('Speech recognition error:', event.error);
                voiceSearchBtn.classList.remove('is-listening');
                searchInput.placeholder = "Cari paket...";
            };

            recognition.onend = () => {
                voiceSearchBtn.classList.remove('is-listening');
                if (!searchInput.value) {
                    searchInput.placeholder = "Cari paket...";
                }
            };
        } else {
            // Hide button if not supported
            voiceSearchBtn.style.display = 'none';
        }
    </script>
@endsection
