@extends('frontend.layouts.app')
@push('styles')
    <style>
        .item-card2-icons-r {
            background: #e91e63 !important;
        }
    </style>
@endpush

@section('content')
    		<!--Section-->
		<section>
			<div id="Slider" class="carousel slide" data-ride="carousel">
				<a class="carousel-control-prev left-0" href="#Slider" role="button" data-slide="prev">
					<i class="carousel-control-prev-icon fa fa-angle-left"></i>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next right-0" href="#Slider" role="button" data-slide="next">
					<i class="carousel-control-next-icon fa fa-angle-right"></i>
					<span class="sr-only">Next</span>
				</a>
				<div class="carousel-inner">
                    @if($sliders->isNotEmpty())
                        @foreach ($sliders as $slider)
                        <div class="carousel-item @if($loop->index == 0) active @endif">
                            <img class="d-block w-100" alt="" src="{{asset($slider->image_path)}}" data-holder-rendered="true">
                        </div>
                        @endforeach
                    @else
                        <div class="carousel-item active">
                            <img class="d-block w-100" alt="" src="{{asset('assets\images\WhatsApp Image 2022-06-26 at 4.13.50 PM.jpeg')}}" data-holder-rendered="true">
                        </div>
                    @endif
				</div>
                <div class="header-text slide-header-text">
                    <div class="container ">
                        <div class="text-center text-white mb-4">
                            <h2 class="font-weight-bold">Search for your favourite</h2>
                            <a href="" class="typewrite font-weight-bold text-uppercase" data-period="2000"
                                data-type='[ "Tour","Holiday","Expedition" ]' style="font-size: 2.8rem;">
                                <span class="wrap"></span>
                            </a>
                            <p>Find the world's largest collection of tours & travel Packages.</p>
                        </div>
                        <form action="{{ route('package_search') }}">
                            <div class="row">
                                <div class="col-xl-11 col-lg-12 col-md-12 d-block mx-auto">
                                    <div class="search-background">
                                        <div class="form row no-gutters">
                                            <div
                                                class="form-group col-xl-3 col-lg-3 col-md-12 col-12 mb-0 select2-lg border-right br-tr-0 br-br-0">
                                                <select
                                                    class="form-control custom-select select2-show-search border-bottom-0 w-100 multi"
                                                    required name="country">
                                                    <option value="#" selected disabled>All Destination</option>
                                                    <option value="nepal" selected>Nepal</option>
                                                    <option value="india">India</option>
                                                </select>
                                            </div>
                                            <div
                                                class="form-group col-xl-3 col-lg-3 col-md-12 col-12 mb-0 select2-lg border-right p-1">
                                                <select class="form-control custom-select select2-show-search multi"
                                                    multiple="multiple" placeholder="Select Activities" required
                                                    name="categories[]">
                                                    <option disabled> -- Select Activities -- </option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-3 col-lg-3 col-md-12 col-12 mb-0 select2-lg border-right">
                                                <select class="form-control select2-show-search border-bottom-0 w-100"
                                                    name="duration" required>
                                                    <option value="" selected disabled>Duration</option>
                                                    <option value="1,7">1-7 Days</option>
                                                    <option value="8,12">8-12 Days</option>
                                                    <option value="12,21">12-21 Days</option>
                                                </select>
                                            </div>


                                            <div class="col-xl-3 col-lg-3 col-md-12 mb-0">
                                                <input type="submit"
                                                    class="btn btn-block btn-secondary btn-lg fs-14 br-tl-0 br-bl-0 shadow-none ml-0"
                                                    value="Search">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!-- /header-text -->
                </div>
			</div>
		</section>
		<!--Section-->


    <!--section About-->
    <section class="categories absolute-banner-section absolute-banner-section-responsive">
        <div class="container">
            <div class="card mb-0 box-shadow-0">
                <div class="card-body">
                    <div class="row">
                        @if (!empty($about))
                            <div class="col-lg-4">
                                <img src="{{ asset($about->image_path) }}" alt=""
                                    class="img img-fluid img-absolute-bottom">
                            </div>
                            <div class="col-lg-8 sptb">
                                <div class="section-title text-left pb-2">
                                    <h2>About Us</h2>
                                </div>
                                <p class="leading-normal-2" style="text-align: justify;">{{ $about->meta_description }}
                                    <br><a class="btn-link text-primary"
                                        href="{{ route('page.detail', $about->slug) }}">Read
                                        More</a>
                                </p>
                                @if ($about_sliders->isNotEmpty())
                                    <div class="owl-carousel owl-carousel-icons52">
                                        @foreach ($about_sliders as $slider)
                                            <div class="item">
                                                <div class="text-center br-5 overflow-hidden">
                                                    <a><img src="{{ $slider->image_path }}" alt="img"
                                                            class="br-tl-5 br-tr-5" height="150" width="150"></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                        @endif

                    </div>
                </div>

                <div class="section-title center-block text-center pt-2 pb-5">
                    <span class="heading-style text-secondary">What Our</span>
                    <h1 class="position-relative">Owner Says</h1>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="" class="">
                            <div class="item text-center pt-0">
                                <div class="row">
                                    <div class="col-xl-8 col-md-12 d-block mx-auto">
                                        <div class="">
                                            <p class="">
                                                <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit. Quod eos id officiis hic tenetur quae quaerat ad velit ab.
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore cum
                                                accusamus eveniet molestias voluptatum inventore laboriosam labore sit,
                                                aspernatur praesentium iste impedit quidem dolor veniam.
                                            </p>
                                            <h3 class="title mb-1 fs-18 font-weight-semibold2">Elizabeth</h3>
                                        </div>
                                        <a href="{{route('contact_us')}}" class="btn btn-sendenquiry mt-1 mb-1 mr-2">Contact A Specialist</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!--/section About-->
    @if ($trending_places->isNotEmpty())
    <!--Section Advertisement-->
    <section class="sptb advertisement">
        <div class="container">
            <div class="section-title center-block text-center">
                <span class="heading-style text-secondary">Trending</span>
                <h2>Tour Places</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-carousel-icons3">
                        @foreach ($trending_places as $trend)
                            <div class="item">
                                <div class="card cover-image bg-background-color place-tour-card"
                                    data-image-src="{{ asset($trend->image_path) }}">
                                    <div class="card-body p-lg-8 pb-9 pt-8 text-white content-text place-tour">
                                        <h2 class="mt-2">{{ $trend->name }}</h2>
                                        <p class="fs-14 mt-4 leading-loose">{!! Str::limit($trend->overview, 200) !!}</p>
                                        <a class="btn btn-lg btn-secondary px-6"
                                            href="{{ route('package_details', $trend->slug) }}">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Section-->
@endif
		<!--Section Categroies-->
        @if($categories->isNotEmpty())
		<section class="about-1 cover-image sptb bg-background-color" data-image-src="#">
			<div class="container">
				<div class="content-text mb-0 text-white info">
					<div id="small-categories" class="owl-carousel owl-carousel-icons41">
                        @foreach ($categories as $category)
                        <div class="item">
							<a href="javaScript:void(0)" class="p-4 pt-5 tour-service tour-service2 text-white category_link" style="width: 171px;" id="category_link">
								@if($category->image)<img src="{{asset($category->image_path)}}" alt="img" class="w-8 h-8 mb-4 text-center mx-auto" loading="lazy">@endif
								<h6 id="category-click">{{$category->name}}</h6>
							</a>
						</div>
                        @endforeach
					</div>
				</div>
			</div>
		</section>
        @endif
		<!--/Section Categories-->

    <!--Section Trekking-->
    @if ($treks->isNotEmpty())
        <section class="sptb">
            <div class="container">
                <div class="section-title center-block text-center">
                    <span class="heading-style text-secondary">Explore</span>
                    <h1>Trekking & Hiking In Nepal</h1>
                </div>
                <div id="myCarousel1" class="owl-carousel owl-carousel-icons">
                    @foreach ($treks as $trek)
                        <div class="item">
                            <div class="relative mb-0 item-card2-card">
                                <div class="item-card2-img br-5">
                                    @if (Auth::guard('customer')->user())
                                        <div class="item-card2-icons">
                                            <a href="javaScript:void(0)"
                                                @if (in_array($trek->id, $customerFavPackages)) class="item-card2-icons-r"
                                                @else
                                                class="home-update-favorite" @endif
                                                data-package_id="{{ $trek->id }}" data-customer_login_status="1"><i
                                                    class="fa fa fa-heart-o"></i></a>
                                        </div>
                                    @else
                                        <div class="item-card2-icons">
                                            <a href="javaScript:void(0)" class="home-update-favorite"
                                                data-package_id="{{ $trek->id }}" data-customer_login_status="0"
                                                data-toggle="modal">
                                                <i class="fa fa fa-heart-o"></i>
                                            </a>
                                        </div>
                                    @endif
                                    <a href="{{ route('package_details', $trek->slug) }}" class="absolute-link2"></a>
                                    <img src="{{ asset($trek->image_path) }}" alt="img" class="cover-image br-5"
                                        loading="lazy">
                                    {{-- @if($trek->price)<div class="item-card7-overlaytext">
                                        <h4 class="mb-0">${{ $trek->price }}</h4>
                                    </div>@endif --}}
                                </div>
                                <div class="card-body p-0">
                                    <div class="item-card2 p-5 mt-3 bg-white br-5">
                                        <div class="item-card2-desc">
                                            <div class="item-card2-text">
                                                <a href="{{ route('package_details', $trek->slug) }}"
                                                    class="text-dark">
                                                    <h4 class="font-weight-bold mb-2">{{ $trek->name }}</h4>
                                                </a>
                                            </div>
                                            <p class="fs-14 mb-1">@if($trek->no_of_days)<b> {{ $trek->no_of_days }} Days</b>@endif @if($trek->no_of_nights),
                                                <b>{{ $trek->no_of_nights }} Nights</b>@endif Difficulty Level:@if ($trek->difficulty_level)
                                                    {{ $trek->difficulty_level }}
                                                @else
                                                    N/A
                                                @endif
                                            </p>
                                        </div>
                                        <div class="d-flex border-top pt-3 mt-3">
                                            <ul class="d-flex mb-1">
                                                <li class=""><i
                                                        class="fe fe-map-pin fs-14 text-muted mr-1"></i>{{ $trek->location }}
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#" class="btn btn-sendenquiry mt-1 mb-1 mr-2" data-toggle="modal"
                                            data-target="#enquiryModal{{$trek->id}}"> Send Enquiry</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @foreach ($treks as $trek)
                                      <!-- Enquiry Modal Start-->
					<div class="modal fade" id="enquiryModal{{$trek->id}}" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
						  <div class="modal-content">
							<div class="modal-header">
							  <h5 class="modal-title" id="exampleModalLabel">Enquiry Form</h5>

							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>

							</div>
							<form action="{{route('package.send_enquiry')}}" method="POST">
								@csrf
								<div class="modal-body">
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <div class="modal-background" style="background: url('{{asset($trek->image_path)}}');height: 220px;width: 100%;background-position: center center;background-repeat: no-repeat;background-size: cover;">
                                            </div>
                                        </div>
                                    </div>
								  <div class="row">
									  <div class="col-sm-6 col-12">
										  <div class="form-group">
											  <input type="hidden" class="form-control" name="package_id" value="{{$trek->id}}">
											  <label for="name" class="form-label">First Name</label>
											  <input type="text" class="form-control" placeholder="First Name" name="first_name" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->first_name}}" @endif required>
										  </div>
									  </div>
									  <div class="col-sm-6 col-12">
										<div class="form-group">
											<label for="name" class="form-label">Last Name</label>
											<input type="text" class="form-control" placeholder="Last Name" name="last_name" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->last_name}}" @endif >
										</div>
									</div>
									  <div class="col-sm-12">
										<div class="form-group">
											<label for="name" class="form-label">Email</label>
											<input type="email" class="form-control" placeholder="Email" name="email" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->email}}" @endif  required>
										</div>
									  </div>
									  <div class="col-sm-12">
										<div class="form-group">
											<label for="name" class="form-label">Contact No.</label>
											<input type="tel" class="form-control" placeholder="Contact Number" name="contact_no" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->contact_no}}" @endif  required>
										</div>
									  </div>
									  <div class="col-sm-12">
										<div class="form-group">
											<label for="name" class="form-label">Message</label>
											<textarea name="message" id="inquiry_text" class="form-control" placeholder="Your enquiry here..." required></textarea>
										</div>
									  </div>
								  </div>
								</div>
								<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						  </div>
						</div>
					  </div>
					<!-- Enquiry Modal End-->
                @endforeach

            </div>
        </section>
        <!--Section Trekking-->
    @endif



    <!--Section Expedition-->
    @if($expeditions->isNotEmpty())
    <section class="cover-image bg-background-color" data-image-src="{{asset('assets/images/banners/banner.png')}}">
        <div class="container">
            <div class="row content-text">
                <div class="col-xl-3 m-0">
                    <div class="pt-xl-9 pt-7 pr-0 pl-4 pl-xl-0">
                        <span class="heading-style" style="color: #e91e63 !important;">Explore</span>
                        <div class="Special-title fs-50 text-white font-weight-bold leading-tight">Expedition & Peak Climbing In Nepal
                        </div>
                        <a class="btn btn-lg btn-secondary px-7 mt-5" href="{{route('explore.expeditions')}}" id="dyanamic">View All</a>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="py-6 px-0">
                        <div id="myCarousel12" class="owl-carousel owl-carousel-icons6">
                            @foreach ($expeditions as $expedition)
                            <div class="item">
                                <div class="relative mb-0 item-card2-card">
                                    <div class="item-card2-img br-5">
                                        <a href="{{ route('package_details', $expedition->slug) }}" class="absolute-link2"></a>
                                        <img src="{{asset($expedition->image_path)}}"
                                            alt="img" class="cover-image br-5" loading="lazy">
                                        {{-- @if($expedition->price)
                                        <div class="item-card7-overlaytext">
                                            <h4 class="mb-0">${{$expedition->price}}</h4>
                                        </div>
                                        @endif --}}
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="item-card2 p-5 mt-3 bg-white br-5">
                                            <div class="item-card2-desc">
                                                <div class="item-card2-text">
                                                    <a href="{{ route('package_details', $expedition->slug) }}" class="text-dark">
                                                        <h4 class="font-weight-bold mb-2">{{$expedition->name}}</h4>
                                                    </a>
                                                </div>
                                                <p class="fs-14 mb-1">@if($expedition->no_of_days)<b>{{$expedition->no_of_days}} Days</b>@endif @if($expedition->no_of_nights), <b>{{$expedition->no_if_nights}} Nights @endif</b></p>
                                            </div>
                                            <div class="d-flex border-top pt-3 mt-3">
                                                <ul class="d-flex mb-1">
                                                    <li class=""><a href="#" class="icons"><i
                                                                class="fe fe-map-pin fs-14 text-muted mr-1"></i>{{$expedition->location}}</a></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-sendenquiry mt-1 mb-1 mr-2"
                                                data-toggle="modal" data-target="#enquiryModal{{$expedition->id}}">Send Enquiry</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($expeditions as $expedition)
            		<!-- Enquiry Modal Start-->
					<div class="modal fade" id="enquiryModal{{$expedition->id}}" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
						  <div class="modal-content">
							<div class="modal-header">
							  <h5 class="modal-title" id="exampleModalLabel">Enquiry Form</h5>

							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>

							</div>
							<form action="{{route('package.send_enquiry')}}" method="POST">
								@csrf
								<div class="modal-body">
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <div class="modal-background" style="background: url('{{asset($expedition->image_path)}}');height: 220px;width: 100%;background-position: center center;background-repeat: no-repeat;background-size: cover;">
                                            </div>
                                        </div>
                                    </div>
								  <div class="row">
									  <div class="col-sm-6 col-12">
										  <div class="form-group">
											  <input type="hidden" class="form-control" name="package_id" value="{{$expedition->id}}">
											  <label for="name" class="form-label">First Name</label>
											  <input type="text" class="form-control" placeholder="First Name" name="first_name" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->first_name}}" @endif required>
										  </div>
									  </div>
									  <div class="col-sm-6 col-12">
										<div class="form-group">
											<label for="name" class="form-label">Last Name</label>
											<input type="text" class="form-control" placeholder="Last Name" name="last_name" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->last_name}}" @endif >
										</div>
									</div>
									  <div class="col-sm-12">
										<div class="form-group">
											<label for="name" class="form-label">Email</label>
											<input type="email" class="form-control" placeholder="Email" name="email" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->email}}" @endif  required>
										</div>
									  </div>
									  <div class="col-sm-12">
										<div class="form-group">
											<label for="name" class="form-label">Contact No.</label>
											<input type="tel" class="form-control" placeholder="Contact Number" name="contact_no" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->contact_no}}" @endif  required>
										</div>
									  </div>
									  <div class="col-sm-12">
										<div class="form-group">
											<label for="name" class="form-label">Message</label>
											<textarea name="message" id="inquiry_text" class="form-control" placeholder="Your enquiry here..." required></textarea>
										</div>
									  </div>
								  </div>
								</div>
								<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						  </div>
						</div>
					  </div>
					<!-- Enquiry Modal End-->
        @endforeach
    </section>
    @endif
    <!--Section Expedition-->

    <!--Section Rafting-->
        @if ($rafting->isNotEmpty())
        <section class="sptb">
            <div class="container">
                <div class="section-title center-block text-center">
                    <span class="heading-style text-secondary">Explore</span>
                    <h1>River Rafting In Nepal</h1>
                </div>
                <div id="myCarousel1" class="owl-carousel owl-carousel-icons">
                    @foreach ($rafting as $raft)
                        <div class="item">
                            <div class="relative mb-0 item-card2-card">
                                <div class="item-card2-img br-5">
                                    <a href="{{ route('package_details', $raft->slug) }}" class="absolute-link2"></a>
                                    <img src="{{ asset($raft->image_path) }}" alt="img" class="cover-image br-5"
                                        loading="lazy">
                                    {{-- @if($raft->price)<div class="item-card7-overlaytext">
                                        <h4 class="mb-0">${{ $raft->price }}</h4>
                                    </div>@endif --}}
                                </div>
                                <div class="card-body p-0">
                                    <div class="item-card2 p-5 mt-3 bg-white br-5">
                                        <div class="item-card2-desc">
                                            <div class="item-card2-text">
                                                <a href="{{ route('package_details', $raft->slug) }}"
                                                    class="text-dark">
                                                    <h4 class="font-weight-bold mb-2">{{ $raft->name }}</h4>
                                                </a>
                                            </div>
                                            <p class="fs-14 mb-1">@if($raft->no_of_days)<b> {{ $raft->no_of_days }} Days</b>@endif @if($raft->no_of_nights),
                                                <b>{{ $raft->no_of_nights }} Nights</b>@endif Difficulty Level:@if ($raft->difficulty_level)
                                                    {{ $raft->difficulty_level }}
                                                @else
                                                    N/A
                                                @endif
                                            </p>
                                        </div>
                                        <div class="d-flex border-top pt-3 mt-3">
                                            <ul class="d-flex mb-1">
                                                <li class=""><i
                                                        class="fe fe-map-pin fs-14 text-muted mr-1"></i>{{ $raft->location }}
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#" class="btn btn-sendenquiry mt-1 mb-1 mr-2" data-toggle="modal"
                                            data-target="#enquiryModal{{$raft->id}}"> Send Enquiry</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @foreach ($rafting as $raft)
                                      <!-- Enquiry Modal Start-->
					<div class="modal fade" id="enquiryModal{{$raft->id}}" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
						  <div class="modal-content">
							<div class="modal-header">
							  <h5 class="modal-title" id="exampleModalLabel">Enquiry Form</h5>

							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>

							</div>
							<form action="{{route('package.send_enquiry')}}" method="POST">
								@csrf
								<div class="modal-body">
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <div class="modal-background" style="background: url('{{asset($raft->image_path)}}');height: 220px;width: 100%;background-position: center center;background-repeat: no-repeat;background-size: cover;">
                                            </div>
                                        </div>
                                    </div>
								  <div class="row">
									  <div class="col-sm-6 col-12">
										  <div class="form-group">
											  <input type="hidden" class="form-control" name="package_id" value="{{$raft->id}}">
											  <label for="name" class="form-label">First Name</label>
											  <input type="text" class="form-control" placeholder="First Name" name="first_name" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->first_name}}" @endif required>
										  </div>
									  </div>
									  <div class="col-sm-6 col-12">
										<div class="form-group">
											<label for="name" class="form-label">Last Name</label>
											<input type="text" class="form-control" placeholder="Last Name" name="last_name" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->last_name}}" @endif >
										</div>
									</div>
									  <div class="col-sm-12">
										<div class="form-group">
											<label for="name" class="form-label">Email</label>
											<input type="email" class="form-control" placeholder="Email" name="email" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->email}}" @endif  required>
										</div>
									  </div>
									  <div class="col-sm-12">
										<div class="form-group">
											<label for="name" class="form-label">Contact No.</label>
											<input type="tel" class="form-control" placeholder="Contact Number" name="contact_no" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->contact_no}}" @endif  required>
										</div>
									  </div>
									  <div class="col-sm-12">
										<div class="form-group">
											<label for="name" class="form-label">Message</label>
											<textarea name="message" id="inquiry_text" class="form-control" placeholder="Your enquiry here..." required></textarea>
										</div>
									  </div>
								  </div>
								</div>
								<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						  </div>
						</div>
					  </div>
					<!-- Enquiry Modal End-->
                @endforeach

            </div>
        </section>
    <!--Section Rafting-->
        @endif

    {{-- SECTION RELIGIOUS & SPIRITUAL --}}
            <!--Section Tour-->
    @if($religious_tours->isNotEmpty())
    <section class="cover-image bg-background-color" data-image-src="{{asset('assets/images/banners/banner.png')}}">
        <div class="container">
            <div class="row content-text">
                <div class="col-xl-3 m-0">
                    <div class="pt-xl-9 pt-7 pr-0 pl-4 pl-xl-0">
                        <span class="heading-style" style="color: #e91e63 !important;">Explore</span>
                        <div class="Special-title fs-50 text-white font-weight-bold leading-tight">Spiritual & Religious Tours In Nepal
                        </div>
                        <a class="btn btn-lg btn-secondary px-7 mt-5 mb-5" href="{{route('explore.religions')}}" id="dyanamic">View All</a>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="py-6 px-0">
                        <div id="myCarousel12" class="owl-carousel owl-carousel-icons6">
                            @foreach ($religious_tours as $tour)
                            <div class="item">
                                <div class="relative mb-0 item-card2-card">
                                    <div class="item-card2-img br-5">
                                        <a href="{{ route('package_details', $tour->slug) }}" class="absolute-link2"></a>
                                        <img src="{{asset($tour->image_path)}}"
                                            alt="img" class="cover-image br-5" loading="lazy">
                                        {{-- @if($tour->price)
                                        <div class="item-card7-overlaytext">
                                            <h4 class="mb-0">${{$tour->price}}</h4>
                                        </div>
                                        @endif --}}
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="item-card2 p-5 mt-3 bg-white br-5">
                                            <div class="item-card2-desc">
                                                <div class="item-card2-text">
                                                    <a href="{{ route('package_details', $tour->slug) }}" class="text-dark">
                                                        <h4 class="font-weight-bold mb-2">{{$tour->name}}</h4>
                                                    </a>
                                                </div>
                                                <p class="fs-14 mb-1">@if($tour->no_of_days)<b>{{$tour->no_of_days}} Days</b>@endif @if($tour->no_of_nights), <b>{{$tour->no_if_nights}} Nights @endif</b></p>
                                            </div>
                                            <div class="d-flex border-top pt-3 mt-3">
                                                <ul class="d-flex mb-1">
                                                    <li class=""><a href="#" class="icons"><i
                                                                class="fe fe-map-pin fs-14 text-muted mr-1"></i>{{$tour->location}}</a></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-sendenquiry mt-1 mb-1 mr-2"
                                                data-toggle="modal" data-target="#enquiryModal{{$tour->id}}">Send Enquiry</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($religious_tours as $tour)
            		<!-- Enquiry Modal Start-->
					<div class="modal fade" id="enquiryModal{{$tour->id}}" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
						  <div class="modal-content">
							<div class="modal-header">
							  <h5 class="modal-title" id="exampleModalLabel">Enquiry Form</h5>

							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>

							</div>
							<form action="{{route('package.send_enquiry')}}" method="POST">
								@csrf
								<div class="modal-body">
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <div class="modal-background" style="background: url('{{asset($tour->image_path)}}');height: 220px;width: 100%;background-position: center center;background-repeat: no-repeat;background-size: cover;">
                                            </div>
                                        </div>
                                    </div>
								  <div class="row">
									  <div class="col-sm-6 col-12">
										  <div class="form-group">
											  <input type="hidden" class="form-control" name="package_id" value="{{$tour->id}}">
											  <label for="name" class="form-label">First Name</label>
											  <input type="text" class="form-control" placeholder="First Name" name="first_name" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->first_name}}" @endif required>
										  </div>
									  </div>
									  <div class="col-sm-6 col-12">
										<div class="form-group">
											<label for="name" class="form-label">Last Name</label>
											<input type="text" class="form-control" placeholder="Last Name" name="last_name" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->last_name}}" @endif >
										</div>
									</div>
									  <div class="col-sm-12">
										<div class="form-group">
											<label for="name" class="form-label">Email</label>
											<input type="email" class="form-control" placeholder="Email" name="email" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->email}}" @endif  required>
										</div>
									  </div>
									  <div class="col-sm-12">
										<div class="form-group">
											<label for="name" class="form-label">Contact No.</label>
											<input type="tel" class="form-control" placeholder="Contact Number" name="contact_no" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->contact_no}}" @endif  required>
										</div>
									  </div>
									  <div class="col-sm-12">
										<div class="form-group">
											<label for="name" class="form-label">Message</label>
											<textarea name="message" id="inquiry_text" class="form-control" placeholder="Your enquiry here..." required></textarea>
										</div>
									  </div>
								  </div>
								</div>
								<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						  </div>
						</div>
					  </div>
					<!-- Enquiry Modal End-->
        @endforeach
    </section>
    @endif
    <!--Section Tour-->
    {{-- SECTION RELIGIOUS & SPIRITUAL ENDS --}}

    {{-- SECTION CULTURAL & HISTORICAL --}}
        @if ($cultural_tours->isNotEmpty())
        <section class="sptb">
            <div class="container">
                <div class="section-title center-block text-center">
                    <span class="heading-style text-secondary">Explore</span>
                    <h1>Cultural & Historical Tours In Nepal</h1>
                </div>
                <div id="myCarousel1" class="owl-carousel owl-carousel-icons">
                    @foreach ($cultural_tours as $cultural)
                        <div class="item">
                            <div class="relative mb-0 item-card2-card">
                                <div class="item-card2-img br-5">
                                    <a href="{{ route('package_details', $cultural->slug) }}" class="absolute-link2"></a>
                                    <img class="lozad" data-src="{{ asset($cultural->image_path) }}" alt="img" class="cover-image br-5"
                                        loading="lazy">
                                    {{-- @if($cultural->price)<div class="item-card7-overlaytext">
                                        <h4 class="mb-0">${{ $cultural->price }}</h4>
                                    </div>@endif --}}
                                </div>
                                <div class="card-body p-0">
                                    <div class="item-card2 p-5 mt-3 bg-white br-5">
                                        <div class="item-card2-desc">
                                            <div class="item-card2-text">
                                                <a href="{{ route('package_details', $cultural->slug) }}"
                                                    class="text-dark">
                                                    <h4 class="font-weight-bold mb-2">{{ $cultural->name }}</h4>
                                                </a>
                                            </div>
                                            <p class="fs-14 mb-1">@if($cultural->no_of_days)<b> {{ $cultural->no_of_days }} Days</b>@endif @if($cultural->no_of_nights),
                                                <b>{{ $cultural->no_of_nights }} Nights</b>@endif Difficulty Level:@if ($cultural->difficulty_level)
                                                    {{ $cultural->difficulty_level }}
                                                @else
                                                    N/A
                                                @endif
                                            </p>
                                        </div>
                                        <div class="d-flex border-top pt-3 mt-3">
                                            <ul class="d-flex mb-1">
                                                <li class=""><i
                                                        class="fe fe-map-pin fs-14 text-muted mr-1"></i>{{ $cultural->location }}
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#" class="btn btn-sendenquiry mt-1 mb-1 mr-2" data-toggle="modal"
                                            data-target="#enquiryModal{{$cultural->id}}"> Send Enquiry</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @foreach ($cultural_tours as $cultural)
                                      <!-- Enquiry Modal Start-->
					<div class="modal fade" id="enquiryModal{{$cultural->id}}" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
						  <div class="modal-content">
							<div class="modal-header">
							  <h5 class="modal-title" id="exampleModalLabel">Enquiry Form</h5>

							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>

							</div>
							<form action="{{route('package.send_enquiry')}}" method="POST">
								@csrf
								<div class="modal-body">
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <div class="modal-background" style="background: url('{{asset($cultural->image_path)}}');height: 220px;width: 100%;background-position: center center;background-repeat: no-repeat;background-size: cover;">
                                            </div>
                                        </div>
                                    </div>
								  <div class="row">
									  <div class="col-sm-6 col-12">
										  <div class="form-group">
											  <input type="hidden" class="form-control" name="package_id" value="{{$cultural->id}}">
											  <label for="name" class="form-label">First Name</label>
											  <input type="text" class="form-control" placeholder="First Name" name="first_name" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->first_name}}" @endif required>
										  </div>
									  </div>
									  <div class="col-sm-6 col-12">
										<div class="form-group">
											<label for="name" class="form-label">Last Name</label>
											<input type="text" class="form-control" placeholder="Last Name" name="last_name" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->last_name}}" @endif >
										</div>
									</div>
									  <div class="col-sm-12">
										<div class="form-group">
											<label for="name" class="form-label">Email</label>
											<input type="email" class="form-control" placeholder="Email" name="email" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->email}}" @endif  required>
										</div>
									  </div>
									  <div class="col-sm-12">
										<div class="form-group">
											<label for="name" class="form-label">Contact No.</label>
											<input type="tel" class="form-control" placeholder="Contact Number" name="contact_no" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->contact_no}}" @endif  required>
										</div>
									  </div>
									  <div class="col-sm-12">
										<div class="form-group">
											<label for="name" class="form-label">Message</label>
											<textarea name="message" id="inquiry_text" class="form-control" placeholder="Your enquiry here..." required></textarea>
										</div>
									  </div>
								  </div>
								</div>
								<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						  </div>
						</div>
					  </div>
					<!-- Enquiry Modal End-->
                @endforeach

            </div>
        </section>
        @endif
    {{-- SECTION CULTURAL & HISTORICAL END --}}

    {{-- SECTION NATURE & WILDLIFE --}}
    @if($nature_tours->isNotEmpty())
    <section class="cover-image bg-background-color" data-image-src="{{asset('assets/images/banners/banner.png')}}">
        <div class="container">
            <div class="row content-text">
                <div class="col-xl-3 m-0">
                    <div class="pt-xl-9 pt-7 pr-0 pl-4 pl-xl-0">
                        <span class="heading-style" style="color: #e91e63 !important;">Explore</span>
                        <div class="Special-title fs-50 text-white font-weight-bold leading-tight">Nature & Wildlife In Nepal
                        </div>
                        <a class="btn btn-lg btn-secondary px-7 mt-5 mb-5" href="#" id="dyanamic">View All</a>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="py-6 px-0">
                        <div id="myCarousel12" class="owl-carousel owl-carousel-icons6">
                            @foreach ($nature_tours as $nature)
                            <div class="item">
                                <div class="relative mb-0 item-card2-card">
                                    <div class="item-card2-img br-5">
                                        <a href="{{ route('package_details', $nature->slug) }}" class="absolute-link2"></a>
                                        <img src="{{asset($nature->image_path)}}"
                                            alt="img" class="cover-image br-5" loading="lazy">
                                        {{-- @if($nature->price)
                                        <div class="item-card7-overlaytext">
                                            <h4 class="mb-0">${{$nature->price}}</h4>
                                        </div>
                                        @endif --}}
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="item-card2 p-5 mt-3 bg-white br-5">
                                            <div class="item-card2-desc">
                                                <div class="item-card2-text">
                                                    <a href="{{ route('package_details', $nature->slug) }}" class="text-dark">
                                                        <h4 class="font-weight-bold mb-2">{{$nature->name}}</h4>
                                                    </a>
                                                </div>
                                                <p class="fs-14 mb-1">@if($nature->no_of_days)<b>{{$nature->no_of_days}} Days</b>@endif @if($nature->no_of_nights), <b>{{$nature->no_if_nights}} Nights @endif</b></p>
                                            </div>
                                            <div class="d-flex border-top pt-3 mt-3">
                                                <ul class="d-flex mb-1">
                                                    <li class=""><a href="#" class="icons"><i
                                                                class="fe fe-map-pin fs-14 text-muted mr-1"></i>{{$nature->location}}</a></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-sendenquiry mt-1 mb-1 mr-2"
                                                data-toggle="modal" data-target="#enquiryModal{{$nature->id}}">Send Enquiry</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($nature_tours as $nature)
            		<!-- Enquiry Modal Start-->
					<div class="modal fade" id="enquiryModal{{$nature->id}}" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
						  <div class="modal-content">
							<div class="modal-header">
							  <h5 class="modal-title" id="exampleModalLabel">Enquiry Form</h5>

							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>

							</div>
							<form action="{{route('package.send_enquiry')}}" method="POST">
								@csrf
								<div class="modal-body">
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <div class="modal-background" style="background: url('{{asset($nature->image_path)}}');height: 220px;width: 100%;background-position: center center;background-repeat: no-repeat;background-size: cover;">
                                            </div>
                                        </div>
                                    </div>
								  <div class="row">
									  <div class="col-sm-6 col-12">
										  <div class="form-group">
											  <input type="hidden" class="form-control" name="package_id" value="{{$nature->id}}">
											  <label for="name" class="form-label">First Name</label>
											  <input type="text" class="form-control" placeholder="First Name" name="first_name" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->first_name}}" @endif required>
										  </div>
									  </div>
									  <div class="col-sm-6 col-12">
										<div class="form-group">
											<label for="name" class="form-label">Last Name</label>
											<input type="text" class="form-control" placeholder="Last Name" name="last_name" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->last_name}}" @endif >
										</div>
									</div>
									  <div class="col-sm-12">
										<div class="form-group">
											<label for="name" class="form-label">Email</label>
											<input type="email" class="form-control" placeholder="Email" name="email" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->email}}" @endif  required>
										</div>
									  </div>
									  <div class="col-sm-12">
										<div class="form-group">
											<label for="name" class="form-label">Contact No.</label>
											<input type="tel" class="form-control" placeholder="Contact Number" name="contact_no" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->contact_no}}" @endif  required>
										</div>
									  </div>
									  <div class="col-sm-12">
										<div class="form-group">
											<label for="name" class="form-label">Message</label>
											<textarea name="message" id="inquiry_text" class="form-control" placeholder="Your enquiry here..." required></textarea>
										</div>
									  </div>
								  </div>
								</div>
								<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						  </div>
						</div>
					  </div>
					<!-- Enquiry Modal End-->
        @endforeach
    </section>
    @endif
    {{-- SECTION NATURE & WILDLIFE ENDS--}}

    {{-- SECTION CYCLING & MOUNTAIN BIKING --}}
        @if ($cycling_tours->isNotEmpty())
        <section class="sptb">
            <div class="container">
                <div class="section-title center-block text-center">
                    <span class="heading-style text-secondary">Explore</span>
                    <h1>Cycling & Mountain Biking In Nepal</h1>
                </div>
                <div id="myCarousel1" class="owl-carousel owl-carousel-icons">
                    @foreach ($cycling_tours as $cycling)
                        <div class="item">
                            <div class="relative mb-0 item-card2-card">
                                <div class="item-card2-img br-5">
                                    <a href="{{ route('package_details', $cycling->slug) }}" class="absolute-link2"></a>
                                    <img src="{{ asset($cycling->image_path) }}" alt="img" class="cover-image br-5"
                                        loading="lazy">
                                    {{-- @if($cycling->price)<div class="item-card7-overlaytext">
                                        <h4 class="mb-0">${{ $cycling->price }}</h4>
                                    </div>@endif --}}
                                </div>
                                <div class="card-body p-0">
                                    <div class="item-card2 p-5 mt-3 bg-white br-5">
                                        <div class="item-card2-desc">
                                            <div class="item-card2-text">
                                                <a href="{{ route('package_details', $cycling->slug) }}"
                                                    class="text-dark">
                                                    <h4 class="font-weight-bold mb-2">{{ $cycling->name }}</h4>
                                                </a>
                                            </div>
                                            <p class="fs-14 mb-1">@if($cycling->no_of_days)<b> {{ $cycling->no_of_days }} Days</b>@endif @if($cycling->no_of_nights),
                                                <b>{{ $cycling->no_of_nights }} Nights</b>@endif Difficulty Level:@if ($cycling->difficulty_level)
                                                    {{ $cycling->difficulty_level }}
                                                @else
                                                    N/A
                                                @endif
                                            </p>
                                        </div>
                                        <div class="d-flex border-top pt-3 mt-3">
                                            <ul class="d-flex mb-1">
                                                <li class=""><i
                                                        class="fe fe-map-pin fs-14 text-muted mr-1"></i>{{ $cycling->location }}
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#" class="btn btn-sendenquiry mt-1 mb-1 mr-2" data-toggle="modal"
                                            data-target="#enquiryModal{{$cycling->id}}"> Send Enquiry</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @foreach ($cycling_tours as $cycling)
                                      <!-- Enquiry Modal Start-->
					<div class="modal fade" id="enquiryModal{{$cycling->id}}" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
						  <div class="modal-content">
							<div class="modal-header">
							  <h5 class="modal-title" id="exampleModalLabel">Enquiry Form</h5>

							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>

							</div>
							<form action="{{route('package.send_enquiry')}}" method="POST">
								@csrf
								<div class="modal-body">
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <div class="modal-background" style="background: url('{{asset($cycling->image_path)}}');height: 220px;width: 100%;background-position: center center;background-repeat: no-repeat;background-size: cover;">
                                            </div>
                                        </div>
                                    </div>
								  <div class="row">
									  <div class="col-sm-6 col-12">
										  <div class="form-group">
											  <input type="hidden" class="form-control" name="package_id" value="{{$cycling->id}}">
											  <label for="name" class="form-label">First Name</label>
											  <input type="text" class="form-control" placeholder="First Name" name="first_name" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->first_name}}" @endif required>
										  </div>
									  </div>
									  <div class="col-sm-6 col-12">
										<div class="form-group">
											<label for="name" class="form-label">Last Name</label>
											<input type="text" class="form-control" placeholder="Last Name" name="last_name" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->last_name}}" @endif >
										</div>
									</div>
									  <div class="col-sm-12">
										<div class="form-group">
											<label for="name" class="form-label">Email</label>
											<input type="email" class="form-control" placeholder="Email" name="email" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->email}}" @endif  required>
										</div>
									  </div>
									  <div class="col-sm-12">
										<div class="form-group">
											<label for="name" class="form-label">Contact No.</label>
											<input type="tel" class="form-control" placeholder="Contact Number" name="contact_no" @if(Auth::guard('customer')->user()) value="{{Auth::guard('customer')->user()->contact_no}}" @endif  required>
										</div>
									  </div>
									  <div class="col-sm-12">
										<div class="form-group">
											<label for="name" class="form-label">Message</label>
											<textarea name="message" id="inquiry_text" class="form-control" placeholder="Your enquiry here..." required></textarea>
										</div>
									  </div>
								  </div>
								</div>
								<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						  </div>
						</div>
					  </div>
					<!-- Enquiry Modal End-->
                @endforeach

            </div>
        </section>
        @endif
    {{-- SECTION CYCLING & MOUNTAIN BIKING ENDS --}}

    <!--Section Testimonial-->
    @if ($testimonials->isNotEmpty())
        <section class="sptb bg-white">
            <div class="container">
                <div class="section-title center-block text-center">
                    <span class="heading-style text-secondary">What our </span>
                    <h1 class="position-relative">Customers Say</h1>
                </div>
                <div class="row">
                    <div class="col-md-12 testimonial-carousel-item">
                        <div id="myCarousl1" class="owl-carousel owl-carousel-icons6">
                            @foreach ($testimonials as $testimonial)
                                <div class="item">
                                    <div class="card">
                                        <div class="carosel-shape bg-primary-transparent"></div>
                                        <div class="card-body">
                                            <div class="d-flex">
                                                @if ($testimonial->image)
                                                    <img src="{{ asset($testimonial->image_path) }}" alt="image"
                                                        class="avatar avatar-xxl brround mr-3 spcl-ie-img" loading="lazy">
                                                @else
                                                    <img src="{{ asset('assets/images/blank-user.png') }}"
                                                        alt="image" class="avatar avatar-xxl brround mr-3 spcl-ie-img"
                                                        loading="lazy">
                                                @endif
                                                <div class="mt-4 mt-md-0">
                                                    <h3 class="fs-16 font-weight-semibold2 mb-0">
                                                        {{ $testimonial->name }}
                                                    </h3>
                                                    <div class="star-ratings start-ratings-main clearfix mt-1">
                                                        <div
                                                            class="stars stars-example-fontawesome stars-example-fontawesome-sm mr-2">
                                                            <select class="example-fontawesome" name="rating"
                                                                autocomplete="off" disabled>
                                                                <option value="1"
                                                                    @if ($testimonial->customer_rating == '1') selected @endif>1
                                                                </option>
                                                                <option value="2"
                                                                    @if ($testimonial->customer_rating == '2') selected @endif>2
                                                                </option>
                                                                <option value="3"
                                                                    @if ($testimonial->customer_rating == '3') selected @endif>3
                                                                </option>
                                                                <option value="4"
                                                                    @if ($testimonial->customer_rating == '4') selected @endif>4
                                                                </option>
                                                                <option value="5"
                                                                    @if ($testimonial->customer_rating == '5') selected @endif>5
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <p class="mt-2" style="text-align: justify;">
                                                        {{ $testimonial->review }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--/Section Testimonial-->

    <!--Section Video-->
    <section class="sptb cover-image bg-background-color py-9"
        data-image-src="{{ asset('assets/images/banners/banner13.jpg') }}">
        <div class="container">
            <div class="section-title center-block text-center content-text m-0 p-0 row py-4">
                <div class="col-lg-10 d-block mx-auto">
                    <h2 class="text-white fs-50 font-weight-semibold">Great Adventure Tour in <span
                            class="font-weight-bold text-white">Nepal</span></h2>
                    <p class="fs-16 mt-4 leading-normal text-white">We denounce with righteous indignation and dislike men
                        who are so beguiled and demoralized by the charms of pleasure of the moment Mauris ut cursus nunc.
                        Morbi eleifend, ligula at consectetur vehicula</p>
                    <a class="mt-6 d-block video-btn mx-auto" href="#" data-toggle="modal"
                        data-target="#homeVideo"><i class="fa fa-play text-white-80"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- VIDEO MODAL -->
    <!--  Modal Popup -->
    <div class="modal fade" id="homeVideo" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="pauseVid()"><i
                        class="fe fe-x"></i></button>
                @if (!empty($video) && $video->has_link == 'Yes')
                    <iframe class="p-0" width="100%" height="500px" src="{{ $video->video_link }}"
                        allow="accelerometer; autoplay;" allowfullscreen></iframe>
                @endif
                <div class="embed-responsive embed-responsive-16by9">
                    @if (!empty($video) && $video->has_link == 'No')
                        <video id="gossVideo" class="embed-responsive-item" controls="controls" preload="none"
                            autoplay="false">
                            <source src="{{ asset($video->video_path) }}" type="video/mp4">
                        </video>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--/Section Video-->

    <!--Section Blog-->
    @if ($blogs->isNotEmpty())
        <section class="sptb bg-white">
            <div class="container">
                <div class="section-title center-block text-center">
                    <span class="heading-style text-secondary">Recent</span>
                    <h2>Blog News</h2>
                </div>
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4 col-md-6">
                            <div class="relative mb-lg-0 mb-5">
                                <div class="item7-card-img br-7 br-tl-7 br-tr-7 overflow-hidden">
                                    <a href="{{ route('blog.details', $blog->slug) }}"></a>
                                    @if ($blog->image)
                                        <img src="{{ asset($blog->image_path) }}" alt="{{ $blog->title }}"
                                            class="cover-image" loading="lazy">
                                    @elseif($blog->link)
                                        <iframe height="250px" src="{{ $blog->link }}" title="YouTube video player"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen loading="lazy"></iframe>
                                    @else
                                        <img src="{{ asset('assets/images/download.png') }}"
                                            alt="{{ $blog->title }}" class="cover-image" loading="lazy">
                                    @endif
                                </div>
                                <div class="card-body px-0 py-4">
                                    <div class="d-flex">
                                        <a class=""><i class="fe fe-tag mr-2"></i>Blog Post</a>
                                    </div>
                                    <a href="{{ route('blog.details', $blog->slug) }}" class="text-dark">
                                        <h4 class="font-weight-semibold2 mt-2 leading-normal">{{ $blog->title }}</h4>
                                    </a>
                                    @if (!empty($blog->meta_description))
                                        <p class="leading-normal">{{ Str::limit($blog->meta_description, 150) }} (<a
                                                href="{{ route('blog.details', $blog->slug) }}"
                                                class="text-primary">Read
                                                More</a>)</p>
                                    @endif
                                    <div class="mt-3">
                                        {{-- <a href="#" class="mr-0 ml-0 btn-link"><span class="text-default">By</span> Lilly Smith</a> --}}
                                        <a class="border-left">{{ $blog->created_at->format('d M,Y') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--Section Blog-->
        <!-- Enquiry Modal Start-->
        <div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login to your Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="Login" action="{{ route('customer.login') }}" method="post">
                            @csrf
                            <input type="hidden" id="package_id" name="package_id" value="0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label text-dark">Email address</label>
                                    <input type="email"
                                        class="form-control @if (session()->has('message')) error @endif"
                                        name="email" placeholder="Enter email" value="{{ old('email') }}">
                                    <label id="email-error" class="error"
                                        for="email">{{ session()->has('message') ? session()->get('message') : '' }}</label>
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-dark">Password</label>
                                    <input type="password" name="password" class="form-control"
                                        id="exampleInputPassword1" placeholder="Password">
                                    <label id="password-error" class="error" for="password"></label>
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-checkbox">
                                        <a href="forgot-password.html" class="float-right small text-dark mt-1">I forgot
                                            password</a>
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-label text-dark">Remember me</span>
                                    </label>
                                </div>
                                <div class="form-footer mt-2">
                                    <input type="button" class="btn btn-primary btn-block" id="customer_login"
                                        value="SignIn">
                                </div>
                                <div class="text-center  mt-3 text-dark">
                                    Don't have account yet? <a href="{{ route('customer.register') }}">SignUp</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- Enquiry Modal End-->
    @endif

@endsection

@push('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const _token = "{{ csrf_token() }}";
        const url = "{{ route('customer.updat.wishlist') }}";
        const customerLogin = "{{ route('customer.login') }}";

        // $(document).ready(function() {
        //     var TTHIS;
        //     var isNotCustomerLogged = true;
        //     $(document).on('click', '.home-update-favorite', function() {
        //         // $(this).addClass('item-card2-icons-r');
        //         TTHIS = $(this);
        //         var agree = Swal.fire({
        //             title: 'Add to wishlist?',
        //             text: "",
        //             icon: '',
        //             showCancelButton: true,
        //             confirmButtonColor: '#3085d6',
        //             cancelButtonColor: '#d33',
        //             // cancelButtonText: 'No',
        //             confirmButtonText: 'Yes'
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 console.log(TTHIS);
        //                 const package_id = TTHIS.data('package_id');
        //                 $('#package_id').val(package_id);
        //                 const customer_login_status = TTHIS.data('customer_login_status');
        //                 //If Customer is not Logined Then Login with also add the favuoirte.
        //                 if (customer_login_status == 0 && isNotCustomerLogged) {
        //                     $('#enquiryModal').modal('show');
        //                     return false;
        //                 }

        //                 const _token = "{{ csrf_token() }}";
        //                 const url = "{{ route('customer.updat.wishlist') }}";
        //                 $.ajax({
        //                     url: url,
        //                     type: 'post',
        //                     dataType: 'json',
        //                     data: {
        //                         package_id: package_id,
        //                         _token: _token
        //                     },
        //                     success: function(response) {
        //                         if (response.status == true) {
        //                             // console.log(TTHIS);
        //                             TTHIS.addClass('item-card2-icons-r');
        //                             TTHIS.removeClass('home-update-favorite');

        //                         }
        //                     },
        //                     error: function(request, status, error) {
        //                         let json = jQuery.parseJSON(request.responseText);
        //                         Lobibox.notify('error', {
        //                             size: 'mini',
        //                             soundPath: "{{ asset('') }}vendor/lobibox/sounds/",
        //                             sound: 'sound3',
        //                             showClass: 'fadeInDown',
        //                             hideClass: 'fadeUpDown',
        //                             width: 400,
        //                             rounded: true,
        //                             msg: json.message,
        //                             delay: 3000,
        //                             delayIndicator: false,
        //                         });
        //                     }
        //                 });
        //                 // }

        //             } else {
        //                 false;
        //             }
        //         })

        //     }); //End of Function

        //     $(document).on('click', '#customer_login', function(e) {
        //         e.preventDefault();
        //         // console.log($('#Login').serialize());
        //         // alert('Clicked');
        //         const url = "{{ route('customer.login') }}";
        //         let data = $('#Login').serialize();
        //         console.log(data);
        //         $.ajax({
        //             url: url,
        //             type: 'post',
        //             dataType: 'json',
        //             data: data,
        //             success: function(response) {
        //                 if (response.status) {
        //                     $('#enquiryModal').modal('hide');
        //                     isNotCustomerLogged = false;
        //                     TTHIS.addClass('item-card2-icons-r');
        //                     TTHIS.removeClass('home-update-favorite');
        //                     window.location.reload();
        //                 } else {
        //                     conslole.log(response.message);
        //                 }
        //             }
        //         })

        //     })
        // });
    </script>
    <script src="{{ asset('js/make_package_favorite.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.category_link').on('click',function(e){
                e.preventDefault();
                // alert("CLICKED!!!");
                // $('.horizontalMenu-list .dropdown-toggle').css('background-color','yellow');
                // $('.horizontalMenu-list').find('.dropdown-toggle').toggle();

            });
        });

        const observer = lozad(); // lazy loads elements with default selector as '.lozad'
        observer.observe();
    </script>
@endpush
