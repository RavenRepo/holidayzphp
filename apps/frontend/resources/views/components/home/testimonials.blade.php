@props(['testimonials' => []])

<section class="py-20 bg-gradient-to-br from-brandblue/5 via-white to-saffron/10" aria-labelledby="testimonials-title">
    <div class="container mx-auto px-4">
        {{-- Section Header --}}
        <div class="text-center mb-12">
            <h2 id="testimonials-title" class="text-3xl md:text-4xl font-bold text-brandblue mb-4 drop-shadow">
                What Our Customers Say
            </h2>
            <p class="text-lg text-gray-700 max-w-2xl mx-auto">
                Real experiences from travelers who explored India with us
            </p>
        </div>
        
        {{-- Testimonials Carousel --}}
        <x-ui.carousel.slick 
            id="testimonials-carousel"
            :slidesToShow="1"
            :slidesToScroll="1"
            :autoplay="true"
            :autoplaySpeed="5000"
            :dots="true"
            :arrows="true"
            :fade="false"
            :infinite="true"
            :speed="500"
            :adaptiveHeight="true"
            class="testimonials-carousel relative"
        >
            @foreach($testimonials as $testimonial)
                <div class="px-4">
                    <article class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 
                              shadow-soft hover:shadow-lg transition-all duration-300 
                              p-8 md:p-10 max-w-4xl mx-auto">
                        <div class="flex flex-col md:flex-row items-center">
                            {{-- Avatar Section --}}
                            <div class="md:w-1/3 mb-6 md:mb-0 md:pr-8">
                                <div class="w-24 h-24 md:w-32 md:h-32 mx-auto rounded-full overflow-hidden border-4 border-saffron">
                                    <img 
                                        src="{{ $testimonial['avatar'] }}" 
                                        alt="{{ $testimonial['name'] }}" 
                                        class="w-full h-full object-cover"
                                        loading="lazy"
                                        decoding="async"
                                    >
                                </div>
                                <div class="text-center mt-4">
                                    <h3 class="text-xl font-bold text-gray-800">{{ $testimonial['name'] }}</h3>
                                    <p class="text-gray-600 text-sm">{{ $testimonial['location'] }}</p>
                                    {{-- Star Rating --}}
                                    <div class="text-yellow-400 flex justify-center mt-2" aria-label="{{ $testimonial['rating'] }} out of 5 stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $testimonial['rating'])
                                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                </svg>
                                            @else
                                                <svg class="w-5 h-5 fill-current text-gray-300" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                </svg>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Testimonial Content --}}
                            <div class="md:w-2/3 md:border-l border-gray-200 md:pl-8">
                                <svg class="w-10 h-10 text-brandblue opacity-20 mb-4" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                                    <path d="M10 8c-3.3 0-6 2.7-6 6v10h10V14H6c0-2.2 1.8-4 4-4zm16 0c-3.3 0-6 2.7-6 6v10h10V14h-8c0-2.2 1.8-4 4-4z" />
                                </svg>
                                <p class="text-gray-700 text-lg italic leading-relaxed mb-6">
                                    "{{ $testimonial['text'] }}"
                                </p>
                                <div class="text-gray-600 text-sm">
                                    <span class="font-medium">Package:</span> {{ $testimonial['package'] }}
                                </div>
                                <div class="text-gray-600 text-sm">
                                    <span class="font-medium">Date:</span> {{ $testimonial['date'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </x-ui.carousel.slick>
    </div>
</section>


