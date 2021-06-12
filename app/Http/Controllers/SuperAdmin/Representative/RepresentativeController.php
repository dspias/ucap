<?php

namespace App\Http\Controllers\SuperAdmin\Representative;

use App\Http\Controllers\Controller;
use App\Models\Representative;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RepresentativeController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * All Representatives List Page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $representatives = User::with(['representative', 'assignTasks' => function ($builder) {
            $builder->whereStatus(2);
        }])->whereRole_id(get_roleid('representative'))->get();
        return view('superadmin.representative.index', compact(['representatives']));
    }

    /**
     * Display a listing of the resource.
     *
     * Active Representatives List Page
     *
     * @return \Illuminate\Http\Response
     */
    public function active()
    {
        $representatives = User::with(['representative', 'assignTasks' => function ($builder) {
            $builder->whereStatus(2);
        }])->whereRole_id(get_roleid('representative'))->whereStatus(true)->get();
        return view('superadmin.representative.active', compact(['representatives']));
    }

    /**
     * Display a listing of the resource.
     *
     * Inactive Representatives List Page
     *
     * @return \Illuminate\Http\Response
     */
    public function inactive()
    {
        $representatives = User::with(['representative', 'assignTasks' => function ($builder) {
            $builder->whereStatus(2);
        }])->whereRole_id(get_roleid('representative'))->whereStatus(false)->get();
        return view('superadmin.representative.inactive', compact(['representatives']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * Assign New representative Form Page
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $universities = User::whereRole_id(get_roleid('university'))->whereStatus(true)->get();
        return view('superadmin.representative.create', compact(['universities']));
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

            'university_id'   => 'required',
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
            'role_id' => get_roleid('representative'),
            'password' => Hash::make($request->password),
        ]);

        $representative = $user->representative;
        if (is_null($representative)) {
            $representative = new Representative();
            $representative->user_id = $user->id;
            $representative->university_id = $request->university_id;
        }

        if ($request->hasFile('avatar')) {
            $representative->addMedia($request->avatar)->toMediaCollection('avatar', env('DISK'));
        }

        $representative->first_name = $request->first_name;
        $representative->middle_name = $request->middle_name;
        $representative->last_name = $request->last_name;
        $representative->gender = $request->gender;
        $representative->dob = $request->dob;
        $representative->language = $request->language;
        $representative->phone = $request->phone;
        $representative->country = $request->country;
        $representative->state = $request->state;
        $representative->city = $request->city;
        $representative->address = $request->address;

        if ($representative->save()) {
            toast(ucfirst($user->name) . '\'s profile has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($user->name) . '\'s profile could not updated!', 'error')->autoClose(2000)->timerProgressBar();
            return redirect()->back();
        }
        return redirect()->route('superadmin.representative.index');
    }




    /**
     * Display details of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($page, $id)
    {
        if ($page == 'all') {
            $page_title = 'All Representatives';
        } elseif ($page == 'active') {
            $page_title = 'Active Representatives';
        } elseif ($page == 'inactive') {
            $page_title = 'Inactive Representatives';
        } else {
            return redirect()->back();
        }

        $data = User::with(['representative', 'assignTasks' => function ($builder) {
            $builder->whereStatus(2);
        }])->whereId($id)->whereRole_id(get_roleid('representative'))->firstOrFail();
        return view('superadmin.representative.show', compact(['page', 'page_title', 'data']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $universities = User::whereRole_id(get_roleid('university'))->whereStatus(true)->get();
        $representative = User::with('representative')->whereId($id)->firstOrFail();
        return view('superadmin.representative.edit', compact(['representative', 'universities']));
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

            'university_id'   => 'required',
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

        $user = User::with('representative')->whereId($id)->firstOrFail();
        $user->name = $name;
        $user->save();

        $representative = $user->representative;
        if (is_null($representative)) {
            $representative = new Representative();
            $representative->user_id = $user->id;
            $representative->university_id = $request->university_id;
        }

        if ($request->hasFile('avatar')) {
            $files = $representative->getMedia('avatar');
            foreach ($files as $file) $file->delete();
            $representative->addMedia($request->avatar)->toMediaCollection('avatar', env('DISK'));
        }

        $representative->first_name = $request->first_name;
        $representative->middle_name = $request->middle_name;
        $representative->last_name = $request->last_name;
        $representative->gender = $request->gender;
        $representative->dob = $request->dob;
        $representative->language = $request->language;
        $representative->phone = $request->phone;
        $representative->country = $request->country;
        $representative->state = $request->state;
        $representative->city = $request->city;
        $representative->address = $request->address;

        if ($representative->save()) {
            toast(ucfirst($user->name) . '\'s profile has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($user->name) . '\'s profile could not updated!', 'error')->autoClose(2000)->timerProgressBar();
            return redirect()->back();
        }
        return redirect()->route('superadmin.representative.show', ['page' => 'all', 'id' => $user->id]);
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

        $representative = User::findOrFail($id);
        $representative->status = ($representative->status == true) ? false : true;
        if ($representative->save()) {
            toast(ucfirst($representative->name) . ' status has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($representative->name) . ' status could not updated!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }
}
