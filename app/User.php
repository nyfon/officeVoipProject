<?php

namespace App;

use App\Models\ActivationCode;
use App\Models\GeneralDoctors;
use App\Models\GeneralPatients;
use App\Models\UserGroup;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'general_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'description', 'acl', 'phone_number', 'user_group_id', 'isActive','password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'acl' => 'array',
    ];

    /**
     * Get the post that owns the comment.
     */
    public function group(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UserGroup::class);
    }

    /**
     * Get the Activation Code for user.
     */
    public function activationCode(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ActivationCode::class);
    }

    /**
     * Get the general doctor for user.
     */
    public function generalDoctor(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(GeneralDoctors::class);
    }

    /**
     * Get the general patient for user.
     */
    public function generalPatient(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(GeneralPatients::class);
    }

    /**
     * @return string
     */
    public function normalizePhoneNumber(): string
    {
        $phone_number = substr($this->phone_number , 4);
        return '0'. $phone_number;
    }

}
