<?php
namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Department;
use App\Models\backend\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::all();
        return view('backend.pages.employee.index',compact('employee'));
    }
    public function create()
    {
        $department = Department::all();
        return view('backend.pages.employee.create',compact('department'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            // 'department_id' => 'required',
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            // 'email' => 'required|email|unique',
            // 'phone_number' => 'required|numeric|unique:employees,phone_number',
            // 'birth_date' => 'required|date',
            // 'address' => 'required|string|max:255',
            // 'city' => 'required|string',
            // 'state' => 'required|string',
            // 'zip_code' => 'required',
            // 'country' => 'required|string',
            // 'gender' => 'required|string|in:Male,Female,Other',
            // 'position' => 'required|string',
            // 'salary' => 'numeric',
            // 'hire_date' => 'required|date',
            // 'notes' => 'required',

        ]);
        Employee::create([
            'department_id' => $request->department_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'birth_date' => $request->birth_date,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'country' => $request->country,
            'gender' => $request->gender,
            'position' => $request->position,
            'salary' => $request->salary,
            'hire_date' => $request->hire_date,
            'notes' => $request->notes,
        ]);
        return redirect()->back();

    }
}
