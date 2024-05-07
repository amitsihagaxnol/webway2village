@extends('template')

@section('main')
<style>
.file-inp::file-selector-button {
  border:none;
  outline:none;
  background:#f2f2f2;
  color:#222;
  font-size:13px;
  width:100px;
  height:100% !important;
}
    
</style>
<div class="margin-top-85">
    <div class="row m-0">
        <!-- sidebar start-->
        @include('users.sidebar')
        <!--sidebar end-->
        <div class="col-lg-10 p-0">
            <div class="container-fluid min-height">
                <div class="col-md-12 mt-5">
                    <div class="main-panel">
                        @include('users.profile_nav')

                        <!--Success Message -->
                        @if (Session::has('message'))
                            <div class="row pl-5 pr-5 mt-5">
                                <div class="col-md-12  alert {{ Session::get('alert-class') }} alert-dismissable fade in top-message-text opacity-1">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ Session::get('message') }}
                                </div>
                            </div>
                        @endif

                        <div class="row mt-5  pt-4 pb-4  "style="border-radius: 15px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    backdrop-filter: blur(7.8px);
    -webkit-backdrop-filter: blur(7.8px);
    border: 2px solid #7cb342;" >
                            <div class="col-md-3" >
                                @if ($result->profile_image)
                                    <img width="200" height="200" title="{{ Auth::user()->first_name }}" src="{{ url('public/images/profile') . '/' . Auth::user()->id . '/' . $result->profile_image }}" alt="{{ $result->first_name }}" >
                                @else
                                    <img width="225" height="225" title="{{ Auth::user()->first_name }}" src="{{ Auth::user()->profile_src }}" alt="{{ $result->first_name }} " style="object-fit:cover; border-radius:50% !important;">
                                @endif

                            </div>
                            <div class="col-md-9 align-self-center">
                                <p class="text-16 mt-2 mb-3" style="font-size:12px; font-weight:700; color:#7cb342; ">{{ __('Please upload a clear photo to help hosts and guests to learn about each other.')}}</p>
                                <form name="ajax_upload" method="post" id="ajax_upload" enctype="multipart/form-data" action="{{ url('users/profile/media') }}" accept-charset="UTF-8"  >
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6 p-0">
                                            <input type="file" name="photos[]" id="profile_image" class="form-control p-0 file-inp" accept="image/*" >
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit"
                                                class="w2v-lgn-btn" style="border-radius:20px; margin:0;" id="up_button">
                                                    <i class="spinner fa fa-spinner fa-spin d-none" id="up_spin"></i>
                                                <span id="up_button_txt">{{ __('Upload') }}</span>

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
        </div>
    </div>
</div>
@endsection

@section('validation_script')
    <script src="{{ asset('public/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('public/js/additional-method.min.js') }}"></script>

    <script type="text/javascript">
        'use strict'
        let acceptPhotosText = "{{ __('The file must be an image (jpg, jpeg, png or gif)') }}";
        let uploadText = "{{ __('Upload') }}...";
    </script>
    
    <script src="{{ asset('public/js/user-media.js') }}"></script>
@endsection

