@props(['show' => false])

<div 
    x-data="{
        open: @js($show),
        dismissCount: 0,
        init() {
            // Check sessionStorage for dismiss count
            this.dismissCount = Number(sessionStorage.getItem('leadModalDismiss') || 0);
            if (this.dismissCount < 2) {
                setTimeout(() => { this.open = true }, 4000);
            }
            // Show on exit intent if not dismissed twice
            window.addEventListener('mouseleave', (e) => {
                if (e.clientY <= 0 && this.dismissCount < 2) {
                    this.open = true;
                }
            });
        },
        closeModal() {
            this.open = false;
            this.dismissCount++;
            sessionStorage.setItem('leadModalDismiss', this.dismissCount);
            if (this.dismissCount < 2) {
                setTimeout(() => { this.open = true }, 10000);
            }
        }
    }"
    x-init="init()"
    x-show="open"
    x-transition.opacity.duration.300ms
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/40"
    aria-modal="true" role="dialog"
>
    <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-8 relative">
        <!-- Close Button -->
        <button @click="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-saffron focus:outline-none focus-visible:ring-2 focus-visible:ring-saffron rounded-full" aria-label="Close">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Google Rating Badge -->
        <div class="absolute top-4 left-4">
            <span class="inline-flex items-center gap-1 px-3 py-1 bg-saffron/90 text-white text-sm font-semibold rounded-full shadow-soft">
                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.385-2.46a1 1 0 00-1.175 0l-3.385 2.46c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.045 9.394c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                4.8/5 on Google
            </span>
        </div>

        <!-- Heading -->
        <h2 class="text-2xl font-bold text-center text-brandblue font-poppins mb-2 mt-6">Planning a trip? We're here to help!</h2>
        <p class="text-center text-gray-600 font-open-sans mb-6">Share a few details and we'll craft the perfect holiday just for you. ✨</p>

        <!-- Form -->
        <form class="space-y-5">
            <div>
                <label for="lead_name" class="block text-sm font-semibold text-gray-900 mb-1">Full Name</label>
                <input id="lead_name" name="lead_name" type="text" required placeholder="Enter your full name" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-saffron focus:border-saffron/50 bg-white/80 font-open-sans" />
            </div>
            <div>
                <label for="lead_phone" class="block text-sm font-semibold text-gray-900 mb-1">Phone Number</label>
                <input id="lead_phone" name="lead_phone" type="tel" required placeholder="Enter your phone number" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-saffron focus:border-saffron/50 bg-white/80 font-open-sans" />
            </div>
            <div>
                <label for="lead_destination" class="block text-sm font-semibold text-gray-900 mb-1">Destination</label>
                <input id="lead_destination" name="lead_destination" type="text" required placeholder="Where would you like to travel? (e.g., Bali, Europe)" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-saffron focus:border-saffron/50 bg-white/80 font-open-sans" />
            </div>
            <p class="text-xs text-gray-500 text-center mt-2">By submitting this form, you agree to our <a href="/privacy" class="underline hover:text-saffron">Privacy Policy</a> & <a href="/terms" class="underline hover:text-saffron">User Agreement</a>.</p>
            <button type="submit" class="w-full mt-2 py-3 rounded-full bg-saffron text-white font-bold text-lg shadow-soft hover:bg-saffron/90 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-saffron">Submit</button>
        </form>
    </div>
</div> 