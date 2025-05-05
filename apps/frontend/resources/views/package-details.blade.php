@extends('layouts.app')

@section('title', $package['name'] . ' - Holidayz Manager')

@section('meta_description', $package['description'])

@section('content')
    <!-- Hero Section -->
    <section class="relative py-24 md:py-32 bg-gradient-to-br from-brandblue/5 via-white to-saffron/10 overflow-hidden">
        <div class="container mx-auto px-4 md:px-6 lg:px-8 max-w-7xl">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-brandblue mb-6 drop-shadow">
                    {{ $package['name'] }}
                </h1>
                <p class="text-lg md:text-xl text-gray-700 leading-relaxed max-w-3xl mx-auto">
                    {{ $package['description'] }}
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container mx-auto px-4 md:px-6 lg:px-8 max-w-7xl py-16 md:py-24">
        <div class="grid lg:grid-cols-3 gap-8 lg:gap-12">
            <!-- Left Content -->
            <div class="lg:col-span-2 space-y-20">
                <!-- Gallery -->
                <div>
                    <x-package.gallery :images="$package['images']" />
                </div>

                <!-- Overview -->
                <div>
                    <h2 class="text-3xl font-bold text-brandblue mb-8">Overview</h2>
                    <x-package.overview 
                        :duration="$package['duration']"
                        :price="$package['price']"
                        :highlights="$package['highlights']"
                    />
                </div>

                <!-- Itinerary -->
                <div>
                    <h2 class="text-3xl font-bold text-brandblue mb-8">Detailed Itinerary</h2>
                    <x-package.itinerary :days="$package['itinerary']" />
                </div>

                <!-- Inclusions & Exclusions -->
                <div>
                    <h2 class="text-3xl font-bold text-brandblue mb-8">What's Included</h2>
                    <x-package.inclusions-exclusions 
                        :inclusions="$package['inclusions']"
                        :exclusions="$package['exclusions']"
                    />
                </div>

                <!-- Reviews -->
                <div>
                    <h2 class="text-3xl font-bold text-brandblue mb-8">Guest Reviews</h2>
                    <x-package.reviews :reviews="$package['reviews']" />
                </div>

                <!-- FAQ -->
                <div>
                    <h2 class="text-3xl font-bold text-brandblue mb-8">Frequently Asked Questions</h2>
                    <x-package.faq :faqs="$package['faqs']" />
                </div>

                <!-- Related Blog Posts -->
                <div>
                    <h2 class="text-3xl font-bold text-brandblue mb-8">Travel Inspiration</h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        @foreach($package['related_posts'] as $post)
                            <x-blog.card :post="$post" />
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="lg:col-span-1">
                <x-package.enquiry-form :package_name="$package['name']" />
            </div>
        </div>
    </div>

    <!-- Counter CTA Section -->
    <section class="py-20 bg-gradient-to-br from-saffron/10 via-white to-brandblue/5">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-brandblue mb-8">
                    Why Choose Our {{ $package['name'] }} Package?
                </h2>
                <div class="grid md:grid-cols-4 gap-8">
                    <!-- Happy Customers -->
                    <div class="text-center">
                        <div class="text-4xl font-bold text-brandblue mb-2">2000+</div>
                        <p class="text-gray-600">Happy Customers</p>
                    </div>

                    <!-- Years Experience -->
                    <div class="text-center">
                        <div class="text-4xl font-bold text-brandblue mb-2">10+</div>
                        <p class="text-gray-600">Years Experience</p>
                    </div>

                    <!-- Destinations -->
                    <div class="text-center">
                        <div class="text-4xl font-bold text-brandblue mb-2">50+</div>
                        <p class="text-gray-600">Destinations</p>
                    </div>

                    <!-- Success Rate -->
                    <div class="text-center">
                        <div class="text-4xl font-bold text-brandblue mb-2">98%</div>
                        <p class="text-gray-600">Success Rate</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Initialize date picker with minimum date as today
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('travel_date').min = today;
    });
</script>
@endpush
