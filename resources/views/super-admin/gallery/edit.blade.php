 <style>
     div.gallery img {
         width: 100%;
         height: auto;
     }
 </style>
 <form action="{{ url('sa1991as/gallery') }}/{{ encrypt($media_gallery->id) }}" method="post"
     enctype="multipart/form-data">
     @csrf
     @method('put')
     <div class="row">
         <div class="col-lg-12 text-center">
             <img src="{{ url('images') }}/{{ $media_gallery->image }}" alt="{{ $media_gallery->alt }}" height="auto">
         </div>
         <div class="col-lg-12">
             <label for="image" class="col-form-label">Image</label>
             <input type="file" name="image" id="image" class="form-control form-control-sm" required>
         </div>
         <div class="col-lg-12">
             <label for="header" class="col-form-label required">Header</label>
             <input type="text" value="{{ $media_gallery->header }}" name="header" id="header"
                 class="form-control form-control-sm">
         </div>
         <div class="col-lg-12">
             <label for="alt" class="col-sm-2 col-form-label">Alt Tag</label>
             <div class="col-sm-12">
                 <input type="text" class="form-control form-control-sm" value="{{ $media_gallery->alt }}" name="alt"
                     id="alt">
             </div>
         </div>
         <div class="col-lg-12">
             <label for="description" class="col-form-label">Description</label>
             <input type="text" class="form-control form-control-sm" value="{{ $media_gallery->description }}" name="description"
                 id="description">
         </div>
     </div>
     <div class="row">
         <div class="col-12 mt-2">
             <input type="submit" value="Update" class="btn btn-primary px-3">
         </div>
     </div>
 </form>
