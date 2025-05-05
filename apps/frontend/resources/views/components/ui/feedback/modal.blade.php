@props([
    'id' => null, 
    'title' => null,
    'maxWidth' => 'md', // sm, md, lg, xl, 2xl, full
    'closeButton' => true
])

@php
    // Generate a unique ID if none provided
    $id = $id ?? 'modal-'.uniqid();
    
    // Max width classes based on size
    $maxWidthClasses = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
        'full' => 'sm:max-w-full',
    ][$maxWidth] ?? 'sm:max-w-md';
@endphp

<div 
    id="{{ $id }}"
    x-data="{ open: false }" 
    x-show="open" 
    x-on:open-modal.window="if ($event.detail.id === '{{ $id }}') open = true"
    x-on:close-modal.window="if ($event.detail.id === '{{ $id }}') open = false"
    x-on:keydown.escape.window="open = false"
    x-on:open-{{ $id }}.window="open = true"
    x-on:close-{{ $id }}.window="open = false"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-95"
    x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-95"
    class="fixed inset-0 z-50 overflow-y-auto"
    style="display: none;"
    aria-labelledby="{{ $id }}-title"
    aria-modal="true" 
    role="dialog"
    tabindex="-1"
>
    <!-- Overlay Background -->
    <div 
        class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" 
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="open = false"
        aria-hidden="true"
    ></div>
    
    <!-- Modal Container -->
    <div class="flex items-center justify-center min-h-screen p-4">
        <div 
            class="bg-white rounded-lg overflow-hidden shadow-xl w-full {{ $maxWidthClasses }} mx-auto"
            x-show="open"
            x-trap.noscroll="open"
            @click.outside="open = false"
        >
            <!-- Modal Header -->
            @if($title || $closeButton)
            <div class="px-6 py-4 bg-gray-50 border-b flex justify-between items-center">
                @if($title)
                <h3 class="text-lg font-semibold text-gray-900" id="{{ $id }}-title">{{ $title }}</h3>
                @else
                <div></div>
                @endif
                
                @if($closeButton)
                <button 
                    @click="open = false" 
                    type="button" 
                    class="text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" 
                    aria-label="Close"
                >
                    <span class="sr-only">Close</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                @endif
            </div>
            @endif

            <!-- Modal Content -->
            <div class="p-6">
                {{ $slot }}
            </div>
            
            <!-- Modal Footer (Optional) -->
            @if(isset($footer))
            <div class="px-6 py-4 bg-gray-50 border-t">
                {{ $footer }}
            </div>
            @endif
        </div>
    </div>
</div>

{{-- JavaScript to initialize Alpine JS and dispatch events if needed --}}
<script>
    // Helper functions to open and close modal from anywhere
    window.openModal = (modalId) => {
        window.dispatchEvent(new CustomEvent('open-modal', { detail: { id: modalId } }));
    }
    
    window.closeModal = (modalId) => {
        window.dispatchEvent(new CustomEvent('close-modal', { detail: { id: modalId } }));
    }
</script> 