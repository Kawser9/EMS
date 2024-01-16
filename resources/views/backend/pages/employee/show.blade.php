@extends('backend.master')
@section('content')
<div class="card shadow mb-4" id="printReport">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Show Employee</h6>
        <div class="right">
            <a class="btn btn-secondery" href="{{Route('employee.list')}}">Back</a>
        </div>
    </div>
    <div style="text-align: center;">
        <h1>Employee Manahement System</h1>
        <p>{{auth()->user()->name}}</p>
        <p>Report of a single employee</p>
    </div>
    <div class="card-body">

        @if ($errors->any())
        @foreach ($errors->all() as $error)
             <div>
            <p class="alert alert-danger"> {{$error}}</p>
            </div>
        @endforeach
        @endif 

        <form class="row g-3" action="" method="post" enctype="">
           @csrf
           @method('put')
            <div class="col-md-12">
                <label for="first_name" class="form-label">Employee Name : {{$employee->first_name.' '.$employee->last_name}} </label>
            </div>
            <div class="col-md-12">
                <label for="first_name" class="form-label">Employee ID : {{$employee->employee_id}} </label>
            </div>
            <div class="col-md-12">
                <label for="first_name" class="form-label">Employee Department : {{$employee->department_name->name}} </label>
            </div>
            <div class="col-md-12">
                <label for="first_name" class="form-label">Employee Email : {{$employee->email}} </label>
            </div>
            <div class="col-md-12">
                <label for="first_name" class="form-label">Employee Phone : {{$employee->phone_number}} </label>
            </div>
            <div class="col-md-12">
                <label for="first_name" class="form-label">Employee Position : {{$employee->position}} </label>
            </div>
            <div class="col-md-12">
                <label for="first_name" class="form-label">Employee Salary : {{$employee->salary}} </label>
            </div>
            <div class="col-md-12">
                <label for="first_name" class="form-label">Employee Hire_date : {{$employee->hire_date}} </label>
            </div>
            <div class="col-md-12">
                <label for="first_name" class="form-label">Employee Gender : {{$employee->gender}} </label>
            </div>
            <div class="col-md-12">
                <label for="first_name" class="form-label">Employee Date of birth : {{$employee->birth_date}} </label>
            </div>
            <div class="col-md-12">
                <label for="first_name" class="form-label">Employee Country : {{$employee->country}} </label>
            </div>
            <div class="col-md-12">
                <label for="first_name" class="form-label">Employee City : {{$employee->city}} </label>
            </div>
            <div class="col-md-12">
                <label for="first_name" class="form-label">Employee State : {{$employee->state}} </label>
            </div>
            <div class="col-md-12">
                <label for="first_name" class="form-label">Employee Zip code : {{$employee->zip_code}} </label>
            </div>
            <div class="col-md-12">
                <label for="first_name" class="form-label">Employee Address : {{$employee->address}} </label>
            </div>
            <div class="col-md-12">
                <label for="first_name" class="form-label">Employee Short Notes : {{$employee->notes}} </label>
            </div>

        </form>
    </div>
</div>
<button onclick="printReport()" class="btn btn-primary">Print Report</button>

<script>
    function printReport() {
      var printContents = document.getElementById("printReport").innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
    }
  </script>
  @endsection
