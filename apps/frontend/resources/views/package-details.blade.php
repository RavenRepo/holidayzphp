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
                    <x-package.gallery :images="$galleryImages" />
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

                <!-- About Malaysia Section -->
                <div>
                    <h2 class="text-3xl font-bold text-brandblue mb-8">About Malaysia</h2>
                    
                    <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft hover:shadow-lg transition-all duration-300 p-8">
                        <h3 class="text-2xl font-bold text-brandblue mb-4">Discover the Diverse Charm of Malaysia</h3>
                        <p class="text-gray-700 text-lg mb-6 leading-relaxed">
                            Tucked away in the heart of Southeast Asia, Malaysia is a vibrant and eclectic country that
                            seamlessly blends tradition with modernity. This captivating nation is a treasure trove of
                            experiences, waiting to be uncovered by intrepid travelers.
                        </p>
                        
                        <!-- Malaysia at a Glance -->
                        <div class="mb-8">
                            <h4 class="text-xl font-bold text-brandblue mb-3">Malaysia at a Glance</h4>
                            <p class="text-gray-700 leading-relaxed">
                                Malaysia is a federal constitutional monarchy, comprising 13 states and three federal territories.
                                The country shares borders with Thailand, Indonesia, and Brunei, and is divided into two main
                                landmasses: Peninsular Malaysia and East Malaysia. With a population of over 32 million,
                                Malaysia is a melting pot of cultures, religions, and ethnicities.
                            </p>
                        </div>
                        
                        <!-- Must-Visit Destinations -->
                        <div class="mb-8">
                            <h4 class="text-xl font-bold text-brandblue mb-3">Must-Visit Destinations</h4>
                            <p class="text-gray-700 mb-3">
                                Malaysia is home to a diverse array of attractions that cater to all interests and ages. Some of
                                the top draws include:
                            </p>
                            <ul class="space-y-2 text-gray-700 ml-6 list-decimal">
                                <li><span class="font-semibold">Petronas Twin Towers:</span> The iconic 88-story skyscrapers in Kuala Lumpur, the capital city.</li>
                                <li><span class="font-semibold">Batu Caves:</span> A series of limestone caves and temples in Kuala Lumpur, revered by Hindus.</li>
                                <li><span class="font-semibold">Taman Negara National Park:</span> A 130-million-year-old rainforest in Pahang, perfect for jungle treks and wildlife spotting.</li>
                                <li><span class="font-semibold">George Town:</span> The colorful, UNESCO-listed city in Penang, known for its street art, hawker centers, and colonial architecture.</li>
                                <li><span class="font-semibold">Sipadan Island:</span> A world-renowned diving destination off the coast of Sabah, Borneo.</li>
                            </ul>
                        </div>
                        
                        <!-- Essential Travel Information -->
                        <div class="mb-8">
                            <h4 class="text-xl font-bold text-brandblue mb-3">Essential Travel Information</h4>
                            <ul class="space-y-2 text-gray-700 ml-6 list-disc">
                                <li><span class="font-semibold">Language:</span> Malay (official), English, Chinese, Tamil, and indigenous languages.</li>
                                <li><span class="font-semibold">Currency:</span> Malaysian Ringgit (MYR).</li>
                                <li><span class="font-semibold">Religion:</span> Islam (official), Buddhism, Christianity, Hinduism, and Sikhism.</li>
                                <li><span class="font-semibold">Best Time to Travel:</span> December to February (cool season) and June to August (dry season).</li>
                                <li><span class="font-semibold">Cities:</span> Kuala Lumpur (capital), George Town (Penang), Malacca City, Kota Kinabalu (Sabah), and Kuching (Sarawak).</li>
                            </ul>
                        </div>
                        
                        <!-- What Defines Malaysia? -->
                        <div class="mb-8">
                            <h4 class="text-xl font-bold text-brandblue mb-3">What Defines Malaysia?</h4>
                            <p class="text-gray-700 leading-relaxed">
                                Malaysia is often described as a "food paradise," with its diverse culinary landscape reflecting
                                the country's multicultural heritage. From spicy Malay curries to Chinese dim sum, Indian
                                banana leaf rice, and Nyonya cuisine, the options are endless. The country's vibrant festivals,
                                such as the Hari Raya Aidilfitri and Thaipusam, also showcase its rich cultural tapestry.
                            </p>
                        </div>
                        
                        <!-- Why Malaysia? -->
                        <div>
                            <h4 class="text-xl font-bold text-brandblue mb-3">Why Malaysia?</h4>
                            <p class="text-gray-700 mb-3">
                                Malaysia offers a unique blend of urban excitement, natural wonders, and cultural richness,
                                making it an attractive destination for travelers. With its:
                            </p>
                            <ul class="space-y-2 text-gray-700 ml-6 list-disc mb-4">
                                <li>Welcoming locals and diverse communities</li>
                                <li>Delicious and varied cuisine</li>
                                <li>Rich cultural heritage and festivals</li>
                                <li>Modern cities and colonial towns</li>
                                <li>Pristine beaches, rainforests, and mountains</li>
                                <li>Affordable prices and excellent infrastructure</li>
                                <li>Activities like KL Tower, Sunway Lagoon, Legoland and Langkawi</li>
                            </ul>
                            <p class="text-gray-700 leading-relaxed">
                                Malaysia is an ideal destination for families, couples, backpackers, and luxury travelers alike. So
                                come and experience the warm Malaysian hospitality, and discover the many wonders that this
                                incredible country has to offer!
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Itinerary -->
                <div>
                    <h2 class="text-3xl font-bold text-brandblue mb-8">Detailed Itinerary</h2>
                    
                    <!-- Itinerary Options -->
                    <div class="space-y-6">
                        @foreach($package['itinerary'] as $index => $itinerary)
                            <div x-data="{ open: {{ $index === 0 ? 'true' : 'false' }} }" class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft hover:shadow-md transition-all duration-300 overflow-hidden">
                                <div @click="open = !open" class="p-6 flex justify-between items-center cursor-pointer">
                                    <div>
                                        <h3 class="text-xl font-bold text-brandblue">{{ $itinerary['title'] }}</h3>
                                        <p class="text-gray-600 mt-1">{{ $itinerary['description'] }}</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-brandblue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-brandblue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                                        </svg>
                                    </div>
                                </div>
                                
                                <div x-show="open" class="px-6 pb-6">
                                    <div class="border-t border-gray-200 pt-4">
                                        <ul class="space-y-4 mt-4">
                                            @foreach($itinerary['activities'] as $activity)
                                                <li class="flex items-start gap-4">
                                                    <span class="text-saffron text-xl flex-shrink-0">•</span>
                                                    <span class="text-gray-700">{{ $activity }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <!-- Itinerary Images -->
                    <div class="mt-12">
                        <h3 class="text-2xl font-bold text-brandblue mb-6">Itinerary Highlights</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($itineraryImages as $image)
                                <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                                    <img src="{{ $image }}" alt="Itinerary Highlight" class="w-full h-32 object-cover rounded-md mb-3" loading="lazy" />
                                    <div class="font-semibold text-lg text-gray-800 mb-1">Itinerary Highlight</div>
                                    <div class="text-gray-500 text-sm mb-2">Experience this on your trip</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
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

    <!-- Available Packages Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-brandblue mb-4">Available Packages for {{ $package['name'] }}</h2>
                <p class="text-gray-600">Choose from our curated packages designed to give you the best {{ $package['name'] }} experience at the best prices.</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($destinationPackages as $packageItem)
                    <x-package.card :package="$packageItem" />
                @endforeach
            </div>
        </div>
    </section>

    <!-- Curated Destinations Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-brandblue mb-4">Explore Our Curated Destinations</h2>
                <p class="text-gray-600">Discover more breathtaking destinations for your next adventure</p>
            </div>
            
            @if(count($relatedDestinations) > 0)
                <div class="relative">
                    <div class="curated-destinations-carousel">
                        @foreach($relatedDestinations as $destination)
                            <div class="px-2">
                                <div class="bg-white rounded-lg shadow-md overflow-hidden h-full flex flex-col">
                                    <div class="relative h-48 overflow-hidden">
                                        <img 
                                            src="{{ $destination['image'] }}" 
                                            alt="{{ $destination['name'] }}" 
                                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
                                            loading="lazy"
                                        >
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                        <h3 class="absolute bottom-4 left-4 text-white text-xl font-bold">{{ $destination['name'] }}</h3>
                                    </div>
                                    <div class="p-4 flex-grow">
                                        <p class="text-gray-600 mb-4">{{ $destination['description'] }}</p>
                                        <a href="/package/{{ $destination['slug'] }}" class="text-brandblue hover:text-brandblue-dark font-medium inline-flex items-center">
                                            Explore packages
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="text-center py-8">
                    <p class="text-gray-500">No related destinations available at the moment.</p>
                </div>
            @endif
        </div>
    </section>

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

@push('styles')
<style>
    /* Curated Destinations Carousel Styles */
    .curated-destinations-carousel .slick-track {
        display: flex !important;
        margin-left: 0;
        margin-right: 0;
    }
    
    .curated-destinations-carousel .slick-slide {
        height: inherit;
        padding: 0 10px;
    }
    
    .curated-destinations-carousel .slick-slide > div {
        height: 100%;
    }
    
    .curated-destinations-carousel .slick-dots {
        bottom: -35px;
    }
    
    .curated-destinations-carousel .slick-dots li button:before {
        font-size: 10px;
        color: #DEE2E6;
        opacity: 1;
    }
    
    .curated-destinations-carousel .slick-dots li.slick-active button:before {
        color: #0056B3;
    }
    
    .curated-destinations-carousel .slick-prev,
    .curated-destinations-carousel .slick-next {
        width: 40px;
        height: 40px;
        background-color: white;
        border-radius: 50%;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        z-index: 10;
    }
    
    .curated-destinations-carousel .slick-prev {
        left: -20px;
    }
    
    .curated-destinations-carousel .slick-next {
        right: -20px;
    }
    
    .curated-destinations-carousel .slick-prev:before,
    .curated-destinations-carousel .slick-next:before {
        color: #0056B3;
        opacity: 1;
    }
    
    .curated-destinations-carousel .slick-prev:hover,
    .curated-destinations-carousel .slick-next:hover {
        background-color: #0056B3;
    }
    
    .curated-destinations-carousel .slick-prev:hover:before,
    .curated-destinations-carousel .slick-next:hover:before {
        color: white;
    }
    
    @media (max-width: 768px) {
        .curated-destinations-carousel .slick-prev {
            left: 10px;
        }
        
        .curated-destinations-carousel .slick-next {
            right: 10px;
        }
    }
</style>
@endpush
