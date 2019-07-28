<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;

class SalesDocument extends Model
{
    //
    protected $fillable = [
        'sales_order_id','name','file','remarks','status'
    ];
}
