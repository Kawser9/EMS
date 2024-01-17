@extends('backend.master')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit Employee</h6>
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

        <form class="row g-3" action="{{Route('employee.update',$employee->id)}}" method="post" enctype="">
           @csrf
           @method('put')
            <div class="col-md-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control" id="inputName" value="{{$employee->first_name}}">
            </div>
            <div class="col-md-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control" id="inputName" value="{{$employee->last_name}}">
            </div>
            <div class="col-md-3">
                <label for="employee_id" class="form-label">Employee Id</label>
                <input readonly type="number" name="employee_id" value="{{$employee->employee_id}}" class="form-control" id="employee_id">
            </div>
            <div class="col-md-3">
                <label for="department_id" class="form-label">Department</label> <br>
                <select class="form-control" name="department_id" aria-label="Default select example">
                    <option class="form-control" disabled selected>Select Department</option>
                    @foreach ($departments as $dep)
                        <option  @if ($employee->department_id == $dep->id) selected @endif class="form-control" value="{{$dep->id}}">{{$dep->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail4" value="{{$employee->email}}">
            </div>
            <div class="col-md-2">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="phone" name="phone_number" class="form-control" id="phone_number" value="{{$employee->phone_number}}">
            </div>
            <div class="col-md-2">
                <label for="position" class="form-label">Position</label>
                <input type="text" name="position" class="form-control" id="position" value="{{$employee->position}}">
            </div>
            <div class="col-md-2">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" name="salary" class="form-control" id="salary" value="{{$employee->salary}}">
            </div>
            <div class="col-md-2">
                <label for="hire_date" class="form-label">Hire_date</label>
                <input type="date" name="hire_date" class="form-control" id="hire_date" value="{{$employee->hire_date}}">
            </div>
            <div class="col-md-4">
                <label for="salary" class="form-label">Gender:</label>
                <div style="margin-top: 30px" class="form-check form-check-inline">
                    <input @if ($employee->gender == 'Male') checked @endif class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input @if ($employee->gender == 'Female') checked @endif class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input @if ($employee->gender == 'Others') checked @endif class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="Others">
                    <label class="form-check-label" for="inlineRadio3">Others</label>
                </div>
            </div>
            

            <div class="col-md-2">
                <label for="birth_date" class="form-label">Birth_date</label>
                <input type="date" name="birth_date" class="form-control" id="birth_date" value="{{$employee->birth_date}}">
            </div>
            <div class="col-md-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" name="country" class="form-control" id="country" value="{{$employee->country}}">
            </div>
            <div class="col-md-3">
                <label for="city" class="form-label">City</label>
                <input type="text" name="city" class="form-control" id="city" value="{{$employee->city}}">
            </div>
            <div class="col-md-2">
                <label for="inputState" class="form-label">State</label>
                <select id="inputState" name="state" class="form-control">
                    <option >Select State</option>
                    <option @if ($employee->state == 'Dhaka') selected @endif>Dhaka</option>
                    <option @if ($employee->state == 'Chittagong') selected @endif>Chittagong</option>
                    <option @if ($employee->state == 'Rajshahi') selected @endif>Rajshahi</option>
                    <option @if ($employee->state == 'Khulna') selected @endif>Khulna</option>
                    <option @if ($employee->state == 'Barisal') selected @endif>Barisal</option>
                    <option @if ($employee->state == 'Sylhet') selected @endif>Sylhet</option>
                    <option @if ($employee->state == 'Rangpur') selected @endif>Rangpur</option>
                    <option @if ($employee->state == 'Mymensingh') selected @endif>Mymensingh</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" name="zip_code" class="form-control" id="inputZip" value="{{$employee->zip_code}}">
            </div>


            <div class="col-md-2">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-control">
                    <option @if ($employee->status == 'active') selected @endif>active</option>
                    <option @if ($employee->status == 'deactive') selected @endif>deactive</option>
                </select>
            </div>
            <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St" value="{{$employee->address}}">
            </div>
            <div class="col-12">
                <label for="notes" class="form-label">Notes</label>
                <input type="text" name="notes" class="form-control" id="notes" placeholder="" value="{{$employee->notes}}">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Update </button>
            </div>
        </form>
    </div>
</div>
  @endsection
