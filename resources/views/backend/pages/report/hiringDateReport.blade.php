@extends('backend.master')
@section('content')
    
<body>
    <div class="container mt-5">
      <h1>Select Date</h1>
        <form action="" method="get" >

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
                    <input value="{{request()->start_date}}" type="date" class="form-control" id="start_date" name="start_date" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="end_date">End Date:</label>
                    <input value="{{request()->end_date}}" type="date" class="form-control" id="end_date" name="end_date" required>
                </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-6 mb-3">
                        <select name="brand_id" class="form-select" aria-label="Default select example" required>
                        <option >Select brand</option>
                            @foreach ($brands as $brand)
                                <option  value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
  
            {{-- <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="start_time">Start Time:</label>
                    <input type="time" class="form-control" id="start_time" name="start_time" required>
                </div>
            <div class="col-md-6 mb-3">
                <label for="end_time">End Time:</label>
                <input type="time" class="form-control" id="end_time" name="end_time" required>
            </div>
            </div> --}}
  
        <button type="submit" class="button">Generate Report</button>
        </form>

<div class="container mt-5" id="printReport"> 
    <div style="text-align: center;">
        <h1>Buy Gadget</h1>
        <p>Uttara, Dhaka 1230</p>
        <h2>Product Report</h2>
        <p>{{auth()->user()->name}}</p>
        <p>Report of {{request()->start_date}} to {{request()->end_date}}</p>
    </div>
    
    <br>
    
        <div >
            <table table class="table">
                <thead>
                    <tr>
                    <th>SL</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Status</th>
                        <th>Type</th>
                        <th>Adding Date</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($productsByDate))
                    <span>Total product : {{$productsByDate->count()}}</span> 
                    @foreach($productsByDate as $key=>$product)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->catname->name}}</td>
                        <td>{{$product->brand_name->name}}</td>
                        <td>{{$product->status}}</td>
                        <td>{{$product->type}}</td>
                        <td>{{$product->created_at}}</td>
                        
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            <br>
        </div>
    </div>
</div>
</body>

<button onclick="printReport()" class="button">Print Report</button>

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