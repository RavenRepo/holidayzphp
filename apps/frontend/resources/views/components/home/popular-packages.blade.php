@props(['packages' => []])

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Popular Packages</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Discover our most loved travel experiences handpicked for unforgettable journeys</p>
        </div>
        
        <x-ui.carousel.slick 
            :slidesToShow="3"
            :slidesToScroll="1"
            :autoplay="true"
            :autoplaySpeed="3000"
            :dots="true"
            :arrows="true"
            class="popular-packages-carousel"
        >
            @foreach($packages as $package)
                <div class="px-3">
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:shadow-xl hover:-translate-y-2">
                        <div class="relative">
                            <img 
                                src="{{ $package['image'] }}" 
                                alt="{{ $package['title'] }}" 
                                class="w-full h-60 object-cover"
                            >
                            @if(isset($package['discount']) && $package['discount'] > 0)
                                <div class="absolute top-4 right-4 bg-saffron text-white text-sm font-bold px-3 py-1 rounded-full">
                                    {{ $package['discount'] }}% OFF
                                </div>
                            @endif
                            <div class="absolute top-4 left-4 bg-white bg-opacity-90 px-3 py-1 rounded text-sm font-medium text-gray-800">
                                {{ $package['duration'] }} Days
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-2">
                                <div class="text-yellow-400 flex">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $package['rating'])
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                                <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 24 24">
                                                <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-sm text-gray-500 ml-1">({{ $package['reviewCount'] }} reviews)</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $package['title'] }}</h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $package['description'] }}</p>
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-sm text-gray-500">From</span>
                                    <p class="text-2xl font-bold text-brandblue">₹{{ number_format($package['price']) }}</p>
                                </div>
                                <a href="{{ $package['link'] }}" class="px-4 py-2 bg-brandblue text-white rounded hover:bg-brandblue/90 transition duration-300">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </x-ui.carousel.slick>
    </div>
</section>

<style>
    .popular-packages-carousel .slick-track {
        padding: 20px 0;
    }
    
    .popular-packages-carousel .slick-dots {
        bottom: -40px;
    }
</style> 