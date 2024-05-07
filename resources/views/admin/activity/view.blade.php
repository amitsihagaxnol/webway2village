	@extends('admin.template')
	@section('main')
	<div class="content-wrapper">
		<section class="content-header">
			<h1>Activity<small>activity</small></h1>
			@include('admin.common.breadcrumb')
		</section>

		<section class="content">
		    {{--
			<div class="row">
				<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
					<form class="form-horizontal" enctype='multipart/form-data' action="{{ url('admin/activity') }}" method="GET" accept-charset="UTF-8">
						{{ csrf_field() }}
						

                        <div class="row align-items-center date-parent">
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <label>Activity Title</label>
                                <input class="form-control" name="name" id="name" placeholder="Search By Activity Title"/>
                            </div>
                            
                            
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <label>Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="" >All</option>
                                    <option value="Active" >Active</option>
                                    <option value="Inactive" >Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <label>Customer</label>
                                <select class="form-control select2" name="customer" id="customer">
                                    <option value="">All</option>
                                </select>
                            </div>
                            <div class="col-md-1 col-sm-2 col-xs-4 d-flex gap-2 mt-4">
                                <button type="submit" name="btn" class="btn btn-primary btn-flat f-14 rounded">Filter</button>
                                <button type="button" name="reset_btn" id="reset_btn" class="btn btn-primary btn-flat f-14 rounded">Reset</button>
                            </div>
                        </div>
					</form>
					</div>
				</div>
				</div>
			</div> --}}

			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Activity Management</h3>
							@if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'add_customer'))
								<div class="pull-right"><a class="btn btn-success f-14" href="{{ url('admin/add-activity') }}">Add Activity</a></div>
							@endif
						</div>

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

	@push('scripts')
	<script src="{{ asset('public/backend/plugins/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('public/backend/plugins/Responsive-2.2.2/js/dataTables.responsive.min.js') }}"></script>
	{!! $dataTable->scripts() !!}
	@endpush

@section('validate_script')
<script type="text/javascript">
	'use strict'

    var sessionDate  = '{{ strtoupper(Session::get('date_format_type')) }}';
    var user_id      = '{{ $user->id ?? '' }}';
    var page      	 = "customer";

</script>
	<script src="{{ asset('public/backend/js/property_customer_dropdown.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/reset-btn.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/admin-date-range-picker.min.js') }}"></script>

@endsection
