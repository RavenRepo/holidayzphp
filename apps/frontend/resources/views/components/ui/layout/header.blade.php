<header>
    <nav class="bg-white border-b border-gray-200 px-4 lg:px-8 py-3 sticky top-0 z-50 shadow-sm">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-2xl">
            <!-- Logo & Brand -->
            <a href="/" class="flex items-center gap-2">
                <img src="/logo.svg" class="h-8 w-8" alt="Holidayz Manager Logo" />
                <span class="self-center text-2xl font-poppins font-bold text-brandblue whitespace-nowrap">Holidayz Manager</span>
            </a>
            <!-- Desktop Nav -->
            <div class="hidden lg:flex items-center gap-8">
                <a href="#" class="text-brandblue font-medium hover:text-saffron transition-colors">Packages</a>
                <a href="#" class="text-brandblue font-medium hover:text-saffron transition-colors">Blog</a>
                <a href="#" class="text-brandblue font-medium hover:text-saffron transition-colors">Itinerary</a>
                <a href="#" class="text-brandblue font-medium hover:text-saffron transition-colors">Contact</a>
            </div>
            <!-- Actions -->
            <div class="flex items-center gap-2 lg:gap-4">
                <a href="#" class="hidden md:inline-block px-4 py-2 rounded-lg bg-brandblue text-white font-medium hover:bg-saffron transition-colors">Login</a>
                <a href="#" class="hidden md:inline-block px-4 py-2 rounded-lg bg-saffron text-white font-medium hover:bg-brandblue transition-colors">Get Started</a>
                <!-- Mobile menu button -->
                <button data-collapse-toggle="mobile-menu" type="button" class="inline-flex items-center p-2 text-sm text-brandblue rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-brandblue" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
            <!-- Mobile Nav -->
            <div class="hidden w-full lg:hidden mt-4" id="mobile-menu">
                <ul class="flex flex-col gap-2 font-medium">
                    <li><a href="#" class="block py-2 px-4 text-brandblue hover:bg-saffron hover:text-white rounded transition">Packages</a></li>
                    <li><a href="#" class="block py-2 px-4 text-brandblue hover:bg-saffron hover:text-white rounded transition">Blog</a></li>
                    <li><a href="#" class="block py-2 px-4 text-brandblue hover:bg-saffron hover:text-white rounded transition">Itinerary</a></li>
                    <li><a href="#" class="block py-2 px-4 text-brandblue hover:bg-saffron hover:text-white rounded transition">Contact</a></li>
                    <li><a href="#" class="block py-2 px-4 bg-brandblue text-white rounded hover:bg-saffron transition">Login</a></li>
                    <li><a href="#" class="block py-2 px-4 bg-saffron text-white rounded hover:bg-brandblue transition">Get Started</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>