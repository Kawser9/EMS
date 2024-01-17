<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $employee=Employee::all();
        $ecount = Employee::where('status' , 'active')->count();
        $count_all_employee = $employee->count();
        return view('backend.pages.dashboard',compact(['employee','ecount','count_all_employee']));
    }

    public function getTotalSalary()
    {
        $totalSalary = Employee::sum('salary');
        return response()->json(['totalSalary' => $totalSalary]);
    }
    
    public function adminLogin()
    {
        return view('backend.pages.login');
    }
    public function adminDoLogin(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if(auth()->attempt(request()->only(['email','password'])))
        {
        notify()->success('You are successfully login to the EMS.', 'Welcome to Admin panel');
        return redirect()->route('dashboard');
        }
        notify()->warning('You are not valid for login to the EMS.', 'Try again');
        return redirect()->route('admin.login');
    }
    public function logout()
    {
        Auth::logout();
        notify()->success('You are successfully logeout for the EMS.', 'Bye Bye from Admin panel');
        return view('backend.pages.login');
    }
}
