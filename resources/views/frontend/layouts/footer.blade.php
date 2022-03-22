<!-- footer -->
<section class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 ">
                <div>
                    <img width="100px" src="{{asset('dist/news logo.png')}}"/>
                </div>
                <p class="me-5 footer-text">
                    Main practice areas of the firm include Admiralty, Maritime and
                    Ship Arrest, Arbitration, Mediation and ADRs, Aviation Matters,
                    Banking, Finance & Investment, Capital Market, Commercial
                    Litigation, Commercial Transactions, International Trade,
                    Construction & Engineering., Foreign Investment and Business
                    Set-Up.
                </p>


            </div>
            <div class="col-md-4">
                <h3 class="widget-title">Practice Area</h3>

                <ul class="widget-practice-area">
                    @forelse($services as $key=>$value)
                        <li><a href="{{route('service.details',$key)}}">{{$value}}</a></li>
                    @empty
                    @endforelse
                </ul>
            </div>
            <div class="col-md-4">
                <h3 class="widget-title">News Feeds</h3>
                <ul class="widget_news">
                    @forelse($blogs as $blog)
                        <li>
                            <a href="{{route('blog.details',$blog->slug)}}">
                            <div class="widget_news-image">
                                @if($blog->image)
                                    <img src="{{$blog->getMedia('images')->last()->getFullUrl()}}" alt=""/>
                                @else
                                    <img src="https://html.themexriver.com/rexlaw/assets/img/blog/bt1.jpg" alt=""/>
                                @endif
                            </div>
                            <div class="widget_news-text ms-3">
                                <span class="blog-meta"><i class="fas fa-calendar-alt"></i> {{$blog->created_at->format('Y-m-d')}}</span>
                                <h4 class="text-white">{{$blog->name}}</h4>
                            </div></a>
                        </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</section>

{{--script--}}
<script src="{{asset('dist/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js "></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="{{asset('dist/slick-1.8.1/slick/slick.js')}}"></script>
<script>
    $(".your-class").slick({
        autoplay: true,
        autoplaySpeed: 2500,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-next"></button>',
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: "0px",
                    slidesToShow: 1,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: "0px",
                    slidesToShow: 1,
                },
            },
        ],
    });
    $(".service-area").slick({
        autoplay: false,
        autoplaySpeed: 2500,
        arrows: true,
        prevArrow:
            '<button type="button" class="slick-prev"> <i class="fas fa-arrow-left"></i></button>',
        nextArrow:
            '<button type="button" class="slick-next"><i class="fas fa-arrow-right"></i></button>',
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: "0px",
                    slidesToShow: 1,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: "0px",
                    slidesToShow: 1,
                },
            },
        ],
    });
    $(".case").slick({
        autoplay: false,
        autoplaySpeed: 2500,
        arrows: true,
        prevArrow:
            '<button type="button" class="slick-prev"> <i class="fas fa-arrow-left"></i></button>',
        nextArrow:
            '<button type="button" class="slick-next"><i class="fas fa-arrow-right"></i></button>',
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: "0px",
                    slidesToShow: 1,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: "0px",
                    slidesToShow: 1,
                },
            },
        ],
    });

    $(".people-says").slick({
        autoplay: true,
        autoplaySpeed: 2500,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: "0px",
                    slidesToShow: 1,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: "0px",
                    slidesToShow: 1,
                },
            },
        ],
    });

    $(".patner").slick({
        autoplay: false,
        autoplaySpeed: 2500,
        arrows: false,

        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: "0px",
                    slidesToShow: 1,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: "0px",
                    slidesToShow: 1,
                },
            },
        ],
    });

</script>
