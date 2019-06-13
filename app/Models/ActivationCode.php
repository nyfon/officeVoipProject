<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ActivationCode extends Model
{

    protected $fillable = ['user_id' , 'code' , 'used' , 'expire' ,'type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }




}
