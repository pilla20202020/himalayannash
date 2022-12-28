@extends('frontend.layouts.app')

@section('content')

    <!--Breadcrumb-->
    <section class="bannerimg banner-1 cover-image pt-9 pb-10 sptb-tab bg-background2" data-image-src="{{asset('assets/images/Travel&tours/mountains-6043079_1920.jpg')}}">
        <div class="header-text mb-0">
            <div class="container">
                <div class="row text-white">
                    <div class="col"><h1 class="">{{$page->title}}</h1></div>
                    <div class="col col-auto">
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">{{$page->title}}</li>
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
                        <div class="row">
                            <div class="col-lg-12 col-12" style="text-align: justify;">
                                <div class="section-title text-left pb-2">
                                    
                                </div>
                                @if($page->image)
                                <img src="{{asset($page->image_path)}}" alt="{{$page->title}}" width="100%">
                                @endif
                                <p class="leading-normal-2" >{!!$page->content!!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-12 sptb">

                        <div class="row mt-2">
                            <div class="col-lg-12 col-12">
                                @if($popular_tours->isNotEmpty())
                                <div class="card about-card pb-2">
                                    <div class="card-header about-card-header bg-primary">
                                        <h3 class="text-white text-center">Popular Tours</h3>
                                    </div>
                                    <div class="card-body about-card-body">
                                        <ul class="about-list">
                                            @foreach ($popular_tours as $tour)
                                            <li><a href="{{route('package_details',$tour->slug)}}"><i
                                                class="fa fa-angle-double-right mr-2 text-secondary"></i>{{$tour->name}}</a></li>                                                
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                @if($recent_blogs->isNotEmpty())
                                <div class="card about-card pb-2">
                                    <div class="card-header about-card-header bg-primary">
                                        <h3 class="text-white text-center">Recent Blogs</h3>
                                    </div>
                                    <div class="card-body about-card-body">
                                        <ul class="about-list">
                                            @foreach ($recent_blogs as $blog)
                                            <li><a href="{{route('blog.details',$blog->slug)}}"><i
                                                class="fa fa-angle-double-right mr-2 text-secondary"></i>{{Str::limit($blog->title, 75)}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/section-->
@endsection
