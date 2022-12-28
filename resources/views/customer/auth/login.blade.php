@extends('frontend.layouts.app')

@section('content')
    <!--Breadcrumb-->
    <section class="bannerimg banner-1 cover-image pt-9 pb-10 sptb-tab bg-background2"
        data-image-src="{{ asset('assets/images/Travel&tours/mountains-6043079_1920.jpg') }}">
        <div class="header-text mb-0">
            <div class="container">
                <div class="row text-white">
                    <div class="col">
                        <h1 class="">Login</h1>
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
    <!--Login-Section-->
    <div class="page h-100">
        <div class="page-content z-index-10">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-12 col-md-12 d-block mx-auto">
                        <div class="card mb-0 shadow-none">
                            <div class="card-header">
                                <h3 class="card-title">Login to your Account</h3>
                            </div>
                            <form id="Login" action="{{ route('customer.login') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label text-dark">Email address</label>
                                        <input type="email"  class="form-control @if(session()->has('message')) error @endif" name="email" placeholder="Enter email" value="{{ old('email') }}">
                                        <label id="email-error" class="error"
                                            for="email">{{ session()->has('message')?session()->get('message'):""}}</label>
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
                                        <input type="submit" class="btn btn-primary btn-block" id="customer_login"
                                            value="SignIn">
                                    </div>
                                    <div class="text-center  mt-3 text-dark">
                                        Don't have account yet? <a href="{{ route('customer.register') }}">SignUp</a>
                                    </div>
                                    <hr class="divider mt-5">
                                    <div class="card-body text-center">
                                        <ul class="mb-0 login-social-icons">
                                            <li class="btn-facebook">
                                                <a class="social-icon" href=""><i class="fa fa-facebook"></i></a>
                                            </li>
                                            {{-- <li class="btn-twitter">
                                                <a class="social-icon" href=""><i class="fa fa-twitter"></i></a>
                                            </li> --}}
                                            <li class="btn-google">
                                                <a class="social-icon" href="{{route('google.login')}}"><i class="fa fa-google-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/Login-Section-->
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        $("#Login").validate({

            // Specify validation rules
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: "required",
            },
            // Specify validation error messages
            messages: {
                email: {
                    required: "E-mail is required!"
                },
                password: {
                    required: "Password is required!"
                },
            },
        });
    </script>
@endpush
