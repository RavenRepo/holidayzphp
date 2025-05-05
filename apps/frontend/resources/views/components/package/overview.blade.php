@props(['duration', 'price', 'highlights'])

<div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft p-6 space-y-8">
    <div class="grid md:grid-cols-2 gap-6 md:gap-8">
        <!-- Duration & Price -->
        <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 p-8 shadow-soft hover:shadow-lg transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-brandblue mb-2">Duration</h3>
                    <p class="text-lg text-gray-700">{{ $duration }}</p>
                </div>
                <div class="text-right">
                    <h3 class="text-xl font-bold text-brandblue mb-2">Price</h3>
                    <p class="text-lg text-gray-700">₹{{ number_format($price) }}</p>
                </div>
            </div>
        </div>

        <!-- Book Now Button -->
        <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 p-8 shadow-soft hover:shadow-lg transition-all duration-300 flex items-center justify-center">
            <a href="#enquiry-form" class="bg-brandblue text-white px-10 py-4 rounded-full text-lg font-medium hover:bg-saffron transition-colors duration-300 hover:scale-105 transform">
                Book Now
            </a>
        </div>
    </div>

    <!-- Highlights -->
    <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 p-8 shadow-soft hover:shadow-lg transition-all duration-300">
        <h3 class="text-2xl font-bold text-brandblue mb-8">Highlights</h3>
        <ul class="grid md:grid-cols-2 gap-6">
            @foreach($highlights as $highlight)
                <li class="flex items-start gap-4">
                    <span class="text-saffron text-xl">✓</span>
                    <span class="text-gray-700 text-lg">{{ $highlight }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
