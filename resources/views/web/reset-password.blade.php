@extends('web.layout.template')
@section('page_title', 'Recover Password')
@section('content')
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#" class="active">Recover Password</a></li>
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
                        <h2>New Password</h2>
                    </div>
                </div>
                <div class=" col-lg-6 col-md-12 col-12 mx-auto">
                    <form action="{{ url('/reset-password') }}" method="post">
                        @csrf
                        <input type="hidden" name="token" value="{{ encrypt($user->id) }}">
                        <div class="login-form">
                            <x-flash-message></x-flash-message>
                            <div class="single-login">
                                <label>Password<span>*</span></label>
                                <input type="password" required name="password" min="8" placeholder="********"
                                    autocomplete="false" autofocus>
                            </div>

                            <div class="single-login">
                                <label>Confirm password<span>*</span></label>
                                <input type="password" required name="confirm_password" min="8"
                                    placeholder="********" autocomplete="false">
                            </div>
                            <div class="single-login text-center">
                                <button type="submit" class="btn btn-primary">Change Password</button>
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
