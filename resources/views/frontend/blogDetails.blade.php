@extends('frontend.layouts.app')
@section('title','Blog Details')
@section('content')

    <!-- banner -->

    <div class="page-banner">

        <div style="height:450px;z-index:0">
            @if($slider)
                <img width="100%" src="{{$slider->getMedia('images')->last()->getFullUrl()}}">
            @else
                <img
                    width="100%"
                    src="https://www.sharda.ac.in/blog/wp-content/uploads/2017/08/4-Main-Types-of-Law-Which-One-Is-the-Best-For-You.jpg"
                    alt=""
                />
            @endif

            <div class="page-banner-content">
                <h2 class="text-White text-start blog-detail-title" style="">{{$findBlog->name}}</h2>
                <div class="d-flex">
                    <div class="t-left">
                        @if($findBlog->image)
                            <img width="60" height="60" src="{{$findBlog->getMedia('images')->last()->getFullUrl()}}"/>
                        @else
                            <img width="60" height="60" src="{{asset('dist/default1.jpg')}}">
                        @endif
                    </div>
                    <div class="t-right ms-2">
                        <h5 class="card-text " style="font-size: 18px">
                            {{$findBlog->added_by}}
                        </h5>
                        <p class=" mb-2 blog-date">{{$findBlog->created_at->format('Y-m-d')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- services -->
    <section class="practice-services" style="padding: 100px 0px">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="blog-description">
                        {!! $findBlog->description !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="blog-help p-4 mb-4">

                        <h4>How Can We help?</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>

                        <a class="btn btn-primary w-100" href="{{route('home.contact')}}">Contact Us</a>
                    </div>
                    <div class="blog-trending p-3">
                        <h4>Services</h4>
                        <ul>
                            @forelse($services as $service)
                                <li class="d-flex">
                                    <div class="t-left">
                                        @if($service->image)
                                            <img width="70" height="70"
                                                 src="{{$service->getMedia('images')->last()->getFullUrl()}}">
                                        @else
                                            <img width="70" height="70"
                                                 src="https://advice.owl.team/orion/wp-content/uploads/sites/2/2017/05/sara-santandrea-214841-1-copy-150x150.jpg"/>
                                        @endif
                                    </div>
                                    <a href="{{route('service.details',$service->slug)}}">
                                        <div class="t-right ms-2">
                                            <p class=" mb-2 blog-date">{{$service->created_at->format('Y-m-d')}}</p>
                                            <h5 class="card-text " style="font-size: 18px">
                                                {{$service->name}}
                                            </h5>
                                        </div>
                                    </a>
                                </li>
                                <hr/>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
