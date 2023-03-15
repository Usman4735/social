@extends('super-admin.layout.template')
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
                        <a href="{{ url('sa1991as/product-goods/create') }}" class="btn btn-primary btn-sm mr-2"
                            title="Add New Product In Group"><i data-feather="plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    {{-- <table id="paginate_data_table" class="table data-table ">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Product Name</th>
                                <th>Product Groups</th>
                                <th>Status</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product_goods as $product)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{@$product->group->name}}</td>
                                    <td>{{ ucwords(str_replace('_', ' ', $product->status)) }}</td>
                                    <td>
                                        <a href="{{ url('sa1991as/product-goods') }}/{{ encrypt($product->id) }}/edit"
                                            class="btn btn-primary btn-sm"><i data-feather="edit"></i></a>
                                        <form class="d-inline-block delete-btn"
                                            action="{{ url('sa1991as/product-goods') }}/{{ encrypt($product->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm deleteAlert"><i
                                                    data-feather="trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                    <table id="paginate_data_table" class="table data-table ">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Date Added</th>
                                <th>Product Name</th>
                                <th>Product Groups</th>
                                <th>Admin/Manager</th>
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
                                    <td>
                                        Admin: {{ @$product->admin->first_name }}&nbsp;{{ @$product->admin->last_name }}<br>
                                        Manager:
                                        {{ @$product->manager->first_name }}&nbsp;{{ @$product->manager->last_name }}
                                    </td>
                                    <td>{{ ucwords(str_replace('_', ' ', $product->product_good_status->name)) }}</td>

                                    <td>
                                        @if ($product->status == 2 || $product->status == 3 || $product->status == 4)
                                            <a href="{{ url('sa1991as/product-goods') }}/{{ encrypt($product->id) }}/edit"
                                                class="btn btn-primary btn-sm"><i data-feather="edit"></i></a>
                                            <form class="d-inline-block delete-btn"
                                                action="{{ url('sa1991as/product-goods') }}/{{ encrypt($product->id) }}"
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
