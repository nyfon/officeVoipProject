<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    protected $guarded = [];
    protected $table = 'user_group';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function virtualNumber(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class , 'user_group_id');
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class ,'user_group_id');
    }

}
