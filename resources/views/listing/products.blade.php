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
							<form id="booking_id" method="post" action="{{ url('listing/' . $result->id . '/' . $step) }}"  accept-charset='UTF-8'>
								{{ csrf_field() }}
								<div class="col-md-12 p-0 mt-4  pb-4 m-0">
									<div class="form-group col-md-12 main-panelbg p-3">
											<h4 class="text-16 font-weight-700">Product</h4>
									</div>
										<form method="post" action="{{ url('admin/listing/' . $result->id . '/' . $step) }}" class='signup-form login-form' accept-charset='UTF-8' >
                            {{ csrf_field() }}
                            <div class="row p-2 py-4" style="border:1px solid #7cb342;">
                                <div class="col-md-12">
                                    <h4> Products</h4>
                                 
                                </div>
                                                
                                <!--<div class="card-body">-->
                        <div class="row p-3">
                           
                            
                            <div class="col-sm-6 col-md-6">
                               <div class="form-group prop-label">
									<label class="form-label">Farm Owner <span class="text-danger">*</span></label>
										<select class="form-control"  name="user_id" id="user_id" tabindex="-1" aria-hidden="true" required>
										      <option value="">Select Farm Owner</option>
										       @foreach ($users as $user)
                                                <option value="{{ $user->id }}"  @if(isset($farm_house)) @if($farm_house->user_id==$user->id) selected  @endif @endif>{{ $user->first_name }} {{$user->last_name}} </option>
                                            @endforeach
										  
										</select>
										
								</div>
                           </div>
                           
                           
                            <div class="col-sm-6 col-md-6">
                               <div class="form-group prop-label">
									<label class="form-label">Property Type <span class="text-danger">*</span></label>
										<select class="form-control"  name="property_type_id" id="property_type_id" tabindex="-1" aria-hidden="true" required>
										    <option value="">Select Property Type</option>
										     @foreach ($property_type as $key => $value)
                                                <option value="{{ $key }}"  @if(isset($farm_house)) @if($farm_house->property_type_id==$key) selected  @endif @endif>{{ $value }}</option>
                                            @endforeach
										    
										</select>
								
								</div>
                           </div>
                            
                             <div class="col-sm-6 col-md-6">
                               <div class="form-group prop-label">
									<label class="form-label">Farm Type <span class="text-danger">*</span></label>
										<select class="form-control" name="farm_type_id" id="farm_type_id" tabindex="-1" aria-hidden="true" required>
										    <option value="">Select Farm Type</option>
										       @foreach ($farm_type as $ft )
                                                <option value="{{ $ft->id }}" @if(isset($farm_house)) @if($farm_house->farm_type_id==$ft->id) selected  @endif @endif>{{ $ft->name }}</option>
                                            @endforeach
										</select>
									
								</div>
                           </div>
                           
                           
                            <div class="col-sm-6 col-md-6">
                               
                               <div class="form-group prop-label">
									<label class="form-label">State <span class="text-danger">*</span></label>
										<select class="form-control" name="state" id="state" tabindex="-1" aria-hidden="true" required>
										      @foreach ($state as $st)
                                                <option value="{{ $st->id }}" @if(isset($farm_house)) @if($farm_house->state_id==$st->id) selected  @endif @endif>{{ $st->name }}</option>
                                            @endforeach
											
										</select>
										
								
								</div>
                           </div>
                           
                           
                           <div class="col-sm-6 col-md-6">
                               
                               <div class="form-group prop-label">
									<label class="form-label">District <span class="text-danger">*</span></label>
										<select   class="form-control" name="district" id="district" tabindex="-1" aria-hidden="true" required>
											<option value="">select district</option>
											@if(isset($farm_house))
											       @foreach ($districts as $dist)
                                                <option value="{{ $dist->id }}" @if(isset($farm_house)) @if($farm_house->district_id==$dist->id) selected  @endif @endif>{{ $dist->name }}</option>
                                            @endforeach
											@endif
											
										</select>
							
								</div>
                           </div>
                           
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group prop-label">
                                    <label class="form-label">Location <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="location" id="location"  @if(isset($farm_house)) value="{{$farm_house->location}}" @endif placeholder="Enter  Location" required>
                                   
                                </div>
                            </div>
                            
                            
                            
                            
                            
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group prop-label">
                                    <label class="form-label">Contact Number<span class="text-danger">*</span></label>
                                    
                                    <div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text rounded-0">
												    +91
												</div>
											</div>
										<input type="number" class="form-control" name="contact_number"  @if(isset($farm_house)) value="{{$farm_house->contact_number}}" @endif id="contact_number" placeholder="Enter Contact Number " required>
									</div>
                                </div>
                            </div>
                            
                            
                            
                            
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group prop-label">
                                    <label class="form-label">Landline Number<span class="text-danger">*</span></label>
                                    
                                    <div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text rounded-0">
												    +91
												</div>
											</div>
										<input type="number" class="form-control" name="landline_number"  id="landline_number"  @if(isset($farm_house)) value="{{$farm_house->landline_number}}" @endif placeholder="Enter Landline Number" required>
									</div>
                                </div>
                            </div>
                            
                            
                              <div class="col-sm-6 col-md-6">
                                <div class="form-group prop-label">
                                    <label class="form-label">Postal Code <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="postal_code" id="postal_code"   @if(isset($farm_house)) value="{{$farm_house->postal_code}}" @endif placeholder="enter postal code" required>
                                </div>
                            </div>
                            
                              <div class="col-sm-6 col-md-6">
                                <div class="form-group prop-label">
                                    <label class="form-label">Farm/Propert Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="farm_title" id="farm_title" @if(isset($farm_house)) value="{{$farm_house->farm_title}}" @endif  placeholder="Farm/Property Title" required>
                                </div>
                            </div>
                            
                            
                           <div class="col-sm-6 col-md-6">
                                <div class="form-group prop-label">
                                    <label class="form-label">Start Year <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="start_year" id="start_year"   @if(isset($farm_house)) value="{{$farm_house->start_year}}" @else value="{{date('Y')}}"  @endif required>
                                </div>
                            </div>
                            
                             <div class="col-sm-6 col-md-6">
                                <div class="form-group prop-label">
                                    <label class="form-label">Farm Detail<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="farm_detail" id="farm_detail" @if(isset($farm_house)) value="{{$farm_house->farm_detail}}" @endif  placeholder="Farm Detail" required>
                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group prop-label">
                                <label class="form-label">Certfication Details<span class="text-danger">*</span></label>
                                   <textarea class="form-control mb-4"  name="certification_detail" id="certification_detail" @if(isset($farm_house)) value="{{$farm_house->certification_detail}}" @endif placeholder="certfication details" rows="3" required>@if(isset($farm_house)) {{$farm_house->certification_detail}} @endif</textarea>
                              </div>
                            </div>
                             <div class="col-sm-6 col-md-6">
                                <div class="form-group prop-label">
                                <label class="form-label">Full Address<span class="text-danger">*</span></label>
                                   <textarea class="form-control mb-4" name="full_address" id="full_address" placeholder="full address"  @if(isset($farm_house)) value="{{$farm_house->full_address}}" @endif rows="3" required> @if(isset($farm_house)) {{$farm_house->full_address}} @endif </textarea>
                              </div>
                            </div>
                            
                              <div class="col-sm-6 col-md-6">
                                <div class="form-group prop-label">
                                    <label class="form-label">Size of Farm (in acres/hecares) <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="farm_size" id="farm_size"  @if(isset($farm_house)) value="{{$farm_house->farm_size}}" @endif placeholder="Enter Size of Farm (in acres/hecares)" required>
                                </div>
                            </div>

                        </div>
                        
                          
                    <!--</div>             -->
                                                
                        </form>
								
								</div>
								
					
								<div class="col-md-12 mt-4 p-0 mb-5">
									<div class="row justify-content-between">
										<div class="mt-4">
											<a href="{{ url('listing/' . $result->id . '/pricing') }}" class="back-btn">
												{{ __('Back') }}
											</a>
										</div>

										<div class="mt-4">
											<button type="submit" class="nxt-btn" id="btn_next"><i class="spinner fa fa-spinner fa-spin d-none" ></i>
												<span id="btn_next-text">{{ __('Next') }}</span>

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
	  <script>
            $(document).ready(function(){
                
               $(document).on('change','#state',function(){
                    var state_id = $(this).val();
                     $.ajax({
                        type:"post",
                        url:"{{url('fetch-district-list')}}",
                        data:{state_id:state_id,'_token':"{{ csrf_token() }}"},
                        success:function(res){
                         $("#district").html('');
                          $("#district").html(res);
                        }
                     });
             });

            });
  </script>

@endsection
	
