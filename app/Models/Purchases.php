<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    protected $guarded=[];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseRows(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PurchaseRows::class);
    }
}
