@extends('template')
@section('main')

  

	<link rel="stylesheet" type="text/css" href="{{ asset('public/js/intl-tel-input-13.0.0/build/css/intlTelInput.min.css') }}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
				<link rel="stylesheet" type="text/css" href="{{ asset('public/css/daterangepicker.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/user-front.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/owl.carousel.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/custom-theme.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/main.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/prettyPhoto.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('public/js/intl-tel-input-13.0.0/build/css/intlTelInput.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/lightpick.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/themify-icons.css') }}" />
	
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/prettyPhoto.css">
	<link rel="stylesheet" href="css/lightpick.css">
	<script src="{{ asset('public/w2vjs/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
	<link rel="stylesheet" href="css/main.css">
	
	
<style>

    .dashboard-card{
        /*box-shadow:none !important;*/
        border-color:#7CB342;
        border-radius:10px;
        overflow:hidden;
        background: #7cb342;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px !important;
    }
    .dashboard-2row-card{
        box-shadow:none !important;
        border-color:#7CB342;
        border-radius:10px;
        overflow:hidden;
    }
    ..at-section .x-nav ul li:hover .link-text{
        color:#fff !important;
    }
    .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-3 .selected-flag {
    width: 65px;
    height: 45px !important;
    font-size: 13px;
    padding:5px;
}
.prfle-inp input{
    border:1px solid #7cb342;
}
.prfle-inp select{
    border:1px solid #7cb342;
}

</style>
  
    <div class="at-section margin-top-85 ">
            <div class="container-fluid prf-pd">
                <div class="row">
                   @include('users.customers.customer_sidebar')
                    <div class="col-lg-8 m-top">
                        <div class="at-section-content">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <div class="modal fade" id="Updatemodal" tabindex="-1" aria-labelledby="Updatemodal" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="sc-modal">
            <div class="popup-img">
                    <img src="http://web.way2village.in/public/front/images/logos/1709097876_logo.jpg" />
                    
                </div>
            <div class="w-100 d-flex justify-content-center align-items-center border-top pt-5">
                <h5 style="font-size:20px;">Profile Details Updated Successfully</h5>
            </div>
            <div class="w-100 d-flex justify-content-center align-items-center">
                <button class="terms-modal-btn" data-bs-dismiss="modal">
                   <i class="fa-solid fa-check"></i>
                </button>
            </div>
        </div>
     
    </div>
  </div>
                                    <h4 class="section-content-tittel mb-5 text-center lne" >Update Profile</h4>
                                    <form  method='post' action="{{ url('customer-profile') }}" onsubmit="return ageValidate();" enctype="multipart/form-data" >
                                        
                                        {{ csrf_field() }}
                                        
                                         <input type="hidden" name="default_country" id="default_country" value="{{ Auth::user()->default_country }}" >
                                        <input type="hidden" name="carrier_code" id="carrier_code" value="{{ Auth::user()->carrier_code }}">
                                        <input type="hidden" name="formatted_phone" id="formatted_phone" value="{{ Auth::user()->formatted_phone }}">
                                       
                                        <div class="row d-flex justify-content-center align-items-center">
                                            <div class="col-lg-10 col-md-12 ">
                                                <div class="form-group mb-3 prfle-inp">
                                                    <label>First Name <span style="color: red;">*</span></label>
                                                    <input type="text" class="form-control" value="{{$profile->first_name}}"name="first_name" placeholder="Your first name">
                                                     @if ($errors->has('first_name')) <p class="error-tag">{{ $errors->first('first_name') }}</p> @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-md-12 mt-3">
                                                <div class="form-group mb-3 prfle-inp">
                                                    <label>Last Name <span style="color: red;">*</span></label>
                                                    <input type="text" class="form-control" value="{{$profile->last_name}}" name="last_name" placeholder="Your last name">
                                                     @if ($errors->has('last_name')) <p class="error-tag">{{ $errors->first('last_name') }}</p> @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-md-12 mt-3">
                                                <div class="form-group mb-3 prfle-inp">
                                                    <label>Email <span style="color: red;">*</span></label>
                                                    <input type="email" class="form-control" name="email" value="{{$profile->email}}" placeholder="Your email address">
                                                    @if ($errors->has('email')) <p class="error-tag">{{ $errors->first('email') }}</p> @endif
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-10 col-md-12 mt-3">
                                                <div class="form-group mb-3 prfle-inp">
                                                    <label>Select Gender <span style="color: red;">*</span></label>
                                                    <div class="at-select">
                                                        <select name="gender">
                                                            <option value="">Select Gender</option>
                                                            <option value="male" @if($profile->gender=="male") selected @endif>Male</option>
                                                            <option value="female" @if($profile->gender=="female") selected @endif>Female</option>
                                                            <option value="other" @if($profile->gender=="other") selected @endif>Other</option>
                                                          
                                                        </select>
                                                        @if ($errors->has('gender')) <p class="error-tag">{{ $errors->first('gender') }}</p> @endif
                                                    </div>
                                                </div>
                                            </div>
                                       
                                            <div class="col-lg-10 col-md-12 mt-3">
                                                <div class="form-group mb-3 prfle-inp">
                                                    <label>Select Country <span style="color: red;">*</span></label>
                                                    <div class="at-select">
                                                        <select>
                                                            @forelse($countries as $country)
                                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                                            @empty
                                                            
                                                            @endforelse
                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-md-12 mt-3">
                                                <div class="form-group mb-3 prfle-inp">
                                                    <label>Address<span style="color: red;">*</span></label>
                                                    <input type="text" class="form-control" name="address" placeholder="address" value="{{$profile->address}}" >
                                                     @if ($errors->has('address')) <p class="error-tag">{{ $errors->first('address') }}</p> @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-md-12 mt-3">
                                                <div class="form-group mb-3 prfle-inp">
                                                    <label>Select State <span style="color: red;">*</span></label>
                                                    <div class="at-select">
                                                        <select  name="state" id="state">
                                                           @foreach( $states as $state)
                                                           <option value="{{$state->id}}" @if($profile->state_id==$state->id) selected @endif>{{$state->name}}</option>
                                                         @endforeach
                                                        </select>
                                                         @if ($errors->has('state')) <p class="error-tag">{{ $errors->first('state') }}</p> @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-md-12 mt-3">
                                                <div class="form-group mb-3 prfle-inp">
                                                    <label>City <span style="color: red;">*</span></label>
                                                    <input type="text" class="form-control" placeholder="Your city" name="location" value="{{$profile->location}}">
                                                     @if ($errors->has('location')) <p class="error-tag">{{ $errors->first('location') }}</p> @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-10 mt-3">
                                                <div class="form-group mt-3 prfle-inp" >
                                                   <label for="user_phone" style="color:#fff; font-size:13px; font-weight:600;"> {{ __('Phone') }}<span class="text-danger">*</span> </label>
                                                   <input type="tel" style="border-radius:4px !important;" class="form-control profile-inp text-16" value="{{ $profile->formatted_phone }}" id="phone" name="phone">
                                               
                                                </div>
                                                <div class="d-flex justify-content-center w-100">
                                                    <span id="phone-error" class="text-danger"></span>
                                              <span id="tel-error" class="text-danger"></span> 
                                                @if ($errors->has('phone')) <p class="error-tag">{{ $errors->first('phone') }}</p> @endif
                                                </div>
                                             
                                            </div>
                                           
                                            
                                        </div>
                                        <div class="row w-100 d-flex justify-content-center align-items-center p-3">
                                             <div class="card upload-card mb-3  w-100 col-lg-10 col-md-12 " style="border:1px solid #ccc !important;">
                                            <div class="card-body d-flex w-100" style="padding:10px !important;">
                                                <div class="row w-100">
                                                    <div class="col-lg-7 d-flex justify-content-center align-items-center">
                                                        <div class="upload-wrap mb-3 w-100">
                                                    <div class="file-wrap w-100 justify-content-between " style="flex-wrap:wrap; gap:10px;" >
                                                        <input type="file" class="d-none"  name="photos" id="fileUpload" />
                                                        <button type="button" class="btn btn-main-2 m-0 wdth" style="border-radius:4px;" onclick="openFileUpload()">Select File</button>
                                                        <div class="status jc-center">
                                                            <span>Upload profile photo</span>
                                                        </div>
                                                        <script>
                                                            function openFileUpload() {
                                                                // Trigger the click event on the file input
                                                                document.getElementById('fileUpload').click();
                                                            }
                                                        </script>
                                                    </div>
                                                    <!--<div class="status">-->
                                                    <!--    <span>Uploading...</span>-->
                                                    <!--</div>-->
                                                </div>
                                                    </div>
                                                    <div class="col-lg-5  d-flex justify-content-center align-items-center">
                                                         <div class="Upload-perview">
                                                    <img src="{{asset('public/images/profile/'.$profile->profile_image)}}" alt="" />
                                                </div>
                                                    </div>
                                                </div>
                                                
                                               
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row d-flex justify-content-center align-items-center">
                                            
                                                <button type="submit" class="w2v-lgn-btn wdth">Update</button>
                                           
                                        </div>
                                    </form>
                                   
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
 @php
if (Session::has('checkPopData')) {
@endphp
    <script>
        $(document).ready(function() {
            
            $('#Updatemodal').modal('show');
             setTimeout(function() {
                window.location.href = "{{url('/')}}";
            }, 2000);
             
        });
    </script>
@php
}
@endphp

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


   
