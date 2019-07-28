<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;

class SalesPayment extends Model
{
    //
    protected $fillable = [
        'sales_order_id','customer_id','reference','payment_method','description','date','amount','outstanding_balance','remarks','status'
    ];
}
