<?php

namespace App\Models\Pos;

use Illuminate\Database\Eloquent\Model;

class Pos extends Model
{
    //
    protected $fillable = [
        'location_id','maintenance_mode','description','status'
    ];



    public function location(){
        return $this->belongsTo('App\Models\Project\location','location_id','id');
    }
    public function stock(){
        return $this->hasMany('App\Models\Stock\StockItems','location_id','id');
    }
}
