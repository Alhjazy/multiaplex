<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;

class EmployeeSkills extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id', 'skills_id','status'
    ];
}
