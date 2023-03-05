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
                            <li><a href="{{ url('/order-verification') }}" class="active">Order Verification</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="row">

                <div class="col-lg-9 col-md-12 col-12 order-lg-1 order-1">
                    <div class="user-login-area">
                        <div class="container mb-5">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="login-title mb-30">
                                        <h2>Order Verification</h2>
                                        <p>You can easily verifiy and check order status</p>
                                    </div>
                                </div>
                                <div class=" col-lg-12 col-md-12 col-12">
                                    <form action="{{ url('login') }}" method="post">
                                        @csrf
                                        <div class="login-form">
                                            <x-flash-message></x-flash-message>
                                            <div class="single-login">
                                                <label>Order ID<span>*</span></label>
                                                <input type="text" required name="order_id"
                                                    placeholder="Please Enter Order ID" value="{{ old('order_id') }}" autocomplete="false" autofocus>
                                            </div>
                                            <div class="single-login">
                                                <label>Payment ID <span>*</span></label>
                                                <input type="text" required name="payment_id"
                                                    placeholder="Please Enter Your Payment ID" value="{{ old('payment_id') }}"
                                                    autocomplete="false">
                                            </div>
                                            <div class="single-login">
                                                <button type="submit" class="btn btn-primary">Check</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-12 order-lg-2 order-2">
                    <div class="shop-left">
                        <div class="left-title mb-20">
                            <h4>Similar Products</h4>
                        </div>
                        @foreach ($similar_products as $products)
                            <div class="single-most-product bd mb-18">
                                <div class="most-product-img">
                                    <a href="#"><img
                                            src="{{ asset('storage/product-group-images') }}/{{ $products->image }}"
                                            alt="book" /></a>
                                </div>
                                <div class="most-product-content">
                                    <div class="product-rating">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h4><a href="#">{{ $products->name }}</a></h4>
                                    <div class="product-price">
                                        <ul>
                                            <li>{{ $products->price }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

@endsection
