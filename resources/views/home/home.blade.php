@extends('template')
@push('css')
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
	<input type="hidden" id="front_date_format_type" value="{{ Session::get('front_date_format_type') }}">
	<section class="hero-banner magic-ball">
		<div class="main-banner"  style="background-image: url('{{ getBanner() }}');">
			<div class="container">
				<div class="row align-items-center text-center text-md-left">
					<div class="col-md-6 col-lg-5 mb-5 mb-md-0">
						<div class="main_formbg item animated zoomIn mt-80">
							<h1 class="pt-4 ">{{ __('Make Your Reservation') }}</h1>
							<form id="front-search-form" method="post" action="{{ url('search') }}">
								{{ csrf_field() }}
								<div class="row">
									<div class="col-md-12">
										<div class="input-group pt-4">
											<input class="form-control p-3 text-14" id="front-search-field" placeholder="{{ __('Where do you want to go?') }}" autocomplete="off" name="location" type="text" required>
										</div>
									</div>

									<div class="col-md-12 mt-5">
										<div class="d-flex" id="daterange-btn">
											<div class="input-group mr-2 pt-4" >
												<input class="form-control p-3 border-right-0 border text-14 checkinout" name="checkin" id="startDate" type="text" placeholder="{{ __('Check In') }}" autocomplete="off" readonly="readonly" required>
												<span class="input-group-append">
													<div class="input-group-text">
														<i class="fa fa-calendar success-text text-14"></i>
													</div>
												</span>
											</div>

											<div class="input-group ml-2 pt-4">
												<input class="form-control p-3 border-right-0 border text-14 checkinout" name="checkout" id="endDate" placeholder="{{ __('Check Out') }}" type="text" readonly="readonly" required>
												<span class="input-group-append">
													<div class="input-group-text">
													<i class="fa fa-calendar success-text text-14"></i>
													</div>
												</span>
											</div>
										</div>
									</div>

									<div class="col-md-6 mt-5 pt-4">
										<div class="input-group">
											<select id="front-search-guests" class="form-control  text-14">
											<option class="p-4 text-14" value="1">1 {{ __('Guest') }}</option>
											@for ($i=2;$i<=16;$i++)
												<option  class="p-4 text-14" value="{{ $i }}"> {{ ($i == '16') ? $i . '+ '.__('Guest') : $i . ' ' . __('Guests') }} </option>
											@endfor
											</select>
										</div>
									</div>

									<div class="col-md-12 front-search mt-5 pb-3 pt-4">
										<button type="submit" class="btn vbtn-default btn-block p-3 text-16">{{ __('Search') }}</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	@if (!$starting_cities->isEmpty())
	<section class="bg-gray mt-70 pb-2">
		<div class="container-fluid container-fluid-90">
			<div class="row">
				<div class="section-intro text-center">
					<p class="item animated fadeIn text-24 font-weight-700 m-0 text-capitalize">{{ __('Top Destination') }}</p>
					<p class="mt-3">{{ __('Best places where to live in the world and enjoy your trip') }} </p>
				</div>
			</div>

			<div class="row mt-2">
				@foreach ($starting_cities as $city)
				<div class="col-md-4 mt-5">
				<a href="{{ url('search?location=' . $city->name . '&checkin=&checkout=&guest=1') }}">
						<div class="grid item animated zoomIn">
							<figure class="effect-ming">
								<img src="{{ $city->image_url }}" alt="city"/>
									<figcaption>
										<p class="text-18 font-weight-700 position-center">{{ $city->name }}</p>
									</figcaption>
							</figure>
						</div>
					</a>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	@endif

	@if (!$properties->isEmpty())
		<section class="recommandedbg bg-gray mt-4 magic-ball magic-ball-about pb-5">
			<div class="container-fluid container-fluid-90">
				<div class="row">
					<div class="recommandedhead section-intro text-center mt-70">
						<p class="item animated fadeIn text-24 font-weight-700 m-0">{{ __('Recommended Home') }}</p>
						<p class="mt-2">{{ __('Alluring home where you can stay and enjoy a comfortable life.') }}</p>
					</div>
				</div>

				<div class="row mt-5">
					@foreach ($properties as $property)
					<div class="col-md-6 col-lg-4 col-xl-3 pl-3 pr-3 pb-3 mt-4">
						<div class="card h-100 card-shadow card-1">
							<div class="grid">
								<a href="properties/{{ $property->slug }}" aria-label="{{ $property->name }}">
									<figure class="effect-milo">
										<img src="{{ $property->cover_photo }}" class="room-image-container200" alt="{{ $property->name }}"/>
										<figcaption>
										</figcaption>
									</figure>
								</a>
							</div>

							<div class="card-body p-0 pl-1 pr-1">
								<div class="d-flex">
									<div>
										<div class="profile-img pl-2">
											<a href="{{ url('users/show/' . $property->host_id) }}"><img src="{{ $property->users->profile_src }}" alt="{{ $property->name }}" class="img-fluid"></a>
										</div>
									</div>

									<div class="p-2 text">
										<a class="text-color text-color-hover" href="properties/{{ $property->slug }}">
											<p class="text-16 font-weight-700 text"> {{ $property->name }}</p>
										</a>
										<p class="text-13 mt-2 mb-0 text"><i class="fas fa-map-marker-alt"></i> {{ $property->property_address->city }}</p>
									</div>
								</div>

								<div class="review-0 p-3">
									<div class="d-flex justify-content-between">

										<div class="d-flex">
                                            <div class="d-flex align-items-center">
											<span><i class="fa fa-star text-14 secondary-text-color"></i>
												@if ( $property->guest_review)
                                                    {{ $property->avg_rating }}
                                                @else
                                                    0
                                                @endif
                                                ({{ $property->guest_review }})</span>
                                            </div>

                                            <div class="">
                                                @auth
                                                    <a class="btn btn-sm book_mark_change"
                                                       data-status="{{ $property->book_mark }}" data-id="{{ $property->id }}"
                                                       style="color:{{ ($property->book_mark == true) ? '#1dbf73':'' }}; ">
                                                    <span style="font-size: 22px;">
                                                        <i class="fas fa-heart pl-2"></i>
                                                    </span>
                                                    </a>
                                                @endauth
                                            </div>
                                        </div>


										<div>
											<span class="font-weight-700">{!! moneyFormat( $property->property_price->default_symbol, $property->property_price->price) !!}</span> / {{ __('night') }}
										</div>
									</div>
								</div>

								<div class="card-footer text-muted p-0 border-0">
									<div class="d-flex bg-white justify-content-between pl-2 pr-2 pt-2 mb-3">
										<div>
											<ul class="list-inline">
												<li class="list-inline-item  pl-4 pr-4 border rounded-3 mt-2 bg-light text-dark">
														<div class="vtooltip"> <i class="fas fa-user-friends"></i> {{ $property->accommodates }}
														<span class="vtooltiptext text-14">{{ $property->accommodates }} {{ __('Guests') }}</span>
													</div>
												</li>

												<li class="list-inline-item pl-4 pr-4 border rounded-3 mt-2 bg-light">
													<div class="vtooltip"> <i class="fas fa-bed"></i> {{ $property->bedrooms }}
														<span class="vtooltiptext  text-14">{{ $property->bedrooms }} {{ __('Bedrooms') }}</span>
													</div>
												</li>

												<li class="list-inline-item pl-4 pr-4 border rounded-3 mt-2 bg-light">
													<div class="vtooltip"> <i class="fas fa-bath"></i> {{ $property->bathrooms }}
														<span class="vtooltiptext  text-14 p-2">{{ $property->bathrooms }} {{ __('Bathrooms') }}</span>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</section>
	@endif

	@if (!$testimonials->isEmpty())
	<section class="testimonialbg pb-70">
		<div class="testimonials">
			<div class="container">
				<div class="row">
					<div class="recommandedhead section-intro text-center mt-70">
						<p class="animated fadeIn text-24 text-color font-weight-700 m-0">{{ __('Say about Us') }}</p>
						<p class="mt-2">{{ __('People Say The Nicest Things') }}</p>
					</div>
				</div>

				<div class="row mt-5">
					@foreach ($testimonials as $testimonial)
					<?php $i = 0; ?>
						<div class="col-md-4 mt-4">
							<div class="item h-100 card-1">
								<img src="{{ $testimonial->image_url }}" alt="{{ $testimonial->name }}">
								<div class="name">{{ $testimonial->name }}</div>
									<small class="desig">{{ $testimonial->designation }}</small>
									<p class="details">{{ substr($testimonial->description, 0, 200) }} </p>
									<ul>
										@for ($i = 0; $i < 5; $i++)
											@if ($testimonial->review >$i)
												<li><i class="fa fa-star secondary-text-color" aria-hidden="true"></i></li>
											@else
												<li><i class="fa fa-star rating" aria-hidden="true"></i></li>
											@endif
										@endfor
									</ul>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
	@endif
	<div class="header-cover"></div>
		<!-- Header End -->
		<div class="at-homefilter"
			style="background: linear-gradient(180deg, rgba(56, 108, 0, 0.75) 0%, rgba(56, 108, 0, 0.49) 48.91%, rgba(124, 179, 66, 0.00) 100%), url(http://web.way2village.in/public/front/images/bg/bg_01.webp), lightgray 0px -107.604px / 100% 141.176%;">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="card-transparent">
							<div class="inner-card">
								<div class="row align-items-center">
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-4 position-relative">
												<label id="Location">
													<span>Where to?</span>
													<span class="fas fa-chevron-down"></span>
												</label>
												<div class="value_box">
													<b id="LocationBox">Tamil Nadu, India</b>
												</div>
												<!-- dropdownLocation Id is using for css -->
												<div id="dropdownLocation" class="dropdown_filter position-absolute">
													<ul class="nav flex-column">
														<li class="nav-item">
															<span>Tamil Nadu, India</span>
														</li>
														<li class="nav-item">
															<span>Telangana, India</span>
														</li>
														<li class="nav-item">
															<span>Kerala, India</span>
														</li>
														<li class="nav-item">
															<span>Karnataka, India</span>
														</li>
														<li class="nav-item">
															<span>Andhra Pradesh, India</span>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-md-4 position-relative">
												<label id="CheckIn">
													<span>Check in / Check out</span>
													<span class="fas fa-chevron-down"></span>
												</label>
												<div class="value_box">
													<b id="CheckInBox">Choose Dates here</b>
												</div>
												<!-- dropdownCheckIn Id is using for css -->
												<div id="dropdownCheckIn" class="dropdown_filter position-absolute">
													<div class="row">
														<div class="col-6" style="padding-right: 7.5px;">
															<section class="lightpick lightpick--1-columns">
																<div class="lightpick__inner">
																	<div class="lightpick__months">
																		<section class="lightpick__month">
																			<header class="lightpick__month-title-bar">
																				<div class="lightpick__month-title">
																					<select
																						class="lightpick__select lightpick__select-months"
																						dir="rtl">
																						<option value="0"
																							selected="selected">January
																						</option>
																						<option value="1">February
																						</option>
																						<option value="2">March</option>
																						<option value="3">April</option>
																						<option value="4">May</option>
																						<option value="5">June</option>
																						<option value="6">July</option>
																						<option value="7">August
																						</option>
																						<option value="8">September
																						</option>
																						<option value="9">October
																						</option>
																						<option value="10">November
																						</option>
																						<option value="11">December
																						</option>
																					</select><select
																						class="lightpick__select lightpick__select-years">
																						<option value="1900">1900
																						</option>
																						<option value="1901">1901
																						</option>
																						<option value="1902">1902
																						</option>
																						<option value="1903">1903
																						</option>
																						<option value="1904">1904
																						</option>
																						<option value="1905">1905
																						</option>
																						<option value="1906">1906
																						</option>
																						<option value="1907">1907
																						</option>
																						<option value="1908">1908
																						</option>
																						<option value="1909">1909
																						</option>
																						<option value="1910">1910
																						</option>
																						<option value="1911">1911
																						</option>
																						<option value="1912">1912
																						</option>
																						<option value="1913">1913
																						</option>
																						<option value="1914">1914
																						</option>
																						<option value="1915">1915
																						</option>
																						<option value="1916">1916
																						</option>
																						<option value="1917">1917
																						</option>
																						<option value="1918">1918
																						</option>
																						<option value="1919">1919
																						</option>
																						<option value="1920">1920
																						</option>
																						<option value="1921">1921
																						</option>
																						<option value="1922">1922
																						</option>
																						<option value="1923">1923
																						</option>
																						<option value="1924">1924
																						</option>
																						<option value="1925">1925
																						</option>
																						<option value="1926">1926
																						</option>
																						<option value="1927">1927
																						</option>
																						<option value="1928">1928
																						</option>
																						<option value="1929">1929
																						</option>
																						<option value="1930">1930
																						</option>
																						<option value="1931">1931
																						</option>
																						<option value="1932">1932
																						</option>
																						<option value="1933">1933
																						</option>
																						<option value="1934">1934
																						</option>
																						<option value="1935">1935
																						</option>
																						<option value="1936">1936
																						</option>
																						<option value="1937">1937
																						</option>
																						<option value="1938">1938
																						</option>
																						<option value="1939">1939
																						</option>
																						<option value="1940">1940
																						</option>
																						<option value="1941">1941
																						</option>
																						<option value="1942">1942
																						</option>
																						<option value="1943">1943
																						</option>
																						<option value="1944">1944
																						</option>
																						<option value="1945">1945
																						</option>
																						<option value="1946">1946
																						</option>
																						<option value="1947">1947
																						</option>
																						<option value="1948">1948
																						</option>
																						<option value="1949">1949
																						</option>
																						<option value="1950">1950
																						</option>
																						<option value="1951">1951
																						</option>
																						<option value="1952">1952
																						</option>
																						<option value="1953">1953
																						</option>
																						<option value="1954">1954
																						</option>
																						<option value="1955">1955
																						</option>
																						<option value="1956">1956
																						</option>
																						<option value="1957">1957
																						</option>
																						<option value="1958">1958
																						</option>
																						<option value="1959">1959
																						</option>
																						<option value="1960">1960
																						</option>
																						<option value="1961">1961
																						</option>
																						<option value="1962">1962
																						</option>
																						<option value="1963">1963
																						</option>
																						<option value="1964">1964
																						</option>
																						<option value="1965">1965
																						</option>
																						<option value="1966">1966
																						</option>
																						<option value="1967">1967
																						</option>
																						<option value="1968">1968
																						</option>
																						<option value="1969">1969
																						</option>
																						<option value="1970">1970
																						</option>
																						<option value="1971">1971
																						</option>
																						<option value="1972">1972
																						</option>
																						<option value="1973">1973
																						</option>
																						<option value="1974">1974
																						</option>
																						<option value="1975">1975
																						</option>
																						<option value="1976">1976
																						</option>
																						<option value="1977">1977
																						</option>
																						<option value="1978">1978
																						</option>
																						<option value="1979">1979
																						</option>
																						<option value="1980">1980
																						</option>
																						<option value="1981">1981
																						</option>
																						<option value="1982">1982
																						</option>
																						<option value="1983">1983
																						</option>
																						<option value="1984">1984
																						</option>
																						<option value="1985">1985
																						</option>
																						<option value="1986">1986
																						</option>
																						<option value="1987">1987
																						</option>
																						<option value="1988">1988
																						</option>
																						<option value="1989">1989
																						</option>
																						<option value="1990">1990
																						</option>
																						<option value="1991">1991
																						</option>
																						<option value="1992">1992
																						</option>
																						<option value="1993">1993
																						</option>
																						<option value="1994">1994
																						</option>
																						<option value="1995">1995
																						</option>
																						<option value="1996">1996
																						</option>
																						<option value="1997">1997
																						</option>
																						<option value="1998">1998
																						</option>
																						<option value="1999">1999
																						</option>
																						<option value="2000">2000
																						</option>
																						<option value="2001">2001
																						</option>
																						<option value="2002">2002
																						</option>
																						<option value="2003">2003
																						</option>
																						<option value="2004">2004
																						</option>
																						<option value="2005">2005
																						</option>
																						<option value="2006">2006
																						</option>
																						<option value="2007">2007
																						</option>
																						<option value="2008">2008
																						</option>
																						<option value="2009">2009
																						</option>
																						<option value="2010">2010
																						</option>
																						<option value="2011">2011
																						</option>
																						<option value="2012">2012
																						</option>
																						<option value="2013">2013
																						</option>
																						<option value="2014">2014
																						</option>
																						<option value="2015">2015
																						</option>
																						<option value="2016">2016
																						</option>
																						<option value="2017">2017
																						</option>
																						<option value="2018">2018
																						</option>
																						<option value="2019">2019
																						</option>
																						<option value="2020">2020
																						</option>
																						<option value="2021">2021
																						</option>
																						<option value="2022">2022
																						</option>
																						<option value="2023">2023
																						</option>
																						<option value="2024"
																							selected="selected">2024
																						</option>
																					</select>
																				</div>
																				<div class="lightpick__toolbar"><button
																						type="button"
																						class="lightpick__previous-action">←</button><button
																						type="button"
																						class="lightpick__next-action">→</button>
																				</div>
																			</header>
																			<div class="lightpick__days-of-the-week">
																				<div class="lightpick__day-of-the-week"
																					title="Monday">Mon</div>
																				<div class="lightpick__day-of-the-week"
																					title="Tuesday">Tue</div>
																				<div class="lightpick__day-of-the-week"
																					title="Wednesday">Wed</div>
																				<div class="lightpick__day-of-the-week"
																					title="Thursday">Thu</div>
																				<div class="lightpick__day-of-the-week"
																					title="Friday">Fri</div>
																				<div class="lightpick__day-of-the-week"
																					title="Saturday">Sat</div>
																				<div class="lightpick__day-of-the-week"
																					title="Sunday">Sun</div>
																			</div>
																			<div class="lightpick__days">
																				<div class="lightpick__day is-available "
																					data-time="1704098240053">1</div>
																				<div class="lightpick__day is-available "
																					data-time="1704184640053">2</div>
																				<div class="lightpick__day is-available "
																					data-time="1704271040053">3</div>
																				<div class="lightpick__day is-available "
																					data-time="1704357440053">4</div>
																				<div class="lightpick__day is-available "
																					data-time="1704443840053">5</div>
																				<div class="lightpick__day is-available "
																					data-time="1704530240053">6</div>
																				<div class="lightpick__day is-available "
																					data-time="1704616640053">7</div>
																				<div class="lightpick__day is-available "
																					data-time="1704703040053">8</div>
																				<div class="lightpick__day is-available  is-today"
																					data-time="1704789440053">9</div>
																				<div class="lightpick__day is-available "
																					data-time="1704875840053">10</div>
																				<div class="lightpick__day is-available "
																					data-time="1704962240053">11</div>
																				<div class="lightpick__day is-available "
																					data-time="1705048640053">12</div>
																				<div class="lightpick__day is-available "
																					data-time="1705135040053">13</div>
																				<div class="lightpick__day is-available "
																					data-time="1705221440053">14</div>
																				<div class="lightpick__day is-available "
																					data-time="1705307840053">15</div>
																				<div class="lightpick__day is-available "
																					data-time="1705394240053">16</div>
																				<div class="lightpick__day is-available "
																					data-time="1705480640053">17</div>
																				<div class="lightpick__day is-available "
																					data-time="1705567040053">18</div>
																				<div class="lightpick__day is-available "
																					data-time="1705653440053">19</div>
																				<div class="lightpick__day is-available "
																					data-time="1705739840053">20</div>
																				<div class="lightpick__day is-available "
																					data-time="1705826240053">21</div>
																				<div class="lightpick__day is-available "
																					data-time="1705912640053">22</div>
																				<div class="lightpick__day is-available "
																					data-time="1705999040053">23</div>
																				<div class="lightpick__day is-available "
																					data-time="1706085440053">24</div>
																				<div class="lightpick__day is-available "
																					data-time="1706171840053">25</div>
																				<div class="lightpick__day is-available "
																					data-time="1706258240053">26</div>
																				<div class="lightpick__day is-available "
																					data-time="1706344640053">27</div>
																				<div class="lightpick__day is-available "
																					data-time="1706431040053">28</div>
																				<div class="lightpick__day is-available "
																					data-time="1706517440053">29</div>
																				<div class="lightpick__day is-available "
																					data-time="1706603840053">30</div>
																				<div class="lightpick__day is-available "
																					data-time="1706690240053">31</div>
																				<div class="lightpick__day is-available is-next-month"
																					data-time="1706776640053">1</div>
																				<div class="lightpick__day is-available is-next-month"
																					data-time="1706863040053">2</div>
																				<div class="lightpick__day is-available is-next-month"
																					data-time="1706949440053">3</div>
																				<div class="lightpick__day is-available is-next-month"
																					data-time="1707035840053">4</div>
																			</div>
																		</section>
																	</div>
																	<div class="lightpick__tooltip"
																		style="visibility: hidden"></div>
																</div>
															</section>
														</div>
														<div class="col-6" style="padding-left: 7.5px;">
															<div class="inner_value_box">
																<section class="lightpick lightpick--1-columns">
																	<div class="lightpick__inner">
																		<div class="lightpick__months">
																			<section class="lightpick__month">
																				<header
																					class="lightpick__month-title-bar">
																					<div class="lightpick__month-title">
																						<select
																							class="lightpick__select lightpick__select-months"
																							dir="rtl">
																							<option value="0"
																								selected="selected">
																								January</option>
																							<option value="1">February
																							</option>
																							<option value="2">March
																							</option>
																							<option value="3">April
																							</option>
																							<option value="4">May
																							</option>
																							<option value="5">June
																							</option>
																							<option value="6">July
																							</option>
																							<option value="7">August
																							</option>
																							<option value="8">September
																							</option>
																							<option value="9">October
																							</option>
																							<option value="10">November
																							</option>
																							<option value="11">December
																							</option>
																						</select><select
																							class="lightpick__select lightpick__select-years">
																							<option value="1900">1900
																							</option>
																							<option value="1901">1901
																							</option>
																							<option value="1902">1902
																							</option>
																							<option value="1903">1903
																							</option>
																							<option value="1904">1904
																							</option>
																							<option value="1905">1905
																							</option>
																							<option value="1906">1906
																							</option>
																							<option value="1907">1907
																							</option>
																							<option value="1908">1908
																							</option>
																							<option value="1909">1909
																							</option>
																							<option value="1910">1910
																							</option>
																							<option value="1911">1911
																							</option>
																							<option value="1912">1912
																							</option>
																							<option value="1913">1913
																							</option>
																							<option value="1914">1914
																							</option>
																							<option value="1915">1915
																							</option>
																							<option value="1916">1916
																							</option>
																							<option value="1917">1917
																							</option>
																							<option value="1918">1918
																							</option>
																							<option value="1919">1919
																							</option>
																							<option value="1920">1920
																							</option>
																							<option value="1921">1921
																							</option>
																							<option value="1922">1922
																							</option>
																							<option value="1923">1923
																							</option>
																							<option value="1924">1924
																							</option>
																							<option value="1925">1925
																							</option>
																							<option value="1926">1926
																							</option>
																							<option value="1927">1927
																							</option>
																							<option value="1928">1928
																							</option>
																							<option value="1929">1929
																							</option>
																							<option value="1930">1930
																							</option>
																							<option value="1931">1931
																							</option>
																							<option value="1932">1932
																							</option>
																							<option value="1933">1933
																							</option>
																							<option value="1934">1934
																							</option>
																							<option value="1935">1935
																							</option>
																							<option value="1936">1936
																							</option>
																							<option value="1937">1937
																							</option>
																							<option value="1938">1938
																							</option>
																							<option value="1939">1939
																							</option>
																							<option value="1940">1940
																							</option>
																							<option value="1941">1941
																							</option>
																							<option value="1942">1942
																							</option>
																							<option value="1943">1943
																							</option>
																							<option value="1944">1944
																							</option>
																							<option value="1945">1945
																							</option>
																							<option value="1946">1946
																							</option>
																							<option value="1947">1947
																							</option>
																							<option value="1948">1948
																							</option>
																							<option value="1949">1949
																							</option>
																							<option value="1950">1950
																							</option>
																							<option value="1951">1951
																							</option>
																							<option value="1952">1952
																							</option>
																							<option value="1953">1953
																							</option>
																							<option value="1954">1954
																							</option>
																							<option value="1955">1955
																							</option>
																							<option value="1956">1956
																							</option>
																							<option value="1957">1957
																							</option>
																							<option value="1958">1958
																							</option>
																							<option value="1959">1959
																							</option>
																							<option value="1960">1960
																							</option>
																							<option value="1961">1961
																							</option>
																							<option value="1962">1962
																							</option>
																							<option value="1963">1963
																							</option>
																							<option value="1964">1964
																							</option>
																							<option value="1965">1965
																							</option>
																							<option value="1966">1966
																							</option>
																							<option value="1967">1967
																							</option>
																							<option value="1968">1968
																							</option>
																							<option value="1969">1969
																							</option>
																							<option value="1970">1970
																							</option>
																							<option value="1971">1971
																							</option>
																							<option value="1972">1972
																							</option>
																							<option value="1973">1973
																							</option>
																							<option value="1974">1974
																							</option>
																							<option value="1975">1975
																							</option>
																							<option value="1976">1976
																							</option>
																							<option value="1977">1977
																							</option>
																							<option value="1978">1978
																							</option>
																							<option value="1979">1979
																							</option>
																							<option value="1980">1980
																							</option>
																							<option value="1981">1981
																							</option>
																							<option value="1982">1982
																							</option>
																							<option value="1983">1983
																							</option>
																							<option value="1984">1984
																							</option>
																							<option value="1985">1985
																							</option>
																							<option value="1986">1986
																							</option>
																							<option value="1987">1987
																							</option>
																							<option value="1988">1988
																							</option>
																							<option value="1989">1989
																							</option>
																							<option value="1990">1990
																							</option>
																							<option value="1991">1991
																							</option>
																							<option value="1992">1992
																							</option>
																							<option value="1993">1993
																							</option>
																							<option value="1994">1994
																							</option>
																							<option value="1995">1995
																							</option>
																							<option value="1996">1996
																							</option>
																							<option value="1997">1997
																							</option>
																							<option value="1998">1998
																							</option>
																							<option value="1999">1999
																							</option>
																							<option value="2000">2000
																							</option>
																							<option value="2001">2001
																							</option>
																							<option value="2002">2002
																							</option>
																							<option value="2003">2003
																							</option>
																							<option value="2004">2004
																							</option>
																							<option value="2005">2005
																							</option>
																							<option value="2006">2006
																							</option>
																							<option value="2007">2007
																							</option>
																							<option value="2008">2008
																							</option>
																							<option value="2009">2009
																							</option>
																							<option value="2010">2010
																							</option>
																							<option value="2011">2011
																							</option>
																							<option value="2012">2012
																							</option>
																							<option value="2013">2013
																							</option>
																							<option value="2014">2014
																							</option>
																							<option value="2015">2015
																							</option>
																							<option value="2016">2016
																							</option>
																							<option value="2017">2017
																							</option>
																							<option value="2018">2018
																							</option>
																							<option value="2019">2019
																							</option>
																							<option value="2020">2020
																							</option>
																							<option value="2021">2021
																							</option>
																							<option value="2022">2022
																							</option>
																							<option value="2023">2023
																							</option>
																							<option value="2024"
																								selected="selected">2024
																							</option>
																						</select>
																					</div>
																					<div class="lightpick__toolbar">
																						<button type="button"
																							class="lightpick__previous-action">←</button><button
																							type="button"
																							class="lightpick__next-action">→</button>
																					</div>
																				</header>
																				<div
																					class="lightpick__days-of-the-week">
																					<div class="lightpick__day-of-the-week"
																						title="Monday">Mon</div>
																					<div class="lightpick__day-of-the-week"
																						title="Tuesday">Tue</div>
																					<div class="lightpick__day-of-the-week"
																						title="Wednesday">Wed</div>
																					<div class="lightpick__day-of-the-week"
																						title="Thursday">Thu</div>
																					<div class="lightpick__day-of-the-week"
																						title="Friday">Fri</div>
																					<div class="lightpick__day-of-the-week"
																						title="Saturday">Sat</div>
																					<div class="lightpick__day-of-the-week"
																						title="Sunday">Sun</div>
																				</div>
																				<div class="lightpick__days">
																					<div class="lightpick__day is-available "
																						data-time="1704098240053">1
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1704184640053">2
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1704271040053">3
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1704357440053">4
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1704443840053">5
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1704530240053">6
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1704616640053">7
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1704703040053">8
																					</div>
																					<div class="lightpick__day is-available  is-today"
																						data-time="1704789440053">9
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1704875840053">10
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1704962240053">11
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1705048640053">12
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1705135040053">13
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1705221440053">14
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1705307840053">15
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1705394240053">16
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1705480640053">17
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1705567040053">18
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1705653440053">19
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1705739840053">20
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1705826240053">21
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1705912640053">22
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1705999040053">23
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1706085440053">24
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1706171840053">25
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1706258240053">26
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1706344640053">27
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1706431040053">28
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1706517440053">29
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1706603840053">30
																					</div>
																					<div class="lightpick__day is-available "
																						data-time="1706690240053">31
																					</div>
																					<div class="lightpick__day is-available is-next-month"
																						data-time="1706776640053">1
																					</div>
																					<div class="lightpick__day is-available is-next-month"
																						data-time="1706863040053">2
																					</div>
																					<div class="lightpick__day is-available is-next-month"
																						data-time="1706949440053">3
																					</div>
																					<div class="lightpick__day is-available is-next-month"
																						data-time="1707035840053">4
																					</div>
																				</div>
																			</section>
																		</div>
																		<div class="lightpick__tooltip"
																			style="visibility: hidden"></div>
																	</div>
																</section>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4 position-relative">
												<label id="Guests">
													<span>No. of Guests</span>
													<span class="fas fa-chevron-down"></span>
												</label>
												<div class="value_box">
													<b id="GuestsBox">03 Guests (02 Adult, 01 Infant)</b>
												</div>
												<!-- dropdownGuests Id is using for css -->
												<div id="dropdownGuests" class="dropdown_filter position-absolute">
													<div class="row">
														<div class="col-12">
															<div class="select_guest">
																<div class="row align-items-center">
																	<div class="col-6">
																		<b>Adults</b>
																		<p class="mb-0">Ages 13 or above</p>
																	</div>
																	<div class="col-6">
																		<div class="count_box">
																			<div class="btn-box">
																				<span class="fas fa-minus"></span>
																			</div>
																			<div class="box_value">
																				<span>100</span>
																			</div>
																			<div class="btn-box">
																				<span class="fas fa-plus"></span>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="select_guest">
																<div class="row align-items-center">
																	<div class="col-6">
																		<b>Children</b>
																		<p class="mb-0">Ages 2–12</p>
																	</div>
																	<div class="col-6">
																		<div class="count_box">
																			<div class="btn-box">
																				<span class="fas fa-minus"></span>
																			</div>
																			<div class="box_value">
																				<span>0</span>
																			</div>
																			<div class="btn-box">
																				<span class="fas fa-plus"></span>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="select_guest">
																<div class="row align-items-center">
																	<div class="col-6">
																		<b>Infants</b>
																		<p class="mb-0">Under 2</p>
																	</div>
																	<div class="col-6">
																		<div class="count_box">
																			<div class="btn-box">
																				<span class="fas fa-minus"></span>
																			</div>
																			<div class="box_value">
																				<span>0</span>
																			</div>
																			<div class="btn-box">
																				<span class="fas fa-plus"></span>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="select_guest">
																<div class="row align-items-center">
																	<div class="col-6">
																		<b>Pets</b>
																		<p class="mb-0">Bringing a service animal?</p>
																	</div>
																	<div class="col-6">
																		<div class="count_box">
																			<div class="btn-box">
																				<span class="fas fa-minus"></span>
																			</div>
																			<div class="box_value">
																				<span>0</span>
																			</div>
																			<div class="btn-box">
																				<span class="fas fa-plus"></span>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<button type="submit" class="btn btn-main float-right">Search Now</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="at-activity" style="padding-top:50px;">
        <div class="container mt-5">
          
            <div class="row">
                <div class="col-12">
                    <div class="nav activity_slide owl-carousel justify-content-between">
                        <div class="item">
                            <a href="#">
                                <div class="activity_li " >
                                    <div class="icon ">
                                        <img src="http://web.way2village.in/public/front/images/icons/Activity_01.png" alt=""  />
                                    </div>
                                    <div class="acttivity_type">
                                        <span>Trekking</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <div class="activity_li">
                                    <div class="icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/Activity_02.png" alt="" />
                                    </div>
                                    <div class="acttivity_type">
                                        <span>Farming</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <div class="activity_li">
                                    <div class="icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/Activity_03.png" alt="" />
                                    </div>
                                    <div class="acttivity_type">
                                        <span>Boating</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <div class="activity_li">
                                    <div class="icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/Activity_04.png" alt="" />
                                    </div>
                                    <div class="acttivity_type">
                                        <span>Campfire</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <div class="activity_li">
                                    <div class="icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/Activity_05.png" alt="" />
                                    </div>
                                    <div class="acttivity_type">
                                        <span>Barbecue & Music</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <div class="activity_li">
                                    <div class="icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/Activity_06.png" alt="" />
                                    </div>
                                    <div class="acttivity_type">
                                        <span>Paragliding</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <div class="activity_li">
                                    <div class="icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/Activity_07.png" alt="" />
                                    </div>
                                    <div class="acttivity_type">
                                        <span>Jeep Safari</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <div class="activity_li">
                                    <div class="icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/Activity_08.png" alt="" />
                                    </div>
                                    <div class="acttivity_type">
                                        <span>Adventure Park</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <div class="activity_li">
                                    <div class="icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/Activity_09.png" alt="" />
                                    </div>
                                    <div class="acttivity_type">
                                        <span>Plantation Walk</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <div class="activity_li">
                                    <div class="icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/Activity_10.png" alt="" />
                                    </div>
                                    <div class="acttivity_type">
                                        <span>Local Sight Seeing</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="at-latest-offer pt-0">
			<div class="container flex-">
				<div class="at-sectionhead2">
					<div class="at-sectiontitle2">
						<h2 class="text-center " style="font-size:30px;">Latest Offers</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="offers_slider owl-carousel">
							<div class="offer-item">
								<a href="#">
									<div class="offer_box">
										<img src="http://web.way2village.in/public/front/images/offer/Offer.jpg" alt="" />
									</div>
								</a>
							</div>
							<div class="offer-item">
								<a href="#">
									<div class="offer_box">
										<img src="http://web.way2village.in/public/front/images/offer/offer-img.jpg" alt="" />
									</div>
								</a>
							</div>
							<div class="offer-item">
								<a href="#">
									<div class="offer_box">
										<img src="http://web.way2village.in/public/front/images/offer/offer-img-2.jpg" alt="" />
									</div>
								</a>
							</div>
							<div class="offer-item">
								<a href="#">
									<div class="offer_box">
										<img src="http://web.way2village.in/public/front/images/offer/offer-img-3.jpg" alt="" />
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="at-categories" style="background: rgba(124, 179, 66, 0.22);">
			<div class="bg-patten">
				<div class="top-left">
					<img src="http://web.way2village.in/public/front/images/patten/patten_01.png" alt="" />
				</div>
				<div class="bottom-right">
					<img src="http://web.way2village.in/public/front/images/patten/patten_02.png" alt="" />
				</div>
			</div>
			<div class="container">
				<div class="at-sectionhead2 py-5">
					<div class="at-sectiontitle2">
						<h2 class="text-center" style="font-size:40px;">Explore Top Categories</h2>
					</div>
					<div class="at-descriptions">
						<p class="text-center" style="margin:15px 0; ">Explore Livelihood opportunities for rural communities of Tamil Nadu through travel and
							tourism.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="categories_slide owl-carousel">
							<div class="categories-item">
								<a href="./farm_house.html">
									<div class="card">
										<div class="thumbnail">
											<img src="http://web.way2village.in/public/front/images/category/category_01.png" alt="" />
										</div>
										<div class="card-body text-center">
											<h5>Farm House</h5>
											<p>space for 02 adult with one nbed and attach bathroom.</p>
											<a href="#" class="btn btn-arrow">
												<span class="fas fa-arrow-right"></span>
											</a>
										</div>
									</div>
								</a>
							</div>
							<div class="categories-item">
								<a href="./home_stay.html">
									<div class="card">
										<div class="thumbnail">
											<img src="http://web.way2village.in/public/front/images/category/category_02.png" alt="" />
										</div>
										<div class="card-body text-center">
											<h5>Home Stay</h5>
											<p>space for 02 adult with one nbed and attach bathroom.</p>
											<a href="#" class="btn btn-arrow">
												<span class="fas fa-arrow-right"></span>
											</a>
										</div>
									</div>
								</a>
							</div>
							<div class="categories-item">
								<a href="./village_farm_house.html">
									<div class="card">
										<div class="thumbnail">
											<img src="http://web.way2village.in/public/front/images/category/category_03.png" alt="" />
										</div>
										<div class="card-body text-center">
											<h5>Village Farm House</h5>
											<p>space for 02 adult with one nbed and attach bathroom.</p>
											<a href="#" class="btn btn-arrow">
												<span class="fas fa-arrow-right"></span>
											</a>
										</div>
									</div>
								</a>
							</div>
							<div class="categories-item">
								<a href="organic_farms.html">
									<div class="card">
										<div class="thumbnail">
											<img src="http://web.way2village.in/public/front/images/category/category_04.png" alt="" />
										</div>
										<div class="card-body text-center">
											<h5>Organic Farms</h5>
											<p>space for 02 adult with one nbed and attach bathroom.</p>
											<a href="#" class="btn btn-arrow">
												<span class="fas fa-arrow-right"></span>
											</a>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
	<section>
	    
	    <div class="at-welcome">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<div class="welcome_box w-100 h-100" style="background-image: url(http://web.way2village.in/public/front/images/patten/welcome_img.png);">
						</div>
					</div>
					<div class="col-md-7">
						<div class="at-sectionhead text-left">
							<div class="at-sectiontitle">
								<h2>Welcome to your home away<br />from home! </h2>
							</div>
							<div class="at-description at-content">
								<p class="mb-3" style="max-width: 100%;">Immersive travel experiences created by rural
									communities. Experience coexistence and Showcase how these rural communities live in
									harmony with nature and all its elements.</p>
								<p class="mb-3" style="max-width: 100%;">Generating alternate livelihood opportunities
									for rural communities of Tamil Nadu through travel and tourism.</p>
								<b class="mb-3">Agenda</b>
								<div class="row">
									<div class="col-md-6">
										<ul class="nav flex-column">
											<li class="nav-item">
												<div class="welcome_list">
													<div class="icon">
														<span class="far fa-check-square"></span>
													</div>
													<div class="list_text">
														<p>Sustainable Tourism Model</p>
													</div>
												</div>
											</li>
											<li class="nav-item">
												<div class="welcome_list">
													<div class="icon">
														<span class="far fa-check-square"></span>
													</div>
													<div class="list_text">
														<p>Explore the unexplored</p>
													</div>
												</div>
											</li>
											<li class="nav-item">
												<div class="welcome_list">
													<div class="icon">
														<span class="far fa-check-square"></span>
													</div>
													<div class="list_text">
														<p>Destinations</p>
													</div>
												</div>
											</li>
											<li class="nav-item">
												<div class="welcome_list">
													<div class="icon">
														<span class="far fa-check-square"></span>
													</div>
													<div class="list_text">
														<p>Tourism Potential of Amboori</p>
													</div>
												</div>
											</li>
										</ul>
									</div>
									<div class="col-md-6">
										<ul class="nav flex-column">
											<li class="nav-item">
												<div class="welcome_list">
													<div class="icon">
														<span class="far fa-check-square"></span>
													</div>
													<div class="list_text">
														<p>Adventure Tourism</p>
													</div>
												</div>
											</li>
											<li class="nav-item">
												<div class="welcome_list">
													<div class="icon">
														<span class="far fa-check-square"></span>
													</div>
													<div class="list_text">
														<p>Road Map</p>
													</div>
												</div>
											</li>
											<li class="nav-item">
												<div class="welcome_list">
													<div class="icon">
														<span class="far fa-check-square"></span>
													</div>
													<div class="list_text">
														<p>Sustainable Model</p>
													</div>
												</div>
											</li>
											<li class="nav-item">
												<div class="welcome_list">
													<div class="icon">
														<span class="far fa-check-square"></span>
													</div>
													<div class="list_text">
														<p>Stakeholders</p>
													</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	    
	</section>
	<section>
	     <div class="at-Listing py-5">
       
        <div class="container py-5">
            <div class="row">
                <div class="at-sectionhead">
				<div class="at-sectiontitle">
					<h2>Something Featured</h2>
				</div>
				<div class="at-description">
					<p>Tourism can involve primary transportation to the general location, Local transportation,
						Accommodations, Entertainment, Recreation, Nourishment and Shopping.</p>
				</div>
			</div>
            </div>
             
                <div class="row mt-5">
                    <div class="col-md-4">
                        <div class="Listings_card">
                            <div class="card">
                                <div class="thumbnail">
                                 <div class="slider-box">

							              	<input type="radio" name="1" id="slide-1" checked class="sld-inp">
							            	<label for="slide-1" style="--hue: 32" class="sld-lbl"></label>
							            	<div class="slider-img-bx">
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_01.png" >
							            	</div>
							  
							            	<input type="radio" name="1" id="slide-2" class="sld-inp">
							            	<label for="slide-2" style="--hue: 82" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_02.png" >
							            	</div>
							  
							            	<input type="radio" name="1" id="slide-3" class="sld-inp">
							            	<label for="slide-3" style="--hue: 40" class="sld-lbl"></label>
							            	<div class="slider-img-bx">
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_03.png" >
							            	</div>
							  
							            	<input type="radio" name="1" id="slide-4" class="sld-inp">
							             	<label for="slide-4" style="--hue: 210" class="sld-lbl"></label>
							              	<div class="slider-img-bx" >
								              <img src="	http://web.way2village.in/public/front/images/listing/list_04.png" >
							            	</div>
							  
						        	  </div>
                                    <div class="prime_icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/prime.png" alt="" />
                                    </div>
                                    <div class="top_control">
                                        <div class="cate">
                                            <span class="badge badge-listing">Guest Facourite</span>
                                        </div>
                                        <div class="like_icon">
                                            <span class="fas fa-heart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="list-info">
                                        <div class="info">
                                            <a href="./listing_detail.html">
                                                <h5>Puttalam, Sri Lanka</h5>
                                            </a>
                                            <p class="location">346 kilometers away</p>
                                            <p class="date">1-6 Jan</p>
                                        </div>
                                        <div class="review">
                                            <div class="icon">
                                                <span class="fas fa-star"></span>
                                            </div>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <div class="list-price">
                                        <b>INR. 11,899 night</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="Listings_card">
                            <div class="card">
                                <div class="thumbnail">
                                   <div class="slider-box">

							              	<input type="radio" name="2" id="slide-5" checked class="sld-inp">
							            	<label for="slide-5" style="--hue: 32" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_05.png" >
							            	</div>
							  
							            	<input type="radio" name="2" id="slide-6" class="sld-inp">
							            	<label for="slide-6" style="--hue: 82" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_06.png" >
							            	</div>
							  
							            	<input type="radio" name="2" id="slide-7" class="sld-inp">
							            	<label for="slide-7" style="--hue: 40" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_07.png" >
							            	</div>
							  
							            	<input type="radio" name="2" id="slide-8" class="sld-inp">
							             	<label for="slide-8" style="--hue: 210" class="sld-lbl"></label>
							              	<div class="slider-img-bx" >
								              <img src="	http://web.way2village.in/public/front/images/listing/list_08.png" >
							            	</div>
							  
						        	  </div>
                                    <div class="prime_icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/prime.png" alt="" />
                                    </div>
                                    <div class="top_control">
                                        <div class="cate">
                                            <span class="badge badge-listing">Guest Facourite</span>
                                        </div>
                                        <div class="like_icon">
                                            <span class="fas fa-heart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="list-info">
                                        <div class="info">
                                            <a href="./listing_detail.html">
                                                <h5>Puttalam, Sri Lanka</h5>
                                            </a>
                                            <p class="location">346 kilometers away</p>
                                            <p class="date">1-6 Jan</p>
                                        </div>
                                        <div class="review">
                                            <div class="icon">
                                                <span class="fas fa-star"></span>
                                            </div>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <div class="list-price">
                                        <b>INR. 11,899 night</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="Listings_card">
                            <div class="card">
                                <div class="thumbnail">
                                   <div class="slider-box">

							              	<input type="radio" name="3" id="slide-9" checked class="sld-inp">
							            	<label for="slide-9" style="--hue: 32" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_01.png" >
							            	</div>
							  
							            	<input type="radio" name="3" id="slide-10" class="sld-inp">
							            	<label for="slide-10" style="--hue: 82" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_02.png" >
							            	</div>
							  
							            	<input type="radio" name="3" id="slide-11" class="sld-inp">
							            	<label for="slide-11" style="--hue: 40" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_03.png" >
							            	</div>
							  
							            	<input type="radio" name="3" id="slide-12" class="sld-inp">
							             	<label for="slide-12" style="--hue: 210" class="sld-lbl"></label>
							              	<div class="slider-img-bx" >
								              <img src="	http://web.way2village.in/public/front/images/listing/list_04.png" >
							            	</div>
							  
						        	  </div>
                                    <div class="prime_icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/prime.png" alt="" />
                                    </div>
                                    <div class="top_control">
                                        <div class="cate">
                                            <span class="badge badge-listing">Guest Facourite</span>
                                        </div>
                                        <div class="like_icon">
                                            <span class="fas fa-heart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="list-info">
                                        <div class="info">
                                            <a href="./listing_detail.html">
                                                <h5>Puttalam, Sri Lanka</h5>
                                            </a>
                                            <p class="location">346 kilometers away</p>
                                            <p class="date">1-6 Jan</p>
                                        </div>
                                        <div class="review">
                                            <div class="icon">
                                                <span class="fas fa-star"></span>
                                            </div>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <div class="list-price">
                                        <b>INR. 11,899 night</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="Listings_card">
                            <div class="card">
                                <div class="thumbnail">
                                    <div class="slider-box">

							              	<input type="radio" name="4" id="slide-13" checked class="sld-inp">
							            	<label for="slide-13" style="--hue: 32" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_05.png" >
							            	</div>
							  
							            	<input type="radio" name="4" id="slide-14" class="sld-inp">
							            	<label for="slide-14" style="--hue: 82" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_06.png" >
							            	</div>
							  
							            	<input type="radio" name="4" id="slide-15" class="sld-inp">
							            	<label for="slide-15" style="--hue: 40" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_07.png" >
							            	</div>
							  
							            	<input type="radio" name="4" id="slide-16" class="sld-inp">
							             	<label for="slide-16" style="--hue: 210" class="sld-lbl"></label>
							              	<div class="slider-img-bx" >
								              <img src="	http://web.way2village.in/public/front/images/listing/list_08.png" >
							            	</div>
							  
						        	  </div>
                                    <div class="prime_icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/prime.png" alt="" />
                                    </div>
                                    <div class="top_control">
                                        <div class="cate">
                                            <span class="badge badge-listing">Guest Facourite</span>
                                        </div>
                                        <div class="like_icon">
                                            <span class="fas fa-heart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="list-info">
                                        <div class="info">
                                            <a href="./listing_detail.html">
                                                <h5>Puttalam, Sri Lanka</h5>
                                            </a>
                                            <p class="location">346 kilometers away</p>
                                            <p class="date">1-6 Jan</p>
                                        </div>
                                        <div class="review">
                                            <div class="icon">
                                                <span class="fas fa-star"></span>
                                            </div>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <div class="list-price">
                                        <b>INR. 11,899 night</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="Listings_card">
                            <div class="card">
                                <div class="thumbnail">
                                    <div class="slider-box">

							              	<input type="radio" name="5" id="slide-17" checked class="sld-inp">
							            	<label for="slide-17" style="--hue: 32" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_01.png" >
							            	</div>
							  
							            	<input type="radio" name="5" id="slide-18" class="sld-inp">
							            	<label for="slide-18" style="--hue: 82" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="http://web.way2village.in/public/front/images/listing/list_02.png" >
							            	</div>
							  
							            	<input type="radio" name="5" id="slide-19" class="sld-inp">
							            	<label for="slide-19" style="--hue: 40" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_03.png" >
							            	</div>
							  
							            	<input type="radio" name="5" id="slide-20" class="sld-inp">
							             	<label for="slide-20" style="--hue: 210" class="sld-lbl"></label>
							              	<div class="slider-img-bx" >
								              <img src="	http://web.way2village.in/public/front/images/listing/list_04.png" >
							            	</div>
							  
						        	  </div>
                                    <div class="prime_icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/prime.png" alt="" />
                                    </div>
                                    <div class="top_control">
                                        <div class="cate">
                                            <span class="badge badge-listing">Guest Facourite</span>
                                        </div>
                                        <div class="like_icon">
                                            <span class="fas fa-heart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="list-info">
                                        <div class="info">
                                            <a href="./listing_detail.html">
                                                <h5>Puttalam, Sri Lanka</h5>
                                            </a>
                                            <p class="location">346 kilometers away</p>
                                            <p class="date">1-6 Jan</p>
                                        </div>
                                        <div class="review">
                                            <div class="icon">
                                                <span class="fas fa-star"></span>
                                            </div>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <div class="list-price">
                                        <b>INR. 11,899 night</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="Listings_card">
                            <div class="card">
                                <div class="thumbnail">
                                    <div class="slider-box">

							              	<input type="radio" name="6" id="slide-21" checked class="sld-inp">
							            	<label for="slide-21" style="--hue: 32" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_05.png" >
							            	</div>
							  
							            	<input type="radio" name="6" id="slide-22" class="sld-inp">
							            	<label for="slide-22" style="--hue: 82" class="sld-lbl"></label>
							            	<div class="slider-img-bx">
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_06.png" >
							            	</div>
							  
							            	<input type="radio" name="6" id="slide-23" class="sld-inp">
							            	<label for="slide-23" style="--hue: 40" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_07.png" >
							            	</div>
							  
							            	<input type="radio" name="6" id="slide-24" class="sld-inp">
							             	<label for="slide-24" style="--hue: 210" class="sld-lbl"></label>
							              	<div class="slider-img-bx" >
								              <img src="	http://web.way2village.in/public/front/images/listing/list_08.png" >
							            	</div>
							  
						        	  </div>
                                    <div class="prime_icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/prime.png" alt="" />
                                    </div>
                                    <div class="top_control">
                                        <div class="cate">
                                            <span class="badge badge-listing">Guest Facourite</span>
                                        </div>
                                        <div class="like_icon">
                                            <span class="fas fa-heart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="list-info">
                                        <div class="info">
                                            <a href="./listing_detail.html">
                                                <h5>Puttalam, Sri Lanka</h5>
                                            </a>
                                            <p class="location">346 kilometers away</p>
                                            <p class="date">1-6 Jan</p>
                                        </div>
                                        <div class="review">
                                            <div class="icon">
                                                <span class="fas fa-star"></span>
                                            </div>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <div class="list-price">
                                        <b>INR. 11,899 night</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="Listings_card">
                            <div class="card">
                                <div class="thumbnail">
                                    <div class="slider-box">

							              	<input type="radio" name="7" id="slide-25" checked class="sld-inp">
							            	<label for="slide-25" style="--hue: 32" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_01.png" >
							            	</div>
							  
							            	<input type="radio" name="7" id="slide-26" class="sld-inp">
							            	<label for="slide-26" style="--hue: 82" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_02.png" >
							            	</div>
							  
							            	<input type="radio" name="7" id="slide-27" class="sld-inp">
							            	<label for="slide-27" style="--hue: 40" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_03.png" >
							            	</div>
							  
							            	<input type="radio" name="7" id="slide-28" class="sld-inp">
							             	<label for="slide-28" style="--hue: 210" class="sld-lbl"></label>
							              	<div class="slider-img-bx">
								              <img src="	http://web.way2village.in/public/front/images/listing/list_04.png" >
							            	</div>
							  
						        	  </div>
                                    <div class="prime_icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/prime.png" alt="" />
                                    </div>
                                    <div class="top_control">
                                        <div class="cate">
                                            <span class="badge badge-listing">Guest Facourite</span>
                                        </div>
                                        <div class="like_icon">
                                            <span class="fas fa-heart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="list-info">
                                        <div class="info">
                                            <a href="./listing_detail.html">
                                                <h5>Puttalam, Sri Lanka</h5>
                                            </a>
                                            <p class="location">346 kilometers away</p>
                                            <p class="date">1-6 Jan</p>
                                        </div>
                                        <div class="review">
                                            <div class="icon">
                                                <span class="fas fa-star"></span>
                                            </div>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <div class="list-price">
                                        <b>INR. 11,899 night</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="Listings_card">
                            <div class="card">
                                <div class="thumbnail">
                                    <div class="slider-box">

							              	<input type="radio" name="8" id="slide-29" checked class="sld-inp">
							            	<label for="slide-29" style="--hue: 32" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_05.png" >
							            	</div>
							  
							            	<input type="radio" name="8" id="slide-30" class="sld-inp">
							            	<label for="slide-30" style="--hue: 82" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_06.png" >
							            	</div>
							  
							            	<input type="radio" name="8" id="slide-31" class="sld-inp">
							            	<label for="slide-31" style="--hue: 40" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_07.png" >
							            	</div>
							  
							            	<input type="radio" name="8" id="slide-32" class="sld-inp">
							             	<label for="slide-32" style="--hue: 210" class="sld-lbl"></label>
							              	<div class="slider-img-bx" >
								              <img src="	http://web.way2village.in/public/front/images/listing/list_08.png" >
							            	</div>
							  
						        	  </div>
                                    <div class="prime_icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/prime.png" alt="" />
                                    </div>
                                    <div class="top_control">
                                        <div class="cate">
                                            <span class="badge badge-listing">Guest Facourite</span>
                                        </div>
                                        <div class="like_icon">
                                            <span class="fas fa-heart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="list-info">
                                        <div class="info">
                                            <a href="./listing_detail.html">
                                                <h5>Puttalam, Sri Lanka</h5>
                                            </a>
                                            <p class="location">346 kilometers away</p>
                                            <p class="date">1-6 Jan</p>
                                        </div>
                                        <div class="review">
                                            <div class="icon">
                                                <span class="fas fa-star"></span>
                                            </div>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <div class="list-price">
                                        <b>INR. 11,899 night</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="Listings_card">
                            <div class="card">
                                <div class="thumbnail">
                                   <div class="slider-box">

							              	<input type="radio" name="9" id="slide-33" checked class="sld-inp">
							            	<label for="slide-33" style="--hue: 32" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_01.png" >
							            	</div>
							  
							            	<input type="radio" name="9" id="slide-34" class="sld-inp">
							            	<label for="slide-34" style="--hue: 82" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_02.png" >
							            	</div>
							  
							            	<input type="radio" name="9" id="slide-35" class="sld-inp">
							            	<label for="slide-35" style="--hue: 40" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_03.png" >
							            	</div>
							  
							            	<input type="radio" name="b" id="slide-36" class="sld-inp">
							             	<label for="slide-36" style="--hue: 210" class="sld-lbl"></label>
							              	<div class="slider-img-bx" >
								              <img src="	http://web.way2village.in/public/front/images/listing/list_04.png" >
							            	</div>
							  
						        	  </div>
                                    <div class="prime_icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/prime.png" alt="" />
                                    </div>
                                    <div class="top_control">
                                        <div class="cate">
                                            <span class="badge badge-listing">Guest Facourite</span>
                                        </div>
                                        <div class="like_icon">
                                            <span class="fas fa-heart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="list-info">
                                        <div class="info">
                                            <a href="./listing_detail.html">
                                                <h5>Puttalam, Sri Lanka</h5>
                                            </a>
                                            <p class="location">346 kilometers away</p>
                                            <p class="date">1-6 Jan</p>
                                        </div>
                                        <div class="review">
                                            <div class="icon">
                                                <span class="fas fa-star"></span>
                                            </div>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <div class="list-price">
                                        <b>INR. 11,899 night</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                  
                    
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="Listings_card">
                            <div class="card">
                                <div class="thumbnail">
                                   <div class="slider-box">

							              	<input type="radio" name="10" id="slide-37" checked class="sld-inp">
							            	<label for="slide-37" style="--hue: 32" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_02.png" >
							            	</div>
							  
							            	<input type="radio" name="10" id="slide-38" class="sld-inp">
							            	<label for="slide-38" style="--hue: 82" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_01.png" >
							            	</div>
							  
							            	<input type="radio" name="10" id="slide-39" class="sld-inp">
							            	<label for="slide-39" style="--hue: 40" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_02.png" >
							            	</div>
							  
							            	<input type="radio" name="10" id="slide-40" class="sld-inp">
							             	<label for="slide-40" style="--hue: 210" class="sld-lbl"></label>
							              	<div class="slider-img-bx" >
								              <img src="	http://web.way2village.in/public/front/images/listing/list_03.png" >
							            	</div>
							  
						        	  </div>
                                    <div class="prime_icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/prime.png" alt="" />
                                    </div>
                                    <div class="top_control">
                                        <div class="cate">
                                            <span class="badge badge-listing">Guest Facourite</span>
                                        </div>
                                        <div class="like_icon">
                                            <span class="fas fa-heart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="list-info">
                                        <div class="info">
                                            <a href="./listing_detail.html">
                                                <h5>Puttalam, Sri Lanka</h5>
                                            </a>
                                            <p class="location">346 kilometers away</p>
                                            <p class="date">1-6 Jan</p>
                                        </div>
                                        <div class="review">
                                            <div class="icon">
                                                <span class="fas fa-star"></span>
                                            </div>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <div class="list-price">
                                        <b>INR. 11,899 night</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                            <div class="Listings_card">
                            <div class="card">
                                <div class="thumbnail">
                                   <div class="slider-box">

							              	<input type="radio" name="11" id="slide-41" checked class="sld-inp">
							            	<label for="slide-41" style="--hue: 32" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_03.png" >
							            	</div>
							  
							            	<input type="radio" name="11" id="slide-42" class="sld-inp">
							            	<label for="slide-42" style="--hue: 82" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_01.png" >
							            	</div>
							  
							            	<input type="radio" name="11" id="slide-43" class="sld-inp">
							            	<label for="slide-43" style="--hue: 40" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_02.png" >
							            	</div>
							  
							            	<input type="radio" name="11" id="slide-44" class="sld-inp">
							             	<label for="slide-44" style="--hue: 210" class="sld-lbl"></label>
							              	<div class="slider-img-bx" >
								              <img src="	http://web.way2village.in/public/front/images/listing/list_03.png" >
							            	</div>
							  
						        	  </div>
                                    <div class="prime_icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/prime.png" alt="" />
                                    </div>
                                    <div class="top_control">
                                        <div class="cate">
                                            <span class="badge badge-listing">Guest Facourite</span>
                                        </div>
                                        <div class="like_icon">
                                            <span class="fas fa-heart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="list-info">
                                        <div class="info">
                                            <a href="./listing_detail.html">
                                                <h5>Puttalam, Sri Lanka</h5>
                                            </a>
                                            <p class="location">346 kilometers away</p>
                                            <p class="date">1-6 Jan</p>
                                        </div>
                                        <div class="review">
                                            <div class="icon">
                                                <span class="fas fa-star"></span>
                                            </div>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <div class="list-price">
                                        <b>INR. 11,899 night</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                            <div class="Listings_card">
                            <div class="card">
                                <div class="thumbnail">
                                   <div class="slider-box">

							              	<input type="radio" name="12" id="slide-45" checked class="sld-inp">
							            	<label for="slide-45" style="--hue: 32" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_01.png" >
							            	</div>
							  
							            	<input type="radio" name="12" id="slide-46" class="sld-inp">
							            	<label for="slide-46" style="--hue: 82" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_02.png" >
							            	</div>
							  
							            	<input type="radio" name="12" id="slide-47" class="sld-inp">
							            	<label for="slide-47" style="--hue: 40" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_03.png" >
							            	</div>
							  
							            	<input type="radio" name="12" id="slide-48" class="sld-inp">
							             	<label for="slide-48" style="--hue: 210" class="sld-lbl"></label>
							              	<div class="slider-img-bx" >
								              <img src="	http://web.way2village.in/public/front/images/listing/list_04.png" >
							            	</div>
							  
						        	  </div>
                                    <div class="prime_icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/prime.png" alt="" />
                                    </div>
                                    <div class="top_control">
                                        <div class="cate">
                                            <span class="badge badge-listing">Guest Facourite</span>
                                        </div>
                                        <div class="like_icon">
                                            <span class="fas fa-heart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="list-info">
                                        <div class="info">
                                            <a href="./listing_detail.html">
                                                <h5>Puttalam, Sri Lanka</h5>
                                            </a>
                                            <p class="location">346 kilometers away</p>
                                            <p class="date">1-6 Jan</p>
                                        </div>
                                        <div class="review">
                                            <div class="icon">
                                                <span class="fas fa-star"></span>
                                            </div>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <div class="list-price">
                                        <b>INR. 11,899 night</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                            <div class="Listings_card">
                            <div class="card">
                                <div class="thumbnail">
                                   <div class="slider-box">

							              	<input type="radio" name="13" id="slide-49" checked class="sld-inp">
							            	<label for="slide-49" style="--hue: 32" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_02.png" >
							            	</div>
							  
							            	<input type="radio" name="13" id="slide-50" class="sld-inp">
							            	<label for="slide-50" style="--hue: 82" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_03.png" >
							            	</div>
							  
							            	<input type="radio" name="13" id="slide-51" class="sld-inp">
							            	<label for="slide-51" style="--hue: 40" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_04.png" >
							            	</div>
							  
							            	<input type="radio" name="13" id="slide-52" class="sld-inp">
							             	<label for="slide-52" style="--hue: 210" class="sld-lbl"></label>
							              	<div class="slider-img-bx" >
								              <img src="	http://web.way2village.in/public/front/images/listing/list_01.png" >
							            	</div>
							  
						        	  </div>
                                    <div class="prime_icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/prime.png" alt="" />
                                    </div>
                                    <div class="top_control">
                                        <div class="cate">
                                            <span class="badge badge-listing">Guest Facourite</span>
                                        </div>
                                        <div class="like_icon">
                                            <span class="fas fa-heart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="list-info">
                                        <div class="info">
                                            <a href="./listing_detail.html">
                                                <h5>Puttalam, Sri Lanka</h5>
                                            </a>
                                            <p class="location">346 kilometers away</p>
                                            <p class="date">1-6 Jan</p>
                                        </div>
                                        <div class="review">
                                            <div class="icon">
                                                <span class="fas fa-star"></span>
                                            </div>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <div class="list-price">
                                        <b>INR. 11,899 night</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="Listings_card">
                            <div class="card">
                                <div class="thumbnail">
                                   <div class="slider-box">

							              	<input type="radio" name="14" id="slide-53" checked class="sld-inp">
							            	<label for="slide-53" style="--hue: 32" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_05.png" >
							            	</div>
							  
							            	<input type="radio" name="14" id="slide-54" class="sld-inp">
							            	<label for="slide-54" style="--hue: 82" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_06.png" >
							            	</div>
							  
							            	<input type="radio" name="14" id="slide-55" class="sld-inp">
							            	<label for="slide-55" style="--hue: 40" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_07.png" >
							            	</div>
							  
							            	<input type="radio" name="14" id="slide-56" class="sld-inp">
							             	<label for="slide-56" style="--hue: 210" class="sld-lbl"></label>
							              	<div class="slider-img-bx" >
								              <img src="	http://web.way2village.in/public/front/images/listing/list_08.png" >
							            	</div>
							  
						        	  </div>
                                    <div class="prime_icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/prime.png" alt="" />
                                    </div>
                                    <div class="top_control">
                                        <div class="cate">
                                            <span class="badge badge-listing">Guest Facourite</span>
                                        </div>
                                        <div class="like_icon">
                                            <span class="fas fa-heart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="list-info">
                                        <div class="info">
                                            <a href="./listing_detail.html">
                                                <h5>Puttalam, Sri Lanka</h5>
                                            </a>
                                            <p class="location">346 kilometers away</p>
                                            <p class="date">1-6 Jan</p>
                                        </div>
                                        <div class="review">
                                            <div class="icon">
                                                <span class="fas fa-star"></span>
                                            </div>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <div class="list-price">
                                        <b>INR. 11,899 night</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                            <div class="Listings_card">
                            <div class="card">
                                <div class="thumbnail">
                                   <div class="slider-box">

							              	<input type="radio" name="15" id="slide-57" checked class="sld-inp">
							            	<label for="slide-57" style="--hue: 32" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_03.png" >
							            	</div>
							  
							            	<input type="radio" name="15" id="slide-58" class="sld-inp">
							            	<label for="slide-58" style="--hue: 82" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_01.png" >
							            	</div>
							  
							            	<input type="radio" name="15" id="slide-59" class="sld-inp">
							            	<label for="slide-59" style="--hue: 40" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_02.png" >
							            	</div>
							  
							            	<input type="radio" name="15" id="slide-60" class="sld-inp">
							             	<label for="slide-60" style="--hue: 210" class="sld-lbl"></label>
							              	<div class="slider-img-bx" >
								              <img src="	http://web.way2village.in/public/front/images/listing/list_03.png" >
							            	</div>
							  
						        	  </div>
                                    <div class="prime_icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/prime.png" alt="" />
                                    </div>
                                    <div class="top_control">
                                        <div class="cate">
                                            <span class="badge badge-listing">Guest Facourite</span>
                                        </div>
                                        <div class="like_icon">
                                            <span class="fas fa-heart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="list-info">
                                        <div class="info">
                                            <a href="./listing_detail.html">
                                                <h5>Puttalam, Sri Lanka</h5>
                                            </a>
                                            <p class="location">346 kilometers away</p>
                                            <p class="date">1-6 Jan</p>
                                        </div>
                                        <div class="review">
                                            <div class="icon">
                                                <span class="fas fa-star"></span>
                                            </div>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <div class="list-price">
                                        <b>INR. 11,899 night</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                            <div class="Listings_card">
                            <div class="card">
                                <div class="thumbnail">
                                   <div class="slider-box">

							              	<input type="radio" name="16" id="slide-61" checked class="sld-inp">
							            	<label for="slide-61" style="--hue: 32" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_05.png" >
							            	</div>
							  
							            	<input type="radio" name="16" id="slide-62" class="sld-inp">
							            	<label for="slide-62" style="--hue: 82" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_06.png" >
							            	</div>
							  
							            	<input type="radio" name="16" id="slide-63" class="sld-inp">
							            	<label for="slide-63" style="--hue: 40" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_07.png" >
							            	</div>
							  
							            	<input type="radio" name="16" id="slide-64" class="sld-inp">
							             	<label for="slide-64" style="--hue: 210" class="sld-lbl"></label>
							              	<div class="slider-img-bx" >
								              <img src="	http://web.way2village.in/public/front/images/listing/list_08.png" >
							            	</div>
							  
						        	  </div>
                                    <div class="prime_icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/prime.png" alt="" />
                                    </div>
                                    <div class="top_control">
                                        <div class="cate">
                                            <span class="badge badge-listing">Guest Facourite</span>
                                        </div>
                                        <div class="like_icon">
                                            <span class="fas fa-heart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="list-info">
                                        <div class="info">
                                            <a href="./listing_detail.html">
                                                <h5>Puttalam, Sri Lanka</h5>
                                            </a>
                                            <p class="location">346 kilometers away</p>
                                            <p class="date">1-6 Jan</p>
                                        </div>
                                        <div class="review">
                                            <div class="icon">
                                                <span class="fas fa-star"></span>
                                            </div>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <div class="list-price">
                                        <b>INR. 11,899 night</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                            <div class="Listings_card">
                            <div class="card">
                                <div class="thumbnail">
                                   <div class="slider-box">

							              	<input type="radio" name="17" id="slide-65" checked class="sld-inp">
							            	<label for="slide-65" style="--hue: 32" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_01.png" >
							            	</div>
							  
							            	<input type="radio" name="17" id="slide-66" class="sld-inp">
							            	<label for="slide-66" style="--hue: 82" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_02.png" >
							            	</div>
							  
							            	<input type="radio" name="17" id="slide-67" class="sld-inp">
							            	<label for="slide-67" style="--hue: 40" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_03.png" >
							            	</div>
							  
							            	<input type="radio" name="17" id="slide-68" class="sld-inp">
							             	<label for="slide-68" style="--hue: 210" class="sld-lbl"></label>
							              	<div class="slider-img-bx" >
								              <img src="	http://web.way2village.in/public/front/images/listing/list_04.png" >
							            	</div>
							  
						        	  </div>
                                    <div class="prime_icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/prime.png" alt="" />
                                    </div>
                                    <div class="top_control">
                                        <div class="cate">
                                            <span class="badge badge-listing">Guest Facourite</span>
                                        </div>
                                        <div class="like_icon">
                                            <span class="fas fa-heart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="list-info">
                                        <div class="info">
                                            <a href="./listing_detail.html">
                                                <h5>Puttalam, Sri Lanka</h5>
                                            </a>
                                            <p class="location">346 kilometers away</p>
                                            <p class="date">1-6 Jan</p>
                                        </div>
                                        <div class="review">
                                            <div class="icon">
                                                <span class="fas fa-star"></span>
                                            </div>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <div class="list-price">
                                        <b>INR. 11,899 night</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="Listings_card">
                            <div class="card">
                                <div class="thumbnail">
                                   <div class="slider-box">

							              	<input type="radio" name="18" id="slide-68" checked class="sld-inp">
							            	<label for="slide-68" style="--hue: 32" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_02.png" >
							            	</div>
							  
							            	<input type="radio" name="18" id="slide-69" class="sld-inp">
							            	<label for="slide-69" style="--hue: 82" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_03.png" >
							            	</div>
							  
							            	<input type="radio" name="18" id="slide-70" class="sld-inp">
							            	<label for="slide-70" style="--hue: 40" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_04.png" >
							            	</div>
							  
							            	<input type="radio" name="18" id="slide-71" class="sld-inp">
							             	<label for="slide-71" style="--hue: 210" class="sld-lbl"></label>
							              	<div class="slider-img-bx" >
								              <img src="	http://web.way2village.in/public/front/images/listing/list_05.png" >
							            	</div>
							  
						        	  </div>
                                    <div class="prime_icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/prime.png" alt="" />
                                    </div>
                                    <div class="top_control">
                                        <div class="cate">
                                            <span class="badge badge-listing">Guest Facourite</span>
                                        </div>
                                        <div class="like_icon">
                                            <span class="fas fa-heart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="list-info">
                                        <div class="info">
                                            <a href="./listing_detail.html">
                                                <h5>Puttalam, Sri Lanka</h5>
                                            </a>
                                            <p class="location">346 kilometers away</p>
                                            <p class="date">1-6 Jan</p>
                                        </div>
                                        <div class="review">
                                            <div class="icon">
                                                <span class="fas fa-star"></span>
                                            </div>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <div class="list-price">
                                        <b>INR. 11,899 night</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                            <div class="Listings_card">
                            <div class="card">
                                <div class="thumbnail">
                                   <div class="slider-box">

							              	<input type="radio" name="19" id="slide-72" checked class="sld-inp">
							            	<label for="slide-72" style="--hue: 32" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_06.png" >
							            	</div>
							  
							            	<input type="radio" name="19" id="slide-73" class="sld-inp">
							            	<label for="slide-73" style="--hue: 82" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_07.png" >
							            	</div>
							  
							            	<input type="radio" name="19" id="slide-74" class="sld-inp">
							            	<label for="slide-74" style="--hue: 40" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_08.png" >
							            	</div>
							  
							            	<input type="radio" name="19" id="slide-75" class="sld-inp">
							             	<label for="slide-75" style="--hue: 210" class="sld-lbl"></label>
							              	<div class="slider-img-bx" >
								              <img src="	http://web.way2village.in/public/front/images/listing/list_01.png" >
							            	</div>
							  
						        	  </div>
                                    <div class="prime_icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/prime.png" alt="" />
                                    </div>
                                    <div class="top_control">
                                        <div class="cate">
                                            <span class="badge badge-listing">Guest Facourite</span>
                                        </div>
                                        <div class="like_icon">
                                            <span class="fas fa-heart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="list-info">
                                        <div class="info">
                                            <a href="./listing_detail.html">
                                                <h5>Puttalam, Sri Lanka</h5>
                                            </a>
                                            <p class="location">346 kilometers away</p>
                                            <p class="date">1-6 Jan</p>
                                        </div>
                                        <div class="review">
                                            <div class="icon">
                                                <span class="fas fa-star"></span>
                                            </div>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <div class="list-price">
                                        <b>INR. 11,899 night</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                            <div class="Listings_card">
                            <div class="card">
                                <div class="thumbnail">
                                   <div class="slider-box">

							              	<input type="radio" name="20" id="slide-76" checked class="sld-inp">
							            	<label for="slide-76" style="--hue: 32" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_01.png" >
							            	</div>
							  
							            	<input type="radio" name="20" id="slide-77" class="sld-inp">
							            	<label for="slide-77" style="--hue: 82" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_02.png" >
							            	</div>
							  
							            	<input type="radio" name="20" id="slide-78" class="sld-inp">
							            	<label for="slide-78" style="--hue: 40" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_03.png" >
							            	</div>
							  
							            	<input type="radio" name="20" id="slide-79" class="sld-inp">
							             	<label for="slide-79" style="--hue: 210" class="sld-lbl"></label>
							              	<div class="slider-img-bx" >
								              <img src="	http://web.way2village.in/public/front/images/listing/list_04.png" >
							            	</div>
							  
						        	  </div>
                                    <div class="prime_icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/prime.png" alt="" />
                                    </div>
                                    <div class="top_control">
                                        <div class="cate">
                                            <span class="badge badge-listing">Guest Facourite</span>
                                        </div>
                                        <div class="like_icon">
                                            <span class="fas fa-heart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="list-info">
                                        <div class="info">
                                            <a href="./listing_detail.html">
                                                <h5>Puttalam, Sri Lanka</h5>
                                            </a>
                                            <p class="location">346 kilometers away</p>
                                            <p class="date">1-6 Jan</p>
                                        </div>
                                        <div class="review">
                                            <div class="icon">
                                                <span class="fas fa-star"></span>
                                            </div>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <div class="list-price">
                                        <b>INR. 11,899 night</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                            <div class="Listings_card">
                            <div class="card">
                                <div class="thumbnail">
                                   <div class="slider-box">

							              	<input type="radio" name="21" id="slide-80" checked class="sld-inp">
							            	<label for="slide-80" style="--hue: 32" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_05.png" >
							            	</div>
							  
							            	<input type="radio" name="21" id="slide-81" class="sld-inp">
							            	<label for="slide-81" style="--hue: 82" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_06.png" >
							            	</div>
							  
							            	<input type="radio" name="21" id="slide-82" class="sld-inp">
							            	<label for="slide-82" style="--hue: 40" class="sld-lbl"></label>
							            	<div class="slider-img-bx" >
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_07.png" >
							            	</div>
							  
							            	<input type="radio" name="21" id="slide-83" class="sld-inp">
							             	<label for="slide-83" style="--hue: 210" class="sld-lbl"></label>
							              	<div class="slider-img-bx" >
								              <img src="	http://web.way2village.in/public/front/images/listing/list_08.png" >
							            	</div>
							  
						        	  </div>
                                    <div class="prime_icon">
                                        <img src="http://web.way2village.in/public/front/images/icons/prime.png" alt="" />
                                    </div>
                                    <div class="top_control">
                                        <div class="cate">
                                            <span class="badge badge-listing">Guest Facourite</span>
                                        </div>
                                        <div class="like_icon">
                                            <span class="fas fa-heart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="list-info">
                                        <div class="info">
                                            <a href="./listing_detail.html">
                                                <h5>Puttalam, Sri Lanka</h5>
                                            </a>
                                            <p class="location">346 kilometers away</p>
                                            <p class="date">1-6 Jan</p>
                                        </div>
                                        <div class="review">
                                            <div class="icon">
                                                <span class="fas fa-star"></span>
                                            </div>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <div class="list-price">
                                        <b>INR. 11,899 night</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        
	   
	</section>
	<section>
	    
	    <div class="at-welcome at-model-section">
			<div class="bg_2_with_patten">
				<div class="patten_01">
					<img src="http://web.way2village.in/public/front/images/patten/patten_03.png" alt="" />
				</div>
				<div class="patten_02">
					<img src="http://web.way2village.in/public/front/images/patten/patten_03.png" alt="" />
				</div>
				<div class="bg_75"></div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-7">
						<div class="at-sectionhead text-left">
							<div class="at-sectiontitle">
								<h2>Sustainable Tourism Model </h2>
							</div>
							<div class="at-description at-content">
								<p class="mb-3" style="max-width: 100%;">Sustainable tourism is the concept of visiting
									somewhere as a tourist and trying to make a positive impact on the environment ,
									society, and economy. Tourism can involve primary transportation to the general
									location, local transportation, accommodations, entertainment, recreation,
									nourishment and shopping. It can be related to travel for leisure, business and what
									is called VFR (visiting friends and relatives).  </p>
								<div class="row">
									<div class="col-md-12">
										<ul class="nav flex-column">
											<li class="nav-item">
												<div class="welcome_list">
													<div class="icon">
														<span class="far fa-check-square"></span>
													</div>
													<div class="list_text">
														<p>Generates greater economic benefits for local people and
															enhances the well-being of host communities, improves
															working conditions and access to the industry</p>
													</div>
												</div>
											</li>
											<li class="nav-item">
												<div class="welcome_list">
													<div class="icon">
														<span class="far fa-check-square"></span>
													</div>
													<div class="list_text">
														<p>Involves local people in decisions that affect their lives
															and life chances.</p>
													</div>
												</div>
											</li>
											<li class="nav-item">
												<div class="welcome_list">
													<div class="icon">
														<span class="far fa-check-square"></span>
													</div>
													<div class="list_text">
														<p>Makes positive contributions to the conservation of natural
															and cultural heritage, to the maintenance of the world’s
															diversity</p>
													</div>
												</div>
											</li>
											<li class="nav-item">
												<div class="welcome_list">
													<div class="icon">
														<span class="far fa-check-square"></span>
													</div>
													<div class="list_text">
														<p>Provides access for people with disabilities and culturally
															sensitive, creates respect between tourists and hosts, and
															builds local pride and confidence.</p>
													</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="welcome_box w-100 h-100" style="background-image: url(	http://web.way2village.in/public/front/images/patten/model_img.png);">
						</div>
					</div>
				</div>
			</div>
		</div>
	    
	</section>
	<section>
	    <div class="at-road">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<div class="at-sectionhead text-left">
							<div class="at-sectiontitle">
								<h2>Road Map</h2>
							</div>
							<div class="at-description at-content">
								<div class="row">
									<div class="col-md-12">
										<ul class="nav flex-column">
											<li class="nav-item">
												<div class="welcome_list">
													<div class="icon">
														<span class="far fa-check-square"></span>
													</div>
													<div class="list_text">
														<p>Promotion of Camping to attract youth</p>
													</div>
												</div>
											</li>
											<li class="nav-item">
												<div class="welcome_list">
													<div class="icon">
														<span class="far fa-check-square"></span>
													</div>
													<div class="list_text">
														<p>Adventure Tourism - Farm / Plantation Tourism trails</p>
													</div>
												</div>
											</li>
											<li class="nav-item">
												<div class="welcome_list">
													<div class="icon">
														<span class="far fa-check-square"></span>
													</div>
													<div class="list_text">
														<p>Home stays and Eco lodges - Tourism friendly</p>
													</div>
												</div>
											</li>
											<li class="nav-item">
												<div class="welcome_list">
													<div class="icon">
														<span class="far fa-check-square"></span>
													</div>
													<div class="list_text">
														<p>Website / Social Media</p>
													</div>
												</div>
											</li>
											<li class="nav-item">
												<div class="welcome_list">
													<div class="icon">
														<span class="far fa-check-square"></span>
													</div>
													<div class="list_text">
														<p>Strong visual identity</p>
													</div>
												</div>
											</li>
											<li class="nav-item">
												<div class="welcome_list">
													<div class="icon">
														<span class="far fa-check-square"></span>
													</div>
													<div class="list_text">
														<p>Travel Agents Destination</p>
													</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-7 d-flex justify-content-center align-items-center ">
						<div class="row w-100">
							<div class="col-md-6 w-100 p-2">
								<div class="Listings_card w-100" style="border:none !important;">
									<div class="card h-100 " style="border:none !important;">
										<!--<div class="thumbnail">-->
										<!--	<div class="thumbnail_slider">-->
										<!--		<a href="#">-->
										<!--			<div class="item">-->
										<!--				<div class="list_img"-->
										<!--					style="background-image: url('./images/listing/list_01.png');">-->
										<!--				</div>-->
										<!--			</div>-->
										<!--		</a>-->
										<!--		<a href="#">-->
										<!--			<div class="item">-->
										<!--				<div class="list_img"-->
										<!--					style="background-image: url('./images/listing/list_02.png');">-->
										<!--				</div>-->
										<!--			</div>-->
										<!--		</a>-->
										<!--		<a href="#">-->
										<!--			<div class="item">-->
										<!--				<div class="list_img"-->
										<!--					style="background-image: url('./images/listing/list_03.png');">-->
										<!--				</div>-->
										<!--			</div>-->
										<!--		</a>-->
										<!--		<a href="#">-->
										<!--			<div class="item">-->
										<!--				<div class="list_img"-->
										<!--					style="background-image: url('./images/listing/list_04.png');">-->
										<!--				</div>-->
										<!--			</div>-->
										<!--		</a>-->
										<!--	</div>-->
										<!--</div>-->
										<div class="slider-box">

							        	<input type="radio" name="22" id="slide-84" checked class="sld-inp">
								        <label for="slide-84" style="--hue: 32" class="sld-lbl"></label>
							        	<div class="slider-img-bx" style="--z: 4">
							        	  <img src="	http://web.way2village.in/public/front/images/listing/list_01.png" >
							        	</div>
							  
								        <input type="radio" name="22" id="slide-85" class="sld-inp">
							           	<label for="slide-85" style="--hue: 82" class="sld-lbl"></label>
							           	<div class="slider-img-bx" style="--z: 3">
							        	    <img src="	http://web.way2village.in/public/front/images/listing/list_02.png" >
							        	</div>
							  
							        	<input type="radio" name="22" id="slide-86" class="sld-inp">
								        <label for="slide-86" style="--hue: 40" class="sld-lbl"></label>
							        	<div class="slider-img-bx" style="--z: 2">
							        	           <img src="	http://web.way2village.in/public/front/images/listing/list_03.png" >
							        	</div>
							  
							        	<input type="radio" name="22" id="slide-87" class="sld-inp">
								        <label for="slide-87" style="--hue: 210" class="sld-lbl"></label>
								        <div class="slider-img-bx" style="--z: 1">
							        	  <img src="	http://web.way2village.in/public/front/images/listing/list_04.png" >
							        	</div>
							  
							        </div>
							  
							
							        <div class="abs-profiles">

							        </div>
									</div>
								</div>
							</div>
							<div class="col-md-6 p-2">
								<div class="Listings_card">
									<!--<div class="card">-->
									<!--	<div class="thumbnail">-->
									<!--		<div class="thumbnail_slider">-->
									<!--			<a href="#">-->
									<!--				<div class="item">-->
									<!--					<div class="list_img"-->
									<!--						style="background-image: url('./images/listing/list_05.png');">-->
									<!--					</div>-->
									<!--				</div>-->
									<!--			</a>-->
									<!--			<a href="#">-->
									<!--				<div class="item">-->
									<!--					<div class="list_img"-->
									<!--						style="background-image: url('./images/listing/list_06.png');">-->
									<!--					</div>-->
									<!--				</div>-->
									<!--			</a>-->
									<!--			<a href="#">-->
									<!--				<div class="item">-->
									<!--					<div class="list_img"-->
									<!--						style="background-image: url('./images/listing/list_07.png');">-->
									<!--					</div>-->
									<!--				</div>-->
									<!--			</a>-->
									<!--			<a href="#">-->
									<!--				<div class="item">-->
									<!--					<div class="list_img"-->
									<!--						style="background-image: url('./images/listing/list_08.png');">-->
									<!--					</div>-->
									<!--				</div>-->
									<!--			</a>-->
									<!--		</div>-->
									<!--	</div>-->
									
										<div class="slider-box">

							              	<input type="radio" name="23" id="slide-88" checked class="sld-inp">
							            	<label for="slide-88" style="--hue: 32" class="sld-lbl"></label>
							            	<div class="slider-img-bx" style="--z: 4">
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_05.png" >
							            	</div>
							  
							            	<input type="radio" name="23" id="slide-89" class="sld-inp">
							            	<label for="slide-89" style="--hue: 82" class="sld-lbl"></label>
							            	<div class="slider-img-bx" style="--z: 3">
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_06.png" >
							            	</div>
							  
							            	<input type="radio" name="23" id="slide-90" class="sld-inp">
							            	<label for="slide-90" style="--hue: 40" class="sld-lbl"></label>
							            	<div class="slider-img-bx" style="--z: 2">
							            	  <img src="	http://web.way2village.in/public/front/images/listing/list_07.png" >
							            	</div>
							  
							            	<input type="radio" name="23" id="slide-91" class="sld-inp">
							             	<label for="slide-91" style="--hue: 210" class="sld-lbl"></label>
							              	<div class="slider-img-bx" style="--z: 1">
								              <img src="	http://web.way2village.in/public/front/images/listing/list_08.png" >
							            	</div>
							  
						        	  </div>
							          <div class="abs-profiles">

							          </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
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
        var dateFormat = '{{ $date_format }}';
    </script>
    <script src="{{ asset('public/js/front.min.js') }}"></script>
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


