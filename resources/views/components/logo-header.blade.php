<div id="main-logo-header" class="fixed top-0 left-0 z-[100] pointer-events-none transition-all duration-500 ease-in-out p-4 md:p-8">
    <!-- Logo Section -->
    <a href="{{ route('home') }}" class="flex items-center gap-4 group pointer-events-auto transform-gpu transition-all duration-500 origin-left" id="logo-wrapper">
        <div class="relative shrink-transition">
            <!-- Enhanced Glow for Contrast -->
            <div class="absolute -inset-3 bg-orange/40 rounded-[2rem] blur-2xl opacity-0 group-hover:opacity-100 transition duration-700"></div>
            <div class="absolute -inset-1 bg-white/20 rounded-2xl blur-sm opacity-50 shadow-[0_0_15px_rgba(255,255,255,0.2)]"></div>
            
            <img src="{{ asset('images/logo.jpg') }}" alt="Al-Khairat Logo" 
                class="relative h-24 md:h-32 rounded-2xl shadow-2xl transition-all duration-500 ease-in-out border border-white/10 brightness-110 contrast-110 logo-img" 
                id="main-logo-img">
        </div>
        <div class="hidden lg:block lg:ml-2 transition-all duration-500 logo-text-container" id="logo-text">
            <h1 class="text-4xl font-serif font-black leading-none tracking-tighter logo-title bg-gradient-to-r from-[#8B4513] via-[#E07856] to-[#8B4513] bg-clip-text text-transparent drop-shadow-[0_2px_4px_rgba(224,120,86,0.2)]">AL-KHAIRAT</h1>
            <p class="text-[12px] font-sans font-bold text-[#8B4513] tracking-[0.4em] uppercase mt-2 logo-subtitle opacity-80">Tour & Travel</p>
        </div>
    </a>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const header = document.getElementById('main-logo-header');
        
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
            padding: 0.5rem !important;
        }
        .header-scrolled .logo-img {
            height: 3.5rem !important; /* h-14 */
        }
    }

    /* Base Transitions */
    .logo-img, .logo-text-container, .logo-title, #main-logo-header {
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>
