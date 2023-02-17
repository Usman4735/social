@extends('super-admin.layout.template')
@section('page_title', 'Edit Product Good')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('sa1991as/product-goods') }}">Product Goods</a></li>
    <li class="breadcrumb-item active">Edit Product Good</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('sa1991as/product-goods') }}/{{encrypt($product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="name" class="col-form-label required">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required value="{{$product->name}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="group_id" class="col-form-label required">Product Group</label>
                                <select name="group_id" id="group_id" class="form-control select-2" required>
                                    <option value="">Select Group</option>
                                    @foreach ($product_groups as $group)
                                        <option value="{{ $group->id }}" {{$product->group_id == $group->id ? 'selected' : ''}}>{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="status" class="col-form-label">Product Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="draft" {{$product->status == 'draft' ? 'selected' : ''}}>Draft</option>
                                    <option value="reserved" {{$product->status == 'reserved' ? 'selected' : ''}}>Reserved</option>
                                    <option value="awaiting_moderation" {{$product->status == 'awaiting_moderation' ? 'selected' : ''}}>Awaiting Moderation</option>
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <label for="description" class="col-form-label">Description</label>
                                <textarea name="description" id="description" class="form-control">{{$product->description}}</textarea>
                            </div>
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
