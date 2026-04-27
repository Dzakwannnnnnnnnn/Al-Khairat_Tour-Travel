@extends('layouts.layout')

@section('title', 'Edit Rundown - ' . $product->name)
@section('breadcrumb', 'Edit Rundown: ' . $product->name)

@section('content')
<div class="max-w-5xl mx-auto py-8">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-4xl font-bold text-slate-800 dark:text-slate-100">Edit Rundown Kegiatan</h1>
            <p class="text-slate-500 dark:text-slate-400 mt-2">{{ $product->name }} ({{ $product->duration }})</p>
        </div>
        <a href="{{ route('products.index') }}" class="group px-6 py-3 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 rounded-xl shadow-sm hover:bg-slate-200 dark:hover:bg-slate-700 hover:shadow-md hover:scale-[1.02] active:scale-95 transition-all duration-200 font-semibold touch-manipulation border border-slate-200 dark:border-slate-700 flex items-center gap-2">
            <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Kembali
        </a>
    </div>

    <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-lg shadow-slate-200/50 dark:shadow-slate-950/50 p-8 border border-slate-100 dark:border-slate-800">
        <form id="rundownForm" class="space-y-6">
            @csrf
            <div id="rundownContainer">
                @if($product->rundown && is_array($product->rundown))
                    @foreach($product->rundown as $index => $item)
                    <div class="rundown-item bg-slate-50 dark:bg-slate-800/50 p-6 rounded-xl border border-slate-200 dark:border-slate-700 mb-4 shadow-sm hover:shadow-md hover:border-orange-200 dark:hover:border-orange-800 transition-all duration-200">
                        <div class="flex justify-between items-start mb-4 border-b border-slate-200 dark:border-slate-700 pb-3">
                            <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100 day-title">
                                Hari {{ $index + 1 }}
                            </h3>
                            <div class="flex items-center space-x-3">
                                <button type="button" onclick="insertRundownItemAfter(this)"
                                    class="text-indigo-500 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 font-semibold text-sm hover:scale-105 active:scale-95 transition-all duration-200">
                                    + Sisipkan Disini
                                </button>
                                <span class="text-slate-300 dark:text-slate-600">|</span>
                                <button type="button" onclick="removeRundown(this)"
                                    class="text-red-500 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 font-semibold text-sm hover:scale-105 active:scale-95 transition-all duration-200">
                                    Hapus
                                </button>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div class="col-span-1">
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Tanggal</label>
                                <input type="date" name="rundown[{{ $index }}][day]" value="{{ preg_match('/^\d{4}-\d{2}-\d{2}$/', (string)$item['day']) ? $item['day'] : '' }}"
                                    class="day-input w-full px-4 py-2 border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Aktivitas Kegiatan</label>
                            <textarea name="rundown[{{ $index }}][activities]" rows="5"
                                placeholder="Jelaskan aktivitas untuk hari ini..."
                                class="activities-input w-full px-4 py-2 border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 resize-none transition-all">{{ $item['activities'] }}</textarea>
                            <p class="text-xs text-slate-400 dark:text-slate-500 mt-1">Gunakan line break untuk membuat poin-poin terpisah</p>
                        </div>
                    </div>
                    @endforeach
                @else
                    @for($i = 0; $i < 9; $i++)
                    <div class="rundown-item bg-slate-50 dark:bg-slate-800/50 p-6 rounded-xl border border-slate-200 dark:border-slate-700 mb-4 shadow-sm hover:shadow-md hover:border-orange-200 dark:hover:border-orange-800 transition-all duration-200">
                        <div class="flex justify-between items-start mb-4 border-b border-slate-200 dark:border-slate-700 pb-3">
                            <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100 day-title">
                                Hari {{ $i + 1 }}
                            </h3>
                            <div class="flex items-center space-x-3">
                                <button type="button" onclick="insertRundownItemAfter(this)"
                                    class="text-indigo-500 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 font-semibold text-sm hover:scale-105 active:scale-95 transition-all duration-200">
                                    + Sisipkan Disini
                                </button>
                                <span class="text-slate-300 dark:text-slate-600">|</span>
                                <button type="button" onclick="removeRundown(this)"
                                    class="text-red-500 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 font-semibold text-sm hover:scale-105 active:scale-95 transition-all duration-200">
                                    Hapus
                                </button>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div class="col-span-1">
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Tanggal</label>
                                <input type="date" name="rundown[{{ $i }}][day]" value=""
                                    class="day-input w-full px-4 py-2 border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Aktivitas Kegiatan</label>
                            <textarea name="rundown[{{ $i }}][activities]" rows="5"
                                placeholder="Jelaskan aktivitas untuk hari ini..."
                                class="activities-input w-full px-4 py-2 border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 resize-none transition-all"></textarea>
                            <p class="text-xs text-slate-400 dark:text-slate-500 mt-1">Gunakan line break untuk membuat poin-poin terpisah</p>
                        </div>
                    </div>
                    @endfor
                @endif
            </div>

            <button type="button" onclick="addRundownItem()"
                class="group w-full px-6 py-4 bg-slate-50 dark:bg-slate-800/50 text-slate-600 dark:text-slate-400 rounded-xl hover:bg-gradient-to-r hover:from-orange-50 hover:to-pink-50 dark:hover:from-orange-900/20 dark:hover:to-pink-900/20 hover:text-orange-600 dark:hover:text-orange-400 hover:border-orange-300 dark:hover:border-orange-700 hover:shadow-md hover:shadow-orange-500/10 transition-all duration-200 font-semibold border-2 border-dashed border-slate-300 dark:border-slate-600 flex items-center justify-center gap-2 touch-manipulation active:scale-95">
                <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                + Tambah Hari
            </button>

            <div class="flex space-x-4 pt-6 border-t border-slate-200 dark:border-slate-700">
                <a href="{{ route('products.index') }}"
                    class="flex-1 px-6 py-4 bg-red-50 dark:bg-red-900/30 text-red-500 dark:text-red-400 border-2 border-red-200 dark:border-red-800 rounded-xl shadow-sm hover:bg-red-100 dark:hover:bg-red-900/50 hover:shadow-md hover:shadow-red-500/10 dark:hover:shadow-red-900/30 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-red-400/20 transition-all duration-200 font-semibold text-center touch-manipulation">
                    Batal
                </a>
                <button type="submit"
                    class="flex-1 px-8 py-4 bg-emerald-600 dark:bg-emerald-700 text-white font-black rounded-2xl shadow-lg shadow-emerald-500/20 dark:shadow-emerald-900/30 hover:shadow-xl hover:scale-[1.02] active:scale-95 transition-all duration-300 border-b-4 border-emerald-800 dark:border-emerald-900 uppercase tracking-widest text-[10px]">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Simpan Rundown
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Custom Confirm Modal -->
<div id="deleteConfirmModal" class="fixed inset-0 z-[100] hidden items-center justify-center">
    <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity opacity-0" id="deleteModalBackdrop"></div>
    <div class="bg-white rounded-2xl shadow-2xl z-10 w-full max-w-sm p-6 transform scale-95 opacity-0 transition-all duration-300" id="deleteModalPanel">
        <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center mb-4 mx-auto">
            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
        </div>
        <h3 class="text-xl font-bold text-center text-gray-900 mb-2">Hapus Hari?</h3>
        <p class="text-center text-sm text-gray-500 mb-6 font-medium" id="deleteModalText">Apakah Anda yakin ingin menghapus Hari?</p>
        <div class="flex gap-3">
            <button type="button" onclick="closeDeleteModal()" class="flex-1 px-4 py-2 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 transition">Batal</button>
            <button type="button" id="confirmDeleteBtn" class="flex-1 px-4 py-2 bg-red-600 text-white font-semibold rounded-xl hover:bg-red-700 transition shadow-lg shadow-red-600/30">Ya, Hapus</button>
        </div>
    </div>
</div>

<!-- Custom Toast -->
<div id="toastNotification" class="fixed bottom-6 right-6 z-[100] transform translate-y-full opacity-0 transition-all duration-300 shadow-2xl rounded-xl pointer-events-none">
    <div class="bg-gray-900 text-white px-6 py-4 rounded-xl flex items-center gap-3">
        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        <span class="font-medium text-sm" id="toastText">Hari berhasil dihapus</span>
    </div>
</div>

<script>
    document.getElementById('rundownForm').addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(document.getElementById('rundownForm'));
        const rundown = [];

        // Parse form data
        const items = document.querySelectorAll('.rundown-item');

        items.forEach((item, idx) => {
            const dayInput = item.querySelector('.day-input');
            const activitiesInput = item.querySelector('.activities-input');

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
            <div class="flex justify-between items-start mb-4 border-b pb-3">
                <h3 class="text-lg font-bold text-gray-900 day-title">Hari ${itemCount + 1}</h3>
                <div class="flex items-center space-x-3">
                    <button type="button" onclick="insertRundownItemAfter(this)"
                        class="text-indigo-600 hover:text-indigo-800 font-semibold text-sm">
                        + Sisipkan Disini
                    </button>
                    <span class="text-gray-300">|</span>
                    <button type="button" onclick="removeRundown(this)"
                        class="text-red-600 hover:text-red-900 font-semibold text-sm">
                        Hapus
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div class="col-span-1">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal</label>
                    <input type="date" name="rundown[${itemCount}][day]" value=""
                        class="day-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Aktivitas Kegiatan</label>
                <textarea name="rundown[${itemCount}][activities]" rows="5"
                    placeholder="Jelaskan aktivitas untuk hari ini..."
                    class="activities-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 resize-none"></textarea>
                <p class="text-xs text-gray-500 mt-1">Gunakan line break untuk membuat poin-poin terpisah</p>
            </div>
        `;

        container.appendChild(newItem);
        updateRundownIndexes();
    }

    function insertRundownItemAfter(button) {
        const item = button.closest('.rundown-item');
        const itemCount = document.querySelectorAll('.rundown-item').length;

        const newItem = document.createElement('div');
        newItem.className = 'rundown-item bg-indigo-50 p-6 rounded-xl border-2 border-indigo-400 mb-4 shadow-lg transform opacity-0 scale-95 transition-all duration-500 ease-out';
        newItem.innerHTML = `
            <div class="flex justify-between items-start mb-4 border-b pb-3">
                <h3 class="text-lg font-bold text-gray-900 day-title">Hari ${itemCount + 1}</h3>
                <div class="flex items-center space-x-3">
                    <button type="button" onclick="insertRundownItemAfter(this)"
                        class="text-indigo-600 hover:text-indigo-800 font-semibold text-sm">
                        + Sisipkan Disini
                    </button>
                    <span class="text-gray-300">|</span>
                    <button type="button" onclick="removeRundown(this)"
                        class="text-red-600 hover:text-red-900 font-semibold text-sm">
                        Hapus
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div class="col-span-1">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal</label>
                    <input type="date" name="rundown[${itemCount}][day]" value=""
                        class="day-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Aktivitas Kegiatan</label>
                <textarea name="rundown[${itemCount}][activities]" rows="5"
                    placeholder="Jelaskan aktivitas untuk hari ini..."
                    class="activities-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 resize-none"></textarea>
                <p class="text-xs text-gray-500 mt-1">Gunakan line break untuk membuat poin-poin terpisah</p>
            </div>
        `;

        item.insertAdjacentElement('afterend', newItem);
        updateRundownIndexes();

        // 1. Auto-scroll focus gently
        newItem.scrollIntoView({ behavior: 'smooth', block: 'center' });

        // 2. Trigger pop-in animation
        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                newItem.classList.remove('opacity-0', 'scale-95');
                newItem.classList.add('opacity-100', 'scale-100');
            });
        });

        // 3. Remove highlight slowly to blend in
        setTimeout(() => {
            newItem.classList.remove('bg-indigo-50', 'border-2', 'border-indigo-400', 'shadow-lg');
            newItem.classList.add('bg-gray-50', 'border', 'border-gray-200', 'shadow-sm');
        }, 1500);
    }

    let itemToDelete = null;

    function removeRundown(button) {
        itemToDelete = button.closest('.rundown-item');
        const dayTitle = itemToDelete.querySelector('.day-title').textContent.trim();
        
        document.getElementById('deleteModalText').textContent = `Apakah Anda yakin ingin menghapus ${dayTitle}? Aktivitas di hari ini akan hilang.`;
        
        const modal = document.getElementById('deleteConfirmModal');
        const backdrop = document.getElementById('deleteModalBackdrop');
        const panel = document.getElementById('deleteModalPanel');
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
            backdrop.classList.add('opacity-100');
            panel.classList.remove('scale-95', 'opacity-0');
            panel.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteConfirmModal');
        const backdrop = document.getElementById('deleteModalBackdrop');
        const panel = document.getElementById('deleteModalPanel');
        
        backdrop.classList.remove('opacity-100');
        backdrop.classList.add('opacity-0');
        panel.classList.remove('scale-100', 'opacity-100');
        panel.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            itemToDelete = null;
        }, 300);
    }

    document.getElementById('confirmDeleteBtn').addEventListener('click', () => {
        if(itemToDelete) {
            const targetItem = itemToDelete;
            const dayTitle = targetItem.querySelector('.day-title').textContent.trim();
            
            // Animate exit
            targetItem.classList.add('transition-all', 'duration-[400ms]', 'ease-in', 'scale-90', 'opacity-0', 'bg-red-50', 'border-red-400');
            
            // Remove after animation finishes
            setTimeout(() => {
                targetItem.remove();
                updateRundownIndexes();
            }, 400);
            
            closeDeleteModal();
            showToast(`${dayTitle} berhasil dihapus dari tampilan.`);
        }
    });

    function showToast(message) {
        const toast = document.getElementById('toastNotification');
        document.getElementById('toastText').textContent = message;
        
        toast.classList.remove('translate-y-full', 'opacity-0');
        toast.classList.add('translate-y-0', 'opacity-100');
        
        setTimeout(() => {
            toast.classList.remove('translate-y-0', 'opacity-100');
            toast.classList.add('translate-y-full', 'opacity-0');
        }, 3000);
    }

    function updateRundownIndexes() {
        const items = document.querySelectorAll('.rundown-item');
        items.forEach((item, index) => {
            const title = item.querySelector('.day-title');
            if (title) title.textContent = 'Hari ' + (index + 1);
            
            const dayInput = item.querySelector('.day-input');
            if (dayInput) dayInput.name = 'rundown[' + index + '][day]';
            
            const activitiesInput = item.querySelector('.activities-input');
            if (activitiesInput) activitiesInput.name = 'rundown[' + index + '][activities]';
        });
    }
</script>
@endsection
