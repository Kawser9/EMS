@extends('backend.master')
@section('content')
<div class="card shadow mb-4">
    {{-- <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
        <div class="right">
            <a class="btn btn-primary" href="{{Route('product.list')}}">Create</a>
        </div>
    </div> --}}
    <div class="card-body">
        <div class="table-responsive">
            <div class="card-body">
                <form class="row g-3" id="storeProduct" action="{{Route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="" class="form-label">Product code</label>
                        <input type="number" name="productCode" class="form-control" value="{{isset($product) ? $product->productCode + 1 : 50001}}" placeholder="Id serial is : {{isset($product) ? $product->productCode + 1 : 50001}}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputname" class="form-label">Product Name</label>
                        <input type="text" name="productName" class="form-control" id="">
                    </div>
                    <div class="col-md-6">
                        <label for="inputprice" class="form-label">Product Price</label>
                        <input type="number" name="productPrice" class="form-control" id="">
                    </div>
                    <div class="col-md-6">
                        <label for="inputimage" class="form-label">Product Image</label>
                        <input type="file" name="productImage[]" class="form-control" id="" multiple>
                    </div>
                    <div class="col-md-6" style="margin-top: 15px">
                        <button type="submit" id="savebtn" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

            <div id="productList">

            </div>
        </div>
    </div>
</div>
@endsection
