@props(['name', 'description', 'image', 'tags' => []])

<div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 overflow-hidden shadow-soft hover:shadow-lg transition-all duration-300 group">
    <div class="relative h-48 overflow-hidden">
        @if(file_exists(public_path('images/destinations/' . $image)))
            <img 
                src="{{ asset('images/destinations/' . $image) }}" 
                alt="{{ $name }}"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                loading="lazy"
                decoding="async"
            >
        @else
            <x-destinations.placeholder :name="$name" />
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
        <div class="absolute bottom-4 left-4 right-4 flex flex-wrap gap-2">
            @foreach($tags as $tag)
                <span class="bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-sm font-medium text-brandblue shadow-soft">
                    {{ $tag }}
                </span>
            @endforeach
        </div>
    </div>
    <div class="p-6">
        <h3 class="text-xl font-bold text-brandblue mb-2">{{ $name }}</h3>
        <p class="text-gray-600">{{ $description }}</p>
    </div>
</div>
