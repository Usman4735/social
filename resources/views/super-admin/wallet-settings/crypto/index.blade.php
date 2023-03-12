@extends('super-admin.layout.template')
@section('page_title', 'Crypto Wallet')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript:void(0)">Wallet Settings</a></li>
    <li class="breadcrumb-item active">Crypto Wallet</li>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header row">
                    <div class="col-12 text-end">
                        <a href="{{ url('sa1991as/wallet-settings/crypto-wallet/create') }}" class="btn btn-primary btn-sm mr-2"
                            title="Add Testimonial"><i data-feather="plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table data-table">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Name</th>
                                <th>Wallet Address</th>
                                <th>Status</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wallets as $wallet)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $wallet->name }}</td>
                                    <td>{{ $wallet->wallet_address }}</td>
                                    <td>
                                        <span class="badge badge-glow bg-{{$wallet->status == 1 ? 'success' : 'danger'}}">
                                            {{$wallet->status == 1 ? 'Active' : 'In-Active'}}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ url('sa1991as/wallet-settings/crypto-wallet') }}/{{ encrypt($wallet->id) }}/edit"
                                            class="btn btn-primary btn-sm" title="Edit"><i data-feather="edit"></i></a>
                                        <a href="{{ url('sa1991as/wallet-settings/crypto-wallet') }}/{{ encrypt($wallet->id) }}/change-status"
                                            class="btn btn-{{$wallet->status == 1 ? 'danger' : 'success'}} btn-sm" title="{{$wallet->status == 1 ? 'Block' : 'Un-Block'}}"><i data-feather="{{$wallet->status == 1 ? 'lock' : 'unlock'}}"></i></a>
                                        <form class="d-inline-block delete-btn"
                                            action="{{ url('sa1991as/wallet-settings/crypto-wallet') }}/{{ encrypt($wallet->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm deleteAlert" title="Delete"><i
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
