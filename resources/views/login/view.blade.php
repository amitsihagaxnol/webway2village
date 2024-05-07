@extends('template')
<style>
.n-hvr{
   color:#fff !important;
   margin-left:10px;
}
    .n-hvr:hover{
        color:#fff !important;
    }
    .remember-inp[type=checkbox] {
    display: inline-block !important;
    height: 15px !important;
    width: 15px !important;
    text-align: center !important;
    vertical-align: top !important;
    border-width: 1px !important;
    border-style: solid !important;
    border-color: rgb(176, 176, 176) !important;
    background: rgb(255, 255, 255) !important;
    overflow: hidden !important;
    border-radius: 4px !important;
    margin-right: 5px;
}
.bdr-radius{
    border-radius:7px !important;
}
</style>
@section('main')
<div class="container pb-5 margin-top-85  d-flex justify-content-center align-items-center flex-column">
     <h2 class="mn-lgn-tle ">Sign In</h2>
	<div class="row w-100 d-flex justify-content-center align-items-center my-5">
	    <div class="col-lg-5 col-md-8 pd-2"  style="border-radius: 15px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    backdrop-filter: blur(7.8px);
    -webkit-backdrop-filter: blur(7.8px);
    border: 2px solid #7cb342;">
	    
		<div class="p-5">
			@if (Session::has('message'))
				<div class="row mt-3">
					<div class="col-md-12 p-2 text-center text-14 alert {{ Session::get('alert-class') }} alert-dismissable fade in opacity-1">
						<a href="#"  class="close text-18" data-dismiss="alert" aria-label="close">&times;</a>
						{{ Session::get('message') }}
					</div>
				</div>
			@endif
                <!--@if ($social['facebook_login'])-->
                <!--    <a href="{{ isset($facebook_url) ? $facebook_url : url('facebookLogin') }}">-->
                <!--        <button class="btn btn-outline-primary pt-3 pb-3 text-16 w-100">-->
                <!--            <span><i class="fab fa-facebook-f mr-2 text-16"></i> {{ __('Sign up with Facebook') }}</span>-->
                <!--        </button>-->
                <!--    </a>-->
                <!--@endif-->

                <!--@if ($social['google_login'])-->
                <!--    <a href="{{ url('googleLogin') }}">-->
                <!--        <button class="btn btn-outline-danger pt-3 pb-3 text-16 w-100 mt-3">-->
                <!--            <span><i class="fab fa-google-plus-g  mr-2 text-16"></i>  {{ __('Sign up with Google') }}</span>-->
                <!--        </button>-->
                <!--    </a>-->
                <!--@endif-->

                <!--@if ($social['google_login'] || $social['facebook_login'])-->
                <!--    <p class="text-center font-weight-700 mt-1">{{ __('or') }}</p>-->
                <!--@endif-->

			<form  id="login_form" method="post" action="{{ url('authenticate') }}"  accept-charset='UTF-8'>
				{{ csrf_field() }}
				<div class="form-group col-sm-12 p-0">
                    <!--<label for="first_name">{{ __('Email') }} <span class="text-13 text-danger">*</span></label>-->
                    <label for="first_name" style="color:#7cb342; font-size:13px; font-weight:600;">User Email <span class="text-13 text-danger">*</span></label>
					@if ($errors->has('email'))
						<p class="error">{{ $errors->first('email') }}</p>
					@endif
					<input type="email" class="form-control login-inp text-14 bdr-radius"  value="{{ old('email') }}" name="email" placeholder = "{{ __('Email') }}">
				</div>

				<div class="form-group col-sm-12 p-0 mt-4">
                    <label for="first_name" style="color:#7cb342; font-size:13px; font-weight:600;">{{ __('Password') }} <span class="text-13 text-danger">*</span></label>
					@if ($errors->has('password'))
						<p class="error">{{ $errors->first('password') }}</p>
					@endif
					<input type="password" class="form-control login-inp text-14 bdr-radius" value=""  name="password" placeholder = "{{ __('Password') }}">
				</div>


				@if (str_contains(settings('recaptcha_preference'), 'user_login'))
                    <div class="g-recaptcha mt-4" data-sitekey="{{ settings('recaptcha_key') }}"></div>
                    @if ($errors->has('g-recaptcha-response'))
                            <p class="text-danger">{{ __($errors->first('g-recaptcha-response')) }}</p>
                    @endif
                    
                @endif
				

				<div class="form-group col-sm-12 p-0 mt-5" >
					<div class="d-flex justify-content-between">
						<div class="m-3 text-14 d-flex justify-content-center align-items-center" style="color:#222; font-size:13px; font-weight:500;">
							<input type="checkbox" class='remember_me remember-inp shadow-none' id="remember_me2" name="remember_me" value="1" >
							{{ __('Remember me') }}
						</div>

						<div class="m-3 text-14">
							<a href="{{ url('forgot_password') }}" class="forgot-password text-right " style="color:#222; font-size:13px; font-weight:500;">{{ __('Forgot password?') }}</a>
						</div>
					</div>
				</div>

				<div class="form-group col-sm-12 p-0 d-flex justify-content-center align-items-center mt-3" >
					<button type='submit' id="btn" class=" w2v-lgn-btn w-75" > <i class="spinner fa fa-spinner fa-spin d-none" ></i>
							<span id="btn_next-text">{{ __('Login') }}</span>
					</button>
				</div>
			</form>

			<div class="mt-3 text-14 d-flex justify-content-center align-items-center" style="color:#222; font-size:13px; font-weight:500;">
				{{ __('Don’t have an account?') }}
				<a href="{{ url('signup') }}" class="font-weight-600 " >
				{{ __('Register') }}
				</a>
			</div>
		</div>
	</div>
	</div>
</div>
<!--<div class="footer border-top pt-3 pb-2">-->
<!--    <div class="container">-->
<!--    <div class="row">-->
<!--        <div class="col-md-6 d-flex justify-content-center align-items-center">-->
<!--            <strong style="font-size:13px; font-weight:bold;">-->
<!--                © Copyright 2023 by <a href="#" style="font-size:15px; color:#7cb342;" >way2village.com</a>-->
<!--            </strong>-->
            
<!--        </div>-->
<!--        <div class="col-md-6">-->
<!--            <ul class="d-flex justify-content-center align-items-center" style="gap:20px;">-->
<!--                <li class="ftr-li">Privacy</li>-->
<!--                <li class="ftr-li" >Terms</li>-->
<!--                <li class="ftr-li">Sitemap</li>-->
<!--                <li class="ftr-li">Company details</li>-->
<!--            </ul>-->
            
            
<!--        </div>-->
        
<!--    </div>-->
        
<!--    </div>-->
    
<!--</div>-->
@endsection('')

@section('validation_script')
<script type="text/javascript" src="{{ asset('public/js/jquery.validate.min.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript">
	'use strict'
	let fieldRequirdText = "{{ __('This field is required.') }}";
	let maxlengthText = "{{ __('Please enter no more than 255 characters.') }}";
	let validEmailText = "{{ __('Please enter a valid email address.') }}";
	let loginText = "{{ __('Login') }}..";
	let page = 'login';

		
</script>
<script type="text/javascript" src="{{ asset('public/js/login.min.js') }}"></script>

@endsection
