<header x-data="{ isOpen: false, userDropdown: false }" class="relative">
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
                    @guest
                        <a href="{{ route('login') }}" class="hidden md:inline-block px-4 py-2 rounded-lg bg-brandblue text-white font-medium hover:bg-saffron transition-colors">
                            Sign In
                        </a>
                        <a href="{{ route('register') }}" class="hidden md:inline-block px-4 py-2 rounded-lg bg-saffron text-white font-medium hover:bg-brandblue transition-colors">
                            Sign Up
                        </a>
                    @else
                        <!-- User Dropdown -->
                        <div class="relative hidden md:block">
                            <button 
                                @click="userDropdown = !userDropdown" 
                                @click.away="userDropdown = false"
                                class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-brandblue"
                            >
                                <div class="h-8 w-8 rounded-full bg-saffron text-white flex items-center justify-center font-medium">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span class="font-medium">{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            
                            <!-- Dropdown Menu -->
                            <div 
                                x-show="userDropdown" 
                                x-transition:enter="transition ease-out duration-100" 
                                x-transition:enter-start="transform opacity-0 scale-95" 
                                x-transition:enter-end="transform opacity-100 scale-100" 
                                x-transition:leave="transition ease-in duration-75" 
                                x-transition:leave-start="transform opacity-100 scale-100" 
                                x-transition:leave-end="transform opacity-0 scale-95" 
                                class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50" 
                                style="display: none;"
                            >
                                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                                
                                @if(Auth::user()->hasRole('manager'))
                                    <a href="{{ route('manager.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Manager Dashboard</a>
                                @endif
                                
                                <div class="border-t border-gray-100 my-1"></div>
                                
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Sign Out
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endguest

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
    <div 
        x-show="isOpen" 
        x-transition:enter="transition ease-out duration-200" 
        x-transition:enter-start="opacity-0 -translate-y-10" 
        x-transition:enter-end="opacity-100 translate-y-0" 
        x-transition:leave="transition ease-in duration-100" 
        x-transition:leave-start="opacity-100 translate-y-0" 
        x-transition:leave-end="opacity-0 -translate-y-10" 
        class="md:hidden bg-white border-b border-gray-200 shadow-md" 
        style="display: none;"
    >
        <div class="container mx-auto px-4 py-3 space-y-3">
            <a href="{{ route('home') }}" class="block font-medium py-2 hover:text-saffron transition-colors">Home</a>
            <a href="{{ route('about') }}" class="block font-medium py-2 hover:text-saffron transition-colors">About Us</a>
            <a href="{{ route('destinations') }}" class="block font-medium py-2 hover:text-saffron transition-colors">Destinations</a>
            <a href="{{ route('blog') }}" class="block font-medium py-2 hover:text-saffron transition-colors">Blog</a>
            <a href="{{ route('contact') }}" class="block font-medium py-2 hover:text-saffron transition-colors">Contact Us</a>
            
            <div class="pt-2 border-t border-gray-100">
                @guest
                    <div class="flex gap-3">
                        <a href="{{ route('login') }}" class="inline-block px-4 py-2 rounded-lg bg-brandblue text-white font-medium hover:bg-saffron transition-colors">
                            Sign In
                        </a>
                        <a href="{{ route('register') }}" class="inline-block px-4 py-2 rounded-lg bg-saffron text-white font-medium hover:bg-brandblue transition-colors">
                            Sign Up
                        </a>
                    </div>
                @else
                    <div class="space-y-3">
                        <div class="flex items-center gap-2">
                            <div class="h-8 w-8 rounded-full bg-saffron text-white flex items-center justify-center font-medium">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <span class="font-medium">{{ Auth::user()->name }}</span>
                        </div>
                        
                        <a href="{{ route('dashboard') }}" class="block py-2 hover:text-saffron transition-colors">Dashboard</a>
                        
                        @if(Auth::user()->hasRole('manager'))
                            <a href="{{ route('manager.dashboard') }}" class="block py-2 hover:text-saffron transition-colors">Manager Dashboard</a>
                        @endif
                        
                        <form method="POST" action="{{ route('logout') }}" class="pt-2 border-t border-gray-100">
                            @csrf
                            <button type="submit" class="w-full text-left py-2 text-red-600 hover:text-red-800 font-medium transition-colors">
                                Sign Out
                            </button>
                        </form>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</header>