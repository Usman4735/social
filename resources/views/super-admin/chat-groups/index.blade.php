@extends('super-admin.layout.template')
@section('page_title', 'Chat Groups')
@section('breadcrumb')
    <li class="breadcrumb-item active">Chat Groups</li>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header row">
                    <div class="col-12 text-end">
                        <a href="{{ url('sa1991as/chat-groups/create') }}" class="btn btn-primary btn-sm mr-2"
                            title="Add Chat Group"><i data-feather="plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="paginate_data_table" class="table data-table ">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Group Name</th>
                                <th>Members</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chat_groups as $chat_group)
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $chat_group->group_name }}</td>
                                <td>
                                    {{@$chat_group->members()}}
                                </td>
                                <td>
                                    <a href="{{ url('sa1991as/chat-groups') }}/{{ encrypt($chat_group->id) }}/edit"
                                        class="btn btn-primary btn-sm"><i data-feather="edit"></i></a>
                                    <form class="d-inline-block delete-btn"
                                        action="{{ url('sa1991as/chat-groups') }}/{{ encrypt($chat_group->id) }}"
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
