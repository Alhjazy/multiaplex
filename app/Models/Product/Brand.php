<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'status',
    ];

    protected $appends = [
        'name' => 'text',
    ];
    public function getTextAttribute(){
        return $this->attributes['name'];
    }
}
