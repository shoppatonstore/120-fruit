/**
 * 120 Fruit Therapy - Animation Scripts
 */

(function() {
    'use strict';

    // Wait for DOM to be ready
    document.addEventListener('DOMContentLoaded', function() {
        initScrollAnimations();
        initStatCounters();
        initFAQToggle();
    });

    /**
     * Initialize scroll-triggered animations
     */
    function initScrollAnimations() {
        const animatedElements = document.querySelectorAll('.ftp-fade-in-up, .ftp-slide-in-left, .ftp-slide-in-right, .ftp-scale-in, .ftp-stagger-children');
        
        if (!animatedElements.length) return;

        const observerOptions = {
            root: null,
            rootMargin: '0px 0px -50px 0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    // Optionally unobserve after animation
                    // observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        animatedElements.forEach(function(element) {
            observer.observe(element);
        });

        // Trigger animations for elements already in view
        setTimeout(function() {
            animatedElements.forEach(function(element) {
                const rect = element.getBoundingClientRect();
                if (rect.top < window.innerHeight && rect.bottom > 0) {
                    element.classList.add('animated');
                }
            });
        }, 100);
    }

    /**
     * Initialize statistics counter animation
     */
    function initStatCounters() {
        const counters = document.querySelectorAll('.ftp-stat-number[data-count]');
        
        if (!counters.length) return;

        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        counters.forEach(function(counter) {
            observer.observe(counter);
        });
    }

    /**
     * Animate a single counter element
     */
    function animateCounter(element) {
        const target = parseInt(element.getAttribute('data-count'), 10);
        const duration = 2000; // 2 seconds
        const startTime = performance.now();
        const startValue = 0;

        element.classList.add('counting');

        function updateCounter(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            // Easing function (ease-out)
            const easeOut = 1 - Math.pow(1 - progress, 3);
            const currentValue = Math.floor(startValue + (target - startValue) * easeOut);
            
            element.textContent = currentValue;

            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent = target;
                element.classList.remove('counting');
            }
        }

        requestAnimationFrame(updateCounter);
    }

    /**
     * Initialize FAQ accordion toggle
     */
    function initFAQToggle() {
        const faqItems = document.querySelectorAll('.ftp-faq-question');
        
        if (!faqItems.length) return;

        faqItems.forEach(function(question) {
            question.addEventListener('click', function() {
                const faqItem = this.closest('.ftp-faq-item');
                const isActive = faqItem.classList.contains('active');
                
                // Close all other items
                document.querySelectorAll('.ftp-faq-item').forEach(function(item) {
                    item.classList.remove('active');
                });
                
                // Toggle current item
                if (!isActive) {
                    faqItem.classList.add('active');
                }
            });
        });
    }

    /**
     * Add ripple effect to buttons
     */
    function addRippleEffect(element, event) {
        const ripple = document.createElement('span');
        ripple.classList.add('ftp-ripple-effect');
        
        const rect = element.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = event.clientX - rect.left - size / 2;
        const y = event.clientY - rect.top - size / 2;
        
        ripple.style.width = ripple.style.height = size + 'px';
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        
        element.appendChild(ripple);
        
        ripple.addEventListener('animationend', function() {
            ripple.remove();
        });
    }

    // Initialize ripple effects on buttons
    document.addEventListener('click', function(e) {
        const button = e.target.closest('.ftp-btn.ftp-ripple');
        if (button) {
            addRippleEffect(button, e);
        }
    });

})();