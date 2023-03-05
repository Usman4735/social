@if (!Session::has('online_customer'))
    <div class="row">
        <form action="{{ url('login') }}" method="post" id="cart_login_form">
            @csrf
            <input type="hidden" name="p_token" value="{{ encrypt('cart-login') }}">
            <div class="single-login">
                <label>Email<span class="text-primary">*</span></label>
                <input type="text" required name="email" placeholder="John@email.com" value="{{ old('email') }}"
                    autocomplete="false" autofocus>
            </div>
            <div class="single-login">
                <label>Password<span class="text-primary">*</span></label>
                <input type="password" required name="password" placeholder="********" value="{{ old('password') }}"
                    autocomplete="false">
            </div>
            <div class="single-login">
                <button type="submit" class="btn btn-primary form_btn" style="width: 25%">Login</button>
            </div>
        </form>
    </div>
@endif

<div class="row">
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
</div>
