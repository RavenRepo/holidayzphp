@props(['isOpen' => false])

<nav class="hidden md:flex gap-8 font-body text-lg">
    <a href="{{ route('home') }}" class="hover:text-saffron transition-colors">Home</a>
    <a href="{{ route('about') }}" class="hover:text-saffron transition-colors">About Us</a>
    <a href="{{ route('destinations') }}" class="hover:text-saffron transition-colors">Destinations</a>
    <a href="{{ route('blog') }}" class="hover:text-saffron transition-colors">Blog</a>
    <a href="{{ route('contact') }}" class="hover:text-saffron transition-colors">Contact</a>
</nav>

<!-- Mobile Navigation -->
<div 
    x-show="isOpen"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 -translate-y-4"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-4"
    class="fixed inset-0 z-50 bg-brandblue"
    @click.away="isOpen = false"
>
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-end mb-8">
            <button @click="isOpen = false" class="text-white hover:text-saffron transition-colors" aria-label="Close menu">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <nav class="flex flex-col items-center gap-8 text-2xl text-white">
            <a href="{{ route('home') }}" class="hover:text-saffron transition-colors" @click="isOpen = false">Home</a>
            <a href="{{ route('about') }}" class="hover:text-saffron transition-colors" @click="isOpen = false">About Us</a>
            <a href="{{ route('destinations') }}" class="hover:text-saffron transition-colors" @click="isOpen = false">Destinations</a>
            <a href="{{ route('blog') }}" class="hover:text-saffron transition-colors" @click="isOpen = false">Blog</a>
            <a href="{{ route('contact') }}" class="hover:text-saffron transition-colors" @click="isOpen = false">Contact</a>
        </nav>
    </div>
</div>
