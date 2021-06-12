<?php

namespace App\Http\Controllers\University\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

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
        $university = User::with(['university.city'])->whereId(auth()->user()->id)->whereRole_id(get_roleid('university'))->firstOrFail();
        return view('university.settings.profile.index', compact(['university']));
    }
}
