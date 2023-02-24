@extends('web.layout.template')
@section('page_title', 'Sign Up')
@section('breadcrum')
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a class="active">Sign Up</a></li>
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
                        <h2>Sign Up</h2>
                        <p>Join our Community! Sign up now.</p>
                    </div>
                </div>
                <div class="offset-lg-2 col-lg-8 col-md-12 col-12">
                    <div class="billing-fields">
                        <div class="login-form">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="single-register">
                                        <form action="#">
                                            <label>First Name<span>*</span></label>
                                            <input type="text" />
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="single-register">
                                        <form action="#">
                                            <label>Last Name<span>*</span></label>
                                            <input type="text" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="single-register">
                                        <form action="#">
                                            <label>Email Address<span>*</span></label>
                                            <input type="text" />
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="single-register">
                                        <form action="#">
                                            <label>Phone<span>*</span></label>
                                            <input type="text" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="single-register">
                                <form action="#">
                                    <label>Account password<span>*</span></label>
                                    <input type="text" placeholder="Password" />
                                </form>
                            </div>
                            <div class="single-register">
                                <form action="#">
                                    <label>Confirm password<span>*</span></label>
                                    <input type="text" placeholder="Password" />
                                </form>
                            </div>
                            <div class="single-register single-register-3">
                                <input id="rememberme" type="checkbox" name="rememberme" value="forever">
                                <label class="inline">I agree <a href="#">Terms & Condition</a></label>
                            </div>
                            <div class="single-register">
                                <a href="#">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
