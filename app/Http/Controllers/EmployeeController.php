<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function getEmployee() {
        return response()->json(Employee::all(),200);
    }

    public function getEmployeeById($id){
        $employee = Employee::find($id);
        if(is_null($employee)){
            return response()->json(['message'=> 'Employee Not Found'], 404);
        }
        return response()->json($employee::find($id), 200);
    }

    public function addEmployee(Request $request){
        $employee = Employee::create($request->all());
        return view('create')->response($employee, 201);
    }

    public function updateEmployee(Request $request, $id){
        /*$request->validate([
            'name' => 'required',
            'email' => 'required',
            'salary' => 'required',
        ]);*/
        $employee = Employee::find($id);
        if(is_null($employee)){
            return response()->json(['message'=> 'Employee Not Found'], 404);
        }
        $employee->update($request->all());
        return response($employee, 200);
    }

    public function deleteEmployee(Request $request, $id) {
        $employee = Employee::find($id);
        if(is_null($employee)){
            return response()->json(['message'=> 'Employee Not Found'], 404);
        }
        $employee->delete();
        return response()->json(null, 204);
    }

    public function get() {
        $get = Employee::orderBy('created_at', 'desc')/*->where('status', 1)*/->get();
        return view('employee.get', compact('get'));
    }

    public function getId($id) {

        $gets = Employee::where('id', $id)->firstOrFail();
        return view('employee.getid', compact('gets'));
    }

    public function create(Request $request){
        $employee = Employee::create($request->all());
        //dd($employee);
        return view('employee.create');
    }


}
