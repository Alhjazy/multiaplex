<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;

class EmployeeExperiences extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id', 'experience_id','status'
    ];
}
