@extends('template')

@section('main')
<style>
    .bk-tble-cstm tr th{
        background-color:#7cb342;
        color:#fff;
        padding:7px;
    }
    .fltr-btn{
        width:80px;
        font-size:16px;
        font-weight:600;
        height:35px;
    }
    .dataTables_length{
           width: 30%;
    float: left;
    height: 77px;
    display: flex;
    justify-content: center;
    align-items: center;
    }
    .dataTables_length label{
        width:100%;
        margin-top:20px;
    }
    .dataTables_length label select{
        width:100%;
        height:40px;
    }
    .dataTables_filter{
        width: 65%;
    float: right;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    }
    .dataTables_filter label{
        width:100%;
        margin-top:20px;
    }
    .dataTables_filter label input{
        width:50%;
    }
</style>
<div class="margin-top-85">
    <div class="row m-0">
        @include('users.sidebar')
        <div class="col-lg-10">
            <div class="main-panel">
                <div class="container-fluid min-height">
                    <div class="row">
                        <div class="col-md-12 p-0 mb-3">
                            <div class="list-background mt-4 rounded-3 pl-3 pr-3 pt-4 pb-4 border" style="height:50px;">
                                <h3 class="text-18  font-weight-bold">{{ __('Bookings') }}</h3>
                                
                            </div>
                            <div class="float-right" style="width:70%; margin-top:10px;">
                                    <form class="form-inline" style="width:100%;" enctype="multipart/form-data" action="{{ url('my-bookings') }}" method="GET" accept-charset="UTF-8">
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
@endsection
@section('validation_script')

<script src="{{ asset('public/backend/plugins/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/Responsive-2.2.2/js/dataTables.responsive.min.js') }}"></script>
{!! $dataTable->scripts() !!}
    <script src="{{ asset('public/js/my-booking.min.js') }}"></script>
@endsection
