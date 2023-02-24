@extends('web.layout.template')
@section('page_title', 'Hoy To Buy')
@section('breadcrum')
    <li><a href="#">Home</a></li>
    <li><a href="#" class="active">Hoy To Buy</a></li>
@endsection
<style>

    .res-circle {
        /* (A) PERCENTAGE WIDTH & BORDER RADIUS */
        width: 40%;
        border-radius: 50%;

        /* (B) BACKGROUND COLOR */
        background: #bcd6ff;

        /* (C) NECESSARY TO POSITION TEXT BLOCK */
        line-height: 0;
        position: relative;
        text-align: center;

    }

    /* (D) MATCH HEIGHT */
    .res-circle::after {
        content: "";
        display: block;
        padding-bottom: 100%;
    }

    /* (E) TEXT BLOCK */
    .circle-txt {
        /* (E1) CENTER TEXT IN CIRCLE */
        position: absolute;
        bottom: 50%;
        width: 100%;
        text-align: center;

        /* (E2) THE FONT - NOT REALLY IMPORTANT */
        font-family: arial, sans-serif;
        font-weight: bold;
        font-size: 25px;
    }
</style>
@section('content')
    <div class="container">
        <h1 class="text-center">3 Easy Steps To Buy An Account</h1>
        <div class="row mt-5 mb-5">
            <div class="col-lg-3">
                <div class="res-circle text-center">
                    <div class="circle-txt">1</div>
                </div>
            </div>
            <div class="col-lg-9">
                <h6>abc</h6>
                <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>
            </div>
        </div>
        <div class="row mt-5 mb-5">
            <div class="col-lg-3">
                <div class="res-circle text-center">
                    <div class="circle-txt">2</div>
                </div>
            </div>
            <div class="col-lg-9">
                <h6>abc</h6>
                <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>
            </div>
        </div>
        <div class="row mt-5 mb-5">
            <div class="col-lg-3">
                <div class="res-circle text-center">
                    <div class="circle-txt">3</div>
                </div>
            </div>
            <div class="col-lg-9">
                <h6>abc</h6>
                <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>
            </div>
        </div>
    </div>

@endsection
