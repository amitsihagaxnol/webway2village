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

						<div class="col-md-9 mt-4 mt-sm-0 pl-4 pr-4">
							<form id="amenities_id" method="post" action="{{ url('listing/' . $result->id . '/' . $step) }}" accept-charset='UTF-8'>
								{{ csrf_field() }}

								@foreach ($amenities_type as $row_type)
									<div class="col-md-12 p-0 mt-4  " style="border:1px solid #7cb342;">
											<div class="row">
												<div class="col-md-12 pl-4 main-panelbg mb-4">
													<h4 class="text-18 font-weight-700 pl-0 pr-0 pt-4 pb-4">{{ $row_type->name }}
														@if ($row_type->name == 'Common Amenities')
															<input type="hidden" id="amenity_type_id" value="{{ $row_type->id }}">
															<span class="text-danger">*</span>
														@endif
													</h4>
													@if ($row_type->description != '')
														<p class="text-muted">{{ $row_type->description }}</p>
													@endif
												</div>

												<div class="col-md-12 pl-4 pr-4 pt-0 pb-4">
													<div class="row">
														@foreach ($amenities as $amenity)
															@if ($amenity->type_id == $row_type->id)
																<div class="col-md-6">
																	<label class="label-large label-inline amenity-label mt-4">
																		<input type="checkbox" value="{{ $amenity->id }}" name="amenities[]" data-saving="{{ $row_type->id }}" {{ in_array($amenity->id, $property_amenities) ? 'checked' : '' }}>
																		<span>{{ $amenity->title }}</span>
																	</label>
																	<span>&nbsp;</span>

																	@if ($amenity->description != '')
																		<span data-toggle="tooltip" class="icon" title="{{ $amenity->description }}"></span>
																	@endif
																</div>

															@endif
														@endforeach
														<span class="ml-4"  id="at_least_one"><br></span>
													</div>
												</div>
											</div>
									</div>
								@endforeach

								<div class="col-md-12 p-0 mt-4 mb-5">
									<div class="row justify-content-between mt-4">
										<div class="mt-4">
											<a data-prevent-default="" href="{{ url('listing/' . $result->id . '/location') }}" class="back-btn" >
											{{ __('Back') }}
											</a>
										</div>

										<div class="mt-4">
											<button type="submit" class="nxt-btn" id="btn_next"> <i class="spinner fa fa-spinner fa-spin d-none" ></i>
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
	<script type="text/javascript">
		'use strict'
		let nextText = "{{ __('Next') }}..";
		let mendatoryAmenitiesText = "{{ __('Choose at least one item from the Common Amenities.') }}";
		let next = "{{ __('Next') }}";
		let page = 'amenities';
	</script>
	<script type="text/javascript" src="{{ asset('public/js/listings.min.js') }}"></script>

	@endsection
	
