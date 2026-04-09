@extends('layouts.layout')
@section('title', 'Manajemen Pembayaran')
@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-6 bg-white rounded-lg shadow-sm">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-orange/10 text-orange rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Manajemen Tabungan & Pembayaran</h2>
                <p class="text-sm text-slate-500 mt-1">Kelola transaksi pembayaran, cicilan tabungan, dan verifikasi mutasi.</p>
            </div>
        </div>
        <button onclick="document.getElementById('addPaymentModal').classList.remove('hidden')" class="mt-4 sm:mt-0 flex items-center space-x-2 bg-charcoal text-white px-4 py-2 rounded-lg hover:bg-orange transition shadow-sm font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            <span>Catat Pembayaran</span>
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
            <span class="font-medium">Upload Gagal!</span> Pastikan file adalah gambar JPG/PNG dan Max 2MB.
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
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Terkait Reservasi</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-900 uppercase">Nominal</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Metode & Tgl Bayar</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold text-gray-900 uppercase">Bukti Bayar</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold text-gray-900 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($payments as $payment)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 align-top">
                            <span class="font-mono text-sm font-bold text-orange group-hover:text-gold transition-colors">{{ $payment->booking->booking_code ?? 'TIDAK VALID' }}</span>
                            <p class="text-sm font-semibold text-slate-700">{{ $payment->booking->user->name ?? 'User Terhapus' }}</p>
                        </td>

                        <td class="px-6 py-4 align-top text-right">
                            <p class="text-sm font-bold text-gray-900">Rp {{ number_format($payment->amount, 0, ',', '.') }}</p>
                        </td>
                        <td class="px-6 py-4 align-top">
                            <p class="text-sm font-medium text-gray-800">{{ $payment->payment_method }}</p>
                            <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($payment->payment_date)->translatedFormat('d F Y') }}</p>
                        </td>
                        <td class="px-6 py-4 align-top text-center">
                            @if($payment->proof_image)
                            <a href="{{ Storage::url($payment->proof_image) }}" target="_blank" class="inline-block relative group">
                                <img src="{{ Storage::url($payment->proof_image) }}" alt="Bukti" class="h-12 w-12 object-cover rounded-md border border-gray-200 shadow-sm transition group-hover:opacity-75">
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                                    <svg class="w-6 h-6 text-white bg-black/50 rounded-full p-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                </div>
                            </a>
                            @else
                            <span class="text-xs text-gray-400 italic">Tanpa Bukti</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 align-top text-center">
                            @php
                                $statusColors = [
                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                    'verified' => 'bg-green-100 text-green-800',
                                    'rejected' => 'bg-red-100 text-red-800'
                                ];
                                $statusLabels = [
                                    'pending' => 'Pending/Review',
                                    'verified' => 'Terverifikasi (Sah)',
                                    'rejected' => 'Ditolak/Gagal'
                                ];
                            @endphp
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$payment->status] ?? 'bg-gray-100' }}">
                                {{ $statusLabels[$payment->status] ?? $payment->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 align-top whitespace-nowrap">
                            <button onclick="openEditPayment({{ $payment->id }}, '{{ $payment->booking_id }}', '{{ (int)$payment->amount }}', '{{ $payment->payment_method }}', '{{ \Carbon\Carbon::parse($payment->payment_date)->format('Y-m-d') }}', '{{ $payment->status }}')"
                                    class="text-orange hover:text-gold mr-3 text-sm font-medium uppercase tracking-widest">Edit</button>

                            <form method="POST" action="{{ route('payments.destroy', $payment) }}" class="inline" onsubmit="return confirm('Hapus histori pembayaran ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 text-sm font-medium">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            Belum ada satupun transaksi pembayaran yang dicatat.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Pagination -->
    <div class="mt-4">
        {{ $payments->links() }}
    </div>
</div>

<!-- Modal Create -->
<div id="addPaymentModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-6 max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-900">Catat Pembayaran Baru</h3>
            <button onclick="document.getElementById('addPaymentModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form method="POST" action="{{ route('payments.store') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Terkait Kode Booking <span class="text-red-500">*</span></label>
                <select name="booking_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">-- Pilih Kode Pemesanan --</option>
                    @foreach($bookings as $bkg)
                    <option value="{{ $bkg->id }}">{{ $bkg->booking_code }} - {{ optional($bkg->user)->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nominal (Rp) <span class="text-red-500">*</span></label>
                    <input type="number" name="amount" required min="1000" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Tgl Transfer <span class="text-red-500">*</span></label>
                    <input type="date" name="payment_date" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Metode / Bank Tujuan <span class="text-red-500">*</span></label>
                <input type="text" name="payment_method" placeholder="BSI a/n Al-Khairat, Cash, Mandiri, dll" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Status Verifikasi <span class="text-red-500">*</span></label>
                    <select name="status" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-yellow-50 font-medium">
                        <option value="pending" selected>Belum Cek Mutasi (Pending)</option>
                        <option value="verified">Uang Masuk / Sah (Verified)</option>
                        <option value="rejected">Ditolak / Retur (Rejected)</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Gambar Bukti Transfer (Opsional)</label>
                <input type="file" name="proof_image" accept="image/jpeg,image/png,image/jpg" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                <p class="text-xs text-gray-500 mt-1">Format. JPG / PNG maksimal 2MB.</p>
            </div>
            
            <div class="flex space-x-3 pt-4 border-t border-gray-100">
                <button type="button" onclick="document.getElementById('addPaymentModal').classList.add('hidden')" class="flex-1 px-4 py-2 border border-slate-200 text-slate-500 rounded-lg hover:bg-slate-50 font-medium transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-2 bg-charcoal text-white rounded-lg hover:bg-orange font-medium transition shadow-lg shadow-orange/10">Simpan Payment</button>

            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editPaymentModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-6 max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-900">Edit / Review Pembayaran</h3>
            <button onclick="document.getElementById('editPaymentModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form id="editPaymentForm" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Terkait Kode Booking <span class="text-red-500">*</span></label>
                <select name="booking_id" id="editPaymentBooking" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @foreach($bookings as $bkg)
                    <option value="{{ $bkg->id }}">{{ $bkg->booking_code }} - {{ optional($bkg->user)->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nominal (Rp) <span class="text-red-500">*</span></label>
                    <input type="number" name="amount" id="editPaymentAmount" required min="1000" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Tgl Transfer <span class="text-red-500">*</span></label>
                    <input type="date" name="payment_date" id="editPaymentDate" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Metode / Bank Tujuan <span class="text-red-500">*</span></label>
                <input type="text" name="payment_method" id="editPaymentMethod" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Aksi Validasi <span class="text-red-500">*</span></label>
                    <select name="status" id="editPaymentStatus" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 font-medium">
                        <option value="pending">Menunggu Pembayaran (Pending)</option>
                        <option value="verified">Uang Masuk / Sah (Verified)</option>
                        <option value="rejected">Ditolak / Retur (Rejected)</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Update Gambar Bukti (Jika Perlu)</label>
                <input type="file" name="proof_image" accept="image/jpeg,image/png,image/jpg" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                <p class="text-xs text-gray-500 mt-1">Hanya unggah jika ingin mengganti file yang ada.</p>
            </div>
            
            <div class="flex space-x-3 pt-4 border-t border-gray-100">
                <button type="button" onclick="document.getElementById('editPaymentModal').classList.add('hidden')" class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-medium transition">Simpan Review</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditPayment(id, booking_id, amount, method, date, status) {
        document.getElementById('editPaymentForm').action = '/payments/' + id;
        document.getElementById('editPaymentBooking').value = booking_id;
        document.getElementById('editPaymentAmount').value = amount;
        document.getElementById('editPaymentMethod').value = method;
        document.getElementById('editPaymentDate').value = date;
        document.getElementById('editPaymentStatus').value = status;
        document.getElementById('editPaymentModal').classList.remove('hidden');
    }
</script>
@endsection
