@props(['package'])

<div
    x-data="{showLeadModal: false}"
    class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 cursor-pointer"
    @click="showLeadModal = true"
>
    <div class="relative">
        <img 
            src="{{ $package['image'] }}" 
            alt="{{ $package['title'] }}" 
            class="w-full h-48 object-cover"
            loading="lazy"
        />
        <div class="absolute top-4 right-4 bg-saffron text-white px-3 py-1 rounded-full text-sm font-semibold">
            ₹{{ number_format($package['price']) }}
        </div>
        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4">
            <div class="text-white font-medium flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ $package['duration'] }}
            </div>
        </div>
    </div>
    <div class="p-5">
        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $package['title'] }}</h3>
        <p class="text-gray-600 text-sm mb-4">{{ $package['description'] }}</p>
        <div class="flex flex-wrap gap-2 mb-4">
            @foreach($package['features'] as $feature)
                <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">{{ $feature }}</span>
            @endforeach
        </div>
        <button class="w-full bg-brandblue hover:bg-brandblue/90 text-white font-semibold py-2 rounded transition-colors duration-300">
            View Package
        </button>
    </div>
    
    <!-- Lead Capture Modal -->
    <div 
        x-show="showLeadModal"
        x-transition.opacity.duration.300ms
        @click.away="showLeadModal = false"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 overflow-y-auto bg-black/40"
        style="display: none;"
    >
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md my-8 mx-auto overflow-hidden relative">
            <!-- Close Button -->
            <button @click="showLeadModal = false" class="absolute top-4 right-4 text-gray-400 hover:text-saffron focus:outline-none focus-visible:ring-2 focus-visible:ring-saffron rounded-full" aria-label="Close">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="p-6 sm:p-8 max-h-[90vh] overflow-y-auto">
                <!-- Heading -->
                <h2 class="text-2xl font-bold text-center text-brandblue font-poppins mb-2 mt-6">Interested in {{ $package['title'] }}?</h2>
                <p class="text-center text-gray-600 font-open-sans mb-6">Share your details and our travel expert will contact you shortly!</p>

                <!-- Form -->
                <form action="{{ route('package.enquiry') }}" method="POST" class="space-y-5">
                    @csrf
                    <input type="hidden" name="package" value="{{ $package['title'] }}">
                    <div>
                        <label for="lead_name" class="block text-sm font-semibold text-gray-900 mb-1">Full Name</label>
                        <input id="lead_name" name="name" type="text" required placeholder="Enter your full name" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-saffron focus:border-saffron/50 bg-white/80 font-open-sans" />
                    </div>
                    <div>
                        <label for="lead_email" class="block text-sm font-semibold text-gray-900 mb-1">Email</label>
                        <input id="lead_email" name="email" type="email" required placeholder="Enter your email" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-saffron focus:border-saffron/50 bg-white/80 font-open-sans" />
                    </div>
                    <div>
                        <label for="lead_phone" class="block text-sm font-semibold text-gray-900 mb-1">Phone Number</label>
                        <input id="lead_phone" name="mobile" type="tel" required placeholder="Enter your phone number" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-saffron focus:border-saffron/50 bg-white/80 font-open-sans" />
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="travel_date" class="block text-sm font-semibold text-gray-900 mb-1">Travel Date</label>
                            <input id="travel_date" name="travel_date" type="date" required class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-saffron focus:border-saffron/50 bg-white/80 font-open-sans" />
                        </div>
                        <div>
                            <label for="travellers" class="block text-sm font-semibold text-gray-900 mb-1">Travellers</label>
                            <select id="travellers" name="travellers" required class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-saffron focus:border-saffron/50 bg-white/80 font-open-sans">
                                <option value="">Select</option>
                                <option value="1 Person">1 Person</option>
                                <option value="2 People">2 People</option>
                                <option value="3-5 People">3-5 People</option>
                                <option value="6+ People">6+ People</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-semibold text-gray-900 mb-1">Message (Optional)</label>
                        <textarea id="message" name="message" rows="3" placeholder="Any specific requirements?" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-saffron focus:border-saffron/50 bg-white/80 font-open-sans"></textarea>
                    </div>
                    <p class="text-xs text-gray-500 text-center mt-2">By submitting this form, you agree to our <a href="/privacy" class="underline hover:text-saffron">Privacy Policy</a>.</p>
                    <button type="submit" class="w-full mt-2 py-3 rounded-full bg-saffron text-white font-bold text-lg shadow-soft hover:bg-saffron/90 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-saffron">Get a Quote</button>
                </form>
            </div>
        </div>
    </div>
</div> 