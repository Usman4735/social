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
                    <table id="paginate_data_table" class="table data-table ">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Date</th>
                                <th>Order number</th>
                                <th>Payment ID</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Operations</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{date('d-m-Y h:i A', strtotime(@$order->created_at)) }}</td>
                                    <td>{{ $order->order_no }}</td>
                                    <td>{{ $order->payment_id }}</td>
                                    <td>---</td>
                                    <td>---</td>
                                    <td>{{ $order->price }}</td>
                                    <td>---</td>
                                    <td>View</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
