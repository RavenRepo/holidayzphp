@extends('layouts.app')

@section('title', 'Holidayz Manager - Your Premier Travel Partner in India')

@section('content')
    {{-- Hero Carousel Section --}}
    <x-home.hero-carousel :carousel-images="$carouselImages" />
    
    {{-- Popular Destinations Section --}}
    <x-home.popular-packages :destinations="$destinations" />
    
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
    <x-home.blog-inspirations :inspiration-images="$inspirationImages" />
    
    {{-- CTA Section --}}
    <x-home.cta-section />
    
    {{-- Benefits Section --}}
    <x-home.benefits-section :benefit-images="$benefitImages" />
    
    {{-- Lead Capture Form --}}
    <x-home.lead-form />
@endsection 