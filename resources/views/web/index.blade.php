@extends('web.layout.template')
@section('page_title', 'Home')
<Style>
    .custom-img-wrapper {
        height: 350;
        width: 100%
    }

    .custom-img {
        height: 230px;
        width: 100%;
        object-fit: cover;
    }

    .fa {
        margin-top: 12px
    }

    .product-img a img {
        /* padding: 5px 5px 0px 5px; */
    }
</Style>
@section('content')
    <!-- slider-area-start -->
    <div class="slider-area">
        <div class="slider-active owl-carousel">
            <div class="single-slider pt-125 pb-130 bg-img" style="background-image:url('{{ asset('img/slider/1.jpg') }}'');">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="slider-content slider-animated-1 text-center">
                                <h1>Huge Sale</h1>
                                <h2>koparion</h2>
                                <h3>Now starting at £99.00</h3>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider slider-h1-2 pt-215 pb-100 bg-img"
                style="background-image:url(/public/img/slider/2.jpg);">
                <div class="container">
                    <div class="slider-content slider-content-2 slider-animated-1">
                        <h1>We can help get your</h1>
                        <h2>Books in Order</h2>
                        <h3>and Accessories</h3>
                        <a href="#">Contact Us Today!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-area-end -->

    <div class="product-area pt-95 xs-mb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-50">
                        <h2>Top Categorys</h2>
                        <p>Browse the collection of our best selling and top interresting products. <br /> ll definitely
                            find what you are looking for..</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($product_goods as $good)
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12 mt-4">
                        <div class="product-wrapper custom-img-wrapper">
                            <div class="product-img custom-img">
                                <a href="#">
                                    @if ($good->image != null)
                                        <img src="{{ asset('/product-group-images') }}/{{ $good->image }}"
                                            alt="{{ $good->seo_title }}" class="primary" width="350" width="449">
                                    @else
                                        <img src="{{ asset('assets/images/no-image.png') }}" alt="{{ $good->seo_title }}"
                                            class="primary" width="350" width="449">
                                    @endif
                                </a>
                                <div class="quick-view">
                                    <a class="action-view product_view" href="javascript:void();"
                                        url="products/quick-view/{{ $good->id }}" data-target="#quickViewProductModal"
                                        data-toggle="modal" title="Quick View">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                </div>
                                <div class="product-flag">
                                    <ul>
                                        <li><span class="sale">new</span></li>
                                        <li><span class="discount-percentage">-5%</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating text-primary">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                                <h4><a href="#">{{ $good->name }}</a></h4>
                                <div class="product-price">
                                    <ul>
                                        <li>${{ $good->price }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-link">
                                <div class="product-button">
                                    <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="add-to-link">
                                    <ul>
                                        <li><a href="products/view/{{ $good->id }}" title="Details"><i
                                                    class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

        </div>
    </div>
    <div class="new-book-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center pt-100 mb-30 section-title-res">
                        <h2>Featured Products </h2>
                    </div>
                </div>
            </div>
            <div class="tab-active owl-carousel">
                @foreach ($product_goods as $good)
                    <!-- single-product-start -->
                    <div class="tab-total">
                        <div class="product-wrapper mb-40">
                            <div class="product-img">
                                <a href="#">
                                    @if ($good->image != null)
                                        <img src="{{ asset('/product-group-images') }}/{{ $good->image }}"
                                            alt="{{ $good->seo_title }}" class="primary">
                                    @else
                                        <img src="{{ asset('assets/images/no-image.png') }}" alt="{{ $good->seo_title }}"
                                            class="primary" width="350" width="449">
                                    @endif
                                </a>
                                <div class="quick-view">
                                    <a class="action-view product_view" href="javascript:void();"
                                        url="products/quick-view/{{ $good->id }}" data-target="#quickViewProductModal"
                                        data-toggle="modal" title="Quick View">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                </div>
                                <div class="product-flag">
                                    <ul>
                                        <li><span class="sale">new</span> </li>
                                        <li><span class="discount-percentage">-5%</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h4><a href="#">{{ $good->name }}</a></h4>
                                <div class="product-price">
                                    <ul>
                                        <li>{{ $good->price }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-link">
                                <div class="product-button">
                                    <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to
                                        cart</a>
                                </div>
                                <div class="add-to-link">
                                    <ul>
                                        <li><a href="products/view/{{ $good->id }}" title="Details"><i
                                                    class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- single-product-end -->
                @endforeach

            </div>
        </div>
    </div>

    <!-- three stepts start -->
    <div class="container">

        <div class="col-md-12 mt-5">
            <h2 class="text-center">3 easy stepts to buy an account</h2>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="d-flex">
                        <div class="rounded-block my-4">1</div>
                        <p class="ml-2">
                            <strong class="text-primary">Determine the right service</strong>
                            <br>
                            Lots of text here...With the four tiers of grids available you're bound to run
                            into issues where, at certain breakpoints
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="d-flex">
                        <div class="rounded-block my-4">2</div>
                        <p class="ml-2">
                            <strong class="text-primary">Determine the right service</strong>
                            <br>
                            Lots of text here...With the four tiers of grids available you're bound to run
                            into issues where, at certain breakpoints, your columns don't clear .
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="d-flex">
                        <div class="rounded-block my-4">3</div>
                        <p class="ml-2">
                            <strong class="text-primary">Determine the right service</strong>
                            <br>
                            Lots of text here...With the four tiers of grids available you're bound to run
                            into issues where, at certain breakpoints,
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- testimonials --}}
    @if (count($testimonials) > 0)

        <div class="testimonial-area ptb-100 bg-white">
            <div class="container">
                <h2 class="text-center">Feedback our clients </h2>

                <div class="row mt-4">
                    <div class="testimonial-active owl-carousel">
                        @foreach ($testimonials as $feedback)
                            <div class="col-lg-12">
                                <div class="single-testimonial text-center">
                                    <div class="testimonial-img">
                                        <a href="#">
                                            {{-- <img src="images/profile.jpg" alt=""> --}}
                                            <img src="{{ asset('storage/testimonial-images') }}/{{ $feedback->image }}"
                                                alt="Testimonial Image" class="testimonial-image"
                                                style="owl-carousel: unset">

                                        </a>
                                    </div>
                                    <div class="testimonial-text">
                                        <p>{{ $feedback->description }}</p>
                                        <a href="#"><span>{{ $feedback->name }}</span></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- recent blog --}}
    <div class="recent-post-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-30 section-title-res">
                        <h2>Latest from our blog</h2>
                    </div>
                </div>
                <div class="post-active owl-carousel text-center owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage" style="">
                            @foreach ($news as $blog)
                                <div class="owl-item active" style="width: 320px;">
                                    <div class="col-lg-12">
                                        <div class="single-post">
                                            <a href="/news/{{ $blog->GetSlug() }}">
                                                <div class="post-img">
                                                    @if ($blog->image != null)
                                                        <img src="{{ asset('/news-images') }}/{{ $blog->image }}"
                                                            alt="{{ $blog->seo_title }}" height="200px">
                                                    @else
                                                        <img src="{{ asset('images/no-image.png') }}/{{ $blog->image }}"
                                                            alt="{{ $blog->seo_title }}" height="200px">
                                                    @endif
                                                </div>
                                                <div class="post-content">
                                                    <br>
                                                    <h6>{{ $blog->title }}</h6>
                                                    <p></p>

                                                    @if (strlen($blog->short_description) > 150)
                                                        {!! substr($blog->short_description, 0, 150) !!}
                                                    @else
                                                        {!! $blog->short_description !!}
                                                    @endif

                                                </div>
                                            </a>
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





    <div class="modal fade" id="quickViewProductModal" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(".product_view").on("click", function() {
            let url = $(this).attr("url");
            $(this).prop('disabled', true);
            $.ajax({
                url: "{{ url('/') }}/" + url,
                method: "GET",
                success: function(data) {

                    $("#quickViewProductModal .modal-body").html(data);
                    $('.product_view').removeAttr('disabled');
                    $("#quickViewProductModal").modal("show");
                }
            });
        });
    </script>
@endsection
