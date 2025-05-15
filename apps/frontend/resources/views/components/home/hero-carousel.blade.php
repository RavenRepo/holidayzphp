@props(['slides' => [], 'carouselImages' => []])

<div class="relative w-full h-80 md:h-96 overflow-hidden rounded-xl">
    <div class="absolute inset-0 z-10 bg-gradient-to-r from-black/40 to-transparent"></div>
    <div class="w-full h-full">
        <div class="w-full h-full flex">
            @foreach ($carouselImages as $image)
                <img src="{{ $image }}" alt="Travel Carousel" class="object-cover w-full h-full transition-opacity duration-700" loading="lazy" />
            @endforeach
        </div>
    </div>
</div>

<style>
    .homepage-hero-carousel .slick-dots {
        bottom: 80px;
    }
    
    .homepage-hero-carousel .slick-dots li button:before {
        color: white;
        opacity: 0.7;
        font-size: 12px;
    }
    
    .homepage-hero-carousel .slick-dots li.slick-active button:before {
        color: #FF9933;
        opacity: 1;
    }
    
    .animate-fadeInUp {
        animation: fadeInUp 0.8s ease-out forwards;
    }
    
    .animation-delay-200 {
        animation-delay: 0.2s;
    }
    
    .animation-delay-400 {
        animation-delay: 0.4s;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style> 