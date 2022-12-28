@extends('frontend.layouts.app')

@section('content')
    <!--Breadcrumb-->
    <section class="bannerimg banner-1 cover-image pt-9 pb-10 sptb-tab bg-background2"
        data-image-src="{{ asset('assets/images/Travel&tours/mountains-6043079_1920.jpg') }}">
        <div class="header-text mb-0">
            <div class="container">
                <div class="row text-white">
                    <div class="col">
                        <h1 class="">List of Tours</h1>
                    </div>
                    <div class="col col-auto">
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Tours</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Breadcrumb-->
    <!--Add listing-->
    <section class="sptb">
        <div class="container">
            <div class="row">
                <!--Side Content-->
                <div class="col-xl-3 col-lg-3 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="input-group">
                                <input type="text" class="form-control br-tl-3 br-bl-3" placeholder="Search Tour" name="keyword" id="keyword">
                                <div class="input-group-append ">
                                    <button type="button" class="btn btn-secondary br-tr-3 br-br-3" id="search_tour_button">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="">
                        <div class="card mb-0">
                            <div class="card-header">
                                <h3 class="card-title">Categories</h3>
                            </div>
                            <div class="card-body">
                                <div class="" id="container">
                                    <div class="filter-product-checkboxs">
                                        @foreach ($categories as $category)
                                            <label class="custom-control custom-checkbox mb-3">
                                                <input type="checkbox" class="custom-control-input category-checkbox"
                                                    id="categories_checkbox" name="category_id[]"
                                                    value="{{ $category->id }}">
                                                <span class="custom-control-label">
                                                    <a class="text-dark">{{ $category->name }}</a>
                                                </span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card-header border-top">
                                <h3 class="card-title">Price Range</h3>
                            </div>
                            <div class="card-body border-top-0 pb-2 price-range-slider">
                                <input type="text" id="price" name="price" class="h6 slider-range">
                                <div id="mySlider"></div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary btn-block apply-filter" value="Apply Filter">
                            </div>
                        </div>
                    </form>
                </div>
                <!--/ Side Content-->

                <div class="col-xl-9 col-lg-9 col-md-12">
                    <!--Add lists-->
                    <div class="mb-lg-0">
                        @if (!empty($tours))
                            <div class="">
                                <div class="item2-gl business-list-01">
                                    <div class="">
                                        <div class="bg-white p-5 item2-gl-nav d-flex">
                                            <div class="selectgroup">
                                                <label class="selectgroup-item mb-md-0">
                                                    <input type="radio" name="tab-value" value="All"
                                                        class="selectgroup-input" checked="" id="search-tab">
                                                    <span class="selectgroup-button d-md-flex">All <i
                                                            class="fa fa-sort ml-2 mt-1"></i></span>
                                                </label>
                                                <label class="selectgroup-item mb-md-0">
                                                    <input type="radio" name="tab-value" value="Famous"
                                                        class="selectgroup-input" id="search-tab">
                                                    <span class="selectgroup-button">Famous</span>
                                                </label>
                                                <label class="selectgroup-item mb-md-0">
                                                    <input type="radio" name="tab-value" value="Latest"
                                                        class="selectgroup-input" id="search-tab">
                                                    <span class="selectgroup-button">Latest</span>
                                                </label>
                                                {{-- <label class="selectgroup-item mb-0">
                                                <input type="radio" name="value" value="Rating"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">Rating</span>
                                            </label> --}}
                                            </div>
                                            {{-- <ul class="nav item2-gl-menu ml-auto mt-1 tab-icons">
                                                <li class=""><a href="#tab-11" data-toggle="tab" class="active show"
                                                        title="List style"><i class="fe fe-list"></i></a></li>
                                                <li><a href="#tab-12" data-toggle="tab" title="Grid"><i
                                                            class="fe fe-grid"></i></a></li>
                                            </ul> --}}
                                        </div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-11">
                                            <div class="row" id="tour-filter">
                                                @foreach ($tours as $tour)
                                                    <div class="col-xl-12 col-lg-6 col-md-6">
                                                        <div class="card overflow-hidden">
                                                            <div class="d-xl-flex ieh-100">
                                                                <div class="item-card9-img">
                                                                    <div class="item-card9-imgs">
                                                                        <a href="{{ route('package_details', $tour->slug) }}"
                                                                            class="absolute-link2"></a>
                                                                        <img src="{{ asset($tour->image_path) }}"
                                                                            alt="{{ $tour->name }}" class="cover-image"
                                                                            loading="lazy">
                                                                    </div>
                                                                    @if(Auth::guard('customer')->user())
                                                                    <div class="item-card2-icons">
                                                                        <a href="javaScript:void(0)" @if(in_array($tour->id, $customerFavPackages)) class="item-card2-icons-r" @else class="home-update-favorite" @endif data-package_id="{{ $tour->id }}" data-customer_login_status="1">
                                                                             <i class="fa fa fa-heart-o"></i></a>
                                                                    </div>
                                                                    @else
                                                                    <div class="item-card9-icons">
                                                                        <a href="javaScript:void(0)" class="home-update-favorite" data-package_id="{{ $tour->id }}" data-customer_login_status="0"
                                                                            data-toggle="modal"> <i
                                                                                class="fa fa fa-heart-o"></i></a>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                <div class="card border-0 mb-0 br-0">
                                                                    <div class="card-body h-100">
                                                                        <div class="item-card9">
                                                                            <a href="{{ route('package_details', $tour->slug) }}"
                                                                                class="text-dark">
                                                                                <h4
                                                                                    class="font-weight-semibold2 mt-1 mb-1">
                                                                                    {{ $tour->name }}</h4>
                                                                            </a>
                                                                            <div
                                                                                class="mt-0 mb-0 d-sm-flex d-md-block d-xl-flex">
                                                                                <a class="mt-1 mb-0 mr-3 text-dark"><i
                                                                                        class="fe fe-map-pin mr-1"></i>
                                                                                    {{ $tour->location }}</a>
                                                                                {{-- <div
                                                                            class="star-ratings start-ratings-main clearfix d-flex mt-1">
                                                                            <div
                                                                                class="stars stars-example-fontawesome stars-example-fontawesome-sm mr-2">
                                                                                <select class="example-fontawesome"
                                                                                    name="rating" autocomplete="off">
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4" selected>4
                                                                                    </option>
                                                                                    <option value="5">5</option>
                                                                                </select>
                                                                            </div> <a class="fs-13 leading-tight mt-1"
                                                                                href="#">13 Reviews</a>
                                                                        </div> --}}
                                                                            </div>
                                                                            <div class="">
                                                                                <p class="mt-2 mb-0 leading-loose"><b>
                                                                                        @if ($tour->no_of_days)
                                                                                            {{ $tour->no_of_days }} Days,
                                                                                        @endif
                                                                                        @if ($tour->no_of_nights)
                                                                                            {{ $tour->no_of_nights }}
                                                                                            Nights
                                                                                        @endif
                                                                                    </b>{!! Str::limit($tour->overview, 150) !!} </p>
                                                                            </div>
                                                                            <a class="btn btn-light btn-pill btn-sm mt-2"
                                                                                href="{{ route('package_details', $tour->slug) }}">View
                                                                                Detail</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-12">
                                            <div class="row tour-filter-tab2">
                                                @foreach ($tours as $tour)
                                                    <div class="col-lg-6 col-md-6 col-xl-6">
                                                        <div class="card overflow-hidden">
                                                            <div class="h-100">
                                                                <div class="item-card9-img h-250">
                                                                    <div class="item-card9-imgs">
                                                                        <a href="{{ route('package_details', $tour->slug) }}"
                                                                            class="absolute-link2"></a>
                                                                        <img src="{{ asset($tour->image_path) }}"
                                                                            alt="{{ $tour->name }}" class="cover-image"
                                                                            loading="lazy">
                                                                    </div>
                                                                    <div class="item-card9-icons">
                                                                        <a href="#"
                                                                            class="item-card9-icons1 wishlist"> <i
                                                                                class="fa fa fa-heart-o"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="card border-0 mb-0 br-0">
                                                                    <div class="card-body h-100">
                                                                        <div class="item-card9">
                                                                            <a href="{{ route('package_details', $tour->slug) }}"
                                                                                class="text-dark">
                                                                                <h4
                                                                                    class="font-weight-semibold2 mt-1 mb-1">
                                                                                    {{ $tour->name }}</h4>
                                                                            </a>
                                                                            <div
                                                                                class="mt-0 mb-0 d-sm-flex d-md-block d-xl-flex">
                                                                                <a href="#"
                                                                                    class="mt-1 mb-0 mr-3 text-dark"><i
                                                                                        class="fe fe-map-pin mr-1"></i>
                                                                                    {{ $tour->location }}</a>
                                                                                {{-- <div
                                                                            class="star-ratings start-ratings-main clearfix d-flex mt-1">
                                                                            <div
                                                                                class="stars stars-example-fontawesome stars-example-fontawesome-sm mr-2">
                                                                                <select class="example-fontawesome"
                                                                                    name="rating" autocomplete="off">
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4" selected>4
                                                                                    </option>
                                                                                    <option value="5">5</option>
                                                                                </select>
                                                                            </div> <a class="fs-13 leading-tight mt-1"
                                                                                href="#">13 Reviews</a>
                                                                        </div> --}}
                                                                            </div>
                                                                            <div class="">
                                                                                <p class="mt-2 mb-0 leading-loose"><b>
                                                                                        @if ($tour->no_of_days)
                                                                                            {{ $tour->no_of_days }} Days,
                                                                                        @endif
                                                                                        @if ($tour->no_of_nights)
                                                                                            {{ $tour->no_of_nights }}
                                                                                        @endif Nights
                                                                                    </b>{!! Str::limit($tour->overview, 150) !!}</p>
                                                                            </div>
                                                                            <a class="btn btn-light btn-pill btn-sm mt-2"
                                                                                href="{{ route('package_details', $tour->slug) }}">View
                                                                                Detail</a>
                                                                        </div>
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
                                {{-- <div class="d-sm-flex">
                                    {{ $tours->links('vendor.pagination.custom') }}
                                    
                                </div> --}}
                            </div>
                        @endif
                    </div>
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
                    <!--/Add lists-->
                </div>
            </div>
        </div>
    </section>
    <!--/Add Listings-->
@endsection
@push('script')
    <script>

        $(document).ready(function() {
            function ApplyFilter(criteria) {
                var filterAttributes;
                var category_ids = $('.category-checkbox:checkbox:checked').map(function() {
                    return this.value;
                }).get();
                var min = $('#mySlider').slider("values")[0];
                var max = $('#mySlider').slider("values")[1];

                $.ajax({
                    type: "POST",
                    url: "{{ route('package.filter') }}",
                    data: {
                        category_ids: category_ids,
                        min_price: min,
                        max_price: max,
                        criteria: criteria,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response.message);
                        
                        $('#tour-filter').html(' ');
                        $.each(response.message, function(key, value) {
                            $('#tour-filter').append('<div class="col-xl-12 col-lg-6 col-md-6">\
                                                        <div class="card overflow-hidden">\
                                                            <div class="d-xl-flex ieh-100">\
                                                                <div class="item-card9-img">\
                                                                    <div class="item-card9-imgs">\
                                                                        <a href="#" class="absolute-link2"></a>\
                                                                        <img src="' + value.image_path + '" alt="' + value
                                .name +
                                '" class="cover-image" loading="lazy">\
                                                                    </div>\
                                                                    <div class="item-card9-icons">\
                                                                        <a href="#" class="item-card9-icons1 wishlist"> <i class="fa fa fa-heart-o"></i></a>\
                                                                    </div>\
                                                                </div>\
                                                                <div class="card border-0 mb-0 br-0">\
                                                                    <div class="card-body h-100">\
                                                                        <div class="item-card9">\
                                                                            <a href="#" class="text-dark"><h4 class="font-weight-semibold2 mt-1 mb-1">' +
                                value.name +
                                '</h4></a>\
                                                                            <div class="mt-0 mb-0 d-sm-flex d-md-block d-xl-flex">\
                                                                                <a class="mt-1 mb-0 mr-3 text-dark"><i class="fe fe-map-pin mr-1"></i>' +
                                value.location + '</a>\
                                                                            </div>\
                                                                            <div class="">\
                                                                                <p class="mt-2 mb-0 leading-loose"><b>' +
                                value
                                .no_of_days + ' Days, ' + value.no_of_nights +
                                ' Nights </b>' + value.overview.substring(0, 150) + '</p>\
                                                                            </div>\
                                                                            <a class="btn btn-light btn-pill btn-sm mt-2" href="#">View Detail</a>\
                                                                        </div>\
                                                                    </div>\
                                                                </div>\
                                                            </div>\
                                                        </div>\
                                                    </div> ')
                        });
                    }
                });
            }

            $('.selectgroup-input').on('change', function(e) {
                e.preventDefault();
                // alert('changed');
                var data = $('input[name="tab-value"]:checked').val();
                // alert(data);
                ApplyFilter(data);

            });

            $('#search_tour_button').on('click',function(e){
                e.preventDefault();
                var key_value = $('#keyword').val();
                ApplyFilter(key_value);
            });


            $('.apply-filter').on('click', function(e) {
                e.preventDefault();
                var filterAttributes;
                var category_ids = $('.category-checkbox:checkbox:checked').map(function() {
                    return this.value;
                }).get();
                var min = $('#mySlider').slider("values")[0];
                var max = $('#mySlider').slider("values")[1];

                $.ajax({
                    type: "POST",
                    url: "{{ route('package.filter') }}",
                    data: {
                        category_ids: category_ids,
                        min_price: min,
                        max_price: max,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response.message);
                        $('#tour-filter').html(' ');
                        $.each(response.message, function(key, value) {
                            $('#tour-filter').append('<div class="col-xl-12 col-lg-6 col-md-6">\
                                                        <div class="card overflow-hidden">\
                                                            <div class="d-xl-flex ieh-100">\
                                                                <div class="item-card9-img">\
                                                                    <div class="item-card9-imgs">\
                                                                        <a href="#" class="absolute-link2"></a>\
                                                                        <img src="' + value.image_path + '" alt="' + value
                                .name +
                                '" class="cover-image" loading="lazy">\
                                                                    </div>\
                                                                    <div class="item-card9-icons">\
                                                                        <a href="#" class="item-card9-icons1 wishlist"> <i class="fa fa fa-heart-o"></i></a>\
                                                                    </div>\
                                                                </div>\
                                                                <div class="card border-0 mb-0 br-0">\
                                                                    <div class="card-body h-100">\
                                                                        <div class="item-card9">\
                                                                            <a href="#" class="text-dark"><h4 class="font-weight-semibold2 mt-1 mb-1">' +
                                value.name +
                                '</h4></a>\
                                                                            <div class="mt-0 mb-0 d-sm-flex d-md-block d-xl-flex">\
                                                                                <a class="mt-1 mb-0 mr-3 text-dark"><i class="fe fe-map-pin mr-1"></i>' +
                                value.location + '</a>\
                                                                            </div>\
                                                                            <div class="">\
                                                                                <p class="mt-2 mb-0 leading-loose"><b>' +
                                value
                                .no_of_days + ' Days, ' + value.no_of_nights +
                                ' Nights </b>' + value.overview.substring(0, 150) + '</p>\
                                                                            </div>\
                                                                            <a class="btn btn-light btn-pill btn-sm mt-2" href="#">View Detail</a>\
                                                                        </div>\
                                                                    </div>\
                                                                </div>\
                                                            </div>\
                                                        </div>\
                                                    </div> ')
                        });
                    }
                });
                // });

            });
        });
    </script>
@endpush
@push('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const _token = "{{ csrf_token() }}";
        const url = "{{ route('customer.updat.wishlist') }}";
        const customerLogin = "{{ route('customer.login') }}";

        $(document).ready(function() {
            var TTHIS;
            var isNotCustomerLogged = true;
            $(document).on('click', '.home-update-favorite', function() {
                // $(this).addClass('item-card2-icons-r');
                TTHIS = $(this);
                var agree = Swal.fire({
                    title: 'Add to wishlist?',
                    text: "",
                    icon: '',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    // cancelButtonText: 'No',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log(TTHIS);
                        const package_id = TTHIS.data('package_id');
                        $('#package_id').val(package_id);
                        const customer_login_status = TTHIS.data('customer_login_status');
                        //If Customer is not Logined Then Login with also add the favuoirte.
                        if (customer_login_status == 0 && isNotCustomerLogged) {
                            $('#enquiryModal').modal('show');
                            return false;
                        }

                        const _token = "{{ csrf_token() }}";
                        const url = "{{ route('customer.updat.wishlist') }}";
                        $.ajax({
                            url: url,
                            type: 'post',
                            dataType: 'json',
                            data: {
                                package_id: package_id,
                                _token: _token
                            },
                            success: function(response) {
                                if (response.status == true) {
                                    // console.log(TTHIS);
                                    TTHIS.addClass('item-card2-icons-r');
                                    TTHIS.removeClass('home-update-favorite');

                                }
                            },
                            error: function(request, status, error) {
                                let json = jQuery.parseJSON(request.responseText);
                                Lobibox.notify('error', {
                                    size: 'mini',
                                    soundPath: "{{ asset('') }}vendor/lobibox/sounds/",
                                    sound: 'sound3',
                                    showClass: 'fadeInDown',
                                    hideClass: 'fadeUpDown',
                                    width: 400,
                                    rounded: true,
                                    msg: json.message,
                                    delay: 3000,
                                    delayIndicator: false,
                                });
                            }
                        });
                        // }

                    } else {
                        false;
                    }
                })

            }); //End of Function

            $(document).on('click', '#customer_login', function(e) {
                e.preventDefault();
                // console.log($('#Login').serialize());
                // alert('Clicked');
                const url = "{{ route('customer.login') }}";
                let data = $('#Login').serialize();
                console.log(data);
                $.ajax({
                    url: url,
                    type: 'post',
                    dataType: 'json',
                    data: data,
                    success: function(response) {
                        if (response.status) {
                            $('#enquiryModal').modal('hide');
                            isNotCustomerLogged = false;
                            TTHIS.addClass('item-card2-icons-r');
                            TTHIS.removeClass('home-update-favorite');
                            window.location.reload();
                        } else {
                            conslole.log(response.message);
                        }
                    }
                })

            })
        });
    </script>
    <script src="{{asset('js/make_package_favorite.js')}}"></script>
@endpush
