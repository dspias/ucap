<?php

namespace App\Http\Controllers\Representative\Settings;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Representative;

class ProfileController extends Controller
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
        $data = User::with(['representative', 'assignTasks' => function ($builder) {
            $builder->whereStatus(2);
        }])->whereId(auth()->user()->id)->whereRole_id(get_roleid('representative'))->firstOrFail();
        return view('representative.settings.profile.index', compact(['data']));
    }


    /**
     * edit details of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $user_id = bindec($user_id);

        if ($user_id == auth()->user()->id){
            $representative = User::with(['representative', 'assignTasks' => function ($builder) {
                $builder->whereStatus(2);
            }])->whereId(auth()->user()->id)->whereRole_id(get_roleid('representative'))->firstOrFail();
            return view('representative.settings.profile.edit', compact(['representative']));
        } else {
            toast('You are not authorized to edit this profile.', 'warning')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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

        $user = User::with('representative')->whereId(auth()->user()->id)->firstOrFail();
        $user->name = $name;
        $user->save();

        $representative = $user->representative;
        if (is_null($representative)) {
            $representative = new Representative();
            $representative->user_id = $user->id;
            $representative->university_id = 3;
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
        return redirect()->route('representative.settings.profile.index');
    }
}
