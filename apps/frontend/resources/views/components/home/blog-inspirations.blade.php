@props(['posts' => []])

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center mb-12">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Travel Inspirations</h2>
                <p class="text-lg text-gray-600">Discover stories and tips to inspire your next adventure</p>
            </div>
            <a href="/blog" class="mt-4 md:mt-0 inline-flex items-center font-medium text-brandblue hover:text-brandblue/80 transition duration-300">
                View All Articles
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
                <div class="bg-gray-50 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                    <a href="{{ $post['link'] }}" class="block">
                        <div class="relative h-48 md:h-56 overflow-hidden">
                            <img 
                                src="{{ $post['image'] }}" 
                                alt="{{ $post['title'] }}" 
                                class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
                            >
                            @if(isset($post['category']))
                                <div class="absolute top-4 left-4 bg-white bg-opacity-90 px-3 py-1 rounded text-xs font-medium text-gray-800 uppercase tracking-wider">
                                    {{ $post['category'] }}
                                </div>
                            @endif
                        </div>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center text-gray-500 text-sm mb-2">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $post['date'] }}
                            </span>
                            <span class="mx-2">•</span>
                            <span>{{ $post['readTime'] }} min read</span>
                        </div>
                        <a href="{{ $post['link'] }}" class="block">
                            <h3 class="text-xl font-bold text-gray-800 mb-2 hover:text-brandblue transition duration-300">{{ $post['title'] }}</h3>
                        </a>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $post['excerpt'] }}</p>
                        <div class="flex items-center">
                            <img 
                                src="{{ $post['author']['avatar'] }}" 
                                alt="{{ $post['author']['name'] }}" 
                                class="w-8 h-8 rounded-full mr-3"
                            >
                            <span class="text-sm font-medium text-gray-700">{{ $post['author']['name'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section> 