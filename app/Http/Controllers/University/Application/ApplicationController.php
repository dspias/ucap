<?php

namespace App\Http\Controllers\University\Application;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationProgram;
use App\Models\Education;
use App\Models\Student;

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
    public function all()
    {
        $applications = Application::whereHas('programs', function($builder){
            $builder->whereUniversity_id(auth()->user()->id);
        })->orderBy('id', 'desc')->get();
        return view('university.application.all', compact(['applications']));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function processing()
    {
        $applications = Application::whereHas('programs', function($builder){
            $builder->whereUniversity_id(auth()->user()->id);
        })->whereStatus(1)->orderBy('id', 'desc')->get();
        return view('university.application.processing', compact(['applications']));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accepted()
    {
        $applications = Application::whereHas('programs', function($builder){
            $builder->whereUniversity_id(auth()->user()->id);
        })->whereStatus(2)->orderBy('id', 'desc')->get();
        return view('university.application.accepted', compact(['applications']));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending()
    {
        $applications = Application::whereHas('programs', function($builder){
            $builder->whereUniversity_id(auth()->user()->id);
        })->whereStatus(0)->orderBy('id', 'desc')->get();
        return view('university.application.pending', compact(['applications']));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rejected()
    {
        $applications = Application::whereHas('programs', function($builder){
            $builder->whereUniversity_id(auth()->user()->id);
        })->whereStatus(-1)->orderBy('id', 'desc')->get();
        return view('university.application.rejected', compact(['applications']));
    }


    /**
     * Display details of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($page, $id)
    {
        $id = bindec($id);
        if($page == 'all'){
            $page_title = 'All Applications';
        } elseif($page == 'processing') {
            $page_title = 'Processing Applications';
        } elseif($page == 'accepted') {
            $page_title = 'Accepted Applications';
        } elseif($page == 'pending') {
            $page_title = 'Pending Applications';
        } else {
            $page_title = 'Rejected Applications';
        }

        $application = Application::whereId($id)->firstOrFail();
        return view('university.application.show', compact(['page', 'page_title', 'application']));
    }


    /**
     * Display details of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function student($page, $student_id)
    {
        if($page == 'all'){
            $page_title = 'All Applications';
        } elseif($page == 'processing') {
            $page_title = 'Processing Applications';
        } elseif($page == 'accepted') {
            $page_title = 'Accepted Applications';
        } elseif($page == 'pending') {
            $page_title = 'Pending Applications';
        } else {
            $page_title = 'Rejected Applications';
        }
        $student_id = bindec($student_id);
        $student = User::with(['student', 'applications'])->whereId($student_id)->firstOrFail();
        $educations = Education::where('student_id', $student_id)->get();
        return view('university.application.student', compact(['page', 'page_title', 'student', 'educations']));
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






    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadFile($id, $type)
    {
        $model = Student::whereUser_id($id)->first();
        if (!is_null($model)) {
            $document = $model->getFirstMedia($type);
            if (!is_null($document))
                return response()->download($document->getPath(), $document->file_name);
        }
        toast('Document not found', 'warning')->autoClose(5000)->timerProgressBar();
        return redirect()->back();
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function educationDownload($model_id)
    {
        $model = Education::find($model_id);
        if (!is_null($model)) {
            $document = $model->getFirstMedia('document');
            if (!is_null($document))
                return response()->download($document->getPath(), $document->file_name);
        }
        toast('Document not found', 'warning')->autoClose(5000)->timerProgressBar();
        return redirect()->back();
    }
}
