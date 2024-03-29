@extends('manager.layout.template')
@section('page_title', 'Product Goods')
@section('breadcrumb')
    <li class="breadcrumb-item active">Product Goods</li>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header row">
                    <div class="col-12 text-end">
                        <a href="{{ url('m1001m/product-goods/create') }}" class="btn btn-primary btn-sm mr-2"
                            title="Add New Product In Group"><i data-feather="plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="paginate_data_table" class="table data-table ">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Date Added</th>
                                <th>Product Name</th>
                                <th>Product Groups</th>
                                <th>Activity</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product_goods as $product)
                                <tr class="{{ $product->status == 2 ? 'alert alert-danger' : ' ' }}">

                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ date('Y-m-d', strtotime($product->created_at)) }}</td>
                                    <td>{{ @$product->name }}</td>
                                    <td>{{ @$product->group->name }}</td>
                                    <td>{{ ucwords(str_replace('_', ' ', $product->product_good_status->name)) }}</td>
                                    <td>
                                        @if ($product->status==1 || $product->status==2)
                                            <a href="{{ url('m1001m/product-goods') }}/{{ encrypt($product->id) }}/edit"
                                                class="btn btn-primary btn-sm"><i data-feather="edit"></i></a>
                                            <form class="d-inline-block delete-btn"
                                                action="{{ url('m1001m/product-goods') }}/{{ encrypt($product->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm deleteAlert"><i
                                                        data-feather="trash"></i></button>
                                            </form>
                                        @else
                                            Restricted
                                        @endif
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
