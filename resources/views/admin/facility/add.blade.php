@extends('admin.template')

@section('main')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Facility<small>Add Facility</small></h1>
        @include('admin.common.breadcrumb')
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
            <div class="box">
                <form class="form-horizontal" action="{{ url('admin/add-facility') }}" method="post"  accept-charset='UTF-8'  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group mt-1 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Facility Code<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="facility_code" id="facility_code" placeholder="">
                                 <span class="text-danger">{{ $errors->first("facility_code") }}</span>
                            </div>
                        </div>

                        <div class="form-group mt-1 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Name<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" id="name" placeholder="">
                                 <span class="text-danger">{{ $errors->first("name") }}</span>
                            </div>
                        </div>

                        <div class="form-group mt-3 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Description<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <textarea id="description" name="description" placeholder="" rows="5" cols="70" class=""> </textarea>
                            </div>
                        </div>

                        <div class="form-group mt-3 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Status <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                            <select class="form-control f-14" name="status" id="status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                            </div>
                            <span class="text-danger">{{ $errors->first("status") }}</span>
                        </div>

                       <div class="form-group mt-3 row">
                            <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Price<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="price" value="0" id="price" placeholder="">
                                  <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>


                    <div class="box-footer">
                    <button type="submit" class="btn btn-info f-14 text-white" id="submitBtn">Submit</button>
                    <button type="reset" class="btn btn-danger f-14">Reset</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('validate_script')

<script src="{{ asset('backend/dist/js/validate.min.js') }}" type="text/javascript"></script>


@endsection
