@props(['package'])
<div class="card flex flex-col h-full transition-transform duration-150 hover:scale-105 hover:shadow-lg animate-fadeIn">
    <img src="{{ $package['image'] }}" alt="{{ $package['title'] }}" class="w-full h-48 object-cover rounded-t-lg">
    <div class="card-body flex flex-col flex-1">
        <div class="flex items-center justify-between mb-2">
            <h3 class="font-heading text-xl font-bold text-gray-900">{{ $package['title'] }}</h3>
            <span class="inline-block bg-saffron text-white text-xs font-semibold px-3 py-1 rounded-full">{{ $package['duration_days'] }} days</span>
        </div>
        <p class="font-body text-gray-700 text-sm mb-4 flex-1">{{ Str::limit($package['description'], 90) }}</p>
        <div class="flex items-center justify-between mt-auto">
            <span class="font-bold text-saffron text-lg">₹{{ number_format($package['price']) }}</span>
            <a href="#" class="btn btn-outline-primary btn-sm transition-colors">View Details</a>
        </div>
    </div>
</div> 