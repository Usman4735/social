@extends('super-admin.layout.template')
@section('page_title', 'Add Chat Group')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('sa1991as/chat-groups') }}">Chat Groups</a></li>
    <li class="breadcrumb-item active">Add Chat Group</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('sa1991as/chat-groups') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="group_name" class="col-form-label required">Chat Group Name</label>
                                <input type="text" name="group_name" id="group_name" class="form-control form-control-sm"
                                    required>
                            </div>
                            <div class="col-lg-12">
                                <label for="group_members" class="col-form-label">Group Members</label>
                                <select name="group_members[]" multiple id="group_members" class="form-control form-control-sm select-2">
                                    @foreach ($members as $member)
                                        <option value="{{$member->id}}">{{$member->first_name." ".$member->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mt-2">
                                <input type="submit" title="Save" value="Save" class="btn btn-primary px-3">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
