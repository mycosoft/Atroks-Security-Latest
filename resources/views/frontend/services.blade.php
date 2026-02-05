@extends('layouts.frontend')

@section('title', 'Our Services - Atroks Security Services')

@section('content')
    <!-- Page Header -->
    <div class="relative py-24 bg-cover bg-center" style="background-image: url('{{ asset('images/herosection/atroks2.png') }}');" data-reveal>
        <div class="absolute inset-0 bg-navy/80"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Our Services</h1>
            <div class="flex justify-center items-center space-x-2 text-gray-300 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:text-orange transition">Home</a>
                <span><i class="fas fa-chevron-right text-xs"></i></span>
                <span class="text-orange">Services</span>
            </div>
        </div>
    </div>

    <!-- Services Grid -->
    <section class="py-20 bg-gray-50" data-reveal>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-28 relative z-20">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Service 1: Security Guards -->
                <div class="bg-white rounded-xl shadow-lg hover:-translate-y-2 transition duration-300 group overflow-hidden" data-reveal data-delay="100">
                    <div class="h-48 overflow-hidden">
                        <img src="https://placehold.co/600x400?text=Security+Guards" alt="Security Guards" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-navy mb-3">Security Guarding</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            We provide highly trained and professional security guards for commercial, residential, and industrial properties. Our guards are equipped to handle various security challenges and ensure safety.
                        </p>

                        <a href="{{ route('quote') }}" class="text-orange font-semibold hover:text-navy transition inline-flex items-center">
                            Get a Quote <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Service 2: CCTV -->
                <div class="bg-white rounded-xl shadow-lg hover:-translate-y-2 transition duration-300 group overflow-hidden" data-reveal data-delay="200">
                    <div class="h-48 overflow-hidden">
                        <img src="https://placehold.co/600x400?text=CCTV+Surveillance" alt="CCTV Surveillance" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-navy mb-3">CCTV Surveillance</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            State-of-the-art video surveillance solutions customized to oversee your premises. We offer installation, maintenance, and 24/7 remote monitoring services.
                        </p>

                        <a href="{{ route('quote') }}" class="text-orange font-semibold hover:text-navy transition inline-flex items-center">
                            Get a Quote <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Service 3: K9 Units -->
                <div class="bg-white rounded-xl shadow-lg hover:-translate-y-2 transition duration-300 group overflow-hidden" data-reveal data-delay="300">
                    <div class="h-48 overflow-hidden">
                        <img src="https://placehold.co/600x400?text=K9+Security+Units" alt="K9 Security Units" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-navy mb-3">K9 Security Units</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Our K9 units are trained for detection, tracking, and protection. They are an effective deterrent and essential for high-security environments.
                        </p>

                        <a href="{{ route('quote') }}" class="text-orange font-semibold hover:text-navy transition inline-flex items-center">
                            Get a Quote <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Service 4: Safe Keeping -->
                <div class="bg-white rounded-xl shadow-lg hover:-translate-y-2 transition duration-300 group overflow-hidden" data-reveal data-delay="400">
                    <div class="h-48 overflow-hidden">
                        <img src="https://placehold.co/600x400?text=Safe+Keeping" alt="Safe Keeping" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-navy mb-3">Safe Keeping Services</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            We provide high-security storage facilities for your valuables, documents, and assets. Our system includes detailed tracking and strict access protocols.
                        </p>

                        <a href="{{ route('tracking.index') }}" class="text-orange font-semibold hover:text-navy transition inline-flex items-center">
                            Track Item <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Service 5: Personal Security -->
                <div class="bg-white rounded-xl shadow-lg hover:-translate-y-2 transition duration-300 group overflow-hidden" data-reveal data-delay="500">
                    <div class="h-48 overflow-hidden">
                        <img src="https://placehold.co/600x400?text=Personal+Protection" alt="Personal Protection" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-navy mb-3">Personal Protection</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Discreet and professional bodyguard services for executives, VIPs, and individuals. Our CPOs are experts in threat assessment and defensive tactics.
                        </p>

                        <a href="{{ route('quote') }}" class="text-orange font-semibold hover:text-navy transition inline-flex items-center">
                            Get a Quote <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Service 6: Event Security -->
                <div class="bg-white rounded-xl shadow-lg hover:-translate-y-2 transition duration-300 group overflow-hidden" data-reveal data-delay="600">
                    <div class="h-48 overflow-hidden">
                        <img src="https://placehold.co/600x400?text=Event+Security" alt="Event Security" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-navy mb-3">Event Security</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Comprehensive security planning and management for events of all sizes. We ensure the safety of your guests and the smooth operation of your event.
                        </p>

                        <a href="{{ route('quote') }}" class="text-orange font-semibold hover:text-navy transition inline-flex items-center">
                            Get a Quote <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection
