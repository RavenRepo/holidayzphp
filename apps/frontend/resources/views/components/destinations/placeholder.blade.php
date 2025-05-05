@props(['name'])

<div class="relative h-48 bg-gradient-to-br from-brandblue/20 to-saffron/20 flex items-center justify-center">
    <div class="text-brandblue font-bold text-xl">{{ $name }}</div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
</div>
