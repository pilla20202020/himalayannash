@extends('frontend.layouts.app')

@section('content')

    <!--Breadcrumb-->
    <section class="bannerimg banner-1 cover-image pt-9 pb-10 sptb-tab bg-background2" data-image-src="{{asset('assets/images/Travel&tours/mountains-6043079_1920.jpg')}}">
        <div class="header-text mb-0">
            <div class="container">
                <div class="row text-white">
                    <div class="col"><h1 class="">All Religious & Spiritual Tours</h1></div>
                    <div class="col col-auto">
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Explore</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--/Breadcrumb-->
@if($tours->isNotEmpty())
<section class="sptb">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <!--Add lists-->
                <div class="mb-lg-0">
                    <div class="">
                        <div class="item2-gl business-list-01">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-11">
                                    <div class="row">
                                        @foreach ($tours as $package)
                                        <div class="col-xl-12 col-lg-6 col-md-6">
                                            <div class="card overflow-hidden">
                                                <div class="d-xl-flex ieh-100">
                                                    <div class="item-card9-img">
                                                        <div class="item-card9-imgs">
                                                            <a href="{{route('package_details',$package->slug)}}" class="absolute-link2"></a>
                                                            @if($package->image)
                                                            <img src="{{asset($package->image_path)}}"
                                                                alt="{{$package->name}}" class="cover-image" loading="lazy">
                                                            @else
                                                            <img src="{{asset('assets/images/download.png')}}" alt="{{$blog->title}}" class="cover-image"  loading="lazy">
                                                            @endif
                                                        </div>
                                                       </div>
                                                    <div class="card border-0 mb-0 br-0">
                                                        <div class="card-body h-100">
                                                            <div class="item-card9">
                                                                <a href="{{route('package_details',$package->slug)}}" class="text-dark">
                                                                    <h4 class="font-weight-semibold2 mt-1 mb-1">
                                                                       {{$package->name}}</h4>
                                                                </a>
                                                                <div
                                                                    class="mt-0 mb-0 d-sm-flex d-md-block d-xl-flex">
                                                                    <a href="#" class="mt-1 mb-0 mr-3 text-dark"><i
                                                                            class="fe fe-map-pin mr-1"></i>
                                                                        {{$package->location}}</a>
                                                                </div>
                                                                <div class="">
                                                                    <p class="mt-2 mb-0 leading-loose"><b>{{$package->no_of_days}} Days,
                                                                            {{$package->no_of_nights}} Nights</b>{!!Str::limit($package->overview, 250)!!}</p>
                                                                </div>
                                                                <a class="btn btn-light btn-pill btn-sm mt-2"
                                                                    href="{{route('package_details',$package->slug)}}">Read More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                            
                                        @endforeach
                                    </div>
                                    <div class="d-sm-flex">
                                        {{$tours->links('vendor.pagination.custom')}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Add lists-->
            </div>
        </div>            
    </div>
</section>
@else
<section class="sptb">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <!--Add lists-->
                <div class="mb-lg-0">
                    <div class="">
                        <div class="item2-gl business-list-01">
                            <h3>No tours available at the moment</h3>
                        </div>
                    </div>
                </div>
                <!--/Add lists-->
            </div>
        </div>            
    </div>
</section>
@endif
@endsection
