@extends('layouts.layout')
@section('title', 'Dokumen Keberangkatan Jamaah')
@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-6 bg-white rounded-lg shadow-sm">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-orange/10 text-orange rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Manajemen Pemberkasan Jamaah</h2>
                <p class="text-sm text-slate-500 mt-1">Upload dan verifikasi Paspor, KTP, Visa, atau dokumen syarat lainnya.</p>
            </div>
        </div>
        <button onclick="document.getElementById('addDocumentModal').classList.remove('hidden')" class="mt-4 sm:mt-0 flex items-center space-x-2 bg-charcoal text-white px-4 py-2 rounded-lg hover:bg-orange transition shadow-sm font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
            <span>Upload Dokumen Baru</span>
        </button>

    </div>

    <!-- Alert -->
    @if(session('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 flex items-center shadow-sm">
        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
        <span class="font-medium">Berhasil!</span>&nbsp;{{ session('success') }}
    </div>
    @endif
    
    @if($errors->any())
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 flex flex-col shadow-sm">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
            <span class="font-medium">Validasi Gagal!</span> Pastikan file sesuai syarat (Max 5MB).
        </div>
        <ul class="mt-1.5 ml-7 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Table Section -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[1000px]">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Jamaah & Booking</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Tipe Data / File</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold text-gray-900 uppercase">Masa Verifikasi</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Catatan</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($documents as $doc)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 align-top">
                            <span class="font-mono text-sm font-bold text-orange group-hover:text-gold transition-colors">{{ $doc->booking->booking_code ?? 'TIDAK VALID' }}</span>
                            <p class="text-sm font-semibold text-slate-700">{{ $doc->booking->user->name ?? 'User Terhapus' }}</p>
                        </td>

                        <td class="px-6 py-4 align-top">
                            <p class="text-sm font-bold text-gray-900 uppercase">{{ str_replace('_', ' ', $doc->document_type) }}</p>
                            @if($doc->file_path)
                            <a href="{{ Storage::url($doc->file_path) }}" target="_blank" class="mt-2 inline-flex items-center text-xs font-medium text-blue-600 hover:text-blue-800 hover:underline">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                Lihat Berkas Asli
                            </a>
                            @endif
                        </td>
                        <td class="px-6 py-4 align-top text-center">
                            @php
                                $statusColors = [
                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                    'approved' => 'bg-green-100 text-green-800',
                                    'rejected' => 'bg-red-100 text-red-800'
                                ];
                                $statusLabels = [
                                    'pending' => 'Belum Diperiksa',
                                    'approved' => 'Validasi Sukses',
                                    'rejected' => 'Berkas Ditolak'
                                ];
                            @endphp
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$doc->status] ?? 'bg-gray-100' }}">
                                {{ $statusLabels[$doc->status] ?? $doc->status }}
                            </span>
                            <p class="text-xs text-gray-400 mt-2">Diupload: {{ $doc->created_at->format('d/m/Y') }}</p>
                        </td>
                        <td class="px-6 py-4 align-top">
                            <p class="text-sm text-gray-600 break-words line-clamp-3">{{ $doc->notes ?? '-' }}</p>
                        </td>
                        <td class="px-6 py-4 align-top whitespace-nowrap">
                            <button onclick="openEditDocument({{ $doc->id }}, '{{ $doc->booking_id }}', '{{ $doc->document_type }}', '{{ $doc->status }}', '{{ addslashes($doc->notes) }}')"
                                    class="text-orange hover:text-gold mr-3 text-xs font-black uppercase tracking-widest transition-colors">Review</button>

                            <form method="POST" action="{{ route('documents.destroy', $doc) }}" class="inline" onsubmit="return confirm('Hapus berkas ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 text-sm font-medium">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            Belum ada satupun berkas jamaah yang diunggah.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Pagination -->
    <div class="mt-4">
        {{ $documents->links() }}
    </div>
</div>

<!-- Modal Create -->
<div id="addDocumentModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-6 max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-900">Upload Pemberkasan Baru</h3>
            <button onclick="document.getElementById('addDocumentModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Pilih Pemesanan Jamaah <span class="text-red-500">*</span></label>
                <select name="booking_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">-- Cari Kode / Jamaah --</option>
                    @foreach($bookings as $bkg)
                    <option value="{{ $bkg->id }}">{{ $bkg->booking_code }} - {{ optional($bkg->user)->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Tipe / Jenis Dokumen <span class="text-red-500">*</span></label>
                <select name="document_type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 font-medium">
                    <option value="ktp_kk">Scan KTP & KK</option>
                    <option value="passport">Scan Paspor Hal Depan</option>
                    <option value="visa">SoftFile Visa (Issued)</option>
                    <option value="meningitis">Buku Vaksin Meningitis</option>
                    <option value="photo_3x4">Pas Foto Resolusi Tinggi</option>
                    <option value="other">Berkas Lainnya</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">File Pindaian (Scan/Foto) <span class="text-red-500">*</span></label>
                <input type="file" name="file_path" required class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                <p class="text-xs text-gray-500 mt-1">Dukung format PDF, JPG, PNG. Maksimal 5MB.</p>
            </div>
            
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Status Keabsahan <span class="text-red-500">*</span></label>
                    <select name="status" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-yellow-50 font-medium">
                        <option value="pending" selected>Belum Diperiksa Admin (Pending)</option>
                        <option value="approved">Valid / Sah (Approved)</option>
                        <option value="rejected">Tolak / Revisi Ulang (Rejected)</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Catatan Kekurangan (Opsional)</label>
                <textarea name="notes" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Foto kurang jelas, KTP buram, dll..."></textarea>
            </div>
            
            <div class="flex space-x-3 pt-4 border-t border-gray-100">
                <button type="button" onclick="document.getElementById('addDocumentModal').classList.add('hidden')" class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-medium transition">Simpan & Unggah</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editDocumentModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-6 max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-900">Review & Verifikasi Dokumen</h3>
            <button onclick="document.getElementById('editDocumentModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form id="editDocumentForm" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Terkait Jamaah <span class="text-red-500">*</span></label>
                <select name="booking_id" id="editDocumentBooking" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @foreach($bookings as $bkg)
                    <option value="{{ $bkg->id }}">{{ $bkg->booking_code }} - {{ optional($bkg->user)->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Tipe / Jenis Dokumen <span class="text-red-500">*</span></label>
                <select name="document_type" id="editDocumentType" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 font-medium">
                    <option value="ktp_kk">Scan KTP & KK</option>
                    <option value="passport">Scan Paspor Hal Depan</option>
                    <option value="visa">SoftFile Visa (Issued)</option>
                    <option value="meningitis">Buku Vaksin Meningitis</option>
                    <option value="photo_3x4">Pas Foto Resolusi Tinggi</option>
                    <option value="other">Berkas Lainnya</option>
                </select>
            </div>
            
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Aksi Validasi <span class="text-red-500">*</span></label>
                    <select name="status" id="editDocumentStatus" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 font-medium">
                        <option value="pending">Kembalikan ke Pending</option>
                        <option value="approved">Valid / Sah (Approved)</option>
                        <option value="rejected">Tolak / Revisi Ulang (Rejected)</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Timpa / Ganti File (Jika Perlu Revisi Admin)</label>
                <input type="file" name="file_path" accept="image/*,application/pdf" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                <p class="text-xs text-orange-600 mt-1">Hanya unggah jika ingin menimpa dokumen yang lama.</p>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Beri Catatan untuk Jamaah</label>
                <textarea name="notes" id="editDocumentNotes" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>
            
            <div class="flex space-x-3 pt-4 border-t border-gray-100">
                <button type="button" onclick="document.getElementById('editDocumentModal').classList.add('hidden')" class="flex-1 px-4 py-2 border border-slate-200 text-slate-500 rounded-lg hover:bg-slate-50 font-medium transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-2 bg-charcoal text-white rounded-lg hover:bg-orange font-medium transition shadow-lg shadow-orange/10">Simpan Evaluasi</button>

            </div>
        </form>
    </div>
</div>

<script>
    function openEditDocument(id, booking_id, document_type, status, notes) {
        document.getElementById('editDocumentForm').action = '/documents/' + id;
        document.getElementById('editDocumentBooking').value = booking_id;
        document.getElementById('editDocumentType').value = document_type;
        document.getElementById('editDocumentStatus').value = status;
        document.getElementById('editDocumentNotes').value = notes || '';
        document.getElementById('editDocumentModal').classList.remove('hidden');
    }
</script>
@endsection
