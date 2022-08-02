<?php

use Illuminate\Support\Facades\Route;
use App\Models\Employee;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Get All employees
Route::get('/employee','App\Http\Controllers\EmployeeController@get');
// Get Specic employee detail
Route::get('/employee/{id}', 'App\Http\Controllers\EmployeeController@getId');
// Add Employee
Route::get('/addemployee', 'App\Http\Controllers\EmployeeController@create');
// Update Employee
Route::put('/updateEmployee/{id}','App\Http\Controllers\EmployeeController@update' );
// Delete Employee
Route::delete('/deleteEmployee/{id}','App\Http\Controllers\EmployeeController@delete' );
