@extends('layouts.frontend')

@section('title', 'Atroks Security Services - Lets Talk Security')
@section('meta_description', 'Atroks Security Services Limited offers professional security guards, CCTV surveillance, K9 units, and safe keeping services across Uganda and East Africa.')

@section('content')
    <!-- Hero Section with Slideshow -->
    <section class="relative overflow-hidden" style="height: 80vh;">
        <!-- Slideshow Container -->
        <div class="absolute inset-0">
            <!-- Slide 1 -->
            <div class="hero-slide active absolute inset-0 bg-cover bg-center transition-opacity duration-1000" style="background-image: url('{{ asset('images/herosection/security.jpeg') }}');">
                <div class="absolute inset-0 bg-black/40"></div>
            </div>
            <!-- Slide 2 -->
            <div class="hero-slide absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-0" style="background-image: url('{{ asset('images/herosection/atroks.jpeg') }}');">
                <div class="absolute inset-0 bg-black/40"></div>
            </div>
            <!-- Slide 3 -->
            <div class="hero-slide absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-0" style="background-image: url('{{ asset('images/herosection/atroks4.jpeg') }}');"> 
                <div class="absolute inset-0 bg-black/40"></div>
            </div>
        </div>

        <!-- Hero Content -->
        <div class="relative z-10 h-full flex items-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                <div class="max-w-2xl">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight text-white animate-fade-in">
                        <span class="text-white">Your Safety is Our </span><span class="text-white">Priority</span>
                        <div class="w-32 h-1 bg-orange mt-4"></div>
                    </h1>
                    <p class="text-xl mb-8 text-gray-200 animate-fade-in-delay">
                        If you are looking for better security services, you are in the right place. Atroks Security Services Limited provides responsive and reliable security services to many diversified industries.
                    </p>
                    <div class="flex flex-wrap gap-4 animate-fade-in-delay-2">
                        <a href="{{ route('contact') }}" class="bg-orange text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-orange transition inline-flex items-center">
                            Get a Quote <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <a href="{{ route('services') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-navy transition">
                            Our Services
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slideshow Navigation Dots -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20 flex space-x-3">
            <button class="slide-dot w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100 transition" data-slide="0"></button>
            <button class="slide-dot w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100 transition" data-slide="1"></button>
            <button class="slide-dot w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100 transition" data-slide="2"></button>
        </div>
    </section>

    <!-- Welcome Section -->
    <section class="py-20 bg-gray-50" data-reveal>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div data-reveal data-delay="100">
                    <div class="relative group">
                        <div class="absolute inset-0 bg-navy opacity-20 rounded-lg transform -rotate-3 group-hover:rotate-0 transition-transform duration-300"></div>
                        <img src="{{ asset('images/atroks1.jpg') }}" alt="Atroks Security Services" class="relative rounded-lg shadow-2xl group-hover:shadow-3xl transition-shadow duration-300">
                    </div>
                </div>
                <div data-reveal data-delay="200">
                    <h3 class="text-4xl font-bold text-navy mb-2">About Atroks Security Services</h3>
                    <div class="w-24 h-1 bg-orange mb-6"></div>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Atroks Security Services Limited is perfectly positioned to provide trained security personnel who can meet the security needs and goals of our dear clients. We assure you of experienced personnel with highest degree of professionalism.
                    </p>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Whether permanent or temporary, we provide on-call 24/7 service for emergencies. We have all the necessary tools including guns, flashlights, batons, handcuffs, uniforms, and response vehicles (QRF) to help in our day-to-day operations.
                    </p>
                    <a href="{{ route('about') }}" class="bg-orange text-white px-8 py-3 rounded-lg font-semibold hover:bg-navy transition inline-flex items-center">
                        Learn More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-20 bg-white" data-reveal>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-reveal data-delay="100">
                <h3 class="text-4xl font-bold text-navy mb-4">Our Security Services</h3>
                <div class="w-24 h-1 bg-orange mx-auto mb-4"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Comprehensive security solutions tailored to protect your assets, property, and personnel.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Service 1 -->
                <div class="bg-white rounded-lg p-8 shadow-md hover:shadow-xl transition group flex flex-col h-full items-center text-center" data-reveal data-delay="150">
                    <div class="bg-navy text-white w-20 h-20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition">
                        <i class="fas fa-shield-alt text-3xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-navy mb-4">Security Guards</h4>
                    <p class="text-gray-600 mb-6 flex-grow">
                        Professional guards providing maximum protection for high-risk environments.
                    </p>
                    <a href="{{ route('services') }}" class="text-orange font-semibold hover:text-navy transition inline-flex items-center mt-auto">
                        Learn More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Service 2 -->
                <div class="bg-white rounded-lg p-8 shadow-md hover:shadow-xl transition group flex flex-col h-full items-center text-center" data-reveal data-delay="250">
                    <div class="bg-navy text-white w-20 h-20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition">
                        <i class="fas fa-camera text-3xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-navy mb-4">CCTV Surveillance</h4>
                    <p class="text-gray-600 mb-6 flex-grow">
                        State-of-the-art surveillance systems with 24/7 monitoring to keep premises secure.
                    </p>
                    <a href="{{ route('services') }}" class="text-orange font-semibold hover:text-navy transition inline-flex items-center mt-auto">
                        Learn More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Service 3 -->
                <div class="bg-white rounded-lg p-8 shadow-md hover:shadow-xl transition group flex flex-col h-full items-center text-center" data-reveal data-delay="350">
                    <div class="bg-navy text-white w-20 h-20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition">
                        <i class="fas fa-paw text-3xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-navy mb-4">K9 Security Units</h4>
                    <p class="text-gray-600 mb-6 flex-grow">
                        Highly trained K9 units for enhanced security, detection, and patrol services.
                    </p>
                    <a href="{{ route('services') }}" class="text-orange font-semibold hover:text-navy transition inline-flex items-center mt-auto">
                        Learn More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Service 4 -->
                <div class="bg-white rounded-lg p-8 shadow-md hover:shadow-xl transition group flex flex-col h-full items-center text-center" data-reveal data-delay="450">
                    <div class="bg-navy text-white w-20 h-20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition">
                        <i class="fas fa-lock text-3xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-navy mb-4">Safe Keeping Services</h4>
                    <p class="text-gray-600 mb-6 flex-grow">
                        Secure storage and safe keeping of valuable items with comprehensive tracking.
                    </p>
                    <a href="{{ route('tracking.index') }}" class="text-orange font-semibold hover:text-navy transition inline-flex items-center mt-auto">
                        Track Items <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Personal Security Featured Section -->
    <section class="py-20 bg-gray-50" data-reveal>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Content -->
                <div data-reveal data-delay="100">
                    <h3 class="text-4xl font-bold text-navy mb-2">Personal Security</h3>
                    <div class="w-24 h-1 bg-orange mb-6"></div>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Atroks Security Services Limited has personal protection guards ready in different parts of Uganda and East Africa at large. Our highly trained bodyguards provide discreet and professional protection for executives, VIPs, and individuals requiring enhanced personal security.
                    </p>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        We understand that personal safety is paramount. Our personal protection officers are carefully selected, extensively trained, and equipped with the latest security protocols to ensure your safety in any situation.
                    </p>
                    <a href="{{ route('contact') }}" class="bg-orange text-white px-8 py-4 rounded-lg font-semibold hover:bg-navy transition inline-flex items-center">
                        Request Personal Security <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Image -->
                <div data-reveal data-delay="200">
                    <div class="relative group">
                        <div class="absolute inset-0 bg-navy opacity-20 rounded-lg transform rotate-3 group-hover:rotate-0 transition-transform duration-300"></div>
                        <img src="{{ asset('images/security.jpeg') }}" alt="Personal Security Guard" class="relative rounded-lg shadow-2xl group-hover:shadow-3xl transition-shadow duration-300">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-20 bg-gradient-to-r from-navy to-blue-900 text-white" data-reveal>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-reveal data-delay="100">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Secure Your Future?</h2>
            <p class="text-xl mb-8 text-gray-200 max-w-3xl mx-auto">
                Get a free consultation and customized security solution tailored to your specific needs. Our experts are available 24/7 to assist you.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('contact') }}" class="bg-orange text-white px-10 py-4 rounded-lg font-semibold text-lg hover:bg-white hover:text-orange transition inline-flex items-center">
                    <i class="fas fa-phone mr-3"></i> Get Free Quote
                </a>
                <a href="{{ route('services') }}" class="border-2 border-white text-white px-10 py-4 rounded-lg font-semibold text-lg hover:bg-white hover:text-navy transition inline-flex items-center">
                    <i class="fas fa-shield-alt mr-3"></i> View All Services
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-white" data-reveal>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-reveal data-delay="100">
                <h3 class="text-4xl font-bold text-navy mb-4">Client Testimonials</h3>
                <div class="w-24 h-1 bg-orange mx-auto mb-4"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Don't just take our word for it - hear from some of our satisfied clients.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-gray-50 rounded-lg p-8 shadow-lg hover:shadow-xl transition" data-reveal data-delay="150">
                    <div class="flex mb-4">
                        <i class="fas fa-star text-orange"></i>
                        <i class="fas fa-star text-orange"></i>
                        <i class="fas fa-star text-orange"></i>
                        <i class="fas fa-star text-orange"></i>
                        <i class="fas fa-star text-orange"></i>
                    </div>
                    <p class="text-gray-700 mb-6 italic">
                        "Their security team is professional and always on time. Highly recommend."
                    </p>
                    <div>
                        <h5 class="font-bold text-navy">Micheal S. Kagame</h5>
                        <p class="text-sm text-gray-600">Director MST</p>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-gray-50 rounded-lg p-8 shadow-lg hover:shadow-xl transition" data-reveal data-delay="250">
                    <div class="flex mb-4">
                        <i class="fas fa-star text-orange"></i>
                        <i class="fas fa-star text-orange"></i>
                        <i class="fas fa-star text-orange"></i>
                        <i class="fas fa-star text-orange"></i>
                        <i class="fas fa-star text-orange"></i>
                    </div>
                    <p class="text-gray-700 mb-6 italic">
                        "Very reliable security services. The tracking system for safe keeping is amazing!"
                    </p>
                    <div>
                        <h5 class="font-bold text-navy">Ebol Richmond</h5>
                        <p class="text-sm text-gray-600">Aeser Corp</p>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-gray-50 rounded-lg p-8 shadow-lg hover:shadow-xl transition" data-reveal data-delay="350">
                    <div class="flex mb-4">
                        <i class="fas fa-star text-orange"></i>
                        <i class="fas fa-star text-orange"></i>
                        <i class="fas fa-star text-orange"></i>
                        <i class="fas fa-star text-orange"></i>
                        <i class="fas fa-star text-orange"></i>
                    </div>
                    <p class="text-gray-700 mb-6 italic">
                        "Professional team with great response time. They've been securing our office for 3 years."
                    </p>
                    <div>
                        <h5 class="font-bold text-navy">Lutaaya Mahad</h5>
                        <p class="text-sm text-gray-600">STV Uganda</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 1s ease-out;
        }
        .animate-fade-in-delay {
            animation: fadeIn 1s ease-out 0.3s both;
        }
        .animate-fade-in-delay-2 {
            animation: fadeIn 1s ease-out 0.6s both;
        }

    </style>
@endpush

@push('scripts')
    <script>
        // Hero Slideshow
        let currentSlide = 0;
        const slides = document.querySelectorAll('.hero-slide');
        const dots = document.querySelectorAll('.slide-dot');
        const totalSlides = slides.length;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                if (i === index) {
                    slide.classList.remove('opacity-0');
                    slide.classList.add('active');
                } else {
                    slide.classList.add('opacity-0');
                    slide.classList.remove('active');
                }
            });

            dots.forEach((dot, i) => {
                if (i === index) {
                    dot.classList.remove('opacity-50');
                    dot.classList.add('opacity-100');
                } else {
                    dot.classList.add('opacity-50');
                    dot.classList.remove('opacity-100');
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            showSlide(currentSlide);
        }

        // Auto-play slideshow every 5 seconds
        setInterval(nextSlide, 5000);

        // Dot navigation
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentSlide = index;
                showSlide(currentSlide);
            });
        });

        // Initialize first slide
        showSlide(0);
    </script>
@endpush
