import './bootstrap';

// Import jQuery
import $ from 'jquery';
window.$ = window.jQuery = $;

// Initialize popular packages carousel when the DOM is ready
$(document).ready(function() {
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
