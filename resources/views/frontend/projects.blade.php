@extends('layouts.frontend')

@section('title', 'Our Projects - Atroks Security Services')

@section('content')
    <!-- Page Header -->
    <div class="relative py-24 bg-cover bg-center" style="background-image: url('{{ asset('images/herosection/atroks2.png') }}');">
        <div class="absolute inset-0 bg-navy/80"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Our Projects</h1>
            <div class="flex justify-center items-center space-x-2 text-gray-300 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:text-orange transition">Home</a>
                <span><i class="fas fa-chevron-right text-xs"></i></span>
                <span class="text-orange">Projects</span>
            </div>
        </div>
    </div>

    <!-- Projects Grid -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-28 relative z-20">
            
            <!-- Filters (Optional future feature, static for now or just grid) -->
            <div class="mb-12 text-center">
                <p class="text-white text-lg max-w-2xl mx-auto mb-8">
                    Discover how we are securing businesses, events, and communities across the region.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Project 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-2xl transition duration-300">
                    <div class="h-64 overflow-hidden relative">
                        <img src="https://placehold.co/600x400?text=Bank+Security" alt="Bank Security" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-navy/50 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                            <span class="text-white border border-white px-4 py-2 rounded uppercase text-sm tracking-wider">View Project</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="text-orange text-xs font-bold uppercase tracking-wide mb-2">Corporate Security</div>
                        <h3 class="text-xl font-bold text-navy mb-3">National Bank Protection</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            Implementing comprehensive access control and 24/7 armed guarding for a major financial institution's headquarters.
                        </p>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-2xl transition duration-300">
                    <div class="h-64 overflow-hidden relative">
                        <img src="https://placehold.co/600x400?text=Music+Festival" alt="Music Festival" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                       <div class="absolute inset-0 bg-navy/50 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                            <span class="text-white border border-white px-4 py-2 rounded uppercase text-sm tracking-wider">View Project</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="text-orange text-xs font-bold uppercase tracking-wide mb-2">Event Management</div>
                        <h3 class="text-xl font-bold text-navy mb-3">Summer Music Festival</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            Providing crowd control, VIP protection, and emergency response for over 10,000 attendees at an open-air festival.
                        </p>
                    </div>
                </div>

                <!-- Project 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-2xl transition duration-300">
                    <div class="h-64 overflow-hidden relative">
                        <img src="https://placehold.co/600x400?text=Luxury+Estate" alt="Luxury Estate" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-navy/50 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                            <span class="text-white border border-white px-4 py-2 rounded uppercase text-sm tracking-wider">View Project</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="text-orange text-xs font-bold uppercase tracking-wide mb-2">Residential Security</div>
                        <h3 class="text-xl font-bold text-navy mb-3">Gated Community Security</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            Advanced perimeter monitoring and K9 patrols for a high-end gated residential estate.
                        </p>
                    </div>
                </div>

                <!-- Project 4 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-2xl transition duration-300">
                    <div class="h-64 overflow-hidden relative">
                        <img src="https://placehold.co/600x400?text=Mall+Security" alt="Mall Security" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-navy/50 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                            <span class="text-white border border-white px-4 py-2 rounded uppercase text-sm tracking-wider">View Project</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="text-orange text-xs font-bold uppercase tracking-wide mb-2">Retail Security</div>
                        <h3 class="text-xl font-bold text-navy mb-3">Shopping Mall Safety</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            Deploying a mix of uniformed guards and plainclothes officers to prevent theft and ensure shopper safety.
                        </p>
                    </div>
                </div>

                <!-- Project 5 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-2xl transition duration-300">
                    <div class="h-64 overflow-hidden relative">
                        <img src="https://placehold.co/600x400?text=Diplomatic+Convoy" alt="Diplomatic Convoy" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-navy/50 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                            <span class="text-white border border-white px-4 py-2 rounded uppercase text-sm tracking-wider">View Project</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="text-orange text-xs font-bold uppercase tracking-wide mb-2">Close Protection</div>
                        <h3 class="text-xl font-bold text-navy mb-3">VIP Diplomatic Visit</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            Secure transport and close protection services for a visiting foreign delegation.
                        </p>
                    </div>
                </div>

                 <!-- Project 6 -->
                 <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-2xl transition duration-300">
                    <div class="h-64 overflow-hidden relative">
                        <img src="https://placehold.co/600x400?text=Industrial+Site" alt="Industrial Site" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-navy/50 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                            <span class="text-white border border-white px-4 py-2 rounded uppercase text-sm tracking-wider">View Project</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="text-orange text-xs font-bold uppercase tracking-wide mb-2">Industrial Security</div>
                        <h3 class="text-xl font-bold text-navy mb-3">Factory Access Control</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            Managing shift changes and vehicle inspections for a 24/7 manufacturing facility.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-navy py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
             <h2 class="text-3xl font-bold text-white mb-6">Have a project in mind?</h2>
             <p class="text-gray-300 mb-8 max-w-2xl mx-auto">Let us provide the security solutions you need to make your project a success.</p>
             <a href="{{ route('contact') }}" class="inline-block bg-orange text-white font-bold py-3 px-8 rounded-lg hover:bg-white hover:text-navy transition duration-300">
                Get in Touch
             </a>
        </div>
    </section>

@endsection
