@extends('web.layout.template')
@section('page_title', 'Profile')
@section('breadcrum')
    <li><a href="{{ url('/account') }}">My Account</a></li>
    <li><a href="#" class="active">Profile</a></li>
@endsection
@section('content')
    <!-- entry-header-area-start -->
    <div class="entry-header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="entry-header-title">
                        <h2>My Account</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- entry-header-area-end -->
    <!-- my account wrapper start -->
    <div class="my-account-wrapper mb-70">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <!-- My Account Tab Menu Start -->
                            <div class="row">
                                <x-customer-profile></x-customer-profile>
                                <!-- My Account Tab Menu End -->

                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">

                                        <!-- Single Tab Content Start -->
                                        <div class="" id="account-info" role="tabpanel">
                                            <form action="{{ url('profile') }}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="myaccount-content">
                                                    <h5>Personal Data</h5>
                                                    <div class="account-details-form">
                                                        <x-flash-message></x-flash-message>

                                                        <form action="#">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="first_name">First Name <span
                                                                                class="text-primary">*</span></label>
                                                                        <input type="text" name="first_name" required value="{{ $customer->first_name }}"
                                                                            placeholder="John" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="last_name">Last Name <span
                                                                                class="text-primary">*</span></label>
                                                                        <input type="text" name="last_name" required value="{{ $customer->last_name }}"
                                                                            placeholder="Wick" />
                                                                    </div>
                                                                </div>


                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="email">Email <span
                                                                                class="text-primary">*</span></label>
                                                                        <input type="email" name="email" required value="{{ $customer->email }}"
                                                                            placeholder="jhon@email.com" />
                                                                    </div>
                                                                </div>



                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="mobile">Mobile <span
                                                                                class="text-primary">*</span></label>
                                                                        <input type="text"
                                                                            name="mobile" required value="{{ $customer->mobile }}" placeholder="+2371234567" />
                                                                    </div>
                                                                </div>



                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="first-name">Passowrd</label>
                                                                        <input type="password" name="password"
                                                                            placeholder="Leave empty if don't want to change password" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="first-name">Confirm Password </label>
                                                                        <input type="password" name="confirm_password"
                                                                            placeholder="Leave empty if don't want to change password" />
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="single-input-item">
                                                                <button type="submit"
                                                                    class="btn btn-sqr btn-primary rounded px-5">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- Single Tab Content End -->
                                    </div>

                                </div> <!-- My Account Tab Content End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- my account wrapper end -->
@endsection
