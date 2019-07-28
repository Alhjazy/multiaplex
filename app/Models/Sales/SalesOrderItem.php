<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;

class SalesOrderItem extends Model
{
    //
    protected $fillable = [
        'sales_order_id','product_id','quantity','price','tax_value','discount','total','status','stock'
    ];



    public function product()
    {
        return $this->belongsTo('App\Models\Product\Product', 'product_id', 'id');
    }
}
