@props([
    'type' => 'text',
    'name',
    'id' => null,
    'label' => null,
    'error' => null,
    'disabled' => false,
])

@php
    $id = $id ?? $name;
    $baseClasses = 'block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 font-open-sans';
    $classes = $baseClasses . ' ' . ($error ? 'border-red-300' : '') . ' ' . ($disabled ? 'bg-gray-50 text-gray-500' : '');
@endphp

<div>
    @if($label)
        <label for="{{ $id }}" class="block text-sm font-medium text-gray-700 mb-1">{{ $label }}</label>
    @endif
    
    <input 
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $id }}"
        {{ $attributes->merge(['class' => $classes]) }}
        @if($disabled) disabled @endif
    >

    @if($error)
        <p class="mt-1 text-sm text-red-600">{{ $error }}</p>
    @endif
</div>
