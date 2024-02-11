@extends('backend\master')
@section('content')
<div class="container-fluid">



    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                All Employee</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count_all_employee}}</div>
                        </div>
                        <div class="col-auto">
                            <a class="btn btn-danger" href="{{Route('employee.all.list')}}"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Active Employee</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$ecount->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <a class="btn btn-primary" href="{{Route('employee.list')}}"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Salary (Monthly)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> TOTAL :{{ $ecount ? number_format($ecount->sum('salary'), 0, ',') : '0,00' }} BDT
                            </div>
                        </div>
                        <div class="col-auto">
                            <a class="btn btn-success" href="{{Route('report.selary.ditails.total')}}"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
@endsection
