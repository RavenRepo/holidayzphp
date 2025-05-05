@props(['days'])

<div class="space-y-4">
    @foreach($days as $index => $day)
        <div x-data="{ open: false }" class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft overflow-hidden">
            <!-- Day Header -->
            <button 
                @click="open = !open" 
                class="w-full flex items-center justify-between p-6 text-left"
                :class="{ 'border-b border-gray-100': open }"
            >
                <div class="flex items-center gap-4">
                    <span class="flex items-center justify-center w-12 h-12 rounded-full bg-brandblue/10 text-brandblue font-bold">
                        Day {{ $index + 1 }}
                    </span>
                    <h3 class="text-lg font-bold text-brandblue">{{ $day['title'] }}</h3>
                </div>
                <svg 
                    class="w-5 h-5 text-brandblue transition-transform duration-300"
                    :class="{ 'rotate-180': open }"
                    fill="none" 
                    stroke="currentColor" 
                    viewBox="0 0 24 24"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <!-- Day Details -->
            <div 
                x-show="open" 
                x-collapse 
                class="p-6 bg-gray-50/50"
            >
                <div class="prose prose-brandblue max-w-none">
                    {!! $day['description'] !!}
                </div>

                @if(isset($day['activities']) && count($day['activities']) > 0)
                    <div class="mt-4">
                        <h4 class="font-medium text-gray-700 mb-2">Activities:</h4>
                        <ul class="space-y-2">
                            @foreach($day['activities'] as $activity)
                                <li class="flex items-start gap-2">
                                    <span class="text-saffron mt-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </span>
                                    <span class="text-gray-600">{{ $activity }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(isset($day['meals']))
                    <div class="mt-4 flex items-center gap-6">
                        @if($day['meals']['breakfast'])
                            <div class="flex items-center gap-2">
                                <span class="text-saffron">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8 4-8-4V5l8 4 8-4v2z"/>
                                    </svg>
                                </span>
                                <span class="text-sm text-gray-600">Breakfast</span>
                            </div>
                        @endif

                        @if($day['meals']['lunch'])
                            <div class="flex items-center gap-2">
                                <span class="text-saffron">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                </span>
                                <span class="text-sm text-gray-600">Lunch</span>
                            </div>
                        @endif

                        @if($day['meals']['dinner'])
                            <div class="flex items-center gap-2">
                                <span class="text-saffron">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                                    </svg>
                                </span>
                                <span class="text-sm text-gray-600">Dinner</span>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
