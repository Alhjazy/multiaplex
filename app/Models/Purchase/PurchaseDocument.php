<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Model;

class PurchaseDocument extends Model
{
    //
    protected $fillable = [
      'pord_id','name','file','remarks','state','status'
    ];
}
