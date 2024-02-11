@extends('backend.master')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Product list</h6>
        <div class="right">
            <a class="btn btn-primary" href="{{Route('product.create')}}">Create</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>{{$item->productCode}}</td>
                            <td>{{$item->productName}}</td>
                            <td>{{$item->productPrice}}</td>
                            <td style="display: flex;">
                                @foreach (explode('|', $item->productImage) as $image)
                                    <br>
                                    <a class="image-popup-vertical-fit" href="{{url('/productImage/' .$image)}}">
                                        <img src="{{url('/productImage/' .$image)}}" style="width: 20px; height:40px">
                                    </a>
                                @endforeach
                                {{-- <img src="{{url('/uploads/products/'.$item->productImage)}}"style="width: 50px;" alt=""> --}}
                            </td>
                            <td >
                                    {{-- <a class="btn btn-primary" href="{{Route('employee.edit',$item->id)}}"><i class="fa-solid fa-pen-to-square"></i></a> --}}
                                    <a class="btn btn-success" href="{{Route('product.show',$item->id)}}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></a>
                                    {{-- <a class="btn btn-secondary" href="{{Route('employee.email.from',$item->id)}}"><i class="fa-solid fa-envelope"></i></a> --}}

                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Really want to Delete?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Select "Delete" if you are really want to delete the date from the table.</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <a class="btn btn-danger"  href="{{Route('product.delete',$item->id)}}">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$products->links()}}
        </div>
    </div>
</div>
@endsection
