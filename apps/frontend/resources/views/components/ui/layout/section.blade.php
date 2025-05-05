@props([
    'id' => null,
    'background' => 'white', // white, gray, blue
    'padding' => 'normal', // normal, large, none
])

@php
    $bgClasses = [
        'white' => 'bg-white',
        'gray' => 'bg-gray-50',
        'blue' => 'bg-blue-50',
    ][$background] ?? 'bg-white';

    $paddingClasses = [
        'normal' => 'py-12',
        'large' => 'py-20',
        'none' => '',
    ][$padding] ?? 'py-12';
@endphp

<section 
    @if($id) id="{{ $id }}" @endif
    {{ $attributes->merge(['class' => "{$bgClasses} {$paddingClasses}"]) }}
>
    <div class="container mx-auto px-4">
        {{ $slot }}
    </div>
</section>
