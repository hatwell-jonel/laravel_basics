<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employees";
    protected $fillable = [
        'employee_id', 
        'firstname', 
        'lastname', 
        'gender', 
        'birthdate', 
        'monthly_salary', 
    ];
}
