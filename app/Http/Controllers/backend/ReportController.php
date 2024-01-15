<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Department;
use App\Models\backend\Employee;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Empty_;

class ReportController extends Controller
{
    public function list()
    {
        return view('backend.pages.report.list');
    }
    // public function depWiseReportList()
    // {
    //     $departments = Department::all();
    //     return view('backend.pages.report.depWiseReport',compact('departments'));
    // }
    public function depWiseReportList()
    {
        return view('backend.pages.report.depWiseReport');
    }
    
    // Your controller method
    public function getDepartmentData($departmentId)
    {
        $employees = Employee::where('department_id', $departmentId)->get();
        
        return response()->json($employees);
    }


    public function ditails_total()
    {
        $employees = Employee::with('department_name')
        ->where('status' , 'active')
        ->get();
        return view('backend.pages.report.salaryReport',compact('employees'));
    }

}
