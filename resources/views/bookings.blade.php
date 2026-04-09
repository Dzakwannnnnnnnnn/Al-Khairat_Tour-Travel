@extends('layouts.layout')
@section('title', 'Data Pemesanan Transaksi')
@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-6 bg-white rounded-lg shadow-sm">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-orange/10 text-orange rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Manajemen Pemesanan (Bookings)</h2>
                <p class="text-sm text-slate-500 mt-1">Kelola pendaftaran jamaah ke paket umrah yang tersedia.</p>
            </div>
        </div>
        <button onclick="document.getElementById('addBookingModal').classList.remove('hidden')" class="mt-4 sm:mt-0 flex items-center space-x-2 bg-charcoal text-white px-4 py-2 rounded-lg hover:bg-orange transition shadow-sm font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            <span>Buat Pemesanan Baru</span>
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
            <span class="font-medium">Gagal!</span> Terdapat error pada form.
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
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Kode Booking</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Nama Jamaah</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Paket Terpilih</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Status Pembayaran</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-900 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($bookings as $booking)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 align-top">
                            <span class="font-mono text-sm font-bold text-orange group-hover:text-gold transition-colors">{{ $booking->booking_code }}</span>
                        </td>

                        <td class="px-6 py-4 align-top">
                            <p class="font-semibold text-gray-900">{{ $booking->user->name ?? 'User Terhapus' }}</p>
                            <p class="text-xs text-gray-500">{{ $booking->user->email ?? '' }}</p>
                        </td>
                        <td class="px-6 py-4 align-top">
                            <p class="text-sm text-gray-900 font-medium">{{ $booking->product->name ?? 'Paket Terhapus' }}</p>
                        </td>
                        <td class="px-6 py-4 align-top">
                            @php
                                $statusColors = [
                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                    'dp_paid' => 'bg-blue-100 text-blue-800',
                                    'fully_paid' => 'bg-green-100 text-green-800',
                                    'completed' => 'bg-gray-100 text-gray-800',
                                    'cancelled' => 'bg-red-100 text-red-800'
                                ];
                                $statusLabels = [
                                    'pending' => 'Menunggu Pembayaran',
                                    'dp_paid' => 'Sudah DP (Mencicil)',
                                    'fully_paid' => 'Lunas',
                                    'completed' => 'Selesai (Berangkat)',
                                    'cancelled' => 'Dibatalkan'
                                ];
                            @endphp
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$booking->status] ?? 'bg-gray-100' }}">
                                {{ $statusLabels[$booking->status] ?? $booking->status }}
                            </span>
                            @if($booking->notes)
                            <p class="text-xs text-gray-500 mt-2 truncate max-w-xs" title="{{ $booking->notes }}">Catatan: {{ $booking->notes }}</p>
                            @endif
                        </td>
                        <td class="px-6 py-4 align-top">
                            <p class="text-sm text-gray-900">{{ $booking->created_at->format('d M Y') }}</p>
                            <p class="text-xs text-gray-500">{{ $booking->created_at->format('H:i') }}</p>
                        </td>
                        <td class="px-6 py-4 align-top whitespace-nowrap">
                            <button onclick="openEditBooking({{ $booking->id }}, '{{ $booking->user_id }}', '{{ $booking->product_id }}', '{{ $booking->status }}', '{{ addslashes($booking->notes) }}')"
                                    class="text-orange hover:text-gold mr-3 text-xs font-black uppercase tracking-widest transition-colors">Edit</button>

                            <form method="POST" action="{{ route('bookings.destroy', $booking) }}" class="inline" onsubmit="return confirm('Hapus pemesanan ini secara permanen?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 text-sm font-medium">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            Belum ada satupun data pendaftaran jamaah ke dalam paket.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Pagination -->
    <div class="mt-4">
        {{ $bookings->links() }}
    </div>
</div>

<!-- Modal Create -->
<div id="addBookingModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-6 max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-900">Buat Pemesanan</h3>
            <button onclick="document.getElementById('addBookingModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form method="POST" action="{{ route('bookings.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Pilih Akun Jamaah <span class="text-red-500">*</span></label>
                <select name="user_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">-- Pilih Rekam User --</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Pilih Paket Keberangkatan <span class="text-red-500">*</span></label>
                <select name="product_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">-- Pilih Paket Umroh --</option>
                    @foreach($products as $prod)
                    <option value="{{ $prod->id }}">{{ $prod->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Status Pemesanan Pertama <span class="text-red-500">*</span></label>
                <select name="status" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-yellow-50 font-medium">
                    <option value="pending" selected>Menunggu Pembayaran (Pending)</option>
                    <option value="dp_paid">Sudah Bayar DP / Cicilan (DP Paid)</option>
                    <option value="fully_paid">Lunas (Fully Paid)</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Catatan Internal / Ekstra (Opsional)</label>
                <textarea name="notes" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Misal: Jamaah meminta kursi berdekatan dengan keluarga."></textarea>
            </div>
            
            <div class="flex space-x-3 pt-4 border-t border-gray-100">
                <button type="button" onclick="document.getElementById('addBookingModal').classList.add('hidden')" class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-medium transition">Buat Pemesanan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="editBookingModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-6 max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-900">Ubah Status Pemesanan</h3>
            <button onclick="document.getElementById('editBookingModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form id="editBookingForm" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 mb-4">
                <p class="text-xs text-gray-500 mb-1">Meskipun Akun dan Paket bisa diubah, disarankan untuk tidak mengubahnya jika tidak darurat.</p>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Pilih Akun Jamaah <span class="text-red-500">*</span></label>
                <select name="user_id" id="editBookingUser" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Pilih Paket <span class="text-red-500">*</span></label>
                <select name="product_id" id="editBookingProduct" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @foreach($products as $prod)
                    <option value="{{ $prod->id }}">{{ $prod->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Update Status Pemesanan <span class="text-red-500">*</span></label>
                <select name="status" id="editBookingStatus" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="pending">Menunggu Pembayaran (Pending)</option>
                    <option value="dp_paid">Sudah Bayar DP / Cicilan (DP Paid)</option>
                    <option value="fully_paid">Lunas (Fully Paid)</option>
                    <option value="completed">Selesai (Berangkat)</option>
                    <option value="cancelled">Dibatalkan</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Catatan Internal</label>
                <textarea name="notes" id="editBookingNotes" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>
            
            <div class="flex space-x-3 pt-4 border-t border-gray-100">
                <button type="button" onclick="document.getElementById('editBookingModal').classList.add('hidden')" class="flex-1 px-4 py-2 border border-slate-200 text-slate-500 rounded-lg hover:bg-slate-50 font-medium transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-2 bg-charcoal text-white rounded-lg hover:bg-orange font-medium transition shadow-lg shadow-orange/10">Simpan Perubahan</button>

            </div>
        </form>
    </div>
</div>

<script>
    function openEditBooking(id, user_id, product_id, status, notes) {
        document.getElementById('editBookingForm').action = '/bookings/' + id;
        document.getElementById('editBookingUser').value = user_id;
        document.getElementById('editBookingProduct').value = product_id;
        document.getElementById('editBookingStatus').value = status;
        document.getElementById('editBookingNotes').value = notes || '';
        document.getElementById('editBookingModal').classList.remove('hidden');
    }
</script>
@endsection
