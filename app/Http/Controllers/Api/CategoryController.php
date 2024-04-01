<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\backend\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function ddd()
    {
        $categories = Category::select('id', 'name')->get(); // Fetch only 'id' and 'name'
        return response()->json(['categories' => $categories],200);
    }
    public function index()
    {
        $categories = Category::latest()->get();
        return response()->json(['categories' => $categories],200);
    }
    public function show($id)
    {
        $categories = Category::find($id);
        return response()->json(['categories' => $categories],200);
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name'   =>'required'
        ]);
        if($validate->fails())
        {
            $message = $validate->getMessageBag();
            return response()->json(['message' =>$message],201);
        }else{

        if($request ->isMethod('post')){
            $data = $request->all();
            Category::create([
                    'name'       =>$data['name'],
                    'status'     =>'active'

                ]);
                $message = 'Successfully created';
                return response()->json(['message' =>$message],201);
            }
        }
    }
}
