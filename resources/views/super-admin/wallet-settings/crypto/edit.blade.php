@extends('super-admin.layout.template')
@section('page_title', 'Edit Crypto Wallet')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="javascript:void(0)">Wallet Settings</a></li>
<li class="breadcrumb-item active">Edit Crypto Wallet</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('sa1991as/wallet-settings/crypto-wallet') }}/{{encrypt($wallet->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="name" class="col-form-label required">Wallet Name</label>
                                <input type="text" name="name" id="name" value="{{$wallet->name}}" required class="form-control form-control-sm">
                            </div>
                              <div class="col-lg-12">
                                <label for="network" class="col-form-label required">Wallet Network</label>
                                <input type="text" name="network" id="network" value="{{ $wallet->network }}" required class="form-control form-control-sm">
                            </div>
                            <div class="col-lg-12">
                                <label for="wallet_address" class="col-form-label required">Wallet Address</label>
                                <input type="text" name="wallet_address" id="wallet_address" value="{{$wallet->wallet_address}}" required class="form-control form-control-sm">
                            </div>
                            <div class="col-12 mt-2">
                                <input type="submit" value="Update" class="btn btn-primary px-3">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
