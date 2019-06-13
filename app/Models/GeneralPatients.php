<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class GeneralPatients extends Model
{
    protected $guarded=[];


    /**
     * Get the post that owns the comment.
     */
    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
