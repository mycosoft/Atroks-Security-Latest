    <!-- Top Bar -->
    <div class="bg-navy text-white py-3 text-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <!-- Contact Info -->
                <div class="flex items-center space-x-6">
                    <div class="flex items-center">
                        <i class="fas fa-envelope text-orange mr-2"></i>
                        <span>info@atrokssecurity.com</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-phone text-orange mr-2"></i>
                        <span>+256 708 660 055</span>
                    </div>
                    <div class="hidden lg:flex items-center">
                        <i class="fas fa-map-marker-alt text-orange mr-2"></i>
                        <span>Lukuli Road, Buziga, Kampala</span>
                    </div>
                </div>
                
                <!-- Social Media -->
                <div class="flex items-center space-x-4">
                    <a href="#" class="hover:text-orange transition">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="hover:text-orange transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="hover:text-orange transition">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="#" class="hover:text-orange transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Header/Navigation (Sticky) -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="{{ asset('images/logo/logo.jpg') }}" alt="Atroks Security Services" class="h-16">
                    </a>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-navy hover:text-orange transition font-medium">Home</a>
                    <a href="{{ route('about') }}" class="text-navy hover:text-orange transition font-medium">About</a>
                    <a href="{{ route('services') }}" class="text-navy hover:text-orange transition font-medium">Services</a>
                    <a href="{{ route('projects') }}" class="text-navy hover:text-orange transition font-medium">Projects</a>
                    <a href="{{ route('tracking.index') }}" class="text-navy hover:text-orange transition font-medium">Track</a>
                    <a href="{{ route('faqs') }}" class="text-navy hover:text-orange transition font-medium">FAQs</a>
                    <a href="{{ route('contact') }}" class="text-navy hover:text-orange transition font-medium">Contact Us</a>
                    <a href="{{ route('quote') }}" class="bg-orange text-white px-6 py-2 rounded-lg font-semibold hover:bg-navy transition">Request Quote</a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-navy hover:text-orange">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" class="block px-3 py-2 text-navy hover:bg-orange hover:text-white rounded">Home</a>
                <a href="{{ route('about') }}" class="block px-3 py-2 text-navy hover:bg-orange hover:text-white rounded">About</a>
                <a href="{{ route('services') }}" class="block px-3 py-2 text-navy hover:bg-orange hover:text-white rounded">Services</a>
                <a href="{{ route('projects') }}" class="block px-3 py-2 text-navy hover:bg-orange hover:text-white rounded">Projects</a>
                <a href="{{ route('tracking.index') }}" class="block px-3 py-2 text-navy hover:bg-orange hover:text-white rounded">Track</a>
                <a href="{{ route('faqs') }}" class="block px-3 py-2 text-navy hover:bg-orange hover:text-white rounded">FAQs</a>
                <a href="{{ route('contact') }}" class="block px-3 py-2 text-navy hover:bg-orange hover:text-white rounded">Contact Us</a>
            </div>
        </div>
    </nav>
