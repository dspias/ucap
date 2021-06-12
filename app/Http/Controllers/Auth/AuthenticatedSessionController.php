<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1], $request->remember)) {
            return redirect()->route($this->checkUser());
        } else {
            toast('Does not match login Credentials', 'error')->autoClose(2000)->timerProgressBar();
            return redirect()->back();
        }
        // $request->authenticate();

        // $request->session()->regenerate();

        // // return redirect(RouteServiceProvider::HOME);
        // return redirect()->route($this->checkUser());
    }

    private function checkUser()
    {
        if (Auth::check() && Auth::user()->role->slug == 'superadmin') {
            return 'superadmin.dashboard.index';
        } elseif (Auth::check() && Auth::user()->role->slug == 'centre') {
            return 'centre.dashboard.index';
        } elseif (Auth::check() && Auth::user()->role->slug == 'university') {
            return 'university.dashboard.index';
        } elseif (Auth::check() && Auth::user()->role->slug == 'representative') {
            return 'representative.dashboard.index';
        } else {
            return 'student.dashboard.index';
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
