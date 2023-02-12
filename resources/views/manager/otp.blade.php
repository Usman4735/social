<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="{{env('APP_NAME')}}">
    <meta name="keywords" content="{{env('APP_NAME')}}">
    <meta name="author" content="WNS">
    <title>OTP Verification - {{env('APP_NAME')}}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend-assets/images/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend-assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend-assets/css/pages/authentication.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend-assets/css/style.css') }}">
    <!-- END: Custom CSS-->

</head>

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0">
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="{{ asset('backend-assets/images/illustration/two-steps-verification-illustration.svg')}}" alt="two steps verification" /></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- two steps verification v2-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <div class="text-center">
                                    <!-- Brand logo-->
                                <a href="{{url('/m1001m')}}">
                                    <img src="{{ asset('backend-assets/images/logo.png') }}" width="120" alt="logo">
                                </a>
                                <!-- /Brand logo-->
                                <br><br>
                                <h2 class="card-title fw-bolder mb-1">Two Step Verification &#x1F4AC;</h2>
                                {{-- <p class="card-text mb-75">We sent a verification code to your {{$password_reset_otp->auth_type}}. Enter the code from the {{$password_reset_otp->auth_type}} in the field below.</p> --}}
                                </div>
                                @if (Session::has('error'))
                                    <div class="alert alert-danger" role="alert">
                                        <div class="alert-body">{{ session('error') }}</div>
                                    </div>
                                @endif
                                @if (Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                        <div class="alert-body">{{ session('success') }}</div>
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="mt-2" action="{{url('m1001m/otp')}}/{{ encrypt($password_reset_otp->id) }}" method="POST" id="form">
                                    @csrf
                                    <h6>Type your 6 digit security code</h6>
                                    <div class="auth-input-wrapper d-flex align-items-center justify-content-between">
                                        <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" name="otp[]" type="text" maxlength="1" autofocus="" />
                                        <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" name="otp[]" type="text" maxlength="1" />
                                        <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" name="otp[]" type="text" maxlength="1" />
                                        <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" name="otp[]" type="text" maxlength="1" />
                                        <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" name="otp[]" type="text" maxlength="1" />
                                        <input class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" name="otp[]" type="text" maxlength="1" />
                                    </div>
                                    <button class="btn btn-primary w-100 form_btn" type="submit" tabindex="4">Verify</button>
                                </form>
                                {{-- <p class="text-center mt-2"><span>Didn&rsquo;t get the code?</span><a href="Javascript:void(0)"><span>&nbsp;Resend</span></a></a></p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->









    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('backend-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('backend-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('backend-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('backend-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('backend-assets/js/scripts/pages/auth-two-steps.js') }}"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
        $('#form').on('submit', function(e) {
            $('.form_btn').attr("disabled", "disabled");
        });
    </script>
</body>
<!-- END: Body-->

</html>
