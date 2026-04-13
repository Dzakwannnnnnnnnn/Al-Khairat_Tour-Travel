@extends('layouts.layout')

@section('title', 'Edit Rundown - ' . $product->name)
@section('breadcrumb', 'Edit Rundown: ' . $product->name)

@section('content')
<div class="max-w-5xl mx-auto py-8">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-4xl font-bold text-gray-900">Edit Rundown Kegiatan</h1>
            <p class="text-gray-600 mt-2">{{ $product->name }} ({{ $product->duration }})</p>
        </div>
        <a href="{{ route('products.index') }}" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition font-semibold">
            Kembali
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
        <form id="rundownForm" class="space-y-6">
            @csrf
            <div id="rundownContainer">
                @if($product->rundown && is_array($product->rundown))
                    @foreach($product->rundown as $index => $item)
                    <div class="rundown-item bg-gray-50 p-6 rounded-xl border border-gray-200 mb-4">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-lg font-bold text-gray-900">Hari {{ $index + 1 }}</h3>
                            <button type="button" onclick="removeRundownItem({{ $index }})"
                                class="text-red-600 hover:text-red-900 font-semibold text-sm">
                                Hapus
                            </button>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div class="col-span-1">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Hari/Tanggal</label>
                                <input type="text" name="rundown[{{ $index }}][day]" value="{{ $item['day'] }}"
                                    placeholder="Hari 1 - 01 Jan 2025"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Aktivitas Kegiatan</label>
                            <textarea name="rundown[{{ $index }}][activities]" rows="5"
                                placeholder="Jelaskan aktivitas untuk hari ini..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 resize-none">{{ $item['activities'] }}</textarea>
                            <p class="text-xs text-gray-500 mt-1">Gunakan line break untuk membuat poin-poin terpisah</p>
                        </div>
                    </div>
                    @endforeach
                @else
                    <!-- Default: Create 9 empty rundown items for umrah -->
                    @for($i = 0; $i < 9; $i++)
                    <div class="rundown-item bg-gray-50 p-6 rounded-xl border border-gray-200 mb-4">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-lg font-bold text-gray-900">Hari {{ $i + 1 }}</h3>
                            <button type="button" onclick="removeRundownItem({{ $i }})"
                                class="text-red-600 hover:text-red-900 font-semibold text-sm">
                                Hapus
                            </button>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div class="col-span-1">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Hari/Tanggal</label>
                                <input type="text" name="rundown[{{ $i }}][day]" value=""
                                    placeholder="Hari {{ $i + 1 }} - DD Mon YYYY"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Aktivitas Kegiatan</label>
                            <textarea name="rundown[{{ $i }}][activities]" rows="5"
                                placeholder="Jelaskan aktivitas untuk hari ini..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 resize-none"></textarea>
                            <p class="text-xs text-gray-500 mt-1">Gunakan line break untuk membuat poin-poin terpisah</p>
                        </div>
                    </div>
                    @endfor
                @endif
            </div>

            <button type="button" onclick="addRundownItem()"
                class="w-full px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition font-semibold border-2 border-dashed border-gray-300">
                + Tambah Hari
            </button>

            <div class="flex space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('products.index') }}"
                    class="flex-1 px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-semibold text-center">
                    Batal
                </a>
                <button type="submit"
                    class="flex-1 px-6 py-3 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition font-semibold">
                    Simpan Rundown
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('rundownForm').addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(document.getElementById('rundownForm'));
        const rundown = [];

        // Parse form data
        const items = document.querySelectorAll('.rundown-item');
        let itemIndex = 0;

        items.forEach((item, idx) => {
            const dayInput = item.querySelector(`input[name="rundown[${idx}][day]"]`);
            const activitiesInput = item.querySelector(`textarea[name="rundown[${idx}][activities]"]`);

            if (dayInput && activitiesInput) {
                if (dayInput.value.trim() || activitiesInput.value.trim()) {
                    rundown.push({
                        day: dayInput.value || `Hari ${idx + 1}`,
                        activities: activitiesInput.value
                    });
                }
            }
        });

        try {
            const response = await fetch('{{ route("products.update-rundown", $product->id) }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': document.querySelector('input[name="_token"]').value,
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: JSON.stringify({ rundown: rundown })
            });

            const data = await response.json();

            if (data.success) {
                alert('Rundown kegiatan berhasil disimpan!');
                window.location.href = '{{ route("products.index") }}';
            } else {
                alert('Error: ' + (data.message || 'Gagal menyimpan rundown'));
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Terjadi kesalahan. Silakan coba lagi.');
        }
    });

    function addRundownItem() {
        const container = document.getElementById('rundownContainer');
        const itemCount = container.querySelectorAll('.rundown-item').length;

        const newItem = document.createElement('div');
        newItem.className = 'rundown-item bg-gray-50 p-6 rounded-xl border border-gray-200 mb-4';
        newItem.innerHTML = `
            <div class="flex justify-between items-start mb-4">
                <h3 class="text-lg font-bold text-gray-900">Hari ${itemCount + 1}</h3>
                <button type="button" onclick="this.parentElement.parentElement.remove()"
                    class="text-red-600 hover:text-red-900 font-semibold text-sm">
                    Hapus
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div class="col-span-1">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Hari/Tanggal</label>
                    <input type="text" name="rundown[${itemCount}][day]" value=""
                        placeholder="Hari ${itemCount + 1} - DD Mon YYYY"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Aktivitas Kegiatan</label>
                <textarea name="rundown[${itemCount}][activities]" rows="5"
                    placeholder="Jelaskan aktivitas untuk hari ini..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 resize-none"></textarea>
                <p class="text-xs text-gray-500 mt-1">Gunakan line break untuk membuat poin-poin terpisah</p>
            </div>
        `;

        container.insertBefore(newItem, container.lastElementChild.previousElementSibling);
    }

    function removeRundownItem(index) {
        const item = document.querySelectorAll('.rundown-item')[index];
        if (item) {
            item.remove();
        }
    }
</script>
@endsection
