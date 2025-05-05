@props(['post'])

<article class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 overflow-hidden shadow-soft hover:shadow-lg transition-all duration-300 flex flex-col h-full group">
    <!-- Image -->
    <div class="relative h-48 md:h-64 overflow-hidden">
        <img 
            src="{{ asset('images/blog/' . $post['image']) }}" 
            alt="{{ $post['title'] }}" 
            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500"
            loading="lazy"
            decoding="async"
        >
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
        <div class="absolute bottom-4 left-4 right-4">
            <div class="flex flex-wrap gap-2 mb-2">
                @foreach($post['categories'] as $category)
                    <span class="bg-white/90 backdrop-blur-sm px-4 py-1.5 rounded-full text-sm font-medium text-brandblue shadow-soft">
                        {{ $category }}
                    </span>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="p-6 flex-1 flex flex-col">
        <h3 class="text-xl font-bold text-brandblue mb-3 line-clamp-2">
            {{ $post['title'] }}
        </h3>
        <p class="text-gray-700 mb-4 line-clamp-3">
            {{ $post['excerpt'] }}
        </p>
        
        <!-- Author and Date -->
        <div class="mt-auto flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img 
                    src="{{ asset('images/authors/' . $post['author']['avatar']) }}" 
                    alt="{{ $post['author']['name'] }}"
                    class="w-10 h-10 rounded-full border-2 border-saffron"
                    loading="lazy"
                    decoding="async"
                >
                <div>
                    <p class="text-sm font-medium text-brandblue">{{ $post['author']['name'] }}</p>
                    <p class="text-sm text-gray-600">{{ $post['date'] }}</p>
                </div>
            </div>
            <a 
                href="#" 
                class="text-brandblue hover:text-saffron transition-colors"
                aria-label="Read more about {{ $post['title'] }}"
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>
    </div>
</article>
