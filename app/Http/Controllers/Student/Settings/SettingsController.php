<?php

namespace App\Http\Controllers\Student\Settings;

use App\Models\User;
use App\Models\Student;
use App\Models\Education;
use App\Models\LanguageTest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentLanguageTest;
use App\Models\StudentReference;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{

    public function __construct()
    {
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user = User::with('student')->whereId(auth()->user()->id)->first();
        return view('student.settings.profile', compact(['user']));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profileUpdate(Request $request)
    {
        $request->validate([
            'first_name' => 'required | string | max:255',
            'last_name' => 'required | string | max:255',
            'gender'    => 'required | string | max:255',
            'day'   => 'required | integer | between:1,31',
            'month' => 'required | integer | between:1,12',
            'year'  => 'required | integer | between:1,9999',
            'language'  => 'required | string | max:255',
            'phone' => 'required | string | max:255',
            'country'   => 'required | string | max:255',
            'state' => 'required | string | max:255',
            'city'  => 'required | string | max:255',
            'address'  => 'required | string | max:500',
        ]);

        $name = $request->first_name . " " . $request->last_name;
        if (!is_null($request->middle_name)) {
            $request->validate([
                "middle_name"   => 'required | string | max:255',
            ]);
            $name = $request->first_name . " " . $request->middle_name . " " . $request->last_name;
        }

        $user = User::with('student')->whereId(auth()->user()->id)->firstOrFail();

        $student = $user->student;
        if (is_null($student)) {
            $student = new Student();
            $student->user_id = $user->id;
        }

        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->last_name = $request->last_name;
        $student->gender = $request->gender;
        $dob = $request->year . '-' . $request->month . '-' . $request->day;
        $student->dob = $dob;
        $student->language = $request->language;
        $student->phone = $request->phone;
        $student->country = $request->country;
        $student->state = $request->state;
        $student->city = $request->city;
        $student->address = $request->address;

        if ($student->save()) {
            $user->name = $name;
            $user->save();
            toast(ucfirst($user->name) . '\'s profile has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($user->name) . '\'s profile could not updated!', 'error')->autoClose(2000)->timerProgressBar();
            return redirect()->back();
        }
        return redirect()->route('student.profile.index');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function education()
    {
        $educations = Education::where('student_id', auth()->user()->id)->get();
        return view('student.settings.education', compact(['educations']));
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function educationStore(Request $request)
    {
        $auth = auth()->user();
        $education = new Education();

        $request->validate(array(
            "level" => "required | string",
            "field" => "required | string",
            "address" => "required | string",
            "start_year" => "required | date_format:Y",
        ));

        $education->student_id = $auth->id;
        $education->level = $request->level;
        $education->field = $request->field;
        $education->address = $request->address;
        $education->start_year = $request->start_year;

        if ($request->hasFile('document')) {
            $request->validate(array(
                "document" => "required | max:2048",
            ));
            $education->addMedia($request->document)->toMediaCollection('document', env('DISK'));
        }

        if (!is_null($request->institute)) {
            $request->validate(array(
                "institute" => "required | string",
            ));
            $education->institute = $request->institute;
        }
        if (!is_null($request->major_subject)) {
            $request->validate(array(
                "major_subject" => "required | string",
            ));
            $education->major_subject = $request->major_subject;
        }
        if (!isset($request->studying)) {
            $request->validate(array(
                "end_year" => "required | date_format:Y",
                "score" => "required",
            ));
            $education->end_year = $request->end_year;
            $education->score = $request->score;
        } else {
            $education->running = true;
        }

        if ($education->save()) {
            toast(ucfirst($education->field) . ' has been created!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($education->field) . ' could not created!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function educationDestroy($id)
    {
        $education = Education::findOrFail($id);
        $field = $education->field;

        $mediaItems = $education->getMedia('document');
        foreach ($mediaItems as $item) $item->delete();


        if ($education->delete()) {
            toast(ucfirst($field) . ' has been Deleted!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($field) . ' could not Deleted!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function educationUpdate(Request $request)
    {

        $request->validate(array(
            "id" => "required",
            "level" => "required | string",
            "field" => "required | string",
            "address" => "required | string",
            "start_year" => "required | date_format:Y",
        ));

        $education = Education::findOrFail($request->id);
        $education->level = $request->level;
        $education->field = $request->field;
        $education->institute = $request->institute;
        $education->address = $request->address;
        $education->start_year = $request->start_year;
        if ($request->hasFile('document')) {
            $request->validate(array(
                "document" => "required | max:2048",
            ));

            $mediaItems = $education->getMedia('document');
            foreach ($mediaItems as $item) $item->delete();

            $education->addMedia($request->document)->toMediaCollection('document', env('DISK'));
        }

        if (!is_null($request->institute)) {
            $request->validate(array(
                "institute" => "required | string",
            ));
            $education->institute = $request->institute;
        }

        if (!is_null($request->major_subject)) {
            $request->validate(array(
                "major_subject" => "required | string",
            ));
            $education->major_subject = $request->major_subject;
        }
        if (!isset($request->studying)) {
            $request->validate(array(
                "end_year" => "required | date_format:Y",
                "score" => "required",
            ));
            $education->end_year = $request->end_year;
            $education->score = $request->score;
            $education->running = false;
        } else {
            $education->running = true;
            $education->end_year = null;
            $education->score = null;
        }

        if ($education->save()) {
            toast(ucfirst($education->field) . ' has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($education->field) . ' could not updated!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reference()
    {
        $references = StudentReference::whereStudent_id(auth()->user()->id)->get();
        return view('student.settings.reference', compact(['references']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function referenceStore(Request $request)
    {
        $request->validate(array(
            "first_name" => "required | string",
            "last_name" => "required | string",
            "professional_designation" => "required | string",
            "company_institution" => "required | string",
            "email" => "required | string | email",
        ));

        $reference = new StudentReference();
        $reference->student_id = auth()->user()->id;
        $reference->first_name = $request->first_name;
        $reference->last_name = $request->last_name;
        $reference->professional_designation = $request->professional_designation;
        $reference->company_institution = $request->company_institution;
        $reference->email = $request->email;

        if(!is_null($request->phone)){
            $request->validate(array(
                "phone" => "required | string | max:15",
            ));
            $reference->phone = $request->phone;
        }

        if ($reference->save()) {
            toast('Reference has been created!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast('Reference could not created!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function referenceUpdate(Request $request)
    {

        $request->validate(array(
            "id" => "required",
            "last_name" => "required | string",
            "professional_designation" => "required | string",
            "company_institution" => "required | string",
            "email" => "required | string | email",
        ));

        $reference = StudentReference::findOrFail($request->id);
        $reference->first_name = $request->first_name;
        $reference->last_name = $request->last_name;
        $reference->professional_designation = $request->professional_designation;
        $reference->company_institution = $request->company_institution;
        $reference->email = $request->email;

        if(!is_null($request->phone)){
            $request->validate(array(
                "phone" => "required | string | max:15",
            ));
            $reference->phone = $request->phone;
        }

        if ($reference->save()) {
            toast('Reference has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast('Reference could not updated!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function referenceDestroy($id)
    {
        $reference = StudentReference::findOrFail($id);
        if ($reference->delete()) {
            toast('Reference has been Deleted!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast('Reference could not Deleted!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function language()
    {
        $langTests = LanguageTest::whereStatus(true)->get();
        $certificates = StudentLanguageTest::whereStudent_id(auth()->user()->id)->get();
        return view('student.settings.language', compact(['langTests', 'certificates']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function languageStore(Request $request)
    {
        $request->validate(array(
            "language_id" => "required | integer",
            "band" => "required | string",
        ));

        $certificate = StudentLanguageTest::whereLanguage_id($request->language_id)->whereStudent_id(auth()->user()->id)->first();
        if(is_null($certificate)){
            $certificate = new StudentLanguageTest();
            $certificate->student_id = auth()->user()->id;
            $certificate->language_id = $request->language_id;
        }
        $certificate->band = $request->band;

        if(isset($request->individual)){
            $request->validate(array(
                "details" => "required | string",
            ));
            $certificate->individual = true;
            $certificate->details = $request->details;
        }


        if ($request->hasFile('certificate')) {
            $request->validate(array(
                "certificate" => "required | max:2048",
            ));

            $mediaItems = $certificate->getMedia('certificate');
            foreach ($mediaItems as $item) $item->delete();

            $certificate->addMedia($request->certificate)->toMediaCollection('certificate', env('DISK'));
        }

        if ($certificate->save()) {
            toast('Language test result has been created!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast('Language test result could not created!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function languageUpdate(Request $request)
    {

        $request->validate(array(
            "id" => "required",
            "language_id" => "required | integer",
            "band" => "required | string",
        ));

        $certificate = StudentLanguageTest::findOrFail($request->id);
        $certificate->language_id = $request->language_id;
        $certificate->student_id = auth()->user()->id;
        $certificate->band = $request->band;

        if(isset($request->individual)){
            $request->validate(array(
                "details" => "required | string",
            ));
            $certificate->individual = true;
            $certificate->details = $request->details;
        }


        if ($request->hasFile('certificate')) {
            $request->validate(array(
                "certificate" => "required | max:2048",
            ));

            $mediaItems = $certificate->getMedia('certificate');
            foreach ($mediaItems as $item) $item->delete();

            $certificate->addMedia($request->certificate)->toMediaCollection('certificate', env('DISK'));
        }

        if ($certificate->save()) {
            toast('Language test result has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast('Language test result could not updated!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function languageDestroy($id)
    {
        $certificate = StudentLanguageTest::findOrFail($id);

        $mediaItems = $certificate->getMedia('document');
        foreach ($mediaItems as $item) $item->delete();

        if ($certificate->delete()) {
            toast('Language test result has been Deleted!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast('Language test result could not Deleted!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function security()
    {
        return view('student.settings.security');
    }

    //Change Password
    public function change_password(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'old_password'          => 'required | string | min:8',
            'new_password'          => 'required | string | min:8 | same:confirm_password',
        ]);

        if (!Hash::check($request->old_password, Auth::user()->password)) {
            toast('Your Old Password Does not Match.', 'error')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        } elseif ($request->old_password == $request->new_password) {
            toast('Old Password and New Password must be Different.', 'error')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        } else {
            $user = User::find(auth()->user()->id);

            $user->password = Hash::make($request->new_password);

            $user->save();
            toast('Your Password has been Updated Succesfully.', 'success')->autoClose(5000)->timerProgressBar();

            return redirect()->back();
        }
    }
}
