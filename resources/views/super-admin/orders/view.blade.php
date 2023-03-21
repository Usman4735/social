@extends('super-admin.layout.template')
@section('page_title', 'Orders')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('sa1991as/orders') }}">Orders</a></li>
    <li class="breadcrumb-item active">View Order Details</li>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="card-title">Customer Information</div>
                        <div class="col-lg-4">
                            <label class="fw-bold">First Name</label>
                            <p>{{ $order->order_customer->first_name != null ? $order->order_customer->first_name : 'N/A' }}
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <label class="fw-bold">Last Name</label>
                            <p>{{ $order->order_customer->last_name != null ? $order->order_customer->last_name : 'N/A' }}
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <label class="fw-bold">Email</label>
                            <p>{{ $order->order_customer->email != null ? $order->order_customer->email : 'N/A' }}</p>
                        </div>
                        <div class="col-lg-4">
                            <label class="fw-bold">Mobile</label>
                            <p>{{ $order->order_customer->mobile != null ? $order->order_customer->mobile : 'N/A' }}</p>
                        </div>
                        <div class="col-lg-4">
                            <label class="fw-bold">Phone</label>
                            <p>{{ $order->order_customer->phone != null ? $order->order_customer->phone : 'N/A' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card-title mt-1">Order Information</div>
                        <div class="col-lg-4">
                            <label class="fw-bold">Order Number</label>
                            <p class="text-success">{{ $order->order_no != null ? $order->order_no : 'N/A' }}
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <label class="fw-bold">Payment ID</label>
                            <p>{{ $order->payment_id != null ? $order->payment_id : 'N/A' }}
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <label class="fw-bold">Payment Method</label>
                            <p>{{ $order->payment_method != null ? ucwords($order->payment_method) : 'N/A' }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card-title mt-1">Product Details</div>
                        <table class="table only-table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sub_total = 0;
                                    $total_products = 0;
                                @endphp

                                @foreach ($order->order_products as $product_goods)
                                    <tr>

                                        <td>coming soon</td>
                                        <td>
                                            {{ @$product_goods->product_good->name }}
                                        </td>
                                        <td>
                                            {{ @$product_goods->price }}
                                        </td>
                                        <td>
                                            {{ @$product_goods->qty }}

                                        </td>
                                        <td>
                                            {{ $product_goods->qty * $product_goods->price }}
                                        </td>
                                    </tr>
                                    @php
                                        $sub_total += $product_goods->qty * $product_goods->price;
                                    @endphp
                                @endforeach
                                <tr>
                                    <th colspan="3"></th>
                                    <th><strong>Total</strong></th>
                                    <td><strong>{{ $sub_total }}</strong></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="card-title mt-1">Your Actions</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
