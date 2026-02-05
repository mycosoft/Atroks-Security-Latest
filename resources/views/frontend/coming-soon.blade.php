<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon - Atroks Security Services</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'navy': '#1e3a8a',
                        'orange': '#f97316',
                    }
                }
            }
        }
    </script>
    <style>
        [data-reveal] {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 1.05s ease, transform 1.05s ease;
        }

        [data-reveal].in-view {
            opacity: 1;
            transform: translateY(0);
        }

        @media (prefers-reduced-motion: reduce) {
            [data-reveal] {
                opacity: 1;
                transform: none;
                transition: none;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <nav class="bg-navy shadow-lg" data-reveal>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-white">
                        ATROKS <span class="text-orange">SECURITY</span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-white hover:text-orange transition">Home</a>
                    <a href="{{ route('about') }}" class="text-white hover:text-orange transition">About</a>
                    <a href="{{ route('services') }}" class="text-white hover:text-orange transition">Services</a>
                    <a href="{{ route('projects') }}" class="text-white hover:text-orange transition">Projects</a>
                    <a href="{{ route('faqs') }}" class="text-white hover:text-orange transition">FAQs</a>
                    <a href="{{ route('contact') }}" class="text-orange font-semibold hover:text-white transition">Contact Us</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Coming Soon Content -->
    <div class="min-h-screen flex items-center justify-center px-4" data-reveal>
        <div class="text-center" data-reveal data-delay="100">
            <div class="mb-8" data-reveal data-delay="150">
                <svg class="mx-auto h-24 w-24 text-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h1 class="text-4xl md:text-6xl font-bold text-navy mb-4">Coming Soon</h1>
            <p class="text-xl text-gray-600 mb-8">This page is under construction. Check back soon!</p>
            <a href="{{ route('home') }}" class="inline-block bg-orange text-white px-8 py-3 rounded-lg font-semibold hover:bg-navy transition">
                Back to Home
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-navy text-white py-8" data-reveal>
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} Atroks Security Services. All rights reserved.</p>
        </div>
    </footer>
    <script>
        const revealElements = document.querySelectorAll('[data-reveal]');
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        if (prefersReducedMotion) {
            revealElements.forEach((element) => element.classList.add('in-view'));
        } else if ('IntersectionObserver' in window) {
            const revealObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;

                    const delay = entry.target.getAttribute('data-delay');
                    if (delay) {
                        entry.target.style.transitionDelay = `${delay}ms`;
                    }

                    entry.target.classList.add('in-view');
                    observer.unobserve(entry.target);
                });
            }, { threshold: 0.2, rootMargin: '0px 0px -10% 0px' });

            revealElements.forEach((element) => revealObserver.observe(element));
        } else {
            revealElements.forEach((element) => element.classList.add('in-view'));
        }
    </script>
</body>
</html>
