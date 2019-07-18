<?php

namespace App;

use App\Models\ActivationCode;
use App\Models\GeneralDoctors;
use App\Models\GeneralPatients;
use App\Models\UserGroup;
use App\Models\UserTicket;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use phpDocumentor\Reflection\Types\Self_;

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
        'username', 'description', 'acl', 'phone_number', 'user_group_id', 'is_status', 'password'
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

    private const valueIsStatus = [
        'onactive' => 1,
        'active' => 2,
        'deleted' => 3,
        'lock' => 4,
    ];

    public static function mergeIsStatus($value)
    {
        return self::valueIsStatus[$value];
    }

    public function checkIsStatus()
    {
        switch ($this->is_status) {
            case Self::mergeIsStatus('onactive'):
                return 'onactive';
                break;

            case Self::mergeIsStatus('active'):
                return 'active';
                break;

            case Self::mergeIsStatus('deleted'):
                return 'deleted';
                break;

            case Self::mergeIsStatus('lock'):
                return 'lock';
                break;

        }

    }

    public function setPhoneNumberAttribute($value)
    {
        $phone_number = substr($value, 1);
        $phone_number = '0098' . $phone_number;
        return  $this->attributes['phone_number'] = $phone_number;
    }

    public function getPhoneNumberAttribute($value)
    {
        $phone_number = substr($value, 4);
        return '0' . $phone_number;
    }


    /**
     * Get the post that owns the comment.
     */
    public function userGroup(): \Illuminate\Database\Eloquent\Relations\BelongsTo
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
     * Get the Activation Code for user.
     */

    public function userTicket(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(UserTicket::class);
    }

    /**
     * Get the general doctor for user.
     */
    public function generalDoctor(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(GeneralDoctors::class);
    }

    public function doctorFullName()
    {


        if($this->getUserGroup()->name && $this->getUserGroup()->family){

            return    $this->getUserGroup()->name.' '.$this->getUserGroup()->family;

        }
        return 'وارد نشده';
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
        $phone_number = substr($this->phone_number, 4);
        return '0' . $phone_number;
    }

    /**
     * show is_status user in view
     *
     * @return string|null
     */
    public function isStatusFarsi(): ?string
    {
        switch ($this->is_status) {
            case Self::mergeIsStatus('onactive'):
                return 'غیر فعال';
                break;

            case Self::mergeIsStatus('active'):
                return 'فعال';
                break;

            case Self::mergeIsStatus('deleted'):
                return 'حذف شده';
                break;

            case Self::mergeIsStatus('lock'):
                return 'قفل';
                break;

        }
    }

    public function skillUserInfrmtion(){
        $skillNumber = 0;

        if($this->userGroup->name === 'doctor'){
            $skills = [
                'name',
                'family',
                'mail',
                'medical_system_number',
            ];
        }elseif ($this->userGroup->name === 'patient'){
            $skills = [
                'name',
                'family',
                'address1',
                'address2',
            ];
        }

        $count = 100/count($skills);

        foreach ($skills as $skill){
            $userData = $this->getUserGroup();
            if($userData[$skill] !== null){
                $skillNumber += $count;
            }
        }

        return $skillNumber;
    }

    public function getUserGroup(){
        $data=[];
        switch ($this->userGroup->name){
            case 'doctor':
                $data = $this->generalDoctor;
                break;

            case 'patient':
                $data = $this->generalPatient;
                break;

            case 'admin':
                $data = $this->generalDoctor;
                break;

        }
        return $data;

    }




}
