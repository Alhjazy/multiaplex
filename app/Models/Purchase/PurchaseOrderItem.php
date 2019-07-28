<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model
{
    //
    protected $fillable = [
        'order_id','product_id','price','quantity','discount_value','tax_value','total','state','status',
    ];
}
