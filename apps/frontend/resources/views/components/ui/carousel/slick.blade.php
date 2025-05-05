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
    'lazyLoad' => 'ondemand' // ondemand/progressive
])

@php
    // Generate a unique ID if none provided
    $id = $id ?? 'slick-'.uniqid();
@endphp

{{-- Slick Carousel Container --}}
<div 
    id="{{ $id }}" 
    {{ $attributes->class(['relative slick-carousel-container']) }}
    data-slick-initialized="false"
>
    {{-- Slides Container --}}
    <div class="slick-carousel">
        {{ $slot }}
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
@endonce

{{-- Initialize this specific carousel instance --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Check if the carousel is already initialized
        const carousel = document.getElementById('{{ $id }}');
        if (carousel && carousel.getAttribute('data-slick-initialized') !== 'true') {
            // Initialize with jQuery
            $(document).ready(function(){
                $('#{{ $id }} .slick-carousel').slick({
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
                    lazyLoad: '{{ $lazyLoad }}',
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: Math.min(3, {{ $slidesToShow }}),
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: Math.min(2, {{ $slidesToShow }}),
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
                    ]
                });
                // Mark as initialized
                carousel.setAttribute('data-slick-initialized', 'true');
            });
        }
    });
</script> 