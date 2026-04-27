@extends('layouts.layout')

@section('title', 'Rundown Kegiatan - ' . $product->name)
@section('breadcrumb', 'Rundown: ' . $product->name)

@section('content')
<!-- Navigation Dock -->
<div class="print-hide">
    @include('components.dock-navigation')
</div>

<div class="max-w-5xl mx-auto py-8">
    <!-- Header -->
    <div class="mb-12 print-hide">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-4xl font-bold text-charcoal">Rundown Kegiatan</h1>
                <p class="text-slate-600 mt-2">{{ $product->name }}</p>
            </div>
            <div class="flex gap-3">
                <button onclick="window.print()" class="group flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-orange-400 to-pink-500 dark:from-orange-500 dark:to-pink-600 text-white rounded-xl shadow-md shadow-orange-500/20 dark:shadow-orange-700/30 hover:shadow-lg hover:shadow-orange-500/40 dark:hover:shadow-orange-600/50 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-orange-400/50 transition-all duration-200 font-semibold touch-manipulation border-2 border-orange-400/50 dark:border-orange-500/50 hover:border-orange-300 dark:hover:border-orange-400">
                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-300 drop-shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                    Cetak
                </button>
                <a href="javascript:history.back()" class="group flex items-center gap-2 px-6 py-3 bg-red-50 dark:bg-red-900/30 text-red-500 dark:text-red-400 rounded-xl shadow-sm border-2 border-red-200 dark:border-red-800 hover:bg-red-100 dark:hover:bg-red-900/50 hover:shadow-md hover:shadow-red-500/10 dark:hover:shadow-red-900/30 hover:scale-[1.02] active:scale-95 active:shadow-sm active:shadow-red-400/20 transition-all duration-200 font-semibold touch-manipulation">
                    <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali
                </a>
            </div>
        </div>

        <!-- Product Info Card -->
        <div class="glass-dashboard rounded-[2rem] p-8 border border-slate-100 shadow-xl mb-8 gradient-sunset print-hide">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div class="text-white">
                    <h2 class="text-2xl font-bold mb-2">{{ $product->name }}</h2>
                    <div class="flex flex-wrap gap-4 text-sm font-medium">
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.3A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z"></path>
                            </svg>
                            Durasi: {{ $product->duration ?? 'Belum ditentukan' }}
                        </span>
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                            {{ \count($product->rundown ?? []) }} Hari
                        </span>
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8.16 5.314l4.897-1.596A1 1 0 0114.791 4.71l1.447 4.43a1 1 0 01-.537 1.300L9.604 12.7a1 1 0 11-.648-1.892l4.221-1.378-.36-1.1H8.16a1 1 0 110-2z"></path>
                            </svg>
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </span>
                    </div>
                </div>
                <div class="flex-shrink-0">
                    <a href="{{ route('booking.page', $product) }}"
                        class="inline-flex items-center justify-center gap-3 px-8 py-4 bg-white text-orange font-bold rounded-[1.5rem] shadow-xl hover:shadow-2xl transition-all hover:scale-105">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                        Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Rundown List -->
    @if($product->rundown && is_array($product->rundown) && count($product->rundown) > 0)
        <!-- Rundown Table (Print Only) -->
        <div class="print-only w-full">
            <h2 class="text-2xl font-bold text-center mb-6">RUNDOWN KEGIATAN<br><span class="text-lg font-normal">{{ $product->name }}</span></h2>
            <table class="w-full border-collapse border border-slate-300 text-sm mb-8">
                <thead>
                    <tr class="bg-slate-100">
                        <th class="border border-slate-300 px-4 py-3 text-left w-32 uppercase tracking-widest text-[10px] font-black text-slate-500">Hari</th>
                        <th class="border border-slate-300 px-4 py-3 text-left uppercase tracking-widest text-[10px] font-black text-slate-500">Aktivitas & Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product->rundown as $index => $day)
                    <tr>
                        <td class="border border-slate-300 px-4 py-3 font-bold align-top whitespace-nowrap">{{ $day['day'] ?? "Hari " . ($index + 1) }}</td>
                        <td class="border border-slate-300 px-4 py-3 align-top">
                            @php
                                $activities = $day['activities'] ?? '';
                                $lines = explode("\n", $activities);
                            @endphp
                            @if($activities)
                                @if(count($lines) > 1)
                                    <ul class="list-disc pl-5 m-0 space-y-1">
                                        @foreach($lines as $line)
                                            @if(trim($line))
                                                <li>{{ trim($line) }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="m-0">{{ $activities }}</p>
                                @endif
                            @else
                                <span class="text-slate-400 italic">-</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="text-right mt-12 text-sm">
                <p>Dicetak pada: {{ now()->format('d M Y, H:i') }}</p>
            </div>
        </div>

        <!-- Rundown Cards (Screen Only) -->
        <div class="space-y-6 print-hide">
            @foreach($product->rundown as $index => $day)
            <div class="glass-dashboard rounded-[1.75rem] p-8 border border-slate-100 shadow-lg hover:shadow-xl transition-all duration-300">
                <!-- Day Header -->
                <div class="flex items-start gap-4 mb-6 pb-6 border-b border-slate-100">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-12 h-12 rounded-xl bg-gradient-sunset text-white font-bold text-lg shadow-lg">
                            {{ $index + 1 }}
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-charcoal">{{ $day['day'] ?? "Hari " . ($index + 1) }}</h3>
                    </div>
                </div>

                <!-- Activities -->
                <div class="prose prose-sm max-w-none">
                    <div class="text-slate-700 whitespace-pre-wrap leading-relaxed">
                        @php
                            $activities = $day['activities'] ?? '';
                            $lines = explode("\n", $activities);
                        @endphp

                        @if($activities)
                            @if(count($lines) > 1)
                                <ul class="list-disc list-inside space-y-3 pl-2">
                                    @foreach($lines as $line)
                                        @if(trim($line))
                                            <li class="text-slate-700">{{ trim($line) }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-slate-700 leading-relaxed">{{ $activities }}</p>
                            @endif
                        @else
                            <p class="text-slate-500 italic">Belum ada informasi aktivitas untuk hari ini.</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Call to Action -->
        <div class="mt-12 bg-gradient-to-r from-orange-50 to-amber-50 rounded-[2rem] p-8 border border-orange/20 shadow-lg print-hide">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <h3 class="text-2xl font-bold text-charcoal mb-2">Tertarik dengan paket ini?</h3>
                    <p class="text-slate-600">Daftar sekarang dan dapatkan pengalaman umroh yang tak terlupakan</p>
                </div>
                <a href="{{ route('booking.page', $product) }}"
                    class="inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-sunset text-white font-bold rounded-[1.5rem] shadow-lg hover:shadow-xl hover:scale-105 transition-all">
                    Daftar Sekarang
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
    @else
        <!-- Empty State -->
        <div class="glass-dashboard rounded-[2rem] p-12 border border-slate-100 shadow-lg text-center">
            <div class="w-20 h-20 rounded-2xl bg-slate-100 flex items-center justify-center mx-auto mb-6 text-slate-400">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-charcoal mb-2">Rundown Belum Tersedia</h3>
            <p class="text-slate-600 mb-6">Rundown kegiatan untuk paket ini sedang disiapkan oleh tim kami.</p>
            <a href="javascript:history.back()" class="inline-flex items-center gap-2 px-6 py-3 bg-slate-100 text-charcoal rounded-lg hover:bg-slate-200 transition font-semibold">
                ← Kembali
            </a>
        </div>
    @endif
</div>

<style>
    .gradient-sunset {
        background: linear-gradient(135deg, #FF6B35 0%, #F7931E 100%);
    }
    
    .prose ul {
        @apply list-none pl-0;
    }
    
    .prose li {
        @apply flex gap-3 mb-2;
    }
    
    .prose li::before {
        content: "✓";
        @apply text-orange font-bold flex-shrink-0;
    }

    .print-only {
        display: none;
    }

    @media print {
        body { background: white !important; }
        .print-hide { display: none !important; }
        .print-only { display: block !important; }
        .glass-dashboard {
            box-shadow: none !important;
            border: 1px solid #e2e8f0 !important;
            page-break-inside: avoid;
        }
        nav, header, footer { display: none !important; }
    }
</style>
@endsection
