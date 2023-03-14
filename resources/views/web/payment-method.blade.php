<style>
    .payment-method-custom {
        /* display: flex; */
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        padding-left: 3rem;
        padding-top: 1rem;
    }

    .payment-method-item {
        margin-bottom: 10px;
        flex-basis: 100%;
    }

    @media only screen and (min-width: 768px) {
        .payment-method-item {
            flex-basis: 24%;
        }
    }

    .login-form .single-login label {
        color: #333;
        font-size: 15px;
        font-weight: 400;
        margin-top: 7px;
        display: block;
        font-family: 'Rufina', serif;
        font-weight: 400;
    }

    .login-form .single-login input {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: 1px solid #eceff8;
        padding: 12px 10px;
        width: 100%;
        font-family: 'Rufina', serif;
        font-weight: 400;
    }

    .login-form .single-login a {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: 1px solid #eceff8;
        display: inline-block;
        padding: 10px 43px;
        color: #333;
        text-transform: capitalize;
        text-decoration: none;
        float: left;
        transition: .3s;
        font-family: 'Rufina', serif;
        font-weight: 400;
    }

    .login-form .single-login a:hover {
        background: #F07C29;
        color: #fff;
        border: 1px solid #F07C29;
    }

    .single-login input#rememberme {
        float: left;
        width: 7%;
        margin-top: 14px;
    }

    .single-login-2 span {
        float: left;
        margin-top: 10px;
        font-family: 'Rufina', serif;
        font-weight: 400;
        color: #333;
    }

    .single-login-2 {
        overflow: hidden;
    }
</style>

{{-- <div class="row">
    <div class="col-lg-3">
        <img src="{{ asset('assets/images/payment/bitcoin.jpg') }}" alt="" srcset="">
    </div>
    <div class="col-lg-3">
        <img src="{{ asset('assets/images/payment/yandex.png') }}" alt="" srcset="">
    </div>
    <div class="col-lg-3">
        <img src="{{ asset('assets/images/payment/webmoney.png') }}" alt="" srcset="">
    </div>
    <div class="col-lg-3">
        <img src="{{ asset('assets/images/payment/qiwi.png') }}" alt="" srcset="">
    </div>
</div> --}}
<div class="user-login-area">
    <div class="mb-5 login-form">

        <div class="login-title mb-30 text-center">
            <h2>Purchase Payment</h2>
        </div>
        <form action="{{ url('/checkout') }}/{{ encrypt('checkout') }}" method="post" id="cart_login_form">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-login">
                        <label>First Name<span class="text-primary">*</span></label>
                        <input type="text" required name="first_name" value="{{ $customer->first_name }}"
                           readonly placeholder="Please Enter First Name" autocomplete="false"
                            autofocus>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">

                    <div class="single-login">
                        <label>Last Name<span class="text-primary">*</span></label>
                        <input type="text" required name="last_name" value="{{ $customer->last_name }}"
                           readonly placeholder="Please Enter Last Name" autocomplete="false">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">

                    <div class="single-login">
                        <label>Email<span class="text-primary">*</span></label>
                        <input type="email" required name="email" value="{{ $customer->email }}"
                           readonly placeholder="John@gmail.com " autocomplete="false">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-login">
                        <label>Mobile <span class="text-primary">*</span></label>
                        <input type="text" required name="mobile" value="{{ $customer->mobile }}"
                           readonly placeholder="Please Enter Mobile" autocomplete="false">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6 col-12">
                    <div class="single-login">

                    <label>Payment Method <span class="text-primary">*</span> </label>
                </div>
                </div>
                <div class="payment-method-custom col-lg-12 d-flex">
                    <div class="payment-method-item">
                        <input type="radio" required name="payment_method" class="payment_method" value="qiwi"
                            id="payment-method-qiwi">
                        <label for="payment-method-qiwi">Qiwi</label>
                    </div>
                    <div class="payment-method-item">
                        <input type="radio" required name="payment_method" class="payment_method" value="bitcoin"
                            id="payment-method-bitcoin">
                        <label for="payment-method-bitcoin">BitCoin</label>
                    </div>
                    <div class="payment-method-item">
                        <input type="radio" required name="payment_method" class="payment_method" value="webmoney"
                            id="payment-method-webmoney">
                        <label for="payment-method-webmoney">Webmoney</label>
                    </div>
                    <div class="payment-method-item">
                        <input type="radio" required name="payment_method" class="payment_method" value="yandex"
                            id="payment-method-yandex">
                        <label for="payment-method-yandex">Yandex</label>
                    </div>
                </div>

            </div>

            <br>
            <div class="row">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Place Order</button>
                </div>
            </div>

        </form>
    </div>
</div>
