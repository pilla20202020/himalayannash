	<!--Horizontal Section-->

	<div class="header-main header-absolute">
		<div class="top-bar header-transparent">
			<div class="container">
				<div class="row">
					<div class="col-xl-8 col-lg-8 col-sm-4 col-12">
						<div class="top-bar-left d-flex">
							<div class="clearfix">
								<ul class="socials">
                                    @if(setting('facebook'))
                                    <li>
                                        <a class="social-icon text-white" href="{{setting('facebook')}}" target="__blank"><i
                                                class="fa fa-facebook text-white"></i></a>
                                    </li>
                                    @endif
                                    @if(setting('twitter'))
                                    <li>
                                        <a class="social-icon text-white" href="{{setting('twitter')}}" target="__blank"><i
                                                class="fa fa-twitter text-white"></i></a>
                                    </li>
                                    @endif
                                    @if(setting('linkedin'))
                                    <li>
                                        <a class="social-icon text-white" href="{{setting('linkedin')}}" target="__blank"><i
                                                class="fa fa-linkedin text-white"></i></a>
                                    </li>
                                    @endif
                                    @if(setting('google'))
                                    <li>
                                        <a class="social-icon text-white" href="#" target="__blank"><i
                                                class="fa fa-google-plus text-white"></i></a>
                                    </li>
                                    @endif
                                    <li>
                                        <form action="{{route('search')}}" class="priceOptionForm" name="priceOptionForm">
                                            <div class="input-group">
                                                <i class="fa fa-search"></i>
                                                <input type="text" name="keyword" class="form-control br-tl-3 br-bl-3 searchany" id="innerbutton" placeholder="Search Destinations, Tours, Activities" required="required" size="50" type="text" autocomplete="off" style="position: relative; vertical-align: top; background-color: transparent;border: hidden;color: #fff">
                                            </div>
                                        </form>
                                    </li>
                                </ul>
							</div>

						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-sm-8 col-12">
                        <div class="top-bar-right">
                            <ul class="custom">
                                @if(Auth::guard('customer')->user())
                                
                                <li class="dropdown">
                                    <a href="{{route('customer.dashboard')}}" class="text-white" data-toggle="dropdown"><i
                                            class="fa fa-home mr-1 text-white"></i><span> My Dashboard</span><i
                                            class="fa fa-angle-down ml-1 header-dropdown-icon"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a href="{{route('customer.dashboard')}}" class="dropdown-item">
                                            <i class="dropdown-icon icon icon-user"></i> My Profile
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="dropdown-icon icon icon-bell"></i> Notifications
                                        </a>
                                        <a href="mydash.html" class="dropdown-item">
                                            <i class="dropdown-icon  icon icon-settings"></i> Account Settings
                                        </a>
                                        <a class="dropdown-item" href="#"  onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            <i class="dropdown-icon icon icon-power"></i> Log out
                                        </a>
                                        <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                                @else
                                <li>
                                    <a href="{{route('customer.register')}}" class="text-white"><i
                                            class="fa fa-user mr-1 text-white"></i> <span>Register</span></a>
                                </li>
                                <li>
                                    <a href="{{route('customer.login')}}" class="text-white"><i
                                            class="fa fa-sign-in mr-1 text-white"></i> <span>Login</span></a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
				</div>
			</div>
		</div>

		<!-- Mobile Header -->
		<div class="sticky">
            <div class="horizontal-header clearfix ">
                <div class="container">
                    <a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
                    <span class="smllogo"><a href="{{route('homepage')}}"><img src="{{asset('assets/images/brand/logo-new.png')}}"
                                alt=""></a></span>
                </div>
            </div>
        </div>
		<!-- /Mobile Header -->

		<div class="horizontal-main header-transparent clearfix py-lg-3">
            <div class="horizontal-mainwrapper container clearfix">
                <div class="desktoplogo">
                    <a href="{{route('homepage')}}"><img src="{{asset('assets/images/brand/logo-new.png')}}" alt=""></a>
                </div>
				<div class="desktoplogo-1">
					<a href="{{route('homepage')}}"><img src="{{asset('assets/images/brand/logo-new.png')}}" alt=""></a>
				</div>

                <!--Nav-->
                <nav class="horizontalMenu clearfix d-md-flex">
                    <ul class="horizontalMenu-list">
                        @foreach(menus() as $menu)
                        <?php
                        $hasSub = !$menu->subMenus->isEmpty();
                        ?>
                        <li>
                            <a class="{{($hasSub) ? "dropdown-toggle" : ""}} nav-link" href="{{ url($menu->url) }} "
                               data-toggle="{{($hasSub) ? "dropdown" : ""}}">
                                {{$menu->name}}
                            </a>
                            @if($hasSub)
                                <ul class="sub-menu">
                                    @foreach($menu->subMenus->sortBy('order') as $key => $sub)
                                    <?php
                                    $hasChildSub = !$sub->childsubMenus->isEmpty();
                                    ?>
                                    <li>
                                        <a class="dropdown-item nav-link nav_item  {{($hasChildSub) ? "dropdown-toggler" : ""}}" href="{{url($sub->url)}}">{{ $sub->name }}</a>
                                        @if($hasChildSub)
                                            <ul class="sub-menu child-sub-menu">
                                                @foreach($sub->childsubMenus->sortBy('order') as $key => $childsubmenu)
                                                <li><a class="dropdown-item nav-link nav_item" href="{{url($childsubmenu->url)}}">{!! $childsubmenu->name !!}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                    <li>
                        <ul class="search_navbar">
                            <li><a href="javascript:void(0);" class="nav-link search_trigger"><i class="fa fa-search"></i></a>
                                <div class="search-overlay">
                                    <div class="search_wrap">
                                        <form action="{{route('search')}}" class="priceOptionForm" name="priceOptionForm">
                                            <input name="keyword" type="text" placeholder="Search" class="form-control" id="search_input">
                                            <button type="submit" class="search_icon"><i class="fa fa-search form-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>

                    </ul>
                </nav>
                <!--Nav-->
            </div>
            <div class="body-progress-container">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" id="myBar"></div>
            </div>
        </div>
	</div>
	<!--Horizontal Section-->
