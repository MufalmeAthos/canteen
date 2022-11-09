<div class="modal " id="myProduct">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">New Product Form</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="category" required>
                    <option></option>
                    <option>Starters</option>
                    <option>Salads</option>
                    <option>Specialty</option>
                    </select>
            </div>
            <div class="form-group">
                <label for="pname">Product Name:</label>
                <input type="text" class="form-control form-control-sm" name="pname" required>
            </div>
            <div class="form-group">
                <label for="pname">Price:</label>
                <input type="number" class="form-control form-control-sm" name="price" required>
            </div>
            <div class="form-group">
                <label for="pname">Description:</label> 
                <textarea class="form-control form-control-sm" name="comment" cols="10" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="photo">Upload Image:</label> 
                <input type="file" class="form-control form-control-sm" name="photo" required>
            </div>
            <button type="submit" class="btn btn-primary mb-2" name="submit">Submit</button>
        </form>
      </div>

    </div>
  </div>
</div>