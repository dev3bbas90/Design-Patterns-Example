<div class="sticky-header-wrap sticky-header bg-light-dark py-1 py-sm-2 py-lg-1">
    <div class="container position-relative ">
        <div class="row align-items-center">
            <div class="col-5 col-md-3">
                <div class="logo">
                    <a href="{{route('index')}}"><img width="50%" src="{{asset('front/assets-en/img/ilead-integrated-solutions.webp')}}" alt="Theater" /></a>
                </div>
            </div>
            <div class="col-7 col-md-9 text-end position-static">
                <nav class="main-menu menu-sticky1 d-none d-lg-block link-inherit">
                    <ul>
                        <li>
                            <a href="{{route('index')}}">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{route('front.programs')}}">
                                Programs
                            </a>
                        </li>
                        <li>
                            <a href="{{route('front.theaters')}}">
                                Theaters
                            </a>
                        </li>
                    </ul>
                </nav>
                <button class="vs-menu-toggle text-theme border-theme d-inline-block d-lg-none">
                    <i class="far fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="vs-menu-wrapper">
    <div class="vs-menu-area bg-dark">
        <button class="vs-menu-toggle">
            <i class="fal fa-times"></i>
        </button>
        <div class="mobile-logo">
            <a href="{{route('index')}}">
                <img src="{{asset('front/assets-en/img/ilead-integrated-solutions.webp')}}" alt="Theater" />
            </a>
        </div>
        <div class="vs-mobile-menu link-inherit"></div>
    </div>
</div>
<header class="header-wrapper header-layout1 position-absolute top-0 start-0 w-100 z-index-step1">
    <div class="header-main">
        <div class="container position-relative py-3">
            <div class="bg-dark px-50">
                <div class="row align-items-center">
                    <div class="col-6 col-lg-4 d-block d-xl-none py-3 py-xl-0">
                        <div class="header-logo">
                            <a href="{{route('index')}}">
                                <img src="{{asset('front/assets-en/img/ilead-integrated-solutions.webp')}}" alt="Theater" />
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-8 col-xl-5 text-end text-xl-start">
                        <nav class="main-menu menu-style1 mobile-menu-active" data-expand="992">
                            <ul>
                                <li>
                                    <a href="{{route('index')}}">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('front.programs')}}">
                                        Programs
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('front.theaters')}}">
                                        Theaters
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <button type="button" class="vs-menu-toggle text-white d-inline-block d-lg-none">
                            <i class="far fa-bars"></i>
                        </button>
                    </div>
                    <div class="col-md-4 col-lg-2 text-center d-none d-xl-block">
                        <div class="header-logo1" style="width: 80%;">
                            <a href="{{route('index')}}">
                                <img src="{{asset('front/assets-en/img/ilead-integrated-solutions.webp')}}" alt="Theater" />
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-5 d-none d-xl-block">
                        <div class="header-right d-flex align-items-center justify-content-end">
                            <a href="{{LaravelLocalization::getLocalizedURL('ar')}}" class="vs-btn outline1 d-none d-xl-inline-block">
                                <strong>
                                    Arabic
                                </strong>
                            </a>

                            <a href="{{LaravelLocalization::getLocalizedURL('en')}}" class="vs-btn outline1 d-none d-xl-inline-block">
                                <strong>
                                    English
                                </strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
