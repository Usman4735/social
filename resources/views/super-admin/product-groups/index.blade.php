@extends('super-admin.layout.template')
@section('page_title', 'Product Groups')
@section('breadcrumb')
    <li class="breadcrumb-item active">Product Groups</li>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header row">
                    <div class="col-12 text-end">
                        <a href="{{ url('sa1991as/product-groups/create') }}" class="btn btn-primary btn-sm mr-2"
                            title="Add New Group"><i data-feather="plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    {{-- <table id="paginate_data_table" class="table data-table ">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Image</th>
                                <th>Product Group</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Total Products</th>
                                <th>Remaining Products</th>
                                <th>Admin</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                         <img src="{{ asset('/product-group-images') }}/{{ @$product->image }}" alt="Product Picture" class="img-thumbnail" height="80" width="80">
                                    </td>
                                    <td>{{ @$product->name }}</td>
                                    <td>{{ @$product->category->name }}</td>
                                    <td>{{ number_format(@$product->price, 2) }}</td>
                                    <td>{{ count(@$product->total_group_products) }}</td>
                                    <td>--</td>
                                    <td>{{ @$product->admin->first_name }}&nbsp;{{ @$product->admin->last_name }}</td>
                                    <td>
                                        <a href="{{ url('sa1991as/product-groups') }}/{{ encrypt($product->id) }}/edit"
                                            class="btn btn-primary btn-sm"><i data-feather="edit"></i></a>
                                        <form class="d-inline-block delete-btn"
                                            action="{{ url('sa1991as/product-groups') }}/{{ encrypt($product->id) }}"
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
                                <th>Image</th>
                                <th>Product Group</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Manager Salary</th>
                                <th>Products Added</th>
                                <th>Items Left</th>
                                <th>Manager</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                      <td>
                                         <img src="{{ asset('/product-group-images') }}/{{ @$product->image }}" alt="Product Picture" class="img-thumbnail" height="80" width="80">
                                    </td>
                                    <td>{{ @$product->name }}</td>
                                    <td>{{ @$product->category->name }}</td>
                                    <td>{{ number_format(@$product->price, 2) }}</td>
                                    <td>{{ number_format($product->manager_salary) }} ({{ $product->manager_salary_type }})</td>
                                    <td>{{ count($product->total_group_products) }}</td>
                                    <td>{{ count($product->total_group_products_left()) }}</td>
                                    <td>
                                        @if($product->manager_id!=null)
                                        {{ @$product->manager->first_name }}&nbsp;{{ @$product->manager->last_name }}</td>
                                        @else
                                        Not Assigned Yet
                                        @endif
                                    <td>
                                        <a href="{{ url('sa1991as/product-groups') }}/{{ encrypt($product->id) }}/edit"
                                            class="btn btn-primary btn-sm"><i data-feather="edit"></i></a>
                                        <form class="d-inline-block delete-btn"
                                            action="{{ url('sa1991as/product-groups') }}/{{ encrypt($product->id) }}"
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
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
