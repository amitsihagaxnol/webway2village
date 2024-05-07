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

@media screen and (max-width:765px){
.act-tpe{
    height:120px;
}
.wd{
    width:40px;
}
.acttivity_type span{
    font-size:12px;
    font-weight:400;;
    width:50px;

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
.inner-card{
 background: rgb(255 255 255 / 78%) !important;
border-radius: 14px !important;
box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px !important;
backdrop-filter: blur(6.4px) !important;
-webkit-backdrop-filter: blur(6.4px) !important;
border: 1px solid rgba(255, 255, 255, 0.3) !important;

}
.card-transparent {
    border-radius: 15px !important;
    /*background: var(--card-transparent);*/
    box-shadow: none !important;
    border:1px solid #7cb342 !important;
    padding:1px !important;

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
@endpush
@section('main')
<div class="at-homefilter margin-top-85" style="padding-top: 50px;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card-transparent" style="background: #7cb342;">
                        <form action="{{ url('farm_house') }}" method="GET">
                            <div class="inner-card">
                                <div class="row align-items-center">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-4 position-relative home-wid-bx"  style=" border-right:1px solid #7cb342;">
                                               <div style="width:100%; height:100%; background:#fff; border-radius:4px; padding:10px;">
                                                    <label id="Location" class="home-wid-bx" style="margin:0;">
                                                    <span>Where to?</span>
                                                    <span class="fas fa-chevron-down"></span>
                                                </label>
                                                <div class="value_box ">
                                                    <input type="text" name="location" class="form-control v-bx-inp" placeholder="Select Location" id="cityInput" value="{{ request()->has('location') ? request()->get('location') : @$data['location']->cityName }}">
                                                    {{-- <b id="LocationBox">Tamil Nadu, India</b> --}}
                                                </div>

                                                <!-- dropdownLocation Id is using for css -->
                                                <div id="dropdownLocation" class="dropdown_filter position-absolute">
                                                    <div id="citySuggestions" class="autocomplete-items"></div>
                                                </div>
                                               </div>
                                            </div>
                                            <div class="col-md-4 position-relative" class="home-wid-bx" style="border-right:1px solid #7cb342; display:flex; justify-content:flex-start; align-items:flex-start; flex-direction:column; ">
                                                <div style="width:100%; height:100%; background:#fff; border-radius:4px; padding:10px;">
                                                     <label id="CheckIn">
                                                    <span>Check in / Check out</span>
                                                    <span class="fas fa-chevron-down"></span>
                                                </label>
                                                <div class="value_box" style="margin-top:10px;">
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

                                            </div>
                                            <div class="col-md-4 position-relative"  class="home-wid-bx" style=" display:flex; justify-content:flex-start; align-items:flex-start; flex-direction:column;" >
                                               <div style="width:100%; height:100%; background:#fff; border-radius:4px; padding:10px;">
                                                     <label id="Guests">
                                                    <span>No. of Guests</span>
                                                    <span class="fas fa-chevron-down"></span>
                                                </label>
                                                <div class="value_box" style="margin-top:10px;">
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
                                    </div>
                                    <div class="col-md-3 d-flex justify-content-between align-items-center">
                                        <button type="submit" class="btn btn-main float-right n-hvr" style="width:100%;height:55px; border-radius:5px; font-size:15px; padding:0;">Search</button>
                                        <a class="btn btn-main float-right n-hvr" style="width:100%;height:55px; border-radius:5px; font-size:15px; padding:0; display:flex; justify-content:center; align-items:center;" href="{{ url('farm_house') }}">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="at-activity" style="padding-top:0;">
        <h3 class="text-center">Activities</h3>
        <div class="container mt-5">

            <div class="row">
                <div class="col-12">
                    <div class="nav  offers_slider owl-carousel justify-content-between">
                        @if(isset($data['activityTypes']))
                          @foreach($data['activityTypes'] as $type)
                                <div class="item activityType"  data-id="{{$type->id}}">
                                    <a href="javascript:void(0);" >
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
       <div class="at-Listing">

        <div class="container">
             <div class="farm-house w-100  pd" >
                <div class="d-flex w-100  justify-content-between align-items-center">
                        <div class="df-bx w-50">
                            <h2 class="df-bx-h20active"><a href="{{ url('farm_house') }}">Farm House</a></h2>
                        <h2><a href="{{ url('village_farm_house') }}">Village Farm House</a></h2>
                        </div>
                    <a href="{{ url('map-all') }}" class="btn btn-main n-hvr">With Map</a>
                </div>
        </div>
                <div class="row mt-3">
                    @php
                        $i =1;
                        $j=1;
                    @endphp
                    @if(count($data['properties'])>0)
                        @foreach($data['properties'] as $property)
                        <div class="col-lg-4">
                            <div class="Listings_card" >
                                <div class="card">
                                    <a href="{{route('listing-detail.details',['id'=>$property->id])}}">
                                        <div class="thumbnail" style="height:300px;">
                                        <div class="slider-box" style="height:300px;">
                                                <div class="slider-img-bx" style="padding:3px; border-radius:10px;    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px; background:#7cb342;">
                                                @if(!empty($property->feature_image))
                                                    <img src="{{asset('public/images/property/feature-image/'.$property->feature_image)}}"  style=" border-radius:10px;">
                                                @else
                                                    <img src="{{ asset('public/front/defaultProperty/images/'.$data['defaultImage']->property_default_pic) }}"  style=" border-radius:10px;">
                                                @endif
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
                                    </a>


                                    <div class="card-body" style="padding:0;">
                                        <div class="list-info">
                                            <div class="info">
                                                <a href="{{route('listing-detail.details',['id'=>$property->id])}}">
                                                    <h5>{{$property->name}}</h5>
                                                </a>
                                                <p class="location"><span><i class="fa-solid fa-location-dot"></i></span>346 kilometers away</p>
                                                <p class="date"> {{ \Carbon\Carbon::parse($property->created_at)->format('d  M Y') }}</p>
                                            </div>
                                            <div class="review">
                                                <div class="icon">
                                                    <span class="fas fa-star"></span>
                                                </div>
                                                <span>5.0</span>
                                            </div>
                                        </div>
                                        <div class="list-price">
                                            <b>INR. {{$property['property_price']->price}}</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $i++;
                        @endphp
                        @endforeach
                    @else
                        <p style="margin: 0 auto;color: red;font-weight: 500;">No Properties Found</p>
                    @endif

                  {{--   <div class="col-12 mt-4">
                        <nav class="at-pagination">
                            <ul>
                                <li class="at-prevpage"><a href="javascrip:void(0);"><i class="fa-solid fa-arrow-left"></i></a>
                                </li>
                                <li class="at-active"><a href="javascrip:void(0);">1</a></li>
                                <li><a href="javascrip:void(0);">2</a></li>
                                <li><a href="javascrip:void(0);">3</a></li>
                                <li><a href="javascrip:void(0);">4</a></li>
                                <li><a href="javascrip:void(0);">...</a></li>
                                <li><a href="javascrip:void(0);">50</a></li>
                                <li class="at-nextpage"><a href="javascrip:void(0);"><i class="fa-solid fa-arrow-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>  --}}
                </div>
            </div>

    </div>


@endsection

@section('validation_script')
<script type="text/javascript" src="{{ asset('public/js/jquery.validate.min.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://kit.fontawesome.com/111740f521.js" crossorigin="anonymous"></script>
<script src="{{ asset('public/w2vjs/owl.carousel.min.js') }}"></script>


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

        $(document).ready(function() {
            var newurl = "{{ route('fetchCities') }}";

            function fetchCitySuggestions(query) {
                $.ajax({
                    url: newurl
                    , method: 'GET'
                    , data: {
                        query: query
                    }
                    , success: function(response) {
                        $('#dropdownLocation').css('display', 'block');
                        $('#citySuggestions').html(response);
                    }
                });
            }

            $('#cityInput').on('input', function() {
                var query = $(this).val();
                if (query.length > 0) {
                    fetchCitySuggestions(query);
                } else {
                    $('#citySuggestions').html('');
                    $('#dropdownLocation').css('display', 'none');

                }
            });

            $(document).on('click', '.city-suggestion', function() {
                var cityState = $(this).data('city'); // Get the city and state from data attribute
                var city = cityState.split(',')[0].trim(); // Extract city name
                $('#cityInput').val(city);
                $('#citySuggestions').html('');
                $('#dropdownLocation').css('display', 'none');

            });
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

