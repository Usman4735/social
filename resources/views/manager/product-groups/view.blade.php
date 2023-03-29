@extends('manager.layout.template')
@section('page_title', 'View Product Group')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('m1001m/product-groups') }}">Product Groups</a></li>
    <li class="breadcrumb-item active">View Product Group</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                        <div class="card-title">Basic Information</div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="name" class="col-form-label required">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required value={{$product->name}}>
                            </div>
                            <div class="col-lg-6">
                                <label for="name" class="col-form-label required">Category</label>
                                <select name="category_id" id="category_id" class="form-control select-2" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{$product->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if (@$permission->see_tags)
                                <div class="col-lg-6">
                                    <label for="name" class="col-form-label">Tags</label>
                                    <select name="tags[]" id="tags" class="form-control tags-select-2" multiple {{@$permission->edit_tags != 1 ? 'disabled' : ''}}>
                                        @if ($product->tags)
                                            @foreach (explode(",", $product->tags) as $tag)
                                                <option value="{{$tag}}" selected>{{$tag}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            @endif
                            @if (@$permission->see_photos)
                                <div class="col-lg-6">
                                    <label for="image" class="col-form-label">Image</label>
                                    <input type="file" name="image" id="image" class="form-control" {{@$permission->edit_photos != 1 ? 'disabled' : ''}}>
                                </div>
                                <div class="col-lg-12 mt-2">
                                    <img src="{{ asset('storage/product-group-images') }}/{{ $product->image }}"
                                        alt="Product Picture" class="img-thumbnail" width="150">
                                </div>
                            @endif
                            @if (@$permission->see_price == 1)
                                <div class="col-lg-12">
                                    <label for="price" class="col-form-label">Price (Rubles)</label>
                                    <input type="text" name="price" id="price" class="form-control" value="{{number_format($product->price, 2)}}" {{@$permission->edit_price != 1 ? 'disabled' : ''}}>
                                </div>
                            @endif
                            <div class="col-lg-6">
                                <label for="manager_salary" class="col-form-label">Manager Salary (Rubles)</label>
                                <input type="text" name="manager_salary" id="manager_salary" class="form-control" value="{{$product->manager_salary}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="manager_salary_type" class="col-form-label">Salary Type</label>
                                <select name="manager_salary_type" id="manager_salary_type" class="form-control">
                                    <option value="rubles" {{$product->manager_salary_type == "rubles" ? 'selected' : ''}}>Rubles</option>
                                    <option value="percentage" {{$product->manager_salary_type == "percentage" ? 'selected' : ''}}>Percentage</option>
                                </select>
                            </div>
                            @if (@$permission->see_description)
                                <div class="col-lg-12">
                                    <label for="description" class="col-form-label">Description</label>
                                    <textarea name="description" id="description" class="form-control" {{@$permission->edit_description != 1 ? 'disabled' : ''}}>{{$product->description}}</textarea>
                                </div>
                            @endif

                            <div class="row">
                                <div class="card-title my-3">SEO Settings</div>
                                <div class="col-lg-4">
                                    <label for="seo_title" class="col-form-label">Title</label>
                                    <input type="text" class="form-control form-control-sm" name="seo_title"
                                        value="{{ $product->seo_title }}" id="seo_title">
                                </div>
                                <div class="col-lg-4">
                                    <label for="seo_h1" class="col-form-label">H1</label>
                                    <input type="text" class="form-control form-control-sm" name="seo_h1"
                                        value="{{ $product->seo_h1 }}" id="seo_h1">
                                </div>
                                <div class="col-lg-4">
                                    <label for="seo_url" class="col-form-label">URL</label>
                                    <input type="text" class="form-control form-control-sm" name="seo_url"
                                        value="{{ $product->seo_url }}" id="seo_url">
                                </div>
                                <div class="col-lg-4">
                                    <label for="seo_description" class="col-form-label">Description</label>
                                    <input type="text" class="form-control form-control-sm" name="seo_description"
                                        value="{{ $product->seo_description }}" id="seo_description">
                                </div>
                                <div class="col-lg-4">
                                    <label for="seo_keyword" class="col-form-label">Keywords</label>
                                    <input type="text" class="form-control form-control-sm" name="seo_keyword"
                                        value="{{ $product->seo_keyword }}" id="seo_keyword">
                                </div>

                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection
