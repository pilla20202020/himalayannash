@extends('backend.layouts.admin.admin')

@section('title', 'Customer Detail')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">Customer Detail</header>
                    <div class="tools">

                        <a class="btn btn-primary ink-reaction" href="{{route('customer.index')}}">
                            <i class="md md-keyboard-backspace"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="col-sm-4 col-12">
                            <img src="{{asset($customer_image->image_path)}}" alt="{{$customer->name}}" height="250" width="250" loading="lazy">
                        </div>
                        <div class="col-sm-8 col-12">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{$customer->first_name}} {{$customer->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{$customer->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact No.</th>
                                        <td>{{$customer->contact_no}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{$customer->address}}</td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td>{{$customer->city}}</td>
                                    </tr>
                                    <tr>
                                        <th>Country</th>
                                        <td>{{$customer->country->country_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Postal Code</th>
                                        <td>{{$customer->postal_code}}</td>
                                    </tr>
                                    <tr>
                                        <th>About</th>
                                        <td>@if($customer->about_me){{$customer->about_me}}@else N.A. @endif</td>
                                    </tr>
                                    <tr>
                                        <th>Facebook</th>
                                        <td>@if($customer->facebook_link)<a href="{{$customer->facebook_link}}" target="__blank">{{$customer->facebook_link}}@else N.A. @endif</a></td>
                                    </tr>
                                    <tr>
                                        <th>Google</th>
                                        <td>@if($customer->google_link)<a href="{{$customer->google_link}}" target="__blank">{{$customer->google_link}}</a>@else N.A. @endif</td>
                                    </tr>
                                    <tr>
                                        <th>Twitter</th>
                                        <td>@if($customer->twitter_link)<a href="{{$customer->twitter_link}}" target="__blank">{{$customer->twitter_link}}</a>@else N.A. @endif</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

