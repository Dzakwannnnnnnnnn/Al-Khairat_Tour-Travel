@extends('layouts.layout')
@section('title', 'Monitoring Tabungan Umroh')
@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center p-5 md:p-6 bg-white rounded-2xl shadow-sm border border-slate-100 mb-6 gap-4 pt-6 md:pt-0">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-orange/10 text-orange rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m.599-1c.51-.598.599-1.454.599-2.401 0-1.045-.09-1.903-.599-2.401M11.401 9c-.51.598-.599 1.454-.599 2.401 0 1.11.402 2.08 1 2.599" />
                </svg>
            </div>
            <div>
                <h2 class="text-lg md:text-2xl font-bold text-slate-800 leading-tight">Monitoring Tabungan</h2>
                <p class="text-[11px] md:text-sm text-slate-500 mt-1">Pantau progres tabungan jemaah dan riwayat setoran.</p>
            </div>
        </div>
    </div>

    <!-- Stats Summary -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Total Penabung Aktif</p>
            <h4 class="text-3xl font-black text-slate-800">{{ $plans->where('status', 'active')->count() }} <span class="text-sm font-medium text-slate-400">Jemaah</span></h4>
        </div>
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Total Dana Terkumpul</p>
            <h4 class="text-3xl font-black text-orange">Rp {{ number_format($totalSavings, 0, ',', '.') }}</h4>
        </div>
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm relative overflow-hidden">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Permintaan Refund</p>
            <h4 class="text-3xl font-black text-red-500">{{ $plans->where('status', 'refund_requested')->count() }}</h4>
            @if($plans->where('status', 'refund_requested')->count() > 0)
                <div class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full animate-ping"></div>
            @endif
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-[1.5rem] md:rounded-[2rem] shadow-sm border border-slate-100">
        <div class="overflow-x-auto dashboard-scroll">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50/50 border-b border-slate-100">
                    <tr class="text-[10px] uppercase font-black text-slate-400 tracking-widest">
                        <th class="px-6 py-4">Jemaah & Status</th>
                        <th class="px-6 py-4">Paket (Tiket)</th>
                        <th class="px-6 py-4">Target Total</th>
                        <th class="px-6 py-4 text-right">Saldo Saat Ini</th>
                        <th class="px-6 py-4">Progres</th>
                        <th class="px-6 py-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($plans as $plan)
                    <tr class="group hover:bg-slate-50/50 transition-colors {{ $plan->status == 'refund_requested' ? 'bg-red-50/30' : '' }}">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 font-bold text-sm">
                                    {{ substr($plan->user->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-slate-700 leading-tight">{{ $plan->user->name }}</p>
                                    @if($plan->status == 'refund_requested')
                                        <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full text-[8px] font-black uppercase bg-red-100 text-red-600 mt-1 tracking-tighter animate-pulse">
                                            🚨 Butuh Refund
                                        </span>
                                    @elseif($plan->status == 'refunded')
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[8px] font-black uppercase bg-slate-100 text-slate-400 mt-1 tracking-tighter">
                                            Refunded
                                        </span>
                                    @else
                                        <span class="text-[9px] text-slate-400">{{ $plan->user->email }}</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-xs font-black text-slate-800 leading-tight">{{ $plan->product->name }}</p>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">{{ $plan->quantity }} Tiket</p>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-xs font-black text-slate-600 italic leading-tight">Rp {{ number_format($plan->target_amount, 0, ',', '.') }}</p>
                            @if($plan->monthly_target > 0)
                                <p class="text-[9px] text-slate-400 font-medium">Cicilan: Rp {{ number_format($plan->monthly_target, 0, ',', '.') }}/bln</p>
                            @endif
                        </td>
                        <td class="px-6 py-5 text-right">
                            <div class="flex flex-col items-end">
                                <p class="text-sm font-black text-orange">Rp {{ number_format($plan->currentBalance(), 0, ',', '.') }}</p>
                                <p class="text-[10px] text-slate-400 font-medium italic">{{ $plan->deposits->count() }}x Riwayat</p>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <div class="w-24 h-2 bg-slate-100 rounded-full overflow-hidden mb-1.5 shadow-inner">
                                <div class="h-full bg-emerald-500 transition-all duration-500" style="width: {{ $plan->progressPercentage() }}%"></div>
                            </div>
                            <span class="text-[9px] font-black text-emerald-600 tracking-widest">{{ $plan->progressPercentage() }}%</span>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex gap-2">
                                <button onclick="toggleDetails({{ $plan->id }})" class="p-2 bg-slate-50 hover:bg-slate-100 text-slate-500 rounded-lg transition-all" title="Detail">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>

                                @if($plan->status == 'active')
                                    <button onclick="openAdminDepositModal({{ $plan->id }}, '{{ $plan->user->name }}', '{{ $plan->product->name }}')" class="p-2 bg-orange/10 text-orange hover:bg-orange rounded-lg hover:text-white transition-all" title="Input Setoran">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                                    </button>
                                @endif

                                @if($plan->status == 'refund_requested')
                                    <form action="{{ route('admin.savings.approve_refund', $plan->id) }}" method="POST" onsubmit="return confirm('Konfirmasi Anda menyatakan bahwa dana Rp {{ number_format($plan->currentBalance(), 0, ',', '.') }} telah ditransfer balik ke jemaah. Lanjutkan?')" class="inline">
                                        @csrf
                                        <button type="submit" class="p-2 bg-red-100 text-red-600 hover:bg-red-600 hover:text-white rounded-lg transition-all shadow-lg shadow-red-100" title="Proses Refund">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        </button>
                                    </form>
                                @endif

                                <form action="{{ route('admin.savings.destroy', $plan->id) }}" method="POST" onsubmit="return confirm('Hapus total data rencana tabungan ini? Tindakan ini tidak bisa dibatalkan.')" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 bg-slate-50 text-slate-400 hover:bg-red-50 hover:text-red-500 rounded-lg transition-all" title="Hapus Data">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Detail & Riwayat Row -->
                    <tr id="details-{{ $plan->id }}" class="hidden bg-slate-50/30">
                        <td colspan="6" class="px-10 py-8 border-l-4 border-orange">
                            <div class="space-y-6">
                                @if($plan->status == 'refund_requested' || $plan->status == 'refunded')
                                    <div class="bg-red-50 p-4 rounded-xl border border-red-100">
                                        <p class="text-[10px] font-black uppercase text-red-600 tracking-[0.2em] mb-2">Alasan Pembatalan & Refund</p>
                                        <p class="text-xs text-red-800 leading-relaxed italic">"{{ $plan->refund_note ?? 'Tidak ada alasan spesifik.' }}"</p>
                                        <p class="text-[9px] text-red-400 mt-2">Dibatalkan pada: {{ $plan->refund_requested_at ? $plan->refund_requested_at->format('d M Y, H:i') : '-' }}</p>
                                    </div>
                                @endif

                                <div>
                                    <h5 class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-4">Riwayat Setoran Manual</h5>
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        @forelse($plan->deposits as $deposit)
                                            <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm flex items-center justify-between">
                                                <div>
                                                    <p class="text-sm font-bold text-slate-800">Rp {{ number_format($deposit->amount, 0, ',', '.') }}</p>
                                                    <p class="text-[10px] text-slate-400">{{ $deposit->created_at->format('d M Y, H:i') }}</p>
                                                    @if($deposit->note)
                                                        <p class="text-[10px] text-slate-500 italic mt-1 font-medium">"{{ $deposit->note }}"</p>
                                                    @endif
                                                </div>
                                            </div>
                                        @empty
                                            <p class="col-span-full text-center py-4 text-xs text-slate-400 italic font-medium tracking-wide">Belum ada riwayat setoran.</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-16 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-16 h-16 bg-slate-50 text-slate-200 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                                </div>
                                <h3 class="text-sm font-black text-slate-400 uppercase tracking-widest italic">Belum ada jemaah yang menabung</h3>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Setoran (Admin) -->
<div id="adminDepositModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center p-4">
    <div class="fixed inset-0 bg-slate-900/40 transition-opacity" onclick="toggleAdminDepositModal()"></div>
    <div class="relative bg-white rounded-[2rem] w-full max-w-md overflow-hidden shadow-2xl border border-slate-100 transform transition-all">
        <div class="p-8">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="text-lg font-black text-slate-800 uppercase tracking-widest leading-none">Tambah Setoran</h3>
                    <p id="adminDepositUserName" class="text-[10px] text-orange font-bold mt-2 uppercase tracking-wide"></p>
                </div>
                <button onclick="toggleAdminDepositModal()" class="text-slate-400 hover:text-slate-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
            
            <form action="{{ route('admin.savings.deposit') }}" method="POST" class="space-y-5">
                @csrf
                <input type="hidden" name="savings_plan_id" id="adminDepositPlanId">
                
                <div class="space-y-2">
                    <label class="text-[10px] uppercase font-black text-slate-400 tracking-widest ml-1">Nominal Setoran (Rp)</label>
                    <input type="number" name="amount" required min="1000" placeholder="Misal: 5000000" class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-xl focus:ring-2 focus:ring-orange/20 outline-none transition-all font-bold text-slate-800 text-sm">
                </div>
                
                <div class="space-y-2">
                    <label class="text-[10px] uppercase font-black text-slate-400 tracking-widest ml-1">Catatan Setoran</label>
                    <input type="text" name="note" placeholder="Misal: Pembayaran via Transfer Bank BSI" class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-xl focus:ring-2 focus:ring-orange/20 outline-none transition-all text-xs text-slate-600">
                </div>

                <div class="pt-4 text-center">
                    <p class="text-[9px] text-slate-400 italic mb-4">Pastikan nominal sesuai dengan bukti transfer jemaah.</p>
                    <button type="submit" class="w-full py-4 bg-orange text-white rounded-xl font-black uppercase tracking-widest text-[10px] shadow-lg shadow-orange/20 transition-all hover:scale-[1.02] active:scale-95">
                        Konfirmasi Setoran
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function toggleDetails(id) {
        const row = document.getElementById('details-' + id);
        row.classList.toggle('hidden');
    }

    function toggleAdminDepositModal() {
        const modal = document.getElementById('adminDepositModal');
        modal.classList.toggle('hidden');
    }

    function openAdminDepositModal(planId, userName, productName) {
        document.getElementById('adminDepositPlanId').value = planId;
        document.getElementById('adminDepositUserName').innerText = userName + ' | ' + productName;
        toggleAdminDepositModal();
    }
</script>
@endpush
@endsection
