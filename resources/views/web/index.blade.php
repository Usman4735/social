@extends('web.layout.template')
@section('page_title', 'Home')
@section('content')
    <div class="new-book-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center pt-100 mb-30 section-title-res">
                        <h2>Featured Books</h2>
                    </div>
                </div>
            </div>
            <div class="tab-active owl-carousel">
                @foreach ($product_groups as $group)
                    <!-- single-product-start -->
                    <div class="tab-total">
                        <div class="product-wrapper mb-40">
                            <div class="product-img">
                                <a href="#">
                                    <img src="{{ asset('storage/product-group-images') }}/{{ $group->image }}" alt="{{ $group->seo_title }}" class="primary">
                                </a>
                                <div class="quick-view">
                                    <a class="action-view product_view" href="javascript:void();"  url="products/quick-view/{{ $group->id }}" data-target="#quickViewProductModal" data-toggle="modal"
                                        title="Quick View">
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
                                <h4><a href="#">{{ $group->name }}</a></h4>
                                <div class="product-price">
                                    <ul>
                                        <li>{{ $group->price }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-link">
                                <div class="product-button">
                                    <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="add-to-link">
                                    <ul>
                                        <li><a href="products/view/{{ $group->id }}" title="Details"><i
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
    {{-- testimonials --}}
    <div class="testimonial-area ptb-100 bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-30 section-title-res">
                        <h2>Feedback From Our Client</h2>
                    </div>
                </div>
                <div class="container">
                    <div class="testimonial-active owl-carousel owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage">
                                @foreach ($testimonials as $feedback)
                                    <div class="owl-item active" style="width: 960px;">
                                        <div class="col-lg-12">
                                            <div class="single-testimonial text-center">
                                                {{-- <img src="{{asset('storage/testimonial-images')}}/{{$feedback->image}}" alt="Testimonial Image" class="testimonial-image" style="owl-carousel: unset"> --}}
                                                <div class="testimonial-img">
                                                    <a></a>
                                                </div>
                                                <div class="testimonial-text">
                                                    <p>{{ $feedback->description }}</p>
                                                    <a href="#"><span>{{ $feedback->name }}</span></a>
                                                </div>
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
    </div>

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
                                                    <img src="{{ asset('storage/news-images') }}/{{ $blog->image }}"
                                                        alt="{{ $blog->seo_title }}" height="200px">
                                                </div>
                                                <div class="post-content">
                                                    <br>
                                                    <h6>{{ $blog->title }}</h6>
                                                    <p></p>
                                                    {!! $blog->short_description !!}
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
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
      url: "{{url('/')}}/" + url,
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

