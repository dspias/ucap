<?php

namespace App\Http\Controllers\SuperAdmin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ApplicationProgram;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
        $count = array();
        $count['country'] = Country::count();
        $count['university'] = User::whereRole_id(get_roleid('university'))->count();
        $count['student'] = User::whereRole_id(get_roleid('student'))->count();
        $count['applied'] = ApplicationProgram::count();
        return view('superadmin.dashboard.index', compact(['count']));
    }
}
