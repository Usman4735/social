@extends('web.layout.template')
@section('page_title', 'Sign In')

@section('content')
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#" class="active">Sign In</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="user-login-area">
        <div class="container mb-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-title text-center mb-30">
                        <h2>Sign In</h2>
                        <p>Good to see you again! Please sign in.</p>
                    </div>
                </div>
                <div class=" col-lg-6 col-md-12 col-12 mx-auto">
                    <form action="{{ url('login') }}" method="post">
                        @csrf
                        <div class="login-form">
                            <x-flash-message></x-flash-message>
                            <div class="single-login">
                                <label>Email<span>*</span></label>
                                <input type="text" required name="email" placeholder="Please Enter Your Email"
                                    value="{{ old('email') }}" autocomplete="false" autofocus>
                            </div>
                            <div class="single-login">
                                <label>Passwords <span>*</span></label>
                                <input type="password" required name="password" placeholder="Please Enter Your password"
                                    value="{{ old('password') }}" autocomplete="false">
                            </div>
                            <div class="single-login text-center">
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ url('forgot-password') }}">Lost your password?</a>
                                <a href="{{ url('register') }}">Sign Up!</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
