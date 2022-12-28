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
                        <h3 class="card-title">Manage My Tours</h3>
                    </div>
                    <div class="card-body">
                        <div class="ads-tabs">

                            <div class="tab-content">
                                <div class="tab-pane active table-responsive userprof-tab" id="tab1">
                                    <table class="table table-bordered mb-0 text-nowrap border-top">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0 py-4">Tour Details</th>
                                                <th class="border-bottom-0 py-4">Category</th>
                                                <th class="border-bottom-0 py-4">Package</th>
                                                <th class="border-bottom-0 py-4">Price</th>
                                                <th class="border-bottom-0 py-4">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="media mt-0 mb-0 mw-300">
                                                        <div class="card-aside-img"><img alt="img" class="br-5" src="assets/images/Travel&tours/kathmandu-g9aa4f671d_640.jpg"></div>
                                                        <div class="media-body">
                                                            <div class="card-item-desc ml-4 p-0 mt-0">
                                                                <a class="text-dark" href="tour-detail.html"><h4 class="font-weight-semibold2 mb-1">Kathmandu Holiday Tour</h4></a>
                                                                <a href="#" class="mb-2 fs-12"><i class="fe fe-clock mr-1"></i> 21 Feb 2020 , 16:54</a><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Tours</td>
                                                <td>Holiday</td>
                                                <td class="font-weight-semibold fs-16">$254</td>
                                                <td>
                                                    <a class="btn btn-light btn-icon btn-sm" data-toggle="tooltip" data-original-title="Edit"><i class="fe fe-edit-2"></i></a>
                                                    <a class="btn btn-light btn-icon btn-sm" data-toggle="tooltip" data-original-title="Cancel"><i class="fe fe-x"></i></a>
                                                    <a class="btn btn-light btn-icon btn-sm" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fe fe-heart"></i></a>
                                                    <a href="tour-detail.html" class="btn btn-light btn-icon btn-sm" data-toggle="tooltip" data-original-title="View"><i class="fe fe-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="media mt-0 mb-0 mw-300">
                                                        <div class="card-aside-img"><img alt="img" class="br-5" src="assets/images/Travel&tours/mount-everest-g6b5b623c8_640.jpg"></div>
                                                        <div class="media-body">
                                                            <div class="card-item-desc ml-4 p-0 mt-0">
                                                                <a class="text-dark" href="tour-detail.html"><h4 class="font-weight-semibold2 mb-1">Everest Base Camp Trek</h4></a>
                                                                <a href="#" class="mb-2 fs-12"><i class="fe fe-clock mr-1"></i> 21 Feb 2020 , 16:54</a><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Tours</td>
                                                <td>Holiday</td>
                                                <td class="font-weight-semibold fs-16">$254</td>
                                                <td>
                                                    <a class="btn btn-light btn-icon btn-sm" data-toggle="tooltip" data-original-title="Edit"><i class="fe fe-edit-2"></i></a>
                                                    <a class="btn btn-light btn-icon btn-sm" data-toggle="tooltip" data-original-title="Cancel"><i class="fe fe-x"></i></a>
                                                    <a class="btn btn-light btn-icon btn-sm" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fe fe-heart"></i></a>
                                                    <a href="tour-detail.html" class="btn btn-light btn-icon btn-sm" data-toggle="tooltip" data-original-title="View"><i class="fe fe-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="media mt-0 mb-0 mw-300">
                                                        <div class="card-aside-img"><img alt="img" class="br-5" src="assets/images/Travel&tours/wildlife-g3d4dba7be_640.jpg"></div>
                                                        <div class="media-body">
                                                            <div class="card-item-desc ml-4 p-0 mt-0">
                                                                <a class="text-dark" href="tour-detail.html"><h4 class="font-weight-semibold2 mb-1">Bardiya Jungle Safari</h4></a>
                                                                <a href="#" class="mb-2 fs-12"><i class="fe fe-clock mr-1"></i> 21 Feb 2020 , 16:54</a><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Tours</td>
                                                <td>Holiday</td>
                                                <td class="font-weight-semibold fs-16">$254</td>
                                                <td>
                                                    <a class="btn btn-light btn-icon btn-sm" data-toggle="tooltip" data-original-title="Edit"><i class="fe fe-edit-2"></i></a>
                                                    <a class="btn btn-light btn-icon btn-sm" data-toggle="tooltip" data-original-title="Cancel"><i class="fe fe-x"></i></a>
                                                    <a class="btn btn-light btn-icon btn-sm" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fe fe-heart"></i></a>
                                                    <a href="tour-detail.html" class="btn btn-light btn-icon btn-sm" data-toggle="tooltip" data-original-title="View"><i class="fe fe-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="media mt-0 mb-0 mw-300">
                                                        <div class="card-aside-img"><img alt="img" class="br-5" src="assets/images/Travel&tours/paragliding-4688277_640.jpg"></div>
                                                        <div class="media-body">
                                                            <div class="card-item-desc ml-4 p-0 mt-0">
                                                                <a class="text-dark" href="tour-detail.html"><h4 class="font-weight-semibold2 mb-1">Pokhara Holiday Tour</h4></a>
                                                                <a href="#" class="mb-2 fs-12"><i class="fe fe-clock mr-1"></i> 21 Feb 2020 , 16:54</a><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Tours</td>
                                                <td>Holiday</td>
                                                <td class="font-weight-semibold fs-16">$254</td>
                                                <td>
                                                    <a class="btn btn-light btn-icon btn-sm" data-toggle="tooltip" data-original-title="Edit"><i class="fe fe-edit-2"></i></a>
                                                    <a class="btn btn-light btn-icon btn-sm" data-toggle="tooltip" data-original-title="Cancel"><i class="fe fe-x"></i></a>
                                                    <a class="btn btn-light btn-icon btn-sm" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fe fe-heart"></i></a>
                                                    <a href="tour-detail.html" class="btn btn-light btn-icon btn-sm" data-toggle="tooltip" data-original-title="View"><i class="fe fe-eye"></i></a>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                    <div class="center-block text-center mt-5">
                                        <div class="d-sm-flex">
                                            <h6 class="mb-4 mb-sm-0 mt-3">Showing <b>1 to 10</b> of 30 entries</h6>
                                            <ul class="pagination mb-0 ml-auto">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/User Dashboard-->
@endsection