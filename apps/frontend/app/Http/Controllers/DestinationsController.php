<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UnsplashService;

/**
 * Controller for the destinations page.
 */
class DestinationsController extends Controller
{
    /**
     * Show the destinations page with Unsplash images.
     *
     * @param UnsplashService $unsplash
     * @return \Illuminate\View\View
     */
    public function index(UnsplashService $unsplash)
    {
        $destinationImages = $unsplash->searchImages('top travel destinations', 8);
        return view('destinations', [
            'destinationImages' => $destinationImages,
        ]);
    }
} 