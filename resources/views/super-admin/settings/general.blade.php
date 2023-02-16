@extends('super-admin.layout.template')
@section('page_title', 'General Settings')
@section('breadcrumb')
    <li class="breadcrumb-item active">General Settings</li>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ url('sa1991as/settings/general') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="name">Website Name <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name"
                                            id="name" value="{{ $settings->name }}" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="logo">Website Logo</label>
                                        <input type="file" name="logo" id="logo"
                                            class="form-control">
                                    </div>
                                    @if ($settings->logo != null)
                                        <div class="col-lg-12 my-2">
                                            <img src="{{ asset('storage/logo') }}/{{ $settings->logo }}"
                                                alt="Logo" width="150" class="img-thumbnail">
                                        </div>
                                    @endif
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="favicon">Website Fav
                                            Icon</label>
                                        <input type="file" name="favicon" id="favicon"
                                            class="form-control">
                                    </div>
                                    @if ($settings->favicon != null)
                                        <div class="col-lg-12 my-2">
                                            <img src="{{ asset('storage/logo') }}/{{ $settings->favicon }}"
                                                alt="Favicon" width="150" class="img-thumbnail">
                                        </div>
                                    @endif
                                    <div class="col-12 mt-2">
                                        <input type="submit" value="Update Settings" class="btn btn-primary"
                                            title="Update Settings">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
