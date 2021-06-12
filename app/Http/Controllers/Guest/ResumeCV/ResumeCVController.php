<?php

namespace App\Http\Controllers\Guest\ResumeCV;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\StudentLanguageTest;
use App\Models\User;
use Illuminate\Http\Request;

class ResumeCVController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web']);
    }


    /**
     * View CV / Resume details
     */
    public function viewCV($student_id_bin, $student_id_hex)
    {
        $id = bindec($student_id_bin);
        $student = User::findOrFail($id);
        return view('guest.ResumeCV.index', compact(['student']));
    }

    /**
     * View CV / Resume details
     */
    public function downloadLanguageFile($model_id)
    {
        $id = bindec($model_id);
        $model = StudentLanguageTest::find($id);
        if (!is_null($model)) {
            $certificate = $model->getFirstMedia('certificate');
            if (!is_null($certificate))
                return response()->download($certificate->getPath(), $certificate->file_name);
        }
        toast('Document not found', 'warning')->autoClose(5000)->timerProgressBar();
        return redirect()->back();
    }

    /**
     * View CV / Resume details
     */
    public function downloadEducationFile($model_id)
    {
        $id = bindec($model_id);
        $model = Education::find($id);
        if (!is_null($model)) {
            $document = $model->getFirstMedia('document');
            if (!is_null($document))
                return response()->download($document->getPath(), $document->file_name);
        }
        toast('Document not found', 'warning')->autoClose(5000)->timerProgressBar();
        return redirect()->back();
    }
}
