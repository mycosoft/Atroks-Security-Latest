@extends('layouts.frontend')

@section('title', 'Tracking Result - ' . $record->reference_number)

@section('content')
    <!-- Page Header -->
    <div class="relative py-24 bg-cover bg-center" style="background-image: url('{{ asset('images/herosection/atroks2.png') }}');">
        <div class="absolute inset-0 bg-navy/80"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Tracking Result</h1>
            <div class="flex justify-center items-center space-x-2 text-gray-300 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:text-orange transition">Home</a>
                <span><i class="fas fa-chevron-right text-xs"></i></span>
                <a href="{{ route('tracking.index') }}" class="hover:text-orange transition">Track</a>
                <span><i class="fas fa-chevron-right text-xs"></i></span>
                <span class="text-orange">Result</span>
            </div>
        </div>
    </div>

    <!-- Tracking Result Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 -mt-28 relative z-20">
            <div class="bg-white rounded-2xl shadow-2xl p-8 md:p-12 border border-gray-100">
                @php
                    // Status color mapping
                    $statusColors = [
                        'Stored' => 'bg-blue-100 text-blue-800 border-blue-300',
                        'Released' => 'bg-green-100 text-green-800 border-green-300',
                        'In Transit' => 'bg-yellow-100 text-yellow-800 border-yellow-300',
                        'default' => 'bg-gray-100 text-gray-800 border-gray-300'
                    ];
                    
                    $statusColor = $statusColors[$record->status] ?? $statusColors['default'];
                    $statusIcon = match($record->status) {
                        'Stored' => 'fas fa-warehouse',
                        'Released' => 'fas fa-check-circle',
                        'In Transit' => 'fas fa-truck-moving',
                        default => 'fas fa-box'
                    };
                @endphp

                <!-- Result Header -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-10 pb-8 border-b border-gray-200">
                    <div>
                        <h2 class="text-3xl font-bold text-navy mb-2">Package Details</h2>
                        <p class="text-gray-600">Reference: <span class="font-mono font-bold text-orange">{{ $record->reference_number }}</span></p>
                    </div>
                    <div class="flex items-center gap-3 bg-gray-50 px-4 py-3 rounded-xl border">
                        <i class="{{ $statusIcon }} text-2xl text-navy"></i>
                        <div>
                            <p class="text-sm text-gray-500">Current Status</p>
                            <span class="px-4 py-2 rounded-lg font-bold {{ $statusColor }} border">{{ $record->status }}</span>
                        </div>
                    </div>
                </div>

                <!-- Package Information Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                    <!-- Client Information -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="bg-navy/10 p-3 rounded-lg">
                                <i class="fas fa-user text-navy text-xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-navy">Client Information</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                                <span class="text-gray-600">Client Name</span>
                                <span class="font-bold text-navy">{{ $record->client->name ?? 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                                <span class="text-gray-600">Phone</span>
                                <span class="font-bold text-navy">{{ $record->client->phone_number ?? 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Email</span>
                                <span class="font-bold text-navy">{{ $record->client->email ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Package Details -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="bg-orange/10 p-3 rounded-lg">
                                <i class="fas fa-box text-orange text-xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-navy">Package Details</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                                <span class="text-gray-600">Shipper</span>
                                <span class="font-bold text-navy">{{ $record->shipper_name ?? 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                                <span class="text-gray-600">Item Description</span>
                                <span class="font-bold text-navy">{{ $record->item_description }}</span>
                            </div>
                            <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                                <span class="text-gray-600">Weight</span>
                                <span class="font-bold text-navy">{{ $record->weight }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Date Stored</span>
                                <span class="font-bold text-navy">{{ $record->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Status Timeline -->
                <div class="mb-12">
                    <h3 class="text-2xl font-bold text-navy mb-8 text-center">Package Journey</h3>
                    <div class="relative">
                        <!-- Timeline line -->
                        <div class="absolute left-4 md:left-1/2 transform md:-translate-x-1/2 h-full w-1 bg-gray-300"></div>
                        
                        <div class="space-y-8">
                            @php
                                $statusIcons = [
                                    'Received' => 'fas fa-shipping-fast',
                                    'Stored' => 'fas fa-warehouse',
                                    'In Transit' => 'fas fa-truck-moving',
                                    'Released' => 'fas fa-check-circle',
                                    'On Hold' => 'fas fa-pause-circle',
                                ];
                            @endphp

                            @forelse($record->statusUpdates()->orderBy('created_at', 'asc')->get() as $index => $statusUpdate)
                                <div class="relative flex flex-col md:flex-row items-center gap-6">
                                    <!-- Timeline dot -->
                                    <div class="relative z-10 flex-shrink-0 w-10 h-10 rounded-full bg-orange flex items-center justify-center">
                                        <i class="{{ $statusIcons[$statusUpdate->status] ?? 'fas fa-box' }} text-white"></i>
                                    </div>
                                    
                                    <!-- Content -->
                                    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 flex-1 {{ $index % 2 == 0 ? 'md:mr-auto md:pr-12' : 'md:ml-auto md:pl-12' }} max-w-lg">
                                        <div class="flex justify-between items-start mb-2">
                                            <h4 class="text-lg font-bold text-navy">{{ $statusUpdate->status }}</h4>
                                            <span class="text-sm font-medium text-green-600">
                                                Completed
                                            </span>
                                        </div>
                                        @if($statusUpdate->description)
                                            <p class="text-gray-600 mb-2">{{ $statusUpdate->description }}</p>
                                        @endif
                                        @if($statusUpdate->notes)
                                            <div class="bg-blue-50 border-l-4 border-blue-500 p-3 mb-2">
                                                <p class="text-sm text-blue-800"><strong>Note:</strong> {{ $statusUpdate->notes }}</p>
                                            </div>
                                        @endif
                                        <div class="flex items-center gap-2 text-sm text-gray-500">
                                            <i class="fas fa-calendar"></i>
                                            <span>{{ $statusUpdate->created_at->format('d M Y, h:i A') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center text-gray-500 py-8">
                                    <i class="fas fa-info-circle text-4xl mb-4"></i>
                                    <p>No status updates available for this package yet.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- QR Code (if available) -->
                @if($record->qr_code_path)
                    <div class="mb-12">
                        <h3 class="text-2xl font-bold text-navy mb-6 text-center">Package QR Code</h3>
                        <div class="flex justify-center">
                            <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                                <img src="{{ asset('storage/' . $record->qr_code_path) }}" alt="Package QR Code" class="w-48 h-48 mx-auto">
                                <p class="text-center text-gray-600 mt-4">Scan to verify package authenticity</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center pt-8 border-t border-gray-200">
                    <a href="{{ route('tracking.index') }}" class="bg-orange text-white px-8 py-4 rounded-xl font-bold hover:bg-navy transition shadow-lg hover:shadow-xl text-lg text-center">
                        <i class="fas fa-search mr-2"></i> Track Another Package
                    </a>
                    <a href="{{ route('home') }}" class="bg-white text-navy border-2 border-navy px-8 py-4 rounded-xl font-bold hover:bg-navy hover:text-white transition shadow-lg hover:shadow-xl text-lg text-center">
                        <i class="fas fa-home mr-2"></i> Back to Home
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="py-16 bg-navy">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-white mb-12">
                <h2 class="text-3xl font-bold mb-4">Need Help With Your Package?</h2>
                <p class="text-gray-300 max-w-3xl mx-auto">Our customer service team is available 24/7 to assist you with any questions about your shipment.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white/10 backdrop-blur-sm p-8 rounded-2xl text-center hover:bg-white/20 transition">
                    <div class="bg-orange/20 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-headset text-2xl text-orange"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Customer Support</h3>
                    <p class="text-gray-300">Contact our support team for immediate assistance with tracking or delivery issues.</p>
                </div>
                
                <div class="bg-white/10 backdrop-blur-sm p-8 rounded-2xl text-center hover:bg-white/20 transition">
                    <div class="bg-orange/20 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-file-alt text-2xl text-orange"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Documentation</h3>
                    <p class="text-gray-300">Access shipping documents and certificates for your secure packages.</p>
                </div>
                
                <div class="bg-white/10 backdrop-blur-sm p-8 rounded-2xl text-center hover:bg-white/20 transition">
                    <div class="bg-orange/20 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-shield-alt text-2xl text-orange"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Security Guarantee</h3>
                    <p class="text-gray-300">All packages are insured and tracked with our advanced security systems.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
