@extends('template')

@section('main')

		<style>
    .main-panelbg{
        background:#7cb342;
    }
    .main-panelbg h4{
        color:#fff;
    }
    .prop-label label{
        color:#7cb342;
        font-size:13px;
        font-weight:600;
    }
    .prop-label select, .prop-label input,.prop-label textarea{
        border-radius:2px !important;
        
    }
    .prop-label select:focus, .prop-label input:focus, .prop-label textarea:focus{
        /*outline:none;*/
        box-shadow:none;
    }
    .nxt-btn{
        border:none;
        outline:none;
        background:#7cb342;
        color:#fff;
        border:1px solid #7cb342;
        transition:0.5s;
        padding:3px 15px;
        border-radius:2px;
        width:150px;
        font-weight:600;
    }
    .nxt-btn:hover{
        background:transparent;
        color:#7cb342;
    }
    .back-btn{
        border:none;
        outline:none;
        background:red;
        color:#fff;
        border:1px solid red;
        transition:0.5s;
        border-radius:3px;
        width:150px;
        font-weight:600;
        height:50px  !important;
        
        padding:7px 15px !important;
    }
    .back-btn:hover{
        background:transparent;
        color:red !important;
    }
   
   input[type='checkbox'] {
    accent-color: #7cb342;
    color:#fff;
}
</style>
	<div class="margin-top-85">
		<div class="row m-0">
			<!-- sidebar start-->
			@include('users.sidebar')
			<!--sidebar end-->
			<div class="col-md-10">
				<div class="main-panel min-height mt-4">
					<div class="row justify-content-center">
						<div class="col-md-3 pl-4 pr-4">
							@include('listing.sidebar')
						</div>

						<div class="col-md-9 mt-sm-0 pl-4 pr-4">
						    <form method="post" action="{{ url('listing/' . $result->id . '/' . $step) }}" class='signup-form login-form' accept-charset='UTF-8'>
                               {{ csrf_field() }}
					          	<div class="col-md-12 p-0 mt-4  pb-4 m-0" style="border:1px solid #7cb342;">
									<div class="form-group col-md-12 main-panelbg pb-3 pt-3 pl-4">
											<h4 class="text-16 font-weight-700"> General Informations</h4>
									</div>
								  <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group prop-label">
                                            <label class="form-label">Accomodation Type <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="accomodation_type"  id="accomodation_type" @if(isset($farmHouse)) value="{{$farmHouse->accomodation_type}}"  @endif placeholder="Enter Accomodation Type ">
                                           
                                        </div>
                                    </div>
                                    
                                     <div class="col-sm-4 col-md-4">
                                        <div class="form-group prop-label">
                                            <label class="form-label">Total Bedrooms<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="total_bedroom" id="total_bedroom"  @if(isset($farmHouse)) value="{{$farmHouse->total_bedroom}}" @endif placeholder="Enter Total Bedrooms ">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group prop-label">
                                            <label class="form-label">Total Bathroom<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="total_bathroom" id="total_bathroom"   @if(isset($farmHouse)) value="{{$farmHouse->total_bathroom}}" @endif placeholder="Enter Total Bathroom">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group prop-label">
                                            <label class="form-label">Dimension<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="dimension" id="dimension"  @if(isset($farmHouse)) value="{{$farmHouse->dimension}}" @endif placeholder="Enter Dimension">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group prop-label">
                                            <label class="form-label">Check In Time<span class="text-danger">*</span></label>
                                            <input type="time" class="form-control" name="checkin_time" id="checkin_time"  @if(isset($farmHouse)) value="{{$farmHouse->checkin_time}}" @endif placeholder="Enter Check In Time">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group prop-label">
                                            <label class="form-label">Check Out Time<span class="text-danger">*</span></label>
                                            <input type="time" class="form-control" name="checkout_time" id="checkout_time"  @if(isset($farmHouse)) value="{{$farmHouse->checkout_time}}" @endif placeholder="Enter Check Out Time">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group prop-label">
                                            <label class="form-label">Airport pick up and drop available<span class="text-danger">*</span></label>
        								    <input type="radio"   name="airport" value="yes"  @if(isset($farmHouse)) @if($farmHouse->airport=="yes") checked  @else checked @endif @else checked  @endif  /> Yes &nbsp; &nbsp;
        									<input type="radio"   name="airport" value="no"  @if(isset($farmHouse)) @if($farmHouse->airport=="no") checked  @endif  @endif /> No
                                        </div>
                                    </div>
                                    
                                     <div class="col-sm-4 col-md-4">
                                        <div class="form-group prop-label">
                                            <label class="form-label">Car parking available <span class="text-danger">*</span></label>
        								    <input type="radio"   name="car_parking" value="yes"  @if(isset($farmHouse)) @if($farmHouse->car_parking=="yes") checked  @else checked @endif @else checked  @endif   /> Yes &nbsp; &nbsp;
        									<input type="radio"   name="car_parking" value="no"   @if(isset($farmHouse)) @if($farmHouse->car_parking=="no") checked  @endif @endif/> No
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group prop-label">
                                            <label class="form-label">Wifi and Internet<span class="text-danger">*</span></label>
        								    <input type="radio"   name="wifi_internet" value="yes"  @if(isset($farmHouse)) @if($farmHouse->wifi_internet=="yes") checked  @else checked  @endif @else checked  @endif  /> Yes &nbsp; &nbsp;
        									<input type="radio"   name="wifi_internet" value="no"  @if(isset($farmHouse)) @if($farmHouse->wifi_internet=="no")  checked  @endif  @endif/> No
                                        </div>
                                    </div>
                                
                                </div>
                                
                          
                    </div>    
								</div>
								
                                  
								<div class="col-md-12 mt-4 p-0 mb-5">
									<div class="row justify-content-between">
										<div class="mt-4">
											<a href="{{ url('listing/' . $result->id . '/activities') }}" class="back-btn">
												{{ __('Back') }}
											</a>
										</div>

										<div class="mt-4">
											<button type="submit" class="nxt-btn" id="btn_next"><i class="spinner fa fa-spinner fa-spin d-none" ></i>
												<span id="btn_next-text">complete</span>

											</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('validation_script')
	<script type="text/javascript" src="{{ asset('public/js/jquery.validate.min.js') }}"></script>

	<script type="text/javascript">
		'use strict'
		let nextText = "{{ __('Next') }}..";
		let fieldRequiredText = "{{ __('This field is required.') }}";
		let page = 'booking';
	</script>

	<script type="text/javascript" src="{{ asset('public/js/listings.min.js') }}"></script>
	

@endsection
	
