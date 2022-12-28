<!doctype html>
<html lang="en" dir="ltr">

	<head>
		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="“A journey of a thousand miles begins with a single step” - Lao Tzu">
		<meta name="author" content="Access World Tech">
		<meta name="keywords"
			content="Himalayan Nash|Travel & tours|Tourism|Booking|Holidays|Vacation|Destinations|Adventure|Tour|Nature">
		<link rel="icon" href="{{asset('assets/images/brand/logo-new.png')}}" type="image/x-icon" />
		<link rel="shortcut icon" type="{{asset('assets/images/brand/logo.png')}}" href="favicon.ico" />

		<!-- Title -->
		<title>Himalayan Nash</title>

		<!-- Bootstrap Css -->
		<link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

		<!-- Style Css -->
		<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />

		<!-- Plugins Css -->
		<link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet" />

		<!-- Icons Css -->
		<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" />

		<!-- Jquery-bar-rating css-->
		<link rel="stylesheet" href="{{asset('assets/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">

		<!-- Auto Complete css -->
		<link href="{{asset('assets/plugins/autocomplete/jquery.autocomplete.css')}}" rel="stylesheet">

		<!--Gallery Plugin -->
		<link href="{{asset('assets/plugins/lightgallery/gallery.css')}}" rel="stylesheet">

		<!-- Color-Skins -->
		<link id="theme" href="{{asset('assets/color-skins/color.css')}}" rel="stylesheet" />

		<!-- jquery ui RangeSlider -->
		<link href="{{asset('assets/plugins/jquery-uislider/jquery-ui.css')}}" rel="stylesheet">

		<!-- Perfect scroll bar css-->
		<link href="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" />

		<!--wickedpicker css-->
		<link href="{{asset('assets/plugins/wildtime/wickedpicker.min.css')}}" rel="stylesheet">

		@stack('styles')
	</head>

<body>

	<!--Loader-->
	<div id="global-loader" class="bg-white">
		<div class="loader-svg-img">
			<img src="{{asset('assets/images/brand/logo-new.png')}}" class="" alt="">
		</div>
	</div>
	<!--/Loader-->

	<!--Horizontal Section-->
    <header>
        @include('frontend.layouts.partials.header')
    </header>


    @yield('content')

    	<!--Footer Section-->
	<footer class="bg-primary text-white">
        @include('frontend.layouts.partials.footer')
	</footer>
	<!--Footer Section-->

	<!-- Back to top -->
	<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

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

	<!--Internal :::  Counters -->
	<script src="{{asset('assets/plugins/counters/counterup.min.js')}}"></script>
	<script src="{{asset('assets/plugins/counters/waypoints.min.js')}}"></script>
	<script src="{{asset('assets/plugins/counters/numeric-counter.js')}}"></script>

	<!--Owl Carousel js -->
	<script src="{{asset('assets/plugins/owl-carousel/owl.carousel.js')}}"></script>
	<script src="{{asset('assets/js/owl-carousel.js')}}"></script>

	<!--Horizontal Menu-->
	<script src="{{asset('assets/plugins/horizontal/horizontal-menu/horizontal.js')}}"></script>

	<!--JQuery TouchSwipe js-->
	<script src="{{asset('assets/js/jquery.touchSwipe.min.js')}}"></script>

	<!--Select2 js -->
	<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
	<script src="{{asset('assets/js/select2.js')}}"></script>

	<!-- sticky Js-->
	<script src="{{asset('assets/js/sticky.js')}}"></script>

	<!-- Internal :::   Ion.RangeSlider -->
	<script src="{{asset('assets/plugins/jquery-uislider/jquery-ui.js')}}"></script>
	<script src="{{asset('assets/js/price-range.js')}}"></script>

	<!-- Cookie js -->
	{{-- <script src="{{asset('assets/plugins/cookie/jquery.ihavecookies.js')}}"></script>
	<script src="{{asset('assets/plugins/cookie/cookie.js')}}"></script> --}}

	<!--Auto Complete js -->
	<script src="{{asset('assets/plugins/autocomplete/jquery.autocomplete.js')}}"></script>
	<script src="{{asset('assets/plugins/autocomplete/autocomplete.js')}}"></script>

	<!-- Internal :::   Moment js-->
	<script src="{{asset('assets/plugins/moment/moment.js')}}"></script>

	<!-- Internal :::   Daterange js-->
	<script src="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{asset('assets/js/daterange.js')}}"></script>

	<!-- Internal :::    Gallery js -->
	<script src="{{asset('assets/plugins/lightgallery/lightgallery-all.min.js')}}"></script>
	<script src="{{asset('assets/plugins/lightgallery/jquery.mousewheel.min.js')}}"></script>
	<script src="{{asset('assets/js/gallery.js')}}"></script>
	<script src="{{asset('assets/js/country-gallery.js')}}"></script>

	<!-- Internal :::   Vertical scroll bar Js-->
	<script src="{{asset('assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js')}}"></script>
	<script src="{{asset('assets/plugins/vertical-scroll/vertical-scroll.js')}}"></script>

	<!-- Internal :::    Swipe Js-->
	<script src="{{asset('assets/js/swipe.js')}}"></script>

	<!-- Scripts Js-->
	<script src="{{asset('assets/js/scripts.js')}}"></script>

	<!-- Custom Js-->
	<script src="{{asset('assets/js/custom.js')}}"></script>

    <!-- Internal :::   Datepicker js -->
	<script src="{{asset('assets/plugins/date-picker/jquery-ui.js')}}"></script>

	<!-- Typewritter Js-->
	<script src="{{asset('assets/js/typewritter.js')}}"></script>

	<!-- Form wizard js -->
	<script src="{{asset('assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js')}}"></script>
	<script src="{{asset('assets/plugins/jquery-validation/dist/jquery.validate.min.js')}}"></script>
	<script src="{{asset('assets/js/wizard.js')}}"></script>

	<!-- Perfect scroll bar Js-->
	<script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
	<script src="{{asset('assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>


    <script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>

	<!-- Internal :::   Datepicker Custom js -->
	<script src="{{asset('assets/js/date-picker.js')}}"></script>
	<script type="text/javascript">
	$(".search_trigger").on("click", function() {
			$(".search-overlay").toggleClass('open');
			$(".search_trigger").toggleClass('open');
		});
		function submitForm() {
		    document.priceOptionForm.submit();
		}
		document.onkeydown = function () {
		    if (window.event.keyCode == '13') {
		        submitForm();
		    }
		}
		// document.getElementById("profile_price").onclick = submitForm;

	</script>
	@stack('script')
</body>

</html>
