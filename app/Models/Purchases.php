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


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function voipService(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(VoipServices::class ,'voip_services_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function virtualNumber(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(VirtualNumbers::class ,'virtual_numbers_id');
    }



}
