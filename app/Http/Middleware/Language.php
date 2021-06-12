<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            \App::setLocale(Auth::user()->lang);
        } else {
            // $lang = session()->get('lang', 'ban');
            // $lang = session()->get('lang', 'en');
            \App::setLocale('en');
        }
        return $next($request);
    }
}
