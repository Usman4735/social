<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
{{-- BEGIN: Head --}}

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="{{ env('APP_NAME') }}">
    <meta name="keywords" content="{{ env('APP_NAME') }}">
    <meta name="author" content="Cre8tivebot">
    <title>@yield('page_title') - {{ env('APP_NAME') }}</title>
    @include('super-admin.layout.header-cdns')
</head>
{{-- END: Head --}}

{{-- BEGIN: Body --}}

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    {{-- BEGIN: Header --}}
    @include('super-admin.layout.header')
    {{-- END: Header --}}


    {{-- BEGIN: Main Menu --}}
    @include('super-admin.layout.sidebar')
    {{-- END: Main Menu --}}

    {{-- BEGIN: Content --}}
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                {{-- BEGIN: Breadcrumbs --}}
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">@yield('page_title')</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('sa1991as') }}"><i class="fa fa-home"></i></a>
                                    </li>
                                    @yield('breadcrumb')
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- END: Breadcrumbs --}}
            </div>
            <div class="content-body">

                {{-- Flash Message --}}
                <x-flash-message></x-flash-message>

                @yield('content')
            </div>
        </div>
    </div>
    {{-- END: Content --}}

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    {{-- BEGIN: Footer --}}
    @include('super-admin.layout.footer')
    {{-- END: Footer --}}

    {{-- Footer CDNs --}}
    @include('super-admin.layout.footer-cdns')
</body>
{{-- END: Body --}}

</html>
