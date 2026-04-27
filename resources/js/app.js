import './bootstrap';

// Scroll Animation with Intersection Observer
function initScrollAnimations() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const element = entry.target;
                const delay = element.dataset.delay || '0';
                
                // Add delay if specified
                if (delay > 0) {
                    setTimeout(() => {
                        element.classList.add('animate');
                    }, parseInt(delay));
                } else {
                    element.classList.add('animate');
                }
                
                // Stop observing once animated
                observer.unobserve(element);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    });
    
    // Observe all scroll-animate elements
    document.querySelectorAll('.scroll-animate').forEach(element => {
        observer.observe(element);
    });
}

// Loader Logic: Play cinematic entrance only once per session
document.addEventListener('DOMContentLoaded', function() {
    const loadingScreen = document.getElementById('loading-screen');

    // Initialize scroll animations
    initScrollAnimations();
    
    if (!loadingScreen) return;

    if (sessionStorage.getItem('alKhairatPreloaderShown')) {
        // Skip splash screen immediately on refresh/subs-sequent loads
        loadingScreen.style.display = 'none';
    } else {
        // Enforce cinematic wait time on first load
        const minLoadTime = 3500; 
        const startTime = Date.now();

        function hidePreloader() {
            if (loadingScreen.classList.contains('preloader-done')) return;
            loadingScreen.classList.add('preloader-done');
            setTimeout(() => {
                loadingScreen.style.display = 'none';
                sessionStorage.setItem('alKhairatPreloaderShown', 'true');
            }, 2000); // Wait for CSS transition (2s)
        }

        window.addEventListener('load', function() {
            const elapsedTime = Date.now() - startTime;
            const remainingTime = Math.max(0, minLoadTime - elapsedTime);
            setTimeout(hidePreloader, remainingTime);
        });

        setTimeout(hidePreloader, 8000); 
    }
    
    // Mobile Menu Toggle
    // Hero Slideshow Functionality
    const heroSlides = document.querySelectorAll('.hero-slide');
    const heroDots = document.querySelectorAll('.hero-dot');
    let currentSlide = 0;
    let slideInterval;
    
    function showSlide(index) {
        // Remove active class from all slides and dots
        heroSlides.forEach(slide => slide.classList.remove('active'));
        heroDots.forEach(dot => dot.classList.remove('active'));
        
        // Add active class to current slide and dot
        heroSlides[index].classList.add('active');
        heroDots[index].classList.add('active');
        
        currentSlide = index;
    }
    
    function nextSlide() {
        currentSlide = (currentSlide + 1) % heroSlides.length;
        showSlide(currentSlide);
    }
    
    function startAutoplay() {
        slideInterval = setInterval(nextSlide, 5000);
    }
    
    function resetAutoplay() {
        clearInterval(slideInterval);
        startAutoplay();
    }
    
    // Add event listeners to dots
    heroDots.forEach((dot, index) => {
        dot.addEventListener('click', function() {
            showSlide(index);
            resetAutoplay();
        });
    });
    
    // Start autoplay
    startAutoplay();
    
    // Pause autoplay on hover
    const heroSection = document.getElementById('hero-slideshow');
    if (heroSection) {
        heroSection.addEventListener('mouseenter', () => clearInterval(slideInterval));
        heroSection.addEventListener('mouseleave', () => startAutoplay());
    }
    
    // Header Scroll Effect
    const mainHeader = document.getElementById('main-header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            mainHeader.classList.add('scrolled');
        } else {
            mainHeader.classList.remove('scrolled');
        }
    });

    // Floating Dock Active State with Intersection Observer
    const dockItems = document.querySelectorAll('.dock-item[data-section]');
    const sections = Array.from(dockItems).map(item => document.getElementById(item.dataset.section)).filter(Boolean);

    const dockObserverOptions = {
        root: null,
        rootMargin: '-50% 0px -50% 0px', // Trigger when section is in middle of screen
        threshold: 0
    };

    const dockObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const sectionId = entry.target.id;
                dockItems.forEach(item => {
                    if (item.dataset.section === sectionId) {
                        item.classList.add('active');
                    } else {
                        item.classList.remove('active');
                    }
                });
            }
        });
    }, dockObserverOptions);

    sections.forEach(section => dockObserver.observe(section));

    // Manual click override for dock items
    dockItems.forEach(item => {
        item.addEventListener('click', function() {
            dockItems.forEach(i => i.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    // FAQ Accordion Functionality
    const faqButtons = document.querySelectorAll('section#faq button');
    
    faqButtons.forEach(button => {
        button.addEventListener('click', function() {
            const parent = this.closest('.group');
            const content = parent.querySelector('div');
            
            // Close other open items
            document.querySelectorAll('section#faq .group').forEach(item => {
                if (item !== parent) {
                    item.classList.remove('open');
                    item.querySelector('div').classList.add('hidden');
                }
            });
            
            // Toggle current item
            parent.classList.toggle('open');
            content.classList.toggle('hidden');
        });
    });
    
    // Smooth scroll behavior for all anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});

// Global Form Submit Protection (Anti Double-Submit & Loading State & Custom Confirm Dialog)
document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form');
    
    // Hijack native browser confirms on forms
    forms.forEach(form => {
        const onsubmitAttr = form.getAttribute('onsubmit');
        if (onsubmitAttr && onsubmitAttr.includes('return confirm')) {
            const match = onsubmitAttr.match(/confirm\('([^']+)'\)/);
            if (match) {
                form.dataset.confirmMsg = match[1];
            } else {
                form.dataset.confirmMsg = "Apakah Anda yakin?";
            }
            form.removeAttribute('onsubmit');
        }
    });

    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            // Biarkan form dengan target="_blank" berjalan normal (seperti cetak invoice)
            if (form.getAttribute('target') === '_blank') return;
            
            // Jika form adalah GET (seperti filter pencarian), beri efek disable ringan
            if (form.getAttribute('method') && form.getAttribute('method').toUpperCase() === 'GET') {
                const submitBtns = form.querySelectorAll('button[type="submit"]');
                submitBtns.forEach(btn => btn.classList.add('opacity-50', 'cursor-not-allowed', 'pointer-events-none'));
                return;
            }

            // Memicu Custom Modal Jika Ada Pesan Konfirmasi
            if (form.dataset.confirmMsg && form.dataset.confirmed !== 'true') {
                e.preventDefault();
                const isDelete = form.querySelector('input[name="_method"][value="DELETE"]') !== null || form.action.includes('delete') || form.action.includes('destroy');
                const confirmOptions = isDelete
                    ? { title: 'Konfirmasi Hapus', okText: 'Ya, Hapus!' }
                    : { title: 'Konfirmasi', okText: 'Ya, Lanjutkan' };

                if (window.showGlobalConfirm) {
                    window.showGlobalConfirm(form.dataset.confirmMsg, () => {
                        form.dataset.confirmed = 'true';
                        // Gunakan method natural HTMLFormElement untuk submit ulang
                        HTMLFormElement.prototype.requestSubmit.call(form);
                    }, confirmOptions);
                } else {
                    // Fallback aman
                    if (confirm(form.dataset.confirmMsg)) {
                        form.dataset.confirmed = 'true';
                        HTMLFormElement.prototype.requestSubmit.call(form);
                    }
                }
                return;
            }

            // Cegah jika event sudah dibatalkan oleh konfirmasi browser (misal user klik "Batal" saat hapus)
            if (e.defaultPrevented) return;

            // Cegah double klik
            if (form.classList.contains('is-submitting')) {
                e.preventDefault();
                return;
            }
            
            // Cek apakah ini form hapus data
            const isDelete = form.querySelector('input[name="_method"][value="DELETE"]') !== null || form.action.includes('delete') || form.action.includes('destroy');
            const loadingText = isDelete ? 'Menghapus...' : 'Menyimpan...';

            // Tandai form sedang submit
            form.classList.add('is-submitting');
            
            // Ubah tampilan semua tombol submit di dalam form ini
            const submitButtons = form.querySelectorAll('button[type="submit"]');
            
            submitButtons.forEach(button => {
                // Jangan mengubah tombol yang secara spesifik memiliki efek lain
                button.disabled = true;
                button.classList.add('cursor-wait', 'opacity-90', 'pointer-events-none');
                
                // Simpan teks asli
                if (!button.dataset.originalHtml) {
                    button.dataset.originalHtml = button.innerHTML;
                }
                
                // Ganti isi tombol dengan spinner
                button.innerHTML = `
                    <div class="flex items-center justify-center gap-2">
                        <svg class="animate-spin h-5 w-5 text-current opacity-80" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span class="font-bold">${loadingText}</span>
                    </div>
                `;
            });
        });
    });
});


// Scroll dragging untuk tabel
document.addEventListener('DOMContentLoaded', function() {
    const scrollContainers = document.querySelectorAll('.dashboard-scroll');
    
    scrollContainers.forEach(container => {
        let isDown = false;
        let startX;
        let scrollLeft;

        container.addEventListener('mousedown', (e) => {
            isDown = true;
            container.classList.add('cursor-grab', 'active');
            container.classList.remove('cursor-grab');
            startX = e.pageX - container.offsetLeft;
            scrollLeft = container.scrollLeft;
        });

        container.addEventListener('mouseleave', () => {
            isDown = false;
            container.classList.remove('active');
            container.classList.add('cursor-grab');
        });

        container.addEventListener('mouseup', () => {
            isDown = false;
            container.classList.remove('active');
            container.classList.add('cursor-grab');
        });

        container.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - container.offsetLeft;
            const walk = (x - startX) * 2; // Kecepatan scroll
            container.scrollLeft = scrollLeft - walk;
        });
    });
});



// Simpan & restore scroll position sidebar
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.querySelector('#adminSidebar .dashboard-scroll');
    
    if (sidebar) {
        // Restore scroll position
        const savedScroll = localStorage.getItem('sidebarScrollPosition');
        if (savedScroll) {
            sidebar.scrollTop = parseInt(savedScroll);
        }

        // Simpan scroll position sebelum pindah halaman
        sidebar.addEventListener('scroll', function() {
            localStorage.setItem('sidebarScrollPosition', sidebar.scrollTop);
        });

        // Simpan juga saat klik link di sidebar
        const sidebarLinks = document.querySelectorAll('#adminSidebar a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function() {
                localStorage.setItem('sidebarScrollPosition', sidebar.scrollTop);
            });
        });
    }
});

// Simpan & restore scroll position untuk halaman booking
document.addEventListener('DOMContentLoaded', function() {
    // Restore scroll position khusus untuk halaman booking
    if (window.location.pathname.includes('/bookings')) {
        const savedScrollY = sessionStorage.getItem('bookingPageScroll');
        if (savedScrollY) {
            window.scrollTo(0, parseInt(savedScrollY));
        }

        // Simpan scroll saat klik link apapun di area konten utama
        document.addEventListener('click', function(e) {
            const link = e.target.closest('a');
            if (link && link.href && !link.href.startsWith('javascript:') && !link.href.startsWith('#')) {
                sessionStorage.setItem('bookingPageScroll', window.scrollY);
            }
        });

        // Simpan juga saat form submit
        document.addEventListener('submit', function(e) {
            sessionStorage.setItem('bookingPageScroll', window.scrollY);
        });
    }
});
