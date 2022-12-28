@extends('frontend.layouts.app')

@section('content')

    <!--Breadcrumb-->
    <section class="bannerimg banner-1 cover-image pt-9 pb-10 sptb-tab bg-background2" data-image-src="{{asset('assets/images/Travel&tours/mountains-6043079_1920.jpg')}}">
        <div class="header-text mb-0">
            <div class="container">
                <div class="row text-white">
                    <div class="col"><h1 class="">Contact Us</h1></div>
                    <div class="col col-auto">
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Contact</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--/Breadcrumb-->
    
		<!--Contact-->
		<div class="sptb bg-white">
			<div class="container">
				<div class="">
					<div class="row no-gutters">
						<div class="col-lg-8 col-xl-8 col-md-12">
                            @if(Illuminate\Support\Facades\Session::has('success'))
                            <div class="alert alert-success" id="alert-success">
                                {{Illuminate\Support\Facades\Session::get('success')}}
                            </div>
                            @endif
							<div class="card">
								<div class="card-header">
									<div class="card-title">Get In Touch With Us</div>
								</div>
								<div class="card-body">
									<form action="{{route('send_enquiry')}}" method="POST">
                                        @csrf
										<div class="form-group">
											<input type="text" class="form-control" name="first_name" id="name1" placeholder="First Name" required>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" name="last_name" id="name2" placeholder="Last Name" required>
										</div>
										<div class="form-group">
											<input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required>
										</div>
										<div class="form-group">
											<input type="tel" class="form-control" name="phone_no" placeholder="Phone Number" required>
										</div>
										<div class="form-group">
											<textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
										</div>
										<button type="submit" class="btn btn-primary btn-block">Send Message</button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-xl-4 col-md-12">
							<div class="">
								<div class="px-4">
                                    @if(setting('name')) 
									<div class="item-user mt-5">
										<div class="d-flex">
											<span><i class="fa fa-map mr-3 mb-0 bg-primary text-white"></i></span>
											<h6 class="leading-normal"><span class="font-weight-semibold"></span><a href="#" class="text-body">{{setting('name')}}<br>@if(setting('postbox')){{setting('postbox')}},@endif  @if(setting('address')){{setting('address')}} @endif</a></h6>
										</div>
									</div>
                                    @endif
                                    @if(setting('email'))
									<div class="item-user mt-4">
										<div class="d-flex">
											<span><i class="fa fa-envelope mr-3 mb-0 bg-secondary text-white"></i></span>
											<h6 class="leading-normal mt-1"><span class="font-weight-semibold"></span><a href="mailto:{{setting('email')}}" class="text-body">{{setting('email')}}</a></h6>
										</div>
									</div>
                                    @endif
                                    @if(setting('phone'))
									<div class="item-user mt-4">
										<div class="d-flex">
											<span><i class="fa fa-phone mr-3 mb-0 bg-success text-white"></i></span>
											<h6 class="leading-normal mt-1"><span class="font-weight-semibold"></span><a href="tel:{{setting('phone')}}" class="text-body">{{setting('phone')}}</a> <br> @if(setting('phone_alternate')) <a href="tel:{{setting('phone_alternate')}}" class="text-body">{{setting('phone')}}</a> @endif</h6>
										</div>
									</div>
                                    @endif
								</div>
                                @if(setting('google_map'))
                                <div class="map-header h-300 br-5 overflow-hidden px-2">
                                    <div class="map-header-layer" id="map2">
                                        <iframe src="{{setting('google_map')}}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                                @endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Contact-->
@endsection
@push('scripts')
<script>
    setTimeout(function(){
        $('#alert-success').hide();
    }, 3000);
</script>
@endpush