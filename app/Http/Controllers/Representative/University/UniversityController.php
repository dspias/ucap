<?php

namespace App\Http\Controllers\Representative\University;

use App\Models\User;
use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UniversityController extends Controller
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
        $university = User::with('university')->whereRole_id(get_roleid('university'))->whereHas('universityRepresentatives', function($data){
            $data->whereUser_id(auth()->user()->id);
        })->firstOrFail();

        // dd($university);
        
        return view('representative.university.index', compact(['university']));
    }


    /**
     * Display details of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function faculty($uni_id, $faculty_id)
    {
        $uni_id = bindec($uni_id);
        $faculty_id = bindec($faculty_id);

        $faculty = Faculty::with(['programs', 'university'])->whereId($faculty_id)->firstOrFail();

        return view('representative.university.faculty', compact(['faculty', 'uni_id']));
    }
}
