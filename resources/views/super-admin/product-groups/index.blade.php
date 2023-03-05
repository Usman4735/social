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
                            title="Add Category"><i data-feather="plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="paginate_data_table" class="table data-table ">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Image</th>
                                <th>Product Group</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                         <img src="{{ asset('storage/product-group-images') }}/{{ $product->image }}" alt="Product Picture" class="img-thumbnail" height="80" width="80">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ number_format($product->price, 2) }}</td>
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
