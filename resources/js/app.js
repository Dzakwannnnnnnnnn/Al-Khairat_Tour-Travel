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

// Hide loading screen when page is fully loaded
window.addEventListener('load', function() {
    const loadingScreen = document.getElementById('loading-screen');
    if (loadingScreen) {
        setTimeout(() => {
            loadingScreen.classList.add('hidden');
        }, 500);
    }
});

// Also hide loading screen on DOM ready (for faster perceived load)
document.addEventListener('DOMContentLoaded', function() {
    const loadingScreen = document.getElementById('loading-screen');
    if (loadingScreen) {
        // Start fading out after 1 second minimum
        setTimeout(() => {
            loadingScreen.classList.add('hidden');
        }, 1000);
    }
    
    // Initialize scroll animations
    initScrollAnimations();
    
    // Mobile Menu Toggle
    // Hero Slideshow Functionality
    const heroSlides = document.querySelectorAll('.hero-slide');
    const heroDots = document.querySelectorAll('.hero-dot');
    const heroPrevBtn = document.getElementById('hero-prev');
    const heroNextBtn = document.getElementById('hero-next');
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
    
    function prevSlide() {
        currentSlide = (currentSlide - 1 + heroSlides.length) % heroSlides.length;
        showSlide(currentSlide);
    }
    
    function startAutoplay() {
        slideInterval = setInterval(nextSlide, 5000);
    }
    
    function resetAutoplay() {
        clearInterval(slideInterval);
        startAutoplay();
    }
    
    // Add event listeners to navigation buttons
    if (heroPrevBtn) {
        heroPrevBtn.addEventListener('click', function() {
            prevSlide();
            resetAutoplay();
        });
    }
    
    if (heroNextBtn) {
        heroNextBtn.addEventListener('click', function() {
            nextSlide();
            resetAutoplay();
        });
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
    
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuBtn && mobileMenu) {
        // Toggle menu on button click
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('active');
            
            // Animate hamburger icon
            const spans = mobileMenuBtn.querySelectorAll('span');
            if (mobileMenu.classList.contains('active')) {
                spans[0].style.transform = 'translateY(0.5rem) rotate(45deg)';
                spans[1].style.opacity = '0';
                spans[2].style.transform = 'translateY(-0.5rem) rotate(-45deg)';
            } else {
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            }
        });
        
        // Close menu when clicking on links
        const mobileMenuItems = mobileMenu.querySelectorAll('.mobile-menu-item');
        mobileMenuItems.forEach(item => {
            item.addEventListener('click', function() {
                mobileMenu.classList.remove('active');
                const spans = mobileMenuBtn.querySelectorAll('span');
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            });
        });
    }
    
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
