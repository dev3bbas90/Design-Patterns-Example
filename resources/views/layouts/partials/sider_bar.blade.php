<div class="aside aside-left d-flex flex-column" id="kt_aside">
    <!--begin::Brand-->
    <div class="aside-brand d-flex flex-column align-items-center flex-column-auto pt-5 pt-lg-18 pb-10">
        <!--begin::Logo-->
        <div class="btn p-0 symbol symbol-60 symbol-light-primary" href="?page=index" id="kt_quick_user_toggle">
            <div class="symbol-label">
                <img alt="Logo" src="{{asset('assets/media/svg/avatars/001-boy.svg')}}" class="h-75 align-self-end" />
            </div>
        </div>
        <!--end::Logo-->
    </div>

    <!--begin::Footer-->
    <div class="aside-footer d-flex flex-column align-items-center flex-column-auto py-8">
        <div class="dropdown" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Logout">
            <a href="{{ route('logout') }}" class="nav-link btn btn-icon btn-hover-text-primary btn-lg" onclick="event.preventDefault();document.getElementById('logout-form').submit();"{{ __('Logout') }} >
                <i class="fas fa-sign-out-alt"></i>
                logout
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </a>
            <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-left">
                <ul class="navi navi-hover py-4">
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="symbol symbol-20 mr-3">
                                <img src="{{asset('assets/media/svg/flags/226-united-states.svg')}}" alt="" />
                            </span>
                            <span class="navi-text">English</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
