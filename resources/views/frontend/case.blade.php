@extends('frontend.layouts.app')
@section('title','Case Study')
<style>
    .filter {
        margin: 30px 0 10px;
    }

    .filter .btn {
        border: 1px solid #ccc;
    }

    .filter .btn:hover {
        background: #337ab7;
        color: #fff;
        border: none;
    }

    .boxes {
        display: flex;
        flex-wrap: wrap;
    }

    .boxes a {
        width: 23%;
        border: 2px solid #333;
        margin: 0 1% 20px 1%;
        line-height: 60px;
    }

    .filter a.active:before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        display: inline-block;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 15px 15px 0 0;
        border-color: #333 transparent transparent transparent;
    }

    .boxes .card {
        border: none !important;
        box-shadow: 0 0 10px rgb(0, 0, 0, 0.1);
    }

    .is-animated {
        animation: 0.6s zoom-in;
    }

    @keyframes zoom-in {
        0% {
            transform: scale(0.1);
        }
        100% {
            transform: none;
        }
    }
</style>
@section('content')
    <!-- banner -->
    <div class="page-banner" style="height:450px;z-index:0">
        <div class="">
            <div>
                @if($slider)
                    <img src="{{$slider->getMedia('images')->last()->getFullUrl()}}">
                    <div class="page-banner-content">
                        <h1 class="text-White">{{$slider->highlight_text}}</h1>
                    </div>
                @else
                    <img
                        width="100%"
                        src="https://www.sharda.ac.in/blog/wp-content/uploads/2017/08/4-Main-Types-of-Law-Which-One-Is-the-Best-For-You.jpg"
                        alt=""/>
                    <div class="page-banner-content">
                        <h1 class="text-White">Case Study</h1>
                    </div>
                @endif
            </div>
            <div class="breadcrumb">
                Home | &nbsp; <span> <b>Case Study</b></span>
            </div>
        </div>
    </div>

    <!-- Cases -->
    <section class="cases" style="padding: 100px 0px">
        <div class="container">
            <div class="row">
                <div class="cta filter">
                    <a class="btn" data-filter="all" href="{{route('home.case')}}">
                        All Case
                    </a>
                    @forelse($categories as $category)
                        <a class="btn" data-filter="all" href="{{route('category.cases',$category->slug)}}"
                           role="button">
                            {{$category->name}}
                        </a>
                    @empty
                    @endforelse
                </div>

                <div class="boxes row cases">
                    @forelse($cases as  $case)
                        <div class="col-md-4 mb-4">
                            <div class="card" data-category="criminal">
                                @if($case->image)
                                    <img width="100%" src="{{$case->getMedia('images')->last()->getFullUrl()}}"
                                         alt="" class="card-img-top"/>
                                @else
                                    <img width="100%" src="{{asset('dist/default1.jpg')}}"
                                         alt="" class="card-img-top"/>
                                @endif
                                <a href="{{route('case.details',$case->slug)}}">
                                    <div class="card-body">
                                        <h5 class="card-text text-center" style="font-style: 18px">
                                            {{$case->case_name}}
                                        </h5>
                                        <p class="text-center mb-2">{!! Str::limit($case->description, 20) !!}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection

