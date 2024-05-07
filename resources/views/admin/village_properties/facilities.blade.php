@extends('admin.template')
@section('main')
  <div class="content-wrapper">
        <!-- Main content -->
    <section class="content-header">
        <h1>
          Facilities
            <small>Facilities</small>
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
                                    <h4>Facilities</h4>

                                </div>

                                <div class="card-body add-facilities mt-3">
                                   @if($facilities->isNotEmpty())

                                        @php
                                             $i=1;
                                        @endphp
                                        @foreach($facilities as $facility)
                                                 <div class="row  facilities-original-fields">
                                                   <div class="col-sm-1 facilities-count">
                                                           {{$i}}
                                                   </div>


                                                     <div class="col-sm-10 col-md-10">
                                                            <div class="form-group">
                                                                <label class="form-label">Facilities <span class="text-red">*</span></label>
                                                                <input type="text" class="form-control" name="facilities[]" value="{{$facility->name}}" placeholder="Enter  Facilities">

                                                            </div>
                                                     </div>



                                                    <div class="col-sm-1 col-md-1 facilities-add-check d-flex justify-content-center align-items-end">
                                                    @if($i==1)
                                                        <button type="button" class="btn btn-primary  facilities-clone-btn">   + </button>
                                                    @else
                                                       <button type="button" class="btn btn-danger facilities-remove-btn">-</button>
                                                    @endif
                                                   </div>
                                                </div>

                                                @php
                                                     $i++;
                                               @endphp
                                        @endforeach


                                    @else


                                    <div class="row  facilities-original-fields">
                                       <div class="col-sm-1 facilities-count">
                                              1
                                       </div>


                                         <div class="col-sm-10 col-md-10">
                                                <div class="form-group">
                                                    <label class="form-label">Facilities <span class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="facilities[]"  placeholder="Enter  Facilities">

                                                </div>
                                         </div>



                                        <div class="col-sm-1 col-md-1 facilities-add-check d-flex justify-content-center align-items-end">
                                            <button type="button" class="btn btn-primary  facilities-clone-btn">   + </button>
                                       </div>
                                    </div>
                                    @endif
                             </div>


                                <div class="clear-both"></div>
                                <div class="col-12 mt-3">
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <a data-prevent-default="" href="{{ url('admin/village-listing/' . $result->id . '/location_near_me') }}" class="btn btn-large btn-primary f-14">Back</a>
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

                     $(document).on('click','.facilities-clone-btn',function(){
                        var clonedFields = $('.facilities-original-fields').last().clone();
                         clonedFields.find('input').val('');
                        var lastSerialNumber = parseInt($('.facilities-original-fields').last().find('.facilities-count').text().trim());
                        var newSerialNumber = lastSerialNumber + 1;

                        clonedFields.find('.facilities-count').text(newSerialNumber);

                        clonedFields.find('.clone-btn').remove();
                        clonedFields.find('.facilities-add-check').html('<button type="button" class="btn btn-danger facilities-remove-btn">-</button>');

                        $(".add-facilities").append(clonedFields);
                    });

                    $(document).on('click', '.facilities-remove-btn', function() {
                        $(this).closest('.row').remove();
                          $('.facilities-original-fields').each(function(index) {
                            $(this).find('.facilities-count').text(index + 1);
                        });
                    });
            });
  </script>

@endsection


