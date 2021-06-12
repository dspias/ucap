<?php

namespace App\Http\Controllers\Guest\University;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\State;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;

class UniversityController extends Controller
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
    public function index(Request $request)
    {
        $provinces = State::whereHas('country', function($builder){
            $builder->whereSlug('CA');
        })->whereStatus(true)->get();
        $universities = $this->makeQuery($request);
        $selected = array(
            'name' => $request->name,
            'province' => isset($request->province) ? $request->province : array(),
        );
        return view('guest.university.index', compact(['universities', 'selected', 'provinces']));
    }


    private function makeQuery($request){
        $builder = User::whereRole_id(get_roleid('university'))->whereStatus(true);
        if(!is_null($request->name)){
            $builder->where("name", "LIKE", "%$request->name%");
        }
        if(!is_null($request->province)){
            $provinces = $request->province;
            $builder->whereHas('university.city.state', function($nested)use($provinces){
                $nested->whereIn('id',$provinces);
            });
        }
        return $builder->paginate(20);
    }



    /**
     * show details of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id, $name)
    {
        $id = bindec($id);
        $university = User::whereRole_id(get_roleid('university'))->whereId($id)->whereStatus(true)->firstOrFail();
        $programs = Program::whereHas('faculty', function ($builder) use ($id) {
            $builder->whereUniversity_id($id)->whereStatus(true);
        })->whereStatus(true)->get();
        return view('guest.university.show', compact(['university', 'programs']));
    }
}
