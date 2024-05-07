	@extends('admin.template')
	@section('main')
		<div class="content-wrapper">
			<section class="content-header">
				<h1>Bookings<small>Control panel</small></h1>
				@include('admin.common.breadcrumb')
			</section>

			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-body">
								<form class="form-horizontal" enctype='multipart/form-data' action="{{ url('admin/bookings') }}" method="GET" accept-charset="UTF-8">
									{{ csrf_field() }}
									<div class="col-md-12  d-none">
										<input class="form-control" type="text" id="startDate"  name="from" value="{{ isset($from) ? $from : '' }}" hidden>
										<input class="form-control" type="text" id="endDate"  name="to" value="{{ isset($to) ? $to : '' }}" hidden>
									</div>
									<div class="row align-items-center date-parent">
										<div class="col-xl-3 col-sm-6 col-12">
											<label>Date Range</label>
											<div class="input-group  col-xs-12">
												<button type="button" class="form-control" id="daterange-btn">
													<span class="pull-left">
														<i class="fa fa-calendar"></i>  Pick a date range
													</span>
													<i class="fa fa-caret-down pull-right"></i>
												</button>
											</div>
										</div>
                                        <div class="col-xl-3 col-sm-6 col-12">
                                            <label>Status</label>
                                            <div class="input-group col-xs-12">
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



										<div class="col-xl-1 col-sm-2 col-4 d-flex gap-2 mt-4">
											<button type="submit" name="btn" class="btn btn-primary btn-flat f-14 rounded">Filter</button>
											<button type="button" name="reset_btn" id='reset_btn' class="btn btn-primary btn-flat f-14 rounded">Reset</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-body">
								<div class="table-responsive parent-table f-14">
									{!! $dataTable->table(['class' => 'table table-striped table-hover dt-responsive', 'width' => '100%', 'cellspacing' => '0']) !!}
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	@endsection

	@section('validate_script')

	<script src="{{ asset('public/backend/plugins/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('public/backend/plugins/Responsive-2.2.2/js/dataTables.responsive.min.js') }}"></script>
	{!! $dataTable->scripts() !!}

	<script type="text/javascript">
	'use strict'

		var sessionDate  = '{{ strtoupper(Session::get('date_format_type')) }}';
		var user_id      = '{{ $user->id ?? '' }}';
		var page 		 = 'booking'

	</script>

	<script src="{{ asset('public/backend/js/property_customer_dropdown.min.js') }}"></script>
	<script src="{{ asset('public/backend/js/reset-btn.min.js') }}"></script>
	<script src="{{ asset('public/backend/js/admin-date-range-picker.min.js') }}"></script>
	@endsection
