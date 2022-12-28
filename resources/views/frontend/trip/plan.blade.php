@extends('frontend.layouts.app')

@section('content')

    <!--Breadcrumb-->
    <section class="bannerimg banner-1 cover-image pt-9 pb-10 sptb-tab bg-background2" data-image-src="{{asset('assets/images/Travel&tours/mountains-6043079_1920.jpg')}}">
        <div class="header-text mb-0">
            <div class="container">
                <div class="row text-white">
                    <div class="col"><h1 class=""></h1></div>
                    <div class="col col-auto">
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Plan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--/Breadcrumb-->
    <section class="bg-white">
        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-20">
                    <div class="card-header">
                        <div class="card-title">Plan your trip with Himalayan Nash</div>
                    </div>
                    <div class="card-body">
                        <div class="message-alert">

                        </div>
                        <form id="commentForm" method="get" class="form-horizontal mb-0">

                            <div id="rootwizard" class="border pt-0">
                                <ul class="nav nav-tabs nav-justified">
                                    <li class="nav-item"><a href="#who-2" data-toggle="tab" class="nav-link font-bold">Who</a></li>
                                    <li class="nav-item"><a href="#when-2" data-toggle="tab" class="nav-link font-bold">When</a></li>
                                    <li class="nav-item"><a href="#where-2" data-toggle="tab" class="nav-link font-bold">Where</a></li>
                                    <li class="nav-item"><a href="#accomodation-2" data-toggle="tab" class="nav-link font-bold">Accomodation</a></li>
                                    <li class="nav-item"><a href="#budget-2" data-toggle="tab" class="nav-link font-bold">Budget</a></li>
                                    <li class="nav-item"><a href="#custom-2" data-toggle="tab" class="nav-link font-bold">Customize</a></li>
                                    <li class="nav-item"><a href="#personal-info-2" data-toggle="tab" class="nav-link font-bold">Personal Info</a></li>
                                    <li class="nav-item"><a href="#terms-2" data-toggle="tab" class="nav-link font-bold">Terms & Condidtions</a></li>
                                </ul>
                                <div class="tab-content card-body mt-3 mb-0 b-0">
                                    {{-- <div id="bar" class="mb-5 br-5 progress progress-striped progress-bar-success-alt">
                                        <div class="bar progress-bar progress-bar-success bg-success br-5"></div>
                                    </div> --}}
                                    <div class="tab-pane p-t-10 fade" id="who-2">
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="text-center h4">Who will you be travelling with?</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group clearfix" style="display: flex;    flex-direction: column; align-items: center;">
                                                    <div class="custom-controls-stacked travel-with-class">
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input required" name="travel_with" value="Solo">
                                                            <span class="custom-control-label">Solo</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input required" name="travel_with" value="Couple">
                                                            <span class="custom-control-label">Couple</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input required" name="travel_with" value="Group">
                                                            <span class="custom-control-label">Group</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input required" name="travel_with" value="Family">
                                                            <span class="custom-control-label">Family</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="no-of-people" style="display: none;">
                                            <div class="col-6">
                                                <div class="form-group  clearfix">
                                                    <div class="row ">
                                                        <div class="col-md-3 ">
                                                            <label class="control-label form-label" for="adults">No of Adults</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input id="no-of-adults" name="no_of_adult" type="number" class="form-control" min="0">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group  clearfix">
                                                    <div class="row ">
                                                        <div class="col-md-3 ">
                                                            <label class="control-label form-label" for="childres">No of Children</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input id="no-of-children" name="no_of_children" type="number" class="form-control" min="0">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane p-t-10 fade" id="when-2">
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="text-center h4">Have a travel date in mind?</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group clearfix" style="display: flex; flex-direction: column; align-items: center;">
                                                    <div class="custom-controls-stacked travel-date-class">
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input required" name="travel_when" value="Exact">
                                                            <span class="custom-control-label">I have my exact travel date</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input required" name="travel_when" value="Approx">
                                                            <span class="custom-control-label">I have approximate dates</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input required" name="travel_when" value="Later">
                                                            <span class="custom-control-label">I will decide later</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="exact_date" style="display: none;">
                                            <div class="col-6" >
                                                <div class="form-group  clearfix">
                                                    <div class="row">
                                                        <div class="col-md-3 ">
                                                            <label class="control-label form-label" for="arrival">Arrival Date</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input id="arrival_date" name="arrival_date" type="date" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group  clearfix">
                                                    <div class="row ">
                                                        <div class="col-md-3 ">
                                                            <label class="control-label form-label" for="departure">Departure Date</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input id="departure_date" name="departure_date" type="date" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="approx_date" style="display: none;">
                                            <div class="col-6" >
                                                <div class="form-group  clearfix">
                                                    <div class="row">
                                                        <div class="col-md-3 ">
                                                            <label class="control-label form-label" for="month_approx">Month</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input id="month_approx" name="month_approx" type="month" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane p-t-10 fade" id="where-2">
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="text-center h4">Choose your Destination <span class="text text-danger">*</span></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group clearfix" style="display: flex; flex-direction: column; align-items: center;">
                                                    <div class="form-check form-check-inline travel-where-class">
                                                        <label class="custom-control custom-radio mx-2">
                                                            <input type="radio" class="custom-control-input required" name="country" value="Nepal" checked>
                                                            <span class="custom-control-label">Nepal</span>
                                                        </label>
                                                        <label class="custom-control custom-radio mx-2">
                                                            <input type="radio" class="custom-control-input required" name="country" value="Other">
                                                            <span class="custom-control-label">Other Countries</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row country_name mb-2" style="display: none;">
                                            <div class="col-md-3">
                                                <label class="control-label form-label" for="country">Mention Country</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input id="country_mention" name="country" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="text-center h4">Choose your trip(s) you are intersted in</div>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix" style="display: flex; flex-direction: column; align-items: center;">
                                            <div class="form-check form-check-inline">
                                                @foreach ($packages as $package)
                                                <label class="custom-control custom-checkbox mx-2">
                                                    <input type="checkbox" class="custom-control-input package_checkbox required" name="package_id[]" value="{{$package->id}}">
                                                    <span class="custom-control-label">{{$package->name}}</span>
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane p-t-10 fade" id="accomodation-2">
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="text-center h4">Preferred Accomodation Standard</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group clearfix" style="display: flex;    flex-direction: column; align-items: center;">
                                                    <div class="custom-controls-stacked accomodation-class">
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input required" name="accomodation" value="Basic">
                                                            <span class="custom-control-label">Basic</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input required" name="accomodation" value="Comfortable">
                                                            <span class="custom-control-label">Comfortable</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input required" name="accomodation" value="Luxury">
                                                            <span class="custom-control-label">Luxury</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input required" name="accomodation" value="Camping">
                                                            <span class="custom-control-label">Camping</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane p-t-10 fade" id="budget-2">
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="text-center h4">Budget Range (per person)</div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-8 offset-2">
                                                <div class="price-range-slider">
                                                    <input type="text" id="price" name="price" class="h6 slider-range">
                                                    <div id="mySlider"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="text-center h4">Are you flexible with yout budget?</div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="form-group clearfix" style="display: flex;flex-direction: column; align-items: center;">
                                                    <div class="custom-controls-stacked budget-class">
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input required" name="is_budget_flexible" value="Yes">
                                                            <span class="custom-control-label">Yes, I am flexible.</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input required" name="is_budget_flexible" value="No">
                                                            <span class="custom-control-label">No, that is my minimum and maximum budget.</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane p-t-10 fade" id="custom-2">
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="text-center h2">Customized Tour</div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="text-center h4">Trip type you are looking for</div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="form-group clearfix" style="display: flex;flex-direction: column; align-items: center;">
                                                    <div class="custom-controls-stacked desired_trip_class">
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="desired_trip" value="Customized">
                                                            <span class="custom-control-label">Customized Tour</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="desired_trip" value="Group">
                                                            <span class="custom-control-label">Group</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="text-center h4">Current phase of your trip planning</div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="form-group clearfix" style="display: flex;flex-direction: column; align-items: center;">
                                                    <div class="custom-controls-stacked trip_planning_class">
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="trip_planning" value="still-planning">
                                                            <span class="custom-control-label">I'm still planning my trip</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="trip_planning" value="ready-to-start">
                                                            <span class="custom-control-label">Ready to Start</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" name="trip_planning" value="want-to-book">
                                                            <span class="custom-control-label">I want to book</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="text-center h4">Any queries?</div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-12">
                                                <textarea name="message" id="message" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane p-t-10 fade" id="personal-info-2">
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="text-center h4">Personal Information</div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-8 offset-2">
                                                <div class="form-group  clearfix">
                                                    <div class="row mb-2">
                                                        <div class="col-md-3 ">
                                                            <label class="control-label form-label" for="contact">Contact No.<span class="text text-danger p-0">*</span></label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input id="contact" name="contact_no" type="tel" class="form-control required" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-md-3 ">
                                                            <label class="control-label form-label" for="contact">Contact No. (Alternate)</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input id="contact_alternate" name="contact_no_alternate" type="tel" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-md-3 ">
                                                            <label class="control-label form-label" for="email">Email Address<span class="text text-danger p-0">*</span></label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input id="email" name="email" type="email" class="form-control required" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-md-3 ">
                                                            <label class="control-label form-label" for="nationality">Nationality</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input id="nationality" name="nationality" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-12">
                                                            <div class="text-center h4">Preferred method of contact</div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-12">
                                                            <div class="form-group clearfix" style="display: flex;flex-direction: column; align-items: center;">
                                                                <div class="custom-controls-stacked contact-method-class">
                                                                    <label class="custom-control custom-radio">
                                                                        <input type="radio" class="custom-control-input required" name="method_of_contact" value="Email">
                                                                        <span class="custom-control-label">Email</span>
                                                                    </label>
                                                                    <label class="custom-control custom-radio">
                                                                        <input type="radio" class="custom-control-input required" name="method_of_contact" value="Phone">
                                                                        <span class="custom-control-label">Phone</span>
                                                                    </label>
                                                                    <label class="custom-control custom-radio">
                                                                        <input type="radio" class="custom-control-input required" name="method_of_contact" value="Both">
                                                                        <span class="custom-control-label">Both</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane p-t-10 fade" id="terms-2">
                                        <div class="row">
                                            <div class="col-10">
                                                <div class="form-group row clearfix">
                                                    <div class="col-lg-6">
                                                        <div class="custom-controls-stacked policy-box">
                                                            <label class="custom-control mt-4 custom-radio">
                                                                <input type="radio" class="custom-control-input required" name="is_policy_read" value="Yes" required/>
                                                                <span class="custom-control-label text-dark"> I have read the privacy policy.<span class="text text-danger p-0">*</span></span>
                                                            </label>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <button type="submit"  id="submit_plan" class="btn btn-primary ml-auto">Submit your plan</button>
                                            </div>
                                        </div>

                                    </div>
                                    <ul class="list-inline wizard mb-0 mt-4">
                                        <li class="previous list-inline-item"><a href="#" class="btn btn-light mb-0 waves-effect waves-light">Previous</a>
                                        </li>
                                        <li class="next list-inline-item float-right"><a href="#" class="btn btn-primary  mb-0 waves-effect waves-light">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                            {{-- CONFIRMATION MODAL --}}
                            {{-- <div class="modal fade" id="submitPlanModal" tabindex="-1" aria-labelledby="submitPlanModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                    <div class="modal-body">
                                      Are you sure you want to submit this plan?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                      <button   class="btn btn-primary">Yes</button>
                                    </div>
                                  </div>
                                </div>
                              </div> --}}
                            {{-- CONFIRMATION MODAL END --}}
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
    <style>
        label.error{
            display: contents;
        }
    </style>
@endpush
@push('script')
<script>
    $(document).ready(function(){
        $('.travel-with-class input').on('change',function(e){
            e.preventDefault();
            var travel_with = $(".travel-with-class input[type='radio']:checked").val();
            // alert(travel_with);
            if(travel_with == 'Group' || travel_with == 'Family')
            {
                $('#no-of-people').show();
            } else {
                $('#no-of-people').hide();
            }
        });

        $('.travel-date-class input').on('change',function(e){
            e.preventDefault();
            var travel_when = $(".travel-date-class input[type='radio']:checked").val();
            if(travel_when == 'Exact')
            {
                $('#exact_date').show();
                $('#approx_date').hide();

            } else if(travel_when == 'Approx'){
                $('#exact_date').hide();
                $('#approx_date').show();
            } else {
                $('#exact_date').hide();
                $('#approx_date').hide();
            }

        });

        $('.travel-where-class input').on('change',function(e){
            e.preventDefault();
            var travel_where = $(".travel-where-class input[type='radio']:checked").val();
            if(travel_where == 'Other')
            {
                $('.country_name').show();
            } else {
                $('.country_name').hide();
            }
        });

        $('#submit_plan').on('click', function(e){
            e.preventDefault();
            var travel_with = $(".travel-with-class input[type='radio']:checked").val();
            var no_of_adults = $('#no-of-adults').val();
            var no_of_children = $('#no-of-children').val();
            var travel_where = $(".travel-where-class input[type='radio']:checked").val();
            var country_mention = $(".travel-where-class input[type='text']").val();
            var travel_when = $(".travel-date-class input[type='radio']:checked").val();
            var arrival_date = $('#arrival_date').val();
            var departure_date = $('#departure_date').val();
            var month_approx = $('#month_approx').val();
            var min = $('#mySlider').slider("values")[0];
            var max = $('#mySlider').slider("values")[1];
            var accomodation = $(".accomodation-class input[type='radio']:checked").val();
            var budget = $(".budget-class input[type='radio']:checked").val();
            var contact_method = $(".contact-method-class input[type='radio']:checked").val();
            var contact_no = $('#contact').val();
            var contact_no_alternate = $('#contact_alternate').val();
            var email = $('#email').val();
            var nationality = $('#nationality').val();
            var is_term = $(".policy-box input[type='radio']:checked").val();
            var desired_trip = $(".desired_trip_class input[type='radio']:checked").val();
            var trip_planning = $(".trip_planning_class input[type='radio']:checked").val();
            var message = $('textarea#message').val();
            var package_id = $('.package_checkbox:checkbox:checked').map(function() {
                    return this.value;
                }).get();
            
            $.ajax({
                type: "POST",
                url: "{{route('plan_trip.store')}}",
                data: {
                    travel_with: travel_with,
                    no_of_adult: no_of_adults,
                    no_of_children: no_of_children,
                    travel_where: travel_where,
                    country_mention: country_mention,
                    travel_when: travel_when,
                    arrival_date: arrival_date,
                    departure_date: departure_date,
                    month_approx: month_approx,
                    min_budget: min,
                    max_budget: max,
                    accomodation: accomodation,
                    is_budget_flexible: budget,
                    contact_no: contact_no,
                    contact_no_alternate: contact_no_alternate,
                    email: email,
                    nationality: nationality,
                    method_of_contact: contact_method,
                    is_policy_read: is_term,
                    package_id: package_id,
                    country: travel_where,
                    trip_planning: trip_planning,
                    desired_trip: desired_trip,
                    message: message,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(response){
                    $('.message-alert').append(`<div class="alert alert-success">
                        Your trip plan has been submitted successfully!
                        </div>`);
                    $("#commentForm")[0].reset();
                    setTimeout(function(){
                        $('.message-alert').hide();
                    }, 3000);
                }
            })
        })
    });
</script>
@endpush
