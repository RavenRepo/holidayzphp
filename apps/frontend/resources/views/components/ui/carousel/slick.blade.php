@props([
    'id' => null,
    'dots' => true,
    'arrows' => true,
    'infinite' => true,
    'speed' => 500,
    'slidesToShow' => 3,
    'slidesToScroll' => 1,
    'autoplay' => false,
    'autoplaySpeed' => 3000,
    'pauseOnHover' => true,
    'centerMode' => false,
    'variableWidth' => false,
    'fade' => false,
    'adaptiveHeight' => false,
    'lazyLoad' => 'ondemand', // ondemand/progressive
    'responsive' => null,
    'contained' => true, // Whether to contain the carousel within max-width container
    'containerClass' => 'container mx-auto px-4' // Container class when contained is true
])

@php
    // Generate a unique ID if none provided
    $id = $id ?? 'slick-'.uniqid();
    
    // Format responsive settings
    $responsiveJson = 'null';
    if (is_array($responsive)) {
        $responsiveJson = json_encode($responsive);
    }
@endphp

{{-- Slick Carousel Wrapper --}}
<div class="relative slick-carousel-wrapper {{ $contained ? '' : 'w-full' }}">
    @if($contained)
    <div class="{{ $containerClass }}">
    @endif
    
    {{-- Slick Carousel Container --}}
    <div 
        id="{{ $id }}" 
        {{ $attributes->class(['relative slick-carousel-container']) }}
        data-slick-initialized="false"
        data-slick-dots="{{ $dots ? 'true' : 'false' }}"
        data-slick-arrows="{{ $arrows ? 'true' : 'false' }}"
        data-slick-infinite="{{ $infinite ? 'true' : 'false' }}"
        data-slick-speed="{{ $speed }}"
        data-slick-slides-to-show="{{ $slidesToShow }}"
        data-slick-slides-to-scroll="{{ $slidesToScroll }}"
        data-slick-autoplay="{{ $autoplay ? 'true' : 'false' }}"
        data-slick-autoplay-speed="{{ $autoplaySpeed }}"
        data-slick-pause-on-hover="{{ $pauseOnHover ? 'true' : 'false' }}"
        data-slick-center-mode="{{ $centerMode ? 'true' : 'false' }}"
        data-slick-variable-width="{{ $variableWidth ? 'true' : 'false' }}"
        data-slick-fade="{{ $fade ? 'true' : 'false' }}"
        data-slick-adaptive-height="{{ $adaptiveHeight ? 'true' : 'false' }}"
        data-slick-lazy-load="{{ $lazyLoad }}"
        data-slick-responsive="{{ $responsiveJson }}"
    >
        {{-- Slides Container --}}
        <div class="slick-carousel">
            {{ $slot }}
        </div>
        
    @if($contained)
    </div>
    @endif
</div>
</div>

{{-- Only include CSS once per page --}}
@once
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<style>
    /* Custom Slick Carousel Styles */
    .slick-carousel-container {
        margin-bottom: 40px;
    }
    
    /* Arrow customization */
    .slick-prev, .slick-next {
        z-index: 10;
        width: 40px;
        height: 40px;
    }
    
    .slick-prev {
        left: -10px;
    }
    
    .slick-next {
        right: -10px;
    }
    
    .slick-prev:before, .slick-next:before {
        font-size: 24px;
        color: #0056B3; /* brandblue color */
    }
    
    /* Dots customization */
    .slick-dots {
        bottom: -30px;
    }
    
    .slick-dots li button:before {
        font-size: 10px;
        color: #DEE2E6; /* light gray */
    }
    
    .slick-dots li.slick-active button:before {
        color: #0056B3; /* brandblue color */
    }
    
    /* Individual slide styling */
    .slick-slide {
        padding: 0 10px;
        box-sizing: border-box;
    }
    
    /* Responsive adjustments */
    @media (max-width: 640px) {
        .slick-prev {
            left: 5px;
        }
        
        .slick-next {
            right: 5px;
        }
    }
</style>
@endonce

{{-- Remove CDN JS scripts, as Slick and jQuery are now loaded via npm --}}

{{-- Initialize this specific carousel instance --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Wait for global init function to be available
        if (typeof initializeSlickCarousels === 'function') {
            initializeSlickCarousels();
        }
        
        // Backup direct initialization after a delay in case the global function failed
        setTimeout(function() {
            const carousel = document.getElementById('{{ $id }}');
            if (carousel && !$(carousel).data('slick-initialized')) {
                // Prepare the configuration object
                var slickConfig = {
                    dots: {{ $dots ? 'true' : 'false' }},
                    arrows: {{ $arrows ? 'true' : 'false' }},
                    infinite: {{ $infinite ? 'true' : 'false' }},
                    speed: {{ $speed }},
                    slidesToShow: {{ $slidesToShow }},
                    slidesToScroll: {{ $slidesToScroll }},
                    autoplay: {{ $autoplay ? 'true' : 'false' }},
                    autoplaySpeed: {{ $autoplaySpeed }},
                    pauseOnHover: {{ $pauseOnHover ? 'true' : 'false' }},
                    centerMode: {{ $centerMode ? 'true' : 'false' }},
                    variableWidth: {{ $variableWidth ? 'true' : 'false' }},
                    fade: {{ $fade ? 'true' : 'false' }},
                    adaptiveHeight: {{ $adaptiveHeight ? 'true' : 'false' }},
                    lazyLoad: '{{ $lazyLoad }}'
                };
                
                // Add responsive property if it exists
                @if($responsive)
                slickConfig.responsive = {!! $responsiveJson !!};
                @endif
                
                // Initialize the carousel
                $(carousel).find('.slick-carousel').slick(slickConfig);
                $(carousel).data('slick-initialized', true);
            }
        }, 300);
    });
</script> 