 <form action="{{ url('sa1991as/gallery') }}" method="post" enctype="multipart/form-data">
     @csrf
     <div class="row">
         <div class="col-lg-12">
             <label for="image" class="col-form-label">Image</label>
             <input type="file" name="image" id="image" class="form-control" required>
         </div>
         <div class="col-lg-12">
             <label for="header" class="col-form-label required">Header</label>
             <input type="text" name="header" id="header" class="form-control">
         </div>
         <div class="col-lg-12">
             <label for="alt" class="col-sm-2 col-form-label">Alt Tag</label>
             <input type="text" class="form-control" name="alt" id="alt">
         </div>
         <div class="col-lg-12">
             <label for="description" class="col-form-label">Description</label>
             <input type="text" class="form-control" name="description" id="description">
         </div>
     </div>
     <div class="row">
         <div class="col-12 mt-2">
             <input type="submit" value="Save" class="btn btn-primary px-3">
         </div>
     </div>
 </form>
