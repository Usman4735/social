@extends('manager.layout.template')
@section('page_title', 'Edit Profile')
@section('breadcrumb')
    <li class="breadcrumb-item active">Edit Profile</li>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ url('m1001m/profile') }}" method="POST" enctype="multipart/form-data"
                                id="form">
                                @csrf
                                @method('put')
                                <div class="row mb-2">
                                    <div class="col-lg-6">
                                        <label for="first_name" class=" col-form-label">First Name <span
                                                class="text-danger">*</span></label>
                                        <input name="first_name" type="text" class="form-control" id="first_name"
                                            placeholder="First Name" value="{{ $manager->first_name }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="last_name" class=" col-form-label">Last Name <span
                                                class="text-danger">*</span></label>
                                        <input name="last_name" type="text" class="form-control" id="last_name"
                                            placeholder="Last Name" value="{{ $manager->last_name }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="mobile" class="col-form-label">Mobile</label>
                                        <input name="mobile" type="text" class="form-control" id="mobile"
                                            placeholder="Mobile" value="{{ $manager->mobile }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="email" class="col-form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <input required name="email" type="email" class="form-control" id="email"
                                            placeholder="Email" value="{{ $manager->email }}">
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="username" class="col-form-label">Username <span
                                                class="text-danger">*</span></label>
                                        <input required name="username" type="text" class="form-control" id="username"
                                            placeholder="Username" value="{{ $manager->username }}">
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="password" class="col-form-label">Choose Password <span
                                                class="text-danger">*</span></label>
                                        <input name="password" type="password" class="form-control" id="password"
                                            placeholder="Leave empty if you don't want to change">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="confirm_password" class="col-form-label">Confirm Password <span
                                                class="text-danger">*</span></label>
                                        <input name="confirm_password" type="password" class="form-control"
                                            id="confirm_password" placeholder="Leave empty if you don't want to change">
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="profile_picture" class="col-form-label">Profile Picture</label>
                                        <input type="file" name="profile_picture" id="profile_picture"
                                            class="form-control">
                                    </div>
                                    @if ($manager->profile_picture)
                                        <div class="col-lg-12 mt-2">
                                            <img src="{{ asset('storage/admin-images') }}/{{ $manager->profile_picture }}"
                                                alt="Admin Image" width="180" class="img-thumbnail">
                                        </div>
                                    @endif

                                    <div class="col-12 mt-2 text-end">
                                        <button type="button" class="btn btn-sm btn-primary waves-effect"
                                            data-bs-toggle="modal" data-bs-target="#wallet-modal">
                                            <i data-feather="plus"></i>
                                        </button>
                                    </div>

                                    <div class="col-12 mt-2">
                                        <div class="card-title">User Wallets</div>
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <td>Wallet</td>
                                                    <td>Wallet Address</td>
                                                    <td>Actions</td>
                                                </tr>
                                            </thead>
                                            <tbody id="wallet-tbody">
                                                @foreach ($manager_wallets as $wallet)
                                                    <tr>
                                                        <td>{{@$wallet->wallet->name ?? 'N/A'}}</td>
                                                        <td>{{$wallet->wallet_address}}</td>
                                                        <td>
                                                            <a href="{{url('m1001m/profile/remove-wallet')}}/{{encrypt($wallet->id)}}" class="btn btn-sm btn-danger">
                                                                <i data-feather="trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-12 mt-2">
                                        <button type="submit" class="btn btn-primary form_btn"
                                            title="Update Profile">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Wallet Modal --}}
    <div class="modal fade text-start show" id="wallet-modal" tabindex="-1" aria-labelledby="wallet-modal-label"
        aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="wallet-modal-label">Add Modal</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="wallet" class="col-form-label">
                                Wallet
                            </label>
                            <select name="wallet_id" id="wallet_id" class="form-control select-2">
                                <option value="">Select Wallet</option>
                                @foreach ($wallets as $wallet)
                                    <option value="{{ $wallet->id }}">{{ $wallet->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="wallet_address" class="col-form-label">Wallet Address</label>
                            <input type="text" name="wallet_address" id="wallet_address" class="form-control">
                        </div>
                        <div class="col l2 mt-1 text-center wallet-validation-error d-none">
                            <p class="text-danger">
                                Both of these fields are required.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="add-wallet-btn btn btn-primary waves-effect waves-float waves-light">Add
                        Wallet</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_scripts')
    <script>
        // Add wallet row in table
        $(".add-wallet-btn").on("click", function() {
            var wallet_id = $("#wallet_id option:selected").val();
            var wallet = $("#wallet_id option:selected").text();
            var wallet_address = $("#wallet_address").val();
            // Validation
            if (wallet_id == '' || wallet_address == '') {
                $(".wallet-validation-error").removeClass('d-none');
            } else {
                // Hide validation error if data is filled
                $(".wallet-validation-error").addClass('d-none');
                var row = `
                    <tr>
                        <td>
                            ${wallet}
                            <input type='hidden' name='wallet_id[]' value='${wallet_id}'>
                        </td>
                        <td>
                            ${wallet_address}
                            <input type='hidden' name='wallet_address[]' value='${wallet_address}'>
                        </td>
                        <td>
                            <button type='button' class='remove-wallet-row btn btn-sm btn-danger'><i data-feather='trash'></i></button>
                        </td>
                    </tr>
                `;
                // append the row in table
                $("#wallet-tbody").append(row);
                feather.replace();
                $("#wallet-modal").modal('hide');
                // Reset modal fields
                $("#wallet_id").val('').trigger('change');
                $("#wallet_address").val('');
            }

            // Remove the row from wallet table
            $(".remove-wallet-row").on("click", function() {
                if(confirm('Are you sure you want to delete this wallet?')) {
                    $(this).closest("tr").remove();
                }
            });
        });
    </script>
@endsection
