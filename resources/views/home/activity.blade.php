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

.owl-item{
    width:200px !important;
    display:flex;
    justify-content:center;
    align-items:center;
}
.activity_li{
    width:80px;
}
.acttivity_type{
    width:110px;
    margin-top:10px;
}
.acttivity_type span{
    font-size:14px;
    font-weight:600;;
    
}
.wd{
    width:60px ;
}

@media screen and (max-width:770px){
.act-tpe{
    height:120px;
}
.wd{
    width:40px;
}
.acttivity_type span{
    font-size:12px;
    font-weight:400;;
    
    
}
..owl-dots {
    margin-top:5px !important;
}
.owl-nav {
    z-index:0 !important;
    top: 10%;
    display:none !important;
}
.owl-item{
    width:100px !important;
    
}
.acttivity_type{
  width:unset;  
}

}

</style>
@push('css')
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
	
		<!--<link rel="stylesheet" type="text/css" href="{{ asset('public/css/owl.carousel.min.css') }}" />-->
		
@endpush
@section('main')
<!--<div class="container py-5 margin-top-85 " >-->
    <!--<h2 class="text-center" style="font-weight:600; font-size:30px;">Farm House Owner - <span style="color:#7cb342;">REGISTER</span> Panel</h2>-->
<!--    <div class="d-flex justify-content-center align-items-center mt-5"  style="background:#7cb342; padding: 35px; border-radius:5px;">-->
<!--	  <h1>Activity</h1>-->
<!--    </div>-->
<!--</div>-->
<div class="at-activity " style="margin-top:8rem;">
        <h3 class="text-center">Activities</h3>
        <div class="container mt-5">
          
            <div class="row">
                <div class="col-12 act-tpe">
                    <div class="nav  offers_slider owl-carousel justify-content-between">
                        @if(isset($data['activityTypes']))
                          @foreach($data['activityTypes'] as $type)
                                <div class="item activityType"  data-id="{{$type->id}}">
                                    <a href="javascript:void(0);" style="z-index:0 !important;">
                                        <div class="activity_li " style="opacity: unset; ">
                                            <div class="icon wd" >
                                                <img src="http://web.way2village.in/public/images/activity/{{$type->image}}" alt=""  />
                                            </div>
                                            <div class="acttivity_type">
                                                <span>{{$type->name}}</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        
                        @endif
                        
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
       
       
          <div class="row" id="activityTypeData">
              @if(isset($data['activities']))
               
                  @foreach($data['activities'] as $activity)
                    <div class="col-lg-4 py-1 px-1" data-aos="fade-up">
                         
              <div class="sec-3-img">
                        <img
                          src="http://web.way2village.in/public/images/activity/{{$activity->banner_image}}"
                          alt=""
                        />
                        <div class="overlay text-start p-5">
                          <div class="trek">
                            <h5>{{$activity->name}}</h5>
                            <p class="mt-5">{{$activity->description}}</p>
                          </div>
                          <div class="trek-1 w-100 d-flex justify-content-between align-items-center">
                            <p style="color: #fff;margin: 0; font-weight:500; font-size:17px"><span style="font-weight:600; margin-right:4px; font-size:17px">INR</span>{{$activity->default_price}}</p>
                            <a href="{{route('activity.details',['id'=>base64_encode($activity->id)])}}"><button type="button" class="sec-3-btn">View More</button></a>
                          </div>
                        </div>
                      </div>
         
                      
                    </div>
                @endforeach
             @endif
          
          </div>
        </div>
      </div>

@endsection

@section('validation_script')

<script type="text/javascript" src="{{ asset('public/js/jquery.validate.min.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="{{ asset('public/js/owl.carousel.min.js') }}"></script>
<script>
   $(document).ready(function(){
              $(document).on('click','.activityType',function(){
                 
                 var activity_type_id =   $(this).attr('data-id');
             
                  $.ajax({
                            type: "post",
                            url: "{{ route('type.wise.activity') }}",
                            data: { activity_type_id: activity_type_id, "_token": "{{ csrf_token() }}" },
                            success: function(res) {
                                $("#activityTypeData").html('');
                                $("#activityTypeData").html(res);
                            }
                        })
              }) ;
         });

   
  
</script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script src="{{ asset('public/w2vjs/custom.js') }}"></script>
	<script src="{{ asset('public/w2vjs/vendor/jquery-library.js') }}"></script>
	<script src="{{ asset('public/w2vjs/vendor/bootstrap.min.js') }}"></script>
	<script src="{{ asset('public/w2vjs/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('public/w2vjs/moment.min.js') }}"></script>
	<script src="{{ asset('public/w2vjs/fullcalendar.min.js') }}"></script>
	<script src="{{ asset('public/w2vjs/prettyPhoto.js') }}"></script>
	<script src="{{ asset('public/w2vjs/readmore.js') }}"></script>
	<script src="{{ asset('public/w2vjs/tipso.js') }}"></script>
	<script src="{{ asset('public/w2vjs/main-min.js') }}"></script>
	<script src="{{ asset('public/w2vjs/lightpick.js') }}"></script>
 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

@endsection

