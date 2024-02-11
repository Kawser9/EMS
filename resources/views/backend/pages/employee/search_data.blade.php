<hr>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Employee ID</th>
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
                <td>
                    <a href="{{Route('employee.show',$item->id)}}">
                        {{$item->first_name .' '.$item->last_name }}
                    </a>
                </td>
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
                <td>{{$item->salary }} BTD</td>
                <td>{{$item->phone_number}}</td>
                <td>{{$item->email}}</td>
                <td>{{date('d-m-Y', strtotime($item->hire_date))}}</td>
                <td>{{$item->department_name->name}}</td>
                <td>
                    <a href="{{Route('employee.email.from',$item->id)}}" class="btn btn-dark"><i class="fa-solid fa-envelope"></i></a>
                    <a class="btn btn-primary" href="{{Route('employee.edit',$item->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
