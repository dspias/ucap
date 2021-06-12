<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

class HasProfile
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
        $user = auth()->user();
        if (is_null($user->student) || is_null(optional($user->student)->dob) || is_null(optional($user->student)->gender || is_null(optional($user->student)->city))) {
            $message = '<h4>You have to update your valid information and documents first</h4>';

            Alert::html('UCAP Alert', $message, 'warning')->autoClose(false)->timerProgressBar();
            $path = 'student.settings.profile';

            return redirect()->route($path);
        }

        return $next($request);
    }
}
