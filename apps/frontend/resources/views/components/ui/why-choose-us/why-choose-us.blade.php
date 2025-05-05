@props(['features' => []])

<section class="py-20 bg-gradient-to-br from-saffron/10 via-white to-brandblue/5">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-brandblue mb-4 drop-shadow">Why Choose Us</h2>
            <p class="text-lg text-gray-700 max-w-2xl mx-auto">Discover what makes <span class="font-semibold text-saffron">Holidayz Manager</span> the trusted choice for travelers across India</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($features as $feature)
                <div class="text-center p-8 rounded-2xl bg-white/70 backdrop-blur-md border border-gray-100 shadow-soft hover:shadow-lg transition-all duration-300 hover:-translate-y-2 hover:scale-105">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-br from-saffron/80 to-brandblue/80 text-white shadow-lg mb-5 text-3xl">
                        {!! $feature['icon'] !!}
                    </div>
                    <h3 class="text-lg font-poppins font-bold text-brandblue mb-2 tracking-tight">{{ $feature['title'] }}</h3>
                    <p class="text-gray-600 font-open-sans leading-relaxed">{{ $feature['description'] }}</p>
                </div>
            @endforeach
        </div>
        <div class="mt-16 text-center">
            <div class="p-10 max-w-4xl mx-auto bg-white/80 backdrop-blur-md rounded-2xl border border-brandblue/20 shadow-card">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                    <div class="text-center">
                        <div class="text-3xl md:text-4xl font-bold text-brandblue mb-2 drop-shadow">10,000+</div>
                        <p class="text-gray-600">Happy Travelers</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl md:text-4xl font-bold text-brandblue mb-2 drop-shadow">200+</div>
                        <p class="text-gray-600">Destinations</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl md:text-4xl font-bold text-brandblue mb-2 drop-shadow">98%</div>
                        <p class="text-gray-600">Satisfaction Rate</p>
                    </div>
                </div>
                <p class="text-lg text-gray-700 italic font-open-sans">
                    "Our mission is to make travel accessible, enjoyable, and hassle-free for every Indian traveler."
                </p>
            </div>
        </div>
    </div>
</section> 