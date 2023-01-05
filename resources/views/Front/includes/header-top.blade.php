<body>
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <!-- Start Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="top-left">
                            <ul class="menu-top-link">
                                <li>
                                    <div class="btn-group mb-1">
                                        <a type="button" class=" btn-sm dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            @if (App::getLocale() == 'ar')
                                                {{ LaravelLocalization::getCurrentLocaleName() }}
                                                <img src="{{ asset('assets/images/flags/EG.png') }}" alt="">
                                            @else
                                                {{ LaravelLocalization::getCurrentLocaleName() }}
                                                <img src="{{ asset('assets/images/flags/GB.png') }}" alt="">
                                            @endif
                                        </a>
                                        <div class="dropdown-menu">
                                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                    {{ $properties['native'] }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-12">
                        <div class="top-middle">
                            <ul class="useful-links">

                                <li><a href="{{ route('Home') }}">{{__('app.home')}}</a></li>
                                <li><a href="about-us.html">{{__('app.about')}}</a></li>
                                <li><a href="{{route('contact_us.index')}}">{{__('app.contact')}}</a></li>
                            </ul>
                        </div>
                    </div>
                    @if (isset(Auth::User()->name))
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="col-12">
                                <div class=" row col-12">
                                    <div class="col-9">
                                        <a href="{{ route('profile', [Auth::User()->id]) }}" class="fs-6 text-light"
                                            style="font-size: 1px;">
                                            <img width="50px" height="50px" class="rounded-circle mr-1 ml-1"
                                                src="{{ asset('uploads/User/' . Auth::user()->image) }}"
                                                alt="">
                                        </a>
                                        <a href="{{ route('profile', [Auth::User()->id]) }}"
                                            class="fs-6 text-light">{{ Auth::user()->name }}
                                        </a>
                                    </div>
                                    <div class="col-3 mt-2">
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn text-light "> {{__('app.singOut')}}</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="top-end">
                                <div class="user">
                                    <i class="lni lni-user"></i>
                                    {{__('app.hello')}}
                                </div>
                                <ul class="user-login">
                                    <li>
                                        <a href="{{ route('login') }}"> {{__('app.signIn')}} </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('register') }}"> {{__('app.register')}} </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- End Topbar -->
