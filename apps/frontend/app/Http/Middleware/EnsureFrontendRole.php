<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureFrontendRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::guard('web')->check()) {
            return redirect()->route('login')
                ->with('error', 'You must be logged in to access this page.');
        }

        $user = Auth::guard('web')->user();

        if (!$user->hasRole(explode('|', $role))) {
            return redirect()->route('home')
                ->with('error', 'You do not have permission to access this page.');
        }

        return $next($request);
    }
} 