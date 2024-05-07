@extends('template')
@section('main')
<style>
 .box-titles{
        text-align:center;
        font-weight:600;
        position:relative;
    }
    .box-title:before{
        position:absolute;
        bottom:-8px;
        left:35%;
        content:'';
        width:40px;
        height:3px;
        background:#7cb342;
        
 
    
    .act-tle{
        text-align:left;
        font-weight:600;
        position:relative;
        font-size:16px;
    }
    .act-tle:before{
        position:absolute;
        bottom:-8px;
        left:1%;
        content:'';
        width:40px;
        height:3px;
        background:#7cb342;
        
    }
    .details-booking{
        display:flex;
        justify-content:flex-start;
        align-items:center;
        padding:10px;
    }
   
    .details-booking h4{
        font-size:16px;
        font-weight:600;
    }
     .details-booking h4 span{
         font-weight:400;
         font-size:14px;
         margin-left:10px;
     }
      .details-booking-2{
        display:flex;
        justify-content:flex-start;
        flex-direction:column;
        align-items:flex-start;
        padding:10px;
        background:#f2f2f2;
    }
    .details-booking-2 table{
        width:100%;
    }
     .details-booking-2 tr th{
    border:1px solid #7cb342;
    padding:10px;
     }
     .details-booking-2 tr td{
    border:1px solid #7cb342;
    padding:10px;
     }
     .details-booking-3 tr th{
         border:none !important;
     }
     .details-booking-3 tr td{
         border:none !important;
     }
</style><style>
    .box-title{
        text-align:center;
        font-weight:600;
        position:relative;
    }
    .box-title:before{
        position:absolute;
        bottom:-8px;
        left:35%;
        content:'';
        width:40px;
        height:3px;
        background:#7cb342;
        
    }
    .act-tle{
        text-align:left;
        font-weight:600;
        position:relative;
        font-size:16px;
    }
    .act-tle:before{
        position:absolute;
        bottom:-8px;
        left:1%;
        content:'';
        width:40px;
        height:3px;
        background:#7cb342;
        
    }
    .details-booking{
        display:flex;
        justify-content:flex-start;
        align-items:center;
        padding:10px;
    }
   
    .details-booking h4{
        font-size:16px;
        font-weight:600;
    }
     .details-booking h4 span{
         font-weight:400;
         font-size:14px;
         margin-left:10px;
     }
      .details-booking-2{
        display:flex;
        justify-content:flex-start;
        flex-direction:column;
        align-items:flex-start;
        padding:10px;
        background:#f2f2f2;
    }
    .details-booking-2 table{
        width:100%;
    }
     .details-booking-2 tr th{
    border:1px solid #7cb342;
    padding:10px;
     }
     .details-booking-2 tr td{
    border:1px solid #7cb342;
    padding:10px;
     }
     .details-booking-3 tr th{
         border:none !important;
     }
     .details-booking-3 tr td{
         border:none !important;
     }
</style>
    <div class="content-wrapper  " style="margin-top:14rem; margin-bottom:50px;">
        <section class="content ">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-12 ">
                    <div class="w-100 d-flex justify-content-end align-items-center">
                    <a class="btn btn-primary f-14" href="{{ url('admin/bookings') }}" style="font-size:16px;">Back</a>
                         
                     </div>
                    <div class="box box-info box_info" style="border:1px solid #ccc;  padding:15px 0px 15px 10px; margin-top:10px;">
                        <div class="box-header with-border">
                            <h3 class="box-titles">Booking Details</h3>
                        </div>

                        <form action="{{ url('admin/bookings/detail/' . 1) }}" method="post" class='form-horizontal' style="margin-top:20px;">
                            {{ csrf_field() }}
                            <div class="box-body" >
                                <div class="row px-1 ms-2 my-3 " style="background:#7cb342;width:99% ; ">
                                    <div class="col-lg-6">
                                        <div class="details-booking">
                                            <h4 style="color:#fff;"> Booking Reference No:<span>  {{ $bookingDetail->code ?? '' }}</span></h4>
                                        </div>
                                        <div class="details-booking">
                                            <h4 style="color:#fff;">   Booking Date:<span>   {{ $bookingDetail->start_date ?? '' }}</span></h4>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="details-booking">
                                            <h4 style="color:#fff;"> Booking Person Name:<span>  {{ $bookingDetail->users->first_name ?? '' }} {{ $bookingDetail->users->last_name ?? '' }}</span></h4>
                                        </div>
                                        <div class="details-booking">
                                            <h4 style="color:#fff;">     Contact No:<span>   {{ $bookingDetail->users->phone ?? '' }}</span></h4>
                                        </div>
                                        
                                    </div>
                                    
                                    
                                </div>
                               

                                <div class="row" style="margin-top:20px;">
                                    <div class="col-lg-6">
                                        <div class="details-booking-2" style="background:#fff;">
                                            <table class="">
                                                <tr>
                                                    <th>Date and Time of Booking :</th>
                                                    <td> {{ $bookingDetail->start_date ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Total Adults :</th>
                                                    <td>   {{ $bookingDetail->total_adults ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Total Children :</th>
                                                    <td>   {{ $bookingDetail->total_childrens ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Check In Date and Time :</th>
                                                    <td>   {{ $bookingDetail->start_date ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>  Check Out Date and Time :</th>
                                                    <td>    {{ $bookingDetail->end_date ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>  Total Nights :</th>
                                                    <td>     {{ $bookingDetail->total_night ?? '' }}</td>
                                                </tr>
                                            </table>
                                           
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="details-booking-2">
                                            <h5 class="act-tle">Activities Selected</h5>
                                            @foreach ($bookingDetail['bookingActivity'] as $item)
                                <div  class="details-booking" style="justify-content:space-between; width:100%; margin-top:10px">
                                      <h4  style="margin:0"> {{ $item->activity_name ?? '' }}</h4>
                                               <p style="margin:0">{{ $item->activity_price ?? '' }}</p>
                                   
                                </div>
                                @endforeach
                                            
                                        </div>
                                          <div class="details-booking-2 mt-3">
                                                 <h5 class="act-tle">Add On Facility</h5>
                                                 @foreach ($bookingDetail['bookingFacility'] as $item)
                                <div class="form-group row mt-5">
                                     <h4  style="margin:0">  {{ $item->facility_name ?? '' }}</h4>
                                                 <p style="margin:0">   {{ $item->facility_price ?? '' }}</p>
                                   
                                </div>
                                @endforeach
                                          </div>
                                        
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                       
                                </div>


                        </div>
                         <div class="row px-1 ms-2  mt-4" style="background:#f2f2f2;width:98%;">
                            <div class="col-lg-6">
                                <div class="details-booking-3">
                                <table class="table table-borderless">
                                    <tr>
                                        <th> Total Banking Cost :</th>
                                        <td>00.00</td>
                                    </tr>
                                    <tr>
                                        <th>   GST :</th>
                                        <td>00.00</td>
                                    </tr>
                                    <tr>
                                        <th>  Total Amount :</th>
                                        <td>00.00</td>
                                    </tr>
                                </table>
                            </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="details-booking-3">
                                <table  class="table table-borderless">
                                    <tr>
                                        <th>  Discount Applied :</th>
                                        <td>00.00</td>
                                    </tr>
                                    <tr>
                                        <th>  Net Amount :</th>
                                        <td>00.00</td>
                                    </tr>
                                    <tr>
                                        <th>  Payment Status :</th>
                                        <td>00.00</td>
                                    </tr>
                                </table>
                            </div>
                            </div>
                           
                            
                      
                        </div>
                         <div class="row px-1 ms-2 mt-4 " style="background:#f2f2f2;width:98%;">
                            <div class="col-lg-6">
                                <div class="details-booking-3">
                                <table class="table table-borderless">
                                    <tr>
                                        <th> Payment Mode :</th>
                                        <td> Paytm</td>
                                    </tr>
                                    
                                </table>
                            </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="details-booking-3">
                                <table  class="table table-borderless">
                                    <tr>
                                        <th>   Transaction ID:</th>
                                        <td>TRN000111000</td>
                                    </tr>
                                    <tr>
                                        <th>  Transaction Date:</th>
                                        <td> 21-05-2025</td>
                                    </tr>
                                   
                                </table>
                            </div>
                            </div>
                            </div>
                            <div class="row px-1 ms-2 mt-4 " style="background:#f2f2f2;width:98%;">
                            <div class="col-lg-6">
                                <div class="details-booking-3">
                                <table class="table table-borderless">
                                    <tr>
                                        <th>  Farm House Owner Charge :</th>
                                        <td> 00.00</td>
                                    </tr>
                                    
                                </table>
                            </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="details-booking-3">
                                <table  class="table table-borderless">
                                    <tr>
                                        <th> Pay Out Status:</th>
                                        <td> Pending</td>
                                    </tr>
                                    <tr>
                                        <th>  Admin Cut off :</th>
                                        <td>  00.00</td>
                                    </tr>
                                   
                                </table>
                            </div>
                            </div>
                           
                            
                      
                        </div>
                        


                        <div class="row mt-4">
                            <div class="col-lg-6">
                                <label class="">
                                        Remarks :
                                    </label>
                                    <div class="">
                                        <input type="text" name="remarks" id="" class="form-control">
                                    </div>
                                
                            </div>
                            <div class="col-lg-6">
                                <label class="">
                                        Change Status:
                                    </label>
                                    <div class="">
                                        <select class="form-control" id="status-select" name="status">
                                            <option value="">Select status</option>
                                            <option value="Reserved">Reserved</option>
                                            <option value="Confirmed">Confirmed</option>
                                            <option value="Cancelled">Cancelled</option>
                                            <option value="Complete">Complete</option>
                                            <option value="Closed">Closed</option>
                                        </select>
                                    </div>
                            </div>
                           <div class="col-12 my-5 d-flex justify-content-center align-items-center">
                                 <input type="submit" class="btn btn-success" value="Update" style="background:#7cb342; border:none; outline:none; font-size:16px; padding:7px 15px;">
                               
                           </div>
                            
                                

                            </div>
                        </div>
                          
                                    </div>

                                <!-- Continue with other sections -->

                                <!--<div class="box-footer text-center">-->
                                <!--    <a class="btn btn-default f-14" href="{{ url('admin/bookings') }}">Back</a>-->
                                <!--</div>-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


