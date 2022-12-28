@extends('frontend.layouts.app')

@section('content')

    <!--Breadcrumb-->
    <section class="bannerimg banner-1 cover-image pt-9 pb-10 sptb-tab bg-background2" data-image-src="{{asset('assets/images/Travel&tours/mountains-6043079_1920.jpg')}}">
        <div class="header-text mb-0">
            <div class="container">
                <div class="row text-white">
                    <div class="col"><h1 class="">Blogs</h1></div>
                    <div class="col col-auto">
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Blog Detail</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--/Breadcrumb-->
		<!--Add listing-->
		<section class="bg-white sptb">
			<div class="container">
				<div class="row">
					<!--Add lists-->
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="row">
                            @foreach ($blogs as $blog)
                            <div class="col-xl-4 col-lg-6 col-md-6">
								<div class="card blog-card overflow-hidden">
									<div class="item7-card-img">
										<a href="{{route('blog.details',$blog->slug)}}"></a>
                                        @if($blog->image)
										<img src="{{asset($blog->image_path)}}" alt="img" class="cover-image" loading="lazy">
                                        @elseif($blog->has_link == "Yes")
                                        <iframe height="250px" src="{{$blog->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
                                        @else
								        <img src="{{asset('assets/images/download.png')}}" alt="{{$blog->title}}" class="cover-image"  loading="lazy">
                                        @endif
									</div>
									<div class="card-body">
										<div class="item7-card-desc d-flex mb-2">
											<a><i class="fe fe-calendar text-muted text-primary mr-2"></i>{{$blog->created_at->format('d-M-Y')}}</a>
										</div>
										<a href="{{route('blog.details',$blog->slug)}}" class="text-primary"><h4 class="font-weight-semibold2">{{$blog->title}}</h4></a>
										@if(!empty($blog->meta_description))<p class="leading-normal">{{Str::limit($blog->meta_description,150)}}</p>@endif
										<a href="{{route('blog.details',$blog->slug)}}" class="text text-primary">Read More</a>
									</div>
								</div>
							</div>
                            @endforeach

						</div>
						<div class="d-sm-flex">
                            {{$blogs->links('vendor.pagination.custom')}}
						</div>
					</div>
					<!--/Add lists-->
				</div>
			</div>
		</section>
		<!--Add listing-->
@endsection
