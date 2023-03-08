@extends('super-admin.layout.template')
@section('page_title', 'Edit Testimonial')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('sa1991as/testimonials') }}">Testimonials</a></li>
    <li class="breadcrumb-item active">Edit Testimonial</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('sa1991as/testimonials') }}/{{encrypt($testimonial->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="name" class="col-form-label">Testimonial Name</label>
                                <input type="text" name="name" id="name" class="form-control form-control-sm" value="{{$testimonial->name}}">
                            </div>
                            <div class="col-lg-12">
                                <label for="image" class="col-form-label">Testimonial Image <span class="text-primary">Recommended size 1560*1560 px</span></label>
                                <input type="file" name="image" id="image" class="form-control form-control-sm">
                            </div>
                            @if ($testimonial->image)
                                <div class="col-lg-12 mt-2">
                                    <img src="{{asset('storage/testimonial-images')}}/{{$testimonial->image}}" alt="Testimonial Image" class="img-thumbnail" width="150">
                                </div>
                            @endif
                            <div class="col-lg-12">
                                <label for="description" class="col-form-label">Testimonial Description</label>
                                <textarea name="description" id="description" class="form-control form-control-sm">{{$testimonial->description}}</textarea>
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
