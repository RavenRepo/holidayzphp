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

{{-- Include jQuery and Slick JS libraries once per page --}}
@once
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    // Global initialization function for Slick carousels
    function initializeSlickCarousels() {
        document.querySelectorAll('.slick-carousel-container').forEach(function(container) {
            if (container.getAttribute('data-slick-initialized') === 'true') return;
            
            const carousel = container.querySelector('.slick-carousel');
            if (!carousel) return;
            
            const config = {
                dots: container.getAttribute('data-slick-dots') === 'true',
                arrows: container.getAttribute('data-slick-arrows') === 'true',
                infinite: container.getAttribute('data-slick-infinite') === 'true',
                speed: parseInt(container.getAttribute('data-slick-speed')),
                slidesToShow: parseInt(container.getAttribute('data-slick-slides-to-show')),
                slidesToScroll: parseInt(container.getAttribute('data-slick-slides-to-scroll')),
                autoplay: container.getAttribute('data-slick-autoplay') === 'true',
                autoplaySpeed: parseInt(container.getAttribute('data-slick-autoplay-speed')),
                pauseOnHover: container.getAttribute('data-slick-pause-on-hover') === 'true',
                centerMode: container.getAttribute('data-slick-center-mode') === 'true',
                variableWidth: container.getAttribute('data-slick-variable-width') === 'true',
                fade: container.getAttribute('data-slick-fade') === 'true',
                adaptiveHeight: container.getAttribute('data-slick-adaptive-height') === 'true',
                lazyLoad: container.getAttribute('data-slick-lazy-load')
            };
            
            // Handle responsive settings
            try {
                const responsiveData = container.getAttribute('data-slick-responsive');
                if (responsiveData && responsiveData !== 'null') {
                    config.responsive = JSON.parse(responsiveData);
                } else {
                    // Default responsive behavior if none provided
                    config.responsive = [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: Math.min(3, config.slidesToShow),
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: Math.min(2, config.slidesToShow),
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 640,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ];
                }
            } catch (e) {
                console.error('Error parsing responsive settings', e);
            }
            
            // Initialize Slick
            $(carousel).slick(config);
            container.setAttribute('data-slick-initialized', 'true');
        });
    }
    
    // Initialize on page load
    document.addEventListener('DOMContentLoaded', initializeSlickCarousels);
</script>
@endonce

{{-- Initialize this specific carousel instance --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Wait for global init function to be available
        setTimeout(function() {
            if (typeof initializeSlickCarousels === 'function') {
                initializeSlickCarousels();
            }
        }, 0);
    });
</script> 