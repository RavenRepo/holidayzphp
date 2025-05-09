<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Controller for the admin dashboard view.
 */
class AdminDashboardController extends Controller
{
    /**
     * Show the admin dashboard page.
     */
    public function index()
    {
        // Render the admin dashboard Blade view
        return view('admin.dashboard');
    }
} 