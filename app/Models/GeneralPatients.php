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
    public function User(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function fullname(){
        if(($this->name !== null)&&($this->family !== null)){

            return $this->name.' '.$this->family;
        }
        return 'وارد نشده';
    }

}
