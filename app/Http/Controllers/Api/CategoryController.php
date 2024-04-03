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


    public function orderDetails()
    {
        $orderData = [
            "mk_activity_key" => "4ER77U",
            "order_details" => [
                "order_id" => "SO1234567",
                "products" => [
                    [
                        "product_id" => "PID_00404",
                        "product_name" => "Bag",
                        "quantity" => 3,
                        "category" => "flat",
                        "regular_price" => 1000,
                        "offer_price" => 800,
                        "offer_status" => true,
                        "product_commission" => 40
                    ]
                ],
                "total_amount" => 6900,
                "coupon_code" => "BLACKFRIDAY",
                "discount_amount" => 900,
                "subtotal_amount" => 6000,
                "delivery_status" => "pending"
            ]
        ];

        // return response()->json(['orderRequest' => $orderData],200);
        return response()->json($orderData, 200);
    }
}
