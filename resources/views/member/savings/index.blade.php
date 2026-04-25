@extends('layouts.layout')
@section('title', 'Tabungan Umroh Saya')
@section('content')
<div class="space-y-8 pb-10">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center p-6 md:p-10 bg-white rounded-[2rem] shadow-sm border border-slate-100 gap-6">
        <div class="flex items-center space-x-6">
            <div class="p-4 md:p-5 bg-orange/10 text-orange rounded-2xl shadow-inner">
                <svg class="w-8 md:w-10 h-8 md:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m.599-1c.51-.598.599-1.454.599-2.401 0-1.045-.09-1.903-.599-2.401M11.401 9c-.51.598-.599 1.454-.599 2.401 0 1.11.402 2.08 1 2.599" />
                </svg>
            </div>
            <div>
                <h2 class="text-xl md:text-3xl font-extrabold text-slate-800 tracking-tight leading-tight">Tabungan Umroh</h2>
                <p class="text-xs md:text-base text-slate-500 mt-1.5">Wujudkan niat suci Anda dengan menabung secara bertahap.</p>
            </div>
        </div>
        <div class="w-full md:w-auto pt-2 md:pt-0">
            <button onclick="toggleModal('newPlanModal')" class="inline-flex w-full md:w-auto px-8 py-3 bg-orange text-white rounded-xl hover:bg-orange/90 transition-all font-bold text-[10px] md:text-xs uppercase tracking-[0.2em] justify-center items-center shadow-lg shadow-orange/20">
                Buka Tabungan Baru
            </button>
        </div>
    </div>

    @if($plans->count() > 0)
    <!-- Active Savings Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-6">
            @foreach($plans as $plan)
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden transition-all hover:shadow-md">
                <!-- Plan Header -->
                <div class="p-6 md:p-8 border-b border-slate-50">
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                @if($plan->status == 'active')
                                    <span class="px-3 py-1 bg-emerald-50 text-emerald-600 text-[10px] font-bold uppercase tracking-widest border border-emerald-100 rounded-full">Aktif</span>
                                @elseif($plan->status == 'refund_requested')
                                    <span class="px-3 py-1 bg-amber-50 text-amber-600 text-[10px] font-bold uppercase tracking-widest border border-amber-100 rounded-full italic animate-pulse">Menunggu Refund</span>
                                @elseif($plan->status == 'refunded')
                                    <span class="px-3 py-1 bg-red-50 text-red-600 text-[10px] font-bold uppercase tracking-widest border border-red-100 rounded-full">Dibatalkan & Direfund</span>
                                @else
                                    <span class="px-3 py-1 bg-slate-50 text-slate-600 text-[10px] font-bold uppercase tracking-widest border border-slate-100 rounded-full">{{ $plan->status }}</span>
                                @endif
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $plan->quantity }} Tiket</span>
                            </div>
                            <p class="text-[10px] text-slate-400 font-medium">Dimulai pada {{ $plan->created_at->format('d M Y') }}</p>
                        </div>
                        <div class="flex justify-between items-start">
                            <h3 class="text-xl md:text-2xl font-black text-slate-800">{{ $plan->product->name }}</h3>
                            @if($plan->status == 'active')
                                @if($plan->refund_rejection_note)
                                    <a href="https://wa.me/6281253088788?text={{ urlencode('Halo Admin Al-Khairat, saya ingin menanyakan perihal penolakan refund tabungan saya untuk ' . $plan->product->name . '. Kenapa ditolak ya?') }}" 
                                       target="_blank"
                                       class="px-4 py-2 bg-red-600 text-white hover:bg-red-700 rounded-lg text-[9px] font-black uppercase tracking-widest transition-all shadow-lg shadow-red-200 flex items-center gap-2">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.89 9.884 0 2.225.569 3.931 1.696 5.861l-1.006 3.676 3.791-.994zm11.389-5.411c-.164-.082-.975-.481-1.126-.537-.151-.055-.26-.082-.37.082-.11.164-.424.537-.52.648-.096.11-.192.126-.357.043-.164-.083-.694-.256-1.321-.817-.487-.435-.815-.971-.911-1.136-.096-.165-.01-.254.073-.336.075-.073.164-.191.247-.287.082-.095.11-.164.164-.273.055-.109.028-.205-.014-.287-.04-.082-.37-.893-.507-1.224-.134-.324-.28-.28-.383-.285-.099-.005-.213-.006-.328-.006-.115 0-.301.041-.458.213-.158.171-.603.589-.603 1.436 0 .848.616 1.668.702 1.785.086.117 1.213 1.854 2.939 2.597.411.177.732.282.983.362.413.131.789.112 1.087.067.332-.05.975-.398 1.112-.783.137-.384.137-.714.095-.783-.04-.07-.15-.111-.314-.194z"/></svg>
                                        Konsultasi Penolakan
                                    </a>
                                @else
                                    <button onclick="openRefundModal({{ $plan->id }}, '{{ $plan->product->name }}')" class="px-4 py-2 border border-red-100 text-red-400 hover:bg-red-50 hover:text-red-600 rounded-lg text-[9px] font-bold uppercase tracking-widest transition-all">
                                        Batalkan & Refund
                                    </button>
                                @endif
                            @endif
                        </div>
                        
                        <!-- Estimation Info -->
                        @if($plan->monthly_target > 0 && $plan->status == 'active')
                        <div class="bg-orange/5 rounded-2xl p-4 flex flex-col md:flex-row justify-between items-center gap-4 border border-orange/10">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-orange/10 flex items-center justify-center text-orange">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                </div>
                                <div>
                                    <p class="text-[9px] uppercase font-black text-slate-400 tracking-widest">Target Tabungan Bulanan</p>
                                    <p class="text-sm font-black text-slate-700">Rp {{ number_format($plan->monthly_target, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            <div class="text-center md:text-right">
                                <p class="text-[9px] uppercase font-black text-slate-400 tracking-widest">Estimasi Sisa Waktu</p>
                                <p class="text-sm font-black text-orange">{{ $plan->remainingMonths() }} Bulan Lagi</p>
                            </div>
                        </div>
                        @elseif($plan->status == 'refund_requested')
                        <div class="bg-amber-50 rounded-2xl p-4 border border-amber-100 flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center text-amber-600 flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-black uppercase text-amber-700 tracking-widest">Menunggu Konfirmasi Admin</p>
                                <p class="text-xs text-amber-600 mt-0.5">Admin akan memproses pengembalian dana Rp {{ number_format($plan->currentBalance(), 0, ',', '.') }} Anda.</p>
                            </div>
                        </div>
                        @endif

                        @if($plan->refund_rejection_note && $plan->status == 'active')
                        <div class="bg-red-50/50 rounded-3xl p-6 border-2 border-red-500/10 relative overflow-hidden group">
                            <div class="flex items-start gap-5 relative z-10">
                                <div class="w-12 h-12 rounded-2xl bg-red-600 flex items-center justify-center text-white shadow-lg shadow-red-200">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" /></svg>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-2">
                                        <p class="text-xs font-black uppercase text-red-600 tracking-tight">REFUND DITOLAK ADMIN</p>
                                        <div class="h-1 w-1 rounded-full bg-red-400"></div>
                                        <span class="text-[10px] font-bold text-red-500 uppercase italic">Informasi Pembatalan</span>
                                    </div>
                                    <div class="relative">
                                        <p class="text-sm text-red-700 leading-relaxed font-black bg-white rounded-2xl p-4 border-2 border-red-100 shadow-sm">
                                            "{{ $plan->refund_rejection_note }}"
                                        </p>
                                    </div>
                                    <p class="text-[10px] text-red-600/80 mt-3 font-bold flex items-center gap-2">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                        Silakan hubungi admin atau perbaiki data rekening Anda untuk mengajukan ulang.
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Progress Bar Container -->
                        <div class="space-y-3 pt-2">
                            <div class="flex justify-between items-end">
                                <div>
                                    <p class="text-[10px] uppercase font-black text-slate-400 tracking-widest mb-1">Terkumpul</p>
                                    <p class="text-lg md:text-xl font-black text-orange">Rp {{ number_format($plan->currentBalance(), 0, ',', '.') }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-[10px] uppercase font-black text-slate-400 tracking-widest mb-1">Total Target</p>
                                    <p class="text-sm font-bold text-slate-600 italic">Rp {{ number_format($plan->target_amount, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            
                            <!-- Premium Progress Bar -->
                            <div class="h-4 bg-slate-100 rounded-full overflow-hidden relative shadow-inner border border-slate-50">
                                <div class="h-full bg-gradient-to-r from-orange to-gold transition-all duration-1000 ease-out relative" style="width: {{ $plan->progressPercentage() }}%">
                                    <div class="absolute inset-0 bg-[linear-gradient(45deg,rgba(255,255,255,0.2)_25%,transparent_25%,transparent_50%,rgba(255,255,255,0.2)_50%,rgba(255,255,255,0.2)_75%,transparent_75%,transparent)] bg-[length:20px_20px] animate-[progress-stripe_2s_linear_infinite]"></div>
                                </div>
                            </div>
                            <div class="flex justify-between items-center text-[10px] font-bold uppercase tracking-widest">
                                <span class="text-orange">{{ $plan->progressPercentage() }}% Tercapai</span>
                                <span class="text-slate-400">Sisa Rp {{ number_format($plan->target_amount - $plan->currentBalance(), 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Transaction History -->
                <div class="bg-slate-50/50">
                    <button onclick="toggleDetails({{ $plan->id }})" class="w-full flex items-center justify-between px-6 py-4 hover:bg-slate-100/50 transition-colors">
                        <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 leading-none">Riwayat Tabungan</span>
                        <svg id="chevron-{{ $plan->id }}" class="w-4 h-4 text-slate-400 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    
                    <div id="details-{{ $plan->id }}" class="hidden overflow-x-auto">
                        <table class="w-full text-left">
                            <tbody class="divide-y divide-white">
                                @forelse($plan->deposits as $deposit)
                                    <tr class="group hover:bg-white transition-colors">
                                        <td class="px-8 py-4">
                                            <p class="text-xs font-bold text-slate-700">{{ $deposit->created_at->format('d M Y') }}</p>
                                        </td>
                                        <td class="px-8 py-4 text-xs font-black text-orange">
                                            + Rp {{ number_format($deposit->amount, 0, ',', '.') }}
                                        </td>
                                        <td class="px-8 py-4">
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-widest bg-emerald-50 text-emerald-600 border border-emerald-100">
                                                Verified
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-8 py-8 text-center text-slate-400 text-[10px] uppercase font-bold tracking-widest italic leading-none">
                                            Belum ada setoran tercatat oleh Admin.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Instructions & Bank Account -->
        <div class="space-y-6">
            <div class="bg-white rounded-[2rem] p-8 text-slate-800 shadow-xl border border-slate-100 relative overflow-hidden">
                <div class="relative z-10 space-y-6">
                    <h3 class="text-lg font-black uppercase tracking-[0.1em] text-orange border-b border-slate-100 pb-4 flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
                        Cara Menabung
                    </h3>
                    
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 rounded-full bg-orange/10 flex items-center justify-center flex-shrink-0 font-black text-xs text-orange">1</div>
                            <p class="text-sm font-bold text-slate-600 leading-relaxed">Pilih paket umrah yang Anda inginkan lewat tombol <span class="text-orange font-black">Buka Tabungan Baru</span>.</p>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-8 h-8 rounded-full bg-orange/10 flex items-center justify-center flex-shrink-0 font-black text-xs text-orange">2</div>
                            <p class="text-sm font-bold text-slate-600 leading-relaxed">Lakukan transfer ke rekening resmi Al-Khairat (detail di bawah).</p>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-8 h-8 rounded-full bg-orange/10 flex items-center justify-center flex-shrink-0 font-black text-xs text-orange">3</div>
                            <p class="text-sm font-bold text-slate-600 leading-relaxed">Kirimkan bukti transfer ke Admin via <span class="text-emerald-600 font-black">WhatsApp</span> untuk pencatatan saldo.</p>
                        </div>
                    </div>

                    <!-- Bank Accounts List -->
                    <div class="space-y-4 mt-8">
                        <p class="text-[10px] uppercase font-black text-slate-400 tracking-widest pl-2 mb-2">Rekening Resmi Al-Khairat</p>
                        
                        <!-- Bank Mandiri -->
                        <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100 group hover:border-orange/30 transition-all duration-300">
                            <div class="flex items-center justify-between mb-4">
                                <img src="{{ asset('images/banks/mandiri.svg') }}" class="h-4 w-auto grayscale group-hover:grayscale-0 transition-all opacity-70 group-hover:opacity-100">
                                <button onclick="copyToClipboard('1234567890')" class="p-2 rounded-lg bg-white shadow-sm text-slate-400 hover:text-orange transition-colors" title="Salin Rekening">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>
                                </button>
                            </div>
                            <p class="text-sm font-black text-slate-800 tracking-tight">123-456-7890</p>
                            <p class="text-[9px] font-bold text-slate-400 uppercase mt-1 tracking-wider">A.N PT Al-Khairat Tour</p>
                        </div>

                        <!-- Bank BCA -->
                        <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100 group hover:border-orange/30 transition-all duration-300">
                            <div class="flex items-center justify-between mb-4">
                                <img src="{{ asset('images/banks/bca.svg') }}" class="h-4 w-auto grayscale group-hover:grayscale-0 transition-all opacity-70 group-hover:opacity-100">
                                <button onclick="copyToClipboard('888777666')" class="p-2 rounded-lg bg-white shadow-sm text-slate-400 hover:text-orange transition-colors" title="Salin Rekening">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>
                                </button>
                            </div>
                            <p class="text-sm font-black text-slate-800 tracking-tight">888-777-666</p>
                            <p class="text-[9px] font-bold text-slate-400 uppercase mt-1 tracking-wider">A.N PT Al-Khairat Tour</p>
                        </div>

                        <!-- Bank BSI -->
                        <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100 group hover:border-orange/30 transition-all duration-300">
                            <div class="flex items-center justify-between mb-4">
                                <img src="{{ asset('images/banks/bsi.svg') }}" class="h-4 w-auto grayscale group-hover:grayscale-0 transition-all opacity-70 group-hover:opacity-100">
                                <button onclick="copyToClipboard('999000111')" class="p-2 rounded-lg bg-white shadow-sm text-slate-400 hover:text-orange transition-colors" title="Salin Rekening">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>
                                </button>
                            </div>
                            <p class="text-sm font-black text-slate-800 tracking-tight">999-000-111</p>
                            <p class="text-[9px] font-bold text-slate-400 uppercase mt-1 tracking-wider">A.N PT Al-Khairat Tour</p>
                        </div>
                        
                        <div class="mt-6 pt-6 border-t border-slate-100">
                            <a href="https://wa.me/{{ $whatsapp }}" target="_blank" class="flex items-center justify-center gap-3 w-full py-4 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl transition-all font-black uppercase tracking-widest text-[10px] shadow-lg shadow-emerald-500/20">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                                Hubungi Admin WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <!-- Empty State -->
    <div class="bg-white rounded-[3rem] p-16 text-center border-2 border-dashed border-slate-100 max-w-4xl mx-auto shadow-sm">
        <div class="w-24 h-24 bg-orange/5 rounded-full flex items-center justify-center mx-auto mb-8 text-orange">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m.599-1c.51-.598.599-1.454.599-2.401 0-1.045-.09-1.903-.599-2.401M11.401 9c-.51.598-.599-1.454-.599 2.401 0 1.11.402 2.08 1 2.599" />
            </svg>
        </div>
        <h3 class="text-2xl font-black text-slate-800 mb-3 tracking-tight">Mulai Tabungan Impian Anda</h3>
        <p class="text-slate-500 text-base max-w-md mx-auto mb-10 leading-relaxed font-medium">Buka pintu keberangkatan suci Anda dengan menabung secara konsisten. Pilih paket dan mulai hari ini.</p>
        <button onclick="toggleModal('newPlanModal')" class="inline-flex items-center px-10 py-5 bg-orange text-white rounded-2xl font-black uppercase tracking-widest text-[11px] hover:bg-orange/90 transition-all shadow-xl shadow-orange/20">
            Buka Tabungan Sekarang
        </button>
    </div>
    @endif
</div>

<!-- Modal Buka Tabungan Baru -->
<div id="newPlanModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center p-4">
    <div class="fixed inset-0 bg-slate-900/40 transition-opacity" onclick="toggleModal('newPlanModal')"></div>
    <div class="relative bg-white rounded-[2.5rem] w-full max-w-lg overflow-hidden shadow-2xl border border-slate-100 transform transition-all">
        <div class="p-8 md:p-10">
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-xl font-black text-slate-800 uppercase tracking-widest">Estimasi Tabungan</h3>
                <button onclick="toggleModal('newPlanModal')" class="text-slate-400 hover:text-slate-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
            
            <form action="{{ route('member.savings.store') }}" method="POST" class="space-y-6" id="savingsForm">
                @csrf
                <div class="space-y-4">
                    <label class="text-[10px] uppercase font-black text-slate-400 tracking-widest ml-4">1. Pilih Paket Umrah</label>
                    <div class="grid grid-cols-1 gap-3">
                        @foreach($availableProducts as $product)
                            <label class="relative flex items-center p-4 border border-slate-100 rounded-2xl cursor-pointer hover:bg-slate-50 transition-all group has-[:checked]:border-orange has-[:checked]:bg-orange/5">
                                <input type="radio" name="product_id" value="{{ $product->id }}" data-price="{{ $product->price }}" class="hidden peer product-radio" required>
                                <div class="flex-1">
                                    <p class="text-xs font-bold text-slate-700 group-hover:text-orange transition-colors peer-checked:text-orange">{{ $product->name }}</p>
                                    <p class="text-[10px] text-slate-400 font-medium">Rp {{ number_format($product->price, 0, ',', '.') }} / Tiket</p>
                                </div>
                                <div class="w-5 h-5 rounded-full border-2 border-slate-200 peer-checked:border-orange peer-checked:bg-orange flex items-center justify-center transition-all">
                                    <div class="w-2 h-2 rounded-full bg-white opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-[10px] uppercase font-black text-slate-400 tracking-widest ml-4">2. Jumlah Tiket</label>
                        <input type="number" name="quantity" id="quantityInput" value="1" min="1" required class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-orange/20 outline-none transition-all font-bold text-slate-700">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] uppercase font-black text-slate-400 tracking-widest ml-4">3. Cicilan/Bulan</label>
                        <input type="number" name="monthly_target" id="monthlyInput" placeholder="Misal: 5000000" required class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-orange/20 outline-none transition-all font-bold text-slate-700">
                    </div>
                </div>

                <!-- Estimation Display -->
                <div id="estimationBox" class="hidden bg-charcoal rounded-2xl p-6 text-white text-center space-y-2 border border-white/10 shadow-lg">
                    <p class="text-[10px] uppercase font-black text-white/50 tracking-widest">Hasil Estimasi</p>
                    <div id="estimationResult" class="text-sm font-bold leading-relaxed"></div>
                </div>
                
                <button type="submit" class="w-full btn-dashboard btn-dashboard-primary py-4 text-[10px] font-black uppercase tracking-[0.2em] shadow-orange/20">
                    Konfirmasi & Mulai Menabung
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Modal Refund Tabungan -->
<div id="refundModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center p-4">
    <div class="fixed inset-0 bg-slate-900/40 transition-opacity" onclick="toggleModal('refundModal')"></div>
    <div class="relative bg-white rounded-[2.5rem] w-full max-w-md overflow-hidden shadow-2xl border border-slate-100 transform transition-all">
        <div class="p-8 md:p-10 text-center">
            <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
            </div>
            <h3 class="text-xl font-black text-slate-800 uppercase tracking-widest mb-2">Batalkan Tabungan?</h3>
            <p id="refundProductName" class="text-sm text-slate-500 font-medium mb-8 uppercase tracking-wide"></p>
            
            <form id="refundForm" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-left">
                    <div class="space-y-2">
                        <label class="text-[10px] uppercase font-black text-slate-400 tracking-widest ml-4">Nama Bank</label>
                        <input type="text" name="refund_bank_name" required placeholder="Misal: BCA, Mandiri..." class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-red-200 outline-none transition-all text-sm text-slate-700 font-bold">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] uppercase font-black text-slate-400 tracking-widest ml-4">Nomor Rekening</label>
                        <input type="text" name="refund_bank_account" required placeholder="0000-0000..." class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-red-200 outline-none transition-all text-sm text-slate-700 font-bold">
                    </div>
                </div>

                <div class="space-y-2 text-left">
                    <label class="text-[10px] uppercase font-black text-slate-400 tracking-widest ml-4">Alasan Pembatalan</label>
                    <textarea name="note" required placeholder="Mohon sertakan alasan Anda..." class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-red-200 outline-none transition-all text-sm text-slate-700 h-24 resize-none"></textarea>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <button type="button" onclick="toggleModal('refundModal')" class="w-full py-4 bg-slate-100 text-slate-500 rounded-xl font-black uppercase tracking-widest text-[10px] hover:bg-slate-200 transition-all">Batal</button>
                    <button type="submit" class="w-full py-4 bg-red-500 text-white rounded-xl font-black uppercase tracking-widest text-[10px] hover:bg-red-600 transition-all shadow-lg shadow-red-500/20">Ajukan Refund</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('styles')
<style>
    @keyframes progress-stripe {
        0% { background-position: 0 0; }
        100% { background-position: 20px 0; }
    }
</style>
@endpush

@push('scripts')
<script>
    function toggleModal(id) {
        const modal = document.getElementById(id);
        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        } else {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }

    function openRefundModal(id, productName) {
        const modal = document.getElementById('refundModal');
        const form = document.getElementById('refundForm');
        document.getElementById('refundProductName').innerText = productName;
        form.action = `/my-savings/${id}/request-refund`;
        toggleModal('refundModal');
    }

    function toggleDetails(planId) {
        const details = document.getElementById('details-' + planId);
        const chevron = document.getElementById('chevron-' + planId);
        
        if (details.classList.contains('hidden')) {
            details.classList.remove('hidden');
            chevron.classList.add('rotate-180');
        } else {
            details.classList.add('hidden');
            chevron.classList.remove('rotate-180');
        }
    }

    // Calculation Logic
    const form = document.getElementById('savingsForm');
    const radios = document.querySelectorAll('.product-radio');
    const quantityInput = document.getElementById('quantityInput');
    const monthlyInput = document.getElementById('monthlyInput');
    const estimationBox = document.getElementById('estimationBox');
    const estimationResult = document.getElementById('estimationResult');

    function calculateEstimation() {
        let selectedPrice = 0;
        radios.forEach(r => { if(r.checked) selectedPrice = parseInt(r.dataset.price); });
        
        const quantity = parseInt(quantityInput.value) || 0;
        const monthly = parseInt(monthlyInput.value) || 0;

        if (selectedPrice > 0 && quantity > 0 && monthly > 0) {
            const total = selectedPrice * quantity;
            const months = Math.ceil(total / monthly);
            
            estimationBox.classList.remove('hidden');
            estimationResult.innerHTML = `Total target Anda adalah <span class="text-gold">Rp ${new Intl.NumberFormat('id-ID').format(total)}</span>.<br>Anda perlu menabung <span class="text-gold">Rp ${new Intl.NumberFormat('id-ID').format(monthly)}</span> selama <span class="text-gold">${months} bulan</span>.`;
        } else {
            estimationBox.classList.add('hidden');
        }
    }

    radios.forEach(r => r.addEventListener('change', calculateEstimation));
    quantityInput.addEventListener('input', calculateEstimation);
    monthlyInput.addEventListener('input', calculateEstimation);

    function copyToClipboard(text) {
        const tempInput = document.createElement('input');
        tempInput.value = text;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
        
        // Premium Toast Notification
        const toast = document.createElement('div');
        toast.className = 'fixed bottom-10 left-1/2 transform -translate-x-1/2 bg-charcoal text-white px-6 py-3 rounded-2xl shadow-2xl z-[5000] font-bold text-xs uppercase tracking-widest animate__animated animate__fadeInUp';
        toast.innerHTML = '<span class="text-orange mr-2">✓</span> Rekening Salin ke Clipboard';
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.classList.replace('animate__fadeInUp', 'animate__fadeOutDown');
            setTimeout(() => toast.remove(), 500);
        }, 2000);
    }
</script>
@endpush
@endsection
