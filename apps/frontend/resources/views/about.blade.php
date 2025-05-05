@extends('layouts.app')

@section('title', 'About Us - Holidayz Manager')

@section('meta_description', 'Learn about Holidayz Manager, your trusted travel partner for curated packages and custom itineraries across India.')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-brandblue/5 via-white to-saffron/10 overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-brandblue mb-6 drop-shadow">
                    Your Trusted Travel Partner in India
                </h1>
                <p class="text-lg md:text-xl text-gray-700 leading-relaxed mb-8">
                    Discover the story behind Holidayz Manager and our passion for creating unforgettable travel experiences across India.
                </p>
            </div>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1">
                    <h2 class="text-3xl font-bold text-brandblue mb-6">Our Story</h2>
                    <div class="prose prose-lg max-w-none">
                        <p class="mb-4">
                            Founded in 2020, Holidayz Manager emerged from a simple yet powerful vision: to make exploring India's rich cultural heritage and diverse landscapes accessible to everyone.
                        </p>
                        <p class="mb-4">
                            What started as a small team of passionate travelers has grown into a trusted travel partner, helping thousands of visitors create memories that last a lifetime.
                        </p>
                        <p>
                            Our commitment to authentic experiences, attention to detail, and personalized service sets us apart in the travel industry.
                        </p>
                    </div>
                </div>
                <div class="order-1 md:order-2">
                    <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft p-4">
                        <img 
                            src="{{ asset('images/about/our-story.jpg') }}" 
                            alt="Team of travel experts at Holidayz Manager" 
                            class="w-full h-[400px] object-cover rounded-xl"
                            loading="lazy"
                            decoding="async"
                        >
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section class="py-16 bg-gradient-to-br from-saffron/10 via-white to-brandblue/5">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-brandblue text-center mb-12">Our Values</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Authenticity -->
                <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft hover:shadow-lg transition-all duration-300 p-6">
                    <div class="w-16 h-16 bg-brandblue/10 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-brandblue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brandblue mb-4">Authenticity</h3>
                    <p class="text-gray-700">We believe in showcasing the true essence of India, creating genuine connections with local communities.</p>
                </div>

                <!-- Excellence -->
                <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft hover:shadow-lg transition-all duration-300 p-6">
                    <div class="w-16 h-16 bg-brandblue/10 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-brandblue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brandblue mb-4">Excellence</h3>
                    <p class="text-gray-700">We strive for excellence in every detail, ensuring your journey exceeds expectations.</p>
                </div>

                <!-- Sustainability -->
                <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft hover:shadow-lg transition-all duration-300 p-6">
                    <div class="w-16 h-16 bg-brandblue/10 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-brandblue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brandblue mb-4">Sustainability</h3>
                    <p class="text-gray-700">We're committed to responsible tourism that benefits local communities and preserves India's natural beauty.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-brandblue text-center mb-12">Meet Our Team</h2>
            <div class="grid md:grid-cols-4 gap-8">
                @foreach([
                    ['name' => 'Rajesh Kumar', 'role' => 'Founder & CEO', 'image' => 'team-1.jpg'],
                    ['name' => 'Priya Singh', 'role' => 'Head of Operations', 'image' => 'team-2.jpg'],
                    ['name' => 'Amit Patel', 'role' => 'Travel Expert', 'image' => 'team-3.jpg'],
                    ['name' => 'Meera Shah', 'role' => 'Customer Experience', 'image' => 'team-4.jpg']
                ] as $member)
                <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft hover:shadow-lg transition-all duration-300 p-6 text-center">
                    <div class="w-32 h-32 mx-auto mb-6 rounded-full overflow-hidden border-4 border-saffron">
                        <img 
                            src="{{ asset('images/team/' . $member['image']) }}" 
                            alt="{{ $member['name'] }}" 
                            class="w-full h-full object-cover"
                            loading="lazy"
                            decoding="async"
                        >
                    </div>
                    <h3 class="text-xl font-bold text-brandblue mb-2">{{ $member['name'] }}</h3>
                    <p class="text-gray-600">{{ $member['role'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-br from-brandblue/5 via-white to-saffron/10">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-brandblue mb-6">Ready to Start Your Journey?</h2>
                <p class="text-lg text-gray-700 mb-8">
                    Let us help you create unforgettable memories across India's most beautiful destinations.
                </p>
                <a 
                    href="{{ route('contact') }}" 
                    class="inline-block px-8 py-4 bg-saffron text-white font-bold rounded-xl hover:bg-brandblue transition-colors duration-300"
                >
                    Contact Us Today
                </a>
            </div>
        </div>
    </section>
@endsection
