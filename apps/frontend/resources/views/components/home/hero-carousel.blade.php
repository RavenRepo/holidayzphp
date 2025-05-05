@props(['slides' => []])

<x-ui.slider.hero :slides="$slides" />
    
    <!-- Search Box Overlay -->
    <div class="absolute bottom-0 left-0 right-0 z-10 transform translate-y-1/2">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-lg shadow-xl p-6 max-w-5xl mx-auto">
                <form class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="destination" class="block text-sm font-medium text-gray-700 mb-1">Destination</label>
                        <select id="destination" name="destination" class="w-full rounded-md border-gray-300 shadow-sm focus:border-brandblue focus:ring focus:ring-brandblue focus:ring-opacity-50">
                            <option value="">Any Destination</option>
                            <option value="goa">Goa</option>
                            <option value="kerala">Kerala</option>
                            <option value="rajasthan">Rajasthan</option>
                            <option value="himachal">Himachal Pradesh</option>
                            <option value="andaman">Andaman & Nicobar</option>
                        </select>
                    </div>
                    <div>
                        <label for="duration" class="block text-sm font-medium text-gray-700 mb-1">Duration</label>
                        <select id="duration" name="duration" class="w-full rounded-md border-gray-300 shadow-sm focus:border-brandblue focus:ring focus:ring-brandblue focus:ring-opacity-50">
                            <option value="">Any Duration</option>
                            <option value="1-3">1-3 Days</option>
                            <option value="4-6">4-6 Days</option>
                            <option value="7-10">7-10 Days</option>
                            <option value="10+">10+ Days</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="w-full bg-brandblue hover:bg-brandblue/90 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                            Search Packages
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .homepage-hero-carousel .slick-dots {
        bottom: 80px;
    }
    
    .homepage-hero-carousel .slick-dots li button:before {
        color: white;
        opacity: 0.7;
        font-size: 12px;
    }
    
    .homepage-hero-carousel .slick-dots li.slick-active button:before {
        color: #FF9933;
        opacity: 1;
    }
    
    .animate-fadeInUp {
        animation: fadeInUp 0.8s ease-out forwards;
    }
    
    .animation-delay-200 {
        animation-delay: 0.2s;
    }
    
    .animation-delay-400 {
        animation-delay: 0.4s;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style> 