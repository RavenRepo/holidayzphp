{{-- Benefits Section Component --}}
{{-- Props: $benefitImages (array of image URLs) --}}
<section class="py-20 bg-gradient-to-br from-brandblue/5 via-white to-saffron/10">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-brandblue mb-4 drop-shadow">
                Check out really cool benefits of travelling with us
            </h2>
            <p class="text-lg text-gray-700 max-w-2xl mx-auto">
                Discover why thousands of travelers choose us for their unforgettable journeys
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            @foreach ($benefitImages as $image)
                <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                    <img src="{{ $image }}" alt="Travel Benefit" class="w-20 h-20 object-cover rounded-full mb-3" loading="lazy" />
                    <div class="font-semibold text-lg text-gray-800 mb-1">Travel Benefit</div>
                    <div class="text-gray-500 text-sm mb-2">Enjoy exclusive benefits with us</div>
                </div>
            @endforeach
        </div>
        
        <div class="text-center">
            <a href="{{ route('destinations') }}" class="bg-brandblue hover:bg-brandblue/90 text-white font-medium py-3 px-8 rounded-full transition-all duration-300 shadow-soft hover:shadow-lg inline-block">
                Discover Destinations
            </a>
        </div>
    </div>
</section>
