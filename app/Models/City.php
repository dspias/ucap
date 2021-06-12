<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
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

    // get state
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    // get state
    public function universities()
    {
        return $this->hasMany(University::class, 'city_id', 'id');
    }
}
