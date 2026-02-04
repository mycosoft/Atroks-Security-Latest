    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <!-- Company Info -->
                <div>
                    <h3 class="text-2xl font-bold mb-4">ATROKS <span class="text-orange">SECURITY</span></h3>
                    <p class="text-gray-400 mb-4">
                        Professional security solutions you can trust. Protecting what matters most since 2010.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-orange transition">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-orange transition">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-orange transition">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-orange transition">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="font-bold text-lg mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-orange transition">Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-orange transition">About Us</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-400 hover:text-orange transition">Services</a></li>
                        <li><a href="{{ route('projects') }}" class="text-gray-400 hover:text-orange transition">Projects</a></li>
                        <li><a href="{{ route('faqs') }}" class="text-gray-400 hover:text-orange transition">FAQs</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="font-bold text-lg mb-4">Our Services</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('services') }}" class="text-gray-400 hover:text-orange transition">Armed Security</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-400 hover:text-orange transition">CCTV Surveillance</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-400 hover:text-orange transition">Mobile Patrols</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-400 hover:text-orange transition">Event Security</a></li>
                        <li><a href="{{ route('tracking.index') }}" class="text-gray-400 hover:text-orange transition">Safe Keeping</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="font-bold text-lg mb-4">Contact Us</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt text-orange mt-1 mr-3"></i>
                            <span>Lukuli Road, 1st Floor Sky Complex<br>Buziga, Kampala, Uganda</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-phone text-orange mt-1 mr-3"></i>
                            <span>+256 708 660 055</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-envelope text-orange mt-1 mr-3"></i>
                            <span>info@atrokssecurity.com</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-clock text-orange mt-1 mr-3"></i>
                            <span>24/7 Available</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Atroks Security Services. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-8 right-8 bg-orange text-white w-12 h-12 rounded-full shadow-lg hover:bg-navy transition opacity-0 invisible z-50 flex items-center justify-center">
        <i class="fas fa-arrow-up"></i>
    </button>
