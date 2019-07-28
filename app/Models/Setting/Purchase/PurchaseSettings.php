<?php

namespace App\Models\Setting\Purchase;

use Illuminate\Database\Eloquent\Model;

class PurchaseSettings extends Model
{
    //
    protected $fillable = [
        'prefix_order','sequence_number','terms_condition','remarks','print_order_header','print_order_footer','status'
    ];
}
