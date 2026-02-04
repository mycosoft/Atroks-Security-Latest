@extends('layouts.frontend')

@section('title', 'Request a Quote - Atroks Security Services')

@section('content')
    <!-- Page Header -->
    <div class="relative py-24 bg-cover bg-center" style="background-image: url('{{ asset('images/herosection/atroks2.png') }}');">
        <div class="absolute inset-0 bg-navy/80"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Request a Quote</h1>
            <div class="flex justify-center items-center space-x-2 text-gray-300 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:text-orange transition">Home</a>
                <span><i class="fas fa-chevron-right text-xs"></i></span>
                <span class="text-orange">Get Quote</span>
            </div>
        </div>
    </div>

    <!-- Quote Form Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 -mt-28 relative z-20">
            <div class="bg-white rounded-xl shadow-2xl p-8 md:p-12 border border-gray-100">
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-bold text-navy mb-4">Tailored Security Solutions</h2>
                    <p class="text-gray-600">
                        Please fill out the form below to help us understand your security needs. Our team will review your requirements and provide a customized quote within 24 hours.
                    </p>
                </div>

                <form action="#" method="POST" class="space-y-8">
                    @csrf
                    
                    <!-- Section: Personal Info -->
                    <div>
                        <h3 class="text-lg font-semibold text-navy mb-4 border-b border-gray-200 pb-2 flex items-center">
                            <span class="w-8 h-8 rounded-full bg-orange/10 text-orange flex items-center justify-center mr-3 text-sm">1</span>
                            Contact Information
                        </h3>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                                <input type="text" id="name" name="name" class="w-full rounded-lg border-gray-300 focus:border-orange focus:ring focus:ring-orange/20 shadow-sm py-3 px-4 border" required>
                            </div>
                            <div>
                                <label for="company" class="block text-sm font-medium text-gray-700 mb-1">Company Name (Optional)</label>
                                <input type="text" id="company" name="company" class="w-full rounded-lg border-gray-300 focus:border-orange focus:ring focus:ring-orange/20 shadow-sm py-3 px-4 border">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address *</label>
                                <input type="email" id="email" name="email" class="w-full rounded-lg border-gray-300 focus:border-orange focus:ring focus:ring-orange/20 shadow-sm py-3 px-4 border" required>
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number *</label>
                                <input type="tel" id="phone" name="phone" class="w-full rounded-lg border-gray-300 focus:border-orange focus:ring focus:ring-orange/20 shadow-sm py-3 px-4 border" required>
                            </div>
                        </div>
                    </div>

                    <!-- Section: Service Details -->
                    <div>
                        <h3 class="text-lg font-semibold text-navy mb-4 border-b border-gray-200 pb-2 flex items-center">
                            <span class="w-8 h-8 rounded-full bg-orange/10 text-orange flex items-center justify-center mr-3 text-sm">2</span>
                            Service Requirements
                        </h3>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="service_type" class="block text-sm font-medium text-gray-700 mb-1">Service Required *</label>
                                <select id="service_type" name="service_type" class="w-full rounded-lg border-gray-300 focus:border-orange focus:ring focus:ring-orange/20 shadow-sm py-3 px-4 border" required>
                                    <option value="" disabled selected>Select a Service</option>
                                    <option value="Security Guards">Security Guards</option>
                                    <option value="CCTV Surveillance">CCTV Surveillance</option>
                                    <option value="K9 Units">K9 Security Units</option>
                                    <option value="Personal Security">Personal Security / Bodyguards</option>
                                    <option value="Event Security">Event Security</option>
                                    <option value="Safe Keeping">Safe Keeping Services</option>
                                    <option value="Consultancy">Security Consultancy</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Service Location (City/Area) *</label>
                                <input type="text" id="location" name="location" class="w-full rounded-lg border-gray-300 focus:border-orange focus:ring focus:ring-orange/20 shadow-sm py-3 px-4 border" required>
                            </div>
                        </div>
                    </div>

                    <!-- Section: Additional Details -->
                    <div>
                        <h3 class="text-lg font-semibold text-navy mb-4 border-b border-gray-200 pb-2 flex items-center">
                            <span class="w-8 h-8 rounded-full bg-orange/10 text-orange flex items-center justify-center mr-3 text-sm">3</span>
                            Project Details
                        </h3>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Describe Your Requirements</label>
                            <textarea id="message" name="message" rows="4" class="w-full rounded-lg border-gray-300 focus:border-orange focus:ring focus:ring-orange/20 shadow-sm py-3 px-4 border" placeholder="Please provide any specific details about the assignment..."></textarea>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full bg-orange text-white px-8 py-4 rounded-lg font-bold hover:bg-navy transition shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-lg">
                            Submit Quote Request <i class="fas fa-paper-plane ml-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
