@props(['type' => 'default'])

<form method="POST" action="{{ route('contact.submit') }}" class="space-y-6">
    @csrf
    
    <!-- Name -->
    <div class="grid md:grid-cols-2 gap-6">
        <div>
            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">
                First Name
            </label>
            <input 
                type="text" 
                id="first_name" 
                name="first_name" 
                value="{{ old('first_name') }}"
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brandblue focus:border-transparent"
                required
            >
            @error('first_name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">
                Last Name
            </label>
            <input 
                type="text" 
                id="last_name" 
                name="last_name"
                value="{{ old('last_name') }}"
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brandblue focus:border-transparent"
                required
            >
            @error('last_name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Email -->
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
            Email Address
        </label>
        <input 
            type="email" 
            id="email" 
            name="email"
            value="{{ old('email') }}"
            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brandblue focus:border-transparent"
            required
        >
        @error('email')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Phone -->
    <div>
        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
            Phone Number
        </label>
        <input 
            type="tel" 
            id="phone" 
            name="phone"
            value="{{ old('phone') }}"
            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brandblue focus:border-transparent"
            required
        >
        @error('phone')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    @if($type === 'inquiry')
        <!-- Travel Date -->
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="travel_date" class="block text-sm font-medium text-gray-700 mb-1">
                    Preferred Travel Date
                </label>
                <input 
                    type="date" 
                    id="travel_date" 
                    name="travel_date"
                    value="{{ old('travel_date') }}"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brandblue focus:border-transparent"
                    required
                >
                @error('travel_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="duration" class="block text-sm font-medium text-gray-700 mb-1">
                    Duration (Days)
                </label>
                <input 
                    type="number" 
                    id="duration" 
                    name="duration"
                    value="{{ old('duration') }}"
                    min="1"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brandblue focus:border-transparent"
                    required
                >
                @error('duration')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Destination -->
        <div>
            <label for="destination" class="block text-sm font-medium text-gray-700 mb-1">
                Preferred Destination
            </label>
            <select 
                id="destination" 
                name="destination"
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brandblue focus:border-transparent"
                required
            >
                <option value="">Select a destination</option>
                <option value="rajasthan" {{ old('destination') === 'rajasthan' ? 'selected' : '' }}>Rajasthan</option>
                <option value="kerala" {{ old('destination') === 'kerala' ? 'selected' : '' }}>Kerala</option>
                <option value="goa" {{ old('destination') === 'goa' ? 'selected' : '' }}>Goa</option>
                <option value="himachal" {{ old('destination') === 'himachal' ? 'selected' : '' }}>Himachal Pradesh</option>
                <option value="andaman" {{ old('destination') === 'andaman' ? 'selected' : '' }}>Andaman Islands</option>
            </select>
            @error('destination')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    @endif

    <!-- Message -->
    <div>
        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">
            Message
        </label>
        <textarea 
            id="message" 
            name="message" 
            rows="4"
            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brandblue focus:border-transparent resize-none"
            required
        >{{ old('message') }}</textarea>
        @error('message')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Submit Button -->
    <div>
        <button 
            type="submit"
            class="w-full px-8 py-4 bg-saffron text-white font-bold rounded-xl hover:bg-brandblue transition-colors duration-300"
        >
            {{ $type === 'inquiry' ? 'Send Inquiry' : 'Send Message' }}
        </button>
    </div>
</form>
