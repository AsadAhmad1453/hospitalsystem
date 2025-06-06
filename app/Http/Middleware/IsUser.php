<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('staff-login')->withErrors(['email' => 'Please login to access staff panel.']);
        }

        if (Auth::user()->role !== '1') {
            Auth::logout();
            return redirect()->route('staff-login')->withErrors(['email' => 'You are not authorized.']);
        }

        return $next($request);
    }
}
