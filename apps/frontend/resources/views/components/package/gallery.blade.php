@props(['images'])

<div class="relative space-y-6">
    <!-- Main Image -->
    <div class="aspect-[16/9] overflow-hidden rounded-2xl group cursor-pointer">
        <img 
            src="{{ $images[0] ?? 'https://via.placeholder.com/1200x675?text=No+Image+Available' }}" 
            alt="Main Package Image"
            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
            loading="lazy"
            decoding="async"
        >
    </div>

    <!-- Thumbnail Grid -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
        @foreach(array_slice($images, 1, 4) as $image)
            <div class="aspect-square overflow-hidden rounded-xl group cursor-pointer">
                <img 
                    src="{{ $image }}" 
                    alt="Package Image"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                    loading="lazy"
                    decoding="async"
                >
            </div>
        @endforeach
    </div>
</div>
