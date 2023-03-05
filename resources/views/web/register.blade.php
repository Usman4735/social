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
                    <div class="billing-fields">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="single-register">
                                    <label>First Name<span>*</span></label>
                                    <input type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="single-register">
                                    <label>Last Name<span>*</span></label>
                                    <input type="text" />
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="single-register">
                                    <label>Email Address<span>*</span></label>
                                    <input type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="single-register">
                                    <label>Phone<span>*</span></label>
                                    <input type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">

                                <div class="single-register">
                                    <label>Password<span>*</span></label>
                                    <input type="password" placeholder="Password" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="single-register">
                                    <label>Confirm password<span>*</span></label>
                                    <input type="password" placeholder="Password" />
                                </div>
                            </div>
                        </div>
                        <div class="single-register text-center">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
