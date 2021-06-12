<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramCurriculum extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'program_id', 'title', 'semester_no'
    ];


    // get program
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }


    // get courses
    public function courses()
    {
        return $this->hasMany(Course::class, 'curriculum_id', 'id');
    }
}
