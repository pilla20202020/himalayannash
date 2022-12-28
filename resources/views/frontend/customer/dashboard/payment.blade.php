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
<section class="sptb">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Dashboard</h3>
                    </div>
                    <div class="card-body text-center item-user">
                        <div class="profile-pic">
                            <div class="profile-pic-img" style="width: 200px">
                                <img src="{{ asset($customer->images->image_path) }}" class="brround" width="150px"
                                    alt="user">
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
                <div class="card mb-0 overflow-hidden">
                    <div class="card-header">
                        <h3 class="card-title">My Payments</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border-top">
                            <table class="table table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">Invoice ID</th>
                                        <th class="border-bottom-0">Booking ID</th>
                                        <th class="border-bottom-0">Category</th>
                                        <th class="border-bottom-0">Invoice Date</th>
                                        <th class="border-bottom-0">Price</th>
                                        <th class="border-bottom-0">Due Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#INV-348854</td>
                                        <td class="font-weight-semibold">#8934554</td>
                                        <td>Travel</td>
                                        <td>07-12-2020</td>
                                        <td class="font-weight-semibold fs-16">$898</td>
                                        <td>17-12-2020</td>
                                    </tr>
                                    <tr>
                                        <td>#INV-1867485</td>
                                        <td class="font-weight-semibold">#8934554</td>
                                        <td>Tour Bill</td>
                                        <td>02-12-2020</td>
                                        <td class="font-weight-semibold fs-16">$276</td>
                                        <td>14-12-2020</td>
                                    </tr>
                                    <tr>
                                        <td>#INV-835241</td>
                                        <td class="font-weight-semibold">#8934554</td>
                                        <td>Flight Tickets</td>
                                        <td>30-11-2020</td>
                                        <td class="font-weight-semibold fs-16">$250</td>
                                        <td>04-12-2020</td>
                                    </tr>
                                    <tr>
                                        <td>#INV-6727452</td>
                                        <td class="font-weight-semibold">#8934554</td>
                                        <td>Travel agency</td>
                                        <td>25-18-2020</td>
                                        <td class="font-weight-semibold fs-16">$500</td>
                                        <td>07-12-2020</td>
                                    </tr>
                                    <tr>
                                        <td>#INV-4285478</td>
                                        <td class="font-weight-semibold">#8934554</td>
                                        <td>Tour Advisor</td>
                                        <td>24-11-2020</td>
                                        <td class="font-weight-semibold fs-16">$854</td>
                                        <td>11-12-2020</td>
                                    </tr>
                                    <tr>
                                        <td>#INV-5437458</td>
                                        <td class="font-weight-semibold">#8934554</td>
                                        <td>Accomdation</td>
                                        <td>22-11-2020</td>
                                        <td class="font-weight-semibold fs-16">$145</td>
                                        <td>12-12-2020</td>
                                    </tr>
                                    <tr>
                                        <td>#INV-986746</td>
                                        <td class="font-weight-semibold">#8934554</td>  
                                        <td>Food</td>
                                        <td>18-11-2020</td>
                                        <td class="font-weight-semibold fs-16">$378</td>
                                        <td>07-12-2020</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <ul class="pagination">
                            <li class="page-item page-prev disabled">
                                <a class="page-link" href="#" tabindex="-1">Prev</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item page-next">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/User Dashboard-->
@endsection