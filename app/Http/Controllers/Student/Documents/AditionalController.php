<?php

namespace App\Http\Controllers\Student\Documents;

use App\Http\Controllers\Controller;
use App\Models\StudentAdditionalDoc;
use Illuminate\Http\Request;

class AditionalController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadAditional(Request $request)
    {
        $request->validate(array(
            'name' => 'required | string',
            'document' => 'required'
        ));

        $model = new StudentAdditionalDoc();
        $model->student_id = auth()->user()->id;
        $model->name = $request->name;
        $model->save();
        if (!is_null($model)) {
            if ($model->student_id == auth()->user()->id) {
                $model->addMedia($request->document)->toMediaCollection('document', env('DISK'));

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
    public function downloadAditional($model_id)
    {
        $model = StudentAdditionalDoc::find($model_id);
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
    public function destroyAditional($model_id)
    {
        $model = StudentAdditionalDoc::find($model_id);
        if (!is_null($model)) {
            if ($model->student_id == auth()->user()->id) {
                $documents = $model->getMedia('document');
                foreach ($documents as $document) $document->delete();
                $model->delete();
                toast('Document deleted succesfully', 'success')->autoClose(5000)->timerProgressBar();
                return redirect()->back();
            }
        }

        toast('Document not found', 'warning')->autoClose(5000)->timerProgressBar();
        return redirect()->back();
    }
}
