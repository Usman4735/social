@php
    use Illuminate\Support\Facades\DB;
    use App\Models\ProductGroup;
    Illuminate\Support\Facades\Session::forget('cartinfo');
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
                        <h2>Thank You Order Placed Successfully</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <p>
                                You purchase [product name] worth 100 RUB. To purchase the selected product, pay 100 RUB
                                to <strong>QIWI wallet: [seller's wallet number]</strong>.
                                Payment comment - <strong>Payment ID: 123456</strong>
                                <br>
                                <br>
                                <strong>Attention</strong> : Be sure to indicate this comment when paying, otherwise the payment will not
                                be credited automatically.
                                <br>
                                <br>
                                <strong>Order No. {{ $order->order_no }}</strong>
                                <br>
                                <br>
                                This is your order number. Remember it. By the order number and comment, you can find
                                out the order status on the "Order Check" page. After payment, click the button to get
                                the address.
                            </p>
                        </div>
                    </div>
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
                                                src="{{ asset('storage/product-group-images') }}/{{ $related_product->image }}"alt="book" />
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
