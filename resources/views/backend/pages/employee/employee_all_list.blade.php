@extends('backend.master')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">All employee list</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Employee ID</th>
                        <th>Position</th>
                        <th>Age</th>
                        <th>Status</th>
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
                            <td>{{$item->employee_id}}</td>
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
                            <td>{{$item->status }}</td>
                            <td>{{$item->phone_number}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->hire_date}}</td>
                            <td>{{$item->department_name->name}}</td>
                            <td style="display: flex;">
                                
                                    <a class="btn btn-primary" href="{{Route('employee.edit',$item->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a class="btn btn-success" href="{{Route('employee.show',$item->id)}}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></a>
                                    <a class="btn btn-secondary" href="{{Route('employee.email.from',$item->id)}}"><i class="fa-solid fa-envelope"></i></a>
                                
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
            {{$employees->links()}}
        </div>
    </div>
</div>

@endsection
