@extends('super-admin.layout.template')
@section('page_title', 'Add User')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('sa1991as/user-management') }}">User Management</a></li>
    <li class="breadcrumb-item active">Add User</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('sa1991as/user-management') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="first_name" class="col-form-label">First Name</label>
                                <input type="text" name="first_name" value="{{ old('first_name') }}" id="first_name" class="form-control form-control-sm " required>
                            </div>
                            <div class="col-lg-6">
                                <label for="last_name" class="col-form-label">Last Name</label>
                                <input type="text" name="last_name" value="{{ old('last_name') }}" id="last_name" class="form-control form-control-sm" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="username" class="col-form-label">Username</label>
                                <input type="text" name="username" value="{{ old('username') }}" id="username" class="form-control form-control-sm" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="email" class="col-form-label">Email</label>
                                <input type="text" name="email" value="{{ old('email') }}" id="email" class="form-control form-control-sm" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="mobile" class="col-form-label">Mobile</label>
                                <input type="text" name="mobile" value="{{ old('mobile') }}" id="mobile" class="form-control form-control-sm">
                            </div>
                            <div class="col-lg-6">
                                <label for="password" class="col-form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control form-control-sm" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="confirm_password" class="col-form-label">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control form-control-sm" required>
                            </div>
                            <div class="col-lg-12">
                                <label for="role" class="col-form-label">User Role</label>
                                <select name="role" id="role" class="form-control form-control-sm select-2" required>
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="manager">Manager</option>
                                </select>
                            </div>
                            <div class="col-lg-12" id="admin_div" style="display: none">
                                <label for="admin_id" class="col-form-label">Admin</label>
                                <select name="admin_id" id="admin_id" class="form-control form-control-sm select-2" required>
                                    <option value="">Select Admin</option>
                                    @foreach ($admins as $admin)
                                        <option value="{{$admin->id}}">{{$admin->first_name}} {{$admin->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <label for="profile_picture" class="col-form-label">Profile Picture</label>
                                <input type="file" name="profile_picture" id="profile_picture" class="form-control form-control-sm">
                            </div>
                            <div class="col-lg-12 mt-2">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="status" name="status" value="1">
                                    <label class="form-check-label" for="status">Active / Blocked</label>
                                </div>
                            </div>
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
@section("custom_scripts"))
    <script>
        $("#role").on("change", function() {
            $("#admin_div").hide();
            var role = $(this).val();
            if(role == 'manager') {
                $("#admin_div").show();
            }
        });
    </script>
@endsection
