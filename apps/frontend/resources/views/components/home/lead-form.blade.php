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
                    
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Your Name</label>
                                <input 
                                    type="text" 
                                    id="name" 
                                    name="name" 
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-brandblue focus:ring focus:ring-brandblue focus:ring-opacity-50" 
                                    placeholder="John Doe"
                                    required
                                >
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-brandblue focus:ring focus:ring-brandblue focus:ring-opacity-50" 
                                    placeholder="john@example.com"
                                    required
                                >
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                <input 
                                    type="tel" 
                                    id="phone" 
                                    name="phone" 
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-brandblue focus:ring focus:ring-brandblue focus:ring-opacity-50" 
                                    placeholder="+91 98765 43210"
                                >
                            </div>
                            <div>
                                <label for="travel_date" class="block text-sm font-medium text-gray-700 mb-1">When do you plan to travel?</label>
                                <select id="travel_date" name="travel_date" class="w-full rounded-md border-gray-300 shadow-sm focus:border-brandblue focus:ring focus:ring-brandblue focus:ring-opacity-50">
                                    <option value="">Select timeframe</option>
                                    <option value="within_month">Within a month</option>
                                    <option value="1_3_months">1-3 months</option>
                                    <option value="3_6_months">3-6 months</option>
                                    <option value="6_plus_months">More than 6 months</option>
                                    <option value="not_sure">Not sure yet</option>
                                </select>
                            </div>
                        </div>
                        
                        <div>
                            <label for="lead-form-destination" class="block text-sm font-medium text-gray-700 mb-1">Preferred Destination(s)</label>
                            <select id="lead-form-destination" name="destination" class="w-full rounded-md border-gray-300 shadow-sm focus:border-brandblue focus:ring focus:ring-brandblue focus:ring-opacity-50">
                                <option value="">Select destination</option>
                                <option value="goa">Goa</option>
                                <option value="kerala">Kerala</option>
                                <option value="rajasthan">Rajasthan</option>
                                <option value="himachal">Himachal Pradesh</option>
                                <option value="andaman">Andaman & Nicobar</option>
                                <option value="kashmir">Kashmir</option>
                                <option value="northeast">Northeast India</option>
                                <option value="multiple">Multiple Destinations</option>
                                <option value="not_sure">Not Sure (Need Recommendations)</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Tell us about your dream vacation</label>
                            <textarea 
                                id="message" 
                                name="message" 
                                rows="4" 
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-brandblue focus:ring focus:ring-brandblue focus:ring-opacity-50" 
                                placeholder="Include details about your interests, preferences, budget, etc."
                            ></textarea>
                        </div>
                        
                        <div class="flex items-start">
                            <input 
                                id="subscribe" 
                                name="subscribe" 
                                type="checkbox" 
                                class="h-4 w-4 text-brandblue border-gray-300 rounded focus:ring-brandblue"
                                checked
                            >
                            <label for="subscribe" class="ml-2 block text-sm text-gray-600">
                                I'd like to receive travel inspiration, deals and updates via email. You can unsubscribe anytime.
                            </label>
                        </div>
                        
                        <div>
                            <button type="submit" class="w-full bg-brandblue hover:bg-brandblue/90 text-white font-medium py-3 px-4 rounded-md transition duration-300">
                                Send My Travel Request
                            </button>
                        </div>
                        
                        <p class="text-xs text-gray-500 text-center">
                            By submitting this form, you agree to our <a href="/privacy-policy" class="text-brandblue hover:underline">Privacy Policy</a> and <a href="/terms-of-service" class="text-brandblue hover:underline">Terms of Service</a>.
                        </p>
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