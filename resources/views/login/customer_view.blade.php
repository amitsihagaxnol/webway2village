@extends('template')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/custom-theme.css') }}" />
@section('main')
<style>
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
.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-2 .selected-flag {
    height: 48px !important;
}
</style>
<div class="container  min-height "  style="display:flex; justify-content:center; align-items-center; flex-direction:column; padding:70px 0;">
    <h2 class="mn-lgn-tle my-5">Sign In</h2>
	<div class="d-flex justify-content-center align-items-center">
		<div class="  w-450 "  >
		<div class="register-form-bx  ">
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

              

                @if ($social['google_login'] || $social['facebook_login'])
                    <!--<p class="text-center font-weight-700 mt-1">{{ __('or') }}</p>-->
                @endif

			<div class="register-input-bx">
			    <form id="login_form m-0" method="post" action="{{ url('authenticate') }}"  accept-charset='UTF-8'>
				{{ csrf_field() }}
				<div class="form-group col-sm-12 p-0">
                    <label for="first_name">{{ __('Email') }} <span class="text-13 text-danger">*</span></label>
					@if ($errors->has('email'))
						<p class="error">{{ $errors->first('email') }}</p>
					@endif
					<input type="email" class="form-control text-14 shadow-none" value="{{ old('email') }}" name="email" placeholder = "{{ __('Email') }}">
				</div>

				<div class="form-group col-sm-12 p-0">
                    <label for="first_name">{{ __('Password') }} <span class="text-13 text-danger">*</span></label>
					@if ($errors->has('password'))
						<p class="error">{{ $errors->first('password') }}</p>
					@endif
					<input type="password" class="form-control text-14 shadow-none" value="" name="password" placeholder = "{{ __('Password') }}">
				</div>


				@if (str_contains(settings('recaptcha_preference'), 'user_login'))
                    <div class="g-recaptcha mt-4" data-sitekey="{{ settings('recaptcha_key') }}"></div>
                    @if ($errors->has('g-recaptcha-response'))
                            <p class="text-danger">{{ __($errors->first('g-recaptcha-response')) }}</p>
                    @endif
                    
                @endif
				

				<div class="form-group col-sm-12 p-0 mt-3" >
					<div class="d-flex justify-content-between">
						<div class="m-1 my-3 text-14 d-flex justify-content-center align-items-center" style="font-size:13px; color:#222; font-weight:500;">
							<input type="checkbox" class='remember_me remember-inp' id="remember_me2" name="remember_me" value="1">
							{{ __('Remember me') }}
						</div>

						<div class="m-1 my-3 text-14">
							<a href="{{ url('forgot_password') }}" class="forgot-password text-right" style="font-size:13px; color:#222; font-weight:500;">{{ __('Forgot password?') }}</a>
						</div>
					</div>
				</div>

				<div class="d-flex justify-content-center align-items-center" >
					<button type='submit' id="btn" class="w2v-lgn-btn  m-0" style="width:85%;"> <i class="spinner fa fa-spinner fa-spin d-none" ></i>
							<span id="btn_next-text">{{ __('Login') }}</span>
					</button>
				</div>
			</form>
			</div>

			<div class="my-3 text-14 d-flex justify-content-center align-items-center">
				{{ __('Don’t have an account?') }}
				<a href="{{ url('signup') }}" class="font-weight-600">
				{{ __('Register') }}
				</a>
			</div>
			<div class="d-flex justify-content-center align-items-center">
			    <p class="text-center font-weight-700 mt-1">{{ __('or') }}</p>
			</div>
			<div class="d-flex justify-content-center align-items-center">
			      @if ($social['google_login'])
                    <a href="{{ url('googleLogin') }}" class="social-btn d-flex justify-content-center align-items-center">
                        <!--<button >-->
                            <span><i class="fab fa-google-plus-g  mr-2 text-16"></i>  {{ __('Sign in with Google') }}</span>
                        <!--</button>-->
                    </a>
                @endif
			</div>
		</div>
		</div>
	</div>
</div>
@endsection

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
