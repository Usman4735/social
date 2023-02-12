@extends('admin.layout.template')
@section('page_title', 'Product Category')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/a1aa') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Category</li>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header row">
                    <div class="col-12 text-end">
                        <a href="{{ url('products/category/add') }}" class="btn btn-primary btn-sm mr-2"
                            title="Add Category"><i data-feather="plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="paginate_data_table" class="table data-table ">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Name</th>
                                <th>Parent Category</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                {{-- @php
                                    $main_cat = $category->get_main_product_category();
                                    $sub_cat = $category->get_sub_category();
                                @endphp --}}
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    {{-- <td>{{ $category->parent_category_id != null ? $main_cat->name : '' }}</td> --}}
                                    {{-- <td>{{ $category->sub_category_id != null ? $sub_cat->name : '' }}</td> --}}
                                    <td></td>
                                    <td>
                                        <a href="{{ url('products/category/update') }}/{{ encrypt($category->id) }}"
                                            class="btn btn-primary btn-sm"><i
                                                data-feather="edit"></i></a>
                                        <form class="d-inline-block delete-btn"
                                            action="{{ url('products/category/delete') }}/{{ encrypt($category->id) }}"
                                            method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm deleteAlert"><i
                                                data-feather="trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- Pagination --}}
                    {{-- <div class="d-flex justify-content-center mt-3" id="pagination">
                        {{ $categories->appends(request()->query())->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
