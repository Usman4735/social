@extends('super-admin.layout.template')
@section('page_title', 'Add Product Group')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('sa1991as/product-groups') }}">Product Groups</a></li>
    <li class="breadcrumb-item active">Add Product Group</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('sa1991as/product-groups') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-title">Basic Information</div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="name" class="col-form-label required">Name</label>
                                <input type="text" name="name" id="name" class="form-control form-control-sm" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="name" class="col-form-label required">Category</label>
                                <select name="category_id" id="category_id" class="form-control form-control-sm select-2" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="name" class="col-form-label">Tags</label>
                                <select name="tags[]" id="tags" class="form-control form-control-sm tags-select-2" multiple>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="image" class="col-form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control form-control-sm">
                            </div>
                            <div class="col-lg-12">
                                <label for="price" class="col-form-label">Price (Rubles)</label>
                                <input type="number" min="0" name="price" id="price" class="form-control form-control-sm"
                                    placeholder="Enter the salary in rubles">
                            </div>
                            <div class="col-lg-6">
                                <label for="manager_salary" class="col-form-label">Manager Salary (Rubles)</label>
                                <input type="number" min="0" name="manager_salary" id="manager_salary" class="form-control form-control-sm"
                                    placeholder="Enter the salary in rubles">
                            </div>
                            <div class="col-lg-6">
                                <label for="manager_salary_type" class="col-form-label">Salary Type</label>
                                <select name="manager_salary_type" id="manager_salary_type" class="form-control form-control-sm">
                                    <option value="rubles">Rubles</option>
                                    <option value="percentage">Percentage</option>
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <label for="description" class="col-form-label">Description</label>
                                <textarea name="description" id="description" class="form-control form-control-sm"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="card-title my-3">Permission Settings</div>
                            <div class="col-lg-12">
                                <label for="admin_id" class="col-form-label">Admin <span class="text-primary">*</span></label>
                                <select name="admin_id" id="admin_id" class="form-control form-control-sm select-2" required>
                                    <option value="">Select Admin</option>
                                    @foreach ($admins as $admin)
                                        <option value="{{ $admin->id }}">{{ $admin->first_name }} &nbsp;{{ $admin->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card-title my-3">SEO Settings</div>
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
                                <input type="text" class="form-control form-control-sm" name="seo_description" id="seo_description">
                            </div>
                            <div class="col-lg-4">
                                <label for="seo_keyword" class="col-form-label">Keywords</label>
                                <input type="text" class="form-control form-control-sm" name="seo_keyword" id="seo_keyword">
                            </div>

                        </div>

                        <div class="row">
                            <div class="card-title my-3">Similar Products</div>
                            <div class="col-lg-12">
                                <label for="similar_products" class="col-form-label">Similar Products</label>
                                <select name="similar_products[]" id="similar_products" class="select-2" multiple>
                                    <option value="">Select Produtcs</option>
                                </select>
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
@section('custom_scripts')
    <script>
        $(".tags-select-2").select2({
            tags: true
        });
    </script>
@endsection
