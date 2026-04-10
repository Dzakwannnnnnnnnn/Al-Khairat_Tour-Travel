<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ strtoupper($product->name) }} - Form Pendaftaran | Al-Khairat</title>
    
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
        <div class="max-w-7xl mx-auto">
            <!-- Breadcrumb -->
            <nav class="flex mb-8 text-sm md:text-base font-medium overflow-x-auto whitespace-nowrap pb-2 scroll-animate" data-animation="fade-up">
                <a href="{{ route('home') }}" class="text-text/60 hover:text-orange transition">BERANDA</a>
                <span class="mx-3 text-text/30">/</span>
                <span class="text-text/60 uppercase">{{ $product->name }}</span>
                <span class="mx-3 text-text/30">/</span>
                <span class="text-orange font-bold uppercase">Form Pendaftaran</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <!-- Left: Form Section -->
                <div class="lg:col-span-8 space-y-6">
                    <form action="{{ route('bookings.public') }}" method="POST" id="booking-form" class="space-y-6">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <!-- Total seats count for backend -->
                        <input type="hidden" name="booking_seat" id="booking_seat_count" value="1">

                        <!-- Data Pemesan Card -->
                        <div class="bg-surface rounded-3xl border border-border p-6 md:p-8 shadow-sm hover:shadow-xl transition-all duration-500 scroll-animate" data-animation="slide-up">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 rounded-xl bg-orange/10 flex items-center justify-center text-orange text-xl">
                                    📋
                                </div>
                                <h2 class="text-xl md:text-2xl font-serif font-bold text-text">Data Pemesan</h2>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                                <div>
                                    <label class="block text-xs font-bold text-text/60 uppercase tracking-widest mb-2">Nama Pemesan</label>
                                    <div class="relative group">
                                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-text/40 group-focus-within:text-orange transition-colors">👤</span>
                                        <input type="text" name="orderer_name" required value="{{ Auth::user()->name ?? '' }}" class="form-input pl-12" placeholder="Nama Lengkap">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-xs font-bold text-text/60 uppercase tracking-widest mb-2">Nomor Telephone Pemesan</label>
                                        <div class="relative group">
                                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-text/40 group-focus-within:text-orange transition-colors">📞</span>
                                            <input type="tel" name="orderer_phone" required class="form-input pl-12" placeholder="Contoh: 0812xxxx">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-text/60 uppercase tracking-widest mb-2">Alamat Email Pemesan</label>
                                        <div class="relative group">
                                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-text/40 group-focus-within:text-orange transition-colors">✉️</span>
                                            <input type="email" name="orderer_email" required value="{{ Auth::user()->email ?? '' }}" class="form-input pl-12" placeholder="email@contoh.com">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-8 pt-6 border-t border-border flex justify-end">
                                <button type="button" onclick="copyOrdererToPilgrim()" class="bg-orange/10 text-orange font-bold text-sm px-6 py-3 rounded-xl hover:bg-orange hover:text-white transition-all transform active:scale-95 shadow-sm">
                                    Masukkan Sebagai Jamaah
                                </button>
                            </div>
                        </div>

                        <!-- Detail Peserta Section -->
                        <div id="pilgrims-container" class="space-y-6">
                            <!-- Pilgrim Card (Jamaah 1) -->
                            <div class="pilgrim-card bg-surface rounded-3xl border border-border p-6 md:p-8 shadow-sm hover:shadow-xl transition-all duration-500 relative scroll-animate" data-animation="slide-up">
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-xl bg-orange/10 flex items-center justify-center text-orange text-xl">
                                            👤
                                        </div>
                                        <h2 class="text-xl md:text-2xl font-serif font-bold text-text pilgrim-title">Profile Jamaah 1</h2>
                                    </div>
                                    <span class="text-text/30 font-bold pilgrim-index">#1</span>
                                </div>

                                <div class="space-y-6">
                                    <div>
                                        <label class="block text-xs font-bold text-text/60 uppercase tracking-widest mb-2">Nama Jamaah (Sesuai Paspor/KTP)</label>
                                        <div class="relative group">
                                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-text/40 group-focus-within:text-orange transition-colors">👤</span>
                                            <input type="text" name="full_name[]" required class="form-input pl-12 pilgrim-name-input" placeholder="Nama Lengkap Sesuai Dokumen">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-xs font-bold text-text/60 uppercase tracking-widest mb-2">NIK KTP (16 Digit)</label>
                                            <div class="relative group">
                                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-text/40 group-focus-within:text-orange transition-colors">🆔</span>
                                                <input type="text" name="nik[]" required maxlength="16" class="form-input pl-12" placeholder="327xxxxxxxxxxxxx">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-xs font-bold text-text/60 uppercase tracking-widest mb-2">Tempat, Tgl Lahir</label>
                                            <div class="grid grid-cols-2 gap-2">
                                                <input type="text" name="birth_place[]" required class="form-input" placeholder="Kota Lahir">
                                                <input type="date" name="birth_date[]" required class="form-input">
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-text/60 uppercase tracking-widest mb-2">Alamat Lengkap</label>
                                        <textarea name="address[]" required rows="2" class="form-input" placeholder="Jl. Mawar No. 123..."></textarea>
                                    </div>

                                    <!-- Room Variation -->
                                    <div>
                                        <label class="block text-xs font-bold text-text/60 uppercase tracking-widest mb-4">Varian Kamar</label>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                            @php
                                                $basePrice = (float)$product->price;
                                                $quadPrice = $basePrice - 1000000;
                                                $triplePrice = $basePrice;
                                                $doublePrice = $basePrice + 2000000;
                                            @endphp
                                            <!-- QUAD -->
                                            <label class="cursor-pointer group">
                                                <input type="radio" name="room_variant[0]" value="quad" checked class="hidden peer">
                                                <div class="p-4 rounded-2xl border-2 border-border peer-checked:border-orange peer-checked:bg-orange/5 hover:border-orange/30 transition-all flex flex-col items-center text-center">
                                                    <span class="text-xs font-bold text-text/40 group-hover:text-orange/60 transition uppercase mb-1">[QUAD]</span>
                                                    <span class="font-bold text-text text-sm md:text-base">Rp {{ number_format($quadPrice, 0, ',', '.') }},-</span>
                                                </div>
                                            </label>
                                            <!-- TRIPLE -->
                                            <label class="cursor-pointer group">
                                                <input type="radio" name="room_variant[0]" value="triple" class="hidden peer">
                                                <div class="p-4 rounded-2xl border-2 border-border peer-checked:border-orange peer-checked:bg-orange/5 hover:border-orange/30 transition-all flex flex-col items-center text-center">
                                                    <span class="text-xs font-bold text-text/40 group-hover:text-orange/60 transition uppercase mb-1">[TRIPLE]</span>
                                                    <span class="font-bold text-text text-sm md:text-base">Rp {{ number_format($triplePrice, 0, ',', '.') }},-</span>
                                                </div>
                                            </label>
                                            <!-- DOUBLE -->
                                            <label class="cursor-pointer group">
                                                <input type="radio" name="room_variant[0]" value="double" class="hidden peer">
                                                <div class="p-4 rounded-2xl border-2 border-border peer-checked:border-orange peer-checked:bg-orange/5 hover:border-orange/30 transition-all flex flex-col items-center text-center">
                                                    <span class="text-xs font-bold text-text/40 group-hover:text-orange/60 transition uppercase mb-1">[DOUBLE]</span>
                                                    <span class="font-bold text-text text-sm md:text-base">Rp {{ number_format($doublePrice, 0, ',', '.') }},-</span>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Add Jamaah Button -->
                        <div class="scroll-animate" data-animation="fade-up">
                            <button type="button" onclick="addPilgrim()" class="w-full flex items-center justify-center gap-2 py-4 bg-green-500/10 text-green-600 border-2 border-dashed border-green-500/30 rounded-3xl font-bold hover:bg-green-500 hover:text-white transition-all duration-300">
                                <span>➕</span> Tambah Jamaah
                            </button>
                            <p class="text-[10px] text-text/40 text-center mt-2 italic">* Daftarkan anggota keluarga atau rekan Anda dalam satu rombongan.</p>
                        </div>

                        <!-- Extra Sections -->
                        <div class="space-y-4">
                            <!-- Voucher -->
                            <div class="bg-surface rounded-2xl border border-border p-5 scroll-animate" data-animation="fade-up">
                                <h3 class="text-sm font-bold text-text/60 uppercase tracking-widest mb-3">Kode Voucher (Opsional)</h3>
                                <div class="relative group">
                                    <input type="text" name="voucher_code" class="form-input" placeholder="Masukkan kode voucher di sini...">
                                    <button type="button" class="absolute right-2 top-1/2 -translate-y-1/2 text-orange font-bold text-sm px-4 py-2 hover:bg-orange/10 rounded-lg transition">Cek</button>
                                </div>
                            </div>

                            <!-- Notes -->
                            <div class="bg-surface rounded-2xl border border-border p-5 scroll-animate" data-animation="fade-up">
                                <h3 class="text-sm font-bold text-text/60 uppercase tracking-widest mb-3">Catatan (Opsional)</h3>
                                <textarea name="notes" rows="3" class="form-input" placeholder="Ada permintaan khusus? Tulis di sini..."></textarea>
                            </div>

                            <!-- T&C -->
                            <div class="flex items-center gap-3 px-2 scroll-animate" data-animation="fade-up">
                                <input type="checkbox" required class="w-5 h-5 rounded border-2 border-border text-orange focus:ring-orange transition">
                                <p class="text-sm text-text/70">
                                    Klik di sini untuk setuju dengan <a href="#" class="text-orange font-bold hover:underline">Syarat dan Ketentuan</a>
                                </p>
                            </div>

                            <!-- Submit -->
                            <div class="pt-4 scroll-animate" data-animation="fade-up">
                                <button type="submit" class="w-full bg-gradient-sunset text-white font-bold py-5 rounded-3xl shadow-xl hover:shadow-orange/30 hover:scale-[1.02] transition-all transform active:scale-95 text-lg">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Right: Sidebar/Summary -->
                <div class="lg:col-span-4 lg:sticky lg:top-32 space-y-6">
                    <!-- Package Info Card -->
                    <div class="bg-surface rounded-[2.5rem] border border-border shadow-2xl overflow-hidden scroll-animate" data-animation="slide-left">
                        <div class="h-48 relative">
                             @if($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-sunset"></div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                            <div class="absolute bottom-6 left-6">
                                <span class="bg-orange/90 backdrop-blur-md text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase mb-2 inline-block">PACKAGES</span>
                                <h3 class="text-xl md:text-2xl font-serif font-bold text-white leading-tight uppercase">{{ $product->name }}</h3>
                            </div>
                        </div>

                        <div class="p-8 space-y-6">
                            <!-- Stats... -->
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-orange/10 flex items-center justify-center text-orange flex-shrink-0 text-xl">📍</div>
                                <div>
                                    <p class="text-[10px] font-bold text-text/40 uppercase tracking-widest">Berangkat dari</p>
                                    <p class="font-bold text-text text-sm md:text-base">JAKARTA (CGK)</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-orange/10 flex items-center justify-center text-orange flex-shrink-0 text-xl">🚌</div>
                                <div>
                                    <p class="text-[10px] font-bold text-text/40 uppercase tracking-widest">Durasi Perjalanan</p>
                                    <p class="font-bold text-text text-sm md:text-base uppercase">{{ $product->duration }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-orange/10 flex items-center justify-center text-orange flex-shrink-0 text-xl">🏢</div>
                                <div>
                                    <p class="text-[10px] font-bold text-text/40 uppercase tracking-widest">Hotel Akomodasi</p>
                                    <ul class="font-bold text-text text-sm">
                                        <li>Hotel Makkah ⭐⭐⭐⭐⭐</li>
                                        <li>Hotel Madinah ⭐⭐⭐⭐⭐</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="flex items-center gap-4 bg-red-600/10 border border-red-200/50 p-4 rounded-2xl">
                                <div class="w-10 h-10 rounded-xl bg-red-600 flex items-center justify-center text-white flex-shrink-0 text-lg">⚡</div>
                                <div>
                                    <p class="text-[10px] font-bold text-red-600 uppercase tracking-widest leading-none mb-1">Terbatas!</p>
                                    <p class="font-bold text-red-600 text-sm">SISA {{ max(0, $product->stock) }} KURSI</p>
                                </div>
                            </div>
                        </div>

                        <!-- Price summary footer -->
                        <div class="bg-bg p-8 border-t border-border">
                            <p class="text-[10px] font-bold text-text/40 uppercase tracking-widest mb-1 text-center font-sans">Total Pembayaran Estimasi</p>
                            <p class="text-3xl font-bold text-orange text-center tracking-tighter" id="display-total-price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="text-[10px] text-center text-text/40 mt-1">* Total untuk <span id="display-seat-count">1</span> orang</p>
                        </div>
                    </div>

                    <!-- Help Card -->
                    <div class="bg-gradient-sunset rounded-3xl p-8 text-white shadow-xl relative overflow-hidden scroll-animate" data-animation="slide-left">
                        <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-white/10 rounded-full blur-3xl"></div>
                        <h4 class="text-xl font-bold mb-2">Butuh Bantuan?</h4>
                        <p class="text-white/80 text-sm mb-6 leading-relaxed">Tim konsultan kami siap membantu Anda menyelesaikan pendaftaran.</p>
                        <a href="https://wa.me/{{ $whatsapp }}" target="_blank" class="block w-full text-center bg-white text-orange font-bold py-3 rounded-xl hover:bg-bg transition-colors shadow-lg">
                            Hubungi Admin via WA
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <x-footer />

    <script>
        let pilgrimCount = 1;
        const basePrice = {{ $product->price }};

        function addPilgrim() {
            pilgrimCount++;
            const container = document.getElementById('pilgrims-container');
            const firstCard = container.querySelector('.pilgrim-card');
            const newCard = firstCard.cloneNode(true);

            // Update indices and titles
            newCard.querySelector('.pilgrim-title').innerText = `Profile Jamaah ${pilgrimCount}`;
            newCard.querySelector('.pilgrim-index').innerText = `#${pilgrimCount}`;
            
            // Update input names for radio buttons (unique group per card)
            newCard.querySelectorAll('input[type="radio"]').forEach(radio => {
                radio.name = `room_variant[${pilgrimCount - 1}]`;
                if (radio.value === 'quad') radio.checked = true;
            });

            // Clear input values
            newCard.querySelectorAll('input[type="text"], input[type="date"], textarea').forEach(input => {
                input.value = '';
            });

            // Add delete button
            const deleteBtn = document.createElement('button');
            deleteBtn.type = 'button';
            deleteBtn.className = 'absolute top-6 right-16 text-red-500 hover:text-red-700 transition font-bold text-sm flex items-center gap-1';
            deleteBtn.innerHTML = '<span>🗑️</span> Hapus';
            deleteBtn.onclick = function() { removePilgrim(newCard); };
            newCard.appendChild(deleteBtn);

            container.appendChild(newCard);
            updateSummary();
        }

        function removePilgrim(card) {
            if (pilgrimCount > 1) {
                card.remove();
                pilgrimCount--;
                reindexPilgrims();
                updateSummary();
            }
        }

        function reindexPilgrims() {
            const cards = document.querySelectorAll('.pilgrim-card');
            cards.forEach((card, index) => {
                const realIndex = index + 1;
                card.querySelector('.pilgrim-title').innerText = `Profile Jamaah ${realIndex}`;
                card.querySelector('.pilgrim-index').innerText = `#${realIndex}`;
                
                card.querySelectorAll('input[type="radio"]').forEach(radio => {
                    radio.name = `room_variant[${index}]`;
                });
            });
            pilgrimCount = cards.length;
        }

        function updateSummary() {
            const seatCountInput = document.getElementById('booking_seat_count');
            seatCountInput.value = pilgrimCount;
            document.getElementById('display-seat-count').innerText = pilgrimCount;

            // Simple price calculation (could be more complex if counting variants lives)
            let totalPrice = 0;
            const variants = document.querySelectorAll('input[type="radio"]:checked');
            variants.forEach(radio => {
                let p = basePrice;
                if (radio.value === 'quad') p -= 1000000;
                else if (radio.value === 'double') p += 2000000;
                totalPrice += p;
            });

            document.getElementById('display-total-price').innerText = `Rp ${totalPrice.toLocaleString('id-ID')}`;
        }

        // Listen for variant changes
        document.getElementById('booking-form').addEventListener('change', (e) => {
            if (e.target.type === 'radio') updateSummary();
        });

        function copyOrdererToPilgrim() {
            const ordererName = document.querySelector('input[name="orderer_name"]').value;
            const pilgrimName = document.querySelector('.pilgrim-name-input');
            
            if (ordererName) {
                pilgrimName.value = ordererName;
                pilgrimName.classList.add('ring-2', 'ring-orange');
                setTimeout(() => pilgrimName.classList.remove('ring-2', 'ring-orange'), 1000);
            } else {
                alert('Silakan isi Nama Pemesan terlebih dahulu.');
            }
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
            updateSummary();
        });
    </script>
    @stack('scripts')
</body>
</html>
