<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'ratio','years','from'
    ];
}
