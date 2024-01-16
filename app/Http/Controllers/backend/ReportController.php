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

    public function general_report()
    {
        $departments = Department::all();
        return view('backend.pages.report.hiringDateReport',compact('departments'));
    }
    public function general_report_data(Request $request)
    {
        // dd($request->all());

        // $from=$request->start_date;
        // $to=$request->end_date;
        // $department_id=$request->department_id;
        $request->validate([
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'department_id' => 'nullable|exists:departments,id',
        ]);
    
        // Retrieve the search parameters
        $from = $request->start_date;
        $to = $request->end_date;
        $departmentId = $request->department_id;
    
        // Build the base query
        $query = Employee::query();
    
        if ($from && $to) {
            $query->whereBetween('hire_date', [$from, $to]);
        }
        if ($departmentId) {
            $query->where('department_id', $departmentId);
        }
        
    
        // Execute the query
        $employees = $query->get();
        $departments = Department::all();
        return view('backend.pages.report.hiringDateReport',compact('employees','departments'));
    }


}
