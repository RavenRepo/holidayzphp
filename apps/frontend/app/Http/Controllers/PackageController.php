<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of travel packages.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // For now, use mock data. Replace with Eloquent query later.
        $packages = [
            [
                'id' => 1,
                'title' => 'Goa Beach Escape',
                'description' => 'Experience the sun, sand, and sea in beautiful Goa. Includes guided tours, water sports, and more.',
                'price' => 19999,
                'duration_days' => 5,
                'image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'id' => 2,
                'title' => 'Himalayan Adventure',
                'description' => 'Trek the majestic Himalayas with expert guides. Includes camping, meals, and local experiences.',
                'price' => 24999,
                'duration_days' => 7,
                'image' => 'https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'id' => 3,
                'title' => 'Kerala Backwaters',
                'description' => 'Cruise the tranquil backwaters of Kerala on a luxury houseboat. Includes meals and cultural shows.',
                'price' => 17999,
                'duration_days' => 4,
                'image' => 'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=600&q=80',
            ],
        ];

        return view('packages.index', compact('packages'));
    }
} 