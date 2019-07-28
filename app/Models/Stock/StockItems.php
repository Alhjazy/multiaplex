<?php

namespace App\Models\Stock;

use Illuminate\Database\Eloquent\Model;

class StockItems extends Model
{
    //
    protected $fillable = [
        'location_id','product_id','quantity','state','status'
    ];



    /**
     * Get the user that owns the phone.
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product\Product', 'product_id', 'id');
    }
    /**
     * Get the user that owns the phone.
     */
    public function location()
    {
        return $this->belongsTo('App\Models\Project\Location', 'location_id', 'id');
    }

}
