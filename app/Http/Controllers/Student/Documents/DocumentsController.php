<?php

namespace App\Http\Controllers\Student\Documents;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Student;
use App\Models\StudentAdditionalDoc;
use App\Models\StudentLanguageTest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DocumentsController extends Controller
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
        $educations = Education::select(['id', 'student_id', 'level', 'field'])->where('student_id', auth()->user()->id)->get();
        $languages = StudentLanguageTest::where('student_id', auth()->user()->id)->get();
        $aditionals = StudentAdditionalDoc::where('student_id', auth()->user()->id)->get();
        $student = Student::whereUser_id(auth()->user()->id)->first();
        return view('student.documents.index', compact(['educations', 'languages', 'aditionals', 'student']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request, $type)
    {
        $request->validate(array(
            'document' => 'required',
        ));

        $model =  Student::whereUser_id(auth()->user()->id)->first();
        if (!is_null($model)) {
            if ($model->user_id == auth()->user()->id) {
                $model->addMedia($request->document)->toMediaCollection($type, env('DISK'));

                toast('Document uploaded succesfully', 'success')->autoClose(5000)->timerProgressBar();
                return redirect()->back();
            }
        }
        toast('Profile not found', 'warning')->autoClose(5000)->timerProgressBar();
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function download($type)
    {
        $model = Student::whereUser_id(auth()->user()->id)->first();
        if (!is_null($model)) {
            if ($model->user_id == auth()->user()->id) {
                $document = $model->getFirstMedia($type);
                if (!is_null($document))
                    return response()->download($document->getPath(), $document->file_name);
            }
        }
        toast('Document not found', 'warning')->autoClose(5000)->timerProgressBar();
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($type)
    {
        $model = Student::whereUser_id(auth()->user()->id)->first();
        if (!is_null($model)) {
            if ($model->user_id == auth()->user()->id) {
                $documents = $model->getMedia($type);
                foreach ($documents as $document) $document->delete();
                toast('Document deleted succesfully', 'success')->autoClose(5000)->timerProgressBar();
                return redirect()->back();
            }
        }
        toast('Document not found', 'warning')->autoClose(5000)->timerProgressBar();
        return redirect()->back();
    }







    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadEducation(Request $request)
    {
        $request->validate(array(
            'id' => 'required',
            'document' => 'required'
        ));

        $model = Education::find($request->id);
        if (!is_null($model)) {
            if ($model->student_id == auth()->user()->id) {
                $model->addMedia($request->document)->toMediaCollection('document', env('DISK'));

                toast('Document uploaded succesfully', 'success')->autoClose(5000)->timerProgressBar();
                return redirect()->back();
            }
        }
        toast('Education not found', 'warning')->autoClose(5000)->timerProgressBar();
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadEducation($model_id)
    {
        $model = Education::find($model_id);
        if (!is_null($model)) {
            if ($model->student_id == auth()->user()->id) {
                $document = $model->getFirstMedia('document');
                if (!is_null($document))
                    return response()->download($document->getPath(), $document->file_name);
            }
        }
        toast('Document not found', 'warning')->autoClose(5000)->timerProgressBar();
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyEducation($model_id)
    {
        $model = Education::find($model_id);
        if (!is_null($model)) {
            if ($model->student_id == auth()->user()->id) {
                $documents = $model->getMedia('document');
                foreach ($documents as $document) $document->delete();
                toast('Document deleted succesfully', 'success')->autoClose(5000)->timerProgressBar();
                return redirect()->back();
            }
        }
        toast('Document not found', 'warning')->autoClose(5000)->timerProgressBar();
        return redirect()->back();
    }
}
