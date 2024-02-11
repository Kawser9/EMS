<!-- Add Modal -->
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Add New Member</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
              <form action="{{ URL::to('save') }}" id="addForm">
                  <div class="mb-3">
                      <label for="Name">Name</label>
                      <input type="text" name="name" class="form-control" placeholder="Input Nname" required>
                  </div>
                  <div class="mb-3">
                    <label for="joining_date">Joining Date</label>
                    <input type="date" name="joining_date" class="form-control" placeholder="Input Joining Date" required>
                </div>
                <div class="mb-3">
                    <label for="joining_salary">Joining Salary</label>
                    <input type="number" name="joining_salary" class="form-control" placeholder="Input Joining Salary" required>
                </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Edit Member</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
              <form action="{{ URL::to('update') }}" id="editForm">
                  <input type="hidden" id="memid" name="id">
                  <div class="mb-3">
                      <label for="firstname">Firstname</label>
                      <input type="text" name="firstname" id="firstname" class="form-control">
                  </div>
                  <div class="mb-3">
                      <label for="lastname">Lastname</label>
                      <input type="text" name="lastname" id="lastname" class="form-control">
                  </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Modal -->
  <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Delete Member</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
              <h4 class="text-center">Are you sure you want to delete Member?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="deletemember" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>


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
