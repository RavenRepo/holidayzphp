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

    <div class="container mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold mb-8">More Destinations to Explore</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($destinationImages as $index => $image)
                <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                    <img src="{{ $image }}" alt="Destination {{ $index + 1 }}" class="w-full h-40 object-cover rounded-md mb-3" loading="lazy" />
                    <div class="font-semibold text-lg text-gray-800 mb-1">Popular Destination {{ $index + 1 }}</div>
                    <div class="text-gray-500 text-sm mb-2">Explore this amazing location</div>
                    <a href="#" class="text-brandblue font-medium hover:underline">View Details</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
