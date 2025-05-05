@props(['posts' => []])

<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center mb-16">
            <div>
                <h2 class="text-3xl md:text-4xl font-poppins font-bold text-brand-blue mb-3">Travel Inspirations</h2>
                <p class="text-lg font-open-sans text-neutral-600 leading-relaxed">Discover stories and tips to inspire your next adventure</p>
            </div>
            <a href="/blog" class="mt-6 md:mt-0 inline-flex items-center font-medium text-brand-blue hover:text-brand-blue-dark transition-colors duration-300">
                <span>View All Articles</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
                <div class="bg-white rounded-xl overflow-hidden shadow-card hover:shadow-xl transition-all duration-300 flex flex-col h-full group">
                    <a href="{{ $post['link'] }}" class="block relative overflow-hidden aspect-w-16 aspect-h-10">
                        <img 
                            src="{{ $post['image'] }}" 
                            alt="{{ $post['title'] }}" 
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                        >
                        @if(isset($post['category']))
                            <div class="absolute top-4 left-4 bg-white px-4 py-1.5 rounded-full text-sm font-medium text-brand-blue shadow-soft">
                                {{ $post['category'] }}
                            </div>
                        @endif
                    </a>
                    <div class="p-8 flex-grow flex flex-col">
                        <div class="flex items-center text-neutral-500 text-sm mb-4 font-open-sans">
                            <span class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                </svg>
                                {{ $post['date'] }}
                            </span>
                            @if(isset($post['readTime']))
                                <span class="flex items-center ml-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                    {{ $post['readTime'] }} min read
                                </span>
                            @endif
                        </div>
                        <h3 class="text-xl font-poppins font-semibold text-neutral-800 mb-3 group-hover:text-brand-blue transition-colors duration-300">
                            <a href="{{ $post['link'] }}">{{ $post['title'] }}</a>
                        </h3>
                        <p class="text-neutral-600 font-open-sans mb-6 line-clamp-3">{{ $post['excerpt'] }}</p>
                        <div class="flex items-center justify-between mt-auto pt-4 border-t border-neutral-200">
                            @if(isset($post['author']))
                                <div class="flex items-center">
                                    <img src="{{ $post['author']['avatar'] }}" alt="{{ $post['author']['name'] }}" class="w-10 h-10 rounded-full mr-3 shadow-soft">
                                    <span class="text-sm font-medium text-neutral-700 font-open-sans">{{ $post['author']['name'] }}</span>
                                </div>
                            @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section> 