@extends('layouts.app')

@section('title', 'Holidayz Manager - Your Premier Travel Partner in India')

@section('content')
    {{-- Hero Carousel Section --}}
    <x-home.hero-carousel :slides="[
        [
            'image' => 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
            'title' => 'Discover the Magic of India',
            'subtitle' => 'Explore ancient wonders, vibrant cultures, and breathtaking landscapes',
            'button' => [
                'text' => 'Start Your Journey',
                'link' => '/packages'
            ]
        ],
        [
            'image' => 'https://images.unsplash.com/photo-1598091383021-15ddea10925d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
            'title' => 'Rajasthan: Land of Kings',
            'subtitle' => 'Immerse yourself in royal heritage, colorful festivals, and desert adventures',
            'button' => [
                'text' => 'Explore Rajasthan',
                'link' => '/packages/rajasthan'
            ]
        ],
        [
            'image' => 'https://images.unsplash.com/photo-1591017683260-5ef06d8be2e3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
            'title' => 'Kerala: God\'s Own Country',
            'subtitle' => 'Unwind in the tranquil backwaters, lush hills, and pristine beaches',
            'button' => [
                'text' => 'Discover Kerala',
                'link' => '/packages/kerala'
            ]
        ],
        [
            'image' => 'https://images.unsplash.com/photo-1546320831-5213fa166c64?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
            'title' => 'Himalayan Escapes',
            'subtitle' => 'Find peace and adventure in the majestic mountains of North India',
            'button' => [
                'text' => 'Mountain Getaways',
                'link' => '/packages/himalayas'
            ]
        ],
        [
            'image' => 'https://images.unsplash.com/photo-1570168866149-be9a4817f6a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
            'title' => 'Goa: Sun, Sand & Serenity',
            'subtitle' => 'Experience the perfect blend of beaches, culture, and vibrant nightlife',
            'button' => [
                'text' => 'Beach Holidays',
                'link' => '/packages/goa'
            ]
        ],
    ]" />
    
    {{-- Popular Packages Section --}}
    <x-home.popular-packages :packages="[
        [
            'image' => 'https://images.unsplash.com/photo-1586612438666-ffd0ae97ad36?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'title' => 'Golden Triangle Tour',
            'description' => 'Experience the cultural heritage of Delhi, Agra, and Jaipur in this iconic Indian journey.',
            'duration' => '6',
            'price' => 24999,
            'rating' => 4.8,
            'reviewCount' => 145,
            'discount' => 15,
            'link' => '/packages/golden-triangle'
        ],
        [
            'image' => 'https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'title' => 'Kerala Backwaters & Beaches',
            'description' => 'Cruise on houseboats, relax on pristine beaches, and rejuvenate with Ayurvedic treatments.',
            'duration' => '7',
            'price' => 32999,
            'rating' => 4.9,
            'reviewCount' => 210,
            'discount' => 12,
            'link' => '/packages/kerala-bliss'
        ],
        [
            'image' => 'https://images.unsplash.com/photo-1564507004663-b6dfb3c824d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'title' => 'Goa Beach Getaway',
            'description' => 'Soak up the sun on beautiful beaches, enjoy water sports, and experience Goa\'s vibrant nightlife.',
            'duration' => '5',
            'price' => 18999,
            'rating' => 4.7,
            'reviewCount' => 189,
            'link' => '/packages/goa-beach'
        ],
        [
            'image' => 'https://images.unsplash.com/photo-1588285556203-c1f0666ceec0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'title' => 'Himachal Adventure',
            'description' => 'Trek through scenic trails, camp under stars, and experience thrilling adventure sports.',
            'duration' => '8',
            'price' => 29999,
            'rating' => 4.6,
            'reviewCount' => 156,
            'discount' => 10,
            'link' => '/packages/himachal-adventure'
        ],
        [
            'image' => 'https://images.unsplash.com/photo-1629412503383-98613e64e365?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'title' => 'Royal Rajasthan Tour',
            'description' => 'Explore magnificent forts and palaces, experience desert safaris, and enjoy cultural performances.',
            'duration' => '9',
            'price' => 36999,
            'rating' => 4.8,
            'reviewCount' => 176,
            'link' => '/packages/royal-rajasthan'
        ],
    ]" />
    
    {{-- Visa Free Destinations Section --}}
    <x-home.visa-free-destinations />
    
    {{-- Why Choose Us Section --}}
    @php
    $whyChooseUsFeatures = [
        [
            'icon' => '<svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>',
            'title' => 'Personalized Service',
            'description' => 'We tailor each trip to your preferences, ensuring a unique and memorable experience.'
        ],
        [
            'icon' => '',
            'title' => 'Best Value Guarantee',
            'description' => 'We offer competitive pricing without compromising on quality or experiences.'
        ],
        [
            'icon' => '',
            'title' => 'Local Expertise',
            'description' => 'Our team of local experts ensures authentic experiences and insider knowledge.'
        ],
        [
            'icon' => '',
            'title' => '24/7 Support',
            'description' => 'Dedicated support throughout your journey for a worry-free travel experience.'
        ],
    ];
    @endphp
    <x-ui.why-choose-us.why-choose-us :features="$whyChooseUsFeatures" />
    
    {{-- Testimonials Section --}}
    <x-home.testimonials :testimonials="[
        [
            'avatar' => 'https://randomuser.me/api/portraits/women/32.jpg',
            'name' => 'Priya Sharma',
            'location' => 'Mumbai',
            'rating' => 5,
            'text' => 'Our family trip to Rajasthan was absolutely perfect! Every hotel, every tour guide, every experience was thoughtfully arranged. I particularly loved the personalized itinerary that catered to both my parents\' preference for culture and my children\'s need for fun activities.',
            'package' => 'Royal Rajasthan Adventure',
            'date' => 'December 2023'
        ],
        [
            'avatar' => 'https://randomuser.me/api/portraits/men/54.jpg',
            'name' => 'Rahul Mehta',
            'location' => 'Bangalore',
            'rating' => 5,
            'text' => 'The Kerala backwaters houseboat stay was the highlight of our honeymoon. Holidayz Manager arranged everything perfectly - from the airport pickup to the Ayurvedic spa treatments. Their attention to detail and little surprise elements made our trip truly special.',
            'package' => 'Kerala Romance Package',
            'date' => 'February 2024'
        ],
        [
            'avatar' => 'https://randomuser.me/api/portraits/women/65.jpg',
            'name' => 'Anjali Patel',
            'location' => 'Delhi',
            'rating' => 4,
            'text' => 'As a solo female traveler, safety was my primary concern. The team at Holidayz Manager ensured I felt secure throughout my journey across North East India. The local guides were knowledgeable and respectful, and the accommodations were exactly as described. Will definitely book with them again!',
            'package' => 'Northeast Explorer',
            'date' => 'October 2023'
        ],
    ]" />
    
    {{-- Blog/Inspirations Section --}}
    <x-home.blog-inspirations :posts="[
        [
            'image' => 'https://images.unsplash.com/photo-1548013146-72479768bada?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'title' => 'Top 10 Hidden Gems in India That Most Tourists Miss',
            'excerpt' => 'Discover lesser-known destinations that offer authentic experiences away from the crowds. From the pristine beaches of Gokarna to the living root bridges of Meghalaya...',
            'category' => 'Travel Tips',
            'date' => 'March 15, 2024',
            'readTime' => '7',
            'link' => '/blog/hidden-gems-india',
            'author' => [
                'name' => 'Vikram Nair',
                'avatar' => 'https://randomuser.me/api/portraits/men/32.jpg'
            ]
        ],
        [
            'image' => 'https://images.unsplash.com/photo-1551351731-7ab09b6bf5e5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'title' => 'A Culinary Journey Through India\'s Regional Cuisines',
            'excerpt' => 'From the fiery flavors of Andhra Pradesh to the subtle sweetness of Bengali dishes, this guide takes you through India\'s diverse culinary landscape...',
            'category' => 'Food & Culture',
            'date' => 'February 28, 2024',
            'readTime' => '9',
            'link' => '/blog/india-culinary-journey',
            'author' => [
                'name' => 'Meera Iyer',
                'avatar' => 'https://randomuser.me/api/portraits/women/44.jpg'
            ]
        ],
        [
            'image' => 'https://images.unsplash.com/photo-1585484173186-5f8b2a9b0544?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'title' => 'Sustainable Travel: Eco-Friendly Destinations in India',
            'excerpt' => 'Explore responsible tourism options in India. From organic farm stays in Sikkim to eco-villages in Gujarat, learn how to minimize your environmental footprint...',
            'category' => 'Eco Tourism',
            'date' => 'April 2, 2024',
            'readTime' => '6',
            'link' => '/blog/sustainable-india-travel',
            'author' => [
                'name' => 'Arjun Singh',
                'avatar' => 'https://randomuser.me/api/portraits/men/67.jpg'
            ]
        ],
    ]" />
    
    {{-- CTA Section --}}
    <x-home.cta-section />
    
    {{-- Benefits Section --}}
    <x-home.benefits-section />
    
    {{-- Lead Capture Form --}}
    <x-home.lead-form />
@endsection 