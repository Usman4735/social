@extends('web.layout.template')
@section('page_title', 'News')
@section('breadcrum')
    <li><a href="{{ url('/') }}">Home</a></li>
    <li><a href="{{ url('news') }}" class="active">News</a></li>
@endsection
@section('content')
    <div class="blog-main-area mb-70">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-12 order-lg-2 order-1">
                    <div class="blog-main-wrapper">
                        <div class="author-destils mb-30">
                            <div class="author-left">
                                <div class="author-description">
                                    <p>
                                            <a href="/news/{{ $news->GetSlug() }}">

                                            <h1>{{ $news->title }}</h1>
                                        </a>
                                    </p>
                                    <span>{{ date('M d Y', strtotime($news->created_at)) }}</span>
                                </div>

                            </div>
                            <div class="author-right">
                                <span>Share this:</span>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog-img mb-30">
                            <img src="{{ asset('storage/news-images') }}/{{ $news->image }}" alt="blog" />
                        </div>
                        <div class="single-blog-content">
                            <div class="single-blog-title">
                                <h2>{{ $news->title }}</h2>
                            </div>
                            <div class="blog-single-content">
                                {!! $news->long_description !!}
                            </div>
                        </div>
                        <div class="comment-tag">
                            <p>03 Comments/Tags: Asian, t-shirt, teen </p>
                        </div>
                        <div class="sharing-post mt-20">
                            <div class="share-text">
                                <span>Share this post</span>
                            </div>
                            <div class="share-icon">
                                <ul>
                                    <li><a href="{{ url('http://www.facebook.com/sharer.php?u=') }}{{ Request::url() }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="container">
        <h3>Related News</h3>
        <br>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="list">

                    @foreach ($blogs as $blog)
                        <div class="single-shop mb-30">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-12">
                                    <div class="product-wrapper-2">
                                        <div class="">

                                            <a href="/news/{{ $blog->GetSlug() }}">

                                                <img src="{{ asset('storage/news-images') }}/{{ $blog->image }}"
                                                    height="200px" alt="News Image" class="primary">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-8 col-12">
                                    <div class="product-wrapper-content">
                                        <div class="product-details">

                                            <a href="/news/{{ $blog->GetSlug() }}">

                                                <h4>{{ $blog->title }}</h4>
                                                <p>{{  date('M d Y', strtotime($blog->created_at)) }}</p>


                                                <p>{!! $blog->short_description !!}</p>
                                                Read more <i class="fa fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>

    </div>
@endsection
