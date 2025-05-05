@props(['posts' => []])

<section class="py-20 bg-gradient-to-br from-saffron/10 via-white to-brandblue/5" aria-label="Travel Blog and Inspirations">
    <div class="container mx-auto px-4">
        {{-- Section Header --}}
        <div class="flex flex-col md:flex-row justify-between items-center mb-16">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-brandblue mb-4 drop-shadow">
                    Travel Inspirations
                </h2>
                <p class="text-lg text-gray-700 leading-relaxed">
                    Discover stories and tips to inspire your next adventure
                </p>
            </div>
            <a href="/blog" 
               class="mt-6 md:mt-0 inline-flex items-center font-medium text-brandblue 
                      hover:text-brandblue-dark transition-colors duration-300" 
               aria-label="View all blog articles">
                <span>View All Articles</span>
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="h-5 w-5 ml-2" 
                     viewBox="0 0 20 20" 
                     fill="currentColor"
                     aria-hidden="true">
                    <path fill-rule="evenodd" 
                          d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" 
                          clip-rule="evenodd" />
                </svg>
            </a>
        </div>
        
        {{-- Blog Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
                <article class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 
                             overflow-hidden shadow-soft hover:shadow-lg transition-all 
                             duration-300 flex flex-col h-full group">
                    {{-- Image Container --}}
                    <a href="{{ $post['link'] }}" 
                       class="block relative overflow-hidden aspect-w-16 aspect-h-10"
                       aria-label="Read more about {{ $post['title'] }}">
                        <img src="{{ $post['image'] }}" 
                             alt="{{ $post['title'] }}" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                             loading="lazy"
                             decoding="async">
                        @if(isset($post['category']))
                            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-4 py-1.5 
                                      rounded-full text-sm font-medium text-brandblue shadow-soft">
                                {{ $post['category'] }}
                            </div>
                        @endif
                    </a>
                    
                    {{-- Content --}}
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2 hover:text-brandblue transition-colors duration-300">
                            <a href="{{ $post['link'] }}">{{ $post['title'] }}</a>
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ $post['excerpt'] }}</p>
                        
                        {{-- Meta Information --}}
                        <div class="mt-auto flex items-center text-sm text-gray-500">
                            @if(isset($post['date']))
                                <time datetime="{{ $post['date'] }}" class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $post['date'] }}
                                </time>
                            @endif
                            @if(isset($post['readTime']))
                                <span class="mx-3">&bull;</span>
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $post['readTime'] }} min read
                                </span>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
