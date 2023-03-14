@extends('web.layout.template')
@section('page_title', 'News')


<style>
    .product-wrapper-content .product-details p {
        margin: unset !important;
    }

    #pagination svg,
    div.dataTables_wrapper div.dataTables_info {
        display: none;
    }

    #pagination p {
        margin-top: 10px;
    }

    .flex-1,
    .leading-5 {
        text-align: center;
    }

    #pagination nav a,
    #pagination nav span {
        color: #7064f5 !important;
    }

    #pagination nav .hidden .z-0 {
        display: none;
    }

    .required:after {
        content: " *";
        color: #7064f5;
    }

    .custom-control-input:checked~.custom-control-label::before {
        color: #fff;
        border-color: #7064f5;
        background-color: #7064f5;
    }

    .packaging-button {
        background: none !important;
        border: none;
        padding: 0 !important;
        color: #7064f5;
    }
</style>
@section('content')
<div class="breadcrumbs-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-menu">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="javascript:void(0)" class="active">News</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container">

        <div class="tab-content my-5">
            <div class="tab-pane fade show active" id="list">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center mb-30 section-title-res">
                            <h2>Latest from our blog</h2>
                        </div>
                    </div>
                </div>
                @foreach ($news as $single_news)
                    @if ($loop->index == 0)
                        <div class="row mb-50">
                            <div class="col-lg-6 col-md-4 col-12">
                                <a href="/news/{{ $single_news->GetSlug() }}">
                                    <img src="{{ asset('/news-images') }}/{{ $single_news->image }}" alt="News Image"
                                        class="primary">
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-8 col-12">
                                <h4>{{ $single_news->title }}</h4>
                                <p>{{ $single_news->created_at->diffForHumans() }}</p>
                                <p>{!! $single_news->short_description !!}</p>
                                <a href="/news/{{ $single_news->GetSlug() }}">
                                    Read more <i class="fa fa-long-arrow-right"></i>
                                </a>


                            </div>
                        </div>
                    @else
                        <div class="single-shop mb-30">

                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-12">
                                    <div class="product-wrapper-2">
                                        <div class="">
                                            <a href="/news/{{ $single_news->GetSlug() }}">

                                                <img src="{{ asset('/news-images') }}/{{ $single_news->image }}"
                                                    height="200px" alt="News Image" class="primary">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-8 col-12">
                                    <div class="product-wrapper-content">

                                        <h4>{{ $single_news->title }}</h4>
                                        <p>{{ $single_news->created_at->diffForHumans() }}</p>
                                        <p>{!! $single_news->short_description !!}</p>
                                        <a href="/news/{{ $single_news->GetSlug() }}">
                                            Read more <i class="fa fa-long-arrow-right"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-3" id="pagination">
                    {{ $news->appends(request()->query())->links() }}
                </div>


            </div>
        </div>


    </div>

@endsection
