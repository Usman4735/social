@extends('super-admin.layout.template')
@section('page_title', 'Edit Product Good')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('sa1991as/product-goods') }}">Product Goods</a></li>
    <li class="breadcrumb-item active">Edit Product Good</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('sa1991as/product-goods') }}/{{ encrypt($product->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="name" class="col-form-label required">Name</label>
                                <input type="text" name="name" id="name" class="form-control form-control-sm"
                                    required value="{{ $product->name }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="group_id" class="col-form-label required">Product Group</label>
                                <select name="group_id" id="group_id" class="form-control form-control-sm select-2"
                                    required>
                                    <option value="">Select Group</option>
                                    @foreach ($product_groups as $group)
                                        <option value="{{ $group->id }}"
                                            {{ $product->group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="status" class="col-form-label">Product Status</label>
                                <select name="status" id="status" class="form-control form-control-sm">
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}" {{ $product->status==$status->id ? "selected" : " " }}>{{ ucwords(str_replace('_', ' ', $status->name)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <label for="description" class="col-form-label">Description</label>
                                <textarea name="description" id="description" class="form-control form-control-sm">{{ $product->description }}</textarea>
                            </div>
                            <div class="col-lg-12">
                                <label for="image" class="col-form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            @if ($product->image)
                                <div class="col-lg-12 mt-2">
                                    <img src="{{ asset('product-good-images') }}/{{ $product->image }}" width="150" class="img-thumbnail">
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="card-title my-2">Gallery Images</div>
                            <div class="col-lg-12">
                                <label for="gallery_images" class="col-form-label">Gallery Images <span class="text-danger">Max: 5</span></label>
                                <input type="file" name="gallery_images[]" id="gallery_images" class="form-control" multiple max="5">
                            </div>
                            <div class="col-lg-12 mt-2">
                                <div class="row">
                                    @foreach (@$product->product_images as $product_image)
                                        <div class="col-lg-3 mt-1 text-center">
                                            <img src="{{ asset('product-good-images') }}/{{ $product_image->image }}" width="150" class="img-thumbnail">
                                            <div class="mt-1">
                                                <a href="{{url('sa1991as/product-goods/delete-product-image')}}/{{encrypt($product_image->id)}}" class="btn btn-danger btn-sm confirm_delete">
                                                    Remove
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="card-title my-3">Permission Settings</div>
                            <div class="col-lg-6">
                                <label for="admin_id" class="col-form-label">Admin <span
                                        class="text-primary">*</span></label>
                                <select name="admin_id" id="admin_id" class="form-control form-control-sm select-2"
                                    required>
                                    <option value="">Select Admin</option>
                                    @foreach ($admins as $admin)
                                        <option value="{{ $admin->id }}" {{ $admin->id==$product->admin_id?"selected" : " "}}>{{ $admin->first_name }}
                                            &nbsp;{{ $admin->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="manager_id" class="col-form-label">Manager <span
                                        class="text-primary">*</span></label>
                                <select name="manager_id" id="manager_id" class="form-control form-control-sm select-2"
                                    required>
                                    <option value="">Select Manager</option>
                                     @foreach ($managers as $manager)
                                        <option value="{{ $manager->id }}" {{ $manager->id==$product->manager_id?"selected" : " "}}>{{ $manager->first_name }}
                                            &nbsp;{{ $manager->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card-title my-3">Similar Products</div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="similar_products" class="col-form-label">Similar Products</label>
                                <select name="similar_products[]" id="similar_products" class="select-2" multiple>
                                    <option value="">Select Produtcs</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mt-2">
                                <input type="submit" value="Update" class="save btn btn-primary px-3">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_scripts')
    <script>
        $("#admin_id").on('change', function(e) {
            $.ajax({
                type: "post",
                url: "{{ url('sa1991as/admin-managers') }}",
                data: {
                    admin_id: $(this).val()
                },
                success: function(response) {
                    console.log(response);
                    $.each(response, function(index, val) {
                        $("#manager_id").empty();
                        $("#manager_id").append('<option value="' + val.id + '">' +
                            val.first_name + ' ' + val.last_name +
                            '</option>');
                    });
                }
            });
        });

        $(".save").click(function(){
            var $gallery_images = $("#gallery_images");
            if (parseInt($gallery_images.get(0).files.length) > 5){
                Swal.fire({
                    title: 'Gallery Max Files: 5',
                    text: "You can only upload a maximum of 5 files",
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-outline-danger ms-1'
                    },
                    buttonsStyling: false
                })
            }
        });
    </script>
@endsection
