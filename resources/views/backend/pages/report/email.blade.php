@extends('backend.master')
@section('content')
{{-- <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Show Employee</h6>
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
</div> --}}
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
    }

    .card {
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        overflow: hidden;
    }

    .card-body {
        padding: 20px;
    }

    .form-label {
        font-weight: bold;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    textarea.form-control {
        resize: vertical;
    }
</style>
</head>

<body>
<div class="card shadow mb-4">
    <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Employee information </h4>
        <form class="needs-validation" method="post" action="{{Route('employee.email.data')}}" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="row g-3">
                <div class="col-md-12">
                    <label for="first_name" class="form-label">Employee Name: {{$employee->first_name.' '.$employee->last_name}}</label>
                    <input name="name" value="{{$employee->first_name.' '.$employee->last_name}}" hidden>
                </div>
                <div class="col-md-12">
                    <label for="first_name" class="form-label">Employee ID: {{$employee->employee_id}}</label>
                    <input name="id" value="{{$employee->employee_id}}" hidden>
                </div>
                <div class="col-md-12">
                    <label for="first_name" class="form-label">Employee Department: {{$employee->department_name->name}}</label>
                    <input name="department" value="{{$employee->department_name->name}}" hidden>
                </div>
                <div class="col-md-12">
                    <label for="first_name" class="form-label">Sending to: {{$employee->email}}</label>
                    <input name="email" value="{{$employee->email}}" hidden>
                </div>
                <div class="col-sm-8">
                    <label for="subject" class="form-label">Subject:</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Email From Employee Management System" value="Email From Employee Management System" required>
                </div>
                <div class="col-sm-12">
                    <label for="message" class="form-label">Message:</label>
                    <textarea class="form-control" name="message" id="message" placeholder="Write your Message here.." required></textarea>
                </div>
                <div class="col-sm-4">
                    <label for="image" class="form-label">Image:</label>
                    <input type="file" class="form-control" name="image[]" id="image" multiple required>
                </div><br><br><br>
                <div class="col-md-12">
                    <button class="btn btn-primary" style="margin-top: 10px" type="submit">Send Email</button>
                </div>
            </div>
        </form>
    </div>
</div>
  @endsection
