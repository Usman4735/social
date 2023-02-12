@extends('layout.template')
@section('page_title', 'Add Category')
@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="{{ url('/products/category') }}">Category</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Category</li>
@endsection
@section('content')

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('products/category/add') }}" method="post" enctype="multipart/form-data" id="form">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label class="col-form-label"> Name </label>
                                <span class="text-primary">*</span>
                                <input type="text" name="name" class="form-control" required
                                    value="{{ old('name') }}" autocomplete="false">
                            </div>
                            <div class="col-12">
                                <label class="col-form-label"> Parent Category </label>
                                <select name="parent_category_id" id="parent_category" class="form-control">
                                    <option value="">None</option>
                                    @if (count($total_parent_category) > 0)
                                        <optgroup label="Parent Category">
                                            @foreach ($total_parent_category as $parent_cateogy)
                                                <option value="{{ $parent_cateogy->id }}">{{ $parent_cateogy->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endif
                                    @if (count($total_sub_category) > 0)
                                        <optgroup label="Sub Category">
                                            @foreach ($total_sub_category as $sub_category)
                                                <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endif
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="col-form-label"> Default Duty Charges (%) </label>
                                <span class="text-primary">*</span>
                                <input type="number" step="any" name="default_charges" class="form-control" required
                                    value="{{ old('default_charges') }}" autocomplete="false">
                            </div>
                            <div class="col-12">
                                <label class="col-form-label">Category Image</label>
                                    <input type="file" name="image" class="form-control" id="customFile">
                            </div>
                            <div class="col-12 mt-2">
                                <label class="col-form-label"> Description </label>
                                <textarea name="description" class="form-control mb-4" value="{{ old('description') }}" autocomplete="false"></textarea>
                            </div>
                        </div>
                            <h4 class="card-title mt-2">Category HS Code</h4>

                        <div class="row">
                            <div class="col-lg-4">
                                <label class="col-form-label"> Country </label>
                                <span class="text-primary">*</span>
                                <select class="form-control select-2" name="country_id">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="col-form-label"> HS Code </label>
                                <span class="text-primary">*</span>
                                <input type="text" name="hs_code" class="form-control" autocomplete="false" required>
                            </div>
                            <div class="col-lg-4">
                                <label class="col-form-label"> Duty Charges (%) </label>
                                <span class="text-primary">*</span>
                                <input type="number" step="any" name="duty_charges" class="form-control" autocomplete="false" required>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <button class="btn btn-primary form_btn" title="Save Category">Save</button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @section('custom_scripts')
    <script>
        $("#parent_category").on('change', function() {
            var parent_category = $("#parent_category option:selected").val();
            $("#category_id").val(parent_category);
        });
    </script>
    @endsection
@endsection
