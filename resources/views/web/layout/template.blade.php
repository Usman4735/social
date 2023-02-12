<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- <title>{{ env('APP_NAME') }}</title> --}}
    <title>@yield('page_title') - {{ env('APP_NAME') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pretty-checkbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fixedHeader.bootstrap4.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/cropper.css') }}" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" /> --}}

</head>

<body>
<!-- Header Starts Here -->
<header>
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-12 text-right">
                    <p>
                        @if (Session::has('online_customer'))
                            <span class="mr-3"><a href="javascript:void(0)">Welcome,
                                        {{ session('online_customer')->full_name }}</a></span>
                            <a href="{{ url('logout') }}">
                                <span class="mr-3">Logout </span></a>
                        @else
                            <a href="{{ url('login') }}">
                                <i class="fa fa-lock mr-2"></i>
                                <span class="mr-3">Login In</span></a>
                            <a href="{{ url('register') }}"><i class="fa fa-user mr-2"></i>
                                <span class="mr-3">Register </span></a>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Ends Here -->


<nav class="navbar navbar-expand-lg bg-light shadow navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><img
                src="{{ asset('images/logo.png') }}" alt="logo" style="width: 80px" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Catalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Order Verification</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">How To Buy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Support</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">
                        <div class="cart-left">
                            <i class="fas fa-shopping-bag"></i>
                            <span
                                class='badge badge-secondary'>{{ Session::has('cartinfo') ? count(session('cartinfo')) : 0 }}</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@yield('content')
<div class="container text-center mt-5">
    <h3 class="text-center">Support</h3>
    <p>If something went wrong, if you have a problem with your order or have a question about your order, please contact support:</p>
    <a href="{{ url('/') }}">Contact Support</a>

</div>
<footer>
    <div class="container p-5">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                {{-- <h5 class="footerMenuHeading mb-4">Policies</h5> --}}
                <ul class="footerUl">
                     <a class="navbar-brand" href="{{ url('/') }}"><img
                src="{{ asset('images/logo.png') }}" alt="logo" style="width: 80px" /></a>
                    {{-- <li><a href="{{ url('privacy-policy') }}" target="_blank">Privacy Policy</a></li>
                    <li><a href="{{ url('terms-and-conditions') }}" target="_blank">Terms & Conditions</a></li>
                    <li><a href="{{ url('refund-policy') }}" target="_blank">Refunds & Exchange Policy</a></li> --}}
                </ul>
            </div>

            <div class="col-sm-12 col-md-2 col-lg-2">
                {{-- <h5 class="footerMenuHeading mb-4">Quick Links </h5> --}}
                <ul class="footerUl">
                    <li><a href="{{ url('/') }}" target="_blank">whatsapp</a></li>
                    <li><a href="{{ url('/') }}" target="_blank">Telegram</a></li>
                    <li><a href="{{ url('/') }}" target="_blank">Jabbar</a></li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-2">
                {{-- <h5 class="footerMenuHeading mb-4">Signup</h5> --}}
                <ul class="footerUl">
                    <li><a href="#" target="_blank">Viber</a></li>
                    <li><a href="#" target="_blank">Skype</a></li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-4">
                <div class="footer_subscribe">
                    <h5 class="footerMenuHeading mb-4">Subscribe to our awesome emails</h5>
                    <small style="font-size: 14px">Get our latest offers and news straight in your
                        inbox</small><br /><br />
                    <form action="{{ url('subscribe') }}" method="post" id="subscribe_form">
                        @csrf
                        <input type="email" name="email" id="subscribe_email" placeholder="ENTER YOUR EMAIL"
                               required />
                        <div class="text-center">
                            <div id="loader" style="display:none; "
                                 class="spinner-grow text-danger  mt-2 mb-2 text-center"></div>
                        </div>
                        <div>
                            <button type="submit" id="subscribe"
                                    class="btn custom-btn btn-block mt-2 subscribe_form_btn">Subscribe</button>
                        </div>
                    </form>
                    <br>
                    <span>
                            <div class="container-fluid mb-3 p-1  bg-light"
                                 style="border: 1px solid #ed3239;display: none;" id="success">
                                <div class="row">
                                    <div class="col-lg-12 my-auto custom-text">
                                        Subscribed Successfuly! Please Check your Email.
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid mb-3 p-1  bg-light"
                                 style="border: 1px solid #ed3239;display: none;" id="danger">
                                <div class="row">
                                    <div class="col-lg-12 my-auto custom-text">
                                        Sorry! You have already Subscribed
                                    </div>
                                </div>
                            </div>
                        </span>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="container pl-5">
        <p class="text-left m-0">
            Copyright &copy; {{ date('Y') }} - {{env('APP_NAME')}}
        </p>
        <br />
    </div>
    <button id="backToTop" class="btn slide_down"><i class="fas fa-arrow-up"></i></button>
</footer>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/dataTables.fixedHeader.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/dataTables.responsive.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
{{-- <script src="{{ asset('assets/js/firebase.js') }}"></script> --}}
<script src="{{ asset('assets/js/cropper.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
@yield('scripts')
</body>

</html>
