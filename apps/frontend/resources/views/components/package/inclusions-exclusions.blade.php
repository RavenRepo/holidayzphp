@props(['inclusions', 'exclusions'])

<div class="grid md:grid-cols-2 gap-6">
    <!-- Inclusions -->
    <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft p-6">
        <div class="flex items-center gap-3 mb-6">
            <span class="text-saffron">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </span>
            <h3 class="text-xl font-bold text-brandblue">Inclusions</h3>
        </div>
        <ul class="space-y-3">
            @foreach($inclusions as $item)
                <li class="flex items-start gap-3">
                    <span class="text-saffron mt-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </span>
                    <span class="text-gray-700">{{ $item }}</span>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Exclusions -->
    <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft p-6">
        <div class="flex items-center gap-3 mb-6">
            <span class="text-brandblue">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </span>
            <h3 class="text-xl font-bold text-brandblue">Exclusions</h3>
        </div>
        <ul class="space-y-3">
            @foreach($exclusions as $item)
                <li class="flex items-start gap-3">
                    <span class="text-brandblue mt-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </span>
                    <span class="text-gray-700">{{ $item }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
