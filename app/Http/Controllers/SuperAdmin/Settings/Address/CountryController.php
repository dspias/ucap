<?php

namespace App\Http\Controllers\SuperAdmin\Settings\Address;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function __construct()
    {
        // Constructors
    }

    /**
     * Display a listing of the resource.
     *
     * Countries
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        return view('superadmin.settings.address.country.index', compact(['countries']));
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
        $this->validate($request, array(
            'name' => 'required | string',
            'note' => 'required | string',
            'flag' => 'required | max:1024',
        ));
        $list = explode("-", $request->name);
        if (is_country_exist($list['0'])) {
            toast(ucfirst($list[1]) . ' already exist!', 'warning')->autoClose(2000)->timerProgressBar();
            return redirect()->back();
        }

        $country = new Country();
        $country->name = $list[1];
        $country->slug = $list[0];
        $country->addMedia($request->flag)->toMediaCollection('flag', env('DISK'));
        if ($country->save()) {
            toast(ucfirst($country->name) . ' has been created!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($country->name) . ' could not created!', 'danger')->autoClose(2000)->timerProgressBar();
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

        $country = Country::findOrFail($id);
        $country->status = ($country->status == true) ? false : true;
        if ($country->save()) {
            toast(ucfirst($country->name) . ' status has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($country->name) . ' status could not updated!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }
}
