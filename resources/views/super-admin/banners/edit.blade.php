@extends('super-admin.layout.template')
@section('page_title', 'Edit Banner')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('sa1991as/banners') }}">Banners</a></li>
    <li class="breadcrumb-item active">Edit Banner</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('sa1991as/banners') }}/{{encrypt($banner->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="title" class="col-form-label">Banner Title</label>
                                <input type="text" name="title" id="title" class="form-control form-control-sm" value="{{$banner->title}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="image" class="col-form-label">Banner Image</label>
                                <input type="file" name="image" id="image" class="form-control form-control-sm">
                            </div>
                            @if ($banner->image)
                                <div class="col-lg-12 mt-2">
                                    <img src="{{asset('/banner-images')}}/{{$banner->image}}" alt="Banner Image" class="img-thumbnail" width="150">
                                </div>
                            @endif
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
