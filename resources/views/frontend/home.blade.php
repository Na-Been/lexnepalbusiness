@extends('frontend.layouts.app')
@section('title','Home')
@section('content')
    <!-- banner -->
    <div class="banner">

        <div class="your-class">
            <div>
                @if($slider)
                    <div class="overlay"></div>
                    @if($slider->image)
                        <img width="100%" src="{{$slider->getMedia('images')->last()->getFullUrl()}}" alt=""/>
                    @else
                        <img width="100%"
                             src="https://www.sharda.ac.in/blog/wp-content/uploads/2017/08/4-Main-Types-of-Law-Which-One-Is-the-Best-For-You.jpg"
                             alt=""/>
                    @endif
                    <div class="banner-content">
                        <h5 class="text-uppercase text-center" style="color: #a4a29e8a">
                            <b>{{$slider->name}}</b>
                        </h5>
                        <h1>{{$slider->highlight_text}}</h1>
                    </div>
                @else
                    <img width="100%"
                         src="https://www.sharda.ac.in/blog/wp-content/uploads/2017/08/4-Main-Types-of-Law-Which-One-Is-the-Best-For-You.jpg"
                         alt=""/>
                    <div class="banner-content">
                        <h5 class="text-uppercase text-center" style="color: #a4a29e8a">
                            <b>Strong team or Leaders</b>
                        </h5>
                        <h1>Effective Case With Great Solutions.</h1>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- call_action_Section -->
    <section class="call_action_Section">
        <div class="container p-0">
            <div class="call_action_list">
                <div class=" py-4 px-3"></div>
                <div class="card py-4 px-3">
                    <a href="{{url('advisor')}}">
                        <div class="card-top text-center">
                            <i class="las la-users"></i>
                            <br/>
                            <span class="text-uppercase">Meet with</span>
                        </div>
                        <h3 class="mt-1 text-center"><b>Our Experts</b></h3>
                    </a>
                </div>

                <div class="card py-4 px-3">
                    <a href="">
                        <div class="card-top text-center">
                            <i class="las la-quote-right"></i>
                            <br/>
                            <span class="text-uppercase">Get free case</span>
                        </div>
                        <h3 class="mt-1 text-center"><b>Quote Evalution</b></h3>
                    </a>
                </div>

                <div class="card py-4 px-3">
                    <a href="{{url('contacts')}}">
                        <div class="card-top text-center">
                            <i class="las la-calendar-week"></i>
                            <br/>
                            <span class="text-uppercase">Book An</span>
                        </div>
                        <h3 class="mt-1 text-center"><b>Appointment</b></h3>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- about us -->
    @if($about)
        <section class="aboutUs_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <p class="section-title-top"><span class="title_shape"></span>About Us</p>
                        <h2 class="section-title text-white">{{$about->title}}</h2>
                        <div class="about_top_text">
                            A full service law firm in
                            <strong style="color: #337ab7">Kathmandu</strong> that has been
                            recognised internationally with specialisation in Commercial.
                        </div>
                        <div class="about_detail_text">
                            {!! $about->description !!}
                        </div>
                    </div>
                    <div class="col-lg-5 offset-md-1" style="position: relative">
                        <div class="lawer-image">
                            @if($about->image)
                                <img
                                    src="{{$about->getMedia('images')->last()->getFullUrl()}}"
                                    alt=""
                                />
                            @else
                                <img
                                    src=" {{asset('dist/default2.jpg')}}"
                                    alt=""
                                />
                            @endif
                        </div>
                        <div class="about_progress text-uppercase">Attorney&nbsp;grows</div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="aboutUs_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <p class="section-title-top"><span class="title_shape"></span>About Us</p>
                        <h2 class="section-title text-white">Why You Need The Top Lawyers.</h2>
                        <div class="about_top_text text-white">
                            A full service law firm in
                            <strong style="color: #337ab7">Kathmandu</strong> that has been
                            recognised internationally with specialisation in Commercial.
                        </div>
                        <div class="about_detail_text text-white">
                            Lexnepal is one of the leading multi-disciplinary law firms in Kathmandu,
                            Nepal managed by lawyers in and around kathmandu. The law firm is
                            one of the top law firms in Kathmandu and represents both foreign and
                            local clients. The firm operates as a partnership of several
                            leading practicing.
                        </div>

                        <div class="about-list mt-5 text-white">
                            <ul>
                                <li><i class="fas fa-check"></i>Serving 13 years</li>
                                <li>
                                    <i class="fas fa-check"></i>Practical Commercial Solution
                                </li>
                                <li><i class="fas fa-check"></i>100 year family history</li>
                                <li><i class="fas fa-check"></i>Excellent Operational Model</li>
                                <li><i class="fas fa-check"></i>Strong Network</li>
                                <li>
                                    <i class="fas fa-check"></i>Probably the largest law firm
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-md-1" style="position: relative">
                        <div class="lawer-image">
                            <img
                                src="https://i.pinimg.com/originals/be/60/b4/be60b470859fdfe94f182413e5491ce4.jpg"
                                alt=""
                            />
                        </div>
                        <div class="about_progress text-uppercase">Attorney&nbsp;grows</div>
                    </div>
                </div>
            </div>
        </section>
    @endif


    <!-- services -->
    <section class="services">
        <div class="container">
            <p class="section-title-top text-center"><span class="title_shape"></span>Services</p>
            <h2 class="section-title text-center pb-5">Our Practice Area</h2>
            <div class="service-area">
                @forelse($services as $service)
                    <div style="position: relative; padding-bottom: 100px">
                        <div class="card">
                            @if($service->image)
                                <img width="100%" src="{{$service->getMedia('images')->last()->getFullUrl()}}" alt=""/>
                            @else
                                <img width="100%" src="{{asset('dist/default2.jpg')}}" alt=""/>
                            @endif
                            <div class="mask"></div>
                        </div>
                        <a href="{{route('service.details',$service->slug)}}">
                            <div class="description">
                                <h5>{{$service->name}}</h5>
                                <p>
                                    {!! Str::limit($service->description,30) !!}
                                </p>
                            </div>
                        </a>
                    </div>
                @empty
                    <div style="position: relative; padding-bottom: 100px">
                        <div class="card">
                            <img width="100%" src="{{asset('dist/default2.jpg')}}" alt=""/>
                            <div class="mask"></div>
                        </div>
                        <div class="description">
                            <h3>Banking, Finance & Investment</h3>
                            <p>
                                A full service law firm in London that has been recognised
                                internationally with specialisation in Commercial.
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>


    <!-- why-us -->
    <section class="performance" style="background-color: #0B2334; padding: 100px 0px">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="section-title-top"><span class="title_shape"></span>Our Performance</p>
                    <h2 class="section-title pb-5 text-white">
                        Why Choose Us For Your Case
                    </h2>

                    <ul class="">
                        @forelse($performances as $performance)
                            <li>
                                @if($performance->image)
                                    <div class="performance_img"
                                         style="background-image: url('{{$performance->getMedia('images')->last()->getFullUrl()}}')">
                                        @else
                                            <div class="performance_img"
                                                 style="background-image: url('{{asset('dist/default2.jpg')}}')">
                                                @endif

                                            </div>
                                            <div class="performance-text ms-3">
                                                <h4 class="blog-meta"><b>{{$performance->title}}</b></h4>
                                                <p>
                                                    {!! $performance->description !!}
                                                </p>
                                            </div>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="card p-5" style="background-color: #fff">
                        <p class="section-title-top"><span class="title_shape"></span>Get Appointment</p>
                        <form method="POST" action="{{route('user.appointment')}}">
                            @csrf
                            <div class="form-group p-3" style="background-color: #f7f7f7">
                                <label for=""><b>Your Full Name</b></label>
                                <input name="name" type="text"
                                       placeholder="Enter Your Full name"
                                       class="form-control"
                                />
                            </div>
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror

                            <div class="form-group p-3">
                                <label for=""><b>Phone Number</b></label>
                                <input type="text" name="phone_number" class="form-control"
                                       placeholder="Enter Your Phone">
                            </div>
                            @error('phone_number')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group p-3">
                                <label for=""><b>Project Date</b></label>
                                <input type="date" name="project_date" class="form-control"
                                       placeholder="Enter Date">
                            </div>
                            @error('project_date')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group p-3">
                                <label for=""><b>Subject</b></label>
                                <input type="text" name="subject" class="form-control"
                                       placeholder="Enter Subject">
                            </div>
                            @error('subject')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group p-3">
                                <label for=""><b>Email</b></label>
                                <input type="email" name="email" class="form-control"
                                       placeholder="Enter Subject">
                            </div>
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group p-3">
                                <label for=""><b>Message</b></label>
                                <textarea class="form-control" id="" rows="3" name="message"></textarea>
                            </div>
                            @error('message')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <button type="submit" class="btn btn-primary text-uppercase"><b>Submit Now</b></button>
                        </form>
                    </div>
                </div>
            </div>
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
    <!-- case-solved -->
    <section class="case-solved" style="background:#0B2334">
        <div class="container">
            <p class="section-title-top text-center"><span class="title_shape"></span>Our Protfolio</p>
            <h2 class="section-title text-center text-white pb-5">Case Solved</h2>
            <div class="row case">
                @forelse($cases as $case)
                    <div>
                        <div class="card">
                            @if($case->image)
                                <div class="solved-image">
                                    <img width="100%" src="{{$case->getMedia('images')->last()->getFullUrl()}}" alt=""
                                         class="card-img-top"/>
                                </div>
                            @else
                                <div class="solved-image">
                                    <img width="100%" src="{{asset('dist/default2.jpg')}}" class="card-img-top"/>
                                </div>
                            @endif
                            <a href="{{route('case.details',$case->slug)}}">
                                <div class="card-body">
                                    <h6 class="section-title-top card-text pb-1 mb-0">
                                        {{$case->category->name}}
                                    </h6>
                                    <h4>{{$case->case_name}}</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div>
                        <div class="card">
                            <img
                                width="100%"
                                src="{{asset('dist/default2.jpg')}}"
                                alt=""
                                class="card-img-top"
                            />
                            <div class="card-body">
                                <h6 class="section-title-top card-text pb-1 mb-0">
                                    Criminal Case
                                </h6>
                                <h4>Donal Pakura Car Case</h4>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- our team -->
    <section class="team">
        <div class="container">
            <p class="section-title-top text-center"><span class="title_shape"></span>Team</p>
            <h2 class="section-title text-center pb-5">Our Advisors</h2>

            <div class="row">
                @forelse($teams as $team)
                    <div class="col-lg-3 col-md-6">
                        <div class="card p-4">
                            <a href="{{route('advisor.detail',$team->id)}}">
                                <div class="team-image m-auto">
                                    @if($team->image)
                                        <img src="{{$team->getMedia('images')->last()->getFullUrl()}}" alt=""/>
                                    @else
                                        <img src="{{asset('dist/default2.jpg')}}" alt=""/>
                                    @endif
                                </div>
                                <h4 class="text-center mt-3">{{$team->name}}</h4>
                                <p class="section-title-top text-center degination mb-0">
                                    {{$team->position}}
                                </p>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-md-3">
                        <div class="card p-4">
                            <div class="team-image m-auto">
                                <img
                                    src="https://image.freepik.com/free-photo/confident-mature-lawyer-sitting-courtroom_23-2147898278.jpg"
                                    class=""
                                    alt=""
                                />
                            </div>
                            <h4 class="text-center mt-3">Rosalina D. Willm</h4>
                            <p class="section-title-top text-center degination mb-0">
                                Founder
                            </p>
                            <!--<div class="team-description" style="text-align: justify">-->
                            <!--    The Companies Act 1994 is the enabling act in Bangladesh which-->
                            <!--    deals with entire companies affairs; whether it is private,-->
                            <!--    public.-->
                            <!--</div>-->
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- testimonial -->
    <section class="testimonial">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 testimonial-left" style="">
                    <p class="section-title-top"><span class="title_shape"></span>Testimonials</p>
                    <h2 class="section-title text-white mb-5">
                        See What Out Happy Clients Says
                    </h2>
                    <div class="people-says">
                        @forelse($testimonies as $testimony)
                            @if($loop->first)
                                <div>
                                    <div class="card p-5">
                                        <div>
                                            {!! $testimony->description !!}
                                        </div>
                                    </div>
                                    <br/>
                                    <br/>
                                    <div class="testimonial-description">
                                        <div class="author-image">
                                            @if($tesstimony->image)
                                                <img width="100%"
                                                     src="{{$testimony->getMedia('images')->last()->getFullUrl()}}"
                                                     alt=""/>
                                            @else
                                                <img width="100%"
                                                     src=" {{asset('dist/default2.jpg')}}"
                                                     alt=""/>
                                            @endif
                                        </div>
                                        <div class="author-detail ms-4">
                                            <h3 class="text-white">{{ucfirst($testimony->name)}}</h3>
                                            <p class="section-title-top m-0">Testimonials</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($loop->last)
                                <div>
                                    <div class="card p-5">
                                        <p>
                                            {!! $testimony->description !!}
                                        </p>
                                    </div>
                                    <br/>
                                    <br/>
                                    <div class="testimonial-description">
                                        <div class="author-image">
                                            @if($tesstimony->image)
                                                <img width="100%"
                                                     src="{{$testimony->getMedia('images')->last()->getFullUrl()}}"
                                                     alt=""/>
                                            @else
                                                <img width="100%"
                                                     src=" {{asset('dist/default2.jpg')}}"
                                                     alt=""/>
                                            @endif
                                        </div>
                                        <div class="author-detail ms-4">
                                            <h3 class="text-white">{{$testimony->name}}</h3>
                                            <p class="section-title-top m-0">Testimonials</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty

                        @endforelse
                    </div>
                </div>

                @if($offer)
                    <div class="col-lg-6 testimonial-right" style="">
                        <p class="section-title-top m-0 text-white">
                            <span class="title_shape" style="background: #fff;"></span>Offers
                        </p>
                        <h2 class="section-title text-white">
                            {{$offer->highlight_text}}
                        </h2>
                        <div class="text-white">
                            {!! $offer->description !!}
                        </div>

                        <form action="" class="offers-form">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Enter Your Email Address"
                                       required/>
                            </div>
                            <br/>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Enter Your Email Address"
                                       required/>
                            </div>
                            <br/>
                            <button class="btn text-uppercase text-white w-100" style="background-color: #343434">
                                Subscribe Now
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- newsfeed -->
    <section class="news-feed">
        <p class="section-title-top text-center"><span class="title_shape"></span> Blog</p>
        <h2 class="section-title text-center pb-5">News Feeds</h2>
        <div class="container">
            <div class="row">
                @forelse($blogs as $blog)
                    <div class="col-md-4">
                        <div class="card" style="border: none; border-radius: none !important">
                            <div class="image-field">
                                @if($blog->image)
                                    <img src="{{$blog->getMedia('images')->last()->getFullUrl()}}" class="card-img-top"/>
                                @else
                                    <img src=" {{asset('dist/default2.jpg')}}" class="card-img-top"/>
                                @endif
                                <div class="news_author">
                                    <div class="news_author_img">
                                        <img
                                            src=" {{asset('dist/default2.jpg')}}"
                                            alt=""/>
                                    </div>
                                    <div class="news_author_description ms-3 mt-2">
                                        <h5 class="text-white mb-0">{{$blog->added_by}}</h5>
                                        <p class="section-title-top m-0 text-white"><i class="fas fa-calendar-alt"></i>
                                            {{$blog->created_at->format('Y-m-d')}}</p>
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('blog.details',$blog->slug)}}">
                                <div class="card-body pt-4 px-0">
                                    <h4 class="card-title pb-2">
                                        <b>{{ucfirst($blog->name)}}</b>
                                    </h4>
                                    <div class="card-text">
                                        {!! Str::limit($blog->description,50) !!}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>

@endsection
