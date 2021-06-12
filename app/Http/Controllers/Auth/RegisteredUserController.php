<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $name = $request->first_name . " " . $request->last_name;
        if ($request->middle_name != null) {
            $request->validate([
                'middle_name' => 'required|string|max:255',
            ]);
            $name = $request->first_name . " " . $request->middle_name . " " . $request->last_name;
        }



        $user = User::create([
            'name' => $name,
            'email' => $request->email,
            'role_id' => get_roleid('student'),
            'password' => Hash::make($request->password),
        ]);
        $student = new Student();
        $student->user_id = $user->id;
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->last_name = $request->last_name;
        $student->phone = $request->phone;
        $student->save();

        Auth::login($user);

        event(new Registered($user));


        // return redirect(RouteServiceProvider::HOME);
        return redirect()->route($this->checkUser());
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
}
