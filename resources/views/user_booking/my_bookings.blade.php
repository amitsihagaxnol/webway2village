@extends('template')
@section('main')

<style>

    .dashboard-card{
        /*box-shadow:none !important;*/
        border-color:#7CB342;
        border-radius:10px;
        overflow:hidden;
        background: #7cb342;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px !important;
    }
    .dashboard-2row-card{
        box-shadow:none !important;
        border-color:#7CB342;
        border-radius:10px;
        overflow:hidden;
    }
    ..at-section .x-nav ul li:hover .link-text{
        color:#fff !important;
    }
    .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-3 .selected-flag {
    width: 65px;
    height: 45px !important;
    font-size: 13px;
    padding:5px;
}
.prfle-inp input{
    border:1px solid #7cb342;
}
.prfle-inp select{
    border:1px solid #7cb342;
}

</style>

    <div class="at-section margin-top-85 ">
            <div class="container-fluid prf-pd">
                <div class="row">
                   @include('users.customers.customer_sidebar')
                    <div class="col-lg-8 m-top">
                        <div class="at-section-content">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 p-0 mb-3">
                                            <div class="list-background mt-4 rounded-3 pl-3 pr-3 pt-4 pb-4 border" style="height:50px;">
                                                <h3 class="text-18  font-weight-bold">{{ __('Bookings') }}</h3>

                                            </div>
                                            <div class="float-right" style="width:70%; margin-top:10px;">
                                                    <form class="form-inline" style="width:100%;" enctype="multipart/form-data" action="{{ url('user/my-bookings') }}" method="GET" accept-charset="UTF-8">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" id="startDate" name="from" value="{{ isset($from) ? $from : '' }}">
                                                        <input type="hidden" id="endDate" name="to" value="{{ isset($to) ? $to : '' }}">
                                                        <div class="row " style="width:100%;">
                                                            <div class="col-lg-4 d-flex justify-content-start align-items-start flex-column">
                                                                <label for="customer_name">Customer Name:</label>
                                                                <input type="text" class="form-control" id="customer_name" name="customer_name" style="width:100%;height:40px;">
                                                            </div>
                                                            <div class="col-lg-4 d-flex justify-content-start align-items-start flex-column">
                                                                <label for="status-select">Status:</label>
                                                                <select class="form-select" id="status-select" name="status" style="width:100%; height:40px;">
                                                                    <option value="">Select status</option>
                                                                    <option value="Reserved">Reserved</option>
                                                                    <option value="Confirmed">Confirmed</option>
                                                                    <option value="Cancelled">Cancelled</option>
                                                                    <option value="Complete">Complete</option>
                                                                    <option value="Closed">Closed</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-4  mt-4 d-flex justify-content-start align-items-center">
                                                                <button type="submit" class="btn btn-primary fltr-btn">Filter</button>
                                                                <button type="button" class="btn btn-primary fltr-btn " style="margin-left:5px;" id="reset_btn">Reset</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                                    @if (Session::has('message'))
                                        <div class="alert {{ Session::get('alert-class') }} alert-dismissible fade show text-center" role="alert">
                                            {{ Session::get('message') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="box">
                                                <div class="box-body">
                                                    <div class="table-responsive parent-table">
                                                        {!! $dataTable->table(['class' => 'table table-striped table-hover dt-responsive bk-tble-cstm', 'width' => '100%', 'cellspacing' => '0']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('validation_script')

    <script src="{{ asset('public/backend/plugins/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/backend/plugins/Responsive-2.2.2/js/dataTables.responsive.min.js') }}"></script>
    {!! $dataTable->scripts() !!}
        <script src="{{ asset('public/js/my-booking.min.js') }}"></script>
    @endsection
@endsection



