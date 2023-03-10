@extends('super-admin.layout.template')
@section('page_title', 'Add Product Category')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('sa1991as/product-categories') }}">Product Categories</a></li>
    <li class="breadcrumb-item active">Add Category</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('sa1991as/product-categories') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-2">
                            <div class="card-title">Basic Information</div>
                            <div class="col-lg-4">
                                <label for="name" class="col-form-label">Category Name</label>
                                <input type="text" name="name" id="name" class="form-control form-control-sm">
                            </div>
                            <div class="col-lg-4">
                                <label for="name" class="col-form-label">Parent Category</label>
                                <select name="parent_category" id="parent_category"
                                    class="form-control form-control-sm select-2">
                                    <option value="">None</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="picture" class="col-form-label">Category Image</label>
                                <input type="file" name="picture" id="picture" class="form-control form-control-sm">
                            </div>
                            <div class="col-lg-12">
                                <label for="category_description" class="col-form-label">Description</label>
                                <textarea name="category_description" id="category_description" class="form-control form-control-sm"></textarea>
                            </div>
                            <div class="col-lg-12">
                                <label class="col-form-label" for="smtp_switch">Pre-moderation (Set pre-moderation of
                                    products in this category)</label>
                                <div class="form-check form-switch">
                                    <label class="col-form-label" class="form-check-label" for="smtp_switch"></label>
                                    <input class="form-check-input" type="checkbox" name="pre_moderation" value="1"
                                        id="smtp_switch">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="card-title">SEO Settings</div>

                            <div class="col-lg-4">
                                <label for="seo_title" class="col-form-label">Title</label>

                                <input type="text" class="form-control form-control-sm" name="seo_title" id="seo_title">
                            </div>
                            <div class="col-lg-4">
                                <label for="seo_h1" class="col-form-label">H1</label>
                                <input type="text" class="form-control form-control-sm" name="seo_h1" id="seo_h1">
                            </div>
                            <div class="col-lg-4">
                                <label for="seo_url" class="col-form-label">URL</label>
                                <input type="text" class="form-control form-control-sm" name="seo_url" id="seo_url">
                            </div>
                            <div class="col-lg-4">
                                <label for="seo_description" class="col-form-label">Description</label>

                                <input type="text" class="form-control form-control-sm" name="seo_description"
                                    id="seo_description">
                            </div>
                            <div class="col-lg-4">
                                <label for="seo_keyword" class="col-form-label">Keywords</label>

                                <input type="text" class="form-control form-control-sm" name="seo_keyword"
                                    id="seo_keyword">
                            </div>

                        </div>
                        <div class="col-12 mt-2">
                            <input type="submit" value="Save" class="btn btn-primary px-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
