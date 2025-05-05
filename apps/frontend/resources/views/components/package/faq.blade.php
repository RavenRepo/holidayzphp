@props(['faqs'])

<div class="space-y-4">
    @foreach($faqs as $faq)
        <div x-data="{ open: false }" class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft overflow-hidden">
            <button 
                @click="open = !open" 
                class="w-full flex items-center justify-between p-6 text-left"
                :class="{ 'border-b border-gray-100': open }"
            >
                <h3 class="font-bold text-gray-900 pr-8">{{ $faq['question'] }}</h3>
                <svg 
                    class="w-5 h-5 text-brandblue flex-shrink-0 transition-transform duration-300"
                    :class="{ 'rotate-180': open }"
                    fill="none" 
                    stroke="currentColor" 
                    viewBox="0 0 24 24"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <div 
                x-show="open" 
                x-collapse 
                class="p-6 bg-gray-50/50"
            >
                <div class="prose prose-brandblue max-w-none">
                    {!! $faq['answer'] !!}
                </div>
            </div>
        </div>
    @endforeach
</div>
