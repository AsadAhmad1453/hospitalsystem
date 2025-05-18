<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        // ✅ THIS IS CRITICAL: both sides casted as string
        if ((string) Auth::user()->role !== (string) $role) {
            \Log::info('RoleMiddleware blocked user', [
                'user_id' => Auth::id(),
                'actual_role' => Auth::user()->role,
                'expected_role' => $role,
                'path' => $request->path(),
            ]);

            return to_route(match (Auth::user()->role) {
                0 => 'admin-dashboard',
                1 => 'user-dashboard',
                2 => 'customer-dashboard',
                default => 'login',
            });
        }

        return $next($request);
    }

    
     
   
     

}
