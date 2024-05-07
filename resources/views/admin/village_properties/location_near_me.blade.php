@extends('admin.template')
@section('main')
  <div class="content-wrapper">
        <!-- Main content -->
    <section class="content-header">
        <h1>
           Location Near Me
            <small>Location Near Me</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row gap-2">
            <div class="col-md-3 settings_bar_gap">
                @include('admin.common.village_property_bar')
            </div>
            <div class="col-md-9">
                <div class="box box-info">
                    <div class="box-body">
                        <form method="post" action="{{ url('admin/village-listing/' . $result->id . '/' . $step) }}" class='signup-form login-form' accept-charset='UTF-8'>
                            {{ csrf_field() }}
                            <div class="row p-3">
                                <div class="col-md-12">
                                    <h4>Location Near Me</h4>

                                </div>

                        <div class="card-body add-locations mt-3">

                              @if($locations->isNotEmpty())

                                    @php
                                       $i=1;
                                    @endphp
                                @foreach($locations as $location)

                                        <div class="row  locations-original-fields">
                                       <div class="col-sm-1 locations-count">
                                               {{$i}}
                                       </div>


                                         <div class="col-sm-5 col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Title <span class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="title[]" value="{{$location->location_title}}" id="title" placeholder="Enter  Title">

                                                </div>
                                         </div>

                                         <div class="col-sm-5 col-md-5">
                                            <div class="form-group">
                                                <label class="form-label">Distance in km  <span class="text-red">*</span></label>
                                                <input type="number" class="form-control" name="distance[]" value="{{$location->distance}}" id="distance" placeholder="Enter  Distance in km ">

                                            </div>
                                         </div>


                                        <div class="col-sm-1 col-md-1 locations-add-check  d-flex justify-content-center align-items-end">
                                          @if($i==1)
                                            <button type="button" class="btn btn-primary  locations-clone-btn">   + </button>
                                          @else
                                            <button type="button" class="btn btn-danger locations-remove-btn">-</button>
                                          @endif
                                       </div>
                                    </div>


                                    @php
                                        $i++;
                                    @endphp
                                    @endforeach


                                @else
                                    <div class="row  locations-original-fields">
                                       <div class="col-sm-1 locations-count">
                                              1
                                       </div>


                                         <div class="col-sm-5 col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Title <span class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="title[]" id="title" placeholder="Enter  Title">

                                                </div>
                                         </div>

                                         <div class="col-sm-5 col-md-5">
                                            <div class="form-group">
                                                <label class="form-label">Distance in km  <span class="text-red">*</span></label>
                                                <input type="number" class="form-control" name="distance[]" id="distance" placeholder="Enter  Distance in km ">

                                            </div>
                                         </div>


                                        <div class="col-sm-1 col-md-1 locations-add-check  d-flex justify-content-center align-items-end">
                                            <button type="button" class="btn btn-primary  locations-clone-btn">   + </button>
                                       </div>
                                    </div>
                                  @endif
                        </div>


                                <div class="clear-both"></div>
                                <div class="col-12 mt-3">
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <a data-prevent-default="" href="{{ url('admin/village-listing/' . $result->id . '/pest_and_disease_farm_practices') }}" class="btn btn-large btn-primary f-14">Back</a>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button type="submit" class="btn btn-large btn-primary next-section-button f-14">Next</button>
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
                    $(document).on('click','.locations-clone-btn',function(){
                        var clonedFields = $('.locations-original-fields').last().clone();
                          clonedFields.find('input').val('');
                        var lastSerialNumber = parseInt($('.locations-original-fields').last().find('.locations-count').text().trim());
                        var newSerialNumber = lastSerialNumber + 1;

                        clonedFields.find('.locations-count').text(newSerialNumber);

                        clonedFields.find('.clone-btn').remove();
                        clonedFields.find('.locations-add-check').html('<button type="button" class="btn btn-danger locations-remove-btn">-</button>');

                        $(".add-locations").append(clonedFields);
                    });

                    $(document).on('click', '.locations-remove-btn', function() {
                        $(this).closest('.row').remove();
                          $('.locations-original-fields').each(function(index) {
                            $(this).find('.locations-count').text(index + 1);
                        });
                    });
            });
  </script>

@endsection


