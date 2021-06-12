<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
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
        'native_lang', 'aid', 'student_id', 'payment_status', 'payment_id', 'amount', 'discount', 'total_program',
    ];


    //get student
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }


    //get application programs
    public function programs()
    {
        return $this->hasMany(ApplicationProgram::class, 'application_id', 'id');
    }


    //get payment item
    public function paymentItem()
    {
        return $this->hasOne(PaymentItem::class, 'payment_id', 'id');
    }
}
