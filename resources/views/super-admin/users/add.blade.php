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
                                <label for="full_name" class="col-form-label">Full Name</label>
                                <input type="text" name="full_name" id="full_name" class="form-control" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="username" class="col-form-label">Full Name</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="email" class="col-form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="mobilbe" class="col-form-label">Mobile</label>
                                <input type="text" name="mobilbe" id="mobilbe" class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <label for="password" class="col-form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="confirm_password" class="col-form-label">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                            </div>
                            <div class="col-lg-12">
                                <label for="role" class="col-form-label">User Role</label>
                                <select name="role" id="role" class="form-control select-2" required>
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="manager">Manager</option>
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <label for="profile_picture" class="col-form-label">Profile Picture</label>
                                <input type="file" name="profile_picture" id="profile_picture" class="form-control">
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
