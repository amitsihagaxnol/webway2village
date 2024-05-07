@extends('template')
<style>
.n-hvr{
   color:#fff !important;
   margin-left:10px;
}
    .n-hvr:hover{
        color:#fff !important;
    }
    
    

</style>

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
@section('main')

  <section class="login-section  margin-top-85" >

        <div class="container py-5">
            <div class="row p-0">
                <div class="col-lg-6 px-5 bdr-right pd" >
                    <div class="w2v-login-bx">
                        <h2>Way2village <span class="lg-span">login</span></h2>
                    
                       <div class="w2v-lgn-btn-dsc">
                        <p>
                            Enhance your travel experience by login as a customer gaining access to exclusive features and personalized
                            recommendations
                        </p>
                    
                        <a href="{{ url('customer-login') }}" class="w2v-lgn-btn"> Login as Customer</a>
                       </div>
                       <div class="w2v-lgn-btn-dsc">
                        <p>
                           Collaborate with local tourism boards and organization to create networking oppertunities for vendors and increase visibility within the industry 
                        </p>
                    
                        <a href="{{ url('login') }}" class="w2v-lgn-btn"> Login as Farm House  Owner</a>
                       </div>
                    
                    </div>
                   
                    

                </div>
                <div class="col-lg-6 px-5 m-top pd" >
                    <div class="w2v-login-bx">
                        <h2> <span class="lg-span">Register</span> With us</h2>
                    
                       <div class="w2v-lgn-btn-dsc">
                        <p>
                           <span style="font-size: 20px !important; color: #7CB342;">"</span>Join our portal to access exclusive travel and tour packages<span style="font-size: 20px !important; color: #7CB342;">"</span>
                        </p>
                    
                        <a href="{{ url('customer-signup') }}" class="w2v-lgn-btn"> Register as Customer</a>
                       </div>
                       <div class="w2v-lgn-btn-dsc">
                        <p>
                            <span style="font-size: 20px !important; color: #7CB342;">"</span>  Access a wide network of potential partners customers by becoming a member of your Travel Portal <span style="font-size: 20px !important; color: #7CB342;">"</span>
                        </p>
                    
                        <a href="{{ url('signup') }}" class="w2v-lgn-btn"> Register as Farm House Owner</a>
                       </div>
                    
                    </div>
                </div>
            </div>
        </div>

    </section>

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
