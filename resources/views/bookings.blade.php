@extends('layouts.layout')
@section('title', 'Manajemen Pemesanan')
@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center p-6 md:p-8 bg-white rounded-[2rem] shadow-sm border border-slate-100 mb-8 gap-4">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-orange/10 text-orange rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <div>
                <h2 class="text-lg md:text-2xl font-bold text-slate-800 leading-tight">Manajemen Pemesanan</h2>
                <p class="text-[11px] md:text-sm text-slate-500 mt-1">Kelola pendaftaran jamaah ke paket umrah.</p>
            </div>
        </div>
        <button onclick="document.getElementById('addBookingModal').classList.remove('hidden')" class="w-full md:w-auto flex items-center justify-center space-x-2 bg-charcoal text-white px-6 py-3.5 rounded-xl hover:bg-orange transition shadow-lg shadow-orange/10 font-bold uppercase tracking-widest text-[10px]">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            <span>Booking Baru</span>
        </button>
    </div>

    <!-- Stats Bar -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 mb-8">
        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Total Booking</p>
            <h4 class="text-2xl font-black text-slate-800">{{ $stats['total'] }}</h4>
        </div>
        <div class="bg-yellow-50 p-6 rounded-[2rem] border border-yellow-100 shadow-sm">
            <p class="text-[10px] font-black text-yellow-600/60 uppercase tracking-widest mb-1">Menunggu</p>
            <h4 class="text-2xl font-black text-yellow-600">{{ $stats['pending'] }}</h4>
        </div>
        <div class="bg-blue-50 p-6 rounded-[2rem] border border-blue-100 shadow-sm">
            <p class="text-[10px] font-black text-blue-600/60 uppercase tracking-widest mb-1">Sudah DP</p>
            <h4 class="text-2xl font-black text-blue-600">{{ $stats['dp_paid'] }}</h4>
        </div>
        <div class="bg-emerald-50 p-6 rounded-[2rem] border border-emerald-100 shadow-sm">
            <p class="text-[10px] font-black text-emerald-600/60 uppercase tracking-widest mb-1">Lunas</p>
            <h4 class="text-2xl font-black text-emerald-600">{{ $stats['fully_paid'] }}</h4>
        </div>
        <div class="bg-orange/5 p-6 rounded-[2rem] border border-orange/10 shadow-sm">
            <p class="text-[10px] font-black text-orange/60 uppercase tracking-widest mb-1">Tabungan</p>
            <h4 class="text-2xl font-black text-orange">{{ $stats['savings'] }}</h4>
        </div>
    </div>

    <!-- Alert -->
    @if(session('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 flex items-center shadow-sm mx-2">
        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
        <span class="font-medium">Berhasil!</span>&nbsp;{{ session('success') }}
    </div>
    @endif
    
    <!-- Table Section -->
    <div class="bg-white rounded-[2rem] shadow-md border border-slate-100 overflow-hidden transition-all duration-300">
        <!-- Dashboard Toolbar -->
        <div class="px-6 py-8 border-b border-slate-100 bg-gradient-to-r from-slate-50/50 to-white">
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                <!-- Tabs Container -->
                <div class="flex items-center p-1 bg-slate-100 rounded-2xl overflow-x-auto no-scrollbar max-w-full">
                    <a href="{{ route('bookings.index') }}" 
                        class="whitespace-nowrap px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ !request('status') ? 'bg-white text-orange shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">
                        Semua
                    </a>
                    <a href="{{ route('bookings.index', ['status' => 'pending']) }}" 
                        class="whitespace-nowrap px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ request('status') === 'pending' ? 'bg-white text-orange shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">
                        Pending
                    </a>
                    <a href="{{ route('bookings.index', ['status' => 'dp_paid']) }}" 
                        class="whitespace-nowrap px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ request('status') === 'dp_paid' ? 'bg-white text-orange shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">
                        DP
                    </a>
                    <a href="{{ route('bookings.index', ['status' => 'fully_paid']) }}" 
                        class="whitespace-nowrap px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ request('status') === 'fully_paid' ? 'bg-white text-orange shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">
                        Lunas
                    </a>
                    <a href="{{ route('bookings.index', ['status' => 'savings']) }}" 
                        class="whitespace-nowrap px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ request('status') === 'savings' ? 'bg-white text-orange shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">
                        Tabungan
                    </a>
                    <a href="{{ route('bookings.index', ['status' => 'completed']) }}" 
                        class="whitespace-nowrap px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ request('status') === 'completed' ? 'bg-white text-orange shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">
                        Selesai
                    </a>
                    <a href="{{ route('bookings.index', ['status' => 'cancelled']) }}" 
                        class="whitespace-nowrap px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ request('status') === 'cancelled' ? 'bg-white text-orange shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">
                        Batal
                    </a>
                </div>

                <div class="flex-1 max-w-md">
                    <form action="{{ route('bookings.index') }}" method="GET" class="relative group">
                        @if(request('status'))
                            <input type="hidden" name="status" value="{{ request('status') }}">
                        @endif
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-orange transition-colors duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="text" name="search" id="dashboardSearch" value="{{ request('search') }}" 
                            class="w-full pl-12 pr-12 py-3 bg-white border-2 border-slate-100 rounded-2xl focus:border-orange focus:ring-8 focus:ring-orange/5 focus:outline-none transition-all duration-300 text-sm font-semibold text-slate-700 placeholder:text-slate-400 placeholder:font-normal shadow-sm group-hover:border-slate-200" 
                            placeholder="Cari Nama, Email atau Kode...">
                        
                        @if(request('search'))
                            <a href="{{ route('bookings.index', request()->only('status')) }}" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-300 hover:text-red-500 transition-colors duration-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto dashboard-scroll">
            <table class="w-full" style="min-width: 950px;">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-5 text-left text-[10px] font-black text-slate-400 uppercase tracking-widest">Kode Booking</th>
                        <th class="px-6 py-5 text-left text-[10px] font-black text-slate-400 uppercase tracking-widest">Nama Jamaah</th>
                        <th class="px-6 py-5 text-left text-[10px] font-black text-slate-400 uppercase tracking-widest">Paket Terpilih</th>
                        <th class="px-6 py-5 text-center text-[10px] font-black text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="px-6 py-5 text-left text-[10px] font-black text-slate-400 uppercase tracking-widest">Tanggal</th>
                        <th class="px-6 py-5 text-left text-[10px] font-black text-slate-400 uppercase tracking-widest sticky right-0 bg-slate-50 z-10 border-l border-slate-200 shadow-[-10px_0_15px_rgba(0,0,0,0.02)]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($bookings as $booking)
                    <tr class="hover:bg-slate-50/50 transition group">
                        <td class="px-6 py-6 vertical-top border-b border-slate-50">
                            <span class="font-mono text-sm font-bold text-orange group-hover:text-gold transition-colors">{{ $booking->booking_code }}</span>
                            @if($booking->group_code)
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mt-1">Group: {{ $booking->group_code }}</p>
                            @endif
                        </td>

                        <td class="px-6 py-6 vertical-top border-b border-slate-50">
                            <p class="font-black text-slate-800 text-sm leading-tight">{{ $booking->full_name ?? $booking->user->name ?? 'User Terhapus' }}</p>
                            <p class="text-[10px] font-bold text-slate-400 mt-1 uppercase tracking-wider">{{ $booking->orderer_email ?? $booking->user->email ?? '' }}</p>
                            @if($booking->orderer_phone)
                            <p class="text-[10px] text-slate-400 mt-0.5 font-medium tracking-tighter">{{ $booking->orderer_phone }}</p>
                            @endif
                        </td>

                        <td class="px-6 py-6 vertical-top border-b border-slate-50">
                            <p class="text-sm font-bold text-slate-700 leading-tight">{{ $booking->product->name ?? 'Paket Terhapus' }}</p>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mt-1.5 flex items-center gap-1.5">
                                <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                                Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                            </p>
                        </td>

                        <td class="px-6 py-6 text-center border-b border-slate-50">
                            @php
                                $statusConf = [
                                    'pending' => ['color' => 'bg-yellow-50 text-yellow-700', 'label' => 'Pending'],
                                    'dp_paid' => ['color' => 'bg-blue-50 text-blue-700', 'label' => 'Mencicil'],
                                    'fully_paid' => ['color' => 'bg-emerald-50 text-emerald-700', 'label' => 'Lunas'],
                                    'savings' => ['color' => 'bg-orange-50 text-orange-700', 'label' => 'Tabungan'],
                                    'completed' => ['color' => 'bg-slate-100 text-slate-600', 'label' => 'Selesai'],
                                    'cancelled' => ['color' => 'bg-red-50 text-red-600', 'label' => 'Batal']
                                ];
                                $conf = $statusConf[$booking->status] ?? ['color' => 'bg-slate-50 text-slate-500', 'label' => $booking->status];
                            @endphp
                            <span class="px-4 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest {{ $conf['color'] }}">
                                {{ $conf['label'] }}
                            </span>
                            @if($booking->notes)
                            <div class="mt-3 group/note relative cursor-help">
                                <p class="text-[9px] text-slate-400 font-medium flex items-center justify-center gap-1 px-2 py-1 bg-slate-50 rounded-lg w-fit mx-auto border border-slate-100">
                                    <svg class="w-3 h-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                    Note
                                </p>
                                <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 p-3 bg-charcoal text-white text-[10px] rounded-xl opacity-0 group-hover/note:opacity-100 transition-all pointer-events-none z-50 w-48 shadow-xl border border-charcoal/50 text-center font-medium leading-relaxed">
                                    {{ $booking->notes }}
                                    <div class="absolute top-full left-1/2 -translate-x-1/2 border-8 border-transparent border-t-charcoal"></div>
                                </div>
                            </div>
                            @endif
                        </td>

                        <td class="px-6 py-6 vertical-top italic border-b border-slate-50">
                            <p class="text-sm font-bold text-slate-700 not-italic">{{ $booking->created_at->format('d M Y') }}</p>
                            <p class="text-[10px] text-slate-400 mt-1 uppercase font-black tracking-widest leading-none">{{ $booking->created_at->format('H:i') }} WIB</p>
                        </td>

                        <td class="px-6 py-6 sticky right-0 bg-white group-hover:bg-slate-50 transition-colors z-10 border-l border-slate-100 shadow-[-10px_0_15px_rgba(0,0,0,0.02)] border-b border-slate-50">
                            <div class="flex flex-wrap gap-2">
                                <button onclick="openEditBooking({{ $booking->id }}, '{{ addslashes($booking->full_name ?? $booking->user->name) }}', '{{ $booking->orderer_email ?? $booking->user->email ?? '' }}', '{{ $booking->orderer_phone ?? $booking->user->phone ?? '' }}', '{{ $booking->product_id }}', '{{ $booking->status }}', '{{ addslashes($booking->notes) }}', '{{ addslashes($booking->payment->payment_method ?? '') }}')"
                                        class="flex items-center justify-center space-x-2 bg-slate-100 text-slate-600 px-4 py-2 rounded-xl hover:bg-orange hover:text-white transition-all font-bold uppercase tracking-widest text-[9px] shadow-sm">
                                    Edit
                                </button>
                                
                                <a href="{{ route('booking.invoice.pdf', $booking->group_code ?? $booking->booking_code) }}" target="_blank" 
                                    class="flex items-center justify-center space-x-2 bg-orange text-white px-4 py-2 rounded-xl hover:bg-charcoal transition-all font-bold uppercase tracking-widest text-[9px] shadow-lg shadow-orange/20">
                                    INVOICE
                                </a>

                                <form method="POST" action="{{ route('bookings.destroy', $booking) }}" class="m-0" onsubmit="return confirm('Hapus pendaftaran ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2.5 bg-red-50 text-red-500 hover:bg-red-500 hover:text-white rounded-xl transition-all shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-28 text-center bg-slate-50/30">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-24 h-24 bg-white rounded-[3rem] shadow-xl shadow-slate-200/50 flex items-center justify-center text-slate-200 mb-8 border border-slate-100">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </div>
                                <h3 class="text-xl font-black text-slate-800 uppercase tracking-widest">Belum Ada Data</h3>
                                <p class="text-sm text-slate-400 mt-3 max-w-[280px] mx-auto font-medium leading-relaxed">Pendaftaran jamaah dalam kategori ini belum tersedia atau tidak ditemukan.</p>
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
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Jamaah / Pemesan <span class="text-red-500">*</span></label>
                    <input type="text" name="full_name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Contoh: Budi Santoso">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Email Pemesan (Opsional)</label>
                        <input type="email" name="orderer_email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="email@contoh.com">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">No. HP Pemesan (Opsional)</label>
                        <input type="tel" name="orderer_phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="0812xxxxxxxx">
                    </div>
                </div>
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
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <select name="status" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-yellow-50 font-medium">
                        <option value="pending" selected>Menunggu Pembayaran (Pending)</option>
                        <option value="dp_paid">Sudah Bayar DP / Cicilan (DP Paid)</option>
                        <option value="fully_paid">Lunas (Fully Paid)</option>
                        <option value="savings">Melalui Tabungan (Tabungan)</option>
                    </select>
                    <select name="payment_method" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">-- Metode Bayar --</option>
                        <option value="Transfer Bank">Transfer Bank</option>
                        <option value="Cash / Tunai">Cash / Tunai</option>
                        <option value="BSI - 721XXXXXXX">BSI (Official)</option>
                    </select>
                </div>
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

            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Jamaah / Pemesan <span class="text-red-500">*</span></label>
                    <input type="text" name="full_name" id="editBookingName" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Email Pemesan</label>
                        <input type="email" name="orderer_email" id="editBookingEmail" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">No. HP Pemesan</label>
                        <input type="tel" name="orderer_phone" id="editBookingPhone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>
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
                <label class="block text-sm font-semibold text-gray-700 mb-1">Update Status & Metode Bayar <span class="text-red-500">*</span></label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <select name="status" id="editBookingStatus" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="pending">Menunggu Pembayaran (Pending)</option>
                        <option value="dp_paid">Sudah Bayar DP / Cicilan (DP Paid)</option>
                        <option value="fully_paid">Lunas (Fully Paid)</option>
                        <option value="completed">Selesai (Berangkat)</option>
                        <option value="cancelled">Dibatalkan</option>
                        <option value="savings">Melalui Tabungan (Tabungan)</option>
                    </select>
                    <select name="payment_method" id="editBookingPaymentMethod" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">-- Pilih Metode Bayar --</option>
                        <option value="Transfer Bank">Transfer Bank</option>
                        <option value="Cash / Tunai">Cash / Tunai</option>
                        <option value="BSI - 721XXXXXXX">BSI (Official)</option>
                        <option value="Menunggu Pembayaran (Otomatis)">Otomatis (Midtrans)</option>
                    </select>
                </div>
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
    function openEditBooking(id, name, email, phone, product_id, status, notes, payment_method) {
        document.getElementById('editBookingForm').action = '/bookings/' + id;
        document.getElementById('editBookingName').value = name;
        document.getElementById('editBookingEmail').value = email || '';
        document.getElementById('editBookingPhone').value = phone || '';
        document.getElementById('editBookingProduct').value = product_id;
        document.getElementById('editBookingStatus').value = status;
        document.getElementById('editBookingNotes').value = notes || '';
        document.getElementById('editBookingPaymentMethod').value = payment_method || '';
        document.getElementById('editBookingModal').classList.remove('hidden');
    }

    // Search Highlighting
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const searchQuery = urlParams.get('search');
        
        if (searchQuery && searchQuery.length >= 2) {
            const table = document.querySelector('table');
            const cells = table.querySelectorAll('td p, td span.font-mono');
            const regex = new RegExp(`(${searchQuery})`, 'gi');
            
            cells.forEach(cell => {
                if (cell.textContent.toLowerCase().includes(searchQuery.toLowerCase())) {
                    const originalText = cell.innerHTML;
                    // Only highlight text nodes to avoid breaking HTML
                    cell.innerHTML = cell.innerHTML.replace(regex, '<mark class="bg-orange/20 text-orange-700 font-bold px-0.5 rounded-sm">$1</mark>');
                }
            });
        }
    });
</script>
@endsection
