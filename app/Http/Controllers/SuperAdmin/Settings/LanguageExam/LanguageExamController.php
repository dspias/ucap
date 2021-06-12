<?php

namespace App\Http\Controllers\SuperAdmin\Settings\LanguageExam;

use App\Http\Controllers\Controller;
use App\Models\LanguageTest;
use Illuminate\Http\Request;

class LanguageExamController extends Controller
{
    public function __construct()
    {
        // Constructors
    }

    /**
     * Display a listing of the resource.
     *
     * Payment Gateways
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = LanguageTest::all();
        return view('superadmin.settings.languageexam.index', compact(['exams']));
    }


    /**
     * Store new country
     *
     * Countries
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, array(
            'name' => 'required',
            'score' => 'required | string',
            'desrciption' => 'required | string'
        ));

        $temp = LanguageTest::whereName($request->name)->first();
        if (!is_null($temp)) {
            toast(ucfirst($temp->name) . ' already exist!', 'warning')->autoClose(2000)->timerProgressBar();
            return redirect()->back();
        }


        $exam = new LanguageTest();
        $exam->name = $request->name;
        $exam->score = $request->score;
        $exam->desrciption = $request->desrciption;
        $exam->status = true;
        if ($exam->save()) {
            toast(ucfirst($exam->name) . ' has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($exam->name) . ' could not updated!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }

    /**
     * Store new country
     *
     * Countries
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $this->validate($request, array(
            'name' => 'required',
            'score' => 'required | string',
            'desrciption' => 'required | string'
        ));


        $exam = LanguageTest::findOrFail($request->exam_id);
        $exam->name = $request->name;
        $exam->score = $request->score;
        $exam->desrciption = $request->desrciption;
        $exam->status = true;
        if ($exam->save()) {
            toast(ucfirst($exam->name) . ' has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($exam->name) . ' could not updated!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
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

        $exam = LanguageTest::findOrFail($id);
        $exam->status = ($exam->status == true) ? false : true;
        if ($exam->save()) {
            toast(ucfirst($exam->name) . ' status has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($exam->name) . ' status could not updated!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }
}
