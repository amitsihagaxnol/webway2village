@extends('admin.template')
@section('main')
  <div class="content-wrapper">
        <!-- Main content -->
    <section class="content-header">
        <h1>
           Soil Health and Fertility Practices
            <small>Soil Health and Fertility Practices</small>
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
                                    <h4> Soil Health and Fertility Practices</h4>

                                </div>
                            <div class="card-body add-soil mt-3">
                              @if($soil_health_practices->isNotEmpty())

                                            @php
                                               $i=1;
                                            @endphp
                                        @foreach($soil_health_practices as $practice)

                                                <div class="row  soil-original-fields">
                                                   <div class="col-sm-1 soil-count">
                                                          {{$i}}
                                                   </div>


                                                    <div class="col-sm-5 col-md-5">
                                                       <div class="form-group">
                        									<label class="form-label"> Soil Health and Fertility Practices <span class="text-red">*</span></label>
                        										<select class="form-control soil_health"  name="soil_health[]" tabindex="-1" aria-hidden="true">
                        										        <option value="">select Soil Health and Fertility</option>
                            										    @forelse($soilHealths as $soilHealth)
                            										         <option value="{{$soilHealth->id}}" @if($practice->soil_health_id==$soilHealth->id) selected @endif>{{$soilHealth->name}}</option>
                            										     @empty

                            										     @endforelse
                        										</select>

                        								</div>
                                                   </div>
                                                    <div class="col-sm-5 col-md-5">
                                                        <div class="form-group">
                                                        <label class="form-label">Soil Health and Fertility Details<span class="text-red">*</span></label>
                                                           <textarea class="form-control mb-4" name="soil_health_details[]"  rows="3" style="height:35px !important" value="{{$practice['soil_health_practice']->description}}">{{$practice['soil_health_practice']->description}}</textarea>
                                                      </div>
                                                    </div>


                                                    <div class="col-sm-1 col-md-1 soil-add-check d-flex justify-content-center align-items-center">
                                                      @if($i==1)
                                                         <button type="button" class="btn btn-primary  soil-clone-btn">   + </button>
                                                      @else
                                                        <button type="button" class="btn btn-danger soil-remove-btn">-</button>
                                                      @endif
                                                   </div>
                                                </div>

                                               @php
                                                     $i++;
                                               @endphp
                                        @endforeach


                              @else

                                <div class="row  soil-original-fields">
                                   <div class="col-sm-1 soil-count">
                                          1
                                   </div>


                                    <div class="col-sm-5 col-md-5">
                                       <div class="form-group">
        									<label class="form-label"> Soil Health and Fertility Practices <span class="text-red">*</span></label>
        										<select class="form-control soil_health"  name="soil_health[]" tabindex="-1" aria-hidden="true">
        										        <option value="">select Soil Health and Fertility</option>
            										    @forelse($soilHealths as $soilHealth)
            										         <option value="{{$soilHealth->id}}">{{$soilHealth->name}}</option>
            										     @empty

            										     @endforelse
        										</select>

        								</div>
                                   </div>
                                    <div class="col-sm-5 col-md-5">
                                        <div class="form-group">
                                        <label class="form-label">Soil Health and Fertility Details<span class="text-red">*</span></label>
                                           <textarea class="form-control mb-4" name="soil_health_details[]"  rows="3" style="height:35px !important"></textarea>
                                      </div>
                                    </div>


                                    <div class="col-sm-1 col-md-1 soil-add-check d-flex justify-content-center align-items-center">
                                        <button type="button" class="btn btn-primary  soil-clone-btn">   + </button>
                                   </div>
                                </div>
                                @endif
                        </div>
                                <div class="clear-both"></div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <a data-prevent-default="" href="{{ url('admin/village-listing/' . $result->id . '/irrigation_method_farm_practices') }}" class="btn btn-large btn-primary f-14">Back</a>
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

                     $(document).on('click','.soil-clone-btn',function(){
                        var clonedFields = $('.soil-original-fields').last().clone();
                         clonedFields.find('textarea').val('');
                        var lastSerialNumber = parseInt($('.soil-original-fields').last().find('.soil-count').text().trim());
                        var newSerialNumber = lastSerialNumber + 1;

                        clonedFields.find('.soil-count').text(newSerialNumber);

                        clonedFields.find('.clone-btn').remove();
                        clonedFields.find('.soil-add-check').html('<button type="button" class="btn btn-danger soil-remove-btn">-</button>');

                        $(".add-soil").append(clonedFields);
                    });

                    $(document).on('click', '.soil-remove-btn', function() {
                        $(this).closest('.row').remove();
                          $('.soil-original-fields').each(function(index) {
                            $(this).find('.soil-count').text(index + 1);
                        });
                    });


                $(document).on('change','.soil_health',function(){
                    var self = this;
                     var soil_health_id = $(this).val();
                      $.ajax({
                        url: "{{ route('soil-health-fetch.details') }}",
                        type: "post",
                        data: {
                            soil_health_id: soil_health_id,
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


