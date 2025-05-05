import './bootstrap';

// Import jQuery and Slick Carousel from npm
import $ from 'jquery';
import 'slick-carousel';
window.$ = window.jQuery = $;

// Initialize popular packages carousel when the DOM is ready
$(document).ready(function() {
    // Initialize all Slick carousels
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
            $carousel.slick(config).data('slick-initialized', true);
        }
    });

    // Initialize popular packages carousel
    $('.popular-packages-carousel').slick({
        dots: true,
        arrows: true,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        cssEase: 'ease-out',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    arrows: false
                }
            }
        ]
    });

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
});
