@props([
    'title',
    'subtitle' => null,
    'class' => '',
])

<div {{ $attributes->merge(['class' => 'mb-8 ' . $class]) }}>
    <h1 class="text-3xl font-bold text-gray-900 font-poppins">
        {{ $title }}
    </h1>
    @if ($subtitle)
        <p class="mt-2 text-lg text-gray-600 font-open-sans">
            {{ $subtitle }}
        </p>
    @endif
    @if ($slot->isNotEmpty())
        <div class="mt-4">
            {{ $slot }}
        </div>
    @endif
</div>
