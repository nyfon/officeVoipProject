<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class VirtualNumbers extends Model
{
    protected $guarded=[];

    private const valueIsStatus = [
        'notAssigned'  => 1,
        'expired'    => 2,
        'deactivated'   => 3,
        'inService'      => 4,
    ];

    public static function mergeIsStatus($value)
    {
        return self::valueIsStatus[$value];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function generalDoctor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(GeneralDoctors::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reservedVirtualNumber(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ReservedVirtualNumber::class,'reserved_numbers_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function voipService(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(VoipServices::class);
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
     * show is_status user in view
     *
     * @return string|null
     */
    public function isStatusFarsi(): ?string
    {
        switch ($this->status) {
            case Self::mergeIsStatus('notAssigned'):
                return 'اختصاص داده نشده';
                break;

            case Self::mergeIsStatus('expired'):
                return 'منقضی شده';
                break;

            case Self::mergeIsStatus('deactivated'):
                return 'غیرفعال';
                break;

            case Self::mergeIsStatus('inService'):
                return 'در خدمت';
                break;

        }
    }
}
