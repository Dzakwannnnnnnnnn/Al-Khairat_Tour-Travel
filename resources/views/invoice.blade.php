<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVOICE #{{ $groupCode }} | Al-Khairat</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">
    
    @vite(['resources/css/app.css'])
    @stack('styles')

    <style>
        /* Force full dark on invoice page */
        .dark .invoice-section {
            background-image: none !important;
            background-color: #121212 !important;
        }
        .dark .invoice-card-light {
            background-color: #1E1E1E !important;
            background-image: none !important;
        }
        /* Catch-all: any element inside main with white-ish or light bg */
        html.dark main [class*="bg-white"],
        html.dark main [class*="from-emerald-50"],
        html.dark main [class*="from-emerald-50"] {
            background-color: #1E1E1E !important;
            background-image: none !important;
        }
        html.dark main [class*="bg-gradient-to-br"]:not(.bg-gradient-sunset) {
            background-image: none !important;
            background-color: #121212 !important;
        }
        html.dark main [class*="bg-amber-50"],
        html.dark main [class*="bg-blue-50"],
        html.dark main [class*="bg-yellow-50"],
        html.dark main [class*="bg-red-50"],
        html.dark main [class*="bg-emerald-50"] {
            background-color: #1a1a1a !important;
        }
    </style>

    <!-- Theme Detection Script -->
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="bg-bg font-sans text-text transition-colors duration-500">
    <x-logo-header />

    <main class="section-py min-h-screen pt-36 md:pt-40 pb-24 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            @php
                $primaryBooking = $bookings->first();
                $product = $primaryBooking->product;
                $packageFeatures = collect($product->features ?? [])->filter(fn ($feature) => filled($feature))->values();
                $hotelFeature = $packageFeatures->first(fn ($feature) => str_contains(strtolower($feature), 'hotel'));
                $guideContact = $product->guide_phone ?: ($whatsapp ?? null);
                $displayOrdererName = $primaryBooking->orderer_name ?? $primaryBooking->user->name;
            @endphp

            <!-- Success Message Header -->
            <div class="text-center mb-12 scroll-animate" data-animation="fade-up">
                @if($payment->status === 'verified')
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-green-500/10 text-green-500 text-4xl mb-6">
                        ✅
                    </div>
                @elseif($primaryBooking->status === 'dp_paid')
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-blue-500/10 text-blue-500 text-4xl mb-6">
                        💳
                    </div>
                @elseif($payment->status === 'pending')
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-yellow-500/10 mb-6 relative">
                        <span class="absolute inset-0 rounded-full border-4 border-yellow-300/40 border-t-orange animate-spin"></span>
                        <span class="text-yellow-600 text-xl font-black tracking-[0.3em] pl-1">...</span>
                    </div>
                @elseif($payment->status === 'rejected')
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-red-500/10 text-red-500 text-4xl mb-6">
                        !
                    </div>
                @else
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-orange/10 text-orange text-4xl mb-6">
                        i
                    </div>
                @endif

                @if($payment->status === 'verified')
                    <h1 class="text-3xl md:text-4xl font-serif font-bold text-text mb-2">Pembayaran Anda Telah Lunas</h1>
                    <p class="text-text/60 max-w-2xl mx-auto leading-relaxed">Admin telah mengonfirmasi pembayaran Anda. Di bawah ini adalah ringkasan pemesan dan detail paket perjalanan yang sudah aktif untuk rombongan Anda.</p>
                @elseif($primaryBooking->status === 'dp_paid')
                    <div class="flex items-center justify-center gap-3 mb-2 text-blue-600">
                        <span class="text-xs font-black uppercase tracking-[0.25em]">DP Terverifikasi</span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-serif font-bold text-text mb-2">Menunggu Pelunasan</h1>
                    <p class="text-text/60 max-w-lg mx-auto leading-relaxed">DP Anda telah kami terima dan verifikasi. Silakan lakukan pelunasan sesuai jadwal untuk mendapatkan akses penuh ke invoice resmi (PDF) dan keberangkatan.</p>
                @elseif($payment->status === 'rejected')
                    <h1 class="text-3xl md:text-4xl font-serif font-bold text-text mb-2">Pembayaran Ditolak</h1>
                    <p class="text-text/60 max-w-lg mx-auto leading-relaxed">Pembayaran ini belum dapat diverifikasi. Silakan cek kembali detail transfer Anda atau hubungi admin.</p>
                @elseif($payment->status === 'pending')
                    <div class="flex items-center justify-center gap-3 mb-2 text-yellow-600">
                        <span class="inline-flex h-5 w-5 rounded-full border-2 border-yellow-300/60 border-t-orange animate-spin"></span>
                        <span class="text-xs font-black uppercase tracking-[0.25em]">Pending</span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-serif font-bold text-text mb-2">Pembayaran Sedang Diproses</h1>
                    <p class="text-text/60 max-w-lg mx-auto leading-relaxed">Pendaftaran Anda sudah tercatat, tetapi status pembayaran masih pending dan sedang menunggu konfirmasi admin.</p>
                @else
                    <h1 class="text-3xl md:text-4xl font-serif font-bold text-text mb-2">Status Pembayaran</h1>
                    <p class="text-text/60 max-w-lg mx-auto leading-relaxed">Silakan lanjutkan pembayaran dan tunggu konfirmasi admin setelah pembayaran dikirim.</p>
                @endif
            </div>

            <!-- Invoice Card -->
            <div class="bg-surface dark:bg-[#0f0f0f] rounded-[2.5rem] border border-border shadow-2xl overflow-hidden mb-8 scroll-animate" data-animation="slide-up">
                <!-- Header Gradient -->
                <div class="bg-gradient-sunset p-8 text-white relative overflow-hidden">
                    <div class="absolute -right-20 -top-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 relative z-10">
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-white/70">Nomor Registrasi Grup</span>
                            <h2 class="text-2xl font-mono font-bold">#{{ $groupCode }}</h2>
                        </div>
                        <div class="text-right">
                            <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-white/70">Status Pembayaran</span>
                            <div class="flex items-center justify-end gap-2 mt-1">
                                @if($payment->status === 'verified')
                                    <span class="w-2 h-2 rounded-full bg-green-400"></span>
                                    <span class="font-bold uppercase text-sm tracking-widest">BERHASIL / TERVERIFIKASI</span>
                                @elseif($primaryBooking->status === 'dp_paid')
                                    <span class="w-2 h-2 rounded-full bg-blue-400 animate-pulse"></span>
                                    <span class="font-bold uppercase text-sm tracking-widest">SUDAH DP (MENCICIL)</span>
                                @elseif($payment->status === 'rejected')
                                    <span class="w-2 h-2 rounded-full bg-red-400"></span>
                                    <span class="font-bold uppercase text-sm tracking-widest">DITOLAK / GAGAL</span>
                                @elseif($payment->status === 'pending')
                                    <span class="inline-flex h-4 w-4 rounded-full border-2 border-white/30 border-t-yellow-300 animate-spin"></span>
                                    <span class="font-bold uppercase text-sm tracking-widest">PENDING / MENUNGGU KONFIRMASI ADMIN</span>
                                @else
                                    <span class="w-2 h-2 rounded-full bg-yellow-400 animate-pulse"></span>
                                    <span class="font-bold uppercase text-sm tracking-widest">MENUNGGU VERIFIKASI</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-8 md:p-12 space-y-10">
                    <!-- Order Info -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <div>
                            <h3 class="text-xs font-bold text-text/40 uppercase tracking-widest mb-4">Informasi Paket</h3>
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-orange/10 flex items-center justify-center text-orange flex-shrink-0 text-xl font-bold">🕋</div>
                                <div>
                                    <p class="font-bold text-text text-lg leading-tight uppercase">{{ $bookings->first()->product->name }}</p>
                                    <p class="text-text/60 text-sm mt-1 uppercase">{{ $bookings->first()->product->duration }} • JAKARTA (CGK)</p>
                                    @if($product->departure_date)
                                    <p class="text-orange text-sm mt-1 font-bold">📅 Berangkat: {{ $product->departure_date->translatedFormat('d F Y') }}</p>
                                    @else
                                    <p class="text-text/40 text-sm mt-1 italic">📅 Jadwal segera diumumkan</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xs font-bold text-text/40 uppercase tracking-widest mb-4">Data Pemesan</h3>
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-orange/10 flex items-center justify-center text-orange flex-shrink-0 text-xl font-bold">👤</div>
                                <div>
                                    <p class="font-bold text-text text-lg leading-tight">{{ $displayOrdererName }}</p>
                                    <p class="text-text/60 text-sm mt-1">{{ $primaryBooking->orderer_phone ?? $primaryBooking->user->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($payment->status === 'verified')
                    <div class="invoice-section rounded-[2rem] border border-emerald-200 dark:border-emerald-900/30 bg-gradient-to-br from-emerald-50 via-white to-orange-50 p-6 md:p-8">
                        <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-6 mb-8">
                            <div>
                                <span class="inline-flex items-center gap-2 rounded-full bg-emerald-500/10 px-4 py-1.5 text-[11px] font-black uppercase tracking-[0.2em] text-emerald-700">
                                    <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                                    Pembayaran Telah Lunas
                                </span>
                                <h3 class="mt-4 text-2xl md:text-3xl font-serif font-bold text-text">Detail Paket Yang Anda Pesan</h3>
                                <p class="mt-2 max-w-2xl text-sm md:text-base text-text/65">Ringkasan ini memudahkan Anda melihat apa saja yang termasuk di dalam paket setelah pembayaran berhasil diverifikasi.</p>
                            </div>
                            <div class="invoice-card-light rounded-3xl border border-emerald-200 dark:border-emerald-900/30 bg-white/90 px-5 py-4 shadow-sm">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-text/40">Pemesan</p>
                                <p class="mt-2 text-lg font-bold text-text">{{ $displayOrdererName }}</p>
                                <p class="text-sm text-text/60">{{ $primaryBooking->orderer_email ?? $primaryBooking->user->email }}</p>
                                <p class="text-sm text-text/60">{{ $primaryBooking->orderer_phone ?? '-' }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
                            <div class="invoice-card-light rounded-3xl bg-white/90 border border-border p-5">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-text/40">Nama Paket</p>
                                <p class="mt-3 text-lg font-bold text-text uppercase">{{ $product->name }}</p>
                            </div>
                            <div class="invoice-card-light rounded-3xl bg-white/90 border border-border p-5">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-text/40">Kategori</p>
                                <p class="mt-3 text-lg font-bold text-text">{{ $product->category }}</p>
                            </div>
                            <div class="invoice-card-light rounded-3xl bg-white/90 border border-border p-5">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-text/40">Durasi</p>
                                <p class="mt-3 text-lg font-bold text-text">{{ $product->duration ?? '-' }}</p>
                            </div>
                            <div class="invoice-card-light rounded-3xl bg-white/90 border border-border p-5">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-text/40">Hotel / Akomodasi</p>
                                <p class="mt-3 text-lg font-bold text-text">{{ $hotelFeature ?? 'Sesuai rincian paket & penempatan grup' }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-[1.2fr_0.8fr] gap-6">
                            <div class="invoice-card-light rounded-[1.75rem] bg-white/90 border border-border p-6">
                                <h4 class="text-sm font-black uppercase tracking-[0.2em] text-text/45 mb-4">Fasilitas Yang Termasuk</h4>
                                @if($packageFeatures->isNotEmpty())
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                        @foreach($packageFeatures as $feature)
                                        <div class="flex items-start gap-3 rounded-2xl bg-emerald-50/70 dark:bg-emerald-900/20 px-4 py-3 border border-emerald-100 dark:border-emerald-800/50">
                                            <span class="mt-0.5 text-emerald-600 font-black">✓</span>
                                            <span class="text-sm font-medium text-text/80">{{ $feature }}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-sm text-text/60">Fasilitas paket akan diinformasikan oleh tim Al-Khairat sesuai keberangkatan yang Anda pilih.</p>
                                @endif
                            </div>

                            <div class="rounded-[1.75rem] bg-[#2C2416] dark:bg-[#1a1a1a] text-white p-6">
                                <h4 class="text-sm font-black uppercase tracking-[0.2em] text-white/60 mb-4">Info Lanjutan</h4>
                                <div class="space-y-4 text-sm">
                                    <div>
                                        <p class="text-white/50 uppercase text-[10px] font-black tracking-[0.2em]">Keberangkatan</p>
                                        <p class="mt-1 font-bold text-base">Jakarta (CGK)</p>
                                    </div>
                                    <div>
                                        <p class="text-white/50 uppercase text-[10px] font-black tracking-[0.2em]">Estimasi Tgl Berangkat</p>
                                        @if($product->departure_date)
                                        <p class="mt-1 font-bold text-base text-orange">{{ $product->departure_date->translatedFormat('d F Y') }}</p>
                                        @else
                                        <p class="mt-1 font-bold text-base text-white/60 italic">Segera diumumkan</p>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="text-white/50 uppercase text-[10px] font-black tracking-[0.2em]">Jumlah Jamaah</p>
                                        <p class="mt-1 font-bold text-base">{{ $bookings->count() }} Orang</p>
                                    </div>
                                    <div>
                                        <p class="text-white/50 uppercase text-[10px] font-black tracking-[0.2em]">Pendamping / Guide</p>
                                        <p class="mt-1 font-bold text-base">{{ $guideContact ? '+' . ltrim($guideContact, '+') : 'Info menyusul dari admin' }}</p>
                                    </div>
                                    @if(filled($product->description))
                                    <div class="pt-4 border-t border-white/10">
                                        <p class="text-white/50 uppercase text-[10px] font-black tracking-[0.2em]">Catatan Paket</p>
                                        <p class="mt-2 leading-relaxed text-white/80">{{ $product->description }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Tour Guide Consultation Section (Verified Only) --}}
                    @if($payment->status === 'verified' && $guideContact)
                    <div class="invoice-section rounded-[2rem] border-2 border-emerald-200 dark:border-emerald-900/30 bg-gradient-to-br from-emerald-50 via-white to-teal-50 p-6 md:p-8 mt-2">
                        <div class="flex items-center gap-3 mb-5">
                            <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 flex items-center justify-center text-2xl">👨‍🏫</div>
                            <div>
                                <h3 class="text-xl font-serif font-bold text-text">Konsultasi dengan Tour Guide</h3>
                                <p class="text-sm text-text/60">Hubungi pembimbing Anda untuk persiapan keberangkatan</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            {{-- Guide Contact Card --}}
                            <div class="invoice-card-light rounded-2xl bg-white/90 border border-emerald-100 dark:border-emerald-900/30 p-5">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-text/40 mb-2">Jam Konsultasi</p>
                                <p class="text-lg font-bold text-text">09:00 – 17:00 WITA</p>
                                <p class="text-xs text-text/50 mt-1">Senin – Sabtu (diluar jam makan)</p>
                            </div>
                        </div>

                        {{-- WA Button --}}
                        @php
                            $guideWaText = "Assalamu'alaikum, saya jamaah *" . $displayOrdererName . "* dengan kode booking *#" . $groupCode . "* (Paket " . $product->name . "). Saya ingin konsultasi mengenai persiapan keberangkatan. Terima kasih.";
                        @endphp
                        <a href="https://wa.me/{{ $guideContact }}?text={{ urlencode($guideWaText) }}" 
                           target="_blank"
                           class="group flex items-center justify-center gap-3 bg-emerald-600 text-white font-bold py-4 rounded-2xl hover:bg-emerald-700 hover:shadow-xl hover:shadow-emerald-600/20 hover:scale-[1.02] transition-all duration-300 mb-6">
                            <svg class="w-6 h-6 group-hover:rotate-12 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.414 0 .018 5.393 0 12.029c0 2.119.554 4.188 1.61 6.01L0 24l6.135-1.61a11.75 11.75 0 005.912 1.593h.005c6.637 0 12.032-5.393 12.035-12.031a11.77 11.77 0 00-3.538-8.455z"/></svg>
                            Mulai Konsultasi via WhatsApp
                        </a>

                        {{-- Etiquette Notice --}}
                        <div class="invoice-card-light rounded-xl bg-amber-50 border border-amber-200 dark:border-amber-800/50 p-4">
                            <p class="text-xs font-bold text-amber-800 uppercase tracking-widest mb-2">📋 Etika Konsultasi</p>
                            <ul class="text-xs text-amber-900/80 space-y-1">
                                <li>• Selalu cantumkan <strong>kode booking</strong> dan <strong>nama Anda</strong> saat menghubungi guide</li>
                                <li>• Kirim pesan 1x lalu tunggu balasan, hindari mengirim berulang kali</li>
                                <li>• Hubungi guide pada <strong>jam konsultasi resmi</strong> (09:00 – 17:00 WITA)</li>
                                <li>• Untuk pertanyaan umum / administrasi, hubungi <strong>Admin pusat</strong> bukan guide</li>
                            </ul>
                        </div>
                    </div>
                    @endif
                    @endif

                    <!-- Pilgrim List Table -->
                    <div>
                        <h3 class="text-xs font-bold text-text/40 uppercase tracking-widest mb-6 px-1">Daftar Jamaah ({{ $bookings->count() }} Orang)</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead class="border-b border-border">
                                    <tr>
                                        <th class="py-4 text-[10px] font-bold text-text/60 uppercase px-4">Nama Lengkap</th>
                                        <th class="py-4 text-[10px] font-bold text-text/60 uppercase px-4">Varian Kamar</th>
                                        <th class="py-4 text-[10px] font-bold text-text/60 uppercase px-4 text-right">Harga Satuan</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-border">
                                    @foreach($bookings as $booking)
                                    <tr class="group hover:bg-orange/5 transition-colors">
                                        <td class="py-4 px-4 font-bold text-text">{{ $booking->full_name }}</td>
                                        <td class="py-4 px-4 font-bold text-text/60 uppercase text-xs">{{ $booking->room_variant }}</td>
                                        <td class="py-4 px-4 font-bold text-text text-right">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" class="py-6 px-4 text-right font-bold text-text/40 uppercase text-xs tracking-widest">Total Pembayaran</td>
                                        <td class="py-6 px-4 text-right">
                                            <span class="text-2xl md:text-3xl font-bold text-orange tracking-tighter">Rp {{ number_format($payment->amount, 0, ',', '.') }}</span>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <!-- Payment Method Section -->
                    <div class="pt-10 border-t border-border border-dashed">
                        <h3 class="text-xl md:text-2xl font-serif font-bold text-text mb-6">{{ $payment->status === 'verified' ? 'Bukti & Arsip Pembayaran' : ($payment->status === 'rejected' ? 'Status Pembayaran' : 'Instruksi Pembayaran') }}</h3>

                        @if($primaryBooking->status === 'dp_paid')
                        <div class="mb-6 rounded-3xl border border-blue-200 dark:border-blue-800/50 bg-blue-50 dark:bg-blue-900/10 px-5 py-4 text-blue-900 dark:text-blue-300 animate-[pulse_3s_infinite]">
                            <div class="flex items-start gap-3">
                                <span class="mt-0.5 text-xl">💳</span>
                                <div>
                                    <p class="font-bold uppercase tracking-wide text-sm">DP Telah Diterima & Diverifikasi</p>
                                    <p class="text-sm text-blue-800/90 mt-1">
                                        Terima kasih! Pembayaran awal (DP) Anda sudah kami catat. Silakan lakukan pelunasan sesuai total tagihan di bawah ini untuk mendapatkan invoice resmi (PDF).
                                    </p>
                                </div>
                            </div>
                        </div>
                        @elseif($payment->status === 'pending')
                        <div class="mb-6 rounded-3xl border border-yellow-300/60 dark:border-yellow-700/50 bg-yellow-50 dark:bg-yellow-900/10 px-5 py-4 text-yellow-900 dark:text-yellow-300">
                            <div class="flex items-start gap-3">
                                <span class="mt-0.5 inline-flex h-5 w-5 rounded-full border-2 border-yellow-300 border-t-orange animate-spin"></span>
                                <div>
                                    <p class="font-bold uppercase tracking-wide text-sm">Status pembayaran masih pending</p>
                                    <p class="text-sm text-yellow-800/90 mt-1">
                                        Pembayaran Anda sedang menunggu pengecekan dan konfirmasi dari admin. Setelah diverifikasi, status invoice ini akan otomatis berubah.
                                    </p>
                                </div>
                            </div>
                        </div>
                        @elseif($payment->status === 'rejected')
                        <div class="mb-6 rounded-3xl border border-red-300/60 dark:border-red-800/50 bg-red-50 dark:bg-red-900/10 px-5 py-5 text-red-900 dark:text-red-300">
                            <div class="flex items-start gap-3">
                                <span class="mt-0.5 inline-flex h-5 w-5 items-center justify-center rounded-full bg-red-500 text-white text-xs font-bold">!</span>
                                <div>
                                    <p class="font-bold uppercase tracking-wide text-sm">Pembayaran ditolak admin</p>
                                    <p class="text-sm text-red-800/90 mt-1">
                                        Akses tindakan pada invoice ini dinonaktifkan. Silakan kembali ke beranda untuk memulai ulang proses atau hubungi admin secara terpisah jika diperlukan.
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif
                        


                        <!-- Payment Instructions -->
                        @if($payment->status === 'verified')
                        <div class="bg-bg rounded-3xl p-8 border border-border animate-[scaleUp_0.4s_ease-out]">
                            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                                <div>
                                    <h4 class="text-xs font-bold text-text/40 uppercase tracking-widest mb-3">Status Transaksi</h4>
                                    <p class="text-2xl font-bold text-emerald-600">Pembayaran Anda telah lunas</p>
                                    <p class="text-sm text-text/60 mt-2 max-w-xl">Simpan invoice ini sebagai bukti pembayaran resmi. Tim Al-Khairat akan menghubungi Anda untuk langkah keberangkatan selanjutnya.</p>
                                </div>
                                <div class="rounded-3xl border border-emerald-200 dark:border-emerald-800/50 bg-emerald-50 dark:bg-emerald-900/20 px-5 py-4 min-w-[220px]">
                                    <p class="text-[10px] font-black uppercase tracking-[0.2em] text-emerald-700/70 dark:text-emerald-400/70">Metode Pembayaran</p>
                                    <p class="mt-2 text-lg font-bold text-emerald-800 dark:text-emerald-300">{{ $payment->payment_method }}</p>
                                    <p class="mt-1 text-sm text-emerald-700/80 dark:text-emerald-400/80">Total: Rp {{ number_format($payment->amount, 0, ',', '.') }}</p>
                                </div>
                            </div>

                            <div class="mt-8 pt-8 border-t border-border border-dashed">
                                <h4 class="text-xs font-bold text-text/40 uppercase tracking-widest text-center mb-6">Dokumen & Tindak Lanjut</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <a href="{{ route('booking.invoice.pdf', $groupCode) }}" target="_blank" class="group flex items-center justify-center gap-3 bg-surface border-2 border-border text-text font-bold py-4 rounded-2xl hover:border-orange hover:text-orange transition-all duration-300">
                                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 3h6l4 4v14H7a2 2 0 01-2-2V5a2 2 0 012-2z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 3v5h5"></path>
                                        </svg>
                                        Simpan Bukti PDF
                                    </a>

                                    <a href="https://wa.me/{{ $whatsapp }}?text=Halo%20Admin,%20pembayaran%20saya%20untuk%20booking%20{{ $groupCode }}%20sudah%20terverifikasi.%20Mohon%20info%20langkah%20selanjutnya." 
                                       target="_blank"
                                       class="group flex items-center justify-center gap-3 bg-gradient-sunset text-white font-bold py-4 rounded-2xl hover:shadow-xl hover:shadow-orange/20 hover:scale-[1.02] transition-all duration-300">
                                        <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M20.52 3.48A11.86 11.86 0 0012.06.02C5.5 0 .16 5.33.16 11.9c0 2.1.55 4.15 1.6 5.96L0 24l6.33-1.66a11.86 11.86 0 005.73 1.46h.01c6.56 0 11.9-5.33 11.9-11.9 0-3.18-1.24-6.17-3.45-8.42zM12.07 21.8h-.01a9.87 9.87 0 01-5.03-1.38l-.36-.22-3.75.98 1-3.66-.24-.37a9.86 9.86 0 01-1.52-5.25c0-5.46 4.45-9.9 9.92-9.9 2.65 0 5.13 1.03 7 2.9a9.84 9.84 0 012.9 7c0 5.46-4.45 9.9-9.91 9.9zm5.43-7.42c-.3-.15-1.77-.87-2.04-.97-.27-.1-.47-.15-.67.15s-.76.97-.93 1.17c-.17.2-.34.22-.64.08-.3-.15-1.25-.46-2.38-1.46-.88-.78-1.47-1.75-1.64-2.05-.17-.3-.02-.46.13-.61.13-.13.3-.34.44-.5.15-.17.2-.3.3-.5.1-.2.05-.38-.03-.53-.08-.15-.67-1.62-.92-2.22-.24-.58-.49-.5-.67-.5h-.57c-.2 0-.53.08-.8.38s-1.05 1.02-1.05 2.48 1.08 2.86 1.23 3.06c.15.2 2.12 3.24 5.14 4.54.72.31 1.29.5 1.73.64.73.23 1.39.2 1.92.12.59-.09 1.77-.72 2.02-1.42.25-.7.25-1.3.17-1.42-.08-.12-.28-.2-.58-.35z"/>
                                        </svg>
                                        Hubungi Admin
                                    </a>
                                </div>
                            </div>
                        </div>
                        @elseif($payment->status === 'rejected')
                        <div class="bg-bg rounded-3xl p-8 border border-red-200 animate-[scaleUp_0.4s_ease-out]">
                            <div class="text-center">
                                <h4 class="text-xl font-bold text-red-600">Transaksi Tidak Dapat Dilanjutkan</h4>
                                <p class="text-sm text-text/60 mt-3 max-w-xl mx-auto">
                                    Invoice ini dikunci karena pembayaran ditolak. Tidak ada tindakan lanjutan yang tersedia selain kembali ke halaman utama.
                                </p>
                                <div class="mt-8">
                                    <a href="{{ route('home') }}" class="inline-flex items-center justify-center gap-3 bg-gradient-sunset text-white font-bold px-8 py-4 rounded-2xl hover:shadow-xl hover:shadow-orange/20 hover:scale-[1.02] transition-all duration-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                        Kembali ke Beranda
                                    </a>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="bg-surface dark:bg-[#0f0f0f] rounded-3xl p-8 border border-border mt-6 relative overflow-hidden shadow-sm">
                            <!-- Background Accent -->
                            <div class="absolute -right-20 -top-20 w-64 h-64 bg-orange/5 rounded-full blur-3xl pointer-events-none"></div>
                            
                            <div class="text-center mb-8 relative z-10">
                                <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-orange/10 text-orange mb-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                </span>
                                <h4 class="text-xl md:text-2xl font-serif font-bold text-text">Instruksi Transfer Bank</h4>
                                <p class="text-sm text-text/60 mt-2 max-w-lg mx-auto">Silakan lakukan transfer sesuai total tagihan ke salah satu rekening resmi Al-Khairat di bawah ini.</p>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10 relative z-10">
                                <!-- Bank Mandiri -->
                                <div class="bg-bg rounded-2xl border border-border p-6 hover:shadow-lg hover:border-orange/30 transition-all duration-300 group">
                                    <img src="{{ asset('images/banks/mandiri.svg') }}" class="h-6 w-auto mb-6 opacity-80 group-hover:opacity-100 transition-opacity">
                                    <p class="text-[10px] font-black tracking-widest text-text/40 uppercase mb-1">Nomor Rekening</p>
                                    <div class="flex items-center justify-between gap-2 mb-3">
                                        <p class="text-xl font-mono font-bold text-text tracking-tight">123-456-7890</p>
                                        <button onclick="copyToClipboard('1234567890')" class="p-2 rounded-lg bg-orange/10 text-orange hover:bg-orange hover:text-white transition-colors" title="Salin Rekening">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                        </button>
                                    </div>
                                    <p class="text-[10px] font-bold text-text/70 uppercase">A.N PT Al-Khairat Tour</p>
                                </div>

                                <!-- Bank BCA -->
                                <div class="bg-bg rounded-2xl border border-border p-6 hover:shadow-lg hover:border-orange/30 transition-all duration-300 group">
                                    <img src="{{ asset('images/banks/bca.svg') }}" class="h-6 w-auto mb-6 opacity-80 group-hover:opacity-100 transition-opacity">
                                    <p class="text-[10px] font-black tracking-widest text-text/40 uppercase mb-1">Nomor Rekening</p>
                                    <div class="flex items-center justify-between gap-2 mb-3">
                                        <p class="text-xl font-mono font-bold text-text tracking-tight">888-777-666</p>
                                        <button onclick="copyToClipboard('888777666')" class="p-2 rounded-lg bg-orange/10 text-orange hover:bg-orange hover:text-white transition-colors" title="Salin Rekening">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                        </button>
                                    </div>
                                    <p class="text-[10px] font-bold text-text/70 uppercase">A.N PT Al-Khairat Tour</p>
                                </div>

                                <!-- Bank BSI -->
                                <div class="bg-bg rounded-2xl border border-border p-6 hover:shadow-lg hover:border-orange/30 transition-all duration-300 group">
                                    <img src="{{ asset('images/banks/bsi.svg') }}" class="h-6 w-auto mb-6 opacity-80 group-hover:opacity-100 transition-opacity">
                                    <p class="text-[10px] font-black tracking-widest text-text/40 uppercase mb-1">Nomor Rekening</p>
                                    <div class="flex items-center justify-between gap-2 mb-3">
                                        <p class="text-xl font-mono font-bold text-text tracking-tight">999-000-111</p>
                                        <button onclick="copyToClipboard('999000111')" class="p-2 rounded-lg bg-orange/10 text-orange hover:bg-orange hover:text-white transition-colors" title="Salin Rekening">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                        </button>
                                    </div>
                                    <p class="text-[10px] font-bold text-text/70 uppercase">A.N PT Al-Khairat Tour</p>
                                </div>
                            </div>

                            <div class="max-w-xl mx-auto pt-8 border-t border-border border-dashed relative z-10">
                                <!-- Konfirmasi Pembayaran (Single Card) -->
                                <div class="bg-orange/5 p-6 md:p-8 rounded-[2.5rem] border-2 border-orange/10 flex flex-col items-center text-center">
                                    <div class="w-12 h-12 rounded-full bg-orange/10 flex items-center justify-center text-orange mb-4">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <h4 class="text-lg font-bold text-text mb-2">Sudah Melakukan Pembayaran?</h4>
                                    <p class="text-sm text-text/60 mb-6 max-w-sm">Kirim bukti transfer dengan mencantumkan kode <span class="font-bold text-orange">#{{ $groupCode }}</span> ke WhatsApp Admin untuk diverifikasi cepat.</p>
                                    
                                    <a href="https://wa.me/{{ $whatsapp }}?text=Halo%20Admin,%20saya%20*{{ urlencode($displayOrdererName) }}*%20({{ urlencode($primaryBooking->orderer_email ?? $primaryBooking->user->email) }})%20sudah%20melakukan%20transfer%20pembayaran%20untuk%20kode%20booking%20*{{ $groupCode }}*.%20Berikut%20bukti%20transfernya:" 
                                       target="_blank" 
                                       class="w-full flex items-center justify-center gap-3 py-4 px-8 bg-orange text-white rounded-2xl hover:bg-orange-bright transition shadow-xl shadow-orange/20 group">
                                        <span class="text-2xl group-hover:scale-110 transition">✅</span>
                                        <div class="text-left">
                                            <p class="text-[10px] font-black text-white/70 uppercase tracking-[0.2em] leading-none mb-1">Konfirmasi Sekarang</p>
                                            <p class="text-base font-bold">Kirim Bukti via WhatsApp</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-12 flex justify-center scroll-animate {{ $payment->status === 'rejected' ? 'hidden' : '' }}" data-animation="fade-up">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3 px-10 py-4 bg-surface border-2 border-border text-text font-bold rounded-2xl hover:border-orange hover:text-orange transition-all duration-300 shadow-sm group">
                    <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Beranda Utama
                </a>
            </div>
        </div>
    </main>

    <x-footer />

    <script>
        function togglePaymentSection(type) {
            const bankContainer = document.getElementById('bank-select-container');
            if (type === 'bank') {
                bankContainer.classList.remove('hidden');
            } else {
                bankContainer.classList.add('hidden');
            }
        }

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert('Nomor rekening berhasil disalin!');
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.scroll-animate').forEach(el => observer.observe(el));

            // Polling for Payment Status
            const initialStatus = "{{ $payment->status }}";
            const groupCode = "{{ $groupCode }}";

            if (initialStatus !== 'verified' && initialStatus !== 'rejected') {
                const pollInterval = setInterval(async () => {
                    try {
                        const response = await fetch(`/invoice/${groupCode}/status`);
                        const data = await response.json();

                        if (data.status && data.status !== initialStatus) {
                            if (data.status === 'verified' || data.status === 'rejected' || (initialStatus === 'Belum Memilih' && data.status === 'pending')) {
                                clearInterval(pollInterval);
                                window.location.reload();
                            }
                        }
                    } catch (error) {
                        console.error('Error polling payment status:', error);
                    }
                }, 5000); // Poll every 5 seconds
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
