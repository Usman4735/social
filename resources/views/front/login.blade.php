@extends('front.layout.template')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row ">
            <div class="col-lg-12">
                    <div class="login-form mx-auto shadow bg-light">
                        <h1 class="text-center mb-1" style="font-size: 80px;"><i class="fa fa-user-circle"></i></h1>
                        <h2 class="custom-heading text-center mb-4">Login</h2>
                        <div class="container">
                            <x-flash-message></x-flash-message>
                        </div>
                        <form action="{{ url('login') }}" class="mx-auto" method="post">
                            @csrf
                            <div class="input-group mb-4">
                                <label><span class="text-danger">*</span>Username</label>
                                <div class="input-group-prepend" style="width: 40px;">
                                    <span class="input-group-text"><i class="fa fa-signature"></i></span>
                                </div>
                                <input type="text" required name="username" class="form-control"
                                       placeholder="Please Enter Your Username" value="{{ old('username') }}"
                                       autocomplete="false">
                            </div>
                            <div class="input-group mb-4">
                                <label><span class="text-danger">*</span> Password</label>
                                <div class="input-group-prepend" style="width: 40px;">
                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                </div>
                                <input type="password" name="password" required class="form-control"
                                       placeholder="Please Enter Your Password" autocomplete="false">
                            </div>
                            <p class="text-center mt-2">
                                <button class="btn custom-btn btn-block slide_down form_btn"
                                        title="Register">Sign In</button>
                            </p>

                        </form>
                    </div>
            </div>
        </div>

    </div>
@endsection
