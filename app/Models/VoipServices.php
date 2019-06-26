<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class VoipServices extends Model
{
    protected $guarded =['id'];
    private const valueIsActive = [
        'active' => 1,
        'inactive' => 2,
    ];

    public static function mergeIsActive($value){
        return self::valueIsActive[$value];
    }

    private const valueType = [
        'virtual_number' => 1,
        'voip_services' => 2,
    ];

    public static function mergeType($value){
        return self::valueType[$value];
    }

    /**
     * @return string
     */
    public  function isActive(): string
    {
        if ($this->is_active === 1){
            return 'فعال';
        }
        return 'غیر فعال';

    }

    /**
     * @return string
     */
    public  function isType(): string
    {
        if ($this->type === 1){
            return 'شماره مجازی';
        }
        return 'سرویس';

    }

    /**
     * convert date Lunar date to Shams history
     *
     * @param $date
     *
     * @return Jalalian
     */
    public function persianDate($date): Jalalian
    {
        return Jalalian::fromDateTime($date);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function virtualNumber(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(VirtualNumbers::class , 'service_id');
    }
}
