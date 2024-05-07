@extends('template')

@push('meta_data')
<title>{{$contact->name}}</title>
 <meta property="og:url"                content="{{ isset($shareLink) ? $shareLink : url('/') }}" />
		<meta property="og:type"               content="article" />
		<meta property="og:title"              content="{{$contact->meta_title}}" />
		<meta property="og:description"        content="{{$contact->meta_description}}" />
		<meta property="og:image"              content="{{ (isset($property_id) && !empty($property_id && isset($property_photos[0]->photo) )) ? url('public/images/property/' . $property_id . '/' . $property_photos[0]->photo) : getBanner() }}" />   
@endpush
@push('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/daterangepicker.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/user-front.min.css') }}" />
	<!--<link rel="stylesheet" type="text/css" href="{{ asset('public/css/custom-theme.css') }}" />-->
    
@endpush

@section('main')
	<input type="hidden" id="front_date_format_type" value="{{ Session::get('front_date_format_type') }}">
            <div class="header-cover"></div>
        <!-- Header End -->
        <div class="at-tittel_banner " style="background-image:linear-gradient(0deg, rgba(34,34,34,0.4823179271708683) 0%, rgba(34,34,34,0.4599089635854342) 100%), url('http://web.way2village.in/public/front/images/banners/banner_1.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>{{$contact->name}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="at-term">-->
            <div class="container pt-5">
                <div class="row">
                
                    <div class="col-md-12">
                        
                        
                            <div class="at-contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; border-radius:20px;">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="contact_tittel text-center mb-4">
                                            <h1>Get in Touch With Us</h1>
                                            <p class="mb-0">We Offer 24 / 7 Support</p>
                                            <div class="tittel-hr"></div>
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label style="font-size:12px; font-weight:600; ">First Name <span style="color: red;">*</span></label>
                                                        <input type="text" class="form-control contact-inp" placeholder="Your first name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label style="font-size:12px; font-weight:600; ">Last Name <span style="color: red;">*</span></label>
                                                        <input type="text" class="form-control contact-inp" placeholder="Your last name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label style="font-size:12px; font-weight:600; ">Email <span style="color: red;">*</span></label>
                                                        <input type="email" class="form-control contact-inp" placeholder="Your email address">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label style="font-size:12px; font-weight:600; ">Subject <span style="color: red;">*</span></label>
                                                        <input type="text" class="form-control contact-inp" placeholder="Your subject">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label style="font-size:12px; font-weight:600; ">Message <span style="color: red;">*</span></label>
                                                        <textarea rows="5" class="form-control " placeholder="Your message" style="height:200px;"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <button type="submit" class="btn btn-main-2">Send Now</button>
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
        <div class="at-address  py-5">
            <div class="address-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; border-radius:20px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="icon">
                                                <img src="	http://web.way2village.in/public/front/images/logos/phone-call.png" alt="" />
                                            </div>
                                            <p class="mb-0">Talk To Us</p>
                                            <h5 class="mb-0">+91 {{$contact->contact_no}}</h5>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="icon">
                                                <img src="	http://web.way2village.in/public/front/images/logos/email.png" alt="" />
                                            </div>
                                            <p class="mb-0">Send Us Email</p>
                                            <h5 class="mb-0">{{$contact->email}}</h5>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="icon">
                                                <img src="	http://web.way2village.in/public/front/images/logos/location.png" alt="" />
                                            </div>
                                            <p class="mb-0">Our open location</p>
                                            <h5 class="mb-0">{{$contact->address}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="map p-0 mt-3" style="height:500px position:relative" >-->
        <!--    <div class="container-fluid p-0 w-100 " >-->
        <!--        <div class="row w-100" style="border:none !important;">-->
        <!--            <div class="col-12 w-100">-->
        <!--                <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15126400.200890439!2d67.52512733553694!3d22.24126257912837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5261efce66bad7%3A0xb8abb9a3c96a92a1!2sway2village!5e0!3m2!1sen!2sin!4v1705304927001!5m2!1sen!2sin" ></iframe>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
                    </div>
                </div>
            </div>
        <!--</div>-->

@stop

@section('validation_script')
	<script type="text/javascript" src='https://maps.google.com/maps/api/js?key={{ config("vrent.google_map_key") }}&libraries=places'></script>
	<script type="text/javascript" src="{{ asset('public/js/moment.min.js') }}"></script>
	<script src="{{ asset('public/js/sweetalert.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/js/daterangepicker.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/js/daterangecustom.js') }}"></script>
    <script type="text/javascript">
        'use strict'
        var success = "{{ __('Success') }}";
        var yes = "{{ __('Yes') }}";
        var no = "{{ __('No') }}";
        var user_id = "{{ Auth::id() }}";
        var token = "{{ csrf_token() }}";
        var add = "{{ __('Add to Favourite List ?') }}";
        var remove = "{{ __('Remove from Favourite List ?') }}";
        var added = "{{ __('Added to favourite list.') }}";
        var removed = "{{ __('Removed from favourite list.') }}";
        var dateFormat = '';
    </script>
    <script src="{{ asset('public/js/front.min.js') }}"></script>
    
@endsection


