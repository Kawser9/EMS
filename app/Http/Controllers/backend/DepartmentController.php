<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Department;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::latest()->paginate(5);
        return view('backend.pages.department.index',compact('departments'));
    }
    public function create()
    {
        $department = Department::latest()->first();
        return view('backend.pages.department.create',compact('department'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'departmentId' => 'required',
            'departmentName' => 'required',
        ]);
        Department::create([
            'departmentId'=>$request->departmentId,
            'name'=>$request->departmentName
        ]);
        notify()->success('New department added succesfully.', 'Department');
        return redirect()->back();

    }
    public function edit($id)
    {
        $department = Department::find($id);
        return view('backend.pages.department.edit',compact('department'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'departmentId' => 'required',
            'departmentName' => 'required',
        ]);
        $department = Department::find($id);
        $department->update([
            'departmentId'=>$request->departmentId,
            'name'=>$request->departmentName
        ]);
        notify()->success('Department updated succesfully.', 'Department');
        return redirect()->back();
    }
    public function delete($id)
    {
        $department = Department::find($id);
        $department -> delete();
        notify()->success('Department Deleted succesfully.', 'Department');
        return redirect()->back();
    }
}
