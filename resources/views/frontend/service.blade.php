@extends('frontend.layouts.app')
@section('title','Service')
@section('content')

    <!-- banner -->

    <div class="page-banner">
        <div class="your-class">
            <div>
                @if($slider)
                    <img width="100%" src="{{$slider->getMedia('images')->last()->getFullUrl()}}">
                    <div class="page-banner-content">
                        <h1 class="text-White">{{$slider->highlight_text}}</h1>
                    </div>
                @else
                    <img
                        width="100%"
                        src="https://www.sharda.ac.in/blog/wp-content/uploads/2017/08/4-Main-Types-of-Law-Which-One-Is-the-Best-For-You.jpg"
                        alt=""/>
                    <div class="page-banner-content">
                        <h1 class="text-White">Practice Area</h1>
                    </div>
                @endif
            </div>
            <div class="breadcrumb ">Home | &nbsp; <span> <b>Services</b></span></div>

        </div>


        <!-- services -->
        <section class="practice-services" style="padding: 100px 0px">
            <div class="container">
                <div class="row">
                    @forelse($services as $service)
                        <div class="col-md-3">
                            <div class="card">
                                @if($service->image)
                                    <img src="{{$service->getMedia('images')->last()->getFullUrl()}}" alt=""
                                         class="card-img-top"/>
                                @else
                                    <img src="{{asset('dist/default1.jpg')}}" alt=""
                                         class="card-img-top"/>
                                @endif
                                <a href="{{route('service.details',$service->slug)}}">
                                    <div class="card-body">
                                        <h5 class="card-text text-center" style="font-style: 18px">
                                            {{$service->name}}
                                        </h5>
                                        <p class="text-center mb-2">{!! Str::limit($service->description,20) !!}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </section>

        <!-- project estimation -->
        <section class="project-estimation">
            <div class="container">
                <p class="section-title-top text-center"><span class="title_shape"></span>Contact</p>
                <h2 class="section-title text-center pb-5">Estimate Your Project</h2>
                <form action="{{route('user.appointment')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control"
                                       placeholder="Enter Your Full Name">
                            </div>
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <input type="text" name="phone_number" class="form-control"
                                       placeholder="Enter Your Phone">
                            </div>
                            @error('phone_number')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <input type="date" name="project_date" class="form-control"
                                       placeholder="Enter Date">
                            </div>
                            @error('project_date')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control"
                                       placeholder="Enter Subject">
                            </div>
                            @error('subject')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email"
                                       placeholder="Enter Your Email Address" required>
                            </div>
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="mb-3">
                                    <textarea style="height: auto" name="message" class="form-control"
                                              id="exampleFormControlTextarea1"
                                              rows="8" placeholder="Enter Your message "></textarea>
                                </div>
                            </div>
                        </div>
                        @error('message')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="submit-btn text-center">
                        <button class="btn btn-primary text-uppercase" type="submit">
                            <b>Submit Now</b>
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <!-- advice -->
        <section class="advice">
            <div class="container">
                <div class="section-area m-auto">
                    <p class="section-title-top text-center">24+ YEARS OF EXPERIENCE</p>
                    <h2 class="section-title text-center mb-5">
                        <strong> Need An Advice From Expert Attorney</strong>
                    </h2>
                    <p class="text-center mb-5 phone-no">{{getSetting('mobile_number')}}
                        | {{getSetting('phone_number')}}</p>
                    <div class="button-group text-center">
                        <button
                            class="btn btn-primary text-uppercase px-5"
                            style="letter-spacing: 2px"
                        >
                            <b>Get a Quote</b>
                        </button>
                        <button
                            class="btn btn-primary text-uppercase px-5"
                            style="letter-spacing: 2px"
                        >
                            <b> Learn More</b>
                        </button>
                    </div>
                </div>
            </div>
        </section>
@endsection
