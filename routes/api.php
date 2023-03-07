<?php

use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/adminlogin', [EmployeeController::class, 'adminlogin']);
Route::post('/userlogin', [EmployeeController::class, 'userlogin']);

Route::get('/userprofile', [EmployeeController::class, 'userprofile']);

Route::post('/Uattendence', [EmployeeController::class, 'Uattendence']);
Route::get('/viewUattendence', [EmployeeController::class, 'viewUattendence']);
Route::get('/Uattendenceupdate/{employeeEditIdData}', [EmployeeController::class, 'Uattendenceupdate']);
Route::put('/Uattendenceupdatesave/{employeeEditIdData}', [EmployeeController::class, 'Uattendenceupdatesave']);

Route::post('/usertimer', [EmployeeController::class, 'usertimer']);
Route::get('/viewtimer', [EmployeeController::class, 'viewtimer']);
Route::get('/usertimerupdate/{employeeEditIdData}', [EmployeeController::class, 'usertimerupdate']);
Route::put('/usertimerupdatesave/{employeeEditIdData}', [EmployeeController::class, 'usertimerupdatesave']);

Route::post('/employee', [EmployeeController::class, 'employee']);
Route::get('/viewemployee', [EmployeeController::class, 'viewemployee']);
Route::delete('/deleteemployee/{employeeEditIdData}', [EmployeeController::class, 'deleteemployee']);
Route::get('/updateemployee/{employeeEditIdData}', [EmployeeController::class, 'updateemployee']);
Route::put('/updatesaveemployee/{employeeEditIdData}', [EmployeeController::class, 'updatesaveemployee']);

Route::post('/Uaddpost', [EmployeeController::class, 'Uaddpost']);
Route::get('/viewUaddpost', [EmployeeController::class, 'viewUaddpost']);
Route::delete('/Uaddpostdelete/{employeeEditIdData}', [EmployeeController::class, 'Uaddpostdelete']);
