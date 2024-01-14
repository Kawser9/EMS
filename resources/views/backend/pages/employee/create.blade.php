@extends('backend.master')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Create Employee</h6>
        <div class="right">
            <a class="btn btn-secondery" href="{{Route('employee.list')}}">Back</a>
        </div>
    </div>
    <div class="card-body">
        <form class="row g-3" action="{{Route('employee.store')}}" method="post" enctype="">
           @csrf
            <div class="col-md-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control" id="inputName">
            </div>
            <div class="col-md-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control" id="inputName">
            </div>
            <div class="col-md-3">
                <label for="department_id" class="form-label">Department</label> <br>
                <select class="form-control" name="department_id" aria-label="Default select example">
                    <option class="form-control" disabled selected>Select Department</option>
                    @foreach ($department as $dep)
                        <option class="form-control" value="{{$dep->id}}">{{$dep->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-2">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="number" name="phone_number" class="form-control" id="phone_number">
            </div>
            <div class="col-md-2">
                <label for="position" class="form-label">Position</label>
                <input type="text" name="position" class="form-control" id="position">
            </div>
            <div class="col-md-2">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" name="salary" class="form-control" id="salary">
            </div>
            <div class="col-md-2">
                <label for="hire_date" class="form-label">Hire_date</label>
                <input type="date" name="hire_date" class="form-control" id="hire_date">
            </div>
            <div class="col-md-4">
                <label for="salary" class="form-label">Gender : </label>
                <div style="margin-top: 30px"  class="form-check form-check-inline">
                    <input  class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="Oters" >
                    <label class="form-check-label" for="inlineRadio3">Others</label>
                  </div>
            </div>

            <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">State</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>Dhaka</option>
                    <option>Chittagong</option>
                    <option>Rajshahi</option>
                    <option>Khulna</option>
                    <option>Barisal</option>
                    <option>Sylhet</option>
                    <option>Rangpur</option>
                    <option>Mymensingh</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="inputZip">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit </button>
            </div>
        </form>
    </div>
</div>
  @endsection
