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
    .at-section .x-nav ul li:hover .link-text{
        color:#fff !important;
    }
    
.reset-password input{
    border:1px solid #7cb342;
}
.reset-password select{
    border:1px solid #7cb342;
}

</style>
  
    <div class="at-section margin-top-85 " >
            <div class="container-fluid prf-pd">
                <div class="row">
                   @include('users.customers.customer_sidebar')
                    <div class="col-lg-8 m-top">
                        <div class="at-section-content">
                            <div class="card">
                                <div class="card-body">
                                    @if ($errors->has('password_confirmation'))
                                        <div class="alert alert-danger mt-3">
                                            <ul>
                                                <li>{{ $errors->first('password_confirmation') }}</li>
                                            </ul>
                                        </div>
                                    @endif
                                <form class="mb-4" method="post" action="{{ url('customer-password-update') }}">
                                    @csrf
                                    <h4 class="section-content-tittel text-center  lne" style="margin-bottom:40px;">Reset Password</h4>
                                    <div class="row " >
                                        <div class="col-md-3">
                                            <div class="form-group mb-3 reset-password ">
                                                <label >Old Password <span style="color: red;">*</span></label>
                                                <input type="password" name="old_password" class="form-control" placeholder="Your old password">
                                                @error('old_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3 reset-password">
                                                <label>New Password <span style="color: red;">*</span></label>
                                                <input type="password" name="password" class="form-control" placeholder="Your new password">
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3 reset-password">
                                                <label>Retype Password <span style="color: red;">*</span></label>
                                                <input type="password" name="password_confirmation" class="form-control" placeholder="Your retype password">
                                            </div>
                                        </div>
                                        <div class="col-md-3 d-flex justify-content-center align-items-center">
                                            <button type="submit" class="w2v-lgn-btn">Update</button>
                                        </div>
                                    </div>
                                </form>



                                   
                                    <form class="" method="post" action="{{ url('customer-deactivate-account') }}">
                                        @csrf
                                        <h4 class="section-content-tittel  text-center lne" style="margin:60px 0;" >Deactivate Account</h4>
                                        <div class="row  ">
                                            <div class="col-md-4">
                                                <div class="form-group mb-3 reset-password">
                                                    <label>Enter Password <span style="color: red;">*</span></label>
                                                    <input type="text" name="old_pass"  class="form-control" placeholder="Your password">
                                                     @error('old_pass')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
                                          
                                            <div class="col-md-5">
                                                <div class="form-group mb-3 reset-password">
                                                    <label>Select Reason <span style="color: red;">*</span></label>
                                                    <div class="at-select">
                                                        <select name="reason_id" class="form-select">
                                                            <option value="" hidden="">Select Reason</option>
                                                            
                                                            @foreach($accountDeactivations as $account)
                                                              <option value="{{$account->id}}">{{$account->reason}}</option>
                                                            @endforeach
                                                            
                                                        </select>
                                                        
                                                         @error('reason_id')
                                                          <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-3 d-flex justify-content-center align-items-center">
                                                <button type="submit" class="w2v-lgn-btn">Deactive</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="p-5">
                                    <div class="wrn">
                                        <h5 >Deactivation of the account will result in loss of access to the portal</h5>
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


   
