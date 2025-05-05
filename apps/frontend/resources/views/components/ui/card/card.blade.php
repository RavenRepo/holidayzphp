@props([
    'image' => null,
    'alt' => '',
    'badge' => null,
    'title' => null,
    'subtitle' => null,
    'description' => null,
    'price' => null,
    'action' => null,
    'class' => '',
])

<div {{ $attributes->merge(['class' => "bg-white rounded-2xl shadow-card hover:shadow-xl transition-all duration-300 flex flex-col h-full $class"]) }}>
    @if($image)
        <div class="relative h-1/2 min-h-[140px] max-h-56 overflow-hidden rounded-t-2xl flex-shrink-0">
            <img src="{{ $image }}" alt="{{ $alt }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
            @if($badge)
                <div class="absolute top-4 right-4 bg-saffron text-white px-4 py-1.5 rounded-full text-xs font-semibold shadow-soft">
                    {{ $badge }}
                </div>
            @endif
        </div>
    @endif
    <div class="p-6 flex flex-col flex-1 justify-between">
        @if($title)
            <h3 class="text-lg md:text-xl font-poppins font-semibold text-gray-900 mb-1">{{ $title }}</h3>
        @endif
        @if($subtitle)
            <p class="text-sm text-gray-500 mb-2">{{ $subtitle }}</p>
        @endif
        @if($description)
            <p class="text-gray-600 font-open-sans mb-4 flex-1">{{ $description }}</p>
        @endif
        @if($price)
            <div class="text-brandblue font-poppins font-bold text-lg mb-2">{{ $price }}</div>
        @endif
        @if($action)
            <div class="mt-auto">{!! $action !!}</div>
        @endif
        {{ $slot }}
    </div>
</div> 