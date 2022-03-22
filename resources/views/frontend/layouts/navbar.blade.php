<header>
    <div class="header__top py-3 hide-on-mobile">
        <div class="container d-flex">
            <div class="headerTop__left">
                <span><i class="las la-envelope"></i>&nbsp;{{getSetting('email')}}</span>
                <span class="ms-5"><i class="las la-phone"></i>&nbsp;{{getSetting('mobile_number')}}</span>
            </div>
            <div class="headerTop__right ms-auto">
                <ul class="d-flex header__mediaList">
                    <li class="header__media">
                        <a href="{{getSetting('facebook_link')}}"><i class="lab la-facebook-f"></i></a>
                    </li>
                    <li class="header__media">
                        <a href="{{getSetting('instagram_link')}}"><i class="lab la-instagram"></i></a>
                    </li>
                    <li class="header__media">
                        <a href="{{getSetting('twitter_link')}}"><i class="lab la-twitter"></i></a>
                    </li>
                    <li class="header__media">
                        <a href="{{getSetting('youtube_link')}}"><i class="lab la-youtube"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header__bottom">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid p-0">
                    <a class="navbar-brand" href="{{url('/')}}">

                        @if(getSetting('logo'))
                            <img style="width:240px" src="{{asset(url('/').Storage::url(getSetting('logo')))}}" alt=""/>
                        @else
                            <img style="width:240px" src="{{asset('dist/news logo.png')}}" alt=""/>
                        @endif
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-5 mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('home.index')? 'active' : ' ' }}"
                                   aria-current="page" href="{{route('home.index')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('home.aboutus')? 'active' : ' ' }}"
                                   href="{{route('home.aboutus')}}">About</a>
                            </li>
                            <li class="nav-item">

                                <a class="nav-link {{request()->routeIs('home.services')? 'active' : ' ' }}"
                                   href="{{route('home.services')}}">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('home.case')? 'active' : ' ' }}"
                                   href="{{route('home.case')}}">Cases</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('home.blog')? 'active' : ' ' }}"
                                   href="{{route('home.blog')}}">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('home.contact')? 'active' : ' ' }}"
                                   href="{{route('home.contact')}}">Contact</a>
                            </li>
                        </ul>
                        <div class="ms-auto call-to-quote text-white">
                            <i class="las la-phone"></i>
                            <div class="number ms-3">
                    <span class="text-uppercase"
                    ><b>Free Consultant <br/></b
                        ></span>
                                <span
                                    class="text-uppercase"><b>{{getSetting('mobile_number') .' | '. getSetting('phone_number')}}</b></span>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
