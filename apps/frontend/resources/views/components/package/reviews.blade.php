@props(['reviews'])

<div class="space-y-6">
    @foreach($reviews as $review)
        <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft p-6">
            <div class="flex items-start gap-4">
                <!-- Avatar -->
                <div class="w-12 h-12 rounded-full bg-brandblue/10 flex items-center justify-center text-brandblue font-bold text-xl">
                    {{ strtoupper(substr($review['name'], 0, 1)) }}
                </div>

                <div class="flex-1">
                    <!-- Header -->
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h4 class="font-bold text-gray-900">{{ $review['name'] }}</h4>
                            <p class="text-sm text-gray-500">{{ $review['date'] }}</p>
                        </div>
                        <div class="flex gap-1">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="{{ $i <= $review['rating'] ? 'text-saffron' : 'text-gray-300' }}">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </span>
                            @endfor
                        </div>
                    </div>

                    <!-- Review Content -->
                    <div class="prose prose-sm prose-brandblue max-w-none">
                        <p class="text-gray-700">{{ $review['comment'] }}</p>
                    </div>

                    <!-- Trip Details -->
                    @if(isset($review['trip_date']) || isset($review['travel_type']))
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <div class="flex gap-6 text-sm text-gray-500">
                                @if(isset($review['trip_date']))
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <span>Traveled {{ $review['trip_date'] }}</span>
                                    </div>
                                @endif

                                @if(isset($review['travel_type']))
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                        <span>{{ $review['travel_type'] }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
