<?php

namespace App\Http\Controllers\SuperAdmin\University;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $uni_id)
    {
        $request->validate(array(
            'name' => 'required | string | max:191',
        ));

        $faculty = new Faculty();
        $faculty->university_id = $uni_id;
        $faculty->name = $request->name;
        if (!isset($request->status)) $faculty->status = false;

        if ($faculty->save()) {
            toast(ucfirst($faculty->name) . ' has been created successfully', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($faculty->name) . ' didn\'t created. Please try again.', 'error')->autoClose(2000)->timerProgressBar();
            return redirect()->back();
        }
        return redirect()->route('superadmin.university.show', ['id' => $uni_id, 'page' => 'all']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $faculty_id)
    {
        $request->validate(array(
            'name' => 'required | string | max:191',
        ));

        $faculty_id = bindec($faculty_id);
        $faculty = Faculty::findOrFail($faculty_id);
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
    public function show($uni_id, $faculty_id)
    {
        $uni_id = bindec($uni_id);
        $faculty_id = bindec($faculty_id);

        $faculty = Faculty::with(['programs', 'university'])->whereId($faculty_id)->firstOrFail();

        return view('superadmin.university.faculty.show', compact(['faculty', 'uni_id']));
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
