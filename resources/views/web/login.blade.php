@extends('web.layout.template')
@section('page_title', 'Login')
@section('breadcrum')
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a class="active">login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')

    {{-- <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="login-form mx-auto shadow bg-light">
                    <h1 class="text-center mb-1" style="font-size: 80px;"><i class="fa fa-user-circle"></i></h1>
                    <h2 class="custom-heading text-center mb-2">Login</h2>
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
                            <input type="text" required name="username" class="form-control form-control-sm"
                                placeholder="Please Enter Your Username" value="{{ old('username') }}" autocomplete="false">
                        </div>
                        <div class="input-group mb-4">
                            <label><span class="text-danger">*</span> Password</label>
                            <div class="input-group-prepend" style="width: 40px;">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" name="password" required class="form-control form-control-sm"
                                placeholder="Please Enter Your Password" autocomplete="false">
                        </div>
                        <p class="text-center mt-2">
                            <button class="btn custom-btn btn-block slide_down form_btn" title="Register">Sign In</button>
                        </p>
                        <div class="row mt-2 text-center">
                            <div class="col-lg-6 p-0">
                                <a href="{{ url('forgot-password') }}" class="custom-link">FORGOT PASSWORD?</a>
                            </div>
                            <div class="col-lg-6 p-0">
                                <a href="{{ url('register') }}" class="custom-link">CREATE AN ACCOUNT</a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div> --}}

    <div class="user-login-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-title text-center mb-30">
                        <h2>Login</h2>
                        <p>doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo<br>inventore
                            veritatis et quasi architecto beat</p>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6 col-md-12 col-12 ">
                    <form action="{{ url('login') }}"  method="post">
                        @csrf
                        <div class="login-form">
                            <x-flash-message></x-flash-message>
                            <div class="single-login">
                                <label>Username or email<span>*</span></label>
                                <input type="text" required name="username" placeholder="Please Enter Your Username" value="{{ old('username') }}" autocomplete="false">
                            </div>
                            <div class="single-login">
                                <label>Passwords <span>*</span></label>
                                <input type="text" required name="password" placeholder="Please Enter Your password" value="{{ old('password') }}" autocomplete="false">
                            </div>
                            <div class="single-login single-login-2">
                                <input type="submit" value="Login">
                            </div>
                            <a href="{{ url('forgot-password') }}">Lost your password?</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
