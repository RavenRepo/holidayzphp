@props(['inclusions', 'exclusions'])

<div class="grid md:grid-cols-2 gap-6 md:gap-8">
    <!-- Inclusions -->
    <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 p-8 shadow-soft hover:shadow-lg transition-all duration-300">
        <h3 class="text-2xl font-bold text-brandblue mb-6">Inclusions</h3>
        <ul class="space-y-4">
            @foreach($inclusions as $item)
                <li class="flex items-start gap-4">
                    <span class="text-saffron text-xl mt-0.5">✓</span>
                    <span class="text-lg text-gray-700">{{ $item }}</span>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Exclusions -->
    <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 p-8 shadow-soft hover:shadow-lg transition-all duration-300">
        <h3 class="text-2xl font-bold text-brandblue mb-6">Exclusions</h3>
        <ul class="space-y-4">
            @foreach($exclusions as $item)
                <li class="flex items-start gap-4">
                    <span class="text-gray-400 text-xl mt-0.5">✕</span>
                    <span class="text-lg text-gray-700">{{ $item }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
