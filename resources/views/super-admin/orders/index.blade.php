@extends('super-admin.layout.template')
@section('page_title', 'Orders')
@section('breadcrumb')
    <li class="breadcrumb-item active">Orders</li>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table class="table custom-data-table white-space">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Date</th>
                                <th>Order number</th>
                                <th>Payment ID</th>
                                <th>Payment Method</th>
                                {{-- <th>Category</th>
                                <th>Product Group</th> --}}
                                <th>Product</th>
                                <th>Price</th>
                                <th>Salary</th>
                                <th>Status</th>
                                <th>Manager</th>
                                <th>View</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ date('d-m-Y h:i A', strtotime(@$order->created_at)) }}</td>
                                    <td>{{ $order->order_no }}</td>
                                    <td>{{ $order->payment_id }}</td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td>
                                        @if (count($order->order_products) > 0)
                                            @foreach ($order->order_products as $product_goods)
                                                <li>
                                                    {{ @$product_goods->product_good->name }}
                                                </li>
                                            @endforeach
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $order->price }}</td>
                                    <td>salary</td>
                                    <td>---</td>
                                    <td>Manager</td>
                                    <td>
                                         <a href="{{ url('sa1991as/orders/view') }}/{{ encrypt($order->id) }}" class="btn btn-primary btn-sm"><i data-feather="eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
