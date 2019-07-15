<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserActiveServices extends Model
{
    protected $guarded=[];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function purchase(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Purchases::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function services(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(VoipServices::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function virtualNumber(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(VirtualNumbers::class);
    }

}
