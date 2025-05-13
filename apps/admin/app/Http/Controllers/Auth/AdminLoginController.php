<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Handles admin authentication (login, logout) for the admin panel.
 */
class AdminLoginController extends Controller
{
    /**
     * Show the admin login form.
     */
    public function showLoginForm()
    {
        // Render the admin login Blade view
        return view('auth.admin-login');
    }

    /**
     * Handle an admin login request.
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // Attempt to authenticate using the admin guard
        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            // Redirect to Filament admin panel
            return redirect()->intended('/admin');
        }
        // Authentication failed: redirect back with error
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->withInput($request->only('email'));
    }

    /**
     * Log the admin out and invalidate the session.
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Check if the request is coming from Filament
        $referer = $request->headers->get('referer');
        if ($referer && str_contains($referer, '/admin')) {
            // If coming from Filament admin panel, redirect to Filament login
            return redirect('/admin/login');
        }
        
        // Otherwise, redirect to the admin login route
        return redirect()->route('admin.login');
    }
} 