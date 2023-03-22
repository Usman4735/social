@extends('super-admin.layout.template')
@section('page_title', 'Notifications')
@section('breadcrumb')
    <li class="breadcrumb-item active">Notifications</li>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-bordered data-table">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Title</th>
                                <th>Message</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notifications as $notification)
                                <tr>
                                    <td>
                                        {{ $loop->index + 1 }}
                                    </td>
                                    <td>{{ $notification->title }} </td>
                                    <td>{{ $notification->message }} </td>
                                    <td>
                                        <a href="{{ url('sa1991as/notifications/change-status') }}/{{ encrypt($notification->id) }}"  class="btn btn-primary btn-sm" title="{{$notification->seen == 0 ? 'Mark as Read' : 'Mark as unread'}}"><i data-feather="{{$notification->seen == 0 ? 'eye' : 'eye-off'}}"></i></a>
                                        <form action="{{ url('sa1991as/notifications/delete') }}/{{ encrypt($notification->id) }}"
                                            method="post" class="confirm_form_delete d-inline-block">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger"><i data-feather="trash"></i></button>
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
