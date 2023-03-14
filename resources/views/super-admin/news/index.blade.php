@extends('super-admin.layout.template')
@section('page_title', 'News')
@section('breadcrumb')
    <li class="breadcrumb-item active">News</li>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header row">
                    <div class="col-12 text-end">
                        <a href="{{ url('sa1991as/news/create') }}" class="btn btn-primary btn-sm mr-2"
                            title="Add News"><i data-feather="plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="paginate_data_table" class="table data-table ">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Short Description</th>
                                <th>Status</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news_posts as $news)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('/news-images') }}/{{ $news->image }}" alt="News Picture"
                                    class="img-thumbnail" width="150">
                                    </td>
                                    <td>{{ $news->title }}</td>
                                    <td>
                                        @if(strlen($news->short_description)>150)

                                        {!! substr($news->short_description, 0,150) !!}
                                        @else
                                        {!! $news->short_description !!}
                                        @endif
                                    </td>
                                    <td><span class="badge badge-glow bg-{{ $news->is_published == 1 ? 'success' : 'danger' }}">{{ $news->is_published == 1 ? 'Published' : 'Draft' }}</span></td>

                                    <td>
                                        <a href="{{ url('sa1991as/news') }}/{{ encrypt($news->id) }}/edit"
                                            class="btn btn-primary btn-sm"><i
                                                data-feather="edit"></i></a>
                                        <form class="d-inline-block delete-btn"
                                            action="{{ url('sa1991as/news') }}/{{ encrypt($news->id) }}"
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
