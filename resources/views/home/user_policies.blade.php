@extends('template')

@push('meta_data')
<title>{{$user_policies->heading}}</title>
 <meta property="og:url"                content="{{ isset($shareLink) ? $shareLink : url('/') }}" />
		<meta property="og:type"               content="article" />
		<meta property="og:title"              content="{{$user_policies->meta_title}}" />
		<meta property="og:description"        content="{{$user_policies->meta_description}}" />
		<meta property="og:image"              content="{{ (isset($property_id) && !empty($property_id && isset($property_photos[0]->photo) )) ? url('public/images/property/' . $property_id . '/' . $property_photos[0]->photo) : getBanner() }}" />   
@endpush
@push('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/daterangepicker.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/user-front.min.css') }}" />
	<style>
	.at-term h6{
	    font-size:20px !important;
	    font-weight:600 !important;
	    margin:30px 0px;
	    color:#8c8c8c;
	}
	.at-term h5{}
	.at-term h1{
	    color:#7CB342 !important;
	    margin:20px 0;
	    font-weight:600 !important;
	    text-align:center;
	    
	}
	    .at-term strong{
    font-size:20px !important;
    font-weight:600 !important;
    color:#7CB342;
}
	    .at-term strong span{
    font-size:20px !important;
    font-weight:600 !important;
    color:#222 !important;
}
.at-term p{
    font-size:13px;
    font-weight:400;
    color:#ccccc;
    line-height:36px;
}
	</style>
    
@endpush

@section('main')
	<input type="hidden" id="front_date_format_type" value="{{ Session::get('front_date_format_type') }}">
            <div class="header-cover"></div>
        <!-- Header End -->
        <div class="at-tittel_banner " style="background-image:linear-gradient(0deg, rgba(34,34,34,0.4823179271708683) 0%, rgba(34,34,34,0.4599089635854342) 100%), url('http://web.way2village.in/public/images/cms/banner/{{$user_policies->image}}');">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>{{$user_policies->heading}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="at-term">
            <div class="container">
                <div class="row">
                
                    <div class="col-md-12 user-policies">
                        
                         {!!$user_policies->content!!}
                
                    </div>
                </div>
            </div>
        </div>

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


