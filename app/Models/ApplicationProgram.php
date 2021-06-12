<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationProgram extends Model
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
        'application_id', 'program_id', 'session_id', 'university_id', 'original_fee', 'discount_fee'
    ];

    //get application
    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id', 'id');
    }

    //get program_id
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }


    //get session_id
    public function session()
    {
        return $this->belongsTo(ProgramSession::class, 'session_id', 'id');
    }

    //get representative_id
    public function representative()
    {
        return $this->belongsTo(User::class, 'representative_id', 'id');
    }

    //get university_id
    public function university()
    {
        return $this->belongsTo(User::class, 'university_id', 'id');
    }
}
