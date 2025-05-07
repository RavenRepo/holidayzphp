<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-xl overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="p-8 md:p-12 lg:p-16">
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Get Personalized Travel Plans</h2>
                        <p class="text-gray-600">
                            Tell us about your dream vacation, and our travel experts will create a personalized itinerary just for you. No obligations, just inspiration!
                        </p>
                    </div>
                    
                    <form method="POST" action="{{ route('lead.submit') }}" class="space-y-4">
                        @csrf
                        <div>
                            <label for="lead-name" class="block text-sm font-medium text-gray-700 mb-1">Full Name<span class="text-red-500">*</span></label>
                            <input id="lead-name" name="name" type="text" required class="w-full rounded-md border border-gray-300 bg-white shadow-sm focus:border-brandblue focus:ring focus:ring-brandblue focus:ring-opacity-50" />
                        </div>
                        <div>
                            <label for="lead-email" class="block text-sm font-medium text-gray-700 mb-1">Email<span class="text-red-500">*</span></label>
                            <input id="lead-email" name="email" type="email" required class="w-full rounded-md border border-gray-300 bg-white shadow-sm focus:border-brandblue focus:ring focus:ring-brandblue focus:ring-opacity-50" />
                        </div>
                        <div class="flex space-x-2">
                            <div class="w-1/3">
                                <label for="lead-country" class="block text-sm font-medium text-gray-700 mb-1 sr-only">Country</label>
                                <select id="lead-country" name="country_code" class="w-full rounded-md border border-gray-300 bg-white shadow-sm focus:border-brandblue focus:ring focus:ring-brandblue focus:ring-opacity-50">
                                    <option value="+91">+91</option>
                                    <option value="+1">+1</option>
                                    <option value="+44">+44</option>
                                    <!-- Add more country codes as needed -->
                                </select>
                            </div>
                            <div class="w-2/3">
                                <label for="lead-phone" class="block text-sm font-medium text-gray-700 mb-1 sr-only">Your Phone</label>
                                <input id="lead-phone" name="phone" type="tel" required placeholder="Your Phone" class="w-full rounded-md border border-gray-300 bg-white shadow-sm focus:border-brandblue focus:ring focus:ring-brandblue focus:ring-opacity-50" />
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <div class="w-1/2">
                                <label for="lead-date" class="block text-sm font-medium text-gray-700 mb-1">Travel Date</label>
                                <input id="lead-date" name="travel_date" type="date" class="w-full rounded-md border border-gray-300 bg-white shadow-sm focus:border-brandblue focus:ring focus:ring-brandblue focus:ring-opacity-50" />
                            </div>
                            <div class="w-1/2">
                                <label for="lead-count" class="block text-sm font-medium text-gray-700 mb-1">Traveller Count<span class="text-red-500">*</span></label>
                                <input id="lead-count" name="traveller_count" type="number" min="1" required class="w-full rounded-md border border-gray-300 bg-white shadow-sm focus:border-brandblue focus:ring focus:ring-brandblue focus:ring-opacity-50" />
                            </div>
                        </div>
                        <div>
                            <label for="lead-message" class="block text-sm font-medium text-gray-700 mb-1">Message...</label>
                            <textarea id="lead-message" name="message" rows="3" class="w-full rounded-md border border-gray-300 bg-white shadow-sm focus:border-brandblue focus:ring focus:ring-brandblue focus:ring-opacity-50" placeholder="Message..."></textarea>
                        </div>
                        <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-md transition-colors duration-200">Connect with an Expert</button>
                    </form>
                </div>
                
                <div class="hidden lg:block relative">
                    <img 
                        src="https://images.unsplash.com/photo-1544161515-4ab6ce6db874?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                        alt="Travel Planning" 
                        class="absolute inset-0 w-full h-full object-cover"
                    >
                    <div class="absolute inset-0 bg-gradient-to-r from-brandblue/50 to-transparent"></div>
                    <div class="absolute inset-0 flex items-center justify-center p-12">
                        <div class="bg-white bg-opacity-90 rounded-lg p-6 max-w-md">
                            <div class="flex items-center mb-4">
                                <div class="mr-4 bg-saffron rounded-full p-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 text-lg">Fast Response</h3>
                                    <p class="text-gray-600 text-sm">Our experts will contact you within 24 hours</p>
                                </div>
                            </div>
                            <div class="flex items-center mb-4">
                                <div class="mr-4 bg-saffron rounded-full p-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 text-lg">No Obligation</h3>
                                    <p class="text-gray-600 text-sm">Free consultation with no commitment required</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="mr-4 bg-saffron rounded-full p-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 text-lg">Secure & Private</h3>
                                    <p class="text-gray-600 text-sm">Your information is always protected</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 