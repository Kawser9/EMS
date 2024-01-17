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
        $employees = Employee::with('department_name')->where('status' , 'active')->latest()->paginate(5);
        return view('backend.pages.employee.index',compact('employees'));
    }

    public function employee_all_list()
    {
        $employees = Employee::with('department_name')->latest()->paginate(5);
        return view('backend.pages.employee.employee_all_list',compact('employees'));
    }
    public function create()
    {
        $employee = Employee::latest()->first();
        $department = Department::all();
        return view('backend.pages.employee.create',compact('department','employee'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'department_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            // 'birth_date' => 'required|date',
            'address' => 'required',
            // 'city' => 'required|string',
            // 'state' => 'required|string',
            // 'zip_code' => 'required',
            // 'country' => 'required|string',
            'gender' => 'required',
            'position' => 'required|string',
            'salary' => 'numeric',
            // 'hire_date' => 'required|date',
            // 'notes' => 'required',

        ]);
        Employee::create([
            'department_id' => $request->department_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'employee_id' => $request->employee_id,
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
        notify()->success('One new employee added succesfully.', 'Employee');
        return redirect()->back();

    }
    public function edit(Request $request,$id)
    {
        $departments = Department::all();
        $employee = Employee::find($id);
        return view('backend.pages.employee.edit',compact(['departments','employee']));
    }
    public function update(Request $request ,$id)
    {
        $request->validate([
            'department_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            // 'birth_date' => 'required|date',
            'address' => 'required',
            // 'city' => 'required|string',
            // 'state' => 'required|string',
            // 'zip_code' => 'required',
            // 'country' => 'required|string',
            'gender' => 'required',
            'position' => 'required|string',
            'salary' => 'numeric',
            // 'hire_date' => 'required|date',
            // 'notes' => 'required',
            
        ]);
        $employee = Employee::find($id);
        $employee->update([
            'department_id' => $request->department_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'employee_id' => $request->employee_id,
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
            'status' => $request->status
        ]);
        notify()->success('Employee information updated succesfully.', 'Employee');
        return redirect()->back();
    }
    public function show($id)
    {
        $employee = Employee::with('department_name')->find($id);
        return view('backend.pages.employee.show',compact('employee'));
    }
    public function delete($id)
    {
        $employee = Employee::find($id);
        $employee -> delete();
        notify()->success('One employee deleted succesfully.', 'Employee');
        return redirect()->back();
    }

    
    public function employee_search()
    {
        return view('backend.pages.employee.employee_search');
    }

    public function ajax_employee_details($search_query)
    {
        $employees = Employee::with('department_name')
        ->where('first_name','LIKE','%'.$search_query.'%')
        ->orwhere('last_name','LIKE','%'.$search_query.'%')
        ->orwhere('employee_id','LIKE','%'.$search_query.'%')
        ->latest()->get();
        return view('backend.pages.employee.search_data', compact('employees'));
    }
    
}
