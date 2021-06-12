<?php

namespace App\Http\Controllers\Student\Application;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
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
        $applications = Application::whereStudent_id(auth()->user()->id)->orderBy('id', 'desc')->get();
        return view('student.application.index', compact(['applications']));
    }


    /**
     * Display Details of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id, $application_id)
    {
        $id = bindec($id);
        $application = Application::whereId($id)->whereAid($application_id)->firstOrFail();
        return view('student.application.show', compact(['application']));
    }
}
