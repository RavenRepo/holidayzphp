@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-saffron/10 via-white to-brandblue/5 py-12 px-4">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-card p-8 flex flex-col items-center">
        {{-- Logo or Brand --}}
        <div class="mb-6">
            <svg class="h-10 w-auto mx-auto text-brandblue" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="20" cy="20" r="20" fill="#0056B3"/>
                <text x="50%" y="55%" text-anchor="middle" fill="#fff" font-size="18" font-family="Poppins, sans-serif" dy=".3em">H</text>
            </svg>
        </div>
        <h2 class="text-2xl font-bold mb-2 text-center text-brandblue font-poppins">Admin Login</h2>
        <p class="text-gray-500 mb-6 text-center font-open-sans">Sign in to manage Holidayz Admin Panel</p>
        {{-- Admin login form --}}
        <form method="POST" action="{{ route('admin.login') }}" class="w-full">
            @csrf
            {{-- Email field --}}
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-brandblue focus:outline-none font-open-sans transition-all duration-300">
                @error('email')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>
            {{-- Password field --}}
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-1">Password</label>
                <input id="password" type="password" name="password" required class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-brandblue focus:outline-none font-open-sans transition-all duration-300">
            </div>
            {{-- Remember me and forgot password --}}
            <div class="mb-4 flex items-center justify-between">
                <label class="flex items-center text-gray-700 font-open-sans">
                    <input type="checkbox" name="remember" class="mr-2 rounded border-gray-300 text-brandblue focus:ring-brandblue">
                    Remember Me
                </label>
                <a href="{{ route('admin.password.request') }}" class="text-saffron hover:underline text-sm font-medium transition-colors duration-200">Forgot?</a>
            </div>
            <button type="submit" class="w-full bg-brandblue hover:bg-brandblue-dark text-white py-2 rounded-xl font-bold font-poppins text-lg shadow-soft transition-all duration-300 focus:ring-2 focus:ring-brandblue focus:outline-none">Login</button>
        </form>
        {{-- Divider --}}
        <div class="mt-6 border-t border-gray-100 w-full"></div>
        <div class="mt-4 text-center text-xs text-gray-400 font-open-sans">&copy; {{ date('Y') }} Holidayz Admin Panel. All rights reserved.</div>
    </div>
</div>
@endsection 