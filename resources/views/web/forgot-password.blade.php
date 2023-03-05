@extends('web.layout.template')
@section('page_title', 'Forgot Password')
@section('breadcrum')

@endsection
@section('content')
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#" class="active">Forgot Password</a></li>
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
                        <h2>Forgot Password?</h2>
                        <p>Don't worry, Its easy to recover your password!</p>
                    </div>
                </div>
                <div class=" col-lg-6 col-md-12 col-12 mx-auto">
                    <form action="{{ url('/forgot-password') }}" method="post">
                        @csrf
                        <div class="login-form">
                            <x-flash-message></x-flash-message>
                            <div class="single-login">
                                <label>Email<span class="text-parimary">*</span></label>
                                <input type="text" required name="email" placeholder="Please Enter Your Email"
                                    value="{{ old('email') }}" autocomplete="false" autofocus>
                            </div>
                            <div class="single-login text-center">
                                <button type="submit" class="btn btn-primary">Check Email</button>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>

                                    Already have account?<a href="{{ url('/login') }}"> Sign In</a>
                                </span>
                                <a href="{{ url('/register') }}">Sign Up!</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
