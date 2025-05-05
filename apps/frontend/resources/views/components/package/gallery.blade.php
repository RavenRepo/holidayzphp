@props(['images'])

<div class="relative">
    <!-- Main Image -->
    <div class="aspect-[16/9] overflow-hidden rounded-2xl mb-4">
        <img 
            src="{{ asset('images/packages/' . $images[0]) }}" 
            alt="Main Package Image"
            class="w-full h-full object-cover"
            loading="lazy"
            decoding="async"
        >
    </div>

    <!-- Thumbnail Grid -->
    <div class="grid grid-cols-4 gap-4">
        @foreach(array_slice($images, 1, 4) as $image)
            <div class="aspect-square overflow-hidden rounded-xl">
                <img 
                    src="{{ asset('images/packages/' . $image) }}" 
                    alt="Package Image"
                    class="w-full h-full object-cover hover:scale-110 transition-transform duration-300"
                    loading="lazy"
                    decoding="async"
                >
            </div>
        @endforeach
    </div>
</div>
