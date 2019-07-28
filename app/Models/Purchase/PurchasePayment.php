<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Model;

class PurchasePayment extends Model
{
    //
    protected $fillable = [
        'pord_id','supplier_id','reference','payment_account','description','date','amount','outstanding_balance',
        'remarks','state','status'
    ];
}
