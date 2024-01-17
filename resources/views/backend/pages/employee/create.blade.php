@extends('backend.master')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Create</h6>
        <div class="right">
            <a class="btn btn-secondery" href="{{Route('employee.list')}}">Back</a>
        </div>
    </div>
    <div class="card-body">

        @if ($errors->any())
        @foreach ($errors->all() as $error)
             <div>
            <p class="alert alert-danger"> {{$error}}</p>
            </div>
        @endforeach
        @endif 

        <form class="row g-3" action="{{Route('employee.store')}}" method="post" enctype="">
           @csrf
            <div class="col-md-3">
                <label for="first_name" class="form-label">First Name</label>
                <input required type="text" name="first_name" class="form-control" id="inputName">
            </div>
            <div class="col-md-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input required type="text" name="last_name" class="form-control" id="inputName">
            </div>
            <div class="col-md-3">
                <label for="employee_id" class="form-label">Employee Id</label>
                <input required readonly type="number" name="employee_id" value="{{isset($employee) ? $employee->employee_id + 1 : 22001}}" class="form-control" id="employee_id">
            </div>
            <div class="col-md-3">
                <label for="department_id" class="form-label">Department</label> <br>
                <select required class="form-control" name="department_id" aria-label="Default select example">
                    <option class="form-control" disabled selected>Select Department</option>
                    @foreach ($department as $dep)
                        <option class="form-control" value="{{$dep->id}}">{{$dep->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label for="inputEmail4" class="form-label">Email</label>
                <input required type="email" name="email" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-2">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input required type="phone" name="phone_number" class="form-control" id="phone_number">
            </div>
            <div class="col-md-2">
                <label for="position" class="form-label">Position</label>
                <input required type="text" name="position" class="form-control" id="position">
            </div>
            <div class="col-md-2">
                <label for="salary" class="form-label">Salary</label>
                <input required type="number" name="salary" class="form-control" id="salary">
            </div>
            <div class="col-md-2">
                <label for="hire_date" class="form-label">Hire_date</label>
                <input required type="date" name="hire_date" class="form-control" id="hire_date">
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
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="Others" >
                    <label class="form-check-label" for="inlineRadio3">Others</label>
                  </div>
            </div>

            <div class="col-md-2">
                <label for="birth_date" class="form-label">Birth_date</label>
                <input required type="date" name="birth_date" class="form-control" id="birth_date">
            </div>
            <div class="col-md-3">
                <label for="country" class="form-label">Country</label>
                <input required type="text" name="country" class="form-control" id="country">
            </div>
            <div class="col-md-3">
                <label for="city" class="form-label">City</label>
                <input required type="text" name="city" class="form-control" id="city">
            </div>
            <div class="col-md-2">
                <label for="inputState" class="form-label">State</label>
                <select required id="inputState" name="state" class="form-control">
                    <option selected>Select State</option>
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
                <input required type="text" name="zip_code" class="form-control" id="inputZip">
            </div>
            <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input required type="text" name="address" class="form-control" id="address" placeholder="1234 Main St">
            </div>
            <div class="col-12">
                <label for="notes" class="form-label">Notes</label>
                <input required type="text" name="notes" class="form-control" id="notes" placeholder="">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary"> Save </button>
            </div>
        </form>
    </div>
</div>
  @endsection
