<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() && Auth::user()->role->slug == 'superadmin') {
                return redirect()->route('superadmin.dashboard.index');
            } elseif (Auth::guard($guard)->check() && Auth::user()->role->slug == 'centre') {
                return redirect()->route('centre.dashboard.index');
            } elseif (Auth::guard($guard)->check() && Auth::user()->role->slug == 'university') {
                return redirect()->route('university.dashboard.index');
            } elseif (Auth::guard($guard)->check() && Auth::user()->role->slug == 'representative') {
                return redirect()->route('representative.dashboard.index');
            } elseif (Auth::guard($guard)->check() && Auth::user()->role->slug == 'student') {
                return redirect()->route('student.dashboard.index');
            }
        }

        return $next($request);
    }
}
