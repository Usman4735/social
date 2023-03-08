@extends('web.layout.template')
@section('page_title', 'Order Verification')
@section('content')
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('order-verificationsٖ') }}" class="active">Order Verification</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- entry-header-area-start -->
    <div class="entry-header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="entry-header-title">
                        <h2>My Account</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- entry-header-area-end -->
    <!-- my account wrapper start -->
    <div class="my-account-wrapper mb-70">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <!-- My Account Tab Menu Start -->
                            <div class="row">
                                <x-customer-profile></x-customer-profile>
                                <!-- My Account Tab Menu End -->

                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">

                                        <!-- Single Tab Content Start -->
                                        <div class="" id="account-info" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h5>Order Verification</h5>
                                                <div class="account-details-form">
                                                    <x-flash-message></x-flash-message>

                                                    <form action="{{ url('/order-verification') }}" method="get">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="single-input-item">
                                                                    <label for="order_id">Order ID<span
                                                                            class="text-primary">*</span></label>
                                                                    <input type="text" name="order_id"
                                                                        class="form-control form-control-sm" required
                                                                        value="{{ Request::has('order_id') ? Request::input('order_id') : ' ' }}"
                                                                        placeholder="Enter Your Order Number" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="single-input-item">
                                                                    <label for="payment_id">Payment ID <span
                                                                            class="text-primary">*</span></label>
                                                                    <input type="text" name="payment_id"
                                                                        class="form-control form-control-sm" required
                                                                        value="{{ Request::has('payment_id') ? Request::input('payment_id') : ' ' }}"
                                                                        placeholder="Enter Your Payment ID" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="single-input-item">
                                                            <button type="submit"
                                                                class="btn btn-sqr btn-primary rounded px-5">Check
                                                                Order</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div> <!-- Single Tab Content End -->
                                    </div>
                                </div> <!-- My Account Tab Content End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- my account wrapper end -->
@endsection
