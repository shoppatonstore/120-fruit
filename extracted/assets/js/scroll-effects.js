/**
 * 120 Fruit Therapy - Scroll Effects Scripts
 */

(function() {
    'use strict';

    // Variables for scroll handling
    var lastScrollTop = 0;
    var ticking = false;
    var header = null;
    var heroVideo = null;

    // Wait for DOM to be ready
    document.addEventListener('DOMContentLoaded', function() {
        initElements();
        initMobileMenu();
        initSmoothScroll();
        initHeaderScrollEffect();
        initHeroVideoEffect();
        initMenuNavigation();
        initBackToTop();
        initScrollProgressBar();
        initSectionWelcome();
    });

    /**
     * Initialize element references
     */
    function initElements() {
        header = document.getElementById('ftp-header');
        heroVideo = document.querySelector('.ftp-hero-video-container');
    }

    /**
     * Initialize mobile menu toggle
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

        // Close menu when clicking a link
        var navLinks = nav.querySelectorAll('.ftp-nav-link');
        navLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                nav.classList.remove('active');
                toggle.classList.remove('active');
                document.body.classList.remove('ftp-menu-open');
            });
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
     * Smooth scroll polyfill for older browsers
     * @param {number} targetPosition - Target scroll position
     * @param {number} duration - Animation duration in ms
     */
    function smoothScrollTo(targetPosition, duration) {
        // Check if native smooth scroll is supported
        if ('scrollBehavior' in document.documentElement.style) {
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
            return;
        }
        
        // Fallback for older browsers
        var startPosition = window.pageYOffset;
        var distance = targetPosition - startPosition;
        var startTime = null;
        
        function animation(currentTime) {
            if (startTime === null) startTime = currentTime;
            var timeElapsed = currentTime - startTime;
            var progress = Math.min(timeElapsed / duration, 1);
            
            // Easing function (ease-in-out)
            var ease = progress < 0.5 
                ? 2 * progress * progress 
                : 1 - Math.pow(-2 * progress + 2, 2) / 2;
            
            window.scrollTo(0, startPosition + distance * ease);
            
            if (timeElapsed < duration) {
                requestAnimationFrame(animation);
            }
        }
        
        requestAnimationFrame(animation);
    }

    /**
     * Initialize smooth scrolling for anchor links
     */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                var href = this.getAttribute('href');
                if (href === '#') return;
                
                var target = document.querySelector(href);
                if (!target) return;
                
                e.preventDefault();
                
                var headerHeight = header ? header.offsetHeight : 0;
                var targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                
                smoothScrollTo(targetPosition, 800);
            });
        });
    }

    /**
     * Initialize header scroll effect (hide/show on scroll)
     */
    function initHeaderScrollEffect() {
        if (!header) return;

        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    handleHeaderScroll();
                    ticking = false;
                });
                ticking = true;
            }
        });
    }

    /**
     * Handle header visibility on scroll
     */
    function handleHeaderScroll() {
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Only add scrolled class for styling, no hide/show behavior
        if (scrollTop > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
        
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    }

    /**
     * Initialize hero video fade effect on scroll
     */
    function initHeroVideoEffect() {
        if (!heroVideo) return;

        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    handleHeroVideoScroll();
                    ticking = false;
                });
                ticking = true;
            }
        });
    }

    /**
     * Handle hero video fade on scroll
     */
    function handleHeroVideoScroll() {
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        var heroHeight = document.querySelector('.ftp-hero') ? document.querySelector('.ftp-hero').offsetHeight : window.innerHeight;
        
        // Calculate fade based on scroll position
        var fadeStart = heroHeight * 0.3;
        var fadeEnd = heroHeight * 0.8;
        
        if (scrollTop <= fadeStart) {
            heroVideo.style.opacity = '1';
            heroVideo.style.transform = 'scale(1)';
        } else if (scrollTop >= fadeEnd) {
            heroVideo.style.opacity = '0.3';
            heroVideo.style.transform = 'scale(1.05)';
        } else {
            var progress = (scrollTop - fadeStart) / (fadeEnd - fadeStart);
            var opacity = 1 - (progress * 0.7);
            var scale = 1 + (progress * 0.05);
            heroVideo.style.opacity = opacity;
            heroVideo.style.transform = 'scale(' + scale + ')';
        }
    }

    /**
     * Initialize menu category navigation
     */
    function initMenuNavigation() {
        var menuNavItems = document.querySelectorAll('.ftp-menu-nav-item');
        var menuCategories = document.querySelectorAll('.ftp-menu-category');
        
        if (!menuNavItems.length || !menuCategories.length) return;

        // Highlight active category on scroll
        window.addEventListener('scroll', function() {
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            var headerHeight = header ? header.offsetHeight : 0;
            
            menuCategories.forEach(function(category, index) {
                var rect = category.getBoundingClientRect();
                var offsetTop = rect.top + scrollTop - headerHeight - 100;
                
                if (scrollTop >= offsetTop && scrollTop < offsetTop + category.offsetHeight) {
                    menuNavItems.forEach(function(item) {
                        item.classList.remove('active');
                    });
                    if (menuNavItems[index]) {
                        menuNavItems[index].classList.add('active');
                    }
                }
            });
        });
    }

    /**
     * Initialize back to top button
     */
    function initBackToTop() {
        var backToTop = document.querySelector('.ftp-menu-back-top');
        
        if (!backToTop) return;

        window.addEventListener('scroll', function() {
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > 500) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });

        backToTop.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    /**
     * Parallax effect for background elements
     */
    function initParallax() {
        var parallaxElements = document.querySelectorAll('.ftp-parallax');
        
        if (!parallaxElements.length) return;

        window.addEventListener('scroll', function() {
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            parallaxElements.forEach(function(element) {
                var speed = element.getAttribute('data-speed') || 0.5;
                var yPos = -(scrollTop * speed);
                element.style.transform = 'translate3d(0, ' + yPos + 'px, 0)';
            });
        });
    }

    /**
     * Initialize scroll progress bar
     */
    function initScrollProgressBar() {
        // Create progress bar element
        var progressBar = document.createElement('div');
        progressBar.className = 'ftp-scroll-progress';
        document.body.appendChild(progressBar);

        // Update progress on scroll
        window.addEventListener('scroll', function() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            progressBar.style.width = scrolled + '%';
        });
    }

    /**
     * Initialize section welcome animations
     */
    function initSectionWelcome() {
        var sectionHeaders = document.querySelectorAll('.ftp-section-header');
        
        if (!sectionHeaders.length) return;

        // Set section names from titles
        sectionHeaders.forEach(function(header) {
            var titleElement = header.querySelector('.ftp-section-title');
            if (titleElement) {
                var sectionName = titleElement.textContent.trim();
                header.setAttribute('data-section-name', sectionName);
            }
        });

        // Create Intersection Observer
        var observerOptions = {
            threshold: 0.3,
            rootMargin: '0px 0px -100px 0px'
        };

        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting && !entry.target.classList.contains('ftp-section-welcome')) {
                    entry.target.classList.add('ftp-section-welcome');
                    
                    // Remove welcome badge after animation completes
                    setTimeout(function() {
                        entry.target.classList.remove('ftp-section-welcome');
                    }, 2600); // 600ms delay + 2000ms animation
                }
            });
        }, observerOptions);

        // Observe all section headers
        sectionHeaders.forEach(function(header) {
            observer.observe(header);
        });
    }

})();