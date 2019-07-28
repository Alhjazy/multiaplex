<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductSalesPrice extends Model
{
    //
    protected $fillable = [
      'product_id','price','status'
    ];
}
