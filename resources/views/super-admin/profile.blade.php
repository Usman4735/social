@extends('super-admin.layout.template')
@section('page_title', 'Edit Profile')
@section('breadcrumb')
    <li class="breadcrumb-item active">Edit Profile</li>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ url('sa1991as/profile') }}" method="POST" enctype="multipart/form-data" id="form">
                                @csrf
                                @method('put')
                                <div class="row mb-2">
                                    <div class="col-lg-6">
                                        <label for="first_name" class=" col-form-label">Fist Name <span
                                                class="text-danger">*</span></label>
                                        <input name="first_name" type="text" class="form-control"
                                            id="first_name" placeholder="First Name" value="{{ $super_admin->first_name }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="last_name" class=" col-form-label">Last Name <span
                                                class="text-danger">*</span></label>
                                        <input name="last_name" type="text" class="form-control"
                                            id="last_name" placeholder="Last Name" value="{{ $super_admin->last_name }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="mobile" class="col-form-label">Mobile</label>
                                        <input name="mobile" type="text" class="form-control" id="mobile"
                                            placeholder="Mobile" value="{{ $super_admin->mobile }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="email" class="col-form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <input required name="email" type="email" class="form-control" id="email"
                                            placeholder="Email" value="{{ $super_admin->email }}">
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="username" class="col-form-label">Username <span
                                                class="text-danger">*</span></label>
                                        <input required name="username" type="text" class="form-control" id="username"
                                            placeholder="Username" value="{{ $super_admin->username }}">
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="password" class="col-form-label">Choose Password <span
                                                class="text-danger">*</span></label>
                                        <input name="password" type="password" class="form-control" id="password"
                                            placeholder="Leave empty if you don't want to change">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="confirm_password" class="col-form-label">Confirm Password <span
                                                class="text-danger">*</span></label>
                                        <input name="confirm_password" type="password" class="form-control"
                                            id="confirm_password" placeholder="Leave empty if you don't want to change">
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="profile_picture" class="col-form-label">Profile Picture</label>
                                        <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                                    </div>
                                    @if ($super_admin->profile_picture)
                                        <div class="col-lg-12 mt-2">
                                            <img src="{{asset('storage/admin-images')}}/{{$super_admin->profile_picture}}" alt="Admin Image" width="180" class="img-thumbnail">
                                        </div>
                                    @endif

                                    <div class="col-12 mt-2">
                                        <button type="submit" class="btn btn-primary form_btn" title="Update Profile">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
