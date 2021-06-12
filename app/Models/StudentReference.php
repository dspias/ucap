<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentReference extends Model
{
    use HasFactory;



    //get user
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }
}
