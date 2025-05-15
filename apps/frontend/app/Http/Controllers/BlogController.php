<?php

namespace App\Http\Controllers;

use App\Services\UnsplashService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display the blog index page.
     */
    public function index(UnsplashService $unsplash)
    {
        // Fetch blog images using UnsplashService
        $blogImages = $unsplash->searchImages('travel blog writing', 6);
        
        // Pass data to the view
        return view('blog', [
            'blogImages' => $blogImages
        ]);
    }
} 