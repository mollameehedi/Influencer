<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->rules == 2) {
            return redirect('dashboard/incluencer');
        }
        return $next($request);
    }
}
