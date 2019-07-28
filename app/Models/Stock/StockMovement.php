<?php

namespace App\Models\Stock;

use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    //
    protected $fillable = [
       'product_id','reference','type','date','quantity','stock','remarks','state','status'
    ];


    /**
     * Get the user that owns the phone.
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product\Product', 'product_id', 'id');
    }
}
