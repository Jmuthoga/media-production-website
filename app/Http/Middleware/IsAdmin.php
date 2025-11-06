<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            return redirect()->route('login')->with('error', 'You must be an admin to access that page.');
        }
        return $next($request);
    }
}
