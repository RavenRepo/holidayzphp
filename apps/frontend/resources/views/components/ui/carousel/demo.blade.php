@extends('layouts.app')

@section('title', 'Slick Carousel Demo')

@section('content')
    <x-ui.layout.page-heading>
        Slick Carousel Component
        <x-slot:subtitle>A reusable, responsive carousel component for Holidayz Manager</x-slot:subtitle>
    </x-ui.layout.page-heading>

    <x-ui.layout.section class="mb-12">
        <h2 class="text-2xl font-bold mb-4">Basic Carousel</h2>
        <p class="mb-6">A simple carousel with default settings (3 slides per view, arrows and dots navigation).</p>
        
        <x-ui.carousel.slick class="mb-12">
            <x-ui.carousel.slide 
                image="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                alt="Beach hotel"
                title="Beach Resort Package"
                subtitle="Goa, India | 5 Days"
                link="#"
            >
                <p class="text-sm text-gray-700">Experience the pristine beaches and wonderful culture of Goa.</p>
            </x-ui.carousel.slide>
            
            <x-ui.carousel.slide 
                image="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                alt="Mountain retreat"
                title="Mountain Getaway"
                subtitle="Manali, India | 4 Days"
                link="#"
            >
                <p class="text-sm text-gray-700">Escape to the snow-capped peaks and scenic beauty of Manali.</p>
            </x-ui.carousel.slide>
            
            <x-ui.carousel.slide 
                image="https://images.unsplash.com/photo-1528872042734-8f50f9d3c59b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                alt="City tour"
                title="City Explorer Package"
                subtitle="Delhi, India | 3 Days"
                link="#"
            >
                <p class="text-sm text-gray-700">Discover historical monuments and cultural hotspots in Delhi.</p>
            </x-ui.carousel.slide>
            
            <x-ui.carousel.slide 
                image="https://images.unsplash.com/photo-1517911041065-4960862d38f0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                alt="Island resort"
                title="Island Paradise"
                subtitle="Andaman, India | 6 Days"
                link="#"
            >
                <p class="text-sm text-gray-700">Relax on pristine beaches and enjoy world-class scuba diving.</p>
            </x-ui.carousel.slide>
            
            <x-ui.carousel.slide 
                image="https://images.unsplash.com/photo-1571536802807-30451e3955d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                alt="Wildlife safari"
                title="Wildlife Safari Adventure"
                subtitle="Ranthambore, India | 4 Days"
                link="#"
            >
                <p class="text-sm text-gray-700">Experience the thrill of spotting tigers and other wildlife in their natural habitat.</p>
            </x-ui.carousel.slide>
        </x-ui.carousel.slick>
    </x-ui.layout.section>

    <x-ui.layout.section class="mb-12">
        <h2 class="text-2xl font-bold mb-4">Autoplay Carousel</h2>
        <p class="mb-6">A carousel with autoplay enabled and only 1 slide visible at a time.</p>
        
        <x-ui.carousel.slick 
            :autoplay="true" 
            :autoplaySpeed="2000" 
            :pauseOnHover="true"
            :slidesToShow="1"
            class="mb-12"
        >
            <x-ui.carousel.slide 
                image="https://images.unsplash.com/photo-1544161513-0179fe746fd5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                alt="Kerala backwaters"
                title="Kerala Backwaters"
                subtitle="Kerala, India | 5 Days"
                link="#"
            >
                <p class="text-sm text-gray-700">Cruise through peaceful backwaters on a traditional houseboat.</p>
            </x-ui.carousel.slide>
            
            <x-ui.carousel.slide 
                image="https://images.unsplash.com/photo-1563911302283-d2bc129e7570?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                alt="Rajasthan palace"
                title="Royal Rajasthan Tour"
                subtitle="Jaipur, India | 7 Days"
                link="#"
            >
                <p class="text-sm text-gray-700">Explore magnificent palaces and experience royal hospitality.</p>
            </x-ui.carousel.slide>
            
            <x-ui.carousel.slide 
                image="https://images.unsplash.com/photo-1580188643027-a19a0a6c03dc?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                alt="Taj Mahal"
                title="Taj Mahal Experience"
                subtitle="Agra, India | 2 Days"
                link="#"
            >
                <p class="text-sm text-gray-700">Witness the breathtaking beauty of the iconic Taj Mahal.</p>
            </x-ui.carousel.slide>
        </x-ui.carousel.slick>
    </x-ui.layout.section>
    
    <x-ui.layout.section class="mb-12">
        <h2 class="text-2xl font-semibold mb-4">Usage</h2>
        
        <div class="bg-gray-100 p-6 rounded-lg mb-6">
            <h3 class="text-lg font-medium mb-4">Carousel Component</h3>
            <pre class="bg-gray-800 text-white p-4 rounded-md overflow-x-auto text-sm whitespace-pre-wrap">
&lt;x-ui.carousel.slick
    :dots="true|false"
    :arrows="true|false"
    :infinite="true|false"
    :speed="500"
    :slidesToShow="3"
    :slidesToScroll="1"
    :autoplay="false|true"
    :autoplaySpeed="3000"
    :pauseOnHover="true|false"
    :centerMode="false|true"
    :fade="false|true"&gt;
    
    &lt;!-- Slides go here --&gt;

&lt;/x-ui.carousel.slick&gt;
            </pre>
            
            <h3 class="text-lg font-medium mt-8 mb-4">Slide Component</h3>
            <pre class="bg-gray-800 text-white p-4 rounded-md overflow-x-auto text-sm whitespace-pre-wrap">
&lt;x-ui.carousel.slide
    image="path/to/image.jpg"
    alt="Image description"
    title="Slide Title"
    subtitle="Optional subtitle"
    link="/link/to/details"
    linkText="View Details"&gt;
    
    &lt;!-- Optional additional content --&gt;
    &lt;p&gt;Custom content goes here&lt;/p&gt;
    
&lt;/x-ui.carousel.slide&gt;
            </pre>
        </div>
    </x-ui.layout.section>
@endsection 