@extends('admin.template')
@section('main')
  <div class="content-wrapper">
        <!-- Main content -->
    <section class="content-header">
        <h1>
            General Informations
            <small> General Informations</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row gap-2">
            <div class="col-md-3 settings_bar_gap">
                @include('admin.common.property_bar')
            </div>
            <div class="col-md-9">
                <div class="box box-info">
                    <div class="box-body">
                        <form method="post" action="{{ url('admin/listing/' . $result->id . '/' . $step) }}" class='signup-form login-form' accept-charset='UTF-8'>
                            {{ csrf_field() }}
                            <div class="row p-3">
                                <div class="col-md-12">
                                    <h4>General Informations</h4>
                                 
                                </div>
                                         
                                         
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Accomodation Type <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" name="accomodation_type"  id="accomodation_type" @if(isset($farmHouse)) value="{{$farmHouse->accomodation_type}}" @endif placeholder="Enter Accomodation Type ">
                                           
                                        </div>
                                    </div>
                                    
                                     <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Total Bedrooms<span class="text-red">*</span></label>
                                            <input type="number" class="form-control" name="total_bedroom" id="total_bedroom"  @if(isset($farmHouse)) value="{{$farmHouse->total_bedroom}}" @endif placeholder="Enter Total Bedrooms ">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Total Bathroom<span class="text-red">*</span></label>
                                            <input type="number" class="form-control" name="total_bathroom" id="total_bathroom"  @if(isset($farmHouse)) value="{{$farmHouse->total_bathroom}}" @endif placeholder="Enter Total Bathroom">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Dimension<span class="text-red">*</span></label>
                                            <input type="text" class="form-control" name="dimension" id="dimension" @if(isset($farmHouse)) value="{{$farmHouse->dimension}}" @endif placeholder="Enter Dimension">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Check In Time<span class="text-red">*</span></label>
                                            <input type="time" class="form-control" name="checkin_time" id="checkin_time" @if(isset($farmHouse)) value="{{$farmHouse->checkin_time}}" @endif placeholder="Enter Check In Time">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Check Out Time<span class="text-red">*</span></label>
                                            <input type="time" class="form-control" name="checkout_time" id="checkout_time" @if(isset($farmHouse)) value="{{$farmHouse->checkout_time}}" @endif placeholder="Enter Check Out Time">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Airport pick up and drop available<span class="text-red">*</span></label>
        								    <input type="radio"   name="airport" value="yes" @if(isset($farmHouse)) @if($farmHouse->airport=="yes") checked  @else checked @endif @else checked  @endif  /> Yes &nbsp; &nbsp;
        									<input type="radio"   name="airport" value="no" @if(isset($farmHouse)) @if($farmHouse->airport=="no") checked  @endif  @endif  /> No
                                        </div>
                                    </div>
                                    
                                     <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Car parking available <span class="text-red">*</span></label>
        								    <input type="radio"   name="car_parking" value="yes" @if(isset($farmHouse)) @if($farmHouse->car_parking=="yes") checked  @else checked @endif @else checked  @endif  /> Yes &nbsp; &nbsp;
        									<input type="radio"   name="car_parking" value="no"  @if(isset($farmHouse)) @if($farmHouse->car_parking=="no") checked  @endif @endif/> No
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Wifi and Internet<span class="text-red">*</span></label>
        								    <input type="radio"   name="wifi_internet" value="yes"@if(isset($farmHouse)) @if($farmHouse->wifi_internet=="yes") checked  @else checked  @endif @else checked  @endif /> Yes &nbsp; &nbsp;
        									<input type="radio"   name="wifi_internet" value="no"  @if(isset($farmHouse)) @if($farmHouse->wifi_internet=="no")  checked  @endif  @endif/> No
                                        </div>
                                    </div>
                                
                                </div>
                                
                          
                    </div>       
                                            
                                                
                                                
                                                
                                <div class="clear-both"></div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <a data-prevent-default="" href="{{ url('admin/listing/' . $result->id . '/activities') }}" class="btn btn-large btn-primary f-14">Back</a>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button type="submit" class="btn btn-large btn-primary next-section-button f-14">Complete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
      </div>
    </section>
  </div>
@endsection
@section('validate_script')

  <script>
            $(document).ready(function(){
                    $(document).on('click','.sustainable-clone-btn',function(){
                        var clonedFields = $('.sustainable-original-fields').last().clone();
                          clonedFields.find('textarea').val('');
                        var lastSerialNumber = parseInt($('.sustainable-original-fields').last().find('.sustainable-count').text().trim());
                        var newSerialNumber = lastSerialNumber + 1;
                    
                        clonedFields.find('.sustainable-count').text(newSerialNumber);
                    
                        clonedFields.find('.clone-btn').remove();
                        clonedFields.find('.sustainable-add-check').html('<button type="button" class="btn btn-danger sustainable-remove-btn">-</button>');
                    
                        $(".add-sustainable").append(clonedFields);
                    });
                    
                    $(document).on('click', '.sustainable-remove-btn', function() {
                        $(this).closest('.row').remove();
                          $('.sustainable-original-fields').each(function(index) {
                            $(this).find('.sustainable-count').text(index + 1);
                        });
                    });
                    
                $(document).on('change','.sustainable_farming',function(){
                     var self = this;
                     var sustainable_id = $(this).val();
                      $.ajax({
                        url: "{{ route('sustainable-fetch.details') }}",
                        type: "post",
                        data: {
                            sustainable_id: sustainable_id,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(res) {
                            $(self).parent().parent().next().children().find('textarea').val(res);
                        }
                    });
                });
            });
  </script>

@endsection


