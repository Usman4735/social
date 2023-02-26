@extends('web.layout.template')
@section('page_title', 'News')
@section('breadcrum')
    <li><a href="{{ url('/') }}">Home</a></li>
    <li><a href="javascript:void(0)" class="active">News</a></li>
@endsection
<style>
    .product-wrapper-content .product-details p {
        margin: unset !important;
    }
</style>
@section('content')
    <div class="container">

        <div class="tab-content">
            <div class="tab-pane fade show active" id="list">

                @foreach ($news as $single_news)
                    <div class="single-shop mb-30">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-12">
                                <div class="product-wrapper-2">
                                    <div class="">
                                            <a href="/news/{{ $single_news->GetSlug() }}">

                                            <img src="{{ asset('storage/news-images') }}/{{ $single_news->image }}"
                                                height="200px" alt="News Image" class="primary">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8 col-12">
                                <div class="product-wrapper-content">
                                    <div class="product-details">
                                            <a href="/news/{{ $single_news->GetSlug() }}">
                                            <h4>{{ $single_news->title }}</h4>
                                            <p>{{ $single_news->created_at->diffForHumans() }}</p>
                                            <p>{!! $single_news->short_description !!}</p>
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
