@extends('backend.master')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Create</h6>
        <div class="right">
            <a class="btn btn-secondery" href="{{Route('department.list')}}">Back</a>
        </div>
    </div>
    <div class="card-body">
        <form class="row g-3" action="{{Route('department.store')}}" method="post">
            @csrf
            <div class="col-md-6">
                <label for="" class="form-label">Department ID</label>
                <input readonly type="number" name="departmentId" class="form-control" value="{{isset($department) ? $department->departmentId + 1 : 10001}}" >
            </div>
            <div class="col-md-6">
                <label for="inputname" class="form-label">Departmanet Name</label>
                <input type="text" name="departmentName" class="form-control" id="">
            </div>
            <div class="col-md-6" style="margin-top: 15px">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
  @endsection
