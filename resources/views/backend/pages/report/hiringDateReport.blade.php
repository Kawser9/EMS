@extends('backend.master')
@section('content')
    
<body>
    <div class="container mt-5">
      <h1>Select Date</h1>
        <form action="{{Route('general.report.data')}}" method="get" >

            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>
                <p class="alert alert-danger"> {{$error}}</p>
                </div>
            @endforeach
            @endif  
              
                <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="start_date">Start Date:</label>
                    <input value="{{request()->start_date}}" type="date" class="form-control" id="start_date" name="start_date" >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="end_date">End Date:</label>
                    <input value="{{request()->end_date}}" type="date" class="form-control" id="end_date" name="end_date" >
                </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <select name="department_id" class="form-control" aria-label="Default select example" required>
                        <option >Select Department</option>
                            @if(isset($departments))
                                @foreach ($departments as $department)
                                    <option @if (request()->department_id == $department->id) selected @endif value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
        <button type="submit" class="btn btn-primary">Generate Report</button>
        </form>

        <div class="container mt-5">
            <div class="container mt-5" id="printReport"> 
                <div style="text-align: center;">
                    <h1>Employee Manahement System</h1>
                    <p>{{auth()->user()->name}}</p>
                    <p>Report of {{request()->start_date}} to {{request()->end_date}}</p>
                </div>
                
                <br>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Employee ID</th>
                                    <th>Department</th>
                                    <th>Position</th>
                                    <th>Salary</th>
                                    <th>Start date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($employees))
                                @foreach($employees as $key=>$employee)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$employee->first_name.' '.$employee->last_name}}</td>
                                    <td>{{$employee->employee_id}}</td>
                                    <td>{{$employee->department_name->name}}</td>
                                    <td>{{$employee->position}}</td>
                                    <td>{{number_format($employee->salary, 0, ',')}} BDT</td>
                                    <td>{{date('d-m-Y', strtotime($employee->hire_date))}}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
        </div>
</body>

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