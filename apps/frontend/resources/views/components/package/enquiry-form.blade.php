@props(['package_name'])

<div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft p-6 sticky top-6">
    <h3 class="text-xl font-bold text-brandblue mb-6">Enquire Now</h3>
    
    <form action="{{ route('package.enquiry') }}" method="POST" class="space-y-4">
        @csrf
        <input type="hidden" name="package" value="{{ $package_name }}">
        
        <!-- Full Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                required
                class="w-full px-4 py-2 rounded-xl border border-gray-200 focus:ring-2 focus:ring-brandblue focus:border-transparent"
                placeholder="Enter your full name"
            >
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                required
                class="w-full px-4 py-2 rounded-xl border border-gray-200 focus:ring-2 focus:ring-brandblue focus:border-transparent"
                placeholder="Enter your email"
            >
        </div>

        <!-- Mobile Number -->
        <div>
            <label for="mobile" class="block text-sm font-medium text-gray-700 mb-1">Mobile Number</label>
            <input 
                type="tel" 
                name="mobile" 
                id="mobile" 
                required
                class="w-full px-4 py-2 rounded-xl border border-gray-200 focus:ring-2 focus:ring-brandblue focus:border-transparent"
                placeholder="Enter your mobile number"
            >
        </div>

        <!-- Travel Date -->
        <div>
            <label for="travel_date" class="block text-sm font-medium text-gray-700 mb-1">Travel Date</label>
            <input 
                type="date" 
                name="travel_date" 
                id="travel_date" 
                required
                min="{{ date('Y-m-d') }}"
                class="w-full px-4 py-2 rounded-xl border border-gray-200 focus:ring-2 focus:ring-brandblue focus:border-transparent"
            >
        </div>

        <!-- Traveller Count -->
        <div>
            <label for="travellers" class="block text-sm font-medium text-gray-700 mb-1">Number of Travellers</label>
            <select 
                name="travellers" 
                id="travellers" 
                required
                class="w-full px-4 py-2 rounded-xl border border-gray-200 focus:ring-2 focus:ring-brandblue focus:border-transparent"
            >
                @for($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }} {{ $i === 1 ? 'Person' : 'People' }}</option>
                @endfor
                <option value="10+">More than 10</option>
            </select>
        </div>

        <!-- Message -->
        <div>
            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message (Optional)</label>
            <textarea 
                name="message" 
                id="message" 
                rows="3"
                class="w-full px-4 py-2 rounded-xl border border-gray-200 focus:ring-2 focus:ring-brandblue focus:border-transparent"
                placeholder="Any specific requirements or questions?"
            ></textarea>
        </div>

        <!-- Submit Button -->
        <button 
            type="submit"
            class="w-full bg-brandblue text-white font-medium px-6 py-3 rounded-xl hover:bg-brandblue/90 transition-colors duration-300 flex items-center justify-center gap-2"
        >
            Send Enquiry
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
        </button>
    </form>
</div>
