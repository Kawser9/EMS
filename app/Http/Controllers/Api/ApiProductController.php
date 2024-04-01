<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiProductController extends Controller
{
    public function index()
    {
        $response = Http::get('http://192.168.191.235:8000/api/get/product');
        // dd($response);
        $posts = $response->json();
        dd($posts);
        return view('posts.index', ['posts' => $posts]);
    }
}
