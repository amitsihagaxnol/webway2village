@extends('admin.template')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Contact Form
                <small>edit contact form</small>
            </h1>
            @include('admin.common.breadcrumb')
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- right column -->
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Contact Form</h3>
                        </div>
                        <!-- form start -->
                        <form class="form-horizontal" action="{{ url('admin/edit-page-contact/' . $result->id) }}" id="edit_page"
                            method="post" name="edit_page" accept-charset='UTF-8'  enctype="multipart/form-data">
                            {{ csrf_field() }}



                            <div class="box-body">
                                <div class="form-group row mt-3">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Name<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                     
                                        <input type="text" name="name" id="name" class="form-control f-14" value="{{$result->name}}">
                                    </div>
                                </div>
                                
                                 <div class="form-group row mt-3">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Email<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                     
                                        <input type="text" name="email" id="email" class="form-control f-14" value="{{$result->email}}">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Phone</label>
                                    <div class="col-sm-5">
                                        <input type="tel" class="form-control" id="contact_no" name="contact_no"
                                            value="{{ $result->contact_no }}">
                                        <span id="phone-error" class="text-danger"></span>
                                        <span id="tel-error" class="text-danger"></span>
                                    </div>
                                </div>
                                
                                  <div class="form-group row mt-3">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Latitude<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                     
                                        <input type="text" name="lat" id="lat" class="form-control f-14" value="{{$result->lat}}">
                                    </div>
                                </div>
                                
                                 <div class="form-group row mt-3">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Longitude<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                     
                                        <input type="text" name="longitude" id="longitude" class="form-control f-14" value="{{$result->longitude}}">
                                    </div>
                                </div>
                               
                                 <div class="form-group row mt-2">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Meta Title<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control f-14" value="{{ $result->meta_title }}" name="meta_title"
                                            placeholder="enter meta title" id="meta_title">
                                    </div>
                                </div>
                               
                                
                                <div class="form-group row mt-3">
                                    <label for="inputEmail3"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Meta Description <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <textarea id="meta_description" name="meta_description" placeholder="" rows="10" cols="70" class="">{{ $result->meta_description }}</textarea>
                                        <span id="content-validation-error"></span>
                                    </div>

                                </div>
                                <div class="form-group row mt-3">
                                    <label for="inputEmail3"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Address<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <textarea id="address" name="address" placeholder="" rows="10" cols="70" class="">{{ $result->address }}</textarea>
                                        <span id="content-validation-error"></span>
                                    </div>

                                </div>
                               
                                <div class="form-group row mt-3">
                              
                                <div class="form-group row mt-3 mb-3">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Status</label>
                                    <div class="col-sm-6">
                                        <select name="status" class="form-control f-14">
                                            <option value="Active" {{ $result->status == 'Active' ? 'selected' : '' }}>
                                                Active </option>
                                            <option value="Inactive" {{ $result->status == 'Inactive' ? 'selected' : '' }}>
                                                Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info btn-sm f-14 text-white"
                                    id="submitBtn">Submit</button>
                                <a href="{{ url('admin/pages') }}" class="btn btn-danger btn-sm f-14 ms-1">
                                    Cancel
                                </a>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                    <!-- /.box -->

                    <!-- /.box -->
                </div>
                <!--/.col (right) -->
            </div>
        </section>
    </div>
@endsection

@section('validate_script')
     <script src="{{ asset('public/backend/js/intl-tel-input-13.0.0/build/js/intlTelInput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/backend/js/isValidPhoneNumber.js') }}" type="text/javascript"></script>
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script type="text/javascript" src="{{ asset('public/backend/dist/js/validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/dist/js/admin.min.js') }}"></script>

    <script type="text/javascript">
        'use strict'
        let filebrowserUploadUrl = '{{ route("upload", ["_token" => csrf_token()]) }}';
    </script>
    <script type="text/javascript" src="{{ asset('public/backend/js/static_page_photo_upload.min.js') }}"></script>

@endsection
