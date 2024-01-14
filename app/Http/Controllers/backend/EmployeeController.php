<?php
namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('backend\pages\employee\index');
    }
    public function create()
    {
        return view('backend.pages.employee.create');
    }
}
