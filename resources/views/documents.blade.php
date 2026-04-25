@extends('layouts.layout')
@section('title', 'Dokumen Keberangkatan Jamaah')
@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-5 md:p-6 bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-800 mb-6 gap-4 pt-6 md:pt-6">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-orange/10 dark:bg-orange/20 text-orange rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
            <div>
                <h2 class="text-lg md:text-2xl font-bold text-slate-800 dark:text-slate-100 leading-tight">Pemberkasan Jamaah</h2>
                <p class="text-[11px] md:text-sm text-slate-500 dark:text-slate-400 mt-1">Verifikasi dokumen syarat keberangkatan.</p>
            </div>
        </div>
        <button onclick="document.getElementById('addDocumentModal').classList.remove('hidden')" class="w-full md:w-auto flex items-center justify-center space-x-2 bg-charcoal dark:bg-orange text-white px-6 py-3 rounded-xl hover:bg-orange transition shadow-lg shadow-orange/10 font-bold uppercase tracking-widest text-[10px]">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
            <span>Upload Berkas</span>
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
    <div class="bg-white dark:bg-slate-900 rounded-[1.5rem] shadow-sm overflow-hidden border border-slate-100 dark:border-slate-800">
        <div class="overflow-x-auto dashboard-scroll">
            <table class="w-full min-width-[1000px]">
                <thead class="bg-slate-50/50 dark:bg-slate-900/50 border-b border-slate-100 dark:border-slate-800">
                    <tr>
                        <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Jamaah & Booking</th>
                        <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Tipe Dokumen</th>
                        <th class="px-6 py-4 text-center text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Verifikasi</th>
                        <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Catatan</th>
                        <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest sticky right-0 bg-white dark:bg-slate-900 z-10 border-l border-slate-100 dark:border-slate-800 shadow-[-10px_0_15px_rgba(0,0,0,0.02)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.2)]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50 dark:divide-slate-800">
                    @forelse($documents as $doc)
                    <tr class="hover:bg-slate-100 dark:hover:bg-slate-800/50 transition-all group">
                        <td class="px-6 py-4 align-top">
                            <span class="font-mono text-sm font-bold text-orange group-hover:text-gold transition-colors">{{ $doc->booking->booking_code ?? 'TIDAK VALID' }}</span>
                            <p class="text-sm font-black text-slate-800 dark:text-slate-100">{{ $doc->booking->user->name ?? 'User Terhapus' }}</p>
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
                                    'pending' => 'bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-400 border-yellow-200 dark:border-yellow-800',
                                    'approved' => 'bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-400 border-green-200 dark:border-green-800',
                                    'rejected' => 'bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-400 border-red-200 dark:border-red-800'
                                ];
                                $statusLabels = [
                                    'pending' => 'Pending',
                                    'approved' => 'Approved',
                                    'rejected' => 'Rejected'
                                ];
                            @endphp
                            <span class="inline-flex items-center px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-widest border {{ $statusColors[$doc->status] ?? 'bg-slate-100 dark:bg-slate-800 text-slate-500' }}">
                                {{ $statusLabels[$doc->status] ?? $doc->status }}
                            </span>
                            <p class="text-[10px] font-black text-slate-400 dark:text-slate-500 mt-2 uppercase tracking-tight">{{ $doc->created_at->format('d M Y') }}</p>
                        </td>
                        <td class="px-6 py-4 align-top">
                            <p class="text-sm text-gray-600 break-words line-clamp-3">{{ $doc->notes ?? '-' }}</p>
                        </td>
                        <td class="px-6 py-4 align-top sticky right-0 bg-white dark:bg-slate-900 group-hover:bg-slate-100 dark:group-hover:bg-[#1a2333] transition-colors z-10 border-l border-slate-100 dark:border-slate-800 shadow-[-10px_0_15px_rgba(0,0,0,0.02)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.2)]">
                            <div class="flex flex-wrap gap-2">
                                <button onclick="openEditDocument({{ $doc->id }}, '{{ $doc->booking_id }}', '{{ $doc->document_type }}', '{{ $doc->status }}', '{{ addslashes($doc->notes) }}')"
                                        class="inline-flex items-center justify-center px-3 py-1.5 bg-orange-50 text-orange-600 hover:bg-orange-100 rounded-lg text-[10px] font-bold uppercase tracking-widest transition-all shadow-sm">Review</button>

                                <form method="POST" action="{{ route('documents.destroy', $doc) }}" class="inline m-0" onsubmit="return confirm('Hapus berkas ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center justify-center px-3 py-1.5 bg-red-50 text-red-700 hover:bg-red-100 rounded-lg text-[10px] font-bold uppercase tracking-widest transition-all shadow-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-28 text-center bg-slate-50/20 dark:bg-slate-900/10">
                            <div class="flex flex-col items-center justify-center grayscale opacity-60">
                                <div class="w-24 h-24 bg-white dark:bg-slate-800 rounded-[3rem] shadow-xl flex items-center justify-center text-slate-200 dark:text-slate-700 mb-8 overflow-hidden border border-slate-100 dark:border-slate-700">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                </div>
                                <h3 class="text-xl font-black text-slate-800 dark:text-slate-200 uppercase tracking-widest">Tiada Berkas</h3>
                                <p class="text-sm text-slate-400 dark:text-slate-500 mt-2 max-w-[280px] mx-auto font-medium leading-relaxed">Belum ada jamaah yang mengunggah berkas persyaratan.</p>
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
        {{ $documents->links() }}
    </div>
</div>

<!-- Modal Create -->
<div id="addDocumentModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-[110] flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-2xl w-full max-w-lg p-8 border border-slate-100 dark:border-slate-800">
        <div class="flex justify-between items-center mb-8 border-b border-slate-50 dark:border-slate-800 pb-6">
            <h3 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Upload Berkas Baru</h3>
            <button onclick="document.getElementById('addDocumentModal').classList.add('hidden')" class="text-slate-400 hover:text-red-500 transition-colors">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Pilih Pemesanan <span class="text-red-500">*</span></label>
                <select name="booking_id" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                    <option value="">-- Cari Kode / Jamaah --</option>
                    @foreach($bookings as $bkg)
                    <option value="{{ $bkg->id }}">{{ $bkg->booking_code }} - {{ optional($bkg->user)->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Jenis Berkas <span class="text-red-500">*</span></label>
                    <select name="document_type" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                        <option value="ktp_kk">KTP & KK</option>
                        <option value="passport">Paspor</option>
                        <option value="visa">Visa</option>
                        <option value="meningitis">Vaksin Meningitis</option>
                        <option value="photo_3x4">Pas Foto</option>
                        <option value="other">Lainnya</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Status Awal</label>
                    <select name="status" required class="w-full px-5 py-4 bg-orange/5 dark:bg-orange/10 border-2 border-orange/20 dark:border-orange/30 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-orange">
                        <option value="pending" selected>Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">File (PDF/JPG/PNG) <span class="text-red-500">*</span></label>
                <input type="file" name="file_path" required class="w-full px-5 py-3.5 bg-slate-50 dark:bg-slate-800 border-2 border-dashed border-slate-200 dark:border-slate-700 rounded-2xl text-xs font-bold text-slate-400 file:hidden cursor-pointer hover:border-orange transition-all">
                <p class="text-[9px] text-slate-400 font-bold uppercase mt-1 tracking-tighter">* Maksimal 5MB</p>
            </div>

            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Catatan Internal</label>
                <textarea name="notes" rows="2" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200" placeholder="Opsional..."></textarea>
            </div>
            
            <div class="flex gap-4 pt-6 border-t border-slate-50 dark:border-slate-800">
                <button type="button" onclick="document.getElementById('addDocumentModal').classList.add('hidden')" class="flex-1 px-8 py-4 bg-slate-100 dark:bg-slate-800 text-slate-500 rounded-2xl hover:bg-slate-200 transition font-black uppercase tracking-widest text-[10px]">Batal</button>
                <button type="submit" class="flex-1 px-8 py-4 bg-charcoal dark:bg-orange text-white rounded-2xl hover:bg-orange transition font-black uppercase tracking-widest text-[10px] shadow-xl shadow-orange/20">Upload Berkas</button>
            </div>
        </form>
    </div>
</div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editDocumentModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-[110] flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-2xl w-full max-w-lg p-8 border border-slate-100 dark:border-slate-800">
        <div class="flex justify-between items-center mb-8 border-b border-slate-50 dark:border-slate-800 pb-6">
            <h3 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Verifikasi Berkas</h3>
            <button onclick="document.getElementById('editDocumentModal').classList.add('hidden')" class="text-slate-400 hover:text-red-500 transition-colors">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form id="editDocumentForm" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Data Jamaah</label>
                <select name="booking_id" id="editDocumentBooking" required class="w-full px-5 py-4 bg-slate-100 dark:bg-slate-800/50 border-2 border-slate-200 dark:border-slate-700 rounded-2xl text-sm font-bold text-slate-400 cursor-not-allowed">
                    @foreach($bookings as $bkg)
                    <option value="{{ $bkg->id }}">{{ $bkg->booking_code }} - {{ optional($bkg->user)->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Tipe Berkas</label>
                    <select name="document_type" id="editDocumentType" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200">
                        <option value="ktp_kk">KTP & KK</option>
                        <option value="passport">Paspor</option>
                        <option value="visa">Visa</option>
                        <option value="meningitis">Vaksin Meningitis</option>
                        <option value="photo_3x4">Pas Foto</option>
                        <option value="other">Lainnya</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Hasil Validasi <span class="text-red-500">*</span></label>
                    <select name="status" id="editDocumentStatus" required class="w-full px-5 py-4 bg-orange/5 dark:bg-orange/10 border-2 border-orange/20 dark:border-orange/30 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-orange">
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Update File (Opsional)</label>
                <input type="file" name="file_path" accept="image/*,application/pdf" class="w-full px-5 py-3.5 bg-slate-50 dark:bg-slate-800 border-2 border-dashed border-slate-200 dark:border-slate-700 rounded-2xl text-xs font-bold text-slate-400 file:hidden cursor-pointer hover:border-orange transition-all">
            </div>

            <div>
                <label class="block text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2">Catatan Jamaah</label>
                <textarea name="notes" id="editDocumentNotes" rows="2" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-100 dark:border-slate-700 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700 dark:text-slate-200" placeholder="Informasikan jika ada revisi..."></textarea>
            </div>
            
            <div class="flex gap-4 pt-6 border-t border-slate-50 dark:border-slate-800">
                <button type="button" onclick="document.getElementById('editDocumentModal').classList.add('hidden')" class="flex-1 px-8 py-4 bg-slate-100 dark:bg-slate-800 text-slate-500 rounded-2xl hover:bg-slate-200 transition font-black uppercase tracking-widest text-[10px]">Batal</button>
                <button type="submit" class="flex-1 px-8 py-4 bg-charcoal dark:bg-orange text-white rounded-2xl hover:bg-orange transition font-black uppercase tracking-widest text-[10px] shadow-xl shadow-orange/20">Simpan Evaluasi</button>
            </div>
        </form>
    </div>
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
