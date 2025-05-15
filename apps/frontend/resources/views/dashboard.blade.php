@extends('layouts.app')

@section('title', 'User Dashboard')
@section('meta_description', 'Your personalized dashboard for managing bookings and profile.')

@section('content')
    <div class="max-w-4xl mx-auto py-10 px-4">
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

        <h1 class="text-3xl font-bold mb-4">Welcome, {{ $user->name }}!</h1>
        <x-dashboard.profile-widget :profile="$profile" />
        <x-dashboard.bookings-widget :bookings="$bookings" />
    </div>
@endsection 