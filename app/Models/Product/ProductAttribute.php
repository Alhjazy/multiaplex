<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'attribute_id','status',
    ];

    protected $appends = [
        'id' => 'recid',
    ];

    public function getRecidAttribute(){
        return $this->attributes['id'];
    }
}
