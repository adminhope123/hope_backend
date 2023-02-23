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

    public function viewemployee()
    {
        $employee = Employee::all();

        return $employee;
    }

    public function deleteemployee($employeeEditIdData)
    {

        Employee::whereId($employeeEditIdData)->delete();
        // $employee = Employee::find($employeeEditIdData);
        // $employee->delete;

        return "Record deleted";
    }

    public function updateemployee($employeeEditIdData)
    {
        // $employee = Employee::find($employeeEditIdData);
        Employee::whereId($employeeEditIdData)->update();


        return "Record Updated";

    }

    public function updatesaveemployee(Request $req, $employeeEditIdData)
    {
        $employee = Employee::find($employeeEditIdData);
        // $employee->image=$req->file('image')->store('employee');
        $employee->userName = $req->input('userName');
        $employee->role = $req->input('role');
        $employee->email = $req->input('email');
        $employee->mobileNumber = $req->input('mobileNumber');
        $employee->address = $req->input('address');
        $employee->salary = $req->input('salary');
        $employee->password = $req->input('password');

        $employee->update();

        return $employee;
    }
}
