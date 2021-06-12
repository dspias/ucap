<?php

namespace App\Http\Controllers\University\Settings;

use App\Models\User;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\University;

class UniversityController extends Controller
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
        $countries = Country::with(['states' => function ($q) {
            $q->with(['cities' => function ($build) {
                $build->whereStatus(true);
            }])->whereStatus(true);
        }])->whereStatus(true)->get();
        $university = User::with('university')->whereId(auth()->user()->id)->firstOrFail();

        return view('university.settings.university.index', compact(['countries', 'university']));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $request->validate([
            'name'    =>     'required | string',
            'contact_email'  =>     'required | string | email',
            'phone'          =>     'required | string | max:15',
            'country'        =>     'required | integer | max:50',
            'state'          =>     'required | integer | max:50',
            'city'           =>     'required | integer | max:50',
            'post_code'      =>     'required | string | max:50',
            'address'        =>     'required | string | max:500',

            'admin_name'     =>     'required | string',
            'gender'         =>     'required | string',
            'admin_email'    =>     'required | string | email',
            'admin_mobile'   =>     'required | string | max:15',
        ]);

        if ($request->hasFile('logo')) {
            $request->validate(array(
                'logo' => 'required | max:2048'
            ));
        }
        if ($request->hasFile('cover')) {
            $request->validate(array(
                'cover' => 'required | max:2048'
            ));
        }
        if ($request->hasFile('admin')) {
            $request->validate(array(
                'admin' => 'required | max:2048'
            ));
        }
        if (!is_null($request->website)) {
            $request->validate([
                'website'        =>     'required | string | url',
            ]);
        }
        if (!is_null($request->facebook)) {
            $request->validate([
                'facebook'       =>     'required | string | url',
            ]);
        }
        if (!is_null($request->twitter)) {
            $request->validate([
                'twitter'        =>     'required | string | url',
            ]);
        }
        if (!is_null($request->linkedin)) {
            $request->validate([
                'linkedin'       =>     'required | string | url',
            ]);
        }
        if (!is_null($request->instagram)) {
            $request->validate([
                'instagram'      =>     'required | string | url',
            ]);
        }
        if (!is_null($request->whatsapp)) {
            $request->validate([
                'whatsapp'       =>     'required | string | max:15',
            ]);
        }
        if (!is_null($request->whatsapp)) {
            $request->validate([
                'admin_whatsapp' =>     'required | string | max:15',
            ]);
        }
        if (!is_null($request->whatsapp)) {
            $request->validate([
                'admin_telegram' =>     'required | string',
            ]);
        }
        if (!is_null($request->whatsapp)) {
            $request->validate([
                'admin_facebook' =>     'required | string | url',
            ]);
        }
        if (!is_null($request->about)) {
            $request->validate([
                'about' =>     'required | string',
            ]);
        }
        if (!is_null($request->student_number)) {
            $request->validate([
                'student_number' =>     'required | integer',
            ]);
        }
        if (!is_null($request->weather)) {
            $request->validate([
                'weather' =>     'required | numeric',
            ]);
        }

        /**
         * User Create in User Table
         */
        $user = User::with('university')->whereId(auth()->user()->id)->firstOrFail();
        $user->name = $request->name;
        $user->save();

        $university = $user->university;
        if (is_null($university)) {
            $university = new University();
            $university->user_id = $user->id;
        }


        $university->city_id = $request->city;
        $university->email = $request->contact_email;
        $university->phone = $request->phone;
        $university->post_code = $request->post_code;
        $university->address = $request->address;
        if ($request->website) $university->website = $request->website;
        if ($request->facebook) $university->facebook = $request->facebook;
        if ($request->twitter) $university->twitter = $request->twitter;
        if ($request->linkedin) $university->linkedin = $request->linkedin;
        if ($request->instagram) $university->instagram = $request->instagram;
        if ($request->whatsapp) $university->whatsapp = $request->whatsapp;


        if ($request->about) $university->about = $request->about;
        if (isset($request->is_scholarship)) $university->is_scholarship = $request->is_scholarship;
        if (isset($request->is_transport)) $university->is_transport = $request->is_transport;
        if ($request->student_number) $university->student_number = $request->student_number;
        if ($request->living_cost) $university->living_cost = $request->living_cost;
        if ($request->weather) $university->weather = $request->weather;

        $university->admin_name = $request->admin_name;
        $university->gender = $request->gender;
        $university->admin_email = $request->admin_email;
        $university->admin_mobile = $request->admin_mobile;
        if ($request->admin_whatsapp) $university->admin_whatsapp = $request->admin_whatsapp;
        if ($request->admin_telegram) $university->admin_telegram = $request->admin_telegram;
        if ($request->admin_facebook) $university->admin_facebook = $request->admin_facebook;

        if ($request->hasFile('logo')) {
            $files = $university->getMedia('logo');
            foreach ($files as $file) $file->delete();
            $university->addMedia($request->logo)->toMediaCollection('logo', env('DISK'));
        }
        if ($request->hasFile('cover')) {
            $files = $university->getMedia('cover');
            foreach ($files as $file) $file->delete();
            $university->addMedia($request->cover)->toMediaCollection('cover', env('DISK'));
        }
        if ($request->hasFile('admin')) {
            $files = $university->getMedia('admin');
            foreach ($files as $file) $file->delete();
            $university->addMedia($request->admin)->toMediaCollection('admin', env('DISK'));
        }

        if ($university->save()) {
            toast(ucfirst($user->name) . 'University has been updated successfully', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($user->name) . 'University didn\'t updated. Please try again.', 'error')->autoClose(2000)->timerProgressBar();
            return redirect()->back();
        }
        return redirect()->route('university.settings.profile.index');
    }
}
