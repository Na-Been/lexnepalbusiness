@extends('frontend.layouts.app')
@section('title','Contact')
@section('content')

    <style>
        .contact-right ul li {
            margin-bottom: 25px;
            color: #fff;
        }

        .contact-right ul li i {
            color: #fff;
            font-size: 18px;
            padding: 10px;
            border-radius: 50%;
            border: 1px solid #fff;
            margin-right: 15px;

        }
    </style>
    <!-- banner -->
    <div class="page-banner" style="height:450px;overflow:hidden;z-index:0">
        <div class="">
            <div>
                @if($slider)
                    <img width="100%" src="{{$slider->getMedia('images')->last()->getFullUrl()}}">
                @else
                    <img
                        width="100%"
                        src="https://www.sharda.ac.in/blog/wp-content/uploads/2017/08/4-Main-Types-of-Law-Which-One-Is-the-Best-For-You.jpg"
                        alt=""
                    />
                @endif
            </div>
            <div class="banner-content">

                <h1>Contact Us</h1>
            </div>

        </div>
    </div>
    <section class="project-estimation">
        <div class="container">
            <div classs="row" style="position:relative">
                <div class="card p-5 mx-auto"
                     style="z-index:1;margin-top:-100px;background:#fff;border:none;box-shadow:0 0 10px rgba(0,0,0,0.1);position:absolute;width:100%">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="section-title-top "><span class="title_shape"></span>Make Appointment</p>
                            <p class="">Fill out the form below to recieve a free and confidential intial
                                consultation.</p>
                            <form action="{{route('user.appointment')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="Enter Your Full Name">
                                        </div>
                                        @error('name')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                        <div class="form-group mb-2">
                                            <input type="text" name="phone_number" class="form-control"
                                                   placeholder="Enter Your Phone">
                                        </div>
                                        @error('phone_number')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror

                                        <div class="form-group mb-2">
                                            <input type="date" name="project_date" class="form-control"
                                                   placeholder="Enter Date">
                                        </div>
                                        @error('project_date')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror

                                        <div class="form-group mb-2">
                                            <input type="text" name="subject" class="form-control"
                                                   placeholder="Enter Subject">
                                        </div>
                                        @error('subject')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <input type="email" class="form-control" name="email"
                                                   placeholder="Enter Your Email Address" required>
                                        </div>
                                        @error('email')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                        <div class="form-group mb-2">
                                            <div class="mb-3">
                                                <textarea style="height: auto" class="form-control"
                                                          id="exampleFormControlTextarea1" rows="6" name="message"
                                                          placeholder="Enter Your message "></textarea>
                                            </div>
                                            @error('message')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div>

                                        <div class="submit-btn text-center">
                                            <button type="submit" class="btn btn-primary text-uppercase w-100">
                                                <b>Submit Now</b>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4 contact-right" style="background:#2E364B">
                            <div class="px-3 py-5">
                                <h3 class="title text-white"> Contact us</h3>
                            </div>
                            <ul class="px-3">
                                <li>
                                    <i class="las la-phone"></i>
                                    {{getSetting('mobile_number')}} | {{getSetting('phone_number')}}
                                </li>
                                <li>
                                    <i class="las la-envelope"></i>
                                    {{getSetting('email')}}
                                </li>
                                <li>
                                    <i class="las la-map-marker-alt"></i>
                                    {{getSetting('address')}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe style="width:100% ; height:700px" id="gmap_canvas"
                        src="https://maps.google.com/maps?q=kathmandu,lexnepal&t=&z=15&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                <a href="https://putlocker-is.org"></a><br>
                <style>.mapouter {
                        position: relative;
                        text-align: right;
                        height: 700px
                    }</style>
                <a href="https://www.embedgooglemap.net">responsive google map embed</a>
                <style>.gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        height: 700px;
                        width: 100%;
                    }</style>
            </div>
        </div>
    </section>

@endsection
