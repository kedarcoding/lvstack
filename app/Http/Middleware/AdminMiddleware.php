<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and if their role is 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Proceed if the user is an admin
        }

        // If the user is not an admin, return a 403 Forbidden response
        return response()->json(['message' => 'Forbidden'], 403);
    }
}
