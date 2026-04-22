    <!-- Premium Contact & Maps Section -->
    <section id="contact" class="contact-section section-py transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-6 md:mb-12 scroll-animate" data-animation="fade-up">
                <div class="contact-badge mx-auto">
                    <span class="w-2 h-2 rounded-full bg-orange animate-pulse"></span>
                    <span>Hubungi Kami</span>
                </div>
                <h2 class="text-3xl md:text-display text-text mb-2 md:mb-4">Wujudkan Impian <span class="text-gradient-sunset">Umroh Anda</span></h2>
                <p class="text-sm md:text-xl text-text/70 max-w-2xl mx-auto px-4">
                    Kami siap melayani perjalanan spiritual Anda dengan kehangatan dan profesionalisme.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8 items-stretch px-2 md:px-0">
                <!-- Contact Info Cards -->
                <div class="space-y-3 flex flex-col justify-center">
                    <div class="grid grid-cols-2 md:grid-cols-2 gap-3 md:gap-4">
                        <!-- Address Card -->
                        <div onclick="toggleContactMode('map')" class="contact-glass-card col-span-2 cursor-pointer group scroll-animate p-4 md:p-6" data-animation="slide-up">
                            <div class="contact-info-icon group-hover:bg-orange group-hover:text-white transition-all transform group-hover:rotate-12 w-10 h-10 md:w-12 md:h-12">
                                <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <h4 class="text-lg md:text-xl font-serif font-bold mb-1 md:mb-2 text-text">Kantor Pusat</h4>
                            <p class="text-text/70 text-[11px] md:text-sm leading-relaxed">
                                Jl. Lambung Mangkurat No.29, Pelita, Kec. Samarinda Utara, Kota Samarinda, Kalimantan Timur 75117
                            </p>
                        </div>

                        <!-- Phone Card -->
                        <a href="https://wa.me/6281351408541" target="_blank" class="contact-glass-card block group scroll-animate p-4 md:p-6" data-animation="slide-up" data-delay="100">
                            <div class="contact-info-icon group-hover:bg-orange group-hover:text-white transition-all transform group-hover:rotate-12 w-10 h-10 md:w-12 md:h-12">
                                <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <h4 class="text-lg md:text-xl font-serif font-bold mb-1 md:mb-2 text-text">WhatsApp</h4>
                            <p class="text-text/70 text-[11px] md:text-sm">+62 813-5140-8541</p>
                        </a>

                        <!-- Email Card -->
                        <div onclick="toggleContactMode('form')" class="contact-glass-card cursor-pointer group scroll-animate p-4 md:p-6" data-animation="slide-up" data-delay="200">
                            <div class="contact-info-icon group-hover:bg-orange group-hover:text-white transition-all transform group-hover:rotate-12 w-10 h-10 md:w-12 md:h-12">
                                <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <h4 class="text-lg md:text-xl font-serif font-bold mb-1 md:mb-2 text-text">Pesan</h4>
                            <p class="text-text/70 text-[11px] md:text-sm">Klik kirim email</p>
                        </div>
                    </div>


                </div>

                <!-- Simple Clean Media Container -->
                <div class="relative scroll-animate mt-1 lg:mt-0" data-animation="scale-up">
                    <div class="relative h-auto min-h-[280px] md:h-[500px] bg-white dark:bg-surface rounded-3xl shadow-xl dark:shadow-[0_0_40px_rgba(243,156,18,0.15)] overflow-hidden transition-all duration-700">
                        
                        <!-- Mode 1: Google Map -->
                        <div id="media-map" class="media-transition mode-active w-full h-[280px] md:h-full rounded-3xl overflow-hidden">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.673244246824!2d117.15197827591605!3d-0.4885834352562444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67f3f2d210545%3A0x67a840c83a0058e5!2sJl.%20Lambung%20Mangkurat%20No.29%2C%20Pelita%2C%20Kec.%20Samarinda%20Utara%2C%20Kota%20Samarinda%2C%20Kalimantan%20Timur%2075117!5e0!3m2!1sid!2sid!4v1712613145678!5m2!1sid!2sid" 
                                class="w-full h-full grayscale-[0.1] contrast-[1.1] hover:grayscale-0 transition duration-700" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>

                        <!-- Mode 2: Contact Form -->
                        <div id="media-form" class="media-transition mode-hidden w-full h-auto bg-surface p-5 md:p-10 flex flex-col justify-center">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-2xl font-serif font-bold text-text">Tulis <span class="text-gradient-sunset">Pesan</span></h3>
                                <button onclick="toggleContactMode('map')" class="text-orange hover:text-sunset flex items-center space-x-2 font-bold transition group">
                                    <svg class="w-5 h-5 group-hover:-translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                                    <span>Kembali ke Peta</span>
                                </button>
                            </div>
                            
                            <form id="contact-form" class="space-y-4">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <input type="text" name="name" placeholder="Nama Lengkap" class="form-input" required>
                                    <input type="email" name="email" placeholder="Email Anda" class="form-input" required>
                                </div>
                                <input type="text" name="subject" placeholder="Subjek Pesan" class="form-input" required>
                                <textarea name="message" rows="4" placeholder="Tuliskan pesan atau pertanyaan Anda di sini..." class="form-input resize-none" required></textarea>
                                <button type="submit" id="submit-btn" class="w-full btn-primary py-4 text-white font-bold flex items-center justify-center space-x-2 transition-all shadow-lg hover:shadow-orange/30">
                                    <svg id="submit-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                    <span id="submit-text">Kirim Sekarang</span>
                                </button>
                                <div id="form-feedback" class="hidden text-sm font-medium mt-2 text-center p-3 rounded-xl border"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function toggleContactMode(mode) {
            const map = document.getElementById('media-map');
            const form = document.getElementById('media-form');
            
            if (mode === 'form') {
                map.classList.remove('mode-active');
                map.classList.add('mode-hidden');
                form.classList.remove('mode-hidden');
                form.classList.add('mode-active');
            } else {
                form.classList.remove('mode-active');
                form.classList.add('mode-hidden');
                map.classList.remove('mode-hidden');
                map.classList.add('mode-active');
            }
        }

        document.getElementById('contact-form')?.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const form = this;
            const submitBtn = document.getElementById('submit-btn');
            const submitText = document.getElementById('submit-text');
            const submitIcon = document.getElementById('submit-icon');
            const feedback = document.getElementById('form-feedback');
            
            // Loading State
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-70', 'cursor-not-allowed');
            submitText.innerText = 'Mengirim...';
            submitIcon.classList.add('animate-bounce');
            feedback.classList.add('hidden');

            try {
                const formData = new FormData(form);
                const response = await fetch('{{ route("contact.send") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const data = await response.json();

                feedback.classList.remove('hidden', 'bg-orange/10', 'border-orange/20', 'text-orange-700', 'bg-red-50', 'border-red-100', 'text-red-600');
                
                if (response.ok && data.status === 'success') {
                    feedback.classList.add('bg-orange/10', 'border-orange/20', 'text-orange-700');
                    feedback.innerText = data.message;
                    form.reset();
                    setTimeout(() => toggleContactMode('map'), 3000);
                } else {
                    feedback.classList.add('bg-red-50', 'border-red-100', 'text-red-600');
                    feedback.innerText = data.message || 'Maaf, terjadi kesalahan. Silakan coba lagi.';
                }
            } catch (error) {
                feedback.classList.remove('hidden');
                feedback.classList.add('bg-red-50', 'border-red-100', 'text-red-600');
                feedback.innerText = 'Koneksi bermasalah. Periksa jaringan Anda.';
            } finally {
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-70', 'cursor-not-allowed');
                submitText.innerText = 'Kirim Sekarang';
                submitIcon.classList.remove('animate-bounce');
            }
        });
    </script>
