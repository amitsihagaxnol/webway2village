<!--================ Header Menu Area start =================-->
<?php
    $lang = Session::get('language');
?>
<style>
.search-top{
    font-size:14px;
    color:#fff !important;
    height:35px !important;
}
    .search-top::placeholder{
        color:#fff !important;
        
    }
    .search-top:focus{
        outline:unset !important;
    }
    .search-icon i{
        color:#fff;
    }
    .nav-menu{
        height:40px !important;
    }
.owl-stage-outer{
    overflow:hidden !important;
}
.navbar-toggler{
    background:#fff !important;
    color:#7cb342 !important;
    width:30px;
    height:28px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    padding:2px;
    border-radius:3px !important;
}
.navbar-toggler i{
    font-size:18px;
    color:#7cb342 !important;
} 

</style>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="{{ asset('public/css/custom-theme.css') }}" />
<input type="hidden" id="front_date_format_type" value="{{ Session::get('front_date_format_type') }}">
<header class="header_area  animated fadeIn">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light p-3">
            <div class="container-fluid container-fluid-90 py-3">
                <a class="navbar-brand logo_h" aria-label="logo" style="width:130px; height:50px;" href="{{ url('/') }}">{!! getLogo('img-130x32') !!}</a>
				<!-- Trigger Button -->
				<a href="#" aria-label="navbar" class="navbar-toggler" data-toggle="modal" data-target="#left_modal">
				    
					<i class="fa-solid fa-bars"></i>
                </a>

                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <div class="nav navbar-nav menu_nav justify-content-around">
                        <div class="at-leftarea at-centerarea d-flex align-items-center">
                            <div class="" style="border-bottom:1px solid #fff; display:flex; align-items:center; justify-content:center;">
                                <div class="search-icon" >
                                    <i class="fas fa-search" style="font-size:16px; margin-top:5px;"></i>
                                </div>
                                <input class="form-control search-top" type="serch" placeholder="Search" style="background:transparent; border:none;"/>
                            </div>
                        </div>
                        <!--<div class="collapse navbar-collapse at-navigation" id="navbarNav">-->
                                    <ul class="navbar-nav d-flex justify-content-center align-items-center " >
                                        <li class="nav-item nav-menu" >
                                            <a href="./hots_deals.html">Hots Deals</a>
                                        </li>
                                      
                                        <li class="nav-item nav-menu">
                                            <a href="{{url('/farm_house')}}">Farm House</a>
                                        </li>
                                        {{-- <li class="nav-item nav-menu">
                                            <a href="{{url('/village_farm_house')}}">Village Farm House</a>
                                        </li> --}}
                                        <li class="nav-item nav-menu">
                                            <a href="{{url('/activity')}}">Activities</a>
                                        </li>
                                        
                                       
                                    </ul>
                                <!--</div>-->
                            <!--@if (Request::segment(1) != 'help')-->
                            <!--    <div class="nav-item">-->
                            <!--        <a class="nav-link p-2" href="{{ url('property/create') }}" aria-label="property-create">-->
                            <!--            <button class="btn vbtn-outline-success text-14 font-weight-700 p-0 mt-2 pl-4 pr-4">-->
                            <!--                <p class="p-3 mb-0">  {{ __('List your Space') }}</p>-->
                            <!--            </button>-->

                            <!--        </a>-->
                            <!--    </div>-->
                            <!--@endif-->

                        @if (!Auth::check())
                           {{-- <div class="nav-item">
                                <a class=" strip-left" id="button-77" href="{{ url('signup') }}" aria-label="signup">{{ __('Sign Up') }}</a>
                            </div>--}}
                            <div class="nav-item">
                                <a class="" id="button-77" href="{{ url('main-login') }}" aria-label="login">{{ __('Log In') }}</a>
                            </div>
                        @else
                            <div class="d-flex justify-content-center align-items-center " >
                                <div class="">
                                    <div class="nav-item mr-0 user-profile-img">
                                    <img src="{{asset('public/images/profile/'.Auth::user()->profile_image)}}"  alt="{{ Auth::user()->first_name }}">
                                </div>
                                </div>
                                
                                <div class="d-flex justify-content-center align-items-center">
                                <div class="nav-item ml-0 pl-0" style=" margin-left:15px; ">
                                    <div class="dropdown">
                                        
                                        @if(Auth::user()->role=="customer")
                                        
                                            <a href="javascript:void(0)" style=" margin-left:8px;" class="nav-link  text-15 " id="adminusernme"  type="button"   aria-label="user-profile" aria-haspopup="true" aria-expanded="false">
                                                {{ Auth::user()->first_name }} 
                                            </a>
                                      
                                        <span  ><span style="color:#fff; cursor:pointer; margin-left:3px" id="logoutmodalstep" class="fas fa-sign-out-alt"></span></span>
                                         @else
                                         <a href="javascript:void(0)" class="nav-link dropdown-toggle text-15 " id="adminusernme"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-label="user-profile" aria-haspopup="true" aria-expanded="false">
                                                {{ Auth::user()->first_name }} 
                                            </a>
                                      
                                          <span  ><span style="color:#fff; cursor:pointer;" class="fas fa-sign-out-alt"></span></span>
                                         @endif
                                        
                                        <div class="dropdown-menu drop-down-menu-left p-0 drop-width text-14" aria-labelledby="dropdownMenuButton">
                                            <a class="vbg-default-hover border-0  font-weight-700 list-group-item vbg-default-hover border-0" href="{{ url('dashboard') }}" aria-label="dashboard">{{ __('Dashboard') }}</a>
                                            <a class="font-weight-700 list-group-item vbg-default-hover border-0 " href="{{ url('users/profile') }}" aria-label="profile">{{ __('Profile') }}</a>
                                            <a class="font-weight-700 list-group-item vbg-default-hover border-0 " href="{{ url('logout') }}" aria-label="logout">{{ __('Logout') }}</a>
                                        </div>
                                       
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!--<div class="d-flex justify-content-center align-items-center">-->
                            <!--     <a class="" id="button-77" href="/" >Back to website</a>-->
                            <!--</div>-->
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>





            <!--Logout Popup-->
            
            
            
<!--<div class="modal fade" id="logoutmodal" tabindex="-1" aria-labelledby="logoutmodal" aria-hidden="true">-->
<!--  <div class="modal-dialog modal-dialog-centered">-->
<!--      <div class="sc-modal">-->
<!--          <div class="w-100 d-flex justify-content-center align-items-center">-->
<!--              <h5 style="font-size:20px; text-transform:unset;">Do you want to logout ?</h5>-->
<!--          </div>-->
<!--          <div class="w-100 d-flex justify-content-between align-items-center mt-5">-->
<!--              <button class="logout-modal-btn" data-bs-dismiss="modal">-->
<!--                 No-->
<!--              </button>-->
<!--              <button class="logout-modal-btn" data-bs-dismiss="modal" style="background:red; color:#fff;">-->
<!--                 Yes-->
<!--              </button>-->
<!--          </div>-->
<!--      </div>-->
   
<!--  </div>-->
<!--</div>-->

            













<!-- Modal Window -->
<div class="modal left fade" id="left_modal" tabindex="-1" role="dialog" aria-labelledby="left_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0 secondary-bg">
                @if (Auth::check())
                    <div class="row justify-content-center">
                        <div>
                            <img src="{{ Auth::user()->profile_src }}" class="head_avatar" alt="{{ Auth::user()->first_name }}">
                        </div>

                        <div>
                            <p  class="text-white mt-4"> {{ Auth::user()->first_name }}</p>
                        </div>
                    </div>
                @endif

                <button type="button" class="close text-28" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
			</div>

            <div class="modal-body">
                <ul class="mobile-side">
                    @if (Auth::check())
                        <li><a href="{{ url('dashboard') }}"><i class="fa fa-tachometer-alt mr-3"></i>{{ __('Dashboard') }}</a></li>
                        <li><a href="{{ url('inbox') }}" class="d-flex justify-content-between align-items-center"><div><i class="fas fa-inbox mr-3"></i>{{ __('Inbox') }}</div>
                        @php
							$count = getInboxUnreadCount();
						@endphp
						@if ($count)
                            <span class="badge badge-danger rounded-circle mr-2 text-12">{{ $count }}</span>
						@endif
                        </a></li>
                        <li><a href="{{ url('properties') }}"><i class="far fa-list-alt mr-3"></i>{{ __('Listings') }}</a></li>
                        <li><a href="{{ url('my-bookings') }}"><i class="fa fa-bookmark mr-3"></i>{{ __('Bookings') }}</a></li>
                        <li><a href="{{ url('trips/active') }}"><i class="fa fa-suitcase mr-3"></i> {{ __('Your Trips') }}</a></li>
                        <li><a href="{{ url('user/favourite') }}"><i class="fas fa-heart mr-3"></i> {{ __('Favourite') }}</a></li>
                        <li><a href="{{ url('users/payout-list') }}"><i class="far fa-credit-card mr-3"></i> {{ __('Payouts') }}</a></li>
                        <li><a href="{{ url('users/transaction-history') }}"><i class="fas fa-money-check-alt mr-3 text-14"></i> {{ __('Transactions') }}</a></li>
                        <li><a href="{{ url('users/profile') }}"><i class="far fa-user-circle mr-3"></i>{{ __('Profile') }}</a></li>
                        <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <li><i class="fas fa-user-edit mr-3"></i>{{ __('Reviews') }}</li>
                        </a>

                        <div class="collapse" id="collapseExample">
                            <ul class="ml-4">
                                <li><a href="{{ url('users/reviews') }}" class="text-14">{{ __('Review About You') }}</a></li>
                                <li><a href="{{ url('users/reviews_by_you') }}" class="text-14">{{ __('Review By You') }}</a></li>
                            </ul>
                        </div>
                        <li><a href="{{ url('logout') }}"><i class="fas fa-sign-out-alt mr-3"></i>{{ __('Logout') }}</a></li>
                    @else
                        <li><a href="{{ url('signup') }}" id="button-77"><i class="fas fa-stream mr-3"></i>{{ __('Sign Up') }}</a></li>
                        <li><a href="{{ url('login') }}" id="button-77"><i class="far fa-list-alt mr-3"></i>{{ __('Log In') }}</a></li>
                    @endif

                    <!--@if (Request::segment(1) != 'help')-->
                    <!--    <a href="{{ url('property/create') }}">-->
                    <!--        <button class="btn vbtn-outline-success text-14 font-weight-700 pl-5 pr-5 pt-3 pb-3">-->
                    <!--                {{ __('List your Space') }}-->
                    <!--        </button>-->
                    <!--    </a>-->
                    <!--@endif-->
                </ul>
            </div>
        </div>
    </div>
</div>


<!--================Header Menu Area =================-->


<div class="modal fade" id="logoutmodal" tabindex="-1" aria-labelledby="logoutmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-transparent ">
            <div class="sc-modal" style="border-radius:5px;">
                <div class="popup-img">
                    <img src="http://web.way2village.in/public/front/images/logos/1709097876_logo.jpg" />
                    
                </div>
                <div class="modal-body border-top pt-5">
                <h5 class="text-center" style="font-size:20px; text-transform:unset;">Do you want to logout from the Session?</h5>
            </div>
            <div class="w-100 d-flex justify-content-center align-items-center mt-5 " style="gap:10px;">
                <button type="button" class="logout-modal-btn" data-bs-dismiss="modal">No</button>
                <button type="button" class="logout-modal-btn" id="logout-btn" >Yes</button>
            </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('logout-btn').addEventListener('click', function() {
        window.location.href = "{{ url('logout') }}";
    });
</script>
<script src="https://kit.fontawesome.com/111740f521.js" crossorigin="anonymous"></script>







