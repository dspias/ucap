<?php

namespace App\Http\Controllers\Representative\Application;

use App\Http\Controllers\Controller;
use App\Models\ApplicationProgram;
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
    public function assigned()
    {
        $applications = ApplicationProgram::whereRepresentative_id(auth()->user()->id)->whereStatus(1)->get();
        return view('representative.application.assigned', compact(['applications']));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function completed()
    {
        $applications = ApplicationProgram::whereRepresentative_id(auth()->user()->id)->whereStatus(2)->get();
        return view('representative.application.completed', compact(['applications']));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rejected()
    {
        $applications = ApplicationProgram::whereRepresentative_id(auth()->user()->id)->whereStatus(-1)->get();
        return view('representative.application.rejected', compact(['applications']));
    }


    /**
     * Display details of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($page, $app_id)
    {
        $app_id = bindec($app_id);
        return view('representative.application.show', compact(['page']));
    }
}
