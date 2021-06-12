<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
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



    // get country
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }


    // get cities
    public function cities()
    {
        return $this->hasMany(City::class, 'state_id', 'id');
    }
}
