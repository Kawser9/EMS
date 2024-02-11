<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Ajax;
use Illuminate\Http\Request;
use Datatables;

class AjaxController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            //return datatables()->of(Product::select('*'))
            return datatables()->of(Ajax::select('id', 'name', 'joining_date', 'joining_salary'))
                ->editColumn('created_at', function ($request) {
                    return $request->created_at->format('d-m-Y H:i'); // format date time
                })
                ->addColumn('action', 'backend.pages.ajaxData.product-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.pages.ajaxData.list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productId = $request->id;

        $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer|gt:0'
        ]);

        $product = Ajax::updateOrCreate(
            [
                'id' => $productId
            ],
            [
                'name' => $request->name,
                'quantity' => $request->quantity
            ]
        );

        return Response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ajax  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $product  = Ajax::where($where)->first();

        return Response()->json($product);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = Ajax::where('id', $request->id)->delete();

        return Response()->json($product);
    }



    // public function list()
    // {
    //     $datas = Ajax::latest()->paginate(10);
    //     return view('backend.pages.ajaxData.list',compact('datas'));
    // }

    // public function store(Request $request)
    // {
    //     // dd($request);
    //     // $user = Ajax::create($request->all());
    //     Ajax::create($request->all());
    //     return redirect()->back();
    // }
    // public function edit($id)
    // {
    //     $data = Ajax::find($id);
    //     return view('backend.pages.ajaxData.edit',compact('data'));
    // }
}
