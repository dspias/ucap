<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramFeature extends Model
{
    use HasFactory;

    //get program
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }
}
