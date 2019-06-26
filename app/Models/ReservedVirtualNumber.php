<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservedVirtualNumber extends Model
{
    protected $guarded = ['id'];

    private const valueIsActive = [
        'active' => 1,
        'onactive' => 2,
    ];

    public static function mergeIsActive($value)
    {
        return self::valueIsActive[$value];
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
     * connect table ReservedVirtualNumber to parent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'parent_id');
    }

    /**
     * connect table parent to child
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function child(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(__CLASS__, 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function virtualNumber(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(VirtualNumbers::class, 'reserved_numbers_id');
    }
}
