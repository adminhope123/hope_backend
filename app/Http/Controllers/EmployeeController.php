<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;


class EmployeeController extends Controller
{
    public function employee(Request $req)
    {


        $E_data = Employee::orderBy('id','desc')->first();
        $prefix  = 'E';
        $code_E = substr($E_data->E_Id,strlen($prefix)+1);
        $E_last_number = ($code_E/1)*1;
        $increment_last_number = $E_last_number+1;
        $last_number_length = strlen($increment_last_number);
        $E_length = 3 - $last_number_length;
        $last_number = $increment_last_number;
        $emp = "";
        for($i=0; $i<$E_length;$i++)
        {
            $emp.="0";
        }

        $unique_id = $prefix.$emp.$last_number;

        // dd($unique_id);


        // $E_Id = "E" . (rand(1000, 9999));


        // $E = DB::table('employees')->select('E_Id')->where([['E_Id', '=', $E_Id]])->get()->first();

        // if ($E) {
        //     do {
        //         $E_Id = "E" . (rand(1000, 9999));
        //     } while ($E_Id == $E);

        //     $employee->E_Id = $E_Id;
        // } else {
        //     $employee->E_Id = $E_Id;
        // }

        $employee = new Employee();
        // $employee->image=$req->file('image')->store('employee');
        $employee->E_Id=$unique_id;
        $employee->userName = $req->input('userName');
        $employee->role = $req->input('role');
        $employee->email = $req->input('email');
        $employee->mobileNumber = $req->input('mobileNumber');
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
        $employee->salary = $req->input('salary');
        $employee->password = $req->input('password');

        $employee->update();

        return $employee;
    }
}
