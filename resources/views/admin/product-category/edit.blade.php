@extends('layout.template')
@section('page_title', 'Edit Category')
@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="{{ url('/products/category') }}">Category</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('products/category/update') }}/{{ encrypt($category->id) }}" method="post"
                        enctype="multipart/form-data" id="form">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="row">
                            <div class="col-12">
                                <label class="col-form-label"> Name </label>
                                <span class="text-primary">*</span>
                                <input type="text" name="name" value="{{ $category->name }}" class="form-control"
                                    required>
                            </div>
                            <div class="col-12">
                                <label class="col-form-label"> Parent Category </label>
                                <select name="parent_category_id" id="" class="form-control select-2">
                                    <option value="">None</option>
                                    @php
                                        if ($category->sub_category_id == null && $category->parent_category_id == null) {
                                            $cat1 = 0;
                                        } elseif ($category->sub_category_id == null) {
                                            $cat1 = $category->parent_category_id;
                                        } else {
                                            $cat1 = $category->sub_category_id;
                                        }
                                    @endphp
                                    @if (count($parent_categories) > 0)
                                        <optgroup label="Parent Category">
                                            @foreach ($parent_categories as $parent_category)
                                                @if ($parent_category->id != $category->id)
                                                    <option value="{{ $parent_category->id }}"
                                                        {{ $parent_category->id == $cat1 ? 'selected' : '' }}>
                                                        {{ $parent_category->name }}</option>
                                                @endif
                                            @endforeach
                                        </optgroup>
                                    @endif
                                    @if (count($sub_categories) > 0)
                                        <optgroup label="Sub Category">
                                            @foreach ($sub_categories as $sub_category)
                                                @if ($sub_category->id != $category->id)
                                                    <option value="{{ $sub_category->id }}"
                                                        {{ $sub_category->id == $cat1 ? 'selected' : '' }}>
                                                        {{ $sub_category->name }}</option>
                                                @endif
                                            @endforeach
                                        </optgroup>
                                    @endif
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="col-form-label"> Default Duty Charges (%) </label>
                                <span class="text-primary">*</span>
                                <input type="number" step="any" name="default_charges" class="form-control" required
                                    value="{{ $category->default_charges }}" autocomplete="false">
                            </div>
                            <div class="col-12">
                                <label class="col-form-label"> Category Image</label><br>
                                <input type="file" name="image" class="form-control" id="customFile">
                                @if ($category->image != null)
                                    <img src="{{ asset('storage/product-categories') }}/{{ $category->image }}"
                                        width="100px" height="100px" class="mt-1">
                                @endif
                            </div>
                            <div class="col-12 ">
                                <label class="col-form-label"> Description </label>
                                <textarea name="description" class="form-control">{{ $category->description }}</textarea>
                            </div>
                            <div class="col-12 mt-2">
                                <button class="btn btn-primary form_btn" title="Update Category">Update</button>
                            </div>
                        </div>
                    </form>
                    <h4 class="card-title mt-2">Category HS Code</h4>

                    <form action="{{ url('products/category/hs-code/add') }}/{{ encrypt($category->id) }}" method="post"
                        enctype="multipart/form-data" id="cateogry_hs_code_form">
                        @csrf
                        <div class="row">
                            <div class="col-3">
                                <label class="col-form-label"> Country </label>
                                <span class="text-primary">*</span>
                                <select class="form-control select-2" name="country_id">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <label class="col-form-label"> HS Code </label>
                                <span class="text-primary">*</span>
                                <input type="text" name="hs_code" class="form-control" required>
                            </div>
                            <div class="col-3">
                                <label class="col-form-label"> Duty Charges </label>
                                <span class="text-primary">*</span>
                                <input type="number" step="any" name="duty_charges" class="form-control" required>
                            </div>
                            <div class="col-3">
                                <br>
                                <button
                                    class="mt-1 buttons btn btn-primary add_category_hscode btn-block form-control category_hs_code_btn">
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-bordered table-striped table-sm table-hover">
                        <thead>
                            <tr>
                                <th>Country</th>
                                <th>HS Code</th>
                                <th>Duty Charges (%)</th>
                                <th>Opration</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($category_hscodes as $category_hscode)
                                <tr>
                                    <td>{{ $category_hscode->country->name }}</td>
                                    <td>{{ $category_hscode->hs_code }}</td>
                                    <td>{{ number_format($category_hscode->duty_charges, 2) }} </td>
                                    <td>
                                        <button type="button" title="Edit Category HS Code"
                                            url="{{ url('products/category/hs-code/update') }}/{{ encrypt($category_hscode->id) }}"
                                            class="btn btn-primary btn-sm modal_popup" size="modal-lg">
                                            <i data-feather="edit"></i>
                                        </button>
                                        <form class="d-inline-block delete-btn"
                                            action="{{ url('products/category/hs-code/delete') }}/{{ encrypt($category_hscode->id) }}"
                                            method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm"> <i
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
@section('custom_scripts')
    <script>
        $('#cateogry_hs_code_form').on('submit', function(e) {
            $('.category_hs_code_btn').attr("disabled", "disabled");
        });
    </script>
@endsection
@endsection
@include('templates.modal')
