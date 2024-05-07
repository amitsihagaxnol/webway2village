@extends('admin.template')
	@push('css')
	    <link href="{{ asset('public/backend/css/setting.min.css') }}" rel="stylesheet" type="text/css" />
	@endpush
  @section('main')
	<div class="content-wrapper">
		<section class="content">
			<div class="row">
				<div class="col-lg-3 col-12 settings_bar_gap">
					@include('admin.common.settings_bar')
				</div>

				<div class="col-lg-9 col-12">
					<div class="box box-info">
                        @if (Session::has('error'))
                            <div class="error_email_settings">
                                <div class="alert alert-warning fade in alert-dismissable">
                                    <strong>Warning!</strong> Whoops there was an error. Please verify your below
                                    information. <a class="close" href="#" data-dismiss="alert" aria-label="close"
                                                    title="close">×</a>
                                </div>
                            </div>
                        @endif

						<div class="box-header with-border">
							<h3 class="box-title">Default Image Setting Form</h3><span class="email_status" >(<span class="text-green"><i class="fa fa-check" aria-hidden="true"></i>Verified</span>)</span>
						</div>

						<form id="general_form" method="post" action="{{ url('admin/default-image') }}" class="form-horizontal" enctype=multipart/form-data >
							{{ csrf_field() }}
                            <div class="box-body">

                                <div class="form-group row mt-3">
                                    <label for="inputEmail3"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Default Property Image
                                       <span class="text-danger">*</span>
                                    </label>

                                    <div class="col-sm-6">
                                        <input type="file" name="property_default_pic" class="form-control f-14" id="property_default_pic" placeholder="Logo">
                                        <span class="text-danger">{{ $errors->first('property_default_pic') }}</span>
                                        <br> <img src="{{ asset('public/front/defaultProperty/images/'.$defaultImage->property_default_pic) }}" alt="" height="100px">
                                        <input id="hidden_property_default_pic" name="hidden_property_default_pic" type="hidden" >
                                        <span  name="mySpan" class="remove_logo_preview" id="mySpan"></span>
                                    </div>
                                </div>


                            </div>
                            <div class="box-footer">

								<button type="submit" class="btn btn-info btn-space f-14 text-white me-2">Submit</button>


								<a class="btn btn-danger f-14" href="{{ url('admin/settings') }}">Cancel</a>


							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>

  @endsection

  @section('validate_script')
    <script type= "text/javascript">
        'use strict'
        var message = "{{ __('The file must be an image (jpg, jpeg, png or gif)') }}";
        var message_ico = "{{ __('The file must be an image (jpg, jpeg, png or ico)') }}";
    </script>
    <script type="text/javascript" src="{{ asset('public/backend/js/additional-method.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/dist/js/validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/js/backend.min.js') }}"></script>
  @endsection

