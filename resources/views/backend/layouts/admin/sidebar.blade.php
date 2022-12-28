<!-- BEGIN MENUBAR-->
<div id="menubar" class="menubar-inverse noprint">
				<div class="menubar-fixed-panel">
					<div>
						<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
							<i class="fa fa-bars"></i>
						</a>
					</div>
					<div class="expanded">
						<a href="{{ route('admin.dashboard') }}">
							<span class="text-lg text-bold text-primary ">MATERIAL&nbsp;ADMIN</span>
						</a>
					</div>
				</div>
				<div class="menubar-scroll-panel">

					<!-- BEGIN MAIN MENU -->
					<ul id="main-menu" class="gui-controls">

						 <!-- BEGIN DASHBOARD -->
						<li>
							<a href="{{ route('admin.dashboard') }}" class="active">
								<div class="gui-icon"><i class="md md-home"></i></div>
								<span class="title">Dashboard</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END DASHBOARD -->

						<li class="gui-folder">
							<a href="{{ route('menu.index') }}">
								<div class="gui-icon"><i class="md md-menu"></i></div>
								<span class="title">Menu</span>
							</a>
						</li>

						<li class="gui-folder">
							<a href="{{ route('page.index') }}">
								<div class="gui-icon"><i class="md md-pages"></i></div>
								<span class="title">Pages</span>
							</a>
						</li>

						<li class="gui-folder">
							<a href="{{ route('blog.index') }}">
								<div class="gui-icon"><i class="md md-my-library-books"></i></div>
								<span class="title">Blogs</span>
							</a>
						</li>

						<li class="gui-folder">
							<a href="{{ route('service.index') }}">
								<div class="gui-icon"><i class="md md-assignment-ind"></i></div>
								<span class="title">Services</span>
							</a>
						</li>

						<li class="gui-folder">
							<a href="{{ route('testimonials.index') }}">
								<div class="gui-icon"><i class="md md-rate-review"></i></div>
								<span class="title">Testimonials</span>
							</a>
						</li>

						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-view-list"></i></div>
								<span class="title">Category Management</span>
							</a>
							<ul>
								<li><a href="{{ route('categories.index') }}" ><span class="title">Categories</span></a></li>
								<li><a href="{{ route('subcategories.index') }}" ><span class="title">Sub Categories</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-image"></i></div>
								<span class="title">Gallery</span>
							</a>
							<ul>
								<li><a href="{{ route('albums.index') }}" ><span class="title">Albums</span></a></li>
								<li><a href="{{ route('videos.index') }}" ><span class="title">Videos</span></a></li>
								<li><a href="{{route('slider.index')}}" ><span class="title">Sliders</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<li class="gui-folder">
							<a href="{{ route('package.index') }}">
								<div class="gui-icon"><i class="md md-terrain"></i></div>
								<span class="title">Packages</span>
							</a>
						</li>
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-people"></i></div>
								<span class="title">Customers</span>
							</a>
							<ul>
								<li><a href="{{ route('customer.index') }}" ><span class="title">All Customers</span></a></li>
								<li><a href="{{ route('inquiry.index') }}" ><span class="title">Tour Inquiries</span></a></li>
								<li><a href="{{ route('customer-trip-plan.index') }}" ><span class="title">Customer Trip Plans</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
				</div><!--end .menubar-scroll-panel-->
			</div><!--end #menubar-->
			<!-- END MENUBAR -->
