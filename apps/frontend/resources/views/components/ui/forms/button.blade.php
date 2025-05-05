@props([
    'type' => 'button',
    'variant' => 'primary', // primary, secondary, outline
    'size' => 'md', // sm, md, lg
    'disabled' => false,
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors';
    
    $variants = [
        'primary' => 'bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500',
        'secondary' => 'bg-gray-600 text-white hover:bg-gray-700 focus:ring-gray-500',
        'outline' => 'border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 focus:ring-blue-500',
    ];
    
    $sizes = [
        'sm' => 'px-3 py-2 text-sm',
        'md' => 'px-4 py-2 text-base',
        'lg' => 'px-6 py-3 text-lg',
    ];
    
    $classes = $baseClasses . ' ' . 
               ($variants[$variant] ?? $variants['primary']) . ' ' . 
               ($sizes[$size] ?? $sizes['md']) . ' ' .
               ($disabled ? 'opacity-50 cursor-not-allowed' : '');
@endphp

<button 
    type="{{ $type }}"
    {{ $attributes->merge(['class' => $classes]) }}
    @if($disabled) disabled @endif
>
    {{ $slot }}
</button>
