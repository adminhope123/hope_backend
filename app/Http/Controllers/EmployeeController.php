<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Uprofile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;
use App\Helpers\Helper;




class EmployeeController extends Controller
{

    public function adminlogin(Request $Req)
    {
        // $req->validate([
        //     'Email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
        //     'Password' => 'required | max:10 | min:8'
        // ]);


        // $login = DB::table('admin_logins')->where('email', '=', $req->email)->first();

        // if ($login) {
        //    if (Hash::check($req->password, $login->password)) {
        //        $req->session()->put('Logincheck', $login->id);
        //     return $req->password;
        //     return $login;
        //     } else {
        //         return "Password is not matched!!";
        //     }
        // } else {
        //     return "Email is not matched!!";
        // }

        $APIadmin_login = DB::table('admin_logins')->where([['email', '=', $Req->email]])->get()->first();


        if ($APIadmin_login) {

            if (Hash::check($Req->password, $APIadmin_login->password)) {

                $admin_login['status'] = 1;
                $admin_login['message'] = "Login Successfully....";
                return $admin_login;
            } else {
                $admin_login['status'] = 0;
                $admin_login['message'] = "Password Not Matched....";
                return $admin_login;
            }
        } else {
            $admin_login['status'] = 0;
            $admin_login['message'] = "Email Not Matched....";
            return $admin_login;
        }

    }

    public function userprofile(Request $req)
    {
        $data = new Uprofile;

        $data->fullname = $req->fullname;
        $data->post = $req->post;
        $data->mobile = $req->mobile;
        $data->address = $req->address;
        $data->birthDate = $req->birthDate;
        $data->gender = $req->gender;
        $data->countries = $req->countries;
        $data->state = $req->state;
        $data->city = $req->city;
        $data -> save();
        return $data;
    }

    public function userlogin(Request $Req){

        $APIuser_login = DB::table('employees')->where([['email', '=', $Req->email]])->get()->first();

        if ($APIuser_login) {

            if (Hash::check($Req->password, $APIuser_login->password)) {

                $user_login['status'] = 1;
                $user_login['message'] = "Login Successfully....";
                return $user_login;
            } else {
                $user_login['status'] = 0;
                $user_login['message'] = "Password Not Matched....";
                return $user_login;
            }
        } else {
            $user_login['status'] = 0;
            $user_login['message'] = "Email Not Matched....";
            return $user_login;
        }

    }

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

        $employee = new Employee();
        // $employee->image=$req->file('image')->store('employee');
        if($req->hasfile('image')){
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'.$extension;
            $file->move('upload/employeeimg/',$filename);
            $employee->image = 'upload/employeeimg/'.$filename;
        }
        $employee->E_Id=$unique_id;
        $employee->userName = $req->input('userName');
        $employee->role = $req->input('role');
        $employee->email = $req->input('email');
        $employee->mobileNumber = $req->input('mobileNumber');
        $employee->salary = $req->input('salary');
        $employee->password = Hash::make($req->input('password'));
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
        $employee->image=$req->file('image')->store('employee');
        $employee->userName = $req->input('userName');
        $employee->role = $req->input('role');
        $employee->email = $req->input('email');
        $employee->mobileNumber = $req->input('mobileNumber');
        $employee->salary = $req->input('salary');
        $employee->password = Hash::make($req->input('password'));

        $employee->update();

        return $employee;
    }
}
