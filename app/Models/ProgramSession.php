<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramSession extends Model
{
    use HasFactory;

    //get program
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }


    //get applicationitems
    public function applicationitems()
    {
        return $this->hasMany(ApplicationProgram::class, 'session_id', 'id');
    }
}
