<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param string $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if ($role == 'Admin' && auth()->user()->role != 'Admin') {
            abort(403);
        }

        if ($role == 'Employee' && auth()->user()->role != 'Employee') {
            abort(403);
        }

        if ($role == 'Customer' && auth()->user()->role != 'Customer') {
            abort(403);
        }

        return $next($request);
    }
}
