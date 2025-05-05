<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Holidayz - Your Travel Companion' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <x-ui.layout.header />
    
    <main>
        {{ $slot }}
    </main>

    <x-ui.layout.footer />
</body>
</html>
