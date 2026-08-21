/**
 * SoftEnture — Digital Marketing Agency
 * Motion One animations, scroll effects, and UI interactions
 */
(function () {
    'use strict';

    if (typeof Motion === 'undefined') {
        console.warn('SoftEnture: Motion library not loaded.');
        return;
    }

    const { animate, stagger, inView } = Motion;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ------------------------------------------------------------------
       Header scroll effect
       ------------------------------------------------------------------ */
    function initHeaderScroll() {
        const header = document.getElementById('siteHeader');
        if (!header) return;

        const threshold = 50;

        function updateHeader() {
            header.classList.toggle('scrolled', window.scrollY > threshold);
        }

        updateHeader();
        window.addEventListener('scroll', updateHeader, { passive: true });
    }

    /* ------------------------------------------------------------------
       Mobile navigation toggle
       ------------------------------------------------------------------ */
    function initMobileNav() {
        const toggle = document.getElementById('navToggle');
        const nav = document.getElementById('navMobile');
        if (!toggle || !nav) return;

        function closeNav() {
            toggle.classList.remove('active');
            nav.classList.remove('open');
            document.body.classList.remove('nav-open');
            toggle.setAttribute('aria-expanded', 'false');
        }

        function openNav() {
            toggle.classList.add('active');
            nav.classList.add('open');
            document.body.classList.add('nav-open');
            toggle.setAttribute('aria-expanded', 'true');
        }

        toggle.setAttribute('aria-expanded', 'false');

        toggle.addEventListener('click', function () {
            if (nav.classList.contains('open')) {
                closeNav();
            } else {
                openNav();
            }
        });

        nav.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', closeNav);
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && nav.classList.contains('open')) {
                closeNav();
            }
        });

        window.addEventListener('resize', function () {
            if (window.innerWidth >= 768 && nav.classList.contains('open')) {
                closeNav();
            }
        });
    }

    /* ------------------------------------------------------------------
       Smooth scroll for anchor links
       ------------------------------------------------------------------ */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
            anchor.addEventListener('click', function (e) {
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const target = document.querySelector(targetId);
                if (!target) return;

                e.preventDefault();

                const headerHeight = document.getElementById('siteHeader')?.offsetHeight || 72;
                const top = target.getBoundingClientRect().top + window.scrollY - headerHeight;

                window.scrollTo({
                    top: top,
                    behavior: prefersReducedMotion ? 'auto' : 'smooth',
                });
            });
        });
    }

    const STAGGER_SELECTORS = '.stagger, .services-grid, .problems-grid, .testimonials-grid, .metrics-grid, .approach-grid, .stats-grid';

    function isInsideStaggerContainer(el) {
        return !!el.closest(STAGGER_SELECTORS);
    }

    /* ------------------------------------------------------------------
       Scroll-triggered animations
       ------------------------------------------------------------------ */
    function initScrollAnimations() {
        if (prefersReducedMotion) {
            document.querySelectorAll('.fade-up, .fade-in, .scale-in, .stagger > *').forEach(function (el) {
                el.style.opacity = '1';
            });
            return;
        }

        document.querySelectorAll('.fade-up').forEach(function (el) {
            if (el.classList.contains('animated') || isInsideStaggerContainer(el)) return;

            inView(el, function () {
                animate(
                    el,
                    { opacity: [0, 1], y: [40, 0] },
                    { duration: 0.7, easing: [0.16, 1, 0.3, 1] }
                );
                el.classList.add('animated');
            }, { amount: 0.2 });
        });

        document.querySelectorAll('.fade-in').forEach(function (el) {
            if (el.classList.contains('animated') || isInsideStaggerContainer(el)) return;

            inView(el, function () {
                animate(
                    el,
                    { opacity: [0, 1] },
                    { duration: 0.6, easing: 'ease-out' }
                );
                el.classList.add('animated');
            }, { amount: 0.2 });
        });

        document.querySelectorAll('.scale-in').forEach(function (el) {
            if (el.classList.contains('animated') || isInsideStaggerContainer(el)) return;

            inView(el, function () {
                animate(
                    el,
                    { opacity: [0, 1], scale: [0.92, 1] },
                    { duration: 0.6, easing: [0.16, 1, 0.3, 1] }
                );
                el.classList.add('animated');
            }, { amount: 0.2 });
        });
    }

    /* ------------------------------------------------------------------
       Stagger animations for card grids
       ------------------------------------------------------------------ */
    function initStaggerAnimations() {
        if (prefersReducedMotion) return;

        const staggerContainers = document.querySelectorAll(STAGGER_SELECTORS);

        staggerContainers.forEach(function (container) {
            if (container.classList.contains('animated')) return;
            if (container.closest('.hero-content')) return;
            const children = container.classList.contains('stagger')
                ? Array.from(container.children)
                : Array.from(container.children).filter(function (child) {
                    return child.classList.contains('fade-up') ||
                           child.classList.contains('service-card') ||
                           child.classList.contains('problem-card') ||
                           child.classList.contains('testimonial-card') ||
                           child.classList.contains('metric-card') ||
                           child.classList.contains('approach-card') ||
                           child.classList.contains('stat-item');
                });

            if (children.length === 0) return;

            children.forEach(function (child) {
                child.style.opacity = '0';
            });

            inView(container, function () {
                animate(
                    children,
                    { opacity: [0, 1], y: [30, 0] },
                    {
                        duration: 0.6,
                        delay: stagger(0.08, { start: 0.1 }),
                        easing: [0.16, 1, 0.3, 1],
                    }
                );
                container.classList.add('animated');
                children.forEach(function (child) {
                    child.classList.add('animated');
                });
            }, { amount: 0.15 });
        });
    }

    /* ------------------------------------------------------------------
       Counter animation for stats
       ------------------------------------------------------------------ */
    function parseStatValue(raw) {
        const str = String(raw).trim();
        const match = str.match(/^([\d,.]+)\s*(.*)$/);

        if (!match) {
            return { numeric: 0, suffix: str, decimals: 0, isNumeric: false };
        }

        const numPart = match[1].replace(/,/g, '');
        const suffix = match[2] || '';
        const numeric = parseFloat(numPart);
        const decimals = (numPart.split('.')[1] || '').length;

        return {
            numeric: isNaN(numeric) ? 0 : numeric,
            suffix: suffix,
            decimals: decimals,
            isNumeric: !isNaN(numeric),
        };
    }

    function formatStatValue(value, parsed) {
        const formatted = parsed.decimals > 0
            ? value.toFixed(parsed.decimals)
            : Math.round(value).toString();

        return formatted + parsed.suffix;
    }

    function initCounterAnimation() {
        const counters = document.querySelectorAll('.stat-value[data-count]');
        if (counters.length === 0) return;

        if (prefersReducedMotion) return;

        counters.forEach(function (counter) {
            const raw = counter.getAttribute('data-count') || counter.textContent;
            const parsed = parseStatValue(raw);

            if (!parsed.isNumeric) return;

            counter.textContent = formatStatValue(0, parsed);

            inView(counter, function () {
                animate(0, parsed.numeric, {
                    duration: 2,
                    easing: [0.16, 1, 0.3, 1],
                    onUpdate: function (value) {
                        counter.textContent = formatStatValue(value, parsed);
                    },
                });
            }, { amount: 0.5 });
        });
    }

    /* ------------------------------------------------------------------
       Form input focus animations
       ------------------------------------------------------------------ */
    function initFormFocusAnimations() {
        const formGroups = document.querySelectorAll('.form-group');

        formGroups.forEach(function (group) {
            const input = group.querySelector('.form-input, .form-textarea, .form-select');
            if (!input) return;

            if (!group.querySelector('.form-focus-line')) {
                const line = document.createElement('span');
                line.className = 'form-focus-line';
                line.setAttribute('aria-hidden', 'true');
                group.appendChild(line);
            }

            input.addEventListener('focus', function () {
                group.classList.add('focused');
                input.classList.add('focused');

                if (!prefersReducedMotion) {
                    animate(input, { scale: [1, 1.01, 1] }, { duration: 0.3, easing: 'ease-out' });
                }
            });

            input.addEventListener('blur', function () {
                group.classList.remove('focused');
                input.classList.remove('focused');
            });
        });
    }

    /* ------------------------------------------------------------------
       Parallax effect on hero gradient orbs
       ------------------------------------------------------------------ */
    function initOrbParallax() {
        const orbs = document.querySelectorAll('.hero-bg .orb, .page-hero-bg .orb');
        if (orbs.length === 0 || prefersReducedMotion) return;

        const hero = document.querySelector('.hero, .page-hero');
        if (!hero) return;

        const orbConfigs = [
            { speed: 0.08, axis: 'y' },
            { speed: -0.05, axis: 'both' },
            { speed: 0.03, axis: 'x' },
        ];

        let ticking = false;

        function updateParallax() {
            const rect = hero.getBoundingClientRect();
            const heroVisible = rect.bottom > 0 && rect.top < window.innerHeight;

            if (!heroVisible) {
                ticking = false;
                return;
            }

            const scrollProgress = (window.innerHeight - rect.top) / (window.innerHeight + rect.height);
            const clamped = Math.max(0, Math.min(1, scrollProgress));

            orbs.forEach(function (orb, index) {
                const config = orbConfigs[index] || orbConfigs[0];
                const offset = (clamped - 0.5) * 120 * config.speed;

                let x = 0;
                let y = 0;

                if (config.axis === 'y' || config.axis === 'both') {
                    y = offset * 10;
                }
                if (config.axis === 'x' || config.axis === 'both') {
                    x = offset * 8;
                }

                orb.style.transform = 'translate(' + x + 'px, ' + y + 'px)';
            });

            ticking = false;
        }

        window.addEventListener('scroll', function () {
            if (!ticking) {
                requestAnimationFrame(updateParallax);
                ticking = true;
            }
        }, { passive: true });

        updateParallax();
    }

    /* ------------------------------------------------------------------
       Hero entrance animation on page load
       ------------------------------------------------------------------ */
    function initHeroEntrance() {
        if (prefersReducedMotion) return;

        const heroContent = document.querySelector('.hero-content');
        if (!heroContent) return;

        const elements = heroContent.querySelectorAll('.fade-up');
        if (elements.length === 0) return;

        elements.forEach(function (el) {
            el.style.opacity = '0';
        });

        animate(
            elements,
            { opacity: [0, 1], y: [50, 0] },
            {
                duration: 0.8,
                delay: stagger(0.12, { start: 0.2 }),
                easing: [0.16, 1, 0.3, 1],
            }
        );

        elements.forEach(function (el) {
            el.classList.add('animated');
        });
    }

    /* ------------------------------------------------------------------
       Floating CTA visibility on scroll
       ------------------------------------------------------------------ */
    function initFloatingCta() {
        const cta = document.querySelector('.floating-cta');
        const hero = document.querySelector('.hero');
        if (!cta || !hero) return;

        function updateCtaVisibility() {
            const heroBottom = hero.getBoundingClientRect().bottom;
            cta.style.opacity = heroBottom < 0 ? '1' : '0';
            cta.style.pointerEvents = heroBottom < 0 ? 'auto' : 'none';
        }

        cta.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
        updateCtaVisibility();
        window.addEventListener('scroll', updateCtaVisibility, { passive: true });
    }

    /* ------------------------------------------------------------------
       Initialize
       ------------------------------------------------------------------ */
    function init() {
        initHeaderScroll();
        initMobileNav();
        initSmoothScroll();
        initHeroEntrance();
        initScrollAnimations();
        initStaggerAnimations();
        initCounterAnimation();
        initFormFocusAnimations();
        initOrbParallax();
        initFloatingCta();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
