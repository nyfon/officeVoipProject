<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorOffice extends Model
{
    protected $guarded= [];

    private const valueOfficeType = [
        'personalOffice' => 1,
        'clinic' => 2,
    ];

    public static function mergeOfficeType($value){
        return self::valueOfficeType[$value];
    }

    private const valueTelType = [
        'mobile' => 1,
        'telephone' => 2,
    ];

    public static function mergeTelType($value){
        return self::valueTelType[$value];
    }

    /**
     * Get the post that owns the doctorOffice.
     */
    public function generalDoctors(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(GeneralDoctors::class);
    }

    /**
     * @return string
     */
    public function normalizePhoneNumber(): string
    {
        $phone_number = substr($this->mobile_tel , 4);
        return '0'. $phone_number;
    }
}
