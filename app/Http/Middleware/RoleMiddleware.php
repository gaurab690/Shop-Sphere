<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Please log in first.');
        }

        $authUserRole = Auth::user()->role;

        // If the user is admin and tries to access a non-admin page, redirect them
        if ($authUserRole === 'admin' && $role !== 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // If the user is a regular user and tries to access an admin page, redirect them
        if ($authUserRole === 'user' && $role !== 'user') {
            return redirect()->route('dashboard');
        }

        // If role matches, proceed with the request
        return $next($request);
    }
}
