@extends('frontend.layouts.app')
@push('styles')
@endpush

@section('content')
    <!--Breadcrumb-->
    <section class="bannerimg banner-1 cover-image pt-9 pb-10 sptb-tab bg-background2" data-image-src="{{asset('assets/images/Travel&tours/mountains-6043079_1920.jpg')}}">
        <div class="header-text mb-0">
            <div class="container">
                <div class="row text-white">
                    <div class="col"><h1 class="">Register</h1></div>
                    <div class="col col-auto">
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Register</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--/Breadcrumb-->
		<!--Login-Section-->
		<section class="sptb">
			<div class="container customerpage">
				<div class="row">
					<div class="single-page" >
						<div class="col-lg-6 col-xl-6 col-md-6 d-block mx-auto">
							<div class="wrapper wrapper2 text-left">
								<form id="Register" action="{{route('customer.register')}}" method="post" class="card-body" tabindex="500">
                                    @csrf
									<h4 class="font-weight-semibold2 pb-4">Sign Up Account</h4>
									<div class="name">
										<input type="text" @if($errors->first('first_name')) class="error" @endif name="first_name" value="{{ old('first_name') }}">
										<label id="first_name-error" class="error" for="first_name">{{$errors->first('last_name')?$errors->first('last_name'):"First Name"}}</label>
									</div>
									<div class="name">
										<input type="text"@if($errors->first('last_name')) class="error" @endif name="last_name" value="{{ old('last_name') }}">
										<label id="last_name-error" class="error" for="last_name" >{{$errors->first('last_name')?$errors->first('last_name'):"Last Name"}}</label>
									</div>
									<div class="mail">
										<input type="email" @if($errors->first('email')) class="error" @endif name="email" value="{{ old('email') }}">
										<label id="email-error" class="error" for="email">{{$errors->first('email')?$errors->first('email'):"E-mail"}}</label>
									</div>
                                    <div class="mail">
										<input type="tel" @if($errors->first('contact_no')) class="error" @endif name="contact_no" value="{{ old('contact_no') }}">
										<label id="contact_no-error" for="contact_no">Contact Number</label>

									</div>
									<div class="passwd">
										<input type="password" @if($errors->first('password')) class="error" @endif name="password">
										<label id="password-error" class="error" for="password">{{$errors->first('password')?$errors->first('password'):"Password"}} </label>
									</div>
                                    <div class="passwd">
										<input type="password" @if($errors->first('password_confirmation')) class="error" @endif name="password_confirmation">
										<label id="password_confirmation-error" class="error" for="password_confirmation">Confirm Password</label>

									</div>
									<div class="submit">
										<input type="submit" class="btn btn-primary btn-block" value="Register">
									</div>
									<p class="text-dark mb-0 fs-13">Already have an account?<a href="{{route('customer.login')}}" class="text-primary ml-1">Sign In</a></p>
								</form>
								<hr class="divider">
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
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/Login-Section-->
@endsection
@push('script')
{{-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>

$("#Register").validate({

	// Specify validation rules
	rules: {
		first_name: "required",
		last_name: "required",
		email: {required:true,email: true },
		password: "required",
		password_confirmation: "required"
	},
	// Specify validation error messages
	messages: {
		first_name: "First Name is required!",
		last_name: "Last Name is required!",
		email: { required: "E-mail is required!" },
		password: { required: "Password is required!" },
		password_confirmation: { required: "Confirm Password  is required" },
	},
	// Make sure the form is submitted to the destination defined
	// in the "action" attribute of the form when valid
	onfocusout: function (element) {
		this.element(element);
	},
	submitHandler: function (form) {
		Submit();
		return false;
	}

});
</script>
@endpush
