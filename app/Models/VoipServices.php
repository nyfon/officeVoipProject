<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
