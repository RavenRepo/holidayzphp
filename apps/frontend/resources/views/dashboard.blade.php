@extends('layouts.app')

@section('title', 'User Dashboard')
@section('meta_description', 'Your personalized dashboard for managing bookings and profile.')

@section('content')
    <div class="max-w-4xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-4">Welcome, {{ $user->name }}!</h1>
        <x-dashboard.profile-widget :profile="$profile" />
        <x-dashboard.bookings-widget :bookings="$bookings" />
    </div>
@endsection 