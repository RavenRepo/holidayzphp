@extends('layouts.app')

@section('title', 'Manager Dashboard')
@section('meta_description', 'Dashboard for managers to view team stats and bookings.')

@section('content')
    <div class="max-w-4xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-4">Welcome, {{ $user->name }} (Manager)!</h1>
        <x-dashboard.team-stats-widget :team-members="$teamMembers" :team-bookings="$teamBookings" />
        <x-dashboard.bookings-widget :bookings="$teamBookings" />
    </div>
@endsection 