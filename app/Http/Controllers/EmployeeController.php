<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function employee(Request $req)
    {
        $employee = new Employee;
        // $employee->image=$req->file('image')->store('employee');
        $employee->userName = $req->input('userName');
        $employee->role = $req->input('role');
        $employee->email = $req->input('email');
        $employee->mobileNumber = $req->input('mobileNumber');
        $employee->address = $req->input('address');
        $employee->salary = $req->input('salary');
        $employee->password = $req->input('password');
        $employee->save();

        return $employee;
    }
}
