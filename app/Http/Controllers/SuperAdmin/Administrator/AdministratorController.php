<?php

namespace App\Http\Controllers\SuperAdmin\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\SuperAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdministratorController extends Controller
{
    public function __construct()
    {
    }


    /**
     * Display a listing of the resource.
     *
     * All Administrators List Page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $superadmins = User::with('superadmin')->whereRole_id(get_roleid('superadmin'))->get();
        return view('superadmin.administrator.index', compact(['superadmins']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * Assign New administrator Form Page
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.administrator.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required | string | max:255',
            'last_name' => 'required | string | max:255',
            'email'    => 'required | string | email | max:255 | unique:users',
            'password' => 'required | string | confirmed | min:8',

            'dob'   => 'required | date_format:Y-m-d',
            'gender'    => 'required | string | max:255',
            'language'  => 'required | string | max:255',
            'phone' => 'required | string | max:255',
            'country'   => 'required | string | max:255',
            'state' => 'required | string | max:255',
            'city'  => 'required | string | max:255',
            'address'  => 'required | string | max:500',
        ]);

        if ($request->hasFile('avatar')) {
            $request->validate(array(
                'avatar' => 'required | max:1024'
            ));
        }

        $name = $request->first_name . " " . $request->last_name;
        if (!is_null($request->middle_name)) {
            $request->validate([
                "middle_name"   => 'required | string | max:255',
            ]);
            $name = $request->first_name . " " . $request->middle_name . " " . $request->last_name;
        }

        $user = User::create([
            'name' => $name,
            'email' => $request->email,
            'role_id' => Role::whereSlug('superadmin')->firstOrFail()->id,
            'password' => Hash::make($request->password),
        ]);

        $superadmin = $user->superadmin;
        if (is_null($superadmin)) {
            $superadmin = new SuperAdmin();
            $superadmin->user_id = $user->id;
        }

        if ($request->hasFile('avatar')) {
            $superadmin->addMedia($request->avatar)->toMediaCollection('avatar', env('DISK'));
        }

        $superadmin->first_name = $request->first_name;
        $superadmin->middle_name = $request->middle_name;
        $superadmin->last_name = $request->last_name;
        $superadmin->gender = $request->gender;
        $superadmin->dob = $request->dob;
        $superadmin->language = $request->language;
        $superadmin->phone = $request->phone;
        $superadmin->country = $request->country;
        $superadmin->state = $request->state;
        $superadmin->city = $request->city;
        $superadmin->address = $request->address;

        if ($superadmin->save()) {
            toast(ucfirst($user->name) . '\'s profile has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($user->name) . '\'s profile could not updated!', 'error')->autoClose(2000)->timerProgressBar();
            return redirect()->back();
        }
        return redirect()->route('superadmin.administrator.index');
    }

    /**
     * Display details of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::with(['superadmin'])->whereId($id)->whereRole_id(get_roleid('superadmin'))->firstOrFail();
        return view('superadmin.administrator.show', compact(['data']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $superadmin = User::with('superadmin')->whereId($id)->firstOrFail();
        return view('superadmin.administrator.edit', compact(['superadmin']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required | string | max:255',
            'last_name' => 'required | string | max:255',

            'dob'   => 'required | date_format:Y-m-d',
            'gender'    => 'required | string | max:255',
            'language'  => 'required | string | max:255',
            'phone' => 'required | string | max:255',
            'country'   => 'required | string | max:255',
            'state' => 'required | string | max:255',
            'city'  => 'required | string | max:255',
            'address'  => 'required | string | max:500',
        ]);


        if ($request->hasFile('avatar')) {
            $request->validate(array(
                'avatar' => 'required | max:1024'
            ));
        }

        $name = $request->first_name . " " . $request->last_name;
        if (!is_null($request->middle_name)) {
            $request->validate([
                "middle_name"   => 'required | string | max:255',
            ]);
            $name = $request->first_name . " " . $request->middle_name . " " . $request->last_name;
        }

        $user = User::with('superadmin')->whereId($id)->firstOrFail();
        $user->name = $name;
        $user->save();

        $superadmin = $user->superadmin;
        if (is_null($superadmin)) {
            $superadmin = new SuperAdmin();
            $superadmin->user_id = $user->id;
        }

        if ($request->hasFile('avatar')) {
            $files = $superadmin->getMedia('avatar');
            foreach ($files as $file) $file->delete();
            $superadmin->addMedia($request->avatar)->toMediaCollection('avatar', env('DISK'));
        }

        $superadmin->first_name = $request->first_name;
        $superadmin->middle_name = $request->middle_name;
        $superadmin->last_name = $request->last_name;
        $superadmin->gender = $request->gender;
        $superadmin->dob = $request->dob;
        $superadmin->language = $request->language;
        $superadmin->phone = $request->phone;
        $superadmin->country = $request->country;
        $superadmin->state = $request->state;
        $superadmin->city = $request->city;
        $superadmin->address = $request->address;

        if ($superadmin->save()) {
            toast(ucfirst($user->name) . '\'s profile has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($user->name) . '\'s profile could not updated!', 'error')->autoClose(2000)->timerProgressBar();
            return redirect()->back();
        }
        return redirect()->route('superadmin.administrator.show', ['id' => $user->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    /**
     * change status
     *
     * Countries
     *
     * @return \Illuminate\Http\Response
     */
    public function change_status($id)
    {
        $admin = User::findOrFail($id);
        if (auth()->user()->id == $id) {
            toast('This is you! You cann\'t change your own status.', 'warning')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        }
        $admin->status = ($admin->status == true) ? false : true;
        if ($admin->save()) {
            toast(ucfirst($admin->name) . ' status has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($admin->name) . ' status can not be Update!', 'danger')->autoClose(5000)->timerProgressBar();
        }
        return redirect()->back();
    }
}
