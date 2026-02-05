@extends('layouts.frontend')

@section('title', 'Frequently Asked Questions - Atroks Security Services')
@section('meta_description', 'Answers to common questions about Atroks Security Services, including service areas, response times, staffing, and safe keeping.')

@section('content')
    <!-- Page Header -->
    <div class="relative py-24 bg-cover bg-center" style="background-image: url('{{ asset('images/herosection/atroks2.png') }}');" data-reveal>
        <div class="absolute inset-0 bg-navy/80"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Frequently Asked Questions</h1>
            <div class="flex justify-center items-center space-x-2 text-gray-300 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:text-orange transition">Home</a>
                <span><i class="fas fa-chevron-right text-xs"></i></span>
                <span class="text-orange">FAQs</span>
            </div>
        </div>
    </div>

    <!-- FAQs Section -->
    <section class="py-20 bg-gray-50" data-reveal>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24 relative z-20">
            <!-- Search and Filter -->
            <div class="mb-12 space-y-6" data-reveal data-delay="100">
                <!-- Search Bar -->
                <div class="relative max-w-2xl mx-auto">
                    <input type="text" id="faqSearch" placeholder="Search for answers..." class="w-full px-6 py-4 rounded-full border border-gray-200 focus:outline-none focus:border-orange focus:ring-1 focus:ring-orange shadow-sm text-lg">
                    <button class="absolute right-4 top-1/2 transform -translate-y-1/2 text-orange">
                        <i class="fas fa-search text-xl"></i>
                    </button>
                </div>

                <!-- Categories -->
                <div class="flex flex-wrap justify-center gap-4">
                    <button class="category-btn px-6 py-2 rounded-full bg-navy text-white font-medium transition shadow-sm" data-category="all">All</button>
                    <button class="category-btn px-6 py-2 rounded-full bg-white text-gray-600 hover:bg-gray-50 font-medium transition shadow-sm border border-gray-100" data-category="general">General</button>
                    <button class="category-btn px-6 py-2 rounded-full bg-white text-gray-600 hover:bg-gray-50 font-medium transition shadow-sm border border-gray-100" data-category="services">Services</button>
                    <button class="category-btn px-6 py-2 rounded-full bg-white text-gray-600 hover:bg-gray-50 font-medium transition shadow-sm border border-gray-100" data-category="billing">Billing & Contract</button>
                </div>
            </div>

            <div class="space-y-4" id="faqList">
                <!-- FAQ Item 1 (General) -->
                <div class="faq-item group border border-gray-200 rounded-lg overflow-hidden transition-all duration-300 hover:shadow-md" data-category="general" data-reveal data-delay="150">
                    <button class="w-full flex justify-between items-center p-6 bg-white cursor-pointer focus:outline-none" onclick="toggleFaq(this)">
                        <span class="text-lg font-bold text-navy text-left">What areas do you cover for security services?</span>
                        <span class="transform transition-transform duration-300 text-orange">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </button>
                    <div class="faq-content hidden bg-gray-50 border-t border-gray-100">
                        <div class="p-6 text-gray-600 leading-relaxed">
                            We operate throughout Uganda and East Africa. Our main headquarters are in Kampala, but we have the capacity to deploy teams to various regions depending on client needs.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 2 (Services) -->
                <div class="faq-item group border border-gray-200 rounded-lg overflow-hidden transition-all duration-300 hover:shadow-md" data-category="services" data-reveal data-delay="220">
                    <button class="w-full flex justify-between items-center p-6 bg-white cursor-pointer focus:outline-none" onclick="toggleFaq(this)">
                        <span class="text-lg font-bold text-navy text-left">Are your security guards armed?</span>
                        <span class="transform transition-transform duration-300 text-orange">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </button>
                    <div class="faq-content hidden bg-gray-50 border-t border-gray-100">
                        <div class="p-6 text-gray-600 leading-relaxed">
                            Yes, we provide both armed and unarmed security services tailored to the specific risk level and requirements of our clients. All our armed guards are fully licensed and rigorously trained in firearms safety and usage.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 3 (General) -->
                <div class="faq-item group border border-gray-200 rounded-lg overflow-hidden transition-all duration-300 hover:shadow-md" data-category="general" data-reveal data-delay="290">
                    <button class="w-full flex justify-between items-center p-6 bg-white cursor-pointer focus:outline-none" onclick="toggleFaq(this)">
                        <span class="text-lg font-bold text-navy text-left">How do I request a quote?</span>
                        <span class="transform transition-transform duration-300 text-orange">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </button>
                    <div class="faq-content hidden bg-gray-50 border-t border-gray-100">
                        <div class="p-6 text-gray-600 leading-relaxed">
                            You can easily request a quote by visiting our <a href="{{ route('quote') }}" class="text-orange hover:underline">Request Quote</a> page and filling out the form. Alternatively, you can call us directly at +256 708 660 055 or visit our office.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 4 (Billing) -->
                <div class="faq-item group border border-gray-200 rounded-lg overflow-hidden transition-all duration-300 hover:shadow-md" data-category="billing" data-reveal data-delay="360">
                    <button class="w-full flex justify-between items-center p-6 bg-white cursor-pointer focus:outline-none" onclick="toggleFaq(this)">
                        <span class="text-lg font-bold text-navy text-left">Do you offer short-term security contracts?</span>
                        <span class="transform transition-transform duration-300 text-orange">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </button>
                    <div class="faq-content hidden bg-gray-50 border-t border-gray-100">
                        <div class="p-6 text-gray-600 leading-relaxed">
                            Absolutely. We offer flexible contract terms, including one-time event security, short-term assignments, and long-term permanent security solutions.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 5 (Services) -->
                <div class="faq-item group border border-gray-200 rounded-lg overflow-hidden transition-all duration-300 hover:shadow-md" data-category="services" data-reveal data-delay="430">
                    <button class="w-full flex justify-between items-center p-6 bg-white cursor-pointer focus:outline-none" onclick="toggleFaq(this)">
                        <span class="text-lg font-bold text-navy text-left">What is your Safe Keeping service?</span>
                        <span class="transform transition-transform duration-300 text-orange">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </button>
                    <div class="faq-content hidden bg-gray-50 border-t border-gray-100">
                        <div class="p-6 text-gray-600 leading-relaxed">
                            Our Safe Keeping service provides secure storage for valuable items and documents. We use advanced tracking systems that allow you to monitor the status of your items online in real-time.
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-12 text-center" data-reveal data-delay="100">
                <p class="text-gray-600 mb-6">Can't find the answer you're looking for?</p>
                <a href="{{ route('contact') }}" class="bg-navy text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange transition inline-flex items-center">
                    Contact Support <i class="fas fa-headset ml-2"></i>
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('faqSearch');
            const faqItems = document.querySelectorAll('.faq-item');
            const categoryButtons = document.querySelectorAll('.category-btn');

            // Search Functionality
            searchInput.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();
                
                faqItems.forEach(item => {
                    const question = item.querySelector('button span:first-child').textContent.toLowerCase();
                    const answer = item.querySelector('.faq-content').textContent.toLowerCase();
                    
                    if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });

            // Category Filtering
            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Update active state
                    categoryButtons.forEach(btn => {
                        btn.classList.remove('bg-navy', 'text-white');
                        btn.classList.add('bg-white', 'text-gray-600');
                    });
                    this.classList.remove('bg-white', 'text-gray-600');
                    this.classList.add('bg-navy', 'text-white');

                    const category = this.dataset.category;

                    faqItems.forEach(item => {
                        if (category === 'all' || item.dataset.category === category) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        });

        function toggleFaq(button) {
            const content = button.nextElementSibling;
            const icon = button.querySelector('.fa-chevron-down');
            
            // Toggle current
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
                button.classList.add('bg-gray-50');
            } else {
                content.classList.add('hidden');
                icon.style.transform = 'rotate(0deg)';
                button.classList.remove('bg-gray-50');
            }

            // Close others (Accordion behavior)
            const allContent = document.querySelectorAll('.faq-content');
            allContent.forEach((item) => {
                if (item !== content && !item.classList.contains('hidden')) {
                    item.classList.add('hidden');
                    item.previousElementSibling.querySelector('.fa-chevron-down').style.transform = 'rotate(0deg)';
                    item.previousElementSibling.classList.remove('bg-gray-50');
                }
            });
        }
    </script>
@endpush
