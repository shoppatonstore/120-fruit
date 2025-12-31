/**
 * 120 Fruit Therapy - Animation Scripts
 * Performance optimized with passive listeners and requestAnimationFrame
 */

(function() {
    'use strict';

    // Performance: Use passive event listeners where possible
    var passiveSupported = false;
    try {
        var options = {
            get passive() {
                passiveSupported = true;
                return false;
            }
        };
        window.addEventListener('test', null, options);
        window.removeEventListener('test', null, options);
    } catch(err) {
        passiveSupported = false;
    }

    var passiveOption = passiveSupported ? { passive: true } : false;

    // Wait for DOM to be ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    function init() {
        // Use requestAnimationFrame for initial setup
        requestAnimationFrame(function() {
            initScrollAnimations();
            initStatCounters();
            initFAQToggle();
        });
    }

    /**
     * Initialize scroll-triggered animations using IntersectionObserver
     * Much more performant than scroll event listeners
     */
    function initScrollAnimations() {
        var animatedElements = document.querySelectorAll('.ftp-fade-in-up, .ftp-slide-in-left, .ftp-slide-in-right, .ftp-scale-in, .ftp-stagger-children');
        
        if (!animatedElements.length) return;

        // Use IntersectionObserver for better performance
        if ('IntersectionObserver' in window) {
            var observerOptions = {
                root: null,
                rootMargin: '0px 0px -50px 0px',
                threshold: 0.1
            };

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        // Use requestAnimationFrame for smooth animation trigger
                        requestAnimationFrame(function() {
                            entry.target.classList.add('animated');
                        });
                        // Unobserve after animation for better performance
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            animatedElements.forEach(function(element) {
                observer.observe(element);
            });
        } else {
            // Fallback: Just show all elements
            animatedElements.forEach(function(element) {
                element.classList.add('animated');
            });
        }

        // Immediately animate elements already in viewport
        requestAnimationFrame(function() {
            animatedElements.forEach(function(element) {
                var rect = element.getBoundingClientRect();
                if (rect.top < window.innerHeight && rect.bottom > 0) {
                    element.classList.add('animated');
                }
            });
        });
    }

    /**
     * Initialize statistics counter animation with optimized RAF loop
     */
    function initStatCounters() {
        var counters = document.querySelectorAll('.ftp-stat-number[data-count]');
        
        if (!counters.length) return;

        if ('IntersectionObserver' in window) {
            var observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.5
            };

            var observer = new IntersectionObserver(function(entries) {
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
    }

    /**
     * Animate a single counter element using optimized RAF
     */
    function animateCounter(element) {
        var target = parseInt(element.getAttribute('data-count'), 10);
        var duration = 2000; // 2 seconds
        var startTime = null;
        var startValue = 0;

        element.classList.add('counting');

        function updateCounter(currentTime) {
            if (!startTime) startTime = currentTime;
            var elapsed = currentTime - startTime;
            var progress = Math.min(elapsed / duration, 1);
            
            // Easing function (ease-out cubic)
            var easeOut = 1 - Math.pow(1 - progress, 3);
            var currentValue = Math.floor(startValue + (target - startValue) * easeOut);
            
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
     * Initialize FAQ accordion toggle with event delegation
     */
    function initFAQToggle() {
        var faqContainer = document.querySelector('.ftp-faq-list');
        
        if (!faqContainer) return;

        // Use event delegation for better performance
        faqContainer.addEventListener('click', function(e) {
            var question = e.target.closest('.ftp-faq-question');
            if (!question) return;

            var faqItem = question.closest('.ftp-faq-item');
            var isActive = faqItem.classList.contains('active');
            
            // Close all other items
            var allItems = faqContainer.querySelectorAll('.ftp-faq-item');
            allItems.forEach(function(item) {
                item.classList.remove('active');
            });
            
            // Toggle current item
            if (!isActive) {
                faqItem.classList.add('active');
            }
        });
    }

    /**
     * Add ripple effect to buttons - optimized with event delegation
     */
    document.addEventListener('click', function(e) {
        var button = e.target.closest('.ftp-btn.ftp-ripple');
        if (!button) return;

        var ripple = document.createElement('span');
        ripple.classList.add('ftp-ripple-effect');
        
        var rect = button.getBoundingClientRect();
        var size = Math.max(rect.width, rect.height);
        var x = e.clientX - rect.left - size / 2;
        var y = e.clientY - rect.top - size / 2;
        
        ripple.style.cssText = 'width:' + size + 'px;height:' + size + 'px;left:' + x + 'px;top:' + y + 'px';
        
        button.appendChild(ripple);
        
        // Remove ripple after animation using RAF for cleanup
        requestAnimationFrame(function() {
            setTimeout(function() {
                if (ripple.parentNode) {
                    ripple.remove();
                }
            }, 600);
        });
    });

})();