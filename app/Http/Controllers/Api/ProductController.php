<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\backend\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // public function allProduct()
    // {

    //     $products = DB::table('products')
    //         ->join('categories', 'products.category_id', '=', 'categories.id')
    //         ->select('products.*', 'categories.name as category_name')
    //         ->get();
    //     return response()->json(['products' => $products],200);
    // }

    public function allProduct()
    {
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->get();

        $productsWithImages = [];

        foreach ($products as $product) {
            $frontImageUrl = $product->frontImage ? asset('uploads/products/' . $product->frontImage) : null;
            $sideImageUrl = $product->sideImage ? asset('uploads/products/' . $product->sideImage) : null;

            $product->frontImage = $frontImageUrl;
            $product->sideImage = $sideImageUrl;

            $productsWithImages[] = $product;
        }

        if (!empty($productsWithImages)) {
            return response()->json(['products' => $productsWithImages], 200);
        } else {
            return response()->json(['error' => 'No Product found'], 404);
        }
    }

    // public function allImage()
    // {
    //     $products = Product::all();
    //     $imagePaths = [];

    //     foreach ($products as $product) {
    //         $frontImagePath = $product->frontImage;
    //         $sideImagePath = $product->sideImage;

    //         if ($frontImagePath) {
    //             $frontImageUrl = Storage::path('products/' . $frontImagePath);
    //             $imagePaths[] = $frontImageUrl;
    //         }

    //         if ($sideImagePath) {
    //             $sideImageUrl = Storage::path('products/' . $sideImagePath);
    //             $imagePaths[] = $sideImageUrl;
    //         }
    //     }

    //     if (!empty($imagePaths)) {
    //         return response()->json(['image_paths' => $imagePaths], 200);
    //     } else {
    //         return response()->json(['error' => 'No images found'], 404);
    //     }
    // }
    // public function allImage()
    // {
    //     $products = Product::all();
    //     $imagePaths = [];

    //     foreach ($products as $product) {
    //         $frontImagePath = $product->frontImage;
    //         if ($frontImagePath) {
    //             $fullPath = Storage::path('products/' . $frontImagePath);

    //             if (file($fullPath))
    //             {
    //                 $imagePaths[] = $fullPath;
    //             }
    //         }
    //     }

    //     if (!empty($imagePaths)) {

    //         return response()->json(['image_paths' => $imagePaths], 200);
    //     } else {
    //         return response()->json(['error' => 'No images found'], 404);
    //     }
    // }

    // public function singleProduct($id)
    // {
    //     // $product = Product::find($id);
    //     $product = DB::table('products')
    //         ->join('categories', 'products.category_id', '=', 'categories.id')
    //         ->select('products.*', 'categories.name as category_name')
    //         ->where('products.id', $id)
    //         ->first();
    //     return response()->json(['product' => $product],200);
    // }
    public function singleProduct($id)
    {
        $product = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->where('products.id', $id)
            ->first();

        if ($product) {
            $frontImageUrl = $product->frontImage ? asset('uploads/products/' . $product->frontImage) : null;
            $sideImageUrl = $product->sideImage ? asset('uploads/products/' . $product->sideImage) : null;

            $product->frontImage = $frontImageUrl;
            $product->sideImage = $sideImageUrl;

            return response()->json(['product' => $product], 200);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product -> delete();
        $message = 'Successfully deleted';
        return response()->json(['message' =>$message],201);
    }


    public function storeProduct(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'category_id'   => 'required',
                'productCode'   => 'required',
                'productName'   => 'required',
                'productPrice'  => 'required|gt:100',
            ]);

            if ($validate->fails()) {
                $message = $validate->getMessageBag();
                return response()->json(['message' => $message], 201);
            }

            if ($request->isMethod('post')) {
                if ($request->hasFile('frontImage')) {
                    $image = $request->file('frontImage');
                    $frontImage = date('Ymdhsi') . '_front.' . $image->getClientOriginalExtension();
                    $image->storeAs('/products', $frontImage);
                }

                if ($request->hasFile('sideImage')) {
                    $image = $request->file('sideImage');
                    $sideImage = date('Ymdhsi') . '_side.' . $image->getClientOriginalExtension();
                    $image->storeAs('/products', $sideImage);
                }

                // try {
                //     $data = $request->all();
                //     $products = [];

                //     foreach ($data as $item) {
                //         $product = [
                //             'productCode'       => $item['productCode'],
                //             'productName'       => $item['productName'],
                //             'category_id'       => $item['category_id'],
                //             'productPrice'      => $item['productPrice'],
                //             'quantity'          => $item['quantity'],
                //             'total'             => $item['productPrice'] * $item['quantity'],
                //             'opening_value'     => $item['opening_value'] ?? null,
                //             'reOrder_quantity'  => $item['reOrder_quantity'] ?? null,
                //             'description'       => 'abc',
                //             'status'            => 'active',
                //             'productImage'      => 'no',
                //             'frontImage'        => $item['frontImage'] ?? null,
                //             'sideImage'         => $item['sideImage'] ?? null,
                //         ];

                //         // Add each product to the $products array
                //         $products[] = $product;
                //     }

                //     // Create multiple products
                //     Product::insert($products);

                //     $message = 'Successfully created';
                //     return response()->json(['message' => $message], 201);
                // } catch (\Exception $e) {
                //     // If an exception occurs, handle it here
                //     $message = 'Error creating products: ' . $e->getMessage();
                //     return response()->json(['message' => $message], 500);
                // }



                $data = $request->all();

                Product::create([
                    'productCode'       => $data['productCode'],
                    'productName'       => $data['productName'],
                    'category_id'       => $data['category_id'],
                    'productPrice'      => $data['productPrice'],
                    'quantity'          => $data['quantity'],
                    'total'             => $data['productPrice'] * $data['quantity'],
                    'opening_value'     => $data['opening_value'] ?? null,
                    'reOrder_quantity'  => $data['reOrder_quantity'] ?? null,
                    'description'       => 'abc',
                    'status'            => 'active',
                    'productImage'      => 'no',
                    'frontImage'        => $frontImage ?? null,
                    'sideImage'         => $sideImage ?? null,
                ]);

                $message = 'Successfully created';
                return response()->json(['message' => $message],status: 201);
            }
        } catch (\Exception $e) {
            // Handle any exceptions here
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }


    public function updateProduct(Request $request, $id)
    {
        $validate = Validator::make($request->all(),[
                            'productCode'   =>'required',
                            'productName'   =>'required',
                            'productPrice'  =>'required|gt:100',
                            // 'status'        =>'required|max:10',
                            'productImage'  =>'required',
                        ]);


        if($validate->fails())
        {
            $message = $validate->getMessageBag();
            return response()->json(['message' =>$message],201);
        }else{

        if($request ->isMethod('PUT')){
            $data = $request->all();
            // return $data;
            $product = Product::find($id);
            $product->update([
                    'productCode'   =>$data['productCode'],
                    'productName'   =>$data['productName'],
                    'productPrice'  =>$data['productPrice'],
                    'quantity'      =>$data['quantity'],
                    'description'   =>'description',
                    'status'        =>'active',
                    'productImage'  => $data['productImage'],
                ]);
                $message = 'Successfully Updated';
                return response()->json(['message' =>$message],201);
            }
        }
    }
}
