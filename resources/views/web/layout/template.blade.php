<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('page_title') - {{ env('APP_NAME') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo/favicon.ico') }}">



    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css')}}">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css')}}">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css')}}">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css')}}">
    <!-- flexslider.css-->
    <link rel="stylesheet" href="{{ asset('assets/css/flexslider.css')}}">
    <!-- chosen.min.css-->
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css')}}">
    <!-- modernizr css -->
    {{-- <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script> --}}
</head>

<body>
    <!-- header-area-start -->
    <header>
        <!-- header-top-area-start -->
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="language-area">
                            <ul>
                                <li><img src="img/flag/1.jpg" alt="flag" /><a href="#">English<i
                                            class="fa fa-angle-down"></i></a>
                                    <div class="header-sub">
                                        <ul>
                                            <li><a href="#"><img src="img/flag/2.jpg" alt="flag" />france</a>
                                            </li>
                                            <li><a href="#"><img src="img/flag/3.jpg" alt="flag" />croatia</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="#">USD $<i class="fa fa-angle-down"></i></a>
                                    <div class="header-sub dolor">
                                        <ul>
                                            <li><a href="#">EUR €</a></li>
                                            <li><a href="#">USD $</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="account-area text-right">
                            <ul>
                                @if (Session::has('online_customer'))
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="{{ url('logout') }}">Logout</a></li>
                                @else
                                    <li><a href="{{ url('login') }}">Sign In</a></li>
                                    <li><a href="{{ url('register') }}">Sign Up</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header-top-area-end -->
        <!-- main-menu-area-start -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <div class="logo-area text-center logo-xs-mrg">
                    <a href="{{ url('/') }}"><img src="{{ asset('images/front-logo.png') }}" alt="logo"
                            width="140" /></a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">Catalog </a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">Order Verification</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="{{ url('how-to-buy') }}">How to Buy</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">Reviews</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="{{ url('news') }}">News</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">Support</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="badge badge-pill badge-danger">5</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- main-menu-area-end -->
    </header>
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            {{-- <li><a href="#">Home</a></li> --}}
                            {{-- <li><a href="#" class="active">News</a></li> --}}
                            @yield('breadcrum')
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('content')


    <footer>
        <!-- footer-mid-start -->
        <div class="footer-mid ptb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="single-footer br-2 xs-mb">
                                    <div class="footer-title mb-20">
                                        <h3>Products</h3>
                                    </div>
                                    <div class="footer-mid-menu">
                                        <ul>
                                            <li><a href="about.html">About us</a></li>
                                            <li><a href="#">Prices drop </a></li>
                                            <li><a href="#">New products</a></li>
                                            <li><a href="#">Best sales</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="single-footer br-2 xs-mb">
                                    <div class="footer-title mb-20">
                                        <h3>Our company</h3>
                                    </div>
                                    <div class="footer-mid-menu">
                                        <ul>
                                            <li><a href="contact.html">Contact us</a></li>
                                            <li><a href="#">Sitemap</a></li>
                                            <li><a href="#">Stores</a></li>
                                            <li><a href="register.html">My account </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="single-footer br-2 xs-mb">
                                    <div class="footer-title mb-20">
                                        <h3>Your account</h3>
                                    </div>
                                    <div class="footer-mid-menu">
                                        <ul>
                                            <li><a href="contact.html">Addresses</a></li>
                                            <li><a href="#">Credit slips </a></li>
                                            <li><a href="#"> Orders</a></li>
                                            <li><a href="#">Personal info</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="single-footer mrg-sm">
                            <div class="footer-title mb-20">
                                <h3>STORE INFORMATION</h3>
                            </div>
                            <div class="footer-contact">
                                <p class="adress">
                                    <span>My Company</span>
                                    Your address goes here.
                                </p>
                                <p><span>Call us now:</span> 0123456789</p>
                                <p><span>Email:</span> demo@example.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-mid-end -->
        <!-- footer-bottom-start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row bt-2">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="copy-right-area">
                            <p>&copy; 2021 <strong> IMRAN </strong> Mede with ❤️ by <a href=""
                                    target="_blank"><strong>Custom Theme</strong></a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="payment-img text-right">
                            <a href="#"><img src="img/1.png" alt="payment" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom-end -->
    </footer>



    <!-- all js here -->
    <!-- jquery latest version -->
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- popper js -->
    <script src="{{ asset('assets/js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- owl.carousel js -->
    <script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
    <!-- meanmenu js -->
    <script src="{{ asset('assets/js/jquery.meanmenu.js')}}"></script>
    <!-- wow js -->
    <script src="{{ asset('assets/js/wow.min.js')}}"></script>
    <!-- jquery.parallax-1.1.3.js -->
    <script src="{{ asset('assets/js/jquery.parallax-1.1.3.js')}}"></script>
    <!-- jquery.countdown.min.js -->
    <script src="{{ asset('assets/js/jquery.countdown.min.js')}}"></script>
    <!-- jquery.flexslider.js -->
    <script src="{{ asset('assets/js/jquery.flexslider.js')}}"></script>
    <!-- chosen.jquery.min.js -->
    <script src="{{ asset('assets/js/chosen.jquery.min.js')}}"></script>
    <!-- jquery.counterup.min.js -->
    <script src="{{ asset('assets/js/jquery.counterup.min.js')}}"></script>
    <!-- waypoints.min.js -->
    <script src="{{ asset('assets/js/waypoints.min.js')}}"></script>
    <!-- plugins js -->
    <script src="{{ asset('assets/js/plugins.js')}}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/js/main.js')}}"></script>
    @yield('scripts')
</body>

</html>
