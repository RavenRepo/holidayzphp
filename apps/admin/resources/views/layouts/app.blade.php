<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="bg-gray-100 min-h-screen font-sans antialiased">
    <div class="min-h-screen flex flex-col">
        {{-- Header (optional) --}}
        <header class="bg-white shadow mb-6">
            <div class="container mx-auto px-4 py-4 flex items-center justify-between">
                <h1 class="text-xl font-bold text-brandblue">@yield('title', 'Admin Panel')</h1>
                {{-- Add logo or nav here if needed --}}
            </div>
        </header>
        {{-- Main Content --}}
        <main class="flex-1 container mx-auto px-4">
            @yield('content')
        </main>
        {{-- Footer (optional) --}}
        <footer class="bg-white border-t mt-8 py-4 text-center text-xs text-gray-500">
            &copy; {{ date('Y') }} Holidayz Admin Panel. All rights reserved.
        </footer>
    </div>
    @stack('scripts')
</body>
</html> 