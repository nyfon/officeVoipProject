<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseRows extends Model
{
    protected $guarded =['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function purchase(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Purchases::class ,'purchases_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function voipService(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(VoipServices::class ,'voip_services_id');
    }

}
