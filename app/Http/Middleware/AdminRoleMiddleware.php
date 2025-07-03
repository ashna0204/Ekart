<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
        public function handle($request, Closure $next)
        {
            if (!auth()->check()) {
                return redirect()->route('admin.login')->withErrors(['login' => 'Please log in to access the admin panel.']);
            }

            if (!auth()->user()->hasRole('admin')) {
                auth()->logout();
                return redirect()->route('admin.login')->withErrors(['login' => 'You are not authorized to access admin panel.']);
            }

            return $next($request);
        }


  }
