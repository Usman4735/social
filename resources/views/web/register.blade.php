@extends('web.layout.template')
@section('page_title', 'Sign Up')
@section('content')
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#" class="active">Sign Up</a></li>
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
                        <h2>Sign Up</h2>
                    </div>
                </div>
                <div class="col-lg-10 col-md-12 col-12 mx-auto">
                    <div class="login-form">
                            <x-flash-message></x-flash-message>

                       <form action="{{ url('register') }}" method="post">
                        @csrf
                         <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="single-login">
                                    <label>First Name <span>*</span></label>
                                     <input type="text" required name="first_name" placeholder="First Name"
                                    value="{{ old('first_name') }}" autocomplete="false" autofocus>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="single-login">
                                    <label>Last Name <span>*</span></label>
                                     <input type="text" required name="last_name" placeholder="Last Name"
                                    value="{{ old('last_name') }}" autocomplete="false">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="single-login">
                                    <label>Email Address  <span>*</span></label>
                                     <input type="text" required name="email" placeholder="Email"
                                    value="{{ old('email') }}" autocomplete="false">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="single-login">
                                    <label>Mobile <span>*</span></label>
                                     <input type="text" required name="mobile" placeholder="Mobile Number"
                                    value="{{ old('mobile') }}" autocomplete="false">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">

                                <div class="single-login">
                                    <label>Password <span>*</span></label>
                                    <input type="password" required name="password" placeholder="********"  autocomplete="false">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="single-login">
                                    <label>Confirm password <span>*</span></label>
                                     <input type="password" required name="confirm_password" placeholder="********" autocomplete="false">
                                </div>
                            </div>
                        </div>
                        <div class="single-login text-center">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
