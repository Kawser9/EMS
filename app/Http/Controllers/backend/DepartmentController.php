<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('backend.pages.department.index');
    }
    public function create()
    {
        return view('backend.pages.department.create');
    }
    public function store(Request $request)
    {
        
    }
}
