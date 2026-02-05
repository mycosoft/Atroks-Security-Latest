@extends('layouts.frontend')

@section('title', 'Track Your Shipment - Atroks Security Services')
@section('meta_description', 'Track your safe keeping item with Atroks Security Services. Enter your reference number to view the latest status.')

@section('content')
    <!-- Page Header -->
    <div class="relative py-24 bg-cover bg-center" style="background-image: url('{{ asset('images/herosection/atroks2.png') }}');" data-reveal>
        <div class="absolute inset-0 bg-navy/80"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Track Your Secure Package</h1>
            <div class="flex justify-center items-center space-x-2 text-gray-300 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:text-orange transition">Home</a>
                <span><i class="fas fa-chevron-right text-xs"></i></span>
                <span class="text-orange">Track Item</span>
            </div>
        </div>
    </div>

    <!-- Tracking Form Section -->
    <section class="py-20 bg-gray-50" data-reveal>
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 -mt-28 relative z-20">
            <div class="bg-white rounded-2xl shadow-2xl p-8 md:p-12 border border-gray-100" data-reveal data-delay="100">
                <div class="text-center mb-10" data-reveal data-delay="150">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-orange/10 rounded-full mb-6">
                        <i class="fas fa-search-location text-3xl text-orange"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-navy mb-4">Real-Time Package Tracking</h2>
                    <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                        Enter your Reference Number to track your package.
                    </p>
                </div>

                @if(session('error'))
                    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-xl text-left" role="alert">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle text-red-500 mr-3 text-xl"></i>
                            <div>
                                <p class="font-bold text-lg">Tracking Error</p>
                                <p class="mt-1">{{ session('error') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Tracking Form -->
                <div class="bg-gray-50 p-8 rounded-xl border border-gray-200 mb-10" data-reveal data-delay="200">
                    <form action="{{ route('tracking.search') }}" method="post">
                        @csrf
                        <div>
                            <label for="reference_number" class="block text-gray-700 font-medium mb-3 text-lg">
                                <i class="fas fa-barcode text-orange mr-2"></i> Reference Number
                            </label>
                            <div class="flex gap-3">
                                <div class="relative flex-1">
                                    <input 
                                        type="text" 
                                        name="reference_number" 
                                        id="reference_number"
                                        class="w-full rounded-xl border-2 border-gray-300 focus:border-orange focus:ring-4 focus:ring-orange/20 shadow-sm py-5 pl-6 pr-14 text-lg transition-all duration-300"
                                        placeholder="Enter Reference Number (e.g. WR2023123012345678)" 
                                        required
                                        autocomplete="off"
                                        autofocus
                                    >
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-5 pointer-events-none">
                                        <i class="fas fa-fingerprint text-2xl text-gray-400"></i>
                                    </div>
                                </div>
                                <button type="submit" class="bg-orange text-white px-10 py-5 rounded-xl font-bold hover:bg-navy transition-all shadow-lg hover:shadow-2xl transform hover:-translate-y-1 text-lg flex items-center justify-center gap-3 whitespace-nowrap">
                                    <i class="fas fa-search"></i> Track Now
                                </button>
                            </div>
                            <p class="text-gray-500 text-sm mt-2 ml-1">
                                Find your reference number on your receipt or confirmation email
                            </p>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </section>




@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('reference_number');
        
        // Auto-format reference number
        input.addEventListener('input', function(e) {
            let value = e.target.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
            e.target.value = value;
        });
        
        // Add focus animation
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('ring-4', 'ring-orange/20');
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('ring-4', 'ring-orange/20');
        });
    });
</script>
@endpush
