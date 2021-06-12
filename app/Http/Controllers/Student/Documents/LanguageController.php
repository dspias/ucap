<?php

namespace App\Http\Controllers\Student\Documents;

use App\Http\Controllers\Controller;
use App\Models\StudentLanguageTest;
use Illuminate\Http\Request;

class LanguageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadLanguage(Request $request)
    {
        $request->validate(array(
            'id' => 'required',
            'certificate' => 'required'
        ));

        $model = StudentLanguageTest::find($request->id);
        if (!is_null($model)) {
            if ($model->student_id == auth()->user()->id) {
                $model->addMedia($request->certificate)->toMediaCollection('certificate', env('DISK'));

                toast('Document uploaded succesfully', 'success')->autoClose(5000)->timerProgressBar();
                return redirect()->back();
            }
        }
        toast('Language test not found', 'warning')->autoClose(5000)->timerProgressBar();
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadLanguage($model_id)
    {
        $model = StudentLanguageTest::find($model_id);
        if (!is_null($model)) {
            if ($model->student_id == auth()->user()->id) {
                $certificate = $model->getFirstMedia('certificate');
                if (!is_null($certificate))
                    return response()->download($certificate->getPath(), $certificate->file_name);
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
    public function destroyLanguage($model_id)
    {
        $model = StudentLanguageTest::find($model_id);
        if (!is_null($model)) {
            if ($model->student_id == auth()->user()->id) {
                $certificates = $model->getMedia('certificate');
                foreach ($certificates as $certificate) $certificate->delete();
                toast('Document deleted succesfully', 'success')->autoClose(5000)->timerProgressBar();
                return redirect()->back();
            }
        }
        toast('Document not found', 'warning')->autoClose(5000)->timerProgressBar();
        return redirect()->back();
    }
}
