@props(['packages' => [], 'packageImages' => []])

<section class="py-20 bg-neutral-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-poppins font-bold text-brandblue mb-4">Popular Packages</h2>
            <p class="text-lg font-open-sans text-neutral-600 max-w-2xl mx-auto leading-relaxed">Discover our most loved travel experiences handpicked for unforgettable journeys</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($packageImages as $image)
                <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                    <img src="{{ $image }}" alt="Popular Package" class="w-full h-40 object-cover rounded-md mb-3" loading="lazy" />
                    <div class="font-semibold text-lg text-gray-800 mb-1">Holiday Package</div>
                    <div class="text-gray-500 text-sm mb-2">Explore this destination</div>
                    <a href="#" class="text-brandblue font-medium hover:underline">View Details</a>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="/packages" class="inline-flex items-center font-medium text-brandblue hover:text-brandblue-dark transition-colors duration-300">
                <span>View All Packages</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>
</section>

<style>
    .popular-packages-carousel .slick-track {
        display: flex !important;
        padding: 1rem 0;
    }
    
    .popular-packages-carousel .slick-slide {
        height: inherit !important;
        margin: 0 1rem;
    }
    
    .popular-packages-carousel .slick-slide > div {
        height: 100%;
    }
    
    .popular-packages-carousel .slick-dots {
        bottom: -3rem;
    }
    
    .popular-packages-carousel .slick-dots li button:before {
        font-size: 12px;
        color: #E5E7EB;
        opacity: 1;
    }
    
    .popular-packages-carousel .slick-dots li.slick-active button:before {
        color: #0056B3;
    }
    
    .popular-packages-carousel .slick-prev,
    .popular-packages-carousel .slick-next {
        width: 48px;
        height: 48px;
        background-color: white;
        border-radius: 50%;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        z-index: 10;
    }
    
    .popular-packages-carousel .slick-prev {
        left: -24px;
    }
    
    .popular-packages-carousel .slick-next {
        right: -24px;
    }
    
    .popular-packages-carousel .slick-prev:before,
    .popular-packages-carousel .slick-next:before {
        color: #0056B3;
        opacity: 1;
    }
    
    .popular-packages-carousel .slick-prev:hover,
    .popular-packages-carousel .slick-next:hover {
        background-color: #0056B3;
    }
    
    .popular-packages-carousel .slick-prev:hover:before,
    .popular-packages-carousel .slick-next:hover:before {
        color: white;
    }
    
    @media (max-width: 640px) {
        .popular-packages-carousel .slick-prev {
            left: 0;
        }
        
        .popular-packages-carousel .slick-next {
            right: 0;
        }
    }
</style> 