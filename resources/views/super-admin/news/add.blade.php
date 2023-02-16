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
                        </div>
                        <div class="row mt-3">
                            <div class="card-title">SEO Settings</div>
                            <hr>
                            <div class="col-lg-6">
                                <label for="seo_title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="seo_title" id="seo_title">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="seo_url" class="col-sm-2 col-form-label">URL</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="seo_url" id="seo_url">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="seo_h1" class="col-sm-2 col-form-label">H1</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="seo_h1" id="seo_h1">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="seo_keyword" class="col-sm-2 col-form-label">Keywords</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="seo_keyword" id="seo_keyword">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="seo_description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-12">
                                    <textarea name="seo_description" id="seo_description" class="form-control" rows="3"></textarea>
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-lg-12 mt-2">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="is_published" name="is_published"
                                        value="1">
                                    <label class="form-check-label" for="is_published">Publish / Draft</label>
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
@section('custom_scripts')
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('short_description');
            CKEDITOR.replace('long_description');
        });
    </script>
@endsection
