<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Security headers can only be added to supported response types
        if (method_exists($response, 'header')) {
            // Content Security Policy (CSP)
            // Note: In development, Vite might need 'unsafe-inline' and specific ports. 
            // The requested policy is very strict, which is good for production.
            $response->header('Content-Security-Policy', "default-src 'self'; script-src 'self' 'unsafe-inline' https:; style-src 'self' 'unsafe-inline' https:; img-src 'self' data: https:; font-src 'self' https:; connect-src 'self' https: ws: wss:; frame-ancestors 'none'; base-uri 'self'; form-action 'self';");

            // Prevent Clickjacking
            $response->header('X-Frame-Options', 'DENY');

            // HTTP Strict Transport Security (HSTS)
            $response->header('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');

            // Prevent MIME sniffing
            $response->header('X-Content-Type-Options', 'nosniff');

            // Set Referrer-Policy
            $response->header('Referrer-Policy', 'strict-origin-when-cross-origin');

            // Set Permissions-Policy
            $response->header('Permissions-Policy', 'geolocation=(), microphone=(), camera=()');

            // Cache Security Review
            // If the user is authenticated (dashboard, admin, etc.), prevent caching of sensitive pages
            if (auth()->check()) {
                $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
                $response->header('Pragma', 'no-cache');
            }
        }

        // Remove Server Fingerprinting
        if (method_exists($response, 'headers') && $response->headers->has('X-Powered-By')) {
            $response->headers->remove('X-Powered-By');
        }
        
        if (function_exists('header_remove')) {
            header_remove('X-Powered-By');
            header_remove('Server');
        }

        return $response;
    }
}
