@extends('frontend.layouts.app')

@section('content')

<section class="bannerimg banner-1 cover-image pt-9 pb-10 sptb-tab bg-background2" data-image-src="{{asset('assets/images/Travel&tours/mountains-6043079_1920.jpg')}}">
</section>
<section>
    <!-- Page -->
<div class="page page-h">
<div class="page-content z-index-10">
    <div class="container text-center">
        <div class="display-1 mb-5 font-weight-semibold2 text-primary">404</div>
        <h1 class="h1 mb-3 font-weight-semibold2 text-primary">Page Not Found</h1>
        <p class="h4 font-weight-normal mb-7 leading-normal">Oops!!!! the page you are looking for could not be found.</p>
        <a class="btn btn-secondary px-6" href="{{route('homepage')}}">
            <i class="fe fe-arrow-left mr-2"></i> Back To Home
        </a>
    </div>
</div>
</div>
<!-- End Page -->
</section>

@endsection