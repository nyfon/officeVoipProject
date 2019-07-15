<?php

namespace App\Models;


use App\User;
use Illuminate\Database\Eloquent\Model;

class GeneralDoctors extends Model
{
    protected $guarded=[];


    /**
     * Get the post that owns the comment.
     */
    public function User(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function virtualNumbers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(VirtualNumbers::class , 'general_doctors_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function doctorOffices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(DoctorOffice::class , 'doctor_id');
    }



}
