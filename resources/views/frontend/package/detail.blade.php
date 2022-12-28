@extends('frontend.layouts.app')

@section('content')

    <!--Breadcrumb-->
    <section class="bannerimg banner-1 cover-image pt-9 pb-10 sptb-tab bg-background2" data-image-src="{{asset('assets/images/Travel&tours/mountains-6043079_1920.jpg')}}">
        <div class="header-text mb-0">
            <div class="container">
                <div class="row text-white">
                    <div class="col"><h1 class="">{{$package->name}}</h1></div>
                    <div class="col col-auto">
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Packages</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--/Breadcrumb-->
	<!--section-->
	<section class="bg-white">
		<div class="content-text mb-0">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-12 sptb">
						@if(Illuminate\Support\Facades\Session::has('success'))
						<div class="col-md-4 ml-auto" id="success-alert" style="position: absolute; z-index: 9999;">
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<hr class="message-inner-separator">
								<p>{{Illuminate\Support\Facades\Session::get('success')}}</p>
							</div>
						</div>
						@endif

						<div class="card overflow-hidden">
							<div class="card-body p-0">
								<div class="tour-detail-slider">
									<div id="carousel2" class="carousel slide" data-ride="carousel">
										<div class="carousel-inner">
                                            @foreach ($images as $image)
                                            <div class="carousel-item @if($loop->index == 0) active @endif"><img src="{{asset('uploads/package')}}/{{$image->image_name}}" alt="img"> </div> 
                                            @endforeach

											{{-- <div class="carousel-item"><img src="assets/images/Travel&tours/paragliding-4688277_640.jpg" alt="img"> </div>
											<div class="carousel-item"><img src="assets/images/Travel&tours/nepal-g8d45384f2_640.jpg" alt="img"> </div>
											<div class="carousel-item"><img src="assets/images/Travel&tours/muktinath-gc2309b861_640.jpg" alt="img"> </div>
											<div class="carousel-item"><img src="assets/images/Travel&tours/panaroma.jpg" alt="img"> </div> --}}
										</div>
										<a class="carousel-control-prev" href="#carousel2" role="button" data-slide="prev">
											<i class="fa fa-angle-left" aria-hidden="true"></i>
										</a>
										<a class="carousel-control-next" href="#carousel2" role="button" data-slide="next">
											<i class="fa fa-angle-right" aria-hidden="true"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-12 mt-3">
								<ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
									<li class="nav-item" role="presentation">
										<a class="nav-link active text-uppercase" id="pills-overview-tab" data-toggle="pill"
											href="#pills-overview" role="tab" aria-controls="pills-overview"
											aria-selected="true">Overview</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link text-uppercase" id="pills-itinerary-tab" data-toggle="pill"
											href="#pills-itinerary" role="tab" aria-controls="pills-itinerary"
											aria-selected="false">Itinerary</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link text-uppercase" id="pills-summary-tab" data-toggle="pill"
											href="#pills-summary" role="tab" aria-controls="pills-summary"
											aria-selected="false">Trip Summary</a>
									</li>
									{{-- <li class="nav-item" role="presentation">
										<a class="nav-link text-uppercase" id="pills-cost-tab" data-toggle="pill"
											href="#pills-cost" role="tab" aria-controls="pills-cost"
											aria-selected="false">Cost Info</a>
									</li> --}}
                                    <li class="nav-item" role="presentation">
										<a class="nav-link text-uppercase" id="pills-policy-tab" data-toggle="pill"
											href="#pills-policy" role="tab" aria-controls="pills-policy"
											aria-selected="false">Policies</a>
									</li>
								</ul>
								<div class="tab-content tour-detail-tab-content border p-3" id="pills-tabContent">
									<div class="tab-pane fade show active" id="pills-overview" role="tabpanel"
										aria-labelledby="pills-home-tab">{!!$package->overview!!}</div>
									<div class="tab-pane fade" id="pills-itinerary" role="tabpanel"
										aria-labelledby="pills-itinerary-tab">
										<ul class="timeline-tour">
                                            @foreach ($itineraries as $itinerary)
                                            <li class="d-flex">
												<div class="timeline-data ml-2">
													<div class="">
														<div class="fs-16 text-primary font-weight-semibold"><b>Day {{$itinerary->day}}:</b></div>
														<h3 class="card-title font-weight-semibold2 mt-1">{{$itinerary->title}}</h3>
														<div class="leading-loose">
                                                            {!!$itinerary->description!!}
														</div>
													</div>
												</div>
											</li>   
                                            @endforeach
										</ul>
									</div>
									<div class="tab-pane fade" id="pills-summary" role="tabpanel"
										aria-labelledby="pills-summary-tab">
										<div class="table-responsive">
                                            {!!$package->summary!!}
										</div>
									</div>
									{{-- <div class="tab-pane fade" id="pills-cost" role="tabpanel"
										aria-labelledby="pills-cost-tab">
										{!!$package->cost_info!!}
									</div> --}}
                                    <div class="tab-pane fade" id="pills-policy" role="tabpanel"
                                    aria-labelledby="pills-policy-tab">
                                        @if($package->confirmation_policy)
                                        <h4>Confirmation Policy</h4>
                                        {!!$package->confirmation_policy!!}
                                        @endif
                                        @if($package->refund_policy)
                                        <h4>Refund Policy</h4>
                                        {!!$package->refund_policy!!}
                                        @endif
                                        @if($package->cancellation_policy)
                                        <h4>Refund Policy</h4>
                                        {!!$package->cancellation_policy!!}
                                        @endif
                                        @if($package->cancellation_policy)
                                        <h4>Payment Terms Policy</h4>
                                        {!!$package->payment_terms_policy!!}
                                        @endif
                                    </div>
								</div>
							</div>
							<div class="col-lg-12 col-12 mt-2">
								<a href="{{route('book.this_trip',$package->slug)}}" class="btn btn-primary text-uppercase" id="book-trip">Book this trip</a>
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary text-uppercase" data-toggle="modal" data-target="#enquiryModal">
									Enquiry Now
								</button>
							</div>
						</div>
					</div>

					<!-- Enquiry Modal Start-->
					<div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
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
                                            <div class="modal-background" style="background: url('{{asset($package->image_path)}}');height: 220px;width: 100%;background-position: center center;background-repeat: no-repeat;background-size: cover;">
                                            </div>
                                        </div>
                                    </div>
								  <div class="row">
									  <div class="col-sm-6 col-12">
										  <div class="form-group">
											  <input type="hidden" class="form-control" name="package_id" value="{{$package->id}}">
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
					<div class="col-lg-3 col-12 sptb">
						<div class="row mt-2">
							<div class="col-lg-12 col-12">
								@if($similar_tours->isNotEmpty())
								<div class="card about-card pb-2">
									<div class="card-header about-card-header bg-primary">
										<h3 class="text-white text-center">You may also like</h3>
									</div>
									<div class="card-body about-card-body">
										<ul class="about-list">
											@foreach ($similar_tours as $tour)
												<li><a href="{{route('package_details',$tour->slug)}}"><i class="fa fa-angle-double-right mr-2 text-secondary"></i>{{$tour->name}}</a></li>
											@endforeach
										</ul>
									</div>
								</div>
								@endif
							</div>
							@if($popular_tours->isNotEmpty())
							<div class="col-lg-12 col-12">
								<div class="card about-card pb-2">
									<div class="card-header about-card-header bg-primary">
										<h3 class="text-white text-center">Popular Tours</h3>
									</div>
									<div class="card-body about-card-body">
										<ul class="about-list">
											@foreach ($popular_tours as $tour)
											<li><a href="{{route('package_details',$tour->slug)}}"><i class="fa fa-angle-double-right mr-2 text-secondary"></i>{{$tour->name}}</a></li>
											@endforeach
										</ul>
									</div>
								</div>
							</div>
							@endif
						</div>
						<div class="row">
							<div class="col-lg-12 col-12">
								@if($recent_blogs->isNotEmpty())
								<div class="card about-card pb-2">
									<div class="card-header about-card-header bg-primary">
										<h3 class="text-white text-center">Recent Blogs</h3>
									</div>
									<div class="card-body about-card-body">
										<ul class="about-list">
											@foreach ($recent_blogs as $blog)
												<li><a href="{{route('blog.details',$blog->slug)}}"><i class="fa fa-angle-double-right mr-2 text-secondary"></i>{{Str::limit($blog->title, 75)}}</a></li>
											@endforeach
										</ul>
									</div>
								</div>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/section-->
@endsection
@push('scripts')
<script>
    setTimeout(function(){
        $('#success-alert').hide();
    }, 150);
</script>
@endpush