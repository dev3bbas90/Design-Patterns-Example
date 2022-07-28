<div id="kt_header" class="header header-fixed">
    <!--begin::Header Wrapper-->
    <div class="header-wrapper rounded-top-xl d-flex flex-grow-1 align-items-center">
        <!--begin::Container-->
        <div class="container-fluid d-flex align-items-center justify-content-end justify-content-lg-between flex-wrap">
            <!--begin::Menu Wrapper-->
            <div class="header-menu-wrapper header-menu-wrapper-left py-lg-2" id="kt_header_menu_wrapper">
                <!--begin::Menu-->
                <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                    <!--begin::Nav-->
                    <ul class="menu-nav">
                        <li class="menu-item @if(Request::is('admin') ) menu-item-open menu-item-here @endif" aria-haspopup="true">
                            <a href="{{ route('admin')}}" class="menu-link">
                                <span class="menu-text">{{ __('Dashboard') }}</span>
                            </a>
                        </li>


                        <li class="menu-item @if(Request::is('admin/theaters') || Request::is('admin/theaters/*') ||  Request::is('admin/categories') || Request::is('admin/categories/*') ||  Request::is('admin/halls')||Request::is('admin/halls/*') ||  Request::is('admin/hall_time_frames')||Request::is('admin/hall_time_frames/*') ||  Request::is('admin/events') || Request::is('admin/events/*') ) menu-item-open menu-item-here @endif menu-item-submenu" data-menu-toggle="click" aria-haspopup="true">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <span class="menu-text">
                                    {{__('Theaters')}}
                                </span>
                                <span class="menu-desc"></span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu menu-submenu-fixed menu-submenu-center" style="width:1150px">
                                <div class="menu-subnav">
                                    <ul class="menu-content">
                                        <li class="menu-item">
                                            <h3 class="menu-heading menu-toggle">
                                                <span class="menu-text @if(Request::is('admin/theaters')||Request::is('admin/theaters/*')) label label-inline label-info @endif ">{{__('Theaters')}}</span>
                                                <i class="menu-arrow"></i>
                                            </h3>
                                            <ul class="menu-inner">
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{route('theaters.index')}}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-line">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">{{__('Show All')}}</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{route('theaters.create')}}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-line">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">{{__('Create New')}}</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item">
                                            <h3 class="menu-heading menu-toggle">
                                                <span class="menu-text @if(Request::is('admin/categories')||Request::is('admin/categories/*')) label label-inline label-info @endif ">{{__('Categories')}}</span>
                                                <i class="menu-arrow"></i>
                                            </h3>
                                            <ul class="menu-inner">
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('categories.index') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-line">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">{{__('Show All')}}</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('categories.create') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-line">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">{{__('Create New')}}</span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </li>
                                        <li class="menu-item">
                                            <h3 class="menu-heading menu-toggle">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text @if(Request::is('admin/halls')||Request::is('admin/halls/*')) label label-inline label-info @endif ">{{__('Halls')}}</span>
                                                <i class="menu-arrow"></i>
                                            </h3>
                                            <ul class="menu-inner">
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('halls.index') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-line">
                                                            <span></span>
                                                        </i>

                                                        <span class="menu-text">
                                                            {{__('Show All')}}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('halls.create') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-line">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">
                                                            {{__('Create New')}}
                                                        </span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </li>
                                        <li class="menu-item">
                                            <h3 class="menu-heading menu-toggle">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text @if(Request::is('admin/hall_time_frames')||Request::is('admin/hall_time_frames/*')) label label-inline label-info @endif ">{{__('ShowTimes')}}</span>
                                                <i class="menu-arrow"></i>
                                            </h3>
                                            <ul class="menu-inner">
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('hall_time_frames.index') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-line">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">{{__('Show All')}}</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('hall_time_frames.create') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-line">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">{{__('Create New')}}</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item">
                                            <h3 class="menu-heading menu-toggle">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text @if(Request::is('admin/events')||Request::is('admin/events/*')) label label-inline label-info @endif ">{{__('Events')}}</span>
                                                <i class="menu-arrow"></i>
                                            </h3>
                                            <ul class="menu-inner">
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('events.index') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-line">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">{{__('Show All')}}</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('events.create') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-line">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">{{__('Create New')}}</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <li class="menu-item @if(Request::is('admin/programs') || Request::is('admin/programs/*') ||  Request::is('admin/program-category') || Request::is('admin/program-category/*') ||  Request::is('admin/casts-type')||Request::is('admin/casts-type/*') ||  Request::is('admin/casts')||Request::is('admin/casts/*')  ) menu-item-open menu-item-here @endif menu-item-submenu" data-menu-toggle="click" aria-haspopup="true">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <span class="menu-text">
                                    {{__('Programs')}}
                                </span>
                                <span class="menu-desc"></span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu menu-submenu-fixed menu-submenu-center" style="width:1150px">
                                <div class="menu-subnav">
                                    <ul class="menu-content">
                                        <li class="menu-item">
                                            <h3 class="menu-heading menu-toggle">
                                                <span class="menu-text @if(Request::is('admin/programs')||Request::is('admin/programs/*')) label label-inline label-info @endif ">{{__('Programs')}}</span>
                                                <i class="menu-arrow"></i>
                                            </h3>
                                            <ul class="menu-inner">
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{route('programs.index')}}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-line">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">{{__('Show All')}}</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{route('programs.create')}}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-line">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">{{__('Create New')}}</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item">
                                            <h3 class="menu-heading menu-toggle">
                                                <span class="menu-text @if(Request::is('admin/program-category')||Request::is('admin/program-category/*')) label label-inline label-info @endif ">{{__('Program Categories')}}</span>
                                                <i class="menu-arrow"></i>
                                            </h3>
                                            <ul class="menu-inner">
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('program-category.index') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-line">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">{{__('Show All')}}</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('program-category.create') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-line">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">{{__('Create New')}}</span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </li>
                                        <li class="menu-item">
                                            <h3 class="menu-heading menu-toggle">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text @if(Request::is('admin/casts-type')||Request::is('admin/casts-type/*')) label label-inline label-info @endif ">{{__('Cast Type')}}</span>
                                                <i class="menu-arrow"></i>
                                            </h3>
                                            <ul class="menu-inner">
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('casts-type.index') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-line">
                                                            <span></span>
                                                        </i>

                                                        <span class="menu-text">
                                                            {{__('Show All')}}
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('casts-type.create') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-line">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">
                                                            {{__('Create New')}}
                                                        </span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </li>
                                        <li class="menu-item">
                                            <h3 class="menu-heading menu-toggle">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text @if(Request::is('admin/casts')||Request::is('admin/casts/*')) label label-inline label-info @endif ">{{__('Cast')}}</span>
                                                <i class="menu-arrow"></i>
                                            </h3>
                                            <ul class="menu-inner">
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('casts.index') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-line">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">{{__('Show All')}}</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item" aria-haspopup="true">
                                                    <a href="{{ route('casts.create') }}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-line">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">{{__('Create New')}}</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <li class="menu-item @if(Request::is('admin/partners') || Request::is('admin/partners/*')  ) menu-item-open menu-item-here @endif" aria-haspopup="true">
                            <a href="{{ route('partners.index')}}" class="menu-link">
                                <span class="menu-text">{{ __('Partners') }}</span>
                            </a>
                        </li>

                        <li class="menu-item @if(Request::is('admin/slider') || Request::is('admin/slider/*')  ) menu-item-open menu-item-here @endif" aria-haspopup="true">
                            <a href="{{ route('slider.index')}}" class="menu-link">
                                <span class="menu-text">{{ __('Sliders') }}</span>
                            </a>
                        </li>

                        <li class="menu-item @if(Request::is('admin/newsletters') || Request::is('admin/newsletters/*')  ) menu-item-open menu-item-here @endif" aria-haspopup="true">
                            <a href="{{ route('newsletters.index')}}" class="menu-link">
                                <span class="menu-text">{{ __('NewsLetter') }}</span>
                            </a>
                        </li>

                        <li class="menu-item @if(Request::is('admin/contact') || Request::is('admin/contact/*')  ) menu-item-open menu-item-here @endif" aria-haspopup="true">
                            <a href="{{ route('contact.index')}}" class="menu-link">
                                <span class="menu-text">{{ __('Contact') }}</span>
                            </a>
                        </li>
                        <li class="menu-item @if(Request::is('admin/booking') || Request::is('admin/booking/*')  ) menu-item-open menu-item-here @endif" aria-haspopup="true">
                            <a href="{{ route('booking.index')}}" class="menu-link">
                                <span class="menu-text">{{ __('Booking') }}</span>
                            </a>
                        </li>

                        <li class="menu-item @if(Request::is('admin/users') || Request::is('admin/users/*')  ) menu-item-open menu-item-here @endif" aria-haspopup="true">
                            <a href="{{ route('users.index')}}" class="menu-link">
                                <span class="menu-text">{{ __('Users') }}</span>
                            </a>
                        </li>
                    </ul>
                    <!--end::Nav-->
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Menu Wrapper-->
            <!--begin::Toolbar-->
            {{-- <div class="d-flex align-items-center py-3">
                <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                    <a href="" class="btn btn-dark font-weight-bold px-6" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                     {{ __('Logout') }} >logout</a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
                <!--end::Dropdown-->
            </div> --}}
            <!--end::Toolbar-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Header Wrapper-->
</div>
