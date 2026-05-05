<div id="main-logo-header" class="fixed top-0 left-0 w-full z-[100] pointer-events-none transition-all duration-500 ease-in-out p-2 sm:p-4 md:p-8 flex items-center justify-between">
    <!-- Logo Section -->
    <a href="{{ route('home') }}" class="flex items-center gap-4 group pointer-events-auto transform-gpu transition-all duration-500 origin-left" id="logo-wrapper">
        <div class="relative shrink-transition">
            <!-- Enhanced Glow for Contrast -->
            <div class="absolute -inset-3 bg-orange/40 rounded-[2rem] blur-2xl opacity-0 group-hover:opacity-100 transition duration-700"></div>
            <div class="absolute -inset-1 bg-white/20 rounded-2xl blur-sm opacity-50 shadow-[0_0_15px_rgba(255,255,255,0.2)]"></div>
            
            <img src="{{ asset('images/logo.jpg') }}" alt="Al-Khairat Logo" 
                class="relative h-20 md:h-32 rounded-2xl shadow-2xl transition-all duration-500 ease-in-out border border-white/10 brightness-110 contrast-110 logo-img" 
                id="main-logo-img">
        </div>
        <div class="hidden lg:block lg:ml-2 transition-all duration-500 logo-text-container" id="logo-text">
            <h1 class="text-4xl font-serif font-black leading-none tracking-tighter logo-title bg-gradient-to-r from-[#8B4513] via-[#E07856] to-[#8B4513] bg-clip-text text-transparent drop-shadow-[0_2px_4px_rgba(224,120,86,0.2)]">AL-KHAIRAT</h1>
            <p class="text-[12px] font-sans font-bold text-[#8B4513] tracking-[0.4em] uppercase mt-2 logo-subtitle opacity-80">Tour & Travel</p>
        </div>
    </a>

    <!-- Mobile Navigation Trigger (Top Right) - STRICTLY HIDDEN ON DESKTOP -->
    <div class="md:hidden pointer-events-auto" id="mobile-trigger">
        <button onclick="window.toggleMobileMenu()" class="pointer-events-auto w-12 h-12 md:w-16 md:h-16 rounded-2xl bg-surface/90 dark:bg-surface/80 shadow-xl border border-orange/10 flex items-center justify-center text-charcoal hover:bg-orange hover:text-white transition-all duration-300 active:scale-95 group z-[110]">
            <div class="relative w-8 h-8">
                <svg id="menu-icon-closed" class="absolute inset-0 w-full h-full transition-all duration-500 opacity-100 scale-100 group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
                <svg id="menu-icon-opened" class="absolute inset-0 w-full h-full transition-all duration-500 opacity-0 scale-50 rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>
        </button>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const header = document.getElementById('main-logo-header');
        
        // Fallback: jika toggleMobileMenu belum didefinisikan oleh dock-navigation
        if (typeof window.toggleMobileMenu !== 'function') {
            window.toggleMobileMenu = function() {};
        }
        
        function handleScroll() {
            if (window.scrollY > 50) {
                header.classList.add('header-scrolled');
            } else {
                header.classList.remove('header-scrolled');
            }
        }

        window.addEventListener('scroll', handleScroll);
        // Initial check
        handleScroll();
    });
</script>
@endpush

<style>
    /* Desktop Shrink */
    .header-scrolled {
        padding: 1rem !important;
    }
    
    .header-scrolled .logo-img {
        height: 4rem !important; /* h-16 */
    }
    
    @media (min-width: 768px) {
        .header-scrolled .logo-img {
            height: 5rem !important; /* h-20 */
        }
    }

    .header-scrolled .logo-text-container {
        transform: scale(0.75);
        opacity: 0.9;
        margin-left: -1rem;
    }

    .header-scrolled .logo-title {
        font-size: 1.875rem !important; /* text-3xl */
    }

    /* Mobile Shrink */
    @media (max-width: 767px) {
        .header-scrolled {
            padding: 0.25rem 0.75rem !important;
        }
        .header-scrolled .logo-img {
            height: 3.5rem !important; /* h-14 */
        }
        .header-scrolled .scale-trigger {
            transform: scale(0.9);
        }
    }

    /* Base Transitions */
    .logo-img, .logo-text-container, .logo-title, #main-logo-header {
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>
