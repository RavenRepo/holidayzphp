<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controller for the user dashboard.
 */
class DashboardController extends Controller
{
    /**
     * Display the user dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        // Dummy data for now
        $bookings = [];
        $profile = [
            'name' => $user->name,
            'email' => $user->email,
        ];
        return view('dashboard', compact('user', 'bookings', 'profile'));
    }
} 