@extends('template')
@section('main')
<style>

/* booking confirmation */

.booking-section {
    min-height: 100vh;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    padding:50px;
  }
  .fst-bx {
    width: 100%;
    height: 100%;
    border: 1px solid #222;
  }
  .logo-wlcm {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: flex-start;
    padding: 20px 30px;
    padding-left:5px;
  }
  .logo {
    width: 220px;
    height: 220px;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .logo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .wlcm {
    display: flex;
    justify-content: center;
    align-items: end;
    padding: 20px;
    padding-right:0;
  }
  .wlcm h3 {
    font-weight: 600;
    letter-spacing: 0.5px;
    font-size:30px;
  }
  .wlcm h3 span {
    color: #7cb342;
    font-weight: 700;
  }
  .contact-details {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: end;
    padding: 20px;
  }
  .contact-details p {
    margin: 0;
    margin-top: 10px;
    font-weight: 500;
  }
  .bk-details-bx {
    border: 1px solid #22222227;
    height: 60px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding:10px 20px;
    flex-wrap:wrap;
  }
  .bk-details-bx h3{
    font-size: 15px;
    font-weight: 700;
    color: #222;
    margin: 0;
  }
  .bk-details-bx h3 span{
    color: #585858;
  }
  .bk-tle{
    font-weight: 700;
    position: relative;
  }
  .bk-tle::before{
    content: '';
    width: 40px;
    height: 3px;
    background: #7cb342;
    position: absolute;
    bottom: -10px;
    left: 48%;
  }
  .bk-details h3{
    font-size: 15px;
    font-weight: 700;
    color: #222;
    margin: 0;
  }
  .bk-details h3 span{
    color: #585858;
  }
  .table-cstm tr th{
    background-color: #7cb342;
    padding:8px;
    color: #fff;
    text-align: center;
    font-size: 14px;
    border: 1px solid #e2e2e225;
  }
  .table-cstm tr td{

    padding:10px;
    text-align: center;
    font-size: 13px;
    font-weight:500;
    background-color: #f2f2f2;
    border: 1px solid #22222225;

  }
  .policies{
    background-color: #f2f2f2;
    padding: 10px;
  }
  .policies-bx h6{
    font-size: 22px;
    color:#222;
    margin-top:10px;
  }
  .policies-bx p{
    font-size: 14px;
    line-height: 29px;
    margin: 0;
    margin-top: 15px;
  }
  .ctn-btn{
    border: 0;
    outline: 0;
    padding:7px 15px;
    width:150px;
    height: 45px;
    background-color: #7cb342;
    color: #fff;
    border-radius: 5px;
    font-weight: 600;

  }
  .rfnd p{
      margin-top:0 !important;
  }
  .rfnd h2{
      color:#7e7e7e;
      margin-top:13px;
  }
  .booking-table-th-width{
      width:100px;
  }
  .px__5{
      padding-left:3rem;
      padding-right:3rem;
  }
    @media screen and (max-width:800px){
        .logo-wlcm{
            flex-direction:column;
            justify-content:center;
            align-items:center;
            padding-left:unset;
            padding:10px;
        }
    }
  @media screen and (max-width:700px){
      .booking-section{
          padding:50px 5px;
      }
      .bk-details-bx{
          height:100%;
           padding:10px 5px;
      }
      .bk-details-bx h3{
          margin-top:15px;
      }
      .px__5{
      padding-left:15px;
      padding-right:15px;
  }
  }
  @media screen and (max-width:420px){
      .wlcm{
          padding:0;
      }
      .wlcm h3 {
          font-size:22px;
          margin-top:20px;
      }
  }
</style>
<section class="booking-section margin-top-85 " >
    <div class="container">
        <div class="row">

            <div class="col-12 d-flex justify-content-center align-items-center">

                <div class="fst-bx">

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="logo-wlcm">
                                <div class="logo">
                                    <img src="http://web.way2village.in/public/front/images/logos/1709097876_logo.jpg" alt="">
                                </div>
                                <div class="wlcm">
                                    <h3>Welcome to <span>Way2village</span></h3>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="contact-details">
                                <p>www.way2village.in</p>
                                <p>+91-9876543210</p>
                            </div>
                        </div>
                        <div class="col-12 px__5 py-3">
                            <strong style="font-weight:700 !important; font-size:18px;">Dear {{ Auth::user()->first_name ?? '' }} {{ Auth::user()->last_name }}</strong>
                            <h4 class="mt-3" style="font-weight:400;"> Greetings from <span style="color: #7cb342;">Way2village</span> !!</h4>
                            <p class="mt-3" style="font-weight:400;">Thanks for booking your holidays with us . The Details as follows .</p>
                        </div>
                        <div class="col-12  px__5 py-3">
                            <div class="bk-details-bx">
                                <h3>Booking ID : <span>{{ $bookingNo ?? '' }}</span></h3>
                                <h3>Booking Date : <span>{{ $bookingDate ?? '' }}</span></h3>
                                <h3>Status : <span>Reserved</span></h3>
                            </div>
                        </div>
                        <div class="col-12  px__5 py-3">

                            <div class="d-flex flex-column bk-details mt-3" style="gap: 15px;">
                                <h3>Booking Person Name  : <span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span></h3>
                                <h3>Contact No : <span>{{ Auth::user()->phone }} </span></h3>
                            </div>

                            <div class="mt-5 table-reponsive" style="overflow-x:auto;">
                                <table class="table table-cstm table-striped">
                                    <tr>
                                        <th><div class="booking-table-th-width">Total Adults</div> </th>
                                        <th> <div class="booking-table-th-width">Total Children</div></th>
                                        <th> <div class="booking-table-th-width">Total Rooms</div></th>
                                        <th> <div class="booking-table-th-width">Room Type</div></th>
                                        <th> <div class="booking-table-th-width">Property Name</div></th>
                                        <th> <div class="booking-table-th-width">Location </div></th>
                                        <th> <div class="booking-table-th-width">Check In Date</div> </th>
                                        <th> <div class="booking-table-th-width">Check Out Date</div> </th>
                                    </tr>
                                    <tr>
                                       <td>{{ $data['total_no_adults'] ?? '' }}</td>
                                       <td>{{ $data['total_no_children'] }}</td>
                                       <td>{{ $data['totalRooms'] }}</td>
                                       <td>{{ $roomTypeDetail->name ?? '' }}</td>
                                       <td><a href="{{ route('listing-detail.details', $property->id) }}" target="_blank">{{ $property->name ?? '' }}</a></td>
                                       <td>{{ $location['city']->name }}, {{ $location['state']->name }}, {{ $location['country']->name }}</td>
                                       <td>{{ $data['check_in_date'] }}</td>
                                       <td>{{ $data['check_out_date'] }}</td>
                                    </tr>

                                </table>
                            </div>

                            <div class="mt-5">
                                <table class="table table-cstm table-striped">
                                    <tr>
                                        <th>Facility Name</th>
                                        <th>Facility Price</th>
                                    </tr>
                                    @foreach ($activityRecords as $record)
                                    <tr>
                                        <td>{{ $record->name ?? '' }}</td>
                                        <td>{{ $record->price ?? '' }}</td>
                                     </tr>
                                    @endforeach

                                </table>
                            </div>

                            <div class="mt-5">
                                <table class="table table-cstm table-striped">
                                    <tr>
                                        <th>Activity Name</th>
                                    </tr>
                                    @foreach ($facilityRecords as $record)
                                    <tr>
                                        <td>{{ $record->name ?? '' }}</td>
                                     </tr>
                                    @endforeach

                                </table>
                            </div>

                        </div>
                        <div class="col-12 px__5 py-3">
                            <div class="policies">
                                <div class="policies-bx">
                                    <h6>{{ $page['cancellation']->heading ?? '' }}</h6>
                                    <p >{!! $page['cancellation']->content !!}</p>
                                </div>
                                <div class="policies-bx mt-4 rfnd">
                                    <h6>{{ $page['refund']->heading ?? '' }}</h6>
                                    <p >{!! $page['refund']->content !!}</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 px__5 py-3 d-flex flex-column justify-content-center align-items-center" >


                            <div class="w-75 p-3 d-flex justify-content-center align-items-center" style="border: 1px solid red; ">
                        <p class="m-0 text-danger" style="font-size:14px; font-weight:500;">Note : Please do confirm your booking with the property two days before check In for a reconfirmation.</p>
                    </div>
                    <div class="w-75 d-flex  justify-content-center align-items-center mt-4">
                                <p class="m-0" style="font-weight:500; font-size:13px;">Any other Queries : Please reach us on support@way2village.in or call us +1800 214 526</p>
                            </div>
                            <div class="w-75 d-flex  justify-content-center align-items-center mt-4">
                                <form action="{{ route('booking.confirm') }}" method="POST">
                                    @csrf

                                    <input type="submit" class="ctn-btn" value="Confirm">
                                </form>
                                {{-- <button type="button" class="ctn-btn">Contact Admin</button> --}}
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



</section>
@endsection
