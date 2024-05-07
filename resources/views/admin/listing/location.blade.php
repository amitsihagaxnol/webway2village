@extends('admin.template')
@section('main')
  <div class="content-wrapper">
    <section class="content-header">
        <h1>
            Location
            <small>Location</small>
        </h1>
        <ol class="breadcrumb">
            <li>
            <a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a>
            </li>
        </ol>
    </section>
    <section class="content">
        <div class="row gap-2">
            <div class="col-md-3 settings_bar_gap">
                @include('admin.common.property_bar')
                </div>

                <div class="col-md-9">
                    <form id="listing_location" method="post" action="{{ url('admin/listing/' . $result->id . '/' . $step) }}" class='signup-form login-form' accept-charset='UTF-8'>
                        {{ csrf_field() }}
                        <div class="box box-info">
                            <div class="box-body">
                                <input type="hidden" name='latitude' id='latitude'>
                                <input type="hidden" name='longitude' id='longitude'>
                                <div class="row">

                                    <div class="col-md-8 mb20">
                                        <label class="label-large fw-bold">Country <span class="text-danger">*</span></label>
                                        <select id="basics-select-bed_type" name="country" class="form-control f-14" >
                                            @foreach ($country as $countr)
                                            @if($countr->name=="India")
                                              <option value="{{ $countr->id }}" {{ ($countr->id == $result->property_address->country) ? 'selected' : '' }}>{{ $countr->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('country') }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 mb20">
                                        <label class="label-large fw-bold">Address Line 1 <span class="text-danger">*</span></label>
                                        <input type="text" name="address_line_1" id="address_line_1" value="{{ $result->property_address->address_line_1  }}" class="form-control f-14" placeholder="House name/number + street/road">
                                        <span class="text-danger">{{ $errors->first('address_line_1') }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 mb20">
                                        <div id="map_view" style="width:100%; height:400px;"></div>
                                    </div>
                                    <div class="col-md-8 mb20">
                                        <p>You can move the pointer to set the correct map position</p>
                                        <span class="text-danger">{{ $errors->first('latitude') }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 mb20">
                                        <label class="label-large fw-bold">Address Line 2</label>
                                        <input type="text" name="address_line_2" id="address_line_2" value="{{ $result->property_address->address_line_2  }}" class="form-control f-14" placeholder="Apt., suite, building access code">
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-8 mb20">
                                        <label class="label-large fw-bold">State / Province / County / Region <span class="text-danger">*</span></label>

                                         <select  name="state" class="form-control f-14" id='state'>
                                            <option value="">select state</option>
                                            @foreach ($states as $state )
                                            <option value="{{ $state->id }}" {{ ($state->id == $result->property_address->state) ? 'selected' : '' }}>{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('state') }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 mb20">
                                        <label class="label-large fw-bold">City / Town / District <span class="text-danger">*</span></label>
                                        <select  name="city" class="form-control f-14" id='district'>
                                            @foreach ($districts as $district )
                                            <option value="{{ $district->id }}" {{ ($district->id == $result->property_address->city) ? 'selected' : '' }}>{{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 mb20">
                                        <label class="label-large fw-bold">ZIP / Postal Code</label>
                                        <input type="text" name="postal_code" id="postal_code" value="{{ $result->property_address->postal_code }}" class="form-control f-14">
                                        <span class="text-danger">{{ $errors->first('postal_code') }}</span>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <a data-prevent-default="" href="{{ url('admin/listing/' . $result->id . '/description') }}" class="btn btn-large btn-primary f-14">Back</a>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button type="submit" class="btn btn-large btn-primary next-section-button f-14">
                                            Next
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </section>
    <div class="clearfix"></div>
  </div>
@endsection

@section('validate_script')
<script type="text/javascript">
    'use strict'
    var page = 'location';
    let fieldRequiredText = "{{ __('This field is required.') }}";
	let maxlengthText = "{{ __('Please enter no more than 255 characters.') }}";
	let latitude = "{{ $result->property_address->latitude != '' ? $result->property_address->latitude:0 }}";
	let longitude = "{{ $result->property_address->longitude != '' ? $result->property_address->longitude:0 }}";
</script>
<script type="text/javascript" src="{{ asset('public/backend/dist/js/validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/js/listings.min.js') }}"></script>

<script>
   $(document).ready(function(){

            $(document).on('change','#basics-select-bed_type1',function(){
                    var country_id = $(this).val();
                         $.ajax({
                            type:"post",
                            url:"{{url('admin/fetch-state-list')}}",
                            data:{country_id:country_id,'_token':"{{ csrf_token() }}"},
                            success:function(res){
                                //console.log(res);
                             $("#state").html('');
                              $("#state").html(res.states);
                              $("#district").html();
                              $("#district").html(res.districts);
                            }
                         });
             });
          $(document).on('change','#state',function(){
                    var state_id = $(this).val();
                     $.ajax({
                        type:"post",
                        url:"{{url('admin/fetch-district-list')}}",
                        data:{state_id:state_id,'_token':"{{ csrf_token() }}"},
                        success:function(res){
                         $("#district").html('');
                          $("#district").html(res);
                        }
                     });
             });
   });
</script>
@endsection

