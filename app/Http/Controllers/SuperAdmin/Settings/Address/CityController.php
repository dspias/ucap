<?php

namespace App\Http\Controllers\SuperAdmin\Settings\Address;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function __construct()
    {
        // Constructors
    }

    /**
     * Display a listing of the resource.
     *
     * Cities
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::with(['states' => function ($q) {
            $q->whereStatus(true);
        }])->whereStatus(true)->get();
        $cities = City::with('state.country')->whereHas('state', function ($q) {
            $q->whereStatus(true);
        })->whereHas('state.country', function ($q) {
            $q->whereStatus(true);
        })->get();
        return view('superadmin.settings.address.city.index', compact(['countries', 'cities']));
    }

    /**
     * Store new country
     *
     * Countries
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, array(
            'state' => 'required',
            'city' => 'required | string',
        ));
        $temp = City::whereState_id($request->state)->whereName($request->city)->first();
        if (!is_null($temp)) {
            toast(ucfirst($request->city) . ' already exist!', 'warning')->autoClose(2000)->timerProgressBar();
            return redirect()->back();
        }

        $city = new City();
        $city->state_id = $request->state;
        $city->name = $request->city;
        $city->slug = strtolower($request->city);
        if ($city->save()) {
            toast(ucfirst($city->name) . ' has been created!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($city->name) . ' could not created!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }

    /**
     * Store new country
     *
     * Countries
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $this->validate($request, array(
            'state' => 'required',
            'city' => 'required | string',
        ));
        $temp = City::whereState_id($request->state)->whereName($request->city)->first();
        if (!is_null($temp)) {
            toast(ucfirst($temp->name) . ' already exist!', 'warning')->autoClose(2000)->timerProgressBar();
            return redirect()->back();
        }

        $city = City::findOrFail($request->city_id);
        $city->state_id = $request->state;
        $city->name = $request->city;
        $city->slug = strtolower($request->city);
        $city->status = true;
        if ($city->save()) {
            toast(ucfirst($city->name) . ' has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($city->name) . ' could not updated!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
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

        $city = City::findOrFail($id);
        $city->status = ($city->status == true) ? false : true;
        if ($city->save()) {
            toast(ucfirst($city->name) . ' status has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($city->name) . ' status could not updated!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }
}
