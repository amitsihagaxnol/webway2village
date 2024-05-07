@extends('admin.template')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add Help Form
                <small>add page form</small>
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
                            <h3 class="box-title">Add Help Form</h3>
                        </div>
                        <!-- form start -->
                        <form class="form-horizontal" action="{{ url('admin/add-page-help') }}" id="add_page" method="post"
                            name="add_page" accept-charset='UTF-8' enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group row mt-2">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Type<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                       
                                            <select class="form-control" name="type" id="type">
                                                 <option value="">select type</option>
                                                 <option value="General">General</option>
                                                 <option value="Booking">Booking</option>
                                                
                                            <select>
                                        @if ($errors->has('type'))
                                            <p class="error-tag">{{ $errors->first('type') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Question<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control f-14" name="question" id="question"
                                            placeholder="">
                                        @if ($errors->has('question'))
                                            <p class="error-tag">{{ $errors->first('question') }}</p>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group row mt-3">
                                    <label for="inputEmail3"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Answer<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <textarea id="content" name="answer" placeholder="" rows="10" cols="80" class=""> </textarea>
                                        <span id="content-validation-error"></span>
                                        @if ($errors->has('answer'))
                                            <p class="error-tag">{{ $errors->first('answer') }}</p>
                                        @endif
                                    </div>
                                </div>
                               {{--   <div class="form-group row mt-3">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Meta Title<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control f-14" name="meta_title" id="meta_title"
                                            placeholder="">
                                        @if ($errors->has('meta_title'))
                                            <p class="error-tag">{{ $errors->first('meta_title') }}</p>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group row mt-3">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Meta Description<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                             <textarea  name="meta_description" placeholder="" rows="10" cols="80" class=""> </textarea>
                                        @if ($errors->has('meta_description'))
                                            <p class="error-tag">{{ $errors->first('meta_description') }}</p>
                                        @endif
                                    </div>
                                </div>
                             
                                <div class="form-group row mt-3">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Banner Image</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control f-14"  name="image" id="image">
                                    </div>
                                </div>
                                  --}}
                                
                                
                                <div class="form-group row mt-3">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Status</label>
                                    <div class="col-sm-6">
                                        <select name="status" class="form-control f-14">
                                            <option value="active"> Active </option>
                                            <option value="inactive">Inactive</option>
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

