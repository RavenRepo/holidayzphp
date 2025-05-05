@extends('layouts.app')

@section('title', 'Destinations - Holidayz Manager')

@section('meta_description', 'Explore our handpicked collection of stunning destinations across India. From serene beaches to majestic mountains, find your perfect getaway.')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-brandblue/5 via-white to-saffron/10 overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-brandblue mb-6">
                    Discover India's Finest Destinations
                </h1>
                <p class="text-lg md:text-xl text-gray-700 leading-relaxed mb-8">
                    From the snow-capped peaks of the Himalayas to the sun-kissed beaches of Kerala, 
                    explore the diverse landscapes and rich cultural heritage of India.
                </p>
            </div>
        </div>
    </section>

    <!-- Destinations Grid -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach([
                    [
                        'name' => 'Rajasthan',
                        'description' => 'Experience the royal heritage and desert landscapes',
                        'image' => 'rajasthan.jpg',
                        'tags' => ['Heritage', 'Culture', 'Desert']
                    ],
                    [
                        'name' => 'Kerala',
                        'description' => 'Discover the serene backwaters and lush landscapes',
                        'image' => 'kerala.jpg',
                        'tags' => ['Nature', 'Wellness', 'Beach']
                    ],
                    [
                        'name' => 'Himachal Pradesh',
                        'description' => 'Explore the majestic mountains and scenic valleys',
                        'image' => 'himachal.jpg',
                        'tags' => ['Mountains', 'Adventure', 'Nature']
                    ],
                    [
                        'name' => 'Goa',
                        'description' => 'Relax on pristine beaches and enjoy vibrant nightlife',
                        'image' => 'goa.jpg',
                        'tags' => ['Beach', 'Nightlife', 'Culture']
                    ],
                    [
                        'name' => 'Varanasi',
                        'description' => 'Experience the spiritual heart of India',
                        'image' => 'varanasi.jpg',
                        'tags' => ['Spiritual', 'Culture', 'Heritage']
                    ],
                    [
                        'name' => 'Andaman Islands',
                        'description' => 'Discover paradise on earth with crystal clear waters',
                        'image' => 'andaman.jpg',
                        'tags' => ['Beach', 'Adventure', 'Nature']
                    ]
                ] as $destination)
                    <div class="group">
                        <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft hover:shadow-lg transition-all duration-300 overflow-hidden">
                            <div class="relative h-64 overflow-hidden">
                                <img 
                                    src="{{ asset('images/destinations/' . $destination['image']) }}" 
                                    alt="{{ $destination['name'] }}" 
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500"
                                    loading="lazy"
                                    decoding="async"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                <div class="absolute bottom-4 left-4 right-4">
                                    <h3 class="text-2xl font-bold text-white mb-2">{{ $destination['name'] }}</h3>
                                    <p class="text-white/90">{{ $destination['description'] }}</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex flex-wrap gap-2">
                                    @foreach($destination['tags'] as $tag)
                                        <span class="px-3 py-1 bg-brandblue/10 text-brandblue rounded-full text-sm">
                                            {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Experiences -->
    <section class="py-16 bg-gradient-to-br from-saffron/10 via-white to-brandblue/5">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-brandblue text-center mb-12">Featured Experiences</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Cultural Tours -->
                <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft p-6">
                    <div class="w-16 h-16 bg-brandblue/10 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-brandblue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brandblue mb-4">Cultural Tours</h3>
                    <p class="text-gray-700">Immerse yourself in India's rich cultural heritage with guided tours to historical monuments and local communities.</p>
                </div>

                <!-- Adventure Activities -->
                <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft p-6">
                    <div class="w-16 h-16 bg-brandblue/10 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-brandblue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brandblue mb-4">Adventure Activities</h3>
                    <p class="text-gray-700">From trekking in the Himalayas to water sports in the Arabian Sea, experience thrilling adventures.</p>
                </div>

                <!-- Wellness Retreats -->
                <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft p-6">
                    <div class="w-16 h-16 bg-brandblue/10 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-brandblue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brandblue mb-4">Wellness Retreats</h3>
                    <p class="text-gray-700">Rejuvenate your mind and body with yoga, meditation, and Ayurvedic treatments in serene settings.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-brandblue mb-6">Ready to Start Your Journey?</h2>
                <p class="text-lg text-gray-700 mb-8">
                    Let us help you plan the perfect trip to your dream destination in India.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a 
                        href="{{ route('contact') }}" 
                        class="inline-block px-8 py-4 bg-saffron text-white font-bold rounded-xl hover:bg-brandblue transition-colors duration-300"
                    >
                        Contact Us Today
                    </a>
                    <a 
                        href="#" 
                        class="inline-block px-8 py-4 bg-brandblue text-white font-bold rounded-xl hover:bg-saffron transition-colors duration-300"
                    >
                        Download Brochure
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
