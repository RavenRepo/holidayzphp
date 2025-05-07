<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controller for the manager dashboard.
 */
class ManagerDashboardController extends Controller
{
    /**
     * Display the manager dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        // Dummy data for now
        $teamMembers = [];
        $teamBookings = [];
        return view('manager.dashboard', compact('user', 'teamMembers', 'teamBookings'));
    }
} 