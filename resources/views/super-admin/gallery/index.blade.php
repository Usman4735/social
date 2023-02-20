<style>
    div.gallery:hover {
        border: 1px solid #777;
    }

    div.gallery img {
        width: 100%;
        height: auto;
    }

    .card-body {
        flex: 1 1 auto;
        padding: 0.5rem 0.5rem;
    }

    .icon {
        position: absolute;
        margin-top: 10px;
    }

    .custom_btn {
        border: none;
    }
</style>

@extends('super-admin.layout.template')
@section('page_title', 'Media Gallery')
@section('breadcrumb')
    <li class="breadcrumb-item active">Media Gallery</li>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header row">
                    <div class="col-12 text-end">
                        <button type="button" title="Add Media" url="{{ url('sa1991as/gallery/create') }}" size="modal-md"
                            class="btn btn-primary btn-sm modal_popup"><i data-feather="plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="file-manager-content-body">
                        <div class="drives">
                            <div class="row">
                                @if (count($media_gallery) > 0)
                                    @foreach ($media_gallery as $media)
                                        <div class="col-lg-2 col-md-3 col-sm-12">
                                            <div class="card shadow-none border cursor-pointer">
                                                <button type="button" title="Edit Media"
                                                    url="{{ url('sa1991as/gallery/') }}/{{ encrypt($media->id) }}/edit"
                                                    size="modal-md" class="modal_popup custom_btn">
                                                    <div class="d-flex justify-content-between gallery">
                                                        <img src="{{ url('images') }}/{{ $media->image }}"
                                                            title="{{ $media->header }}" alt="{{ $media->alt }}" />
                                                        <div class="dropdown-items-wrapper icon">
                                                            <i data-feather="more-vertical" id="dropdownMenuLink1"
                                                                role="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false" ></i>
                                                            <i data-feather="more-vertical" id="dropdownMenuLink1"
                                                                role="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false"></i>
                                                            {{-- <div class="dropdown-menu dropdown-menu-end"
                                                                aria-labelledby="dropdownMenuLink1">
                                                                <a class="dropdown-item" href="#">
                                                                    <i data-feather="refresh-cw" class="me-25"></i>
                                                                    <span class="align-middle">Refresh</span>
                                                                </a>
                                                                <a class="dropdown-item" href="#">
                                                                    <i data-feather="settings" class="me-25"></i>
                                                                    <span class="align-middle">Manage</span>
                                                                </a>
                                                                <a class="dropdown-item" href="#">
                                                                    <i data-feather="trash" class="me-25"></i>
                                                                    <span class="align-middle">Delete</span>
                                                                </a>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </button>
                                            </div>

                                        </div>
                                    @endforeach
                                @else
                                    No Media Found
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <x-modal></x-modal>
@endsection
{{-- @ --}}
