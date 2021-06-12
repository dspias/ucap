<?php

namespace App\Http\Controllers\Guest\Faculty;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function __construct(){
        $this->middleware(['web']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::whereStatus(true)
                            ->with(['university', 'programs' => function($builder){
                                $builder->whereStatus(true);
                            }])
                            ->whereHas('university', function($builder){
                                $builder->whereStatus(true);
                            })
                            ->get();
        // dd($faculties);
        return view('guest.faculty.index', compact(['faculties']));
    }



    /**
     * show details of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($faculty_id, $faculty_name)
    {
        $faculty_id = bindec($faculty_id);

        $faculty = Faculty::whereId($faculty_id)
                            ->whereStatus(true)
                            ->with(['university'])
                            ->whereHas('university', function($builder){
                                $builder->whereStatus(true);
                            })
                            ->firstOrFail();
        return view('guest.faculty.show', compact(['faculty']));
    }
}
