@extends('backend.layouts.admin.admin')

@section('content')
    <section>
        <div class="section-body">
            <div class="row">
                <!-- BEGIN ALERT - REVENUE -->
                @if($customer_count)
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body no-padding">
                            <div class="alert alert-callout alert-info no-margin">
                                <h1 class="pull-right text-primary"><i class="md md-people"></i></h1>
                                <strong class="text-xl">{{$customer_count}}</strong><br />
                                <span class="opacity-50">Customers</span>
                                <div class="stick-bottom-left-right">
                                    <div class="height-2 sparkline-revenue" data-line-color="#bdc1c1"></div>
                                </div>
                            </div>
                        </div>
                        <!--end .card-body -->
                    </div>
                    <!--end .card -->
                </div>
                @endif
                <!--end .col -->
                <!-- END ALERT - REVENUE -->

                <!-- BEGIN ALERT - VISITS -->
                @if($places_count)
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body no-padding">
                            <div class="alert alert-callout alert-warning no-margin">
                                <h1 class="pull-right text-warning"><i class="md md-location-on"></i></h1>
                                <strong class="text-xl">{{$places_count}}</strong><br />
                                <span class="opacity-50">Destinations</span>
                                <div class="stick-bottom-right">
                                    <div class="height-1 sparkline-visits" data-bar-color="#e5e6e6"></div>
                                </div>
                            </div>
                        </div>
                        <!--end .card-body -->
                    </div>
                    <!--end .card -->
                </div>
                @endif
                <!--end .col -->
                <!-- END ALERT - VISITS -->

                <!-- BEGIN ALERT - BOUNCE RATES -->
                @if($package_count)
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body no-padding">
                            <div class="alert alert-callout alert-danger no-margin">
                                <h1 class="pull-right text-danger"><i class="md md-map"></i></h1>
                                <strong class="text-xl">{{$package_count}}</strong><br />
                                <span class="opacity-50">Packages</span>
                                <div class="stick-bottom-right">
                                    <div class="height-1 sparkline-visits" data-bar-color="#e5e6e6"></div>
                                </div>
                            </div>
                        </div>
                        <!--end .card-body -->
                    </div>
                    <!--end .card -->
                </div>
                @endif
                <!--end .col -->
                <!-- END ALERT - BOUNCE RATES -->

                <!-- BEGIN ALERT - TIME ON SITE -->
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body no-padding">
                            <div class="alert alert-callout alert-success no-margin">
                                <h1 class="pull-right text-success"><i class="md md-bookmark"></i></h1>
                                <strong class="text-xl"></strong><br />
                                <span class="opacity-50">Bookings</span>
                            </div>
                        </div>
                        <!--end .card-body -->
                    </div>
                    <!--end .card -->
                </div>
                <!--end .col -->
                <!-- END ALERT - TIME ON SITE -->

            </div>
            <div class="row">

                <!-- BEGIN SITE ACTIVITY -->
                <div class="col-md-9">
                    <div class="card ">
                        @if($customers)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-head">
                                    <header>New Registrations</header>
                                </div><!--end .card-head -->
                                <div class="card-body height-8">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="example">
                                            <thead>
                                                <tr>
                                                    <th>SNo</th>
                                                    <th>Name</th>
                                                    <th>Contact No.</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($customers as $key => $customer)
                                                    <tr>
                                                        <td>{{++$key}}</td>
                                                        <td>{{$customer->first_name}}&nbsp;{{$customer->last_name}}</td>
                                                        <td>{{$customer->contact_no}}</td>
                                                        <td>{{$customer->email}}</td>
                                                        <td>{{$customer->address}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$customers->links()}}
                                    </div>
                                </div><!--end .card-body -->
                            </div><!--end .col -->
                        </div><!--end .row -->
                        @endif
                    </div><!--end .card -->
                </div><!--end .col -->
                <!-- END SITE ACTIVITY -->
							<!-- BEGIN NEW REGISTRATIONS -->
                            @if($packages)
							<div class="col-md-3">
								<div class="card">
									<div class="card-head">
										<header>Latest Tours</header>
										{{-- <div class="tools hidden-md">
											<a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
										</div> --}}
									</div><!--end .card-head -->
									<div class="card-body no-padding height-8 scroll">
										<ul class="list divider-full-bleed">
                                            @foreach ($packages as $package)
											<li class="tile">
												<div class="tile-content">
													<div class="tile-icon">
														<img src="{{asset($package->image_path)}}" alt="{{$package->title}}" loading="lazy"/>
													</div>
													<div class="tile-text"><a href="{{route('package_details',$package->slug)}}" target="__blank">{{$package->name}}</a></div>
												</div>
											</li>                                                
                                            @endforeach
										</ul>
									</div><!--end .card-body -->
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END NEW REGISTRATIONS -->
                            @endif
            </div>
        </div>
    </section>
@endsection
{{-- @push('scripts')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endpush --}}