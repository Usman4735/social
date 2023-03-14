@php
    use Illuminate\Support\Facades\DB;
    use App\Models\ProductGroup;

    $trending_products = ProductGroup::all();

@endphp
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
</style>
<div class="container">
    <div class="row" id="checkout">
        <div class="col-lg-9">
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
                                    <input type="text" required name="first_name" value="{{ old('first_name') }}"
                                        placeholder="Please Enter First Name"
                                        autocomplete="false" autofocus>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">

                                <div class="single-login">
                                    <label>Last Name<span class="text-primary">*</span></label>
                                    <input type="text" required name="last_name" value="{{ old('last_name') }}"
                                        placeholder="Please Enter Last Name"
                                        autocomplete="false">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">

                                <div class="single-login">
                                    <label>Email<span class="text-primary">*</span></label>
                                    <input type="email" required name="email" value="{{ old('email') }}"
                                        placeholder="John@gmail.com "  autocomplete="false">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="single-login">
                                    <label>Mobile <span class="text-primary">*</span></label>
                                    <input type="text" required name="mobile" value="{{ old('mobile') }}"
                                        placeholder="Please Enter Mobile"
                                        
                                        autocomplete="false">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-12">
                                <label>Payment Method <span class="text-primary">*</span> </label>
                            </div>
                            <div class="payment-method-custom col-lg-12 d-flex">
                                <div class="payment-method-item">
                                    <input type="radio" required name="payment_method" class="payment_method"
                                        value="qiwi" id="payment-method-qiwi">
                                    <label for="payment-method-qiwi">Qiwi</label>
                                </div>
                                <div class="payment-method-item">
                                    <input type="radio" required name="payment_method" class="payment_method"
                                        value="bitcoin" id="payment-method-bitcoin">
                                    <label for="payment-method-bitcoin">BitCoin</label>
                                </div>
                                <div class="payment-method-item">
                                    <input type="radio" required name="payment_method" class="payment_method"
                                        value="webmoney" id="payment-method-webmoney">
                                    <label for="payment-method-webmoney">Webmoney</label>
                                </div>
                                <div class="payment-method-item">
                                    <input type="radio" required name="payment_method" class="payment_method"
                                        value="yandex" id="payment-method-yandex">
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
        </div>
        <div class="col-lg-3 col-md-12 col-12 order-lg-2 order-2">
            <div class="shop-left">
                <div class="left-title mb-20">
                    <h4>Trending Products</h4>
                </div>
                <div class="random-area mb-30">

                    <div class="product-total-2">
                        @foreach ($trending_products as $related_product)
                            <div class="single-most-product bd mb-18">
                                <div class="most-product-img">
                                    <a href="#">
                                        @if ($related_product->image != null)
                                            <img
                                                src="{{ asset('/product-group-images') }}/{{ $related_product->image }}"alt="book" />
                                        @else
                                            <img src="{{ asset('assets/images/no-image.png') }}"
                                                alt="{{ $related_product->seo_title }}" class="primary" width="350"
                                                width="449">
                                        @endif
                                    </a>
                                </div>
                                <div class="most-product-content">
                                    <div class="product-rating">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h4><a href="#">{{ $related_product->name }}</a></h4>
                                    <div class="product-price">
                                        <ul>
                                            <li>{{ $related_product->price }}</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
