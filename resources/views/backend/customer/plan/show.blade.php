@extends('backend.layouts.admin.admin')

@section('title', 'Package plan')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="">Customer Email: <span class="text text-danger">{{$plan->email}}</span></header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction noprint" href="{{route('customer-trip-plan.index')}}">
                            <i class="md md-keyboard-backspace"></i>
                            Back
                        </a>
                        <button id="noprint" onclick="window.print()" class="btn btn-danger noprint" aria-label="Print"><i class="md md-print"></i></button>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Who will you be travelling with?</th>
                                        <th>No of children</th>
                                        <th>No of adult</th>
                                    </tr>
                                    <tr>
                                        <td>{{$plan->travel_with}}</td>
                                        @if($plan->travel_with == 'Family' || $plan->travel_with == 'Group')
                                        <td>{{$plan->no_of_children}}</td>
                                        <td>{{$plan->no_of_adult}}</td>
                                        @else
                                        <td>-</td>
                                        <td>-</td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </tr>
                        <tr>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Have Travel Date in mind?</th>
                                        <th>Departure Date</th>
                                        <th>Arrival Date</th>
                                        <th>Approx Date (Month)</th>
                                    </tr>
                                    <tr>
                                        <td>@if($plan->travel_when == 'Exact') I have my exact travel date @elseif($plan->travel_when == 'Approx') I have approximate dates @else I will decide later @endif</td>
                                        @if($plan->travel_when == 'Exact')
                                        <td>{{$plan->departure_date}}</td>
                                        <td>{{$plan->arrival_date}}</td>
                                        <td>-</td>
                                        @elseif($plan->travel_when == 'Approx')
                                        <td>-</td>
                                        <td>-</td>
                                        <td>{{$plan->month_approx}}</td>
                                        @else
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </tr>
                        <tr>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Destination</th>
                                        <td>{{$plan->country}}</td>
                                    </tr>
                                    <tr>
                                        <th>Interested Trips</th>                                        
                                        @foreach ($trips as $trip)
                                        <td>{{$trip->package}}</td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </tr>
                        <tr>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Preferred accomodation standard</th></th>
                                        <td>{{$plan->accomodation}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </tr>
                        <tr>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Minimum budget</th>
                                        <th>Maximum Budget</th>
                                        <th>Is flexible with budget?</th>
                                    </tr>
                                    <tr>
                                        <td>{{$plan->min_budget}}</td>
                                        <td>{{$plan->max_budget}}</td>
                                        <td>@if($plan->is_budget_flexible == 'Yes') Yes, I am flexible. @else No, that is my minimum and maximum budget @endif</td>
                                    </tr>
                                </tbody>
                            </table>
                        </tr>
                        <tr>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Type of trip</th>
                                        <th>Current phase of planning</th>
                                        <th>Additional Queries</th>
                                    </tr>
                                    <tr>
                                        <td>{{$plan->desired_trip}}</td>
                                        <td>@if($plan->trip_planning == 'still-planning') I'm still planning my trip @elseif($plan->trip_planning == 'ready-to-start') I'm ready to start @else I want to book @endif</td>
                                        <td>{!!$plan->message!!}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </tr>
                        <tr>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Contact No.</th>
                                        <th>Contact No. (Alternate)</th>
                                        <th>Email Address</th>
                                        <th>Nationality</th>
                                        <th>Preferred method of contact</th>
                                    </tr>
                                    <tr>
                                        <td>{{$plan->contact_no}}</td>
                                        <td>{{$plan->contact_no_alternate}}</td>
                                        <td>{{$plan->email}}</td>
                                        <td>{{$plan->nationality}}</td>
                                        <td>@if($plan->method_of_contact == 'Both') Both (Email & Phone) @else {{$plan->method_of_contact}} @endif</td>
                                    </tr>
                                </tbody>
                            </table>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <style>
        @media print{
            .noprint{
                display: none;
            }
        }
    </style>
@stop

