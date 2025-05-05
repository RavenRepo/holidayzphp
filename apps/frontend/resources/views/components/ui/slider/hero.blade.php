@props(['slides' => []])

<div class="relative w-full bg-gray-100">
    <div class="w-full overflow-hidden">
        <div class="hero-slider relative w-full h-[23rem] md:h-[28rem] lg:h-[32rem]">
            @foreach($slides as $index => $slide)
                <div class="hero-slide absolute inset-0 w-full h-full transition-opacity duration-1000 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}" data-slide="{{ $index }}">
                    <img 
                        src="{{ $slide['image'] }}" 
                        alt="{{ $slide['title'] }}" 
                        class="absolute inset-0 w-full h-full object-cover"
                        loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                    >
                    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="px-6 py-12 w-full">
                            <div class="max-w-xl mx-auto md:mx-0 text-center md:text-left">
                                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4 opacity-0 translate-y-8 transition-all duration-700 delay-300" data-slide-content>
                                    {{ $slide['title'] }}
                                </h2>
                                <p class="text-xl text-white mb-8 opacity-0 translate-y-8 transition-all duration-700 delay-500" data-slide-content>
                                    {{ $slide['subtitle'] }}
                                </p>
                                @if(isset($slide['button']))
                                    <a 
                                        href="{{ $slide['button']['link'] }}" 
                                        class="inline-block px-8 py-3 bg-saffron hover:bg-saffron/90 text-white font-semibold rounded-md transition duration-300 opacity-0 translate-y-8 delay-700" data-slide-content
                                    >
                                        {{ $slide['button']['text'] }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Navigation Buttons -->
            <button class="absolute left-4 top-1/2 -translate-y-1/2 z-10 p-2 bg-white/20 hover:bg-white/30 rounded-full text-white transition-all duration-300" onclick="previousSlide()" aria-label="Previous slide" title="Previous slide">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button class="absolute right-4 top-1/2 -translate-y-1/2 z-10 p-2 bg-white/20 hover:bg-white/30 rounded-full text-white transition-all duration-300" onclick="nextSlide()" aria-label="Next slide" title="Next slide">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>

            <!-- Dots Navigation -->
            <div class="absolute bottom-8 left-0 right-0 z-10">
                <div class="flex justify-center gap-2">
                    @foreach($slides as $index => $slide)
                        <button 
                            onclick="goToSlide({{ $index }})" 
                            class="w-3 h-3 rounded-full transition-all duration-300 {{ $index === 0 ? 'bg-white scale-125' : 'bg-white/50 hover:bg-white/70' }}"
                            data-dot="{{ $index }}"
                            aria-label="Go to slide {{ $index + 1 }}"
                        ></button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hero-slide {
    backface-visibility: hidden;
    -webkit-backface-visibility: hidden;
}

.hero-slide[data-active="true"] [data-slide-content] {
    opacity: 1;
    transform: translateY(0);
}
</style>

<script>
let currentSlide = 0;
const slides = document.querySelectorAll('.hero-slide');
const dots = document.querySelectorAll('[data-dot]');
let autoplayInterval;

function updateSlide(newIndex) {
    // Update slides
    slides.forEach((slide, index) => {
        if (index === newIndex) {
            slide.classList.remove('opacity-0');
            slide.classList.add('opacity-100');
            slide.setAttribute('data-active', 'true');
        } else {
            slide.classList.add('opacity-0');
            slide.classList.remove('opacity-100');
            slide.setAttribute('data-active', 'false');
        }
    });

    // Update dots
    dots.forEach((dot, index) => {
        if (index === newIndex) {
            dot.classList.add('bg-white', 'scale-125');
            dot.classList.remove('bg-white/50');
        } else {
            dot.classList.remove('bg-white', 'scale-125');
            dot.classList.add('bg-white/50');
        }
    });

    currentSlide = newIndex;
    resetAutoplay();
}

function nextSlide() {
    const newIndex = (currentSlide + 1) % slides.length;
    updateSlide(newIndex);
}

function previousSlide() {
    const newIndex = (currentSlide - 1 + slides.length) % slides.length;
    updateSlide(newIndex);
}

function goToSlide(index) {
    updateSlide(index);
}

function resetAutoplay() {
    clearInterval(autoplayInterval);
    autoplayInterval = setInterval(nextSlide, 5000);
}

// Initialize autoplay
document.addEventListener('DOMContentLoaded', () => {
    updateSlide(0);
    resetAutoplay();
});

// Pause autoplay when user interacts with the slider
document.querySelector('.hero-slider').addEventListener('mouseover', () => {
    clearInterval(autoplayInterval);
});

document.querySelector('.hero-slider').addEventListener('mouseleave', resetAutoplay);
</script>
