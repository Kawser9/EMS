//blog\resources\views\memberlist.blade.php
{{-- @foreach($members as $member)
    <tr>
        <td>{{ $member->firstname }}</td>
        <td>{{ $member->lastname }}</td>
        <td><a href='#' class='btn btn-success edit' data-id='{{ $member->id }}' data-first='{{ $member->firstname }}' data-last='{{ $member->lastname }}'> Edit</a>
            <a href='#' class='btn btn-danger delete' data-id='{{ $member->id }}'> Delete</a>
        </td>
    </tr>
@endforeach --}}
@foreach ($members as $member)
<tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$member->name}}</td>
    <td>{{$member->joining_date}}</td>
    <td>{{$member->joining_salary}}</td>
    <td>
        <a href='#' class='btn btn-success edit' data-id='{{ $member->id }}' data-first='{{ $member->name }}' data-last='{{ $member->joining_date }}'> Edit</a>
        <a href='#' class='btn btn-danger delete' data-id='{{ $member->id }}'> Delete</a>
    </td>
    {{-- <td>

        <a type="submit" class="btn btn-primary" href="{{Route('ajax.edit',$member->id)}}" id="searchBtn">
            Edit
        </a>
        <a class="btn btn-primary" href="{{Route('employee.edit',$member->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
    </td> --}}

</tr>
@endforeach
