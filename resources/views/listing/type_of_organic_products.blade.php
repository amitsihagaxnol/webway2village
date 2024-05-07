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
        font-size:11px;
        font-weight:600;
    }
    .prop-label select, .prop-label input,.prop-label textarea{
        border-radius:2px !important;
        height:43px;
        
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
											<h4 class="text-16 font-weight-700"> Type Of Organic Products</h4>
									</div>
									                        <div class="card-body add_products-Offered mt-3">
                            
                               @if($organic_products->isNotEmpty())
                                
                               @php
                                     $i=1;
                               @endphp
                                  @foreach($organic_products as $product)
                                        <div class="row  products-Offered-original-fields">
                                   <div class="col-sm-1 col-md-1 count-number d-flex justify-content-center align-items-center">
                                         {{$i}}
                                   </div>
                                    <div class="col-sm-2 col-md-2">
                                       <div class="form-group prop-label">
        									<label class="form-label">Product Title<span class="text-danger">*</span></label>
        									<input type="text" class="form-control"  name="product_title[]"  value="{{$product->product_title}}" placeholder="Enter Product Title"/>
        								</div>
                                   </div>
                                   
                                   <div class="col-sm-2 col-md-2">
                                       <div class="form-group prop-label">
        									<label class="form-label">Product Unit Price<span class="text-danger">*</span></label>
        									<input type="number" class="form-control"  name="product_unit[]" value="{{$product->price}}" placeholder="Enter Price "/>
        								</div>
                                   </div>
                                   
                                   <div class="col-sm-2 col-md-2">
                                       <div class="form-group prop-label">
        									<label class="form-label">Seasonal Availability <span class="text-danger">*</span></label>
        									<select class="form-control"  name="seasonal_availability[]"   aria-hidden="true">
        										      <option value="yes" @if($product->product_unit=="yes") selected @endif>Yes</option>
        										      <option value="no" @if($product->product_unit=="no") selected @endif>No</option>
        										</select>
        								</div>
                                    </div>
                                    
                                    
                                    <div class="col-sm-2 col-md-2">
                                        <div class="form-group prop-label">
                                        <label class="form-label">Product Description<span class="text-danger">*</span></label>
                                           <textarea class="form-control mb-4" name="description[]" placeholder="full address" rows="3" style="height:40px !important">{{$product->description}}</textarea>
                                      </div>
                                    </div>
                                    <div class="col-sm-2 col-md-2">
                                       <div class="form-group prop-label">
        									<label class="form-label">Product Availability <span class="text-danger">*</span></label>
        										<select class="form-control"  name="usproduct_availability[]"   aria-hidden="true">
        										      <option value="Monthly" @if($product->usproduct_availability=="Monthly") selected @endif>Monthly</option>
        										      <option value="Quarterly" @if($product->usproduct_availability=="Quarterly") selected @endif>Quarterly</option>
        										      <option value="Half Yearly" @if($product->usproduct_availability=="Half Yearly") selected @endif>Half Yearly</option>
        										      <option value="Yearly" @if($product->usproduct_availability=="Yearly") selected @endif>Yearly</option>
        										</select>
        										
        								</div>
                                   </div>
                                   
                                    <div class="col-sm-1 col-md-1 product_availability-add-check d-flex justify-content-center align-items-center">
                                        @if($i==1)
                                          <button type="button" class="btn btn-primary  clone-btn">   + </button>
                                        @else
                                           <button type="button" class="btn btn-danger products-Offered-remove-btn">-</button>
                                        @endif
                                   </div>
                                   
                                </div>
                                  @php
                                      $i++
                                  @endphp
                                  @endforeach
                               
                               @else
                                <div class="row  products-Offered-original-fields">
                                   <div class="col-sm-1 count-number d-flex justify-content-center align-items-center ">
                                          1
                                   </div>
                                    <div class="col-sm-2 col-md-2">
                                       <div class="form-group">
        									<label class="form-label prop-label">Product Title<span class="text-danger">*</span></label>
        									<input type="text" class="form-control"  name="product_title[]"  placeholder="Enter Product Title"/>
        								</div>
                                   </div>
                                   
                                   <div class="col-sm-2 col-md-2">
                                       <div class="form-group prop-label">
        									<label class="form-label">Product Unit Price<span class="text-danger">*</span></label>
        									<input type="number" class="form-control"  name="product_unit[]"  placeholder="Enter Price "/>
        								</div>
                                   </div>
                                   
                                   <div class="col-sm-2 col-md-2">
                                       <div class="form-group prop-label">
        									<label class="form-label ">Seasonal Availability <span class="text-danger">*</span></label>
        									<select class="form-control"  name="seasonal_availability[]"   aria-hidden="true">
        										      <option value="yes">Yes</option>
        										      <option value="no">No</option>
        										</select>
        								</div>
                                    </div>
                                    
                                    
                                    <div class="col-sm-2 col-md-2">
                                        <div class="form-group prop-label">
                                        <label class="form-label">Product Description<span class="text-danger">*</span></label>
                                           <textarea class="form-control mb-4" name="description[]" placeholder="full address" rows="3" style="height:40px !important"></textarea>
                                      </div>
                                    </div>
                                    <div class="col-sm-2 col-md-2">
                                       <div class="form-group prop-label">
        									<label class="form-label">Product Availability <span class="text-danger">*</span></label>
        										<select class="form-control"  name="usproduct_availability[]"   aria-hidden="true">
        										      <option value="Monthly">Monthly</option>
        										      <option value="Quarterly">Quarterly</option>
        										      <option value="Half Yearly">Half Yearly</option>
        										      <option value="Yearly">Yearly</option>
        										</select>
        										
        								</div>
                                   </div>
                                   
                                    <div class="col-sm-1 col-md-1 product_availability-add-check d-flex justify-content-center align-items-center">
                                        <button type="button" class="btn btn-primary  clone-btn">   + </button>
                                   </div>
                                   
                                </div>
                            @endif
                        
                    </div>
								
								</div>
								
								
								<div class="col-md-12 mt-4 p-0 mb-5">
									<div class="row justify-content-between">
										<div class="mt-4">
											<a href="{{ url('listing/' . $result->id . '/products') }}" class="back-btn">
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
                   $(document).on('click','.clone-btn',function(){
                        var clonedFields = $('.products-Offered-original-fields').last().clone();
                        clonedFields.find('input').val('');
                        clonedFields.find('textarea').val('');
                        var lastSerialNumber = parseInt($('.products-Offered-original-fields').last().find('.count-number').text().trim());
                        var newSerialNumber = lastSerialNumber + 1;
                    
                        clonedFields.find('.count-number').text(newSerialNumber);
                    
                        clonedFields.find('.clone-btn').remove();
                        clonedFields.find('.product_availability-add-check').html('<button type="button" class="btn btn-danger products-Offered-remove-btn">-</button>');
                    
                        $(".add_products-Offered").append(clonedFields);
                    });
                    
                    $(document).on('click', '.products-Offered-remove-btn', function() {
                        $(this).closest('.row').remove();
                          $('.products-Offered-original-fields').each(function(index) {
                            $(this).find('.count-number').text(index + 1);
                        });
                    });
            });
  </script>

@endsection
	
