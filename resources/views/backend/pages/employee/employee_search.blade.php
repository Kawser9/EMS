@extends('backend.master')
@section('content')
<div class="card shadow mb-4">
    {{-- <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
        <div class="right">
            <a class="btn btn-primary" href="{{Route('employee.create')}}">Create</a>
        </div>
    </div> --}}
    <div class="card-body">
        <div class="table-responsive">
            
            <table class="table" id="dataTable">
                <tr>
                    <td>
                        Employee search:
                    </td>
                    <td>
                        <input type="text" class="form-control" id="search_query" required placeholder="Enter Employee ID / Name" >
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary" id="searchBtn">
                            Search
                        </button>
                    </td>
                </tr>
            </table>
            <div id="search_result">

            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function(){

      $('#search_query').keydown(function(event){
          var keyCode = (event.keyCode ? event.keyCode : event.which);
          if (keyCode == 13) {
              $('#searchBtn').trigger('click');
          }
      });

      $('#searchBtn').on('click', function (event) {
        event.preventDefault();
        var search_query = $("#search_query").val();
        // alert(id);
          if(search_query!=''){
            $.ajax({
                type: "GET",
                url:"{{url('/admin/ajax/employee-details/search/')}}"+"/"+search_query,
                success:function (response) {
                  $('#search_result').html(response);
                }
            });
          }else{
            alert('Please type ID or name first.');
            $("#search_query").focus();
          }
      });

      
    });
</script>
@endsection
