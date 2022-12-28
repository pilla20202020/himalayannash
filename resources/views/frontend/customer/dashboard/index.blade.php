@extends('frontend.layouts.app')
@section('content')
    <!--Breadcrumb-->
    <section class="bannerimg banner-1 cover-image pt-9 pb-10 sptb-tab bg-background2"
        data-image-src="{{ asset('assets/images/Travel&tours/mountains-6043079_1920.jpg') }}">
        <div class="header-text mb-0">
            <div class="container">
                <div class="row text-white">
                    <div class="col">
                        <h1 class="">Dashboard</h1>
                    </div>
                    <div class="col col-auto">
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Login</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Breadcrumb-->

    <!--User Dashboard-->
    <section class="sptb bg-whitel">
        <div class="container">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">My Dashboard</h3>
                        </div>
                        <div class="card-body text-center item-user">
                            <div class="profile-pic">
                                <div class="profile-pic-img" style="width: 200px">
                                    @if($customer->images)<img src="{{ asset($customer->images->image_path) }}" class="brround" width="150px"
                                        alt="user">@endif
                                </div>
                            </div>
                            <a href="userprofile.html" class="text-dark">
                                <h4 class="mt-3 mb-0 font-weight-semibold2">{{ $customer->first_name }}
                                    {{ $customer->last_name }}</h4>
                            </a>
                        </div>
                        <aside class="app-sidebar doc-sidebar my-dash">
                            <div class="app-sidebar__user clearfix">
                                <ul class="side-menu">
                                    <li>
                                        <a class="side-menu__item @if(Request::segment(1) == 'dashboard') active @endif" href="{{route('customer.dashboard')}}"><i
                                                class="side-menu__icon fe fe-user"></i><span class="side-menu__label">Edit
                                                Profile</span></a>
                                    </li>
                                    <li>
                                        <a class="side-menu__item @if(Request::segment(1) == 'tours') active @endif" href="{{route('customer.tours')}}"><i
                                                class="side-menu__icon fe fe-list"></i><span class="side-menu__label">My
                                                Tours</span></a>
                                    </li>
                                    <li>
                                        <a class="side-menu__item @if(Request::segment(1) == 'booking') active @endif" href="{{route('customer.booking')}}"><i
                                                class="side-menu__icon fe fe-shopping-cart"></i><span
                                                class="side-menu__label">My Bookings</span></a>
                                    </li>
                                    <li>
                                        <a class="side-menu__item @if(Request::segment(1) == 'wishlist') active @endif" href="{{route('customer.wishlist')}}"><i
                                                class="side-menu__icon fe fe-heart"></i><span class="side-menu__label">My
                                                Wishlist</span></a>
                                    </li>
                                    <li>
                                        <a class="side-menu__item @if(Request::segment(1) == 'payments') active @endif" href="{{route('customer.payments')}}"><i
                                                class="side-menu__icon fe fe-credit-card"></i><span
                                                class="side-menu__label">Payments</span></a>
                                    </li>
                                    <li>
                                        <a class="side-menu__item" href="#"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                                class="side-menu__icon fe fe-power"></i><span
                                                class="side-menu__label">Logout</span></a>
                                        <form id="logout-form" action="{{ route('customer.logout') }}" method="POST"
                                            style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12">
                    <form id="customerDetailForm" action="{{ route('customer.detail', [$customer->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card mb-0 overflow-hidden">
                            <div class="card-header">
                                <h3 class="card-title">Edit Profile</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" name="first_name"
                                                placeholder="First Name"
                                                value="{{ old('first_name', $customer->first_name) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="last_name"
                                                placeholder="Last Name"
                                                value="{{ old('last_name', $customer->last_name) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Email address</label>
                                            <input type="email" class="form-control" name="email" placeholder="Email"
                                                value="{{ old('email', $customer->email) }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Phone Number</label>
                                            <input type="number" class="form-control" name="contact_no"
                                                placeholder="Number"
                                                value="{{ old('contact_no', $customer->contact_no) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address"
                                                placeholder="Address" value="{{ old('address', $customer->address) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">City</label>
                                            <input type="text" class="form-control" name="city" placeholder="City"
                                                value="{{ old('city', $customer->city) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Postal Code</label>
                                            <input type="number" class="form-control" name="postal_code"
                                                placeholder="ZIP Code"
                                                value="{{ old('postal_code', $customer->postal_code) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="form-label">Country</label>
                                            <select
                                                class="form-control select2-show-search border-bottom-0 w-100 select2-show-search"
                                                data-placeholder="Select" name="country_id">
                                                <optgroup label="Categories">
                                                    <option>--Select--</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}"
                                                            @if ($country->id == $customer->country_id) selected @endif>
                                                            {{ $country->country_name }}
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Facebook</label>
                                            <input type="text" class="form-control"
                                                placeholder="https://www.facebook.com/" name="facebook_link"
                                                value="{{ old('facebook_link', $customer->facebook_link) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Google</label>
                                            <input type="text" class="form-control"
                                                placeholder="https://www.google.com/" name="google_link"
                                                value="{{ old('google_link', $customer->google_link) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Twitter</label>
                                            <input type="text" class="form-control" placeholder="https://twitter.com/"
                                                name="twitter_link"
                                                value="{{ old('twitter_link', $customer->twitter_link) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Pinterest</label>
                                            <input type="text" class="form-control"
                                                placeholder="https://in.pinterest.com/" name="pinterest_link"
                                                value="{{ old('pinterest_link', $customer->pinterest_link) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">About Me</label>
                                            <textarea rows="5" class="form-control" placeholder="Enter About your description" name="about_me">{{ old('about_me', $customer->about_me) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-0">
                                            <label class="form-label">Upload Image</label>
                                            <div class="input-group mb-0">
                                                <input type="text" class="form-control browse-file"
                                                    placeholder="Choose" readonly>
                                                <label class="input-group-btn">
                                                    <span class="btn btn-primary br-tl-0 br-bl-0">
                                                        Browse <input type="file" name="customerProfileImg"
                                                            style="display: none;">
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-secondary">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--/User Dashboard-->
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        setTimeout(() => {
            $('.alert-success').hide();
        }, 3000);

        $("#customerDetailForm").validate({

            // Specify validation rules
            rules: {
                first_name: "required",
                last_name: "required",
                email: {
                    required: true,
                    email: true
                },
                password: "required",
                password_confirmation: "required"
            },
            // Specify validation error messages
            messages: {
                first_name: "First Name is required!",
                last_name: "Last Name is required!",
                email: {
                    required: "E-mail is required!"
                },
                password: {
                    required: "Password is required!"
                },
                password_confirmation: {
                    required: "Confirm Password is required"
                },
            },

        });
    </script>
@endpush
