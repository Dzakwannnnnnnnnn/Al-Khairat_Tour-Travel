<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVOICE #{{ $groupCode }} | Al-Khairat</title>
    
    @vite(['resources/css/app.css'])
    @stack('styles')

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
                <div class="{{ $payment->status === 'verified' ? 'inline-flex' : 'hidden' }} items-center justify-center w-20 h-20 rounded-full bg-green-500/10 text-green-500 text-4xl mb-6">
                    ✅
                </div>
                @if($payment->status === 'pending')
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-yellow-500/10 mb-6 relative">
                        <span class="absolute inset-0 rounded-full border-4 border-yellow-300/40 border-t-orange animate-spin"></span>
                        <span class="text-yellow-600 text-xl font-black tracking-[0.3em] pl-1">...</span>
                    </div>
                @elseif($payment->status === 'rejected')
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-red-500/10 text-red-500 text-4xl mb-6">
                        !
                    </div>
                @elseif($payment->status !== 'verified')
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-orange/10 text-orange text-4xl mb-6">
                        i
                    </div>
                @endif
                @if($payment->status === 'verified')
                    <h1 class="text-3xl md:text-4xl font-serif font-bold text-text mb-2">Pembayaran Anda Telah Lunas</h1>
                    <p class="text-text/60 max-w-2xl mx-auto leading-relaxed">Admin telah mengonfirmasi pembayaran Anda. Di bawah ini adalah ringkasan pemesan dan detail paket perjalanan yang sudah aktif untuk rombongan Anda.</p>
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
            <div class="bg-surface rounded-[2.5rem] border border-border shadow-2xl overflow-hidden mb-8 scroll-animate" data-animation="slide-up">
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
                    <div class="rounded-[2rem] border border-emerald-200 bg-gradient-to-br from-emerald-50 via-white to-orange-50 p-6 md:p-8">
                        <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-6 mb-8">
                            <div>
                                <span class="inline-flex items-center gap-2 rounded-full bg-emerald-500/10 px-4 py-1.5 text-[11px] font-black uppercase tracking-[0.2em] text-emerald-700">
                                    <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                                    Pembayaran Telah Lunas
                                </span>
                                <h3 class="mt-4 text-2xl md:text-3xl font-serif font-bold text-text">Detail Paket Yang Anda Pesan</h3>
                                <p class="mt-2 max-w-2xl text-sm md:text-base text-text/65">Ringkasan ini memudahkan Anda melihat apa saja yang termasuk di dalam paket setelah pembayaran berhasil diverifikasi.</p>
                            </div>
                            <div class="rounded-3xl border border-emerald-200 bg-white/90 px-5 py-4 shadow-sm">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-text/40">Pemesan</p>
                                <p class="mt-2 text-lg font-bold text-text">{{ $displayOrdererName }}</p>
                                <p class="text-sm text-text/60">{{ $primaryBooking->orderer_email ?? $primaryBooking->user->email }}</p>
                                <p class="text-sm text-text/60">{{ $primaryBooking->orderer_phone ?? '-' }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
                            <div class="rounded-3xl bg-white/90 border border-border p-5">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-text/40">Nama Paket</p>
                                <p class="mt-3 text-lg font-bold text-text uppercase">{{ $product->name }}</p>
                            </div>
                            <div class="rounded-3xl bg-white/90 border border-border p-5">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-text/40">Kategori</p>
                                <p class="mt-3 text-lg font-bold text-text">{{ $product->category }}</p>
                            </div>
                            <div class="rounded-3xl bg-white/90 border border-border p-5">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-text/40">Durasi</p>
                                <p class="mt-3 text-lg font-bold text-text">{{ $product->duration ?? '-' }}</p>
                            </div>
                            <div class="rounded-3xl bg-white/90 border border-border p-5">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-text/40">Hotel / Akomodasi</p>
                                <p class="mt-3 text-lg font-bold text-text">{{ $hotelFeature ?? 'Sesuai rincian paket & penempatan grup' }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-[1.2fr_0.8fr] gap-6">
                            <div class="rounded-[1.75rem] bg-white/90 border border-border p-6">
                                <h4 class="text-sm font-black uppercase tracking-[0.2em] text-text/45 mb-4">Fasilitas Yang Termasuk</h4>
                                @if($packageFeatures->isNotEmpty())
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                        @foreach($packageFeatures as $feature)
                                        <div class="flex items-start gap-3 rounded-2xl bg-emerald-50/70 px-4 py-3 border border-emerald-100">
                                            <span class="mt-0.5 text-emerald-600 font-black">✓</span>
                                            <span class="text-sm font-medium text-text/80">{{ $feature }}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-sm text-text/60">Fasilitas paket akan diinformasikan oleh tim Al-Khairat sesuai keberangkatan yang Anda pilih.</p>
                                @endif
                            </div>

                            <div class="rounded-[1.75rem] bg-charcoal text-white p-6">
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
                    <div class="rounded-[2rem] border-2 border-emerald-200 bg-gradient-to-br from-emerald-50 via-white to-teal-50 p-6 md:p-8 mt-2">
                        <div class="flex items-center gap-3 mb-5">
                            <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 flex items-center justify-center text-2xl">👨‍🏫</div>
                            <div>
                                <h3 class="text-xl font-serif font-bold text-text">Konsultasi dengan Tour Guide</h3>
                                <p class="text-sm text-text/60">Hubungi pembimbing Anda untuk persiapan keberangkatan</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            {{-- Guide Contact Card --}}
                            <div class="rounded-2xl bg-white/90 border border-emerald-100 p-5">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-text/40 mb-2">Kontak Pembimbing</p>
                                <p class="text-lg font-bold text-emerald-700 font-mono">+{{ ltrim($guideContact, '+') }}</p>
                                <p class="text-xs text-text/50 mt-1">WhatsApp resmi tour guide paket Anda</p>
                            </div>

                            {{-- Consultation Hours Card --}}
                            <div class="rounded-2xl bg-white/90 border border-emerald-100 p-5">
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
                        <div class="rounded-xl bg-amber-50 border border-amber-200 p-4">
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
                        <h3 class="text-xl md:text-2xl font-serif font-bold text-text mb-6">{{ $payment->status === 'verified' ? 'Bukti & Arsip Pembayaran' : ($payment->status === 'rejected' ? 'Status Pembayaran' : 'Pilih Metode Pembayaran') }}</h3>

                        @if($payment->status === 'pending')
                        <div class="mb-6 rounded-3xl border border-yellow-300/60 bg-yellow-50 px-5 py-4 text-yellow-900">
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
                        <div class="mb-6 rounded-3xl border border-red-300/60 bg-red-50 px-5 py-5 text-red-900">
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
                        
                        @if(!in_array($payment->status, ['verified', 'rejected']))
                        <form action="{{ route('booking.payment_method', $groupCode) }}" method="POST" id="payment-method-form">
                            @csrf
                            <div class="space-y-4 mb-8">
                                <!-- Bank Transfer Option -->
                                <div class="bg-surface rounded-3xl border-2 {{ str_contains($payment->payment_method, 'Transfer') ? 'border-orange bg-orange/5' : 'border-border' }} p-6 transition-all">
                                    <label class="flex items-center justify-between cursor-pointer mb-4">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-12 rounded-xl bg-orange/10 flex items-center justify-center text-orange text-lg">🏦</div>
                                            <div>
                                                <p class="font-bold text-text">Transfer Bank (Manual)</p>
                                                <p class="text-[10px] text-text/40 uppercase font-bold">Pilih bank Anda di bawah</p>
                                            </div>
                                        </div>
                                        <input type="radio" name="method_group" value="bank" {{ str_contains($payment->payment_method, 'Transfer') ? 'checked' : '' }} class="w-6 h-6 text-orange focus:ring-orange accent-orange" onchange="togglePaymentSection('bank')">
                                    </label>

                                    <div id="bank-select-container" class="{{ str_contains($payment->payment_method, 'Transfer') ? '' : 'hidden' }} space-y-4 animate-[fadeIn_0.3s_ease-out]">
                                        <select name="payment_method" class="form-input w-full bg-bg border-border font-bold text-text" onchange="this.form.submit()">
                                            <option value="Belum Memilih" disabled {{ $payment->payment_method === 'Belum Memilih' ? 'selected' : '' }}>-- Silakan Pilih Bank --</option>
                                            <option value="Transfer Mandiri" {{ $payment->payment_method === 'Transfer Mandiri' ? 'selected' : '' }}>BANK MANDIRI (123-xxx)</option>
                                            <option value="Transfer BCA" {{ $payment->payment_method === 'Transfer BCA' ? 'selected' : '' }}>BANK BCA (888-xxx)</option>
                                            <option value="Transfer BSI" {{ $payment->payment_method === 'Transfer BSI' ? 'selected' : '' }}>BANK BSI (SYARIAH) (999-xxx)</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- QRIS Option -->
                                <div class="bg-surface rounded-3xl border-2 {{ str_contains($payment->payment_method, 'QRIS') ? 'border-orange bg-orange/5' : 'border-border' }} p-6 transition-all">
                                    <label class="flex items-center justify-between cursor-pointer">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-12 rounded-xl bg-orange/10 flex items-center justify-center text-orange text-lg">📱</div>
                                            <div>
                                                <p class="font-bold text-text">QRIS / E-Wallet</p>
                                                <p class="text-[10px] text-text/40 uppercase font-bold">Proses Instan & Otomatis</p>
                                            </div>
                                        </div>
                                        <input type="radio" name="payment_method" value="QRIS / E-Wallet" {{ str_contains($payment->payment_method, 'QRIS') ? 'checked' : '' }} class="w-6 h-6 text-orange focus:ring-orange accent-orange" onchange="this.form.submit()">
                                    </label>
                                </div>
                            </div>
                        </form>
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
                                <div class="rounded-3xl border border-emerald-200 bg-emerald-50 px-5 py-4 min-w-[220px]">
                                    <p class="text-[10px] font-black uppercase tracking-[0.2em] text-emerald-700/70">Metode Pembayaran</p>
                                    <p class="mt-2 text-lg font-bold text-emerald-800">{{ $payment->payment_method }}</p>
                                    <p class="mt-1 text-sm text-emerald-700/80">Total: Rp {{ number_format($payment->amount, 0, ',', '.') }}</p>
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
                        @elseif($payment->payment_method !== 'Belum Memilih')
                        <div class="bg-bg rounded-3xl p-8 border border-border animate-[scaleUp_0.4s_ease-out]">
                            @if(str_contains($payment->payment_method, 'Transfer'))
                                <div class="flex flex-col md:flex-row gap-8 items-center md:items-start text-center md:text-left">
                                    <div class="flex-1">
                                        <h4 class="text-xs font-bold text-text/40 uppercase tracking-widest mb-4">Instruksi {{ $payment->payment_method }}</h4>
                                        <div class="space-y-4">
                                            @php
                                                $accountNumber = '123-456-7890-000';
                                                $bankLogo = '';
                                                if(str_contains($payment->payment_method, 'Mandiri')) {
                                                    $accountNumber = '123-456-7890-000';
                                                    $bankLogo = 'https://upload.wikimedia.org/wikipedia/id/thumb/a/ad/Bank_Mandiri_logo_2016.svg/1200px-Bank_Mandiri_logo_2016.svg.png';
                                                } elseif(str_contains($payment->payment_method, 'BCA')) {
                                                    $accountNumber = '888-777-666-555';
                                                    $bankLogo = 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Bank_Central_Asia.svg/1200px-Bank_Central_Asia.svg.png';
                                                } elseif(str_contains($payment->payment_method, 'BSI')) {
                                                    $accountNumber = '999-000-111-222';
                                                    $bankLogo = 'https://upload.wikimedia.org/wikipedia/id/thumb/a/a2/Logo_Bank_Syariah_Indonesia.svg/1200px-Logo_Bank_Syariah_Indonesia.svg.png';
                                                }
                                            @endphp
                                            <div>
                                                <p class="text-sm text-text/60 mb-1">Nomor Rekening</p>
                                                <div class="flex items-center justify-center md:justify-start gap-3">
                                                    <span class="text-2xl font-mono font-black text-text tracking-tighter">{{ $accountNumber }}</span>
                                                    <button onclick="copyToClipboard('{{ str_replace('-', '', $accountNumber) }}')" class="text-orange text-sm font-bold hover:underline">Salin</button>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="text-sm text-text/60 mb-1">Nama Pemilik Rekening</p>
                                                <p class="text-xl font-bold text-text">PT AL-KHAIRAT TOUR & TRAVEL</p>
                                            </div>
                                        </div>
                                    </div>
                                    @if($bankLogo)
                                    <div class="w-32 h-16 bg-surface rounded-2xl border border-border flex items-center justify-center p-3 overflow-hidden">
                                        <img src="{{ $bankLogo }}" class="max-w-full opacity-80 h-auto grayscale hover:grayscale-0 transition-all duration-300 object-contain max-h-full">
                                    </div>
                                    @endif
                                </div>
                            @elseif(str_contains($payment->payment_method, 'QRIS'))
                                <div class="text-center">
                                    <h4 class="text-xs font-bold text-text/40 uppercase tracking-widest mb-6">Scan QRIS Untuk Membayar</h4>
                                    <div class="inline-block p-4 bg-white rounded-3xl shadow-xl border border-border mb-6">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/QR_code_for_mobile_English_Wikipedia.svg/1200px-QR_code_for_mobile_English_Wikipedia.svg.png" class="w-48 h-48 opacity-90">
                                    </div>
                                    <p class="text-sm text-text/60 max-w-sm mx-auto italic">Berlaku untuk GoPay, OVO, ShopeePay, Dana, dan seluruh Aplikasi Perbankan Nasional.</p>
                                </div>
                            @endif

                            <div class="mt-8 pt-8 border-t border-border border-dashed">
                                <h4 class="text-xs font-bold text-text/40 uppercase tracking-widest text-center mb-6">Langkah Selanjutnya</h4>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- Print Button (Now PDF) -->
                                    <a href="{{ route('booking.invoice.pdf', $groupCode) }}" target="_blank" class="group flex items-center justify-center gap-3 bg-surface border-2 border-border text-text font-bold py-4 rounded-2xl hover:border-orange hover:text-orange transition-all duration-300">
                                        <span class="text-xl group-hover:scale-110 transition-transform">📄</span> Simpan ke PDF
                                    </a>

                                    <!-- WA Button -->
                                    <a href="https://wa.me/{{ $whatsapp }}?text=Halo%20Admin,%20saya%20sudah%20memilih%20metode%20pembayaran%20{{ $payment->payment_method }}%20untuk%20booking%20{{ $groupCode }}.%20Berikut%20adalah%20detailnya..." 
                                       target="_blank"
                                       class="group flex items-center justify-center gap-3 bg-gradient-sunset text-white font-bold py-4 rounded-2xl hover:shadow-xl hover:shadow-orange/20 hover:scale-[1.02] transition-all duration-300">
                                        <span class="text-xl group-hover:rotate-12 transition-transform">📸</span> Konfirmasi via WhatsApp
                                    </a>
                                </div>

                                <p class="text-[10px] text-text/40 text-center mt-6 font-bold uppercase tracking-[0.2em] leading-loose">
                                    PENTING: Mohon cantumkan kode <span class="text-orange">#{{ $groupCode }}</span> pada berita transfer Anda agar verifikasi lebih cepat.
                                </p>
                            </div>
                        </div>
                        @else
                        <div class="text-center py-10 bg-bg/50 rounded-3xl border-2 border-dashed border-border animate-pulse">
                            <p class="text-text/40 font-bold uppercase text-xs tracking-widest">Silakan Pilih Metode Pembayaran Di Atas</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="text-center scroll-animate {{ $payment->status === 'rejected' ? 'hidden' : '' }}" data-animation="fade-up">
                <a href="{{ route('home') }}" class="text-orange font-bold text-sm tracking-widest hover:underline uppercase">← Kembali ke Beranda</a>
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
