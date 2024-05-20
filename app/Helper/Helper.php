<?php

namespace App\Helper;

use App\Employee;

class Helper
{

    public function generateEmployeeId()
    {
        $lastEmployee = Employee::orderBy('id', 'desc')->first();
        $lastEmployeeId = $lastEmployee ? intval(substr($lastEmployee->employee_id, 5)) : 0;
        $newEmployeeIdNumericPart = sprintf('%03d', $lastEmployeeId + 1);
        $newEmployeeId = 'EMP' . $newEmployeeIdNumericPart;
        return $newEmployeeId;
    }
}
