<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create a new ajax data.</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{Route('ajax.store')}}" method="post">
                    @csrf
                    <div class="col-md-6">
                        <label for="" class="form-label">Name</label>
                        <input  type="text" name="name" class="form-control" >
                    </div>
                    <div class="col-md-6">
                        <label for="joining_date" class="form-label">Joining date</label>
                        <input type="date" name="joining_date" class="form-control" id="">
                    </div>
                    <div class="col-md-6">
                        <label for="joining_salary" class="form-label">Joining salary</label>
                        <input  type="number" name="joining_salary" class="form-control" >
                    </div>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6" style="margin-top: 15px">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary"  href="">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
