<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::latest()->paginate(5);
        return view('backend.pages.product.list',compact('products'));
    }
    public function show($id)
    {
        $products = Product::find($id);
        // dd($products);
        return view('backend.pages.product.show',compact('products'));
    }
    public function create()
    {
        $product = Product::latest()->first();
        return view('backend.pages.product.create',compact('product'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        // if($request->hasFile('productImage'))
        //     {
        //         $image=$request->file('productImage');
        //         $fileName=date('Ymdhsi').'.'.$image->getClientOriginalExtension();
        //         $image->storeAs('/products',$fileName);
        //     }



            $images=array();
            if($files=$request->file('productImage')){
                foreach($files as $file){
                    $name=uniqid(2).'.'.$file->getClientOriginalExtension();
                    $file->move('productImage',$name);
                    $images[]=$name;
                }
            }



        Product::create([
            'productCode'=>$request->productCode,
            'productName'=>$request->productName,
            'productPrice'=>$request->productPrice,
            'productImage'=> implode("|",$images),
        ]);

        notify()->success('Product added succesfully.', 'Product');
        return redirect()->back();
    }
    public function delete($id)
    {
        $product = Product::find($id);
        $product -> delete();
        notify()->success('One product deleted succesfully.', 'Product');
        return redirect()->back();
    }
}
// $imagess = array ();
//         if($images=$request->file('productImage'))
//         {
//             foreach($images as $image)
//             {
//             $fileName=date('Ymdhsi').'.'.strtolower($image->getClientOriginalExtension());
//             $upload_path = 'public/products/';
//             $image_url = $fileName.$upload_path;
//             $image -> move($fileName.$upload_path);
//             $imagess[]=$image_url;
//             }
//         }

//         Product::create([
//             'productCode'=>$request->productCode,
//             'productName'=>$request->productName,
//             'productPrice'=>$request->productPrice,
//             'productImage'=> implode('|' ,$imagess),
//         ]);
