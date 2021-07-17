<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="{{ url('/') }}"><img class="img-fluid for-light" src="{{asset('assets/images/logo/logo.png')}}"
                    alt=""><img class="img-fluid for-dark"
                    src="{{asset('assets/images/logo/logo_dark.png')}}" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{ url('/') }}"><img class="img-fluid" style="height: 30px;"
                    src="{{asset('assets/images/dent4u_favicon.png')}}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="{{ url('/') }}"><img class="img-fluid" style="height: 30px;"
                                src="{{asset('assets/images/logo/logo-icon.png')}}" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-1">Menu</h6>
                        </div>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='index' ? 'active' : '' }} "
                            href="{{route('index')}}">
                            <i data-feather="home"> </i><span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                    <label class="badge badge-warning" id="notif_activity"></label>
                        <a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='activity' ? 'active' : '' }} "
                            href="{{route('activity')}}">
                            <i data-feather="activity"> </i><span>Activity</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
