@extends('manager.layout.template')
@section('page_title', 'Add Product Good')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('m1001m/product-goods') }}">Product Goods</a></li>
    <li class="breadcrumb-item active">Add Product Good</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('m1001m/product-goods') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="name" class="col-form-label required">Name</label>
                                <input type="text" name="name" id="name" class="form-control form-control-sm" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="group_id" class="col-form-label required">Product Group</label>
                                <select name="group_id" id="group_id" class="form-control form-control-sm select-2" required>
                                    <option value="">Select Group</option>
                                    @foreach ($product_groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="status" class="col-form-label">Product Status</label>
                                <select name="status" id="status" class="form-control form-control-sm">
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}">{{ ucwords(str_replace('_', ' ', $status->name)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <label for="description" class="col-form-label">Description</label>
                                <textarea name="description" id="description" class="form-control form-control-sm"></textarea>
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

                            <div class="col-12 mt-2">
                                <input type="submit" value="Save" class="btn btn-primary px-3">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
