@extends('backend.master')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Create</h6>
        <div class="right">
            <a class="btn btn-secondery" href="{{Route('ajax.list')}}">Back</a>
        </div>
    </div>
    <div class="card-body">
        <form class="row g-3" action="" method="post">
            @csrf
            <div class="col-md-6">
                <label for="" class="form-label">Name</label>
                <input value="{{$data->name}}" type="text" name="name" class="form-control" >
            </div>
            <div class="col-md-6">
                <label for="joining_date" class="form-label">Joining date</label>
                <input value="{{$data->joining_date}}" type="date" name="joining_date" class="form-control" id="">
            </div>
            <div class="col-md-6">
                <label for="joining_salary" class="form-label">Joining salary</label>
                <input value="{{$data->joining_salary}}" type="number" name="joining_salary" class="form-control" >
            </div>
            <div class="col-md-6">
            </div>
            <div class="col-md-6" style="margin-top: 15px">
                <a class="btn btn-secondary" href="{{Route('ajax.list')}}" data-dismiss="modal">Cancel</a>
                <a type="submit" class="btn btn-primary"  href="">Save</a>
            </div>
        </form>
    </div>
</div>
@endsection
