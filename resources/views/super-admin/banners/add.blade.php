@extends('super-admin.layout.template')
@section('page_title', 'Add Banner')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('sa1991as/banners') }}">Banners</a></li>
    <li class="breadcrumb-item active">Add Banner</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('sa1991as/banners') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="title" class="col-form-label">Banner Title</label>
                                <input type="text" name="title" id="title" class="form-control form-control-sm">
                            </div>
                            <div class="col-lg-12">
                                <label for="image" class="col-form-label">Banner Image</label>
                                <input type="file" name="image" id="image" class="form-control form-control-sm">
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
