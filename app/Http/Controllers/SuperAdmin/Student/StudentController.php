<?php

namespace App\Http\Controllers\SuperAdmin\Student;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
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
        $students = User::with('student')->whereRole_id(5)->get();
        return view('superadmin.student.index', compact(['students']));
    }


    /**
     * Show Details of Student
     */
    public function show($student_id)
    {
        $student_id = bindec($student_id);
        $student = User::with(['student', 'applications'])->whereId($student_id)->firstOrFail();
        $educations = Education::where('student_id', $student_id)->get();
        return view('superadmin.student.show', compact(['student', 'educations']));
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



    // /**
    //  * Create New Student
    //  */
    // public function create()
    // {
    //     // $user = new User();
    //     // $user->type = 'TEST';
    //     // $user->registerMediaCollections('Rest');
    //     // $mediaCollections = $user->getRegisteredMediaCollections();
    //     // dd($mediaCollections);
    //     return view('superadmin.student.create');
    // }



    // /**
    //  * Edit Details of Student
    //  */
    // public function edit($student_id)
    // {
    //     $student_id = bindec($student_id);
    //     // dd($student_id);
    //     return view('superadmin.student.edit');
    // }


    /**
     * Edit Details of Student
     */
    public function ban($student_id)
    {
        $student_id = bindec($student_id);
        $student = User::with(['student', 'applications'])->whereId($student_id)->firstOrFail();
        optional($student->student)->clearMediaCollection('avatar');
        optional($student->student)->clearMediaCollection('nid_birth');
        optional($student->student)->clearMediaCollection('passport');
        optional($student->student)->clearMediaCollection('language_certificate');
        optional($student->student)->clearMediaCollection('signature');
        optional($student->student)->clearMediaCollection('additionals');
        foreach($student->applications as $application){
            $application->programs()->forceDelete();
            $application->forceDelete();
        }
        $student->student()->forceDelete();

        $educations = Education::where('student_id', $student_id)->get();
        foreach($educations as $education){
            $education->clearMediaCollection('document');
            $education->forceDelete();
        }
        $student->wishlists()->forceDelete();
        if($student->forceDelete()){
            toast('The student has been deleted permanetly', 'warning')->autoClose(5000)->timerProgressBar();
            return redirect()->route('superadmin.student.index');
        } else{
            toast('The student could not delete', 'danger')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        }

    }
}
