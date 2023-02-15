@extends('super-admin.layout.template')
@section('page_title', 'Add News')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('sa1991as/news') }}">News</a></li>
    <li class="breadcrumb-item active">Add News</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('sa1991as/news') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="title" class="col-form-label required">Title</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="image" class="col-form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="col-lg-12">
                                <label for="short_description" class="col-form-label" required>Short Description</label>
                                <textarea name="short_description" id="short_description" class="form-control" required></textarea>
                            </div>
                            <div class="col-lg-12">
                                <label for="long_description" class="col-form-label">Long Description</label>
                                <textarea name="long_description" id="long_description" class="form-control"></textarea>
                            </div>
                            <div class="col-lg-12"></div>
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
@section('custom_scripts')
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('short_description');
            CKEDITOR.replace('long_description');
        });
    </script>
@endsection
