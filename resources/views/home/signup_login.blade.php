@extends('template')
<style>
.n-hvr{
   color:#fff !important;
   margin-left:10px;
}
.n-hvr2{
   color:#222 !important;
}
    .n-hvr:hover{
        color:#fff !important;
    }
    .n-hvr2:hover{
        color:#222 !important;
    }
    .md-c-3{
        height:100%;
        padding:20px !important;
        background:#fff;
        
    }
    .md-c-3 p{
        font-size:13px;
        line-height:30px;
    }
   .btn-model{
       background: #7cb342;
       color:#fff;
       padding:3px 15px;
       border-radius:4px;
       
   }
.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-2 .selected-flag {
    background:#f2f2f2;
    color:#222;
    font-size:13px;
    height: 100% !important;
}
.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-3 .selected-flag {
    width: 65px;
    height: 50px !important;
    font-size: 13px;
    padding:5px;
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
@push('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('public/js/intl-tel-input-13.0.0/build/css/intlTelInput.min.css') }}">
	<!--<link rel="stylesheet" type="text/css" href="{{ asset('public/css/custom-theme.css') }}" />-->
@endpush
@section('main')
<div class="container margin-top-85 pb-5  d-flex justify-contnet-center align-items-center flex-column " >
    <h2 class="mn-lgn-tle my-3">Farmhouse Owner Sign Up</h2>
    <div class="d-flex justify-content-center align-items-center my-5 sgnup-bx pd-2"  style="border-radius: 15px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    backdrop-filter: blur(7.8px);
    -webkit-backdrop-filter: blur(7.8px);
    border: 2px solid #7cb342;">
		<div style="padding:20px 10px; " >
		    @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
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
            @endif
				<form id="signup_form" name="signup_form" method="post" action="{{ url('create') }}" class='signup-form login-form' accept-charset='UTF-8' onsubmit="return ageValidate();">
					{{ csrf_field() }}
					<div class="row text-16  ">
						<input type="hidden" name='email_signup' id='form'>
						<input type="hidden" name="default_country" id="default_country" class="form-control">
						<input type="hidden" name="carrier_code" id="carrier_code" class="form-control">
						<input type="hidden" name="formatted_phone" id="formatted_phone" class="form-control">

						<div class="form-group col-lg-6 col-sm-12 px-2">
                            <label for="first_name" style="color:#7cb342; font-size:13px; font-weight:600;">{{ __('First Name') }} <span class="text-13 text-danger">*</span></label>
							@if ($errors->has('first_name')) <p class="error-tag">{{ $errors->first('first_name') }}</p> @endif
							<input type="text" class='form-control login-inp text-14 p-2 bdr-radius'  value="{{ old('first_name') }}" name='first_name' id='first_name' placeholder='{{ __('First Name') }}'>
						</div>

						<div class="form-group col-lg-6 col-sm-12  px-2">
                            <label for="first_name" style="color:#7cb342; font-size:13px; font-weight:600;">{{ __('Last Name') }} <span class="text-13 text-danger">*</span></label>
								@if ( $errors->has('last_name') ) <p class="error-tag">{{ $errors->first('last_name') }}</p> @endif
								<input type="text" class='form-control login-inp text-14 p-2 bdr-radius'  value="{{ old('last_name') }}" name='last_name' id='last_name' placeholder='{{ __('Last Name') }}'>
						</div>

						<div class="form-group col-lg-6 col-sm-12  px-2">
                            <label for="first_name" style="color:#7cb342; font-size:13px; font-weight:600;">{{ __('Email') }} <span class="text-13 text-danger">*</span></label>
								<input type="text" class='form-control login-inp text-14 p-2 bdr-radius'  value="{{ old('email') }}" name='email' id='email' placeholder='{{ __('Email') }}'>
								@if ($errors->has('email'))
									<p class="error-tag">
									{{ $errors->first('email') }}
									</p>
								@endif
								<div id="emailError"></div>
						</div>

						<div class="form-group col-lg-6 col-sm-12  px-2">
                            <label for="first_name" style="color:#7cb342; font-size:13px; font-weight:600;">{{ __('Phone') }}</label>
								<input type="tel" class="form-control login-inp text-14 p-2 bdr-radius"  id="phone" name="phone">
								<span id="tel-error" class="text-13 text-danger"></span>
								<span id="phone-error" class="text-13 text-danger"></span>
						</div>
						
						<div class="form-group col-lg-6 col-sm-12  px-2">
						    <label for="first_name" style="color:#7cb342; font-size:13px; font-weight:600;">State</label>
                             <select class="form-control bdr-radius" name="state" id="state" style="height:50px !important;" >
                                      <option value="">Select State</option>
                                      @foreach($states as $state)
                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                      @endforeach
                                </select>
						</div>
						
						<div class="form-group col-lg-6 col-sm-12  px-2">
						     <label for="first_name" style="color:#7cb342; font-size:13px; font-weight:600;">District</label>
                              <select class="form-control bdr-radius" name="district" id="district" style="height:50px !important;">
                                      <option value="">Select District</option>
                                     
                                </select>
						</div>
						
					    <div class="form-group col-lg-6 col-sm-12  px-2">
                              <label for="first_name" style="color:#7cb342; font-size:13px; font-weight:600;">Location</label>
                              <input type="text" class="form-control bdr-radius" name="location" id="location" placeholder="" >
						</div>
						

						<div class="form-group col-lg-6  col-sm-12 px-2">
                            <label for="first_name" style="color:#7cb342; font-size:13px; font-weight:600;">{{ __('Password') }} <span class="text-13 text-danger">*</span></label>
								@if ( $errors->has('password') ) <p class="error-tag">{{ $errors->first('password') }}</p> @endif
								<input type="password" class='form-control login-inp text-14 p-2 bdr-radius' name='password' id='password' placeholder='{{ __('Password') }}' >
						</div>
						
						
						<div class="col-12">
                            <div class="form-group mb-4 mt-2">
                                <span class="at-checkbox">
                                    <input id="at-login" type="checkbox" name="rememberme" class="remember-inp mt-2">
                                    <label for="at-login" style="color:#222; font-size:13px; font-weight:500;">Accept the
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#exampleModal1" class="font-weight-600 n-hvr2" style="color:#222 !important; font-size:13px; font-weight:600 !important;">Terms &amp; Conditions</a></label>
                                        <!--<a href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal1">Terms &amp; Conditions</a></label>-->
                                       
                                </span>
                            </div>
                        </div>
						
						

						{{--	<div class="col-sm-12 p-0">
							<label class="l-pad-none text-14" style="color:#fff; font-size:13px; font-weight:600;">{{ __('Birthday') }} <span class="text-13 text-danger">*</span></label>
						</div>

					<div class="col-sm-12 p-0">
								@if ($errors->has('birthday_month') || $errors->has('birthday_day') || $errors->has('birthday_year'))
								<p class="error-tag">{{ $errors->first('date_of_birth') }}</p>
								@else
									<p class="error-tag">{{ $errors->first('date_of_birth') }}</p>
								@endif
						</div>


						<div class="form-group col-sm-12 p-0">
								<div class="row">
									<div class="col-sm-4 pl-0 mt-2">
											<select name='birthday_month' class='form-control text-14 p-2' id='user_birthday_month'>
												<option value=''>{{ __('Month') }}</option>
												@for ($m=1; $m<=12; ++$m)
													<option value="{{ $m }}" {{ old('birthday_month') == $m ? 'selected = "selected"' : '' }}>{{ date('F', mktime(0, 0, 0, $m, 1)) }}</option>
												@endfor
											</select>
									</div>

									<div class="col-sm-4 mt-2">
										<select name='birthday_day' class='form-control text-14' id='user_birthday_day'>
											<option value=''>{{ __('Day') }}</option>
											@for ($m=1; $m<=31; ++$m)
											<option value="{{ $m }}" {{ old('birthday_day') == $m ? 'selected = "selected"' : '' }}>{{ $m }}</option>
											@endfor
										</select>
									</div>

									<div class="col-sm-4 pr-0 mt-2">
									<select name='birthday_year' class='form-control text-14' id='user_birthday_year'>
										<option value=''>{{ __('Year') }}</option>
										@for ($m=date('Y'); $m > date('Y')-100; $m--)
											<option value="{{ $m }}"{{ old('birthday_year') == $m ? 'selected = "selected"' : '' }}>{{ $m }}</option>
										@endfor
									</select>
									</div>
								</div>

							<span class="text-danger text-13">
								<label id='dobError'></label>
							</span>
						</div>
						--}}

						@if (str_contains(settings('recaptcha_preference'), 'user_reg'))
							<div class="g-recaptcha mb-4" data-sitekey="{{ settings('recaptcha_key') }}"></div>
							@if ($errors->has('g-recaptcha-response'))
									<p class="text-danger">{{ __($errors->first('g-recaptcha-response')) }}</p>
							@endif
							
						@endif
						<div class="w-100 d-flex justify-content-center align-items-center mt-2">
						    <button type='submit' id="btn" class="w2v-lgn-btn w-50" > <i class="spinner fa fa-spinner fa-spin d-none" ></i>
							<span id="btn_next-text">{{ __('Sign Up') }}</span>
						</button>
						</div>

						
					</div>
				</form>

				<div class="text-14 d-flex justify-content-center align-items-center mt-3" style="color:#222; font-size:13px; font-weight:500;">
					{{ __('Already an :x member?', ['x' => siteName()]) }}
					<a href="{{ url('/login?') }}" class="font-weight-600 ">
					{{ __('Log In') }}
                    </a>
				</div>
			</div>
    </div>
</div>

<!--MODAL-->
 <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content d-flex flex-column  align-items-center">

                                            <div class="md-c-3 ">
                                                <div class="border-none ">
                                                  <p>
                                                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                                  </p>
                                                    
                                                </div>
                                                <div class="w-100 d-flex justify-content-end">
                                                    <a class=" mt-3 btn-model n-hvr" style="cursor:pointer" data-bs-dismiss="modal">
                                                    
                                                        OK
                                                    
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
@endsection

@section('validation_script')
<script type="text/javascript" src="{{ asset('public/js/jquery.validate.min.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript" src="{{ asset('public/js/intl-tel-input-13.0.0/build/js/intlTelInput.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/js/isValidPhoneNumber.js') }}" type="text/javascript"></script>

<script type="text/javascript">

	'use strict'
	let requiredFieldText = "{{ __('This field is required.') }}";
	let minLengthText = "{{ __('Please enter at least 6 characters.') }}";
	let maxLengthText = "{{ __('Please enter no more than 255 characters.') }}";
	let oldLimitationText = "{{ __('Age must be greater than 18.') }}";
	let validEmailText = "{{ __('Please enter a valid email address.') }}";
	let checkUserURL = "{{ route('checkUser.check') }}";
	var token = "{{ csrf_token() }}";
	let emailExistText = "{{ __('Email address is already Existed.') }}";
	let validInternationalNumber = '{{ __("Please enter a valid International Phone Number.") }}';
    let numberExists = "{{ __('The number has already been taken!') }}";
	let signedUpText = "{{ __('Sign Up') }}..";
	let baseURL = "{{ url('/') }}";
	let duplicateNumberCheckURL = "{{ url('duplicate-phone-number-check') }}";
	let minAge = "{{ __('You are not old enough!') }}";
</script>

<script type="text/javascript" src="{{ asset('public/js/sign-up-login.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
       $(document).ready(function(){
         
             $(document).on('change','#state',function(){
                  
                    var state_id = $(this).val();
                     $.ajax({
                        type:"post",
                        url:"{{url('fetch-district-list')}}",
                        data:{state_id:state_id,'_token':"{{ csrf_token() }}"},
                        success:function(res){
                         $("#district").html('');
                          $("#district").html(res);
                        }
                     });
             });
       });
</script>

@endsection

