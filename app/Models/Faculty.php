<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model
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
    protected $fillable = [];

    //get university
    public function university()
    {
        return $this->belongsTo(User::class, 'university_id', 'id');
    }

    //get programs
    public function programs()
    {
        return $this->hasMany(Program::class, 'faculty_id', 'id');
    }
}
