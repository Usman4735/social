@extends('super-admin.layout.template')
@section('page_title', 'SMTP ')
@section('breadcrumb')
    <li class="breadcrumb-item active">SMTP </li>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ url('sa1991as/settings/smtp') }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="col-form-label" for="host">SMTP Host <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="host" id="host"
                                            value="{{ $smtp->host }}" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-form-label" for="port">SMTP Port <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="port" id="port"
                                            value="{{ $smtp->port }}" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-form-label" for="encryption">Encryption <span
                                                class="text-danger">*</span></label>
                                        <select name="encryption" id="encryption" class="form-control select-2" required>
                                            <option value="none"
                                                {{ $smtp->encryption == 'none' ? 'selected' : '' }}>
                                                None
                                            </option>
                                            <option value="SSL"
                                                {{ $smtp->encryption == 'SSL' ? 'selected' : '' }}>SSL
                                            </option>
                                            <option value="TLS"
                                                {{ $smtp->encryption == 'TLS' ? 'selected' : '' }}>TLS
                                            </option>
                                            <option value="STARTTLS"
                                                {{ $smtp->encryption == 'STARTTLS' ? 'selected' : '' }}>
                                                STARTTLS</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-form-label" for="username">SMTP Username <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="username" id="username"
                                            value="{{ $smtp->username }}" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-form-label" for="password">SMTP Password</label>
                                        <input class="form-control" type="password" name="password" id="password">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-form-label" for="from_email">From Email <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="from_email" id="from_email"
                                            value="{{ $smtp->from_email }}" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-form-label" for="from_name">From Name <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="from_name" id="from_name"
                                            value="{{ $smtp->from_name }}" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-form-label" for="smtp_switch">SMTP Status</label>
                                        <div class="form-check form-switch">
                                            <label class="col-form-label" class="form-check-label"
                                                for="smtp_switch"></label>
                                            <input class="form-check-input" type="checkbox" name="status" value="1"
                                                id="smtp_switch" {{ $smtp->status == 1 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <input type="submit" value="Update" class="btn btn-primary" title="Update">
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
