@props([
    'image' => null,
    'alt' => '',
    'title' => null,
    'subtitle' => null,
    'link' => null,
    'linkText' => 'View Details',
    'lazyLoad' => false,
])

<div class="slick-slide-item">
    @if($image)
        <div class="slide-image-container aspect-w-16 aspect-h-9 mb-3 overflow-hidden rounded-lg">
            <img 
                src="{{ $image }}" 
                alt="{{ $alt }}" 
                class="w-full h-full object-cover transition-transform duration-300 hover:scale-105"
                @if($lazyLoad) loading="lazy" @endif
            >
        </div>
    @endif
    
    <div class="slide-content">
        @if($title)
            <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $title }}</h3>
        @endif
        
        @if($subtitle)
            <p class="text-sm text-gray-600 mb-3">{{ $subtitle }}</p>
        @endif
        
        {{ $slot }}
        
        @if($link)
            <div class="mt-3">
                <a 
                    href="{{ $link }}" 
                    class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800"
                >
                    {{ $linkText }}
                    <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        @endif
    </div>
</div> 