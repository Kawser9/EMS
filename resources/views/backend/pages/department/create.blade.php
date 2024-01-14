@extends('backend.master')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Create Department</h6>
        <div class="right">
            <a class="btn btn-secondery" href="{{Route('department.list')}}">Back</a>
        </div>
    </div>    
    <div class="card-body">
        <form class="row g-3">
            <div class="col-md-6">
                <label for="" class="form-label">Department ID</label>
                <input type="number" name="departmentId" class="form-control" id="departmentIdInput">
            </div>
            <div class="col-md-6">
                <label for="inputname" class="form-label">Departmanet Name</label>
                <input type="text" name="departmentName" class="form-control" id="">
            </div>
            <div class="col-md-6" style="margin-top: 15px">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
  @endsection

  

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Assuming departmentIdValue is the actual department ID value retrieved from your backend
        var departmentIdValue = 1; // Replace this with the actual value
        
        // Format the value with leading zeros using JavaScript
        var formattedDepartmentId = ('000' + departmentIdValue).slice(-4);
        
        // Set the formatted value to the input field
        document.getElementById("departmentIdInput").value = formattedDepartmentId;
    });
</script>