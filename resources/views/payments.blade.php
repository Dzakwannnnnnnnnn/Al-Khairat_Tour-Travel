@extends('layouts.layout')
@section('title', 'Riwayat Pembayaran')
@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center p-6 md:p-8 bg-white rounded-[2rem] shadow-sm border border-slate-100 mb-8 gap-4">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-indigo-50 text-indigo-600 rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m.599-1c.51-.598.599-1.454.599-2.401 0-1.045-.09-1.903-.599-2.401M11.401 9c-.51.598-.599 1.454-.599 2.401 0 1.11.402 2.08 1 2.599" /></svg>
            </div>
            <div>
                <h2 class="text-lg md:text-2xl font-bold text-slate-800 leading-tight">Riwayat Pembayaran</h2>
                <p class="text-[11px] md:text-sm text-slate-500 mt-1">Pemantauan status keuangan jamaah dari pendaftaran.</p>
            </div>
        </div>
        <button onclick="document.getElementById('addPaymentModal').classList.remove('hidden')" class="w-full md:w-auto flex items-center justify-center space-x-2 bg-charcoal text-white px-6 py-3.5 rounded-xl hover:bg-orange transition shadow-lg shadow-orange/10 font-bold uppercase tracking-widest text-[10px]">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            <span>Catat Manual</span>
        </button>
    </div>

    <!-- Stats Bar -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 mb-8">
        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Total Pendaftar</p>
            <h4 class="text-2xl font-black text-slate-800">{{ $stats['total'] }}</h4>
        </div>
        <div class="bg-yellow-50 p-6 rounded-[2rem] border border-yellow-100 shadow-sm font-bold">
            <p class="text-[10px] font-black text-yellow-600/60 uppercase tracking-widest mb-1">Menunggu</p>
            <h4 class="text-2xl font-black text-yellow-600">{{ $stats['pending'] }}</h4>
        </div>
        <div class="bg-blue-50 p-6 rounded-[2rem] border border-blue-100 shadow-sm font-bold">
            <p class="text-[10px] font-black text-blue-600/60 uppercase tracking-widest mb-1">DP / Cicil</p>
            <h4 class="text-2xl font-black text-blue-600">{{ $stats['dp_paid'] }}</h4>
        </div>
        <div class="bg-emerald-50 p-6 rounded-[2rem] border border-emerald-100 shadow-sm font-bold">
            <p class="text-[10px] font-black text-emerald-600/60 uppercase tracking-widest mb-1">Lunas</p>
            <h4 class="text-2xl font-black text-emerald-600">{{ $stats['fully_paid'] }}</h4>
        </div>
        <div class="bg-orange/5 p-6 rounded-[2rem] border border-orange/10 shadow-sm font-bold">
            <p class="text-[10px] font-black text-orange/60 uppercase tracking-widest mb-1">Tabungan</p>
            <h4 class="text-2xl font-black text-orange">{{ $stats['savings'] }}</h4>
        </div>
    </div>

    <!-- Alert -->
    @if(session('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 flex items-center shadow-sm mx-2 font-bold">
        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
        <span>{{ session('success') }}</span>
    </div>
    @endif
    
    <!-- Table Section -->
    <div class="bg-white rounded-[2rem] shadow-md border border-slate-100 overflow-hidden transition-all duration-300">
        <!-- Dashboard Toolbar -->
        <div class="px-6 py-8 border-b border-slate-100 bg-gradient-to-r from-slate-50/50 to-white">
            <div class="flex flex-col xl:flex-row xl:items-center justify-between gap-6">
                <!-- Status Tabs -->
                <div class="flex items-center p-1 bg-slate-100 rounded-2xl overflow-x-auto no-scrollbar max-w-full">
                    <a href="{{ route('payments.index') }}" 
                        class="whitespace-nowrap px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ !request('status') ? 'bg-white text-orange shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">
                        Semua
                    </a>
                    <a href="{{ route('payments.index', ['status' => 'pending']) }}" 
                        class="whitespace-nowrap px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ request('status') === 'pending' ? 'bg-white text-orange shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">
                        Menunggu
                    </a>
                    <a href="{{ route('payments.index', ['status' => 'dp_paid']) }}" 
                        class="whitespace-nowrap px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ request('status') === 'dp_paid' ? 'bg-white text-orange shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">
                        DP / Cicil
                    </a>
                    <a href="{{ route('payments.index', ['status' => 'fully_paid']) }}" 
                        class="whitespace-nowrap px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ request('status') === 'fully_paid' ? 'bg-white text-orange shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">
                        Lunas
                    </a>
                    <a href="{{ route('payments.index', ['status' => 'savings']) }}" 
                        class="whitespace-nowrap px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ request('status') === 'savings' ? 'bg-white text-orange shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">
                        Tabungan
                    </a>
                </div>

                <div class="flex-1 max-w-md">
                    <form action="{{ route('payments.index') }}" method="GET" class="relative group">
                        @if(request('status'))
                            <input type="hidden" name="status" value="{{ request('status') }}">
                        @endif
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-orange transition-colors duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="text" name="search" id="dashboardSearch" value="{{ request('search') }}" 
                            class="w-full pl-12 pr-12 py-3 bg-white border-2 border-slate-100 rounded-2xl focus:border-orange focus:ring-8 focus:ring-orange/5 focus:outline-none transition-all duration-300 text-sm font-semibold text-slate-700 placeholder:text-slate-400 placeholder:font-normal shadow-sm group-hover:border-slate-200" 
                            placeholder="Cari Kode, Nama, atau Group...">
                        
                        @if(request('search'))
                            <a href="{{ route('payments.index', request()->only('status')) }}" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-300 hover:text-red-500 transition-colors duration-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto dashboard-scroll">
            <table class="w-full" style="min-width: 950px;">
                <thead class="bg-slate-50/50 border-b border-slate-100">
                    <tr>
                        <th class="px-6 py-5 text-left text-[10px] font-black text-slate-400 uppercase tracking-widest">Identitas Booking</th>
                        <th class="px-6 py-5 text-right text-[10px] font-black text-slate-400 uppercase tracking-widest">Harga Paket</th>
                        <th class="px-6 py-5 text-center text-[10px] font-black text-slate-400 uppercase tracking-widest">Bukti Terakhir</th>
                        <th class="px-6 py-5 text-center text-[10px] font-black text-slate-400 uppercase tracking-widest">Status Data</th>
                        <th class="px-6 py-5 text-left text-[10px] font-black text-slate-400 uppercase tracking-widest">Tgl Daftar</th>
                        <th class="px-6 py-5 text-left text-[10px] font-black text-slate-400 uppercase tracking-widest sticky right-0 bg-slate-50 z-10 border-l border-slate-100 shadow-[-10px_0_15px_rgba(0,0,0,0.02)]">Opsi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($bookings as $booking)
                    <tr class="hover:bg-slate-50/30 transition group">
                        <td class="px-6 py-6 border-b border-slate-50">
                            <span class="font-mono text-sm font-bold text-orange group-hover:text-gold transition-colors leading-none tracking-tighter">{{ $booking->booking_code }}</span>
                            <p class="text-sm font-black text-slate-800 mt-2 leading-tight">{{ $booking->full_name ?? $booking->user->name ?? 'User Terhapus' }}</p>
                            @if($booking->group_code)
                            <p class="text-[9px] font-bold text-slate-400 mt-1 uppercase tracking-widest">Group: {{ $booking->group_code }}</p>
                            @endif
                        </td>

                        <td class="px-6 py-6 text-right border-b border-slate-50">
                            <p class="text-sm font-black text-slate-800 leading-none">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                            <p class="text-[9px] font-bold text-slate-400 mt-1 uppercase tracking-widest">{{ optional($booking->product)->name }}</p>
                        </td>

                        <td class="px-6 py-6 text-center border-b border-slate-50">
                            @if($booking->payment && $booking->payment->proof_image)
                            <a href="{{ Storage::url($booking->payment->proof_image) }}" target="_blank" class="inline-block relative group/img">
                                <div class="h-12 w-12 rounded-2xl overflow-hidden border-2 border-white shadow-sm ring-1 ring-slate-200 transition-all group-hover/img:scale-110">
                                    <img src="{{ Storage::url($booking->payment->proof_image) }}" alt="Bukti" class="h-full w-full object-cover">
                                </div>
                                <div class="absolute inset-0 bg-charcoal/40 text-white text-[8px] font-black uppercase flex items-center justify-center opacity-0 group-hover/img:opacity-100 transition-opacity rounded-2xl">LIHAT</div>
                            </a>
                            @else
                            <div class="flex flex-col items-center justify-center opacity-20">
                                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" /></svg>
                                <span class="text-[8px] font-black uppercase tracking-widest mt-1">N/A</span>
                            </div>
                            @endif
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
                        </td>

                        <td class="px-6 py-6 border-b border-slate-50">
                            <p class="text-sm font-bold text-slate-700 leading-none">{{ $booking->created_at->format('d/m/y') }}</p>
                            <p class="text-[9px] text-slate-400 mt-1 uppercase font-black tracking-widest">{{ $booking->created_at->format('H:i') }} WIB</p>
                        </td>

                        <td class="px-6 py-6 sticky right-0 bg-white group-hover:bg-slate-50 transition-colors z-10 border-l border-slate-100 shadow-[-10px_0_15px_rgba(0,0,0,0.02)] border-b border-slate-50">
                            <div class="flex flex-wrap gap-2">
                                <a href="{{ route('booking.invoice.pdf', $booking->group_code ?? $booking->booking_code) }}" target="_blank" 
                                    class="flex items-center justify-center space-x-2 bg-orange text-white px-6 py-2.5 rounded-xl hover:bg-charcoal transition-all font-bold uppercase tracking-widest text-[9px] shadow-lg shadow-orange/20">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    <span>INVOICE</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-28 text-center bg-slate-50/20">
                            <div class="flex flex-col items-center justify-center grayscale opacity-60">
                                <div class="w-24 h-24 bg-white rounded-[3rem] shadow-xl flex items-center justify-center text-slate-200 mb-8 overflow-hidden border border-slate-100">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                                </div>
                                <h3 class="text-xl font-black text-slate-800 uppercase tracking-widest">Tiada Data Keuangan</h3>
                                <p class="text-sm text-slate-400 mt-2 max-w-[280px] mx-auto font-medium leading-relaxed">Belum ditemukan pendaftaran yang sesuai dengan kategori ini.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Pagination -->
    <div class="mt-8">
        {{ $bookings->links() }}
    </div>
</div>

<!-- Modal Manual Payment (Tetap dipertahankan jika admin mau input manual) -->
<div id="addPaymentModal" class="hidden fixed inset-0 bg-black/50 z-[110] flex items-center justify-center p-4">
    <div class="bg-white rounded-[2rem] shadow-2xl w-full max-w-lg p-8 max-h-[90vh] overflow-y-auto border border-slate-100">
        <div class="flex justify-between items-center mb-8 border-b border-slate-50 pb-6">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-orange/10 text-orange rounded-2xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h3 class="text-xl font-black text-slate-800 uppercase tracking-widest">Input Kas Manual</h3>
            </div>
            <button onclick="document.getElementById('addPaymentModal').classList.add('hidden')" class="text-slate-400 hover:text-red-500 transition-colors">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <form method="POST" action="{{ route('payments.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Tujuan Booking <span class="text-red-500">*</span></label>
                <select name="booking_id" required class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700">
                    <option value="">-- Pilih Rekam Pendaftaran --</option>
                    @foreach($booking_options as $bkg)
                    <option value="{{ $bkg->id }}">{{ $bkg->booking_code }} - {{ $bkg->full_name ?? $bkg->user->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Nominal Kas (Rp) <span class="text-red-500">*</span></label>
                    <input type="number" name="amount" required min="1000" placeholder="1000000" class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Tanggal Kas <span class="text-red-500">*</span></label>
                    <input type="date" name="payment_date" required value="{{ date('Y-m-d') }}" class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700">
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Metode / Bank Tujuan <span class="text-red-500">*</span></label>
                <input type="text" name="payment_method" placeholder="BSI / Cash / Mandiri" required class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-slate-700">
            </div>
            
            <div>
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Aksi Status Pendaftaran <span class="text-red-500">*</span></label>
                <select name="status" required class="w-full px-5 py-4 bg-orange/5 border-2 border-orange/20 rounded-2xl focus:border-orange focus:outline-none focus:ring-8 focus:ring-orange/5 transition-all text-sm font-bold text-orange">
                    <option value="verified" selected>Langsung Sahkan / Verifikasi</option>
                    <option value="pending">Titipkan Dulu (Pending)</option>
                    <option value="rejected">Ditolak Sejak Awal</option>
                </select>
            </div>

            <div>
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Unggah Doc Penunjang / Bukti (Opsional)</label>
                <div class="relative group">
                    <input type="file" name="proof_image" accept="image/*" class="w-full px-5 py-4 bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl text-xs font-bold text-slate-400 file:hidden cursor-pointer hover:border-orange transition-all">
                    <p class="mt-2 text-[10px] text-slate-400 font-medium">Format: JPG, PNG (Max 2MB)</p>
                </div>
            </div>
            
            <div class="flex gap-4 pt-6 border-t border-slate-50">
                <button type="button" onclick="document.getElementById('addPaymentModal').classList.add('hidden')" class="flex-1 px-8 py-4 bg-slate-100 text-slate-500 rounded-2xl hover:bg-slate-200 transition-all font-black uppercase tracking-widest text-[10px]">Batal</button>
                <button type="submit" class="flex-1 px-8 py-4 bg-charcoal text-white rounded-2xl hover:bg-orange transition-all font-black uppercase tracking-widest text-[10px] shadow-xl shadow-orange/20">Simpan Kas</button>
            </div>
        </form>
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
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Aksi Validasi <span class="text-red-500">*</span></label>
                    <select name="status" id="editPaymentStatus" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 font-medium">
                        <option value="pending">Menunggu Review (Pending)</option>
                        <option value="verified">Uang Sah / Masuk (Verified)</option>
                        <option value="rejected">Ditolak / Gagal (Rejected)</option>
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
                    cell.innerHTML = cell.innerHTML.replace(regex, '<mark class="bg-orange/20 text-orange-700 font-bold px-0.5 rounded-sm">$1</mark>');
                }
            });
        }
    });
</script>
@endsection
