<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'brand_id','name', 'description','model','sku','upc','ean','jan','isbn',
        'mpn','barcode','system_barcode','country_made','production','stored','expenses','raw_material',
        'dimensions','length_class','weight','weight_class',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'brand_id', 'category_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function scopeFind_By($query, $search)
    {

        return $query
            ->where( 'model', '=', "{$search}")
            ->orWhere('sku','=', "{$search}")
            ->orWhere('upc','=', "{$search}")
            ->orWhere('ean','=', "{$search}")
            ->orWhere('jan','=', "{$search}")
            ->orWhere('isbn','=', "{$search}")
            ->orWhere('mpn','=', "{$search}")
            ->orWhere('barcode','=', "{$search}")
            ->orWhere('system_barcode','=', "{$search}");
    }

    public function scopeProduction_Find_By($query, $search,$type)
    {

        return $query
            ->where( 'production', '=', "{$type}")
            ->where( 'model', '=', "{$search}")
            ->orWhere('sku','=', "{$search}")
            ->orWhere('upc','=', "{$search}")
            ->orWhere('ean','=', "{$search}")
            ->orWhere('jan','=', "{$search}")
            ->orWhere('isbn','=', "{$search}")
            ->orWhere('mpn','=', "{$search}")
            ->orWhere('barcode','=', "{$search}")
            ->orWhere('system_barcode','=', "{$search}");
    }

    /**
     * Get the user that owns the phone.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Product\Category', 'category_id', 'id');
    }

    /**
     * Get the user that owns the phone.
     */
    public function brand()
    {
        return $this->belongsTo('App\Models\Product\Brand', 'brand_id', 'id');
    }
    /**
     * Get the user that owns the phone.
     */
    public function attribute()
    {
        return $this->hasMany('App\Models\Product\ProductAttribute', 'product_id', 'id');
    }

    /**
     * Get the user that owns the phone.
     */
    public function image()
    {
        return $this->hasMany('App\Models\Product\ProductImage', 'product_id', 'id');
    }

    /**
     * Get the user that owns the phone.
     */
    public function sales_price()
    {
        return $this->hasMany('App\Models\Product\ProductSalesPrice', 'product_id', 'id');
    }

    public function scopeProduction($query)
    {
        return $query->where('production', 'yes');
    }
    public function stock()
    {
        return $this->hasMany('App\Models\Stock\StockItems', 'product_id', 'id');
    }
}
