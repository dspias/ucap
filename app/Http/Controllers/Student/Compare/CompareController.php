<?php

namespace App\Http\Controllers\Student\Compare;

use App\Facades\Compare;
use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CompareController extends Controller
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
        return view('student.compare.index');
    }

    /**
     * Display details of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addremove($program_id)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        } elseif(Auth::check() && Auth::user()->role->slug != 'student'){
            alert()->warning('Alert','You are not able to apply with this user!');
            return redirect()->back();
        }
        $program_id = bindec($program_id);
        $program = Program::whereId($program_id)->whereStatus(true)->firstOrFail();
        if(!Compare::match($program->id)){
            Compare::add($program);
        } else {
            Compare::remove($program->id);
        }
        return redirect()->back();
    }

    /**
     * Display details of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function clear()
    {
        Compare::clear();
        return redirect()->route('guest.program.index');
    }
}
