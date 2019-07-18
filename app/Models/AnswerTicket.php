<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class AnswerTicket extends Model
{
    protected $guarded =[];

    public function ticket(){
        return $this->hasOne(UserTicket::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
