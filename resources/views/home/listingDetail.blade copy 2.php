@extends('template')
@section('main')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

:root {
    --primary: #7CB342;
    --secondary: #F13C5B;
    --white: #FFFFFF;
    --black: #000000;
    --text: #606B68;
    --font: 'Roboto', sans-serif;
    --shadow: rgba(0, 0, 0, 0.15);
    --card-transparent: rgba(255, 255, 255, 0.35);
    --card-bg: rgba(252, 252, 252, 1);
    --modal-bg: rgba(0, 0, 0, 0.60);
    --tab-shadow: rgba(0, 0, 0, 0.12);
}

html{
     scroll-padding-top: 6rem;
}


body {
    font-family: var(--font) !important;
}

b {
    color: var(--black);
}

p {
    color: var(--text);
}

body h1,
body h2,
body h3,
body h4,
body h5,
body h6 {
    color: var(--black);
}

label {
    text-align: left;
    font-size: 16px;
    font-weight: 500;
    color: var(--black);
}

label a {
    color: var(--black);
}

label a:hover {
    color: var(--primary);
}

.at-checkbox input[type=checkbox]+label:before,
.at-radio input[type=radio]+label:before {
    border-radius: 4px;
}

.at-radio input[type=radio]+label:after,
.at-checkbox input[type=checkbox]+label:after {
    border-radius: 4px;
}

input:checked {
    background-color: var(--primary);
    border-color: var(--primary);
}

.hidden {
    display: none !important;
}

textarea,
select,
.at-select select,
.form-control,
input[type="text"],
input[type="password"],
input[type="datetime"],
input[type="datetime-local"],
input[type="date"],
input[type="month"],
input[type="time"],
input[type="week"],
input[type="number"],
input[type="email"],
input[type="url"],
input[type="search"],
input[type="tel"],
input[type="color"],
.uneditable-input {
    border-radius: 8px;
    border-color: var(--shadow);
}

.btn:focus {
    box-shadow: none !important;
}

input:focus,
.select select:focus,
.form-control:focus {
    border-color: var(--primary);
}



.owl-nav {
    display: flex;
    width: 100%;
    justify-content: space-between;
    position: absolute;
    top: 40%;
}

.owl-nav .owl-prev {
    margin-left: 15px;
}

.owl-nav .owl-next {
    margin-right: 15px;
}

.owl-nav .owl-prev,
.owl-nav .owl-next {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    border: 1px solid var(--shadow);
    background: var(--white);
}

.owl-nav .owl-prev:hover,
.owl-nav .owl-next:hover {
    border: 1px solid var(--black);
}

.owl-nav .owl-prev svg,
.owl-nav .owl-next svg {
    width: 14px;
    height: 14px;
}

.owl-dot {
    z-index: 9;
    width: 12px;
    height: 12px;
    margin: 0 7px;
    background: var(--shadow);
}

.owl-dot.active {
    background: var(--black);
}

.at-sectiontitle {
    padding-bottom: 0px;
}

.at-sectiontitle::after {
    display: none;
}

.at-sectionhead .at-description p {
    margin: 0px auto;
    margin-bottom: 32px;
    max-width: 600px;
}

.btn-main {
    background: var(--primary);
    color: var(--white);
    padding: 15px 32px;
    border-radius: 50px;
    border: 0px;
    font-weight: 500;
}

.btn-main:hover {
    /* background: var(--black); */
    color: var(--white);
}

.btn-main:focus {
    box-shadow: none;
}

.btn-main-2 {
    background: var(--primary);
    color: var(--white);
    padding: 12px 28px;
    border-radius: 15px;
    border: 0px;
    font-weight: 500;
}

.btn-main-2:hover {
    /* background: var(--primary); */
    color: var(--white);
}

.btn-main-3 {
    background: var(--secondary);
    color: var(--white);
    padding: 12px 28px;
    border-radius: 15px;
    border: 0px;
    font-weight: 500;
}

.btn-main-3:hover {
    /* background: var(--primary); */
    color: var(--white);
}

.tn-main-2:focus {
    box-shadow: none;
}

.fixed-top {
    position: fixed !important;
}

.dropdown_filter {
    display: none;
}

.dropdown_filter {
    padding: 15px;
    border-radius: 15px;
    background: var(--white);
    top: 86px;
    left: 0;
    z-index: 2;
    width: 100%;
    box-shadow: 0px 8px 40px 0px var(--shadow);
}

.btn-icon-xl {
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0px;
    border-radius: 8px;
    color: var(--white);
}

.at-pagination ul li a {
    color: var(--black);
    width: 40px;
    height: 40px;
    background: var(--white);
    line-height: 40px;
    border-radius: 50px;
    border: 1px solid var(--shadow);
}

.at-pagination ul li.at-active a,
.at-pagination ul li.at-active span {
    color: var(--white);
    border-color: var(--primary);
    background: var(--primary);
}

.at-pagination ul li a:hover {
    color: var(--white);
    border-color: var(--primary);
    background: var(--primary);
}

header#at-header {
    background: var(--primary);
}

.at-footerbottom {
    background: var(--primary);
}

.at-copyrights {
    color: var(--white);
    font-family: var(--font);
}

.at-header .at-logo {
    padding: 15px 0;
}

.at-navigation>ul>li {
    margin-right: 18px;
}

.at-navigation>ul>li:last-child {
    margin-right: 0px;
}

.at-navigation ul li a {
    color: var(--white);
}

#registr-login{
    text-decoration: none;

}
.at-navigation>ul>li>a:hover {
    background: var(--white);
    color: var(--black);
}

.at-navigation ul li.nav-item.login a {
    background: var(--white);
    color: var(--black);
}

.at-navigation ul li.nav-item.login a:hover {
    background: var(--black);
    color: var(--white);
}

.at-navigation>ul>li>a:after {
    display: none;
}

.at-navigation>ul>li>a,
.at-navigation>ul>li:last-child>a {
    background: transparent;
    color: var(--white);
    padding: 15px 18px;
    border-radius: 50px;
}

.at-leftarea .search {
    position: relative;
}

.at-leftarea .search .icon {
    position: absolute;
    left: 12px;
    top: 12px;
}

.at-leftarea .search .icon i {
    color: #fff;
    font-size: 18px;
}

.at-leftarea .at-logo {
    margin-right: 30px;
}

.at-leftarea .locat {
    margin-right: 45px;
}

.at-leftarea .locat .icon i {
    color: #fff;
    font-size: 18px;
    margin-right: 10px;
}

.at-leftarea .locat span {
    color: #fff;
    font-size: 16px;
}

.at-leftarea .search input {
    background: transparent;
    color: #fff;
    border: none;
    border-bottom: 1px solid #fff;
    border-radius: 0px;
    padding-left: 45px;
    font-size: 16px;
}

.at-leftarea .search input::placeholder {
    color: #fff;
}

.at-leftarea .search input:focus {
    box-shadow: none;
}

.at-navigation>ul>.active a {
    background: var(--white);
    color: var(--black);
}

.header-cover {
    width: 100%;
    height: 90px;
}

.at-header {
    z-index: 99;
}

.at-header .user-drop {
    width: 48px;
    height: 48px;
    background: var(--white);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.at-header ul .nav-item {
    position: relative;
}

.at-header .user-dropdown {
    position: absolute;
    right: 0;
    top: 56px;
    padding: 15px;
    border-radius: 15px;
    background: var(--white);
    width: 166px;
    box-shadow: 0px 8px 40px 0px var(--shadow);
}

.at-header .user-dropdown ul {
    margin: 0px;
}

.at-header .user-dropdown ul li {
    list-style: none;
    padding: 10px 15px;
    border-radius: 8px;
    cursor: pointer;
}

.at-header .user-dropdown ul li:hover {
    background: var(--shadow);
}

.at-header .user-dropdown ul li a {
    font-weight: 500;
    color: var(--black);
}

.at-header .user-drop span {
    font-size: 18px;
    color: var(--black);
}

.at-homefilter {
    padding: 80px 0px;
    background-repeat: no-repeat !important;
    background-position: center !important;
    background-size: cover !important;
}

.card-transparent {
    padding: 20px;
    border-radius: 15px;
    background: var(--card-transparent);
    box-shadow: 0px 8px 40px 0px var(--shadow);
}

.inner-card {
    padding: 20px;
    border-radius: 15px;
    background: var(--white);
}

.at-homefilter .inner-card label {
    margin-bottom: 5px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

#dropdownLocation .nav .nav-item {
    list-style: none;
    padding: 5px 15px;
    border-radius: 8px;
    cursor: pointer;
}

#dropdownLocation .nav .nav-item:hover {
    background: var(--shadow);
}

#dropdownLocation .nav .nav-item span {
    font-weight: 500;
    color: var(--black);
}

#dropdownCheckIn {
    width: 830px;
    left: -267px;
}

#dropdownCheckIn .lightpick {
    position: unset;
}

.lightpick__day.is-in-range,
.lightpick__day:not(.is-disabled):hover,
.lightpick__day.lightpick__day.is-in-range:not(.is-disabled) {
    background: var(--primary);
    border-color: var(--primary);
}

#dropdownGuests {
    width: 410px;
}

#dropdownGuests .select_guest {
    padding: 10px 10px;
    border-bottom: 1px solid var(--shadow);
}

#dropdownGuests .col-12:last-child .select_guest {
    border: unset;
}

#dropdownGuests .select_guest .count_box {
    display: flex;
    align-items: center;
    justify-content: end;
}

#dropdownGuests .select_guest .count_box .box_value {
    margin: 0px 10px;
    width: 24px;
    text-align: center;
}

#dropdownGuests .select_guest .count_box .btn-box {
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid var(--black);
    color: var(--black);
    background: var(--white);
    border-radius: 50%;
    opacity: 0.4;
    cursor: pointer;
}

#dropdownGuests .select_guest .count_box .btn-box:hover {
    opacity: 1;
}

.at-activity,
.at-latest-offer,
.at-categories,
.at-welcome,
.at-road,
.at-footer,
.at-vendor,
.at-term,
.at-contact,
.at-address,
.at-section {
    padding: 50px 0 30px 0px;
}

.at-tittel_banner {
    padding: 100px 0px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.at-tittel_banner h2 {
    color: var(--white);
}

.activity_slide .item {
    padding: 0px 10px;
}

.activity_slide .item a .activity_li {
    opacity: 0.6;
}

.activity_slide .item a:hover .activity_li {
    opacity: 1;
}

.activity_slide .item .activity_li .icon {
    display: flex;
    align-items: center;
    justify-content: center;
}

.activity_slide .item .activity_li .icon img {
    width: 52px;
    height: 52px;
}

.activity_slide .item .activity_li .acttivity_type {
    text-align: center;
    margin-top: 5px;
}

.activity_slide .item .activity_li .acttivity_type span {
    color: var(--black);
    font-size: 14px;
    font-style: normal;
    font-weight: 500;
    letter-spacing: 0.1px;
}

.at-latest-offer .offers_slider .offer-item {
    padding: 7.5px;
}

.at-latest-offer .offers_slider .offer-item a {
    margin: 10px;
}

.at-latest-offer .offers_slider .offer-item .offer_box img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 15px;
}

.at-latest-offer .offers_slider .offer-item a:hover {
    box-shadow: 0px 8px 40px 0px var(--shadow);
}

.at-latest-offer .offers_slider .owl-dots,
.categories-item .owl-dots {
    margin-top: 0px;
}

.at-categories .categories-item {
    padding: 7.5px;
}

.at-categories .categories-item a {
    color: var(--black);
}

.card {
    border-radius: 10px;
    border: none !important;
}

.card .thumbnail img {
    width: 100%;
    height: 145px;
    object-fit: cover;
    border-radius: 10px 10px 0px 0px;
}

.card .card-body {
    padding: 20px;
}

.at-categories .categories-item .card .card-body p {
    margin-bottom: 15px;
}

.at-categories .categories-item a:hover h5 {
    color: var(--primary);
}

.btn-arrow {
    padding: 0px;
    font-size: 18px;
}

.btn-arrow:hover span {
    color: var(--primary);
}

.at-categories {
    position: relative;
}

.bg-patten {
    position: absolute;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
}

.bg-patten .top-left,
.bg-patten .bottom-right {
    position: absolute;
}

.bg-patten .top-left {
    top: 0;
    left: 0;
}

.bg-patten .bottom-right {
    bottom: 0;
    right: 0;
}

.welcome_list {
    display: flex;
    align-items: center;
}

.welcome_list .icon {
    margin-right: 10px;
}

.welcome_list .icon span {
    color: var(--primary);
}

.welcome_list .list_text p {
    margin-bottom: 0px;
}

.at-content ul li {
    list-style: none;
    margin-bottom: 5px;
}

.at-content b {
    display: block;
    font-size: 16px;
}

.at-welcome .welcome_box {
    border-radius: 15px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.at-Listing {
    padding: 50px 0px;
}

.Listings_card .thumbnail {
    position: relative;
}

.Listings_card .thumbnail,
.Listings_card .thumbnail .thumbnail_slider,
.Listings_card .thumbnail .thumbnail_slider .item,
.Listings_card .thumbnail .thumbnail_slider .item .list_img {
    width: 100%;
    height: 225px;
}

.Listings_card .thumbnail .thumbnail_slider .item {
    border-radius: 10px;
}

.Listings_card .thumbnail .thumbnail_slider .item .list_img {
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    border-radius: 10px;
}

.Listings_card .thumbnail .thumbnail_slider .owl-stage {
    display: flex;
    flex-direction: row;
    /* Set flex-direction to column */
}

.Listings_card .thumbnail .thumbnail_slider .owl-item {
    opacity: 0;
}

.Listings_card .thumbnail .thumbnail_slider .owl-item.active {
    opacity: 1;
    transition: all 2s;
}

.Listings_card .thumbnail .thumbnail_slider .owl-nav {
    display: none;
}

.Listings_card .thumbnail .thumbnail_slider .owl-dots {
    position: absolute;
    bottom: 15px;
}

.Listings_card .thumbnail .thumbnail_slider .owl-dot {
    background: var(--white);
    opacity: 0.6;
    width: 10px;
    height: 10px;
    margin: 0 5px;
}

.Listings_card .thumbnail .thumbnail_slider .owl-dot.active {
    opacity: 1;
}

.Listings_card .thumbnail .prime_icon {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
}

.Listings_card .thumbnail .prime_icon img {
    width: 40px;
    height: 40px;
    border-radius: 10px 0 0 0;
}

.Listings_card .thumbnail .top_control {
    position: absolute;
    width: 100%;
    padding: 20px;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    z-index: 2;
}

.Listings_card .thumbnail .top_control .badge-listing {
    padding: 6px 12px;
    font-size: 12px;
    color: var(--black);
    font-weight: 500;
    background: var(--white);
    border-radius: 30px;
}

.Listings_card .thumbnail .top_control .like_icon span {
    -webkit-text-stroke: 0.5px var(--white);
    text-stroke: 0.5px var(--white);
    color: var(--black);
    font-size: 16px;
    cursor: pointer;
}

.Listings_card .list-info {
    display: flex;
    align-items: start;
    justify-content: space-between;
    margin-bottom: 20px;
}

.Listings_card .list-info .info a h5 {
    margin-bottom: 0px;
    font-size: 14px !important;
}

.Listings_card .list-info .info a:hover h5 {
    color: var(--primary);
}

.Listings_card .list-info .info p {
    margin-bottom: 0px;
}

.Listings_card .list-info .review {
    display: flex;
    align-items: center;
    justify-content: end;
}

.Listings_card .list-info .review span {
    color: var(--black);
}

.Listings_card .list-info .review .icon {
    margin-right: 5px;
}

.Listings_card {
    margin-bottom: 25px;
}

.Listings_card .card {
    border: none;
}

.Listings_card .card .card-body {
    padding-left: 0px;
    padding-right: 0px;
}

.col-md-4:last-child .Listings_card,
.col-md-3:last-child .Listings_card {
    margin-bottom: 0px;
}

/* .at-Listing .row{
    margin-left: -7.5px;
    margin-right: -7.5px ;
}

.at-Listing .row .col-md-4,
.at-Listing .row .col-md-3{
    padding: 7.5px;
    padding: 7.5px ;
} */

.at-model-section .welcome_list {
    align-items: start;
}

.at-registration {
    padding: 50px 0px;
}

.at-registration .at-sectiontitle h2 {
    padding-bottom: 10px;
    border-bottom: 1px solid var(--black);
    width: auto;
}

.at-registration .at-sectiontitle {
    float: left;
    width: auto;
    position: relative;
    margin-bottom: 23px;
    padding-bottom: 17px;
    margin: 0px 24.5%;
    margin-bottom: 30px;
    text-align: center;
}

.at-model-section {
    position: relative;
}

.bg_2_with_patten {
    position: absolute;
    top: 0;
    left: 0;
    width: 65%;
    height: 100%;
    z-index: -1;
}

.bg_2_with_patten .patten_01,
.bg_2_with_patten .patten_02 {
    position: absolute;
    right: -132px;
    z-index: 0;
}

.bg_2_with_patten .patten_01 {
    top: -26px;
}

.bg_2_with_patten .patten_02 {
    bottom: -37px;
}

.at-model-section .bg_2_with_patten .bg_75 {
    background: #E2EED5;
    width: 100%;
    height: 100%;
    position: absolute;
    z-index: 1;
}

.at-road .Listings_card .thumbnail,
.at-road .Listings_card .thumbnail .thumbnail_slider,
.at-road .Listings_card .thumbnail .thumbnail_slider .item,
.at-road .Listings_card .thumbnail .thumbnail_slider .item .list_img {
    height: 250px;
}

.at-road .Listings_card {
    margin-bottom: 0px;
}

.at-footer {
    background: var(--white);
    border-top: 1px solid var(--shadow);
}

.at-fthreecolumn {
    padding: 0px 0;
}

.top_copyright {
    display: flex;
    align-items: center;
    margin-top: 30px;
    justify-content: center;
}

.top_copyright .copy_right {
    margin-right: 20px;
}

.top_copyright .copy_right p {
    color: var(--black);
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 157%;
    letter-spacing: 0.1px;
}

.top_copyright .copy_right p a {
    text-decoration: none;
    color: var(--primary);
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 157%;
    letter-spacing: 0.1px;
}

.top_copyright .copy_right p a:hover {
    color: var(--primary);
}

.top_copyright .copy_right_nav ul li {
    list-style-type: none;
}

.top_copyright .copy_right_nav ul li a {
    color: var(--black);
    font-size: 15px;
    font-style: normal;
    font-weight: 400;
    line-height: 157%;
    letter-spacing: 0.1px;
    display: flex;
    align-items: center;
}

.top_copyright .copy_right_nav ul li a:hover {
    color: var(--primary);
}

.top_copyright .copy_right_nav ul li a .icon {
    margin-right: 6px;
    margin-top: -7px;
}

.top_copyright .copy_right_nav ul li a .icon span {
    font-size: 5px;
    color: var(--black);
}

.top_copyright .copy_right_nav ul li a:hover .icon span {
    color: var(--black);
}

.footer_main_nav h5 {
    color: #578327;
    font-size: 20px;
    font-style: normal;
    font-weight: 700;
    line-height: 121%;
    letter-spacing: 0.1px;
}

.footer_main_nav ul li {
    list-style: none;
}

.footer_main_nav ul li a {
    padding-left: 0px;
    color: var(--black);
    font-size: 15px;
    font-style: normal;
    font-weight: 400;
    line-height: 157%;
    letter-spacing: 0.1px;
}

.footer_main_nav ul li a:hover {
    color: var(--primary);
}

.modal {
    padding-top: 91px;
    background: var(--modal-bg);
}

.modal-content {
    background: transparent;
    border: none;
}

.modal-content .card {
    border-radius: 15px;
}

.modal-content .card .modal_tab {
    background: var(--white);
    box-shadow: 0px 8px 15px 0px var(--tab-shadow);
    border-radius: 15px 15px 0px 0px;
}

.modal-content .card .modal_tab ul {
    display: flex;
    align-items: center;
}

.modal-content .card .modal_tab ul li {
    list-style: none;
    width: 100%;
}

.modal-content .card .modal_tab ul li button {
    text-align: center;
    padding: 12px 25px;
    width: 100%;
    background: transparent;
    color: var(--black);
    font-size: 15px;
    font-style: normal;
    font-weight: 600;
    line-height: 26px;
    letter-spacing: 0.46px;
    text-transform: capitalize;
    border: none;
    outline: none;
}

.modal-content .card .modal_tab ul .active button,
.modal-content .card .modal_tab ul li button:hover {
    background: var(--primary);
    color: var(--white);
}

.modal-content .card .modal_tab ul li:first-child button {
    border-radius: 14px 0px 0px 0px;
}

.modal-content .card .modal_tab ul li:last-child button {
    border-radius: 0px 14px 0px 0px;
}

.modal-content .card .card-body {
    padding: 25px;
}

.otp_form-group {
    display: flex;
    align-items: center;
    width: 343px;
    margin: 0px 12%;
    justify-content: center;
}

.vendor_divider {
    height: 100%;
}

.vendor_divider .divider {
    height: 100%;
    position: relative;
}

.vendor_divider .divider .hr_y {
    width: 1px;
    height: 85vh;
    background: var(--shadow);
    margin: 0px auto;
}

.vendor_divider .divider .or {
    position: absolute;
    top: 172px;
    left: 7px;
    width: 50px;
    height: 50px;
    background: var(--white);
    border-radius: 50%;
    border: 1px solid var(--shadow);
    display: flex;
    align-items: center;
    justify-content: center;
}

.vendor_divider .divider .or span {
    font-size: 14px;
    color: var(--shadow);

}

.at-term ul li {
    list-style: none;
    display: flex;
    align-items: center;
}

.at-term ul li .icon {
    margin-right: 10px;
}

.at-term ul li .icon span {
    font-size: 6px;
    line-height: 6;
}

#main #faq .card {
    margin-bottom: 0px;
    border: 0;
    border-bottom: 1px solid var(--shadow) !important;
    border-radius: 0px;
}

#main #faq .card .card-header {
    border: 0;
    border-radius: 2px;
    padding: 0;
}

#main #faq .card .card-header .btn-header-link {
    display: block;
    text-align: left;
    color: var(--black);
    padding: 15px 20px;
    background: var(--white);
    font-weight: 600;
}

#main #faq .card .card-header .btn-header-link:after {
    content: "\f107";
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    float: right;
}

#main #faq .card .card-header .btn-header-link.collapsed:after {
    content: "\f106";
}

#main #faq .card .collapsing {
    line-height: 30px;
}

#main #faq .card .collapse {
    border: 0;
}

#main #faq .card .collapse.show {
    line-height: 30px;
    color: var(--black);
}

#main #faq .card-body {
    padding: 15px 20px;
}



.accordion_tab {
    background: var(--white);
    box-shadow: 0px 2px 11px 0px var(--tab-shadow);
    border-radius: 15px;
    margin: 10px;
    margin-top: 0px;
}

.accordion_tab ul {
    display: flex;
    align-items: center;
}

.accordion_tab ul li {
    list-style: none;
    width: 100%;
}

.accordion_tab ul li button {
    text-align: center;
    padding: 12px 25px;
    width: 100%;
    background: transparent;
    color: var(--black);
    font-size: 15px;
    font-style: normal;
    font-weight: 600;
    line-height: 26px;
    letter-spacing: 0.46px;
    text-transform: capitalize;
    border: none;
    outline: none;
}

.accordion_tab ul .active button,
.accordion_tab ul li button:hover {
    background: var(--primary);
    color: var(--white);
}

.accordion_tab ul li button,
.accordion_tab ul li button:hover {
    border-radius: 14px 0px 0px 14px !important;
}

.accordion_tab ul li:first-child button,
.accordion_tab ul li:first-child button:hover {
    border-radius: 14px 0px 0px 14px !important;
}

.accordion_tab ul li:last-child button,
.accordion_tab ul li:last-child button:hover {
    border-radius: 0px 14px 14px 0px !important;
}

.at-contact .card {
    border: 1px solid var(--shadow);
    box-shadow: 0px 4px 20px 0px var(--shadow);
    border-radius: 15px;
}

.at-contact .card .card-body {
    padding: 30px;
}

.contact_tittel h1 {
    color: var(--black);
    font-size: 36px;
    font-style: normal;
    line-height: 1em;
}

.contact_tittel .tittel-hr {
    width: 30px;
    height: 5px;
    border-radius: 5px;
    background: var(--primary);
    margin: 0px auto;
    margin: 15px auto;
}

.at-address {
    position: relative;
}

.at-address .address-inner {
    position: absolute;
    width: 100%;
    top: 0;
    left: 0;
    z-index: 1;
}

.at-address .address-inner .card {
    border: 1px solid var(--shadow);
    box-shadow: 0px 4px 20px 0px var(--shadow);
    border-radius: 15px;
}

.at-address .address-inner .card .card-body {
    padding: 30px;
}

.at-address .address-inner .card .card-body .icon img {
    height: 45px;
    width: auto;
    margin-bottom: 5px;
}

.at-address {
    padding-bottom: 27px;
}

.at-section .card {
    border: 1px solid var(--shadow);
    box-shadow: 0px 4px 20px 0px var(--shadow);
    border-radius: 15px;
}

.at-section .card .card-body {
    padding: 0px;
}

.at-section .user-detail {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px;
    border-bottom: 1px solid var(--shadow);
}

.at-section .user-detail .user-left {
    display: flex;
    align-items: center;
}

.at-section .user-detail .user-img {
    width: 70px;
    height: 70px;
    border: 1px solid var(--shadow);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    margin-right: 15px;
}

.at-section .user-detail .user-img img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
}

.at-section .user-detail .user-img .user-status {
    width: 20px;
    height: 20px;
    background: var(--primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    bottom: 0;
    left: 5px;
}

.at-section .user-detail .user-img .user-status span {
    color: var(--white);
    font-size: 10px;
    margin-top: 2px;
}

.at-section .user-detail .user-info .full-review {
    display: flex;
    align-items: center;
}

.at-section .user-detail .user-info .full-review .review {
    margin-right: 5px;
}

.at-section .user-detail .user-info .full-review .review ul {
    display: flex;
    align-items: center;
}

.at-section .user-detail .user-info .full-review .review ul li {
    list-style-type: none;
    margin-right: 3px;
}

.at-section .user-detail .user-info .full-review .review ul li span {
    font-size: 12px;
}

.at-section .user-detail .user-info h5 {
    font-size: 18px;
    margin-bottom: 0px;
}

.at-section .user-detail .user-info b {
    margin-top: 5px;
}

.at-section .x-nav {
    padding: 20px;
}

.at-section .x-nav ul li {
    list-style-type: none;
}

.at-section .x-nav ul li a {
    display: flex;
    align-items: center;
    border-radius: 8px;
    position: relative;
    color: var(--text);
}

.at-section .x-nav ul li a .link-text {
    font-weight: 500;
}

.at-section .x-nav ul li a:hover,
.at-section .x-nav ul li a.active {
    background: var(--primary);
    color: var(--white);
}


.at-section .x-nav ul li a .icon {
    margin-right: 10px;
    color: var(--black);
}

.at-section .x-nav ul li a .icon span {
    font-size: 16px;
    font-weight: none;
}

.at-section .x-nav ul li a:hover .icon,
.at-section .x-nav ul li a.active .icon {
    color: var(--white);
}

.at-section .x-nav ul li a .active-hr {
    position: absolute;
    content: '';
    left: 0;
    top: 0;
    width: 5px;
    height: 20px;
    border-radius: 3px;
    background: var(--black);
    margin: 11px 0px;
    opacity: 0;
}

.at-section .x-nav ul li a:hover .active-hr,
.at-section .x-nav ul li a.active .active-hr {
    opacity: 1;
    transform: all 3s;
}

.at-section-content .card .card-body {
    padding: 20px;
}

.at-section-content .upload-card {
    box-shadow: none;
    border: 1px solid var(--shadow) !important;
    background: var(--card-bg);
}

.at-section-content .upload-card .upload-wrap {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px;
    border-radius: 10px;
    border: 2px dashed var(--shadow);


}

.at-section-content .upload-card .upload-wrap .file-wrap {
    display: flex;
    align-items: center;
}

.at-section-content .upload-card .upload-wrap .file-wrap button {
    margin-right: 30px;
}

.at-section-content .upload-card .upload-wrap .status span {
    color: var(--text);
    font-family: Roboto;
    font-size: 16px;
    font-weight: 500;
}

.at-section-content .upload-card .Upload-perview img{
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 10px;
}

.at-section-content .notification-card{
    padding: 15px;
    border-radius: 10px;
    box-shadow: unset;
    border: 2px solid var(--shadow) !important;
    cursor: pointer;
}

.at-section-content .notification-card.active,
.at-section-content .notification-card:hover{
    border: 2px solid var(--shadow) !important;
    background: var(--card-bg);
}

.at-section-content .booking-card .booking-info,
.at-section-content .booking-card .family-info,
.at-section-content .booking-card .price-info{
    border-right: 1px solid var(--shadow);
}

.at-section-content .booking-card .booking-info{
    display: flex;
    align-items: center;
}
.at-section-content .booking-card .booking-info b,
.at-section-content .booking-card .booking-info span{
    display: block;
    width: 100%;
}

.at-section-content .booking-card .booking-info .place-img{
    width: 70px;
    height: 70px;
    border: 1px solid var(--shadow);
    border-radius: 0%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
}

.at-section-content .booking-card .booking-info .place-img img{
    width: 60px;
    height: 60px;
    border-radius: 0;
    object-fit: cover;
}

.at-section-content .booking_ditails .table_cols{
    border-bottom: 1px solid var(--shadow) !important;
}

.at-section-content .booking_ditails .table_cols .link-text{
    color: var(--primary);
}

.at-section-content .btn-icon-xl{
    width: 47px;
    height: 47px;
    font-size: 18px;
    border-radius: 15px;
}

.at-section-content .notification-card .place-img{
    position: relative;
}
.at-section-content .notification-card .place-img,
.at-section-content .notification-card .place-img img{
    border-radius: 50% !important;
}

.at-section-content .notification-card a .place-info span{
    color: var(--text);
}

.at-section-content .notification-card .link-text{
    color: var(--primary);
}






#button-77 {

  background-color: transparent;
  color: #fff;
  font-size: 14px;
  font-weight: 500;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px 20px;
  background: #fff;
  border-radius: 80px;
  color: #7CB342;
  transition: all 0.5s;
  border: 3px solid #fff;
}
#button-77:hover{
    background-color: #7CB342;
    color: #fff;
}


/* Hot Deals */

.deals-breadcrump{
    background: transparent;
    list-style: none;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    list-style: none;
}
.deals-breadcrump li{
    list-style: none;
    width: unset;
}
.btn-groups{
    display: flex;
    justify-content: flex-start;
    align-items: center;
}
.btn-groups ul{
    display: flex;
    list-style: none;

}
.btn-groups ul li{
    list-style: none;

}
.grp-btn{
    background-color: transparent;
  color: #fff;
  font-size: 13px;
  font-weight: 500;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 7px 25px;
  background: #7CB342;
  border-radius: 80px;
  transition: all 0.5s;
  border: 3px solid #fff;
  text-decoration: none;

  border: 1px solid #7CB342;
}
.grp-btn-1{
  font-size: 13px;
  font-weight: 500;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 6px 22px;
  background: #fff;
  border-radius: 80px;
  transition: all 0.5s;
  text-decoration: none;
  border: 1px solid #7CB342;
  margin-left: 5px;
  color: #7CB342;
  transition: all .5s;
}
.grp-btn-1:hover,.deals-inp:hover{
background: #7CB342;
color: #fff;
}
.deals-inp{
    border: 1px solid #7CB342;
    background: #fff;
    padding: 10px 15px;
    border-radius: 50%;
    margin-left: 5px;
    transition: all .5s;
}
.card-1{
    padding: 10px;
   border-radius: 10px;
   box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
   height: 100%;
}
.cbd-img{
    border-radius: 10px;
    height: 220px;
}
.cbd-2{
    padding: 5px;
}
.card-title-deals{
    font-size: 15px;
    color: #7CB342;
    margin: 5px 0;
}
.spn-1{
    color: orange;
    font-size: 20px;
     margin: 5px;
}
.spn-2{
    color: #222;
    font-size: 20px;
    font-weight: 200;
}

.cbd-2{
    width: 100%;
    height: 280px;
}
.deals-location{
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;

}
.deals-location p{
    margin: 0;
}
.deals-location p i{
    font-size: 20px;
    color: #c0bdbd;
}
.deals-location span{
    font-size: 13px ;
    color: #989696;
}
.deals-price{
    height: 30%;
}
.deals-price-btn{

    border-top: 1px solid #22222230;
    display: flex;
    width: 100%;
    justify-content: space-between;
    align-items: center;
    padding: 5px 0;
}
.delas-price-bx p{
font-size: 20px ;
font-weight: 300;
color: #222;
margin: 0;
}
.delas-price-bx p span{
font-size: 18px ;
font-weight: 500;
}
.delas-price-bx-btn button{
   padding: 10px 20px;
   border: none;
   outline: none;
   background: rgb(124,179,66);
background: linear-gradient(90deg, rgba(124,179,66,1) 0%, rgba(124,179,66,1) 35%, rgba(81,119,42,1) 100%);
   border-radius: 20px;
   color: #fff;
}
.badge {
    width: 100px;
    /* padding: 0.75rem 1rem 0 1.25rem; */
    clip-path: polygon(0 0, 95% 0, 100% 50%, 95% 100%, 0 100%, 5% 50%);
  }

  .badge .name {
    color: #fff;
    font-weight: 400;
    font-size: 12px;
  }



.pagination-bx{
    width: 100%;
    height: 80px;
    display: flex;
    justify-content: center;
    align-items: center;
}
 .page-item{
    list-style: none;
 }





 /* Details Section */
 .main-name,.share-icnz {
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
    gap: 20px;
 }
 .main-name h2{
    font-size: 30px;
 }
 .main-name span{
    width: 90px;
    height: 25px;
    padding: 5px;
    background-color: #7CB342;
    display: flex;
    justify-content: space-around;
    align-items: center;
    color: #fff;
    border-radius: 50px;
    font-size: 12px;
 }
 .share-icnz span{
    margin-right: 5px;
 }


 img {
    max-width: 100%;
    vertical-align: top;
}
.botom-img{
    width: 154px;
    height: 100px;
    border-radius: 10px;
    max-width: 100%;
    vertical-align: top;
}
.gallery {
    display: flex;
    width: 100%;
    margin: 10px auto;
    position: relative;
    padding-top:0;
}

    .gallery {
        padding-top: 370px;
   }

.gallery__img {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
    border-radius: 15px;
    height: 75%;
    width: 90%;
}
.gallery__thumb {
    padding-top: 6px;
    margin: 6px;
    display: block;
}
.gallery__selector {
    position: absolute;
    opacity: 0;
    visibility: hidden;
}
.gallery__selector:checked + .gallery__img {
    opacity: 1;
}
.gallery__selector:checked ~ .gallery__thumb > img {
    box-shadow: 0 0 0 3px #4a5455;
}


.main-details{
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
    gap: 5px;
}
.main-details h3{
    margin: 0;
    font-size: 27px;
}
.main-details p{
    margin: 0;
    font-size: 12px;
}

.details-tabs {
    position: relative;
    margin: 3rem 0;
    height: 14.75rem;
  }
  .details-tabs::before,
  .details-tabs::after {
    content: "";
    display: table;
  }
  .details-tabs::after {
    clear: both;
  }
  .details-tab {
    float: left;
  }
  .details-tab-switch{
    display: none;
  }
  .details-tab-label {
    position: relative;
    display: block;
    line-height: 2.75em;
    height: 3em;
    padding: 0 20px 0 0;
    color: #222;
    cursor: pointer;
    top: 0;
    transition: all 0.25s;
    font-weight: 500;

    border-bottom: 1px solid #222;
  }

  .details-tab-content{
    height: 12rem;
    position: absolute;
    z-index: 1;
    top: 2.75em;
    left: 0;
    padding: 20px 60px 10px 0 ;
    color: #2c3e50;
    opacity: 0;
    transition: all 0.35s;
    margin-top: 20px;
  }
  .details-tab-switch:checked + .details-tab-label {
    background: #fff;
    color: #7CB342;
    transition: all 0.35s;
    z-index: 1;
  }
  .details-tab-switch:checked + label + .details-tab-content {
    z-index: 2;
    opacity: 1;

    transition: all 0.35s;
  }
  .details-table th,.details-table td{
    text-align: left;

  }
  .details-table-2 th,.details-table-2 td{
    text-align: left;
    border: 0;
    padding: 0;
    height: 2px;
    border-top: none;
  }
  .details-table-2 td i{
    font-size: 15px;
    margin-right: 10px;
  }
  .details-activities ul li{
    list-style: none;
  }
  .details-activities-img-bx{
    width: 100%;
    height: 170px;
    border-radius: 10px;
    overflow: hidden;
  }
  .details-activities-img-bx img{
    width: 100%;
    height: 100%;
    object-fit: cover;

    border-radius:10px;
  }
  .details-activities p span{
    font-size: 18px ;
    font-weight: 500;
    color: #222;
    margin-right: 10px;
  }
  .details-activities p{
    font-weight: 500;
    color: #222;
  }
  .details-terms-condition{
background: #f2f2f2;
border-radius: 5px;
  }
  .details-terms-condition ul li{
    list-style: none;
  }

.terms-btn{
    padding: 10px 20px ;
    border: none;
    outline: none;
    background-color: #222;
    color: #fff;
    border-radius: 20px;
    width: 200px;
}
.details-terms-img-bx{
    width: 100%;
    height: 220px;
    border-radius: 10px;
    overflow: hidden;
}
.details-terms-img-bx img{
    width: 100%;
    height: 100%;
    object-fit: cover;

    border-radius:5px;
}

.review-img-box{
    width: 70px;
    height: 70px;
    background: #7CB342;
   border-radius: 50%;
   padding: 2px;
   display: flex;
   justify-content: center;
   align-items: center;

}
.review-img-box img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}
.main-review{
    width: 100%;
}
.main-review p{
    margin: 0;
    font-size: 12px;
}
.spn-star-review{
    color: orange;
}
.review-btn{
    padding: 10px 20px ;
    border: none;
    outline: none;
    background-color: #fff;
    border: 2px solid #222;
    color: #222;
    border-radius: 20px;
    width: 180px;
}
.near-location ul li{
    font-size: 13px;
    color: #000;
}
.near-location-2 ul li{
    list-style: none;
    font-size: 12px;
    color: #000;
}
.near-location-p{
    font-size: 14px;
    margin: 0;
    font-weight: 500;
    color: #000;
    margin-bottom: 5px;
}
.reserv-bx{
    width: 100%;
    height: 100%;
    border-radius: 15px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    padding: 10px;


}
.reserv-bx-1{
    display: flex;
    justify-content: flex-start;
    align-items: center;
    gap: 20px;
    padding: 10px 15px;
    height: 80px;
    width: 100%;
}
.reserv-bx-1 strike{
font-size: 27px;
}
.reserv-bx-1 p{
    margin: 0;
    font-size: 27px;
    color: #000;
}
.reserv-bx-1 p span{
    font-size: 13px;
    color: #b3afaf;
    margin-left: 8px;
}
.reserv-bx-2{
    border: 1px solid #aeaeae8b;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    margin-top: 10px;
}
.reserv-check{
    display: flex;
    width: 100%;
    height: 60px;
    justify-content: space-around;
    align-items: center;
    gap: 20px;
    border-bottom: 1px solid #aeaeae8b;
}
.value_box-2{
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.reserv-btn{
    width: 100%;
    border-radius: 8px;
    background-color: #7CB342;
    color: #fff;
    border: 0;
    height: 40px;
    outline: 0;
}
.rupees{
    width: 100%;
    padding: 0 10px;
    margin-top: 30px;
}
.rupees p{
    text-decoration: underline;
    margin: 0;
    margin-top: 5px;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.tax{
    margin-top: 10px;
border-top: 1px solid #aeaeae8b;
    height: 40px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0 10px;
}
.tax p{
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 0;
    font-weight: 600;
    color: #000;
}
.reserv-bx-relate
.related-bx{
    width: 100%;
}
.relate-img-bx{
    height: 200px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.relate-img-bx img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px;

}







/* Activity */

.active-cbd-img{
    width: 100%;
    height: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.active-cbd-img img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px;
}
.active-card-text{
    margin: 0;
    font-size:12px;
}
.activity-img-bx-2{
    width: 455px;
    height: 100%;
   display: flex;
   justify-content: center;
   align-items: center;
}
.activity-img-bx-2 img{
    width: 100%;
    height: 100%;
    object-fit: cover;
     border-radius: 10px;
     color: #7CB342;
}

.activity-rules ul li{
    font-size: 15px;
    margin-top: 10px;
  text-align: left;
}
.ar-hde::-webkit-outer-spin-button,
.ar-hde::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

#outer {
    margin-top: 100px;
    width: 100%;
    height: 270px;
    border-radius: 10px;
    overflow: hidden;
    position: relative;
}
.video {
  position: relative;
  left: 0;
  top: 0;
  opacity: 1;
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.activites-details-desc{
   width: 100%;
    height: 100%;
    padding-left: 30px;

}
.activites-details-desc h5{
    font-size: 40px;
    color: #7CB342;
}
.act-desc{
    font-size: 15px;
    line-height: 30px;
    color: #9a9898;
    font-weight: 300;
}
.activity-btn{
    padding: 10px 20px ;
    border: none;
    outline: none;
    background-color: #7CB342;
    color: #fff;
    border-radius: 20px;
    width: 180px;
}


.sec-3-img {
    width: 97%;
    height: 21rem;
    border-radius: 10px;
    overflow: hidden;
    position: relative;
  }
  .sec-3-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .overlay {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgb(34,34,34);
    background: linear-gradient(0deg, rgba(34,34,34,0.6195728291316527) 0%, rgba(34,34,34,0.6111694677871149) 100%);

    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-direction: column;
  }
  .overlay h5 {
    font-size: 1.5rem;
    font-weight: 500;
    color: #fff;
    line-height: 45px;
    margin: 0;
  }
  .trek{
    width: 100%;
    display: flex;
    flex-direction: column;

  }
  .trek p{
    margin: 0;
    color: #fff;
    font-size: 10px;
  }
  .sec-3-btn {
    padding: 5px 25px;
    border: none;
    outline: none;
    background: transparent;
    border-radius: 20px;
    border: 1px solid #fff;
    color: #fff;
    font-weight: 600;
    transition: all 0.5s;
    font-size: 10px;
    font-weight: 400;
  }
  .sec-3-btn:hover {
    background-color: #7CB342;
    color: #fff;
  }



  .Activity-details-form-section{
    height: 100%;
    width: 100%;
  }
  .packagebx{
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }
  .packagebx h3{
   font-size:14px;
   font-weight: 400;
   color: #7b7979;
  }
  .pkg-bx{
    width: 125px;
    height: 250px;
    /* margin-top: 10px; */
    /* margin-bottom: 50px; */
    border-radius: 10px;
    /* box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px; */
    display: flex;
    justify-content: center;
    align-items: flex-start;
    /* background-color: #93c069; */
  }
  .pkg-bx ul{
    list-style: none;
  }
  .pkg-bx ul li{
    list-style: none;
    color: #6e6c6c;
    font-size: 24px;
    font-weight: 400;
    margin: 40px 0;
    /* color: #fff; */
  }
  .pkg-bx ul li:first-child{
    margin-top: 20px;
  }
  .pkg-bx ul li span{
    font-size: 15px;
    margin-left: 5px;
  }
  .other-facilities{
    width: 100%;
    margin: 10px;
    height: 50px;

    display: flex;
    flex-direction: row;
    border-radius: 5px;
  }
  .other-facilities form{
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    flex-wrap: wrap;
    gap: 25px;

  }
  .other-facilities p{
    color: #807b7b;
    margin: 0;
    font-weight: 400;
    font-size: 15px;
  }
  .book-tkt{
    width: 200px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    background-color: #7CB342;
    border-radius: 5px;
    font-size: 13px;

  }


  .tb-pkg tr th,.tb-pkg td{
border: 0;
border-top: 0;
text-align: left;
font-size: 20px;
font-weight: 500;
  }
  .tb-pkg-tb tr th,.tb-pkg-tb td{
    border: 0;
    border-top: 0;
    text-align: left;
    font-size: 20px;
    font-weight: 500;
  }










/* Reviews */





  #testimonials{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width:100%;
}
.testimonial-heading{
    letter-spacing: 1px;
    margin: 30px 0px;
    padding: 10px 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.testimonial-heading span{
    font-size: 1.3rem;
    color: #252525;
    margin-bottom: 10px;
    letter-spacing: 2px;
    text-transform: uppercase;
}
.testimonial-box-container{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    width:100%;
}
.testimonial-box{
    width:100%;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    background-color: #ffffff;
    padding: 10px;
    margin: 15px;
    cursor: pointer;
    border-radius: 20px;
    display: flex;
}
.review-property-img{
    width: 100%;
    height: 250px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.review-property-img img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px;
}
.review-user-name{
    width: 100%;
    height: 80px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding:10px ;
}
.review-profile-img{
    width:50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 10px;
}
.review-profile-img img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}
.profile{
    display: flex;
    align-items: center;
}
.name-user{
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: flex-start;
}
.name-user strong{
    color: #3d3d3d;
    font-size: 1.1rem;
    letter-spacing: 0.5px;
}
.name-user span{
    color: #979797;
    font-size: 0.8rem;
}
.main-reviews-icon{
    color: #f9d71c;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-end;
}
.box-top{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}
.client-comment{

    padding:10px ;
    text-align: left;
}
.client-comment p{
    font-size: 0.8rem;
    color: #939090;
    margin: 0;
}
/* .testimonial-box:hover{
    transform: translateY(-10px);
    transition: all ease 0.3s;
} */



/* Site map */



.tree{
    width: 100%;
    height: 100%;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
}
.tree ul{
padding-top: 20px;
position: relative;
transition: .5s;

}

.tree li{
    display: inline-table;
    text-align: center;
    list-style: none;
    position: relative;
    padding: 10px;
    transition: .5s;

}
.tree li::before, .tree li::after{
    content: '';
    position: absolute;
    top: 0;
    right: 50%;
    border-top: 1px solid #ccc;
    width: 51%;
    height: 10px;
}
.tree li::after{
    right: auto;
    left: 50%;
    border-left: 1px solid #ccc;
}
.tree li:only-child::after, .tree li:only-child::before{
    display: none;
}
.tree li:only-child{
padding-top: 0;
}
.tree li:first-child::before, .tree li:last-child::after{
    border:0 none;
}
.tree li:last-child::before{
    border-right: 1px solid #ccc;
    border-radius: 0px 5px 0px 0px;
}
.tree li:first-child::after{
    border-radius: 5px 0px 0px 0px;
}
.tree ul ul::before{
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    border-left: 1px solid #ccc;
    width: 0;
    height: 20px;

}
.tree a{
    padding: 10px;
    display: inline-grid;
    border-radius: 5px;
    text-decoration-line: none;
    transition: .5s;
}
.tree a span{
    border: 1px solid #ccc;
    border-radius: 5px;
    color: #7CB342;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 500;
    padding:5px 10px;
}
/* .tree li a:hover, .tree li a:hover span,.tree li a:hover+ul li a{
    background-color: #7CB342;
    color: #fff;
} */







/* Message */
.details-scroll ul {
    list-style:none;
    flex-wrap:wrap;
    border-bottom:1px solid #ccc;
    padding-bottom:10px;
}
.details-scroll ul li{
    list-style:none !important;
    /*margin:0px 13px;*/
}
.details-scroll ul li:first-child{
    margin:0 ;
}
.details-scroll ul li a{
    color:#222;
    font-size:17px;
    font-weight:500;
    transition:0.5s;

}
.details-scroll ul li a:hover{
    color:#7cb342;
}
.lc-near-table tr td{
    border:unset !important;
    text-align:left !important;

}
.lc-near-table tr th{
    border:unset !important;
    text-align:left !important;

}
.accordion-button{
    width:100%;
    border:none;
    background:transparent;
    outline:none !important;
    font-size:16px;
    text-align:left;
    font-weight:500;
    color:#3e3d3d;
    display:flex ;
    justify-content:space-between;
    align-items:center;
    height:60px;
}
.accordion-button:after {
	content: "\002B";
	color: #777;
	font-weight: 700;
	float: right;
	margin-left: 5px;
}
.active{
    color:#7cb342;
    font-weight:600;
}
.active:after {
	content: "\2212";
}

.accordion-item{
    border-bottom:1px solid #7cb342;
    padding:0 10px;

}
.acd-table tr th{
    font-size:13px;
    color:#fff;
    border:none;
    background:#7cb342;

}
.dt-s-bx{
    width:200px;
    text-align:left;
}
.acd-table p{
    text-align:left;
}

</style>
<br>
<br>
<br>
<br>
<section class="details-section py-5 h-100 mt-4">
    <div class="container text-left">
      <div class="row">
        <div class="col-lg-9">
          <div class="main-name">
            <h2>Dudely Manor-1BR Cottage W/Pool</h2>
            <span><i class="fa-solid fa-crown"></i>Premium</span>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="share-icnz">
            <a href="#" class="text-muted"
              ><span><i class="fa-solid fa-share-from-square"></i></span>
              Share</a
            >
            <a href="#" class="text-muted"
              ><span><i class="fa-regular fa-heart"></i></span> Saved</a
            >
          </div>
        </div>
      </div>
    </div>
    <div class="container mt-3">
      <div class="row">
        <div class="col-lg-8">
          <div class="container">
            <div class="row">
              <div class="col-12" style="padding: 0">
                <div>
                  <section class="gallery">
                    <div class="gallery__item">
                      <input
                        type="radio"
                        id="img-1"
                        checked
                        name="gallery"
                        class="gallery__selector"
                      />
                      <img
                        class="gallery__img"
                        src="{{ asset('images/farmhouse/fh-img-1.webp')}}"
                        alt=""
                      />
                      <label for="img-1" class="gallery__thumb"
                        ><img
                          src="{{ asset('images/farmhouse/fh-img-1.webp')}}"
                          alt=""
                          class="botom-img"
                      /></label>
                    </div>
                    <div class="gallery__item">
                      <input
                        type="radio"
                        id="img-2"
                        name="gallery"
                        class="gallery__selector"
                      />
                      <img
                        class="gallery__img"
                        src="{{ asset('images/farmhouse/fh-img-2.webp')}}"
                        alt=""
                      />
                      <label for="img-2" class="gallery__thumb"
                        ><img
                          src="{{ asset('images/farmhouse/fh-img-2.webp')}}"
                          alt=""
                          class="botom-img"
                      /></label>
                    </div>
                    <div class="gallery__item">
                      <input
                        type="radio"
                        id="img-3"
                        name="gallery"
                        class="gallery__selector"
                      />
                      <img
                        class="gallery__img"
                        src="{{ asset('images/farmhouse/fh-img-3.webp')}}"
                        alt=""
                      />
                      <label for="img-3" class="gallery__thumb"
                        ><img
                          src="{{ asset('images/farmhouse/fh-img-3.webp')}}"
                          alt=""
                          class="botom-img"
                      /></label>
                    </div>
                    <div class="gallery__item">
                      <input
                        type="radio"
                        id="img-4"
                        name="gallery"
                        class="gallery__selector"
                      />
                      <img
                        class="gallery__img"
                        src="{{ asset('images/farmhouse/fh-img-8.webp')}}"
                        alt=""
                      />
                      <label for="img-4" class="gallery__thumb"
                        ><img
                          src="{{ asset('images/farmhouse/fh-img-8.webp')}}"
                          alt=""
                          class="botom-img"
                      /></label>
                    </div>
                  </section>
                </div>
                <div class="main-details">
                  <h3>Room in Badowala, India</h3>
                  <p>1 Double Bed Private Attached Bathroom</p>
                  <p>
                    <span class="fas fa-star spn-1"></span> No Reviews Yet
                  </p>
                </div>
              </div>
              <div class="col-12 " style="padding: 0">
                <!--<div class="details-tabs">-->
                <!--  <div class="details-tab">-->
                <!--    <input-->
                <!--      type="radio"-->
                <!--      name="css-tabs"-->
                <!--      id="About"-->
                <!--      checked-->
                <!--      class="details-tab-switch"-->
                <!--    />-->
                <!--    <label for="About" class="details-tab-label"-->
                <!--      >About</label-->
                <!--    >-->
                <!--    <div class="details-tab-content">-->
                <!--      <h3>About Property</h3>-->
                <!--      <p>-->
                <!--        Lorem ipsum dolor sit amet consectetur adipisicing-->
                <!--        elit. Exercitationem, atque blanditiis itaque nulla-->
                <!--        quis modi sequi ea eos voluptates veritatis est-->
                <!--        distinctio laudantium delectus laborum nesciunt-->
                <!--        maxime ex expedita.-->
                <!--      </p>-->
                <!--      <p>-->
                <!--        Accusamus ducimus sit excepturi similique-->
                <!--        consequuntur numquam minus adipisci ratione veniam-->
                <!--        ad, iste exercitationem ut illo nisi qui nihil-->
                <!--        reiciendis libero.-->
                <!--      </p>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--  <div class="details-tab">-->
                <!--    <input-->
                <!--      type="radio"-->
                <!--      name="css-tabs"-->
                <!--      id="Facilitees"-->
                <!--      class="details-tab-switch"-->
                <!--    />-->
                <!--    <label for="Facilitees" class="details-tab-label"-->
                <!--      >Facilitees</label-->
                <!--    >-->
                <!--    <div class="details-tab-content">Facilitees</div>-->
                <!--  </div>-->
                <!--  <div class="details-tab">-->
                <!--    <input-->
                <!--      type="radio"-->
                <!--      name="css-tabs"-->
                <!--      id="Activities"-->
                <!--      class="details-tab-switch"-->
                <!--    />-->
                <!--    <label for="Activities" class="details-tab-label"-->
                <!--      >Activities</label-->
                <!--    >-->
                <!--    <div class="details-tab-content">Activities</div>-->
                <!--  </div>-->
                <!--  <div class="details-tab">-->
                <!--    <input-->
                <!--      type="radio"-->
                <!--      name="css-tabs"-->
                <!--      id="Terms"-->
                <!--      class="details-tab-switch"-->
                <!--    />-->
                <!--    <label for="Terms" class="details-tab-label"-->
                <!--      >Terms & Conditions</label-->
                <!--    >-->
                <!--    <div class="details-tab-content">-->
                <!--      Terms & Conditions-->
                <!--    </div>-->
                <!--  </div>-->
                <!--  <div class="details-tab">-->
                <!--    <input-->
                <!--      type="radio"-->
                <!--      name="css-tabs"-->
                <!--      id="Reviews"-->
                <!--      class="details-tab-switch"-->
                <!--    />-->
                <!--    <label for="Reviews" class="details-tab-label"-->
                <!--      >Reviews</label-->
                <!--    >-->
                <!--    <div class="details-tab-content">Reviews</div>-->
                <!--  </div>-->
                <!--  <div class="details-tab">-->
                <!--    <input-->
                <!--      type="radio"-->
                <!--      name="css-tabs"-->
                <!--      id="Location"-->
                <!--      class="details-tab-switch"-->
                <!--    />-->
                <!--    <label for="Location" class="details-tab-label"-->
                <!--      >Near by Location</label-->
                <!--    >-->
                <!--    <div class="details-tab-content">Near by Location</div>-->
                <!--  </div>-->
                <!--</div>-->

                <div class="w-100 my-5 details-scroll">
                    <ul class="w-100 d-flex justify-content-between align-items-center">
                        <li><a class="" href="#about">Summary</a></li>
                        <li><a class="" href="#general">General Information</a></li>
                        <li><a class="" href="#facilities">Facilities</a></li>
                        <li><a class="" href="#Activities">Activities</a></li>
                        <li><a class="" href="#terms">Terms & Conditions</a></li>
                        <li><a class="" href="#reviews">Reviews</a></li>
                        <!--<li><a class="" href="#nearlocation">Near by Location</a></li>-->
                    </ul>
                </div>
                <div>
                      <h3>Summary</h3>
                      <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Exercitationem, atque blanditiis itaque nulla
                        quis modi sequi ea eos voluptates veritatis est
                        distinctio laudantium delectus laborum nesciunt
                        maxime ex expedita.
                      </p>
                      <p>
                        Accusamus ducimus sit excepturi similique
                        consequuntur numquam minus adipisci ratione veniam
                        ad, iste exercitationem ut illo nisi qui nihil
                        reiciendis libero.
                      </p>
                </div>
              </div>

              <div class="col-12 mt-3" style="padding: 0" id="about">
                <h3>Basic Details</h3>
                <table class="table details-table">
                  <thead>
                    <tr>
                      <th>Accomodation</th>
                      <td>0.4 Guests</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>Bedroom</th>
                      <td>02</td>
                    </tr>
                    <tr>
                      <th>Bathroom</th>
                      <td>0.2</td>
                    </tr>
                    <tr>
                      <th>Dimension</th>
                      <td>1200 Sq Ft</td>
                    </tr>
                    <tr>
                      <th>Type</th>
                      <td>Sperate Room</td>
                    </tr>
                    <tr>
                      <th>Popular Nearby</th>
                      <td>Yes</td>
                    </tr>
                    <tr>
                      <th>Check in start @</th>
                      <td>09:00 am</td>
                    </tr>
                  </tbody>
                </table>
              </div>
                <div class="col-12 mt-3" style="padding: 0" id="general">
                <h3>General Information</h3>
                <table class="table details-table">
                  <thead>
                    <tr>
                      <th>Property Type</th>
                      <td>House</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>Farm Type </th>
                      <td>Mixed Farm</td>
                    </tr>
                    <tr>
                      <th>Location</th>
                      <td>Kodaikanal, Tamil Nadu, India</td>
                    </tr>
                    <tr>
                      <th>Full Address</th>
                      <td>  Kodaikanal, Tamil Nadu, India  </td>
                    </tr>

                  </tbody>
                </table>
              </div>
              <div class="col-12 mt-3" style="padding: 0" id="facilities">
                <h3>Facilities</h3>
                <table
                  class="table details-table-2 mt-3"
                  style="border: none"
                >
                  <thead>
                    <tr>
                      <td style="border-top: 0">
                        <i class="fa-solid fa-filter"></i>consectetur
                        adipisicing elit
                      </td>
                      <td style="border-top: 0">
                        <i class="fa-solid fa-bookmark"></i>consectetur
                        adipisicing elit
                      </td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <i class="fa-regular fa-hand"></i>consectetur
                        adipisicing elit
                      </td>
                      <td>
                        <i class="fa-solid fa-eye"></i>consectetur
                        adipisicing elit
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <i class="fa-solid fa-folder-open"></i> consectetur
                        adipisicing elit
                      </td>
                      <td>
                        <i class="fa-solid fa-lemon"></i>consectetur
                        adipisicing elit
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <i class="fa-solid fa-key"></i>consectetur
                        adipisicing elit
                      </td>
                      <td>
                        <i class="fa-solid fa-wifi"></i>consectetur
                        adipisicing elit
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <i class="fa-solid fa-person"></i>consectetur
                        adipisicing elit
                      </td>
                      <td>
                        <i class="fa-solid fa-handshake"></i>Sconsectetur
                        adipisicing elit
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="col-12 mt-3" style="padding: 0" id="Activities">
                <h3>Activities</h3>
                <div class="details-activities">
                  <ul class="list-unstyled">
                    <li>
                      <div
                        class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                        href="#"
                      >
                        <div class="col-lg-5 details-activities-img-bx">
                          <img src="{{ asset('images/farmhouse/fh-img-9')}}" alt="" />
                        </div>
                        <div class="col-lg-7">
                          <h6 class="mb-0">House Riding</h6>
                          <small
                            class="text-body-secondary mt-2"
                            style="line-height: 0px"
                            >Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Dolore quasi eum nostrum
                            fugiat, ipsum aut, quibusdam maiores, commodi
                            temporibus explicabo rerum corrupti magnam Lorem
                            ipsum dolor sit amet. Lorem ipsum dolor
                          </small>
                          <p><span>INR</span>11,899 Night</p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="details-activities">
                  <ul class="list-unstyled">
                    <li>
                      <div
                        class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                        href="#"
                      >
                        <div class="col-lg-5 details-activities-img-bx">
                          <img
                            src="{{ asset('images/farmhouse/fh-img-3.webp')}}"
                            alt=""
                          />
                        </div>
                        <div class="col-lg-7">
                          <h6 class="mb-0">House Riding</h6>
                          <small
                            class="text-body-secondary mt-2"
                            style="line-height: 0px"
                            >Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Dolore quasi eum nostrum
                            fugiat, ipsum aut, quibusdam maiores, commodi
                            temporibus explicabo rerum corrupti magnam
                            adipisci
                          </small>
                          <p><span>INR</span>11,899 Night</p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="details-activities">
                  <ul class="list-unstyled">
                    <li>
                      <div
                        class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                        href="#"
                      >
                        <div class="col-lg-5 details-activities-img-bx">
                          <img
                            src="{{ asset('images/farmhouse/fh-img-2.webp')}}"
                            alt=""
                          />
                        </div>
                        <div class="col-lg-7">
                          <h6 class="mb-0">House Riding</h6>
                          <small
                            class="text-body-secondary mt-2"
                            style="line-height: 0px"
                            >Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Dolore quasi eum nostrum
                            fugiat, ipsum aut, quibusdam maiores, commodi
                            temporibus explicabo rerum corrupti magnam
                            adipisci
                          </small>
                          <p><span>INR</span>11,899 Night</p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="details-activities">
                  <ul class="list-unstyled">
                    <li>
                      <div
                        class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                        href="#"
                      >
                        <div class="col-lg-5 details-activities-img-bx">
                          <img src="{{ asset('images/farmhouse/fh-img-7')}}" alt="" />
                        </div>
                        <div class="col-lg-7">
                          <h6 class="mb-0">House Riding</h6>
                          <small
                            class="text-body-secondary mt-2"
                            style="line-height: 0px"
                            >Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Dolore quasi eum nostrum
                            fugiat, ipsum aut, quibusdam maiores, commodi
                            temporibus explicabo rerum corrupti magnam
                            adipisci
                          </small>
                          <p><span>INR</span>11,899 Night</p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-12 my-2">


                  <div class="accordion accordion-flush" id="accordionPanelsStayOpenExample">
<div class="accordion-item">
<h2 class="accordion-header">
  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
    Organic Products
  </button>
</h2>
<div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
  <div class="accordion-body">
      <table class="table acd-table">
          <tr>
              <th>Product Title</th>
              <th>Product Unit Price</th>
              <th>Seasonal Availability </th>
              <th>Product Description</th>
              <th>Product Availability </th>
          </tr>
          <tr>
              <td>Herbal Soap</td>
              <td>30</td>
              <td>Yes</td>
              <td>eere</td>
              <td>Monthly</td>
          </tr>

      </table>

  </div>
</div>
</div>
<div class="accordion-item">
<h2 class="accordion-header">
  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
   Sustainble Practices
  </button>
</h2>
<div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
  <div class="accordion-body">
      <table class="table acd-table">
          <tr>
              <th>Sustainable Farming Practice</th>
              <th>Sustainable Details</th>

          </tr>
          <tr>
              <td>
                  <div class="dt-s-bx">
                    Select Sustainble Farming
                 </div>
              </td>
              <td>

                  <div>
                    <p class="m-0 font-size:13px; line-height:25px;">
                     Plant cover crops to prevent soil erosion, suppress weeds, and improve soil health.
                     </p>
                 </div>
              </td>

          </tr>
          <tr>
              <td>
                  <div class="dt-s-bx">
                    Select Sustainble Farming
                 </div>
              </td>
              <td>

                  <div>
                    <p class="m-0 font-size:13px; line-height:25px;">
                     Plant a diverse range of crops to enhance resilience to climate change and support ecosystem health.
                     </p>
                 </div>
              </td>

          </tr>


      </table>
  </div>
</div>
</div>
<div class="accordion-item">
<h2 class="accordion-header">
  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
   Irrigation Method Farm Practices
  </button>
</h2>
<div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
  <div class="accordion-body">
      <table class="table acd-table">
          <tr>
              <th>Irrigation Method </th>
              <th>Irrigation Details</th>

          </tr>
          <tr>
              <td>
                  <div class="dt-s-bx">
                   Surface Irrigation
                 </div>
              </td>
              <td>

                  <div>
                    <p class="m-0 font-size:13px; line-height:25px;">
                     Furrow Irrigation: Water is directed along furrows, or channels, between crop rows.
                     </p>
                 </div>
              </td>

          </tr>

          <tr>
              <td>
                  <div class="dt-s-bx">
                    Sprinkler Irrigation
                 </div>
              </td>
              <td>

                  <div>
                    <p class="m-0 font-size:13px ; line-height:25px;">
                     Water is sprayed over the crops like natural rainfall, using pipes and pump systems.
                     </p>
                 </div>
              </td>

          </tr>


      </table>
  </div>
</div>
</div>
<div class="accordion-item">
<h2 class="accordion-header">
  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-collapsefour">
 Soil Health and Fertility Practices
  </button>
</h2>
<div id="flush-collapsefour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
  <div class="accordion-body">
      <table class="table acd-table">
          <tr>
              <th>Soil Health and Fertility Practices</th>
              <th>Soil Health and Fertility Details</th>

          </tr>
          <tr>
              <td>
                  <div class="dt-s-bx">
                   Crop Rotation
                 </div>
              </td>
              <td>

                  <div>
                    <p class="m-0 font-size:13px; line-height:25px;">
                    Rotate crops to break pest and disease cycles and balance nutrient demands, promoting overall soil health.
                     </p>
                 </div>
              </td>

          </tr>
          <tr>
              <td>
                  <div class="dt-s-bx">
                  Agroforestry
                 </div>
              </td>
              <td>

                  <div>
                    <p class="m-0 font-size:13px; line-height:25px;">
                    Integrate trees and shrubs to improve soil structure, provide organic matter, and enhance nutrient cycling.
                     </p>
                 </div>
              </td>

          </tr>


      </table>
  </div>
</div>
</div>
<div class="accordion-item">
<h2 class="accordion-header">
  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefive" aria-expanded="false" aria-controls="flush-collapsefive">
 Pest Disease Farm Practices
  </button>
</h2>
<div id="flush-collapsefive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
  <div class="accordion-body">
      <table class="table acd-table">
          <tr>
              <th>Pest and Disease Management</th>
              <th>Pest and Disease Details</th>

          </tr>
          <tr>
              <td>
                  <div class="dt-s-bx">
                   Companion Planting
                 </div>
              </td>
              <td>

                  <div>
                    <p class="m-0 font-size:13px; line-height:25px;">
                   Utilize companion planting to deter pests or attract beneficial insects that act as natural predators.
                     </p>
                 </div>
              </td>

          </tr>



      </table>
  </div>
</div>
</div>
</div>
              </div>
              <div class="details-terms-condition mt-4" id="terms">
                <ul class="list-unstyled">
                  <li>
                    <div
                      class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none"
                      href="#"
                    >
                      <div class="col-lg-5 details-terms-img-bx">
                        <img src="./images/terms.png" alt="" />
                      </div>
                      <div class="col-lg-7">
                        <h6 class="mb-0" style="font-size: 25px">
                          Terms & Conditions
                        </h6>
                        <small
                          class="text-body-secondary mt-2"
                          style="line-height: 0px"
                          >Lorem ipsum dolor sit amet consectetur
                          adipisicing elit. Dolore quasi eum nostrum fugiat,
                          ipsum aut, quibusdam maiores, commodi temporibus
                          explicabo rerum corrupti magnam adipisci
                        </small>
                        <div
                          class="d-flex justify-content-start align-items-center w-100 mt-3"
                        >
                          <button class="terms-btn" role="button">
                            Read All
                          </button>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="col-12 mt-5" style="padding: 0" id="reviews">
                <h3>256 Reviews</h3>
                <div class="container mt-4">
                  <div class="row">
                    <div
                      class="col-lg-2 p-0 d-flex justify-content-center align-items-center"
                      style="padding: 0"
                    >
                      <div class="review-img-box">
                        <img src="./images/user/user.png" alt="" />
                      </div>
                    </div>
                    <div class="col-lg-8 p-0" style="padding: 0">
                      <div class="main-review">
                        <small style="color: #7cb342"
                          >HUNTER LAMOUREAUX</small
                        >
                        <p style="font-weight: 600; color: #000">
                          it Was as great as expected. Amazing
                        </p>
                        <p style="font-weight: 400; color: #ccc">
                          June 27, 2023
                        </p>
                        <div class="review-box mt-2">
                          <p>
                            Lorem ipsum dolor sit amet consectetur,
                            adipisicing elit. Libero quibusdam nihil
                            dolorem. Molestias tempora consectetur error
                            exercitationem minus laboriosam? Itaque, fuga
                            repellat? Doloremque beatae obcaecati, unde
                            molestiae facilis corporis illum.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <small>
                        <span class="fas fa-star spn-star-review"></span>
                        <span class="fas fa-star spn-star-review"></span>
                        <span class="fas fa-star spn-star-review"></span>
                        <span class="fas fa-star spn-star-review"></span>
                        <span class="fas fa-star spn-star-review"></span>
                      </small>
                      <p>Excellent</p>
                    </div>
                  </div>
                </div>
                <div class="container mt-4">
                  <div class="row">
                    <div
                      class="col-lg-2 p-0 d-flex justify-content-center align-items-center"
                      style="padding: 0"
                    >
                      <div class="review-img-box">
                        <img src="{{ asset('images/user/user.png')}}" alt="" />
                      </div>
                    </div>
                    <div class="col-lg-8 p-0" style="padding: 0">
                      <div class="main-review">
                        <small style="color: #7cb342"
                          >HUNTER LAMOUREAUX</small
                        >
                        <p style="font-weight: 600; color: #000">
                          it Was as great as expected. Amazing
                        </p>
                        <p style="font-weight: 400; color: #ccc">
                          June 27, 2023
                        </p>
                        <div class="review-box mt-2">
                          <p>
                            Lorem ipsum dolor sit amet consectetur,
                            adipisicing elit. Libero quibusdam nihil
                            dolorem. Molestias tempora consectetur error
                            exercitationem minus laboriosam? Itaque, fuga
                            repellat? Doloremque beatae obcaecati, unde
                            molestiae facilis corporis illum.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <small>
                        <span class="fas fa-star spn-star-review"></span>
                        <span class="fas fa-star spn-star-review"></span>
                        <span class="fas fa-star spn-star-review"></span>
                        <span class="fas fa-star spn-star-review"></span>
                        <span class="fas fa-star spn-star-review"></span>
                      </small>
                      <p>Excellent</p>
                    </div>
                  </div>
                </div>
                <div class="container mt-4">
                  <div class="row">
                    <div
                      class="col-lg-2 p-0 d-flex justify-content-center align-items-center"
                      style="padding: 0"
                    >
                      <div class="review-img-box">
                        <img src="{{ asset('images/user/user.png')}}" alt="" />
                      </div>
                    </div>
                    <div class="col-lg-8 p-0" style="padding: 0">
                      <div class="main-review">
                        <small style="color: #7cb342"
                          >HUNTER LAMOUREAUX</small
                        >
                        <p style="font-weight: 600; color: #000">
                          it Was as great as expected. Amazing
                        </p>
                        <p style="font-weight: 400; color: #ccc">
                          June 27, 2023
                        </p>
                        <div class="review-box mt-2">
                          <p>
                            Lorem ipsum dolor sit amet consectetur,
                            adipisicing elit. Libero quibusdam nihil
                            dolorem. Molestias tempora consectetur error
                            exercitationem minus laboriosam? Itaque, fuga
                            repellat? Doloremque beatae obcaecati, unde
                            molestiae facilis corporis illum.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <small>
                        <span class="fas fa-star spn-star-review"></span>
                        <span class="fas fa-star spn-star-review"></span>
                        <span class="fas fa-star spn-star-review"></span>
                        <span class="fas fa-star spn-star-review"></span>
                        <span class="fas fa-star spn-star-review"></span>
                      </small>
                      <p>Excellent</p>
                    </div>
                  </div>
                </div>
                <div class="container mt-4">
                  <div class="row">
                    <div
                      class="col-lg-2 p-0 d-flex justify-content-center align-items-center"
                      style="padding: 0"
                    >
                      <div class="review-img-box">
                        <img src="{{ asset('images/user/user.png')}}" alt="" />
                      </div>
                    </div>
                    <div class="col-lg-8 p-0" style="padding: 0">
                      <div class="main-review">
                        <small style="color: #7cb342"
                          >HUNTER LAMOUREAUX</small
                        >
                        <p style="font-weight: 600; color: #000">
                          it Was as great as expected. Amazing
                        </p>
                        <p style="font-weight: 400; color: #ccc">
                          June 27, 2023
                        </p>
                        <div class="review-box mt-2">
                          <p>
                            Lorem ipsum dolor sit amet consectetur,
                            adipisicing elit. Libero quibusdam nihil
                            dolorem. Molestias tempora consectetur error
                            exercitationem minus laboriosam? Itaque, fuga
                            repellat? Doloremque beatae obcaecati, unde
                            molestiae facilis corporis illum.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <small>
                        <span class="fas fa-star spn-star-review"></span>
                        <span class="fas fa-star spn-star-review"></span>
                        <span class="fas fa-star spn-star-review"></span>
                        <span class="fas fa-star spn-star-review"></span>
                        <span class="fas fa-star spn-star-review"></span>
                      </small>
                      <p>Excellent</p>
                    </div>
                  </div>
                </div>
                <div
                  class="d-flex justify-content-center align-items-center w-100 mt-5"
                >
                  <button class="review-btn" role="button">View All</button>
                </div>
              </div>

              <!--<div class="col-12 mt-3" style="padding: 0" id="nearlocation">-->
              <!--  <h3>Near by Locations</h3>-->
              <!--  <div class="container pt-4">-->
              <!--    <div class="row border-bottom pb-3">-->
              <!--      <div class="col-lg-8">-->
              <!--        <div class="near-location">-->
              <!--          <p class="near-location-p">-->
              <!--            <span style="color: #7cb342; margin-right: 5px"-->
              <!--              ><i class="fa-solid fa-cart-shopping"></i-->
              <!--            ></span>-->
              <!--            Shop / Shoping Mail-->
              <!--          </p>-->
              <!--          <ul style="padding-left: 15px">-->
              <!--            <li>-->
              <!--              Barelona Dream Port & Shoping Mail-->
              <!--              <span style="color: #aaa5a5">(0.02 ml)</span>-->
              <!--            </li>-->
              <!--            <li>-->
              <!--              Graceline Shoping Mail-->
              <!--              <span style="color: #aaa5a5">(0.06 ml)</span>-->
              <!--            </li>-->
              <!--            <li>-->
              <!--              Asian Food Court-->
              <!--              <span style="color: #aaa5a5">(0.08 ml)</span>-->
              <!--            </li>-->
              <!--            <li>-->
              <!--              Limelight Shake & Drink-->
              <!--              <span style="color: #aaa5a5">(0.09 ml)</span>-->
              <!--            </li>-->
              <!--          </ul>-->
              <!--        </div>-->
              <!--      </div>-->
              <!--      <div class="col-lg-4">-->
              <!--        <div class="near-location-2">-->
              <!--          <ul>-->
              <!--            <li>-->
              <!--              05 min Walk-->
              <!--              <span style="color: #7cb342">(Direction)</span>-->
              <!--            </li>-->
              <!--            <li>-->
              <!--              10 min Drive-->
              <!--              <span style="color: #7cb342">(Direction)</span>-->
              <!--            </li>-->
              <!--            <li>-->
              <!--              12 min Drive-->
              <!--              <span style="color: #7cb342">(Direction)</span>-->
              <!--            </li>-->
              <!--            <li>-->
              <!--              13 min Drive-->
              <!--              <span style="color: #7cb342">(Direction)</span>-->
              <!--            </li>-->
              <!--          </ul>-->
              <!--        </div>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--  <div class="container pt-4">-->
              <!--    <div class="row border-bottom pb-3">-->
              <!--      <div class="col-lg-8">-->
              <!--        <div class="near-location">-->
              <!--          <p class="near-location-p">-->
              <!--            <span style="color: #7cb342; margin-right: 5px"-->
              <!--              ><i class="fa-regular fa-face-smile"></i-->
              <!--            ></span>-->
              <!--            Fun & Entertainment-->
              <!--          </p>-->
              <!--          <ul style="padding-left: 15px">-->
              <!--            <li>-->
              <!--              Bright Land Toy & Gift Shop-->
              <!--              <span style="color: #aaa5a5">(0.06 ml)</span>-->
              <!--            </li>-->
              <!--            <li>-->
              <!--              Spot Gear & Play Lnd-->
              <!--              <span style="color: #aaa5a5">(0.04 ml)</span>-->
              <!--            </li>-->
              <!--          </ul>-->
              <!--        </div>-->
              <!--      </div>-->
              <!--      <div class="col-lg-4">-->
              <!--        <div class="near-location-2">-->
              <!--          <ul>-->
              <!--            <li>-->
              <!--              05 min Walk-->
              <!--              <span style="color: #7cb342">(Direction)</span>-->
              <!--            </li>-->
              <!--            <li>-->
              <!--              10 min Drive-->
              <!--              <span style="color: #7cb342">(Direction)</span>-->
              <!--            </li>-->
              <!--          </ul>-->
              <!--        </div>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--  <div class="container pt-4">-->
              <!--    <div class="row border-bottom pb-3">-->
              <!--      <div class="col-lg-8">-->
              <!--        <div class="near-location">-->
              <!--          <p class="near-location-p">-->
              <!--            <span style="color: #7cb342; margin-right: 5px"-->
              <!--              ><i class="fa-solid fa-music"></i-->
              <!--            ></span>-->
              <!--            Night Life & Pubs-->
              <!--          </p>-->
              <!--          <ul style="padding-left: 15px">-->
              <!--            <li>-->
              <!--              Mia's Pub & Restaurent-->
              <!--              <span style="color: #aaa5a5">(0.02 ml)</span>-->
              <!--            </li>-->
              <!--            <li>-->
              <!--              Rea Men Bar-->
              <!--              <span style="color: #aaa5a5">(0.06 ml)</span>-->
              <!--            </li>-->
              <!--          </ul>-->
              <!--        </div>-->
              <!--      </div>-->
              <!--      <div class="col-lg-4">-->
              <!--        <div class="near-location-2">-->
              <!--          <ul>-->
              <!--            <li>-->
              <!--              05 min Walk-->
              <!--              <span style="color: #7cb342">(Direction)</span>-->
              <!--            </li>-->
              <!--            <li>-->
              <!--              10 min Drive-->
              <!--              <span style="color: #7cb342">(Direction)</span>-->
              <!--            </li>-->
              <!--          </ul>-->
              <!--        </div>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--  <div class="container pt-4">-->
              <!--    <div class="row border-bottom pb-3">-->
              <!--      <div class="col-lg-8">-->
              <!--        <div class="near-location">-->
              <!--          <p class="near-location-p">-->
              <!--            <span style="color: #7cb342; margin-right: 5px"-->
              <!--              ><i class="fa-regular fa-heart"></i-->
              <!--            ></span>-->
              <!--            Hospitals & Clinics-->
              <!--          </p>-->
              <!--          <ul style="padding-left: 15px">-->
              <!--            <li>-->
              <!--              Barelona Dream Port & Shoping Mail-->
              <!--              <span style="color: #aaa5a5">(0.02 ml)</span>-->
              <!--            </li>-->
              <!--            <li>-->
              <!--              Graceline Shoping Mail-->
              <!--              <span style="color: #aaa5a5">(0.06 ml)</span>-->
              <!--            </li>-->
              <!--            <li>-->
              <!--              Asian Food Court-->
              <!--              <span style="color: #aaa5a5">(0.08 ml)</span>-->
              <!--            </li>-->
              <!--            <li>-->
              <!--              Limelight Shake & Drink-->
              <!--              <span style="color: #aaa5a5">(0.09 ml)</span>-->
              <!--            </li>-->
              <!--          </ul>-->
              <!--        </div>-->
              <!--      </div>-->
              <!--      <div class="col-lg-4">-->
              <!--        <div class="near-location-2">-->
              <!--          <ul>-->
              <!--            <li>-->
              <!--              05 min Walk-->
              <!--              <span style="color: #7cb342">(Direction)</span>-->
              <!--            </li>-->
              <!--            <li>-->
              <!--              10 min Drive-->
              <!--              <span style="color: #7cb342">(Direction)</span>-->
              <!--            </li>-->
              <!--            <li>-->
              <!--              12 min Drive-->
              <!--              <span style="color: #7cb342">(Direction)</span>-->
              <!--            </li>-->
              <!--            <li>-->
              <!--              13 min Drive-->
              <!--              <span style="color: #7cb342">(Direction)</span>-->
              <!--            </li>-->
              <!--          </ul>-->
              <!--        </div>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</div>-->
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="reserv-bx">
                  <div class="reserv-bx-1">
                    <strike>₹14,406</strike>
                    <p>₹11,899 <span>night</span></p>
                  </div>
                  <div class="reserv-bx-2">
                    <div class="reserv-check">
                      <div
                        class="d-flex justify-content-center align-items-center"
                        style="
                          height: 100%;
                          width: 50%;
                          border-right: 1px solid #aeaeae8b;
                        "
                      >
                        <label id="CheckIn">
                          <span style="font-size: 12px">CHECK IN</span>
                          <span
                            class="fas fa-chevron-down"
                            style="font-size: 12px"
                          ></span>
                          <p style="margin: 0; font-size: 10px">1/2/2024</p>
                        </label>
                      </div>
                      <div
                        class="d-flex justify-content-center align-items-center"
                        style="height: 100%; width: 50%"
                      >
                        <label id="CheckIn">
                          <span style="font-size: 12px">CHECK OUT</span>
                          <span
                            class="fas fa-chevron-down"
                            style="font-size: 12px"
                          ></span>
                          <p style="margin: 0; font-size: 10px">1/2/2024</p>
                        </label>
                      </div>
                    </div>
                    <div class="value_box-2">
                      <select
                        class="form-select form-select-lg w-100"
                        style="border: 0"
                      >
                        <option selected>Guests</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>

                  </div>
                  <div class="w-100 mt-4 d-flex flex-column justify-content-center align-items-center">
                    <button type="button" class="reserv-btn"> Book Now</button>
                    <!--<span class="mt-4" style="color: #b2b1b1;">You won't be charged yet</span>-->
                </div>
                <!--<div class="rupees">-->
                <!--    <p>₹14,406 x 5 Nights <span style="text-decoration: none;">₹72,030</span></p>-->
                <!--    <p>₹14,406 x 5 Nights <span style="text-decoration: none; color: #7cb342;">-₹14,406</span></p>-->
                <!--</div>-->
                <div class="tax">
                    <p>Total Amount <span style="text-decoration: none;">₹57,624</span></p>
                </div>
                </div>
              </div>
              <div class="col-12 mt-3">
                  <div class="reserv-bx px-3">
                    <h4 class="text-center">Attractions Near to Us</h4>
                    <div class="w-100">
                        <table class="table lc-near-table " >
                            <tr>
                                <th> Graceline Shoping Mall</th>
                                <td>10 km</td>
                            </tr>
                            <tr>
                                <th> Rea Men Bar</th>
                                <td>15 km</td>
                            </tr>
                            <tr>
                                <th>Asian Food Court</th>
                                <td>08 km</td>
                            </tr>
                            <tr>
                                <th> Mia's Pub & Restaurent</th>
                                <td>11 km</td>
                            </tr>
                            <tr>
                                <th>Spot Gear & Play Lnd</th>
                                <td>14 km</td>
                            </tr>
                            <tr>
                                <th>Barelona Dream Port</th>
                                <td>09 km</td>
                            </tr>
                        </table>

                    </div>
                  </div>

              </div>
              <div class="col-12">
                <video width="320" height="240" autoplay loop muted style="border-radius: 10px; overflow: hidden;">
                    <source style="border-radius: 20px;" src="{{ asset('images/video/video.mp4')}}" type="video/mp4">
                  </video>
              </div>
              <div class="col-12">
                <div class="reserv-bx">
                    <h3>Related</h3>
                    <div class="related-bx mt-4">
                        <div class="relate-img-bx">
                            <img src="{{ asset('images/farmhouse/fh-img-3.webp')}}" alt="">
                        </div>
                        <div class="main-details-2 mt-3">
                            <h3 style="font-size: 20px;">Room in Badowala, India</h3>
                            <p style="margin: 0; font-size: 11px;">1 Double Bed Private Attached Bathroom</p>
                            <p style="margin: 0; font-size: 11px; margin-top: 5px;">
                              <span class="fas fa-star "></span> No Reviews Yet
                            </p>
                          </div>
                    </div>
                    <div class="related-bx mt-4">
                        <div class="relate-img-bx">
                            <img src="{{ asset('images/farmhouse/fh-img-4')}}" alt="">
                        </div>
                        <div class="main-details-2 mt-3">
                            <h3 style="font-size: 20px;">Room in Badowala, India</h3>
                            <p style="margin: 0; font-size: 11px;">1 Double Bed Private Attached Bathroom</p>
                            <p style="margin: 0; font-size: 11px; margin-top: 5px;">
                              <span class="fas fa-star "></span> No Reviews Yet
                            </p>
                          </div>
                    </div>
                    <div class="related-bx mt-4">
                        <div class="relate-img-bx">
                            <img src="{{ asset('images/farmhouse/fh-img-5')}}" alt="">
                        </div>
                        <div class="main-details-2 mt-3">
                            <h3 style="font-size: 20px;">Room in Badowala, India</h3>
                            <p style="margin: 0; font-size: 11px;">1 Double Bed Private Attached Bathroom</p>
                            <p style="margin: 0; font-size: 11px; margin-top: 5px;">
                              <span class="fas fa-star "></span> No Reviews Yet
                            </p>
                          </div>
                    </div>
                    <div class="related-bx mt-4">
                        <div class="relate-img-bx">
                            <img src="{{ asset('images/farmhouse/fh-img-6')}}" alt="">
                        </div>
                        <div class="main-details-2 mt-3">
                            <h3 style="font-size: 20px;">Room in Badowala, India</h3>
                            <p style="margin: 0; font-size: 11px;">1 Double Bed Private Attached Bathroom</p>
                            <p style="margin: 0; font-size: 11px; margin-top: 5px;">
                              <span class="fas fa-star "></span> No Reviews Yet
                            </p>
                          </div>
                    </div>
                    <div class="related-bx mt-4">
                        <div class="relate-img-bx">
                            <img src="{{ asset('images/farmhouse/fh-img-7')}}" alt="">
                        </div>
                        <div class="main-details-2 mt-3">
                            <h3 style="font-size: 20px;">Room in Badowala, India</h3>
                            <p style="margin: 0; font-size: 11px;">1 Double Bed Private Attached Bathroom</p>
                            <p style="margin: 0; font-size: 11px; margin-top: 5px;">
                              <span class="fas fa-star "></span> No Reviews Yet
                            </p>
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
@endsection
