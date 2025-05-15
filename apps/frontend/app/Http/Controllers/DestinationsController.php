<?php

namespace App\Http\Controllers;

use App\Services\UnsplashService;

/**
 * Controller for the destinations page.
 */
class DestinationsController extends Controller
{
    /**
     * Show the destinations page with Unsplash images.
     *
     * @return \Illuminate\View\View
     */
    public function index(UnsplashService $unsplash)
    {
        // International destinations with Unsplash images
        $internationalDestinations = [
            [
                'name' => 'Singapore',
                'description' => 'Experience the perfect blend of modernity and tradition',
                'tags' => ['Modern', 'Shopping', 'Family']
            ],
            [
                'name' => 'Malaysia',
                'description' => 'Discover diverse cultures and natural wonders',
                'tags' => ['Culture', 'Nature', 'Adventure']
            ],
            [
                'name' => 'Bali',
                'description' => 'Immerse in spiritual beauty and tropical paradise',
                'tags' => ['Beach', 'Culture', 'Wellness']
            ],
            [
                'name' => 'Thailand',
                'description' => 'Explore exotic beaches and vibrant city life',
                'tags' => ['Beach', 'Nightlife', 'Food']
            ],
            [
                'name' => 'Dubai',
                'description' => 'Experience luxury and desert adventures',
                'tags' => ['Luxury', 'Shopping', 'Desert']
            ],
            [
                'name' => 'Vietnam',
                'description' => 'Journey through rich history and scenic landscapes',
                'tags' => ['Culture', 'History', 'Nature']
            ],
            [
                'name' => 'Cambodia',
                'description' => 'Discover ancient temples and cultural heritage',
                'tags' => ['Heritage', 'History', 'Culture']
            ],
            [
                'name' => 'Azerbaijan',
                'description' => 'Experience where East meets West',
                'tags' => ['Culture', 'History', 'Modern']
            ],
            [
                'name' => 'Maldives',
                'description' => 'Escape to paradise islands and luxury resorts',
                'tags' => ['Luxury', 'Beach', 'Romance']
            ]
        ];

        // Domestic destinations with Unsplash images
        $domesticDestinations = [
            [
                'name' => 'Ladakh',
                'description' => 'Experience the magic of high-altitude desert',
                'tags' => ['Adventure', 'Mountains', 'Culture']
            ],
            [
                'name' => 'Kerala',
                'description' => 'Discover God\'s own country and backwaters',
                'tags' => ['Nature', 'Wellness', 'Culture']
            ],
            [
                'name' => 'Goa',
                'description' => 'Enjoy beaches, parties, and Portuguese heritage',
                'tags' => ['Beach', 'Nightlife', 'Heritage']
            ],
            [
                'name' => 'Meghalaya',
                'description' => 'Explore the abode of clouds and living root bridges',
                'tags' => ['Nature', 'Adventure', 'Culture']
            ],
            [
                'name' => 'Rajasthan',
                'description' => 'Discover royal heritage and desert culture',
                'tags' => ['Heritage', 'Culture', 'Desert']
            ],
            [
                'name' => 'Kashmir',
                'description' => 'Visit paradise on Earth',
                'tags' => ['Nature', 'Mountains', 'Culture']
            ],
            [
                'name' => 'Andaman',
                'description' => 'Experience tropical paradise and water sports',
                'tags' => ['Beach', 'Adventure', 'Nature']
            ]
        ];

        // Neighboring destinations with Unsplash images
        $neighboringDestinations = [
            [
                'name' => 'Nepal',
                'description' => 'Trek through the mighty Himalayas',
                'tags' => ['Mountains', 'Adventure', 'Culture']
            ],
            [
                'name' => 'Bhutan',
                'description' => 'Experience the last Shangri-La',
                'tags' => ['Culture', 'Buddhism', 'Nature']
            ],
            [
                'name' => 'Sri Lanka',
                'description' => 'Discover the pearl of Indian Ocean',
                'tags' => ['Beach', 'Heritage', 'Wildlife']
            ]
        ];

        // Fetch images for each destination
        $this->fetchImagesForDestinations($unsplash, $internationalDestinations);
        $this->fetchImagesForDestinations($unsplash, $domesticDestinations);
        $this->fetchImagesForDestinations($unsplash, $neighboringDestinations);

        // Generic destination images for the bottom section
        $destinationImages = $unsplash->searchImages('top travel destinations', 4);

        return view('destinations', [
            'internationalDestinations' => $internationalDestinations,
            'domesticDestinations' => $domesticDestinations,
            'neighboringDestinations' => $neighboringDestinations,
            'destinationImages' => $destinationImages,
        ]);
    }

    /**
     * Fetch Unsplash images for each destination
     * 
     * @param UnsplashService $unsplash
     * @param array &$destinations
     * @return void
     */
    private function fetchImagesForDestinations(UnsplashService $unsplash, array &$destinations): void
    {
        foreach ($destinations as &$destination) {
            // Search for "<destination name> travel" to get better results
            $images = $unsplash->searchImages($destination['name'] . ' travel', 1);
            $destination['image'] = $images[0] ?? 'https://via.placeholder.com/800x500?text=' . urlencode($destination['name']);
        }
    }
}
