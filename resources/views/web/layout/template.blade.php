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
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <!-- flexslider.css-->
    <link rel="stylesheet" href="{{ asset('assets/css/flexslider.css') }}">
    <!-- chosen.min.css-->
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- modernizr css -->
    {{-- <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script> --}}
</head>

<body>
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
                                    <li><a href="{{ url('/account') }}" title="My Account">Welcome,
                                            {{ session('online_customer')->first_name }}</a></li>
                                    <li><a href="{{ url('/logout') }}">Logout</a></li>
                                @endif
                                @if (!Session::has('online_customer'))
                                    <li><a href="{{ url('/login') }}">Sign in</a></li>
                                    <li><a href="{{ url('/register') }}">Sign Up</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header-top-area-end -->
        <!-- header-mid-area-start -->
        <div class="header-mid-area ptb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-5 col-12">
                        <div class="header-search">
                            <form action="#">
                                <input type="text" placeholder="Search entire store here..." />
                                <a href="#"><i class="fa fa-search"></i></a>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-12">
                        <div class="logo-area text-center logo-xs-mrg">
                            <a href="{{ url('/') }}"><img src="{{ asset('images/front-logo.png') }}"
                                    alt="logo" /></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12">
                        <div class="my-cart">
                            <ul>
                                <li><a href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i>My Cart</a>
                                    <span>
                                        @if (Session::get('cartinfo') != null)
                                            {{ count(Session::get('cartinfo')) > 0 ? count(Session::get('cartinfo')) : '0' }}
                                        @else
                                            0ٖ
                                        @endif

                                    </span>
                                    <div class="mini-cart-sub">
                                        @if (Session::get('cartinfo') != null)
                                            <div class="cart-product">

                                                @php
                                                    $sub_total = 0;

                                                @endphp
                                                @foreach (Session::get('cartinfo') as $item)
                                                    <div class="single-cart">
                                                        <div class="cart-img">
                                                            @if ($item['product']->image != null)
                                                                <img src="{{ asset('storage/product-group-images') }}/{{ $item['product']->image }}"
                                                                    height="100px" alt="man"
                                                                    style="max-height: 5rem !important ; width: auto" />
                                                            @else
                                                                <img src="{{ asset('assets/images/no-image.png') }}"
                                                                    alt="{{ $item['product']->seo_title }}"
                                                                    class="primary"
                                                                    style="max-height: 5rem !important ; width: auto">
                                                            @endif
                                                            {{-- <a href="#"><img src="img/product/1.jpg" alt="book" /></a> --}}
                                                        </div>
                                                        <div class="cart-info">
                                                            <h5><a href="#">{{ $item['product']->name }}</a></h5>
                                                            <p>{{ $item['qty'] }} x ${{ $item['product']->price }}
                                                            </p>
                                                        </div>
                                                        <div class="cart-icon">
                                                            <a
                                                                href="{{ url('remove-from-cart') }}/{{ $item['product']->id }}"><i
                                                                    class="fa fa-remove"></i></a>
                                                        </div>
                                                    </div>
                                                    @php
                                                        $sub_total += $item['qty'] * $item['product']->price;

                                                    @endphp
                                                @endforeach



                                            </div>
                                            <div class="cart-totals">
                                                <h5>Total <span>${{ $sub_total }}</span></h5>
                                            </div>
                                            <div class="cart-bottom">
                                                <div class="row d-flex">
                                                    <div class="col-lg-6">
                                                        <a class="justify-content-start"
                                                            href="{{ url('/cart') }}">view
                                                            cart</a>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <a class="justify-content-end btn btn-sm btn-primary payment_modal"
                                                            url="payment-modal" href="javascript:void(0)">Check
                                                            out</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            Cart is empty
                                        @endif
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header-mid-area-end -->
        <!-- main-menu-area-start -->

        <div class="main-menu-area d-md-none d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="menu-area">
                            <nav>
                                <ul>

                                    <li class="active"><a href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li><a href="product-details.html">Catalog<i class="fa fa-angle-down"></i></a>
                                        <div class="mega-menu mega-menu-2">
                                            <span>
                                                <a href="#">Vkontakte</a>
                                                <a href="shop.html">Classmates</a>
                                                <a href="shop.html">My World @Mail.ru</a>
                                            </span>
                                            <span>
                                                <a href="#">Whatsapp</a>
                                                <a href="shop.html">Telegram</a>
                                                <a href="shop.html">Jabber</a>
                                            </span>
                                            <span>
                                                <a href="#">Viber</a>
                                                <a href="shop.html">Skype</a>
                                                <a href="shop.html">ICQ</a>
                                            </span>
                                        </div>
                                    </li>
                                    <li><a href="{{ url('/order-verification') }}">Order Verficaion</a></li>
                                    <li><a href="{{ url('/how-to-buy') }}">How To buy</a></li>
                                    <li><a href="#">Review</a></li>
                                    <li><a href="{{ url('/news') }}">News</a></li>
                                    <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>


                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')

    <x-payment-modal></x-payment-modal>


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
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- owl.carousel js -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- meanmenu js -->
    <script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>
    <!-- wow js -->
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <!-- jquery.parallax-1.1.3.js -->
    <script src="{{ asset('assets/js/jquery.parallax-1.1.3.js') }}"></script>
    <!-- jquery.countdown.min.js -->
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <!-- jquery.flexslider.js -->
    <script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
    <!-- chosen.jquery.min.js -->
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
    <!-- jquery.counterup.min.js -->
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <!-- waypoints.min.js -->
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <!-- plugins js -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".payment_modal").on("click", function() {
            let url = $(this).attr("url");
            $(this).prop('disabled', true);
            $.ajax({
                url: "{{ url('/') }}/" + url,
                method: "GET",
                success: function(data) {

                    $("#paymentModal .modal-body").html(data);
                    $('.payment_modal').removeAttr('disabled');
                    $("#paymentModal").modal("show");
                }
            });
        });
    </script>
    @yield('scripts')
</body>

</html>
