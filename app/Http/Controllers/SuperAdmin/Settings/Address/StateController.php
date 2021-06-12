<?php

namespace App\Http\Controllers\SuperAdmin\Settings\Address;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function __construct()
    {
        // Constructors
    }

    /**
     * Display a listing of the resource.
     *
     * States
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::whereStatus(true)->get();
        $states = State::whereHas('country', function ($q) {
            $q->whereStatus(true);
        })->get();
        return view('superadmin.settings.address.state.index', compact(['countries', 'states']));
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
            'country' => 'required',
            'state' => 'required | string',
        ));
        $temp = State::whereCountry_id($request->country)->whereName($request->state)->first();
        if (!is_null($temp)) {
            toast(ucfirst($request->state) . ' already exist!', 'warning')->autoClose(2000)->timerProgressBar();
            return redirect()->back();
        }

        $state = new State();
        $state->country_id = $request->country;
        $state->name = $request->state;
        $state->slug = strtolower($request->state);
        if ($state->save()) {
            toast(ucfirst($state->name) . ' has been created!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($state->name) . ' could not created!', 'danger')->autoClose(2000)->timerProgressBar();
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
            'country' => 'required',
            'state' => 'required | string',
        ));
        $temp = State::whereCountry_id($request->country)->whereName($request->state)->first();
        if (!is_null($temp)) {
            toast(ucfirst($request->state) . ' already exist!', 'warning')->autoClose(2000)->timerProgressBar();
            return redirect()->back();
        }

        $state = State::findOrFail($request->state_id);
        $state->country_id = $request->country;
        $state->name = $request->state;
        $state->slug = strtolower($request->state);
        $state->status = true;
        if ($state->save()) {
            toast(ucfirst($state->name) . ' has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($state->name) . ' could not updated!', 'danger')->autoClose(2000)->timerProgressBar();
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

        $state = State::findOrFail($id);
        $state->status = ($state->status == true) ? false : true;
        if ($state->save()) {
            toast(ucfirst($state->name) . ' status has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($state->name) . ' status could not updated!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }
}
