@props(['duration', 'price', 'highlights'])

<div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft p-6">
    <!-- Duration and Price -->
    <div class="flex justify-between items-center mb-8">
        <div class="flex items-center gap-2">
            <span class="text-brandblue">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </span>
            <span class="text-lg font-medium text-gray-700">{{ $duration }}</span>
        </div>
        <div class="text-right">
            <span class="text-sm text-gray-500">Starting from</span>
            <div class="text-2xl font-bold text-brandblue">₹{{ number_format($price) }}</div>
        </div>
    </div>

    <!-- Highlights -->
    <div>
        <h3 class="text-xl font-bold text-brandblue mb-4">Highlights</h3>
        <ul class="space-y-3">
            @foreach($highlights as $highlight)
                <li class="flex items-start gap-3">
                    <span class="text-saffron mt-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </span>
                    <span class="text-gray-700">{{ $highlight }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
