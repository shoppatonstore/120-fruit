/**
 * 120 Fruit Therapy - Scroll Effects Scripts
 * Performance optimized with passive listeners, debouncing, and throttling
 */

(function() {
    'use strict';

    // Performance: Use passive event listeners where possible
    var passiveSupported = false;
    try {
        var options = Object.defineProperty({}, 'passive', {
            get: function() { passiveSupported = true; return true; }
        });
        window.addEventListener('test', null, options);
        window.removeEventListener('test', null, options);
    } catch(e) {
        passiveSupported = false;
    }
    var passiveOption = passiveSupported ? { passive: true } : false;

    // Variables for scroll handling
    var lastScrollTop = 0;
    var scrollTicking = false;
    var header = null;
    var heroVideo = null;
    var scrollRAF = null;

    // Throttle function for scroll events
    function throttle(func, limit) {
        var inThrottle;
        return function() {
            var args = arguments;
            var context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(function() { inThrottle = false; }, limit);
            }
        };
    }

    // Wait for DOM to be ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    function init() {
        // Use requestAnimationFrame for initial setup
        requestAnimationFrame(function() {
            initElements();
            initMobileMenu();
            initSmoothScroll();
            initScrollEffects();
            initBackToTop();
            initScrollProgressBar();
            initSectionWelcome();
        });
    }

    /**
     * Initialize element references
     */
    function initElements() {
        header = document.getElementById('ftp-header');
        heroVideo = document.querySelector('.ftp-hero-video-container');
    }

    /**
     * Initialize mobile menu toggle with event delegation
     */
    function initMobileMenu() {
        var toggle = document.querySelector('.ftp-mobile-menu-toggle');
        var nav = document.querySelector('.ftp-nav');
        
        if (!toggle || !nav) return;

        toggle.addEventListener('click', function() {
            nav.classList.toggle('active');
            this.classList.toggle('active');
            document.body.classList.toggle('ftp-menu-open');
        });

        // Use event delegation for nav links - delay menu close to allow smooth scroll to work
        nav.addEventListener('click', function(e) {
            var link = e.target.closest('.ftp-nav-link');
            if (link) {
                // Delay closing menu to allow smooth scroll handler to process first
                setTimeout(function() {
                    nav.classList.remove('active');
                    toggle.classList.remove('active');
                    document.body.classList.remove('ftp-menu-open');
                }, 50);
            }
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!nav.contains(e.target) && !toggle.contains(e.target) && nav.classList.contains('active')) {
                nav.classList.remove('active');
                toggle.classList.remove('active');
                document.body.classList.remove('ftp-menu-open');
            }
        });
    }

    /**
     * Smooth scroll with native support detection
     */
    function smoothScrollTo(targetPosition, duration) {
        // Use native smooth scroll if supported
        if ('scrollBehavior' in document.documentElement.style) {
            window.scrollTo({ top: targetPosition, behavior: 'smooth' });
            return;
        }
        
        // Optimized fallback using RAF
        var startPosition = window.pageYOffset;
        var distance = targetPosition - startPosition;
        var startTime = null;
        
        function animation(currentTime) {
            if (!startTime) startTime = currentTime;
            var progress = Math.min((currentTime - startTime) / duration, 1);
            
            // Ease-in-out cubic
            var ease = progress < 0.5 
                ? 4 * progress * progress * progress 
                : 1 - Math.pow(-2 * progress + 2, 3) / 2;
            
            window.scrollTo(0, startPosition + distance * ease);
            
            if (progress < 1) {
                requestAnimationFrame(animation);
            }
        }
        
        requestAnimationFrame(animation);
    }

    /**
     * Initialize smooth scrolling with event delegation
     */
    function initSmoothScroll() {
        document.addEventListener('click', function(e) {
            var anchor = e.target.closest('a[href*="#"]');
            if (!anchor) return;
            
            var href = anchor.getAttribute('href');
            if (!href || href === '#') return;
            
            // Extract the hash from the href (handles both "#section" and "https://site.com/#section")
            var hashIndex = href.indexOf('#');
            if (hashIndex === -1) return;
            
            var hash = href.substring(hashIndex);
            if (!hash || hash === '#') return;
            
            // Check if this is a link to the current page (same origin or relative)
            var isCurrentPage = false;
            var currentUrl = window.location.origin + window.location.pathname;
            
            if (href.startsWith('#')) {
                // Pure hash link like "#section"
                isCurrentPage = true;
            } else {
                // Full URL with hash - check if it's the current page
                var linkUrl = href.substring(0, hashIndex);
                // Remove trailing slash for comparison
                linkUrl = linkUrl.replace(/\/$/, '');
                var compareUrl = currentUrl.replace(/\/$/, '');
                var homeUrl = window.location.origin;
                
                // Check if linking to home page and we're on home page
                if (linkUrl === homeUrl || linkUrl === homeUrl + '/' || 
                    linkUrl === compareUrl || linkUrl + '/' === currentUrl) {
                    isCurrentPage = true;
                }
            }
            
            // Only handle smooth scroll if we're on the same page
            if (!isCurrentPage) return;
            
            var target = document.querySelector(hash);
            if (!target) return;
            
            e.preventDefault();
            
            // Update URL hash without scrolling
            if (history.pushState) {
                history.pushState(null, null, hash);
            }
            
            var headerHeight = header ? header.offsetHeight : 0;
            var targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;
            
            smoothScrollTo(targetPosition, 600);
        });
        
        // Handle hash in URL on page load
        if (window.location.hash) {
            setTimeout(function() {
                var target = document.querySelector(window.location.hash);
                if (target) {
                    var headerHeight = header ? header.offsetHeight : 0;
                    var targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                    smoothScrollTo(targetPosition, 600);
                }
            }, 100);
        }
    }

    /**
     * Unified scroll effects handler using single listener
     */
    function initScrollEffects() {
        var menuNavItems = document.querySelectorAll('.ftp-menu-nav-item');
        var menuCategories = document.querySelectorAll('.ftp-menu-category');
        var hasMenuNav = menuNavItems.length && menuCategories.length;

        // Single optimized scroll handler
        var handleScroll = throttle(function() {
            if (scrollRAF) return;
            
            scrollRAF = requestAnimationFrame(function() {
                var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                // Header scroll effect
                if (header) {
                    if (scrollTop > 50) {
                        header.classList.add('scrolled');
                    } else {
                        header.classList.remove('scrolled');
                    }
                }
                
                // Hero video effect
                if (heroVideo) {
                    var heroEl = document.querySelector('.ftp-hero');
                    var heroHeight = heroEl ? heroEl.offsetHeight : window.innerHeight;
                    var fadeStart = heroHeight * 0.3;
                    var fadeEnd = heroHeight * 0.8;
                    
                    if (scrollTop <= fadeStart) {
                        heroVideo.style.cssText = 'opacity:1;transform:scale(1)';
                    } else if (scrollTop >= fadeEnd) {
                        heroVideo.style.cssText = 'opacity:0.3;transform:scale(1.05)';
                    } else {
                        var progress = (scrollTop - fadeStart) / (fadeEnd - fadeStart);
                        heroVideo.style.cssText = 'opacity:' + (1 - progress * 0.7) + ';transform:scale(' + (1 + progress * 0.05) + ')';
                    }
                }
                
                // Menu category highlight
                if (hasMenuNav) {
                    var headerHeight = header ? header.offsetHeight : 0;
                    
                    for (var i = 0; i < menuCategories.length; i++) {
                        var category = menuCategories[i];
                        var rect = category.getBoundingClientRect();
                        var offsetTop = rect.top + scrollTop - headerHeight - 100;
                        
                        if (scrollTop >= offsetTop && scrollTop < offsetTop + category.offsetHeight) {
                            menuNavItems.forEach(function(item) { item.classList.remove('active'); });
                            if (menuNavItems[i]) menuNavItems[i].classList.add('active');
                            break;
                        }
                    }
                }
                
                lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
                scrollRAF = null;
            });
        }, 16); // ~60fps throttle

        window.addEventListener('scroll', handleScroll, passiveOption);
    }

    /**
     * Initialize back to top button
     */
    function initBackToTop() {
        var backToTop = document.querySelector('.ftp-menu-back-top');
        if (!backToTop) return;

        var handleBackToTopScroll = throttle(function() {
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop > 500) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        }, 100);

        window.addEventListener('scroll', handleBackToTopScroll, passiveOption);

        backToTop.addEventListener('click', function(e) {
            e.preventDefault();
            smoothScrollTo(0, 600);
        });
    }

    /**
     * Initialize scroll progress bar - optimized
     */
    function initScrollProgressBar() {
        var progressBar = document.createElement('div');
        progressBar.className = 'ftp-scroll-progress';
        progressBar.style.cssText = 'position:fixed;top:0;left:0;height:3px;background:linear-gradient(90deg,#FF0000,#FFD700);z-index:10001;width:0;transition:width 0.1s ease-out';
        document.body.appendChild(progressBar);

        var handleProgressScroll = throttle(function() {
            requestAnimationFrame(function() {
                var winScroll = document.documentElement.scrollTop;
                var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                progressBar.style.width = (winScroll / height * 100) + '%';
            });
        }, 50);

        window.addEventListener('scroll', handleProgressScroll, passiveOption);
    }

    /**
     * Initialize section welcome animations using IntersectionObserver
     */
    function initSectionWelcome() {
        var sectionHeaders = document.querySelectorAll('.ftp-section-header');
        if (!sectionHeaders.length || !('IntersectionObserver' in window)) return;

        // Set section names
        sectionHeaders.forEach(function(header) {
            var titleElement = header.querySelector('.ftp-section-title');
            if (titleElement) {
                header.setAttribute('data-section-name', titleElement.textContent.trim());
            }
        });

        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting && !entry.target.classList.contains('ftp-section-welcome')) {
                    entry.target.classList.add('ftp-section-welcome');
                    setTimeout(function() {
                        entry.target.classList.remove('ftp-section-welcome');
                    }, 2600);
                }
            });
        }, { threshold: 0.3, rootMargin: '0px 0px -100px 0px' });

        sectionHeaders.forEach(function(header) { observer.observe(header); });
    }

})();