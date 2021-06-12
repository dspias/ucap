<?php

namespace App\Http\Controllers\SuperAdmin\University;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\LanguageTest;
use App\Models\Program;
use App\Models\ProgramCurriculum;
use App\Models\ProgramFeature;
use App\Models\ProgramRequirement;
use App\Models\ProgramSession;
use Illuminate\Http\Request;

class ProgramController extends Controller
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
    public function store(Request $request, $faculty_id)
    {
        // dd($request);
        $request->validate([
            'name'    =>     'required | string | max:255',
            'short_name'    =>     'required | string | max:10',
            'level'   =>     'required | string | max:255',
        ]);



        $faculty = Faculty::findOrFail($faculty_id);
        $pid = $faculty->university_id . strtotime(now()) . $faculty_id;

        $program = Program::create(array(
            'faculty_id' => $faculty_id,
            'name' => $request->name,
            'short_name' => $request->short_name,
            'level' => $request->level,
            'pid' => $pid,
        ));

        if (isset($request->status)) $program->status = true;

        if ($program->save()) {
            toast(ucfirst($program->name) . ' has been created successfully', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($program->name) . ' didn\'t create. Please try again.', 'error')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        }
        return redirect()->route('superadmin.university.faculty.program.edit', ['program_id' => decbin($program->id)]);
    }

    /**
     * update a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $program_id)
    {
        $program_id = bindec($program_id);
        $program = Program::findOrFail($program_id);

        // if name updated
        if (isset($request->name)) {
            $request->validate([
                'name'    =>     'required | string | max:255',
            ]);
            $program->name = $request->name;
        }
        // if short_name updated
        if (isset($request->short_name)) {
            $request->validate([
                'short_name'    =>     'required | string | max:10',
            ]);
            $program->short_name = $request->short_name;
        }

        // if level updated
        if (isset($request->level)) {
            $request->validate([
                'level'    =>     'required | string | max:255',
            ]);
            $program->level = $request->level;

            $program->status = (isset($request->status)) ? true : false;
        }


        // if program_overview updated
        if (isset($request->program_overview)) {
            $request->validate([
                'program_overview'    =>   'required | string | max:5000',
            ]);
            $program->program_overview = $request->program_overview;
        }


        // if career_path updated
        if (isset($request->career_path)) {
            $request->validate([
                'career_path'    =>   'required | string | max:5000',
            ]);
            $program->career_path = $request->career_path;
        }


        // if yearly_fee updated
        if (isset($request->yearly_fee)) {
            $request->validate([
                'yearly_fee'    =>   'required | numeric',
            ]);
            $program->yearly_fee = $request->yearly_fee;
        }


        // if application_fee updated
        if (isset($request->application_fee)) {
            $request->validate([
                'application_fee'    =>   'required | numeric',
            ]);
            $program->application_fee = $request->application_fee;
        }


        // if credit_fee updated
        if (isset($request->credit_fee)) {
            $request->validate([
                'credit_fee'    =>   'required | numeric',
            ]);
            $program->credit_fee = $request->credit_fee;
        }


        // if lab_fee updated
        if (isset($request->lab_fee)) {
            $request->validate([
                'lab_fee'    =>   'required | numeric',
            ]);
            $program->lab_fee = $request->lab_fee;
        }


        // if retake_fee updated
        if (isset($request->retake_fee)) {
            $request->validate([
                'retake_fee'    =>   'required | numeric',
            ]);
            $program->retake_fee = $request->retake_fee;
        }


        // if extra_fee updated
        if (isset($request->extra_fee)) {
            $request->validate([
                'extra_fee'    =>   'required | numeric',
            ]);
            $program->extra_fee = $request->extra_fee;
        }


        // if program_duration updated
        if (isset($request->program_duration)) {
            $request->validate([
                'program_duration'    =>   'required | integer',
            ]);
            $program->program_duration = $request->program_duration;
        }


        // if program_semester updated
        if (isset($request->program_semester)) {
            $request->validate([
                'program_semester'    =>   'required | integer',
            ]);
            $program->program_semester = $request->program_semester;
        }


        // if semester_duration updated
        if (isset($request->semester_duration)) {
            $request->validate([
                'semester_duration'    =>   'required | integer',
            ]);
            $program->semester_duration = $request->semester_duration;
        }


        // if internship updated
        if (isset($request->internship)) {
            $request->validate([
                'internship'    =>   'required | string',
            ]);
            $program->internship = $request->internship;
        }


        // if scholarship updated
        if (isset($request->scholarship)) {
            $request->validate([
                'scholarship'    =>   'required | string',
            ]);
            $program->scholarship = $request->scholarship;
        }

        // if attendance_type updated
        if (isset($request->attendance_type)) {
            $request->validate([
                'attendance_type'    =>   'required | string',
            ]);
            $program->attendance_type = $request->attendance_type;
        }

        // if total_credit updated
        if (isset($request->total_credit)) {
            $request->validate([
                'total_credit'    =>   'required | numeric',
            ]);
            $program->total_credit = $request->total_credit;
        }


        // if website updated
        if (isset($request->website)) {
            $request->validate([
                'website'    =>   'required | string',
            ]);
            $program->website = $request->website;
        }


        if ($program->save()) {
            toast(ucfirst($program->name) . ' has been updated successfully', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($program->name) . ' didn\'t update. Please try again.', 'error')->autoClose(5000)->timerProgressBar();
            return redirect()->back();
        }
        return redirect()->back();
    }




    // /**
    //  * Display details of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($program_id)
    // {
    //     $program_id = bindec($program_id);
    //     $program = Program::whereId($program_id)->firstOrfail();
    //     return view('superadmin.university.program.show', compact(['program']));
    // }


    /**
     * Display edit page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($program_id)
    {
        $program_id = bindec($program_id);

        $program = Program::whereId($program_id)->firstOrfail();
        $langTests = LanguageTest::whereStatus(true)->get();
        return view('superadmin.university.program.edit', compact(['program', 'langTests']));
    }


    /**
     * Display edit page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addRequirement(Request $request, $program_id)
    {
        $program_id = bindec($program_id);
        $program = Program::find($program_id);
        if (!is_null($program)) {
            $request->validate(array(
                'requirement' => 'required | string'
            ));

            $requirement  = new ProgramRequirement();
            $requirement->program_id = $program_id;
            $requirement->requirement = $request->requirement;

            if ($requirement->save()) {
                toast('New requirement has been created successfully', 'success')->autoClose(2000)->timerProgressBar();
            } else {
                toast('New requirement didn\'t create. Please try again.', 'error')->autoClose(5000)->timerProgressBar();
            }
        } else {
            toast('Program not found!', 'error')->autoClose(5000)->timerProgressBar();
        }
        return redirect()->back();
    }


    /**
     * Display edit page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function removeRequirement(Request $request)
    {
        $request->validate(array(
            'requirement' => 'required | integer'
        ));

        $requirement  = ProgramRequirement::findOrFail($request->requirement);

        if ($requirement->delete()) {
            toast('A requirement has been deleted successfully', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast('A equirement didn\'t delete. Please try again.', 'error')->autoClose(5000)->timerProgressBar();
        }
        return redirect()->back();
    }


    /**
     * Display edit page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addSession(Request $request, $program_id)
    {
        $program_id = bindec($program_id);
        $program = Program::find($program_id);
        if (!is_null($program)) {
            $request->validate(array(
                'name' => 'required | string',
                'session_start' => 'required | date_format:Y-m-d',
                'application_deadline' => 'required | date_format:Y-m-d',
            ));

            $session  = new ProgramSession();
            $session->program_id = $program_id;
            $session->name = $request->name;
            $session->session_start = $request->session_start;
            $session->application_deadline = $request->application_deadline;

            if ($session->save()) {
                toast('New session has been created successfully', 'success')->autoClose(2000)->timerProgressBar();
            } else {
                toast('New session didn\'t create. Please try again.', 'error')->autoClose(5000)->timerProgressBar();
            }
        } else {
            toast('Program not found!', 'error')->autoClose(5000)->timerProgressBar();
        }
        return redirect()->back();
    }


    /**
     * Display edit page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function removesession(Request $request)
    {
        $request->validate(array(
            'session' => 'required | integer'
        ));

        $session  = Programsession::findOrFail($request->session);

        if ($session->delete()) {
            toast('A session has been deleted successfully', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast('A session didn\'t delete. Please try again.', 'error')->autoClose(5000)->timerProgressBar();
        }
        return redirect()->back();
    }


    /**
     * Display edit page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addLanguage(Request $request, $program_id)
    {
        $program_id = bindec($program_id);
        $program = Program::find($program_id);
        if (!is_null($program)) {
            $request->validate(array(
                'language' => 'required | integer',
                'band' => 'required | numeric'
            ));

            $test = $program->languageTests()->wherelanguage_test_id($request->language)->first();
            if (!is_null($test)) {
                toast('This Language test already added in this program', 'warning')->autoClose(2000)->timerProgressBar();
                return redirect()->back();
            }

            $attach = array(
                'band' => $request->band,
            );

            if (isset($request->individual)) {
                $request->validate(array(
                    'details' => 'required | string',
                ));
                $attach = array(
                    'band' => $request->band,
                    'individual' => true,
                    'details' => $request->details,
                );
            }

            $program->languageTests()->attach($request->language, $attach);

            toast('New Language Test has been added successfully', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast('Program not found!', 'error')->autoClose(5000)->timerProgressBar();
        }
        return redirect()->back();
    }


    /**
     * Display edit page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function removeLanguage(Request $request, $program_id)
    {
        $program_id = bindec($program_id);
        $program = Program::find($program_id);
        if (!is_null($program)) {
            $request->validate(array(
                'language' => 'required | integer',
            ));

            $program->languageTests()->detach($request->language);

            toast('New Language Test has been added successfully', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast('Program not found!', 'error')->autoClose(5000)->timerProgressBar();
        }
        return redirect()->back();
    }


    /**
     * Display edit page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addFeature(Request $request, $program_id)
    {
        $program_id = bindec($program_id);
        $program = Program::find($program_id);
        if (!is_null($program)) {
            $request->validate(array(
                'feature' => 'required | string'
            ));

            $feature  = new ProgramFeature();
            $feature->program_id = $program_id;
            $feature->feature = $request->feature;

            if ($feature->save()) {
                toast('New feature has been created successfully', 'success')->autoClose(2000)->timerProgressBar();
            } else {
                toast('New feature didn\'t create. Please try again.', 'error')->autoClose(5000)->timerProgressBar();
            }
        } else {
            toast('Program not found!', 'error')->autoClose(5000)->timerProgressBar();
        }
        return redirect()->back();
    }


    /**
     * Display edit page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function removeFeature(Request $request)
    {
        $request->validate(array(
            'feature' => 'required | integer'
        ));

        $feature  = ProgramFeature::findOrFail($request->feature);

        if ($feature->delete()) {
            toast('A feature has been deleted successfully', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast('A feature didn\'t delete. Please try again.', 'error')->autoClose(5000)->timerProgressBar();
        }
        return redirect()->back();
    }


    /**
     * Display edit page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCurriculum(Request $request, $program_id)
    {
        $program_id = bindec($program_id);
        $program = Program::find($program_id);
        if (!is_null($program)) {
            $request->validate(array(
                'title' => 'required | string',
                'semester_no' => 'required | integer'
            ));

            $curriculum  = ProgramCurriculum::create(array(
                'program_id'    =>  $program_id,
                'title'    =>  $request->title,
                'semester_no'    =>  $request->semester_no,
            ));
            $flag = false;
            foreach ($request->subjects as $subject) {
                $course = new Course();
                $course->curriculum_id = $curriculum->id;
                $course->name = $subject['name'];
                $course->code = $subject['code'];
                $course->credit = $subject['credit'];
                $course->save();
                $flag = true;
            }

            if ($flag) {
                toast('New Semester has been created successfully', 'success')->autoClose(2000)->timerProgressBar();
            } else {
                toast('New Semester didn\'t create. Please try again.', 'error')->autoClose(5000)->timerProgressBar();
            }
        } else {
            toast('Program not found!', 'error')->autoClose(5000)->timerProgressBar();
        }
        return redirect()->back();
    }


    /**
     * Display edit page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCurriculum(Request $request)
    {
        $curriculum  = ProgramCurriculum::find($request->curriculum_id);
        if (!is_null($curriculum)) {
            $request->validate(array(
                'title' => 'required | string',
                'semester_no' => 'required | integer'
            ));
            $curriculum->title = $request->title;
            $curriculum->semester_no = $request->semester_no;

            $curriculum->courses()->delete();

            foreach ($request->subjects as $sl => $subject) {
                $course = new Course();
                $course->curriculum_id = $curriculum->id;
                $course->name = $subject['name'];
                $course->code = $subject['code'];
                $course->credit = $subject['credit'];
                $course->save();
            }

            if ($curriculum->save()) {
                toast('Semester has been updated successfully', 'success')->autoClose(2000)->timerProgressBar();
            } else {
                toast('Semester didn\'t update. Please try again.', 'error')->autoClose(5000)->timerProgressBar();
            }
        } else {
            toast('Semester not found!', 'error')->autoClose(5000)->timerProgressBar();
        }
        return redirect()->back();
    }


    /**
     * Display edit page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function removecurriculum($curriculum_id)
    {
        $curriculum_id = bindec($curriculum_id);
        $curriculum  = ProgramCurriculum::with('courses')->whereId($curriculum_id)->firstOrFail();
        $curriculum->courses()->delete();
        if ($curriculum->delete()) {
            toast('A Semester has been deleted successfully', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast('A Semester didn\'t delete. Please try again.', 'error')->autoClose(5000)->timerProgressBar();
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

        $program = Program::findOrFail($id);
        $program->status = ($program->status == true) ? false : true;
        if ($program->save()) {
            toast(ucfirst($program->name) . ' status has been updated!', 'success')->autoClose(2000)->timerProgressBar();
        } else {
            toast(ucfirst($program->name) . ' status could not updated!', 'danger')->autoClose(2000)->timerProgressBar();
        }
        return redirect()->back();
    }
}
