@extends('layouts.app')

@section('title', 'Reset Password - Holidayz Manager')

@section('meta_description', 'Reset your password for Holidayz Manager account.')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-brandblue/5 via-white to-saffron/10">
    <div class="max-w-md w-full">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-brandblue mb-2">Reset Password</h1>
            <p class="text-gray-600">Create a new secure password</p>
        </div>

        <!-- Reset Password Form -->
        <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft p-8">
            <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $token }}">

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
                        value="{{ $email ?? old('email') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brandblue focus:border-transparent"
                        {{ $email ? 'readonly' : '' }}
                    >
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        New Password
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
                        Confirm New Password
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

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full py-3 px-4 bg-brandblue text-white font-medium rounded-lg hover:bg-saffron transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brandblue"
                >
                    Reset Password
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
