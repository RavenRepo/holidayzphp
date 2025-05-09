@extends('layouts.app')

@section('title', 'Admin Forgot Password')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white rounded-lg shadow p-8">
        <h2 class="text-2xl font-bold mb-6 text-center">Forgot Password</h2>
        @if (session('status'))
            <div class="mb-4 text-green-600">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('admin.password.email') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full px-3 py-2 border rounded">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="w-full bg-brandblue text-white py-2 rounded font-bold hover:bg-brandblue-dark transition">Send Password Reset Link</button>
        </form>
        <div class="mt-4 text-center">
            <a href="{{ route('admin.login') }}" class="text-brandblue hover:underline">Back to login</a>
        </div>
    </div>
</div>
@endsection 