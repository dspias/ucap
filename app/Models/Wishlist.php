<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;


    //get user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    //get user
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }
}
