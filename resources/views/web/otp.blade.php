@extends('web.layout.template')
@section('page_title', "Forgot Password")
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row ">
            <div class="col-lg-12">
                <div class="login-form mx-auto shadow bg-light">
                    <h1 class="text-center mb-1" style="font-size: 80px;"><i class="fa fa-user-circle"></i></h1>
                    <h4 class=" text-center mb-3">OTP Verification &#x1F4AC;</h4>
                    <x-flash-message></x-flash-message>
                    <p class="text-center mb-3">Type your 6 digit security code</p>

                    <form action="{{ url('forgot-password') }}" class="mx-auto" method="post" id="form">
                        @csrf
                        <label>Email<span class="text-danger">*</span></label>
                        <input type="text" required name="email" class="form-control" placeholder="jorge@email.com"
                            value="{{ old('username') }}" autocomplete="false">

                        <p class="text-center mt-2">
                            <button class="btn custom-btn btn-block slide_down form_btn" title="Send Reset OTP">Send Reset OPT</button>
                        </p>
                        <div class="row mt-2 text-center">
                            <div class="col-lg-6 p-0">
                                <a href="{{ url('login') }}" class="custom-link">Login</a>
                            </div>
                            <div class="col-lg-6 p-0">
                                <a href="{{ url('register') }}" class="custom-link">CREATE AN ACCOUNT</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
