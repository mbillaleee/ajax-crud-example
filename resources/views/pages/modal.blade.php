
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addForm" name="postForm" class="form-horizontal" action="{{ URL::to('store') }}">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-12">
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-12">
                    <textarea id="description" name="description" required placeholder="Enter Description" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" id="savedata" value="create">Save Post
                </button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editmodalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editForm" name="postForm" class="form-horizontal" action="{{ URL::to('update') }}">
            <input type="hidden" name="id" id="memid">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="name1" name="name" placeholder="Enter Name" value="" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-12">
                <input type="text" class="form-control" id="email1" name="email" placeholder="Enter Email" value="" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-12">
                    <textarea id="description1" name="description" required placeholder="Enter Description" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" id="savedata" value="create">Update 
                </button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="deletemodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deletemodalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <span>Are You Sure </span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="deletemember">Delete</button>
      </div>
    </div>
  </div>
</div>