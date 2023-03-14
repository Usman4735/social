@extends('web.layout.template')

@if ($p_token == null)
    @section('page_title', 'View Cart')
@elseif($p_token == 'buy-without-registration')
    @section('page_title', 'Buy Without Registration')
@elseif($p_token == 'checkout')
    @section('page_title', 'Checkout Successfull')
@endif
@section('breadcrum')
    <li><a href="#">Home</a></li>
    @if ($p_token == null)
        <li><a href="#" class="active">View Cart</a></li>
    @elseif($p_token == 'buy-without-registration')
        <li><a href="#" class="active">Buy Without Registration</a></li>
    @elseif($p_token == 'checkout')
        <li><a href="#" class="active">Checkout</a></li>
    @endif
@endsection

@section('content')
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/cart') }}" class="active">View Cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (Session::has('update-cart'))
                    <div class="container-fluid mb-3 p-2 bg-light" style="border: 1px solid #8932ed;">
                        <div class="row">
                            <div class="col-lg-8 my-auto text-primary" style="font-size: 15px">
                                {{ session('update-cart') }}
                            </div>
                            <div class="col-lg-4 text-right">
                                @if (Session::has('online_customer'))
                                    <a href="#checkout" class="btn btn-sm btn-primary payment_modal"
                                        url="payment-modal">Proceed to Checkout</a>
                                @else
                                    <a href="#checkout" class="btn btn-sm btn-primary">Proceed to Checkout</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
                @if (Session::has('cart-login-page-success'))
                    <div class="container-fluid mb-3 p-2 bg-light" style="border: 1px solid #8932ed;">
                        <div class="row">
                            <div class="col-lg-8 my-auto text-primary" style="font-size: 15px">
                                {{ session('cart-login-page-success') }}
                            </div>
                            <div class="col-lg-4 text-right">
                                @if (Session::has('online_customer'))
                                    <a href="#checkout" class="btn btn-sm btn-primary payment_modal"
                                        url="payment-modal">Proceed to Checkout</a>
                                @else
                                    <a href="#checkout" class="btn btn-sm btn-primary">Proceed to Checkout</a>
                                @endif
                            </div>
                        </div>
                    </div>

                @endif
            </div>
        </div>
    </div>
    @if($p_token != 'checkout')

    <x-cart></x-cart>
    @endif
    @if (!Session::has('online_customer') && Session::get('cartinfo') != null)
        @if ($p_token == null)
            <x-login-register-cart></x-login-register-cart>
        @elseif($p_token == 'buy-without-registration')
            <x-buy-without-registration></x-buy-without-registration>
        @endif

    @endif
    @if($p_token == 'checkout' && Session::get('cartinfo') != null)
    <div class="container">
        <x-checkout-response :order="$order">
        </x-checkout-response>
    </div>
    @endif

@endsection
@section('scripts')
    <script>
        $(".login-msg").hide();
        $("#update_cart").click(function(e) {
            e.preventDefault();
            $("#update_cart_form").submit();
        });
        $("#proceed_checkout").on('click', function(e) {
            e.preventDefault();
            $("#checkout").show();
        });
        $("#buy-without-registration").on('submit', function(e) {
            e.preventDefault();
            var form = $(this)
            $.ajax({
                url: form.attr('action'),
                type: 'post',
                data: new FormData(this),
                success: function(response) {
                    console.log(response);
                }
            })
        })
        // $(".payment_method").on('click', function (e) {
        //     e.preventDefault();
        //     let payment_mthod=$(this).val();
        //     $.ajax({
        //         type: "post",
        //         url: "{{ url('/payment-mthod-response') }}",
        //         data: {payment_mthod:payment_mthod},
        //         success: function (response) {
        //             console.log(response);
        //         }
        //     });
        // })
    </script>
@endsection
