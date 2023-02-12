@extends('web.layout.template')
@section('page_title', 'Register')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row ">
            <div class="col-lg-12">
                <div class="login-form mx-auto shadow bg-light">
                    <h1 class="text-center mb-1" style="font-size: 80px;"><i class="fa fa-user-circle"></i></h1>
                    <h2 class="custom-heading text-center mb-4">Register</h2>
                    <div class="container">
                        <x-flash-message></x-flash-message>
                    </div>
                    <form action="{{ url('register') }}" class="mx-auto" method="post">
                        @csrf
                        <div class="input-group mb-4">
                            <label><span class="text-danger">*</span>Username</label>
                            <div class="input-group-prepend" style="width: 40px;">
                                <span class="input-group-text"><i class="fa fa-signature"></i></span>
                            </div>
                            <input type="text" required name="username" class="form-control"
                                value="{{ old('username') }}" placeholder="Please Enter Username" autocomplete="false">
                        </div>
                        <div class="input-group mb-4">
                            <label><span class="text-danger">*</span> Password</label>
                            <div class="input-group-prepend" style="width: 40px;">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" name="password" required class="form-control"
                                placeholder="Please Enter Password" autocomplete="false">
                        </div>
                        <div class="input-group mb-4">
                            <label><span class="text-danger">*</span> Confirm Password</label>
                            <div class="input-group-prepend" style="width: 40px;">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" name="confirm_password" class="form-control"
                                placeholder="Please Confirm Your Password" required autocomplete="false">
                        </div>
                        <div class="input-group mb-4">
                            <label><span class="text-danger">*</span>Full Name</label>
                            <div class="input-group-prepend" style="width: 40px;">
                                <span class="input-group-text"><i class="fa fa-signature"></i></span>
                            </div>
                            <input type="text" required name="full_name" class="form-control"
                                value="{{ old('full_name') }}" placeholder="Please Enter Full Name" autocomplete="false">
                        </div>
                        <div class="input-group mb-4">
                            <label><span class="text-danger">*</span> Email</label>
                            <div class="input-group-prepend" style="width: 40px;">
                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input type="email" required name="email" class="form-control" value="{{ old('email') }}"
                                placeholder="Please Enter Email" autocomplete="false">
                        </div>

                        <p class="text-center mt-2">
                            <button class="btn custom-btn btn-block slide_down form_btn" title="Register">Register</button>
                        </p>

                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
