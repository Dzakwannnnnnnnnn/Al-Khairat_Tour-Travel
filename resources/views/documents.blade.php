@extends('layouts.layout')
@section('title', 'Dokumen Keberangkatan Jamaah')
@section('breadcrumb', 'Pemberkasan')
@section('content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="bg-white dark:bg-slate-800/50 rounded-[2.5rem] p-8 shadow-sm border border-slate-100 dark:border-slate-700 backdrop-blur-md mb-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="flex items-center space-x-6">
                <div class="p-4 bg-teal-500/10 text-teal-500 rounded-2xl hidden md:block">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-black text-slate-800 dark:text-slate-100 leading-tight tracking-tight">Pemberkasan Jamaah</h1>
                    <p class="text-sm md:text-base text-slate-400 dark:text-slate-500 font-medium mt-1">Verifikasi dokumen syarat keberangkatan.</p>
                </div>
            </div>
            <button onclick="document.getElementById('addDocumentModal').classList.remove('hidden')" class="group w-full md:w-auto bg-emerald-600 dark:bg-emerald-700 text-white px-8 py-4 rounded-2xl shadow-lg shadow-emerald-500/20 dark:shadow-emerald-900/30 hover:shadow-xl hover:scale-[1.02] active:scale-95 transition-all duration-300 flex items-center justify-center space-x-3 font-black uppercase tracking-widest text-[10px] border-b-4 border-emerald-800 dark:border-emerald-900">
                <svg class="w-5 h-5 group-hover:-translate-y-1 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                <span>Upload Berkas</span>
            </button>
        </div>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
    <div class="p-5 bg-gradient-to-r from-emerald-50 to-green-50 dark:from-emerald-900/20 dark:to-green-900/10 border-2 border-emerald-200 dark:border-emerald-800 rounded-2xl flex items-center gap-4 shadow-md shadow-emerald-500/10 animate__animated animate__fadeIn">
        <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-green-500 text-white rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg shadow-emerald-500/30">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
        </div>
        <div class="flex-1">
            <p class="font-black text-emerald-700 dark:text-emerald-400 uppercase tracking-widest text-[10px]">{{ session('success') }}</p>
        </div>
        <button onclick="this.parentElement.style.display='none'" class="text-emerald-500 hover:text-emerald-700 dark:hover:text-emerald-300 hover:scale-110 active:scale-95 transition-all duration-200 p-1">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    @endif
    
    <!-- Alert Error -->
    @if($errors->any())
    <div class="p-5 bg-gradient-to-r from-red-50 to-rose-50 dark:from-red-900/20 dark:to-rose-900/10 border-2 border-red-200 dark:border-red-800 rounded-2xl flex items-start gap-4 shadow-md shadow-red-500/10 animate__animated animate__fadeIn">
        <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-rose-500 text-white rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg shadow-red-500/30">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path></svg>
        </div>
        <div class="flex-1">
            <p class="font-black text-red-700 dark:text-red-400 uppercase tracking-widest text-[10px] mb-1">Validasi Gagal!</p>
            <ul class="list-disc list-inside space-y-0.5">
                @foreach ($errors->all() as $error)
                    <li class="text-xs text-red-600 dark:text-red-400 font-medium">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <button onclick="this.parentElement.style.display='none'" class="text-red-500 hover:text-red-700 dark:hover:text-red-300 hover:scale-110 active:scale-95 transition-all duration-200 p-1">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    @endif

    <!-- Table Section -->
    <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] shadow-lg shadow-slate-200/50 dark:shadow-slate-950/50 overflow-hidden border border-slate-100 dark:border-slate-800">
        <div class="overflow-x-auto dashboard-scroll">
            <table class="w-full min-w-[1000px]">
                <thead class="bg-gradient-to-r from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 border-b-2 border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-6 py-5 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Jamaah & Booking</th>
                        <th class="px-6 py-5 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Tipe Dokumen</th>
                        <th class="px-6 py-5 text-center text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Verifikasi</th>
                        <th class="px-6 py-5 text-left text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest">Catatan</th>
                        <th class="px-6 py-5 text-center text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest sticky right-0 bg-gradient-to-r from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 z-10 border-l-2 border-slate-200 dark:border-slate-700 shadow-[-10px_0_15px_rgba(0,0,0,0.03)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.3)] w-[140px] min-w-[140px]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    @forelse($documents as $doc)
                    <tr class="hover:bg-gradient-to-r hover:from-teal-50/50 hover:to-emerald-50/50 dark:hover:from-teal-900/10 dark:hover:to-emerald-900/10 transition-all duration-200 row-group">
                        <td class="px-6 py-4 align-top">
                            <span class="font-mono text-sm font-black text-teal-600 dark:text-teal-400 row-group-hover:text-teal-500 transition-colors">{{ $doc->booking->booking_code ?? 'TIDAK VALID' }}</span>
                            <p class="text-sm font-black text-slate-800 dark:text-slate-100">{{ $doc->booking->user->name ?? 'User Terhapus' }}</p>
                        </td>

                        <td class="px-6 py-4 align-top">
                            <p class="text-sm font-black text-slate-700 dark:text-slate-300 uppercase">{{ str_replace('_', ' ', $doc->document_type) }}</p>
                            @if($doc->file_path)
                            <a href="{{ Storage::url($doc->file_path) }}" target="_blank" class="mt-2 inline-flex items-center text-xs font-bold text-teal-600 dark:text-teal-400 hover:text-teal-800 dark:hover:text-teal-300 hover:underline transition-colors">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                Lihat Berkas Asli
                            </a>
                            @endif
                        </td>
                        <td class="px-6 py-4 align-top text-center">
                            @php
                                $statusColors = [
                                    'pending' => 'bg-gradient-to-r from-yellow-50 to-amber-50 dark:from-yellow-900/20 dark:to-amber-900/20 text-yellow-700 dark:text-yellow-400 border-yellow-200 dark:border-yellow-800',
                                    'approved' => 'bg-gradient-to-r from-emerald-50 to-green-50 dark:from-emerald-900/20 dark:to-green-900/20 text-emerald-700 dark:text-emerald-400 border-emerald-200 dark:border-emerald-800',
                                    'rejected' => 'bg-gradient-to-r from-red-50 to-rose-50 dark:from-red-900/20 dark:to-rose-900/20 text-red-700 dark:text-red-400 border-red-200 dark:border-red-800'
                                ];
                                $statusLabels = [
                                    'pending' => 'Pending',
                                    'approved' => 'Approved',
                                    'rejected' => 'Rejected'
                                ];
                            @endphp
                            <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest border-2 shadow-sm {{ $statusColors[$doc->status] ?? 'bg-slate-100 dark:bg-slate-800 text-slate-500' }}">
                                @if($doc->status === 'approved')
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5 shadow-[0_0_6px_rgba(16,185,129,0.5)] flex-shrink-0"></span>
                                @elseif($doc->status === 'rejected')
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500 mr-1.5 shadow-[0_0_6px_rgba(239,68,68,0.5)] flex-shrink-0"></span>
                                @else
                                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 mr-1.5 shadow-[0_0_6px_rgba(234,179,8,0.5)] flex-shrink-0"></span>
                                @endif
                                {{ $statusLabels[$doc->status] ?? $doc->status }}
                            </span>
                            <p class="text-[10px] font-black text-slate-400 dark:text-slate-500 mt-2 uppercase tracking-tight">{{ $doc->created_at->format('d M Y') }}</p>
                        </td>
                        <td class="px-6 py-4 align-top">
                            <p class="text-sm text-slate-600 dark:text-slate-400 break-words line-clamp-3 font-medium italic">{{ $doc->notes ?? '-' }}</p>
                        </td>
                        <td class="px-4 py-4 sticky right-0 bg-white dark:bg-slate-900 row-group-hover:bg-gradient-to-r row-group-hover:from-teal-50/50 row-group-hover:to-emerald-50/50 dark:row-group-hover:from-teal-900/10 dark:row-group-hover:to-emerald-900/10 transition-all duration-200 z-10 border-l-2 border-slate-100 dark:border-slate-800 shadow-[-10px_0_15px_rgba(0,0,0,0.03)] dark:shadow-[-10px_0_15px_rgba(0,0,0,0.3)] w-[140px] min-w-[140px]">
                            <div class="flex flex-col items-center gap-1.5">
                                <button onclick="openEditDocument({{ $doc->id }}, '{{ $doc->booking_id }}', '{{ $doc->document_type }}', '{{ $doc->status }}', '{{ addslashes($doc->notes) }}')"
                                        class="edit-group w-full inline-flex items-center justify-center px-3 py-2.5 bg-gradient-to-r from-amber-50 to-orange-50 dark:from-amber-900/30 dark:to-orange-900/30 text-amber-600 dark:text-amber-400 border border-amber-200 dark:border-amber-700 rounded-xl text-[10px] font-bold uppercase tracking-widest shadow-sm shadow-amber-500/10 dark:shadow-amber-700/20 hover:shadow-md hover:shadow-amber-500/20 dark:hover:shadow-amber-600/30 hover:scale-105 active:scale-95 transition-all duration-200 touch-manipulation">
                                    <svg class="w-3.5 h-3.5 mr-1 edit-group-hover:scale-110 edit-group-hover:rotate-12 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    Review
                                </button>

                                <form method="POST" action="{{ route('documents.destroy', $doc) }}" class="w-full m-0" onsubmit="return confirm('Hapus berkas ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-group w-full inline-flex items-center justify-center px-3 py-2.5 bg-gradient-to-r from-red-50 to-rose-50 dark:from-red-900/30 dark:to-rose-900/30 text-red-600 dark:text-red-400 border border-red-200 dark:border-red-700 rounded-xl text-[10px] font-bold uppercase tracking-widest shadow-sm shadow-red-500/10 dark:shadow-red-700/20 hover:shadow-md hover:shadow-red-500/20 dark:hover:shadow-red-600/30 hover:scale-105 active:scale-95 transition-all duration-200 touch-manipulation">
                                        <svg class="w-3.5 h-3.5 mr-1 delete-group-hover:scale-110 delete-group-hover:rotate-12 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-28 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-24 h-24 bg-gradient-to-br from-slate-100 to-slate-50 dark:from-slate-800 dark:to-slate-700 rounded-[3rem] shadow-xl flex items-center justify-center text-slate-300 dark:text-slate-600 mb-8 border-2 border-dashed border-slate-200 dark:border-slate-700">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                </div>
                                <h3 class="text-xl font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">Tiada Berkas</h3>
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
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-2xl w-full max-w-lg p-8 border border-slate-100 dark:border-slate-800 max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-8 border-b-2 border-slate-100 dark:border-slate-800 pb-6">
            <h3 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Upload Berkas Baru</h3>
            <button onclick="document.getElementById('addDocumentModal').classList.add('hidden')" class="text-slate-400 hover:text-red-500 dark:hover:text-red-400 hover:scale-110 active:scale-95 transition-all duration-200">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label class="block text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 px-1">Pilih Pemesanan <span class="text-red-500">*</span></label>
                <select name="booking_id" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-2xl focus:border-teal-500 dark:focus:border-teal-500 focus:outline-none focus:ring-4 focus:ring-teal-500/10 transition-all text-sm font-bold text-slate-700 dark:text-slate-200 shadow-sm">
                    <option value="">-- Cari Kode / Jamaah --</option>
                    @foreach($bookings as $bkg)
                    <option value="{{ $bkg->id }}">{{ $bkg->booking_code }} - {{ optional($bkg->user)->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 px-1">Jenis Berkas <span class="text-red-500">*</span></label>
                    <select name="document_type" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-2xl focus:border-teal-500 dark:focus:border-teal-500 focus:outline-none focus:ring-4 focus:ring-teal-500/10 transition-all text-sm font-bold text-slate-700 dark:text-slate-200 shadow-sm">
                        <option value="ktp_kk">KTP & KK</option>
                        <option value="passport">Paspor</option>
                        <option value="visa">Visa</option>
                        <option value="meningitis">Vaksin Meningitis</option>
                        <option value="photo_3x4">Pas Foto</option>
                        <option value="other">Lainnya</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 px-1">Status Awal</label>
                    <select name="status" required class="w-full px-5 py-4 bg-teal-50 dark:bg-teal-900/20 border-2 border-teal-200 dark:border-teal-800 rounded-2xl focus:border-teal-500 focus:outline-none focus:ring-4 focus:ring-teal-500/10 transition-all text-sm font-bold text-teal-700 dark:text-teal-400 shadow-sm">
                        <option value="pending" selected>Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 px-1">File (PDF/JPG/PNG) <span class="text-red-500">*</span></label>
                <input type="file" name="file_path" required class="w-full px-5 py-3.5 bg-slate-50 dark:bg-slate-800 border-2 border-dashed border-slate-300 dark:border-slate-600 rounded-2xl text-xs font-bold text-slate-400 file:hidden cursor-pointer hover:border-teal-500 dark:hover:border-teal-500 transition-all shadow-sm">
                <p class="text-[9px] text-slate-400 font-bold uppercase mt-1 tracking-tighter px-1">* Maksimal 10MB</p>
            </div>

            <div>
                <label class="block text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 px-1">Catatan Internal</label>
                <textarea name="notes" rows="2" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-2xl focus:border-teal-500 dark:focus:border-teal-500 focus:outline-none focus:ring-4 focus:ring-teal-500/10 transition-all text-sm font-bold text-slate-700 dark:text-slate-200 shadow-sm resize-none" placeholder="Opsional..."></textarea>
            </div>
            
            <div class="flex gap-4 pt-6 border-t-2 border-slate-100 dark:border-slate-800">
                <button type="button" onclick="document.getElementById('addDocumentModal').classList.add('hidden')" class="flex-1 px-8 py-4 bg-red-50 dark:bg-red-900/30 text-red-500 dark:text-red-400 border-2 border-red-200 dark:border-red-800 rounded-2xl shadow-sm hover:bg-red-100 dark:hover:bg-red-900/50 hover:shadow-md hover:shadow-red-500/10 dark:hover:shadow-red-900/30 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-red-400/20 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation">Batal</button>
                <button type="submit" class="flex-1 px-8 py-4 bg-gradient-to-r from-teal-500 to-emerald-500 dark:from-teal-600 dark:to-emerald-600 text-white rounded-2xl shadow-md shadow-teal-500/20 dark:shadow-teal-700/30 hover:shadow-lg hover:shadow-teal-500/40 dark:hover:shadow-teal-600/50 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-teal-400/50 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation border-2 border-teal-400/50 dark:border-teal-500/50 hover:border-teal-300 dark:hover:border-teal-400">Upload Berkas</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editDocumentModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-[110] flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-2xl w-full max-w-lg p-8 border border-slate-100 dark:border-slate-800 max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-8 border-b-2 border-slate-100 dark:border-slate-800 pb-6">
            <h3 class="text-xl font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Verifikasi Berkas</h3>
            <button onclick="document.getElementById('editDocumentModal').classList.add('hidden')" class="text-slate-400 hover:text-red-500 dark:hover:text-red-400 hover:scale-110 active:scale-95 transition-all duration-200">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form id="editDocumentForm" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 px-1">Data Jamaah</label>
                <select name="booking_id" id="editDocumentBooking" required class="w-full px-5 py-4 bg-slate-100 dark:bg-slate-800/50 border-2 border-slate-200 dark:border-slate-700 rounded-2xl text-sm font-bold text-slate-500 dark:text-slate-400 shadow-sm" disabled>
                    @foreach($bookings as $bkg)
                    <option value="{{ $bkg->id }}">{{ $bkg->booking_code }} - {{ optional($bkg->user)->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 px-1">Tipe Berkas</label>
                    <select name="document_type" id="editDocumentType" required class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-2xl focus:border-teal-500 dark:focus:border-teal-500 focus:outline-none focus:ring-4 focus:ring-teal-500/10 transition-all text-sm font-bold text-slate-700 dark:text-slate-200 shadow-sm">
                        <option value="ktp_kk">KTP & KK</option>
                        <option value="passport">Paspor</option>
                        <option value="visa">Visa</option>
                        <option value="meningitis">Vaksin Meningitis</option>
                        <option value="photo_3x4">Pas Foto</option>
                        <option value="other">Lainnya</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 px-1">Hasil Validasi <span class="text-red-500">*</span></label>
                    <select name="status" id="editDocumentStatus" required class="w-full px-5 py-4 bg-teal-50 dark:bg-teal-900/20 border-2 border-teal-200 dark:border-teal-800 rounded-2xl focus:border-teal-500 focus:outline-none focus:ring-4 focus:ring-teal-500/10 transition-all text-sm font-bold text-teal-700 dark:text-teal-400 shadow-sm">
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 px-1">Update File (Opsional)</label>
                <input type="file" name="file_path" accept="image/*,application/pdf" class="w-full px-5 py-3.5 bg-slate-50 dark:bg-slate-800 border-2 border-dashed border-slate-300 dark:border-slate-600 rounded-2xl text-xs font-bold text-slate-400 file:hidden cursor-pointer hover:border-teal-500 dark:hover:border-teal-500 transition-all shadow-sm">
            </div>

            <div>
                <label class="block text-[10px] font-black text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2 px-1">Catatan Jamaah</label>
                <textarea name="notes" id="editDocumentNotes" rows="2" class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 rounded-2xl focus:border-teal-500 dark:focus:border-teal-500 focus:outline-none focus:ring-4 focus:ring-teal-500/10 transition-all text-sm font-bold text-slate-700 dark:text-slate-200 shadow-sm resize-none" placeholder="Informasikan jika ada revisi..."></textarea>
            </div>
            
            <div class="flex gap-4 pt-6 border-t-2 border-slate-100 dark:border-slate-800">
                <button type="button" onclick="document.getElementById('editDocumentModal').classList.add('hidden')" class="flex-1 px-8 py-4 bg-red-50 dark:bg-red-900/30 text-red-500 dark:text-red-400 border-2 border-red-200 dark:border-red-800 rounded-2xl shadow-sm hover:bg-red-100 dark:hover:bg-red-900/50 hover:shadow-md hover:shadow-red-500/10 dark:hover:shadow-red-900/30 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-red-400/20 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation">Batal</button>
                <button type="submit" class="flex-1 px-8 py-4 bg-gradient-to-r from-teal-500 to-emerald-500 dark:from-teal-600 dark:to-emerald-600 text-white rounded-2xl shadow-md shadow-teal-500/20 dark:shadow-teal-700/30 hover:shadow-lg hover:shadow-teal-500/40 dark:hover:shadow-teal-600/50 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-teal-400/50 transition-all duration-200 font-black uppercase tracking-widest text-[10px] touch-manipulation border-2 border-teal-400/50 dark:border-teal-500/50 hover:border-teal-300 dark:hover:border-teal-400">Simpan Evaluasi</button>
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
