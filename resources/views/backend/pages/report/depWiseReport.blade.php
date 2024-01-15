@extends('backend.master')
@section('content')
    


<div class="right">
    <div class="col-md">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="departmentDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Select Department
            </button>
            <div class="dropdown-menu" aria-labelledby="departmentDropdown">
                @foreach ($departments as $department)
                    <a class="dropdown-item" href="">{{ $department->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
    <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Position</th>
        <th>Age</th>
        <th>Salary</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Start date</th>
        <th>Dep. Name</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    @foreach ($employees as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->first_name .' '.$item->last_name }}</td>
            <td>{{$item->position}}</td>
            <td><?php
                $birthday = $item->birth_date;
                if (!empty($birthday)) {
                    $birthdayDate = \Carbon\Carbon::createFromFormat('Y-m-d', $birthday);
                    $age = $birthdayDate->age;
                } else {
                    $age = ''; 
                }
                ?>
                {{$age}}
            </td>
            <td>{{$item->salary }} BTD</td>
            <td>{{$item->phone_number}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->hire_date}}</td>
            <td>{{$item->department_name->name}}</td>
            <td>
                <a class="btn btn-primary" href="{{Route('employee.edit',$item->id)}}">Edit</a>
                <a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</a>

                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Really want to Delete?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Delete" if you are really want to delete the date from the table.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-danger"  href="{{Route('employee.delete',$item->id)}}">Delete</a>
                        </div>
                    </div>
                </div>
                </div>
            </td>
        </tr>
    @endforeach
</tbody>
</table>
</div>
</div>


<!-- Your HTML and JavaScript code -->

<script>
    function generatePDF() {
        const element = document.getElementById('report');

        // Initialize html2pdf
        html2pdf(element, {
            margin: 10,
            filename: 'depWiseEmployeeReport.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        });
    }
</script>

