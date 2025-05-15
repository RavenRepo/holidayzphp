<header x-data="{ isOpen: false }" class="relative">
    <nav class="bg-white border-b border-gray-200 px-4 lg:px-8 py-3 sticky top-0 z-50 shadow-sm">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <!-- Logo & Brand -->
                <a href="{{ route('home') }}" class="flex items-center gap-2 focus:outline-none focus-visible:ring-2 focus-visible:ring-saffron focus-visible:ring-offset-2 rounded-md">
                    <span class="h-8 w-auto block" aria-label="Holidayz Manager Logo">
                        <svg viewBox="0 0 480 64" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-8 w-auto">
                            <text x="0" y="50" font-family="Poppins, Arial, sans-serif" font-size="48" font-weight="bold" fill="#1A3399">holidayz</text>
                            <text x="215" y="50" font-family="Poppins, Arial, sans-serif" font-size="48" font-weight="normal" fill="#1A3399">Manager</text>
                        </svg>
                    </span>
                    <span class="self-center text-2xl font-poppins font-bold text-brandblue whitespace-nowrap sr-only">Holidayz Manager</span>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex gap-8 font-body text-lg font-bold">
                    <a href="{{ route('home') }}" class="font-large hover:text-saffron transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-saffron focus-visible:ring-offset-2 rounded-md">Home</a>
                    <a href="{{ route('about') }}" class="font-large hover:text-saffron transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-saffron focus-visible:ring-offset-2 rounded-md">About Us</a>
                    <a href="{{ route('destinations') }}" class="font-large hover:text-saffron transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-saffron focus-visible:ring-offset-2 rounded-md">Destinations</a>
                    <a href="{{ route('blog') }}" class="font-large hover:text-saffron transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-saffron focus-visible:ring-offset-2 rounded-md">Blog</a>
                    <a href="{{ route('contact') }}" class="font-large hover:text-saffron transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-saffron focus-visible:ring-offset-2 rounded-md">Contact Us</a>
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-2 lg:gap-4">
                    <a href="{{ route('login') }}" class="hidden md:inline-block px-4 py-2 rounded-lg bg-brandblue text-white font-medium hover:bg-saffron transition-colors">
                        Sign In
                    </a>
                    <a href="{{ route('register') }}" class="hidden md:inline-block px-4 py-2 rounded-lg bg-saffron text-white font-medium hover:bg-brandblue transition-colors">
                        Sign Up
                    </a>

                    <!-- Mobile Menu Button -->
                    <button 
                        @click="isOpen = !isOpen" 
                        class="inline-flex items-center p-2 text-sm text-brandblue rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-brandblue" 
                        :aria-expanded="isOpen"
                        aria-controls="mobile-menu"
                        aria-label="Toggle menu"
                    >
                        <svg 
                            class="w-6 h-6" 
                            fill="none" 
                            stroke="currentColor" 
                            viewBox="0 0 24 24"
                            x-show="!isOpen"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg 
                            class="w-6 h-6" 
                            fill="none" 
                            stroke="currentColor" 
                            viewBox="0 0 24 24"
                            x-show="isOpen"
                            style="display: none;"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Navigation -->
    {{-- <x-ui.navigation.main-nav :isOpen="true" /> --}}
</header>