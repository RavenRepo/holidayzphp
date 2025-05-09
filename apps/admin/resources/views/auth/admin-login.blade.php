@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white rounded-lg shadow p-8">
        <h2 class="text-2xl font-bold mb-6 text-center">Admin Login</h2>
        {{-- Admin login form --}}
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            {{-- Email field --}}
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full px-3 py-2 border rounded">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            {{-- Password field --}}
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input id="password" type="password" name="password" required class="w-full px-3 py-2 border rounded">
            </div>
            {{-- Remember me checkbox --}}
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-gray-700">Remember Me</label>
            </div>
            <button type="submit" class="w-full bg-brandblue text-white py-2 rounded font-bold hover:bg-brandblue-dark transition">Login</button>
        </form>
        {{-- Link to forgot password --}}
        <div class="mt-4 text-center">
            <a href="{{ route('admin.password.request') }}" class="text-brandblue hover:underline">Forgot your password?</a>
        </div>
    </div>
</div>
@endsection 