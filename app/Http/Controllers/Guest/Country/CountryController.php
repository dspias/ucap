<?php

namespace App\Http\Controllers\Guest\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::whereStatus(true)->orderBy('name')->get();
        // dd($countries);
        return view('guest.country.index', compact(['countries']));
    }



    /**
     * show details of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id, $name)
    {
        $id = bindec($id);
        $country = Country::whereSlug($name)
            ->whereStatus(true)
            ->findOrFail($id);
        $universities = User::whereHas('university.city.state', function ($builder) use ($id) {
            $builder->whereCountry_id($id);
        })->whereStatus(true)->get();

        return view('guest.country.show', compact(['country', 'universities']));
    }
}
