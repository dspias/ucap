<?php

namespace App\Http\Controllers\Student\Profile;

use App\Http\Controllers\Controller;
use App\Models\ApplicationProgram;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ProfileController extends Controller
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
        $user = User::with(['student', 'educations'])->whereId(auth()->user()->id)->first();
        $user_id = $user->id;
        $applieds = ApplicationProgram::whereHas('application', function (Builder $q) use ($user_id) {
            $q->where('student_id', $user_id);
        })->count();
        return view('student.profile.index', compact(['user', 'applieds']));
    }
}
