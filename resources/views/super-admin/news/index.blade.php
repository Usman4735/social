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
                                <th>Title</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $single_news)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $single_news->title }}</td>
                                    <td>
                                        <a href="{{ url('sa1991as/news') }}/{{ encrypt($single_news->id) }}/edit"
                                            class="btn btn-primary btn-sm"><i
                                                data-feather="edit"></i></a>
                                        <form class="d-inline-block delete-btn"
                                            action="{{ url('sa1991as/news') }}/{{ encrypt($single_news->id) }}"
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
