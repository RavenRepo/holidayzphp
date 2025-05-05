@extends('layouts.app')

@section('title', 'Travel Packages | Holidayz Manager')

@section('content')
    <div class="mb-8 text-center">
        <h1 class="font-heading text-4xl md:text-5xl font-bold text-brandblue mb-2">Explore Our Travel Packages</h1>
        <p class="font-body text-lg text-gray-600">Handpicked experiences for every kind of traveler. Filter, compare, and book your next adventure.</p>
    </div>
    <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($packages as $package)
            <x-package-card :package="$package" />
        @endforeach
    </div>
@endsection 