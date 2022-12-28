@extends('backend.layouts.app')

@section('content')

@section('guest')
    <div class="page h-100 cover-image bg-background2" data-image-src="{{asset('assets/images/Capture.PNG')}}">
        <div class="page-content z-index-10">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <h1 class="text-center text-white text-uppercase font-weight-bolder"> <a href="{{route('homepage')}}" class="text-white link-text" target="__blank"> Himalayan Nash</a> <br> <span class="h3 text-capitalize"> Admin Login</span></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12 d-block mx-auto">
                        <div class="card mb-0 shadow-none">
                            <div class="card-header">
                                <h3 class="card-title text-primary">Login to your Account</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <label for="inputEmail">Email address</label>
                                        <input class="form-control" id="inputEmail" name="email" type="email"
                                            placeholder="name@example.com" required />
                                    </div>
                                    <div class="form-floating mb-3">
                                        <label for="inputPassword">Password</label>
                                        <input class="form-control" id="inputPassword" name="password" type="password"
                                            placeholder="Password" required />
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" id="inputRememberPassword" type="checkbox"
                                            value="" />
                                        <label class="form-check-label" for="inputRememberPassword">Remember
                                            Password</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <input type="submit" class="btn btn-primary" value="Login">
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <div class="row align-items-center flex-row-reverse">
                                    <div class="col-lg-12 col-sm-12 mt-3 mt-lg-0 text-center">
                                        Copyright © 2022 . All rights reserved.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@endsection
