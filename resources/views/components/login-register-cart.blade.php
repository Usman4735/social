<div class="container">
    <div class="row" id="checkout">
        <div class="col-lg-12 col-md-12 col-12 order-lg-1 order-1">
            <div class="user-login-area">
                <div class="container mb-5 combine-login-form">
                    <div class="row d-flex">
                        <div class="col-lg-6 col-md-6 col-12 combine-login-form-border">
                            <div class="login-title mb-30 text-center">
                                <h2>Login</h2>
                            </div>
                            @if (Session::has('cart-login-page-error'))
                                <div class="alert alert-error" role="alert">
                                    <div class="alert-body text-danger">{{ session('cart-login-page-error') }}</div>
                                </div>
                            @endif
                            <form action="{{ url('login') }}" method="post" id="cart_login_form">
                                @csrf
                                <input type="hidden" name="p_token" value="{{ encrypt('cart-login') }}">
                                <div class="single-login">
                                    <label>Email<span class="text-primary">*</span></label>
                                    <input type="text" required name="email" placeholder="John@email.com"
                                        value="{{ old('email') }}" autocomplete="false" autofocus>
                                </div>
                                <div class="single-login">
                                    <label>Password<span class="text-primary">*</span></label>
                                    <input type="password" required name="password" placeholder="********"
                                        value="{{ old('password') }}" autocomplete="false">
                                </div>
                                <div class="single-login">
                                    <button type="submit" class="btn btn-primary form_btn"
                                        style="width: 25%">Login</button>
                                </div>
                            </form>

                        </div>
                        <div class="col-lg-6 col-md-6 col-12 ">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="login-title mb-30 text-center">
                                        <h2>Register </h2>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ url('/register') }}" method="post"> @csrf
                                <input type="hidden" name="p_token" value="{{ encrypt('cart-register') }}">

                                <div class="row">
                                   <div class="col-lg-12">
                                     @if (Session::has('cart-register-page-error'))
                                        <div class="alert alert-error" role="alert">
                                            <div class="alert-body text-danger">{{ session('cart-register-page-error') }}</div>
                                        </div>
                                    @endif
                                    {{-- validation errors --}}
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <div class="alert-body">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                   </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="single-login">
                                            <label>First Name<span class="text-primary">*</span></label>
                                            <input type="text" required name="first_name"
                                                placeholder="Please Enter First Name" value="{{ old('first_name') }}"
                                                autocomplete="false" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">

                                        <div class="single-login">
                                            <label>Last Name<span class="text-primary">*</span></label>
                                            <input type="text" required name="last_name"
                                                placeholder="Please Enter Last Name" value="{{ old('last_name') }}"
                                                autocomplete="false">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">

                                        <div class="single-login">
                                            <label>Email<span class="text-primary">*</span></label>
                                            <input type="email" required name="email" placeholder="John@gmail.com "
                                                value="{{ old('email') }}" autocomplete="false">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="single-login">
                                            <label>Mobile</label>
                                            <input type="text" name="mobile" placeholder="Please Enter Mobile"
                                                value="{{ old('mobile') }}" autocomplete="false">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">

                                        <div class="single-login">
                                            <label>Password <span class="text-primary">*</span></label>
                                            <input type="password" required name="password" placeholder="********"
                                                autocomplete="false">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">

                                        <div class="single-login">
                                            <label>Confirm Password <span class="text-primary">*</span></label>
                                            <input type="password" required name="confirm_password"
                                                placeholder="********" autocomplete="false">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">

                                        <div class="single-login">
                                            <button type="submit" class="btn btn-sm btn-transprant">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </form>



                        </div>
                    </div>
                    <div class="row mt-5">
                        <br>
                        <div class="col-lg-12">

                            <p class="text-center"><strong>OR</strong></p>
                        </div>
                        <div class="col-lg-12 text-center">
                            <form action="{{ url('cart-buy-without-registration') }}" method="get">
                                @csrf
                                <input type="hidden" name="p_token"
                                    value="{{ encrypt('buy-without-registration') }}">
                                <button type="submit" class="btn btn-primary text-center"
                                    id="buy-without-registration" style="width: 80%">Buy Without Registration</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
