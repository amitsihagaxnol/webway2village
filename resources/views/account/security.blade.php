@extends('template')

<style>
    .updte-btn{
        padding:10px 30px;
        border:none;
        outline:none;
        background: #fff;
        color: #7cb342 !important;
         border-radius:10px;
    }
</style>

@section('main')
<div class="mb-4 margin-top-85">
	<div class="row m-0">
		@include('users.sidebar')
		<div class="col-md-10">
			<div class="main-panel">
				<div class="container-fluid min-height">
					@if(Session::has('message'))
						<div class="row mt-3">
							<div class="col-md-12 text-13 alert {{ Session::get('alert-class') }} alert-dismissable fade in opacity-1">
								<a href="#"  class="close " data-dismiss="alert" aria-label="close">&times;</a>
								{{ Session::get('message') }}
							</div>
						</div>
					@endif

					<div class="row">
						<div class="col-md-12 p-0 mt-5 mb-3">
							@include('users.profile_nav')
						</div>
						<!--style=" border:5px solid #7cb342; border-radius:10px"-->

						<div class="col-md-12 p-0 mt-4 d-flex justify-content-center align-items-center flex-column" >
						<div class="w-100 d-flex justify-content-center align-items-center">
						    	<form id="change_pass" class="{{ (Auth::guard('users')->user()->password) ? 'show' : 'hide' }} w-50 p-5" method='post' action="{{ url('users/security') }} " style=" display:flex; justify-content:center;align-items:center; flex-direction:column;border-radius: 15px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    backdrop-filter: blur(7.8px);
    -webkit-backdrop-filter: blur(7.8px);
    border: 2px solid #7cb342;" >
								{{ csrf_field() }}
								<div class="form-group row">
									<input id="id" name="id" type="hidden" value="33661974">
									<input id="redirect_on_error" name="redirect_on_error" type="hidden" value="/users/security">
									<input id="user_password_ok" name="user[password_ok]" type="hidden" value="true">
								</div>

								<div class=" w-100">
                                    <div class="form-group mt-3 w-100">
										<label for="user_first_name" style="color:#222; font-weight:600; font-size:13px;">{{ __('Old password') }} <span class="text-danger">*</span></label>
										<input class="form-control text-16 w-100" id="old_password" name="old_password" type="password" style="border-radius:4px !important">
										@if ($errors->has('old_password')) <p class="help-block text-danger">{{ $errors->first('old_password') }}</p> @endif
                                    </div>
								</div>

								<div class="w-100">
                                    <div class="form-group mt-3">
										<label for="user_first_name " style="color:#222; font-weight:600; font-size:13px;">{{ __('New password') }} <span class="text-danger">*</span></label>
										<input class="form-control text-16 w-100" data-hook="new_password" id="new_password" name="new_password" size="30" type="password" style="border-radius:4px !important">
										@if ($errors->has('new_password')) <p class="help-block text-danger">{{ $errors->first('new_password') }}</p> @endif
                                    </div>
								</div>

								<div class="w-100">
                                    <div class="form-group mt-3">
										<label for="user_first_name" style="color:#222; font-weight:600; font-size:13px;"> {{ __('Confirm password') }} <span class="text-danger">*</span></label>
										<input class="form-control text-16 w-100" id="user_password_confirmation" name="password_confirmation" size="30" type="password" style="border-radius:4px !important">
										@if ($errors->has('password_confirmation')) <p class="help-block text-danger">{{ $errors->first('password_confirmation') }}</p> @endif
                                    </div>
                                </div>
                                <div class="  w-100 d-flex justify-content-center align-items-center">
										<button type="submit" class="w2v-lgn-btn mt-3 " id="save_btn">
											<i class="spinner fa fa-spinner fa-spin d-none"></i>
											<span id="save_btn-text"><strong>{{ __('Update password') }}</strong></span>
										</button>
									</div>
                                

								<!--<div class="form-group row w-100">-->
								<!--	<div class="col-md-6  w-100">-->
								<!--		<button type="submit" class="updte-btn mt-3 " id="save_btn">-->
								<!--			<i class="spinner fa fa-spinner fa-spin d-none"></i>-->
								<!--			<span id="save_btn-text"><strong>{{ __('Update password') }}</strong></span>-->
								<!--		</button>-->
								<!--	</div>-->
								<!--</div>-->
							</form>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('validation_script')
<script  type="text/javascript" src="{{ asset('public/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript">
	'use strict'
	let passwordDifferentText = "{{ __('Old Password and New Password must be different.') }}";
	let requiredFieldText = "{{ __('This field is required.') }}";
	let minLengthText = "{{ __('Please enter at least 6 characters.') }}";
	let maxLengthText = "{{ __('Please enter no more than 30 characters') }}";
	let equalText = "{{ __('Please enter the same value again.') }}";
	let updatePasswordText = "{{ __('Update password') }}..";
	
</script>
<script  type="text/javascript" src="{{ asset('public/js/new-password.min.js') }}"></script>

@endsection
