@extends('template')

@push('meta_data')
<title>Help</title>
 <meta property="og:url"                content="{{ isset($shareLink) ? $shareLink : url('/') }}" />
		<meta property="og:type"               content="article" />
		<meta property="og:title"              content="help" />
		<meta property="og:description"        content="help" />
		<meta property="og:image"              content="{{ (isset($property_id) && !empty($property_id && isset($property_photos[0]->photo) )) ? url('public/images/property/' . $property_id . '/' . $property_photos[0]->photo) : getBanner() }}" />   
@endpush
@push('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/daterangepicker.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/user-front.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/custom-theme.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/main.css') }}" />
    
@endpush

@section('main')
	<input type="hidden" id="front_date_format_type" value="{{ Session::get('front_date_format_type') }}">
            <div class="header-cover"></div>
        <!-- Header End -->
        <div class="at-tittel_banner " style="background-image:linear-gradient(0deg, rgba(34,34,34,0.4823179271708683) 0%, rgba(34,34,34,0.4599089635854342) 100%), url('http://web.way2village.in/public/front/images/banners/banner_1.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>Help</h2>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="at-term at-cms">-->
        <!--    <div class="container pt-5">-->
        <!--        <div class="row">-->
                
        <!--            <div class="col-md-12">-->
                        
                         
      
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
         <div class="at-term at-cms">
            <div class="container pt-5">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="accordion_tab">
                            <ul id="accordionTabList">
                                <li class="active">
                                    <button class="btn">General</button>
                                </li>
                                <li>
                                    <button class="btn">Booking</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12" id="main">
                        <div class="modal-form" id="AccordionTab01">
                            <div class="accordion mb-3" id="faq">
                                <div class="card">
                                    <div class="card-header" id="faqhead1">
                                        <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq1"
                                            aria-expanded="true" aria-controls="faq1">Question 01</a>
                                    </div>
        
                                    <div id="faq1" class="collapse show" aria-labelledby="faqhead1" data-parent="#faq">
                                        <div class="card-body">
                                            Aliquam erat volutpat. Integer euismod auctor erat sed tristique. Phasellus at
                                            risus vitae turpis tincidunt tristique a a neque. Mauris efficitur dignissim
                                            aliquet. Aliquam aliquet diam sed ex pharetra, et vestibulum mauris dignissim.
                                            Suspendisse maximus congue sapien. In non velit diam. Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit. Vivamus et felis eget lorem elementum
                                            interdum. Pellentesque habitant morbi tristique senectus et netus et malesuada
                                            fames ac turpis egestas. Curabitur interdum lorem pretium egestas condimentum.
                                            Mauris ornare arcu at fringilla fermentum. Nulla venenatis ac ex et gravida.
                                            Morbi id tortor eu nisl elementum volutpat. Interdum et malesuada fames ac ante
                                            ipsum primis in faucibus.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqhead2">
                                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse"
                                            data-target="#faq2" aria-expanded="true" aria-controls="faq2">Question 02</a>
                                    </div>
        
                                    <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">
                                        <div class="card-body">
                                            Aliquam erat volutpat. Integer euismod auctor erat sed tristique. Phasellus at
                                            risus vitae turpis tincidunt tristique a a neque. Mauris efficitur dignissim
                                            aliquet. Aliquam aliquet diam sed ex pharetra, et vestibulum mauris dignissim.
                                            Suspendisse maximus congue sapien. In non velit diam. Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit. Vivamus et felis eget lorem elementum
                                            interdum. Pellentesque habitant morbi tristique senectus et netus et malesuada
                                            fames ac turpis egestas. Curabitur interdum lorem pretium egestas condimentum.
                                            Mauris ornare arcu at fringilla fermentum. Nulla venenatis ac ex et gravida.
                                            Morbi id tortor eu nisl elementum volutpat. Interdum et malesuada fames ac ante
                                            ipsum primis in faucibus.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqhead3">
                                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse"
                                            data-target="#faq3" aria-expanded="true" aria-controls="faq3">Question 03</a>
                                    </div>
        
                                    <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                                        <div class="card-body">
                                            Aliquam erat volutpat. Integer euismod auctor erat sed tristique. Phasellus at
                                            risus vitae turpis tincidunt tristique a a neque. Mauris efficitur dignissim
                                            aliquet. Aliquam aliquet diam sed ex pharetra, et vestibulum mauris dignissim.
                                            Suspendisse maximus congue sapien. In non velit diam. Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit. Vivamus et felis eget lorem elementum
                                            interdum. Pellentesque habitant morbi tristique senectus et netus et malesuada
                                            fames ac turpis egestas. Curabitur interdum lorem pretium egestas condimentum.
                                            Mauris ornare arcu at fringilla fermentum. Nulla venenatis ac ex et gravida.
                                            Morbi id tortor eu nisl elementum volutpat. Interdum et malesuada fames ac ante
                                            ipsum primis in faucibus.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqhead4">
                                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse"
                                            data-target="#faq4" aria-expanded="true" aria-controls="faq4">Question 04</a>
                                    </div>
        
                                    <div id="faq4" class="collapse" aria-labelledby="faqhead4" data-parent="#faq">
                                        <div class="card-body">
                                            Aliquam erat volutpat. Integer euismod auctor erat sed tristique. Phasellus at
                                            risus vitae turpis tincidunt tristique a a neque. Mauris efficitur dignissim
                                            aliquet. Aliquam aliquet diam sed ex pharetra, et vestibulum mauris dignissim.
                                            Suspendisse maximus congue sapien. In non velit diam. Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit. Vivamus et felis eget lorem elementum
                                            interdum. Pellentesque habitant morbi tristique senectus et netus et malesuada
                                            fames ac turpis egestas. Curabitur interdum lorem pretium egestas condimentum.
                                            Mauris ornare arcu at fringilla fermentum. Nulla venenatis ac ex et gravida.
                                            Morbi id tortor eu nisl elementum volutpat. Interdum et malesuada fames ac ante
                                            ipsum primis in faucibus.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqhead5">
                                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse"
                                            data-target="#faq5" aria-expanded="true" aria-controls="faq5">Question 05</a>
                                    </div>
        
                                    <div id="faq5" class="collapse" aria-labelledby="faqhead5" data-parent="#faq">
                                        <div class="card-body">
                                            Aliquam erat volutpat. Integer euismod auctor erat sed tristique. Phasellus at
                                            risus vitae turpis tincidunt tristique a a neque. Mauris efficitur dignissim
                                            aliquet. Aliquam aliquet diam sed ex pharetra, et vestibulum mauris dignissim.
                                            Suspendisse maximus congue sapien. In non velit diam. Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit. Vivamus et felis eget lorem elementum
                                            interdum. Pellentesque habitant morbi tristique senectus et netus et malesuada
                                            fames ac turpis egestas. Curabitur interdum lorem pretium egestas condimentum.
                                            Mauris ornare arcu at fringilla fermentum. Nulla venenatis ac ex et gravida.
                                            Morbi id tortor eu nisl elementum volutpat. Interdum et malesuada fames ac ante
                                            ipsum primis in faucibus.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqhead6">
                                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse"
                                            data-target="#faq6" aria-expanded="true" aria-controls="faq6">Question 06</a>
                                    </div>
        
                                    <div id="faq6" class="collapse" aria-labelledby="faqhead6" data-parent="#faq">
                                        <div class="card-body">
                                            Aliquam erat volutpat. Integer euismod auctor erat sed tristique. Phasellus at
                                            risus vitae turpis tincidunt tristique a a neque. Mauris efficitur dignissim
                                            aliquet. Aliquam aliquet diam sed ex pharetra, et vestibulum mauris dignissim.
                                            Suspendisse maximus congue sapien. In non velit diam. Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit. Vivamus et felis eget lorem elementum
                                            interdum. Pellentesque habitant morbi tristique senectus et netus et malesuada
                                            fames ac turpis egestas. Curabitur interdum lorem pretium egestas condimentum.
                                            Mauris ornare arcu at fringilla fermentum. Nulla venenatis ac ex et gravida.
                                            Morbi id tortor eu nisl elementum volutpat. Interdum et malesuada fames ac ante
                                            ipsum primis in faucibus.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqhead7">
                                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse"
                                            data-target="#faq7" aria-expanded="true" aria-controls="faq7">Question 07</a>
                                    </div>
        
                                    <div id="faq7" class="collapse" aria-labelledby="faqhead7" data-parent="#faq">
                                        <div class="card-body">
                                            Aliquam erat volutpat. Integer euismod auctor erat sed tristique. Phasellus at
                                            risus vitae turpis tincidunt tristique a a neque. Mauris efficitur dignissim
                                            aliquet. Aliquam aliquet diam sed ex pharetra, et vestibulum mauris dignissim.
                                            Suspendisse maximus congue sapien. In non velit diam. Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit. Vivamus et felis eget lorem elementum
                                            interdum. Pellentesque habitant morbi tristique senectus et netus et malesuada
                                            fames ac turpis egestas. Curabitur interdum lorem pretium egestas condimentum.
                                            Mauris ornare arcu at fringilla fermentum. Nulla venenatis ac ex et gravida.
                                            Morbi id tortor eu nisl elementum volutpat. Interdum et malesuada fames ac ante
                                            ipsum primis in faucibus.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqhead8">
                                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse"
                                            data-target="#faq8" aria-expanded="true" aria-controls="faq8">Question 08</a>
                                    </div>
        
                                    <div id="faq8" class="collapse" aria-labelledby="faqhead8" data-parent="#faq">
                                        <div class="card-body">
                                            Aliquam erat volutpat. Integer euismod auctor erat sed tristique. Phasellus at
                                            risus vitae turpis tincidunt tristique a a neque. Mauris efficitur dignissim
                                            aliquet. Aliquam aliquet diam sed ex pharetra, et vestibulum mauris dignissim.
                                            Suspendisse maximus congue sapien. In non velit diam. Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit. Vivamus et felis eget lorem elementum
                                            interdum. Pellentesque habitant morbi tristique senectus et netus et malesuada
                                            fames ac turpis egestas. Curabitur interdum lorem pretium egestas condimentum.
                                            Mauris ornare arcu at fringilla fermentum. Nulla venenatis ac ex et gravida.
                                            Morbi id tortor eu nisl elementum volutpat. Interdum et malesuada fames ac ante
                                            ipsum primis in faucibus.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-form" id="AccordionTab02">
                            <div class="accordion mb-3" id="faq">
                                <div class="card">
                                    <div class="card-header" id="faqhead11">
                                        <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq11"
                                            aria-expanded="true" aria-controls="faq11">Question 09</a>
                                    </div>
        
                                    <div id="faq11" class="collapse show" aria-labelledby="faqhead11" data-parent="#faq">
                                        <div class="card-body">
                                            Aliquam erat volutpat. Integer euismod auctor erat sed tristique. Phasellus at
                                            risus vitae turpis tincidunt tristique a a neque. Mauris efficitur dignissim
                                            aliquet. Aliquam aliquet diam sed ex pharetra, et vestibulum mauris dignissim.
                                            Suspendisse maximus congue sapien. In non velit diam. Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit. Vivamus et felis eget lorem elementum
                                            interdum. Pellentesque habitant morbi tristique senectus et netus et malesuada
                                            fames ac turpis egestas. Curabitur interdum lorem pretium egestas condimentum.
                                            Mauris ornare arcu at fringilla fermentum. Nulla venenatis ac ex et gravida.
                                            Morbi id tortor eu nisl elementum volutpat. Interdum et malesuada fames ac ante
                                            ipsum primis in faucibus.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqhead12">
                                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse"
                                            data-target="#faq12" aria-expanded="true" aria-controls="faq12">Question 10</a>
                                    </div>
        
                                    <div id="faq12" class="collapse" aria-labelledby="faqhead12" data-parent="#faq">
                                        <div class="card-body">
                                            Aliquam erat volutpat. Integer euismod auctor erat sed tristique. Phasellus at
                                            risus vitae turpis tincidunt tristique a a neque. Mauris efficitur dignissim
                                            aliquet. Aliquam aliquet diam sed ex pharetra, et vestibulum mauris dignissim.
                                            Suspendisse maximus congue sapien. In non velit diam. Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit. Vivamus et felis eget lorem elementum
                                            interdum. Pellentesque habitant morbi tristique senectus et netus et malesuada
                                            fames ac turpis egestas. Curabitur interdum lorem pretium egestas condimentum.
                                            Mauris ornare arcu at fringilla fermentum. Nulla venenatis ac ex et gravida.
                                            Morbi id tortor eu nisl elementum volutpat. Interdum et malesuada fames ac ante
                                            ipsum primis in faucibus.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqhead13">
                                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse"
                                            data-target="#faq13" aria-expanded="true" aria-controls="faq13">Question 11</a>
                                    </div>
        
                                    <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                                        <div class="card-body">
                                            Aliquam erat volutpat. Integer euismod auctor erat sed tristique. Phasellus at
                                            risus vitae turpis tincidunt tristique a a neque. Mauris efficitur dignissim
                                            aliquet. Aliquam aliquet diam sed ex pharetra, et vestibulum mauris dignissim.
                                            Suspendisse maximus congue sapien. In non velit diam. Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit. Vivamus et felis eget lorem elementum
                                            interdum. Pellentesque habitant morbi tristique senectus et netus et malesuada
                                            fames ac turpis egestas. Curabitur interdum lorem pretium egestas condimentum.
                                            Mauris ornare arcu at fringilla fermentum. Nulla venenatis ac ex et gravida.
                                            Morbi id tortor eu nisl elementum volutpat. Interdum et malesuada fames ac ante
                                            ipsum primis in faucibus.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqhead14">
                                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse"
                                            data-target="#faq14" aria-expanded="true" aria-controls="faq14">Question 12</a>
                                    </div>
        
                                    <div id="faq14" class="collapse" aria-labelledby="faqhead14" data-parent="#faq">
                                        <div class="card-body">
                                            Aliquam erat volutpat. Integer euismod auctor erat sed tristique. Phasellus at
                                            risus vitae turpis tincidunt tristique a a neque. Mauris efficitur dignissim
                                            aliquet. Aliquam aliquet diam sed ex pharetra, et vestibulum mauris dignissim.
                                            Suspendisse maximus congue sapien. In non velit diam. Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit. Vivamus et felis eget lorem elementum
                                            interdum. Pellentesque habitant morbi tristique senectus et netus et malesuada
                                            fames ac turpis egestas. Curabitur interdum lorem pretium egestas condimentum.
                                            Mauris ornare arcu at fringilla fermentum. Nulla venenatis ac ex et gravida.
                                            Morbi id tortor eu nisl elementum volutpat. Interdum et malesuada fames ac ante
                                            ipsum primis in faucibus.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqhead15">
                                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse"
                                            data-target="#faq15" aria-expanded="true" aria-controls="faq15">Question 13</a>
                                    </div>
        
                                    <div id="faq15" class="collapse" aria-labelledby="faqhead15" data-parent="#faq">
                                        <div class="card-body">
                                            Aliquam erat volutpat. Integer euismod auctor erat sed tristique. Phasellus at
                                            risus vitae turpis tincidunt tristique a a neque. Mauris efficitur dignissim
                                            aliquet. Aliquam aliquet diam sed ex pharetra, et vestibulum mauris dignissim.
                                            Suspendisse maximus congue sapien. In non velit diam. Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit. Vivamus et felis eget lorem elementum
                                            interdum. Pellentesque habitant morbi tristique senectus et netus et malesuada
                                            fames ac turpis egestas. Curabitur interdum lorem pretium egestas condimentum.
                                            Mauris ornare arcu at fringilla fermentum. Nulla venenatis ac ex et gravida.
                                            Morbi id tortor eu nisl elementum volutpat. Interdum et malesuada fames ac ante
                                            ipsum primis in faucibus.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqhead16">
                                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse"
                                            data-target="#faq16" aria-expanded="true" aria-controls="faq16">Question 14</a>
                                    </div>
        
                                    <div id="faq16" class="collapse" aria-labelledby="faqhead16" data-parent="#faq">
                                        <div class="card-body">
                                            Aliquam erat volutpat. Integer euismod auctor erat sed tristique. Phasellus at
                                            risus vitae turpis tincidunt tristique a a neque. Mauris efficitur dignissim
                                            aliquet. Aliquam aliquet diam sed ex pharetra, et vestibulum mauris dignissim.
                                            Suspendisse maximus congue sapien. In non velit diam. Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit. Vivamus et felis eget lorem elementum
                                            interdum. Pellentesque habitant morbi tristique senectus et netus et malesuada
                                            fames ac turpis egestas. Curabitur interdum lorem pretium egestas condimentum.
                                            Mauris ornare arcu at fringilla fermentum. Nulla venenatis ac ex et gravida.
                                            Morbi id tortor eu nisl elementum volutpat. Interdum et malesuada fames ac ante
                                            ipsum primis in faucibus.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqhead17">
                                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse"
                                            data-target="#faq17" aria-expanded="true" aria-controls="faq17">Question 15</a>
                                    </div>
        
                                    <div id="faq17" class="collapse" aria-labelledby="faqhead17" data-parent="#faq">
                                        <div class="card-body">
                                            Aliquam erat volutpat. Integer euismod auctor erat sed tristique. Phasellus at
                                            risus vitae turpis tincidunt tristique a a neque. Mauris efficitur dignissim
                                            aliquet. Aliquam aliquet diam sed ex pharetra, et vestibulum mauris dignissim.
                                            Suspendisse maximus congue sapien. In non velit diam. Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit. Vivamus et felis eget lorem elementum
                                            interdum. Pellentesque habitant morbi tristique senectus et netus et malesuada
                                            fames ac turpis egestas. Curabitur interdum lorem pretium egestas condimentum.
                                            Mauris ornare arcu at fringilla fermentum. Nulla venenatis ac ex et gravida.
                                            Morbi id tortor eu nisl elementum volutpat. Interdum et malesuada fames ac ante
                                            ipsum primis in faucibus.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqhead18">
                                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse"
                                            data-target="#faq18" aria-expanded="true" aria-controls="faq18">Question 16</a>
                                    </div>
        
                                    <div id="faq18" class="collapse" aria-labelledby="faqhead18" data-parent="#faq">
                                        <div class="card-body">
                                            Aliquam erat volutpat. Integer euismod auctor erat sed tristique. Phasellus at
                                            risus vitae turpis tincidunt tristique a a neque. Mauris efficitur dignissim
                                            aliquet. Aliquam aliquet diam sed ex pharetra, et vestibulum mauris dignissim.
                                            Suspendisse maximus congue sapien. In non velit diam. Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit. Vivamus et felis eget lorem elementum
                                            interdum. Pellentesque habitant morbi tristique senectus et netus et malesuada
                                            fames ac turpis egestas. Curabitur interdum lorem pretium egestas condimentum.
                                            Mauris ornare arcu at fringilla fermentum. Nulla venenatis ac ex et gravida.
                                            Morbi id tortor eu nisl elementum volutpat. Interdum et malesuada fames ac ante
                                            ipsum primis in faucibus.
                                        </div>
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
	<script type="text/javascript" src='https://maps.google.com/maps/api/js?key={{ config("vrent.google_map_key") }}&libraries=places'></script>
	<script type="text/javascript" src="{{ asset('public/js/moment.min.js') }}"></script>
	<script src="{{ asset('public/js/sweetalert.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/js/daterangepicker.min.js') }}"></script>
	<!--<script type="text/javascript" src="{{ asset('public/js/custom.js') }}"></script>-->
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


