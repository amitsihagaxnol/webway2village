@extends('admin.template')

@section('main')
    <div class="content-wrapper">
        <section class="content">
            @include('admin.farmHouseOwnerDetails.customer_menu')
          
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ $form_name ?? '' }}</h3>
                        </div>

                       <div class="row">
                            <div class="col-md-3">
                                @if ($user->profile_image)
                                    <img width="200" height="200" title="{{ $user->first_name }}" src="{{ url('public/images/profile') . '/' . $user->id . '/' . $user->profile_image }}" alt="{{ $user->first_name }}">
                                @else
                                   
                                @endif

                            </div>
                            <div class="col-md-9 align-self-center">
                                <p class="text-16 mt-2">Please upload a clear photo to help hosts and guests to learn about each other.</p>
                                <form name="ajax_upload" method="post" id="ajax_upload" enctype="multipart/form-data" action="{{ url("admin/farm-house-owner/profile/" . $user?->id) }}" accept-charset="UTF-8" novalidate="novalidate">
                                    <input type="hidden" name="_token" value="5rFZpqfAUBQWlv6Ii9yfxRksFhFOL6ceJHfrolPq">
                                     {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6 p-0">
                                            <input type="file" name="photos[]" id="profile_image" class="form-control" accept="image/*">
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn w-100 btn-outline-success text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 border border-success" id="up_button">
                                                    <i class="spinner fa fa-spinner fa-spin d-none" id="up_spin"></i>
                                                <span id="up_button_txt">Upload</span>

                                            </button>
                                        </div>
                                    </div>

                                    <iframe class="d-none" name="upload_frame" id="upload_frame"></iframe>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


@section('validate_script')
   
 <script src="{{ asset('public/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('public/js/additional-method.min.js') }}"></script>

    <script type="text/javascript">
        'use strict'
        let acceptPhotosText = "{{ __('The file must be an image (jpg, jpeg, png or gif)') }}";
        let uploadText = "{{ __('Upload') }}...";
    </script>
    
    <script src="{{ asset('public/js/user-media.js') }}"></script>
@endsection
    
