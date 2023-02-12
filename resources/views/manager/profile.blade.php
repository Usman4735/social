@extends('manager.layout.template')
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
                            <form action="{{ url('m1001m/profile') }}" method="POST" enctype="multipart/form-data" id="form">
                                @csrf
                                @method('put')
                                <div class="row mb-2">
                                    <div class="col-lg-6">
                                        <label for="first_name" class=" col-form-label">First Name <span
                                                class="text-danger">*</span></label>
                                        <input name="first_name" type="text" class="form-control"
                                            id="first_name" placeholder="First Name" value="{{ $manager->first_name }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="last_name" class=" col-form-label">Last Name <span
                                                class="text-danger">*</span></label>
                                        <input name="last_name" type="text" class="form-control"
                                            id="last_name" placeholder="Last Name" value="{{ $manager->last_name }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="mobile" class="col-form-label">Mobile</label>
                                        <input name="mobile" type="text" class="form-control" id="mobile"
                                            placeholder="Mobile" value="{{ $manager->mobile }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="email" class="col-form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <input required name="email" type="email" class="form-control" id="email"
                                            placeholder="Email" value="{{ $manager->email }}">
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="username" class="col-form-label">Username <span
                                                class="text-danger">*</span></label>
                                        <input required name="username" type="text" class="form-control" id="username"
                                            placeholder="Username" value="{{ $manager->username }}">
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
                                    @if ($manager->profile_picture)
                                        <div class="col-lg-12 mt-2">
                                            <img src="{{asset('storage/admin-images')}}/{{$manager->profile_picture}}" alt="Admin Image" width="180" class="img-thumbnail">
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
