@extends('admin.layout.template')
@section('page_title', 'Edit Product Good')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('a1aa/product-goods') }}">Product Goods</a></li>
    <li class="breadcrumb-item active">Edit Product Good</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('a1aa/product-goods') }}/{{ encrypt($product->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="name" class="col-form-label required">Name</label>
                                <input type="text" name="name" id="name" class="form-control form-control-sm"
                                    required value="{{ $product->name }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="group_id" class="col-form-label required">Product Group</label>
                                <select name="group_id" id="group_id" class="form-control form-control-sm select-2"
                                    required>
                                    <option value="">Select Group</option>
                                    @foreach ($product_groups as $group)
                                        <option value="{{ $group->id }}"
                                            {{ $product->group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="status" class="col-form-label">Product Status</label>
                                <select name="status" id="status" class="form-control form-control-sm">
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}" {{ $product->status==$status->id ? "selected" : " " }}>{{ ucwords(str_replace('_', ' ', $status->name)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <label for="description" class="col-form-label">Description</label>
                                <textarea name="description" id="description" class="form-control form-control-sm">{{ $product->description }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card-title my-3">Permission Settings</div>
                            <div class="col-lg-12">
                                <label for="manager_id" class="col-form-label">Manager <span
                                        class="text-primary">*</span></label>
                                <select name="manager_id" id="manager_id" class="form-control form-control-sm select-2"
                                    required>
                                    <option value="">Select Manager</option>
                                     @foreach ($managers as $manager)
                                        <option value="{{ $manager->id }}" {{ $manager->id==$product->manager_id?"selected" : " "}}>{{ $manager->first_name }}
                                            &nbsp;{{ $manager->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card-title my-3">Similar Products</div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="similar_products" class="col-form-label">Similar Products</label>
                                <select name="similar_products[]" id="similar_products" class="select-2" multiple>
                                    <option value="">Select Produtcs</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mt-2">
                                <input type="submit" value="Update" class="btn btn-primary px-3">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_scripts')
    <script>

    </script>
@endsection
