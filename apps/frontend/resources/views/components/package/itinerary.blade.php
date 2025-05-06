@props(['days'])

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8" x-data="{ selected: 0 }">
    @foreach($days as $index => $day)
        <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft overflow-hidden hover:shadow-lg transition-all duration-300">
            <!-- Demo Unsplash Image -->
            <img 
                src="{{ $day['image'] ?? 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80' }}" 
                alt="Day {{ $index + 1 }} image" 
                class="w-full h-48 object-cover rounded-t-2xl mb-0"
                loading="lazy"
                decoding="async"
            >
            <button 
                class="w-full px-8 py-6 flex items-center justify-between text-left hover:bg-gray-50/50 transition-colors duration-300"
                @click="selected !== {{ $index }} ? selected = {{ $index }} : selected = null"
            >
                <div>
                    <span class="text-sm text-saffron font-medium mb-1 block">Day {{ $index + 1 }}</span>
                    <h3 class="text-xl font-bold text-brandblue">{{ $day['title'] }}</h3>
                </div>
                <span class="text-brandblue transform transition-transform duration-300" :class="{'rotate-180': selected === {{ $index }}}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </span>
            </button>

            <div 
                x-show="selected === {{ $index }}"
                x-collapse
                class="px-8 pb-8"
            >
                <p class="text-lg text-gray-700 mb-8 leading-relaxed">{{ $day['description'] }}</p>

                <!-- Activities -->
                <div class="mb-8">
                    <h4 class="text-lg font-medium text-brandblue mb-4">Today's Activities:</h4>
                    <ul class="grid gap-3 text-gray-700">
                        @foreach($day['activities'] as $activity)
                            <li class="flex items-start gap-3">
                                <span class="text-saffron mt-1">•</span>
                                <span class="text-lg">{{ $activity }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Meals -->
                <div>
                    <h4 class="text-lg font-medium text-brandblue mb-4">Meals:</h4>
                    <div class="flex gap-8">
                        <div class="flex items-center gap-2">
                            <span class="{{ $day['meals']['breakfast'] ? 'text-saffron' : 'text-gray-400' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            <span class="text-lg {{ $day['meals']['breakfast'] ? 'text-gray-700' : 'text-gray-400' }}">Breakfast</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="{{ $day['meals']['lunch'] ? 'text-saffron' : 'text-gray-400' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            <span class="text-lg {{ $day['meals']['lunch'] ? 'text-gray-700' : 'text-gray-400' }}">Lunch</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="{{ $day['meals']['dinner'] ? 'text-saffron' : 'text-gray-400' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            <span class="text-lg {{ $day['meals']['dinner'] ? 'text-gray-700' : 'text-gray-400' }}">Dinner</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
