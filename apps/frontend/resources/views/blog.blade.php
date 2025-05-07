@extends('layouts.app')

@section('title', 'Blog - Holidayz Manager')

@section('meta_description', 'Explore travel tips, destination guides, and insider insights about India\'s most beautiful locations on the Holidayz Manager blog.')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-brandblue/5 via-white to-saffron/10 overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-brandblue mb-6">
                    Travel Stories & Insights
                </h1>
                <p class="text-lg md:text-xl text-gray-700 leading-relaxed mb-8">
                    Discover travel tips, destination guides, and insider insights about India's most beautiful locations.
                </p>
            </div>
        </div>
    </section>

    <!-- Category Filter -->
    <section class="py-8 bg-white border-b">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap gap-4 justify-center">
                @foreach(['All', 'Travel Tips', 'Destinations', 'Culture', 'Food & Cuisine', 'Adventure'] as $category)
                    <button 
                        class="px-6 py-2 rounded-full text-brandblue hover:text-white hover:bg-brandblue transition-colors duration-300 {{ $category === 'All' ? 'bg-brandblue text-white' : 'bg-brandblue/10' }}"
                    >
                        {{ $category }}
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Post -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 overflow-hidden shadow-soft group">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Image -->
                    <div class="relative h-64 md:h-full overflow-hidden">
                        <img 
                            src="{{ asset('images/blog/featured-post.jpg') }}" 
                            alt="The Ultimate Guide to Exploring Kerala's Backwaters" 
                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500"
                            loading="lazy"
                            decoding="async"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent md:bg-gradient-to-r"></div>
                        <div class="absolute bottom-4 left-4 right-4 md:hidden">
                            <div class="flex flex-wrap gap-2">
                                <span class="bg-white/90 backdrop-blur-sm px-4 py-1.5 rounded-full text-sm font-medium text-brandblue shadow-soft">
                                    Featured
                                </span>
                                <span class="bg-white/90 backdrop-blur-sm px-4 py-1.5 rounded-full text-sm font-medium text-brandblue shadow-soft">
                                    Destinations
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-8 flex flex-col justify-center">
                        <div class="hidden md:flex flex-wrap gap-2 mb-4">
                            <span class="bg-brandblue/10 px-4 py-1.5 rounded-full text-sm font-medium text-brandblue">
                                Featured
                            </span>
                            <span class="bg-brandblue/10 px-4 py-1.5 rounded-full text-sm font-medium text-brandblue">
                                Destinations
                            </span>
                        </div>
                        <h2 class="text-3xl font-bold text-brandblue mb-4">
                            The Ultimate Guide to Exploring Kerala's Backwaters
                        </h2>
                        <p class="text-gray-700 mb-6">
                            Discover the serene beauty of Kerala's backwaters, from luxury houseboats to hidden villages. 
                            Learn insider tips for planning the perfect backwater cruise and immersing yourself in local culture.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <img 
                                    src="{{ asset('images/authors/priya-singh.jpg') }}" 
                                    alt="Priya Singh"
                                    class="w-12 h-12 rounded-full border-2 border-saffron"
                                    loading="lazy"
                                    decoding="async"
                                >
                                <div>
                                    <p class="font-medium text-brandblue">Priya Singh</p>
                                    <p class="text-sm text-gray-600">May 5, 2025</p>
                                </div>
                            </div>
                            <a 
                                href="#" 
                                class="inline-flex items-center gap-2 px-6 py-3 bg-saffron text-white rounded-xl hover:bg-brandblue transition-colors duration-300"
                            >
                                Read More
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Posts Grid -->
    <section class="py-16 bg-gradient-to-br from-saffron/10 via-white to-brandblue/5">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach([
                    [
                        'title' => '10 Must-Visit Temples in Tamil Nadu',
                        'excerpt' => 'Explore the architectural marvels and spiritual significance of Tamil Nadu\'s most iconic temples.',
                        'image' => 'tamil-temples.jpg',
                        'categories' => ['Culture', 'Heritage'],
                        'author' => ['name' => 'Rajesh Kumar', 'avatar' => 'rajesh-kumar.jpg'],
                        'date' => 'May 4, 2025'
                    ],
                    [
                        'title' => 'A Food Lover\'s Guide to Delhi\'s Street Food',
                        'excerpt' => 'Dive into the flavors of Delhi with our comprehensive guide to the city\'s best street food spots.',
                        'image' => 'delhi-food.jpg',
                        'categories' => ['Food & Cuisine'],
                        'author' => ['name' => 'Meera Shah', 'avatar' => 'meera-shah.jpg'],
                        'date' => 'May 3, 2025'
                    ],
                    [
                        'title' => 'Trekking in the Western Ghats: A Beginner\'s Guide',
                        'excerpt' => 'Everything you need to know about planning your first trek in the beautiful Western Ghats.',
                        'image' => 'western-ghats.jpg',
                        'categories' => ['Adventure', 'Travel Tips'],
                        'author' => ['name' => 'Amit Patel', 'avatar' => 'amit-patel.jpg'],
                        'date' => 'May 2, 2025'
                    ],
                    [
                        'title' => 'Luxury Train Journeys Across Rajasthan',
                        'excerpt' => 'Experience the royal heritage of Rajasthan aboard India\'s most luxurious trains.',
                        'image' => 'rajasthan-train.jpg',
                        'categories' => ['Luxury', 'Travel Tips'],
                        'author' => ['name' => 'Priya Singh', 'avatar' => 'priya-singh.jpg'],
                        'date' => 'May 1, 2025'
                    ],
                    [
                        'title' => 'Hidden Beaches of the Andaman Islands',
                        'excerpt' => 'Discover secluded paradise beaches away from the tourist crowds in the Andaman Islands.',
                        'image' => 'andaman-beaches.jpg',
                        'categories' => ['Destinations', 'Adventure'],
                        'author' => ['name' => 'Rajesh Kumar', 'avatar' => 'rajesh-kumar.jpg'],
                        'date' => 'April 30, 2025'
                    ],
                    [
                        'title' => 'Monsoon Magic: Best Places to Visit During Rainy Season',
                        'excerpt' => 'Plan your perfect monsoon getaway with our guide to India\'s most beautiful rainy season destinations.',
                        'image' => 'monsoon.jpg',
                        'categories' => ['Destinations', 'Travel Tips'],
                        'author' => ['name' => 'Meera Shah', 'avatar' => 'meera-shah.jpg'],
                        'date' => 'April 29, 2025'
                    ]
                ] as $post)
                    <x-blog.card :post="$post" />
                @endforeach
            </div>

            <!-- Load More -->
            <div class="text-center mt-12">
                <button class="px-8 py-4 bg-brandblue text-white rounded-xl hover:bg-saffron transition-colors duration-300">
                    Load More Posts
                </button>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-brandblue mb-6">Stay Updated</h2>
                <p class="text-lg text-gray-700 mb-8">
                    Subscribe to our newsletter for the latest travel tips, destination guides, and exclusive offers.
                </p>
                <form class="flex flex-col sm:flex-row gap-4 justify-center">
                    <input 
                        type="email" 
                        placeholder="Enter your email address" 
                        class="px-6 py-4 rounded-xl border border-gray-300 focus:ring-2 focus:ring-brandblue focus:border-transparent flex-1 max-w-md"
                        required
                    >
                    <button 
                        type="submit" 
                        class="px-8 py-4 bg-saffron text-white font-bold rounded-xl hover:bg-brandblue transition-colors duration-300 whitespace-nowrap"
                    >
                        Subscribe Now
                    </button>
                </form>
            </div>
        </div>
    </section>

    <div class="container mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold mb-8">Travel Blog</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($blogImages as $image)
                <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                    <img src="{{ $image }}" alt="Blog Post" class="w-full h-32 object-cover rounded-md mb-3" loading="lazy" />
                    <div class="font-semibold text-lg text-gray-800 mb-1">Travel Story</div>
                    <div class="text-gray-500 text-sm mb-2">Get inspired for your next journey</div>
                    <a href="#" class="text-brandblue font-medium hover:underline">Read More</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
