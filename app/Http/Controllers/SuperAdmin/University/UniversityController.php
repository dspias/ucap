<?php

namespace App\Http\Controllers\SuperAdmin\University;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UniversityController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * All Universities List Page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universities = User::with(['university.city'])->whereRole_id(get_roleid('university'))->get();
        return view('superadmin.university.index', compact(['universities']));
    }

    /**
     * Display a listing of the resource.
     *
     * Active Universities List Page
     *
     * @return \Illuminate\Http\Response
     */
    public function active()
    {
        $universities = User::with(['university.city'])->whereRole_id(get_roleid('university'))->whereStatus(true)->get();
        return view('superadmin.university.active', compact(['universities']));
    }

    /**
     * Display a listing of the resource.
     *
     * Inactive Universities List Page
     *
     * @return \Illuminate\Http\Response
     */
    public function inactive()
    {
        $universities = User::with(['university.city'])->whereRole_id(get_roleid('university'))->whereStatus(false)->get();
        return view('superadmin.university.inactive', compact(['universities']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * Assign New University Form Page
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::with(['states' => function ($q) {
            $q->with(['cities' => function ($build) {
                $build->whereStatus(true);
            }])->whereStatus(true);
        }])->whereStatus(true)->get();

        return view('superadmin.university.create', compact(['countries']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name'    =>     'required | string',
            'email'    =>     'required | string | email | unique:users',
            'password'       =>     'required | string | confirmed | min:8',

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
        if (!is_null($request->admin_whatsapp)) {
            $request->validate([
                'admin_whatsapp' =>     'required | string | max:15',
            ]);
        }
        if (!is_null($request->admin_telegram)) {
            $request->validate([
                'admin_telegram' =>     'required | string',
            ]);
        }
        if (!is_null($request->admin_facebook)) {
            $request->validate([
                'admin_facebook' =>     'required | string | url',
            ]);
        }
        if (!is_null($request->admin_facebook)) {
            $request->validate([
                'admin_facebook' =>     'required | string | url',
            ]);
        }
        if (!is_null($request->admin_whatsapp)) {
            $request->validate([
                'admin_whatsapp' =>     'required | string',
            ]);
        }
        if (!is_null($request->admin_telegram)) {
            $request->validate([
                'admin_telegram' =>     'required | string',
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
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => get_roleid('university'),
            'password' => Hash::make($request->password),
        ]);

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
            $university->addMedia($request->logo)->toMediaCollection('logo', env('DISK'));
        }
        if ($request->hasFile('cover')) {
            $university->addMedia($request->cover)->toMediaCollection('cover', env('DISK'));
        }
        if ($request->hasFile('admin')) {
            $university->addMedia($request->admin)->toMediaCollection('admin', env('DISK'));
        }

        if ($university->save()) {
            toast(ucfirst($user->name) . 'University has been created successfully', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($user->name) . 'University didn\'t created. Please try again.', 'error')->autoClose(2000)->timerProgressBar();
            return redirect()->back();
        }
        return redirect()->route('superadmin.university.index');
    }




    /**
     * Display details of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($page, $id)
    {
        if ($page == 'all') {
            $page_title = 'All Universities';
        } elseif ($page == 'active') {
            $page_title = 'Active Universities';
        } elseif ($page == 'inactive') {
            $page_title = 'Inactive Universities';
        } else {
            return redirect()->back();
        }

        $university = User::with(['university.city'])->whereId($id)->whereRole_id(get_roleid('university'))->firstOrFail();
        $applications = Application::whereHas('programs', function($builder) use ($id){
            $builder->whereUniversity_id($id);
        })->get();
        return view('superadmin.university.show', compact(['page', 'page_title', 'university', 'applications']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::with(['states' => function ($q) {
            $q->with(['cities' => function ($build) {
                $build->whereStatus(true);
            }])->whereStatus(true);
        }])->whereStatus(true)->get();
        $university = User::with('university')->whereId($id)->firstOrFail();

        return view('superadmin.university.edit', compact(['countries', 'university']));
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
        $user = User::with('university')->whereId($id)->firstOrFail();
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
        return redirect()->route('superadmin.university.show', ['page' => 'all', 'id' => $user->id]);
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

        $university = User::findOrFail($id);
        $university->status = ($university->status == true) ? false : true;
        if ($university->save()) {
            toast(ucfirst($university->name) . ' status has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($university->name) . ' status could not updated!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }
}
