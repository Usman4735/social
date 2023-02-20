@extends('super-admin.layout.template')
@section('page_title', 'Banners')
@section('breadcrumb')
    <li class="breadcrumb-item active">Banners</li>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header row">
                    <div class="col-12 text-end">
                        <a href="{{ url('sa1991as/banners/create') }}" class="btn btn-primary btn-sm mr-2"
                            title="Add Testimonial"><i data-feather="plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table data-table">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Title</th>
                                <th>Banner</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $banner)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $banner->title }}</td>
                                    <td><img src="{{ asset('storage/banner-images') }}/{{$banner->image}}" alt="Banner" class="img-thumbnail" width="64"></td>
                                    <td>
                                        <a href="{{ url('sa1991as/banners') }}/{{ encrypt($banner->id) }}/edit"
                                            class="btn btn-primary btn-sm"><i data-feather="edit"></i></a>
                                        <form class="d-inline-block delete-btn"
                                            action="{{ url('sa1991as/banners') }}/{{ encrypt($banner->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm deleteAlert"><i
                                                    data-feather="trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
