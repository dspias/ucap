<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LanguageTest extends Model
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


    //get user
    public function students()
    {
        return $this->hasMany(Student::class, 'lang_id', 'id');
    }


    // has many relationship to program
    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }
}
