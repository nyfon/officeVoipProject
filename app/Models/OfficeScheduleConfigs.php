<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfficeScheduleConfigs extends Model
{
    protected $guarded =['id'];

    private const valueIsActive = [
        'active' => 1,
        'inactive' => 2,
    ];

    public static function mergeIsActive($value){
        return self::valueIsActive[$value];
    }

    public function office(){
        return $this->belongsTo(DoctorOffice::class , 'office_id');
    }

    /**
     *
     *
     * @param $value
     *
     * @return string
     */
    public function mergeStatusDay($value): string
    {
        if ($value === 1) {
            return 'active';
        }
        return 'inactive';
    }
}
