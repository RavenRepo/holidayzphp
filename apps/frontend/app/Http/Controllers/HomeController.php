<?php

namespace App\Http\Controllers;

use App\Services\UnsplashService;

/**
 * Controller for the homepage.
 */
class HomeController extends Controller
{
    /**
     * Show the homepage with Unsplash images.
     *
     * @return \Illuminate\View\View
     */
    public function index(UnsplashService $unsplash)
    {
        $carouselImages = $unsplash->searchImages('travel adventure', 5);
        $inspirationImages = $unsplash->searchImages('travel inspiration', 3);
        $benefitImages = $unsplash->searchImages('travel benefits', 3);
        
        // Define destinations with their details
        $destinations = [
            [
                'name' => 'Bali',
                'price' => '₹42,999',
                'image' => $unsplash->searchImages('bali indonesia beach', 1)[0] ?? 'https://images.unsplash.com/photo-1573790387438-4da905039392?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'slug' => 'bali',
                'description' => 'Experience the tropical paradise with pristine beaches and rich cultural heritage'
            ],
            [
                'name' => 'Maldives',
                'price' => '₹54,999',
                'image' => $unsplash->searchImages('maldives overwater villa', 1)[0] ?? 'https://images.unsplash.com/photo-1514282401047-d79a71a590e8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'slug' => 'maldives',
                'description' => 'Luxurious overwater villas and crystal clear turquoise waters await'
            ],
            [
                'name' => 'Thailand',
                'price' => '₹37,800',
                'image' => $unsplash->searchImages('thailand beach phuket', 1)[0] ?? 'https://images.unsplash.com/photo-1552465011-b4e21bf6e79a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'slug' => 'thailand',
                'description' => 'Explore vibrant cities, stunning beaches and delicious culinary experiences'
            ],
            [
                'name' => 'Mauritius',
                'price' => '₹62,500',
                'image' => $unsplash->searchImages('mauritius beach resort', 1)[0] ?? 'https://images.unsplash.com/photo-1589197331516-4d84b72bb202?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'slug' => 'mauritius',
                'description' => 'Perfect for honeymoons with its breathtaking beaches and luxury resorts'
            ],
            [
                'name' => 'Singapore',
                'price' => '₹45,900',
                'image' => $unsplash->searchImages('singapore skyline gardens', 1)[0] ?? 'https://images.unsplash.com/photo-1525625293386-3f8f99389edd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'slug' => 'singapore',
                'description' => 'The perfect city break with amazing food, shopping and iconic attractions'
            ],
            [
                'name' => 'Dubai',
                'price' => '₹57,800',
                'image' => $unsplash->searchImages('dubai burj khalifa', 1)[0] ?? 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'slug' => 'dubai',
                'description' => 'Experience luxury shopping, desert adventures and ultramodern architecture'
            ],
        ];

        return view('home', [
            'carouselImages' => $carouselImages,
            'destinations' => $destinations,
            'inspirationImages' => $inspirationImages,
            'benefitImages' => $benefitImages,
        ]);
    }
}
