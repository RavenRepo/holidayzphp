import './bootstrap';

// Import jQuery and Slick Carousel from npm
import $ from 'jquery';
import 'slick-carousel';
window.$ = window.jQuery = $;

// Define global initialization function for Slick carousels
window.initializeSlickCarousels = function() {
    $('.slick-carousel-container').each(function() {
        const $carousel = $(this);
        if ($carousel.data('slick-initialized') === false) {
            const config = {
                dots: $carousel.data('slick-dots') === 'true',
                arrows: $carousel.data('slick-arrows') === 'true',
                infinite: $carousel.data('slick-infinite') === 'true',
                speed: parseInt($carousel.data('slick-speed')),
                slidesToShow: parseInt($carousel.data('slick-slides-to-show')),
                slidesToScroll: parseInt($carousel.data('slick-slides-to-scroll')),
                autoplay: $carousel.data('slick-autoplay') === 'true',
                autoplaySpeed: parseInt($carousel.data('slick-autoplay-speed')),
                adaptiveHeight: $carousel.data('slick-adaptive-height') === 'true',
                fade: $carousel.data('slick-fade') === 'true',
                responsive: $carousel.data('slick-responsive')
            };
            $carousel.find('.slick-carousel').slick(config);
            $carousel.data('slick-initialized', true);
        }
    });
};

// Initialize all Slick carousels when the DOM is ready
$(document).ready(function() {
    // Initialize all Slick carousels
    initializeSlickCarousels();

    // Initialize popular packages carousel
    $('.popular-packages-carousel').slick({
        dots: true,
        arrows: true,
        infinite: true,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
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
    
    // Initialize curated destinations section in package-details page
    $('.curated-destinations-carousel').slick({
        dots: true,
        arrows: true,
        infinite: true,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
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
});

// Make sure any dynamically loaded carousels get initialized
document.addEventListener('DOMContentLoaded', function() {
    // Add a small delay to ensure all components are fully loaded
    setTimeout(function() {
        initializeSlickCarousels();
    }, 100);
});
