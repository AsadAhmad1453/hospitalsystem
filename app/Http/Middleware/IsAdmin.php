<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         if (!Auth::check()) {
            return redirect()->route('login')->withErrors(['email' => 'Please login to access admin panel.']);
        }

        if (Auth::user()->role !== '0') {
            Auth::logout();
            return redirect()->route('login')->withErrors(['email' => 'You are not authorized.']);
        }

        return $next($request);
    }
}
