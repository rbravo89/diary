<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="/" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="/" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span>@lang('translation.menu')</span></li>
                @if(auth()->user()->role==='ADMINISTRATOR')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="sidebarDashboards">
                            <i class="ri-dashboard-2-line"></i> <span>@lang('translation.admin')</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarDashboards">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{route('organization')}}"
                                       class="nav-link">@lang('translation.organizations')</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.project')}}"
                                       class="nav-link">@lang('translation.projects')</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.user')}}"
                                       class="nav-link">@lang('translation.users')</a>
                                </li>
                            </ul>
                        </div>
                    </li> <!-- end Dashboard Menu -->
                @endif
                @if(auth()->user()->role==='ACCOUNT_MANAGER')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{route('account.projects',auth()->user())}}">
                            <i class="ri-honour-line"></i> <span>@lang('translation.projects')</span>
                        </a>
                        <a class="nav-link menu-link" href="#">
                            <i class="ri-honour-line"></i> <span>@lang('translation.collaborations')</span>
                        </a>
                    </li>
                @endif
                @if(auth()->user()->role==='TECHNICAL')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{route('technical.project.index')}}">
                            <i class="ri-honour-line"></i> <span>@lang('translation.projects')</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
