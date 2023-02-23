<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function addemployee(Request $req)
    {
        $employee = new Employee;
        $employee->image=$req->file('image')->store('employee');
        $employee->username = $req->input('username');
        $employee->email = $req->input('email');
        $employee->mobileNumber = $req->input('mobileNumber');
        $employee->role = $req->input('role');
        $employee->password = $req->input('password');
        $employee->address = $req->input('address');
        $employee->salary = $req->input('salary');
        $employee->save();

        return $employee;
    }
}
