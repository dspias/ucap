<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
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
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    //get paymentItems
    public function items()
    {
        return $this->hasMany(PaymentItem::class, 'payment_id', 'id');
    }
}
