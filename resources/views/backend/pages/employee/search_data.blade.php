<hr>
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
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    <a href="" target="_blank">
                        {{$item->first_name .' '.$item->last_name }}
                    </a>
                </td>
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
                
            </tr>
        @endforeach
    </tbody>
</table>
