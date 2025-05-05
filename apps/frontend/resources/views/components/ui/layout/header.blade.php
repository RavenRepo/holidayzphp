<header x-data="{ isOpen: false }" class="relative">
    <nav class="bg-white border-b border-gray-200 px-4 lg:px-8 py-3 sticky top-0 z-50 shadow-sm">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <!-- Logo & Brand -->
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/logo.svg') }}" class="h-8 w-8" alt="Holidayz Manager Logo" />
                    <span class="self-center text-2xl font-poppins font-bold text-brandblue whitespace-nowrap">Holidayz Manager</span>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex gap-8 font-body text-lg">
                    <a href="{{ route('home') }}" class="hover:text-saffron transition-colors">Home</a>
                    <a href="{{ route('about') }}" class="hover:text-saffron transition-colors">About Us</a>
                    <a href="{{ route('destinations') }}" class="hover:text-saffron transition-colors">Destinations</a>
                    <a href="{{ route('blog') }}" class="hover:text-saffron transition-colors">Blog</a>
                    <a href="{{ route('contact') }}" class="hover:text-saffron transition-colors">Contact</a>
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-2 lg:gap-4">
                    <a href="{{ route('login') }}" class="hidden md:inline-block px-4 py-2 rounded-lg bg-brandblue text-white font-medium hover:bg-saffron transition-colors">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="hidden md:inline-block px-4 py-2 rounded-lg bg-saffron text-white font-medium hover:bg-brandblue transition-colors">
                        Get Started
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
    <x-ui.navigation.main-nav :isOpen="true" />
</header>