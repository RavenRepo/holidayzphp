@extends('layouts.app')

@section('title', 'Forgot Password - Holidayz Manager')

@section('meta_description', 'Reset your password for Holidayz Manager account.')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-brandblue/5 via-white to-saffron/10">
    <div class="max-w-md w-full">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-brandblue mb-2">Forgot Your Password?</h1>
            <p class="text-gray-600">Enter your email to receive a password reset link</p>
        </div>

        <!-- Status Message -->
        @if (session('status'))
            <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700">
                            {{ session('status') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Forgot Password Form -->
        <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft p-8">
            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf

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
                        autofocus
                        value="{{ old('email') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brandblue focus:border-transparent"
                    >
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full py-3 px-4 bg-brandblue text-white font-medium rounded-lg hover:bg-saffron transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brandblue"
                >
                    Send Password Reset Link
                </button>
            </form>

            <!-- Back to Login Link -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Remember your password?
                    <a href="{{ route('login') }}" class="text-brandblue hover:text-saffron transition-colors font-medium">
                        Back to Login
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
