@extends('layouts.layout')

@section('title', 'Paket Umroh - Al-Khairat')
@section('breadcrumb', 'Paket Umroh')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 space-y-4 sm:space-y-0">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Paket Umroh</h1>
                <p class="text-gray-600 mt-2">Kelola semua paket umroh Al-Khairat</p>
            </div>
            <button onclick="document.getElementById('addProductModal').classList.remove('hidden')" class="bg-charcoal text-white px-6 py-2 rounded-lg hover:bg-orange transition flex items-center space-x-2 shadow-lg shadow-orange/10">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
                <span class="font-bold uppercase tracking-widest text-xs">Tambah Paket</span>
            </button>

        </div>

        <div class="bg-white rounded-[1.5rem] shadow-sm p-6 mb-8 border border-slate-100">
            <form method="GET" action="{{ route('products.index') }}" id="filter-form" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <select name="category" class="border border-slate-200 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-orange/20 focus:border-orange bg-slate-50/50">
                    <option value="">Semua Kategori</option>
                    <option value="Standar" {{ request('category') == 'Standar' ? 'selected' : '' }}>Standar</option>
                    <option value="Premium" {{ request('category') == 'Premium' ? 'selected' : '' }}>Premium</option>
                    <option value="Ekonomis" {{ request('category') == 'Ekonomis' ? 'selected' : '' }}>Ekonomis</option>
                </select>
                <select name="status" class="border border-slate-200 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-orange/20 focus:border-orange bg-slate-50/50">
                    <option value="">Semua Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                <button type="submit" class="bg-orange/10 text-orange font-bold rounded-xl hover:bg-orange hover:text-white transition px-4 py-2.5 border border-orange/20 uppercase tracking-widest text-xs">
                    Terapkan Filter
                </button>
            </form>
        </div>


        <!-- Products Table -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
            <table class="w-full min-w-[800px]">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Gambar</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Nama Paket</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Harga</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Durasi</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Kuota</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($products as $product)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            @if($product->image)
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-12 h-12 object-cover rounded shadow-sm">
                            @else
                                <div class="w-12 h-12 bg-gray-100 rounded flex items-center justify-center text-xs text-gray-400 border border-gray-200">Kosong</div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-semibold text-gray-900">{{ $product->name }}</p>
                            <p class="text-sm text-gray-600">{{ Str::limit($product->description, 50) }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                                {{ $product->category === 'Premium' ? 'bg-yellow-100 text-yellow-800' :
                                   ($product->category === 'Standar' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">
                                {{ $product->category }}
                            </span>
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $product->duration ?? '-' }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-block px-3 py-1 rounded-full text-sm
                                {{ $product->stock > 10 ? 'bg-green-100 text-green-800' :
                                   ($product->stock > 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                {{ $product->stock }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-block px-3 py-1 rounded-full text-sm font-medium
                                {{ $product->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $product->status === 'active' ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <button onclick="openDetailProduct({{ $product->id }}, '{{ addslashes($product->name) }}', '{{ $product->category }}', '{{ $product->price }}', '{{ addslashes($product->duration) }}', '{{ addslashes($product->description) }}', '{{ is_array($product->features) ? implode(', ', $product->features) : '' }}', '{{ $product->stock }}', '{{ $product->status }}', '{{ $product->guide_phone }}', '{{ $product->image ? Storage::url($product->image) : '' }}')"
                                    class="text-blue-600 hover:text-blue-900 mr-3 text-xs font-black uppercase tracking-widest transition-colors">Detail</button>
                            <button onclick="openEditProduct({{ $product->id }}, '{{ addslashes($product->name) }}', '{{ $product->category }}', '{{ $product->price }}', '{{ addslashes($product->duration) }}', '{{ addslashes($product->description) }}', '{{ is_array($product->features) ? implode(', ', $product->features) : '' }}', '{{ $product->stock }}', '{{ $product->status }}', '{{ $product->guide_phone }}')"
                                    class="text-orange hover:text-gold mr-3 text-xs font-black uppercase tracking-widest transition-colors">Edit</button>
                            <a href="{{ route('products.edit-rundown', $product) }}"
                                class="text-purple-600 hover:text-purple-900 mr-3 text-xs font-black uppercase tracking-widest transition-colors inline-block">Rundown</a>

                            <form method="POST" action="{{ route('products.destroy', $product) }}" class="inline" onsubmit="return confirm('Yakin hapus paket ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 text-sm font-medium">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-12 text-center text-gray-500">Belum ada paket umroh.</td>
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
    <div id="addProductModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-6 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-900">Tambah Paket Umroh</h3>
                <button onclick="document.getElementById('addProductModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <form method="POST" action="{{ route('products.store') }}" class="space-y-4" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2 sm:col-span-1">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Paket</label>
                        <input type="text" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Contoh: Paket Premium Madinah">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Gambar (Opsional)</label>
                        <input type="file" name="image" accept="image/*" class="w-full px-4 py-1.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Kategori</label>
                        <select name="category" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="Standar">Standar</option>
                            <option value="Premium">Premium</option>
                            <option value="Ekonomis">Ekonomis</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Durasi</label>
                        <input type="text" name="duration" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="9 Hari">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Harga (Rp)</label>
                        <input type="number" name="price" required min="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="25000000">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Kuota</label>
                        <input type="number" name="stock" required min="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="30">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="description" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Deskripsi singkat paket umroh"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Fitur (pisahkan koma)</label>
                    <input type="text" name="features" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Hotel bintang 5, Pesawat langsung, Makan 3x">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nomor WA Tour Guide</label>
                    <input type="text" name="guide_phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Contoh: 628123456789">
                    <p class="text-[10px] text-gray-500 mt-1">* Gunakan format internasional tanpa tanda + (contoh: 62812...)</p>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Status</label>
                    <select name="status" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="active">Aktif</option>
                        <option value="inactive">Nonaktif</option>
                    </select>
                </div>
                <div class="flex space-x-3 pt-2">
                    <button type="button" onclick="document.getElementById('addProductModal').classList.add('hidden')" class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">Batal</button>
                    <button type="submit" class="flex-1 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Detail Product Modal -->
    <div id="detailProductModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-2xl overflow-hidden relative">
            <button onclick="document.getElementById('detailProductModal').classList.add('hidden')" class="absolute top-4 right-4 z-50 bg-gray-100 hover:bg-gray-200 text-gray-500 rounded-full p-2 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            <div class="flex flex-col md:flex-row h-full max-h-[85vh]">
                <!-- Image Section -->
                <div class="w-full md:w-1/2 h-48 md:h-auto">
                    <img id="viewProductImage" src="" class="w-full h-full object-cover" alt="Product Image">
                    <div id="viewProductImagePlaceholder" class="w-full h-full bg-gradient-sunset flex items-center justify-center text-white font-bold hidden">No Image</div>
                </div>
                <!-- Content Section -->
                <div class="w-full md:w-1/2 p-8 overflow-y-auto">
                    <div class="mb-6">
                        <span id="viewProductCategory" class="px-3 py-1 bg-orange/10 text-orange text-[10px] font-bold uppercase rounded-full tracking-widest"></span>
                        <h3 id="viewProductName" class="text-2xl font-bold text-gray-900 mt-2"></h3>
                        <p id="viewProductPrice" class="text-xl font-bold text-orange mt-1"></p>
                    </div>
                    
                    <div class="space-y-4 text-sm text-gray-600">
                        <div>
                            <p class="font-bold text-gray-900 uppercase text-[10px] tracking-widest mb-1">Durasi</p>
                            <p id="viewProductDuration"></p>
                        </div>
                        <div>
                            <p class="font-bold text-gray-900 uppercase text-[10px] tracking-widest mb-1">Stok / Kuota</p>
                            <p id="viewProductStock"></p>
                        </div>
                        <div>
                            <p class="font-bold text-gray-900 uppercase text-[10px] tracking-widest mb-1">Tour Guide WA</p>
                            <p id="viewProductGuidePhone" class="text-orange font-mono"></p>
                        </div>
                        <div>
                            <p class="font-bold text-gray-900 uppercase text-[10px] tracking-widest mb-1">Deskripsi</p>
                            <p id="viewProductDescription" class="italic"></p>
                        </div>
                        <div>
                            <p class="font-bold text-gray-900 uppercase text-[10px] tracking-widest mb-1">Fitur Utama</p>
                            <ul id="viewProductFeatures" class="list-disc list-inside space-y-1"></ul>
                        </div>
                    </div>
                    
                    <div class="mt-8 pt-6 border-t border-gray-100 flex justify-between items-center">
                        <div id="viewProductStatus" class="px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest"></div>
                        <button onclick="document.getElementById('detailProductModal').classList.add('hidden')" class="bg-gray-900 text-white px-6 py-2 rounded-xl text-xs font-bold uppercase tracking-widest hover:bg-orange transition">Tutup Detail</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div id="editProductModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-6 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-900">Edit Paket Umroh</h3>
                <button onclick="document.getElementById('editProductModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <form id="editProductForm" method="POST" class="space-y-4" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2 sm:col-span-1">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Paket</label>
                        <input type="text" name="name" id="editProductName" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Upload Gambar Baru</label>
                        <input type="file" name="image" accept="image/*" class="w-full px-4 py-1.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Kategori</label>
                        <select name="category" id="editProductCategory" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="Standar">Standar</option>
                            <option value="Premium">Premium</option>
                            <option value="Ekonomis">Ekonomis</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Durasi</label>
                        <input type="text" name="duration" id="editProductDuration" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Harga (Rp)</label>
                        <input type="number" name="price" id="editProductPrice" required min="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Kuota</label>
                        <input type="number" name="stock" id="editProductStock" required min="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="description" id="editProductDescription" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Fitur (pisahkan koma)</label>
                    <input type="text" name="features" id="editProductFeatures" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nomor WA Tour Guide</label>
                    <input type="text" name="guide_phone" id="editProductGuidePhone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Contoh: 628123456789">
                    <p class="text-[10px] text-gray-500 mt-1">* Kosongkan jika ingin menggunakan nomor WA Admin pusat.</p>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Status</label>
                    <select name="status" id="editProductStatus" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="active">Aktif</option>
                        <option value="inactive">Nonaktif</option>
                    </select>
                </div>
                <div class="flex space-x-3 pt-2">
                    <button type="button" onclick="document.getElementById('editProductModal').classList.add('hidden')" class="flex-1 px-4 py-2 border border-slate-200 text-slate-500 rounded-lg hover:bg-slate-50 transition font-bold uppercase tracking-widest text-[10px]">Batal</button>
                    <button type="submit" class="flex-1 px-4 py-2 bg-charcoal text-white rounded-lg hover:bg-orange transition font-bold uppercase tracking-widest text-[10px] shadow-lg shadow-orange/10">Update</button>
                </div>

            </form>
        </div>
    </div>

    <script>
        function openDetailProduct(id, name, category, price, duration, description, features, stock, status, guide_phone, image_url) {
            document.getElementById('viewProductName').innerText = name;
            document.getElementById('viewProductCategory').innerText = category;
            document.getElementById('viewProductPrice').innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(price);
            document.getElementById('viewProductDuration').innerText = duration || '-';
            document.getElementById('viewProductStock').innerText = stock + ' Kursi';
            document.getElementById('viewProductDescription').innerText = description || 'Tidak ada deskripsi.';
            document.getElementById('viewProductGuidePhone').innerText = guide_phone || 'Menggunakan WA Admin Pusat';
            
            const featuresList = document.getElementById('viewProductFeatures');
            featuresList.innerHTML = '';
            if (features) {
                features.split(',').forEach(f => {
                    const li = document.createElement('li');
                    li.innerText = f.trim();
                    featuresList.appendChild(li);
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
                statusEl.className = 'px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest bg-green-100 text-green-700';
            } else {
                statusEl.innerText = 'Nonaktif';
                statusEl.className = 'px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest bg-red-100 text-red-700';
            }

            document.getElementById('detailProductModal').classList.remove('hidden');
        }

        function openEditProduct(id, name, category, price, duration, description, features, stock, status, guide_phone) {
            document.getElementById('editProductForm').action = '/products/' + id;
            document.getElementById('editProductName').value = name;
            document.getElementById('editProductCategory').value = category;
            document.getElementById('editProductPrice').value = price;
            document.getElementById('editProductDuration').value = duration;
            document.getElementById('editProductDescription').value = description;
            document.getElementById('editProductFeatures').value = features;
            document.getElementById('editProductStock').value = stock;
            document.getElementById('editProductStatus').value = status;
            document.getElementById('editProductGuidePhone').value = guide_phone || '';
            document.getElementById('editProductModal').classList.remove('hidden');
        }

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
