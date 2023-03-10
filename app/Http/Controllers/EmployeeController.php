<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Uprofile;
use App\Models\Uaddpost;
use App\Models\Utimer;
use App\Models\Uattendence;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;
use App\Helpers\Helper;

class EmployeeController extends Controller
{
    // .................... Admin Login....................

    public function adminlogin(Request $Req)
    {
        $APIadmin_login = DB::table('admin_logins')
            ->where([['email', '=', $Req->email]])
            ->get()
            ->first();

        if ($APIadmin_login) {
            if (Hash::check($Req->password, $APIadmin_login->password)) {
                $admin_login['status'] = 1;
                $admin_login['message'] = 'Login Successfully....';
                return $admin_login;
            } else {
                $admin_login['status'] = 0;
                $admin_login['message'] = 'Password Not Matched....';
                return $admin_login;
            }
        } else {
            $admin_login['status'] = 0;
            $admin_login['message'] = 'Email Not Matched....';
            return $admin_login;
        }
    }

    // ............................User attendence details............................

    public function Uattendence(Request $req)
    {
        $data = new Uattendence();
        $data->employeeId = $req->employeeId;
        $data->absent = $req->absent;
        $data->date = $req->date;
        $data->day = $req->day;
        $data->present = $req->present;
        $data->totalWorkTime = $req->totalWorkTime;
        $data->save();
        return $data;
    }

    public function viewUattendence()
    {
        $data = Uattendence::all();
        return $data;
    }

    public function Uattendenceupdate($employeeEditIdData)
    {
        Uattendence::whereId($employeeEditIdData)->update();
        return 'Record Updated';
    }

    public function Uattendenceupdatesave(Request $req, $employeeEditIdData)
    {
        $data = Uattendence::find($employeeEditIdData);
        $data->employeeId = $req->input('employeeId');
        $data->absent = $req->input('absent');
        $data->date = $req->input('date');
        $data->day = $req->input('day');
        $data->present = $req->input('present');
        $data->totalWorkTime = $req->input('totalWorkTime');
        $data->update();

        return $data;
    }

    // ...............................User timer...............................

    public function usertimer(Request $req)
    {
        $data = new Utimer();
        $data->employeeId = $req->employeeId;
        $data->timerId = $req->timerId;
        $data->state = $req->state;
        $data->parent = $req->parent;
        $data->date = $req->date;
        $data->start = $req->start;
        $data->stop = $req->stop;
        $data->color = $req->color;
        $data->hours = $req->hours;
        $data->day = $req->day;
        $data->mins = $req->mins;
        $data->secs = $req->secs;
        $data->present = $req->present;
        $data->absent = $req->absent;
        $data->totalSeconds = $req->totalSeconds;
        $data->totalTimeWork = $req->totalTimeWork;
        $data->save();
        return $data;
    }

    public function viewtimer()
    {
        $data = Utimer::all();

        return $data;
    }

    public function usertimerupdate($employeeEditIdData)
    {
        Utimer::whereId($employeeEditIdData)->update();
        return 'Record Updated';
    }

    public function usertimerupdatesave(Request $req, $employeeEditIdData)
    {
        $data = Utimer::find($employeeEditIdData);
        $data->employeeId = $req->input('employeeId');
        $data->timerId = $req->input('timerId');
        $data->state = $req->input('state');
        $data->parent = $req->input('parent');
        $data->date = $req->input('date');
        $data->start = $req->input('start');
        $data->stop = $req->input('stop');
        $data->color = $req->input('color');
        $data->hours = $req->input('hours');
        $data->day = $req->input('day');
        $data->mins = $req->input('mins');
        $data->secs = $req->input('secs');
        $data->present = $req->input('present');
        $data->absent = $req->input('absent');
        $data->totalSeconds = $req->input('totalSeconds');
        $data->totalTimeWork = $req->input('totalTimeWork');
        $data->update();

        return $data;
    }

    // ................................User add post................................

    public function Uaddpost(Request $req)
    {
        $data = new Uaddpost();
        if ($req->hasfile('image')) {
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('postimg/', $filename);
            $data->image = 'postimg/' . $filename;
        }
        $data->role = $req->role;
        $data->save();
        return $data;
    }

    public function viewUaddpost()
    {
        $data = Uaddpost::all();
        return $data;
    }

    public function Uaddpostdelete($employeeEditIdData)
    {
        Uaddpost::whereId($employeeEditIdData)->delete();
        return 'Record deleted';
    }

    // .................................User Profile................................

    public function userprofile(Request $req)
    {
        $data = new Uprofile();
        $data->E_Id = $req->E_Id;
        $data->fullname = $req->fullname;
        $data->post = $req->post;
        $data->mobile = $req->mobile;
        $data->address = $req->address;
        $data->birthDate = $req->birthDate;
        $data->gender = $req->gender;
        $data->countries = $req->countries;
        $data->state = $req->state;
        $data->city = $req->city;
        $data->save();
        return $data;
    }

    // ................................User Login................................

    public function userlogin(Request $Req)
    {
        $APIuser_login = DB::table('employees')
            ->where([['email', '=', $Req->email]])
            ->get()
            ->first();

        if ($APIuser_login) {
            if (Hash::check($Req->password, $APIuser_login->password)) {
                $user_login['status'] = 1;
                $user_login['message'] = 'Login Successfully....';
                return $user_login;
            } else {
                $user_login['status'] = 0;
                $user_login['message'] = 'Password Not Matched....';
                return $user_login;
            }
        } else {
            $user_login['status'] = 0;
            $user_login['message'] = 'Email Not Matched....';
            return $user_login;
        }
    }

    // ....................Employee Details....................

    public function employee(Request $req)
    {
        $E_data = Employee::orderBy('id', 'desc')->first();
        $prefix = 'E';
        $code_E = substr($E_data->E_Id, strlen($prefix) + 1);
        $E_last_number = ($code_E / 1) * 1;
        $increment_last_number = $E_last_number + 1;
        $last_number_length = strlen($increment_last_number);
        $E_length = 3 - $last_number_length;
        $last_number = $increment_last_number;
        $emp = '';
        for ($i = 0; $i < $E_length; $i++) {
            $emp .= '0';
        }

        $unique_id = $prefix . $emp . $last_number;

        $employee = new Employee();
        if ($req->hasfile('image')) {
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/employeeimg/', $filename);
            $employee->image = 'upload/employeeimg/' . $filename;
        }
        $employee->E_Id = $unique_id;
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
        return 'Record deleted';
    }

    public function updateemployee($employeeEditIdData)
    {
        Employee::whereId($employeeEditIdData)->update();
        return 'Record Updated';
    }

    public function updatesaveemployee(Request $req, $employeeEditIdData)
    {
        $employee = Employee::find($employeeEditIdData);
        $employee->userName = $req->input('userName');
        $employee->email = $req->input('email');
        $employee->mobileNumber = $req->input('mobileNumber');
        $employee->salary = $req->input('salary');
        $employee->password = Hash::make($req->input('password'));

        $employee->update();

        return $employee;
    }
}
