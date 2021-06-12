<?php

namespace App\Http\Controllers\SuperAdmin\Application;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationProgram;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function __construct(){
    }

    /**
     * Display a listing of the resource.
     *
     * All Applications List Page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::orderBy('id', 'desc')->get();
        return view('superadmin.application.index', compact(['applications']));
    }

    /**
     * Display a listing of the resource.
     *
     * processing Applications List Page
     *
     * @return \Illuminate\Http\Response
     */
    public function processing()
    {
        $applications = Application::whereStatus(1)->orderBy('id', 'desc')->get();
        return view('superadmin.application.processing', compact(['applications']));
    }

    /**
     * Display a listing of the resource.
     *
     * approved Applications List Page
     *
     * @return \Illuminate\Http\Response
     */
    public function approved()
    {
        $applications = Application::whereStatus(2)->orderBy('id', 'desc')->get();
        return view('superadmin.application.approved', compact(['applications']));
    }

    /**
     * Display a listing of the resource.
     *
     * Pending Applications List Page
     *
     * @return \Illuminate\Http\Response
     */
    public function pending()
    {
        $applications = Application::whereStatus(0)->orderBy('id', 'desc')->get();
        return view('superadmin.application.pending', compact(['applications']));
    }


    /**
     * Display a listing of the resource.
     *
     * rejected Applications List Page
     *
     * @return \Illuminate\Http\Response
     */
    public function rejected()
    {
        $applications = Application::whereStatus(-1)->orderBy('id', 'desc')->get();
        return view('superadmin.application.rejected', compact(['applications']));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    /**
     * Show Details of Application
     */
    public function show($page, $id, $application_id)
    {
        $id = bindec($id);
        $application = Application::whereId($id)->firstOrFail();
        return view('superadmin.application.show', compact(['application', 'page']));
    }


    /**
     * Show Details of Application
     */
    public function assignRep(Request $request)
    {
        $request->validate(array(
            'appitem' => 'required',
            'representative' => 'required',
        ));
        $appProgram = ApplicationProgram::whereId($request->appitem)->firstOrFail();
        $appProgram->representative_id = $request->representative;
        $appProgram->status = 1;
        if ($appProgram->save()) {
            $this->checkStatus($appProgram->application_id);
            toast('Representative has been assigned!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast('Representative could not be assign!', 'danger')->autoClose(2000)->timerProgressBar();
        }

        return redirect()->back();
    }


    /**
     * Show Details of Application
     */
    public function rejectWithReason(Request $request, $program_id)
    {
        $program_id = bindec($program_id);
        $request->validate(array(
            'note' => 'required | string',
        ));
        $appProgram = ApplicationProgram::whereId($program_id)->firstOrFail();
        $appProgram->note = $request->note;
        $appProgram->status = -1;
        if ($appProgram->save()) {
            $this->checkStatus($appProgram->application_id);
            toast('Application has been rejected!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast('Application could not be reject!', 'danger')->autoClose(2000)->timerProgressBar();
        }

        return redirect()->back();
    }

    private function checkStatus($application_id){
        $pending = $canceled = $processing = $complted = 0;
        $application = Application::whereId($application_id)->first();
        if(!is_null($application)){
            foreach($application->programs as $program){
                if($program->status == -1) $canceled++;
                elseif($program->status == 0) $pending++;
                elseif($program->status == 1) $processing++;
                elseif($program->status == 2) $complted++;
            }
            if( $canceled > 0 && $processing == 0 && $pending == 0 && $complted == 0){
                $application->status = -1;
            } elseif( $processing > 0 ){
               $application->status = 1;
            } elseif( $complted > 0 &&  $processing == 0 && $pending == 0) {
                $application->status = 2;
            }
            $application->save();
        }
    }
}
