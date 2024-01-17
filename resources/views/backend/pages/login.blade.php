<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>EMS</title>
    @notifyCss
  </head>
  <body>
    

<section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <h5> Admin login</h5>
  
              <h3 class="mb-5" style="color: #fff; font-weight: bold;">Login</h3>
                <form action="{{Route('admin.do.login')}}" method="POST" >
                  @csrf
                    <div class="form-outline mb-4">
                      <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg" placeholder="Enter Your Email.."/>
                      <label class="form-label" for="typeEmailX-2">Email</label>
                    </div>
        
                    <div class="form-outline mb-4">
                      <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" placeholder="Enter Your Password.." />
                      <label class="form-label" for="typePasswordX-2">Password</label>
                    </div>
        
                    <!-- Checkbox -->
                    {{-- <div class="form-check d-flex justify-content-start mb-4">
                      <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                      <label class="form-check-label" for="form1Example3"> Remember password </label>
                    </div> --}}
        
                    <button class="btn btn-primary" type="submit" style="background-color: #4CAF50; border: none; padding: 10px 20px; color: white; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 5px;">Login</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <x-notify::notify />
  @notifyJs

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
   
  </body>
</html>
