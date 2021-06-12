<?php

namespace App\Http\Controllers\SuperAdmin\Centre;

use App\Http\Controllers\Controller;
use App\Models\Centre;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CentreController extends Controller
{
    public function __construct()
    {
    }


    /**
     * Display a listing of the resource.
     *
     * All UCAP Centres List Page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centres = User::with('centre')->whereRole_id(get_roleid('centre'))->get();
        return view('superadmin.centre.index', compact(['centres']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * Assign New UCAP Centre Form Page
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.centre.create');
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
            'role_id' => Role::whereSlug('centre')->firstOrFail()->id,
            'password' => Hash::make($request->password),
        ]);

        $centre = $user->centre;
        if (is_null($centre)) {
            $centre = new Centre();
            $centre->user_id = $user->id;
        }

        if ($request->hasFile('avatar')) {
            $centre->addMedia($request->avatar)->toMediaCollection('avatar', env('DISK'));
        }

        $centre->first_name = $request->first_name;
        $centre->middle_name = $request->middle_name;
        $centre->last_name = $request->last_name;
        $centre->gender = $request->gender;
        $centre->dob = $request->dob;
        $centre->language = $request->language;
        $centre->phone = $request->phone;
        $centre->country = $request->country;
        $centre->state = $request->state;
        $centre->city = $request->city;
        $centre->address = $request->address;

        if ($centre->save()) {
            toast(ucfirst($user->name) . '\'s profile has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($user->name) . '\'s profile could not updated!', 'error')->autoClose(2000)->timerProgressBar();
            return redirect()->back();
        }
        return redirect()->route('superadmin.centre.index');
    }

    /**
     * Display details of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($page, $id)
    {
        if ($page == 'all') {
            $page_title = 'All Centre';
        } elseif ($page == 'active') {
            $page_title = 'Active Centre';
        } elseif ($page == 'inactive') {
            $page_title = 'Inactive Centre';
        } else {
            return redirect()->back();
        }

        $data = User::with(['centre'])->whereId($id)->whereRole_id(get_roleid('centre'))->firstOrFail();
        return view('superadmin.centre.show', compact(['page', 'page_title', 'data']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $centre = User::with('centre')->whereId($id)->firstOrFail();
        return view('superadmin.centre.edit', compact(['centre']));
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

        $user = User::with('centre')->whereId($id)->firstOrFail();
        $user->name = $name;
        $user->save();

        $centre = $user->centre;
        if (is_null($centre)) {
            $centre = new Centre();
            $centre->user_id = $user->id;
        }

        if ($request->hasFile('avatar')) {
            $files = $centre->getMedia('avatar');
            foreach ($files as $file) $file->delete();
            $centre->addMedia($request->avatar)->toMediaCollection('avatar', env('DISK'));
        }

        $centre->first_name = $request->first_name;
        $centre->middle_name = $request->middle_name;
        $centre->last_name = $request->last_name;
        $centre->gender = $request->gender;
        $centre->dob = $request->dob;
        $centre->language = $request->language;
        $centre->phone = $request->phone;
        $centre->country = $request->country;
        $centre->state = $request->state;
        $centre->city = $request->city;
        $centre->address = $request->address;

        if ($centre->save()) {
            toast(ucfirst($user->name) . '\'s profile has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($user->name) . '\'s profile could not updated!', 'error')->autoClose(2000)->timerProgressBar();
            return redirect()->back();
        }
        return redirect()->route('superadmin.centre.show', ['page' => 'all', 'id' => $user->id]);
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
            toast('This is you!', 'warning')->autoClose(2000)->timerProgressBar();
            return redirect()->back();
        }
        $admin->status = ($admin->status == true) ? false : true;
        if ($admin->save()) {
            toast(ucfirst($admin->name) . ' status has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($admin->name) . ' status could not updated!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }
}
