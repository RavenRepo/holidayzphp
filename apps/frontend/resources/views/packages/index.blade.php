@extends('layouts.app')

@section('title', 'Travel Packages | Holidayz Manager')

@section('content')
    <div class="mb-8 text-center">
        <h1 class="font-heading text-4xl md:text-5xl font-bold text-brandblue mb-2">Explore Our Travel Packages</h1>
        <p class="font-body text-lg text-gray-600">Handpicked experiences for every kind of traveler. Filter, compare, and book your next adventure.</p>
    </div>
    <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($packages as $package)
            <x-ui.card.card
                :image="$package['image'] ?? ''"
                :alt="$package['title'] ?? ''"
                :badge="($package['duration_days'] ?? $package['duration']) . ' days'"
                :title="$package['title'] ?? ''"
                :description="Str::limit($package['description'] ?? '', 90)"
                :price="'₹' . number_format($package['price'] ?? 0)"
                :action="'<a href=\'' . ($package['link'] ?? '#') . '\' class=\'inline-flex items-center text-brandblue hover:text-brandblue-dark font-medium transition-colors duration-300\'>View Details</a>'"
            />
        @endforeach
    </div>
@endsection 