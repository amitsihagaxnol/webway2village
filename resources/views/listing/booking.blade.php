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
								<div class="col-md-12 p-0 mt-4   pb-4 m-0" style="border:1px solid #7cb342">
									<div class="form-group col-md-12 main-panelbg pb-3 pt-3 pl-4">
											<h4 class="text-16 font-weight-700">{{ __('Booking') }}</h4>
									</div>
									<div class="row m-0 pl-5 pr-5">
										<div class="col-md-12 p-0">
											<h3 style="color:#7cb342">{{ __('Choose how your guests book') }} <span class="text-danger">*</span></h3>
											<p class="text-muted">{{ __('Get ready for guests by choosing your booking style.') }}</p>
										</div>
									</div>

									<div class="row m-0">
										<div class="col-md-4 pl-5 pr-5 prop-label">
											<label>{{ __('Booking Type') }}</label>
											<select name="booking_type" id="booking_type" class="form-control text-16 mt-2">
												<option value="request" {{ ($result->booking_type == 'request') ? 'selected' : '' }}>{{ __('Review each request') }}</option>
												<option value="instant" {{ ($result->booking_type == 'instant') ? 'selected' : '' }}>{{ __('Guests book instantly') }}</option>
											</select>
										</div>
									</div>
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

@endsection
	