@extends('template')
<style>
.rest-tle{
    position:relative;
}
    .rest-tle:before{
        content:'';
        width:50px;
        height:4px;
        background:#fff;
        position:absolute;
        bottom:-15px;
        left:50px;
        
    }
    .bdr-radius{
    border-radius:7px !important;
}
</style>
@section('main')
<div class="container mb-4 margin-top-85 min-height d-flex justify-content-center align-items-center">
	<div class="d-flex justify-content-center align-items-center w-450 h-100" style="border-radius: 15px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    backdrop-filter: blur(7.8px);
    -webkit-backdrop-filter: blur(7.8px);
    border: 2px solid #7cb342;">
		<div class="p-5  w-100  " >
			<div class="row w-100 d-flex justify-content-center ">
				<h4 class="font-weight-700 text-18 text-center rest-tle" style="color:#7cb342;">{{ __('Reset Password') }}</h4>
			</div>
				@if (Session::has('message'))
					<div class="row mt-5" >
						<div class="col-md-12 text-13  alert {{ Session::get('alert-class') }} alert-dismissable fade in opacity-1">
							<a href="#"  class="close " data-dismiss="alert" aria-label="close">&times;</a>
							{{ Session::get('message') }}
						</div>
					</div>
				@endif

			<form id="forgot_password_form" method="post" action="{{ url('forgot_password') }}" class='signup-form login-form mt-5' accept-charset='UTF-8' style="margin-top:50px !important;">
				{{ csrf_field() }}
				<div class="col-sm-12">
						<p  style="color:#222; font-size:13px; font-weight:500;">{{ __('Please enter your email address') }}</p>
					</div>

					<div class="col-sm-12 mt-4">
						<input type="text" id="email" class="form-control bdr-radius" name="email" placeholder = "Email" >
						@if ($errors->has('email'))<label class="text-danger email-error">{{ $errors->first('email') }}</label>@endif
					</div>

					<div class="col-sm-12 mt-3 d-flex justify-content-center" style="margin-top:30px !important;">
						<button id="reset_btn" class="w2v-lgn-btn w-75" id="button-77"type="submit" > <i class="spinner fa fa-spinner fa-spin d-none" ></i>
							<span id="btn_next-text">{{ __('Reset Link has been sent') }}</span>

						</button>
					</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('validation_script')
	<script type="text/javascript" src="{{ asset('public/js/jquery.validate.min.js') }}"></script>
	<script type="text/javascript">
		'use strict'
		let nextText = "{{ __('Next') }}..";
		let resetLinkSentText = "{{ __('Reset Link has been sent') }}..";
		let fieldRequirdText = "{{ __('This field is required.') }}";
		let maxlengthText = "{{ __('Please enter no more than 255 characters.') }}";
		let validEmailText = "{{ __('Please enter a valid email address.') }}";
		let page = 'forgotPass';
	</script>
	<script type="text/javascript" src="{{ asset('public/js/login.min.js') }}"></script>

@endsection

