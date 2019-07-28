<?php

namespace App\Models\Supplier;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $fillable = [
       'name','city','street','email','address_line1','address_line2','zip_code','phone','telephone','status',
    ];
    protected $appends = [
        'id' => 'recid',
        'name' => 'text',
    ];
    public function getRecidAttribute(){
        return $this->attributes['id'];
    }
    public function getTextAttribute(){
        return $this->attributes['name'];
    }
}
