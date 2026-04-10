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
    <x-logo-header />

    <main class="section-py min-h-screen pt-32 pb-24 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            
            <!-- Success Message Header -->
            <div class="text-center mb-12 scroll-animate" data-animation="fade-up">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-green-500/10 text-green-500 text-4xl mb-6">
                    ✅
                </div>
                <h1 class="text-3xl md:text-4xl font-serif font-bold text-text mb-2">Pendaftaran Berhasil!</h1>
                <p class="text-text/60 max-w-lg mx-auto leading-relaxed">Terima kasih telah mempercayakan perjalanan spiritual Anda kepada Al-Khairat. Silakan selesaikan pembayaran di bawah ini.</p>
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
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xs font-bold text-text/40 uppercase tracking-widest mb-4">Data Pemesan</h3>
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-orange/10 flex items-center justify-center text-orange flex-shrink-0 text-xl font-bold">👤</div>
                                <div>
                                    <p class="font-bold text-text text-lg leading-tight">{{ $bookings->first()->user->name }}</p>
                                    <p class="text-text/60 text-sm mt-1">{{ $bookings->first()->orderer_phone ?? $bookings->first()->user->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

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
                        <h3 class="text-xl md:text-2xl font-serif font-bold text-text mb-6">Pilih Metode Pembayaran</h3>
                        
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

                        <!-- Payment Instructions -->
                        @if($payment->payment_method !== 'Belum Memilih')
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

            <div class="text-center scroll-animate" data-animation="fade-up">
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
        });
    </script>
    @stack('scripts')
</body>
</html>
