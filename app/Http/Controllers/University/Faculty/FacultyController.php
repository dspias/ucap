<?php

namespace App\Http\Controllers\University\Faculty;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{

    public function __construct()
    {
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $faculties = Faculty::whereUniversity_id(auth()->user()->id)->get();
        return view('university.faculty.all', compact(['faculties']));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function active()
    {
        $faculties = Faculty::whereUniversity_id(auth()->user()->id)->whereStatus(true)->get();
        return view('university.faculty.active', compact(['faculties']));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inactive()
    {
        $faculties = Faculty::whereUniversity_id(auth()->user()->id)->whereStatus(false)->get();
        return view('university.faculty.inactive', compact(['faculties']));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('university.faculty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $university = auth()->user();
        $request->validate(array(
            'name' => 'required | string | max:191',
        ));

        $faculty = new Faculty();
        $faculty->university_id = $university->id;
        $faculty->name = $request->name;
        if (!isset($request->status)) $faculty->status = false;

        if ($faculty->save()) {
            toast(ucfirst($faculty->name) . ' has been created successfully', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($faculty->name) . ' didn\'t created. Please try again.', 'error')->autoClose(2000)->timerProgressBar();
            return redirect()->back();
        }
        return redirect()->route('university.faculty.show', ['id' => $faculty->id, 'page' => 'all']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(array(
            'name' => 'required | string | max:191',
        ));

        $faculty = Faculty::findOrFail($id);
        $faculty->name = $request->name;
        $faculty->status = (isset($request->status)) ? true : false;

        if ($faculty->save()) {
            toast(ucfirst($faculty->name) . ' has been updated successfully', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($faculty->name) . ' didn\'t updated. Please try again.', 'error')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }


    /**
     * Display details of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($page, $id)
    {
        if ($page == 'all') {
            $page_title = 'All Faculties';
        } elseif ($page == 'active') {
            $page_title = 'Active Faculties';
        } elseif ($page == 'inactive') {
            $page_title = 'Inactive Faculties';
        } else {
            return redirect()->back();
        }
        $faculty = Faculty::with(['programs', 'university'])->whereId($id)->whereUniversity_id(auth()->user()->id)->firstOrFail();

        return view('university.faculty.show', compact(['page', 'page_title', 'faculty']));
    }


    /**
     * change status
     *
     * Countries
     *
     * @return \Illuminate\Http\Response
     */
    public function change_status($id)
    {

        $faculty = Faculty::findOrFail($id);
        $faculty->status = ($faculty->status == true) ? false : true;
        if ($faculty->save()) {
            toast(ucfirst($faculty->name) . ' status has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($faculty->name) . ' status could not updated!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }
}
