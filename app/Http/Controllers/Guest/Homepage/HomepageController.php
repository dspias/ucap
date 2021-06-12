<?php

namespace App\Http\Controllers\Guest\Homepage;

use App\Http\Controllers\Controller;
use App\Models\ApplicationProgram;
use App\Models\Country;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;

class HomepageController extends Controller
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
        $provinces = State::whereHas('country', function($builder){
            $builder->whereSlug('CA');
        })->whereStatus(true)->get();

        $active = array(
            'university'    => User::whereRole_id(get_roleid('university'))->whereStatus(true)->count(),
            'program'    => Program::whereStatus(true)->count(),
            'apply'    => ApplicationProgram::whereStatus(true)->count(),
        );

        $max_uni  = ucap_get('max_university') ?? 4;
        $universities = User::with('university.city')->whereRole_id(get_roleid('university'))->whereStatus(true)->inRandomOrder()->limit($max_uni)->get();

        $max_pro  = ucap_get('max_program') ?? 4;
        $programs = Program::whereHas('faculty', function ($builder) {
            $builder->whereStatus(true)->whereHas('university', function ($q) {
                $q->whereStatus(true);
            });
        })->whereStatus(true)->inRandomOrder()->limit($max_pro)->get();

        $faculties = Faculty::whereHas('university', function ($builder) {
            $builder->whereStatus(true);
        })->whereStatus(true)->inRandomOrder()->limit(3)->get();
        return view('guest.homepage.index', compact(['provinces', 'active', 'universities', 'programs', 'faculties']));
    }


    /**
     * changeLang
     */
    public function changeLang(Request $request, $lang)
    {
        $user = User::findOrFail(auth()->user()->id);
        $user->lang = $lang;

        if ($user->save()) {
            toast(strtoupper($user->lang) . ' Language Changed Successfully', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(strtoupper($user->lang) . ' Language Does not Changed', 'error')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }
}
