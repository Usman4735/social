@extends('web.layout.template')
@section('page_title', 'Hoy To Buy')
@section('breadcrum')
    <li><a href="#">Home</a></li>
    <li><a href="#" class="active">Hoy To Buy</a></li>
@endsection

@section('content')
    <div class="container">
        <div class="breadcrumbs-area mb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-menu">
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ url('/how-to-buy') }}" class="active">How To Buy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-5">
            <h2 class="text-center">3 Easy Stepts to Buy an Account</h2>
            {{-- desktop --}}
            <div class="row d-md-none d-none d-lg-block mt-4">
                <div class="col-md-4 col-lg-12">
                    <div class="d-flex">
                        <div class="rounded-block2 my-4">1</div>
                        <p class="ml-2 custom-p">
                           <strong class="text-primary" style="font-size: 20px">Determine the right service</strong>
                            <br>
                            Lots of text here...With the four tiers of grids available you're bound to run
                            into issues where, at certain breakpoints, your columns don't clear quite right as one is taller
                            than the other.</p>
                    </div>
                </div>

                <div class="col-md-4 col-lg-12">
                    <div class="d-flex">
                        <div class="rounded-block2 my-4">2</div>
                        <p class="ml-2 custom-p">
                           <strong class="text-primary" style="font-size: 20px">Select account type</strong><br> Lots of text here...With the four tiers of grids available you're bound to run
                            into issues where, at certain breakpoints, your columns don't clear quite right as one is taller
                            than the other.</p>
                    </div>
                </div>

                <div class="col-md-4 col-lg-12">
                    <div class="d-flex">
                        <div class="rounded-block2 my-4">3</div>
                        <p class="ml-2 custom-p"><strong class="text-primary" style="font-size: 20px">Pay for the order and get an account</strong><br> Lots of text here...With the four tiers of grids available you're bound to run
                            into issues where, at certain breakpoints, your columns don't clear quite right as one is taller
                            than the other.</p>
                    </div>
                </div>
            </div>

            {{-- mobile --}}
            <div class="row d-lg-none d-block fix mt-4">
                <div class="col-md-4 col-lg-12">
                    <div class="d-flex">
                        <div class="rounded-block my-4">1</div>
                        <p class="ml-2">
                            <strong class="text-primary">Determine the right service</strong>
                            <br>
                            Lots of text here...With the four tiers of grids available you're bound to run
                            into issues where, at certain breakpoints, your columns don't clear quite right as one is taller
                            than the other.</p>
                    </div>
                </div>

                <div class="col-md-4 col-lg-12">
                    <div class="d-flex">
                        <div class="rounded-block my-4">2</div>
                        <p class="ml-2">
                           <strong class="text-primary">Select account type</strong><br> Lots of text here...With the four tiers of grids available you're bound to run
                            into issues where, at certain breakpoints, your columns don't clear quite right as one is taller
                            than the other.</p>
                    </div>
                </div>

                <div class="col-md-4 col-lg-12">
                    <div class="d-flex">
                        <div class="rounded-block my-4">3</div>
                        <p class="ml-2"><strong class="text-primary">Pay for the order and get an account</strong><br> Lots of text here...With the four tiers of grids available you're bound to run
                            into issues where, at certain breakpoints, your columns don't clear quite right as one is taller
                            than the other.</p>
                    </div>
                </div>
            </div>
        </div>
         {{-- testimonials --}}
    @if(count($testimonials)>0)

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
                                        <img src="{{asset('storage/testimonial-images')}}/{{$feedback->image}}" alt="Testimonial Image" class="testimonial-image" style="owl-carousel: unset">

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
    </div>
@endsection
