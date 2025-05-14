<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Handles admin authentication (login, logout) for the Filament admin panel.
 */
class AdminLoginController extends Controller
{
    /**
     * Log the admin out and invalidate the session.
     * This method is specifically for the Filament admin panel logout route.
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Redirect to Filament login page
        return redirect('/admin/login');
    }
}