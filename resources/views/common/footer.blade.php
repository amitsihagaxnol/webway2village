{{--Footer Section Start --}}
<!--<footer class="main-panel card border footer-bg p-4" id="footer">-->
<footer class="at-footer px-1" id="footer">
    <!--<div class="container-fluid container-fluid-90">-->
    <!--    <div class="row">-->
    <!--        <div class="col-6 col-sm-3 mt-4">-->
    <!--            <h2 class="font-weight-700">{{ __('Hosting') }}</h2>-->
    <!--            <div class="row">-->
    <!--                <div class="col p-0">-->
    <!--                    <ul class="mt-1">-->
    <!--                        @if (isset($footer_first))-->
    <!--                            @foreach ($footer_first as $ff)-->
    <!--                            <li class="pt-3 text-16">-->
    <!--                                <a href="{{ url($ff->url) }}">{{ $ff->name }}</a>-->
    <!--                            </li>-->

    <!--                            @endforeach-->
    <!--                        @endif-->
    <!--                    </ul>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->

    <!--        <div class="col-6 col-sm-3 mt-4">-->
    <!--            <h2 class="font-weight-700">{{ __('Company') }}</h2>-->
    <!--            <div class="row">-->
    <!--                <div class="col p-0">-->
    <!--                    <ul class="mt-1">-->
    <!--                        @if (isset($footer_second))-->
    <!--                            @foreach ($footer_second as $fs)-->
    <!--                            <li class="pt-3 text-16">-->
    <!--                                <a href="{{ url($fs->url) }}">{{ $fs->name }}</a>-->
    <!--                            </li>-->
    <!--                            @endforeach-->
    <!--                        @endif-->
    <!--                    </ul>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->

    <!--        <div class="col-6 col-sm-3 mt-4">-->
    <!--             @if (!top_destinations()->isEmpty())-->
    <!--                <h2 class="font-weight-700">{{ __('Top Destination') }}</h2>-->
    <!--                <div class="row">-->
    <!--                    <div class="col p-0">-->
    <!--                        <ul class="mt-1">-->
    <!--                                @foreach (top_destinations() as $pc)-->
    <!--                                    <li class="pt-3 text-16">-->
    <!--                                        <a href="{{ url('search?location=' .  $pc->name . '&checkin=' . date('d-m-Y') . '&checkout=' . date('d-m-Y') . '&guest=1">') }}">{{ $pc->name }}</a>-->
    <!--                                    </li>-->
    <!--                                @endforeach-->
    <!--                        </ul>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            @endif-->
    <!--        </div>-->


    <!--        <div class="col-6 col-sm-3 mt-5">-->
    <!--            <div class="row mt-5">-->
    <!--                <div class="col-md-12 text-center">-->
    <!--                    <a href="{{ url('/') }}">{!! getLogo('img-130x32') !!}</a>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="col-md-12">-->
    <!--                <div class="social mt-4">-->
    <!--                    <ul class="list-inline text-center">-->
    <!--                        @if (isset($join_us))-->
    <!--                            @for ($i=0; $i<count($join_us); $i++)-->
    <!--                                @if ($join_us[$i]->value <> '#')-->
    <!--                                    <li class="list-inline-item">-->
    <!--                                        <a class="social-icon  text-color text-18" target="_blank" href="{{ $join_us[$i]->value }}" aria-label="{{ $join_us[$i]->name }}"><i class="fab fa-{{ str_replace('_','-',$join_us[$i]->name) }}"></i></a>-->
    <!--                                    </li>-->
    <!--                                @endif-->
    <!--                            @endfor-->
    <!--                        @endif-->
    <!--                    </ul>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="row mt-3">-->
    <!--                <div class="col-md-12">-->
    <!--                    <p class="text-center text-underline">-->
    <!--                        <a href="#" aria-label="modalLanguge" data-toggle="modal" data-target="#languageModalCenter"> <i class="fa fa-globe"></i> {{ Session::get('language_name')  ?? $default_language->name }} </a>-->
    <!--                        <a href="#" aria-label="modalCurrency" data-toggle="modal" data-target="#currencyModalCenter"> <span class="ml-4">{!! Session::get('symbol')  !!} - <u>{{ Session::get('currency')  }}</u> </span></a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--    </div>-->
    <!--</div>-->

	<!--<div class=" p-0 ">-->
	<!--	<div class="row  justify-content-between p-2">-->
			<!--<p class="col-lg-12 col-sm-12 mb-0 mt-4 text-14 text-center">-->
			<!--© 2017-{{ date('Y') }} {{ siteName() }}. {{ __('All Rights Reserved') }}</p>-->
	<!--		<p class="col-lg-12 col-sm-12 mb-0  text-14 text-center " style="font-size:13px;">-->
	<!--		© Copyright 2024 by <a href="#" style="color:#7cb342; font-weight:600;">@way2village.com</a></p>-->
	<!--	</div>-->
	<!--</div>-->
	<div class="container py-0 px-2">
          <div class="row">
              <div class="col-lg-3">
                  <div class="footer-logo-bx center">
                      <div class="footer-logo center">
                          <img src="http://web.way2village.in/public/front/images/logos/1709097876_logo.jpg" />
                      </div>
                      <p >Transform your upcoming journey into a seamless experience with way2village.</p>
                      <a href="" class=" ftr-logo-btn"><span style="margin-right:5px;"><i class="fa-solid fa-square-up-right"></i></span>Start planing now</a>
                      
                  </div>
                  
                  
              </div>
            <div class="col-lg-2 col-md-4 m-top">
              <div class="footer_main_nav center">
                <h5>Itineraries</h5>
                <ul class="nav flex-column my-5">
                  <!--<li class="nav-item">-->
                  <!--  <a class="nav-link" href="#">Help Center</a>-->
                  <!--</li>-->
                 
                  <!--<li class="nav-item">-->
                  <!--  <a class="nav-link" href="{{url('/disclaimer')}}">Disclaimer</a>-->
                  <!--</li>-->
                  <li class="nav-item">
                    <a class="nav-link" href="#">Farm Houses </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Properties</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Cabs</a>
                  </li>
                  
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-4  m-top">
              <div class="footer_main_nav center">
                <h5>Policy</h5>
                <ul class="nav flex-column my-5">
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/user_policies')}}"
                      >User Policies</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/payment_policies')}}"
                      >Payment Policies</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/refund')}}"
                      >Refund and Cancellations</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/help')}}">Help Center</a>
                  </li>
                 
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/disclaimer')}}">Disclaimer</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-2 col-md-4  m-top">
              <div class="footer_main_nav center">
                <h5>Featured</h5>
                <ul class="nav flex-column my-5">
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/about')}}">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Properties</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/contact')}}">Contact Us</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-2">
                 <div class="footer_main_nav">
                <h5 class="ft-shrt-title">Social</h5>
                <ul class="d-flex my-5 justify-content-around align-items-center">
                     <li class="">
                        <a class=" social-icnz" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                     </li>
                     <li class="">
                        <a class=" social-icnz" href="#"><i class="fa-brands fa-twitter"></i></a>
                     </li>
                     <li class="">
                        <a class=" social-icnz" href="#"><i class="fa-brands fa-instagram"></i></a>
                     </li>
                    
                </ul>
                
              </div>
                
            </div>
            <div class="col-12">
              <div class="top_copyright">
                  <div class="row w-100 column-reverse" >
                      <div class="col-lg-6 m-top-2 order-lg-1 order-md-2 d-flex justify-content-center align-items-center">
                          <div class="copy_right">
                  <p class="mb-0" style="font-weight:600; font-size:13px">
                    © Copyright 2023 by
                    <a href="#" style="font-weight:600; font-size:13px">Way2village.com</a>
                  </p>
                </div>
                      </div>
                      <div class="col-lg-6 order-lg-2 order-md-1 d-flex justify-content-center align-items-center">
                           <div class="copy_right_nav">
                  <ul class="nav">
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('/privacy')}}">
                        <div class="icon">
                          <span class="fas fa-circle"></span>
                        </div>
                        Privacy
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('/terms')}}">
                        <div class="icon">
                          <span class="fas fa-circle"></span>
                        </div>
                          Terms
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        <div class="icon">
                          <span class="fas fa-circle"></span>
                        </div>
                        Sitemap
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        <div class="icon">
                          <span class="fas fa-circle"></span>
                        </div>
                        Company details
                      </a>
                    </li>
                  </ul>
                </div>
                      </div>
                      
                  </div>
                
               
              </div>
            </div>
          </div>
        </div>
</footer>


<div class="row">
    {{--Language Modal --}}
    <div class="modal fade mt-5 z-index-high" id="languageModalCenter" tabindex="-1" role="dialog" aria-labelledby="languageModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="w-100 pt-3">
                        <h5 class="modal-title text-20 text-center font-weight-700" id="languageModalLongTitle">{{ __('Choose Your Language') }}</h5>
                    </div>

                    <div>
                        <button type="button" class="close text-28 mr-2 filter-cancel" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>

                <div class="modal-body pb-5">
                    <div class="row">
                        @foreach ($language as $key => $value)
							<div class="col-md-6 mt-4">
								<a href="javascript:void(0)" class="language_footer {{ (Session::get('language') == $key) ? 'text-success' : '' }}" data-lang="{{ $key }}">{{ $value }}</a>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

    {{--Currency Modal --}}
    <div class="modal fade mt-5 z-index-high" id="currencyModalCenter" tabindex="-1" role="dialog" aria-labelledby="languageModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<div class="w-100 pt-3">
						<h5 class="modal-title text-20 text-center font-weight-700" id="languageModalLongTitle">{{ __('Choose a Currency') }}</h5>
					</div>

					<div>
						<button type="button" class="close text-28 mr-2 filter-cancel font-weight-500" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>

				<div class="modal-body pb-5">
					<div class="row">
						@foreach ($currencies as $key => $value)
						<div class="col-6 col-sm-3 p-3">
							<div class="currency pl-3 pr-3 text-16 {{ (Session::get('currency') == $value->code) ? 'border border-success rounded-5 currency-active' : '' }}">
								<a href="javascript:void(0)" class="currency_footer " data-curr="{{ $value->code }}">
									<p class="m-0 mt-2  text-16">{{ $value->name }}</p>
									<p class="m-0 text-muted text-16">{{ $value->code }} - {!! $value->org_symbol !!} </p>
								</a>
							</div>
						</div>
						@endforeach

					</div>
				</div>
			</div>
        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/111740f521.js" crossorigin="anonymous"></script>
