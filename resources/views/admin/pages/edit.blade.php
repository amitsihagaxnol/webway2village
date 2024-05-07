@extends('admin.template')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Page Form
                <small>edit page form</small>
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
                            <h3 class="box-title">Edit Page Form</h3>
                        </div>
                        <!-- form start -->
                        <form class="form-horizontal" action="{{ url('admin/edit-page/' . $result->id) }}" id="edit_page"
                            method="post" name="edit_page" accept-charset='UTF-8'  enctype="multipart/form-data">
                            {{ csrf_field() }}



                            <div class="box-body">
                                <div class="form-group row mt-3">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Name<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                      
                                        <select class="form-control" name="name" id="name">
                                                 <option value="">select name</option>
                                                 <option value="User Policies" @if($result->name=="User Policies") selected @endif>User Policies</option>
                                                 <option value="Refund" @if($result->name=="Refund") selected @endif>Refund</option>
                                                 <option value="Terms" @if($result->name=="Terms") selected @endif>Terms</option>
                                                 <option value="Privacy" @if($result->name=="Privacy") selected @endif>Privacy</option>
                                                 <option value="Disclaimer" @if($result->name=="Disclaimer") selected @endif>Disclaimer</option>
                                                 <option value="About" @if($result->name=="About") selected @endif>About</option>
                                                 <option value="Payment Policies" @if($result->name=="Payment Policies") selected @endif>Payment Policies</option>
                                        <select>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">URL<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control f-14" name="url" id="page_url"
                                            placeholder="" value="{{ $result->url }}">
                                    </div>
                                </div>
                                
                                 <div class="form-group row mt-2">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Heading<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control f-14" value="{{ $result->heading }}" name="heading"
                                            placeholder="Enter heading" id="heading">
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
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Content<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <textarea id="content" name="content" placeholder="" rows="10" cols="80" class="">{{ $result->content }} </textarea>
                                        <span id="content-validation-error"></span>
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
                                {{--
                                <div class="form-group row mt-3">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Position</label>
                                    <div class="col-sm-6">
                                        <select name="position" class="form-control f-14">
                                            <option value="first" {{ $result->position == 'first' ? 'selected' : '' }}>
                                                First Column </option>
                                            <option value="second" {{ $result->position == 'second' ? 'selected' : '' }}>
                                                Second Column </option>
                                        </select>
                                    </div>
                                </div>
                                 --}}
                                <div class="form-group row mt-3">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Banner Image</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control f-14"  name="image" id="image">
                                    </div>
                                </div>
                                
                                <div class="form-group row mt-3">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Feature Image</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control f-14"  name="feature_image" id="feature_image">
                                    </div>
                                </div>
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
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script type="text/javascript" src="{{ asset('public/backend/dist/js/validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/dist/js/admin.min.js') }}"></script>

    <script type="text/javascript">
        'use strict'
        let filebrowserUploadUrl = '{{ route("upload", ["_token" => csrf_token()]) }}';
    </script>
    <script type="text/javascript" src="{{ asset('public/backend/js/static_page_photo_upload.min.js') }}"></script>

@endsection
