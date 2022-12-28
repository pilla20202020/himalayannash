<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Himalayan Nash">
		<meta name="author" content="Travel & Tours">
		<meta name="keywords" content="Travel & Tours , Himalayan Nash, Visit Nepal">
		<link rel="icon" href="{{asset('assets/images/brand/logo-new.png')}}" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/brand/logo-new.png')}}" />

		<!-- Title -->
		<title>Himalayan Nash</title>

		<!-- Sidemenu Css -->
		<link href="{{asset('assets/css/sidemenu.css')}}" rel="stylesheet" />

		<!-- Bootstrap Css -->
		<link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

		<!-- Style Css -->
		<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />

		<!-- Plugins Css -->
		<link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet" />

		<!-- Admin-Custom Css -->
		<link href="{{asset('assets/css/admin-custom.css')}}" rel="stylesheet" />

		<!-- Perfect scroll bar css-->
		<link href="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" />

		<!---Font icons-->
		<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet"/>

		<!-- Color Skins -->
		<link id="theme" href="{{asset('assets/color-skins/color.css')}}"  rel="stylesheet"/>

	</head>
	<body class="app sidebar-mini">

		<!--Loader-->
		<div id="global-loader" class="bg-white">
			<div class="loader-svg-img">
				<img src="{{asset('assets/images/brand/logo-new.png')}}" class="" alt="">
			</div>
		</div>
		<!--/Loader-->

        @if(Auth::guest())

            @yield('guest')
        
        @else
		<!-- Section -->
		<div class="page">
			<div class="page-main h-100">
				<!--Header Section-->
                @include('backend.layouts.partials.header')
				<!-- Header Section -->
                
				<!-- Sidebar menu-->
				<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
                @include('backend.layouts.partials.sidebar')

				<!-- Sidebar menu-->
                <div class="app-content">
                    @yield('content')
                </div>
			</div>

			<!--footer-->
			<footer class="footer">
                @include('backend.layouts.partials.footer')
			</footer>
			<!-- End Footer-->
		</div>

        @endif
		<!-- Back to top -->
		{{-- <a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a> --}}

		<!-- JQuery js-->
		<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>

		<!-- Bootstrap js -->
		<script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
		<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.js')}}"></script>

		<!--JQuery Sparkline Js-->
		<script src="{{asset('assets/js/jquery.sparkline.min.js')}}"></script>

		<!-- Circle Progress Js-->
		<script src="{{asset('assets/js/circle-progress.min.js')}}"></script>

		<!-- Selectize Js-->
		<script src="{{asset('assets/js/selectize.min.js')}}"></script>

		<!-- Jquery-bar-rating Js-->
		<script src="{{asset('assets/plugins/jquery-bar-rating/jquery.barrating.js')}}"></script>
		<script src="{{asset('assets/plugins/jquery-bar-rating/js/rating.js')}}"></script>

		<!--Side-menu Js-->
		<script src="{{asset('assets/plugins/toggle-sidebar/sidemenu.js')}}"></script>

		<!-- Perfect scroll bar Js-->
		<script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
		<script src="{{asset('assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>

		<!--Owl Carousel js -->
		<script src="{{asset('assets/plugins/owl-carousel/owl.carousel.js')}}"></script>
		<script src="{{asset('assets/js/owl-carousel.js')}}"></script>

		<!--Internal Counters -->
		<script src="{{asset('assets/plugins/counters/counterup.min.js')}}"></script>
		<script src="{{asset('assets/plugins/counters/waypoints.min.js')}}"></script>

		<!-- Custom Js-->
		<script src="{{asset('assets/js/admin-custom.js')}}"></script>

	</body>
</html>