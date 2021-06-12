<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pid', 'name', 'short_name', 'faculty_id', 'level'
    ];

    //get faculty
    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id', 'id');
    }

    //get scholarships
    public function scholarships()
    {
        return $this->hasMany(Scholarship::class, 'scholarship_id', 'id');
    }


    //get applications program
    public function applied()
    {
        return $this->hasMany(ApplicationProgram::class, 'program_id', 'id');
    }


    //get features
    public function features()
    {
        return $this->hasMany(ProgramFeature::class, 'program_id', 'id');
    }


    //get requirements
    public function requirements()
    {
        return $this->hasMany(ProgramRequirement::class, 'program_id', 'id');
    }


    //get curriculums
    public function curriculums()
    {
        return $this->hasMany(ProgramCurriculum::class, 'program_id', 'id');
    }

    //get sessions
    public function sessions()
    {
        return $this->hasMany(ProgramSession::class, 'program_id', 'id');
    }



    // has many relationship to LanguageTest
    public function languageTests()
    {
        return $this->belongsToMany(LanguageTest::class);
    }




    //get payments
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'program_id', 'id');
    }
}
