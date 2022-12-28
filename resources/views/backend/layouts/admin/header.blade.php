<!-- BEGIN HEADER-->
<header id="header" class="noprint">
    <div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li class="header-nav-brand">
                    <div class="brand-holder">
                        <a href="{{ route('homepage') }}">
                            <span class="text-lg text-bold text-primary text-uppercase">Himalayan Nash</span>
                        </a>
                    </div>
                </li>
                <li>
                    <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="headerbar-right">

            <ul class="header-nav header-nav-profile">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                        <img alt="Image" src="{{ asset('assets/images/brand/logo-new.png') }}" class="logo-color">
                        <span class="profile-info">
                            {{ auth()->user()->username }}

                        </span>
                    </a>
                    <ul class="dropdown-menu animation-dock">

                        <li>
                            <a href="{{route('setting.index')}}">
                                <i class="md md-settings"></i>
                                Settings
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
         document.getElementById('logout-form').submit();"><i class="dropdown-icon fe fe-power text-primary"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                    <!--end .dropdown-menu -->
                </li>
                <!--end .dropdown -->
            </ul>
            <!--end .header-nav-profile -->

        </div>
        <!--end #header-navbar-collapse -->
    </div>
</header>
<!-- END HEADER-->
