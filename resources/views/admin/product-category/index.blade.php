@extends('admin.layout.template')
@section('page_title', 'Product Categories')
@section('breadcrumb')
    <li class="breadcrumb-item active">Product Categories</li>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header row">
                    <div class="col-12 text-end">
                        <a href="{{ url('a1aa/product-categories/create') }}" class="btn btn-primary btn-sm mr-2"
                            title="Add Category"><i data-feather="plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="paginate_data_table" class="table data-table ">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Parent Category</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                      <td>
                                         <img src="{{ asset('/category-pictures') }}/{{ $category->picture }}" alt="Product Picture" class="img-thumbnail" height="80" width="80">
                                    </td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->parent_category != null ? @$category->parent_category()->name : '' }}
                                    </td>
                                    <td>
                                        @if ($category->added_by == session('online_admin')->id)
                                            <a href="{{ url('a1aa/product-categories') }}/{{ encrypt($category->id) }}/edit"
                                                class="btn btn-primary btn-sm"><i data-feather="edit"></i></a>
                                        @else
                                        N/A
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
