<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $fillable = [
        'name','telephone','email','city','street','address_line1','address_line2','zip_code','type','status'
    ];

    protected $appends = [
        'id' => 'recid',
        'name' => 'text',
    ];

    public function employee(){
        return $this->hasOne('app\Models\Employee\Employee','location_id','id');
    }

    public function getRecidAttribute(){
        return $this->attributes['id'];
    }
    public function getTextAttribute(){
        return $this->attributes['name'];
    }
}
