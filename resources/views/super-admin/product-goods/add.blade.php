@extends('super-admin.layout.template')
@section('page_title', 'Add Product Good')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('sa1991as/product-goods') }}">Product Goods</a></li>
    <li class="breadcrumb-item active">Add Product Good</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('sa1991as/product-goods') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="name" class="col-form-label required">Name</label>
                                <input type="text" name="name" id="name" class="form-control form-control-sm"
                                    required>
                            </div>
                            <div class="col-lg-6">
                                <label for="group_id" class="col-form-label required">Product Group</label>
                                <select name="group_id" id="group_id" class="form-control form-control-sm select-2"
                                    required>
                                    <option value="">Select Group</option>
                                    @foreach ($product_groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="status" class="col-form-label">Product Status</label>
                                <select name="status" id="status" class="form-control form-control-sm">
                                    <option value="draft">Draft</option>
                                    <option value="reserved">Reserved</option>
                                    <option value="awaiting_moderation">Awaiting Moderation</option>
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <label for="description" class="col-form-label">Description</label>
                                <textarea name="description" id="description" class="form-control form-control-sm"></textarea>
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
                                        <option value="{{ $admin->id }}">{{ $admin->first_name }}
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
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-2">
                                <input type="submit" value="Save" class="btn btn-primary px-3">
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
                            val.first_name + ' ' +val.last_name +
                            '</option>');
                    });
                }
            });
        });
    </script>
@endsection
