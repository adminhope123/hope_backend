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
        $employee->role = $req->input('role');
        $employee->email = $req->input('email');
        $employee->mobileno = $req->input('mobileno');
        $employee->password = $req->input('password');
        $employee->save();

        return $employee;
    }
}
