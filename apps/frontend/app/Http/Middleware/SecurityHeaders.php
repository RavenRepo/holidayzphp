<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $response->headers->set('Content-Type', 'text/html; charset=utf-8');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('Content-Security-Policy', "frame-ancestors 'self'");
        $response->headers->remove('X-Frame-Options');
        $response->headers->remove('X-XSS-Protection');
        
        // Cache control
        $response->headers->set('Cache-Control', 'max-age=31536000, public');
        $response->headers->remove('Expires');

        // Ensure secure cookies in production
        if (config('app.env') === 'production') {
            config(['session.secure' => true]);
        }

        return $response;
    }
}
