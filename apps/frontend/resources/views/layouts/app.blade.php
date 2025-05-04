<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Holidayz Manager')</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS (Vite) -->
    @vite('resources/css/app.css')
</head>
<body class="bg-white min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-brandblue text-white">
        <div class="container mx-auto flex items-center justify-between py-4 px-4 md:px-8">
            <div class="flex items-center gap-2">
                <span class="font-heading text-2xl font-bold tracking-tight">Holidayz Manager</span>
            </div>
            <nav class="hidden md:flex gap-8 font-body text-lg">
                <a href="#" class="hover:text-saffron transition-colors">Packages</a>
                <a href="#" class="hover:text-saffron transition-colors">Blog</a>
                <a href="#" class="hover:text-saffron transition-colors">Itinerary</a>
                <a href="#" class="hover:text-saffron transition-colors">Contact</a>
            </nav>
            <!-- Mobile menu button (Alpine.js placeholder) -->
            <button class="md:hidden focus:outline-none" aria-label="Open menu">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-brandblue text-white mt-8">
        <div class="container mx-auto py-8 px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <div class="font-heading text-xl font-bold mb-2">Holidayz Manager</div>
                <p class="text-sm text-gray-200">Your trusted travel partner for curated packages and custom itineraries.</p>
            </div>
            <div>
                <div class="font-semibold mb-2">Quick Links</div>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:text-saffron">Packages</a></li>
                    <li><a href="#" class="hover:text-saffron">Blog</a></li>
                    <li><a href="#" class="hover:text-saffron">Contact</a></li>
                </ul>
            </div>
            <div>
                <div class="font-semibold mb-2">Contact</div>
                <p class="text-sm">info@holidayz-manager.com</p>
                <p class="text-sm">+1 234 567 8900</p>
            </div>
            <div>
                <div class="font-semibold mb-2">Follow Us</div>
                <div class="flex gap-3">
                    <a href="#" class="hover:text-saffron" aria-label="Twitter"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557a9.93 9.93 0 0 1-2.828.775 4.932 4.932 0 0 0 2.165-2.724c-.951.564-2.005.974-3.127 1.195A4.92 4.92 0 0 0 16.616 3c-2.73 0-4.942 2.21-4.942 4.932 0 .386.045.763.127 1.124C7.728 8.807 4.1 6.884 1.671 3.965c-.423.722-.666 1.561-.666 2.475 0 1.708.87 3.216 2.188 4.099a4.904 4.904 0 0 1-2.237-.616c-.054 2.281 1.581 4.415 3.949 4.89a4.936 4.936 0 0 1-2.224.084c.627 1.956 2.444 3.377 4.6 3.417A9.867 9.867 0 0 1 0 21.543a13.94 13.94 0 0 0 7.548 2.209c9.057 0 14.009-7.496 14.009-13.986 0-.21-.005-.423-.014-.633A9.936 9.936 0 0 0 24 4.557z"/></svg></a>
                    <a href="#" class="hover:text-saffron" aria-label="Facebook"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35C.597 0 0 .592 0 1.326v21.348C0 23.408.597 24 1.326 24h11.495v-9.294H9.691v-3.622h3.13V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.797.143v3.24l-1.918.001c-1.504 0-1.797.715-1.797 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116C23.403 24 24 23.408 24 22.674V1.326C24 .592 23.403 0 22.675 0"/></svg></a>
                </div>
            </div>
        </div>
        <div class="text-center text-xs text-gray-300 mt-4 pb-2">&copy; {{ date('Y') }} Holidayz Manager. All rights reserved.</div>
    </footer>
</body>
</html> 