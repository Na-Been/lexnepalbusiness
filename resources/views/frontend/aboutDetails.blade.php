@extends('frontend.layouts.app')
@section('title','About Us Details')
@section('content')
    <!-- banner -->
    <div class="page-banner">
        <div class="your-class">
            <div>
                @if($slider)
                    <img width="100%" src="{{$slider->getMedia('images')->last()->getFullUrl()}}">
                @else
                    <img
                        width="100%"
                        src="https://www.sharda.ac.in/blog/wp-content/uploads/2017/08/4-Main-Types-of-Law-Which-One-Is-the-Best-For-You.jpg"
                        alt=""/>
                @endif
                <div class="page-banner-content">
                    <h1 class="text-White">About Us</h1>
                </div>
            </div>
            <div class="breadcrumb">
                Home | &nbsp; <span> <b>About</b></span>
            </div>
        </div>
    </div>


    <!-- services -->
    <section class="practice-services" style="padding: 100px 0px">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="section-title-top">About Us</p>
                    <h2 class="section-title pb-5">{{ucfirst($findAbout->title)}}</h2>
                    <p>
                        A full service law firm in <strong>Kathmandu</strong> that has
                        been recognised internationally with specialisation in Commercial.
                    </p>
                </div>
                <div class="col-md-6">
                    @if($findAbout->image)
                        <img width="100%"
                             src="{{$findAbout->getMedia('images')->last()->getFullUrl()}}"
                             alt=""/>
                    @else
                        <img width="100%"
                             src="{{asset('dist/default1.jpg')}}"
                             alt=""/>
                    @endif
                    <p>
                        {!! $findAbout->description !!}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="practice_service" class="practice_service_section">
        <div class="container">
            <div class="section_title_area text-center headline">
                <p class="section-title-top text-center">
                    <span class="title_shape"></span>
                    Services</p>
                <h2 class="section-title mb-5">Our Practice Area</h2>
            </div>
            <div class="service_content">
                <div class="row">
                    @forelse($services as $service)
                        <div class="col-lg-4 col-md-6">
                            <div class="service_icon_text text-center">
                                <div class="service_icon"></div>
                                <div class="service_text">
                                    <h3 class="pb-3">
                                        <a class="text-dark" href="#">{{ucfirst($service->name)}}</a>
                                    </h3>
                                    <p>
                                        {!! Str::limit($service->description,20) !!}
                                    </p>
                                </div>
                                <div class="service_arrow_btn">
                                    <a href="{{route('service.details',$service->slug)}}"><i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
