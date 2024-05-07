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
.dt .owl-dots{
    bottom:-60px !important;
}
</style>
@push('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('public/js/intl-tel-input-13.0.0/build/css/intlTelInput.min.css') }}">
		<!--<link rel="stylesheet" type="text/css" href="{{ asset('public/css/owl.carousel.min.css') }}" />-->
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
@endpush
@section('main')
<br>
<br>
<br>
<div
        class="at-tittel_banner"
        style="
          background-image:linear-gradient(0deg, rgba(0,0,0,0.4459033613445378) 0%, rgba(0,0,0,0.44870448179271705) 100%), url('http://web.way2village.in/public/images/activity/{{$activity->banner_image}}');
          background-position: center;
          background-size: cover;
          height: 400px;
        "
      >
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
            </div>
          </div>
        </div>
      </div>
   <section class="activity-details py-5">
        <div class="container text-center">
          <div class="row">
              <div class="col-lg-8">
                  <div class="col-12  ">
                   
                 <div class="row main-activty-tle">
                  <div class=" col-lg-12 d-flex justify-content-start align-items-center df">
                    <h5 >{{$activity->name}}</h5>
                    
                  </div>
                   <div class=" col-lg-12 ac-details-loc">
                    <ul class="df">
                        <li><i class="fa-solid fa-location-dot"></i></li>
                        <li>Kerala,</li>
                        <li>Idukki,</li>
                        <li>Devikulam</li>
                    </ul>
                    
                </div>
                 
                </div>
              </div>
              <div class="col-12 mt-2">
                  <div class="row">
                  
                      <div class="col-lg-12 m-top">
                            <div class="bk-desc w-100 h-100 d-flex justify-content-start align-items-end flex-column">
                                <div class="w-100 d-flex justify-content-start align-items-center">
                    <a href="#package">
                      <button class="activity-btn" role="button">
                        Tariff Details
                      </button></a
                    >
                  </div>
                 
                  <p class="act-desc mt-4 text-left">
                   {{$activity->description}}
                   
                </p>
                 
                 
             </div>
                      </div>
                          <div class="col-lg-12  mt-5 d-flex justify-content-center align-items-center" >
                           <div  style="height:304px; width:100%;">
                               <div class="Listings_card ">
                <div class="card">
                  <div class="thumbnail dt">
                    <div class="thumbnail_slider" style="height: 100%">
                        
                    @forelse($activity['activity_images'] as $a_image)                        
                      <!--<a href="#" style="height: 100%">-->
                        <div class="item" style="height: 100%">
                          <div
                            class="list_img"
                            style="
                              background-image: url('http://web.way2village.in/public/images/activity/{{$a_image->image}}');  background-position: center; background-size: cover;  background-repeat: no-repeat;
                              height: 304px;
                              width: 100%;
                            "
                          ></div>
                        </div>
                      <!--</a>-->
                      @empty
                         
                     @endforelse
                    </div>
                  </div>
                </div>
              </div>
                           </div>
                      </div>
                  </div>
              </div>
              
              <div class="col-12 mt-5 ">
                  
                  <div class="row">
                      <div class="col-lg-12">
                            <div class="activites-details-desc bk-desc">
           
               
                
               
                <p style="margin:30px 0; font-weight:500; color:#222; letter-spacing:0.5px; " class="text-left">Rules and Regulations </p>
                <div class="activity-rules text-left">
                    
                     {{$activity->rules_and_regulations}}
                  <!--   <ul>-->
                  <!--  <li>-->
                  <!--    Dress in colours that blend with the natural environment.-->
                  <!--  </li>-->
                  <!--  <li>-->
                  <!--    Keep a reasonable distance from wild animals, and do not-->
                  <!--    provoke them.-->
                  <!--  </li>-->
                  <!--  <li>-->
                  <!--    When in a vehicle, remember wild animals have right of-->
                  <!--    way.-->
                  <!--  </li>-->
                  <!--  <li>-->
                  <!--    Do not take away flora and fauna in the form of cuttings,-->
                  <!--    seeds or roots.-->
                  <!--  </li>-->
                  <!--  <li>Obey the instructions of staff and guides.</li>-->
                  <!--</ul>-->
                </div>
              </div>
                      </div>
                <!--      <div class="col-lg-5 d-flex justify-content-center align-items-center m-top">-->
                <!--  <div id="outer">-->
                <!--    <iframe width="560" height="315" src="{{linkConverter($activity->promo_video)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
                <!--</div>-->

                <!--      </div>-->
                  </div>
                  
              </div>
             
              </div>
              <div class="col-lg-4">
                  <div class="reserv-bx" style="height:unset;">
                      
                    <div class="row ">
                      <div class="col-12  d-flex justify-content-start align-items-center flex-column " style="background:#7cb342; border-radius:10px; padding:5px !important;" >
                          
                       <div class="Package-bx">
                              <h5>PLAN YOUR TRIP</h5>
                        
                          <form style="width: 100%; " class="mt-5">
                            
                              <div class="row">
                               
                                    <div class="row">
                                           <div class="col-6 mt-3 d-flex flex-column" style="padding-right:3px !important">
                                    <label for="numberofadults" class="form-label m-0" style="font-size: 12px; text-align:left;">No of Adults</label>
                                    <input type="number" class="form-control ar-hde" id="numberofadults" placeholder="" required>
                                    
                                  </div>
                      
                                  <div class="col-6 mt-3 d-flex flex-column" style="padding-left:3px !important;">
                                    <label for="numberofkids" class="form-label m-0" style="font-size: 12px;  text-align:left;" >No of Kids</label>
                                    <input type="number" class="form-control ar-hde" id="numberofkids" placeholder="" required>
                                    
                                  </div>
                                  <div class="col-12 mt-3 d-flex flex-column">
                                    <label for="seniorcitizen" class="form-label m-0" style="font-size: 12px;  text-align:left;">Senior Citizen</label>
                                    <input type="number" class="form-control ar-hde" id="seniorcitizen" placeholder="" required>
                                    
                                  </div>
                                  <div class="col-12 mt-3 d-flex justify-content-center align-items-center">
                                  <div class=" d-flex justify-content-end align-items-center">
                                    <button type="button" class="Package-bx-btn">Book Your Tickets</button>
                                   </div>
                                </div>
                                        
                                    </div>
                               
                                
                                
                               
                              </div>
                           
                            
                            
                          </form>
                       
                          
                        
                     
                      </div>
                      
                      
                    </div>
                  </div>
                  <div class="row mt-5">
                      <div class="col-12" style="padding:0;">
                          <div id="outer">
                    <iframe width="560" height="315" src="{{linkConverter($activity->promo_video)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                      </div>
                      
                  </div>
                  
                  </div>
                 
              </div>
              
              
            
          </div>
        </div>
      </section>

      <section class="Activity-details-form-section" id="package">
        <div class="container text-center">
          <!--<h3 style="color: #7cb342; font-size: 30px; margin-bottom: 30px; margin-top:30px;">Package Details</h3>-->
          <div class="row mt-4">
           
            <div class="col-12 d-flex justify-content-center align-items-center">
                <h3 style="color: #7cb342; font-size: 25px; letter-spacing:0.7px; ">Tariff Details</h3>
            </div>
            <div class="col-12 pd">
                 
              <div class="package-table " >
                    <table class="table table-striped " style="margin:0; border-top-left-radius:15px; border-top-right-radius:15px; overflow:hidden;">
                    <tr style="">
                        <th s></th>
                        <th class="package-table-title">Entity</th>
                        <th>Price</th>
                        <th >Duration in Hrs</th>
                    </tr>
                    @php
                         $i=1;
                    @endphp
                    @forelse($activity['activity_products'] as $product)
                    
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$product->item_name}}</td>
                        <td><span>INR </span> {{$product->amount}}</td>
                        <td>{{$product->duration}} Day</td>
                    </tr>
                    @php
                      $i++;
                    @endphp
                    @empty
                      <tr>
                           <td>No Record</td>
                      </tr>
                    
                    @endforelse
                    
                    
                    
                </table>
              </div>
                
            </div>
            <!--<div class="col-12 mt-4" >-->
              
            <!--    <div class="container text-center pb-5 pd">-->
            <!--        <div class="row ">-->
            <!--          <div class="col-12 p-4 d-flex justify-content-start align-items-center flex-column " style="background:#7cb342; border-radius:10px;" >-->
                          
            <!--           <div class="Package-bx">-->
            <!--                  <h5>PLAN YOUR TRIP</h5>-->
                        
            <!--              <form style="width: 100%; " class="mt-5">-->
            <!--                <div class="container text-center">-->
            <!--                  <div class="row">-->
            <!--                    <div class="col-lg-8 ">-->
            <!--                        <div class="row">-->
            <!--                               <div class="col-lg-4 mt-3">-->
            <!--                        <label for="numberofadults" class="form-label m-0" style="font-size: 12px;">No of Adults</label>-->
            <!--                        <input type="number" class="form-control ar-hde" id="numberofadults" placeholder="" required>-->
                                    
            <!--                      </div>-->
                      
            <!--                      <div class="col-lg-4 mt-3">-->
            <!--                        <label for="numberofkids" class="form-label m-0" style="font-size: 12px;">No of Kids</label>-->
            <!--                        <input type="number" class="form-control ar-hde" id="numberofkids" placeholder="" required>-->
                                    
            <!--                      </div>-->
            <!--                      <div class="col-lg-4 mt-3">-->
            <!--                        <label for="seniorcitizen" class="form-label m-0" style="font-size: 12px;">Senior Citizen</label>-->
            <!--                        <input type="number" class="form-control ar-hde" id="seniorcitizen" placeholder="" required>-->
                                    
            <!--                      </div>-->
                                        
            <!--                        </div>-->
                               
            <!--                    </div>-->
            <!--                    <div class="col-lg-4 mt-3 d-flex justify-content-center align-items-center">-->
            <!--                      <div class=" d-flex justify-content-end align-items-center">-->
            <!--                        <button type="button" class="Package-bx-btn">Book Your Tickets</button>-->
            <!--                       </div>-->
            <!--                    </div>-->
                               
            <!--                  </div>-->
            <!--                </div>-->
                            
                            
            <!--              </form>-->
            <!--           </div>-->
                          
                        
                     
            <!--          </div>-->
                      
                      
            <!--        </div>-->
            <!--      </div>-->
            <!--</div>-->
          </div>
        </div>
      </section>

   
</div>

@endsection

@section('validation_script')
<script type="text/javascript" src="{{ asset('public/js/jquery.validate.min.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="{{ asset('public/js/owl.carousel.min.js') }}"></script>
<script>
        // Dropdown
        document.getElementById('Location').addEventListener('click', function (event) {
            toggleDropdown('dropdownLocation');
            event.stopPropagation();
        });

        document.getElementById('CheckIn').addEventListener('click', function (event) {
            toggleDropdown('dropdownCheckIn');
            event.stopPropagation();
        });

        document.getElementById('Guests').addEventListener('click', function (event) {
            toggleDropdown('dropdownGuests');
            event.stopPropagation();
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function (event) {
            closeAllDropdowns();
        });

        function toggleDropdown(dropdownId) {
            var dropdown = document.getElementById(dropdownId);
            if (dropdown.style.display === 'none' || dropdown.style.display === '') {
                dropdown.style.display = 'block';
            } else {
                dropdown.style.display = 'none';
            }
        }

        function closeAllDropdowns() {
            // Close all dropdowns
            var dropdowns = document.querySelectorAll('.dropdown');
            dropdowns.forEach(function (dropdown) {
                dropdown.style.display = 'none';
            });
        }
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

@endsection

