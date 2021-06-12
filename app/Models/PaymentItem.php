<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentItem extends Model
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


    //get payment
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }


    //get application
    public function application()
    {
        return $this->hasOne(Application::class, 'application_id', 'id');
    }
}
