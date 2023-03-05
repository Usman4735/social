@extends('web.layout.template')
@section('page_title', 'My Account')
@section('breadcrum')
    <li><a href="{{ url('/account') }}">My Account</a></li>
    <li><a href="#" class="active">Order History</a></li>
@endsection
@section('content')
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
                                        <div class="" id="orders" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h5>Orders</h5>
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Total</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>Aug 22, 2018</td>
                                                                <td>Pending</td>
                                                                <td>$3000</td>
                                                                <td><a href="cart.html" class="btn btn-sqr">View</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>July 22, 2018</td>
                                                                <td>Approved</td>
                                                                <td>$200</td>
                                                                <td><a href="cart.html" class="btn btn-sqr">View</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>June 12, 2017</td>
                                                                <td>On Hold</td>
                                                                <td>$990</td>
                                                                <td><a href="cart.html" class="btn btn-sqr">View</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
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
