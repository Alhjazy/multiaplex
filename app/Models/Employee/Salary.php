<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    //
    protected $fillable = [
        'employee_id','basic','fixed_income','housing','transport','fuel','mobile','other_benefit','total','status'
    ];
}
