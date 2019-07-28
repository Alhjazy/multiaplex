<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;

class SalesShipping extends Model
{
    //
    protected $fillable = [
        'sales_order_id','company','tracker','from','to','cost','remarks','status','date'
    ];
}
