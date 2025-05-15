@extends('layouts.app')

@section('title', 'Register - Holidayz Manager')

@section('meta_description', 'Create your Holidayz Manager account to start planning your perfect trip across India.')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-brandblue/5 via-white to-saffron/10">
    <div class="max-w-md w-full">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-brandblue mb-2">Create Your Account</h1>
            <p class="text-gray-600">Start your journey with Holidayz Manager</p>
        </div>

        <!-- Registration Form -->
        <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft p-8">
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                        Full Name
                    </label>
                    <input 
                        id="name" 
                        name="name" 
                        type="text" 
                        required 
                        autocomplete="name" 
                        value="{{ old('name') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brandblue focus:border-transparent"
                    >
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        Email Address
                    </label>
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        required 
                        autocomplete="email" 
                        value="{{ old('email') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brandblue focus:border-transparent"
                    >
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        Password
                    </label>
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        required 
                        autocomplete="new-password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brandblue focus:border-transparent"
                    >
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                        Confirm Password
                    </label>
                    <input 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        type="password" 
                        required 
                        autocomplete="new-password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brandblue focus:border-transparent"
                    >
                </div>

                <!-- Terms and Conditions -->
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input 
                            id="terms" 
                            name="terms" 
                            type="checkbox" 
                            required
                            class="h-4 w-4 text-brandblue focus:ring-brandblue border-gray-300 rounded"
                        >
                    </div>
                    <div class="ml-3">
                        <label for="terms" class="text-sm text-gray-600">
                            I agree to the 
                            <a href="#" class="text-brandblue hover:text-saffron transition-colors">Terms of Service</a>
                            and 
                            <a href="#" class="text-brandblue hover:text-saffron transition-colors">Privacy Policy</a>
                        </label>
                        @error('terms')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full py-3 px-4 bg-brandblue text-white font-medium rounded-lg hover:bg-saffron transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brandblue"
                >
                    Create Account
                </button>
            </form>

            <!-- Login Link -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-brandblue hover:text-saffron transition-colors font-medium">
                        Sign in
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
