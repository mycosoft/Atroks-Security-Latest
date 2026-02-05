@extends('layouts.frontend')

@section('title', 'About Us - Atroks Security Services')

@section('content')
    <!-- Page Header -->
    <div class="relative py-24 bg-cover bg-center" style="background-image: url('{{ asset('images/herosection/atroks2.png') }}');" data-reveal>
        <div class="absolute inset-0 bg-navy/80"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">About Us</h1>
            <div class="flex justify-center items-center space-x-2 text-gray-300 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:text-orange transition">Home</a>
                <span><i class="fas fa-chevron-right text-xs"></i></span>
                <span class="text-orange">About Us</span>
            </div>
        </div>
    </div>

    <!-- Our Story / Introduction -->
    <section class="py-20 bg-gray-50" data-reveal>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-28 relative z-20">
            <div class="bg-white rounded-xl shadow-2xl p-8 md:p-12 border border-gray-100">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div data-reveal data-delay="100">
                        <h2 class="text-3xl font-bold text-navy mb-6">Our Story</h2>
                        <div class="w-20 h-1 bg-orange mb-6"></div>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Atroks Security Services was founded with a single mission: to provide uncompromised safety and peace of mind to individuals and businesses across the region. With years of experience in the security industry, we have established ourselves as a trusted partner for comprehensive security solutions.
                        </p>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            We pride ourselves on our highly trained personnel, state-of-the-art technology, and a client-centric approach. Whether it's guarding your physical assets, monitoring your premises, or providing personal protection, Atroks is dedicated to excellence in every service we deliver.
                        </p>

                    </div>
                    <div class="relative h-96 rounded-xl overflow-hidden shadow-lg group" data-reveal data-delay="200">
                        <!-- Placeholder for About Us Image -->
                        <img src="https://placehold.co/800x600?text=Security+Team+Meeting" alt="Atroks Team" class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-navy/20 group-hover:bg-transparent transition duration-500"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-20 bg-navy" data-reveal>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Mission -->
                <div class="bg-white rounded-xl p-8 border-l-4 border-orange hover:shadow-lg transition duration-300" data-reveal data-delay="100">
                    <h3 class="text-2xl font-bold text-navy mb-4">Our Mission</h3>
                    <p class="text-gray-600 leading-relaxed">
                        To deliver superior security solutions through rigorous training, advanced technology, and unwavering dedication, ensuring the safety and prosperity of our clients and their communities.
                    </p>
                </div>

                <!-- Vision -->
                <div class="bg-white rounded-xl p-8 border-l-4 border-orange hover:shadow-lg transition duration-300" data-reveal data-delay="200">
                    <h3 class="text-2xl font-bold text-navy mb-4">Our Vision</h3>
                    <p class="text-gray-600 leading-relaxed">
                        To be the leading security provider in East Africa, recognized for our integrity, innovation, and the exceptional standard of service we provide to every partner we protect.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section class="py-20 bg-gray-50 border-t border-gray-200" data-reveal>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-navy mb-12" data-reveal data-delay="100">Our Core Values</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-md transform hover:-translate-y-1 transition duration-300" data-reveal data-delay="150">
                    <h3 class="text-xl font-bold text-orange mb-3">Integrity</h3>
                    <p class="text-gray-600 text-sm">We operate with honesty and transparency in all our dealings.</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-md transform hover:-translate-y-1 transition duration-300" data-reveal data-delay="250">
                    <h3 class="text-xl font-bold text-orange mb-3">Vigilance</h3>
                    <p class="text-gray-600 text-sm">We are always alert and prepared to respond to any threat.</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-md transform hover:-translate-y-1 transition duration-300" data-reveal data-delay="350">
                    <h3 class="text-xl font-bold text-orange mb-3">Professionalism</h3>
                    <p class="text-gray-600 text-sm">We maintain the highest standards of conduct and service.</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-md transform hover:-translate-y-1 transition duration-300" data-reveal data-delay="450">
                    <h3 class="text-xl font-bold text-orange mb-3">Customer Focus</h3>
                    <p class="text-gray-600 text-sm">We prioritize the safety and satisfaction of our clients above all.</p>
                </div>
            </div>
        </div>
    </section>


@endsection
