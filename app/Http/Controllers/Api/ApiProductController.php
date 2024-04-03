<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\backend\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiProductController extends Controller
{
    public function index()
    {
       $product = Product:: all();
       return view('');
    }
}
