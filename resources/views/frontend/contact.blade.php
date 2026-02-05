@extends('layouts.frontend')

@section('title', 'Contact Us - Atroks Security Services')

@section('content')
    <!-- Page Header -->
    <div class="relative py-24 bg-cover bg-center" style="background-image: url('{{ asset('images/herosection/atroks2.png') }}');" data-reveal>
        <div class="absolute inset-0 bg-navy/80"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Contact Us</h1>
            <div class="flex justify-center items-center space-x-2 text-gray-300 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:text-orange transition">Home</a>
                <span><i class="fas fa-chevron-right text-xs"></i></span>
                <span class="text-orange">Contact Us</span>
            </div>
        </div>
    </div>

    <!-- Contact Info Cards -->
    <section class="py-16 bg-gray-50" data-reveal>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8 -mt-24 relative z-20">
                <!-- Card 1: Phone -->
                <div class="bg-white p-8 rounded-lg shadow-lg text-center hover:-translate-y-2 transition duration-300" data-reveal data-delay="150">
                    <div class="w-16 h-16 bg-orange/10 text-orange rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-navy mb-2">Call Us 24/7</h3>
                    <p class="text-gray-600">+256 708 660 055</p>
                    <p class="text-gray-600">+256 XXX XXX XXX</p>
                </div>

                <!-- Card 2: Email -->
                <div class="bg-white p-8 rounded-lg shadow-lg text-center hover:-translate-y-2 transition duration-300" data-reveal data-delay="250">
                    <div class="w-16 h-16 bg-orange/10 text-orange rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3 class="text-xl font-bold text-navy mb-2">Email Us</h3>
                    <p class="text-gray-600">info@atrokssecurity.com</p>
                    <p class="text-gray-600">support@atrokssecurity.com</p>
                </div>

                <!-- Card 3: Location -->
                <div class="bg-white p-8 rounded-lg shadow-lg text-center hover:-translate-y-2 transition duration-300" data-reveal data-delay="350">
                    <div class="w-16 h-16 bg-orange/10 text-orange rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-navy mb-2">Our Location</h3>
                    <p class="text-gray-600">Lukuli Road, 1st Floor Sky Complex</p>
                    <p class="text-gray-600">Buziga, Kampala, Uganda</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form & Map Section -->
    <section class="py-20 bg-white" data-reveal>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div data-reveal data-delay="100">
                    <h3 class="text-3xl font-bold text-navy mb-2">Get in Touch</h3>
                    <div class="w-16 h-1 bg-orange mb-6"></div>
                    <p class="text-gray-600 mb-8">
                        Have a question or need a quote? Fill out the form below and our team will get back to you shortly.
                    </p>
                    
                    <form action="#" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                <input type="text" id="name" name="name" class="w-full rounded-lg border-gray-300 focus:border-orange focus:ring focus:ring-orange/20 shadow-sm py-3 px-4 border" placeholder="John Doe" required>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                <input type="email" id="email" name="email" class="w-full rounded-lg border-gray-300 focus:border-orange focus:ring focus:ring-orange/20 shadow-sm py-3 px-4 border" placeholder="john@example.com" required>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="w-full rounded-lg border-gray-300 focus:border-orange focus:ring focus:ring-orange/20 shadow-sm py-3 px-4 border" placeholder="+256..." required>
                            </div>
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                                <input type="text" id="subject" name="subject" class="w-full rounded-lg border-gray-300 focus:border-orange focus:ring focus:ring-orange/20 shadow-sm py-3 px-4 border" placeholder="Service Inquiry">
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                            <textarea id="message" name="message" rows="5" class="w-full rounded-lg border-gray-300 focus:border-orange focus:ring focus:ring-orange/20 shadow-sm py-3 px-4 border" placeholder="How can we help you?" required></textarea>
                        </div>

                        <button type="submit" class="bg-orange text-white px-8 py-4 rounded-lg font-bold hover:bg-navy transition w-full md:w-auto shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            Send Message <i class="fas fa-paper-plane ml-2"></i>
                        </button>
                    </form>
                </div>

                <!-- Google Map -->
                <div class="h-full min-h-[400px] rounded-lg overflow-hidden shadow-lg border border-gray-200" data-reveal data-delay="200">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.778736348638!2d32.61864131475354!3d0.2858564998083861!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177dbdc4d2b2b1a1%3A0x40b6e7f8e3f8f90!2sLukuli%20Rd%2C%20Kampala!5e0!3m2!1sen!2sug!4v1620000000000!5m2!1sen!2sug" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                        class="w-full h-full">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
