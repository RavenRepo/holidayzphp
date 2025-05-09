<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $cacheTime = 31536000; // 1 year in seconds

        $headers = [
            'Content-Type' => 'text/html; charset=utf-8',
            'Content-Security-Policy' => "default-src 'self'; frame-ancestors 'self'",
            'X-Content-Type-Options' => 'nosniff',
            'Cache-Control' => 'public, max-age='.$cacheTime.', must-revalidate',
            'Strict-Transport-Security' => 'max-age=31536000; includeSubDomains',
            'Referrer-Policy' => 'strict-origin-when-cross-origin',
            'Permissions-Policy' => 'accelerometer=(), camera=(), geolocation=(), gyroscope=(), magnetometer=(), microphone=(), payment=(), usb=()',
        ];

        if (config('app.env') === 'production') {
            $headers['Set-Cookie'] = 'secure; HttpOnly; SameSite=Strict';
        }

        return $response;
    }
}
