@extends('frontend.layouts.app')

@section('content')

    <!--Breadcrumb-->
    <section class="bannerimg banner-1 cover-image pt-9 pb-10 sptb-tab bg-background2" data-image-src="{{asset('assets/images/Travel&tours/mountains-6043079_1920.jpg')}}">
        <div class="header-text mb-0">
            <div class="container">
                <div class="row text-white">
                    <div class="col"><h1 class="">Search Results</h1></div>
                    <div class="col col-auto">
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Search</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--/Breadcrumb-->
<section class="sptb">
    <div class="container">
        <div class="row">
            @if($packages || $blogs)
            <div class="col-xl-12 col-lg-12 col-md-12">
                <!--Add lists-->
                <div class="mb-lg-0">
                    <div class="">
                        <div class="item2-gl business-list-01">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-11">
                                    @if($blogs)
                                    <div class="row">
                                        @foreach($blogs as $blog)
                                        <div class="col-xl-12 col-lg-6 col-md-6">
                                            <div class="card overflow-hidden">
                                                <div class="d-xl-flex ieh-100">
                                                    <div class="item-card9-img">
                                                        <div class="item-card9-imgs">
                                                            <a href="tour-detail.html" class="absolute-link2"></a>
                                                            @if($blog->image)
                                                            <img height="250px" src="{{asset($blog->image_path)}}" alt="{{$blog->title}}" class="cover-image" loading="lazy">
                                                            @elseif($blog->link)
                                                            <iframe height="250px" src="{{$blog->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
                                                            @else
                                                            <img height="250px" src="{{asset('assets/images/download.png')}}" alt="{{$blog->title}}" class="cover-image"  loading="lazy">
                                                            @endif
                                                        </div>
                                                       </div>
                                                    <div class="card border-0 mb-0 br-0">
                                                        <div class="card-body h-100">
                                                            <div class="item-card9">
                                                                <a href="#" class="text-dark">
                                                                    <h4 class="font-weight-semibold2 mt-1 mb-1">
                                                                       {{$blog->title}}</h4>
                                                                </a>
                                                                <div
                                                                    class="mt-0 mb-0 d-sm-flex d-md-block d-xl-flex">
                                                                    <a class="mt-1 mb-0 mr-3 text-dark"><i
                                                                            class="fe fe-tag mr-2"></i>
                                                                        Blog</a>
                                                                    <a class="mt-1 mb-0 mr-3">({{$blog->created_at->format('d-M-Y')}})</a>
                                                                </div>
                                                                <div class="">
                                                                    <p class="mt-2 mb-0 leading-loose">{{Str::limit($blog->meta_description,150)}}</p>
                                                                </div>
                                                                <a class="btn btn-light btn-pill btn-sm mt-2"
                                                                    href="tour-detail.html">Read More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                    @if($packages)
                                    <div class="row">
                                        @foreach ($packages as $package)
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
                                                                            {{$package->no_of_nights}} Nights</b>{!!Str::limit($package->overview, 125)!!}</p>
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
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Add lists-->
            </div>
            @endif
        </div>            
    </div>
</section>
@endsection
