@extends('template')
@push('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('public/js/intl-tel-input-13.0.0/build/css/intlTelInput.css') }}">
	<style>
	    .profile-inp{
	        font-size:13px !important;
	        /*color :#7cb342 !important;*/
	        border-radius:10px !important;
	        /*border: 1px solid #7cb342 !important;*/
	        
	    }
	    .profile-inp::placeholder{
	        font-size:13px;
	        
	    }
	    .select select{
	        /*border:none !important;*/
	        /*border: 1px solid #7cb342 !important;*/
	        height:50px !important;
	    }
.profile-inp input:focus{
  
  outline: none !important;
}
.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-3 .selected-flag {
  
    height: 100% !important;
    background:#f2f2f2;
    font-size:13px;
    color:#222;
}
.file-inp::file-selector-button {
  border:none;
  outline:none;
  background:#f2f2f2;
  color:#222;
  font-size:13px;
  width:100px;
  height:100% !important;
}
	</style>
@endpush

@section('main')
<div class="margin-top-85">
    <div class="row m-0">
        <!-- sidebar start-->
        @include('users.sidebar')
        <!--sidebar end-->
        <div class="col-lg-10 p-0">
            <div class="container-fluid min-height">
                <div class="col-md-12 mt-5">
                    <div class="main-panel">
                        @include('users.profile_nav')

                        <!--Success Message -->
                        @if (Session::has('message'))
                            <div class="row mt-5">
                                <div class="col-md-12  alert {{ Session::get('alert-class') }} alert-dismissable fade in top-message-text opacity-1">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ Session::get('message') }}
                                </div>
                            </div>
                        @endif

                        <div class="row justify-content-center mt-5  mb-5 "  style="border-radius: 15px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    backdrop-filter: blur(7.8px);
    -webkit-backdrop-filter: blur(7.8px);
    border: 2px solid #7cb342;">
                            <div class="col-md-12 p-4" >
                                <form id='profile_update' method='post' action="{{ url('users/profile') }}" onsubmit="return ageValidate();">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <input type="hidden" name="customer_id" id="user_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="default_country" id="default_country" value="{{ Auth::user()->default_country }}" >
                                        <input type="hidden" name="carrier_code" id="carrier_code" value="{{ Auth::user()->carrier_code }}">
                                        <input type="hidden" name="formatted_phone" id="formatted_phone" value="{{ Auth::user()->formatted_phone }}">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group mt-3">
                                                <label for="user_first_name" style="color:#7cb342; font-size:13px; font-weight:600;">{{ __('First Name') }} <span class="text-danger">*</span></label>
                                                <input class='form-control text-16 profile-inp' style="border-radius:4px !important;" type='text' name='first_name' value="{{ $profile->first_name }}" id='first_name' size='30' >
                                                @if ($errors->has('first_name')) <p class="error-tag">{{ $errors->first('first_name') }}</p> @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group mt-3">
                                                <label for="user_last_name" style="color:#7cb342; font-size:13px; font-weight:600;">{{ __('Last Name') }} <span class="text-danger">*</span></label>
                                                <input class='form-control  text-16 profile-inp' style="border-radius:4px !important;" type='text' name='last_name' value="{{ $profile->last_name }}" id='last_name' size='30'>
                                                    @if ($errors->has('last_name')) <p class="error-tag">{{ $errors->first('last_name') }}</p> @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group mt-3">
                                                <label for="user_email" style="color:#7cb342; font-size:13px; font-weight:600;"> {{ __('Email Address') }}
                                                    <span class="text-danger">*</span>
                                                    <i class="icon icon-lock" data-behavior="tooltip" aria-label="Private"></i>
                                                </label>

                                                <input class='form-control profile-inp  text-16' style="border-radius:4px !important;" type='text' name='email' value="{{ $profile->email }}" id='email' size='30'>
                                                    @if ($errors->has('email')) <p class="error-tag">{{ $errors->first('email') }}</p> @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group mt-3">
                                                <label for="user_phone" style="color:#7cb342; font-size:13px; font-weight:600;"> {{ __('Phone') }}<span class="text-danger">*</span> </label>
                                                <input type="tel" style="border-radius:4px !important;" class="form-control profile-inp text-16" value="{{ $profile->formatted_phone }}" id="phone" name="phone">
                                                <span id="phone-error" class="text-danger"></span>
                                                <span id="tel-error" class="text-danger"></span>
                                                @if ($errors->has('phone')) <p class="error-tag">{{ $errors->first('phone') }}</p> @endif
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-md-4">
                                            <div class="form-group mt-3">
                                                <label for="user_state" style="color:#7cb342; font-size:13px; font-weight:600;">State<span class="text-danger">*</span> </label>
                                               <select  class="form-control profile-inp text-16" name="state" id="state" style="border-radius:4px !important;">
                                                   @foreach( $states as $state)
                                                    <option value="{{$state->id}}" @if($profile->state_id==$state->id) selected @endif>{{$state->name}}</option>
                                                  @endforeach
                                                </select>
                                                @if ($errors->has('state')) <p class="error-tag">{{ $errors->first('state') }}</p> @endif
                                            </div>
                                        </div>
                                        
                                          <div class="col-md-4">
                                            <div class="form-group mt-3">
                                                <label for="user_district" style="color:#7cb342; font-size:13px; font-weight:600;">District<span class="text-danger">*</span> </label>
                                                <select class="form-control profile-inp text-16" name="district" id="district" style="border-radius:4px !important;">
                                                   @foreach(  $districts as $district)
                                                        <option value="{{$district->id}}" @if($profile->district_id==$district->id) selected @endif>{{$district->name}}</option>
                                                    @endforeach
                                     
                                     
                                                </select>
                                                @if ($errors->has('district')) <p class="error-tag">{{ $errors->first('district') }}</p> @endif
                                            </div>
                                        </div>
                                        
                                         <div class="col-md-4">
                                            <div class="form-group mt-3">
                                                <label for="user_location" style="color:#7cb342; font-size:13px; font-weight:600;">Location<span class="text-danger">*</span></label>
                                                <input class='form-control  text-16 profile-inp' type='text' name='location' value="{{ $profile->location }}" id='location' style="border-radius:4px !important;">
                                                    @if ($errors->has('location')) <p class="error-tag">{{ $errors->first('location') }}</p> @endif
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group mt-3">
                                                <label for="use_password" style="color:#7cb342; font-size:13px; font-weight:600;">Password</label>
                                                <input class='form-control  text-16 profile-inp' type='text' name='password'  id='password'  style="border-radius:4px !important;">
                                                   
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group mt-3">
                                                <label for="user_profile_pic" style="color:#7cb342; font-size:13px; font-weight:600;">Profile Pic</label>
                                                <input class='form-control  text-16 profile-inp file-inp' type='file' name='profile_pic'  id='profile_pic' style="border-radius:4px !important; padding:0!important;" >
                                                   
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group mt-3">
                                                <label for="user_district" style="color:#7cb342; font-size:13px; font-weight:600;" >Account Verification Status<span class="text-danger">*</span> </label>
                                                <select class="form-control profile-inp text-16" style="border-radius:4px !important;">
                                                     <option value="{{$profile->account_verification_status}}">{{$profile->account_verification_status}}</option>
                                                </select>
                                              
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="form-group mt-3">
                                                <label for="user_district" style="color:#7cb342; font-size:13px; font-weight:600;" >Status<span class="text-danger">*</span> </label>
                                                <select class="form-control profile-inp text-16"  style="border-radius:4px !important;">
                                                     <option value="{{$profile->status}}">{{$profile->status}}</option>
                                                </select>
                                              
                                            </div>
                                        </div>
                                    {{--
                                        @php
                                            $gender = isset($details['gender']) ? $details['gender'] : '';   
                                        @endphp
                                        <div class="col-md-6 select">
                                            <div class="form-group mt-3 select">
                                                <label for="user_gender" style="color:#7cb342; font-size:13px; font-weight:600;"> {{ __('I Am') }} <i class="icon icon-lock icon-ebisu" data-behavior="tooltip" aria-label="Private"></i> </label>
                                                <div class="select" style="border-radius:4px !important;">
                                                    <select class='form-control  text-16' name='details[gender]'>
                                                        <option value=''>{{ __('Gender') }}</option>
                                                        <option value='Male' {{ $gender == 'Male' ? 'selected' : '' }}>{{ __('Male') }}</option>
                                                        <option value='Female' {{ $gender == 'Female' ? 'selected' : '' }}>{{ __('Female') }}</option>
                                                        <option value='Other' {{ $gender == 'Other' ? 'selected' : '' }}>{{ __('Other') }}</option>
                                                    </select>
                                                </div>
                                                @if ($errors->has('gender')) <p class="error-tag">{{ $errors->first('gender') }}</p> @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mt-3" >
                                                <label for="user_live" style="color:#7cb342; font-size:13px; font-weight:600;">   {{ __('Where You Live') }}
                                                </label>
                                                <input class='form-control profile-inp  text-16' style="border-radius:4px !important;" type='text' name='details[live]' value="{{ (isset($details['live']) && !empty($details['live'])) ? $details['live'] : '' }}" id='live' size='30' placeholder='e.g. Paris, FR / Brooklyn, NY / Chicago, IL'>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group mb-0 mt-3">
                                                <label for="user_birthdate" style="color:#7cb342; font-size:13px; font-weight:600;">
                                                    {{ __('Birth Date') }}
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="row">
                                                    <div class="select col-sm-4 p-0 mt-4">
                                                        <select name='birthday_month' class='form-control  text-14' id='user_birthday_month' style="border-radius:4px !important;">
                                                        <option value=''>{{ __('Month') }}</option>
                                                        @for ($m=1; $m<=12; ++$m)
                                                            <option value="{{ $m }}" {{ $m == ($date_of_birth[1] ?? '') ? 'selected' : '' }}>{{ date('F', mktime(0, 0, 0, $m, 1)) }}</option>
                                                        @endfor
                                                        </select>
                                                    </div>

                                                    <div class="select col-sm-4 pr-0 mt-4">
                                                        <select name='birthday_day' class='form-control  text-14' id='user_birthday_day' style="border-radius:4px !important;">
                                                        <option value=''>{{ __('Day') }}</option>
                                                        @for ($m=1; $m<=31; ++$m)
                                                            <option value="{{ $m }}" {{ $m == ($date_of_birth[2] ?? '') ? 'selected' : '' }}>{{ $m }}</option>
                                                        @endfor
                                                        </select>
                                                    </div>

                                                    <div class="select col-sm-4 pr-0 mt-4">
                                                        <select name='birthday_year' class='form-control  text-16' id='user_birthday_year' style="border-radius:4px !important;">
                                                        <option value=''>{{ __('Year') }}</option>
                                                        @for ($m=date('Y'); $m > date('Y')-100; $m--)
                                                            <option value="{{ $m }}" {{ $m == ($date_of_birth[0] ?? '') ? 'selected' : '' }}>{{ $m }}</option>
                                                        @endfor
                                                        </select>
                                                    </div>
                                                </div>

                                                <span class="text-danger text-13">
                                                    <label id='dobError' class="mb-0"></label>
                                                </span>
                                                @if ( $errors->has('birthday_month') || $errors->has('birthday_day') || $errors->has('birthday_year') ) <p class="error-tag mb-0">{{ $errors->has('birthday_month') ||  $errors->has('birthday_day') || $errors->has('birthday_year') }}</p> @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label  for="user_about" style="color:#7cb342; font-size:13px; font-weight:600;">
                                                    {{ __('Describe Yourself') }}
                                                </label>
                                                <textarea name='details[about]' class='form-control text-15' style="height:150px;" id='user_about' >{{ (isset($details['about']) && !empty($details['about'])) ? $details['about'] : '' }}</textarea>
                                            </div>
                                        </div>--}}

                                        <div class="col-md-12 p-0 mt-5">
                                            <div class="p-4 d-flex justify-content-center">
                                                <button type="submit" class="w2v-lgn-btn w-25" id="save_btn" ><i class="spinner fa fa-spinner fa-spin d-none"></i>
                                                    <span id="save_btn-text">{{ __('Save') }}</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('validation_script')
<script type="text/javascript" src="{{ asset('public/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript"  src="{{ asset('public/js/intl-tel-input-13.0.0/build/js/intlTelInput.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('public/js/isValidPhoneNumber.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    'use strict'
    let fieldRequire = "{{ __('This field is required.') }}";
    let ageGreater = "{{ __('Age must be greater than 18.') }}";
    let email = "{{ __('Please enter a valid email address.') }}";
    let saving = "{{ __('Save') }}..";
    let maxCharacter = "{{ __('Please enter no more than 255 characters.') }}";
    var token = "{{ csrf_token() }}";
    let validInternationalNumber = '{{ __("Please enter a valid International Phone Number.") }}';
    let numberExists = "{{ __('The number has already been taken!') }}";
    let duplicateNumberCheckURL ="{{ url('duplicate-phone-number-check-for-existing-customer') }}"; 
    let page = 'profile';

</script>
<script type="text/javascript" src="{{ asset('public/js/user_profile.min.js') }}" type="text/javascript"></script>

<script>
       $(document).ready(function(){
             $(document).on('change','#state',function(){
                    var state_id = $(this).val();
                     $.ajax({
                        type:"post",
                        url:"{{url('admin/fetch-district-list')}}",
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
   

