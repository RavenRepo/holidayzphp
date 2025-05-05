@props(['features' => []])

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Why Choose Us</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Discover what makes Holidayz Manager the trusted choice for travelers across India</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($features as $feature)
                <div class="text-center p-6 bg-gray-50 rounded-lg hover:shadow-lg transition-all duration-300 hover:-translate-y-2">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-brand-saffron bg-opacity-20 text-brand-saffron mb-4">
                        {!! $feature['icon'] !!}
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $feature['title'] }}</h3>
                    <p class="text-gray-600">{{ $feature['description'] }}</p>
                </div>
            @endforeach
        </div>
        
        <div class="mt-16 text-center">
            <div class="p-8 max-w-4xl mx-auto bg-brand-blue bg-opacity-5 rounded-lg border border-brand-blue border-opacity-20">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                    <div class="text-center">
                        <div class="text-3xl md:text-4xl font-bold text-brand-blue mb-2">10,000+</div>
                        <p class="text-gray-600">Happy Travelers</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl md:text-4xl font-bold text-brand-blue mb-2">200+</div>
                        <p class="text-gray-600">Destinations</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl md:text-4xl font-bold text-brand-blue mb-2">98%</div>
                        <p class="text-gray-600">Satisfaction Rate</p>
                    </div>
                </div>
                <p class="text-lg text-gray-700 italic">
                    "Our mission is to make travel accessible, enjoyable, and hassle-free for every Indian traveler."
                </p>
            </div>
        </div>
    </div>
</section> 