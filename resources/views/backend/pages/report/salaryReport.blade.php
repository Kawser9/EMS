@extends('backend.master')
@section('content')
<body>
    <div class="container mt-5">
        <div class="container mt-5" id="printReport"> 
            <div style="text-align: center;">
                <h1>Employee Manahement System</h1>
                <p>Uttara, Dhaka 1230</p>
                <h2>Monthly Salary Report</h2>
                <p>{{auth()->user()->name}}</p>
                <p>Salary review of {{ now()->format('F Y') }}</p>
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
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($employees))
                            {{-- <span>Total product : {{$department_name->count()}}</span>  --}}
                            @foreach($employees as $key=>$employee)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$employee->first_name.' '.$employee->last_name}}</td>
                                <td>{{$employee->employee_id}}</td>
                                <td>{{$employee->department_name->name}}</td>
                                <td>{{number_format($employee->salary, 0, ',')}} BDT</td>
                            </tr>
                            @endforeach
                            @endif
                            <tr>
                                <td colspan="4" class="text-right border-left-primary text-bold">Total:</td>
                                {{-- <td>{{ $employees ? $employees->sum('salary') : 0 }}</td> --}}
                                <td>{{ $employees ? number_format($employees->sum('salary'), 0, ',') : '0,00' }} BDT</td>

                            </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
</body>

<button onclick="printReport()" class="btn btn-primary ml-5 ml-5">Print & PDF</button>

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