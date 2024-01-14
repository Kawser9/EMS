<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('backend.pages.dashboard');
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
            // Toastr::success('Login successfully.', '{{auth()->user()->name}}', ['options']);
            return redirect()->route('dashboard');
        }
            // Toastr::warning('Login faild,try again.', 'ADMIN', ['options']);
            return redirect()->route('admin.login');
    }
    public function logout()
    {
        Auth::logout();
        return view('backend.pages.login');
    }
}
