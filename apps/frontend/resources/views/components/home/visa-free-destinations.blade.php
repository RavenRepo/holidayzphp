@props(['destinations' => []])

<section class="py-20 bg-gradient-to-br from-saffron/10 via-white to-brandblue/5">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-brandblue mb-4 drop-shadow">
                VISA FREE DESTINATIONS
            </h2>
            <p class="text-lg text-gray-700 max-w-2xl mx-auto">
                Explore these amazing destinations where Indian passport holders can travel without a visa
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Mauritius -->
            <div class="relative overflow-hidden rounded-2xl shadow-soft hover:shadow-lg transition-all duration-300 h-64">
                <img 
                    src="https://images.unsplash.com/photo-1589197331516-4d84b72bb202?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                    alt="Mauritius" 
                    class="w-full h-full object-cover"
                    loading="lazy"
                    decoding="async"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-6">
                    <h3 class="text-2xl font-bold text-white mb-1">Mauritius</h3>
                    <p class="text-white/90 text-sm">From ₹62,500</p>
                </div>
            </div>
            
            <!-- Maldives -->
            <div class="relative overflow-hidden rounded-2xl shadow-soft hover:shadow-lg transition-all duration-300 h-64">
                <img 
                    src="https://images.unsplash.com/photo-1514282401047-d79a71a590e8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                    alt="Maldives" 
                    class="w-full h-full object-cover"
                    loading="lazy"
                    decoding="async"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-6">
                    <h3 class="text-2xl font-bold text-white mb-1">Maldives</h3>
                    <p class="text-white/90 text-sm">From ₹54,999</p>
                </div>
            </div>
            
            <!-- Thailand -->
            <div class="relative overflow-hidden rounded-2xl shadow-soft hover:shadow-lg transition-all duration-300 h-64">
                <img 
                    src="https://images.unsplash.com/photo-1552465011-b4e21bf6e79a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                    alt="Thailand" 
                    class="w-full h-full object-cover"
                    loading="lazy"
                    decoding="async"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-6">
                    <h3 class="text-2xl font-bold text-white mb-1">Thailand</h3>
                    <p class="text-white/90 text-sm">From ₹37,800</p>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Malaysia -->
            <div class="relative overflow-hidden rounded-2xl shadow-soft hover:shadow-lg transition-all duration-300 h-48">
                <img 
                    src="https://images.unsplash.com/photo-1596422846543-75c6fc197f07?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                    alt="Malaysia" 
                    class="w-full h-full object-cover"
                    loading="lazy"
                    decoding="async"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-6">
                    <h3 class="text-2xl font-bold text-white mb-1">Malaysia</h3>
                    <p class="text-white/90 text-sm">From ₹48,750</p>
                </div>
            </div>
            
            <!-- Sri Lanka -->
            <div class="relative overflow-hidden rounded-2xl shadow-soft hover:shadow-lg transition-all duration-300 h-48">
                <img 
                    src="https://images.unsplash.com/photo-1586394552396-8c84c9afa204?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                    alt="Sri Lanka" 
                    class="w-full h-full object-cover"
                    loading="lazy"
                    decoding="async"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-6">
                    <h3 class="text-2xl font-bold text-white mb-1">Sri Lanka</h3>
                    <p class="text-white/90 text-sm">From ₹35,000</p>
                </div>
            </div>
            
            <!-- Seychelles -->
            <div class="relative overflow-hidden rounded-2xl shadow-soft hover:shadow-lg transition-all duration-300 h-48">
                <img 
                    src="https://images.unsplash.com/photo-1573843981267-be1999ff37cd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                    alt="Seychelles" 
                    class="w-full h-full object-cover"
                    loading="lazy"
                    decoding="async"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-6">
                    <h3 class="text-2xl font-bold text-white mb-1">Seychelles</h3>
                    <p class="text-white/90 text-sm">From ₹92,330</p>
                </div>
            </div>
        </div>
        
        <div class="flex justify-center mt-10">
            <a href="{{ route('destinations') }}" class="bg-brandblue hover:bg-brandblue/90 text-white font-medium py-3 px-8 rounded-full transition-all duration-300 shadow-soft hover:shadow-lg inline-flex items-center">
                View All Destinations
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>
</section>
