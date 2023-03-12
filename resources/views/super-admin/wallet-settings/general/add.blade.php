@extends('super-admin.layout.template')
@section('page_title', 'Add General Wallet')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="javascript:void(0)">Wallet Settings</a></li>
<li class="breadcrumb-item active">Add General Wallet</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('sa1991as/wallet-settings/general-wallet') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="name" class="col-form-label required">Wallet Name</label>
                                <input type="text" name="name" id="name" required class="form-control form-control-sm">
                            </div>
                            <div class="col-lg-12">
                                <label for="api_key" class="col-form-label required">API Key</label>
                                <input type="text" name="api_key" id="api_key" required class="form-control form-control-sm">
                            </div>
                            <div class="col-lg-12">
                                <label for="secret_key" class="col-form-label required">Secret Key</label>
                                <input type="text" name="secret_key" id="secret_key" required class="form-control form-control-sm">
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
