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
							<h3 class="box-title">Edit Account Deactivation Form</h3><span class="email_status" >(<span class="text-green"><i class="fa fa-check" aria-hidden="true"></i>Verified</span>)</span>
						</div>

						<form id="edit_property" method="post" action="{{ url('admin/settings/edit-account-deactivation/' . $result->id) }}" class="form-horizontal" enctype=multipart/form-data >
							{{ csrf_field() }}
							<div class="box-body">
                                <div class="form-group row mt-3 name">
                                    
                                    <label for="inputEmail3" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Reason 
                                        <span class="text-danger">*</span></label>
                                    
                                    <div class="col-sm-6">
                                        <textarea name="reason" class="form-control f-14 validate_field" id="reason" placeholder="reason">{{$result->reason}}</textarea>
                                        <span class="text-danger">{{ $errors->first("reason") }}</span>
                                    </div>
                                    
                                </div>
                                
                               

                                <div class="form-group row mt-3 status">

                                    <label for="inputEmail3" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Status</label>
                                    
                                    <div class="col-sm-6">
                                        <select class="form-control f-14 validate_field" id="status" name="status" aria-invalid="false">
                                            <option value="Active" {{ $result->status == "Active" ? 'selected': '' }}>Active</option>
                                            <option value="Inactive" {{ $result->status == "Inactive" ? 'selected': '' }}>Inactive</option>
                                        </select>
                                        <span class="text-danger">{{ $errors->first('status') }}</span>
                                    </div>
                                </div>
                                
                              
								
							</div>

							<div class="box-footer">

								<button type="submit" class="btn btn-info btn-space f-14 text-white me-2">Update</button>

								<!--<a class="btn btn-danger f-14" href="{{ url('admin/settings/property-type') }}">Cancel</a>	-->

							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection

@section('validate_script')
    <script type="text/javascript" src="{{ asset('public/backend/dist/js/validate.min.js') }}"></script>	
@endsection
