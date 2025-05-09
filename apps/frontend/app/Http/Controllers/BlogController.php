<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display the blog index page.
     */
    public function index()
    {
        // You can pass data to the view as needed
        return view('blog.index');
    }
} 