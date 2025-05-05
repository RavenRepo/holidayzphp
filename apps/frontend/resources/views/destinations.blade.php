@extends('layouts.app')

@section('title', 'Destinations - Holidayz Manager')

@section('meta_description', 'Explore our handpicked collection of stunning destinations across India. From serene beaches to majestic mountains, find your perfect getaway.')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-brandblue/5 via-white to-saffron/10 overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-brandblue mb-6">
                    Explore Our Global Destinations
                </h1>
                <p class="text-lg md:text-xl text-gray-700 leading-relaxed mb-8">
                    From exotic international getaways to breathtaking Indian landscapes,
                    discover handpicked destinations that promise unforgettable experiences.
                </p>
            </div>
        </div>
    </section>

    <!-- International Destinations -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-brandblue mb-12">International Destinations</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                $internationalDestinations = [
                    [
                        'name' => 'Singapore',
                        'description' => 'Experience the perfect blend of modernity and tradition',
                        'image' => 'singapore.jpg',
                        'tags' => ['Modern', 'Shopping', 'Family']
                    ],
                    [
                        'name' => 'Malaysia',
                        'description' => 'Discover diverse cultures and natural wonders',
                        'image' => 'malaysia.jpg',
                        'tags' => ['Culture', 'Nature', 'Adventure']
                    ],
                    [
                        'name' => 'Bali',
                        'description' => 'Immerse in spiritual beauty and tropical paradise',
                        'image' => 'bali.jpg',
                        'tags' => ['Beach', 'Culture', 'Wellness']
                    ],
                    [
                        'name' => 'Thailand',
                        'description' => 'Explore exotic beaches and vibrant city life',
                        'image' => 'thailand.jpg',
                        'tags' => ['Beach', 'Nightlife', 'Food']
                    ],
                    [
                        'name' => 'Dubai',
                        'description' => 'Experience luxury and desert adventures',
                        'image' => 'dubai.jpg',
                        'tags' => ['Luxury', 'Shopping', 'Desert']
                    ],
                    [
                        'name' => 'Vietnam',
                        'description' => 'Journey through rich history and scenic landscapes',
                        'image' => 'vietnam.jpg',
                        'tags' => ['Culture', 'History', 'Nature']
                    ],
                    [
                        'name' => 'Cambodia',
                        'description' => 'Discover ancient temples and cultural heritage',
                        'image' => 'cambodia.jpg',
                        'tags' => ['Heritage', 'History', 'Culture']
                    ],
                    [
                        'name' => 'Azerbaijan',
                        'description' => 'Experience where East meets West',
                        'image' => 'azerbaijan.jpg',
                        'tags' => ['Culture', 'History', 'Modern']
                    ],
                    [
                        'name' => 'Maldives',
                        'description' => 'Escape to paradise islands and luxury resorts',
                        'image' => 'maldives.jpg',
                        'tags' => ['Luxury', 'Beach', 'Romance']
                    ]
                ];
                @endphp

                @foreach($internationalDestinations as $destination)
                    <x-destinations.card 
                        :name="$destination['name']"
                        :description="$destination['description']"
                        :image="$destination['image']"
                        :tags="$destination['tags']"
                    />
                @endforeach
            </div>
        </div>
    </section>

    <!-- Domestic Destinations -->
    <section class="py-16 bg-gradient-to-br from-brandblue/5 via-white to-saffron/10">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-brandblue mb-12">Incredible India</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                $domesticDestinations = [
                    [
                        'name' => 'Ladakh',
                        'description' => 'Experience the magic of high-altitude desert',
                        'image' => 'ladakh.jpg',
                        'tags' => ['Adventure', 'Mountains', 'Culture']
                    ],
                    [
                        'name' => 'Kerala',
                        'description' => 'Discover God's own country and backwaters',
                        'image' => 'kerala.jpg',
                        'tags' => ['Nature', 'Wellness', 'Culture']
                    ],
                    [
                        'name' => 'Goa',
                        'description' => 'Enjoy beaches, parties, and Portuguese heritage',
                        'image' => 'goa.jpg',
                        'tags' => ['Beach', 'Nightlife', 'Heritage']
                    ],
                    [
                        'name' => 'Meghalaya',
                        'description' => 'Explore the abode of clouds and living root bridges',
                        'image' => 'meghalaya.jpg',
                        'tags' => ['Nature', 'Adventure', 'Culture']
                    ],
                    [
                    ],
                    [
                        'name' => 'Rajasthan',
                        'description' => 'Discover royal heritage and desert culture',
                        'image' => 'rajasthan.jpg',
                        'tags' => ['Heritage', 'Culture', 'Desert']
                    ],
                    [
                        'name' => 'Kashmir',
                        'description' => 'Visit paradise on Earth',
                        'image' => 'kashmir.jpg',
                        'tags' => ['Nature', 'Mountains', 'Culture']
                    ],
                    [
                        'name' => 'Andaman',
                        'description' => 'Experience tropical paradise and water sports',
                        'image' => 'andaman.jpg',
                        'tags' => ['Beach', 'Adventure', 'Nature']
                    ]
                ];
                @endphp

                @foreach($domesticDestinations as $destination)
                    <x-destinations.card 
                        :name="$destination['name']"
                        :description="$destination['description']"
                        :image="$destination['image']"
                        :tags="$destination['tags']"
                    />
                @endforeach
            </div>
        </div>
    </section>

    <!-- Neighboring Countries -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-brandblue mb-12">Neighboring Destinations</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                $neighboringDestinations = [
                    [
                        'name' => 'Nepal',
                        'description' => 'Trek through the mighty Himalayas',
                        'image' => 'nepal.jpg',
                        'tags' => ['Mountains', 'Adventure', 'Culture']
                    ],
                    [
                        'name' => 'Bhutan',
                        'description' => 'Experience the last Shangri-La',
                        'image' => 'bhutan.jpg',
                        'tags' => ['Culture', 'Buddhism', 'Nature']
                    ],
                    [
                        'name' => 'Sri Lanka',
                        'description' => 'Discover the pearl of Indian Ocean',
                        'image' => 'srilanka.jpg',
                        'tags' => ['Beach', 'Heritage', 'Wildlife']
                    ]
                ];
                @endphp

                @foreach($neighboringDestinations as $destination)
                    <x-destinations.card 
                        :name="$destination['name']"
                        :description="$destination['description']"
                        :image="$destination['image']"
                        :tags="$destination['tags']"
                    />
                @endforeach
            </div>
        </div>
    </section>
@endsection
