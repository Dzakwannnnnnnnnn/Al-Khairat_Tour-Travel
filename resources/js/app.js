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
