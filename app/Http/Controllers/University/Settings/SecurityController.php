<?php

namespace App\Http\Controllers\University\Settings;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SecurityController extends Controller
{

    public function __construct()
    {
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('university.settings.security.index');
    }



    //Change Password
    public function change_password(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'old_password'          => 'required | string | min:8',
            'new_password'          => 'required | string | min:8 | same:confirm_password',
        ]);

        if (!Hash::check($request->old_password, Auth::user()->password)) {
            toast('Your Old Password Does not Match.', 'error')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        } elseif ($request->old_password == $request->new_password) {
            toast('Old Password and New Password must be Different.', 'error')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        } else {
            $user = User::findorFail(auth()->user()->id);

            $user->password = Hash::make($request->new_password);

            $user->save();
            toast('Your Password has been Updated Succesfully.', 'success')->autoClose(5000)->timerProgressBar();

            return redirect()->back();
        }
    }
}
