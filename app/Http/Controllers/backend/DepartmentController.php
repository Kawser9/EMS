<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $department = Department::latest()->get();
        return view('backend.pages.department.index',compact('department'));
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
        return redirect()->back();
    }
    public function delete($id)
    {
        $department = Department::find($id);
        $department -> delete();
        return redirect()->back();
    }
}
