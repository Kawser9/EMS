@extends('backend.master')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Update Department</h6>
        <div class="right">
            <a class="btn btn-secondery" href="{{Route('department.list')}}">Back</a>
        </div>
    </div>
    <div class="card-body">
        <form class="row g-3" action="{{Route('department.update',$department->id)}}" method="post">
            @csrf
            @method('put')
            <div class="col-md-6">
                <label for="" class="form-label">Department ID</label>
                <input type="number" name="departmentId" class="form-control" value="{{$department->departmentId}}" >
            </div>
            <div class="col-md-6">
                <label for="inputname" class="form-label">Departmanet Name</label>
                <input type="text" name="departmentName" class="form-control" id="" value="{{$department->name}}">
            </div>
            <div class="col-md-6" style="margin-top: 15px">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
  @endsection
