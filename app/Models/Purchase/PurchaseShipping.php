<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Model;

class PurchaseShipping extends Model
{
    //
    protected $fillable = [
        'pord_id','company_name','tracker','from','to','cost','remark','state','status'
    ];
}
