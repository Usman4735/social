@extends('manager.layout.template')
@section('page_title', 'Product Groups')
@section('breadcrumb')
    <li class="breadcrumb-item active">Product Groups</li>
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
                                <th>Image</th>
                                <th>Product Group</th>
                                <th>Salary</th>
                                <th>Products Added</th>
                                <th>Items Left</th>
                                {{-- <th>Operations</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                       <td>
                                         <img src="{{ asset('/product-group-images') }}/{{ @$product->image }}" alt="Product Picture" class="img-thumbnail" height="80" width="80">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ number_format($product->manager_salary) }} ({{ $product->manager_salary_type }})</td>
                                    {{-- <td>{{ @session('online_manager')->manager_permission($product->id)->see_price == 1 ? number_format($product->price, 2) : 'N/A'}}</td> --}}
                                    <td>{{ count($product->total_group_products) }}</td>
                                    <td>{{ count($product->total_group_products_left()) }}</td>
                                    {{-- <td>
                                        <a href="{{ url('m1001m/product-groups') }}/{{ encrypt($product->id) }}/show" class="btn btn-primary btn-sm"><i data-feather="eye"></i></a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
