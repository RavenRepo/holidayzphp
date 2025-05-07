<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UnsplashService;

/**
 * Controller for the homepage.
 */
class HomeController extends Controller
{
    /**
     * Show the homepage with Unsplash images.
     *
     * @param UnsplashService $unsplash
     * @return \Illuminate\View\View
     */
    public function index(UnsplashService $unsplash)
    {
        $carouselImages = $unsplash->searchImages('travel adventure', 5);
        $packageImages = $unsplash->searchImages('holiday destinations', 4);
        $inspirationImages = $unsplash->searchImages('travel inspiration', 3);
        $benefitImages = $unsplash->searchImages('travel benefits', 3);

        return view('home', [
            'carouselImages' => $carouselImages,
            'packageImages' => $packageImages,
            'inspirationImages' => $inspirationImages,
            'benefitImages' => $benefitImages,
        ]);
    }
} 