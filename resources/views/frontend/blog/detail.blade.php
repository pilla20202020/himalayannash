@extends('frontend.layouts.app')

@section('content')
    <!--Breadcrumb-->
    <section class="bannerimg banner-1 cover-image pt-9 pb-10 sptb-tab bg-background2"
        data-image-src="{{ asset('assets/images/Travel&tours/mountains-6043079_1920.jpg') }}">
        <div class="header-text mb-0">
            <div class="container">
                <div class="row text-white">
                    <div class="col">
                        <h1 class="">Read Blog</h1>
                    </div>
                    <div class="col col-auto">
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('blogs')}}">Blogs</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Blog Detail</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Breadcrumb-->
    <!--section-->
    <section class="bg-white">
        <div class="content-text mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-12 sptb">
                        <div class="card">
                            <div class="card-body">
                                <a class="text-dark">
                                    <h4 class="font-weight-semibold2 text-capitalize">{{$blog->title}}</h4>
                                </a>
                                @if($blog->has_link == 'Yes')
                                <div class="mt-5">
                                    <iframe height="auto" src="{{$blog->link}}"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                                @elseif($blog->image)
                                <div class="mt-5">
                                    <img src="{{asset($blog->image_path)}}" alt="{{$blog->title}}" width="100%" height="300px">
                                </div>
                                @endif
                                <div class="item7-card-desc d-flex mb-2 mt-3">
                                    <a><i class="fe fe-calendar text-muted mr-2"></i>{{$blog->created_at->format('d M,Y')}}</a>
                                </div>
                                <div style="text-align: justify;">
                                    {!!$blog->content!!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-12 sptb">
                        @if($recent_blogs)
                        <div class="row mt-2">
                            <div class="col-lg-12 col-12">
                                <div class="card about-card pb-2">
                                    <div class="card-header about-card-header bg-primary">
                                        <h3 class="text-white text-center">Recent Blogs</h3>
                                    </div>
                                    <div class="card-body about-card-body">
                                        <ul class="about-list">
                                        @foreach ($recent_blogs as $recent)
                                        <li><a href="{{route('blog.details',$recent->slug)}}"><i
                                            class="fa fa-angle-double-right mr-2 text-secondary"></i>{{$recent->title}}</a></li> 
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row mt-2">
                            <div class="col-lg-12 col-12">
                                <div class="card about-card pb-2">
                                    <div class="card-header about-card-header bg-primary">
                                        <h3 class="text-white text-center">Services</h3>
                                    </div>
                                    <div class="card-body about-card-body">
                                        <ul class="about-list">
                                            <li><a href="service-detail.html"><i
                                                        class="fa fa-angle-double-right mr-2 text-secondary"></i>Hotel
                                                    Booking</a></li>
                                            <li><a href="service-detail.html"><i
                                                        class="fa fa-angle-double-right mr-2 text-secondary"></i>Vehicle
                                                    Booking</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/section-->
@endsection
