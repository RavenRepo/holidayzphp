@extends('layouts.app')

@section('title', 'Admin Reset Password')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white rounded-lg shadow p-8">
        <h2 class="text-2xl font-bold mb-6 text-center">Reset Password</h2>
        <form method="POST" action="{{ route('admin.password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $email) }}" required autofocus class="w-full px-3 py-2 border rounded">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">New Password</label>
                <input id="password" type="password" name="password" required class="w-full px-3 py-2 border rounded">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required class="w-full px-3 py-2 border rounded">
            </div>
            <button type="submit" class="w-full bg-brandblue text-white py-2 rounded font-bold hover:bg-brandblue-dark transition">Reset Password</button>
        </form>
        <div class="mt-4 text-center">
            <a href="{{ route('admin.login') }}" class="text-brandblue hover:underline">Back to login</a>
        </div>
    </div>
</div>
@endsection 