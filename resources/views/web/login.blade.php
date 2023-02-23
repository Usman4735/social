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

    <div class="user-login-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-title text-center mb-30">
                        <h2>Sign In</h2>
                        <p>Good to see you again! Please sign in.</p>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6 col-md-12 col-12 ">
                    <form action="{{ url('login') }}"  method="post">
                        @csrf
                        <div class="login-form">
                            <x-flash-message></x-flash-message>
                            <div class="single-login">
                                <label>Username<span>*</span></label>
                                <input type="text" required name="username" placeholder="Please Enter Your Username" value="{{ old('username') }}" autocomplete="false">
                            </div>
                            <div class="single-login">
                                <label>Password <span>*</span></label>
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
